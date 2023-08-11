<?php

namespace App\Controllers;
use App\Models\MainModel;

class Home extends BaseController
{
    protected $data;
    function __construct(){
        //parent::__construct();
        $this->session = \Config\Services::session();
        //$this->session->remove('user_name');
        $this->data = array();
        $this->datas = new MainModel();
    } 
    public function index()
    {
        // if(!($this->session->get('user_name'))){
        //     return redirect()->to('Login');
        // }
        return redirect()->to('Home/load_option/Financial_FOeeDrillDown/FOeeDrillDown'); 
    }

    public function dashboard($select_opt=null,$select_sub_opt=null)
    {
        if(!($this->session->get('user_name'))){
            return redirect()->to('Login');
        }
        $this->data['user_name'] = $this->session->get('user_name');
        $this->data['access'] = $this->session->get('access_control');
        $this->data['user_details'] = $this->session->get('user_details');
        $this->data['site_name'] = $this->session->get('site_name');

        $this->session->set('site', $this->data['user_details'][0]['site_id']);

        //$this->data['user_details'] = $this->datas->getUserInfo($this->session->get('user_name'));
        // $this->data['settings_machine'] = $this->datas->settings_machine();
        // $this->data['settings_tools'] = $this->datas->settings_tools();
        $this->data['select_opt'] = $select_opt;
        $this->data['select_sub_opt'] = $select_sub_opt;



        // echo "<pre>";
        // print_r($this->data['user_details']);
        
        return view('Grafana_Home',$this->data);
    }

    public function load_option($select_opt=null,$select_sub_opt=null)
    {
        if($select_opt == null && $select_sub_opt==null)
        {
            return redirect()->to('Home/dashboard/'); 
        }
        elseif($select_opt != null && $select_sub_opt == null)
        {
            return redirect()->to('Home/dashboard/'.$select_opt.'/'); 
        }
        else
        {        
            return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
        }
    }

    public function getSiteName(){
        if($this->request->isAJAX()){
            $user = $this->request->getVar('UserNameRef');
            $role = $this->request->getVar('UserRoleRef');
            $output = $this->datas->getSiteName($user,$role);
            //echo ($output);
            echo json_encode($output);
        }
    }
    public function getBrandName(){
        if($this->request->isAJAX()){
            $output = $this->datas->getBrandName();
            echo json_encode($output);
        }
    }
    public function getUserName(){
        if($this->request->isAJAX()){
            $output = $this->datas->getUserName();
            echo json_encode($output);
        }
    }
    public function getMaterialName(){
        if($this->request->isAJAX()){
            $output = $this->datas->getMaterialName();
            echo json_encode($output);
        }
    }
    public function getSite(){
        if($this->request->isAJAX()){
            $output = $this->datas->getSite($this->request->getVar('Sname'));
            echo json_encode($output);
        }
    }
    public function getSite_Admin(){
        if($this->request->isAJAX()){
            $output = $this->datas->getSite_Admin($this->request->getVar('Sname'));
            echo json_encode($output);
        }
    }

    public function getFilterData(){
        if($this->request->isAjax()){
            $update['FromDate']= $this->request->getVar('FromDate');
            $update['ToDate']= $this->request->getVar('ToDate');
            $update['Site']= $this->request->getVar('Site');
            $update['Brand']= $this->request->getVar('Brand');
            $update['Status']= $this->request->getVar('Status');
            $update['LastUpdatedBy']= $this->request->getVar('LastUpdatedBy');
            $update['filterMachineRateHourOp']= $this->request->getVar('filterMachineRateHourOp');
            $update['filterMachineRateHourR']= $this->request->getVar('filterMachineRateHourR');
            $update['filterMachineOffRateOp']= $this->request->getVar('filterMachineOffRateOp');
            $update['filterMachineOffRateR']= $this->request->getVar('filterMachineOffRateR');
            $output = $this->datas->getFilterData($update);
            echo json_encode($output);
        }
    } 
    public function getFilterDataPart(){
        if($this->request->isAjax()){
            $update['FromDate']= $this->request->getVar('FromDate');
            $update['ToDate']= $this->request->getVar('ToDate');
            $update['FilterPartPriceR']= $this->request->getVar('FilterPartPriceR');
            $update['FilterPartPriceOp']= $this->request->getVar('FilterPartPriceOp');
            $update['FilterMaterialPriceR']= $this->request->getVar('FilterMaterialPriceR');
            $update['FilterMaterialPriceOp']= $this->request->getVar('FilterMaterialPriceOp');
            $update['Status']= $this->request->getVar('Status');
            $update['LastUpdatedBy']= $this->request->getVar('LastUpdatedBy');
            $update['FilterToolName']= $this->request->getVar('FilterToolName');
            $update['FilterNICTR']= $this->request->getVar('FilterNICTR');
            $update['FilterNICTS']= $this->request->getVar('FilterNICTS');
            $update['FilterMaterialName']= $this->request->getVar('FilterMaterialName');
            $output = $this->datas->getFilterDataPart($update);
            echo json_encode($output);
        }
    }

