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
        // if ($this->session->get('active_site')) {
        //     $db_name = 'dub1';
        // }else{
        //     $db_name = $this->session->get('active_site');
        // }
        $this->datas = new MainModel();
        
        //$this->UserModel = new UserManagementModel();
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
/*
    public function addMachine($select_opt=null,$select_sub_opt=null){
        helper(['form']);
        //if($_POST['Add_Machine'] ){
            $rules = [
                'inputMachineName' => 'required',
                'inputMachineRateHour' => 'required',
                'inputMachineOffRateHour' => 'required',
                'inputTonnage'    => 'required',
                'inputMachineBrand'    => 'required',
                'inputMachineSerialId'    => 'required',
            ];
            if ($this->validate($rules)) {

                $machineData = array();
                $machine = $this->machineRecordCount();
                //For site Location and Site Name for Iot gateway data.......
                $siteData=$this->datas->getSiteData($this->session->get('site'));
                $machineData["machine_id"] = "MC".($machine);
                $machineData["machine_name"] = $this->request->getVar('inputMachineName');
                $machineData["rate_per_hour"] = $this->request->getVar('inputMachineRateHour');
                $machineData["machine_offrate_per_hour"] = $this->request->getVar('inputMachineOffRateHour');
                $machineData["tonnage"] = $this->request->getVar('inputTonnage');
                $machineData["machine_brand"] = $this->request->getVar('inputMachineBrand');   
                $machineData["status"] = 1;
                $machineData["machine_serial_number"] = $this->request->getVar('inputMachineSerialId');
                $machineData['last_updated_by'] = $this->session->get('user_name');
                $this->data['add_Machine'] = $this->datas->add_Machine($machineData);
                if($this->data['add_Machine']){
                    return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                }
                else{
                    return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                }
            }
            else{
                $this->data['validation']= $this->validator;
                $data2['Machine_Errors'] = [
                    1 => ''.$this->data['validation']->getError('inputMachineId').'',
                    2 => ''.$this->data['validation']->getError('inputMachineName').'',
                    3 => ''.$this->data['validation']->getError('inputTonnage').'',
                    4 => ''.$this->data['validation']->getError('inputMachinePerHour').'',
                    5 => ''.$this->data['validation']->getError('inputMachineOffCostPerHour').'',
                    6 => ''.$this->data['validation']->getError('inputLastModifiedby').''
                ];

                echo "Something went wrong, try again!!";
            }
        //}
    }*/
    // public function siteRecordCount(){
    //     $user = $this->datas->getSiteId();
    //     if (!empty($user)) {
    //         $id = explode("I",$user[0]['Site_ID']);
    //         $newId = $id[1]+1;
    //     }
    //     else{
    //         $newId = 1000;
    //     }
        
    //     return $newId;
    // } 
    /*
    public function machineRecordCount(){
        $rec = $this->datas->getMachineId();
        if (!empty($rec)) {
            //$id = explode("C",$user[0]['Machine_Id']);
            //$newId = $id[1]+1;
            $newId = sizeof($rec)+1+1000;
        }
        else{
            $newId = 1000+1;
        }
       
        return $newId;
    }
    */
    /*
    its moved for settings controller
    public function toolRecordCount(){
        $rec = $this->datas->getToolId();
        if (!empty($rec)) {
            //$id = explode("L",$user[0]['Tool_ID']);
            //$newId = $id[1]+1;
            $newId = sizeof($rec)+1+1000;
        }
        else{
            $newId = 1000+1;
        }
        
        return $newId;
    }*/
    /*
    its moved for settings controller
    public function partRecordCount(){
        $rec = $this->datas->getPartId();
        if (!empty($rec)) {
            // $id = explode("T",$user[0]['Part_Id']);
            //$newId = $id[1]+1;
            $newId = sizeof($rec)+1+1000;
        }
        else{
            $newId = 1000+1;
        }
        return $newId;
    }*/
    /* it moved for settings controller
    public function DownImgRecordCount(){
        $rec = $this->datas->getDowntimeImgId();
        if (!empty($rec)) {
            $newId = sizeof($rec)+1+1000;
        }
        else{
            $newId = 1000+1;
        }       
        return $newId;
    }*/
    /*
    it moved in settings controller
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
    */
    /* its moved for settings controller
    public function addTool($select_opt=null,$select_sub_opt=null){
        helper(['form']);
        // if($_POST['Add_Tool'] ){
            $rules = [
                'inputPartName' => 'required',
                'inputNICT' => 'required',
                'inputNoOfPartsPerCycle' => 'required',
                'inputPartPrice'    => 'required',
                'inputPartWeight'    => 'required',
                'inputMaterialPrice'    => 'required',
                'inputMaterialName'    => 'required',
                 'inputToolName'    => 'required',
            ];

            print_r($_POST);
            
            if ($this->validate($rules)) {

                $machineData = array();
                $toolData = array();

                $part = $this->partRecordCount();
                $machineData["part_id"] = "PT".($part);
                $machineData["part_name"] = $this->request->getVar('inputPartName');
                $tool_opt = $this->request->getVar('inputToolName');
                if ($tool_opt == 'new') {
                    $tool = $this->toolRecordCount();
                    $machineData["tool_id"] = "TL".($tool);
                    $toolData["tool_id"]=$machineData["tool_id"];
                    $toolData["tool_name"]=$this->request->getVar('inputNewToolName');
                    $toolData["tool_status"]=1;
                    // $toolData["Created_By"]=$this->session->get('user_name');
                    // $toolData["Created_On"]=date('Y-m-d');
                    // $toolData["Last_Updated_By"]=$this->session->get('user_name');
                }
                else{
                    //$output = $this->datas->getTool($tool_opt);
                    //print_r($output);
                    $machineData["tool_id"] = $tool_opt;
                    // $machineData["tool_name"] = $output[0]['tool_name'];
                }
                $machineData["NICT"] =$this->request->getVar('inputNICT'); 
                $machineData["part_produced_cycle"] = $this->request->getVar('inputNoOfPartsPerCycle');
                $machineData["part_price"] = $this->request->getVar('inputPartPrice');
                $machineData["part_weight"] =$this->request->getVar('inputPartWeight'); 
                // $machineData["tool_id"] = 'A123G46';
                $machineData["material_name"] =$this->request->getVar('inputMaterialName'); 
                $machineData["material_price"] = $this->request->getVar('inputMaterialPrice');;
                $machineData["status"] = 1;
                $machineData['last_updated_by'] = $this->session->get('user_name');
                // $uData =  $machineData;
                // $machineData["Created_By"] = $this->session->get('user_name');
                // $machineData["Created_On"] = date('Y-m-d');
                // $machineData["Last_Updated_By"] = $this->session->get('user_name');
                // $uData["Last_Updated_By"] = $this->session->get('user_name');

                // $this->data['add_Tool'] = $this->datas->add_Tool($machineData,$uData,$toolData);
                $this->data['add_Tool'] = $this->datas->add_Tool($machineData,$toolData);
                if($this->data['add_Tool']){
                   return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                }
                else{
                    echo "something went wrong, try again !!";
                }
            }
            else{
                $this->data['validation']= $this->validator;
                $data2['Machine_Errors'] = [
                    1 => ''.$this->data['validation']->getError('Tool_Name').'',
                    2 => ''.$this->data['validation']->getError('Job_Name').'',
                    3 => ''.$this->data['validation']->getError('NICT').'',
                    4 => ''.$this->data['validation']->getError('NoOfParts_Produced_Cycle').'',
                    5 => ''.$this->data['validation']->getError('Part_Price').'',
                    6 => ''.$this->data['validation']->getError('Material_Name').'',
                    7 => ''.$this->data['validation']->getError('Part_Weight').'',
                    8 => ''.$this->data['validation']->getError('MaterialMarket_Price').'',
                    9 => ''.$this->data['validation']->getError('Last_Modified_By').'',
                ];
               //  echo"<pre>";
               // print_r($this->data['Machine_Errors']) ;
               // print_r($data['validation']->listErrors());  
                //return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
            }        
        // }
        
    }
    */
    /*
    its moved for settings controller
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
    }*/
    /*
    its moved for settings controller
    public function getMachineData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getMachineData($this->request->getVar('MachineId'));
            echo json_encode($output);
        }
    }*/
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
    /* its moved for settings controller
    public function aIaMachine(){
        if($this->request->isAJAX()){
            $output = $this->datas->aIaMachine();
            echo json_encode($output);
        }
    }*/
    /*
    its moved for settings controller

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
    }*/
    
    /*
    public function getTool(){
        if($this->request->isAJAX()){
            $output = $this->datas->getTool($this->request->getVar('TId'));
            echo json_encode($output);
        }
    }
    */
    /*
    its moved for settings controller
    public function getToolData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getToolData($this->request->getVar('Pid'));
            echo json_encode($output);
        }
    }
    its moved for settings controller
    public function aIaTool(){
        if($this->request->isAJAX()){
            $output = $this->datas->aIaTool();
            echo json_encode($output);
        }
    }*/
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
    /*
    its moved for settings controller
    public function editMachineData(){
        if($this->request->isAjax()){

            $req = $this->datas->getMachineData($this->request->getVar('MachineId'));
            $update['machine_id']= $req['machine'][0]['machine_id'];
            $update['machine_name']= $this->request->getVar('MachineName');
            $update['rate_per_hour']= $this->request->getVar('MachineRateHour');
            $update['machine_offrate_per_hour']= $this->request->getVar('MachineOffRateHour');
            $update['tonnage']= $this->request->getVar('Tonnage');
            $update['machine_brand']= $this->request->getVar('MachineBrand');
            $update['machine_serial_number']= $req['machine'][0]['machine_serial_number'];
            $update['status']= $req['machine'][0]['status'];
            $update['last_updated_by'] = $this->session->get('user_name');
            $output = $this->datas->editMachineData($update,$this->request->getVar('MachineId'));
            echo json_encode($output);
        }
    }
    */
    // part settings edit update part in particular tool id 
    /*
    its moved for settings model
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
            $update['status']= 1;
            if ($this->request->getVar('inputToolNameEdit') != "") {
                $update['tool_id'] =$this->request->getVar('inputToolNameEdit');
            }
            else{
                $update['tool_id'] = $req['tool'][0]['tool_id'];
            }
            $output = $this->datas->editToolData($update);
            echo json_encode($output);
        }
    }
    */
