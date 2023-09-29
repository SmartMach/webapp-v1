<?php 

namespace App\Controllers;
use \Codeigniter\Controller;
use App\Models\Operator_model;
use App\Models\Current_Shift_Performance_Model;

class Operator extends \CodeIgniter\Controller{
    protected $opertor_model;
    protected $session;
    public function __construct(){
        helper("form");
        $this->opertor_model = new Operator_model();
        $this->session = \Config\Services::session();
        $this->datas = new Current_Shift_Performance_Model();
    }

    public function index(){
        //$opertor_model = new Operator_model();
        // $data = [];
        // $rules = [
        //     'UserName' => 'required',
        //     'UserPassword' => 'required',
        // ];
        // if ($this->request->getMethod() == 'post') {
        //     if ($this->validate($rules)) {
        //         // echo "validation ok";
        //         $username = $this->request->getVar("op_username");
        //         $pass = $this->request->getVar("op_pass");
        //         // $res = $this->opertor_model->login($username,$pass);
        //         // if ($res == true) {
        //         //     $session = \Config\Services::session();
        //         //     $site_id =  $session->get('oui_site_id');
        //         //     $output = $this->opertor_model->getmachine_part($site_id);
        //         //     if ($output == true) {
        //         //         return view('Operator/operator_view'); 
        //         //     }
        //         // }
        //         // else{
        //         //     echo "login failed";
        //         // }
        //         echo "<pre>";
        //         echo $username;
        //         echo $pass;
                
        //     }else{
        //         $data['validation'] = $this->validator;
        //     }
        // }else{

        // }
        
       // echo "welcome to all";
        echo view('Operator/operator_login',["result"=>""]);


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

    //Retrive machine list for downtime graph...
    public function retirve_machine_data(){
        if ($this->request->isAJAX()) {
           $res = $this->opertor_model->settings_machine();
           echo json_encode($res);
        }
    }

    public function getLive(){
        $shift_detailes =  $this->datas->getShiftLive();
        $shift = $this->datas->getShiftExact($shift_detailes[0]['shift_date']." 23:59:59");

        foreach ($shift['shift'] as $key => $value) {
            if (str_split($value['shifts'])[0] == $shift_detailes[0]['shift_id']) {
                $shift_detailes[0]['start_time'] = $value['start_time'];
                $shift_detailes[0]['end_time'] = $value['end_time'];
            }
        }
        return json_encode($shift_detailes);
    }

    public function getLiveDowntime(){
        $machine =  $this->request->getVar('machine_ref');
        $shift =  $this->request->getVar('shift_ref');
        $shift_date =  $this->request->getVar('shift_date_ref');

        // $machine="MC1001";
        // $shift="A";
        // $shift_date="2023-09-29";

        $res = $this->opertor_model->getLiveDowntime($machine,$shift,$shift_date);

        // echo "<pre>";
        // print_r($res);
        
        $min=0;
        $hour=0;
        $sec=0;
        foreach ($res as $key => $value) {
            $temp = explode(".", $value['duration']);
            if (sizeof($temp) > 1) {
                $min=(int)$min+(int)$temp[0];
                $sec=(int)$sec+(int)$temp[1];
            }else{
                $min=(int)$min+(int)$temp[0];
            }
        }
        $min = (int)$min + (int)($sec/60);
        $sec = (int)($sec%60);
        $hour = (int)$hour + (int)($min/60);
        $min = (int)($min%60);
        
        $result['h']= $hour;
        $result['m']= $min;
        $result['s']= $sec;

        return json_encode($result);
        // echo "<pre>";
        // print_r($result);
    }

    public function getPartCycleTime(){
        $machine =  $this->request->getVar('machine_ref');
        $res = $this->opertor_model->getPartCycleTime($machine);
        return json_encode($res);
    }

    public function updateCorrectionData()
    {
        $arr['correction_count'] =  $this->request->getVar('correction_count');
        $arr['correction_notes'] =  $this->request->getVar('correction_notes');
        $arr['max_reject'] =  $this->request->getVar('max_reject');
        $arr['production_id'] =  $this->request->getVar('production_id');

        $res = $this->opertor_model->updateCorrectionData($arr);

        return json_encode($res);
    }

    public function updateRejectionData()
    {
        $arr['rejection'] =  $this->request->getVar('rejection_count');
        $arr['min_count'] =  $this->request->getVar('min_count');
        $arr['production_id'] =  $this->request->getVar('production_id');

        $res = $this->opertor_model->updateRejectionData($arr);

        return json_encode($res);
    }

    public function Reject_retrive(){
        if ($this->request->isAJAX()) {
            $output =  $this->opertor_model->reject_dropdown();
            echo json_encode($output);
        } 
    }
    public function retirve_production_hours(){
        $machine =  $this->request->getVar('machine_id');
        $shift =  $this->request->getVar('shift');
        $shift_date =  $this->request->getVar('shift_date');
        $part_id =  $this->request->getVar('part_id');

        // $machine =  "MC1001";
        // $shift =  "A";
        // $shift_date =  "2023-04-20";
        // $part_id =  "PT1011";

        $res = $this->opertor_model->retirve_production_hours($machine,$shift,$shift_date,$part_id);
        return json_encode($res);
    }
    
    public function getProductionDetails(){
        $production_event_id =  $this->request->getVar('production_id');
        // $production_event_id =  "PE16562";
        $res = $this->opertor_model->getProductionDetails($production_event_id);
        return json_encode($res);
    }

    public function getLiveRejectCount(){
        $machine =  $this->request->getVar('machine_ref');
        $shift =  $this->request->getVar('shift_ref');
        $shift_date =  $this->request->getVar('shift_date_ref');

        $res = $this->opertor_model->getLiveRejectCount($machine,$shift,$shift_date);
        return json_encode($res);
    }

    public function getLiveProduction(){
        $machine =  $this->request->getVar('machine_id_ref');
        $shift =  $this->request->getVar('shift_id_ref');
        $shift_date =  $this->request->getVar('shift_date_ref');

        // $machine =  "MC1001";
        // $shift =  "A";
        // $shift_date =  "2023-09-29";

        $production_target_all = $this->opertor_model->getProductionTarget($shift_date,$machine);

        $cycle_time = $production_target_all[0]->NICT;
        $production_target = $production_target_all[0]->target;
        $production_t = $this->opertor_model->getProductionData();
        $getInactiveMachine = $this->datas->getInactiveMachineData();
        $total_parts_production = 0;
        foreach ($production_target_all as $key => $v) {
            $production_t_tmp=0;
            foreach ($production_t as $k => $p) {
                if ($p['machine_id'] == $v->machine_id) {
                    // Filter for Production Info Table Data..........
                    $s_time_range =  strtotime($p['calendar_date']." ".$p['start_time']);
                    $s_time_range_limit = strtotime($v->calendar_date." ".$v->event_start_time);
                    $tm = 0;
            
                    if ($s_time_range < $s_time_range_limit) {
                        $tm = 1;
                    }

                    // For remove the current data of inactive machines.........
                    foreach ($getInactiveMachine as $value) {
                        $start_time_range =  strtotime($value['max(r.last_updated_on)']);
                        if ($s_time_range_limit > $start_time_range && $value['machine_id'] == $p['machine_id']){
                            $tm = 1;
                        }
                    }
                    $production_t_tmp= (int)$production_t_tmp + (int)$p['production']  + (int)($p['corrections']);
                }
            }

            $total_parts_production = $production_t_tmp;
        }

        $remaining_part = $production_target - $total_parts_production;
        $duration = $remaining_part*$cycle_time;
        // convert to minutes
        $remaining_duration = (int)($duration/60);

        $result['target'] = $production_target;
        $result['production_count'] = $total_parts_production;
        $result['remaining_part'] = $remaining_part;
        $result['cycle_time'] = $cycle_time;
        $result['remaining_duration'] = $duration;
        $result['duration_min'] = $remaining_duration;

        return json_encode($result);
       
      
    }
}

?>