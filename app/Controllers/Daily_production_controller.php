<?php


namespace App\Controllers;
use App\Models\Daily_production_Model;


class Daily_production_controller extends BaseController{
    protected $session;
	public function __construct(){
       	//$data;
        $this->datas = new Daily_production_Model();

        $this->session = \Config\Services::session();
        $this->session->start();
    } 

    // public function index(){
    //     echo "Hello strategy";
    // }

    // get shift function
    public function getshift($sdate){
        $selected_date = $sdate;
        $getshift_res = $this->datas->getcurrentshift_record($selected_date);
        $tmp['shifts'] = $getshift_res['shift_ids'];
        $tmp['shift_management'] = $getshift_res['shift_management'];
        $tmp['shift_duration'] = $getshift_res['shifts'];
        // print_r($tmp);
        return $tmp;
    }

    // get shift wise start time getting
    public function getshift_wise_time($sdate){
        $selected_date = $sdate;
        $getshift_res = $this->datas->getcurrentshift_record($selected_date);

        $tmp_arr = [];
        foreach ($getshift_res["shifts"] as $key => $value) {

            // array_push($tmp_arr,$value);

            $tmp_key = $getshift_res['shift_ids'][$key];
            $tmp_value = $value['start_time'];

            $tmp_arr[$tmp_key] = $tmp_value;
        }
        // return $tmp_arr;

        return $tmp_arr;
      
    }

    // get downtime reasons function 
    public function getDowntimereason(){
        $getreason = $this->datas->getDowntimereason();
        // echo json_encode($getreason);
        return $getreason;
    }

    // get Quality reasons function
    public function getQualityreason(){
        $getqualityreason = $this->datas->getQualityreason();
        // echo  json_encode($getqualityreason);
        return $getqualityreason;
    }

    // get planned downtime reasons
    public function getplanneddowntime(){
        $date = "2022-12-05";
        $mid = "MC1001";
        $shift_id = "B";
        $res = $this->datas->getplanneddowntime($mid,$date,$shift_id);
        echo "<pre>";
        print_r($res);
        echo "</pre>";
    }

    // get tool chnageover data
    public function get_tool_changeover($machine_arr,$sdate,$shift_arr,$duration){
        $machine_based_arr = [];
        foreach($machine_arr as $key => $val){
            $shift_based_array = [];
            // return $shift_arr;
            foreach($shift_arr as $k => $v){
                // return $v;
                $tool_ids = $this->get_tool_id_data($val['machine_id'],$v,$sdate,$duration);
                $shift_based_array[$v] = $tool_ids;
            }
            $machine_based_arr[$val['machine_id']] = $shift_based_array;
        }
        return $machine_based_arr;
    }

    public function get_tool_id_data($mid,$v,$sdate,$duration){

        $res = $this->datas->get_tool_id();

        $part_based_array = [];
        foreach ($res as $key => $value) {
           $tmpass_arr = [];
            //    tool changeover time get function
           $get_timestamp = $this->datas->get_tool_changeovertime($mid,$v,$sdate,$value['part_id'],$value['tool_id']);

            // get downtime for that time durations    
           $getpart_downtime_duration = $this->datas->getalldowntime($mid,$sdate,$v,$value['part_id'],$value['tool_id']); 
           // $getpart_count = $this->datas->all_time_part_count($mid,$v,$sdate,$value['tool_id']);
           // $final_duration = $getpart_downtime_duration/$getpart_count;

           // array_push($tmpass_arr,$value['tool_id']);
           // $getppc = $this->datas->getpart_details($value['part_id']);
           // array_push($tmpass_arr,$getppc[0]['part_produced_cycle']);
           // array_push($tmpass_arr,$getppc[0]['NICT']);
           
           // try {
           //  if ($getppc[0]['NICT'] == 0) throw new Exception("Divide by zero");
           //  $target = $final_duration / $getppc[0]['NICT'];
           //  array_push($tmpass_arr,$target);
           // } catch (\Throwable $e) {
           //      array_push($tmpass_arr,0);
           // }
           

           // array_push($tmpass_arr,$get_timestamp);
           // $part_based_array[$value['part_id']] = $tmpass_arr;
        }
        return $part_based_array;
    }

