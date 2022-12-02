<?php 

namespace App\Controllers;
use App\Models\Settings_Model;

class Settings_controller extends BaseController{

	protected $datas;
	protected $session;
	public function __construct(){
		$this->session = \Config\Services::session();
		$this->datas = new Settings_Model();
	}
    // ======Machine Settings=================
    // Retrive Machine Data
    public function get_machine_data(){
        if ($this->request->isAJAX()) {
            $output = $this->datas->get_machine_data();
            echo json_encode($output);
        }
    }
    // Add Machine
    public function add_machine_new_Code(){
        if ($this->request->isAJAX()) {
            $machineData = array();
            $machine = $this->machineRecordCount();
            $machineData["machine_id"] = "MC".($machine);
            $machineData["machine_name"] = $this->request->getVar('machine_name');
            $machineData["rate_per_hour"] = $this->request->getVar('machine_rate_hour');
            $machineData["machine_offrate_per_hour"] = $this->request->getVar('machine_off_rate_hour');
            $machineData["tonnage"] = $this->request->getVar('tonnage');
            $machineData["machine_brand"] = $this->request->getVar('machine_brand');   
            $machineData["status"] = 1;
            $machineData["machine_serial_number"] = $this->request->getVar('machine_serial_id');
            $machineData['last_updated_by'] = $this->session->get('user_name');

            $machine_iot['location'] = $this->get_site_location($this->request->getVar('site_id'));
            $machine_iot['site_name'] = $this->request->getVar('site_id');

            $this->data['add_Machine'] = $this->datas->add_Machine($machineData,$machine_iot);
            if($this->data['add_Machine']){
                echo  json_encode(true);
            }
            else{
                echo json_encode(false);
            }

        }
    }

    // Retrive Site Data
    public function get_site_location($site_id){
        $res = $this->datas->get_site_location($site_id);
        return $res;
    }
    // Deactivate Machine Record
    public function deactivateMachine(){
        if($this->request->isAJAX()){
           $mData = $this->datas->getMachineData($this->request->getVar('MachineId'));
            $uData['machine_id'] = $mData['machine'][0]['machine_id'] ;
            $uData['machine_name'] = $mData['machine'][0]['machine_name'];
            $uData['rate_per_hour'] = $mData['machine'][0]['rate_per_hour'];
            $uData['machine_offrate_per_hour'] = $mData['machine'][0]['machine_offrate_per_hour'];
            $uData['tonnage'] = $mData['machine'][0]['tonnage'];
            $uData['machine_brand'] = $mData['machine'][0]['machine_brand'];
            $uData['status'] = $mData['machine'][0]['status'];
            $uData['machine_serial_number'] = $mData['machine'][0]['machine_serial_number'];
            $uData['last_updated_by'] = $this->session->get('user_name');

            $output = $this->datas->deactivateMachine($this->request->getVar('MachineId'),$this->request->getVar('Status_Machine'),$uData);
            echo json_encode($output);
        }
    }

