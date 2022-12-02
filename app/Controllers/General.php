<?php 

namespace App\Controllers;
use \Codeigniter\Controller;
use App\Models\Operator_model;

class General extends \CodeIgniter\Controller{
    protected $data;
    public function __construct(){
        $this->session = \Config\Services::session();
        //$this->session->remove('user_name');
        $this->data = array();
        $this->datas = new MainModel();
        
    }
     // current shift performance retrive data for general settings
     public function current_shift_retrive(){
        
        //echo json_encode('demo');
        if ($this->request->isAJAX()) {
            //echo json_encode("ok");
            $username =  $this->session->get('user_name');
            //echo $username;
            $res  = $this->datas->current_shift_retrive_data($username);
            //echo "ok ajax";
        //echo $res;
        return  json_encode($res);
        //    foreach($res as $data){
        //        echo $data->green;
        //    }
        }else{
            echo "something missing";
        }
    }
    // current shift performance retrive 

    // work shift management retrive ajax data function start
    public function getShiftData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getShiftData();
            echo json_encode($output);
        }
    }
    // work shift management retrive ajax data end


    // financial metrics edit ajax function start
    public function editGFMData(){
        if($this->request->isAJAX()){
            //$update['R_NO']= $req[0]['R_NO'];
            $update['Overall_TEEP_Target']= $this->request->getVar('EOTEEP');
            $update['Overall_OOE_Target']= $this->request->getVar('EOOOE');
            $update['Overall_OEE_Target']= $this->request->getVar('EOOEE');
            $update['Availability_Target']= $this->request->getVar('EAvailability');
            $update['Performance_Target']= $this->request->getVar('EPerformance');
            $update['Quality_Target']= $this->request->getVar('EQuality');
            $update['OEE_Target']= $this->request->getVar('EOEE');
            $update['Last_Modified_By']= "Mani";
            $output = $this->datas->editGFMData($update);
            echo json_encode($output);
        }
    }
    // financial metrics edit ajax function end


    // Downtime threshold edit ajax function
    public function editDTData(){
        if($this->request->isAJAX()){
            //$update['R_NO']= $req[0]['R_NO'];
            $update['Downtime_Threshold']= $this->request->getVar('DT');
            $update['Last_Modified_By']= "Mani";
            $output = $this->datas->editDTData($update);
            echo json_encode($output);
        }
    }
    // Downtime  threshold  edit ajax function end 

    // retrive downtime reasons
    public function getDownReason(){
        if($this->request->isAJAX()){
            $output = $this->datas->getDownReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }
    // retrive downtime reasons end

    // deactivate downtime reasons start
    public function deleteDownReason(){
        if($this->request->isAJAX()){
            $output = $this->datas->deleteDownReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }
    // deactivate downtime reasons end

    // retrive quality reasons start
    public function getQualiyReason(){
        if($this->request->isAJAX()){
            $output = $this->datas->getQualiyReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }
    // retrive quality reasons end

    // deactivate quality reasons
    public function deleteQualityReason(){
        if($this->request->isAJAX()){
            $output = $this->request->getVar('Record_No');
            $output = $this->datas->deleteQualityReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }
    // deactivate quality reasons

    // current shift performance update  function start
    public function current_shift_performance(){
        //$session = \Config\Services::session($config);
        if ($this->request->isAJAX()) {
            $update['green'] = $this->request->getVar("green");
            $update['yellow'] = $this->request->getVar("yellow");
            $update['target'] = $this->request->getVar("target");
            $update['username'] = $this->session->get('user_name');
            $res = $this->datas->current_shift_performance_model($update);
            echo $res;

        }
        else{
            echo "error for data";
        }
    }
    // current shift performance update function end


    // work shift ajax modal function for update shift
    public function updateShift(){
        if($this->request->isAJAX()){
            $update['Start_Time'] = $this->request->getVar('staringTime');
            $update['Number_Of_Hours'] = $this->request->getVar('hours');
            $update['Last_Updated_By'] = "Manikandan";
            $output = $this->datas->updateShift($update);
            echo json_encode($output);
        }
    }
    // work shift ajax modal function for update shift function end

}



?>