    // downtime graph data for downtime reason wise 
    public function getdowntimegraph($machine_a,$sdate,$shift_a){
        $reason = $this->datas->getmachine_wise_downtime_reason($machine_a,$sdate);
        // $reason = $this->getDowntimereason();
        
        // macine wise array
       $get_downtime_machine_array = [];
        foreach($machine_a as $k => $val){
            // shift wise array
            $get_downtime_shift_array = [];
            foreach($shift_a as $k1 => $v1){
                // reason wise array
                $get_downtime_array = [];
                foreach($reason as $key => $value){
                    $getcount = $this->datas->getdowntimecount($val['machine_id'],$v1,$sdate,$key);
                    $get_downtime_array[$key] = $getcount;
                }
                $get_downtime_shift_array[$v1] = $get_downtime_array;
            }
            $get_downtime_machine_array[$val['machine_id']] = $get_downtime_shift_array;

        }
       
        return $get_downtime_machine_array;
        // return $reason;
    }

    // get downtime value
    public function getdowntimevalue($getmachine_arr,$date,$shift_arr){
        
        // get machine wise array 
        $get_downtime_count_machine = [];
        foreach ($getmachine_arr as $key => $value) {
            // get shift wise array
            $getdowntimecount_shift = [];
            foreach ($shift_arr as $k => $val) {
                $getdowntimecount = $this->datas->getdowntime_total_count($value['machine_id'],$val,$date);
                // return $getdowntimecount;
                $getdowntimecount_shift[$val] = $getdowntimecount; 
            }
            $get_downtime_count_machine[$value['machine_id']] = $getdowntimecount_shift;
        }
        return $get_downtime_count_machine;
        
    }

