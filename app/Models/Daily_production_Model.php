<?php 


namespace App\Models;
use CodeIgniter\Model;

class Daily_production_Model extends Model{
     // constructor for financial model 
     protected $site_connection;
     protected $session;
    public function __construct(){
 
        $this->session = \Config\Services::session();
 
        $db_name = $this->session->get('active_site');
        
        // echo($db_name);
        $this->site_connection = [
            'DSN'      => '',
            'hostname' => env('database.default.hostname'),
            'username' => env('database.default.username'),
            'password' => env('database.default.password'),
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


    public function getmachine_wise_downtime_reason($machine_ar,$sdate){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_downtime_reason_mapping as m');
        $query->select('DISTINCT(m.downtime_reason_id),s.downtime_reason');
        $query->join('settings_downtime_reasons  as s','m.downtime_reason_id=s.downtime_reason_id');
        $query->where('m.shift_date',$sdate);
        $res = $query->get()->getResultArray();
        $machine_downtime_reason = [];
        foreach ($res as $key => $value) {
            $machine_downtime_reason[$value['downtime_reason_id']] = $value['downtime_reason'];
        }

        return $machine_downtime_reason;
    }

    public function getdowntime_data($date){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_downtime_reason_mapping');
        $query->select('machine_id,shift_date,Shift_id,downtime_reason_id,split_duration,tool_id,part_id');
        $query->where('shift_date',$date);
        $res = $query->get()->getResultArray();
        return $res;
    }
    public function get_active_data($date){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_events');
        $query->select('machine_id,shift_date,shift_id,start_time,end_time,duration,tool_id,part_id');
        $query->where('shift_date',$date);
        $query->where('event',"Active");
        $res = $query->get()->getResultArray();

        $expand_data = [];
        foreach ($res as $key => $value) {
            $part_arr = explode(",",$value['part_id']);

            if (count($part_arr)<1) {
                array_push($expand_data,$value);
            }else{
               foreach($part_arr as $val){
                    $res[$key]['part_id'] = $val;
                    array_push($expand_data,$res[$key]);
               }
            }
        }

        

        return $expand_data;
    }
    public function getproduction_data($date){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_production_info');
        $query->select('machine_id,shift_date,shift_id,production,corrections,rejections,tool_id,part_id,reject_reason,start_time,end_time');
        $query->where('shift_date',$date);
        $query->orderBy('start_time','ASC');
        $res = $query->get()->getResultArray();
        return $res;
    }
    public function getdowntime_reason_data(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_downtime_reasons');
        $query->select('downtime_reason_id,downtime_reason');
        $res = $query->get()->getResultArray();
        return $res;
    }
    public function getquality_reason_data(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_quality_reasons');
        $query->select('quality_reason_id,quality_reason_name');
        $res = $query->get()->getResultArray();

        return $res;
    }

    // get downtime reasons function 
    public function getDowntimereason(){
        $db = \Config\Database::connect($this->site_connection);

        $query = $db->table('settings_downtime_reasons');
        $query->select('downtime_reason_id ,downtime_reason');
        $res = $query->get()->getResultArray();

        $ta = [];
        foreach ($res as $key => $value) {
            $ta[$value['downtime_reason_id']] =$value['downtime_reason'];
            // return $value->downtime_reason_id;
           //$tmp_a[$value->downtime_reason_id] = $value->downtime_reason;
        }
        return $ta;
    }

    // get Quality reason function
    public function getQualityreason(){
        $db =  \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_quality_reasons');
        $query->select('quality_reason_id ,quality_reason_name');
        $res = $query->get()->getResultArray();
        $tmp_arr = [];
        foreach ($res as $key => $value) {
            $tmp_arr[$value['quality_reason_id']] = $value['quality_reason_name'];
        }
        return $tmp_arr;
    }

    // get all planned downtime reasons id
    // temporary hide this function because the planned downtime concept is remove
    /*
    public function getplanneddowntimereasons(){
        $db =  \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_downtime_reasons');
        $query->select('downtime_reason_id');
        $query->where('downtime_category','Planned');
        $res = $query->get()->getResultArray();

        return $res;
    }
    */

    // get particular day and shift downtime planned reasons duration for particular reason id based duration count
    // public function getplanneddowntimeduration($mid,$sdate,$sid,$rid){
    public function getalldowntimeduration($mid,$sdate,$sid,$pid,$tid){
        $db =  \Config\Database::connect($this->site_connection);

        $builder = $db->table('pdm_events');
        $builder->select('*');
        $builder->where('machine_id',$mid);
        $builder->where('shift_date',$sdate);
        $builder->where('Shift_id',$sid);
        $builder->where('tool_id',$tid);
        $builder->where('event','Active');
        $result = $builder->get()->getResultArray();

        $tmp_arr_rec = [];
        $tmp_data = [];
        foreach ($result as $key => $value) {
            $tmp_part_arr = explode(",",$value['part_id']);
            // return $tmp_part_arr;
            foreach ($tmp_part_arr as $k1 => $v1) {
                
                if ($v1 === $pid) {
                    // array_push($tmp_data,$v1);
                   array_push($tmp_arr_rec,$result[$key]); 
                }
            }
        }
        // return $tmp_arr;
        $duration_mtotal_count = 0;
        $duration_stotal_count = 0;
        foreach ($tmp_arr_rec as $ke => $val) {
            $split_duration = explode(".",$val['duration']); 
            // return $split_duration;
            $duration_mtotal_count = $duration_mtotal_count + $split_duration[0];
            if ($split_duration[1]>0) {
                $duration_stotal_count = $split_duration[1]+$duration_stotal_count;
            }
        }
        $duration_mtotal_count = $duration_mtotal_count * 60;
        $duration_total_minute_count = $duration_mtotal_count + $duration_stotal_count;

        return $duration_total_minute_count;
    }

    // get planned downtime reasons for all reason id  duration  
    public function getalldowntime($machine_id,$sdate,$sid,$pid,$tid){

        $durationsecond_total = $this->getalldowntimeduration($machine_id,$sdate,$sid,$pid,$tid);

        return $durationsecond_total;
    }

    // get current shift records
    public function getcurrentshift_record($date){
        $db =  \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_shift_management');
        $query->select('*');
        $query->where('last_updated_on <',$date);
        $query->orderby('last_updated_on','desc');
        $query->limit(1);
        $result = $query->get()->getResultArray();
        $shift['shift_management'] = $result;
        if (!empty($result)) {
            $getshift_id = explode('f',$result[0]['shift_log_id']);
            // $shift['shift_result'] = $getshift_id;

            $sql = "SELECT * FROM `settings_shift_table` WHERE `shifts` REGEXP '$getshift_id[1]$'";
            $builder = $db->query($sql);
            $shift['shifts'] = $builder->getResultArray();
            $shift_id = [];
            for($i=0;$i<count($shift['shifts']);$i++){
                $tmp_shift_id = $shift['shifts'][$i]['shifts'];
                $tmpid = explode('0',$tmp_shift_id);
                array_push($shift_id,$tmpid[0]);
            }

            $shift['shift_ids'] = $shift_id;
            return $shift;

        }
        else{
            return false;
        }
    }

    // get the current machine shift  based machine status
    public function getmachine_data(){
        $db =  \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_machine_current');
        $query->select('machine_id,machine_name,machine_brand,tonnage');
        // $query->where('machine_id!=','MC1005');
        $resm = $query->get()->getResultArray();
        return $resm;
    }

    public function getpart_data(){
        $db =  \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_part_current');
        $query->select('part_id,part_name,NICT,part_produced_cycle');
        $resm = $query->get()->getResultArray();
        return $resm;
    } 

    // get machine details for machine 1 and machine n full details tonnage and brand name
    // public function getmachine_details($machine_ar){
    //     // date based macine details

    //     $db =  \Config\Database::connect($this->site_connection);
    //     // machine details in machine current direct get value
    //     // $machine_details = [];
    //     foreach($machine_ar as $key => $val){
    //         $query = $db->table('settings_machine_current');
    //         $query->select('*');
    //         $query->where('machine_id',$val['machine_id']);
    //         $res1 = $query->get()->getResultArray();
    //         $machine_details[$key]=$res1[0];
            

    //     }

    //     return $machine_details;
    // }

    // get machine wise and shift wise tool changeover
    /* temporary hide this function move on controller
    public function get_tool_changeover($machine_arr,$sdate,$shift_arr,$duration){
        $db =  \Config\Database::connect($this->site_connection);
        // machine array
        $machine_based_arr = [];
        foreach($machine_arr as $key => $val){
            $shift_based_array = [];
            // return $shift_arr;
            foreach($shift_arr as $k => $v){
                // return $v;
                $tool_ids = $this->get_tool_id($val['machine_id'],$v,$sdate,$duration);
                $shift_based_array[$v] = $tool_ids; 
                // return $tool_ids;
            }
            $machine_based_arr[$val['machine_id']] = $shift_based_array;
        }
        return $machine_based_arr;
    }
    */
    
    // get date wise and machine wise and shift id wise array
    public function get_tool_id(){
        $db =  \Config\Database::connect($this->site_connection);

        $query = $db->table('settings_part_current');
        $query->select('tool_id,part_id');
        $res = $query->get()->getResultArray();

        return $res;
    }

    
    // all time get part count for the particular tool id
    public function all_time_part_count($mid,$sid,$sdate,$tid){
        $db =  \Config\Database::connect($this->site_connection);
        $production = $db->table('pdm_production_info');
        $production->select('DISTINCT(part_id)');
        $production->where('machine_id',$mid);
        $production->where('shift_id',$sid);
        $production->where('shift_date',$sdate);
        $production->where('tool_id',$tid);
        $res = $production->get()->getResultArray();

        return count($res);
    }

//  get part based array getting function
    public function getpart_details($part_id){
        $db =  \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_part_current');
        $query->select('NICT,part_produced_cycle');
        $query->where('part_id',$part_id);
        $result = $query->get()->getResultArray();
        return $result;
    }

    public function get_tool_changeover_range($sdate){
        $db =  \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_tool_changeover as tp');
        $query->select('tp.tool_changeover_id,tp.machine_id,tp.tool_id,tp.shift_date,tp.shift_id,tp.event_start_time,tp.target');
        $query->where('tp.shift_date <',$sdate);
        $query->orderBy('tp.machine_id','ASC');
        $query->orderBy('tp.shift_date','DESC');
        $query->orderBy('tp.event_start_time','DESC');
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function get_tool_changeover_range_before($sdate){
        $db =  \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_tool_changeover as tp');
        $query->select('tp.tool_changeover_id,tp.machine_id,tp.tool_id,tp.shift_date,tp.shift_id,tp.event_start_time,tp.target');
        $query->where('tp.shift_date <',$sdate);
        $query->orderBy('tp.machine_id','ASC');
        $query->orderBy('tp.shift_date','DESC');
        $query->orderBy('tp.event_start_time','DESC');
        $res = $query->get()->getResultArray();
        return $res;
    }
    public function get_tool_changeover_range_after($sdate){
        $db =  \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_tool_changeover as tp');
        $query->select('tp.tool_changeover_id,tp.machine_id,tp.tool_id,tp.shift_date,tp.shift_id,tp.event_start_time,tp.target');
        $query->where('tp.shift_date >',$sdate);
        $query->orderBy('tp.machine_id','ASC');
        $query->orderBy('tp.shift_date','ASC');
        $query->orderBy('tp.event_start_time','ASC');
        $res = $query->get()->getResultArray();
        return $res;
    }

    public function get_tool_changeover_part($tool_changeover_id){
        $db =  \Config\Database::connect($this->site_connection);
        $query = $db->table('tool_changeover');
        $query->select('*');
        $query->where('id',$tool_changeover_id);
        $res = $query->get()->getResultArray();
        return $res;
    }


    // get part wise tool changeover timestamp
    public function get_tool_changeovertime($mid,$sid,$sdate,$pid,$tid){
        $db =  \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_tool_changeover as tp');
        $query->select('tp.*,pd.*');
        $query->join('tool_changeover as pd','tp.tool_changeover_id  = pd.id');
        $query->where('tp.machine_id',$mid);
        $query->where('tp.tool_id',$tid);
        $query->where('tp.shift_date',$sdate);
        $query->where('tp.shift_id',$sid);
        $query->where('pd.part_id',$pid);
        $query->orderBy('tp.machine_event_id','ASC');
        $res = $query->get()->getResultArray();

        if (count($res)>0) {
            $tmp_tcho_time = [];
            // tool changeover based time array pushing
            $machine_event_id = 0;
            foreach ($res as $key => $value) {
                array_push($tmp_tcho_time,$value['event_start_time']);
                $machine_event_id = $value['machine_event_id'];
            }

            // shift end time adding condition
            $tool_end_time = $this->next_tool_changeover_record($mid,$sid,$sdate,$machine_event_id);
            if ($tool_end_time !=" ") {
                array_push($tmp_tcho_time,$tool_end_time);

            }else{
                $getshift_time_tmp = $this->getcurrentshift_record($sdate);
                foreach ($getshift_time_tmp['shift_ids'] as $key => $value) {
                    // return $value;
                    if (strcmp($value,$sid)==0) {
                        date_default_timezone_set("Asia/Kolkata");
                        $tmpdate_time = explode(" ",date("Y-m-d h:i"));
                        if (strcmp($tmpdate_time[0],$sdate)==0) {
                            $tmpcmp_time = explode(":",$getshift_time['shifts'][$k]['end_time']);
                            $tmpcmp_time1 = explode(":",$tmpdate_time[1]);
                            if ($tmpcmp_time1[0] ===  $tmpcmp_time[0]) {
                                array_push($tmp_tcho_time,$getshift_time_tmp['shifts'][$key]['end_time']);
                            }else{
                                $last_record_time = $this->getlast_record_time($mid,$pid,$tid,$sdate,$sid);
                                // array_push($tmp_time_arr,$tmpcmp_time1[0]);
                                array_push($tmp_tcho_time,$last_record_time);
                            }
                        }else{
                            array_push($tmp_tcho_time,$getshift_time_tmp['shifts'][$key]['end_time']);
                        }
                    }
                }
            }
            

            return $tmp_tcho_time;

        }
        // if not tool changeover to change shift start time and end time
        else{
            $tmp_time_arr = [];
            $getshift_time = $this->getcurrentshift_record($sdate);
            foreach($getshift_time['shift_ids'] as $k => $v){
                if (strcmp($v,$sid)==0) {
                    // start time
                    array_push($tmp_time_arr,$getshift_time['shifts'][$k]['start_time']);
                    $end_time = $this->gettool_endtime($mid,$sid,$sdate,$getshift_time['shifts'][$k]['start_time']);
                    // end time
                    if ($end_time !=" ") {
                        array_push($tmp_time_arr,$end_time);
 
                    }else{
                        date_default_timezone_set("Asia/Kolkata");
                        $tmp_date_time_ar = explode(" ",date("Y-m-d h:i"));

                        if (strcmp($tmp_date_time_ar[0],$sdate)==0) {
                            $tmp_cmp_time = explode(":",$getshift_time['shifts'][$k]['end_time']);
                            $tmp_cmp_time1 = explode(":",$tmp_date_time_ar[1]);
                            if ($tmp_cmp_time[0] ===  $tmp_cmp_time1[0]) {
                                array_push($tmp_time_arr,$getshift_time['shifts'][$k]['end_time']);
                            }else{
                                $last_updated_time = $this->getlast_record_time($mid,$pid,$tid,$sdate,$sid);
                                // array_push($tmp_time_arr,$tmp_date_time_ar[1]);
                                array_push($tmp_time_arr,$last_updated_time);
                            }
                            // array_push($tmp_time_arr,"smae date");
                        }else{
                            // array_push($tmp_time_arr,"not same date".$sdate." ".$tmp_date_time_ar[0]);
                            array_push($tmp_time_arr,$getshift_time['shifts'][$k]['end_time']);
                        }

                        // array_push($tmp_time_arr,$getshift_time['shifts'][$k]['end_time']);
                    }
                }
            }
            return $tmp_time_arr;
        }
        // return count($res);


    }

    // get tool changeover time for 8 to 8pm 8 to 10 no part 10 to 8pm part2 mapping so end time updated
    public function gettool_endtime($mid,$sid,$sdate,$start_time){
        $db =  \Config\Database::connect($this->site_connection);
        $build = $db->table('pdm_tool_changeover');
        $build->select('*');
        $build->where('shift_date',$sdate);
        $build->where('shift_id',$sid);
        $build->where('machine_id',$mid);
        $build->orderBy('machine_event_id','ASC');
        $build->limit(1);
        $res = $build->get()->getResultArray();
        if (count($res)>0) {
            return $res[0]['event_start_time'];
        }else{
            return " ";
        }
    }
    // after tool changeover start time is updated next move on end time for next tool changeover check
    public function next_tool_changeover_record($mid,$sid,$sdate,$meid){
        $db =  \Config\Database::connect($this->site_connection);
        $build = $db->table('pdm_tool_changeover');
        $build->select('*');
        $build->where('shift_date',$sdate);
        $build->where('shift_id',$sid);
        $build->where('machine_id',$mid);
        $build->where('machine_event_id>',$meid);
        $build->orderBy('machine_event_id','ASC');
        $build->limit(1);
        $result = $build->get()->getResultArray();
        if (count($result)>0) {
            return $result[0]['event_start_time'];
        }else{
            return " ";
        }
    }


    //  downtime graph wise array
    /* temporary hide this function move controller
    public function getdowntimegraph($machine_a,$sdate,$shift_a){
        $reason = $this->getDowntimereason();
        
        // macine wise array
       $get_downtime_machine_array = [];
        foreach($machine_a as $k => $val){
            // shift wise array
            $get_downtime_shift_array = [];
            foreach($shift_a as $k1 => $v1){
                // reason wise array
                $get_downtime_array = [];
                foreach($reason as $key => $value){
                    $getcount = $this->getdowntimecount($val['machine_id'],$v1,$sdate,$key);
                    $get_downtime_array[$key] = $getcount;
                }
                $get_downtime_shift_array[$v1] = $get_downtime_array;
            }
            $get_downtime_machine_array[$val['machine_id']] = $get_downtime_shift_array;

        }
       
        return $get_downtime_machine_array;
        
    }
    */

    // get downtime graph count function
    public function getdowntimecount($machine_id,$shiftid,$shiftdate,$reasonid){
        $db =  \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_downtime_reason_mapping');
        $query->select('*');
        $query->where('downtime_reason_id',$reasonid);
        $query->where('machine_id',$machine_id);
        $query->where('Shift_id',$shiftid);
        $query->where('shift_date',$shiftdate);
        $res = $query->get()->getResultArray();

        // return count($res);
        $total_minutes = 0;
        $total_seconds = 0;
        foreach($res as $key=>$val){
            $tmp_duration_arr = explode(".",$val['split_duration']);
            $total_minutes = $total_minutes + $tmp_duration_arr[0];
            $total_seconds = $total_seconds + $tmp_duration_arr[1];     
        }

        // if (60 > $total_seconds) {
        //     $tmp_second = $total_seconds / 60;
        // }

        // $final_duration = $total_minutes.'.'.$total_seconds;
        // minutes convert seconds
        $stotal_minutes_cs = $total_minutes * 60;
        $final_duration = $stotal_minutes_cs + $total_seconds;

        return $final_duration;


    }

    // get downtime value function
    /* temporary hide this function is move on controller 
    public function getdowntimevalue($getmachine_arr,$date,$shift_arr){
        
        // get machine wise array 
        $get_downtime_count_machine = [];
        foreach ($getmachine_arr as $key => $value) {
            // get shift wise array
            $getdowntimecount_shift = [];
            foreach ($shift_arr as $k => $val) {
                $getdowntimecount = $this->getdowntime_total_count($value['machine_id'],$val,$date);
                // return $getdowntimecount;
                $getdowntimecount_shift[$val] = $getdowntimecount; 
            }
            $get_downtime_count_machine[$value['machine_id']] = $getdowntimecount_shift;
        }
        return $get_downtime_count_machine;
        
    }
    */
    // get machine wise and shift wise duration count
    public function getdowntime_total_count($machine_id,$sid,$sdate){
        $db =  \Config\Database::connect($this->site_connection);

        $query = $db->table('pdm_downtime_reason_mapping');
        $query->select('*');
        $query->where('machine_id',$machine_id);
        $query->where('Shift_id',$sid);
        $query->where('shift_date',$sdate);
        
        $res = $query->get()->getResultArray();

        $duration_mtotal_count = 0;
        $duration_stotal_count = 0;
        // 56.67
        foreach($res as $k1 => $v1){
            $split_duration = explode('.',$v1['split_duration']);
            $duration_mtotal_count = $split_duration[0]+$duration_mtotal_count;
            if ($split_duration[1]>0) {
                // 67 = 67 + 0
                $duration_stotal_count = $split_duration[1]+$duration_stotal_count;
            }
            // $duration_total_count = $v1['split_duration'] + $duration_total_count;
        }
        // duration second to convert minutes
        // 1.1167 = 67/60
        // $duration_stotal_count = $duration_stotal_count / 60;
        // $duration_total_count = $duration_mtotal_count + $duration_stotal_count;

        // duration minutes converd seconds
        $duration_mtotal_countcs = $duration_mtotal_count * 60;
        $duration_total_count = $duration_stotal_count + $duration_mtotal_countcs;

        return $duration_total_count;
       
    }

    // get quality rejection reason function
    public function getquality_reject_reason($machine_arr,$sdate,$shift_arr){
        $getqualitymachine_arr = [];
        foreach($machine_arr as $key => $value){
            // shift array based 
            $getqualityshift_arr = [];
            foreach($shift_arr as $k => $v){
               $getpart_arr = $this->getqualityrejection_reason_getpart($value['machine_id'],$v,$sdate);
            //    return $getpart_arr;
                $getqualityshift_arr[$v] = $getpart_arr;
            }
            $getqualitymachine_arr[$value['machine_id']] = $getqualityshift_arr;
        }
        return $getqualitymachine_arr;
    }

    // this function get quality rejection reason for machine based parts and rejection reasons function
    public function getqualityrejection_reason_getpart($mid,$sid,$sdate){
        $db =  \Config\Database::connect($this->site_connection);

        $query = $db->table('pdm_production_info');
        $query->select('DISTINCT(tool_id),part_id');
        $query->where('machine_id',$mid);
        $query->where('shift_date',$sdate);
        $query->where('shift_id',$sid);
        $res = $query->get()->getResultArray();

        $getpart_wise_arr = [];
        foreach ($res as $key => $value) {
            $getarr = $this->partbased_production_reason_array($mid,$sid,$sdate,$value['part_id']);
            $getpart_wise_arr[$value['part_id']] = $getarr;
            // return $getarr;
        }
        return $getpart_wise_arr;
    }

    // get quality reject reason for part based array function
    public function partbased_production_reason_array($mid,$sid,$sdate,$pid){
        
        $db =  \Config\Database::connect($this->site_connection);

        $query = $db->table('pdm_production_info');
        $query->select('*');
        $query->where('machine_id',$mid);
        $query->where('shift_date',$sdate);
        $query->where('shift_id',$sid);
        $query->where('part_id',$pid);
        $result = $query->get()->getResultArray();

        $reasons_arr = $this->getQualityreason();

        $tmp_reason_arr = $reasons_arr;
        foreach($reasons_arr as $k1 => $v1){
            $tmp_arr = [];
            foreach ($result as $key => $value) {
                // return $value;
                if (($value['reject_reason'] !=null) && ($value['reject_reason'] !=" ")) {
                    // return $value['reject_reason'];
                    $tmpreasons_ar = explode("&&",$value['reject_reason']);
                    foreach ($tmpreasons_ar as $k => $v) {
                    
                        $each_reason = explode("&",$v);
                        // return $each_reason[0]." ".$k1;
                        if (strcmp($each_reason[1],$k1) ===0) {
                            // return $each_reason;
                            array_push($tmp_arr,$each_reason[0]);
                        }
                    }
                }
            }
            // return $tmp_arr;
            $tmp_reason_arr[$k1] = array_sum($tmp_arr);
        }

        // arsort($tmp_reason_arr);
        return $tmp_reason_arr;
        
    }


    // get part production details array function
    public function getpart_production_details($machine_a,$sdate,$s_arr,$duration){
        
        // machine wise condition
        $getfinal_arr = [];
        foreach($machine_a as $key => $value){
            $tmp_shift_arr = [];
            foreach ($s_arr as $k => $v) {
                $tmpgetarr = $this->getparts_pdm($value['machine_id'],$v,$sdate,$duration);
                // return $tmpgetarr;
                $tmp_shift_arr[$v] = $tmpgetarr;
            }
            $getfinal_arr[$value['machine_id']] = $tmp_shift_arr;
        }
        return $getfinal_arr;
    }

    // get production based counts for good parts and ttp
    public function getparts_pdm($machine_id,$shift_id,$shift_date,$duration){
        $db =  \Config\Database::connect($this->site_connection);

        $query = $db->table('pdm_production_info');
        $query->select('DISTINCT(tool_id),part_id');
        $query->where('machine_id',$machine_id);
        $query->where('shift_date',$shift_date);
        $query->where('shift_id',$shift_id);
        $res = $query->get()->getResultArray();

        $tmp_partarr = [];
        foreach($res as $Key => $val){
            $counts_arr = $this->getpdmcount($machine_id,$shift_id,$shift_date,$val['part_id'],$duration);
            $tmp_partarr[$val['part_id']] = $counts_arr;
            // return $counts_arr;
        }
        return $tmp_partarr;

    }

    // get part based production count
    public function getpdmcount($mid,$sid,$sdate,$pid,$duration){
        $db =  \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_production_info');
        $query->select('SUM(rejections) as rejection_count,SUM(corrections) as correction_count,SUM(production) as production_count');
        $query->where('machine_id',$mid);
        $query->where('shift_date',$sdate);
        $query->where('shift_id',$sid);
        $query->where('part_id',$pid);
        $res = $query->get()->getResultArray();

        $tmpfinal_arr = [];
        $tmp_arr = [];
        array_push($tmp_arr,$res[0]['correction_count']);
        array_push($tmp_arr,$res[0]['production_count']);

        $rejection = $res[0]['rejection_count'];
        // tpp formula : production +- correction
        $tpp = array_sum($tmp_arr);
        // good part formula : tpp - rejections
        $good_parts = $tpp - $rejection;
        
        array_push($tmpfinal_arr,$rejection);
        array_push($tmpfinal_arr,$tpp);
        array_push($tmpfinal_arr,$good_parts);
        // percentage formula
        
        // temporary hide for this code for percentage for rejections percetnage
        // first get shift hour to convert seconds
        // $tmp_shifthour = explode(":",$duration);
        // $shift_duration_seconds = 0;
        // $tmp_shift_second = $tmp_shifthour[0]*3600;
        // $tmp_shift_second = $tmp_shift_second + ($tmp_shifthour[1]*60); 
        // $tmp_shift_second = $tmp_shifthour[2] + $tmp_shift_second;

        // $shift_duration_seconds = $tmp_shift_second;

        // temporary hide for this code for percentage for rejections percetnage
/*
        // second get target value
        // first get the planned durations in seconds
        $getplanned_duration_seconds = $this->getalldowntime($mid,$sdate,$sid);
        // finally get the durations in seconds
        $final_durations_seconds = $shift_duration_seconds - $getplanned_duration_seconds;
        // $check_str = $shift_duration_seconds."-".$getplanned_duration_seconds."=".$final_durations_seconds;
        $getnict = $this->getpart_details($pid);
        // $target = $final_durations_seconds / $getnict[0]['NICT'];
  
        try {
            if ($getnict[0]['NICT'] == 0) throw new Exception("Divide by zero");
            $target = $final_durations_seconds / $getnict[0]['NICT'];
            // $percentage = $tpp /  target is inprogress for mathan sir confirmation
            $percentage = ($rejection / $tpp) * 100;
            array_push($tmpfinal_arr,$percentage);
        } catch (\Throwable $e) {
            $target =0;  
            array_push($tmpfinal_arr,0);
        }
        */
        // rejection percentage coditions code
        try {
            if(($tpp === null) or ($tpp == 0) ) throw new Exception("Divide By Zero");
            $percentage = ($rejection / $tpp) * 100;
            array_push($tmpfinal_arr,$percentage);
        } catch (\Throwable $e) {
            array_push($tmpfinal_arr,0);
        }
       
      
        // array_push($tmpfinal_arr,$check_str);

        return $tmpfinal_arr;

    }


    // ui based working for part deails [part name and ]
    public function getpart_full_details($part_arr){
        $db =  \Config\Database::connect($this->site_connection);

        $tmp_part_arr = [];
        foreach ($part_arr as $key => $value) {
            $tmp = [];
            $part = $db->table('settings_part_current');
            $part->select('part_name');
            $part->where('part_id',$key);
            $res = $part->get()->getResultArray();

            $part1 = $db->table('settings_tool_table');
            $part1->select('tool_name');
            $part1->where('tool_id',$value);
            $res1 = $part1->get()->getResultArray();

            $partname = $res[0]['part_name'];
            $tool_name = $res1[0]['tool_name'];

            array_push($tmp,$partname);
            array_push($tmp,$tool_name);            

            $tmp_part_arr[$key] = $tmp;
        }
        return $tmp_part_arr;

    }

    // this function for get the duration for particular part start time and end time duration
    /* temporary hide this function
    public function get_time_seconds($machineid,$shiftid,$shiftdate,$pid,$tid){
        $db =  \Config\Database::connect($this->site_connection);
        // $ftime = $get_time_arr[0];
        // $t_time = $get_time_arr[1];

        $build = $db->table("pdm_events");
        $build->select('*');
        $build->where('machine_id',$machineid);
        $build->where('shift_date',$shiftdate);
        $build->where('shift_id',$shiftid);
        $build->where('tool_id',$tid);
        $res = $build->get()->getResultArray();

        
        
        // first get the part basis records
        $tmp_arr = [];
        foreach ($res as $key => $value) {
            $tmp_part_array = explode(",",$value['part_id']);
            foreach ($tmp_part_array as $ke => $val) {
                if ($val === $pid) {
                    array_push($tmp_arr,$res[$key]);
                }
            }
        }
      

        // // next get the durations for that filtered record
        $minute_total_count = 0;
        $second_total_count = 0;
        foreach ($tmp_arr as $k1 => $v1) {
            $tmpsplit_arr = explode('.',$v1['duration']);
        
            $minute_total_count = $minute_total_count + $tmpsplit_arr[0];  
            if ($tmpsplit_arr[1]>0) {
                $second_total_count = $second_total_count + $tmpsplit_arr[1];
            }
        }


        $duration_second = $minute_total_count * 60;
        $duration_second = $duration_second + $second_total_count;

        return $duration_second;




    }
    */

    // get record last updated time 
    public function getlast_record_time($mid,$pid,$tid,$sdate,$sid){
        $db =  \Config\Database::connect($this->site_connection);

        $build = $db->table("pdm_production_info");
        $build->select('*');
        $build->where('shift_date',$sdate);
        $build->where('machine_id',$mid);
        $build->where('part_id',$pid);
        $build->where('tool_id',$tid);
        $build->where('shift_id',$sid);
        $build->orderBy('start_time','DESC');
        $build->limit(1);
        $res = $build->get()->getResultArray();

        $end_time = " ";
        foreach ($res as $key => $value) {
            $end_time = $value['end_time'];
        }

        $tmptimearr = explode(":",$end_time);

        $tmp_str = $tmptimearr[0].":".$tmptimearr[1];
        return $tmp_str;

    }


    // get all part names details
    public function getpart_details_name(){
        $db =  \Config\Database::connect($this->site_connection);
        $build = $db->table('settings_part_current as p');
        $build->select('p.*,t.tool_name');
        $build->join('settings_tool_table as t','t.tool_id=p.tool_id');
        $build->where('t.tool_status!=',0);
        $res = $build->get()->getResultArray();

        return $res;
    }


    // public function get tool change over data
    public function get_tool_changeover_data_current($sdate){
        $db =  \Config\Database::connect($this->site_connection);
        $build = $db->table('pdm_production_info');
        $build->select('distinct(machine_id)');
        $build->where('shift_date',$sdate);
        $res = $build->get()->getResultArray();
        return $res;

    }

    // get production shift 
    public function get_toolchangeover_shift_arr($sdate,$mid){
        $db =  \Config\Database::connect($this->site_connection);
        $build = $db->table('pdm_production_info');
        $build->select('distinct(shift_id)');
        $build->where('shift_date',$sdate);
        $build->where('machine_id',$mid);
        $res = $build->get()->getResultArray();
        return $res;
    }
    

    // get production tool for shit wise
    public function get_production_tool($sdate,$mid,$sid){
        $db =  \Config\Database::connect($this->site_connection);
        $build = $db->table('pdm_production_info');
        $build->select('distinct(tool_id),part_id');
        $build->where('shift_date',$sdate);
        $build->where('machine_id',$mid);
        $build->where('shift_id',$sid);
        $res = $build->get()->getResultArray();
        return $res;
    }
 
    // get tool changeover time 
    public function get_final_tool_changeover_time($sdate,$mid,$sid,$tid,$pid){
        // $t_arr = [];
        // $p_arr = [];
        $db =  \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_tool_changeover as tp');
        $query->select('tp.*,pd.*');
        $query->join('tool_changeover as pd','tp.tool_changeover_id  = pd.id');
        $query->where('tp.machine_id',$mid);
        $query->where('tp.tool_id',$tid);
        $query->where('tp.shift_date',$sdate);
        $query->where('tp.shift_id',$sid);
        $query->where('pd.part_id',$pid);
        $query->orderBy('tp.machine_event_id','ASC');
        $res = $query->get()->getResultArray();

        if (count($res)>0) {
            $tmp_tcho_time = [];
            // tool changeover based time array pushing
            $machine_event_id = 0;
            foreach ($res as $key => $value) {
                array_push($tmp_tcho_time,$value['event_start_time']);
                $machine_event_id = $value['machine_event_id'];
            }

            $tool_end_time = $this->next_tool_changeover_record($mid,$sid,$sdate,$machine_event_id);
            if ($tool_end_time !=" ") {
                array_push($tmp_tcho_time,$tool_end_time);

            }else{
                $getshift_time_tmp = $this->getcurrentshift_record($sdate);
                foreach ($getshift_time_tmp['shift_ids'] as $key => $value) {
                    // return $value;
                    if (strcmp($value,$sid)==0) {
                        date_default_timezone_set("Asia/Kolkata");
                        $tmpdate_time = explode(" ",date("Y-m-d h:i"));
                        if (strcmp($tmpdate_time[0],$sdate)==0) {
                            $tmpcmp_time = explode(":",$getshift_time['shifts'][$k]['end_time']);
                            $tmpcmp_time1 = explode(":",$tmpdate_time[1]);
                            if ($tmpcmp_time1[0] ===  $tmpcmp_time[0]) {
                                array_push($tmp_tcho_time,$getshift_time_tmp['shifts'][$key]['end_time']);
                            }else{
                                $last_record_time = $this->getlast_record_time($mid,$pid,$tid,$sdate,$sid);
                                // array_push($tmp_time_arr,$tmpcmp_time1[0]);
                                array_push($tmp_tcho_time,$last_record_time);
                            }
                        }else{
                            array_push($tmp_tcho_time,$getshift_time_tmp['shifts'][$key]['end_time']);
                        }
                    }
                }
            }
            

            return $tmp_tcho_time;

            // return array("true","true");
        }else{
            $tmp_time_arr = [];
            $getshift_time = $this->getcurrentshift_record($sdate);
            foreach($getshift_time['shift_ids'] as $k => $v){
                if (strcmp($v,$sid)==0) {
                    // start time
                    array_push($tmp_time_arr,$getshift_time['shifts'][$k]['start_time']);
                    $end_time = $this->gettool_endtime($mid,$sid,$sdate,$getshift_time['shifts'][$k]['start_time']);
                    // end time
                    if ($end_time !=" ") {
                        array_push($tmp_time_arr,$end_time);
 
                    }else{
                        date_default_timezone_set("Asia/Kolkata");
                        $tmp_date_time_ar = explode(" ",date("Y-m-d h:i"));

                        if (strcmp($tmp_date_time_ar[0],$sdate)==0) {
                            $tmp_cmp_time = explode(":",$getshift_time['shifts'][$k]['end_time']);
                            $tmp_cmp_time1 = explode(":",$tmp_date_time_ar[1]);
                            if ($tmp_cmp_time[0] ===  $tmp_cmp_time1[0]) {
                                array_push($tmp_time_arr,$getshift_time['shifts'][$k]['end_time']);
                            }else{
                                $last_updated_time = $this->getlast_record_time($mid,$pid,$tid,$sdate,$sid);
                                // array_push($tmp_time_arr,$tmp_date_time_ar[1]);
                                array_push($tmp_time_arr,$last_updated_time);
                            }
                            // array_push($tmp_time_arr,"smae date");
                        }else{
                            // array_push($tmp_time_arr,"not same date".$sdate." ".$tmp_date_time_ar[0]);
                            array_push($tmp_time_arr,$getshift_time['shifts'][$k]['end_time']);
                        }

                        // array_push($tmp_time_arr,$getshift_time['shifts'][$k]['end_time']);
                    }
                }
            }
            return $tmp_time_arr;
            //return array("false","false");
        }
        // foreach ($get_arr as $key => $value) {
        //     array_push($t_arr,$value['tool_id']);
        //     array_push($p_arr,$value['part_id']);
        // }

        // if (count(array_unique($t_arr))>1) {
            
        // }else{
        //     if (count(array_unique($p_arr))>1) {
                
        //     }else{

        //     }
        // }
    }

}






?>