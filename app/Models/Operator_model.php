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
                    // 'hostname' => '165.22.208.52',
                    // 'username' => 'smartAd',
                    // 'password' => 'WaDl@#smat1!',
                    'hostname' => 'localhost',
                    'username' => 'root',
                    'password' => '',
                    
                    // 'database' => 'S1001',
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



}




?>