    // get machine records
    public function getMachine_data(){
       if ($this->request->isAJAX()) {
            // $date = "2023-09-09";

            log_message("info","\n\ndaily production status function calling log");
            log_message("info","\n\ndaily production status function calling log");
            $start_time_logger_dps = microtime(true);

            $date = $this->request->getVar('date');

           $getmachine_data = $this->datas->getmachine_data();
            $getdowntime_reason_data = $this->datas->getdowntime_reason_data();
            $getquality_reason_data = $this->datas->getquality_reason_data();
            $getpart_data = $this->datas->getpart_data();

            // machine based shift based tool changeover
            $getshiftid = $this->getshift($date);

            $getsid = $getshiftid['shifts'];
            $shift_duration = $getshiftid['shift_management'][0]['duration'];

            $downtime_data = $this->datas->getdowntime_data($date);
            $active_time_data = $this->datas->get_active_data($date);
            $production_data = $this->datas->getproduction_data($date);

            // echo "<pre>";
            // print_r($active_time_data);
            // Machine Wise Total Downtime.....
            $downtime_machine_wise=[];
            foreach ($getmachine_data as $key => $m) {
                $tmp=[];
                foreach ($getsid as $key => $shift) {
                    $duration=0;
                    $duration_min=0;
                    $duration_sec=0;
                    foreach ($downtime_data as $key => $down) {
                        if ($down['machine_id'] == $m['machine_id'] and $down['Shift_id'] == $shift) {
                            $split_duration = explode(".",$down['split_duration']);

                            $duration_min = $duration_min + $split_duration[0];
                            if (sizeof($split_duration)>1) {
                                $duration_sec = $split_duration[1]+$duration_sec;
                            }
                        }
                    }
                    $duration = $duration + $duration_min + ($duration_sec/60);
                    $tmp[$shift]= $duration*60;
                }
                $downtime_machine_wise[$m['machine_id']]= $tmp;
            }

            // Machine wise- Reason wise Downtime..
            $downtime_machine_reason_wise=[];
            foreach ($getmachine_data as $key => $m) {
                $tmp=[];
                foreach ($getsid as $key => $shift) {
                    $tmpReason=[];
                    foreach ($getdowntime_reason_data as $key => $r) {
                        $duration=0;
                        $duration_min=0;
                        $duration_sec=0;
                        foreach ($downtime_data as $key => $down) {
                            if ($down['machine_id'] == $m['machine_id'] and $down['Shift_id'] == $shift and $down['downtime_reason_id'] == $r['downtime_reason_id']) {
                                $split_duration = explode(".",$down['split_duration']);

                                $duration_min = $duration_min + $split_duration[0];
                                if (sizeof($split_duration)>1) {
                                    $duration_sec = $split_duration[1]+$duration_sec;
                                }
                            }
                        }
                        $duration = $duration + $duration_min + ($duration_sec/60);
                        if ($duration>0) {
                            $tmpReason['dr'.$r['downtime_reason_id']]= $duration*60;
                        }
                    }
                    $tmp[$shift]= $tmpReason;
                }
                $downtime_machine_reason_wise[$m['machine_id']]= $tmp;
            }

            // Quality rejection data...
            $quality_machine_wise=[];
            foreach ($getmachine_data as $key => $m) {
                $tmp_machine=[];
                foreach ($getsid as $key => $shift) {
                    $tmp_part=[];
                    foreach ($getpart_data as $key => $p) {
                        $tmp_quality=[];
                        foreach ($getquality_reason_data as $key => $r) {
                            $total_rejection=0;
                            $tmp_quality_tmp = 0;
                            foreach ($production_data as $key => $prod) {
                                if ($prod['machine_id'] == $m['machine_id'] and $prod['shift_id'] == $shift and $p['part_id']==$prod['part_id']) {
                                    if (($prod['reject_reason'] !=null) && ($prod['reject_reason'] !="")){
                                        $tmpreasons_ar = explode("&&",$prod['reject_reason']);
                                        foreach ($tmpreasons_ar as $v) {
                                            $each_reason = explode("&",$v);
                                            if ($each_reason[1] == $r['quality_reason_id']) {
                                                $total_rejection = $total_rejection + $each_reason[0];
                                            }
                                        }
                                       
                                    }
                                    if (count($tmp_quality)<=0) {
                                        $tmp_quality_tmp = 1;
                                    }
                                }
                            }
                            if ($total_rejection>0) {
                                $tmp_quality['qr'.$r['quality_reason_id']]=$total_rejection;
                            }
                        }
                        if (sizeof($tmp_quality) > 0 || $tmp_quality_tmp==1) {
                            $tmp_part[$p['part_id']]=$tmp_quality;
                        }
                    }
                    $tmp_machine[$shift]= $tmp_part;
                }
                $quality_machine_wise[$m['machine_id']]= $tmp_machine;
            }

            // Production status...
            // Quality rejection data...
            $quality_machine_production_wise=[];
            foreach ($getmachine_data as $key => $m) {
                $tmp_machine=[];
                foreach ($getsid as $key => $shift) {
                    $tmp_part=[];
                    foreach ($getpart_data as $key => $p) {
                        $total_rejection=0;
                        $total_correction=0;
                        $total_production=0;
                        $tmp_part_check = "";
                        foreach ($production_data as $key => $prod) {
                            if ($prod['machine_id'] == $m['machine_id'] and $prod['shift_id'] == $shift and $p['part_id']==$prod['part_id']) {

                                $total_rejection=$total_rejection+$prod['rejections'];
                                $total_correction=$total_correction+($prod['corrections']);
                                $total_production=$total_production+$prod['production'];
                                $tmp_part_check = $prod['part_id'];
                            }
                        }

                        $ctpp = $total_production+($total_correction);
                        $good = $ctpp - $total_rejection;
                        if ($ctpp>0) {
                            $percentage = ($total_rejection / $ctpp) * 100;
                        }else{
                            $percentage = 0;
                        }
                        $tmp_production_arr = [];
                        array_push($tmp_production_arr,$total_rejection);
                        array_push($tmp_production_arr,$ctpp);
                        array_push($tmp_production_arr,$good);
                        array_push($tmp_production_arr,$percentage);
                        if ($p['part_id']==$tmp_part_check) {
                            $tmp_part[$p['part_id']] = $tmp_production_arr;
                        }
                       
                        // $tmp_part[$p['part_id']] = array('rejections' => $total_rejection, 'TPP' => $ctpp,'good' =>$good,'percentage' =>$percentage);
                    }
                    $tmp_machine[$shift]= $tmp_part;
                }
                $quality_machine_production_wise[$m['machine_id']]= $tmp_machine;
            }

            // machine array
            $machine_array_tmp = [];
            foreach($getmachine_data as $key => $value){
                array_push($machine_array_tmp,$value['machine_id']);
            }


            // find toolchangeover....
            $tool_changeover_data = $this->datas->get_tool_changeover_range($date);
            $tool_changeover_data_before = $this->datas->get_tool_changeover_range_before($date);
            $tool_changeover_data_after = $this->datas->get_tool_changeover_range_after($date);

            // // print_r()
            // echo "<pre>";
            // print_r($getsid);


            // $quality_part_production_wise=$this->get_current_tool_chnageover_records($active_time_data,$getpart_data,$date);
            $quality_part_production_wise = [];
            $res = $this->datas->get_tool_changeover_data_current($date);
            foreach ($res as $key => $value) {
                $shift_arr = $this->datas->get_toolchangeover_shift_arr($date,$value['machine_id']);
                $tmp_s = [];
                foreach ($shift_arr as $k1 => $val) {
                    // $tmp = [];
                    // array_push($tmp_s,$val['shift_id']);
                    $get_tools_tc = $this->datas->get_production_tool($date,$value['machine_id'],$val['shift_id']);
                
    
                    // $get_time_arr = $this->datas->get_final_tool_changeover_time($sdate,$value['machine_id'],$val['shift_id'],$get_tools_tc);
                    $time_arr = [];
                    foreach ($get_tools_tc as $k1 => $val1) {
                        $record = $this->datas->get_final_tool_changeover_time($date,$value['machine_id'],$val['shift_id'],$val1['tool_id'],$val1['part_id']);
                        $tool_arr = $this->final_duration_data($active_time_data,$value['machine_id'],$date,$val['shift_id'],$val1['tool_id'],$val1['part_id'],sizeof($get_tools_tc),$record[0],$record[1],$getpart_data);
                        array_push($tool_arr,$record);
                        $time_arr[$val1['part_id']] = $tool_arr;
                    }
                    $tmp_s[$val['shift_id']] = $time_arr;
                }
                $quality_part_production_wise[$value['machine_id']] = $tmp_s;    
            }
            /*
            foreach ($getmachine_data as $key => $m) {
                $tmp_machine=[];
                foreach ($getsid as $key_shift => $s) {
                    $tmp_part=[];
                    $part_id="";
                    $ppc="";
                    $from_time="";
                    $to_time ="";

                    $notoolchangeover=0;
                    $current_date = date('Y-m-d');
                   
                    for ($j=0; $j < sizeof($tool_changeover_data); $j++) { 
                        if ($tool_changeover_data[$j]['machine_id'] == $m['machine_id'] and $tool_changeover_data[$j]['shift_date'] == $date and $tool_changeover_data[$j]['shift_id'] == $s) {
                            // Find the Previous Toolchangeover.....
                            $shift_end_time="";
                            $next_start_time="";
                            $shift_e_time="";
                            for ($i=0; $i < sizeof($tool_changeover_data_before); $i++) { 
                                if ($tool_changeover_data_before[$i]['machine_id'] == $m['machine_id'] and $tool_changeover_data[$j]['shift_date'] == $date and $tool_changeover_data[$j]['shift_id'] == $s) {
                                    $tool_part = $this->datas->get_tool_changeover_part($tool_changeover_data_before[$i]['tool_changeover_id']);

                                    foreach ($getshiftid['shift_duration'] as $tool) {
                                        if (str_split($tool['shifts'])[0] == $s) {
                                            $from_time = strtotime($date." ".$tool['start_time']);
                                            $to_time = strtotime($date." ".$tool_changeover_data[$j]['event_start_time']);

                                            $next_start_time = $tool_changeover_data[$j]['event_start_time'];

                                            // Find Duration
                                            
                                            foreach ($tool_part as $p_c) {
                                                $x = $this->final_duration_data($active_time_data,$m['machine_id'],$date,$s,$tool_changeover_data_before[$i]['tool_id'],$p_c['part_id'],sizeof($tool_part),$from_time,$to_time,$getpart_data);
                                                // $x['from_time'] = $tool['start_time'];
                                                // $x['to_time'] = $tool_changeover_data[$j]['event_start_time'];
                                                $tmp_arr = [];
                                                array_push($tmp_arr,$tool['start_time']);
                                                array_push($tmp_arr,$tool_changeover_data[$j]['event_start_time']);
                                                array_push($x,$tmp_arr);
                                                $tmp_part[$p_c['part_id']] = $x;
                                            }

                                            $shift_end_time = strtotime($date." ".$tool['end_time']);
                                            $shift_e_time = $tool['end_time'];
                                        }
                                    }
                                    break;
                                }
                            }

                            // $j=$j+1;
                            // Next next toolchangeover...
                            while ($j < sizeof($tool_changeover_data)) {
                                $from_time=$to_time;
                                if ($tool_changeover_data[$j]['machine_id'] == $m['machine_id'] and $tool_changeover_data[$j]['shift_date'] == $date and $tool_changeover_data[$j]['shift_id'] == $s) {
                                    $to_time = strtotime($date." ".$tool_changeover_data[$j]['event_start_time']);
                                    // Find Duration

                                    $tool_part = $this->datas->get_tool_changeover_part($tool_changeover_data[$j]['tool_changeover_id']);

                                    foreach ($tool_part as $p_c) {
                                        $x = $this->final_duration_data($active_time_data,$m['machine_id'],$date,$s,$tool_changeover_data[$i]['tool_id'],$p_c['part_id'],sizeof($tool_part),$from_time,$to_time,$getpart_data);
                                        // $x['from_time'] = $next_start_time;
                                        // $x['to_time'] = $tool_changeover_data[$j]['event_start_time'];
                                        $tmp_arr = [];
                                        array_push($tmp_arr,$next_start_time);
                                        array_push($tmp_arr,$tool_changeover_data[$j]['event_start_time']);
                                        array_push($x,$tmp_arr);
                                        $tmp_part[$p_c['part_id']] = $x;
                                        // $tmp_part[$p_c['part_id']] = $x;
                                    }
                                    $next_start_time = $tool_changeover_data[$j]['event_start_time'];
                                }
                                # code...
                                $j=$j+1;
                            }

                            // Last Value(Toolchangeover)....
                            $from_time=$to_time;    
                            $to_time = $shift_end_time;

                            // Find Duration
                            // $tool_part = $this->datas->get_tool_changeover_part($tool_changeover_data[$j]['tool_changeover_id']);

                            foreach ($tool_part as $p_c) {
                                $x = $this->final_duration_data($active_time_data,$m['machine_id'],$date,$s,$tool_changeover_data[$i]['tool_id'],$p_c['part_id'],sizeof($tool_part),$from_time,$to_time,$getpart_data);
                                // $x['from_time'] = $next_start_time;
                                // $x['to_time'] = $shift_e_time;

                                // $tmp_part[$p_c['part_id']] = $x;
                                $tmp_arr = [];
                                array_push($tmp_arr,$next_start_time);
                                array_push($tmp_arr,$shift_e_time);
                                array_push($x,$tmp_arr);
                                $tmp_part[$p_c['part_id']] = $x;
                            }

                            $notoolchangeover=1;
                            break;
                        }
                    }

                    if ($notoolchangeover==0) {
                        // Find the Previous Toolchangeover.....
                        for ($i=0; $i < sizeof($tool_changeover_data_before); $i++) { 
                            if ($tool_changeover_data_before[$i]['machine_id'] == $m['machine_id']) {
                                $tool_part = $this->datas->get_tool_changeover_part($tool_changeover_data_before[$i]['tool_changeover_id']);

                                $tmp_s = "";
                                $tmp_e = "";
                                date_default_timezone_set('Asia/Kolkata');
                                foreach ($getshiftid['shift_duration'] as $tool) {
                                    if (str_split($tool['shifts'])[0] == $s) {
                                        $from_time = strtotime($date." ".$tool['start_time']);
                                        $tmp_s = $tool['start_time'];
                                        if (date("Y-m-d") == $date and strtotime($date." ".$tool['end_time'])>strtotime(date('Y-m-d H:00:00', time()))) {
                                            $to_time = strtotime(date('Y-m-d H:00:00', time()));
                                            $tmp_e = date('H:00:00', time());
                                        }else{
                                            $to_time = strtotime($date." ".$tool['end_time']);
                                            $tmp_e = $tool['end_time'];
                                        }
                                    }
                                }
                                // Find Duration
                                foreach ($tool_part as $p_c) {
                                    $x = $this->final_duration_data($active_time_data,$m['machine_id'],$date,$s,$tool_changeover_data_before[$i]['tool_id'],$p_c['part_id'],sizeof($tool_part),$from_time,$to_time,$getpart_data);
                                    // $x['from_time'] = $tmp_s;
                                    // $x['to_time'] = $tmp_e;

                                    // $tmp_part[$p_c['part_id']] = $x;
                                    $tmp_arr = [];
                                    array_push($tmp_arr,$tmp_s);
                                    array_push($tmp_arr,$tmp_e);
                                    array_push($x,$tmp_arr);
                                    $tmp_part[$p_c['part_id']] = $x;
                                    
                                }
                                break;
                            }
                        }
                    }
                    if ($current_date==$date) {
                        date_default_timezone_set('Asia/Kolkata');
                        $shift_time = $getshiftid['shift_duration'][$key_shift]['start_time'];
                        $current_time_stamp = date($date.' H:00:00');
                        $shift_time_stamp = date($date." ".$shift_time);
                        $tmp = [];
                        array_push($tmp,$current_time_stamp);
                        array_push($tmp,$shift_time_stamp);
                        if ($current_time_stamp>$shift_time_stamp) {
                            
                            $tmp_machine[$s]=$tmp_part;
                        }else{
                            $tmp_machine[$s]=array();
                        }
                        // $tmp_machine[$s]= "ok";
                    }else if($date<$current_date){
                        $tmp_machine[$s]= $tmp_part;
                    }
                   
                }
                $quality_part_production_wise[$m['machine_id']]= $tmp_machine;
            }
            */

            // $quality_part_production_wise['before_tool_changeover'] = $tool_changeover_data_before;
            // $quality_part_production_wise['after tool_changeover'] = $tool_changeover_data_after;
            // $quality_part_production_wise['tool_changeover_data'] = $tool_changeover_data;
            
            // quality reasons array
            $quality_reasons_org_data=[];
            foreach ($getquality_reason_data as $key => $value) {
                $quality_reasons_org_data[$value['quality_reason_id']] = $value['quality_reason_name'];
            }

            // downtime reasons array
            $downtime_reasons_org_data = [];
            foreach ($getdowntime_reason_data as $key => $value) {
                $downtime_reasons_org_data[$value['downtime_reason_id']] = $value['downtime_reason'];
            }

            // machine details array
            $machine_details_arr_org = [];
            foreach ($getmachine_data as $key => $value) {
                $tmp_machine_arr = [];
                array_push($tmp_machine_arr,$value['machine_name']);
                array_push($tmp_machine_arr,$value['machine_brand']);
                array_push($tmp_machine_arr,$value['tonnage']);
                $machine_details_arr_org[$value['machine_id']] = $tmp_machine_arr; 
            }


            $data['Shifts'] = $getsid;
            $data['Machines'] = $machine_array_tmp;
            $data['quality_reasons'] = $quality_reasons_org_data;
            $data['Downtime_reasons'] = $downtime_reasons_org_data;
            $data['Part_details'] = $quality_part_production_wise;
            $data['Downtime_value'] = $downtime_machine_wise;
            $data['Downtime_reasons_val'] = $downtime_machine_reason_wise;
            $data['Part_production_details'] = $quality_machine_production_wise;
            $data['Quality_reject_reason'] = $quality_machine_wise;
            $data['machine_details'] = $machine_details_arr_org;
            $data['part_count_machine_wise'] = $this->part_count_machine($quality_machine_production_wise);

            // // ui purpose
            // $data['part_count_machine_wise'] = $getpart_count;
            $part_names_arr = $this->getpartnames_arr($quality_machine_production_wise);
            $data['part_names'] = $part_names_arr;
           
            // // ui purpose just remove future shift id records
            $shift_wise_time_arr = [];
            foreach ($getshiftid['shift_duration'] as $key => $value) {
                $tmp = explode("0",$value['shifts']);
                $tmp_arr = [];
                // array_push($tmp_arr,$value['start_time']);
                $shift_wise_time_arr[$tmp[0]] = $value['start_time'];
            }
            $data['shift_wise_time'] = $shift_wise_time_arr;

            // $data['dummy'] = $getshiftid;
            $end_time_logger_dps = microtime(true);
            $execution_duration_logger_dps = ($end_time_logger_dps - $start_time_logger_dps);
            log_message("info","dps execution duration is :\t".$execution_duration_logger_dps."sec");
           
           echo json_encode($data);
            // echo "<pre>";
            // print_r($data);

        }
      
    }   