// part settings edit part details and add tool details
    /*
    its moved for settings model
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
            $tool['tool_status'] = 1;
            echo json_encode();
            // $res_tool = $this->datas->addToolData($tool);
            // if ($res_tool == true) {
            //     $res = $this->datas->editToolData($update);
            //     if ($res == true) {
            //         echo json_encode($res);
            //     }else{
            //         echo json_encode("Part Edit error");
            //     }
            // }else{
            //     echo json_encode("Tool Not Inserted");
            // }
        }
    }
    */
    /*
    its moved for settings controller
    public function getGoalsFinancialData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getGoalsFinancialData();
            echo json_encode($output);
        }
    }*/
    /*
    it moved for settings contorller
    public function getDowntimeTData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getDowntimeTData();
            echo json_encode($output);
        }
    }
    /*
    its moved for settings controller

    public function editGFMData(){
        if($this->request->isAJAX()){
            //$update['R_NO']= $req[0]['R_NO'];
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
    }*/
    /*
    it moved for settings controller
    public function editDTData(){
        if($this->request->isAJAX()){
            //$update['R_NO']= $req[0]['R_NO'];
            $update['downtime_threshold']= $this->request->getVar('DT');
            $update['last_updated_by']= $this->session->get('user_name');
            $output = $this->datas->editDTData($update);
            echo json_encode($output);
        }
    }*/
    /*
     ADD downtime reasons moved in settings controller

    public function UploadDowntime($select_opt=null,$select_sub_opt=null){
        helper(['filesystem']);
        $file = $this->request->getFiles();
        $cat = $this->request->getVar('DTRCategory');
            $imgname = array(); 
            $orgname = array();
                $i=0;
                foreach ($file['DTReasonimg'] as $img) {
                    if ($img->isValid()) {
                            $orgname[$i] = $img->getName();
                            $map = directory_map('./public/uploads/Downtime_Reason/Planned/');
                            $map1 = directory_map('./public/uploads/Downtime_Reason/Unplanned/');
                            $imgCount= count($map)+count($map1)+1;
                            $fileName = 'Reason_'.$imgCount;
                            $imgname[$i] = $fileName;
                            //echo $fileName;
                                $tmpIdCount = $this->DownImgRecordCount();
                                $update['image_id'] = "DI".($tmpIdCount);
                                $update['original_file_name']= $img->getName();
                                $update['original_file_extension']= $img->getExtension();
                                $update['original_file_size_kb']= $img->getSizeByUnit('kb');
                                $update['uploaded_file_name'] = $fileName;
                                $update['uploaded_file_extension'] = $img->getExtension();
                                $update['status'] = 1;

                                $reason['downtime_reason']= $this->request->getVar('DTName');
                                $reason['downtime_category']= $this->request->getVar('DTRCategory');
                                $reason['last_updated_by'] = $this->session->get('user_name');
                                if ($cat == 'Planned') {
                                    $update['uploaded_file_location'] = base_url()."/public/uploads/Downtime_Reason/Planned/";
                                    if ($img->move( './public/uploads/Downtime_Reason/Planned/',''.$fileName.''.'.png')) {
                                        if ($output = $this->datas->uploadReasons($update,$reason)) {
                                           //Redirect to Dahsboard
                                        }
                                    } 
                                }else{
                                    $update['uploaded_file_location'] = base_url()."/public/uploads/Downtime_Reason/Unplanned/";
                                    if ($img->move('./public/uploads/Downtime_Reason/Unplanned/',''.$fileName.''.'.png')) {
                                        if ($output = $this->datas->uploadReasons($update,$reason)) {
                                            //Redirect to Dahsboard
                                        }
                                    } 
                                }
                                ++$i;
                    }
                        //  echo "<p>".$img->getName()."is moved successfully</p>";  
                    else{
                        echo "<p>".$img->getErrorString()."</p>";
                    }
                   
                }
                return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                       
                // print_r($imgname);
                // print_r($orgname);
            // }
            // else{
            //     $i=0;     
            //     foreach ($file['DTReasonimg'] as $img) {
            //         if ($img->isValid()) {
                      
            //             $orgname[$i] = $img->getName();
            //             $map = directory_map('./public/uploads/Downtime_Reason/Unplanned/');
            //             $map1 = directory_map('./public/uploads/Downtime_Reason/Planned/');
            //             $imgCount= count($map)+count($map1)+1;
            //             $fileName = 'Reason_'.$imgCount;
            //             $imgname[$i] = $fileName;
            //             echo $fileName;
            //             $update['Origional_File_Name']= $img->getName();
            //             $update['Origional_File_Extension']= $img->getExtension();
            //             $update['Origional_File_Size_KB']= $img->getSizeByUnit('kb');
            //             $update['Uploaded_File_Name'] = $fileName;
            //             $update['Uploaded_File_Extension'] = 'png';
            //             $update['Status'] = 1;
            //             $update['Downtime_Reason']= $this->request->getVar('DTName');
            //             $update['Downtime_Category']= $cat;
            //             $update['Last_Modified_By'] = 'Manikandan';
            //             $update['Uploaded_File_Location'] = base_url()."/public/uploads/Downtime_Reason/Unplanned/";                            if ($img->move('./public/uploads/Downtime_Reason/Planned/',''.$fileName.''.'.png')) {
            //                 if ($img->move('./public/uploads/Downtime_Reason/Unplanned/',''.$fileName.''.'.png')) {
                               
            //                     if ($output = $this->datas->uploadReasons($update)) {
            //                        // print_r("<script>alert(".$update.")</script>");
            //                         echo "insert successfuuly";
                                   
            //                     }
            //                     ++$i;       
                                      
            //                         // }
            //                 }           
            //                         // }
            //         } 
                            
            //     }
            //             //  echo "<p>".$img->getName()."is moved successfully</p>";
                    
            //     else{
            //         echo "<p>".$img->getErrorString()."</p>";
            //     }
                   
            
            // }
    }
    */
    // public function UploadDowntime($select_opt=null,$select_sub_opt=null){
    //     helper(['filesystem']);
    //     $file = $this->request->getFile('DTReasonImg');
    //     $cat = $this->request->getVar('DTRCategory');
    //     if ($file->getSize() > 0) {
    //         $update['Downtime_Reason']= $this->request->getVar('DTName');
    //         $update['Downtime_Category']= $cat;
    //         $update['Origional_File_Name']= $file->getName();
    //         $update['Origional_File_Extension']= $file->getExtension();
    //         $update['Origional_File_Size_KB']= $file->getSizeByUnit('kb');
    //         if ($cat == "Planned") {
    //             $map = directory_map('./public/uploads/Downtime_Reason/Planned/');
    //             $map1 = directory_map('./public/uploads/Downtime_Reason/Unplanned/');
    //             $update['Uploaded_File_Location'] = base_url()."/public/uploads/Downtime_Reason/Planned/";
    //             $imgCount= count($map)+count($map1);
    //             $fileName = 'Reason_'.$imgCount+1;
    //             $update['Uploaded_File_Name'] = $fileName;
    //             $update['Uploaded_File_Extension'] = 'png';
    //             $update['Status'] = 1;
    //             $update['Last_Modified_By'] = 'Manikandan';
    //             if ($file->move('./public/uploads/Downtime_Reason/Planned/',''.$fileName.''.'.png')) {
    //                 if($output = $this->datas->uploadReasons($update)){
    //                     // echo"<pre>";
    //                     // print_r("<script>alert(".$update.")</script>");
    //                     return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
    //                 }
    //             }  
    //         }
    //         else{
    //             $map = directory_map('./public/uploads/Downtime_Reason/Unplanned/');
    //             $map1 = directory_map('./public/uploads/Downtime_Reason/Planned/');
    //             $update['Uploaded_File_Location'] = base_url()."/public/uploads/Downtime_Reason/Unplanned/";
    //             $imgCount= count($map)+count($map1);
    //             $fileName = 'Reason_'.$imgCount+1;
    //             $update['Uploaded_File_Name'] = $fileName;
    //             $update['Uploaded_File_Extension'] = 'png';
    //             $update['Status'] = 1;
    //             $update['Last_Modified_By'] = 'Manikandan';
    //             if ($file->move('./public/uploads/Downtime_Reason/Unplanned/',''.$fileName.''.'.png')) {
    //                 if($output = $this->datas->uploadReasons($update)){
    //                     // echo"<pre>";
    //                     // print_r("<script>alert(".$update.")</script>");
    //                     return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
    //                 }
    //             }
    //         }
    //     }
    // }
    /*
       public function UpdateDowntime($select_opt=null,$select_sub_opt=null){
        helper(['filesystem']);
        $file = $this->request->getFile('UDTReasonImg');
        $cat = $this->request->getVar('UDTRCategory');
        $change['r_no'] = $this->request->getVar('UDTRRecord');
        $change['Changes'] = 0;
        if ($file->getSize() > 0) {
            // if($file->getSize() > 0) {
                $change['Changes'] = 1;
                // $update['downtime_reason']= $this->request->getVar('UDTName');
                // $update['downtime_category']= $cat;
                $update['original_file_name']= $file->getName();
                $update['original_file_extension']= $file->getExtension();
                $update['original_file_size_kb']= $file->getSizeByUnit('kb');
                if ($cat == "Planned") {
                    $map = directory_map('./public/uploads/Downtime_Reason/Planned/');
                    $map1 = directory_map('./public/uploads/Downtime_Reason/Unplanned/');
                    $imgCount= count($map)+count($map1)+1;
                    $fileName = 'Reason_'.$imgCount;
                    $update['uploaded_file_name'] = $fileName;
                    $update['uploaded_file_extension'] = $file->getExtension();
                    $update['uploaded_file_location'] = base_url()."/public/uploads/Downtime_Reason/Planned/";
                    $update['last_updated_by'] = $this->session->get('user_name');
                    // print_r($update);
                    if ($file->move('./public/uploads/Downtime_Reason/Planned/',''.$fileName.''.'.png')) {
                        if($this->datas->updateReasons($update,$change)){
                            return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                        }
                        return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                    }
                }
                else{
                    $map = directory_map('./public/uploads/Downtime_Reason/Planned/');
                    $map1 = directory_map('./public/uploads/Downtime_Reason/Unplanned/');
                    $imgCount= count($map)+count($map1)+1;
                    $fileName = 'Reason_'.$imgCount;
                   // echo $fileName;
                    
                    $update['uploaded_file_name'] = $fileName;
                    $update['uploaded_file_extension'] = $file->getExtension();
                    $update['uploaded_file_location'] = base_url()."/public/uploads/Downtime_Reason/Unplanned/";
                    $update['last_updated_by'] = $this->session->get('user_name');
                    // print_r($update);
                    if ($file->move('./public/uploads/Downtime_Reason/Unplanned/',''.$fileName.''.'.png')) {
                        if($this->datas->updateReasons($update,$change)){
                    //         // echo"<pre>";
                    //         // print_r("<script>alert(".$update.")</script>");
                            return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                        }
                        return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                    }
                }
                // echo "<pre>";
                // print_r($update);
                // }
            // else{
            //     echo "No Images Selected";
            // }
        }
        else{
            $update['downtime_reason']= $this->request->getVar('UDTName');
            $update['downtime_category']= $cat;
            $update['last_updated_by'] = $this->session->get('user_name');
            // print_r($change);
            if($this->datas->updateReasons($update,$change)){
                return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
            }
        }
    }*/
    /*
    it moved settings controller
    public function UploadQuality($select_opt=null,$select_sub_opt=null){
        helper(['filesystem']);
        $file = $this->request->getFile('QReasonImg');
        if ($file->getSize() > 0) {
            $reasons['quality_reason']= $this->request->getVar('QReasonName');
            $tmpIdCount = $this->QualityImgRecordCount();
            $update['image_id'] = "QI".($tmpIdCount);
            $reasons['image_id'] = $update['image_id'];
            $update['original_file_name']= $file->getName();
            $update['original_file_extension']= $file->getExtension();
            $update['original_file_size_kb']= $file->getSizeByUnit('kb');
                $map = directory_map('./public/uploads/Quality_Reason/');
                $update['Uploaded_File_Location'] = base_url()."/public/uploads/Quality_Reason/";
                $imgCount= count($map);
                $imgCount = $imgCount +1;
                $fileName = 'Reason_'.$imgCount;
                $update['uploaded_file_name'] = $fileName;
                $update['uploaded_file_extension'] = $file->getExtension();
                 $extension = $file->getExtension();
                $update['status'] = 1;
                $reasons['last_updated_by'] = $this->session->get("user_name");
                // $update['Last_Modified_By'] = 'Manikandan';

                if ($file->move('./public/uploads/Quality_Reason/',''.$fileName.''.'.'.$extension)) {
                    if($output = $this->datas->uploadReasonsQuality($update,$reasons)){
                        // echo"<pre>";
                        // print_r($update);
                        return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                    }
                }  
            
        }
        else{
            echo "size error";
        }
    }*/
    /*
    it moved for settings controller
    
    public function UpdateQuality($select_opt=null,$select_sub_opt=null){
        helper(['filesystem']);
        $file = $this->request->getFile('UQReasonImg');
        $change['r_no'] =$this->request->getVar('UQRRecord');
        $update['last_updated_by'] = $this->session->get("user_name");
        $change['Changes'] = 0;
        if ($file->getSize() > 0) {
            // if ($file->getSize() > 0) {
                $change['Changes'] = 1;
                $update['quality_reason']= $this->request->getVar('UQReasonName');
                $update['original_file_name']= $file->getName();
                $update['original_file_extension']= $file->getExtension();
                $update['original_file_size_kb']= $file->getSizeByUnit('kb');
                    $map = directory_map('./public/uploads/Quality_Reason/');
                    $update['uploaded_file_location'] = base_url()."/public/uploads/Quality_Reason/";
                    $imgCount= count($map);
                    $imgCount = $imgCount+1;
                    $fileName = 'Reason_'.$imgCount;
                    $extension = $file->getExtension();
                    $update['uploaded_file_name'] = $fileName;
                    $update['uploaded_file_extension'] = $file->getExtension();
                    //$update['uploaded_file_location'] = base_url()."/public/uploads/Quality_Reason/";
                    // $update['Last_Modified_By'] = 'Manikandan';
                    if ($file->move('./public/uploads/Quality_Reason/',''.$fileName.''.'.'.$extension)) {
                        if($output = $this->datas->UpdateQuality($update,$change)){
                            // echo"<pre>";
                             //print_r("<script>alert(".$update.")</script>");
                            return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                        }
                    }  
            // }
            // else{
            //     return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                
            // }
        }
        else{
            $update['quality_reason']= $this->request->getVar('UQReasonName');
            if($output = $this->datas->UpdateQuality($update,$change)){
               // echo "ok its reasons";
                return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');

            }
        }
    }*/
    /* it moved settings controller
    public function getDowntimeRData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getDowntimeRData();
            echo json_encode($output);
        }
    }
    */
    /* it moved settings controller
    public function getQualityData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getQualityData();
            echo json_encode($output);
        }
    }*/
    /*
    it moved settings controller
    public function deleteDownReason(){
        if($this->request->isAJAX()){
            $output = $this->datas->deleteDownReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }*/
    /*
    public function deleteQualityReason(){
        if($this->request->isAJAX()){
            $output = $this->request->getVar('Record_No');
            $output = $this->datas->deleteQualityReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }
    */
    public function getDownReason(){
        if($this->request->isAJAX()){
            $output = $this->datas->getDownReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }
    /*
    public function getQualiyReason(){
        if($this->request->isAJAX()){
            $output = $this->datas->getQualiyReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }
    */
    // public function Calculation(){
    //     if($this->request->isAJAX()){
    //         $output = $this->datas->Calculation();
    //         echo json_encode($output);
    //     }
    // }
/* it moved for  settings controller
     public function updateShift(){
        // if($this->request->isAJAX()){

            $shift_start = $this->request->getVar('startingTime');
            $hour = $this->request->getVar('hours');
            // $shift_start = "11:30";
            // $hour = "08:00";

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

        // echo "<pre>";
        // print_r($shift);
        // echo "<br>";
        // echo sizeof($shift);
        // echo "<br>";
        // $s =["A","B","C","D","E","F","G","H"];
        // $l=sizeof($shift);
        // $j=0;
        // for ($i=0; $i<($l-1) ; $i=$i+2) {
        //     $tm = array("Shifts"=>$s[$j],"start_time"=>$shift[$i],"end_time"=>$shift[$i+1]);
        //     $j=$j+1;
        // }


            // $output = $this->datas->updateShift();

            $last_updated_by = $this->session->get('user_name');
            $output = $this->datas->updateShift($shift_start,$hour,$shift,$last_updated_by);
            // return $shift_start;
            echo json_encode($output);
        // }
    }
    */
    /*
    it moved for settings controller
    public function getShiftData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getShift();
            // echo "<pre>";
            // print_r($output);
            echo json_encode($output);
        }
    }*/
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
    /* its moved for pdm controller
    public function getRejectionData(){
        if($this->request->isAJAX()){
            $update['shift'] = $this->request->getVar('shift');
            $update['shift_date'] = $this->request->getVar('shiftdate');
            $update['part_id'] = $this->request->getVar('partname');
            // $update['shift'] = "C";
            // $update['shift_date'] = "2022-05-06";
            // $update['partname'] = "PT1001";
            $output = $this->datas->getRejectionData($update);
            // echo "<pre>";
            // print_r($output);
            echo json_encode($output);
        }
    }
    */
    /* its moved for pdm controller
    public function getRejectData(){
        if($this->request->isAJAX()){
            $ref['part_id'] = $this->request->getVar('partid');
            $ref['from_time'] = $this->request->getVar('from_time');
            $ref['date'] = $this->request->getVar('shift_date');
            $ref['shift'] = $this->request->getVar('shift');

            //$output['reject'] = $this->datas->getRejectData($ref);
            // $output['part'] = $this->datas->getPartData($this->request->getVar('partid'));
            $output = $this->datas->getCorrectData($ref);
            
            // $ref['shift'] = "C";
            // $ref['date'] = "2022-05-06";
            // $ref['part_id']= "PT1001";
            // $output['correction'] = $this->datas->getCorrectData($ref);
            // echo "<pre>";
            // print_r($output['correction']);
            echo json_encode($output);
        }
    }
    */
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
    /* its moved for pdm controller
    public function getRejectionPart(){
        if($this->request->isAJAX()){
            $output = $this->datas->getRejectionPart();
            echo json_encode($output);
        }
    }
    */
    /* its moved for pdm controller
    public function getCorrectionPart(){
        if($this->request->isAJAX()){
            //$output = $this->datas->getCorrectionPart();
            $output = $this->datas->getRejectionPart();
            echo json_encode($output);
        }
    }*/

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
    /*
    public function getRejectShift(){
        if($this->request->isAJAX()){
            // $update['part'] = $this->request->getVar('part');
            // $get_date = $this->request->getVar('sdate');
            // $update['sdate'] = date("Y-m-d", strtotime($get_date));
           //echo json_encode($newDate);
            $output = $this->datas->getShift();
            echo json_encode($output);
        }
    }
    */
    /* its moved for pdm controller 
    public function getCorrectShift(){
        if($this->request->isAJAX()){
            // $update['part'] = $this->request->getVar('part');
            // $get_date = $this->request->getVar('sdate');
            // $update['sdate'] = date("Y-m-d", strtotime($get_date));
            $output = $this->datas->getShift();
            //$output = $this->datas->getCorrectShift($update);
            echo json_encode($output);
        }
    }
    its moved for pdm controller
    public function getCorrectionData(){
        if($this->request->isAJAX()){
            $update['partname'] = $this->request->getVar('partname');
            $update['shift_date'] = $this->request->getVar('shift_date');
            $update['shift'] = $this->request->getVar('shift');
            $output = $this->datas->getCorrectionData($update);
            echo json_encode($output);
        }
    }*/
    /* its moved for pdm controller
    public function getCorrectData(){
        if($this->request->isAJAX()){
            $ref['part_id'] = $this->request->getVar('partid');
            $ref['from_time'] = $this->request->getVar('from_time');
            $ref['date'] = $this->request->getVar('shift_date');
            $ref['shift'] = $this->request->getVar('shift');

            // $ref['shift'] = "C";
            // $ref['shift_date'] = "2022-05-06";
            // $ref['part_id']= "PT1001";
            // $ref['from_time']= "18:19:03";


            $output = $this->datas->getCorrectPartData($ref);
            //$output['part'] = $this->datas->getPartData($ref['part_id']);
          //  $output['rejection'] = $this->datas->getRejectData($ref);
            // echo "<pre>";
            // print_r($output['correction']);
            echo json_encode($output);
            //return $output;
       }
    }*/
    
    /*
    public function updateCorrectData(){
        if($this->request->isAJAX()){
            $update['shift'] = $this->request->getVar('shift');
            $update['shift_date'] = $this->request->getVar('shift_date');
            $update['start_time'] = $this->request->getVar('start_time');
            $update['last_updated_by'] = $this->session->get('user_name');
            $update['notes'] = $this->request->getVar('note');
            $update['max_count'] = $this->request->getVar('max_count');
            $update['total_correction_value'] = $this->request->getVar('total_correction_value');
            // $updatepart['Max_Rejects'] = $this->request->getVar('max_count');
            // $updatepart['R_NO'] = $this->request->getVar('prno');
             
             $output = $this->datas->updateCorrectData($update);
             echo json_encode($output);
            //print_r($updatepart);
        }
    }
    */

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
    /*
    public function EditUserRoleMaster(){
        if($this->request->isAJAX()){ 
            $user = $this->request->getVar('userName');
            $UserRole = $this->datas->EditUserRoleMaster($user);
            return json_encode($UserRole);
        }
    }*/
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
/*
    public function checkOperator(){
        if($this->request->isAJAX()){  
            $userId = $this->request->getVar('User_ID');
            $siteRef = $this->session->get('user_name');
            //echo $userId;
            $updatemsg = $this->datas->checkOperator($siteRef,$userId);
            //print_r($updatemsg);
            return json_encode($updatemsg);
        }
    }

    
    
    public function createNewUser(){
        if($this->request->isAJAX()){    

            $roles = $this->request->getVar('Role');
            if ($roles != 'Operator') {      
                //echo "User";
                $record = $this->userRecordCountMngt();
                $newId = $record;
                $update['User_ID'] = "UM".$newId."";
                $update['User_Name'] = $this->request->getVar('User_Email');
                $update['First_Name'] = $this->request->getVar('User_First_Name');
                $update['Last_Name'] = $this->request->getVar('User_Last_Name');
                $update['Contact_NO'] = $this->request->getVar('User_Phone');
                $update['Designation'] = $this->request->getVar('User_Designation');
                $update['Department'] = $this->request->getVar('User_Department');
                $update['Role'] = $this->request->getVar('Role');
                $update['Password'] = "0";
                $update['IsPasswordChecked'] = "0";
                $update['Site_ID'] = $this->request->getVar('User_Site_Name');
                $update['Status'] = "0";
                $update['Created_By'] = $this->request->getVar('User_Ref');
                $update['Created_On'] = date('Y-m-d');
                $update['Last_Updated_By'] = $this->request->getVar('User_Ref');
                

                $role['User_Name'] = $update['User_Name'];
                $role['Financial_Drill_Down'] = $this->request->getVar('FDrillDown');
                $role['Financial_Opportunity_Insights'] = $this->request->getVar('Opportunityinsights');
                $role['OEE_Drill_Down'] = $this->request->getVar('OEEDrillDown');
                $role['Operator_User_Interface'] = $this->request->getVar('OUI');
                $role['Production_Data_Management'] = $this->request->getVar('PDM');
                $role['Settings_Machine'] = $this->request->getVar('SMachine');
                $role['Settings_Parts'] = $this->request->getVar('SPart');
                $role['Settings_General'] = $this->request->getVar('SGeneral');
                $role['Settings_User_Management'] = $this->request->getVar('SUser');
                $role['Created_By'] = $this->request->getVar('User_Ref');
                $role['Created_On'] = date('Y-m-d');
                $role['Last_Updated_By'] = $this->request->getVar('User_Ref');

            }
            else{
                $record = $this->userRecordCountOpr();
                $newId = $record;
                $update['User_ID'] = "UO".$newId."";
                $update['User_Name'] = $this->request->getVar('User_ID');
                $update['First_Name'] = $this->request->getVar('User_First_Name');
                $update['Last_Name'] = $this->request->getVar('User_Last_Name');
                $update['Contact_NO'] = $this->request->getVar('User_Phone');
                $update['Designation'] = $this->request->getVar('User_Designation');
                $update['Department'] = $this->request->getVar('User_Department');
                $update['Role'] = $this->request->getVar('Role');
                $update['Site_ID'] = $this->request->getVar('User_Site_Name');
                $update['Password'] = $this->request->getVar('User_Phone');
                //$update['IsPasswordChecked'] = "0";
                $update['Status'] = "0";
                $update['Created_By'] = $this->request->getVar('User_Ref');
                $update['Created_On'] = date('Y-m-d');
                $update['Last_Updated_By'] = $this->request->getVar('User_Ref');
            }
            //print_r($update);

                $updatemsg = $this->datas->newUserAct($update,$roles);
                if ($roles != 'Operator') {
                    if ($updatemsg) {
                        $userMap = $this->datas->getUserData($update['User_Name']);
                         //$role['User_Name'] = $userMap['User_Name'];
                        $role['Created_By'] = "Admin";
                        $userRole = $this->datas->userRoleAdd($role);
                        if ($userRole) {
                             $emailSend = $this->sendMail($update['User_Name'],$update['User_ID'],$update['First_Name'],$update['Last_Name'],$update['Role']);
                            if($emailSend){
                                if ($roles == 'Site Admin') {
                                    $conf =$this->datas->getUpdateSiteData($update['Site_ID']);
                                    if ($conf) {
                                        return true;
                                    }
                                    else{
                                        return false;
                                    }
                                }
                                else{
                                    return true;
                                }                 
                            }
                            else{
                                return false;
                            }
                        }
                        else{
                            return false;
                        }
                    }
                }
                else{
                    if ($updatemsg) { 
                        return true;
                    }
                    else{
                        return false;
                    }
                }        
        }
    }*

        public function updateUserData(){
            if($this->request->isAJAX()){    

            $roles = $this->request->getVar('Role');
            //echo $roles;
            if ($roles != 'Operator') {      
                $update['User_Name'] = $this->request->getVar('User_Email');
                $update['First_Name'] = $this->request->getVar('User_First_Name');
                $update['Last_Name'] = $this->request->getVar('User_Last_Name');
                $update['Contact_NO'] = $this->request->getVar('User_Phone');
                $update['Designation'] = $this->request->getVar('User_Designation');
                $update['Department'] = $this->request->getVar('User_Department');
                $update['Role'] = $this->request->getVar('Role');
                $update['Site_ID'] = $this->request->getVar('User_Site_Name');
                $update['Last_Updated_By'] = $this->request->getVar('Updated_By');

                $role['User_Name'] = $update['User_Name'];
                $role['Financial_Drill_Down'] = $this->request->getVar('FDrillDown');
                $role['Financial_Opportunity_Insights'] = $this->request->getVar('Opportunityinsights');
                $role['OEE_Drill_Down'] = $this->request->getVar('OEEDrillDown');
                $role['Operator_User_Interface'] = $this->request->getVar('OUI');
                $role['Production_Data_Management'] = $this->request->getVar('PDM');
                $role['Settings_Machine'] = $this->request->getVar('SMachine');
                $role['Settings_Parts'] = $this->request->getVar('SPart');
                $role['Settings_General'] = $this->request->getVar('SGeneral');
                $role['Settings_User_Management'] = $this->request->getVar('SUser');
                $role['Last_Updated_By'] = $this->request->getVar('Updated_By');

            }
            else{
                $update['User_Name'] = $this->request->getVar('User_Phone');
                $update['First_Name'] = $this->request->getVar('User_First_Name');
                $update['Last_Name'] = $this->request->getVar('User_Last_Name');
                $update['Contact_NO'] = $this->request->getVar('User_Phone');
                $update['Designation'] = $this->request->getVar('User_Designation');
                $update['Department'] = $this->request->getVar('User_Department');
                $update['Role'] = $this->request->getVar('Role');
                $update['Site_ID'] = $this->request->getVar('User_Site_Name');
                $update['Last_Updated_By'] = $this->request->getVar('Updated_By');
            }

            //print_r($update);

                $updatemsg = $this->datas->updateUserData($update,$roles); 
                if ($updatemsg) {
                    if ($roles != 'Operator') {
                        $updateRole = $this->datas->updateUserRoleData($role);
                        if ($updateRole) {
                            return true;
                        }
                        else{
                            return false;
                        }
                    }
                    else{
                        return true;
                    }
                }      
                else{
                    return false;
                } 
            }
        }
    /*
    public function getSiteUser(){
       if($this->request->isAJAX()){      
        $res = $this->datas->getSiteUser('manikanmani2000@gmail.com');
        $temp_array = array();
        $i = 0;
        $key_array = array();
        for ($i=0; $i < sizeof($res); $i++) { 
            if (!in_array($res[$i]['User_Name'], $key_array)) {
                array_push($temp_array,$res[$i]);
                array_push($key_array,$res[$i]['User_Name']);
            }
        }
        return json_encode($temp_array);
       }
    }*/
    // remove dublicate values for array
    /* temporary hidding for strategy
     function unique_multidim_array($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();
       
        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }
    public function userRecordCountMngt(){   
        $user = $this->datas->userRecordCountMngt();  
        if (!empty($user)) {
            $id = explode("M",$user[0]['User_ID']);
            $newId = $id[1]+1;
        }
        else{
            $newId = 1000;
        }
        
        return $newId;
    }
    public function userRecordCountOpr(){     
            $user = $this->datas->userRecordCountOpr();
            if (!empty($user)) {
                $id = explode("O",$user[0]['User_ID']);
                $newId = $id[1]+1;
            }
            else{
                $newId = 1000;
            }
            
            return $newId;
    }*/
    /* temporary moving on user_controller
    public function sendMail($uName,$uId,$fName,$lName,$role){
        $to = ''.$uName.'';
        $sub = 'Activate and Set Password';
        $message = 'Hi <b><i>'.$fName.' '.$lName.'</i></b>,
                    <br>Your account has been created successfully as a <b><i>'.$role.'</i></b>. Please click the button below to activate Your account and Set the Password as you want.
                    <br>
                        <a href="'.base_url().'/Login/createPassword/'.$uName.'" user_name="'.$uName.'" user_id="'.$uId.'">Activate and Set Password</a>
                    <br><b>Thank You!</b>';
        $email = \Config\Services::email();

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

    }*/

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




/*

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

                //$start_time = 
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
                $ack = $this->calcShot($val);
                // echo "<pre>";
                // print_r($value);

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
        $ack = $this->calcShot($val);

        // echo "<pre>";
       */ // print_r($hourData);
   
// }

/* temporary hiding strategy
    public function deactivateUser(){
        if($this->request->isAJAX()){
            $update['Last_Updated_By'] = $this->request->getVar('Updated_By');
            $update['User_ID'] = $this->request->getVar('User_Id');
            $update['Status'] = $this->request->getVar('Status_User');
            $update['Role'] = $this->request->getVar('Role');
            $output = $this->datas->deactivateUser($update);
            echo json_encode($output);
        }
    }
    */
    //info user data 
    /*
    public function getUserData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getUserDataInfo($this->request->getVar('UserId'),$this->request->getVar('Role'));
            echo json_encode($output);
            //echo json_encode($this->request->getVar('Role'));
        }
    }
    */



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



    // current shift performance
     // startegy code  current shift performance
/* it moved for settings controller

     public function current_shift_performance(){
        //$session = \Config\Services::session($config);
        if ($this->request->isAJAX()) {
            $update['green'] = $this->request->getVar("green");
            $update['yellow'] = $this->request->getVar("yellow");
            $update['oee'] = $this->request->getVar("target");
            $update['last_updated_by'] = $this->session->get('user_name');
            // $update['username'] = $this->session->get('user_name');
            $res = $this->datas->current_shift_performance_model($update);
            echo json_encode($res);
        }
        else{
            echo "something went wrong!!";
        }
    }*/

     // current shift performance retrive data for general settings
    /*
    it moved for settings controller
    public function current_shift_retrive(){
            //echo json_encode('demo');
        if ($this->request->isAJAX()) {
            //echo json_encode("ok");
            // $username =$this->session->get('user_name');
            //echo json_encode($username);
            $res  = $this->datas->current_shift_retrive_data();
           //echo $res;
            echo json_encode($res);
        }
    }*/
 // strategy code production rejection retrive drop down value
    /* its moved for pdm controller
    public function Reject_retrive(){
        
        if ($this->request->isAJAX()) {
          // $site_id = $this->data['user_details'][0]['Site_ID'];
           //$site = $this->datas->getUserInfo($this->session->get('user_name'));
            
            //$site_id =  $site[0]['Site_ID'];
            //$output =  $this->datas->reject_dropdown($site_id);
            $output =  $this->datas->reject_dropdown();
            echo json_encode($output);
        
        } 
    }
    */


    // strategy code production rejection dropdown and reason count insertion
    /* its moved for pdm
  public function reject_form_func(){
        
    if ($this->request->isAJAX()) {
        // print_r($_POST);

        $reject_reason = $this->request->getVar("reason");
        $reject_count = $this->request->getVar("rcount");
        $note = $this->request->getVar("note");

        $shift = $this->request->getVar('shift');
        $shift_date = $this->request->getVar('shift_date');
        $start_time = $this->request->getVar('start_time');
        $part_id = $this->request->getVar('partid');
        $i = 0;
        $test_arr = array();
        foreach ($reject_reason as $reason) {
                $test_arr[$i] = $reject_count[$i].$reason;
                ++$i;
        }
            $reject_r = implode('&&', $test_arr);
            $total_reject = array_sum($reject_count);
        // echo $total_reject; 
        //echo $reject_r;
            $update['Notes'] = $note;
            $update['Rejection_Reason'] = $reject_r;
            $update['Total_Rejects'] = $total_reject; 
            $update['last_updated_by'] = $this->session->get('user_name');

            $where['shift'] = $shift;
            $where['shift_date'] = $shift_date;
            $where['start_time'] = $start_time;
            $where['part_id'] = $part_id;

          
            $db_rejection = $this->datas->getRejection_count($where);
           foreach($db_rejection as $data){
               $rejection = $data->rejections;
               $production_count = $data->production;
           }
        //    $rejection_count = (int)$rejection + (int)$total_reject;
           $correction_min = (int)$production_count - (int)$total_reject;
           // $update['rejection_count'] = $rejection_count;
           // $update['old_rejection'] = $rejection;
           // $update['new_rejection'] = $total_reject;
           $update['correction_min'] = $correction_min;
           //$update['reject_reason'] = $reject_r;
           //$update['production_count'] = $production_count;
          // $update['reject_count'] = $reject_count;
          // $update['where'] = $where;
           // echo "reasons:\t".$reasons."\nProduction count:\t".$production_count;
            $output = $this->datas->updateRejectData($update,$where);
            echo json_encode($output);   
    }
    
}

    
*/


    // production rejection retrive db data
/*
    public function retrive_reasons(){
       // echo "on";
        // $id = $this->request->getVar("id");
        // $partid = $this->request->getVar("partid");
        if ($this->request->isAJAX()) {
            $ref['part_id'] = $this->request->getVar('partid');
            $ref['from_time'] = $this->request->getVar('from_time');
            $ref['shift_date'] = $this->request->getVar('shift_date');
            $ref['shift'] = $this->request->getVar('shift');
            $res = $this->datas->retrive_multiple_reason($ref);

            foreach($res as $rreason){
                echo $rreason->reject_reason;
            } 
        }
           
       // echo $res->Rejection_Reason; 
    }
*/

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

    // strategy code for forgot password in siteadmin
    /*
    public function forgot_siteadmin_pass(){
        if ($this->request->isAJAX()) {
            $user_id = $this->request->getVar("uid");
            $pass = $this->request->getVar("pass");
            $res = $this->datas->forgot_site_admin_pass($user_id,$pass);
            echo $res;
        }else{
            echo "Data Not Found";
        }
    }*/

    // //Merge all the next--> same data (N))
    // public function production_downtime_retrive(){
    //     $output =  $this->datas->production_downtime_retrive();

    //     // echo "<pre>";
    //     // print_r($output[0]);
    //     // echo ($output[0]['event']);

    //     $i = 0;
    //     $array_demo = array();

    //    while ($i < count($output)-1) {
    //     // echo($i);
    //     // echo "<br>";
    //     if ($output[$i]['event'] == "Active") {
    //         $st = $output[$i]['time'];
    //         $start_arr = explode(":",$st);
    //         $start_hour = $start_arr[0];
    //         $start_min = $start_arr[1];
    //         $start_sec = $start_arr[2];
    //         $minute1 = ($start_hour * 60);
    //         $minute1 =  (int)$minute1 + (int)$start_min;
    //         $j = $i+1;
    //         $en = " ";
    //         $flag = 0;
    //         $shot_count = "";
    //        //$st = "";

            
    //         if ($i == count($output)-1) {
    //             echo $i;
    //         }

    //         while($output[$j]['event'] == "Active"){

    //             $en = $output[$j]['time'];
    //             $j++;
    //             $flag++;
    //         }
    //          $i = $j;
    //          if ($flag == 0) {
    //             $shot_count = 1;
    //             $en = $output[$j]['time'];
    //          }
    //          $end_arr = explode(":",$en);
    //          $end_hour = $end_arr[0];
    //          $end_min = $end_arr[1];
    //          $end_sec = $end_arr[2];
    //          $em1 = (int)$end_hour * 60;
    //          $em1  = (int)$em1 + (int)$end_min;
    //          $duration = (int)$em1 - (int)$minute1;
    //          $shot_count = $flag;
    //         $status = "Active"; 
    //         $ex = array(
    //             // 'machine_id'=>$output[$i]['MACHINE_ID'],
    //             // 'shift_date'=>$output[$i]['DATE'],
    //             'status' => $status,
    //             'start_time' =>  $st,
    //             'end_time' => $en,
    //             //'shot_count' => $shot_count,
    //             'duration' => $duration,
                
    //         );
    //      // $res =   $this->datas->pdm_table_insert($ex);
    //      // echo $res;
    //             array_push($array_demo,$ex);
    //     }else if ($output[$i]['event'] == "Inactive"){
    //         $st = $output[$i]['time'];
    //         $start_arr = explode(":",$st);

    //         $minute1 = (int)$start_arr[0] * 60;
    //         $minute1 = (int)$minute1 + (int)$start_arr[1];
    //         $j = $i+1;
    //         $en = "";
    //         $flag = 0;
    //         $shot_count = "";
    //         while($output[$j]['event'] == "Inactive"){
    //             $en = $output[$j]['time'];
    //             $j++;
    //             $flag++;
    //         }
    //         $i = $j;
    //         if ($flag == 0) {
    //             $shot_count = 1;
    //             $en = $output[$j]['time'];
    //         }
    //         $shot_count = $flag;
    //         $end_arr = explode(":",$en);
            
    //         $end_time = ((int)$end_arr[0] * 60);
    //         $end_time = ((int)$end_time + (int)$end_arr[1]);
    //         $duration = ((int)$end_time - (int)$minute1);
    //         $status = "Inactive";
    //         $ex = array(
    //             // 'machine_id'=>$output[$i]['MACHINE_ID'],
    //             // 'shift_date'=>$output[$i]['DATE'],
    //             'status' => $status,
    //             'start_time' => $st,
    //             'end_time' => $en,
    //             // 'shot_count' => $shot_count,
    //             'duration' => $duration,
    //             );
    //         // $res = $this->datas->pdm_table_insert($ex);
    //         // echo $res;
    //             array_push($array_demo,$ex);
    //     }
    //     else{
    //         $st = $output[$i]['time'];
    //         $start_arr = explode(':',$st);
    //         $start_time = ((int)$start_arr[0] * 60);
    //         $start_time = ((int)$start_time + (int)$start_arr[1]);
    //         $j = $i+1;
    //         $en = "";
    //         $flag = 0;
    //         $shot_count;
    //         while($output[$j]['event'] == "Machine OFF"){
    //             $en = $output[$j]['TIME'];
    //             $j++;
    //             $flag++;
    //         }
    //         $i = $j;
    //         if ($flag == 0) {
    //            $shot_count = 1;
    //             $en = $output[$j]['TIME'];
    //         }
    //         $shot_count = $flag;
    //         $status = "Machine OFF";
    //         $end_arr = explode(':',$en);
    //         $end_time = ((int)$end_arr[0] * 60);
    //         $end_time = ((int)$end_time + (int)$end_arr[1]);
    //         $duration = ($end_time - $start_time);
    //         $ex = array(
    //             // 'machine_id'=>$output[$i]['MACHINE_ID'],
    //             // 'shift_date'=>$output[$i]['DATE'],
    //             'status' => $status,
    //             'start_time' =>$st,
    //             'end_time' => $en,
    //             // 'shot_count' => $shot_count,
    //             'duration' => $duration,
    //             );
    //         // $res =  $this->datas->pdm_table_insert($ex);
    //         // echo $res;
    //         //     array_push($array_demo,$ex);
          
    //     }

    //    }
    //     echo "<pre>";
    //     print_r($array_demo);

    // }
    
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
//    public function unique_multidim_array($array, $key) {
//         $temp_array = array();
//         $i = 0;
//         $key_array = array();
       
//         foreach($array as $val) {
//             if (!in_array($val[$key], $key_array)) {
//                 $key_array[$i] = $val[$key];
//                 $temp_array[$i] = $val;
//             }
//             $i++;
//         }
//         return $temp_array;
//     }


    // function for get the data from the Mongo DB
    public function getRealData(){

        $dataArray = [];
        $realData = array(
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"08:00:00" ,'to_time' =>"08:05:00" ,'event' =>"Machine OFF" ,'duration' =>"5" ,'cumulative_shot_count' =>"0" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"08:05:00" ,'to_time' =>"08:15:00" ,'event' =>"Inactive" ,'duration' =>"5" ,'cumulative_shot_count' =>"0" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"08:10:00" ,'to_time' =>"08:58:55" ,'event' =>"Active" ,'duration' =>"49" ,'cumulative_shot_count' =>"12" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"09:16:00" ,'to_time' =>"09:16:10" ,'event' =>"Inactive" ,'duration' =>"0" ,'cumulative_shot_count' =>"0" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"09:16:10" ,'to_time' =>"09:16:10" ,'event' =>"Inactive" ,'duration' =>"0" ,'cumulative_shot_count' =>"0" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"09:16:10" ,'to_time' =>"09:20:10" ,'event' =>"Active" ,'duration' =>"4" ,'cumulative_shot_count' =>"0" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"09:16:10" ,'to_time' =>"09:20:10" ,'event' =>"Active" ,'duration' =>"4" ,'cumulative_shot_count' =>"0" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"09:20:10" ,'to_time' =>"10:00:00" ,'event' =>"Machine OFF" ,'duration' =>"59" ,'cumulative_shot_count' =>"25" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"10:00:30" ,'to_time' =>"10:00:00" ,'event' =>"Machine OFF" ,'duration' =>"59" ,'cumulative_shot_count' =>"25" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"11:00:00" ,'to_time' =>"11:00:33" ,'event' =>"Inactive" ,'duration' =>"0" ,'cumulative_shot_count' =>"55" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"11:00:33" ,'to_time' =>"13:01:00" ,'event' =>"Active" ,'duration' =>"120" ,'cumulative_shot_count' =>"55" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"13:01:00" ,'to_time' =>"14:30:00" ,'event' =>"Machine OFF" ,'duration' =>"89" ,'cumulative_shot_count' =>"55" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"14:30:00" ,'to_time' =>"14:30:15" ,'event' =>"Inactive" ,'duration' =>"0" ,'cumulative_shot_count' =>"65" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"14:30:15" ,'to_time' =>"15:06:00" ,'event' =>"Active" ,'duration' =>"35" ,'cumulative_shot_count' =>"65" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"15:06:00" ,'to_time' =>"15:28:00" ,'event' =>"Machine OFF" ,'duration' =>"22" ,'cumulative_shot_count' =>"65" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"15:28:00" ,'to_time' =>"15:28:30" ,'event' =>"Inactive" ,'duration' =>"0" ,'cumulative_shot_count' =>"65" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"15:28:30" ,'to_time' =>"16:01:00" ,'event' =>"Active" ,'duration' =>"32" ,'cumulative_shot_count' =>"73" ),
            array('shift_date' => '11-04-2022','machine_id' => '1','shift' => 'A' ,'from_time' =>"16:01:00" ,'to_time' =>"16:01:10" ,'event' =>"Machine OFF" ,'duration' =>"0" ,'cumulative_shot_count' =>"73" )
        );


        // $fromTemp = [];
        // $toTemp = [];
        // $eventTemp =[];
        // $durationTemp = [];
        // $cumulativeShotCount = [];

        // foreach ($variable as $key => $value) {

        //     array_push($fromTemp, var);
        // }
        
        // $tmpArray = array('from_time' =>"08:00:00" ,'to_time' =>"08:05:00" ,'event' =>"Machine OFF" ,'duration' =>"5" ,'cumulative_shot_count' =>"08:00:00" );
        // for ($i=0 ; $i<5 ; $i++){
        //     array_push($dataArray,$tmpArray);
        // }


        $i = 1;
        foreach ($realData as $value) {
            // Filter the data to store in pdm_downtime table
            if ($value['event'] != "Active") {

                $tmpArray = array('machine_event_id' => $i,'shift_date' => $value['shift_date'],'machine_id' => $value['machine_id'],'shift_id' => 'A' ,'start_time' =>$value['from_time'] ,'end_time' =>$value['to_time'] ,'event' =>$value['event'] ,'duration' =>$value['duration'] ,'cumulative_shot_count' =>$value['cumulative_shot_count'], 'is_split' => '0');
                array_push($dataArray,$tmpArray);
                $i = $i+1;
            }

        }

        //for a new data storing take the last tool, part used in tool_cangeover table
        // $l = sizeof($dataArray);
        // $tool_changeover_data = $this->datas->tool_changeover_data($dataArray[0]['shift_date'],$dataArray[$l-1]['start_time'],$dataArray[$l-1]['machine_id']);

        $downtimeMapping = [];
        foreach ($dataArray as $value) {
            // Code for store the data downtime_reason_mapping table
            if ($value['event'] == "Machine OFF") {
                $tmpArray = array('machine_event_id' => $value['machine_event_id'],'split_id' => 0,'downtime_reason_id' => $value['machine_id'],'tool_id' => 'TL1001' ,'part_id' =>'PT1001');
            }
            else{
                $tmpArray = array('machine_event_id' => $value['machine_event_id'],'split_id' => 0,'downtime_reason_id' => "4",'tool_id' => 'TL1001' ,'part_id' =>'PT1001');
            }

            array_push($downtimeMapping, $tmpArray);
        }

        $pdm_downtime_result = $this->datas->pdm_downtime_result($dataArray);
        if ($pdm_downtime_result) {
                $downtime_reason_mapping = $this->datas->downtime_reason_mapping($downtimeMapping);
        }

    }

