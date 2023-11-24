<?php

namespace App\Models;
use CodeIgniter\Model;
// use App\Models\puppyModel;
//use App\Libraries\Mongo;
use App\Libraries\MongoDb;

class MainModel extends Model{
    protected $site_connection;
    protected $session;
    /*8
    public function __construct() {
        $this->session = \Config\Database::connect();
        $db_name1 = $this->session->get('active_site');
        if ($db_name1 == "") {
            $db_name = 's1001';
        }else{
            $db_name = $db_name1;
        }
        $this->site_connection = [
                    'DSN'      => '',
                    'hostname' => 'localhost',
                    'username' => 'root',
                    'password' => '',
                    'database' => ''.$db_name1.'',
                    //'database' => 'dub',
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
    }
*/
    public function getMachineRealData()
    {
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('machine_data');
        $query->select('*');
        // $query->where('date','2022-06-01');
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function getMachineRealDataPDM($date,$time)
    {
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('machine_data');
        $query->select('*');
        $query->where('date >=',$date);
        $query->where('time >=',$time);
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function pushRealData($machineDataCopy,$machineMapping){
        $db = \Config\Database::connect();
        $query = $db->table('pdm_events');
        $i = 0;
        $j=0;

        $k =sizeof($machineDataCopy);

        foreach ($machineDataCopy as $value) {
            if($query->insert($value)){
                $i = $i+1;
                // sleep(0.2);
                if ($j <$k) {
                    $build = $db->table('pdm_downtime_reason_mapping');
                    if ($build->insert($machineMapping[$j])) {
                        $j = $j+1;
                    }
                }
                

            }
        }
        if ($i == sizeof($machineDataCopy)) {

        //     $build = $db->table('pdm_downtime_reason_mapping');
        //     $j = 0;
        //     foreach ($machineMapping as $val) {
        //         if($build->insert($val)){
        //             $j = $j+1;
        //             // sleep(0.2);
        //         }
        //     }
        //     if ($j == sizeof($machineMapping)) {
                return true;
        //     }
        //     else{
        //         return false;
        //     }
        }
        else{
            return false;
        }
    }
    

    public function RejectionStore($data,$partsProduced)
    {

        $data['max_counts'] = $partsProduced;
        $data['reject_counts'] = 0;

        $db = \Config\Database::connect();
        $builder = $db->table('pdm_rejections');
        $builder->insert($data);
        return;
    }
    public function CorrectionStore($data,$partsProduced)
    {
        $data['min_counts'] = -($partsProduced);
        $data['correction_counts'] = 0;

        $db = \Config\Database::connect();
        $builder = $db->table('pdm_corrections');
        $builder->insert($data);
        return;
    }
    // public function findShift($start)
    // {
    //     $db = \Config\Database::connect();
    //     $query = $db->table('shift_management');
    //     $query->select('shift_log_id');
    //     //$query->where('status',1);
    //     $res = $query->get()->getResultArray();

    //     $table = $res[0]['shift_log_id'];
    //     $builder = $db->table(''.$table.'');
    //     $builder->select('Shifts');
    //     $builder->where('start_time >=',$start);
    //     $builder->where('end_time <=',$start);
    //     $resShift = $builder->get()->getResultArray();
    //     return $resShift;
    // }

/**
    public function getSiteId(){
        $db = \Config\Database::connect();
        $query = $db->table('site');
        $query->select('Site_ID');
        $query->orderBy('Last_Updated_On', 'DESC');
        $res = $query->get()->getResultArray();
        return $res;

    }
**/
    public function getMachineId(){
        $db = \Config\Database::connect();
        $query = $db->table('settings_machine_current');
        $query->select('machine_id');
        //$query->orderBy('Last_Updated_On', 'DESC');
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function production_downtime_retrive(){
        $db = \Config\Database::connect();
        $query = $db->table('machine_data');
        $query->select('*');
        //$query->orderBy('Last_Updated_On', 'DESC');
        $res = $query->get()->getResultArray();
        return $res;
    }
/*
its moved for settings model
    public function getToolId(){
        $db = \Config\Database::connect();
        $query = $db->table('settings_tool_table');
        $query->select('tool_id');
        //$query->orderBy('Created_On', 'DESC');
        $res = $query->get()->getResultArray();
        return $res;
    }
    */
    /*
    its moved for settings model
    public function getPartId(){
        $db = \Config\Database::connect();
        $query = $db->table('settings_part_current');
        $query->select('part_id');
        // $query->orderBy('Last_Updated_On', 'DESC');
        $res = $query->get()->getResultArray();
        return $res;
    }*/
    /*
    public function getDowntimeImgId(){
        $db = \Config\Database::connect();
        $query = $db->table('settings_downtime_reasons');
        $query->select('image_id');
        $res = $query->get()->getResultArray();
        return $res;
    }
    */
    /*
    public function getQualityImgId(){
        $db = \Config\Database::connect();
        $query = $db->table('settings_quality_reasons_images');
        $query->select('image_id');
        $res = $query->get()->getResultArray();
        return $res;
    }
    */
/*
    public function settings_tools()
    {
        $db = \Config\Database::connect();
        // $query = $db->table('settings_part_current');
        // $query->select('*');
        // //$query->orderBy('Last_Updated_On', 'DESC');
        // $res = $query->get()->getResultArray();
        // return $res;


        $builder = $this->db->table("settings_part_current as s");
        $builder->select('s.*, t.tool_name');
        $builder->join('settings_tool_table as t', 't.tool_id = s.tool_id');
        $data = $builder->get()->getResult();
        return $data;
    }*/
    
    public function getSiteData($site){
        // $db = \Config\Database::connect();
        // $query = $db->table('settings_quality_reasons_images');
        // $query->select('image_id');
        // $res = $query->get()->getResultArray();
        // return $res;
    }

    public function getMachineSerialConnection(){
        $db = \Config\Database::connect();
        $builder = $db->table('settings_machine_current');   
        $builder->select('machine_serial_number,machine_id');
        $query = $builder->get()->getResultArray();     
        return $query;
    }

    public function add_Machine($machineData)
    {
        $db = \Config\Database::connect();
        $topic = "location"."/"."site"."/".$machineData['machine_serial_number'];
        $iot = array(
            'machine_id' => $machineData['machine_id'], 
            'iot_gateway_topic' => $topic,
            // 'site_id' => ,
            // 'location_id' =>,
            'last_updated_by' => $machineData['last_updated_by']
        );
        $query = $db->table('settings_machine_iot');
        if ($query->insert($iot)) {
            $build = $db->table('settings_machine_log');
            if($build->insert($machineData)){
                $builder = $db->table('settings_machine_current');
                if($builder->insert($machineData)){
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
            return false;
        }
    }

    
    /*
    it moved for settings model

    public function createTable($tmp,$duration,$data,$last_updated_by){
            $db = \Config\Database::connect(); 
            $t = $tmp[1]+1;
            if ($t<=9) {
                $tName = ""."sf".sprintf('%02s',($tmp[1]+1))."";
            }
            else{
                $tName = ""."sf".($tmp[1]+1)."";
            }
            // return $tmp;
            // $tName = "sf".($tmp[1]+1);
            // return $tName;
            $query =$db->table('settings_shift_management');
            $t= array("shift_log_id"=>$tName,"start_time"=>$data[0],"duration"=>$duration,"last_updated_by"=>$last_updated_by);
            // return true;
            if ($query->insert($t)) {
                $s =["A","B","C","D","E","F","G","H","I","J"];
                $l = sizeof($data);
                $builder =$db->table('settings_shift_table');
                $j=0;
                $k=0;
                for ($i=0; $i<($l-1) ; $i=$i+2) { 
                    if (($tmp[1]+1)<=9) {
                        $shiftTemp = "".$s[$k].sprintf('%02s',($tmp[1]+1))."";
                    }
                    else{
                        $shiftTemp = "".$s[$k].($tmp[1]+1)."";
                    }
                    // echo $shiftTemp;
                    $tm = array("shifts"=>$shiftTemp,"start_time"=>$data[$i],"end_time"=>$data[$i+1]);
                    $builder->insert($tm);
                    $j=$j+1;
                    $k=$k+1;
                }
                if ($j == (sizeof($data)/2)) {
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
    
    /*
    it moved for settings model
    public function updateShift($shift_start,$hour,$shift,$last_updated_by){   
        $db = \Config\Database::connect();   
        $builder = $db->table('settings_shift_management');
        $builder->select('*');
        $builder->where('start_time', $shift[0]);
        $builder->where('duration', $hour);
        // $builder->where('start_time', "06:90");
        // $builder->where('duration', "08:00");
        $query = $builder->get()->getResultArray();
        if ($query == null) {
            $build = $db->table('settings_shift_management');
            $build->select('shift_log_id');
            $build->orderBy('last_updated_on', 'DESC');
            $build->limit(1);
            $queryShift = $build->get()->getResultArray();

            if ($queryShift == null) {
                $tmp = explode("f", "sf00");
            }
            else{
                $tmp = explode("f", $queryShift[0]['shift_log_id']);
            }
            // return $tmp; 
            //return $this->createTable($tmp,$hour,$shift);
            if($res=$this->createTable($tmp,$hour,$shift,$last_updated_by)){
                // return true;
                return $res;
            }
            else{
                return false;
            }
        }
        else{
            $con =$db->table('settings_shift_management');
            $t= ['shift_log_id' => $query[0]['shift_log_id'],
                 'start_time' => $query[0]['start_time'],
                 'duration'=>$query[0]['duration'],
                 'last_updated_by'=>$last_updated_by
                ];
            if($con->insert($t)){
             return true;
            }else{
                return false;
            }
           
        }
    }
*/

    public function getMachineDate($machine){
        $db = \Config\Database::connect();
        $builder = $db->table('pdm_production_info');   
        $builder->select('shift_date');
        $builder->where('machine_id', $machine);
        $query = $builder->distinct()->get()->getResultArray();     
        return $query;
    }
    
    public function down_sample($from,$to){
        $db = \Config\Database::connect();
        $builder = $db->table('temp_downtime_calc_data');   
        $builder->select('*');
        $builder->where('date >=', $from);
        $builder->where('date <=', $to);
        $query = $builder->get()->getResultArray();     
        return $query;
    }
    public function CorrectionRejectStore($data)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('pdm_production_info');
        $builder->select('production_event_id');
        $builder->orderBy('r_no', 'DESC');
        $res = $builder->get()->getResultArray();

        if ($res == null) {
            $data['production_event_id']="PE1000";
        }
        else{
            $temp = explode("E", $res[0]['production_event_id']);
            $id = (int)$temp[1]+1;
            $data['production_event_id'] = "PE".$id;
        }

        $query = $db->table('pdm_production_info');
        if ($query->insert($data)) {
            echo "Inserted Successfully!<br>";
            return true;
        }
        else{
            return false;
        }

    }

    public function getPartToolchangeover(){
        $db = \Config\Database::connect();
        $builder = $db->table('pdm_tool_changeover_log');
        $builder->select('tool_id,part_id');
        $builder->orderBy('machine_id', 'DESC');
        $res = $builder->get()->getResultArray();
        return $res;
    }
    public function production_sample($from,$to){
        $db = \Config\Database::connect();
        $builder = $db->table('temp_production_calc_data');   
        $builder->select('*');
        $builder->where('date >=', $from);
        $builder->where('date <=', $to);
        $query = $builder->get()->getResultArray();     
        return $query;
    }
    public function part_sample(){
        $db = \Config\Database::connect();
        $builder = $db->table('settings_part_current');   
        $builder->select('*');
        $query = $builder->get()->getResultArray();     
        return $query;
    }
    
    //alternate function there
    // public function getShiftData(){
    //     $db = \Config\Database::connect();
    //     $SFM = $db->table('shift_management');
    //     $SFM->orderBy('last_updated_on', 'DESC');
    //     $SFM->limit(1);
    //     $SFM->select('*');
    //     $query = $SFM->get()->getResultArray();

    //     // echo $query[0]['shift_log_id'];
    //     $id = strtolower("SF01");
    //     $table = $db->table($id);
    //     $table->select('*');
    //     $val['shift'] = $table->get()->getResultArray();
    //     $val['duration'] = $query[0]['duration'];
    //     return $val;
    // }

    public function pdm_downtime_result($data){
        // echo "<pre>";
        // print_r($data);
        $db = \Config\Database::connect();
        $builder = $db->table('pdm_downtime');
        // $builder->select('*');
        // $val = $builder->get()->getResultArray();
        $i = 0;
        foreach ($data as $value) {
            if($builder->insert($value)){
                $i = $i+1;
            }
        }
        if ($i == sizeof($data)) {
            return true;
        }
        else{
            return false;
        }
    }

    public function downtime_reason_mapping($data){
        $db = \Config\Database::connect();
        $builder = $db->table('pdm_downtime_reason_mapping');
        $i = 0;
        // echo "<pre>";
        // print_r($data);
        foreach ($data as $value) {
            if($builder->insert($value)){
                $i = $i+1;
            }
        }
        if ($i == sizeof($data)) {
            return true;
        }
        else{
            return false;
        }
    }

    public function tool_changeover_data($date,$start_time,$machine_id){
        //echo $machine;
        $db = \Config\Database::connect();
        $builder = $db->table('pdm_tool_changeover_log');
        $builder->select('*');
        $builder->where('shift_date', $date);
        $builder->where('start_time', $start_time);
        $builder->where('machine_id', $machine_id);
        $query = $builder->get()->getResultArray();
        return $query;
    }



    /**
    public function addSiteData($siteData){
        $db = \Config\Database::connect();
        $builder = $db->table('site');
        if($builder->insert($siteData)){
            return true;
        }
        else{
            return false;
        }
    }
**/
/*
its moved for settings model

    public function addToolData($toolData){
        //return $toolData;
        $db = \Config\Database::connect();
        $query = $db->table('settings_tool_table');
        if($query->insert($toolData)) {
            return true;
        }
        else{
            return false;
        }
    }
    */

    public function add_Tool($partData,$tData)
    {
        $db = \Config\Database::connect();
        if (!empty($tData)) {
            $query = $db->table('settings_tool_table');
            if($query->insert($tData)) {
                $builder = $db->table('settings_part_current');
                if($builder->insert($partData)){
                    $build = $db->table('settings_part_log');
                    if($build->insert($partData)){
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
                return false;
            }
        }
        else{
            $builder = $db->table('settings_part_current');
            if($builder->insert($partData)){
                $build = $db->table('settings_part_log');
                if($build->insert($partData)){
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
    }

    public function deactivateMachine($machine_id,$status,$uData)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('settings_machine_current');
        if ($status == 0) {
            $builder->set('status', 1);
            $uData['status'] = 1;
        }
        else{
            $builder->set('status', 0);
            $uData['status'] = 0;
        }
        // $builder->set('Last_Updated_By', $uData['Last_Updated_By']);
        $builder->where('machine_id', $machine_id);
        if($builder->update()){
            $build = $db->table('settings_machine_log');
            if($build->insert($uData)){
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

    public function getMachineData($record){
        $db = \Config\Database::connect();
        $SFM = $db->table('settings_machine_current');
        $SFM->select('*');
        $SFM->where('machine_id', $record);
        $query = $SFM->get()->getResultArray();

        $data['machine'] = $query;
        $data['last_updated_by']  = $this->get_last_updated_username($query[0]['last_updated_by']);
        return $data;
    }
    public function getIotData(){
        $db = \Config\Database::connect();
        $SFM = $db->table('machine_data');
        $SFM->select('*');
        $query = $SFM->get()->getResultArray();
        return $query;
    }

    /**
    public function getSiteData($record){
        $db = \Config\Database::connect();
        $SFM = $db->table('site');
        $SFM->select('*');
        $SFM->where('Site_ID', $record);
        $query = $SFM->get()->getResultArray();
        return $query;
    }
    public function getSiteName($user,$role){
        $db = \Config\Database::connect();
        if ($role == "Smart User") {
            $builder = $db->table('site');
            $builder->select('Site_ID');
            $builder->select('Site_Name');
            $builder->where('Last_Updated_By',$user);
            $query =$builder->get()->getResultArray();
            return $query;
        }
        else if($role == "Site Admin"){
            $builder = $db->table('users_management');
            $builder->select('*');
            $builder->where('User_Name',$user);
            $query =$builder->get()->getResultArray();

            //selecte sites for 
            $build = $db->table('site');
            $build->select('Site_ID');
            $build->select('Site_Name');
            $res =$build->where('Site_ID',$query[0]['Site_ID'])->get()->getResultArray();
            return $res;

        }
        else if($role == "Smart Admin"){
            $builder = $db->table('site');
            $builder->select('Site_ID');
            $query =$builder->select('Site_Name')->get()->getResultArray();
            return $query;
        }
    }
    public function getBrandName(){
        $db = \Config\Database::connect();
        $builder = $db->table('settings_site_machine');
        $query = $builder->select('Machine_Brand')->distinct()->get()->getResultArray();
        return $query;
    }
    public function getUserName(){
        $db = \Config\Database::connect();
        $builder = $db->table('settings_site_machine');
        $query = $builder->select('Created_By')->distinct()->get()->getResultArray();
        return $query;
    }
    public function getSite($record){
        $db = \Config\Database::connect();
        $SFM = $db->table('site');
        $SFM->select('*');
        $SFM->where('Site_ID', $record);
        $query = $SFM->get()->getResultArray();
        return $query;
    }
    public function EditUserRoleMaster($record){
        $db = \Config\Database::connect();
        $SFM = $db->table('roles_master');
        $SFM->select('*');
        $SFM->where('User_Name', $record);
        $query = $SFM->get()->getResultArray();
        return $query;
    }
    
    // public function getSite_Admin($record){
    //     $builder = $this->db->table("site as s");
    //       $builder->select('s.*, corrt.Total_Correction, rejt.Total_Rejects,machine.*');
    //       $builder->join('corrections as corrt', 'part.Part_ID = corrt.Part_Id');
    //       $builder->join('quality_rejects as rejt', 'part.Part_ID = rejt.Part_Id');
    //       $data = $builder->get()->getResult();
    //       return $data;
    // }

**/

/*
its moved for settings controller
    public function aIaMachine(){
        $db = \Config\Database::connect();
        $SFM = $db->table('settings_machine_current');
        //$SFM->select('*');
        $query['Active'] = $SFM->select('*')->where('status', 1)->countAllResults();
        $query['InActive'] = $SFM->select('*')->where('status', 0)->countAllResults();
        return $query;
    }
*/

/*
    public function deactivateTool($record,$status,$uData)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('settings_part_current');
        if ($status == 0) {
            $builder->set('status', 1);
            $uData['status'] = 1;
        }
        else{
            $builder->set('status', 0);
            $uData['status'] = 0;
        }
        $builder->where('part_id', $record);
        if($builder->update()){
            $build = $db->table('settings_part_log');
            if($build->insert($uData)){
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
    */

    public function getMachienEvent(){
        $db = \Config\Database::connect();
        $builder = $db->table('settings_tool_table');
        $res= $builder->select('machine_event_id')->countAllResults();
        return $res;
    }
     public function getToolChangeover(){
        $db = \Config\Database::connect();
        $builder = $db->table('pdm_tool_changeover_log');
        $builder->select('*');
        $builder->orderBy('time', 'DESC');
        $builder->limit(1);
        $query = $builder->get()->getResultArray();
        return $query;
    }


    public function getToolChange($machine_id){
        $db = \Config\Database::connect();
        $builder = $db->table('pdm_tool_changeover_log');
        $builder->select('*');
        $builder->where('machine_id',$machine_id);
        $builder->orderBy('time', 'DESC');
        $builder->limit(1);
        $query = $builder->get()->getResultArray();
        return $query;
    }


    //public function getToolName($user,$role){
    
    

    /**

    public function getMaterialName(){
        $db = \Config\Database::connect();
        $builder = $db->table('settings_site_part');
        $query = $builder->select('Material_Name')->distinct()->get()->getResultArray();
        return $query;
    }
    **/
    /*
    its moved for settings model
    public function getTool($record){
        $db = \Config\Database::connect();
        $SFM = $db->table('settings_tool_table');
        $SFM->select('*');
        $SFM->where('tool_id',$record);
        $query = $SFM->get()->getResultArray();
        //echo $query;
        return $query;
    }
    */
   /* 
   its moved for settings model
    public function getToolData($Pid){
        $db = \Config\Database::connect();
        // $SFM = $db->table('settings_part_current');
        // // $SFM->select('*');
        // $SFM->where('part_id', $Pid);
        // $query = $SFM->get()->getResultArray();
        $builder = $this->db->table("settings_part_current as s");
        $builder->select('s.*, t.tool_name');
        $builder->where('part_id', $Pid);
        $builder->join('settings_tool_table as t', 't.tool_id = s.tool_id');
        $query = $builder->get()->getResultArray();
        $data['tool'] = $query;
        $data['last_updated_by'] = $this->get_last_updated_username($query[0]['last_updated_by']);
        return $data;
    }
*/
    public function aIaTool(){
        $db = \Config\Database::connect();

        $SFM = $db->table('settings_part_current');
        $query['Active'] = $SFM->select('*')->where('status', 1)->countAllResults();
        $query['InActive'] = $SFM->select('*')->where('status', 0)->countAllResults();
        return $query;
    }
/**
    public function getFilterData($FilterData)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('settings_site_machine');
        $builder->select('*');
        if($FilterData['Site'] != 'all'){
            $builder->where('Site_Name', $FilterData['Site']);
        }
        if($FilterData['Brand'] != 'all'){
            $builder->where('Machine_Brand', $FilterData['Brand']);
        }
        if($FilterData['Status'] != 'all'){
            $builder->where('Status', $FilterData['Status']);
        }
        if($FilterData['LastUpdatedBy'] != 'all'){
            $builder->where('Created_By', $FilterData['LastUpdatedBy']);
        }
        if($FilterData['FromDate']){
            $builder->where('Created_Date >=', $FilterData['FromDate']);
        }
        if($FilterData['ToDate']){
            $builder->where('Created_Date <=', $FilterData['ToDate']);
        }
        if($FilterData['filterMachineRateHourR'] != 'all'){
            if ($FilterData['filterMachineRateHourR'] == '<') {
                $builder->where('Machine_Rate_Hour <=', $FilterData['filterMachineRateHourOp']);
            }
            else if ($FilterData['filterMachineRateHourR'] == '>') {
                $builder->where('Machine_Rate_Hour >=', $FilterData['filterMachineRateHourOp']);
            }
            else{
                $builder->where('Machine_Rate_Hour', $FilterData['filterMachineRateHourOp']);
            }
        }
        if($FilterData['filterMachineOffRateR'] != 'all'){
            if ($FilterData['filterMachineOffRateR'] == '<') {
                $builder->where('Machine_OFF_Rate_Hour <=', $FilterData['filterMachineOffRateOp']);
            }
            else if ($FilterData['filterMachineOffRateR'] == '>') {
                $builder->where('Machine_OFF_Rate_Hour >=', $FilterData['filterMachineOffRateOp']);
            }
            else{
                $builder->where('Machine_OFF_Rate_Hour', $FilterData['filterMachineOffRateOp']);
            }
        }

        $query = $builder->get();
        $var = $query->getResultArray();
        return $var;
    }
    public function getFilterDataPart($FilterData)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('settings_site_part');
        $builder->select('*');
        if($FilterData['FilterToolName'] != 'all'){
            $builder->where('Tool_Name', $FilterData['FilterToolName']);
        }
        if($FilterData['FilterMaterialName'] != 'all'){
            $builder->where('Material_Name', $FilterData['FilterMaterialName']);
        }
        if($FilterData['Status'] != 'all'){
            $builder->where('Status', $FilterData['Status']);
        }
        if($FilterData['LastUpdatedBy'] != 'all'){
            $builder->where('Created_By', $FilterData['LastUpdatedBy']);
        }
        if($FilterData['FromDate']){
            $builder->where('Created_Date >=', $FilterData['FromDate']);
        }
        if($FilterData['ToDate']){
            $builder->where('Created_Date <=', $FilterData['ToDate']);
        }
        if($FilterData['FilterPartPriceR'] != 'all'){
            if ($FilterData['FilterPartPriceR'] == '<') {
                $builder->where('Part_Price <=', $FilterData['FilterPartPriceOp']);
            }
            else if ($FilterData['FilterPartPriceR'] == '>') {
                $builder->where('Part_Price >=', $FilterData['FilterPartPriceOp']);
            }
            else{
                $builder->where('Part_Price', $FilterData['FilterPartPriceOp']);
            }
        }
        if($FilterData['FilterMaterialPriceR'] != 'all'){
            if ($FilterData['FilterMaterialPriceR'] == '<') {
                $builder->where('Material_Price <=', $FilterData['FilterMaterialPriceOp']);
            }
            else if ($FilterData['FilterMaterialPriceR'] == '>') {
                $builder->where('Material_Price >=', $FilterData['FilterMaterialPriceOp']);
            }
            else{
                $builder->where('Material_Price', $FilterData['FilterMaterialPriceOp']);
            }
        }
        if($FilterData['FilterNICTR'] != 'all'){
            if ($FilterData['FilterNICTR'] == '<') {
                $builder->where('NICT <=', $FilterData['FilterNICTS']);
            }
            else if ($FilterData['FilterNICTR'] == '>') {
                $builder->where('NICT >=', $FilterData['FilterNICTS']);
            }
            else{
                $builder->where('NICT', $FilterData['FilterNICTS']);
            }
        }

        $query = $builder->get();
        $var = $query->getResultArray();
        return $var;
    }
    **/
    public function editMachineData($machineData,$machine_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('settings_machine_log');
        if($builder->insert($machineData)){
            $build = $db->table('settings_machine_current');
            if (!empty($machineData['status'])) {
                $build->set('status', $machineData['status']);
            }
            if (!empty($machineData['machine_name'])) {
                $build->set('machine_name', $machineData['machine_name']);
            }
            if (!empty($machineData['rate_per_hour'])) {
                $build->set('rate_per_hour', $machineData['rate_per_hour']);
            }
            if (!empty($machineData['machine_offrate_per_hour'])) {
                $build->set('machine_offrate_per_hour', $machineData['machine_offrate_per_hour']);
            }
            if (!empty($machineData['tonnage'])) {
                $build->set('tonnage', $machineData['tonnage']);
            }
            if (!empty($machineData['machine_brand'])) {
                $build->set('machine_brand', $machineData['machine_brand']);
            }
            $build->where('machine_id', $machine_id);
            if($build->update()){
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

    /**

    public function getUpdateSiteData($data){
        $db = \Config\Database::connect();
        $builder = $db->table('site');
        $builder->set('IsAdmin', 1);
        $builder->where('Site_ID', $data);
        if($builder->update()){
            return true;
        }
        else{
            return false;
        }
    }
    **/
    /*
    its moved for settings model
    public function editToolData($ToolData)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('settings_part_log');
        if($builder->insert($ToolData)){
            $part_id = $ToolData['part_id'];
            $build = $db->table('settings_part_current');
            if (!empty($ToolData['status'])) {
                $build->set('status', $ToolData['status']);
            }
            if (!empty($ToolData['part_name'])) {
                $build->set('part_name', $ToolData['part_name']);
            }
            if (!empty($ToolData['tool_id'])) {
                $build->set('tool_id', $ToolData['tool_id']);
            }
            if (!empty($ToolData['NICT'])) {
                $build->set('NICT', $ToolData['NICT']);
            }
            if (!empty($ToolData['part_produced_cycle'])) {
                $build->set('part_produced_cycle', $ToolData['part_produced_cycle']);
            }
            if (!empty($ToolData['part_price'])) {
                $build->set('part_price', $ToolData['part_price']);
            }
            if (!empty($ToolData['part_weight'])) {
                $build->set('part_weight', $ToolData['part_weight']);
            }
            if (!empty($ToolData['material_name'])) {
                $build->set('material_name', $ToolData['material_name']);
            }
            if (!empty($ToolData['material_price'])) {
                $build->set('material_price', $ToolData['material_price']);
            }
            if (!empty($ToolData['last_updated_by'])) {
                $build->set('last_updated_by', $ToolData['last_updated_by']);
            }
            $build->where('part_id', $part_id);
            if($build->update()){
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

*/
    /*
    it moved for settings model

    public function getGoalsFinancialData(){
        $db = \Config\Database::connect();
        $SFM = $db->table('settings_financial_metrics_goals');
        $SFM->orderBy('last_updated_on', 'DESC');
        $SFM->limit(1);
        $SFM->select('*');
        $query = $SFM->get()->getResultArray();
        return $query;
    }
    
/**
    public function getSiteUser($user){
        $db = \Config\Database::connect();
        $SFM = $db->table('users_management');
        $SFM->select('*');
        $SFM->where('User_Name', $user);
        $query = $SFM->get()->getResultArray();

        $array = array();
        if ($query[0]['Role'] != "Smart Admin") {
            //Management User
            $builder = $this->db->table("users_management as u");
            $builder->select('u.*, s.Site_Name');
            for ($x = 0; $x < sizeof($query); $x++) {
                $builder->orWhere('u.Site_ID',$query[$x]['Site_ID']);
            }
            //$builder->where("u.Role !=","Smart User");
            $builder->join('site as s', 'u.Site_ID = s.Site_ID','left');
            $builder->distinct();
            $data = $builder->get()->getResult();

            //Operator User
            $build = $this->db->table("users_operator as o");
            $build->select('o.*, s.Site_Name');
            for ($x = 0; $x < sizeof($query); $x++) {
                $build->orWhere('o.Site_ID',$query[$x]['Site_ID']);
            }
            $build->join('site as s', 'o.Site_ID = s.Site_ID');
            $build->distinct();

            $dataOpr = $build->get()->getResult();

            //Remove Smart Users
            $dataArray =json_decode(json_encode($data), true);
            $size = sizeof($dataArray);
            //$array = array(); 
            for ($x = 0; $x < $size ; $x++) {
                    if ($dataArray[$x]['Role'] != "Smart User"|| $dataArray[$x]['Role'] != "Smart Admin") {
                        array_push($array,$dataArray[$x]);
                    }
            }

            $dataArrayOpr =json_decode(json_encode($dataOpr), true);
            $sizeOpr = sizeof($dataArrayOpr);
            for ($x = 0; $x < $sizeOpr ; $x++) {
                array_push($array,$dataArrayOpr[$x]);
            }
        }
        else{

            $builder = $this->db->table("users_management as u");
            $builder->select('u.*, s.Site_Name');
            $builder->orderBy('Last_Updated_On', 'DESC');
            $builder->join('site as s', 'u.Site_ID = s.Site_ID','left');
            $dataUM = $builder->get()->getResult();
            $dataArray =json_decode(json_encode($dataUM), true);

            $build = $this->db->table("users_operator as u");
            $build->select('u.*, s.Site_Name');
            $build->orderBy('Last_Updated_On', 'DESC');
            $build->join('site as s', 'u.Site_ID = s.Site_ID');
            $dataUO = $build->get()->getResult();
            $dataArrayOpr =json_decode(json_encode($dataUO), true);

            $sizeUM = sizeof($dataArray);
            $sizeUO = sizeof($dataArrayOpr);
            for ($x = 0; $x < $sizeUM ; $x++) {
                if ($dataArray[$x]['Role'] != "Smart Admin") {
                    array_push($array,$dataArray[$x]);
                }
            }
            for ($x = 0; $x < $sizeUO ; $x++) {
                array_push($array,$dataArrayOpr[$x]);
            }
        }
        return $array;

    }
    public function getUserSiteData($user){
        $db = \Config\Database::connect();
        $SFM = $db->table('users_management');
        $SFM->select('*');
        $SFM->where('User_Name', $user);
        $query = $SFM->get()->getResultArray();

        $ref = $query[0]['Site_ID'];

        $builder = $this->db->table("users_management as u");
        $builder->select('s.Site_Name,s.Site_ID,s.Site_Location');
        $builder->where('u.Site_ID', $ref);
        $builder->join('site as s', 'u.Site_ID = s.Site_ID');
        $data = $builder->get()->getResult();
        return $data;

    }
    
    public function checkOperator($user,$userId){
        $db = \Config\Database::connect();
        $SFM = $db->table('users_management');
        $SFM->select('*');
        $SFM->where('User_Name', $user);
        $query = $SFM->get()->getResultArray();

        $ref = $query[0]['Site_ID'];

        $build = $db->table('users_operator');
        $build->select('*');
        $build->where('User_Name', $userId);
        $build->where('Site_ID', $ref);
        $res = $build->get()->getResultArray();
        return $res;
    }
**/

/* it moved for settings model
    public function getDowntimeTData(){
        $db = \Config\Database::connect();
        $SFM = $db->table('settings_downtime_threshold');
        $SFM->orderBy('last_updated_on', 'DESC');
        $SFM->limit(1);
        $SFM->select('*');
        $query = $SFM->get()->getResultArray();
        return $query;
    }
    */
    /*
    it moved for settings model
    public function editGFMData($Data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('settings_financial_metrics_goals');
        if($builder->insert($Data)){
            return true;
        }
        else{
            return false;
        }
    }*/
    /*
    it moved for settings model
    public function editDTData($Data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('settings_downtime_threshold');
        if($builder->insert($Data)){
                return true;
        }
        else{
            return false;
        }
    }
   */
/*
    public function uploadReasons($Data,$reason)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('settings_downtime_reasons_images');
        if($builder->insert($Data)){
            $query = $db->table('settings_downtime_reasons');
            $query->select('downtime_reason_id');
            $res = $query->countAllResults();

            $reasonId = $res+1;
            $reason = array(
                "downtime_reason_id"=>$reasonId,
                "downtime_category"=>$reason['downtime_category'],
                "downtime_reason"=>$reason['downtime_reason'],
                "image_id"=>$Data['image_id'],
                "last_updated_by"=>$reason['last_updated_by'],
                "is_default" =>'1'
            );
            $query = $db->table('settings_downtime_reasons');
            if($query->insert($reason)){
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
*/

    /*
public function updateReasons($Data,$Record_No)
    {
        $db = \Config\Database::connect();
        $build = $db->table('settings_downtime_reasons');
        if ($Record_No['Changes'] == 0) {
            $build->set('downtime_reason', $Data['downtime_reason']);
            $build->set('downtime_category', $Data['downtime_category']);
            $build->set('last_updated_by', $Data['last_updated_by']);
            $build->where('image_id', $Record_No['r_no']);
            if($build->update($Data)){
                    return true;
            }
            else{
                return false;
            }
        }
        else{
            $builder = $db->table('settings_downtime_reasons_images');
            $builder->set('original_file_name', $Data['original_file_name']);
            $builder->set('original_file_extension', $Data['original_file_extension']);
            $builder->set('original_file_size_kb', $Data['original_file_size_kb']);
            $builder->set('uploaded_file_location', $Data['uploaded_file_location']);
            $builder->set('uploaded_file_name', $Data['uploaded_file_name']);
            $builder->set('uploaded_file_extension', $Data['uploaded_file_extension']);
            $builder->where('image_id', $Record_No['r_no']);
            if($builder->update()){
                $build = $db->table('settings_downtime_reasons');
                $build->set('last_updated_by', $Data['last_updated_by']);
                $build->where('image_id', $Record_No['r_no']);
                if($build->update()){
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
    }
    */
/*
    it moved for settings model
    public function UpdateQuality($Data,$Record_No)
    {
        $db = \Config\Database::connect();
       
        if ($Record_No['Changes'] == 0) {
            $build1 = $db->table('settings_quality_reasons');
            $build1->set('quality_reason_name',$Data['quality_reason']);
            $build1->set('last_updated_by',$Data['last_updated_by']);
            $build1->where('image_id', $Record_No['r_no']);
            if ($build1->update()) {
                return true;
            }else{
                return false;
            }

            //return "ok";

        }
        else{
            $build = $db->table('settings_quality_reasons_images');
            // $build->set('quality_reason', $Data['quality_reason']);
            $build->set('original_file_name', $Data['original_file_name']);
            $build->set('original_file_extension', $Data['original_file_extension']);
            $build->set('original_file_size_kb', $Data['original_file_size_kb']);
            $build->set('uploaded_file_location', $Data['uploaded_file_location']);
            $build->set('uploaded_file_name', $Data['uploaded_file_name']);
            $build->set('uploaded_file_extension', $Data['uploaded_file_extension']);
                    // $build->set('Last_Modified_By', 'Manikandan');
            $build->where('image_id', $Record_No['r_no']);

           
            if($build->update()){

                $build2 = $db->table('settings_quality_reasons');
                $build2->set('quality_reason_name',$Data['quality_reason']);
                $build2->set('last_updated_by',$Data['last_updated_by']);
                $build2->where('image_id', $Record_No['r_no']);
                    if ($build2->update()) {
                        return true;
                    }else{
                        return false;
                    }
            }
            else{
                return false;
            }
        }

    }*
    /*
    it moved settings model
    public function uploadReasonsQuality($Data,$reasons)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('settings_quality_reasons_images');
        if($builder->insert($Data)){
            // $last_insert_id = $db->insertID();
            $build = $db->table('settings_quality_reasons');
            $reasons = [
                "quality_reason_name" => $reasons['quality_reason'],
                "image_id" => $reasons['image_id'],
                "last_updated_by" => $reasons['last_updated_by'],
            ];
            if ($build->insert($reasons)) {
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
    /*
    
    public function getDowntimeRData()
    {
        $db = \Config\Database::connect();
        // $query = $db->table('settings_downtime_reasons_images');
        // $query->select('*');
        // $query->where('status', 1);
        // // $query->orderBy('Last_Modified_Date', 'DESC');
        // $res = $query->get()->getResultArray();
        $builder = $db->table('settings_downtime_reasons as s');
        $builder->select('s.downtime_reason,s.downtime_category,i.image_id,i.uploaded_file_name');
        $builder->where("s.is_default","1");
        $builder->where("i.status","1");
        $builder->join('settings_downtime_reasons_images as i', 'i.image_id = s.image_id');
        $res = $builder->get()->getResult();
        return $res;
    }
    */
/*
    public function getQualityData()
    {
        $db = \Config\Database::connect();
        // $query = $db->table('pdm_quality_reasons_images');
        // $query->select('*');
        // $query->where('status', 1);
        // // $query->orderBy('Last_Modified_Date', 'DESC');
        // $res = $query->get()->getResultArray();
        // return $res;

        $builder = $db->table('settings_quality_reasons_images as rs');
        $builder->select('rs.*,img.*');
        $builder->where('rs.status',1);
        $builder->join('settings_quality_reasons as img', 'img.image_id = rs.image_id');
        $query = $builder->get()->getResultArray();

        return $query;
    }
    */
    /*
    it moved for settings model
    public function deleteDownReason($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('settings_downtime_reasons_images');
        $builder->set('status', 0);
        $builder->where('image_id', $data);
        if($builder->update()){
            return true;
        }
        else{
            return false;
        }
    }
    */
/*
it moved for settings model
    public function deleteQualityReason($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('settings_quality_reasons_images');
        $builder->set('status', 0);
        $builder->where('image_id', $data);
        if($builder->update()){
            return true;
        }
        else{
            return false;
        }
    }
    */
    public function getDownReason($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('settings_downtime_reasons as rs');
        $builder->select('rs.downtime_reason,rs.downtime_category,img.original_file_name,rs.image_id');
        $builder->where('rs.image_id',$data);
        $builder->join('settings_downtime_reasons_images as img', 'img.image_id = rs.image_id');
        $query = $builder->get()->getResultArray();
        return $query;
    }
    /* it moved for settings model
    public function getQualiyReason($data)
    {
        $db = \Config\Database::connect();
        // $query = $db->table('pdm_quality_reasons_images');
        // $query->select('*');
        // $query->where('r_no', $data);
        // $res = $query->get()->getResultArray();
        // return $res;

        $builder = $db->table('settings_quality_reasons as rs');
        $builder->select('rs.*,img.*');
        $builder->where('img.image_id',$data);
        $builder->join('settings_quality_reasons_images as img', 'img.image_id = rs.image_id');
        $query = $builder->get()->getResultArray();

        return $query;

    }    */
    
     // strategy production rejection data retrive
  public function getRejectionData($update)
  {
      $db = \Config\Database::connect();
      $shift = $update['shift'];
      $shiftdate = $update['shift_date'];
      $partname = $update['part_id'];
      $query = $db->table('pdm_production_info as rs');
      $query->select('rs.* , parts.part_name');
       $query->where('rs.shift_id',$shift);
      $query->where('rs.shift_date',$shiftdate);
      $query->where('rs.part_id',$partname);
      $query->join('settings_part_current as parts','rs.part_id = parts.part_id');
      $res = $query->get()->getResultArray();
      return $res;
  }

    public function getRejectData($data)
    {
        $db = \Config\Database::connect();
        $query = $db->table('pdm_rejections');
        $query->select('*');
        $query->where('date',$data['date']);
        $query->where('shift',$data['shift']);
        $query->where('part_id',$data['part_id']);
        $res = $query->get()->getResultArray();
        return $res;
    }

    // rejection part pencilt icon click open the modal show the value thats model function
  public function getCorrectData($data)
  {
      $db = \Config\Database::connect();
      $query = $db->table('pdm_production_info');
      $query->select('*');
      $query->where('shift_date',$data['date']);
      $query->where('shift_id',$data['shift']);
      $query->where('part_id',$data['part_id']);
      $query->where('start_time',$data['from_time']);

      //$query->where('Part_ID',$data);
      $res = $query->get()->getResultArray();
      $data["rejection"] = $res;
      $data['last_updated_by'] = $this->get_last_updated_username($res[0]['last_updated_by']);
      return $data;
  }
    
    public function getPartData($record){
        $db = \Config\Database::connect();
        $SFM = $db->table('settings_part_current');
        $SFM->select('*');
        $SFM->where('part_id', $record);
        $query = $SFM->get()->getResultArray();
        return $query;
    }
    public function updateRejectData($update,$where){
        $db = \Config\Database::connect();
        $SFM = $db->table('pdm_production_info');
        $SFM->set('rejections_notes', $update['Notes']);
        $SFM->set('rejections', $update['Total_Rejects']);
        $SFM->set('reject_reason', $update['Rejection_Reason']);
        $SFM->set('correction_min_counts', $update['correction_min']);
        $SFM->set('last_updated_by',$update['last_updated_by']);
        $SFM->where('shift_id', $where['shift']);
        $SFM->where('shift_date', $where['shift_date']);
        $SFM->where('start_time', $where['start_time']);
        $SFM->where('part_id', $where['part_id']);

        if($SFM->update()){
           return true;
        }
        else{
            return false;
        }
    }
    public function getRejectionPart(){
        $db = \Config\Database::connect();
        $builder = $db->table('settings_part_current');
        $builder->select('part_id');
        $query = $builder->select('part_name')->distinct()->get()->getResultArray();
        return $query;
    } 
    /**
    public function getCorrectionPart(){
        $db = \Config\Database::connect();
        $builder = $db->table('corrections');
        $query = $builder->select('Part_Name')->distinct()->get()->getResultArray();
        return $query;
    }
    public function getRejectShiftDate($data){
        $db = \Config\Database::connect();
        $builder = $db->table('quality_rejects');
        $builder->select('Shift_Date');
        if ($data != "all" ) {
            $builder->where('Part_Name',$data);
        }
        $query =$builder->distinct()->get()->getResultArray();
        return $query;
    }
    public function getCorrectShiftDate($data){
        $db = \Config\Database::connect();
        $builder = $db->table('corrections');
        $builder->select('Shift_Date');
        if ($data != "all" ) {
            $builder->where('Part_Name',$data);
        }
        $query =$builder->distinct()->get()->getResultArray();
        return $query;
    }
    **/
    
   // temporary showing for downtime graph
    public function getShift(){

        $db = \Config\Database::connect();
       // return $sdate;
        $build = $db->table('settings_shift_management');
        $build->select('*');
        // $build->like('last_updated_by',$sdate,'after');
        $build->orderby('last_updated_on','desc');
        $build->limit(1);
        $res = $build->get()->getResultArray();
        $output['duration'] = $res;
        if ($res !="") {
            $shift_id = $res[0]['shift_log_id'];
            // $builder = $db->table($shift_id);
            $temp =explode("f", $shift_id);

            $sql = "SELECT * FROM `settings_shift_table` WHERE `shifts` REGEXP '$temp[1]$'";
            $builder = $db->query($sql);

            $output['shift'] = $builder->getResultArray();

            /*
            $builder = $db->table("sf01");
            $builder->select('*');
            $output['shift'] = $builder->get()->getResultArray();
            */
            return $output;
        }else{
            return false;
        }

        // $db = \Config\Database::connect();
        // $builder = $db->table('shift_management');
        // $builder->select('Shift');
        // $array = array('Shift_Date' => $update['sdate'], 'Part_Name' => $update['part']);
        // //if ($update['sdates'] != "all") {
        //     $builder->where($array);
        // //}
        // //$array = array('Shift_Date' => $update['sdates']);
        // $query=$builder->distinct()->get()->getResultArray();
        // return $query;
    }
    
    public function getShiftExact($date){

        $db = \Config\Database::connect();
        $build = $db->table('settings_shift_management');
        $build->select('*');
        $build->where('last_updated_on <=', $date);
        $build->orderby('last_updated_on','desc');
        $build->limit(1);
        $res = $build->get()->getResultArray();
        $output['duration'] = $res;
        if ($res !="") {
            $shift_id = $res[0]['shift_log_id'];
            // $builder = $db->table($shift_id);
            $temp =explode("f", $shift_id);

            $sql = "SELECT * FROM `settings_shift_table` WHERE `shifts` REGEXP '$temp[1]$'";
            $builder = $db->query($sql);
            $output['shift'] = $builder->getResultArray();
            return $output;
        }else{
            return false;
        }
    }
    /**
    public function getCorrectShift($update){
        $db = \Config\Database::connect();
        $builder = $db->table('corrections');
        $builder->select('Shift');
        $array = array('Shift_Date' => $update['sdates'], 'Part_Name' => $update['part']);
        //if ($update['sdates'] != "all") {
            $builder->where($array);
        //}
        //$array = array('Shift_Date' => $update['sdates']);
        $query=$builder->distinct()->get()->getResultArray();
        return $query;
    }
    **/
   public function getCorrectionData($update)
     {
         $db = \Config\Database::connect();
 
         $shift = $update['shift'];
         $shift_date = $update['shift_date'];
         $partname = $update['partname'];
 
         // $query = $db->table('pdm_production_info');
         // $query->select('*');
         // $query->where('shift_id',$shift);
         // $query->where('shift_date',$shift_date);
         // $query->where('part_id',$partname);
         // $res = $query->get()->getResultArray();
         // return $res;

            $query = $db->table('pdm_production_info as rs');
          $query->select('rs.* , parts.part_name');
           $query->where('rs.shift_id',$shift);
          $query->where('rs.shift_date',$shift_date);
          $query->where('rs.part_id',$partname);
          $query->join('settings_part_current as parts','rs.part_id = parts.part_id');
          $res = $query->get()->getResultArray();
          return $res;
     }
    
    public function getCorrectPartData($data)
     {
         $db = \Config\Database::connect();
         $query = $db->table('pdm_production_info');
         $query->select('*');
         $query->where('shift_id',$data['shift']);
         $query->where('shift_date',$data['date']);
         $query->where('part_id',$data['part_id']);
         $query->where('start_time',$data['from_time']);
         $res = $query->get()->getResultArray();
         $data['correction'] = $res;
         $data['last_updated_by'] = $this->get_last_updated_username($res[0]['last_updated_by']);
         return $data;
     }
    /**
    public function getRejectPartData($data)
    {
        $db = \Config\Database::connect();
        $query = $db->table('quality_rejects');
        $query->select('*');
        $query->where('Part_ID',$data);
        $res = $query->get()->getResultArray();
        return $res;
    }
    **/
    // this function update the corrections in pdb_production info table
    public function updateCorrectData($update){
        $db = \Config\Database::connect();
        $SFM = $db->table('pdm_production_info');
        $SFM->set('correction_notes', $update['notes']);
        $SFM->set('corrections', $update['total_correction_value']);
        $SFM->set('rejection_max_counts', $update['max_count']);
        $SFM->set('last_updated_by',$update['last_updated_by']);
        $SFM->where('shift_id', $update['shift']);
        $SFM->where('shift_date', $update['shift_date']);
        $SFM->where('start_time', $update['start_time']);
        if ($SFM->update()) {
            return true;
        }else{
            return $update;
        }

        // if($SFM->update()){
        //     //print_r($updatepart);
        //     $SFM1 = $db->table('quality_rejects');
        //     $SFM1->set('Max_Rejects', $updatepart['Max_Rejects']);
        //     $SFM1->where('R_NO', $updatepart['R_NO']);
        //     if($SFM1->update()){
        //          return true;
        //     }
        //     else{
        //         return false;
        //     }
        // }
        // else{
        //     return false;
        // }
    }
    /**
    public function userRecordCountMngt()
    {
        $db = \Config\Database::connect();
        $query = $db->table('users_management');
        $query->select('User_ID');
        $query->orderBy('Created_On', 'DESC');
        $res = $query->get()->getResultArray();
        return $res;
    }
    public function checkUser($User){
        $db = \Config\Database::connect();
        // $builder = $db->table('users_management');
        // $builder->having('User_Name',  $User);
        $sql = "SELECT COUNT(*) as Count FROM users_management WHERE User_Name = '$User'";
        $result = $this->db->query($sql);
        $row = $result->getRow();
        return $count = $row->Count;
    }**/
   
    /**
    public function newUserAct($Data,$roles)
    {

        $db = \Config\Database::connect();
        if ($roles != 'Operator') {
            $builder = $db->table('users_management');
            $count = $builder->select('*')->where('User_Name', $Data['User_Name'])->countAllResults();
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
            $builder = $db->table('users_operator');
            $count = $builder->select('*')->where('User_Name', $Data['User_Name'])->countAllResults();
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
    }
    public function updateUserData($Data,$roles)
    {

        $db = \Config\Database::connect();
        if ($roles != 'Operator') {
            $build = $db->table('users_management');
            if (!empty($Data['First_Name'])) {
                $build->set('First_Name', $Data['First_Name']);
            }
            if (!empty($Data['Last_Name'])) {
                $build->set('Last_Name', $Data['Last_Name']);
            }
            if (!empty($Data['Contact_NO'])) {
                $build->set('Contact_NO', $Data['Contact_NO']);
            }
            if (!empty($Data['Designation'])) {
                $build->set('Designation', $Data['Designation']);
            }
            if (!empty($Data['Department'])) {
                $build->set('Department', $Data['Department']);
            }
            if (!empty($Data['Role'])) {
                $build->set('Role', $Data['Role']);
            }
            if (!empty($Data['Site_ID'])) {
                $build->set('Site_ID', $Data['Site_ID']);
            }
            if (!empty($Data['Last_Updated_By'])) {
                $build->set('Last_Updated_By', $Data['Last_Updated_By']);
            }
            $build->where('User_Name', $Data['User_Name']);

            if($build->update()){
                    return true;
            }
            else{
                return false;
            }
        }
        else{
            $build = $db->table('users_operator');
            if (!empty($Data['First_Name'])) {
                $build->set('First_Name', $Data['First_Name']);
            }
            if (!empty($Data['Last_Name'])) {
                $build->set('Last_Name', $Data['Last_Name']);
            }
            if (!empty($Data['Contact_NO'])) {
                $build->set('Contact_NO', $Data['Contact_NO']);
            }
            if (!empty($Data['Designation'])) {
                $build->set('Designation', $Data['Designation']);
            }
            if (!empty($Data['Department'])) {
                $build->set('Department', $Data['Department']);
            }
            if (!empty($Data['Role'])) {
                $build->set('Role', $Data['Role']);
            }
            if (!empty($Data['Site_ID'])) {
                $build->set('Site_ID', $Data['Site_ID']);
            }
            if (!empty($Data['Last_Updated_By'])) {
                $build->set('Last_Updated_By', $Data['Last_Updated_By']);
            }
            $build->where('User_Name', $Data['User_Name']);

            if($build->update()){
                    return true;
            }
            else{
                return false;
            }
        }
    }
    public function updateUserRoleData($Data)
    {

        $db = \Config\Database::connect();
        $build = $db->table('roles_master');
        if (!empty($Data['Financial_Drill_Down'])) {
            $build->set('Financial_Drill_Down', $Data['Financial_Drill_Down']);
        }
        if (!empty($Data['Financial_Opportunity_Insights'])) {
            $build->set('Financial_Opportunity_Insights', $Data['Financial_Opportunity_Insights']);
        }
        if (!empty($Data['OEE_Drill_Down'])) {
            $build->set('OEE_Drill_Down', $Data['OEE_Drill_Down']);
        }
        if (!empty($Data['Operator_User_Interface'])) {
            $build->set('Operator_User_Interface', $Data['Operator_User_Interface']);
        }
        if (!empty($Data['Production_Data_Management'])) {
            $build->set('Production_Data_Management', $Data['Production_Data_Management']);
        }
        if (!empty($Data['Settings_Machine'])) {
            $build->set('Settings_Machine', $Data['Settings_Machine']);
        }
        if (!empty($Data['Settings_Parts'])) {
            $build->set('Settings_Parts', $Data['Settings_Parts']);
        }
        if (!empty($Data['Settings_General'])) {
            $build->set('Settings_General', $Data['Settings_General']);
        }
        if (!empty($Data['Settings_User_Management'])) {
            $build->set('Settings_User_Management', $Data['Settings_User_Management']);
        }
        if (!empty($Data['Last_Updated_By'])) {
            $build->set('Last_Updated_By', $Data['Last_Updated_By']);
        }
        $build->where('User_Name', $Data['User_Name']);

        if($build->update()){
            return true;
        }
        else{
            return false;
        }
    }
    public function getUserData($record)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users_management');
        $builder->select('*');
        $builder->where('User_Name', $record);
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function userRoleAdd($Data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('roles_master');
        if($builder->insert($Data)){
                return true;
        }
        else{
            return false;
        }
    }
    public function userRecordCountOpr()
    {
        $db = \Config\Database::connect();
        //$sql = "SELECT COUNT(*) as Count FROM users_operator";
        $query = $db->table('users_operator');
        $query->select('User_ID');
        $query->orderBy('Created_On', 'DESC');
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function updatePass($uname,$pass)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users_management');
        $builder->set('Password', $pass);
        $builder->set('IsPasswordChecked', 1);
        $builder->set('Status', 1);
        $builder->where('User_Name', $uname);
        if($builder->update()){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function getDowntimeValues(){
        $db = \Config\Database::connect();
        $builder = $db->table('sample_downtime');
        $builder->select('*');
        $query['Downtime_Data'] = $builder->get()->getResultArray();
        
        $query['Downtime_Reason'] = $builder->select('Downtime_Reason')->distinct()->get()->getResultArray();

        $query['Day'] = $builder->select('Date')->distinct()->get()->getResultArray();

        $build = $db->table('sample_downtime');
        $query['Machine'] = $build->select('Machine_ID')->distinct()->get()->getResultArray();

        //Quality Reasom
        $table = $db->table('quality_reasons_images');
        $query['Quality_Reason'] = $table->select('Quality_Reason')->distinct()->get()->getResultArray();

        //Downtime Reason
        $down = $db->table('downtime_reasons_images');
        $query['Down_Reason'] = $down->select('Downtime_Reason')->distinct()->get()->getResultArray();
        
        return $query;
    }

    //Graph Claculation
    public function getToolValues(){
        $db = \Config\Database::connect();
        $builder = $db->table('settings_site_part');
        $builder->select('*');
        $query = $builder->get()->getResultArray();
        return $query;
    }
    public function getCorrectionValues(){
        $db = \Config\Database::connect();
        $builder = $db->table('corrections');
        $builder->select('Total_Correction');
        $query = $builder->get()->getResultArray();
        return $query;
    }
    public function getRejectionValues(){
        $db = \Config\Database::connect();
        $builder = $db->table('quality_rejects');
        $builder->select('Total_Rejects');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function testData(){
        $db = \Config\Database::connect();
          $builder = $this->db->table("settings_site_part as part");
          $builder->select('part.*, corrt.Total_Correction, rejt.Total_Rejects,machine.*');
          $builder->join('corrections as corrt', 'part.Part_ID = corrt.Part_Id');
          $builder->join('quality_rejects as rejt', 'part.Part_ID = rejt.Part_Id');
          $builder->join('settings_site_machine as machine', 'part.Machine_Id = machine.Machine_Id');
          $data = $builder->get()->getResult();
          return $data;
    }

    public function deactivateUser($record)
    {
        
        $db = \Config\Database::connect();

        if ($record['Role'] !="Operator") {
            $builder = $db->table('users_management');
        }
        else{
            $builder = $db->table('users_operator');
        }
       
        if ($record['Status'] == 0) {
            $builder->set('Status', 1);
            $uData['Status'] = 1;
        }
        else{
            $builder->set('Status', 0);
            $uData['Status'] = 0;
        }
        $builder->set('Last_Updated_By', $record['Last_Updated_By']);
        $builder->where('User_ID', $record['User_ID']);
        if($builder->update()){
            return true;
        }
        else{
            return false;
        }
    }
    public function getUserDataInfo($record,$role){
        $db = \Config\Database::connect();

        if ($role != "Operator") {
            $builder = $this->db->table("users_management as u");
            $builder->select('u.*, s.Site_ID,s.Site_Name,s.Site_Location');
            $builder->where('User_ID', $record);
            $builder->join('site as s', 'u.Site_ID = s.Site_ID');
            $data = $builder->get()->getResult();
        }
        else{
            $builder = $this->db->table("users_operator as u");
            $builder->select('u.*, s.Site_ID,s.Site_Name,s.Site_Location');
            $builder->where('User_ID', $record);
            $builder->join('site as s', 'u.Site_ID = s.Site_ID');
            $data = $builder->get()->getResult();
        }
          
          return $data;
    }



**/
        // current shift performance 
     // startegy current_shift performance
/*
    public function current_shift_performance_model($data){
            $db = \Config\Database::connect();
            $builder = $this->db->table('settings_current_shift_performance');
            if ($builder->insert($data)) {
                return true;
            }
            else{
                return false;
            }
    }*/


     // retrive data for current _shift _ performance
    /*
    public function current_shift_retrive_data(){
        $db = \Config\Database::connect();
            $builder = $db->table('settings_current_shift_performance');
            $builder->select('*');
            $builder->orderBy('last_updated_on', 'DESC');
            $builder->limit(1);
            $res = $builder->get()->getResultArray();
            return $res;
    }*/

    

      // strategy code  production rejection 
    public function  reject_dropdown(){
        //echo "ok database";
        $db = \Config\Database::connect();
        $builder = $db->table('settings_quality_reasons');
        $builder->select('quality_reason_name');
        //status should be added in the table
        //$builder->where('Status','1');
        //$builder->where('Site_id',$site_id);
        $query   = $builder->get()->getResultArray();
        // $output = "";
        // foreach ($query->getResult() as $row) {
        //     $output .=  "<option value=".$row->Downtime_Reason.">". $row->Downtime_Reason."</option>";
           
        //     return $output;
        // }

        return $query;

    }
    

    // production rejection retrive db data
     public function retrive_multiple_reason($data){
        $db = \Config\Database::connect();

        $builder = $db->table('pdm_production_info');
        $builder->select('reject_reason');
        // $builder->where('R_NO', $id);
        // $builder->where('Part_ID',$partid);
        $builder->where('shift_date',$data['shift_date']);
        $builder->where('shift_id',$data['shift']);
        $builder->where('part_id',$data['part_id']);
        $builder->where('start_time',$data['from_time']);
        $query = $builder->get()->getResult();

        return  $query;
      
    }

/**
    // strategy code for site admin forgot password
    public function  forgot_site_admin_pass($user_id,$pass){
        $db = \Config\Database::connect();

        $build = $db->table('users_management');
        $build->set('Password', $pass);
        $build->where('User_ID', $user_id);
        $res = $build->update();
        if ($res == true) {
            $msg = "Password Updated Successfully";
        }
        else{
            $msg = "Some Error Please Check It";
        }

        return $msg;
    }

    // strategy code  production downtime retrive machine data
    public function Retrive_machine_data(){
        $db = \Config\Database::connect();

        $build = $db->table('settings_site_machine');
        $build->select('Machine_Name');
        $res = $build->get()->getResult();
        return $res;
    }
    **/
    // strategy code production downtime retrive shift
    public function production_downtime_shift($machine_name,$shift_date){
        $db = \Config\Database::connect();

        $builder =  $db->table('settings_site_machine');
        $builder->select('*');
        $builder->where('',$machine_name);
        $builder->where('',$shift_date);
    }

/**
    public function check(){
        $db = \Config\Database::connect();
        $SFM = $db->table('users_management');
        $SFM->select('*');
        $SFM->where('User_Name', 'manikanmani2000@gmail.com');
        $query = $SFM->get()->getResultArray();

        $array = array();

            $builder = $this->db->table("users_management as u");
            $builder->select('u.*, s.Site_Name');
            $builder->orderBy('Last_Updated_On', 'DESC');
            $builder->join('site as s', 'u.Site_ID = s.Site_ID','left');
            $dataUM = $builder->get()->getResult();
            $dataArray =json_decode(json_encode($dataUM), true);

            $build = $this->db->table("users_operator as u");
            $build->select('u.*, s.Site_Name');
            $build->orderBy('Last_Updated_On', 'DESC');
            $build->join('site as s', 'u.Site_ID = s.Site_ID');
            $dataUO = $build->get()->getResult();
            $dataArrayOpr =json_decode(json_encode($dataUO), true);

            $sizeUM = sizeof($dataArray);
            $sizeUO = sizeof($dataArrayOpr);
            for ($x = 0; $x < $sizeUM ; $x++) {
                if ($dataArray[$x]['Role'] != "Smart Admin") {
                    array_push($array,$dataArray[$x]);
                }
            }
            for ($x = 0; $x < $sizeUO ; $x++) {
                array_push($array,$dataArrayOpr[$x]);
            }     
        return $array;

    }
**/      
 
    public function hourDataGet($date,$start,$end){
        $db = \Config\Database::connect();
        // $query = $db->table("machine_data");
        // $query->select('*');
        // // $query->where('machine_id', $machine_id);
        // $query->where('date', '2022-05-17');
        // $query->where('time >=', $start);
        // $query->where('time <=', $end);


        $union   = $db->table('users')->select('*')->orderBy('date', 'DESC')->limit(1);
        $builder = $db->table('users')->select('*')->orderBy('date', 'ASC')->limit(1)->union($union);

        $db->newQuery()->fromSubquery($builder, 'q')->orderBy('date', 'DESC')->get();



        // try{
            $output = $query->get()->getResultArray();
        // }
        // catch(Exception $e){
        //     return null;
        // }

        return $output;
    }


    //  For testing getGraph Function
    public function getDownGraph1($machine_id,$shift_date,$shift){
        $db = \Config\Database::connect();
        $query = $this->db->table("pdm_events as pd");
        $query->select('pd.*, rm.*');
        // $query->select('pd.*, rm.*');
        $query->where('pd.machine_id', $machine_id);
        $query->where('pd.shift_date', $shift_date);
        $query->where('pd.shift_id', $shift);
        $query->orderBy('pd.machine_event_id', 'ASC');
        $query->join('pdm_downtime_reason_mapping as rm', 'rm.machine_event_id = pd.machine_event_id');
        // $query->join('oui_downtime_reasons_default as rd', 'rm.downtime_reason_id = rd.downtime_reason_id',"left");
        // $output['machineData'] = $query->get()->getResultArray();
        $output = $query->get()->getResultArray();

        return $output;
    }

public function mongoconnect(){
    $manager = new \MongoDB\Driver\Manager("mongodb://localhost:27017");
    try {
        $t="11:30:00";
        $d = "2022-05-28";
        $dt=$d." ".$t;
        $filter = array('times_stamp'=>array('$gte'=>$dt, '$lte'=>'2022-05-28 12:00:00:00'),'machine_id'=>3);
        $query = new \MongoDB\Driver\Query($filter);

        $rows = $manager->executeQuery("mongo_connect.mongo_data_1", $query);

        $l=0;
        $start=0;
        $end=0;
        foreach ($rows as  $val) {
            if ($l==0) {
                $start = $val->shot_count;
                $end=$val->shot_count;
                $l++;
            }

            $end=$val->shot_count;
            echo $val->shot_count;
            echo "<br>";
        }
    } 
    catch(MongoDB\Driver\Exception $e) {
       echo "Error has occured!";
       exit;
    }

}

    public function getRejection_count($data){
        $db = \Config\Database::connect();
        $build = $db->table('pdm_production_info');
        $build->select('rejections,production');
        $build->where('shift_id',$data['shift']);
        $build->where('shift_date',$data['shift_date']);
        $build->where('start_time',$data['start_time']);
        $build->where('part_id',$data['part_id']);

        $res = $build->get()->getResult();

        return $res;
    }

    

    // oee drill down model
     public function getDataRaw($FromDate,$FromTime,$ToDate,$ToTime)
    {
        $db = \Config\Database::connect();
        $query = $db->table('temp_mapping_table as t');
        $query->select('t.machine_id,t.downtime_reason_id,t.tool_id,t.part_id,t.shift_date,t.start_time,t.end_time,t.split_duration,r.*');
        $query->where('t.shift_date >=',$FromDate);
        $query->where('t.shift_date <=',$ToDate);
        $query->join('settings_downtime_reasons as r', 'r.downtime_reason_id = t.downtime_reason_id');
        $res= $query->get()->getResultArray();
        return $res;
    }

    // oee drill down model1
     public function getMachineRec($FromDate,$ToDate){
        $db = \Config\Database::connect();
        $query = $db->table('temp_mapping_table');
        $query->select('machine_id');
        $query->where('shift_date >=',$FromDate);
        $query->where('shift_date <=',$ToDate); 
        $res= $query->distinct()->get()->getResultArray();
        return $res;
    }

    // oee drill down model2
     public function getMachineRecActive()
    {
        $db = \Config\Database::connect();
        $query = $db->table('settings_machine_current');
        $query->select('machine_id'); 
        $res= $query->distinct()->get()->getResultArray();
        return $res;
    }

    // oee drill down model3
      public function getPartRec($FromDate,$ToDate){
         $db = \Config\Database::connect();
        $query = $db->table('temp_mapping_table');
        $query->select('part_id');
        $query->where('shift_date >=',$FromDate);
        $query->where('shift_date <=',$ToDate); 
        $res= $query->distinct('part_id')->get()->getResultArray();
        return $res;
    }

    // oee drill down
      public function getProductionRec($FromDate,$ToDate){
        $db = \Config\Database::connect();
        $query = $db->table('pdm_production_info');
        $query->select('*');
        $query->where('shift_date >=',$FromDate);
        $query->where('shift_date <=',$ToDate);
        $res= $query->get()->getResultArray();
        return $res;   
    }
    // oee drill down
    public function getShiftDate($FromDate,$ToDate)
    {
        $db = \Config\Database::connect();
        $query = $db->table('temp_mapping_table');
        $query->select('shift_date');
        $query->where('shift_date >=',$FromDate);
        $query->where('shift_date <=',$ToDate); 
        $res= $query->distinct()->get()->getResultArray();
        return $res;
    }


    // oee drill down
     public function settings_tools()
    {
        $db = \Config\Database::connect();
        // $query = $db->table('settings_part_current');
        // $query->select('*');
        // //$query->orderBy('Last_Updated_On', 'DESC');
        // $res = $query->get()->getResultArray();
        // return $res;


        $builder = $db->table("settings_part_current as s");
        $builder->select('s.*, t.tool_name');
         $builder->orderBy('last_updated_on','desc');
        $builder->join('settings_tool_table as t', 't.tool_id = s.tool_id');
        $data = $builder->get()->getResult();
        return $data;
    }
    
    // maiin model for machine serial id
    /*
    public function check_machine_serialid($serial_id){
        $db = \Config\Database::connect();
        $query = $this->db->table("settings_machine_current");
        $query->select('*');
        $query->where('machine_serial_number', $serial_id);
        //$query->join('settings_part_current as p', 'p.part_id = s.part_id');
        $output = $query->get()->getResultArray();
        if ($output) {
            return true;
        }else{
            return false;
        }
    }*/

}


?>