    public function part_count_machine($quality_arr){
        $machine_arr = [];
        foreach ($quality_arr as $key => $value) {
            $tmp = [];
            foreach ($value as $k => $val) {
                foreach ($val as $k1 => $v1) {
                    array_push($tmp,$k1);
                }
            }
            // $distinct_arr = array_unique($tmp);
            $machine_arr[$key] = $tmp;

        }

        return $machine_arr;
    }

    public function getpartnames_arr($get_production_details){
        $get_all_part_name_details = $this->datas->getpart_details_name();
      
        $get_part_arr = [];
        foreach ($get_production_details as $key => $value) {
            $tmp_s = [];
            foreach ($value as $k1 => $val) {
                foreach ($val as $k2 => $val1) {
                    array_push($get_part_arr,$k2);
                }
            }
        }

        $distinct_part_arr = array_unique($get_part_arr);

        $part_names_arr = [];
        foreach ($distinct_part_arr as $key => $value) {
            $tmp = [];
           foreach ($get_all_part_name_details as $key => $val) {
                if ($value == $val['part_id']) {
                   
                    array_push($tmp,$val['part_name']);
                    array_push($tmp,$val['tool_name']);
                   
                }
           }
           $part_names_arr[$value] = $tmp;
        }

        return $part_names_arr;

    }

