<?php 
namespace App\Models;
use CodeIgniter\Model;

class PDM_Model extends Model{

	// protected $db_name;
    protected $site_connection;
    public function __construct($db_name =null){

        // $db_name = $this->db_name;
        $this->session = \Config\Services::session();

        $db_name = $this->session->get('active_site');

        $this->site_creation = [
                    'DSN'      => '',
                    // 'hostname' => '165.22.208.52',
                    // 'username' => 'smartAd',
                    // 'password' => 'WaDl@#smat1!',
                    'hostname' => 'localhost',
                    'username' => 'root',
                    'password' => '',
                    
                    // 'database' => 'S1001',
                    'database' => ''.$db_name.'',

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

    // quality rejection for parts dropdown
    public function getRejectionPart(){
        $db1 = \Config\Database::connect($this->site_creation);
        $query = $db1->table('tool_changeover as t');
        $query->select('t.part_id')->distinct();
        $query->select('p.part_name');
        // $query->where('p.part_id !=',"PT1001");
        $query->join('settings_part_current as p','t.part_id = p.part_id');
        $res = $query->get()->getResultArray();
        return $res;
    } 

    public function  downtime_reason_retrive(){
        $db = \Config\Database::connect($this->site_creation);
        $builder = $db->table('settings_downtime_reasons');
        $builder->select('downtime_reason_id,downtime_category,downtime_reason');
        $builder->where('status','1');
        $query   = $builder->get()->getResultArray();
        return $query;
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

    public function getPart(){
        $db = \Config\Database::connect($this->site_creation);
        $query = $db->table('settings_part_current');
        $query->select('part_id');
        $query->select('part_name');
        $query->select('tool_id');
        $query->select('status');
        // temporary hide for this no part and no tool because reason name 
        // $query->Where('part_id !=',"PT1001");


        // for ($x = 0; $x < $l; $x++) {
        //     $query->Where('Machine_Id',$output[$x]['Machine_Id']);
        // }
        $res = $query->get()->getResultArray();
        return $res;
    }


    //its moved for settings model  temporary on for downtime graph
    public function getToolName(){
        $db = \Config\Database::connect($this->site_creation);
            
            $builder = $db->table('settings_part_current as s');
            $builder->select('s.tool_id,t.tool_name');
            $builder->where('s.status', 1);
            $builder->join('settings_tool_table as t', 't.tool_id = s.tool_id');
            $query =$builder->distinct()->get()->getResultArray();
            return $query;
    }

    //Find the part for Downtime Graph...........
    public function findPartTool($dateRef){
        $db = \Config\Database::connect($this->site_creation);
        /* temporary hide for this function for tool change over table udpation
        $query = $db->table("pdm_tool_changeover_log as s");
        $query->select('s.event_start_time,s.tool_id,s.part_id,p.part_name');
        $query->where('p.part_id !=', "PT1001");
        $query->join('settings_part_current as p', 'p.part_id = s.part_id');
        $output = $query->get()->getResultArray();
        */

        $query = $db->table('tool_changeover as s');
        $query->select('pd.event_start_time,pd.tool_id,s.part_id,p.part_name');
        // $query->where('p.part_id !=', "PT1001");
        $query->join('settings_part_current as p', 'p.part_id = s.part_id');
        $query->join('pdm_tool_changeover as pd','pd.tool_changeover_id = s.id');
        $output = $query->get()->getResultArray();
        return $output;
    }    

    // temporary moving on Settings model
    public function settings_machine()
    {
        $db = \Config\Database::connect($this->site_creation);
        $query = $db->table('settings_machine_current');
        $query->select('*');
        $res = $query->get()->getResultArray();
        return $res;
    }
    public function getDownGraph($machine_id,$shift_date,$shift){
        $db = \Config\Database::connect($this->site_creation);

        // $query = $this->db->table("pdm_events as pd");
        // $query->select('pd.*, rm.* , rd.*');
        // // $query->select('pd.*, rm.*');
        // $query->where('pd.machine_id', $machine_id);
        // $query->where('pd.shift_date', $shift_date);
        // $query->where('pd.shift_id', $shift);
        // $query->orderBy('pd.machine_event_id', 'ASC');
        // $query->join('pdm_downtime_reason_mapping as rm', 'pd.machine_event_id = rm.machine_event_id',"left");
        // $query->join('oui_downtime_reasons_default as rd', 'rm.downtime_reason_id = rd.downtime_reason_id',"left");
        // // $output['machineData'] = $query->get()->getResultArray();

        /* temporary hide for this function because its one tool multipart and tool change over table updation
        $query = $db->table("pdm_events as p");
        $query->select('p.*,t.part_name');
        $query->where('p.machine_id', $machine_id);
        $query->where('p.shift_date', $shift_date);
        $query->where('p.shift_id', $shift);
        $query->join('settings_part_current as t', 't.part_id = p.part_id',"left");
        $output = $query->get()->getResultArray();

        */

        $query = $db->table("pdm_events");
        $query->select('*');
        $query->where('machine_id',$machine_id);
        $query->where('shift_date',$shift_date);
        $query->where('shift_id',$shift);
        $output = $query->get()->getResultArray();
        return $output;
    }  

    // split function production downtime
    public function findSplit($ref){
        $db = \Config\Database::connect($this->site_creation);
        $builder = $db->table('pdm_events');
        $builder->select('*');
        $builder->where('machine_event_id', $ref);
        //$builder->where('is_split', 1);
        $out = $builder->get()->getResultArray();

        if (sizeof($out) > 0) {
            $query = $db->table("pdm_events as pd");
            $query->select('pd.machine_event_id, rm.*');
            $query->where('pd.machine_event_id', $ref);
            $query->orderBy('rm.calendar_date');
            $query->orderBy('rm.start_time');
            // $query->orderBy('rm.split_id');
            $query->join('pdm_downtime_reason_mapping as rm', 'pd.machine_event_id = rm.machine_event_id');
            $output['value'] = $query->get()->getResultArray();
            $output['tvalue'] = $out[0]['duration'];

            return $output;
            // return $output;
        }
        else{
            return $output;
        }
        
    }

    public function getShiftExact($date){
        $db = \Config\Database::connect($this->site_creation);
        $build = $db->table('settings_shift_management');
        $build->select('*');
        $build->where('last_updated_on <=', $date);
        $build->orderBy('last_updated_on', 'DESC');
        $build->limit(1);
        $res = $build->get()->getResultArray();
        $output['duration'] = $res;
        if (!empty($res)) {
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

    public function splitDownGraph($data,$ref,$splitRef,$last_updated_by,$shift_id,$shift_date,$calendar_date){
        $db = \Config\Database::connect($this->site_creation);

        //Reference for child(splitted) record.....
        $builder = $db->table('pdm_downtime_reason_mapping');
        $builder->select('*');
        $builder->where('machine_event_id', $ref);
        $builder->orderBy('last_updated_on', 'DESC');
        $builder->limit(1);
        // $builder->where('Machine_ID', $id);
        // $builder->where('Shift', $id);
        //$builder->where('start_Time', $data[6]);
        $output = $builder->get()->getResultArray();
        //return $output[0]['split_id']+1;

        //Reference for root record......
        $query = $db->table('pdm_downtime_reason_mapping');
        $query->select('*');
        $query->where('machine_event_id', $ref);
        $query->where('split_id', $splitRef);
        $rec = $query->get()->getResultArray();

        //return $rec[0]['downtime_reason_id'];
        if (sizeof($output) == 0) {
      
        }
        else{
            //$split = sizeof($output)+1;
            $split = $output[0]['split_id']+1;
            $con = $db->table('pdm_downtime_reason_mapping');
            $con->set('split_duration',$data[2]);
            $con->set('start_time',$data[0]);
            $con->set('end_time',$data[1]);
            $con->set('last_updated_by',$last_updated_by);

            $con->where('split_id', $rec[0]['split_id']);
            $con->where('machine_event_id', $ref);
            if ($con->update()) {
                //Reference for root record......
                $child = $db->table('settings_downtime_reasons');
                $child->select('downtime_reason_id');
                $child->where('downtime_category', "Unplanned");
                $child->where('downtime_reason', "Unnamed");
                $childReason = $child->get()->getResultArray();
                $val2 =[
                    'machine_event_id' => $ref,
                    'machine_id'=>$rec[0]['machine_id'],
                    'split_id' =>$split,
                    'calendar_date'=>$calendar_date,
                    'shift_date'=>$shift_date,
                    'shift_id' => $shift_id,
                    'split_duration' => $data[5],
                    'start_time' => $data[3],
                    'end_time' => $data[4],
                    'part_id' => $rec[0]['part_id'],
                    'tool_id' => $rec[0]['tool_id'],
                    'downtime_reason_id' => $childReason[0]['downtime_reason_id'],
                    'last_updated_by'=> $last_updated_by,
                ];
                sleep(1);
                if ($con->insert($val2)) {
                    $build = $db->table('pdm_events');
                    $build->set('is_split',1);
                    $build->where('machine_event_id',$ref);
                    if ($build->update()) {
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
    }
     // tool change over table id generation
     public function tool_change_over_getid(){
        $db = \Config\Database::connect($this->site_creation);
        $builder = $db->table('pdm_tool_changeover');
        $builder->selectMax('tool_changeover_id');
        $builder->orderBy('tool_changeover_id','DESC');
        $builder->limit(1);
        $res = $builder->get()->getResultArray();
        return $res[0]['tool_changeover_id'];
    }

    public function updateDownGraph($data,$machineRef,$splitRef,$timeArray,$durationArray,$last_updated_by,$split_array,$date_array){

        $db = \Config\Database::connect($this->site_creation);
        $builder = $db->table('pdm_downtime_reason_mapping');
        $builder->select('*');
        $builder->where('machine_event_id', $machineRef);
        $builder->where('split_id', $splitRef);
        $output = $builder->get()->getResultArray();

        if (sizeof($output) == 0) {

        }
        else{   
            $db = \Config\Database::connect($this->site_creation);

            $table = $db->table('pdm_downtime_reason_mapping');
            $table->select('*');
            $table->where('machine_event_id', $machineRef);
            $table->where('split_id',$splitRef);
            $tableData = $table->get()->getResultArray();
            $build = $db->table('pdm_downtime_reason_mapping');
            $j=0;
            $size= sizeof($durationArray);
            $sstart="";
            $send="";
            $refStart="";
            $previous_reason ="";
            $previous_tool_start ="";
            $previous_tool_end ="";

            $tmp_tool_date['split_downtime'] = $tableData;
            $tmp_tool_date['splitref'] = $splitRef;
            $tmp_tool_date['mahcineref'] = $machineRef;
            $tmp_tool_date['timearray'] = $timeArray;
            $tmp_tool_date['duration array'] = $durationArray;
            $tmp_tool_date['data'] = $data;
            $tmp_tool_date['date array'] = $date_array;
            $tmp_tool_date['split array'] = $split_array;
            // return $tmp_tool_date;
        
            // for ($i = 0; $i < ($size); $i++) {
            foreach($split_array as $i => $val_arr){
                //   1=1
                // if($tableData[$i]['split_id'] == $splitRef){
                if($val_arr == $splitRef){
                    $previous_reason = $tableData[0]['downtime_reason_id'];
                    $tmp_tool_date['previous_reason'] = $previous_reason;
                    // return $tmp_tool_date;
                    $previous_tool_start = $timeArray[2*$i];
                    $previous_tool_end = $timeArray[(2*$i)+1];

                    $build->set('start_time',$timeArray[2*$i]);
                    $build->set('split_duration',$durationArray[$i]);
                    $build->set('end_time',$timeArray[(2*$i)+1]);
                    $build->set('downtime_reason_id',$data[1]);
                    $build->set('notes',$data[9]);
                    $build->set('calendar_date',$date_array[$i]);
                    $build->set('last_updated_by',$last_updated_by);
                    $build->where('split_id', $splitRef);
                    $build->where('machine_event_id', $machineRef);
                    if ($build->update()) {
                        $j=$j+1;
                    }
                    $sstart = $timeArray[2*$i];
                    $send = $timeArray[(2*$i)+1];
                   // $j = $j+1;
                }
                else{
                    $refStart = $timeArray[2*$i];
                    $build->set('start_time',$timeArray[2*$i]);
                    $build->set('split_duration',$durationArray[$i]);
                    $build->set('end_time',$timeArray[(2*$i)+1]);
                    $build->set('calendar_date',$date_array[$i]);
                    $build->set('last_updated_by',$last_updated_by);
                    $build->where('split_id', $val_arr);
                    $build->where('machine_event_id', $machineRef);
                    if ($build->update()) {
                        $j=$j+1;
                    } 
                    //$j = $j+1;
                }
            }  
            // return "reasons updated";
            if ($j == sizeof($durationArray)) { 
                
                //Update the Reason Mapped
                $codeTable = $db->table('pdm_downtime_reason_mapping as m');
                $codeTable->select('m.machine_event_id');
                $codeTable->where('m.machine_event_id', $machineRef);
                $codeTable->where('r.downtime_category', "Unplanned");
                $codeTable->where('r.downtime_reason', "Unnamed");
                $codeTable->join('settings_downtime_reasons as r','r.downtime_reason_id  = m.downtime_reason_id ');
                $codeVal = $codeTable->get()->getResultArray();

                if (sizeof($codeVal) < 1) {
                    $bd = $db->table('pdm_events');
                    $bd->set('reason_mapped',1);
                    // $db->set('last_updated_by',$last_updated_by);
                    $bd->where('machine_event_id',$machineRef);
                    if ($bd->update()) {
                        //pass
                    }
                    else{
                        return false;
                    }
                }
                else{
                    $bd = $db->table('pdm_events');
                    $bd->set('reason_mapped',0);
                    $bd->where('machine_event_id',$machineRef);
                    if ($bd->update()) {
                        //pass
                    }
                    else{
                        return false;
                    }
                }
                if ($data[1] == 2 OR $data[1] == 3) {
                    // $query = $db->table('pdm_tool_changeover_log');
                    $mid=$data[6];
                    // tool change over id generation
                    $tool_changeover_id = $this->tool_change_over_getid();
                    // return $tool_changeover_id;
                    if (!empty($tool_changeover_id)) {
                        $new_tool_changeover_id = $tool_changeover_id+1;
                       
                    }else{
                        $new_tool_changeover_id = 1000+1;
                    }
                    $part_arr = $data[3];
                    $tmp_tool_id = $data[2];
                    $tmp_shift_date = $data[7];

                    $tool_change_data = [
                        "tool_changeover_id" => $new_tool_changeover_id,
                        "machine_id" => $data[6],
                        "no_of_part"=>count($part_arr),
                        "tool_id"=>$tmp_tool_id,
                        "shift_date" =>$tmp_shift_date,
                        "calendar_date" => $output[0]['calendar_date'],
                        "event_start_time"=>$sstart,
                        "shift_id"=>$data[8],
                        "machine_event_id"=>$machineRef,
                        "last_updated_by" => $last_updated_by,
                    ];

                    $tool_change_tb = $db->table('pdm_tool_changeover');
                    $tool_child_tb = $db->table('tool_changeover');
                    $tool_changeover_cdate = $output[0]['calendar_date'];
                    if ($tool_change_tb->insert($tool_change_data)) {
                        $len = count($part_arr);
                        for($j=0;$j<$len;$j++){
                            $tmp_part_order = $j+1;
                            $data_tool_child =[
                                "id" => $new_tool_changeover_id,
                                "machine_id"=>$data[6],
                                "part_id"=>$part_arr[$j],
                                "part_order" => $tmp_part_order,
                                // "last_updated_by"=>$last_updated_by,
                            ];

                            if($tool_child_tb->insert($data_tool_child)){
                                $tmp = $len-1;
                                if ($j == $tmp) {
                                    $part_str = implode(',',$part_arr);

                                    // $tmp11['machineref'] = $machineRef;
                                    // $tmp11['tool_changeover'] = $tool_changeover_cdate;
                                    // $tmp11['tool id'] = $tmp_tool_id;
                                    // $tmp11['part str'] = $part_str;
                                    // $tmp11['tmp shift date'] = $tmp_shift_date;
                                    // $tmp11['time array'] = $timeArray[2*$splitRef];
                                    // $tmp11['sstart'] = $sstart;
                                    // $tmp11['end'] = $send;
                                    // $tmp11['mid'] = $mid;
                                    // return $tmp11;
                                    $var = $this->updatePDMGraph($machineRef,$tool_changeover_cdate,$tmp_tool_id,$part_str,$tmp_shift_date,$timeArray[2*$splitRef],$sstart,$send,$mid,$last_updated_by);
                                    return $var;
                                }
                            }else{  
                                return false;
                            }

                        }
                    }
                }
                else{
                    
                    //  return $previous_reason;
                    
                    if ($previous_reason == 2 OR $previous_reason == 3) {
                        $data =[
                            "shift_date" =>$data[7],
                            "event_start_time"=>$sstart,
                            "shift_id"=>$data[8],
                            "machine_id"=>$data[6],
                            "calendar_date"=>$output[0]['calendar_date'],
                        ];                        
                        // return $data;
                        $var = $this->deletePDMGraph($machineRef,$data,$previous_tool_start,$previous_tool_end,$last_updated_by);

                        return $var;
                    }
                    else{
                        return "true_ok";
                    }
                }
            } 
            else{
                return false;
            }
       
        }
    }

    public function deletePDMGraph($machineRef,$data,$previous_tool_start,$previous_tool_end,$last_updated_by){
        $db = \Config\Database::connect($this->site_creation);

        // current tool changeover 
        $current_tool = $db->table('pdm_tool_changeover');
        $current_tool->select('*');
        $current_tool->where('shift_date',$data['shift_date']);
        $current_tool->where('machine_id',$data['machine_id']);
        $current_tool->where('machine_event_id',$machineRef);
        $current_tool->where('event_start_time',$data['event_start_time']);
        $current_tool->where('shift_id',$data['shift_id']);
        $current_tool->where('calendar_date',$data['calendar_date']);
        $current_record = $current_tool->get()->getResultArray();

        // previous tool changeover
        $query = $db->table('pdm_tool_changeover');
        $query->select('*');
        $query->where('calendar_date <=',$data['calendar_date']);
        $query->where('machine_id',$data['machine_id']);
        $query->where('machine_event_id <',$machineRef);
        // $query->where('tool_changeover_id !=',$current_record[0]['tool_changeover_id']);
        $query->orderby('machine_event_id','DESC');
        $query->limit(1);
        $response = $query->get()->getResultArray();   
        
        // future tool changeover
        $query1 = $db->table('pdm_tool_changeover');
        $query1->select('*');
        $query1->where('calendar_date >=',$data['calendar_date']);
        $query1->where('machine_id',$data['machine_id']);
        $query1->where('machine_event_id >',$machineRef);
        $query1->orderby('calendar_date','ASC');
        $query1->limit(1);
        $response1 = $query1->get()->getResultArray();   

        // just display conditions 
        $tmp_check['before tool_change'] = $response;
        $tmp_check['after_tool_change'] = $response1;
        $tmp_check['msg'] = "tool changeover deletion for reason mapping";
        $tmp_check['previous_tool_changeover_starttime'] = $previous_tool_start;
        $tmp_check['previsou_tool_changeover_endtime'] = $previous_tool_end;

        // return $tmp_check;
        $query_info_start = $db->table('pdm_production_info');
        $query_info_start->select('*');
        $query_info_start->where('calendar_date',$data['calendar_date']);
        $query_info_start->where('shift_date',$data['shift_date']);
        $query_info_start->where('machine_id',$data['machine_id']);
        $query_info_start->where('end_time',$previous_tool_start);
        $query_info_start->where('hierarchy','parent');
        // $query_info_start->limit(1);
        $response_info_start = $query_info_start->get()->getResultArray();

        $tmp_check['pdm_info_insertion_rescord'] = $response_info_start;
        // return $tmp_check;
        // insertion record

        $query_info_end = $db->table('pdm_production_info');
        $query_info_end->select('*');
        $query_info_end->where('calendar_date',$data['calendar_date']);
        $query_info_end->where('shift_date',$data['shift_date']);
        $query_info_end->where('machine_id',$data['machine_id']);
        $query_info_end->where('start_time',$previous_tool_start);
        $query_info_end->where('hierarchy','parent');
         // $query_info_end->limit(1);
        $response_info_end = $query_info_end->get()->getResultArray();

        // $tmp_check['pdm_info_updation_record'] = $response_info_end;

        // condition for previous tool changeover
        if(sizeof($response) <1){
            $bd = $db->table('settings_part_current');
            $bd->select('*');
            $bd->where('part_name',"No Part");
            $response = $bd->get()->getResultArray();
        }
             //Previous Part....
            // muliple parts get every part partproduced by cycle
            $previous_part_count = $response[0]['no_of_part'];
            $part_based_ppc = [];
            $part_arr_pdm = [];
            for ($p=0; $p<$previous_part_count; $p++) { 
                $get_part = $db->table('tool_changeover');
                $get_part->select('part_id');
                $get_part->where('part_order',$p+1);
                $get_part->where('id',$response[0]['tool_changeover_id']);
                $get_part_arr = $get_part->get()->getResultArray();
                $tmpid = $get_part_arr[0]['part_id'];
                $tmp_ppc = $this->getpppc($tmpid);
                $part_based_ppc[$tmpid] =  $tmp_ppc;
                array_push($part_arr_pdm,$tmpid);
            }
     
            if (count($part_arr_pdm)<1) {
                array_push($part_arr_pdm,"PT1001");
                $part_based_ppc['PT1001'] = 0;
            }
       
        // $tmp_check['part_based_ppc'] = $part_based_ppc;
        $chec_start_time = explode(":",$previous_tool_start);
        $tmp_time_check['previous tool changeover time'] = $previous_tool_start;
        $tmp_time_check['$check_start_time_arr'] = $chec_start_time;
        $tmp_time_check['hour'] = $chec_start_time[0];
       
        if (strcmp($chec_start_time[0].":00:00",$previous_tool_start)== 0) {
            $start_time_info = $response_info_end[0]['start_time'];
            $end_time_info = $response_info_end[0]['end_time'];   
            
        }else{
            $start_time_info = $response_info_start[0]['start_time'];
            $end_time_info = $response_info_end[0]['end_time'];   
        }

        $tmp_time_check['start time'] = $start_time_info;
        $tmp_time_check['end time'] = $end_time_info;

        
       
        $dst=$data['shift_date']." ".$start_time_info;
        $det=$data['shift_date']." ".$end_time_info; 

        //Production info table updation....
        $sstpcount = $current_record[0]['no_of_part'];
           
        if (count($response)>0) {
            $sstpcount_p = $response[0]['no_of_part'];
          
        }else{
            $sstpcount_p  = 1;   
        }
        $manager = new \MongoDB\Driver\Manager("mongodb://admin:quantanics123@165.22.208.52:27017/");
        try {
            $machineg = $db->table('settings_machine_iot as i');
            $machineg->select('i.machine_id,i.iot_gateway_topic,m.machine_serial_number');
            $machineg->where('i.machine_id',$data['machine_id']);
            $machineg->join('settings_machine_current as m','m.machine_id = i.machine_id');
            $machineg->limit(1);
            $machineg = $machineg->get()->getResultArray();
            $machinegateway = $machineg[0]['iot_gateway_topic'];
            $machineSerial = $machineg[0]['machine_serial_number'];

            $filter = array('data.gateway_time'=>array('$gte'=>$dst,'$lte'=>$det),'data.status'=>'Active');

            $filter1 = array('data.gateway_time'=>array('$gte'=>$dst,'$lte'=>$det),'data.status'=>'Active','data.machine_id'=>$machineSerial);
            
            $query = new \MongoDB\Driver\Query($filter);
            $site = $this->session->get('active_site');
            $mid = $data['machine_id'];
            $url = "S1001".".".$machinegateway;
            $url1 = "S1001"."."."/chennai/S1001/offline";
            $rows = $manager->executeQuery("".$url."" , $query);
            $rows1 = $manager->executeQuery("".$url."" , $query);
            $k = $rows->toArray();
            $k1 = $rows->toArray();
            $l=0;
            $shotstart=0;
            $shotend=0;
            $actual_shot_count = sizeof($k)+sizeof($k1);
           
            // tool changeover reason mapping for shift time and hour start time same condition 
            if ((strcmp($chec_start_time[0].":00:00",$previous_tool_start) == 0)) {
                // previous record updation for tool change over remove 
                $hstpid = $part_arr_pdm[0];
                $partsProduced = $actual_shot_count * $part_based_ppc[$hstpid];
                $db->transBegin();
                $que['part_id']=$part_arr_pdm[0];
                $que['tool_id']= $response[0]['tool_id'];
                if (sizeof($k)<1) {
                    $partsProduced=null;
                }
                if ($partsProduced > 0) {
                    $tmpc = '-'.$partsProduced;
                }else{
                    $tmpc = $partsProduced;
                }
                $que['production']=$partsProduced;
                $que['correction_min_counts']= $tmpc;
                $que['corrections']=0;
                $que['rejection_max_counts']= $partsProduced;
                $que['rejections']= 0;
                $que['last_updated_by'] = $last_updated_by;
                $que['actual_shot_count'] = $actual_shot_count;
                $que['start_time'] = $start_time_info;
                $que['end_time'] = $end_time_info;
        
                $e = $db->table('pdm_production_info');
                $e->where('production_event_id',$response_info_end[0]['production_event_id']);
                
                if($e->update($que)){
                    $db->transCommit();
                    $get_child_arr = $this->getno_of_child($response_info_end[0]['production_event_id']);
                    if (count($get_child_arr)>0) {
                        if ($sstpcount_p == $sstpcount) {
                            // updation for same parts
                            // 0<1
                            $sscp = 0;
                            while($sscp<count($get_child_arr)){
                                $db->transBegin();
                                $tmp_part_id = $part_arr_pdm[$sscp+1];
                                $child_tppc = $part_based_ppc[$tmp_part_id];
                                $parts_production = (int)$get_child_arr[$sscp]['actual_shot_count'] * (int)$child_tppc;
                                if (($get_child_arr[$sscp]['production']) == null) {
                                    $tmpparts_production = null;
                                    $tmpcorrection_min_count= $parts_production;
                                }
                                else{
                                    $tmpparts_production = $parts_production;
                                    if ($parts_production > 0) {
                                        $tmpcorrection_min_count= "-".$parts_production;
                                    }else{
                                        $tmpcorrection_min_count= $parts_production;
                                    }
                                  
                                }
                                $sss_up = [
                                    "part_id" => $part_arr_pdm[$sscp+1],
                                    "tool_id" => $response[0]['tool_id'],
                                    "production" => $tmpparts_production,
                                    "correction_min_counts" => $tmpcorrection_min_count,
                                    "corrections" => 0,
                                    "rejection_max_counts" => $tmpparts_production,
                                    "rejections" => 0,
                                    "correction_notes" => " ",
                                    "rejections_notes" => " ",
                                    "reject_reason" => " ",
                                    "last_updated_by" => $last_updated_by 
                                ];
                                $scup = $db->table('pdm_production_info');
                                $scup->where('production_event_id',$get_child_arr[$sscp]['production_event_id']);
                                if ($scup->update($sss_up)) {
                                    $db->transCommit();
                                    $sscp = $sscp + 1;
                                }
                            }
                        }
                        // previous parts are greater
                        // 3>2
                        elseif($sstpcount_p > $sstpcount){
                             // 1= 3 - 2
                            $ss_ins_count = $sstpcount_p - $sstpcount;
                             //  1= 1 
                            $ss_upcount = count($get_child_arr);
                            $sgu = 0;
                            // updation condition
                            while($sgu<$ss_upcount){
                                $db->transBegin();
                                $gtpid = $part_arr_pdm[$sgu+1];
                                $ch_up_ppc = $part_based_ppc[$gtpid];
                                $cgparts_production = (int)$get_child_arr[$sgu]['actual_shot_count'] * (int)$ch_up_ppc;
                                if (($get_child_arr[$sgu]['production']) == null) {
                                    $tmpparts_production = null;
                                    $tmpcorrection_min_count= '-'.$cgparts_production;
                                }
                                else{
                                    $tmpparts_production = $cgparts_production;
                                    if ($cgparts_production>0) {
                                        $tmpcorrection_min_count= "-".$cgparts_production;

                                    }else{
                                        $tmpcorrection_min_count= $cgparts_production;

                                    }
                                   
                                }
                                $c_gup = [
                                    "part_id" => $gtpid,
                                    "tool_id" => $response[0]['tool_id'],
                                    "production" => $tmpparts_production,
                                    "correction_min_counts" => $tmpcorrection_min_count,
                                    "corrections" => 0,
                                    "rejection_max_counts" => $tmpparts_production,
                                    "rejections" => 0,
                                    "correction_notes" => " ",
                                    "rejections_notes" => " ",
                                    "reject_reason" => " ",
                                    "last_updated_by" => $last_updated_by
                                ];

                                $ssex_greater_up = $db->table('pdm_production_info');
                                $ssex_greater_up->where('production_event_id',$get_child_arr[$sgu]['production_event_id']);
                                
                                if ($ssex_greater_up->update($c_gup)) {
                                    $db->transCommit();
                                    $sgu = $sgu + 1;
                                    
                                }
                            }

                            // existing is greater the parts insertion
                            $ex_d = 0;
                            // 1
                            while($ex_d<$ss_ins_count){
                                // 2 = 0 + 3
                                $db->transBegin();
                                // 2=0+1+1
                                $ex_del_in = $ex_d + $ss_upcount+1;
                                $db = \Config\Database::connect($this->site_creation);
                                // $ex_ins_tb = $db->table('pdm_production_info');
                                //2...8
                                $ex_tmpid = $part_arr_pdm[$ex_del_in];
                                $cu_ppc = $part_based_ppc[$ex_tmpid];
                                $exgproduction_count = (int)$value->actual_shot_count * (int)$cu_ppc;
                                $tmp_production_event_id = $this->get_infoid();
                                $hierarchy = $response_info_end[0]['production_event_id'];
                                if ($exgproduction_count > 0) {
                                    $exgcorrectioncount = '-'.$exgproduction_count;
                                }else{
                                    $exgcorrectioncount = $exgproduction_count;
                                }
                                $exgins = [
                                    "production_event_id" => "PE".$tmp_production_event_id,
                                    "machine_id" => $response_info_end[0]['machine_id'],
                                    "calendar_date" => $response_info_end[0]['calendar_date'],
                                    "shift_date" => $response_info_end[0]['shift_date'],
                                    "shift_id" => $response_info_end[0]['shift_id'],
                                    "start_time" => $response_info_end[0]['start_time'],
                                    "end_time" => $response_info_end[0]['end_time'],
                                    "part_id" => $ex_tmpid,
                                    "tool_id" => $response[0]['tool_id'],
                                    "actual_shot_count" => $response_info_end[0]['actual_shot_count'],
                                    "production" => $exgproduction_count,
                                    "correction_min_counts" => $exgcorrectioncount,
                                    "corrections" => '0',
                                    "rejection_max_counts" => $exgproduction_count,
                                    "rejections" => '0',
                                    "last_updated_by" => $last_updated_by,
                                    "hierarchy" => $hierarchy
                                ];
                                $exg_insrec = $db->table('pdm_production_info');
                                // return $tins_rec;
                                if ($exg_insrec->insert($exgins)) {
                                    //   return "insertion success";
                                    $db->transCommit();
                                    $ex_d = $ex_d + 1;
                                }
                
                            }       


                        }
                        // 5<6 current is greater
                        elseif($sstpcount_p < $sstpcount){
                            //  1=6-5
                            $exldel_count = $sstpcount - $sstpcount_p;
                            // 4 = 5-1
                            $exup_count = $sstpcount_p - 1;

                            //    updation condition
                            $exlup = 0;
                            // 0<4
                            while($exlup<$exup_count){
                                $db->transBegin();
                                $exlpartid = $part_arr_pdm[$exlup+1];
                                $exluppc = $part_based_ppc[$exlpartid];
                                $exlparts_production = (int)$get_child_arr[$exlup]['actual_shot_count'] * (int)$exluppc;
                                // return $parts_production;
                                // break;
                                if (($get_child_arr[$exlup]['production']) == "Null") {
                                    $tmpparts_production = "Null";
                                    $tmpcorrection_min_count= $exlparts_production;
                                }
                                else{
                                    $tmpparts_production = $exlparts_production;
                                    if ($exlparts_production > 0) {
                                        $tmpcorrection_min_count= "-".$exlparts_production;
                                    }else{
                                        $tmpcorrection_min_count= $exlparts_production;
                                    }
                                   
                                }
                                $exlup_rec = [
                                   "part_id" => $exlpartid,
                                    "tool_id" => $response[0]['tool_id'],
                                    "production" => $tmpparts_production,
                                    "correction_min_counts" => $tmpcorrection_min_count,
                                    "corrections" => 0,
                                    "rejection_max_counts" => $tmpparts_production,
                                    "rejections" => 0,
                                    "correction_notes" => " ",
                                    "rejections_notes" => " ",
                                    "reject_reason" => " ",
                                    "last_updated_by" => $last_updated_by
                                ];
                                $exle_up_tb = $db->table('pdm_production_info');
                                $exle_up_tb->where('production_event_id',$get_child_arr[$exlup]['production_event_id']);
                                if ($exle_up_tb->update($exlup_rec)) {
                                    $db->transCommit();
                                    $exlup = $exlup + 1;
                                     
                                }
                            }
                            // deletion condition
                            $exldel = 0;
                            while($exldel<$del_count){
                                // 4 = 0 + 4
                                $db->transBegin();
                                $exldel_index = $exldel + $exup_count;
                                $db = \Config\Database::connect($this->site_creation);
                                $exl_del_tb = $db->table('pdm_production_info');
                                //2...8
                                $exl_del_tb->where('production_event_id',$get_child_arr[$exldel_index]['production_event_id']);
                                if ($exl_del_tb->delete()) {
                                    $db->transCommit();
                                    $exldel = $exldel + 1;
                                }
                            }
                        }
                    }
                    else{
                        if ($sstpcount_p > $sstpcount) {
                            //  1= 2-1
                            $exn_ins_count = $sstpcount_p - $sstpcount;
                            // return "existing is greater".$previous_toolc_count." but current is ".$current_toolc_count." part".$ins_count;
                            $exnc = 0;
                            //0<7
                            while($exnc<$exn_ins_count){
                                // 2 = 0 + 3
                                $db->transBegin();
                                $exnins = $exnc+1;
                                $db = \Config\Database::connect($this->site_creation);
                                $ex_instb = $db->table('pdm_production_info');
                                $exnipid = $part_arr_pdm[$exnins];
                                $exnppc = $part_based_ppc[$exnipid];
                                $exnproduction_count = (int)$value->actual_shot_count * (int)$exnppc;
                                $tmp_production_event_id = $this->get_infoid();
                                $hierarchy = $response_info_end[0]['production_event_id'] ;

                                if($exnproduction_count > 0){
                                    $excorrectionmincount = '-'.$exnproduction_count;
                                }else{
                                    $excorrectionmincount = $exnproduction_count;
                                }

                                $exnins_rec = [
                                    "production_event_id" => "PE".$tmp_production_event_id,
                                    "machine_id" => $response_info_end[0]['machine_id'],
                                    "calendar_date" => $response_info_end[0]['calendar_date'],
                                    "shift_date" => $response_info_end[0]['shift_date'],
                                    "shift_id" => $response_info_end[0]['shift_id'],
                                    "start_time" => $response_info_end[0]['start_time'],
                                    "end_time" => $response_info_end[0]['end_time'],
                                    "part_id" => $exnipid,
                                    "tool_id" => $response[0]['tool_id'],
                                    "actual_shot_count" => $response_info_end[0]['actual_shot_count'],
                                    "production" => $exnproduction_count,
                                    "correction_min_counts" => $excorrectionmincount,
                                    "corrections" => '0',
                                    "rejection_max_counts" => $exnproduction_count,
                                    "rejections" => '0',
                                    "last_updated_by" => $last_updated_by,
                                    "hierarchy" => $hierarchy
                                ];
                                $exninstb = $db->table('pdm_production_info');
                                if ($exninstb->insert($exnins_rec)) {
                                    $db->transCommit();
                                    $exnc = $exnc + 1;
                                }
                            } 
                        }
                    }
                
                }

            }
            // normal shift time tool changeover reason map
            else{

                // previous record updation for tool change over remove 
                $parent_updation_pid = $response_info_start[0]['part_id'];
                $partsProduced = $actual_shot_count * $part_based_ppc[$parent_updation_pid];
                $db->transBegin();
                $que['part_id']=$part_arr_pdm[0];
                $que['tool_id']= $response[0]['tool_id'];
                if (sizeof($k)<1) {
                    $partsProduced=null;
                }
                $que['production']=$partsProduced;
                if ($partsProduced > 0) {
                    $que['correction_min_counts']= "-".$partsProduced;
                }else{
                    $que['correction_min_counts']= $partsProduced;
                }
              
                $que['corrections']=0;
                $que['rejection_max_counts']= $partsProduced;
                $que['rejections']= 0;
                $que['last_updated_by'] = $last_updated_by;
                $que['actual_shot_count'] = $actual_shot_count;
                $que['start_time'] = $start_time_info;
                $que['end_time'] = $end_time_info;
        
                $e = $db->table('pdm_production_info');
                $e->where('production_event_id',$response_info_start[0]['production_event_id']);
                
                if($e->update($que)){
                    $db->transCommit();
                    $get_child_arr = $this->getno_of_child($response_info_start[0]['production_event_id']);
                    if (count($get_child_arr)>0) {
                        $n=0;
                        while($n<count($get_child_arr)){
                            $tmp_child_part_id = $get_child_arr[$n]['part_id'];
                            $child_up['part_id'] = $get_child_arr[$n]['part_id'];
                            $child_up['tool_id'] = $get_child_arr[$n]['tool_id'];
                            $child_part_produced = $actual_shot_count * $part_based_ppc[$tmp_child_part_id];
                            $db->transBegin();
                            if (sizeof($k)<1) {
                                $child_part_produced=null;
                            }
                            if ($child_part_produced>0) {
                                $child_up['correction_min_counts']= "-".$child_part_produced;
                            }else{
                                $child_up['correction_min_counts']= $child_part_produced;
                            }
                            $child_up['production']=$child_part_produced;
                           
                            $child_up['corrections']=0;
                            $child_up['rejection_max_counts']= $child_part_produced;
                            $child_up['rejections']= 0;
                            $child_up['last_updated_by'] = $last_updated_by;
                            $child_up['actual_shot_count'] = $actual_shot_count;
                            $child_up['start_time'] = $start_time_info;
                            $child_up['end_time'] = $end_time_info;

                            $c_up = $db->table('pdm_production_info');
                            $c_up->where('production_event_id',$get_child_arr[$n]['production_event_id']);
                            if ($c_up->update($child_up)) {
                                $db->transCommit();
                                $n = $n + 1;
                            }
                        }
                    }
                
                }


                // tool changeover delete
                $cu_tool_remove = $db->table('pdm_production_info');
                $cu_tool_remove->where('production_event_id',$response_info_end[0]['production_event_id']);
                
                if($cu_tool_remove->delete()){
                    $del_arr = $this->getno_of_child($response_info_end[0]['production_event_id']);
                    if (count($del_arr)>0) {
                        $d = 0;
                        while($d<count($del_arr)){
                            $del_child = $db->table('pdm_production_info');
                            $del_child->where('production_event_id',$del_arr[$d]['production_event_id']);
                            if ($del_child->delete()) {
                                $d = $d+1;
                            }
                        }
                    }
                }
                
            }
           
            
            // Get the the data from the production info table.
            if (count($response1)>0) {
                // get production info array this condtion for after tool changeover
                $builder = $db->table('pdm_production_info');
                $builder->select('*');
                $builder->where('calendar_date >=',$data['calendar_date']);
                $builder->where('machine_id',$data['machine_id']);
                $builder->where('calendar_date<=',$response1[0]['calendar_date']);
                $builder->where('hierarchy','parent');
                $info_res = $builder->get()->getResult();

                 // Get the data from the PDM reason mapping table
                $pdmData = $db->table('pdm_downtime_reason_mapping');
                $pdmData->select('*');
                $pdmData->where('calendar_date >=',$data['calendar_date']);
                $pdmData->where('machine_id',$data['machine_id']);
                $pdmData->where('calendar_date <=',$response1[0]['calendar_date']);
                $pdmDataUpdate = $pdmData->get()->getResult();
            }else{

                // 
                $builder = $db->table('pdm_production_info');
                $builder->select('*');
                $builder->where('calendar_date >=',$data['calendar_date']);
                $builder->where('machine_id',$data['machine_id']);
                $builder->where('hierarchy','parent');
                $info_res = $builder->get()->getResult();

                 // Get the data from the PDM reason mapping table
                $pdmData = $db->table('pdm_downtime_reason_mapping');
                $pdmData->select('*');
                $pdmData->where('calendar_date >=',$data['calendar_date']);
                $pdmData->where('machine_id',$data['machine_id']);
                $pdmDataUpdate = $pdmData->get()->getResult();
            }
            // $tmp_check['before res'] = count($info_res);
            // $tmp_check['end time'] = $end_time_info;
            // $tmp_check['calendar_date'] = $data;
            foreach ($info_res as $key => $value) {
                if ((strtotime($value->calendar_date) == strtotime($data['calendar_date'])) && (strtotime($value->start_time) < strtotime($data['event_start_time']))) {
                    unset($info_res[$key]);
                }
                if (count($response1)>0) {
                    if ((strcmp($response1[0]['calendar_date'],$value->calendar_date) == 0) && (strtotime($value->start_time) >= strtotime($response1[0]['event_start_time']))) {
                        unset($info_res[$key]);
                    }

                }
            }
            $total=0;
            //Production info table updation....
            $current_toolc_count = $current_record[0]['no_of_part'];
           
            if (count($response)>0) {
                $previous_toolc_count = $response[0]['no_of_part'];
              
            }else{
                $previous_toolc_count  = 1;   
            }
            $tmp_check['after filter'] = $info_res;
            $tmp_check['check'] = $previous_toolc_count ." ".$current_toolc_count;
            foreach ($info_res as $value) {

                $db->transBegin();
                $sc =  $value->actual_shot_count;
                
                $tmp_partid = $part_arr_pdm[0];
                $partsProduced = $sc * $part_based_ppc[$tmp_partid];
                // if ($value->production != "") {
                    $q['part_id']=$part_arr_pdm[0];
                    $q['tool_id']= $response[0]['tool_id'];
                    if (($value->production) == null) {
                        $q['production'] = null;
                    }
                    else{
                        $q['production']=$partsProduced;
                    }
                    if ($partsProduced > 0) {
                        $q['correction_min_counts']= "-".$partsProduced;  
                    }else{
                        $q['correction_min_counts']= $partsProduced;
                    }
                   
                    $q['corrections']=0;
                    $q['rejection_max_counts']= $partsProduced;
                    $q['rejections']= 0;
                    $q['correction_notes']="";
                    $q['rejections_notes']="";
                    $q['reject_reason']="";
                    $q['last_updated_by'] = $last_updated_by;

                    $qu = $db->table('pdm_production_info');
                    $qu->where('production_event_id',$value->production_event_id);
                    if ($qu->update($q)) {
                        
                        $db->transCommit();
                        $get_childs = $this->getno_of_child($value->production_event_id);
                        if (count($get_childs)>0) {
                            if ($current_toolc_count == $previous_toolc_count) {
                                try {
                                    $p = 0;
                                    while($p<count($get_childs)){
                                        $db->transBegin();
                                        $tmp_part_id = $part_arr_pdm[$p+1];
                                        $child_tppc = $part_based_ppc[$tmp_part_id];
                                        $parts_production = (int)$get_childs[$p]['actual_shot_count'] * (int)$child_tppc;
                                        if (($get_childs[$p]['production']) == null) {
                                            $tmpparts_production = null;
                                            $tmpcorrection_min_count= $parts_production;
                                        }
                                        else{
                                            $tmpparts_production = $parts_production;
                                            if($parts_production > 0){
                                                $tmpcorrection_min_count= "-".$parts_production;
                                            }else{
                                                $tmpcorrection_min_count= $parts_production;
                                            }
                                           
                                        }
                                        $child_updation = [
                                            "part_id" => $part_arr_pdm[$p+1],
                                            "tool_id" => $response[0]['tool_id'],
                                            "production" => $tmpparts_production,
                                            "correction_min_counts" => $tmpcorrection_min_count,
                                            "corrections" => 0,
                                            "rejection_max_counts" => $tmpparts_production,
                                            "rejections" => 0,
                                            "correction_notes" => " ",
                                            "rejections_notes" => " ",
                                            "reject_reason" => " ",
                                            "last_updated_by" => $last_updated_by 
                                        ];
                                        $child_up = $db->table('pdm_production_info');
                                        $child_up->where('production_event_id',$get_childs[$p]['production_event_id']);
                                        if ($child_up->update($child_updation)) {
                                            $db->transCommit();
                                            $p = $p + 1;
                                        }else{
                                            throw new Exception("same parts updation exception", $p);
                                        }
                                    }
            
                                } catch (Exception $e) {
                                    log_message('error','same parts updation in iteration:'.$e->getMessage());
                                }         
                            }
                            // 10 > 2
                            elseif ($previous_toolc_count > $current_toolc_count) {
                                // 8= 10 - 2
                                $ins_count = $previous_toolc_count - $current_toolc_count;
                                //  1= 1 
                                $up_count = count($get_childs);
                                try {
                                    // updation loop
                                    $u = 0;
                                    //0 < 2
                                    while($u<$up_count){
                                        $db->transBegin();
                                        $tpid = $part_arr_pdm[$u+1];
                                        $child_up_ppc = $part_based_ppc[$tpid];
                                        $parts_production = (int)$get_childs[$u]['actual_shot_count'] * (int)$child_up_ppc;
                                        if (($get_childs[$u]['production']) == "Null") {
                                            $tmpparts_production = "Null";
                                            $tmpcorrection_min_count= $parts_production;
                                        }
                                        else{
                                            $tmpparts_production = $parts_production;
                                            if($parts_production > 0){
                                                $tmpcorrection_min_count= "-".$parts_production;
                                            }else{
                                                $tmpcorrection_min_count= $parts_production;
                                            }
                                          
                                        }
                                        $ex_gup = [
                                            "part_id" => $tpid,
                                            "tool_id" => $response[0]['tool_id'],
                                            "production" => $tmpparts_production,
                                            "correction_min_counts" => $tmpcorrection_min_count,
                                            "corrections" => 0,
                                            "rejection_max_counts" => $tmpparts_production,
                                            "rejections" => 0,
                                            "correction_notes" => " ",
                                            "rejections_notes" => " ",
                                            "reject_reason" => " ",
                                            "last_updated_by" => $last_updated_by
                                        ];

                                        $ex_greater_up = $db->table('pdm_production_info');
                                        $ex_greater_up->where('production_event_id',$get_childs[$u]['production_event_id']);
                                        
                                        if ($ex_greater_up->update($ex_gup)) {
                                            $db->transCommit();
                                            $u = $u + 1;
                                            
                                        }
                                    }
                                
                                } catch (Exception $e) {
                                    log_message('error','exisiting part greater updation'.$e->getMessage());
                                }   
                                // Insertion loop
                                
                                $d = 0;
                                //0<8
                                while($d<$ins_count){
                                // 2 = 0 + 3
                                $db->transBegin();
                                // 2=1+1

                                    $del_index = $d + $up_count+1;
                                    $db = \Config\Database::connect($this->site_creation);
                                    $ins_tb = $db->table('pdm_production_info');
                                    //2...8
                                    try{
                                        $tmp_part_id = $part_arr_pdm[$del_index];
                                        $cu_ppc = $part_based_ppc[$tmp_part_id];
                                        $production_count = (int)$value->actual_shot_count * (int)$cu_ppc;
                                        $tmp_production_event_id = $this->get_infoid();
                                        $hierarchy = $value->production_event_id ;
                                        if ($production_count > 0) {
                                            $tmpcor = '-'.$production_count;
                                        }else{
                                            $tmpcor = $production_count;
                                        }
                                        $tins_rec = [
                                            "production_event_id" => "PE".$tmp_production_event_id,
                                            "machine_id" => $value->machine_id,
                                            "calendar_date" => $value->calendar_date,
                                            "shift_date" => $value->shift_date,
                                            "shift_id" => $value->shift_id,
                                            "start_time" => $value->start_time,
                                            "end_time" => $value->end_time,
                                            "part_id" => $tmp_part_id,
                                            "tool_id" => $response[0]['tool_id'],
                                            "actual_shot_count" => $value->actual_shot_count,
                                            "production" => $production_count,
                                            "correction_min_counts" => $tmpcor,
                                            "corrections" => '0',
                                            "rejection_max_counts" => $production_count,
                                            "rejections" => '0',
                                            "last_updated_by" => $last_updated_by,
                                            "hierarchy" => $hierarchy
                                        ];
                                        $greater_insert = $db->table('pdm_production_info');
                                        // return $tins_rec;
                                        if ($greater_insert->insert($tins_rec)) {
                                         //   return "insertion success";
                                            $db->transCommit();
                                            $d = $d + 1;
                                        }
                                         
                                    }
                                    catch(Exception $e){
                                        log_message('error','exisiting part greater updation'.$e->getMessage());
                                    }
                                }       
                            }
                            // current is greater
                            // 5 < 6
                            elseif ($previous_toolc_count < $current_toolc_count) {
                               $del_count = $current_toolc_count - $previous_toolc_count;
                               $up_count = $previous_toolc_count - 1;

                                // updation condition
                               $u = 0;
                               while($u<$up_count){
                                    $db->transBegin();
                                    try{
                                        $tpid = $part_arr_pdm[$u+1];
                                        $child_up_ppc = $part_based_ppc[$tpid];
                                        $parts_production = (int)$get_childs[$u]['actual_shot_count'] * (int)$child_up_ppc;
                                        // return $parts_production;
                                        // break;
                                        if (($get_childs[$u]['production']) == null) {
                                            $tmpparts_production = null;
                                            $tmpcorrection_min_count= $parts_production;
                                        }
                                        else{
                                            $tmpparts_production = $parts_production;
                                            if ($parts_production>0) {
                                                $tmpcorrection_min_count= "-".$parts_production;
                                            }else{
                                                $tmpcorrection_min_count= $parts_production;
                                            }
                                           
                                        }
                                        $ex_le = [
                                            "part_id" => $tpid,
                                            "tool_id" => $response[0]['tool_id'],
                                            "production" => $tmpparts_production,
                                            "correction_min_counts" => $tmpcorrection_min_count,
                                            "corrections" => 0,
                                            "rejection_max_counts" => $tmpparts_production,
                                            "rejections" => 0,
                                            "correction_notes" => " ",
                                            "rejections_notes" => " ",
                                            "reject_reason" => " ",
                                            "last_updated_by" => $last_updated_by
                                        ];

                                        $ex_greater_up = $db->table('pdm_production_info');
                                        $ex_greater_up->where('production_event_id',$get_childs[$u]['production_event_id']);
                                        if ($ex_greater_up->update($ex_le)) {
                                            $db->transCommit();
                                            $u = $u + 1;
                                            
                                        }
                                    }
                                    catch(Exception $e){
                                        log_message('error','exisiting part greater updation'.$e->getMessage());
                                    }
                               }
                                //    deletion condition
                                $del = 0;
                                while($del<$del_count){
                                    // 2 = 0 + 3
                                    $db->transBegin();
                                     $del_index = $del + $up_count;
                                     $db = \Config\Database::connect($this->site_creation);
                                     $del_tb = $db->table('pdm_production_info');
                                     //2...8
                                     try{
                                         $del_tb->where('production_event_id',$get_childs[$del_index]['production_event_id']);
                                         if ($del_tb->delete()) {
                                             $db->transCommit();
                                             $del = $del + 1;
                                         }
                                     }
                                     catch(Exception $e){
                                        log_message('error','exisiting part greater updation'.$e->getMessage());
                                    }
                                     
                                     
                                    
                                }
                                
                            }

                        }else{
                            // 2>1
                            if ($previous_toolc_count > $current_toolc_count) {
                                //  1= 2-1
                                $ins_count = $previous_toolc_count - $current_toolc_count;
                                // return "existing is greater".$previous_toolc_count." but current is ".$current_toolc_count." part".$ins_count;
                               
                                $d = 0;
                                //0<7
                                while($d<$ins_count){
                                    // 2 = 0 + 3
                                    $db->transBegin();
                                    $ins_index = $d+1;
                                    $db = \Config\Database::connect($this->site_creation);
                                    $ins_tb = $db->table('pdm_production_info');
                                    //2...8
                                    try{
                                        $tmp_part_id = $part_arr_pdm[$ins_index];
                                        $cu_ppc = $part_based_ppc[$tmp_part_id];
                                        $production_count = (int)$value->actual_shot_count * (int)$cu_ppc;
                                        $tmp_production_event_id = $this->get_infoid();
                                        $hierarchy = $value->production_event_id ;
                                        if ($production_count >0) {
                                            $tmpcorrectionmin = '-'.$production_count;
                                        }else{
                                            $tmpcorrectionmin = $production_count;
                                        }
                                        $tins_rec = [
                                            "production_event_id" => "PE".$tmp_production_event_id,
                                            "machine_id" => $value->machine_id,
                                            "calendar_date" => $value->calendar_date,
                                            "shift_date" => $value->shift_date,
                                            "shift_id" => $value->shift_id,
                                            "start_time" => $value->start_time,
                                            "end_time" => $value->end_time,
                                            "part_id" => $tmp_part_id,
                                            "tool_id" => $response[0]['tool_id'],
                                            "actual_shot_count" => $value->actual_shot_count,
                                            "production" => $production_count,
                                            "correction_min_counts" => $tmpcorrectionmin,
                                            "corrections" => '0',
                                            "rejection_max_counts" => $production_count,
                                            "rejections" => '0',
                                            "last_updated_by" => $last_updated_by,
                                            "hierarchy" => $hierarchy
                                        ];
                                        $greater_insert = $db->table('pdm_production_info');
                                        if ($greater_insert->insert($tins_rec)) {
                                            $db->transCommit();
                                            //return "insertion successfully for current one existing is greater";
                                            $d = $d + 1;
                                        }
                                        // if ($d == $ins_count) {
                                        //     return "current is lesser existing is greater".$ins_count;
                                        // }
                                        // else{
                                        //     throw new Exception("exisiting is greater insertion error", $d);
                                        // }
                                    }
                                    catch(Exception $e){
                                        return $e->errorMessage();
                                    }
                                }
                               
                                
                            }
                        }
                        $total=$total+1;
                    }
                    else{
                        return " parent not update false ";
                    }
            }
           // return "production info complete";
            foreach ($pdmDataUpdate as $key => $value) { 
                if ((strtotime($value->calendar_date) == strtotime($data['calendar_date'])) && ($value->machine_event_id <  $current_record[0]['machine_event_id']) && (strtotime($value->start_time) < strtotime($data['event_start_time']))){
                    unset($pdmDataUpdate[$key]);
                }
                if (count($response1)>0) {
                    if ((strtotime($value->calendar_date) == strtotime($response1[0]['calendar_date'])) && ($value->machine_event_id > $response1[0]['machine_event_id'])) {
                        unset($pdmDataUpdate[$key]);
                    }
                    if ((strcmp($response1[0]['machine_event_id'],$value->machine_event_id)==0) && (strtotime($value->start_time) >= strtotime($response1[0]['event_start_time']))) {
                        unset($pdmDataUpdate[$key]);
                    }   
                }
            }
            $r=[];
            $part_str_pdm_reasons = implode(",",$part_arr_pdm);
            foreach ($pdmDataUpdate as $value) {
                $s_reason['part_id']=$part_str_pdm_reasons;
                $s_reason['tool_id']= $response[0]['tool_id'];
                $s_reason['last_updated_by'] = $last_updated_by;
                $qr = $db->table('pdm_downtime_reason_mapping');
                $qr->where('machine_event_id',$value->machine_event_id);
                $qr->where('split_id',$value->split_id);
                if ($qr->update($s_reason)) {
                    //Check the count of insertion..
                    array_push($r, $value->machine_event_id);
                }
                else{
                    return "reason mapping false";
                }
            }

            //Get the data from the PDM Events table
            if (count($response1)>0) {
                $pdmDataEvent = $db->table('pdm_events');
                $pdmDataEvent->select('*');
                $pdmDataEvent->where('calendar_date >=',$data['calendar_date']);
                $pdmDataEvent->where('machine_id',$data['machine_id']);
                $pdmDataEvent->where('calendar_date <=',$response1[0]['calendar_date']);
                $pdmEventsDataUpdate = $pdmDataEvent->get()->getResult();

            }else{
                $pdmDataEvent = $db->table('pdm_events');
                $pdmDataEvent->select('*');
                $pdmDataEvent->where('calendar_date >=',$data['calendar_date']);
                $pdmDataEvent->where('machine_id',$data['machine_id']);
                $pdmEventsDataUpdate = $pdmDataEvent->get()->getResult();
            }
            
            //PDM Events table updation...
            $t_check['before event'] = $pdmEventsDataUpdate;
            $t_check['before count'] = count($pdmEventsDataUpdate);
            foreach ($pdmEventsDataUpdate as $key => $value) {
                if ((strtotime($value->calendar_date) == strtotime($data['calendar_date'])) && ($value->machine_event_id < $current_record[0]['machine_event_id'])) {
                    unset($pdmEventsDataUpdate[$key]);
                }
                if (count($response1)>0) {
                    if ((strtotime($value->calendar_date) == strtotime($response1[0]['calendar_date'])) && ($value->machine_event_id >= $response1[0]['machine_event_id']) ) {
                        unset($pdmEventsDataUpdate[$key]);
                    }
                   
                }
            }
            $part_str_pdm_event = implode(",",$part_arr_pdm);
            foreach ($pdmEventsDataUpdate as $value) {
                $s_event['part_id']=$part_str_pdm_event;
                $s_event['tool_id']= $response[0]['tool_id'];
                $qr_event = $db->table('pdm_events');
                $qr_event->where('machine_event_id',$value->machine_event_id);
                if ($qr_event->update($s_event)) {
                    //pass
                }
                else{
                    return "false pdm events";
                }
            }

            // return $current_record[0]['tool_changeover_id'];
            $del_count = (int)$current_record[0]['no_of_part'];
            $del = 0;
           while($del<$del_count){
            $db->transBegin();
                $builderDelete = $db->table('tool_changeover');
                $builderDelete->where('id',$current_record[0]['tool_changeover_id']);
                $builderDelete->where('part_order',$del+1);
                if ($builderDelete->delete()) {
                    $db->transCommit();
                    $del = $del+1;
                }
                if ($del == $del_count) {
                    $db->transBegin();
                    $parent_del = $db->table('pdm_tool_changeover');
                    $parent_del->where('tool_changeover_id',$current_record[0]['tool_changeover_id']);
                    if($parent_del->delete()){
                        $db->transCommit();
                        return true;
                    }
                }
            }
        } 
        catch(MongoDB\Driver\Exception $e) {
           echo "Error has occured!";
           exit;
        }
    }
    public function findProductionCount($start_time,$end_time,$gateway,$site,$machineSerial){
        $manager = new \MongoDB\Driver\Manager("mongodb://admin:quantanics123@165.22.208.52:27017/");
        $filter = array('data.gateway_time'=>array('$gte'=>$start_time,'$lte'=>$end_time),'data.status'=>'Active');
        $query = new \MongoDB\Driver\Query($filter);
        $url = "S1001".".".$gateway;
        $rows = $manager->executeQuery("".$url."" , $query);
        $k = $rows->toArray();
        $filter1 = array('data.gateway_time'=>array('$gte'=>$start_time,'$lte'=>$end_time),'data.status'=>'Active','data.machine_id'=>$machineSerial);
        $url1 = "S1001"."."."/chennai/S1001/offline";
        $rows1 = $manager->executeQuery("".$url."" , $query);
        $k1 = $rows->toArray();
        return sizeof($k)+sizeof($k1);
    }


    // get part produced per cycle its new function
    public function findChild($event_id){
        $db = \Config\Database::connect($this->site_creation);
        // return $part_id;
        $build = $db->table('pdm_production_info');
        $build->select('production_event_id,part_id');
        $build->where('hierarchy',$event_id);
        $result = $build->get()->getResultArray();

        return $result;
    }

    // get part produced per cycle its new function
    public function getpppc($part_id){
        $db = \Config\Database::connect($this->site_creation);
        // return $part_id;
        $build = $db->table('settings_part_current');
        $build->select('part_produced_cycle');
        $build->where('part_id',$part_id);
        $result = $build->get()->getResultArray();

        return $result[0]['part_produced_cycle'];
    }


    // shift start time and hour start time updation condition function
    public function shift_hour_start_time_up($pid,$production_count,$end_time,$actual_shot_count,$last_updated_by,$tpart,$ttool){
        $db = \Config\Database::connect($this->site_creation);

        //  $this->session->get('user_name');
        $start_up['production']=$production_count;
        if ($production_count > 0) {
            $start_up['correction_min_counts']= "-".$production_count;
        }else{
            $start_up['correction_min_counts']= $production_count;
        }
      
        $start_up['corrections']=0;
        $start_up['rejection_max_counts']= $production_count;
        $start_up['rejections']= 0;
        $start_up['last_updated_by'] = $last_updated_by;
        $start_up['actual_shot_count'] = $actual_shot_count;
        $start_up['end_time']= $end_time;
        $start_up['part_id'] = $tpart;
        $start_up['tool_id'] = $ttool;
        // $que['last_updated_by'] = "parent";


        $f = $db->table('pdm_production_info');
        $f->where('production_event_id',$pid);
        if($f->update($start_up)){
            return true;
        }else{
            return false;
        }
    }

    // tool change over updation function example 9:00 to 9:30
    public function tool_change_updation($pid,$production_count,$end_time,$actual_shot_count,$last_updated_by){
        $db = \Config\Database::connect($this->site_creation);

        //  $this->session->get('user_name');
        $que['production']=$production_count;
      
        $que['corrections']=0;
        if ($production_count > 0) {
            $tmppro = '-'.$production_count; 
        }else{
            $tmppro = $production_count;
        }
        $que['correction_min_counts']= $tmppro;
        $que['rejection_max_counts']= $production_count;
        $que['rejections']= 0;
        $que['last_updated_by'] = $last_updated_by;
        $que['actual_shot_count'] = $actual_shot_count;
        $que['end_time']= $end_time;
        // $que['last_updated_by'] = "parent";


        $f = $db->table('pdm_production_info');
        $f->where('production_event_id',$pid);
        if($f->update($que)){
            return true;
        }else{
            return false;
        }

    }


    // prodcution info get child record di getting function 
   /* temporary hide for this code
    public function getchild_pid($pid,$partid){
        $db = \Config\Database::connect($this->site_creation);
        
        $pres = $db->table('pdm_production_info');
        $pres->select('production_event_id');
        $pres->where('hierarchy',$pid);
        // $pres->where('hierarchy','child'.$pid);
        $pres->where('part_id',$partid);
        
        $pres->orderBy('production_event_id','DESC');
        $pres->limit(1);
        $tmp_res = $pres->get()->getResultArray();
        return $tmp_res[0]['production_event_id'];
    }
*/
    // production info how to get id
    public function get_infoid(){
        $db = \Config\Database::connect($this->site_creation);
        $query = $db->query('SELECT production_event_id_generation()');
        foreach ($query->getResult('array') as $row) {
            return $row['production_event_id_generation()'];
            // echo $row['name'];
            // echo $row['body'];
        }

    }

    // STORED DELETE
    public function stored_delete($production_id){
        $db = \Config\Database::connect($this->site_creation);

        $query = $db->query('CALL delete_store('.$production_id.')');
        if ($query == true) {
            return true;
        }else{
            return false;
        }
    }

    
    // production info tool change over insertion
    public function tool_change_insertion($tmp_arr){
        $db = \Config\Database::connect($this->site_creation);
        $query = $db->table('pdm_production_info');
        // return $tmp_arr;
        if ($query->insert($tmp_arr)) {
            return "true";
        }else{
            return "false";
        }
    }

    // production info get no of childs
    public function getno_of_child($pid){
        $db = \Config\Database::connect($this->site_creation);
        // return $pid;
        $pdm_child = $db->table('pdm_production_info');
        $pdm_child->where('hierarchy',$pid);
        $pdm_info_res = $pdm_child->get()->getResultArray();
        
        return $pdm_info_res;
    }

    // delete pdm info table for one tool multipart toolchange over
    public function delete_pdm_info($pid){
        $db = \Config\Database::connect($this->site_creation);
        // return $pid;
        $pdm_del = $db->table('pdm_production_info');
        $pdm_del->where('production_event_id',$pid);
        $pdm_info_res = $pdm_del->delete();
        if($pdm_info_res == true){
            return true;
        }else{
            return false;
        }

    }

    public function updatePDMGraph($machineRef,$tool_changeover_cdate,$tool,$part,$date,$startTime,$sstart,$send,$mid,$last_updated_by){
        $tool_id = $tool;
        $part_id = $part;
        //function for get part-produced-cyle for the particular part for production calculation
        $parts_ar =  explode(",",$part_id);

        $db = \Config\Database::connect($this->site_creation);
        // tool change over table change the parent table and the s,m,s,t,e,
        // future tool changeover
        $query = $db->table("pdm_tool_changeover");
        $query->select('*');
        $query->where('shift_date >=',$date);
        $query->where('machine_id',$mid);
        $query->where('machine_event_id >',$machineRef);
        $query->orderby('shift_date','ASC');
        $query->limit(1);
        $response = $query->get()->getResultArray();
        if (count($response)>0) {
            //Get the the data from the production info table.
            $builder = $db->table('pdm_production_info');
            $builder->select('*');
            $builder->where('calendar_date >=',$tool_changeover_cdate);
            $builder->where('calendar_date <=',$response[0]['calendar_date']);
            $builder->where('machine_id',$mid);
            $builder->where('hierarchy','parent');
            $res = $builder->get()->getResult();
            //Get the data from the PDM reason mapping table
            $pdmData = $db->table('pdm_downtime_reason_mapping');
            $pdmData->select('*');
            $pdmData->where('calendar_date >=',$tool_changeover_cdate);
            $pdmData->where('machine_id',$mid);
            $pdmData->where('calendar_date <=',$response[0]['calendar_date']);
            $pdmDataUpdate = $pdmData->get()->getResult();

            //Get the data from the PDM Events table
            $pdmDataEvent = $db->table('pdm_events');
            $pdmDataEvent->select('*');
            $pdmDataEvent->where('calendar_date >=',$tool_changeover_cdate);
            $pdmDataEvent->where('machine_id',$mid);
            $pdmDataEvent->where('calendar_date <=',$response[0]['calendar_date']);
            $pdmEventsDataUpdate = $pdmDataEvent->get()->getResult();


            $tool_change_id =  $response[0]['tool_changeover_id'];
            // past tool chnage over count
            $tol = $db->table('tool_changeover');
            $tol->select('*');
            $tol->where('id',$tool_change_id);
            $tool_get = $tol->get()->getResultArray();
        }else{
            //Get the the data from the production info table.
            $builder = $db->table('pdm_production_info');
            $builder->select('*');
            $builder->where('calendar_date >=',$tool_changeover_cdate);
            $builder->where('machine_id',$mid);
            $builder->where('hierarchy','parent');
            $res = $builder->get()->getResult();
            //Get the data from the PDM reason mapping table
            $pdmData = $db->table('pdm_downtime_reason_mapping');
            $pdmData->select('*');
            $pdmData->where('calendar_date >=',$tool_changeover_cdate);
            $pdmData->where('machine_id',$mid);
            $pdmDataUpdate = $pdmData->get()->getResult();
            //Get the data from the PDM Events table
            $pdmDataEvent = $db->table('pdm_events');
            $pdmDataEvent->select('*');
            $pdmDataEvent->where('calendar_date >=',$tool_changeover_cdate);
            $pdmDataEvent->where('machine_id',$mid);
            $pdmEventsDataUpdate = $pdmDataEvent->get()->getResult();
        }

        // existing tool change over query
        $exist_tool = $db->table("pdm_tool_changeover");
        $exist_tool->select('*');
        $exist_tool->where('calendar_date <=',$tool_changeover_cdate);
        $exist_tool->where('machine_id ',$mid);
        $exist_tool->where('machine_event_id <',$machineRef);
        $exist_tool->orderby('shift_date','DESC');
        $exist_tool->limit(1);
        $ex_res_tool = $exist_tool->get()->getResultArray();

        if (count($ex_res_tool)>0) {
            // existing tool changer over count
            $ex_tol = $db->table('tool_changeover');
            $ex_tol->select('*');
            $ex_tol->where('id',$ex_res_tool[0]['tool_changeover_id']);
            $ex_tol_res = $ex_tol->get()->getResultArray();   
        }else{
            $ex_tol_res = array("PT1001");
        }
        
        // Get the current data from production info data.
        $pupdate = $db->table('pdm_production_info');
        $pupdate->select('*');
        $pupdate->where('calendar_date',$tool_changeover_cdate);
        $pupdate->where('start_time <=',($sstart));
        $pupdate->where('machine_id',$mid);
        $pupdate->where('hierarchy','parent');
        $pupdate->orderBy('start_time', 'DESC');
        $pupdate->limit(1);
        $pupdateData = $pupdate->get()->getResultArray();

        $tmpd = explode(":", $sstart);

        $splitstart = $sstart;
        $splitend = $send;

        $conditionEnd="";
        if (strcmp($pupdateData[0]['start_time'],$sstart) == 0) {
            $loopLength = 1;
        }else{
            $loopLength = 2;
        }
    
        // its not a condition is only printing
        // $tmp['exsiting array'] = $ex_tol_res;
        // $tmp['current part'] = $parts_ar;
        // $tmp['parent production info record'] = $pupdateData;
        // $tmp['production info record'] = $res;
        // $tmp['pdm events'] = $pdmEventsDataUpdate;
        // $tmp['pdm reasons'] = $pdmDataUpdate;
        if (count($ex_tol_res)>1) {
            $condition_start_split = count($ex_tol_res);
           }else{
            $condition_start_split = 1;
           }
        for($j=0;$j<$loopLength;$j++){   
            //code for update the current toolchange-over record........
            // updattion for previous record
            if ($j == 0) {
                if (strcmp($pupdateData[0]['start_time'],$sstart) == 0) {
                    $dst=$date." ".$pupdateData[0]['start_time'];
                    $det=$date." ".$pupdateData[0]['end_time']; 
                    $start_time = $pupdateData[0]['start_time'];
                    $end_time = $pupdateData[0]['end_time'];
                    $conditionEnd = $end_time;
                }else{
                    $dst=$date." ".$pupdateData[0]['start_time'];
                    $det=$date." ".$splitstart; 
                    $start_time = $pupdateData[0]['start_time'];
                    $end_time = $splitstart;
                }
                
            }
            // insertion for current tool change over
            elseif($j>0){
                $dst=$date." ".$splitend;
                $det=$date." ".$pupdateData[0]['end_time'];
                $start_time = $end_time;
                $end_time = $pupdateData[0]['end_time'];
                $conditionEnd = $end_time;
            }

            $shotstart=0;
            $shotend=0;
            // mongodb passing conditions
            try {
                $machineg = $db->table('settings_machine_iot as i');
                $machineg->select('i.machine_id,i.iot_gateway_topic,m.machine_serial_number');
                $machineg->where('i.machine_id',$mid);
                $machineg->join('settings_machine_current as m','m.machine_id = i.machine_id');
                $machineg->limit(1);
                $machineg = $machineg->get()->getResultArray();
                $machinegateway = $machineg[0]['iot_gateway_topic'];
                $machineSerial = $machineg[0]['machine_serial_number'];

                $site = $this->session->get('active_site');
                $mid = $mid;
                $k = $this->findProductionCount($dst,$det,$machinegateway,$site,$machineSerial);
                $l=0;
            } 
            catch(MongoDB\Driver\Exception $e) {
               return false;
               exit;
            }
            $actual_shot_count = $k;
            // updation condition
            if ($j ==0 ) {
                if (strcmp($pupdateData[0]['start_time'],$sstart) == 0) {
                    $parent_pid = $pupdateData[0]['production_event_id'];
                    $tmp_part_id = $parts_ar[0];
                    $tmp_tool_id = $tool_id;
                    $ex_ppc = $this->getpppc($tmp_part_id);
                    $production_count = $actual_shot_count * $ex_ppc;
                    $up_res = $this->shift_hour_start_time_up($parent_pid,$production_count,$end_time,$actual_shot_count,$last_updated_by,$tmp_part_id,$tmp_tool_id);
                    if ($up_res == true) {
                        $no_of_child = $this->getno_of_child($parent_pid);
                        if (count($no_of_child)>0) {
                            // 2 = 2
                            if ($condition_start_split == count($parts_ar)) {
                                $n = 0;
                                while($n<count($no_of_child)){
                                    $child_pid = $no_of_child[$n]['production_event_id'];
                                    $c_part_id = $parts_ar[$n+1];
                                    $c_tool_id = $tool_id;
                                    $ex_ppc = $this->getpppc($c_part_id);
                                    $childproduction_count = (int)$actual_shot_count * (int)$ex_ppc;
                                    $child_up = $this->shift_hour_start_time_up($child_pid,$childproduction_count,$end_time,$actual_shot_count,$last_updated_by,$c_part_id,$c_tool_id);
                                    if ($child_up == true) {
                                        $n = $n+1;
                                    }
                                }
                            }
                            // 3 > 2
                            elseif($condition_start_split > count($parts_ar)){
                                // 1= 3- 2
                                $start_time_del = $condition_start_split - count($parts_ar);
                                // 2 = 3 - 1
                                $start_time_up_count = count($parts_ar) - 1;

                                // updation condition looping
                                // 2
                                $su = 0;
                                while($su < $start_time_up_count){
                                    $gstartupdate = $no_of_child[$su]['production_event_id'];
                                    $gupdate_part = $parts_ar[$su+1];
                                    $gupdate_tool = $tool_id;
                                    $gppc = $this->getpppc($gupdate_part);
                                    $gsproduction_count = (int)$actual_shot_count * (int)$gppc;
                                    $gstup = $this->shift_hour_start_time_up($gstartupdate,$gsproduction_count,$end_time,$actual_shot_count,$last_updated_by,$gupdate_part,$gupdate_tool);
                                    if ($gstup == true) {
                                        $su = $su+1;
                                    }
                                }

                                // deletion condition
                                $sgd = 0;
                                // 1
                                while($sgd<$start_time_del){
                                    // 2 = 0 + 3
                                    $db->transBegin();
                                     $gstdel_index = $sgd + $start_time_up_count;
                                     $db = \Config\Database::connect($this->site_creation);
                                     $gsdel = $db->table('pdm_production_info');
                                     //2...8
                                     try{
                                         $gsdel->where('production_event_id',$no_of_child[$gstdel_index]['production_event_id']);
                                         if ($gsdel->delete()) {
                                             $db->transCommit();
                                             $sgd = $sgd + 1;
                                         }
                                     }
                                     catch(Exception $e){
                                         log_message('error','exisiting part greater updation'.$e->getMessage());
                                     }       
                                }


                            }
                            // 2 < 3
                            elseif($condition_start_split < count($parts_ar)){
                                // 1=3 -2
                                $stinscount =  (int)count($parts_ar) - (int)$condition_start_split;
                                //1 =2 - 1
                                $stcupcount = (int)count($parts_ar) - (int)$stinscount;

                                // insertion condition
                                // 1
                                $sic = 0;
                                while($sic<$stinscount){
                                    $db->transBegin();
                                    $scpart = $parts_ar[$sic+1];
                                    $scppc = $this->getpppc($scpart);
                                    $csproduction_count = (int)$actual_shot_count * (int)$scppc;
                                    $tmp_production_event_id = $this->get_infoid();
                                    $hierarchy = $pupdateData[0]['production_event_id'];
                                    if ($csproduction_count > 0) {
                                        $tcmin = '-'.$csproduction_count;
                                    }else{
                                        $tcmin = $csproduction_count;
                                    }
                                    $csins_con = [
                                        "production_event_id" => "PE".$tmp_production_event_id,
                                        "machine_id" => $pupdateData[0]['machine_id'],
                                        "calendar_date" => $pupdateData[0]['calendar_date'],
                                        "shift_date" => $pupdateData[0]['shift_date'],
                                        "shift_id" => $pupdateData[0]['shift_id'],
                                        "start_time" => $pupdateData[0]['start_time'],
                                        "end_time" => $pupdateData[0]['end_time'],
                                        "part_id" => $scpart,
                                        "tool_id" => $tool_id,
                                        "actual_shot_count" => $actual_shot_count,
                                        "production" => $csproduction_count,
                                        "correction_min_counts" => $tcmin,
                                        "corrections" => '0',
                                        "rejection_max_counts" => $csproduction_count,
                                        "rejections" => '0',
                                        "last_updated_by" => $last_updated_by,
                                        "hierarchy" => $hierarchy
                                    ];
                                    $csins = $db->table('pdm_production_info');
                                    if ($csins->insert($csins_con)) {
                                        $db->transCommit();
                                        $sic = $sic + 1;
                                    }
                                }

                                // updation condition
                                $csup = 0;
                                // 0<1
                                while($csup < count($no_of_child)){
                                    // 1=1+0
                                    $cus_updation_count =  $stinscount + $csup;
                                    $csup_pid = $no_of_child[$csup]['production_event_id'];
                                    // part_ar[2]
                                    $csup_part = $parts_ar[$cus_updation_count+1];
                                    $csuptool = $tool_id;
                                    $csupppc = $this->getpppc($csup_part);
                                    $csup_production_count = (int)$actual_shot_count * (int)$csupppc;
                                    $gstup = $this->shift_hour_start_time_up($csup_pid,$csup_production_count,$end_time,$actual_shot_count,$last_updated_by,$csup_part,$csuptool);
                                    if ($gstup == true) {
                                        $csup = $csup+1;
                                    }
                                }

                            }
                        }else{
                            // 1 < 2
                            if($condition_start_split < count($parts_ar)){
                                $stinsnc_count =  (int)count($parts_ar) - (int)$condition_start_split;
                                $stinci = 0;
                                while($stinci<$stinsnc_count){
                                    $db->transBegin();
                                    $cstpart_id = $parts_ar[$stinci+1];
                                    $cppcnins = $this->getpppc($cstpart_id);
                                    $csproduction_count = (int)$actual_shot_count * (int)$cppcnins;
                                    $tmp_production_event_id = $this->get_infoid();
                                    $hierarchy = $pupdateData[0]['production_event_id'];
                                    if ($csproduction_count > 0) {
                                        $tmpcmin = '-'.$csproduction_count;
                                    }else{
                                        $tmpcmin = $csproduction_count;
                                    }
                                    $scins_Rec = [
                                        "production_event_id" => "PE".$tmp_production_event_id,
                                        "machine_id" => $pupdateData[0]['machine_id'],
                                        "calendar_date" => $pupdateData[0]['calendar_date'],
                                        "shift_date" => $pupdateData[0]['shift_date'],
                                        "shift_id" => $pupdateData[0]['shift_id'],
                                        "start_time" => $pupdateData[0]['start_time'],
                                        "end_time" => $pupdateData[0]['end_time'],
                                        "part_id" => $cstpart_id,
                                        "tool_id" => $tool_id,
                                        "actual_shot_count" => $actual_shot_count,
                                        "production" => $csproduction_count,
                                        "correction_min_counts" => $tmpcmin,
                                        "corrections" => '0',
                                        "rejection_max_counts" => $csproduction_count,
                                        "rejections" => '0',
                                        "last_updated_by" => $last_updated_by,
                                        "hierarchy" => $hierarchy
                                    ];
                                    $csins = $db->table('pdm_production_info');
                                    if ($csins->insert($scins_Rec)) {
                                        $db->transCommit();
                                        $stinci = $stinci + 1;
                                    }
                                }
                        
                            }
                        }     
                    } 
                }
                // shift start and hour start time not startify this condition execute for the record split
                else{
                    $parent_pid = $pupdateData[0]['production_event_id'];
                    $tmp_part_id = $pupdateData[0]['part_id'];
                    $ex_ppc = $this->getpppc($tmp_part_id);
                    $production_count = $actual_shot_count * $ex_ppc;
                    $up_res = $this->tool_change_updation($parent_pid,$production_count,$end_time,$actual_shot_count,$last_updated_by);
                    if ($up_res == true) {
                        $no_of_child = $this->getno_of_child($parent_pid);
                        if (count($no_of_child)>0) {
                            $n = 0;
                            while($n<count($no_of_child)){
                                $child_pid = $no_of_child[$n]['production_event_id'];
                                $c_part_id = $no_of_child[$n]['part_id'];
                                $ex_ppc = $this->getpppc($c_part_id);
                                $childproduction_count = (int)$actual_shot_count * (int)$ex_ppc;
                                $child_up = $this->tool_change_updation($child_pid,$childproduction_count,$end_time,$actual_shot_count,$last_updated_by);
                                if ($child_up == true) {
                                    $n = $n+1;
                                }
                            }
                        }     
                    } 
                }
               
            }
            // insertion condition
            elseif($j>0){
                $n = 0;
                $ptmp_id = " ";
                while($n < count($parts_ar)){     
                    $tmp_part_id = $parts_ar[$n];
                    $cu_ppc = $this->getpppc($tmp_part_id);     
                    $production_count = $actual_shot_count * $cu_ppc;
                    $tmp_production_event_id = $this->get_infoid();
                    if ($n == 0) {
                        $ptmp_id = $tmp_production_event_id;
                        $hierarchy = "parent";
                    }else{
                        $hierarchy = "PE".$ptmp_id;
                    }
                    // production check for correction mincount
                    if ($production_count > 0) {
                        $tmp_prod = '-'.$production_count;
                    }else{
                        $tmp_prod = $production_count;
                    }
                    $tmp_id = $tool_id;
                    $tmp_insert_arr = [
                        "production_event_id" => "PE".$tmp_production_event_id,
                        "machine_id" => $pupdateData[0]['machine_id'],
                        "calendar_date" => $pupdateData[0]['calendar_date'],
                        "shift_date" => $date,
                        "shift_id" => $pupdateData[0]['shift_id'],
                        "start_time" => $start_time,
                        "end_time" => $end_time,
                        "part_id" => $tmp_part_id,
                        "tool_id" => $tmp_id,
                        "actual_shot_count" => $actual_shot_count,
                        "production" => $production_count,
                        "correction_min_counts" => $tmp_prod,
                        "corrections" => '0',
                        "rejection_max_counts" => $production_count,
                        "rejections" => '0',
                        "last_updated_by" => $last_updated_by,
                        "hierarchy" => $hierarchy
                    ];
                    $insert_res = $this->tool_change_insertion($tmp_insert_arr);

                    if ($insert_res == true) {
                        $n = $n + 1;
                    }
                }
            }
           
        }
    $tmp_check['before'] = $res; 
    $tmp_check['before_tool'] = $ex_tol_res;
    $tmp_check['after_tool'] = $response;  
    $tmp_check['condition end'] = $conditionEnd;
    $tmp_check['calendar_date'] = $tool_changeover_cdate;

    // return $tmp_check;
    foreach ($res as $key => $value) {
        if ((strcmp($value->calendar_date,$tool_changeover_cdate) == 0) && (strtotime($value->start_time) < strtotime($conditionEnd))) {
            unset($res[$key]);
        }
        if (count($response)>0) {
            if ((strcmp($response[0]['calendar_date'],$value->calendar_date) == 0) && (strtotime($value->start_time) > strtotime($response[0]['event_start_time']))) {
                unset($res[$key]);
            }
        }
    }
        $total =0;
        $testArr=[];
        $shotArr=[];
        $tmp_arr_info = array_values($res);
        $tmp_check['after'] = $tmp_arr_info;
       
        $up_loop = 0;
        //10
       if (count($ex_tol_res)>1) {
        $up_loop = count($ex_tol_res);
       }else{
        $up_loop = 1;
       }
        $tmp_check['count1'] = $up_loop;
        $tmp_check['count2'] = count($parts_ar);

        // return $tmp_check;
//    return $up_loop." ".count($parts_ar);
    foreach($tmp_arr_info as $key=>$val){
        $pid = $val->production_event_id;
        $asc = $val->actual_shot_count;
        $db->transBegin();
        $q['part_id']=$parts_ar[0];
        $q['tool_id']= $tool_id;
        $tppc = $this->getpppc($parts_ar[0]);
        $partsProduced = (int)$asc * (int)$tppc;
        if (($val->production) == null) {
            $q['production'] = null;
            $q['correction_min_counts']= $partsProduced;
        }
        else{
            $q['production']=$partsProduced;
            if ($partsProduced>0) {
                $q['correction_min_counts']= "-".$partsProduced;
            }else{
                $q['correction_min_counts']= $partsProduced;
            }
           
        }
        $q['corrections']=0;
        $q['rejection_max_counts']= $partsProduced;
        $q['rejections']= 0;
        $q['correction_notes']="";
        $q['rejections_notes']="";
        $q['reject_reason']="";
        $q['last_updated_by'] = $last_updated_by;
        // $q['hierarchy'] = "parent";
        $qu = $db->table('pdm_production_info');
        $qu->where('production_event_id',$pid);
        if ($qu->update($q)) {
            $db->transCommit();
            $getchild_arr = $this->getno_of_child($pid);
            // return "parent updated";
            // parts are equal
            // 0>0
            if (count($getchild_arr) >0) {
                // same parts count updations only 
                if ($up_loop == count($parts_ar)) {
                    try {
                        $p = 0;
                        while($p<count($getchild_arr)){
                            $db->transBegin();
                            $child_tppc = $this->getpppc($parts_ar[$p+1]);
                            $parts_production = (int)$getchild_arr[$p]['actual_shot_count'] * (int)$child_tppc;
                            if (($getchild_arr[$p]['production']) == null) {
                                $tmpparts_production = null;
                                $tmpcorrection_min_count= $parts_production;
                            }
                            else{
                                $tmpparts_production = $parts_production;
                                if ($parts_production > 0) {
                                    $tmpcorrection_min_count= "-".$parts_production;
                                }else{
                                    $tmpcorrection_min_count= $parts_production;
                                }
                              
                            }
                            $child_updation = [
                                "part_id" => $parts_ar[$p+1],
                                "tool_id" => $tool_id,
                                "production" => $tmpparts_production,
                                "correction_min_counts" => $tmpcorrection_min_count,
                                "corrections" => 0,
                                "rejection_max_counts" => $tmpparts_production,
                                "rejections" => 0,
                                "correction_notes" => " ",
                                "rejections_notes" => " ",
                                "reject_reason" => " ",
                                "last_updated_by" => $last_updated_by 
                            ];
                            $child_up = $db->table('pdm_production_info');
                            $child_up->where('production_event_id',$getchild_arr[$p]['production_event_id']);
                            if ($child_up->update($child_updation)) {
                                $db->transCommit();
                                $p = $p + 1;
                                
                            }
                        }

                    } catch (Exception $e) {
                        log_message('error','same parts updation in iteration:'.$e->getMessage());
                    }
                }
                 // exisitng is greater 10 -3
                elseif($up_loop > count($parts_ar)){
                    // 7= 10- 3
                    $del_count = $up_loop - count($parts_ar);
                    // 2 = 3 - 1
                    $up_count = count($parts_ar) - 1;
                    try {
                         // updation loop
                        $u = 0;
                        //0 < 2
                        while($u<$up_count){
                            $db->transBegin();
                            $child_up_ppc = $this->getpppc($parts_ar[$u+1]);
                            $parts_production = (int)$getchild_arr[$u]['actual_shot_count'] * (int)$child_up_ppc;
                            if (($getchild_arr[$u-1]['production']) == null) {
                                $tmpparts_production = null;
                                $tmpcorrection_min_count= $parts_production;
                            }
                            else{
                                $tmpparts_production = $parts_production;
                                if ($parts_production >0) {
                                    $tmpcorrection_min_count= "-".$parts_production;
                                }else{
                                    $tmpcorrection_min_count= $parts_production;
                                }
                                
                            }
                            $ex_gup = [
                                "part_id" => $parts_ar[$u+1],
                                "tool_id" => $tool_id,
                                "production" => $tmpparts_production,
                                "correction_min_counts" => $tmpcorrection_min_count,
                                "corrections" => 0,
                                "rejection_max_counts" => $tmpparts_production,
                                "rejections" => 0,
                                "correction_notes" => " ",
                                "rejections_notes" => " ",
                                "reject_reason" => " ",
                                "last_updated_by" => $last_updated_by
                            ];

                            $ex_greater_up = $db->table('pdm_production_info');
                            $ex_greater_up->where('production_event_id',$getchild_arr[$u]['production_event_id']);
                            if ($ex_greater_up->update($ex_gup)) {
                                $db->transCommit();
                                $u = $u + 1;
                                
                            }
                        }
                    } catch (Exception $e) {
                        log_message('error','exisiting part greater updation'.$e->getMessage());
                    }   
                    $d = 0;
                    //0<7
                    while($d<$del_count){
                       // 2 = 0 + 3
                       $db->transBegin();
                        $del_index = $d + $up_count;
                        $db = \Config\Database::connect($this->site_creation);
                        $del_tb = $db->table('pdm_production_info');
                        //2...8
                        try{
                            $del_tb->where('production_event_id',$getchild_arr[$del_index]['production_event_id']);
                            if ($del_tb->delete()) {
                                $db->transCommit();
                                $d = $d + 1;
                            }
                        }
                        catch(Exception $e){
                            log_message('error','exisiting part greater updation'.$e->getMessage());
                        }       
                    }
                }
                // current is greater
                elseif($up_loop < count($parts_ar)) {
                    $g = 0;
                    // 3= 6 -3
                    $ins_count =  (int)count($parts_ar) - (int)$up_loop;
                    $current_greater_upc = (int)count($parts_ar) - (int)$ins_count;
                    while($g<$ins_count){
                        $db->transBegin();
                        $tmp_part_id = $parts_ar[$g+1];
                        $cu_ppc = $this->getpppc($tmp_part_id);
                        $production_count = (int)$asc * (int)$cu_ppc;
                        $tmp_production_event_id = $this->get_infoid();
                        $hierarchy = "PE".$pid;
                      
                            if ($production_count >0) {
                                $tmpcorrectionmincount = '-'.$tmp_productioncount;
                            }else{
                                $tmpcorrectionmincount = $tmp_productioncount;
                            }
                        
                        $tins_rec = [
                            "production_event_id" => "PE".$tmp_production_event_id,
                            "machine_id" => $val->machine_id,
                            "calendar_date" => $val->calendar_date,
                            "shift_date" => $val->shift_date,
                            "shift_id" => $val->shift_id,
                            "start_time" => $val->start_time,
                            "end_time" => $val->end_time,
                            "part_id" => $tmp_part_id,
                            "tool_id" => $tool_id,
                            "actual_shot_count" => $asc,
                            "production" => $production_count,
                            "correction_min_counts" => $tmpcorrectionmincount,
                            "corrections" => '0',
                            "rejection_max_counts" => $production_count,
                            "rejections" => '0',
                            "last_updated_by" => $last_updated_by,
                            "hierarchy" => $hierarchy
                        ];
                        $gre_ins = $db->table('pdm_production_info');
                        if ($gre_ins->insert($tins_rec)) {
                            $db->transCommit();
                            $g = $g + 1;
                        }
                    }
                    // updation conditions
                    $gu = 0;
                    while($gu<$current_greater_upc){
                        $db->transBegin();
                        $ins_index = $gu + $ins_count;
                        $child_tppc = $this->getpppc($parts_ar[$ins_index+1]);
                        $parts_production = (int)$getchild_arr[$gu]['actual_shot_count'] * (int)$child_tppc;
                        if (($getchild_arr[$gu]['production']) == null) {
                            $tmpparts_production = null;
                            $tmpcorrection_min_count= $parts_production;
                        }
                        else{
                            $tmpparts_production = $parts_production;
                            if ($parts_production > 0) {
                                $tmpcorrection_min_count= "-".$parts_production;
                            }else{
                                $tmpcorrection_min_count= $parts_production;
                            }
                           
                        }
                        $greater_update = [
                            "part_id" => $parts_ar[$ins_index+1],
                            "tool_id" => $tool_id,
                            "production" => $tmpparts_production,
                            "correction_min_counts" => $tmpcorrection_min_count,
                            "corrections" => 0,
                            "rejection_max_counts" => $tmpparts_production,
                            "rejections" => 0,
                            "correction_notes" => " ",
                            "rejections_notes" => " ",
                            "reject_reason" => " ",
                            "last_updated_by" => $last_updated_by
                        ];

                        $greater_up = $db->table('pdm_production_info');
                        $greater_up->where('production_event_id',$getchild_arr[$gu]['production_event_id']);
                        if ($greater_up->update($greater_update)) {
                            $db->transCommit();
                            $gu = $gu + 1;
                        }
                    }
                }
            }
            else{
                // 1 < 2
                if ($up_loop < count($parts_ar)) {
                    $g1= 0;
                    $ins_count = (int)count($parts_ar) - (int)$up_loop;
                    while($g1<$ins_count){
                        $db->transBegin();
                        $tmp_part_id = $parts_ar[$g1+1];
                        $cu_ppc = $this->getpppc($tmp_part_id);
                        $production_count = (int)$val->actual_shot_count * (int)$cu_ppc;
                        $tmp_production_event_id = $this->get_infoid();
                        $hierarchy = $val->production_event_id ;

                        if ($production_count>0) {
                            $incorrectionmincount = '-'.$production_count;
                        }else{
                            $incorrectionmincount = $production_count;
                        }

                        $tins_rec = [
                            "production_event_id" => "PE".$tmp_production_event_id,
                            "machine_id" => $val->machine_id,
                            "calendar_date" => $val->calendar_date,
                            "shift_date" => $val->shift_date,
                            "shift_id" => $val->shift_id,
                            "start_time" => $val->start_time,
                            "end_time" => $val->end_time,
                            "part_id" => $tmp_part_id,
                            "tool_id" => $tool_id,
                            "actual_shot_count" => $val->actual_shot_count,
                            "production" => $production_count,
                            "correction_min_counts" => $incorrectionmincount,
                            "corrections" => '0',
                            "rejection_max_counts" => $production_count,
                            "rejections" => '0',
                            "last_updated_by" => $last_updated_by,
                            "hierarchy" => $hierarchy
                        ];
                        $greater_insert = $db->table('pdm_production_info');
                       if ($greater_insert->insert($tins_rec)) {
                            $db->transCommit();
                            $g1 = $g1 + 1;
                        }
                    }
                }
            }
        }
    }
   // return "production info completed";
        //PDM reason mapping table updation...
        foreach ($pdmDataUpdate as $key => $value) {
            // current tool changeover affect
            if ((strtotime($value->calendar_date) == strtotime($tool_changeover_cdate)) && ($value->machine_event_id < $machineRef)) {
                unset($pdmDataUpdate[$key]);
            }
            // split time filter 
            if ((strcmp($value->machine_event_id,$machineRef) == 0) && (strtotime($value->start_time) < strtotime($sstart))) {
                unset($pdmDataUpdate[$key]);
            }

            // end tool changeover record update
            if (count($response)>0) {
                if (($value->machine_event_id > $response[0]['machine_event_id'])) {
                    unset($pdmDataUpdate[$key]);
                }
                // temporary hide for end time tool changeover
                if((strcmp($value->machine_event_id,$response[0]['machine_event_id']) ==0) && (strtotime($value->start_time) >= strtotime($response[0]['event_start_time']))){
                    unset($pdmDataUpdate[$key]);
                }  
            }
        }
        $r=[];
        // return $pdmDataUpdate;
        foreach ($pdmDataUpdate as $value) {
            $db->transBegin();
            $s_reason['part_id']=$part_id;
            $s_reason['tool_id']= $tool_id;
            $s_reason['last_updated_by'] = $last_updated_by;

            $qr = $db->table('pdm_downtime_reason_mapping');
            $qr->where('machine_event_id',$value->machine_event_id);
            $qr->where('split_id',$value->split_id);
            if ($qr->update($s_reason)) {
                $db->transCommit();
                //Check the count of insertion..
                array_push($r, $value->machine_event_id);
            }
            else{
                return false;
            }
        }


        //PDM Events table updation...
        foreach ($pdmEventsDataUpdate as $key => $value) {
            if ((strtotime($value->calendar_date) == strtotime($tool_changeover_cdate)) && ($value->machine_event_id < $machineRef) && (strtotime($value->start_time)<strtotime($sstart))) {
                unset($pdmEventsDataUpdate[$key]);
            }
            if ((strtotime($value->calendar_date) == strtotime($response[0]['calendar_date'])) && ($value->machine_event_id > $response[0]['machine_event_id'])) {
                unset($pdmEventsDataUpdate[$key]);
            }
        }

        foreach ($pdmEventsDataUpdate as $value) {
            $db->transBegin();
            $s_event['part_id']=$part_id;
            $s_event['tool_id']= $tool_id;
            $qr_event = $db->table('pdm_events');
            $qr_event->where('machine_event_id',$value->machine_event_id);
            if ($qr_event->update($s_event)) {
                $db->transCommit();
                //pass
            }
            else{   
                return false;
            }
        }        
        return true;
    }


public function deleteSPlit($dataVal,$machineRef,$splitRef,$start,$end,$last_updated_by){
        $duration = $dataVal;
        $end = $end;
        $split_id = $splitRef;

        $db = \Config\Database::connect($this->site_creation);

        $query = $db->table('pdm_downtime_reason_mapping');

        $query->set('split_duration',$duration);
        $query->set('end_time', $end);
        $query->where('machine_event_id',$machineRef);
        $query->where('start_time',$start);
        if($query->update()){
            $build = $db->table('pdm_downtime_reason_mapping');
            $build->select('*');
            $build->where('machine_event_id',$machineRef);
            $build->where('split_id',$split_id);
            $res = $build->get()->getResultArray();
            // return $res;
            $data =[
                "shift_date" =>$res[0]['shift_date'],
                "event_start_time"=>$res[0]['start_time'],
                "shift_id"=>$res[0]['Shift_id'],
                "machine_id"=>$res[0]['machine_id'],
                "calendar_date"=>$res[0]['calendar_date'],
            ];
            $previous_tool_start = $res[0]['start_time'];
            $previous_tool_end = $res[0]['end_time'];

            $buildTool = $db->table('settings_downtime_reasons');
            $buildTool->select('downtime_reason_id');
            $buildTool->where('downtime_reason',"tool changeover");
            $resTool = $buildTool->get()->getResultArray();
            // return $resTool;
            if (($res[0]['downtime_reason_id'] == 2) OR ($res[0]['downtime_reason_id'] == 3)) {
                // return 'tool changeover record';
                $var = $this->deletePDMGraph($machineRef,$data,$previous_tool_start,$previous_tool_end,$last_updated_by);
                //return $var;
            }
            // return $var;
            $builder = $db->table('pdm_downtime_reason_mapping');
            $builder->where('machine_event_id',$machineRef);
            $builder->where('split_id',$split_id);
            if ($builder->delete()) {
                //Update the Reason Mapped
                $codeTable = $db->table('pdm_downtime_reason_mapping as m');
                $codeTable->select('m.machine_event_id');
                $codeTable->where('m.machine_event_id', $machineRef);
                $codeTable->where('r.downtime_category', "Unplanned");
                $codeTable->where('r.downtime_reason', "Unnamed");
                $codeTable->join('settings_downtime_reasons as r','r.downtime_reason_id  = m.downtime_reason_id ');
                $codeVal = $codeTable->get()->getResultArray();

                if (sizeof($codeVal) < 1) {
                    $bd = $db->table('pdm_events');
                    $bd->set('reason_mapped',1);
                    $bd->where('machine_event_id',$machineRef);
                    if ($bd->update()) {
                        return true;
                    }
                    else{
                        return false;
                    }
                }
                else{
                    $bd = $db->table('pdm_events');
                    $bd->set('reason_mapped',0);
                    $bd->where('machine_event_id',$machineRef);
                    if ($bd->update()) {
                        return true;
                    }
                    else{
                        return false;
                    }
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


    // dropdown shift for quality correction
    public function getShift(){


        $db = \Config\Database::connect($this->site_creation);
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

            $sql = "SELECT * FROM `settings_shift_table` WHERE `Shifts` REGEXP '$temp[1]$'";
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


    // quality correction for display records
     public function getCorrectionData($update)
     {
         $db = \Config\Database::connect($this->site_creation);
 
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
          $query->orderby('rs.start_time','ASC');
          $query->join('settings_part_current as parts','rs.part_id = parts.part_id');
          $res = $query->get()->getResultArray();
          return $res;
     }

    //  get partname for correction and rejeciton 
    public function getpartname($part_id){
        $db = \Config\Database::connect($this->site_creation);
        $pname = $db->table('settings_part_current');
        $pname->select('part_name');
        $pname->where('part_id',$part_id);
        $respname = $pname->get()->getResultArray();

        return $respname[0]['part_name'];

    }

    // get machine name for corretion and rejection
    public function getmachinename($machine_id){
        $db = \Config\Database::connect($this->site_creation);
        $mname = $db->table('settings_machine_current');
        $mname->select('machine_name');
        $mname->where('machine_id',$machine_id);
        $res_mname = $mname->get()->getResultArray();
        return $res_mname[0]['machine_name'];
    }


     // edit pencil button click then after display particular records
      public function getCorrectPartData($data)
     {
         $db = \Config\Database::connect($this->site_creation);
         $query = $db->table('pdm_production_info');
         $query->select('*');
         $query->where('shift_id',$data['shift']);
         $query->where('shift_date',$data['date']);
         $query->where('part_id',$data['part_id']);
         $query->where('start_time',$data['from_time']);
         $query->where('machine_id',$data['machine_id']);
         $res = $query->get()->getResultArray();
         $d['correction'] = $res;
         if ($res[0]['last_updated_by'] == null) {
            $d['last_updated_by'] = null;
         }else{
            $d['last_updated_by'] = $this->get_last_updated_username($res[0]['last_updated_by']);
            
         }
        
        $d['part_name'] = $this->getpartname($res[0]['part_id']);
        $d['machine_name'] = $this->getmachinename($res[0]['machine_id']);

        return $d;
     }
     
    public function findTotalCount($data)
    {
        $db = \Config\Database::connect($this->site_creation);
        $query = $db->table('settings_downtime_reasons as p');
        $query->select('downtime_reason_id');
        $query->where('downtime_reason',"Machine OFF");
        $res = $query->get()->getResultArray();
        $machineoff=0;
        $unnamed =0;
        foreach ($res as $value) {
            $q = $db->table('pdm_downtime_reason_mapping as r');
            $q->select('count(r.downtime_reason_id) as c');
            $q->where('r.shift_id',$data['shift']);
            $q->where('r.shift_date',$data['shift_date']);
            $q->where('r.machine_id',$data['machine_id']);
            $q->where('r.downtime_reason_id',$value);
            $re = $q->get()->getResultArray();
            $machineoff= (int)$re[0]['c'] + (int)$machineoff;
        }
        $qu = $db->table('pdm_downtime_reason_mapping as u');
        $qu->select('count(u.downtime_reason_id) as c');
        $qu->where('u.shift_id',$data['shift']);
        $qu->where('u.shift_date',$data['shift_date']);
        $qu->where('u.machine_id',$data['machine_id']);
        $qu->where('re.downtime_reason',"Unnamed");
        $qu->join('settings_downtime_reasons as re','re.downtime_reason_id = u.downtime_reason_id');
        $req = $qu->get()->getResultArray();
        $d['machineoff'] = $machineoff;
        $d['unnamed'] = (int)$req[0]['c'];
        return $d;
    }
     
    // update the quality correction records
     public function updateCorrectData($update){
        $db = \Config\Database::connect($this->site_creation);
        $SFM = $db->table('pdm_production_info');
        $SFM->set('correction_notes', $update['notes']);
        $SFM->set('corrections', $update['total_correction_value']);
        $SFM->set('rejection_max_counts', $update['max_count']);
        $SFM->set('last_updated_by',$update['last_updated_by']);
        $SFM->where('shift_id', $update['shift']);
        $SFM->where('shift_date', $update['shift_date']);
        $SFM->where('start_time', $update['start_time']);
        $SFM->where('machine_id',$update['machine_id']);
        $SFM->where('part_id',$update['part_id']);
        if ($SFM->update()) {
            return true;
        }else{
            return false;
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


    // display quality rejection records 
    public function getRejectionData($update)
  {
      $db = \Config\Database::connect($this->site_creation);
      $shift = $update['shift'];
      $shiftdate = $update['shift_date'];
      $partname = $update['part_id'];
      $query = $db->table('pdm_production_info as rs');
      $query->select('rs.* , parts.part_name');
      $query->where('rs.shift_id',$shift);
      $query->where('rs.shift_date',$shiftdate);
      $query->where('rs.part_id',$partname);
      $query->orderby('rs.start_time','ASC');
      $query->join('settings_part_current as parts','rs.part_id = parts.part_id');
      $res = $query->get()->getResultArray();
      return $res;
  }

  // display the particular quality rejection records
  public function getCorrectData($data)
  {
      $db = \Config\Database::connect($this->site_creation);
      $query = $db->table('pdm_production_info');
      $query->select('*');
      $query->where('shift_date',$data['date']);
      $query->where('shift_id',$data['shift']);
      $query->where('part_id',$data['part_id']);
      $query->where('start_time',$data['from_time']);
      $query->where('machine_id',$data['machine_id']);

      $res = $query->get()->getResultArray();
      $data["rejection"] = $res;
      if ($res[0]['last_updated_by'] == null) {
          $data['last_updated_by'] = null;
      }else{
        $data['last_updated_by'] = $this->get_last_updated_username($res[0]['last_updated_by']);
      }
      $data['part_name'] = $this->getpartname($res[0]['part_id']);
      $data['machine_name'] = $this->getmachinename($res[0]['machine_id']);
      return $data;
  }

  // quality rejection dropdown for quality reasons
   public function  reject_dropdown(){
        //echo "ok database";
        $db = \Config\Database::connect($this->site_creation);
        $builder = $db->table('settings_quality_reasons');
        $builder->select('*');
        //status should be added in the table
        $builder->where('Status !=',0);
        //$builder->where('Site_id',$site_id);
        $query   = $builder->get()->getResultArray();
        // $output = "";
        // foreach ($query->getResult() as $row) {
        //     $output .=  "<option value=".$row->Downtime_Reason.">". $row->Downtime_Reason."</option>";
           
        //     return $output;
        // }

        return $query;

    }

    // retrive calculation based up on the quality rejection
      public function getRejection_count($data){
        $db = \Config\Database::connect($this->site_creation);
        $build = $db->table('pdm_production_info');
        $build->select('rejections,production');
        $build->where('shift_id',$data['shift']);
        $build->where('shift_date',$data['shift_date']);
        $build->where('start_time',$data['start_time']);
        $build->where('part_id',$data['part_id']);

        $res = $build->get()->getResult();

        return $res;
    }

    // update quality rejection data
	public function updateRejectData($update,$where){
        $db = \Config\Database::connect($this->site_creation);
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
        $SFM->where('machine_id', $where['machine_id']);

        if($SFM->update()){
           return true;
        }
        else{
            return false;
        }
    }


    // pdm model downtime graph shift date
     public function getMachineDate($machine){
        $db = \Config\Database::connect($this->site_creation);
        $builder = $db->table('pdm_production_info');   
        $builder->select('shift_date');
        $builder->where('machine_id', $machine);
        $builder->where('production !=', "Null");
        $query = $builder->distinct()->get()->getResultArray();     
        return $query;
    }


    // quality rejection and correction shift date model function
    public function get_rejection_shift_date($part_id)
    {
        $db = \Config\Database::connect($this->site_creation);
        $build = $db->table('pdm_production_info');
        $build->select('shift_date');
        $build->where('part_id',$part_id);
        $build->where('production !=',"Null");
        $res = $build->distinct()->get()->getResultArray();

        return $res;
    }

    // get correction rejection exact shift that means ative shift name function
    public function get_correction_rejection_exactshift($part_id,$shift_date,$shift){
        $db = \Config\Database::connect($this->site_creation);
        $query = $db->table('pdm_production_info');
        $query->select('production_event_id');
        $query->where('part_id',$part_id);
        $query->where('shift_date',$shift_date);
        $query->where('shift_id',$shift);
        $query->where('Production !=',"Null");
        $res = $query->get()->getResultArray();
        return $res;
    }
}

 ?>