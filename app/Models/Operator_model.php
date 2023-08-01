<?php 

namespace App\Models;
use CodeIgniter\Model;

class Operator_model extends Model{
    protected $db;
    protected $session;
    protected $site_creation;
    function __construct(){
        $this->db      = \Config\Database::connect("another_db");
       $this->session = \Config\Services::session();

       $db_name = $this->session->get('active_site');

        $this->site_creation = [
                    'DSN'      => '',
                    'hostname' => 'localhost',
                    'username' => 'root',
                    'password' => 'quantanics123',
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
    public function login($username,$pass){
        // $dmeo =  "username".$username."password:".$pass;

        // return $dmeo;
        
        $builder = $this->db->table('user as u');
        $builder->select('u.*,p.*');
        $builder->join('user_credintials as p','u.user_id=p.user_id');
        $builder->where('u.username', $username);

        // $builder->where('Password', $pass);
        $query = $builder->get()->getResultArray();
        if (count($query)>0) {
            $existing_pass = $query[0]['password'];
            if ($query[0]['status']==1) {
                if (password_verify($pass,$existing_pass)) {
                    $this->session->set('op_id', $query[0]['user_id']);
                    $this->session->set('op_user_name', $query[0]["username"]);
                    $this->session->set('active_site',$query[0]['site_id']);
                    return "password_matched";
                }else{
                    return "password_mismatched";
                }
            }else{
                return "inactive_user";
            }
        }else{
            return "New_User";
        }
       

    }

    public function getmachine_part($site_id){
        $builder = $this->db->table('settings_site_machine');
        $builder->select('Machine_Id');
        $builder->where('Site_ID', $site_id);
        $query = $builder->get()->getResult();

        foreach($query as $row){
            $machine_id = $row->Machine_Id;
        }

        $this->session->set('machine_id',$machine_id);

        $build = $this->db->table('settings_site_part');
        $build->select('Part_Id,Part_Name');
        $build->where('Machine_Id',$machine_id);
        $output = $build->get()->getResult();

        foreach($output as $data){
            $part_id = $data->Part_Id;
            $part_name = $data->Part_Name;
        }
        $this->session->set('part_id',$part_id);
        $this->session->set('part_name',$part_name);

        return $output;
        
    }

    // get dropdown machine data
    public function getmachine_data(){
        $db = \Config\Database::connect($this->site_creation);
        $builder = $db->table('settings_machine_current');
        $builder->select('*');
        $res = $builder->get()->getResultArray();
        return $res;
    }

    public function getProductionDetails($production_event_id){
        $db = \Config\Database::connect($this->site_creation);
        $builder = $db->table('pdm_production_info');
        $builder->select('machine_id,part_id,production,correction_min_counts,corrections,rejection_max_counts,rejections,correction_notes');
        $builder->where('production_event_id',$production_event_id);
        $res = $builder->get()->getResultArray();

        $builder = $db->table('settings_quality_reasons');
        $builder->select('quality_reason_id,quality_reason_name');
        $res[0]['reasons'] = $builder->get()->getResultArray();
        return $res;
    }

    // get live shift 
    public function  getshift_live(){
        $db = \Config\Database::connect($this->site_creation);
	    $query = $db->table('pdm_production_info');
	    $query->select('shift_date,shift_id');
        $query->orderby('shift_date','desc');
        $query->orderby('shift_id','desc');
        $query->limit(1);
	    $res = $query->get()->getResultArray();

        return $res;
    }

    // get exact shift 
    public function getShiftExact($date){
        $db = \Config\Database::connect($this->site_creation);
        $build = $db->table('settings_shift_management');
        $build->select('*');
        $build->where('last_updated_on <=', $date);
        $build->orderBy('last_updated_on', 'DESC');
        $build->limit(1);
        $res = $build->get()->getResultArray();
        $output['duration'] = $res;
        if (!empty($res)) {
            $shift_id = $res[0]['shift_log_id'];
            // $builder = $db->table($shift_id);
            $temp =explode("f", $shift_id);

            $sql = "SELECT * FROM `settings_shift_table` WHERE `shifts` REGEXP '$temp[1]$'";
            $builder = $db->query($sql);
            $output['shift'] = $builder->getResultArray();
            return $output;
        }else{
            return false;
        }
    }

    public function settings_machine()
    {
        $db = \Config\Database::connect($this->site_creation);
        $query = $db->table('settings_machine_current');
        $query->select('*');
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function getLiveDowntime($machine,$shift,$shift_date)
    {
        $db = \Config\Database::connect($this->site_creation);
        $query = $db->table('pdm_events');
        $query->select('duration');
        $query->where('machine_id',$machine);
        $query->where('shift_id',$shift);
        $query->where('shift_date',$shift_date);
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function getLiveRejectCount($machine,$shift,$shift_date)
    {
        $db = \Config\Database::connect($this->site_creation);
        $query = $db->table('pdm_production_info');
        $query->select('SUM(rejections) as rejections');
        $query->where('machine_id',$machine);
        $query->where('shift_id',$shift);
        $query->where('shift_date',$shift_date);
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function getPartCycleTime($machine)
    {
        $db = \Config\Database::connect($this->site_creation);
        $query = $db->table('pdm_tool_changeover');
        $query->select('*');
        $query->where('machine_id',$machine);
        $query->orderBy('shift_date','DESC');
        $query->orderBy('calendar_date','DESC');
        $query->orderBy('event_start_time','DESC');
        $query->orderBy('last_updated_on','DESC');
        $query->limit(1);
        $res = $query->get()->getResultArray();

        $db = \Config\Database::connect($this->site_creation);
        $query = $db->table('tool_changeover as p');
        $query->select('p.part_id,r.NICT,r.part_name');
        $query->where('p.id',$res[0]['tool_changeover_id']);
        $query->limit(1);
        $query->join('settings_part_current as r', 'r.part_id = p.part_id');
        $result = $query->get()->getResultArray();
        return $result;
    }

    public function retirve_production_hours($machine,$shift,$shift_date,$part_id)
    {
        $db = \Config\Database::connect($this->site_creation);
        $query = $db->table('pdm_production_info');
        $query->select('production_event_id,start_time,end_time');
        $query->where('machine_id',$machine);
        $query->where('shift_id',$shift);
        $query->where('shift_date',$shift_date);
        $query->where('part_id',$part_id);
        $res = $query->get()->getResultArray();
        return $res;
    }
    
    public function getLiveProduction($machine,$shift,$shift_date)
    {
        $db = \Config\Database::connect($this->site_creation);
        $query = $db->table('pdm_production_info');
        $query->select('SUM(production) as production');
        $query->where('machine_id',$machine);
        $query->where('shift_id',$shift);
        $query->where('shift_date',$shift_date);
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function updateCorrectionData($arr){
        $db = \Config\Database::connect($this->site_creation);
        $con = $db->table('pdm_production_info');
        $con->set('corrections',$arr['correction_count']);
        $con->set('correction_notes',$arr['correction_notes']);
        $con->set('rejection_max_counts',$arr['max_reject']);

        $con->where('production_event_id', $arr['production_id']);
        if ($con->update()) {
            return true;
        }else{
            return false;
        }
    }

    public function updateRejectionData($arr){
        $db = \Config\Database::connect($this->site_creation);
        $con = $db->table('pdm_production_info');
        $con->set('rejections',$arr['rejection']);
        $con->set('correction_min_counts',$arr['min_count']);

        $con->where('production_event_id', $arr['production_id']);
        if ($con->update()) {
            return true;
        }else{
            return false;
        }
    }

    public function  reject_dropdown(){
        $db = \Config\Database::connect($this->site_creation);
        $builder = $db->table('settings_quality_reasons');
        $builder->select('*');
        $builder->where('Status !=',0);
        $query   = $builder->get()->getResultArray();

        return $query;
    }
}




?>