    public function final_duration_data($raw,$m_id,$date,$s_id,$t_id,$p_id,$p_size,$s_time,$e_time,$p_data){
        $total=0;
        $min=0;
        $sec=0;
        // $tmp_count = 0;
        // $tmp_count_c = "";
        foreach ($raw as $key => $val) {
            $start = strtotime($val['shift_date']." ".$val['start_time']);
            $end = strtotime($val['shift_date']." ".$val['end_time']);

            if ($val['machine_id'] == $m_id and $val['shift_date'] == $date and $val['shift_id'] == $s_id and $val['tool_id'] == $t_id and $val['part_id'] == $p_id ) {
                // $tmp_count = $tmp_count + 1;
                $split_duration = explode(".",$val['duration']);
                $min = $min + $split_duration[0];
                if (sizeof($split_duration)>1) {
                    $sec = $split_duration[1]+$sec;
                }
                // $tmp_count_c = $m_id;
            }
        }

        $total = ($total + $min + ($sec/60))/$p_size;

        $final=[];
        $l = sizeof($p_data);
        for ($i=0; $i < $l; $i++) { 
            if ($p_data[$i]['part_id'] == $p_id) {
                // $final['tool_id'] = $t_id;
                // $final['ppc'] = $p_data[$i]['part_produced_cycle'];
                // $final['nict'] = $p_data[$i]['NICT'];
                array_push($final,$t_id);
                array_push($final,$p_data[$i]['part_produced_cycle']);
                array_push($final,$p_data[$i]['NICT']);
                // array_push($final,$tmp_count);
                // array_push($final,$min);
                // array_push($final,$p_size);


                if (($p_data[$i]['NICT']/60) > 0 ) {
                    $target = (int)(($total/($p_data[$i]['NICT']/60))*$p_data[$i]['part_produced_cycle']);
                }else{
                    $target = 0;
                }
                
                // $final['target'] = $target;
                array_push($final,$target);
                
            }
        }
        return $final;
    }
    