    // Retrive Machine Data
    public function getMachineData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getMachineData($this->request->getVar('MachineId'));
            echo json_encode($output);
        }
    }

    // Update Machine Record
    public function editMachineData(){
        if($this->request->isAjax()){

            $req = $this->datas->getMachineData($this->request->getVar('MachineId'));
            $serial_id = $this->request->getVar('machine_serial_id');
            $update['machine_id']= $req['machine'][0]['machine_id'];
            $update['machine_name']= $this->request->getVar('MachineName');
            $update['rate_per_hour']= $this->request->getVar('MachineRateHour');
            $update['machine_offrate_per_hour']= $this->request->getVar('MachineOffRateHour');
            $update['tonnage']= $this->request->getVar('Tonnage');
            $update['machine_brand']= $this->request->getVar('MachineBrand');
            $update['machine_serial_number']= $serial_id;
            $update['status']= $req['machine'][0]['status'];
            $update['last_updated_by'] = $this->session->get('user_name');
           
            $machine_iot_update['machine_serial_id'] = $serial_id;
            $machine_iot_update['location'] = $this->get_site_location($this->session->get('active_site'));
            $machine_iot_update['site_id'] = $this->session->get('active_site');
            $machine_iot_update['machine_id'] = $update['machine_id'];
            $machine_iot_update['last_updated_by'] = $this->session->get('user_name');
            $output = $this->datas->editMachineData($update,$this->request->getVar('MachineId'),$serial_id,$machine_iot_update);
            echo json_encode($output);
        }
    }
    // Machine Serial ID Verification
    public function check_serialid(){
        if ($this->request->isAJAX()) {
            $serial_id = $this->request->getVar('serial_id');
            $res = $this->datas->check_machine_serialid($serial_id);
            
            echo json_encode($res);
        }
    }
    // Generate Machine ID
    public function machineRecordCount(){
        $rec = $this->datas->getMachineId();
        if (!empty($rec)) {
            $newId = sizeof($rec)+1+1000;
        }
        else{
            $newId = 1000+1;
        }
        return $newId;
    }

    // Retrive Machine Active/ Inactive Records Total
    public function aIaMachine(){
        if($this->request->isAJAX()){
            $output = $this->datas->aIaMachine();
            echo json_encode($output);
        }
    }


    // ==================== Part settings ==========================

    // Retrive Part Records
    public function retrive_all_part(){
        if ($this->request->isAJAX()) {
            $res = $this->datas->settings_tools();
            echo json_encode($res);
        }
    }

    // Add part 
    public function add_part_new_code(){
        if ($this->request->isAJAX()) {
            $machineData = array();
            $toolData = array();

            $part = $this->partRecordCount();
            $machineData["part_id"] = "PT".($part);
            $machineData["part_name"] = $this->request->getVar('part_name');
            $tool_opt = $this->request->getVar('tool_select');
            $new_tool_name = $this->request->getVar('new_tool');
            if ($tool_opt == 'new') {
                if (empty($new_tool_name) == true) {
                    echo "empty tool name";
                }else{
                    $tool = $this->toolRecordCount();
                    $machineData["tool_id"] = "TL".($tool);
                    $toolData["tool_id"]=$machineData["tool_id"];
                    $toolData["tool_name"]=$this->request->getVar('new_tool');
                    $toolData["tool_status"]=1;
                    $toolData["last_updated_by"]=$this->session->get('user_name');
                }
               
            }
            else{
                $machineData["tool_id"] = $tool_opt;
            }
            $machineData["NICT"] =$this->request->getVar('inputNICT'); 
            $machineData["part_produced_cycle"] = $this->request->getVar('inputNoOfPartsPerCycle');
            $machineData["part_price"] = $this->request->getVar('inputPartPrice');
            $machineData["part_weight"] =$this->request->getVar('inputPartWeight'); 
            $machineData["material_name"] =$this->request->getVar('inputMaterialName'); 
            $machineData["material_price"] = $this->request->getVar('inputMaterialPrice');
            $machineData["status"] = 1;
            $machineData['last_updated_by'] = $this->session->get('user_name');
                
            $this->data['add_Tool'] = $this->datas->add_Tool($machineData,$toolData);
            if($this->data['add_Tool']){
                echo json_encode(true);
            }
            else{
                echo json_encode(false);
            }
        }
    }

    // Part settings id generation function
    public function partRecordCount(){
        $rec = $this->datas->getPartId();
        if (!empty($rec)) {
            $newId = sizeof($rec)+1+1000;
        }
        else{
            $newId = 1000+1;
        }
        return $newId;
    }

    // part settings tool id generation function
    public function toolRecordCount(){
        $rec = $this->datas->getToolId();
        if (!empty($rec)) {
            $newId = sizeof($rec)+1+1000;
        }
        else{
            $newId = 1000+1;
        }
        
        return $newId;
    }


    // deactivate tool function
     public function deactivateTool(){
        if($this->request->isAJAX()){
            $tData = $this->datas->getToolData($this->request->getVar('Part_Id'));
            $uData['part_id'] = $tData['tool'][0]['part_id'] ;
            $uData['part_name'] = $tData['tool'][0]['part_name'];
            $uData['tool_id'] = $tData['tool'][0]['tool_id'];
            $uData['NICT'] = $tData['tool'][0]['NICT'];
            $uData['part_produced_cycle'] = $tData['tool'][0]['part_produced_cycle'];
            $uData['part_price'] = $tData['tool'][0]['part_price'];
            $uData['part_weight'] = $tData['tool'][0]['part_weight'];
            $uData['material_name'] = $tData['tool'][0]['material_name'];
            $uData['material_price'] = $tData['tool'][0]['material_price'];
            $uData['status'] = $tData['tool'][0]['status'];
            $uData['last_updated_by'] = $this->session->get('user_name');

            $output = $this->datas->deactivateTool($this->request->getVar('Part_Id'),$this->request->getVar('Status_Tool'),$uData);
            echo json_encode($output);
        }
    }

    // get tool name in dropdown
     public function getToolName(){
        if($this->request->isAJAX()){
            $output = $this->datas->getToolName();
            echo json_encode($output);
        }
    }

    // get tool in parts settings edit or info
     public function getTool(){
        if($this->request->isAJAX()){
            $output = $this->datas->getTool($this->request->getVar('TId'));
            echo json_encode($output);
        }
    }
    // get tool data for part settings in info model or edit model
     public function getToolData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getToolData($this->request->getVar('Pid'));
            echo json_encode($output);
        }
    }

    // get part count for active inactive
     public function aIaTool(){
        if($this->request->isAJAX()){
            $output = $this->datas->aIaTool();
            echo json_encode($output);
        }
    }

    // edit part settings function
        public function add_tool_edit_part(){
        if ($this->request->isAJAX()) {
           $update['part_id'] = $this->request->getVar('Part_Id');
           $update['part_name']= $this->request->getVar('EditPartName');  
           $update['NICT']= $this->request->getVar('EditNICT');
           $update['part_produced_cycle']= $this->request->getVar('EditNoOfPartsPerCycle');
           $update['part_price']= $this->request->getVar('EditPartPrice');
           $update['part_weight']= $this->request->getVar('EditPartWeight');
           $update['material_name']= $this->request->getVar('EditMaterialName');
           $update['material_price']= $this->request->getVar('EditMaterialPrice');
           $update['status']= 1;
           $update['last_updated_by'] = $this->session->get('user_name');
            $tool_id = $this->toolRecordCount();
            $tool_id_new = "TL".($tool_id);
            $tool['tool_id']= $tool_id_new;
            $update['tool_id'] = $tool_id_new;
            $tool['tool_name'] = $this->request->getVar('inputNewToolNameEdit');
            $tool['last_updated_by'] = $this->session->get('user_name');
            $tool['tool_status'] = 1;
            //echo json_encode();
            $res_tool = $this->datas->addToolData($tool);
            if ($res_tool == true) {
                $tool_data['tool_name_edit'] = $tool['tool_name'];
                $tool_data['last_updated_by'] = $tool['last_updated_by'];
                $tool_data['tool_id'] = $tool['tool_id'];
                $res = $this->datas->editToolData($update,$tool_data);
                if ($res == true) {
                    echo json_encode($res);
                }else{
                    echo json_encode("Part Edit error");
                }
            }else{
                echo json_encode("Tool Not Inserted");
            }
        }
    }


    // edit part function
    public function editToolData(){
        if($this->request->isAjax()){
            
            $tempId=$this->request->getVar('Part_Id');
            $req = $this->datas->getToolData($tempId);
            $update['part_id'] = $tempId;
            $update['part_name']= $this->request->getVar('EditPartName');     
            $update['NICT']= $this->request->getVar('EditNICT');
            $update['part_produced_cycle']= $this->request->getVar('EditNoOfPartsPerCycle');
            $update['part_price']= $this->request->getVar('EditPartPrice');
            $update['part_weight']= $this->request->getVar('EditPartWeight');
            $update['material_name']= $this->request->getVar('EditMaterialName');
            $update['material_price']= $this->request->getVar('EditMaterialPrice');
            $update['last_updated_by'] = $this->session->get('user_name');
            $tool['tool_name_edit'] = $this->request->getVar('tool_name_edit');
            $update['status']= 1;
            if ($this->request->getVar('inputToolNameEdit') != "") {
                $update['tool_id'] =$this->request->getVar('inputToolNameEdit');
            }
            else{
                $update['tool_id'] = $req['tool'][0]['tool_id'];
            }
            $tool['tool_id'] = $update['tool_id'];
            $tool['last_updated_by'] = $update['last_updated_by'];
            $output = $this->datas->editToolData($update,$tool);
            echo json_encode($output);
        }
    }

    
