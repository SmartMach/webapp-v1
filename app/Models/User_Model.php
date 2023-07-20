<?php 



namespace App\Models;
use CodeIgniter\Model;

class User_Model extends Model{

		// existing user mail id check function

	public function checkUser($User){
        $db = \Config\Database::connect('another_db');
        $builder = $db->table('user');
        $builder->select('*');
        $builder->where('username',$User);

        $row = $builder->get()->getResult();
       if ($row == true) {
       		return true;
       }else{
       	return false;
       }
    }


       public function getSite($record){
        $db = \Config\Database::connect('another_db');
        $SFM = $db->table('sites');
        $SFM->select('*');
        $SFM->where('site_id', $record);
        $query = $SFM->get()->getResultArray();

        //$location_id = " ";
        // foreach ($query as $row) {
        	
        	$build = $db->table('location');
	        $build->select('*');
	        $build->where('location_id', $query[0]['location_id']);
	        $location_res = $build->get()->getResultArray();
        // }
       	
        

         $res['site'] = $query;
        $res['location'] = $location_res;
        //$res['location_id'] =;
        return $res;
    }

    // get siteName function
    public function getSiteName($user,$role){
        $db = \Config\Database::connect('another_db');
        if ($role == "Smart Users" ) {
            $builder1 = $db->table('sites');
            $builder1->select('site_id');
            $query1 =$builder1->select('site_name')->get()->getResultArray();
            return $query1;
        }
        else if($role == "Site Admin"){
            $builder = $db->table('user');
            $builder->select('*');
            $builder->where('user_id',$user);
            $builder->where('role',$role);
            $query =$builder->get()->getResultArray();

            // //selecte sites for
            // $build = $db->table('sites');
            // $build->select('site_id');
            // $build->select('site_name');
            // $res =$build->where('site_id',$query[0]['site_id'])->get()->getResultArray();
            // return $res;
            if ($query) {
                $builder2 = $db->table('sites');
                $builder2->select('site_id');
                $builder2->where('site_id',$query[0]['site_id']);
                $query2 =$builder2->select('site_name')->get()->getResultArray();
                return $query2; 
            }
            

        }
        else if($role == "Smart Admin"){
            $builder = $db->table('sites');
            $builder->select('site_id');
            $query =$builder->select('site_name')->get()->getResultArray();
            return $query;
        }
    }

    // get department function
    public function getdept(){
    	 $db = \Config\Database::connect('another_db');

    	 $builder = $db->table('departments');
    	  $builder->select('*');
    	  $res = $builder->get()->getResultArray();
    	  return $res;

    }

    // 
    public function userRecordCountOpr()
    {
        $op_name = "Operator";
        $db = \Config\Database::connect("another_db");
        //$sql = "SELECT COUNT(*) as Count FROM users_operator";
        $query = $db->table('user');
        $query->select('user_id');
        $query->where('role',$op_name);
        $res = $query->get()->getResultArray();
        $op_count =  count($res);

        return $op_count;
    }

    // 
    public function userRecordCountMngt()
    {
        $db = \Config\Database::connect('another_db');
        $query = $db->table('user');
        $query->selectCount('user_id');
        //$query->orderBy('created_on', 'desc');
        $res = $query->get()->getResultArray();

        // if ($res == true) {
            
        // }
        $overall_count = $res[0]['user_id'];

        $op_name = "Operator";
        $build = $db->table('user');
        $build->select('*');
        $build->where('role',$op_name);
        $res1 =  $build->get()->getResultArray();

        $op_count =  count($res1);

        $um_count = (int)$overall_count - (int)$op_count;

        return $um_count;
    }


    // 
    public function newUserAct($user,$user_credintials,$user_access){

        $db = \Config\Database::connect("another_db");
        /*
        if ($roles != 'Operator') {
            $builder = $db->table('user');
            $count = $builder->select('*')->where('username', $Data['User_Name'])->countAllResults();
            if ($count == 0) {
                if($builder->insert($Data)){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }
        else{
            $builder = $db->table('user');
            $count = $builder->select('*')->where('username', $Data['User_Name'])->countAllResults();
            if ($count == 0) {
                if($builder->insert($Data)){
                        return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }*/

        $build = $db->table('user');
        $build->select('*');
        $build->where('user_id',$user['user_id']);
        $res = $build->get()->getResultArray();

        if ($res) {
            return "already exists user id";
        }else{
            $build1 = $db->table('user');
            if ($build1->insert($user)) {
                $build2 = $db->table('user_access_control');
                if ($build2->insert($user_access)) {
                    $build3 = $db->table('user_credintials');
                    if ($build3->insert($user_credintials)) {
                        return true;
                    }
                    else{
                        return "User Credintials";
                    }
                }
                else{
                    return "User Access Control";
                }
           }else{
                return " User Does Not inserted";
           }
        }

    }