    // ui purpose machine wise part count
    public function macine_wise_part_count($part_wise_arr){

        $tmp_machine_wise_arr = [];

        // machine wise
        foreach ($part_wise_arr as $key => $value) {
            // return $value;
            $tmp = [];
            // shift wise
            foreach ($value as $k => $v) {
                // part wise
                foreach ($v as $k1 => $v1) {
                    array_push($tmp,$k1);
                }
                
            }
            $tmp_machine_wise_arr[$key] = $tmp;
        }
        return $tmp_machine_wise_arr;
    }

    // ui purpose part array and tool array
    public function partid_wise_details($part_production_arr){
        $tmp_part_tool_arr = [];
        // machine wise array
        foreach($part_production_arr as $key => $value){
            // shift wise
            foreach ($value as $k => $v) {
                // part wise
                foreach($v as $k1 =>$v1){
                    $tmp_part_tool_arr[$k1] = $v1[0];
                }
            }
        }
        return $tmp_part_tool_arr;
    }


    // this function for quality rejection reasno for descending order function
    public function check_quality_reason_valid($getquality_reject_reason){
        foreach ($getquality_reject_reason as $key => $value) {
            $tmp1 = [];
            foreach ($value as $k1 => $v1) {
                $tmp2 = [];
                foreach ($v1 as $k2 => $v2) {
                    $tmp3 = [];
                    foreach ($v2 as $k3 => $v3) {
                        // $index = strval($k3);
                        if ($v3 > 0) {
                            $index = "qr".$k3;
                            $tmp3[$index] = $v3;
                        }
                    }
                    arsort($tmp3);
                    $tmp2[$k2] = $tmp3;
                }
                $tmp1[$k1] = $tmp2;
            }
            $tmp_arr[$key] = $tmp1;
        }


        // echo "<pre>";
        // print_r($tmp_arr);
        // echo "</pre>";

        return $tmp_arr;



    }