// general settings =================================================================================

    // financial matrics for general settings update function
    public function getGoalsFinancialData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getGoalsFinancialData();
            echo json_encode($output);
        }
    }


    // update shift function general settings
     public function updateShift(){
        // if($this->request->isAJAX()){

            $shift_start = $this->request->getVar('startingTime');
            $hour = $this->request->getVar('hours');

            $arr = explode(':',$shift_start);
            $arr1 = explode(':', $hour);

            $tmphour = ($arr1[0]*60)+$arr1[1];
            $no_shift = (24*60)/$tmphour;

            $sh = $arr[0];
            $sm = $arr[1];
            $shift = [];

            for ($i=0; $i < $no_shift; $i++) { 
                //Add zero for prefix
                //hour
                $th2 ="";
                if (strlen((string)$sh) ==1) {
                    $th2 = "0".$sh;
                }
                else{
                    $th2 = $sh;
                }
                //minutes
                $th3 ="";
                if (strlen((string)$sm) ==1) {
                    $th3 = "0".$sm;
                }
                else{
                    $th3 = $sm;
                }

                $tmp = $th2.":".$th3.":"."00";
                $eh = $arr1[0];
                $em = $arr1[1];
                $exact_time =  (($sh*60)+$sm)+(($eh*60)+$em);
                array_push($shift, $tmp);    
                $eh = $eh+$sh;  
                if (($exact_time) >= (24*60)) {

                    if ($i == (int)($no_shift)) {
                        $tmp = $arr[0].":".$arr[1].":"."00";
                        array_push($shift,$tmp);
                        break;
                    }
                    else{
                        $eh= $eh-24;
                        $em = $em+$sm;
                        if ($em >= 60) {
                            while ($em>=60) {
                                $eh = $eh+1;
                                $em = $em-60;
                            } 
                        }
                        //Add zero for prefix
                        //hour
                        $th ="";
                        if (strlen((string)$eh) ==1) {
                            $th = "0".$eh;
                        }
                        else{
                            $th = $eh;
                        }
                        //minutes
                        $th4 ="";
                        if (strlen((string)$em) ==1) {
                            $th4 = "0".$em;
                        }
                        else{
                            $th4 = $em;
                        }

                        $tmp = $th.":".$th4.":"."00";
                        array_push($shift,$tmp);
                        $sh = $eh;
                        $sm = $em;
                    }

                }
                else{
                    if ($i == (int)($no_shift)) {
                        $tmp = $arr[0].":".$arr[1].":"."00";
                        array_push($shift,$tmp);
                        break;
                    }
                    else{
                        $em = $em+$sm;
                        if ($em >= 60) {
                            while ($em>=60) {
                                $eh = $eh+1;
                                $em = $em-60;
                            }
                        }
                        //Add zero for prefix
                        //hours
                        $th1 ="";
                        if (strlen((string)$eh) ==1) {
                            $th1 = "0".$eh;
                        }else{
                            $th1 = $eh;
                        }
                        //minutes
                        $th5 ="";
                        if (strlen((string)$em) ==1) {
                            $th5 = "0".$em;
                        }
                        else{
                            $th5 = $em;
                        }
                        $tmp = $th1.":".$th5.":"."00";
                        array_push($shift,$tmp);
                        $sh = $eh;
                        $sm = $em;
                    }
                } 
            }

            $last_updated_by = $this->session->get('user_name');
            $output = $this->datas->updateShift($shift_start,$hour,$shift,$last_updated_by);
            echo json_encode($output);
        // }
    }


    // update shift data display function
     public function getShiftData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getShift();
            echo json_encode($output);
        }
    }

    // edit finanical metrics data
     public function editGFMData(){
        if($this->request->isAJAX()){
            $update['overall_teep']= $this->request->getVar('EOTEEP');
            $update['overall_ooe']= $this->request->getVar('EOOOE');
            $update['overall_oee']= $this->request->getVar('EOOEE');
            $update['availability']= $this->request->getVar('EAvailability');
            $update['performance']= $this->request->getVar('EPerformance');
            $update['quality']= $this->request->getVar('EQuality');
            $update['oee_target']= $this->request->getVar('EOEE');
            $update['last_updated_by']= $this->session->get('user_name');
            $output = $this->datas->editGFMData($update);
            echo json_encode($output);
        }
    }

    // edit downtime threshold
     public function editDTData(){
        if($this->request->isAJAX()){
            $update['downtime_threshold']= $this->request->getVar('DT');
            $update['last_updated_by']= $this->session->get('user_name');
            $output = $this->datas->editDTData($update);
            echo json_encode($output);
        }
    }

    // retrive downtime threshold 
    public function getDowntimeTData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getDowntimeTData();
            echo json_encode($output);
        }
    }

