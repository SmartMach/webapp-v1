<?php 
namespace App\Models;
use CodeIgniter\Model;

class Settings_Model extends Model{
	protected $site_connection;
    protected $session;
    public function __construct(){

        $this->session = \Config\Services::session();

        $db_name = $this->session->get('active_site');
       
        $this->site_connection = [
                    'DSN'      => '',
                    'hostname' => 'localhost',
                    'username' => 'root',
                    'password' => 'quantanics123',
                    'database' => ''.$db_name.'',
                    // 'database' => 'S1002',
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
// get all machines
    public function get_machine_data()
    {
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_machine_current');
        $query->select('*');
        $query->orderBy('last_updated_on', 'DESC');
        $res = $query->get()->getResultArray();
        return $res;
    }

	// add machine
    public function add_Machine($machineData,$machine_iot)
    {
        $db = \Config\Database::connect($this->site_connection);
        $topic = "/".$machine_iot['location']."/".$machine_iot['site_name']."/".$machineData['machine_serial_number'];
        $iot = array(
            'machine_id' => $machineData['machine_id'], 
            'iot_gateway_topic' => $topic,
            'site_id' => $machine_iot['site_name'],
            'location_id' => $machine_iot['location'],
            'last_updated_by' => $machineData['last_updated_by']
        );
        $query = $db->table('settings_machine_current');
        if ($query->insert($machineData)) {
            $build = $db->table('settings_machine_log');
            if($build->insert($machineData)){
                $builder = $db->table('settings_machine_iot');
                if($builder->insert($iot)){
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

    // deactivate model
     public function deactivateMachine($machine_id,$status,$uData)
    {
        $db = \Config\Database::connect($this->site_connection);
        $builder = $db->table('settings_machine_current');
        if ($status == 0) {
            $builder->set('status', 1);
            $uData['status'] = 1;
        }
        else{
            $builder->set('status', 0);
            $uData['status'] = 0;
        }
        $builder->set('last_updated_by', $uData['last_updated_by']);
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

    // get machine data
     public function getMachineData($record){
        $db = \Config\Database::connect($this->site_connection);
        $SFM = $db->table('settings_machine_current');
        $SFM->select('*');
        $SFM->where('machine_id', $record);
        $query = $SFM->get()->getResultArray();

        $data['machine'] = $query;
        $data['last_updated_by']  = $this->get_last_updated_username($query[0]['last_updated_by']);
        return $data;
    }

  // update machine data
  public function editMachineData($machineData,$machine_id,$serial_id,$machine_iot_update)
  {
    $db = \Config\Database::connect($this->site_connection);
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
    if (!empty($machineData['last_updated_by'])) {
        $build->set('last_updated_by', $machineData['last_updated_by']);
    }
    if (!empty($serial_id)) {
        $build->set('machine_serial_number', $serial_id);
    }
    $build->where('machine_id', $machine_id);
    if($build->update()){
        $builder = $db->table('settings_machine_log');
        if($builder->insert($machineData)){
            // $sql = $db->table('settings_machine_iot');
            // $iot_gateway_topic = '/'.$machine_iot_update['location'].'/'.$machine_iot_update['site_id'].'/'.$machine_iot_update['machine_serial_id'];
            // $sql->set('iot_gateway_topic',$iot_gateway_topic);
            // $sql->set('site_id',$machine_iot_update['site_id']);
            // $sql->set('location_id',$machine_iot_update['location']);
            // $sql->set('last_updated_by',$machine_iot_update['last_updated_by']);
            // $sql->where('machine_id',$machine_iot_update['machine_id']);
            // if ($sql->update()) {
            //     return true;
            // }else{
            //     return false;
            // }
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

    // get machine id for id generation
     public function getMachineId(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_machine_current');
        $query->select('machine_id');
        $res = $query->get()->getResultArray();
        return $res;
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

    // count of active inactive function for machines
    
    public function aIaMachine(){
        $db = \Config\Database::connect($this->site_connection);
        $SFM = $db->table('settings_machine_current');
        $query['Active'] = $SFM->select('*')->where('status', 1)->countAllResults();
        $query['InActive'] = $SFM->select('*')->where('status', 0)->countAllResults();
        return $query;
    }

    // machine serial id function for machine settings
     // maiin model for machine serial id
     public function check_machine_serialid($serial_id){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table("settings_machine_current");
        $query->select('*');
        $query->where('machine_serial_number', $serial_id);
        $output = $query->get()->getResultArray();
        if (empty($output)) {
            return false;
        }else{
            return true;
        }
    }

    // get site location for machine add edit
    public function get_site_location($site_id){
        $db = \Config\Database::connect("another_db");
        $query = $db->table('sites');
        $query->select('location_id');
        $query->where('site_id',$site_id);
        $res = $query->get()->getResultArray();

        if ($res) {
            $location_id = $res[0]['location_id'];
            $sql = $db->table('location');
            $sql->select('location');
            $sql->where('location_id',$location_id);
            $output = $sql->get()->getResultArray();

            $location = $output[0]['location'];

            return $location;
        }else{
            return false;
        }
    }

// part settings =======================================================================================

    //  part settings in retrive all the records
    public function settings_tools()
    {
        $db = \Config\Database::connect($this->site_connection);
        $builder = $db->table("settings_part_current as s");
        $builder->select('s.*, t.tool_name');
        $builder->where('s.part_id !=','PT1001');
        $builder->orderBy('last_updated_on','desc');
        $builder->join('settings_tool_table as t', 't.tool_id = s.tool_id');
        $data = $builder->get()->getResult();
        return $data;
    }
// get parts for id generation
    public function getPartId(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_part_current');
        $query->select('part_id');
        $res = $query->get()->getResultArray();
        return $res;
    }


    // get tool for id generation
    public function getToolId(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_tool_table');
        $query->select('tool_id');
        $res = $query->get()->getResultArray();
        return $res;
    }

    // add tool function
     public function add_Tool($partData,$tData)
    {
        $db = \Config\Database::connect($this->site_connection);
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

    // get tool data
     public function getToolData($Pid){
        $db = \Config\Database::connect($this->site_connection);
        $builder = $db->table("settings_part_current as s");
        $builder->select('s.*, t.tool_name');
        $builder->where('part_id', $Pid);
        $builder->join('settings_tool_table as t', 't.tool_id = s.tool_id');
        $query = $builder->get()->getResultArray();
        $data['tool'] = $query;
        $data['last_updated_by'] = $this->get_last_updated_username($query[0]['last_updated_by']);
        return $data;
    }

// active inactive status update in part settings
     public function deactivateTool($record,$status,$uData)
    {
        $db = \Config\Database::connect($this->site_connection);
        $builder = $db->table('settings_part_current');
        if ($status == 0) {
            $builder->set('status', 1);
            $uData['status'] = 1;
        }
        else{
            $builder->set('status', 0);
            $uData['status'] = 0;
        }
        $builder->set('last_updated_by', $uData['last_updated_by']);
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

// get tool name for dropdown in parts
      public function getToolName(){
        $db = \Config\Database::connect($this->site_connection);
        // $builder = $db->table('tools');
        // $builder->select('Tool_Name');
        // $query = $builder->select('Tool_ID')->get()->getResultArray();
        // return $query;

        // if ($role == "Smart User") {
            $builder = $db->table('settings_tool_table');
            $builder->select('tool_id');
            $builder->select('tool_name');
            $builder->where('tool_id !=','TL1001');
            $query =$builder->get()->getResultArray();
            return $query;
        // }
        // else if($role == "Site Admin"){
        //     $builder = $db->table('users_management');
        //     $builder->select('*');
        //     $builder->where('User_Name',$user);
        //     $query =$builder->get()->getResultArray();

        //     //selecte sites for 
        //     $build = $db->table('tools');
        //     $build->select('Tool_ID');
        //     $build->select('Tool_Name');
        //     $res =$build->where('Tool_ID',$query[0]['Tool_ID'])->get()->getResultArray();
        //     return $res;

        // }
        // else if($role == "Smart Admin"){
        //     $builder = $db->table('tools');
        //     $builder->select('Tool_ID');
        //     $query =$builder->select('Tool_Name')->get()->getResultArray();
        //     return $query;
        // }
    }


// get tool data in part settings
     public function getTool($record){
        $db = \Config\Database::connect($this->site_connection);
        $SFM = $db->table('settings_tool_table');
        $SFM->select('*');
        $SFM->where('tool_id',$record);
        $query = $SFM->get()->getResultArray();
        return $query;
    }

    // get count for active inactive count for part settings
    public function aIaTool(){
        $db = \Config\Database::connect($this->site_connection);
        $SFM = $db->table('settings_part_current');
        $query['Active'] = $SFM->select('*')->where('status', 1)->where('part_id!=','PT1001')->countAllResults();
        $query['InActive'] = $SFM->select('*')->where('status', 0)->countAllResults();
        return $query;
    }

    // insert tool function part settings
     public function addToolData($toolData){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_tool_table');
        if($query->insert($toolData)) {
            return true;
        }
        else{
            return false;
        }
    }

    // edit part settings parts
      public function editToolData($ToolData,$tool)
    {
        $db = \Config\Database::connect($this->site_connection);
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
                //return true;
                $build1 = $db->table('settings_tool_table');
                $build1->set('tool_name',$tool['tool_name_edit']);
                $build1->set('last_updated_by',$tool['last_updated_by']);
                $build1->where('tool_id',$tool['tool_id']);
                if($build1->update()){
                    return true;
                }else{
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

    // general settings =============================================================================

     // general settings  update function
    public function getGoalsFinancialData(){
        $db = \Config\Database::connect($this->site_connection);
        $SFM = $db->table('settings_financial_metrics_goals');
        $SFM->orderBy('last_updated_on', 'DESC');
        $SFM->limit(1);
        $SFM->select('*');
        $query = $SFM->get()->getResultArray();
        return $query;
    } 



// update shift for general settings
     public function updateShift($shift_start,$hour,$shift,$last_updated_by){   
        $db = \Config\Database::connect($this->site_connection);   
        $builder = $db->table('settings_shift_management');
        $builder->select('*');
        $builder->where('start_time ', $shift[0]);
        $builder->where('duration', $hour);
        $query = $builder->get()->getResultArray();
        if ($query == null) {
            $build = $db->table('settings_shift_management');
            $build->select('max(shift_log_id) as shift_log_id');
            $queryShift = $build->get()->getResultArray();

            if ($queryShift[0]['shift_log_id'] == null) {
                $tmp = explode("f", "sf00");
            }
            else{
                $tmp = explode("f", $queryShift[0]['shift_log_id']);
            }
            if($res=$this->createTable($tmp,$hour,$shift,$last_updated_by)){
                return $res;
            }
            else{
                return false;
            }
        }
        else{
            $con =$db->table('settings_shift_management');
            $myarrt= ['shift_log_id' => $query[0]['shift_log_id'],
                 'start_time' => $query[0]['start_time'],
                 'duration'=>$query[0]['duration'],
                 'last_updated_by'=>$last_updated_by,
                ];
            if($con->insert($myarrt)){
             return true;
            }else{
                return false;
            }
           
        }
    }

    // this function for update shift
     public function createTable($tmp,$duration,$data,$last_updated_by){
            $db = \Config\Database::connect($this->site_connection); 
            $t = $tmp[1]+1;
            if ($t<=9) {
                $tName = ""."sf".sprintf('%02s',($tmp[1]+1))."";
            }
            else{
                $tName = ""."sf".($tmp[1]+1)."";
            }
            $query =$db->table('settings_shift_management');
            $t= array("shift_log_id"=>$tName,"start_time"=>$data[0],"duration"=>$duration,"last_updated_by"=>$last_updated_by);
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

// general settings for retrive shift data
    public function getShift(){

        $db = \Config\Database::connect($this->site_connection);
        $build = $db->table('settings_shift_management');
        $build->select('*');
        $build->orderby('last_updated_on','desc');
        $build->limit(1);
        $res = $build->get()->getResultArray();
        $output['duration'] = $res;
        if ($res !="") {
            $shift_id = $res[0]['shift_log_id'];
            $temp =explode("f", $shift_id);

            $sql = "SELECT * FROM `settings_shift_table` WHERE `shifts` REGEXP '$temp[1]$'";
            $builder = $db->query($sql);

            $output['shift'] = $builder->getResultArray();
            return $output;
        }else{
            return false;
        }
    }

    // update financial metrics data
     public function editGFMData($Data)
    {
        $db = \Config\Database::connect($this->site_connection);
        $builder = $db->table('settings_financial_metrics_goals');
        if($builder->insert($Data)){
            return true;
        }
        else{
            return false;
        }
    }

    //insert downtime threshold function

     public function editDTData($Data)
    {
        $db = \Config\Database::connect($this->site_connection);
        $builder = $db->table('settings_downtime_threshold');
        if($builder->insert($Data)){
                return true;
        }
        else{
            return false;
        }
    }

    // retrive downtime threshold data
    public function getDowntimeTData(){
        $db = \Config\Database::connect($this->site_connection);
        $SFM = $db->table('settings_downtime_threshold');
        $SFM->orderBy('last_updated_on', 'DESC');
        $SFM->limit(1);
        $SFM->select('*');
        $query = $SFM->get()->getResultArray();
        return $query;
    }

    // downtime reasons retrive 
     public function getDowntimeRData()
    {
        $db = \Config\Database::connect($this->site_connection);
        $builder = $db->table('settings_downtime_reasons as s');
        $builder->select('s.*,i.*');
        $builder->where("s.status","1");
        $builder->join('settings_downtime_reasons_images as i', 'i.image_id = s.image_id');
        $res = $builder->get()->getResult();
        return $res;
    }

    // quality reasons retrive function
     public function getQualityData()
    {
        $db = \Config\Database::connect($this->site_connection);
        $builder = $db->table('settings_quality_reasons_images as rs');
        $builder->select('rs.*,img.*');
        $builder->where('img.status',1);
        $builder->join('settings_quality_reasons as img', 'img.image_id = rs.image_id');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    // delete downtime reasons
     public function deleteDownReason($data)
    {
        $db = \Config\Database::connect($this->site_connection);
        $builder = $db->table('settings_downtime_reasons');
        $builder->set('status', 0);
        $builder->where('image_id', $data);
        if($builder->update()){
            return true;
        }
        else{
            return false;
        }
    }

    // delete quality reasons 
     public function deleteQualityReason($data)
    {
        $db = \Config\Database::connect($this->site_connection);
        $builder = $db->table('settings_quality_reasons');
        $builder->set('status', 0);
        $builder->where('image_id', $data);
        if($builder->update()){
            return true;
        }
        else{
            return false;
        }
    }


    // retrive quality reasons for 
     public function getQualiyReason($data)
    {
        $db = \Config\Database::connect($this->site_connection);
        $builder = $db->table('settings_quality_reasons as rs');
        $builder->select('rs.*,img.*');
        $builder->where('img.image_id',$data);
        $builder->join('settings_quality_reasons_images as img', 'img.image_id = rs.image_id');
        $query = $builder->get()->getResultArray();

        return $query;

    }   

    // update current shift performance 
     public function current_shift_performance_model($data){
            $db = \Config\Database::connect($this->site_connection);
            $builder = $db->table('settings_current_shift_performance');
            if ($builder->insert($data)) {
                return true;
            }
            else{
                return false;
            }
    }

    // retrive current shift performance
    public function current_shift_retrive_data(){
        $db = \Config\Database::connect($this->site_connection);
            $builder = $db->table('settings_current_shift_performance');
            $builder->select('*');
            $builder->orderBy('last_updated_on', 'DESC');
            $builder->limit(1);
            $res = $builder->get()->getResultArray();
            return $res;
    }

    // get downitme reasons
     public function  downtime_reason_retrive(){
        $db = \Config\Database::connect($this->site_connection);
        $builder = $db->table('settings_downtime_reasons');
        $builder->select('downtime_reason_id,downtime_reason,downtime_category');
        $query   = $builder->get()->getResultArray();
        return $query;
    }

    // id generation for downtime reasons
     public function getDowntimeImgId(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_downtime_reasons_images');
        $query->select('image_id');
        $res = $query->get()->getResultArray();
        return $res;
    }

    // id generation of quality reasons
     public function getQualityImgId(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_quality_reasons_images');
        $query->select('image_id');
        $res = $query->get()->getResultArray();
        return $res;
    }

    // insertion of downtime reasons
    public function uploadReasons($Data,$reason)
    {
        $db = \Config\Database::connect($this->site_connection);
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
                 "status"=>$reason['status'],
                "last_updated_by"=>$reason['last_updated_by'],
                "is_default" =>'0',
               
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


    // upate downtime reasons

public function updateReasons($Data,$Record_No)
    {
        $db = \Config\Database::connect($this->site_connection);
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
                $build->set('downtime_category',$Data['downtime_category']);
                $build->set('downtime_reason',$Data['downtime_reason']);
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

    // insert quality reasons
    public function uploadReasonsQuality($Data,$reasons)
    {
        $db = \Config\Database::connect($this->site_connection);
        $builder = $db->table('settings_quality_reasons_images');
        if($builder->insert($Data)){
            $build = $db->table('settings_quality_reasons');
            $reasons = [
                "quality_reason_name" => $reasons['quality_reason'],
                "image_id" => $reasons['image_id'],
                "last_updated_by" => $reasons['last_updated_by'],
                "status"=> 1,
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
    }

    // edit quality reasons
     public function UpdateQuality($Data,$Record_No)
    {
        $db = \Config\Database::connect($this->site_connection);
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
        }
        else{
            $build = $db->table('settings_quality_reasons_images');
            $upate_data = [
                'original_file_name'=> $Data['original_file_name'],
                'original_file_extension'=>$Data['original_file_extension'],
                'original_file_size_kb'=>$Data['original_file_size_kb'],
                'uploaded_file_location'=>$Data['uploaded_file_location'],
                'uploaded_file_name'=>$Data['uploaded_file_name'],
                'uploaded_file_extension'=>$Data['uploaded_file_extension'],
            ];
            $build->where('image_id', $Record_No['r_no']);

            if($build->update($upate_data)){
                return true;
            }
            else{
                return false;
            }
        }
        

    }

    // qulaity reasons after image update then update reasons
    public function update_reasons($data,$change){
        $db = \Config\Database::connect($this->site_connection);
        $build2 = $db->table('settings_quality_reasons');
        $build2->set('quality_reason_name',$data['quality_reason']);
        $build2->set('last_updated_by',$data['last_updated_by']);
        $build2->where('image_id', $change['r_no']);
        if ($build2->update()) {
            return true;
        }else{
            return false;
        }
    }

    // edit downtime reasons for particular records
     public function getDownReason($data)
    {
        $db = \Config\Database::connect($this->site_connection);
        $builder = $db->table('settings_downtime_reasons as rs');
        $builder->select('rs.downtime_reason,rs.downtime_category,img.original_file_name,rs.image_id,img.uploaded_file_location,img.uploaded_file_name,img.uploaded_file_extension');
        $builder->where('rs.image_id',$data);
        $builder->join('settings_downtime_reasons_images as img', 'img.image_id = rs.image_id');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    // button user interface getting tool data
    public function get_allToolData(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_tool_table');
        $query->select('*');
        // $query->where()
        $res = $query->get()->getResultArray();
        return $res;
    }


    // insert data in button configuration user interface
    public function insert_btn_ui($mydata){
        $db = \Config\Database::connect($this->site_connection);
        $builder = $db->table('settings_button_configuration');
        if ($builder->insert($mydata)) {
            return true;
        }else{
            return false;
        }
    }

    // this function get the count for set id generation purpose
    public function get_set_id_count(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_button_configuration');
        $query->select('count(r_no)');
        $res = $query->get()->getResultArray();

        return $res[0]['count(r_no)'];
    }



    // button configuration
    public function get_button_configurationdata(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_button_configuration');
        $query->select('*');
        $query->where('status',1);
        $res = $query->get()->getResultArray();

        return $res;
    }

    // button configuration gettings data
    public function get_single_data_btnui($set_id){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_button_configuration');
        $query->select('*');
        $query->where('set_id',$set_id);
        $res = $query->get()->getResultArray();
        return $res;
    }


    // button configuration updation data
    public function update_btn($edit_data){
        $db = \Config\Database::connect($this->site_connection);
        $build = $db->table('settings_button_configuration');
        if (!empty($edit_data['machine_id_group'])) {
            $build->set('machine_id_group', $edit_data['machine_id_group']);
        }

        if (!empty($edit_data['button_value_group'])) {
            $build->set('button_value_group', $edit_data['button_value_group']);
        }
        if (!empty($edit_data['category_group'])) {
            $build->set('category_group', $edit_data['category_group']);
        }
        if (!empty($edit_data['reason_id_group'])) {
            $build->set('reason_id_group', $edit_data['reason_id_group']);
        }
        if (!empty($edit_data['tool_id_group'])) {
            $build->set('tool_id_group', $edit_data['tool_id_group']);
        }

        if (!empty($edit_data['last_updated_by'])) {
            $build->set('last_updated_by',$edit_data['last_updated_by']);
        }

        if (!empty($edit_data['status'])) {
            $build->set('status',$edit_data['status']);
        }

        $build->where('set_id', $edit_data['set_id']);
        if ($build->update()) {
            return true;
        }else{
            return false;
        }


    }


    public function soft_delete_btn_ui($set_id){
        $db = \Config\Database::connect($this->site_connection);
        $build = $db->table('settings_button_configuration');
        $build->set('status',0);
        $build->where('set_id', $set_id);

        if ($build->update()) {
            return true;
        }else{
            return false;
        }

    }
}
?>