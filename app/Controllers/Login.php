<?php 

namespace App\Controllers;
use App\Models\MainModel;
use App\Models\UserLogin;
use App\Models\User_Model;

class Login extends BaseController
{
	protected $session;
	function __construct(){
       	//$data;
        $this->datas = new MainModel();
        $this->datasLog = new UserLogin();
        //$session = \Config\Services::session();
        $this->session = \Config\Services::session();
        $this->session->start();
    }       
    public function index(){
    	return view('User_Login',[
            'inactive' => ""
        ]);
    }
	public function createPassword($user_Name){
		$this->session->set('forgot_user_name', $user_Name);

		$checkIsPass = $this->datasLog->checkIsPass($user_Name);
		$val =  $checkIsPass[0]['password'];
        $this->session->set("forgot_user_id",$checkIsPass[0]['user_id']);
        // print_r($val);
        if ($val == "") {
        	return view('Create_Password');
        }
        else{
        	echo "Session Expired!!";
        	
        }
    }
    public function updatePassword(){
    	//$data =  "Mani";
    	//return view('user_login');
    	//return view('Create_Password');
    }
    public function creation_password(){
    	// if ($_POST['submit']) {
    		//$userName = $this->data;
            $md_con = new User_Model();
    		$userName = $this->session->get('forgot_user_name');
            $userid = $this->session->get('forgot_user_id');
            if ($userid!="") {
                $pass = $this->password_encrypt($this->request->getvar('confirmPassword'));
                // echo $userid;
                // print_r($userid);
                $up = $md_con->updatePass($userName,$pass,$userid);
                // print_r($up);
                if($up){
                    // print_r($up);
                    return view('User_Login',[
                        'inactive' => " "
                    ]);
                } 
            }else{
                echo "Session Expired!";
            }
		   
		// }
    }


    // password encryption function 
    public function password_encrypt($data){
        $pwd_hashed = password_hash($data, PASSWORD_DEFAULT);
        // $pass = urlencode($data);
        // $pass_crypt = crypt($pass);

        return $pwd_hashed;
    }

    public function verifyUser(){
    	helper(['form']);
        if($_POST['Login_Verify'] ){
        	$rules = [
                'username' => 'required',
                'userpassword' => 'required|min_length[5]',
            ];
            $errors = [
                'username' => [
                    'required' => '* Required field'
                ],
                'userpassword' =>[
                    'required' => '* Required field',
                    'min_length' => '* Password must be atleast 5 chars long',
                ]
            ];
            if ($this->validate($rules,$errors)) {
            	$verify['username'] = $this->request->getVar('username');
                $verify['password']= $this->request->getVar('userpassword');
                $verifyUser = $this->datasLog->verifyUser($verify);
                
                
                // echo "<pre>";
                // print_r($verifyUser);
                // echo "</pre>";
                if (!empty($verifyUser)) {
                    if($verifyUser == "ok"){
                        return view('User_Login', [
                            'inactive' => "inactive_user"
                        ]);
                    }elseif ($verifyUser == "Invalid_password") {
                            return view('User_Login',[
                                'inactive' => "Invalid_password"
                            ]);
                    }elseif ($verifyUser == "new_user") {
                            return view('User_Login',[
                                'inactive' => "new_user"
                            ]);
                    }else{
                        $this->session->set('user_name', $verifyUser["user_id"]);
                        $this->session->set('site_name',$verifyUser['site_name']);
                        $access = $this->datasLog->accessControl($this->session->get('user_name'));
                        $this->session->set('access_control', $access);
                        $this->session->set('user_details', $verifyUser['users']);
                        $this->session->set('location',$verifyUser['location']);
                        //    echo "<pre>";
                        // print_r($this->session->get('access_control'));
                        //    echo "</pre>";
                        return redirect()->to('Home/dashboard///');
                    }
                }
                else{
                	echo "User Not Exist!";
                }
                
            }
            else{
            	return view('User_Login', [
                	'validation' => $this->validator,
                    'inactive' => " "
            	]);
            }
        }
        // $this->session->get('name');
    }
    // after click link call the forgot password function  ,$current_date
    public function forgot_password($username,$current_date){
       // echo $current_date;
       date_default_timezone_set('Asia/Kolkata');
        $time_date_split = explode(" ",$current_date);
        $current_date_check = date('d-m-Y');
        // echo "current_date".$current_date_check."time date";
        // print_r($time_date_split);
        if (strcmp($current_date_check,$time_date_split[0]) ) {
            echo "Session Expired";
        }else{
            $time_out = explode(":",$time_date_split[1]);
            date_default_timezone_set('Asia/Kolkata');
            $current_hour =  date("h:i", time());
            $count_min = explode(':',$current_hour);
            $count = (int)$count_min[0]*60;
            $count = (int)$count + $count_min[1];
            $old_count = (int)$time_out[0]*60;
            $old_count = (int)$old_count + (int)$time_out[1];
            $old_count = (int)$old_count + 5;
            if ($count < $old_count) {
                // echo $old_count."old count";
                // echo "<br>";
                // echo $count."new count";
                $checkIsPass = $this->datasLog->checkIsPass($username);
                $this->session->set("forgot_user_name",$username);
                // echo "session".$username;
                $this->session->set("forgot_user_id",$checkIsPass[0]['user_id']);
                return view('Create_Password');
            }else{
                // echo $old_count."old count";
                // echo $count."count";
                // print_r($time_out);
                echo  "Session Expired!! The Link Active In 5Mins";
            }
           
        }
       
    }