    /*
    public function getUserData($record)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->select('*');
        $builder->where('username', $record);
        $query = $builder->get()->getResultArray();
        return $query;
    }

    /*
    public function userRoleAdd($Data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('roles');
        if($builder->insert($Data)){
                return true;
        }
        else{
            return false;
        }
    }*/

/*
    public function getUpdateSiteData($data){
        $db = \Config\Database::connect();
        $builder = $db->table('sites');
        $builder->set('IsAdmin', 1);
        $builder->where('Site_ID', $data);
        if($builder->update()){
            return true;
        }
        else{
            return false;
        }
    }*/


    // check operator exists username
     public function checkOperator($role,$username){
        $db = \Config\Database::connect("another_db");
        $SFM = $db->table('user');
        $SFM->select('*');
        $SFM->where('role', $role);
        $SFM->where('username',$username);
        $query = $SFM->get()->getResultArray();

        if (count($query) > 0) {
            return true;
        }else{
            return false;
        }
       
    }

    // operator insert function
    public function new_operator_insert($user,$user_credintials){

        $db = \Config\Database::connect("another_db");
        $build = $db->table('user');
        $build->select('*');
        $build->where('user_id',$user['user_id']);
        $res = $build->get()->getResultArray();

         if ($res) {
            return "already exists user id";
        }else{
            //return "New Operator Insertion Ok";
            
            $build1 = $db->table('user');
             if ($build1->insert($user)) {
                $build2 = $db->table('user_credintials');
                if ($build2->insert($user_credintials)) {
                    return true;
                }else{
                    return "User Credintials Insertion Failed";
                }

             }else{
                return "User Insertion Failed";
             }

        }

    }


    // get site name records function
    public function getsit_name_user_record($site_id){
        
        $db = \Config\Database::connect("another_db");
        $build = $db->table('sites');
        $build->select('site_name');
        $build->where('site_id',$site_id);
        $res = $build->get()->getResultArray();
        $site_name  = $res[0]['site_name'];

        return $site_name;
    }


    // Retrive all user data
     public function getSiteUser($user){
        $db = \Config\Database::connect("another_db");
      
        $sa = "Smart Admin";
        $su = "Smart Users";
        $site_admin = "Site Admin";
        if ($user['site_id'] == "smartories") {
            if ($user['role'] == "Smart Admin") {
                $build = $db->table('user as u');
                $build->select('u.* , user_access.*');
                $build->where('role !=',$sa);
                $build->join('user_credintials as user_access','u.user_id = user_access.user_id');
                $build->orderBy('u.last_updated_on', 'DESC'); 
                $output = $build->get()->getResultArray();
                for($i=0;$i<sizeof($output);$i++){
                    $site_name = $this->getsit_name_user_record($output[$i]['site_id']);
                    $output[$i]['site_name'] = $site_name;
                }
                return $output;
            }else  {
                $build1 = $db->table('user as u');
                $build1->select('u.* , user_access.*');
                $build1->where('role !=',$su);
                $build1->where('role !=',$sa);
              // $build1->where('site_id',$site_id);
                $build1->join('user_credintials as user_access','u.user_id = user_access.user_id');
                $build1->orderBy('u.last_updated_on', 'DESC'); 
                $output1 = $build1->get()->getResultArray();
                
                for($i=0;$i<sizeof($output1);$i++){
                    $site_name = $this->getsit_name_user_record($output1[$i]['site_id']);
                    $output1[$i]['site_name'] = $site_name;
                }

                return $output1;
            } 
            
        }else{
            if($user['role'] == "Site Admin"){
                $builder12 = $db->table('user as u');
                $builder12->select('*');
                $builder12->where('role !=',$sa);
                $builder12->where('role !=',$site_admin);
                $builder12->where('role !=',$su);
                $builder12->where('site_id',$user['site_id']);
                $builder12->join('user_credintials as user_access','u.user_id = user_access.user_id');
                $builder12->orderBy('u.last_updated_on', 'DESC'); 
                $output12 = $builder12->get()->getResultArray();

                for($i=0;$i<sizeof($output12);$i++){
                    $site_name = $this->getsit_name_user_record($output12[$i]['site_id']);
                    $output12[$i]['site_name'] = $site_name;
                }
                return $output12;
            }
        }
    }

