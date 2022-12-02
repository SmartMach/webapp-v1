<?php 

namespace App\Models;
use CodeIgniter\Model;

class Operator_model extends Model{
    protected $db;
    protected $session;
    function __construct(){
        $this->db      = \Config\Database::connect();
       $this->session = \Config\Services::session();
    }
    public function login($username,$pass){
        // $dmeo =  "username".$username."password:".$pass;

        // return $dmeo;
        
        $builder = $this->db->table('users_operator');
        $builder->select('*');
        $builder->where('User_Name', $username);
        $builder->where('Password', $pass);
        $query = $builder->get()->getResult();
        foreach($query as $row){
            $site_id = $row->Site_ID;
        }
       
        $this->session->set('oui_site_id',$site_id);
        return $query;

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
}




?>