<?php 

namespace App\Models;
use CodeIgniter\Model;

class UserLogin extends Model{


    // encryption function for login password temporary hide for strategy
    // public function encrypt_pass($data){
    //     $key = "smartories2345678909yhtgf";
    //     $pwd = $data;
    //     $login_password_encrypt = hash_hmac("sha256", $pwd, $key);
    //     //$pwd_hashed = password_hash($login_password_encrypt, PASSWORD_ARGON2ID);

    //     return $login_password_encrypt;
    // }
    
    public function verifyUser($user)
    {
        $db = \Config\Database::connect('another_db');
        $query = $db->table('user');
        $query->select('*');
        $query->where('status','1');
        $query->where('username', $user['username']);
        // $query->where('Password', $user['password']);
        // $query->where('IsPasswordChecked', 1);
        $res = $query->get()->getResultArray();
        if ($res) {
            $user_id = $res[0]['user_id'];
            $site_id = $res[0]['site_id'];

            $build = $db->table('user_credintials');
            $build->select('user_id,password');
            //$build->where('password',$user['password']);
            $build->where('user_id',$user_id);

            $output = $build->get()->getResultArray();
            $old_pass = $output[0]['password'];
            $type_pass = $user['password'];
            if (password_verify($type_pass,$old_pass)) {
                //foreach ($output as $row) {
                    $userid = $output[0]['user_id'];
                //}

                $build1 = $db->table('sites');
                $build1->select('*');
                $build1->where('site_id',$site_id); 
                $res1 = $build1->get()->getResultArray();

                $build2 = $db->table('location');
                $build2->select('*');
                $build2->where('location_id',$res1[0]['location_id']);

                $res3 = $build2->get()->getResultArray();

        
                $res_id_valid["users"] = $res;
                $res_id_valid["user_id"] = $userid;
                $res_id_valid['site_name'] = $res1[0]['site_name'];
                $res_id_valid['location'] = $res3[0]['location'];
                return $res_id_valid;
                
                //echo "valida";
            }else{
                return "Invalid_password";
            }
            
        }
        else{
            $mail_check = $db->table('user');
            $mail_check->select('*');
            $mail_check->where('username',$user['username']);
            $mail_out = $mail_check->get()->getResultArray();

            if($mail_out){
                return "ok";
            }

            return "new_user";
            
        }
       
    }
    public function accessControl($user){
        $db = \Config\Database::connect('another_db');
        $query = $db->table('user_access_control');
        $query->select('*');
        $query->where('user_id', $user);
        $res = $query->get()->getResultArray();
        return $res;
    }

    // forgot password
    public function checkIsPass($User){
        $db = \Config\Database::connect("another_db");
        // $query = $db->table('users_management');
        // // $builder->having('User_Name',  $User);
        // $query->select('*');
        // $query->where('User_Name',$User);
        // $res = $query->get()->getResultArray();
        // return $res;
        $builder = $db->table('user as user_ac');
        $builder->select('user_ac.*,user_pass.*');
        $builder->where('user_ac.username',$User);
        $builder->join('user_credintials as user_pass', 'user_pass.user_id = user_ac.user_id');
        $res = $builder->get()->getResultArray();

        return $res;
    }


    // check forgot mail function checkng
    public function check_mail_function($username){
        $db = \Config\Database::connect('another_db');

        $build = $db->table('user');
        $build->select('*');
        $build->where('username',$username);
        // $build->where('status',0);
        $res = $build->get()->getResultArray();
        if($res == true){
            $user_id = $res[0]['user_id'];
            $status = $res[0]['status'];
            if ($status == 0) {
                return "inactiveforgot";
            }else{
                $build1 = $db->table('user_credintials');
                $build1->select('password');
                $build1->where('user_id',$user_id);
                $output = $build1->get()->getResultArray();
                $pass_status = $output[0]['password'];
                if (trim($pass_status) == "") {
                    return "password";
                }else{
                    return "true";
                }
            }
        }else{
            return "false";
        }
    }
    
}



?>