    // retrive particular user details for user account function

    public function getUserDataInfo($user){
        $db = \Config\Database::connect('another_db');

        // if ($role != "Operator") {
        //     $builder = $this->db->table("users_management as u");
        //     $builder->select('u.*, s.Site_ID,s.Site_Name,s.Site_Location');
        //     $builder->where('User_ID', $record);
        //     $builder->join('site as s', 'u.Site_ID = s.Site_ID');
        //     $data = $builder->get()->getResult();
        // }
        // else{
        //     $builder = $this->db->table("user  as u");
        //     $builder->select('u.*, s.Site_ID,s.Site_Name,s.Site_Location');
        //     $builder->where('User_ID', $record);
        //     $builder->join('site as s', 'u.Site_ID = s.Site_ID');
        //     $data = $builder->get()->getResult();
        // }
          
        //   return $data;

        // user details
        $build = $db->table('user');
        $build->select('*');
        $build->where('user_id',$user['user_id']);
        $build->where('site_id',$user['site_id']);
        $build->where('role',$user['role']);
        $res = $build->get()->getResultArray();

        $dept_id = $res[0]['department'];

        // sites
        $build1 = $db->table('sites');
        $build1->select('site_name,location_id');
        $build1->where('site_id',$user['site_id']);
        $res1 = $build1->get()->getResultArray();

        $location_id = $res1[0]['location_id'];


        // location
        $build2 = $db->table('location');
        $build2->select('location');
        $build2->where('location_id',$location_id);
        $res2 = $build2->get()->getResultArray();

        // department
        $build3 = $db->table('departments');
        $build3->select('department');
        $build3->where('dept_id',$dept_id);
        $res3 = $build3->get()->getResultArray();


        $output_data['location'] = $res2[0]['location'];
        $output_data['site_name'] = $res1[0]['site_name'];
        $output_data['user_data'] = $res;
        $output_data['department'] = $res3[0]['department'];
        $output_data['last_updated_by'] = $this->get_last_updated_username($res[0]['last_updated_by']);

        return $output_data;
    }

    // retrive user access control
     public function EditUserRoleMaster($record){
        $db = \Config\Database::connect("another_db");
        $SFM = $db->table('user_access_control');
        $SFM->select('*');
        $SFM->where('user_id', $record);
        $query = $SFM->get()->getResultArray();
        return $query;
    }