    // this function goes to downtime reasons seconds descending order and valid reasons passing function
    public function getdowntime_valid_reason($getdowntime_arr){
        $tmparr = [];
        foreach ($getdowntime_arr as $key => $value) {
            $shift_arr = [];
            // machine  base array
            foreach ($value as $k1 => $v1) {

                $tmp1 = [];
                // shift base array
                // return $v1;
                foreach ($v1 as $k2 => $v2) {

                    $index_downtime = "dr".$k2;
                    $tmp1[$index_downtime] = $v2;
                }
            arsort($tmp1);
            $shift_arr[$k1] = $tmp1;
            }
            $tmparr[$key] = $shift_arr;
        }

        // echo "<pre>";
        // print_r($tmparr);
        // echo "</pre>";
        return $tmparr;
    }


    // check function
    
    public function check(){
        $date = "2023-01-01";
        $shift_id = "A";
        $mid="MC1001";
        $tid="TL1018";
        $pid="PT1018";


        $arr = $this->datas->getalldowntimeduration($mid,$date,$shift_id,$pid,$tid);
        // echo "<pre>";
        // print_r($arr);
        // echo "</pre>";


        $arr1 = $this->datas->get_time_seconds($mid,$shift_id,$date,$pid,$tid);
        // echo "<pre>";
        // print_r($arr1);
        // echo "</pre>";

        $demo_arr = $this->datas->get_tool_changeovertime($mid,$shift_id,$date,$pid,$tid);
        echo "<pre>";
        print_r($demo_arr);
        echo "</pre>";
    }
   
