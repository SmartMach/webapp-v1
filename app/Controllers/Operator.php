<?php 

namespace App\Controllers;
use \Codeigniter\Controller;
use App\Models\Operator_model;

class Operator extends \CodeIgniter\Controller{
    protected $opertor_model;
    protected $session;
    public function __construct(){
        helper("form");
        $this->opertor_model = new Operator_model();
        $this->session = \Config\Services::session();
    }

    public function index(){
        //$opertor_model = new Operator_model();
        $data = [];
        $rules = [
            'UserName' => 'required',
            'UserPassword' => 'required',
        ];
        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                // echo "validation ok";
                $username = $this->request->getVar("op_username");
                $pass = $this->request->getVar("op_pass");
                // $res = $this->opertor_model->login($username,$pass);
                // if ($res == true) {
                //     $session = \Config\Services::session();
                //     $site_id =  $session->get('oui_site_id');
                //     $output = $this->opertor_model->getmachine_part($site_id);
                //     if ($output == true) {
                //         return view('Operator/operator_view'); 
                //     }
                // }
                // else{
                //     echo "login failed";
                // }
                echo "<pre>";
                echo $username;
                echo $pass;
                
            }else{
                $data['validation'] = $this->validator;
            }
        }
        
       // echo "welcome to all";
        echo view('Operator/operator_login',$data);


    //    echo view('Operator/operator_view'); 
    }
    public function operator(){
        echo view('Operator/operator_view'); 
    }

    // login function
    public function verify_login(){
        $data = [];
        $rules = [
            'op_username' => 'required',
            'op_pass' => 'required',
        ];
        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                // echo "validation ok";
                $username = $this->request->getVar("op_username");
                $pass = $this->request->getVar("op_pass");
                $res = $this->opertor_model->login($username,$pass);
                if ($res == "password_matched") {
                    return view('Operator/operator_view'); 
                }
                elseif ($res == "password_mismatched") {
                    $data['result'] = "password_mismatched";
                    return view("Operator/operator_login",["result"=>"password_mismatched"]);
                }elseif ($res == "inactive_user") {
                    return view("Operator/operator_login",["result"=>"inactive_user"]);
                }

                else{
                    $data['result'] = "new_user";

                    return view("Operator/operator_login",["result"=>"new_user"]);
                }
               
            }else{
                $data['validation'] = $this->validator;
                $data['result'] = "validation";
                return view("Operator/operator_login",["result"=>"validation"]);
            }
        }else{
            $data['result'] = "post_method";
            return view("Operator/operator_login",["result"=>"method_error"]);
        }
    }


    public function header_live_records(){
        if ($this->request->isAJAX()) {
            $res = $this->opertor_model->getmachine_data();
            $shift_record = $this->opertor_model->getshift_live();
            $shift_res = $this->opertor_model->getShiftExact($shift_record[0]['shift_date']." 23:59:59");
            foreach ($shift_res['shift'] as $key => $value) {
                if (str_split($value['shifts'])[0] == $shift_record[0]['shift_id']) {
                    $shift_record[0]['start_time'] = $value['start_time'];
                    $shift_record[0]['end_time'] = $value['end_time'];
                }
            }

            $final_res['machine'] = $res;
            $final_res['shift'] = $shift_record;

            echo json_encode($final_res);
        }
    }

}


?>