<?php 





namespace App\Models;
use CodeIgniter\Model;

class Alert_Settings_Model extends Model{

	// protected $db_name;
    protected $site_connection;
    protected $session;
    public function __construct($db_name =null){

        // $db_name = $this->db_name;
        $this->session = \Config\Services::session();

        $db_name = $this->session->get('active_site');

        $this->site_connection = [
                    'DSN'      => '',
                    'hostname' => 'localhost',
                    'username' => 'root',
                    'password' => '',                    
                    // 'database' => 's1002',
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
    }



    // machine dropdown
    public function getmachine_dropdown(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_machine_current');
        $query->select('*');
        $res = $query->get()->getResultArray();
        return $res;


    }

    // part dropdown
    public function get_parts_drp(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_part_current');
        $query->select('*');
        $res = $query->get()->getResultArray();
        return $res;
    }

    // assignee dropdown
    public function get_last_updated_by_arr($site_id,$tempsid,$tmprole){
        $db = \Config\Database::connect("another_db");
        $query = $db->table('user');
        $query->select('*');
        $query->where('site_id',$site_id);
        if (($tempsid == "smartories") && ($tmprole=="Smart Admin")) {
            $query->orWhere('site_id',"smartories");

        }elseif (($tempsid=="smartories") && ($tmprole=="Smart Users")) {
            $query->orWhere('site_id',"smartories");
            $query->where('role!=','Smart Admin');
        }

        $res = $query->get()->getResultArray();
        return $res;
       
    }

    // this function  using assignee array
    public function get_assignee_arr($site_id){
        $db = \Config\Database::connect("another_db");
        $query = $db->table('user');
        $query->select('*');
        $query->where('site_id',$site_id);
        $res = $query->get()->getResultArray();
        return $res;
    }


    // alert insertion
    public function insert_alert_records($temp){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('alert_settings');

        $data = [
            "alert_id" => $temp['alert_id'],
            "alert_name"    =>  $temp['alert_name'],
            "metrics"   =>  $temp['metrics'],
            "relation"  =>  $temp['relation'],
            "value_val" =>  $temp['value_val'],
            "past_hour" =>  $temp['past_hour'],
            "machine_arr"   =>  $temp['machine_arr'],
            "part_arr"  =>  $temp['part_arr'],
            "label_txt_arr" =>  $temp['label_txt_arr'],
            "to_email_arr"    =>    $temp['to_email_arr'],
            "cc_email_arr"  =>  $temp['cc_email_arr'],
            "work_type" =>  $temp['work_type'],
            "work_title"    =>  $temp['work_title'],
            "assignee"  =>  $temp['assignee'],
            "deu_days"  =>  $temp['deu_days'],
            "add_alert_subject" =>  $temp['add_alert_subject'],
            "alert_notes"   =>  $temp['add_alert_notes'],
            "priority"  =>  $temp['priority'],
            "last_updated_by"   =>  $temp['last_updated_by'],
            "notify_as" =>  $temp['notify_as'],
            "alert_status"  =>  0,
        ];

        $res = $query->insert($data);

        return $res;
        
    }


    // alert table get id 
    public function get_alert_id(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('alert_settings');
        $query->select('*');
        $res = $query->get()->getResultArray();

        if (count($res)>0) {
            return count($res)+1;
        }else{
            return 1;
        }
    }


    // alert settings retrive data
    public function get_alert_data(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('alert_settings');
        $query->select('*');
        $query->where('alert_status !=',1);
        $res = $query->get()->getResultArray();

        return $res;
    }

    // get user details
    public function getuser_details($uid){
        $db = \Config\Database::connect('another_db');
        $query = $db->table('user');
        $query->select('*');
        $query->where('user_id',$uid);
        $res = $query->get()->getResultArray();

        $tmp['full_name'] = $res[0]['first_name'].' '.$res[0]['last_name'];
        $tmp['fl_split'] = $res[0]['first_name'][0].$res[0]['last_name'][0];

        return $tmp;


    }

    // before edit retrive data
    public function getparticular_rec($alert_id){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('alert_settings');
        $query->select('*');
        $query->where('alert_id',$alert_id);
        $res = $query->get()->getResultArray();

        return $res;
    }

    // update alert data
    public function update_alert($mydata){
        $db = \Config\Database::connect($this->site_connection);
        $build = $db->table('alert_settings');
            
        $data = [
            'alert_name' => $mydata['aname'],
            'metrics'  => $mydata['metrics'],
            'relation'  => $mydata['relation'],
            'value_val' =>  $mydata['value'],
            'past_hour' =>  $mydata['past_hour'],
            'machine_arr'  => $mydata['machine_Arr'],
            'part_arr'  =>  $mydata['part_arr'],
            'label_txt_arr' =>  $mydata['label_arr'],
            'to_email_arr'  =>  $mydata['to_email_arr'],
            'cc_email_arr'  =>  $mydata['cc_email_arr'],
            'work_type' =>  $mydata['work_type'],
            'work_title'   =>   $mydata['work_title'],
            'assignee'  =>  $mydata['assignee'],
            'deu_days'  =>  $mydata['due_days'],
            'add_alert_subject' =>  $mydata['subject'],
            'alert_notes'   =>  $mydata['notes'],
            'priority'  =>  $mydata['priority'],
            'last_updated_by'   =>  $mydata['last_updated_by'],
            'notify_as' =>  $mydata['notify'],
        ];

        $build->where('alert_id',$mydata['id']);
        if ($build->update($data)) {
            return true;
        }else{
            return false;
        }

        return $mydata;


    }

    // alert module deletion function
    public function delete_alert_record($alert_id){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('alert_settings');
        $query->set('alert_status',1);
        $query->where('alert_id ',$alert_id);
        if ($query->update()) {
            return true;
        }else{
            return false;
        }
    }
}

?>