    // activate user
      public function deactivateUser($record)
    {
        
        $db = \Config\Database::connect("another_db");

        // if ($record['Role'] !="Operator") {
        //     $builder = $db->table('users_management');
        // }
        // else{
        //     $builder = $db->table('users_operator');
        // }

        $builder = $db->table('user');
    //    if you select site admin its totaly inactive and active the whole site users its afftect
        if ($record['Role'] == "Site Admin") {
            if ($record['Status'] == 0) {
                $builder->set('status', 1);
                $uData['Status'] = 1;
            }
            else{
                $builder->set('status', 0);
                $uData['Status'] = 0;
            }
            $builder->set('last_updated_by', $record['Last_Updated_By']);
            $builder->where('site_id=', $record['site_id']);
            if($builder->update()){
                return true;
            }
            else{
                return false;
            }

            
        }else{
            // if you not select site admin for particular user its affect
            if ($record['Status'] == 0) {
                $builder->set('status', 1);
                $uData['Status'] = 1;
            }
            else{
                $builder->set('status', 0);
                $uData['Status'] = 0;
            }
            $builder->set('last_updated_by', $record['Last_Updated_By']);
            $builder->where('user_id', $record['User_ID']);
            if($builder->update()){
                return true;
            }
            else{
                return false;
            }
        }

       
    }

   
    // update user data for management user
    public function updateUserData($Data){
       // return $roles;

        $db = \Config\Database::connect('another_db');
        if ($Data['Role'] != 'Operator') {
            $build = $db->table('user');
            if (!empty($Data['First_Name'])) {
                $build->set('first_name', $Data['First_Name']);
            }
            if (!empty($Data['Last_Name'])) {
                $build->set('last_name', $Data['Last_Name']);
            }
            if (!empty($Data['Contact_NO'])) {
                $build->set('phone', $Data['Contact_NO']);
            }
            if (!empty($Data['Designation'])) {
                $build->set('designation', $Data['Designation']);
            }
            if (!empty($Data['Department'])) {
                $build->set('department', $Data['Department']);
            }
            if (!empty($Data['Role'])) {
                $build->set('role', $Data['Role']);
            }
            // if (!empty($Data['Site_ID'])) {
            //     $build->set('Site_ID', $Data['Site_ID']);
            // }
            if (!empty($Data['Last_Updated_By'])) {
                $build->set('last_updated_by', $Data['Last_Updated_By']);
            }
             if (!empty($Data['Site_ID'])) {
                $build->set('site_id', $Data['Site_ID']);
            }
            $build->where('user_id', $Data['user_id']);
            $build->where('username', $Data['User_Name']);
           // $build->where('site_id',$Data['Site_ID']);

            if($build->update()){
                
                $builder = $db->table('user_access_control');
                $builder->set('site_id',$Data['Site_ID']);
                $builder->where('user_id',$Data['user_id']);
                if ($builder->update()) {
                    return true;
                }   
                //$build1->where('site_id',$roles['Site_ID']);
            }
            else{
                return "user details false";
            }
        }
     
    }

    // access control for user privillages
    public function update_access_controle($roles) {

        $db = \Config\Database::connect('another_db');
        $builder = $db->table('user_access_control');
        
        $update_data = [
            'oee_financial_drill_down' => $roles['Financial_Drill_Down'],
            'opportunity_insights' => $roles['Financial_Opportunity_Insights'],
            'oee_drill_down' => $roles['OEE_Drill_Down'],
            'operator_user_interface' => $roles['Operator_User_Interface'],
            'production_data_management' => $roles['Production_Data_Management'],
            'settings_machine' => $roles['Settings_Machine'],
            'settings_part' => $roles['Settings_Parts'],
            'settings_general' => $roles['Settings_General'],
            'settings_user_management' => $roles['Settings_User_Management'],

            'daily_production_data' => $roles['Daily_Production_Data'],
            'current_shift_performance' => $roles['Current_Shift_Performance'],
            'production_downtime' => $roles['Production_Downtime'],
            'production_quality' => $roles['Production_Quality'],
            'work_order_management' => $roles['Work_Order_Management'],
            'alert_management' => $roles['Alert_Management'],

            'last_updated_by' => $roles['Last_Updated_By'],
        ];

        $builder->where('user_id', $roles['user_id']);
        $builder->where('site_id', $roles['site_id']);
        if ($builder->update($update_data)) {
            return true;
        }else{
            return false;
        }
    }


    // operator update function modal
    public function update_operator($user){

         $db = \Config\Database::connect('another_db');
            $build = $db->table('user');
            if (!empty($user['User_First_Name'])) {
                $build->set('first_name', $user['User_First_Name']);
            }
            if (!empty($user['User_Last_Name'])) {
                $build->set('last_name', $user['User_Last_Name']);
            }
            if (!empty($user['User_Phone'])) {
                $build->set('phone', $user['User_Phone']);
            }
            if (!empty($user['User_Designation'])) {
                $build->set('designation', $user['User_Designation']);
            }
            if (!empty($user['User_Department'])) {
                $build->set('department', $user['User_Department']);
            }
            if (!empty($user['Role'])) {
                $build->set('role', $user['Role']);
            }
            // if (!empty($Data['Site_ID'])) {
            //     $build->set('Site_ID', $Data['Site_ID']);
            // }
            if (!empty($user['Updated_By'])) {
                $build->set('last_updated_by', $user['Updated_By']);
            }
             if (!empty($user['site_id'])) {
                $build->set('site_id', $user['site_id']);
            }
            $build->where('user_id', $user['user_id']);
            $build->where('username', $user['username']);
            //$build->where('site_id',$user['site_id']);

            if($build->update()){
                return true;
            }else{
                return false;
            }
    }