// retrive downtime reasons function
     public function getDowntimeRData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getDowntimeRData();
            echo json_encode($output);
        }
    }

    // get quality reasons retrive function
     public function getQualityData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getQualityData();
            echo json_encode($output);
        }
    }

    // delete downtime reaosns
     public function deleteDownReason(){
        if($this->request->isAJAX()){
            $output = $this->datas->deleteDownReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }

    // delete quality reasons
    public function deleteQualityReason(){
        if($this->request->isAJAX()){
            $output = $this->request->getVar('Record_No');
            $output = $this->datas->deleteQualityReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }

    // edit downtime reasons for particular record view
     public function getDownReason(){
        if($this->request->isAJAX()){
            $output = $this->datas->getDownReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }
    // get quality reasons for update
     public function getQualiyReason(){
        if($this->request->isAJAX()){
            $output = $this->datas->getQualiyReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }

    // update current shift performance 
    public function current_shift_performance(){
        //$session = \Config\Services::session($config);
        if ($this->request->isAJAX()) {
            $update['green'] = $this->request->getVar("green");
            $update['yellow'] = $this->request->getVar("yellow");
            $update['oee'] = $this->request->getVar("target");
            $update['last_updated_by'] = $this->session->get('user_name');
            $res = $this->datas->current_shift_performance_model($update);
            echo json_encode($res);
        }
        else{
            echo "something went wrong!!";
        }
    }
    // current shift performance for retrive

    public function current_shift_retrive(){
        if ($this->request->isAJAX()) {
            $res  = $this->datas->current_shift_retrive_data();
            echo json_encode($res);
        }
    }

    // get downtime reasons
     public function downtime_reason_retrive(){      
        if ($this->request->isAJAX()) {
            $output =  $this->datas->downtime_reason_retrive();
            echo json_encode($output);
        
        } 
    }

    // id generation for downtime reasons
     public function DownImgRecordCount(){
        $rec = $this->datas->getDowntimeImgId();
        if (!empty($rec)) {
            $newId = sizeof($rec)+1+1000;
        }
        else{
            $newId = 1000+1;
        }       
        return $newId;
    }
    // id generation for quality reasons
    public function QualityImgRecordCount(){
        $rec = $this->datas->getQualityImgId();
        if (!empty($rec)) {
            $newId = sizeof($rec)+1+1000;
        }
        else{
            $newId = 1000+1;
        }       
        return $newId;
    }

    // add downtime reasons for insertion downtime reasons controller
    // new feature added in folder for each site is create the folder
    public function add_downtime_reasons(){
        if ($this->request->isAJAX()) {
            helper(['filesystem']);
            $file = $this->request->getFile('file');
            $category = $this->request->getVar('reason_category');
            $reason_name = $this->request->getVar('reason_name');
            if ($file->getSize() > 0) {
                
                if ($file->isValid()) {
                    // if new site is create the folder then exisiting site ismove on
                    $directory = "./public/uploads/".$this->session->get('active_site');
                    if (!is_dir($directory)) {
                        mkdir($directory, 0777, TRUE);

                    }

                    $map = directory_map($directory.'/'.'Downtime_Reason/');
                    $imgCount= count($map)+1;
                    $fileName = 'Reason_'.$imgCount;

                    $tmpIdCount = $this->DownImgRecordCount();
                    $update['image_id'] = "DI".($tmpIdCount);
                    $update['original_file_name']= $file->getName();
                    $update['original_file_extension']= $file->getExtension();
                    $update['original_file_size_kb']= $file->getSizeByUnit('kb');
                    $update['uploaded_file_name'] = $fileName;
                    $update['uploaded_file_extension'] = $file->getExtension();
                    $reason['status'] = 1;


                    $reason['downtime_reason']= $reason_name;
                    $reason['downtime_category']= $category;
                    $reason['last_updated_by'] = $this->session->get('user_name');
                    $img_location_add = "/public/uploads/".$this->session->get('active_site');
                    $update['uploaded_file_location'] = base_url().$img_location_add.'/'."Downtime_Reason/";
                   

                    if ($file->move($directory.'/'.'Downtime_Reason/',''.$fileName.''.'.'.$update['original_file_extension'])) {
                        //echo "image uploaded..";
                        if ($output = $this->datas->uploadReasons($update,$reason)) {
                            //Redirect to Dahsboard
                            echo true;
                        }else{
                            echo false;
                        }
                    }            
               }

            }
            else{
                return $file->getErrorString();
            }

        }
    }
    // edit downtime reasons 
    public function edit_downtime_reasons(){
        if ($this->request->isAJAX()) {
            //echo "ok";
            helper(['filesystem']);
            $file = $this->request->getFile('edit_file');
            $reason_category = $this->request->getVar('edit_reason_category');
            $reason_name = $this->request->getVar('edit_reason_name');
            $record_no = $this->request->getVar('edit_record_no');
            //$change['r_no'] = $this->request->getVar('edit_record_no');
            $change['r_no'] = $record_no;
            $change['Changes'] = 0;

            if(empty($file)  == true){
                $update['downtime_reason']= $reason_name;
                $update['downtime_category']= $reason_category;
                $update['last_updated_by'] = $this->session->get('user_name');
                if($this->datas->updateReasons($update,$change)){
                    echo true;
                }
            }else{
                // site based direcotry creation code
                $directory = "./public/uploads/".$this->session->get('active_site');
                if (!is_dir($directory)) {
                    mkdir($directory, 0777, TRUE);
                }
                $change['Changes'] = 1;
                $update['downtime_reason']= $reason_name;
                $update['downtime_category']= $reason_category;
                $update['original_file_name']= $file->getName();
                $update['original_file_extension']= $file->getExtension();
                $update['original_file_size_kb']= $file->getSizeByUnit('kb');

                $map = directory_map($directory.'/'.'Downtime_Reason/');
                $imgCount= count($map)+1;
                $fileName = 'Reason_'.$imgCount;
                $update['uploaded_file_name'] = $fileName;
                $update['uploaded_file_extension'] = $file->getExtension();

                $img_add_location = "/public/uploads/".$this->session->get('active_site');

                $update['uploaded_file_location'] = base_url().$img_add_location."/"."Downtime_Reason/";
                $update['last_updated_by'] = $this->session->get('user_name');
                if ($file->move($directory.'/'.'Downtime_Reason/',''.$fileName.''.'.'.$update['original_file_extension'])) {
                    if($this->datas->updateReasons($update,$change)){
                        echo true;
                    }else{
                        echo  false;
                    }
                }
            }
        }
    }
    
    // add quality reasons for insertion function
    public function add_quality_reasons(){
        if ($this->request->isAJAX()) {
            helper(['filesystem']);
            $file = $this->request->getFile('quality_file');
            $reason_name = $this->request->getVar('reason_name');

            $directory = "./public/uploads/".$this->session->get('active_site');
            if (!is_dir($directory)) {
                mkdir($directory, 0777, TRUE);
            }

            $reasons['quality_reason']= $reason_name;
            $tmpIdCount = $this->QualityImgRecordCount();
            $update['image_id'] = "QI".($tmpIdCount);
            $reasons['image_id'] = $update['image_id'];
            $update['original_file_name']= $file->getName();
            $update['original_file_extension']= $file->getExtension();
            $update['original_file_size_kb']= $file->getSizeByUnit('kb');
            $map = directory_map($directory.'/'.'Quality_Reason/');

            $img_add_location = "/public/uploads/".$this->session->get('active_site');
            $update['Uploaded_File_Location'] = base_url().$img_add_location."/"."Quality_Reason/";
            $imgCount= count($map);
            $imgCount = $imgCount +1;
            $fileName = 'Reason_'.$imgCount;
            $update['uploaded_file_name'] = $fileName;
            $update['uploaded_file_extension'] = $file->getExtension();
            $extension = $file->getExtension();
            $reasons['last_updated_by'] = $this->session->get("user_name");

            if ($file->move($directory.'/'.'Quality_Reason/',''.$fileName.''.'.'.$extension)) {
                if($output = $this->datas->uploadReasonsQuality($update,$reasons)){
                     echo true;
                }
            } 

        }
    }
    // edit quality reasons image for ajax function
    public function edit_quality_reasons_fun(){
        if ($this->request->isAJAX()) {
            helper(['filesystem']);
            $file = $this->request->getFile('edit_file_quality');
            $reason_name = $this->request->getVar('edit_quality_reason');
            $record_no = $this->request->getVar('edit_quality_img_id');
            $change['r_no'] = $record_no;
           $update['last_updated_by'] = $this->session->get("user_name");
           if (empty($file) == true) {
                $change['Changes'] = 0;
                $update['quality_reason']= $reason_name;
                if($output = $this->datas->UpdateQuality($update,$change)){
                    echo true;
                }        
            }else{

                $directory = "./public/uploads/".$this->session->get('active_site');
                if (!is_dir($directory)) {
                    mkdir($directory, 0777, TRUE);
                }

                $change['Changes'] = 1;
                $update['quality_reason']= $reason_name;
                $update['original_file_name']= $file->getName();
                $update['original_file_extension']= $file->getExtension();
                $update['original_file_size_kb']= $file->getSizeByUnit('kb');
                $map = directory_map($directory.'/'.'Quality_Reason/');

                $img_add_location = "/public/uploads/".$this->session->get('active_site');
                $update['uploaded_file_location'] = base_url().$img_add_location."/"."Quality_Reason/";
                $imgCount= count($map);
                $imgCount = $imgCount+1;
                $fileName = 'Reason_'.$imgCount;
                $extension = $file->getExtension();
                $update['uploaded_file_name'] = $fileName;
                $update['uploaded_file_extension'] = $file->getExtension();
                if ($file->move($directory.'/'.'Quality_Reason/',''.$fileName.''.'.'.$extension)) {
                    $output = $this->datas->UpdateQuality($update,$change);
                    if($output == true){
                       $res_reason = $this->datas->update_reasons($update,$change);
                       if ($res_reason == true) {
                         echo  true;
                       }else{
                        echo false;
                       }
                       
                    }
                } 
            }
        }
    }
}
 ?>