<?php 
namespace App\Models;
use CodeIgniter\Model;

class Work_Order_Management_Model extends Model{
    protected $site_connection;
    public function __construct($db_name =null){
        $this->session = \Config\Services::session();

        $db_name = $this->session->get('active_site');

        $this->site_connection = [
            'DSN'      => '',
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => ''.$db_name.'',
            'DBDriver' => 'MySQLi',
            'DBPrefix' => '',
            'pConnect' => false,
            'DBDebug'  => (ENVIRONMENT !== 'production'),
            'charset'  => 'utf8',
            'DBCollat' => 'utf8_general_ci',
            'swapPre'  => '',
            'encrypt'  => false,
            'compress' => false,
            'strictOn' => false,
            'failover' => [],
            'port'     => 3306,
        ];

        $this->site_connection_assignee = [
            'DSN'      => '',
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => 'smartories_roof',
            'DBDriver' => 'MySQLi',
            'DBPrefix' => '',
            'pConnect' => false,
            'DBDebug'  => (ENVIRONMENT !== 'production'),
            'charset'  => 'utf8',
            'DBCollat' => 'utf8_general_ci',
            'swapPre'  => '',
            'encrypt'  => false,
            'compress' => false,
            'strictOn' => false,
            'failover' => [],
            'port'     => 3306,
        ];
    }

    public function getWorkOrderId(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management');
        $query->selectCount('work_order_id');
        $res = $query->get()->getResultArray();
        return $res[0];
    }

    public function getAssigneeId($site){
        $db = \Config\Database::connect($this->site_connection_assignee);
        $query = $db->table('user');
        $query->select('user_id,first_name,last_name,site_id,user_profile');
        // if ($site != "smartories") {
        $query->where('site_id',$site);
        $query->orWhere('site_id',"smartories");
        // }
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function getFileData($ref){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_attach_file');
        $query->select('uploaded_file_location,uploaded_file_name,original_file_name');
        $query->where('attach_file_id',$ref);
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function getLableData(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_lable');
        $query->select('lable_id,lable');
        $query->where('status',1);
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function getCauseId($cause){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_cause');
        $query->selectCount('cause_id');
        $res = $query->get()->getResultArray();
        return $res[0];
    }

    public function insertCause($data){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_cause');
        
        if ($query->insert($data)) {
            return true;
        }else{
            return false;   
        }
    }

    public function uploadWorkOrderFile($data){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_attach_file');
        if ($query->insert($data)) {
            return true;
        }else{
            return false;   
        }
    }

    public function insertWorkOrder($data){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management');
        if ($query->insert($data)) {
            return true;
        }else{
            return false;   
        }
    }

    public function updateWorkOrder($data,$ref){
        $db = \Config\Database::connect($this->site_connection);

        if ($data['comment_id'] ==""){
            $query_get = $db->table('work_order_management');
            $query_get->select('*');
            $query_get->where('work_order_id',$ref);
            $res = $query_get->get()->getResultArray(); 
            $data['comment_id'] = $res[0]['comment_id'];
        }
        else{
            $query_get = $db->table('work_order_management');
            $query_get->select('*');
            $query_get->where('work_order_id',$ref);
            $res = $query_get->get()->getResultArray(); 
            if ($res[0]['comment_id'] == "") {
                $data['comment_id'] = $data['comment_id'];
            }else{
                $data['comment_id'] = $res[0]['comment_id'].",".$data['comment_id'];
            }
        }

        $query = $db->table('work_order_management');
        $query->where('work_order_id', $ref);
        if ($query->update($data)) {
            return true;
        }else{
            return false;   
        }
    }

    public function insertComments($data){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_comments');
        if ($query->insert($data)) {
            return true;
        }else{
            return false;   
        }
    }

    public function deleteWorkOrderRec($id){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management');
        $query->set('status',0);
        $query->where('work_order_id',$id);
        if ($query->update()) {
            return true;
        }else{
            return false;   
        }
    }

    public function updateComments($id,$val,$ref){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_comments');
        $query->set('comment',$val);
        $query->where('comment_id',$ref);
        if ($query->update()) {
            return true;
        }else{
            return false;   
        }
    }

    public function getEditRec($id){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management');
        $query->select('*');
        $query->where('status',1);
        $query->where('work_order_id',$id);
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function get_work_order_data(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management');
        $query->select('work_order_id,title,priority_id,assignee,due_date,lable_id,status_id');
        $query->where('status',1);
        $query->orderBy('last_updated_on', 'DESC');
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function update_comments_data($data){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management');
        $query->select('comment_id');
        $query->where('work_order_id',$data['id']);
        $res = $query->get()->getResultArray();

        $val = "";
        if ($res[0]['comment_id'] != "" || $res[0]['comment_id'] != NULL || strval($res[0]['comment_id']) != "undefined" ) {
            $val = $res[0]['comment_id'].",".$data['comment_id'];
        }else{
            $val = $data['comment_id'];
        }

        $query1 = $db->table('work_order_management');
        $query->set('comment_id',$val);
        $query->where('work_order_id',$data['id']);
        if ($query->update()) {
            $query2 = $db->table('work_order_management');
            $query2->select('*');
            $query2->where('work_order_id',$data['id']);
            $res1 = $query2->get()->getResultArray();
            return $res1;
        }else{
            return false;
        }
    }

    public function getActionId(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_action_taken');
        $query->selectCount('action_id');
        $res = $query->get()->getResultArray();
        return $res[0];
    }

    public function getAction(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_action_taken');
        $query->select('action_id,action');
        $query->where('status',1);
        $res = $query->get()->getResultArray();
        return $res;
    }
    
    public function getPriority(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_priority');
        $query->select('priority_id,priority');
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function getIssue(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_cause');
        $query->select('cause_id,cause');
        $query->where('status',1);
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function getComments(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_comments');
        $query->select('comment_id,comment,last_updated_by');
        $query->where('status',1);
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function getAttach(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_attach_file');
        $query->select('attach_file_id,original_file_name,uploaded_file_location,uploaded_file_name');
        $query->where('status',1);
        $res = $query->get()->getResultArray();
        return $res;
    }
    
    public function getStatus(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_status');
        $query->select('status_id,status');
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function getAttachFileID(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_attach_file');
        $query->selectCount('attach_file_id');
        $res = $query->get()->getResultArray();
        return $res[0];
    }

    public function insertAction($data){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_action_taken');
        
        if ($query->insert($data)) {
            return true;
        }else{
            return false;   
        }
    }

    public function getLableId(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_lable');
        $query->selectCount('lable_id');
        $res = $query->get()->getResultArray();
        return $res[0];
    }

    public function insertLable($data){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_lable');
        
        if ($query->insert($data)) {
            return true;
        }else{
            return false;   
        }
    }

    public function generateCommentsId(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('work_order_management_comments');
        $query->selectCount('comment_id');
        $res = $query->get()->getResultArray();
        return $res[0];
    }
    
    
}

 ?>