    // forgot password
    public function forgot_password_link(){
        if ($this->request->isAJAX()) {
            $username = $this->request->getvar('username');
            $check_mail = $this->datasLog->check_mail_function($username);
            if ($check_mail == "true") {
                $output = $this->send_forgot_mail($username);
                return "output";
            }else if($check_mail == "inactiveforgot"){
                return "inactiveforgot";
            }else if ($check_mail == "password"){
                $output = $this->send_forgot_mail($username);
                return "password";
            }
            else{
                return "false";
            }
            // return $check_mail;
        }
    }
// forgot mail sending funciton
    public function send_forgot_mail($username){
        date_default_timezone_set('Asia/Kolkata');
        $timestamp =  date("d-m-Y h:i:s", time());
        //print $timestamp ;

        $to = ''.$username.'';

        $sub = 'Forgot your  Password';
        $imgname = base_url()."/assets/img/email_smartmach_new_logo.png";
        $link_url = base_url().'/Login/forgot_password/'.$username.'/'.$timestamp;
        // $imgname = "https://drive.google.com/file/d/1onMA99WKtmtnI1Nlh2juurgYsVI9u9HX/view?usp=sharing";
        $img_name2 = base_url()."/assets/img/email_smartories_logo.png";
        $message = "<div style='font-family:'Helvetica',sans-serif;src:('https://fonts.cdnfonts.com/css/helvetica-255');display: flex; flex-direction: column; margin: 50px; align-items: center;>
            <div style='display:flex; width: 500px; height: 150px; background-color: #004591; padding: 20px; vertical-align: middle; align-items: center;margin:auto;'>
                <img src='".$imgname."' alt='SmartMach Logo' style='width: 40%; vertical-align: middle; margin-left: auto; margin-right: auto;height:fit-content;margin:auto;'>
            </div>
            <div style=''>
                <div style='margin-top: 20px; margin-bottom: 20px; margin-block-end:auto;text-align:center; font-size: 1.4rem; font-weight: bold; color: #434C5D; align-items: center;'>
                   Forgot your password?
                </div>
                <div style='font-size: 0.9rem; color: #434C5D; align-items:center; margin:auto;text-align:center'>
                    That`s okay , it happens! Click on the button below to reset your password.
                </div>
                <div style='display:flex;justify-content:center;'>
                <a href='".$link_url."' target='_blank' style='background-color: #2563EB;margin:auto; font-size: 0.9rem; color: #fff; padding: 15px 40px; border-radius: 3px; margin-top: 40px; margin-bottom: 40px; text-decoration: none;'>
                    RESET YOUR PASSWORD 
                </a>
                </div>
                <div style='font-size: 0.75rem; color: #7F7F7F; align-items: center; text-align:center; margin-top:20px;'>
                    This is an auto generated message. Please do not reply to this email.
                </div>
                <div style='display: flex; vertical-align: middle; margin-top: 5px; margin:auto;'>
                    <div style='font-size: 0.75rem; color: #7F7F7F; align-items: center; vertical-align: middle;margin:auto;'>
                        Powered by <img src='".$img_name2."' alt='Smartories logo' height='40px' style='vertical-align: middle;margin:auto;'>
                    </div>
                </div>             
            </div>         
            </div>";
        $email = \Config\Services::email();

        // temporary hide this condition
        // $sub = 'Reset Password';
        // $message = 'Forgot Password Link:  &nbsp; <a href="'.base_url().'/Login/forgot_password/'.$username.'/'.$timestamp.'" user_name="'.$username.'" user_id="'.$username.'">Forgot Password</a>
        //             <br><b>Thank You!</b>';
        // $email = \Config\Services::email();

        $email->setTo($to);
        $email->setFrom('Smartories.in');
        $email->setSubject($sub);
        $email->setMessage($message);
        if($email->send()){
            return true;
        }
        else{
            return false;
        }
    }
}








?>