public function convertMachineData(){
        $machineData = $this->datas->getIotData();
        $machineDataCopy=[];
        $machineMapping=[];
        $eventId = 0;
        // Finding the Event (Active,Inactive,MAchine OFF)
        $f=1;
        $l = sizeof($machineData);
        // echo $machineData[0]['date'];
        
        //$shiftData1=$this->datas->getShift();
        $shiftData=$this->datas->getShiftExact($machineData[0]['date']);

        // echo "<pre>";
        // print_r($shiftData1);

        $machine_event_id = $this->datas->getMachienEvent();
        if ($machine_event_id !=0) {
            $eventId=$machine_event_id;
        }
        $toolChangeoverData = $this->datas->getToolChangeover();
        
        $shift="";
        $sdate = $machineData[0]['date'];
        for($i=0;$i<$l;$i++){   

            if (($machineData[$i]['date']) != ($sdate)) {
                $sdate = $machineData[$i]['date'];
                $shiftData=$this->datas->getShiftExact($machineData[$i]['date']);
            }

            $tmpData = explode(":",$machineData[$i]['time']);
            $tmpvar = ($tmpData[0]*60)+$tmpData[1];
        
            foreach ($shiftData['shift'] as $value) {
                $t = explode(":", $value['start_time']);
                $e = explode(":", $value['end_time']); 
                if ($t[0] == "00") {
                    $tmpVarCheck = (24*60)+$t[1];
                }
                else{
                    $tmpVarCheck = ($t[0]*60)+$t[1];
                }

                if ($e[0] == "00") {
                    $end_time_check = (24*60)+$e[1];
                }
                else{
                    $end_time_check = ($e[0]*60)+$e[1];
                }
                
                
                if (($tmpvar >= $tmpVarCheck) && ($tmpvar<=$end_time_check)) {
                    $shift=$value['shifts'];
                    break;
                }
            }       

            $temp['shift_date'] = $machineData[$i]['date'];
            $temp['time'] = $machineData[$i]['time'];

            $machineSerialId = $this->datas->getMachineSerialConnection();
            foreach ($machineSerialId as $value) {
                if ($value['machine_serial_number'] == $machineData[$i]['machine_id']) {
                    $temp['machine_id'] = $value['machine_id'];
                }
            }            
            
            $x = str_split($shift);
            $temp['shift_id'] = $x[0];
            $temp['is_split'] = 0;
            // $temp['date'] = $machineData[$i]['date'];

            if ($machineData[$i]['downtime']=='FALSE' && $machineData[$i]['machine_status']=='TRUE') {
                $temp['event'] = 'Active';
            }
            else if($machineData[$i]['downtime']=='TRUE' && $machineData[$i]['machine_status']=='TRUE'){
                $temp['event'] = 'Inactive';
            }
            else{
                $temp['event'] = 'Machine OFF';
            }

            if ($f < ($l)) {
                $s = $machineData[$i]['time'];
                $s_tmp = explode(":", $s);

                $e = $machineData[$f]['time'];
                $e_tmp = explode(":", $e);

                $sh=$s_tmp[0];
                $eh=$e_tmp[0];

                //$dh=$eh-$sh;

                $sm=$s_tmp[1];
                $em=$e_tmp[1];
                //$dm=$em-$sm;
                $ss = $s_tmp[2];
                $es = $e_tmp[2];

                $duration = (($eh*60*60)+($em*60)+($es))-(($sh*60*60)+($sm*60)+($ss));

                $tmpDuration =(int)($duration/60);
                $tmpSeconds = ($duration-($tmpDuration*60));
                $temp['duration']= $tmpDuration.".".$tmpSeconds;
                $tstart = explode(":", $machineData[$i]['time']);
                $tend=explode(":",$machineData[$f]['time']);

                $temp['start_time']=$tstart[0].":".$tstart[1].":".$tstart[2];
                $temp['end_time']=$tend[0].":".$tend[1].":".$tend[2];

                $temp['reason_mapped']=0;

                $temp['shot_count']=$machineData[$i]['shot_count'];
                $eventMachine = "ME".(1000+$eventId);
                $temp['machine_event_id'] = $eventMachine;
                $eventId=$eventId+1;

            if ($machineData[$i]['event'] != 'Active') {    
                $tmpMapping['split_id'] = 0;
                if ($machineData[$i]['event'] =="Inactive") {
                    $tmpMapping['downtime_reason_id'] = 4;
                }
                else{
                    $tmpMapping['downtime_reason_id'] = 1;
                }
                $tmpMapping['split_duration'] = $shift;
                $tmpMapping['tool_id'] = $toolChangeoverData[0]['tool_id'];
                $tmpMapping['part_id'] = $toolChangeoverData[0]['part_id'];
                $tmpMapping['machine_event_id'] = $eventMachine;
                $tmpMapping['start_time'] = $temp['start_time'];
                $tmpMapping['end_time'] = $temp['end_time'];
                $tmpMapping['split_duration'] = $temp['duration'];
                $tmpMapping['shift_date']=$temp['shift_date'];
                $tmpMapping['shift_id']=$temp['shift_id'];
                $tmpMapping['machine_id']=$temp['machine_id'];

                array_push($machineMapping, $tmpMapping);
            }
            array_push($machineDataCopy, $temp);
            }
            $f=$f+1;
        }

        // echo "<pre>";
        // print_r($machineMapping);

        echo "<pre>";
        print_r($machineDataCopy);
        // $res = $this->datas->pushRealData($machineDataCopy,$machineMapping);
        // if ($res) {
        //     echo "Insert successfully.....!";
        // }

    }

    public function downtimeCalc(){
        $machineId = 3;
        $getPart = $this->datas->getToolChange($machineId);
        echo "<pre>";
        print_r($getPart);
        echo "<br>";
        echo $getPart[0]['part_id'];
    }

    //mongodb connection
    public function mongoconnect(){
        $res = $this->datas->mongoconnect();
        // echo json_encode($res);
    }
    
    // oee drill down

      public function convertMachineId($machine){
        // echo "<pre>";
        // print_r($machine);
        // foreach ($machine as $key => $value) {
        //     $tmp = explode("C", $value['machine_id']);
        //     $machine[$key]['machine_id'] = ($tmp[1]-1000);
        // }
        return $machine;
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