    public function getDownReason(){
        if($this->request->isAJAX()){
            $output = $this->datas->getDownReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }
 
    public function Updatedata(){
        if($this->request->isAJAX()){
           $update['Max_Reject'] =  $this->request->getVar('Max_Reject');
           $update['Total_Reject'] =  $this->request->getVar('Total_Reject');
           $update['Reject_Count'] =  $this->request->getVar('Reject_Count');
           $update['Total_Correction'] =  $this->request->getVar('Total_Correction');
           $update['Courrection_Count'] =  $this->request->getVar('Courrection_Count');
            $output = $this->datas->Updatedata($update);
            echo json_encode($output);
        }
    }

    public function getMachineDate(){
        if($this->request->isAJAX()){
            $machine =  $this->request->getVar('machine');
            $output = $this->datas->getMachineDate($machine);
            echo json_encode($output);     
        }
    }

    public function updateRejectData(){
        if($this->request->isAJAX()){
            $update['R_NO'] = $this->request->getVar('rno');
            $update['Notes'] = $this->request->getVar('note');
            $update['Rejection_Reason'] = $this->request->getVar('reason');
            $update['Total_Rejects'] = $this->request->getVar('totalreject');
            $updateQ['Min_Counts'] = $this->request->getVar('min_count');
            $updateQ['R_NO'] = $this->request->getVar('qrno');

            $output = $this->datas->updateRejectData($update,$updateQ);
            echo json_encode($output);
        }
    }

    public function getRejectShiftDate(){
        if($this->request->isAJAX()){
            $output = $this->datas->getRejectShiftDate($this->request->getVar('part'));
            echo json_encode($output);
        }
    }
    public function getCorrectShiftDate(){
        if($this->request->isAJAX()){
            $output = $this->datas->getCorrectShiftDate($this->request->getVar('part'));
            echo json_encode($output);
        }
    }
 

    public function getUserRole()
    {   
        if($this->request->isAJAX()){
            $user = $this->request->getVar('userRole');
            if($user == "Smart User"){
                $role = array(
                    "Financial_Drill_Down" => "2",
                    "Financial_Opportunity_Insights" => "2", 
                    "OEE_Drill_Down" => "2",
                    "Operator_User_Interface" => "1", 
                    "Production_Data_Management" => "1",
                    "Settings_Machine" => "1", 
                    "Settings_Parts" => "1",
                    "Settings_General" => "1", 
                    "Settings_User_Management" => "3"
                );
                return json_encode($role);
            }
            else if($user == "Site Admin"){
                $role = array(
                    "Financial_Drill_Down" => "3",
                    "Financial_Opportunity_Insights" => "3", 
                    "OEE_Drill_Down" => "3",
                    "Operator_User_Interface" => "3", 
                    "Production_Data_Management" => "3",
                    "Settings_Machine" => "3", 
                    "Settings_Parts" => "3",
                    "Settings_General" => "3", 
                    "Settings_User_Management" => "3"
                );
                return json_encode($role);
            }
            else{
            // elseif ($user == "Site User") {
                $role = array(
                    "Financial_Drill_Down" => "2",
                    "Financial_Opportunity_Insights" => "2", 
                    "OEE_Drill_Down" => "1",
                    "Operator_User_Interface" => "2", 
                    "Production_Data_Management" => "1",
                    "Settings_Machine" => "2", 
                    "Settings_Parts" => "2",
                    "Settings_General" => "1", 
                    "Settings_User_Management" => "0"
                );
                return json_encode($role);
            }
            // else{
            //     $role = array(
            //         "Operator_User_Interface" => "3", 
            //     );
            //     return json_encode($role);
            // }
        }
    }

    public function checkUser(){
        if($this->request->isAJAX()){ 
            $user = $this->request->getVar('user_name');
            $existUser = $this->datas->checkUser($user);
            return $existUser;
            // if ($existUser == 0) {
            //     return "success";
            // }
            // else{
            //     return "failed";
            // }
        }
    }

    public function getUserSiteData(){
        if($this->request->isAJAX()){  
            //$userId = $this->request->getVar('User_ID');
            $siteRef = $this->session->get('user_name');
            $updatemsg = $this->datas->getUserSiteData($siteRef);
            return json_encode($updatemsg);
        }
    }

    public function getDowntimeValues(){
        if($this->request->isAJAX()){             
            $output = $this->datas->getDowntimeValues();
            return json_encode($output);
        }
    }
    
    public function getToolValues(){
        if($this->request->isAJAX()){             
            $output['part'] = $this->datas->getToolValues();
            $output['correction'] = $this->datas->getCorrectionValues();
            $output['rejection'] = $this->datas->getRejectionValues();
            return json_encode($output);
        }
    }


    // function for calculate downtimes (planned,unplanned,machine off) 
    public function calcDowntime($down_data){
        $planned = 0;
        $unplanned = 0;
        $machineoff = 0;
        foreach ($down_data as $value) {
            if ($value['event'] == 'Active') {
                
            }
        }
    }

    //Number of shots calculation function
    public function calcNoOfShot($down_data){
        $length = sizeof($down_data);

        //need to code for multiple machine and part
        // $machine = [];
        // $part = [];
        // foreach ($down_data => $value) {
        //     # code...
        // }

        $start = $down_data[0]['shot_count'];
        $end =$down_data[$length-1]['shot_count'];
        $shotCount = $end-$start;
        return $shotCount;
    }

    //Function for get Machine Data
    // Need to pass the parameter shift date, machine id, shift
    public function getMachineRealData(){
        $machineData = $this->datas->getMachineRealData();
        return $machineData;
        // echo "<pre>";
        // print_r($machineData);
    }

    public function getMachineRealDataPDM(){
        $date = "2022-06-01";
        $time = "08:30:00";
        $machineData = $this->datas->getMachineRealDataPDM($date,$time);
        return $machineData;
        // echo "<pre>";
        // print_r($machineData);
    }


    //Function for find the Shift 
    public function findShift($start)
    {
        //$resShift = $this->datas->findShift($start,$end);
        $resShift = $this->datas->getShift();
        foreach ($resShift['shift'] as $value) {
            $date1 =  explode(":", $value['start_time']);
            $date2 = explode(":", $value['end_time']);
            $date3= explode(":", $start);

            if (($date3[0]>=$date1[0])&&($date3[0]<$date2[0])) {
                return $value['shifts'];
            }
        }
        //echo $start;
        //$resShift['shift'][0]['Shifts'];
        //return $resShift;
    }

          //Fuction for calculate shout count and store
    public function calcShot($value){
        $numberOfShot = $value['end']-$value['start'];

        $partData = $this->datas->getPartData($value['part_id']);
        //Part produced per cycle should be taken from the part table
        $partsProduced = $numberOfShot * $partData[0]['NICT'];
        //echo $partProducedCycle;

        $machineData['shift_date'] = $value['date'];
        $machineData['machine_id'] = $value['machine'];
        $machineData['start_time'] = $value['start_time'];
        $machineData['end_time'] = $value['end_time'];
        $machineData['shift_id'] = $value['shift'];
        $machineData['part_id'] = $value['part_id'];
        $machineData['tool_id'] = $value['tool_id'];
        $machineData['actual_shot_count'] = $numberOfShot;

        $machineData['production'] = $partsProduced;
        $machineData['correction_min_counts'] = $partsProduced;
        $machineData['corrections'] = 0;
        $machineData['rejection_max_counts'] = $partsProduced;
        $machineData['rejections'] = 0;

        $resCorrectionRejection = $this->datas->CorrectionRejectStore($machineData,$partsProduced);
        // if ($resCorrectionRejection) {
        //     return;
        // }
        // else{
        //     $this->calcShot($value);
        // }
        // echo "<pre>";
        // print_r($machineData);
        return;

    }

    //Function for correction / rejection data split to one hour basis
    public function hourData()
    {
        $machineData = $this->getMachineRealData();
        // echo "<pre>";
        // print_r($machineData);
        $temp = explode (":", $machineData[0]['time']);
        $checkHour = $temp[0];
        $shot_start = $machineData[0]['shot_count'];
        $shot_end = $machineData[0]['shot_count'];
        $start_time = $machineData[0]['time'];
        $hourData = [];

        $resShift = $this->findShift($machineData[0]['time']);
        $part = $this->datas->getPartToolchangeover();

        $s=0;

        $shiftExact = $this->datas->getShiftExact($machineData[0]['date']);

        $durationShift = explode(":", $shiftExact['duration'][0]['duration']);

        foreach ($shiftExact['shift'] as $value) {

            $start = $value['start_time'];
            $end= $value['end_time'];

            $startTmp = explode(":", $start);
            $endTmp = explode(":", $end);
            $c=0;

            if ($startTmp[1] >=30) {
                $s = "".$startTmp[0].":30".":00";
                $st = ($startTmp[0]*60*60)+(30*60);
                $c=1;
            }
            else{
                $s = "".$startTmp[0].":00".":00";
                $st = ($startTmp[0]*60*60);
            }

            if ($endTmp[1] >= 30) {
                $e = $endTmp[0].":30".":00";
                $et = ($endTmp[0]*60*60)+(30*60);
            }
            else{
                $e = $endTime[0].":00"."00";
                $et = ($endTmp[0]*60*60);
            }
            $vars = $s;
            $et = ($durationShift[0]*60*60)+($durationShift[1]*60);
            while ($et > 0) {  

                $x = explode(":", $vars);
                $v = $x[0]+1;
                if ($et <= (30*60)) {
                    if ($v >= 24) {
                       $vare = "00".":30".":00";
                    }
                    else{
                        $vare = (sprintf("%02d", ($v-1))).":30".":00";
                    }          
                }
                else{
                    //$vare = ($v).":00".":00";
                    if ($v >= 24) {
                       $vare = "00".":00".":00";
                    }
                    else{
                        $vare = (sprintf("%02d", ($v))).":00".":00";
                    }
                }
                
                // echo $vare;
                $y = explode(":", $vare);
                echo $vars."  =>  ".$vare;
                echo "<br>";

                // echo $vars." ".$vare;
                // echo "<br>";
                // $hour = $this->datas->hourDataGet("2022-05-17",$vars,$vare);
                // if($hour !=""){
                //     echo "<pre>";
                //     print_r($hour);
                // }
                // else{
                //     echo "no data";
                //     echo "<br>";
                // }
                // echo "<pre>";
                // print_r($hour);
                
                // $hour = $this->hourMachineData($vars,$vare,);

                if ($y[0] =="00") {
                    $y[0] = 24;
                }
                $et = $et -((($y[0]*60*60)+($y[1]*60)+($y[2]))-(($x[0]*60*60)+($x[1]*60)+($x[2]))); 
                $vars = $vare;
            }
        
            echo "<br>";

        }

        // $val['start']= $shot_start;
        // $val['end']= $shot_end;
        // $val['date']= $value['date'];
        // $val['machine']= $value['machine_id'];
        // // $val['start_time']= $start_time;
        // // $val['end_time']= $end_time;
        // $x = str_split($resShift);
        // $val['shift'] = $x[0];
        // $val['part_id'] = $part[0]['part_id'];
        // $val['tool_id'] = $part[0]['tool_id'];
        // $ack = $this->calcShot($val);

        // echo "<pre>";
        // print_r($hourData);
    }


    public function hourMachineData($s,$e){
        $temp = explode (":", $s);
        $checkHour = $temp[0];
        foreach ($machineData as $value) {
            $preShotCount = $shot_start;
            $hour = explode (":", $value['time']);
            $f=0;
           
            $machineSerialId = $this->datas->getMachineSerialConnection();
            foreach ($machineSerialId as $x) {
                if ($x['machine_serial_number'] == $value['machine_id']) {
                    $value['machine_id'] = $x['machine_id'];
                }
            }

            if ($checkHour == $hour[0]) {
                $shot_end = $value['shot_count'];
                $end_time = $value['time'];
                $f =0;
                $temp = array('date' => $value['date'],'time' => $value['time'], 'machine_id' => $value['machine_id'],'shot_count' => $value['shot_count']);
                array_push($hourData, $temp);
            }
            else{

                //$start_time = 
                // Calculate and store shot count function
                $val['start']= $shot_start;
                $val['end']= $shot_end;
                $val['date']= $value['date'];
                $val['machine']= $value['machine_id'];

                $tmpStart = explode(":", $start_time);
                // print_r($tmpStart);
                if ($tmpStart[1]>30 && $s=0) {
                    $val['start_time'] = "".(sprintf("%02d", $tmpStart[0]+1)).(":30:00");
                    $s=1;
                }
                elseif($tmpStart[1]>30 && $s=1){
                    $val['start_time'] = "".(sprintf("%02d", $tmpStart[0]+1)).(":00:00");
                }
                else{
                    $val['start_time'] = "".(sprintf("%02d", $tmpStart[0])).(":00:00");
                }

                $tmpEnd = explode(":", $end_time);
                if ($tmpEnd[1]>30) {
                    $val['end_time'] = "".(sprintf("%02d", $tmpEnd[0]+1)).(":00:00");
                }
                else{
                    $val['end_time'] = "".(sprintf("%02d", $tmpEnd[0])).(":30:00");
                }

                $x = str_split($resShift);
                $val['shift'] = $x[0];
                $val['part_id'] = $part[0]['part_id'];
                $val['tool_id'] = $part[0]['tool_id'];
                // function call
                //$ack = $this->calcShot($val);
                
                //$shot_start = $value['shot_count'];
                $shot_start = $shot_end;
                $shot_end = $value['shot_count']; 
                //$start_time = $value['time'];
                $start_time = $end_time;
                $end_time = $value['time'];
                $f=1;

                $hourData = array();
            
                $temp = array('date' => $value['date'],'time' => $value['time'], 'machine_id' => $value['machine_id'], 'shot_count' => $value['shot_count']);
                array_push($hourData, $temp);
            }
            //Flag concept for  shot start count 
            if ($f == 1) {
                $temp = explode (":", $value['time']);
                $checkHour = $temp[0];
            }
            echo "<pre>";
            print_r($val);
        }

        // Calculate and store shot count function
        $tmpStart = explode(":", $start_time);
        if ($tmpStart[1]>30 && $s=0) {
            $val['start_time'] = "".($tmpStart[0]+1).(":30:00");
            $s=1;
        }
        elseif($tmpStart[1]>30 && $s=1){
            $val['start_time'] = "".($tmpStart[0]+1).(":00:00");
        }
        else{
            $val['start_time'] = "".($tmpStart[0]).(":00:00");
        }

        $tmpEnd = explode(":", $end_time);
        if ($tmpEnd[1]>30) {
            $val['end_time'] = "".($tmpEnd[0]+1).(":00:00");
        }
        else{
            $val['end_time'] = "".($tmpEnd[0]).(":30:00");
        }

    }

    public function pdmUpdateHourData()
    {

        $machineData = $this->getMachineRealDataPDM();
        $temp = explode (":", $machineData[0]['time']);
        $checkHour = $temp[0];
        $shot_start = $machineData[0]['shot_count'];
        $shot_end = $machineData[0]['shot_count'];
        $start_time = $machineData[0]['time'];
        $hourData = [];

        // //Function call for find the Shift
        $resShift = $this->findShift($machineData[0]['time']);
        $machineId=1;
        $time="18:19:03:92";
        $part = $this->datas->getPartToolchangeoverPDM($machineId,$time);
        
        foreach ($machineData as $value) {
            $preShotCount = $shot_start;
            $hour = explode (":", $value['time']);
            $f=0;
            
            if ($checkHour == $hour[0]) {
                $shot_end = $value['shot_count'];
                $end_time = $value['time'];
                $f =0;
                $temp = array('date' => $value['date'],'time' => $value['time'], 'machine_id' => $value['machine_id'],'shot_count' => $value['shot_count']);
                array_push($hourData, $temp);
            }
            else{

                // Calculate and store shot count function
                $val['start']= $shot_start;
                $val['end']= $shot_end;
                $val['date']= $value['date'];
                $val['machine']= $value['machine_id'];
                $val['start_time']= $start_time;
                $val['end_time']= $end_time;
                $x = str_split($resShift);
                $val['shift'] = $x[0];
                $val['part_id'] = $part[0]['part_id'];
                $val['tool_id'] = $part[0]['tool_id'];
                // function call
                $ack = $this->calcShotPDM($val);

                //$shot_start = $value['shot_count'];
                $shot_start = $shot_end;
                $shot_end = $value['shot_count']; 
                //$start_time = $value['time'];
                $start_time = $end_time;
                $end_time = $value['time'];
                $f=1;

                $hourData = array();
            
                $temp = array('date' => $value['date'],'time' => $value['time'], 'machine_id' => $value['machine_id'], 'shot_count' => $value['shot_count']);
                array_push($hourData, $temp);
            }
            //Flag concept for  shot start count 
            if ($f == 1) {
                $temp = explode (":", $value['time']);
                $checkHour = $temp[0];
            }
        }

        // Calculate and store shot count function
        $val['start']= $shot_start;
        $val['end']= $shot_end;
        $val['date']= $value['date'];
        $val['machine']= $value['machine_id'];
        $val['start_time']= $start_time;
        $val['end_time']= $end_time;
        $x = str_split($resShift);
        $val['shift'] = $x[0];
        $val['part_id'] = $part[0]['part_id'];
        $val['tool_id'] = $part[0]['tool_id'];
        $ack = $this->calcShotPDM($val);

        // echo "<pre>";
        // print_r($hourData);
   
}

   public  function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }

    function random_color() {
        return $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
    }

    function color(){
    echo $this->random_color();
    }

    function opr(){
        return view('Operator/Operator_Dashboard');
    }
    function comparatorFunc( $x, $y)
        {   
            // If $x is equal to $y it returns 0
            if ($x['Performance'] == $y['Performance'])
                return 0;
          
            // if x is less than y then it returns -1
            // else it returns 1    
            if ($x['Performance'] < $y['Performance'])
                return -1;
            else
                return 1;
        }


    // password hasing
    public function hasing(){
        if ($this->request->getMethod() == "post") {
            //echo "ok";
            // password_hash($password, PASSWORD_DEFAULT);
             $has = password_hash($this->request->getVar('sname'), PASSWORD_DEFAULT);
            $has1 = password_hash($this->request->getVar('sname1'), PASSWORD_DEFAULT);

             echo $has;
             echo "<br>";
             echo "new one".$has1;
             echo "old";
             echo "<br>";
             echo $hash = md5($has);
             echo "<br>";
             echo $hash2 = md5($has1);
             $password = "naveen";
             if(password_verify($password, $has)) {
                echo "password matched";
            } else{
                echo "password failed";
            }
        }else{
            echo view("Operator/demo_nk");
        }
      
    }

    
    public function check(){
        $res = $this->datas->getSiteUser('manikanmani2000@gmail.com');
       
         // $unique = array_unique($res);
          //$details = $this->unique_multidim_array($res,'User_Name');
          $temp_array = array();
            $i = 0;
            $key_array = array();
       
        foreach($res as $val) {
            if (!in_array($val['User_Name'], $key_array)) {
                $key_array[$i] = $val['User_Name'];
                $temp_array[$i] = $val;
            }
            $i++;
        }
//print_r($unique);
        echo "<pre>";
        print_r($temp_array);
        echo "</pre>";
    }

    // session for site dropdwon
    public function session_get_fun(){
        if ($this->request->isAJAX()) {
            //$site =  $this->session->get('active_site');
            $site_id = $this->request->getVar('site_id');
            $site_name = $this->request->getVar('site_name');
            $this->session->set('active_site_name',$site_name);
            $this->session->set('active_site',$site_id);
            return json_encode(true);

        }
    }
    
     // check machine serial id
    /* its moved for settings controller
public function check_serialid(){
    if ($this->request->isAJAX()) {
        $serial_id = $this->request->getVar('serial_id');
        $res = $this->datas->check_machine_serialid($serial_id);
        
        echo json_encode($res);
    }
}
*/


// session logout function
public function logout_session(){
    //if ($this->request->isAJAX()) {
        $this->session->remove('active_site');
        $this->session->destroy();
    
        return view('User_Login',[
            'inactive' => " "
        ]);  
        //echo  json_encode("logout");
    //}
    
}

}