    // forgot password for siteadmin
    public function  forgot_site_admin_pass($user){
        $db = \Config\Database::connect("another_db");

        $build = $db->table('user_credintials');
        $build->set('password', $user['pass']);
        $build->set('last_updated_by',$user['updated_by']);
        $build->where('user_id', $user['user_id']);

        $res = $build->update();
        if ($res == true) {
            $msg = true;
        }
        else{
            $msg = false;
        }

        return $msg;
    }

// get last_updated by username

    public function get_last_updated_username($user_id){
       $db = \Config\Database::connect("another_db");

       $build = $db->table('user');
       $build->select('first_name , last_name');
       $build->where('user_id',$user_id);

       $res = $build->get()->getResultArray();

       return $res;
    }


// get site id for count
    public function getsite_count(){
        $db = \Config\Database::connect("another_db");

        $build = $db->table('sites');
        $build->select('*');
       // $build->where('user_id',$user_id);

       $res = $build->countAll();

       return $res;
    }

// get location count model function
    public function getlocation_count(){
         $db = \Config\Database::connect("another_db");

        $build = $db->table('location');
        $build->select('*');
       // $build->where('user_id',$user_id);

       $res = $build->countAll();

       return $res;
    }

    // insert site and location funciton

public function insert_site($site_base,$location_base){
    $db = \Config\Database::connect("another_db");  

    $build = $db->table('sites');
    
    if ($build->insert($site_base)) {
        $builder = $db->table('location');

        if ($builder->insert($location_base)) {
             $db1 = \Config\Database::connect("tester");
             $sql = "CREATE DATABASE ".$site_base['site_id']."";
             if ($db1->query($sql) == true) {
                $db_name = $site_base['site_id'];
               
                    $table_import = $this->import_db($db_name);
                    if ($table_import) {
                        return true;
                    }

                return false;
             }

           // return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

// after database creation importing tables for default tables
public function import_db($db_name){
  //  $session = \Config\Services::session();

     //$db_name = 'demo_db';
                 $site_creation = [
                    'DSN'      => '',
                    'hostname' => 'localhost',
                    'username' => 'root',
                    'password' => 'quantanics123',
                    //'database' => 'S10011',
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

                $db_import = \Config\Database::connect($site_creation);
                $file_name = './public/uploads/database/S10011_structure.sql';
                $temp_line = " ";
                $lines = file($file_name);
                foreach($lines as $line){
                    if (substr($line, 0,2) == '--' || $line == '')
                        continue; 
                        
                    $temp_line .= $line;
                    if (substr(trim($line), -1,1) == ';') {
                        if ($db_import->query($temp_line)) {
                            //echo "Insert <br>";
                        }else{
                            //echo "not";
                        }

                        $temp_line = '';
                    }
                    
                 
                }
                //echo "Tables Inserted";

                return true;
}

// user _ password creation function
public function updatePass($username,$pass,$userid)
{
    $db = \Config\Database::connect("another_db");
    $builder = $db->table('user');
    $builder->select('*');
    $builder->where('username',$username);
    $res = $builder->get()->getResultArray();

    // print_r($res);
    if($res){
        $build = $db->table('user_credintials');
        $build->set('password',$pass);
        $build->where('user_id',$userid);
        $out = $build->update();
        // print_r($out);
        // print_r($pass);
        // return $userid;
        if($out){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }

    // $builder->set('Password', $pass);
    // $builder->set('IsPasswordChecked', 1);
    // $builder->set('Status', 1);
    // $builder->where('User_Name', $uname);
    // if($builder->update()){
    //     return true;
    // }
    // else{
    //     return false;
    // }
}

// site based dropdwon function header navigation
public function site_based_dropdown($user,$role){
    $db = \Config\Database::connect('another_db');
    if (($role == "Smart Users") || ($role == "Smart Admin")) {
        $build = $db->table('sites');
        $build->select('*');
        $build->where('site_id !=','smartories');
        $res = $build->get()->getResultArray();
    
        return $res;  
    }
    
}

// production quality model function
public function getCreatedByDetails(){
    $db = \Config\Database::connect('another_db');
    $query = $db->table('user');
    $query->select('user_id,first_name');
    $res= $query->get()->getResultArray();
    return $res;
}

}



?>