    // tool changeover time function for the part details array
    
    // public function get_current_tool_chnageover_records(){
    //     $sdate = "2023-06-10";

    //     $final_arr = [];
    //     $res = $this->datas->get_tool_changeover_data_current($sdate);
    //     foreach ($res as $key => $value) {
    //         $shift_arr = $this->datas->get_toolchangeover_shift_arr($sdate,$value['machine_id']);
    //         $tmp_s = [];
    //         foreach ($shift_arr as $k1 => $val) {
    //             // $tmp = [];
    //             // array_push($tmp_s,$val['shift_id']);
    //             $get_tools_tc = $this->datas->get_production_tool($sdate,$value['machine_id'],$val['shift_id']);
            

    //             // $get_time_arr = $this->datas->get_final_tool_changeover_time($sdate,$value['machine_id'],$val['shift_id'],$get_tools_tc);
    //             $time_arr = [];
    //             foreach ($get_tools_tc as $k1 => $val1) {
    //                 $record = $this->datas->get_final_tool_changeover_time($sdate,$value['machine_id'],$val['shift_id'],$val1['tool_id'],$val1['part_id']);
    //                 $time_arr[$val1['part_id']] = $record;
    //             }
    //             $tmp_s[$val['shift_id']] = $get_tools_tc;
    //         }
    //         $final_arr[$value['machine_id']] = $tmp_s;
            
    //     }
    //     echo  "<pre>";
    //     print_r($final_arr);
    // }

}



?>