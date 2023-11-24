<?php


namespace App\Controllers;
use App\Models\Current_Shift_Performance_Model;


class Current_Shift_Performance extends BaseController{
    protected $session;
	public function __construct(){
       	//$data;
        $this->datas = new Current_Shift_Performance_Model();

        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function getLive(){
        log_message("info","\n\n current shift performance get live machine function calling !!");
        $start_time_logger_live = microtime(true);

        $shift_detailes =  $this->datas->getShiftLive();
        $shift = $this->datas->getShiftExact($shift_detailes[0]['shift_date']." 23:59:59");

        foreach ($shift['shift'] as $key => $value) {
        	if (str_split($value['shifts'])[0] == $shift_detailes[0]['shift_id']) {
        		$shift_detailes[0]['start_time'] = $value['start_time'];
        		$shift_detailes[0]['end_time'] = $value['end_time'];
        	}
        }

        $end_time_logger_live = microtime(true);
        $execution_time_logger_live = ($end_time_logger_live - $start_time_logger_live);
        log_message("info","current shift performance get live execution duration is :\t".$execution_time_logger_live);


        return json_encode($shift_detailes);
        // echo "<pre>";
        // print_r($shift_detailes);
        // echo "</pre>";
    }

    public function getPreviousShiftLive(){
        log_message("info","\n\n current shift performance module previous shift function calling !!");
        $start_time_logger_prev_shift = microtime(true);

        $shift_detailes =  $this->datas->getPreviousShiftLive();

        $shift = $this->datas->getShiftExact($shift_detailes[1]['shift_date']." 23:59:59");

        foreach ($shift['shift'] as $key => $value) {
            if (str_split($value['shifts'])[0] == $shift_detailes[1]['shift_id']) {
                $shift_detailes[1]['start_time'] = $value['start_time'];
                $shift_detailes[1]['end_time'] = $value['end_time'];
            }
        }
        $shift_data = [];
        array_push($shift_data,$shift_detailes[1]);

        $end_time_logger_prev_shift = microtime(true);
        $execution_time_logger_prev_shift = ($end_time_logger_prev_shift - $start_time_logger_prev_shift);
        log_message("info","current shift performance previous shift function execution duration is:\t".$execution_time_logger_prev_shift);
        
        return json_encode($shift_data);
    }

    public function getLiveMode(){
    	if ($this->request->isAJAX()) {

            log_message("info","\n\ncurrent shift performance getlivemode graph function calling !!!");
            $start_time_logger_getlive_mode = microtime(true);

    		$shift_date = $this->request->getVar('shift_date');
    		$shift_id = $this->request->getVar('shift_id');
            // $filter = $this->request->getVar('filter');

    		// $shift_date = "2023-10-06";
    		// $shift_id = "A";
            // $filter = 2;

    		// Current Shift OEE Target......
    		$oee_target = $this->datas->getOEETarget();

    		// Hourly Production.....
    		$hourly_production = $this->datas->getLiveProduction($shift_date,$shift_id );
            // echo "shift id :\t".$shift_id."\n";
            // echo "\n";
            // echo "\nshift date:\t".$shift_date;
            foreach ($hourly_production as $key => $value) {
                $hourly_production[$key]['production'] = ((int)$value['production']) + ((int)$value['corrections']);
            }

    		// Machine Detailes.......
    		$machine_detailes = $this->datas->getMachineLive();

            $production_target_all = $this->datas->getProductionTarget($shift_date);

          
    		// Shift Detailes,.......
    		$shift_detailes =  $this->datas->getShiftLive_oui($shift_date,$shift_id);
            // echo "shift date:\t".$shift_detailes[0]['shift_date'];
        	$shift = $this->datas->getShiftExact($shift_detailes[0]['shift_date']." 23:59:59");
        	$shiftList=[];
        	$s_time="";
        	$e_time="";

            // echo "shift id:\t".$shift_detailes[0]['shift_id'];
    		foreach ($shift['shift'] as $key => $value) {
                // echo "\t".str_split($value['shifts'])[0]." \t".$shift_detailes[0]['shift_id'];
	        	if (str_split($value['shifts'])[0] == $shift_detailes[0]['shift_id']) {

	        		$s_time = $value['start_time'];
	        		$e_time = $value['end_time'];
	        	}
	        }
            // echo "start time:\t".$s_time;
	        $ts_date = strtotime($shift_date." ".$s_time);
	        $te_date = strtotime($shift_date." ".$e_time);

	        $t_time=$s_time;

	        while (true) {
	        	if (strtotime($shift_date." ".$t_time) ==  $te_date) {
	        		// array_push($shiftList,$t_time);
	        		break;
	        	}else{
                    $x = explode(":", $t_time);
                    $x = $x[0].":".$x[1];
	        		array_push($shiftList,$x);
	        		$t = date("Y-m-d H:i:s",strtotime($shift_date." ".$t_time.'+1 hours'));
	        		$t_time = date("H:i:s",strtotime($t));	        		
	        	}
	        }


	        // Machine-wise Production Data,...........
	        $production_total = [];
	        $machineWise=[];
	        $machine_name = [];
	        $target_production =[];
	        
	        //Part Details.....
            $partsDetails = $this->datas->settings_tools(); 

	        foreach ($machine_detailes as $m) {
	        	$t = [];
	        	$total =0;
	        	$target=[];

                $tar_per=[];
                $track = 0;

                $check_array = [];

	        	foreach ($hourly_production as $key => $p) {
	        		if ($m['machine_id'] == $p['machine_id']) {
                        $h_total=0;
                        
	        			$total =$total+$p['production']+(int)trim($p['corrections'],"");
                            $temp_target =0;		
                            $tc=0;	
                            foreach ($partsDetails as $part) {
                                if ($p['part_id'] == $part->part_id and !in_array($key,$check_array)) {
                                    $s_time =  strtotime($p['shift_date']." ".$p['start_time']);
                                    $e_time = strtotime($p['shift_date']." ".$p['end_time']);

                                    $e_time_tmp = $s_time;
                                    while (true) {
                                        $e_time_tmp += 60;
                                        if (date('H', $e_time_tmp) == date('H', $e_time) && date('i', $e_time_tmp)==date('i', $e_time)) {
                                            break;
                                        }
                                    }
                                    $e_time = $e_time_tmp;                            
                                    
                                    if ($part->NICT>0) {
                                        $temp_target = $temp_target + (($e_time-$s_time)/$part->NICT);    
                                    }else{
                                        // $temp_target = $temp_target + (($e_time-$s_time)/$part->NICT);
                                        $temp_target = 0;
                                    }
                                    $tc=1;  
                                    $h_total=$h_total+$p['production'];
                                }
                            }
                            foreach ($hourly_production as $k => $multiple) {
                                if ($multiple['machine_id'] == $p['machine_id'] and $multiple['start_time'] == $p['start_time'] and $multiple['part_id'] != $p['part_id'] and !in_array($k,$check_array)) {
                                    foreach ($partsDetails as $part) {
                                        if ($p['part_id'] == $part->part_id) {
                                            $s_time =  strtotime($p['shift_date']." ".$p['start_time']);
                                            $e_time = strtotime($p['shift_date']." ".$p['end_time']);

                                            $e_time_tmp = $s_time;
                                            while (true) {
                                                $e_time_tmp += 60;
                                                if (date('H', $e_time_tmp) == date('H', $e_time) && date('i', $e_time_tmp)==date('i', $e_time)) {
                                                    break;
                                                } 
                                            }
                                            $e_time = $e_time_tmp;

                                            $temp_target = $temp_target + (($e_time-$s_time)/$part->NICT);
                                            // unset($hourly_production[$k]);
                                            array_push($check_array, $key);
                                            array_push($check_array, $k);
                                            $tc=1;  
                                            $h_total=$h_total+$multiple['production'];
                                        }
                                    }
                                }
                            }
        					if ($tc==1) {
                                array_push($target, (int)$temp_target);

                                date_default_timezone_set('Asia/Kolkata'); 
                                if (date("H",$s_time) == date("H")) {
                                    $e_time = strtotime($p['shift_date']." ".date("H:i:s"));
                                    $temp_target = ($e_time-$s_time)/$part->NICT;
                                    array_push($tar_per, (int)$temp_target);
                                    $track = 1;
                                }elseif ($track == 0) {
                                    array_push($tar_per, (int)$temp_target);
                                }
                                $p['production'] = $h_total;
                                $sx = explode(":", $p['start_time']);
                                $ex = explode(":", $p['end_time']);
                                $sx = $sx[0].":".$sx[1];
                                $ex = $ex[0].":".$ex[1];
                                $p['start_time'] = $sx;
                                $p['end_time'] = $ex;
                                array_push($t, $p);
                            }
	        		}
                  
	        	}

	        	$temp = array('machine' => $m['machine_id'],'production' => $t,"targets"=>$target,"target_per" => $tar_per);
	        	array_push($machineWise, $temp);
                $t_t = array('machine_id' => $m['machine_id'], 'total' => $total);
	        	array_push($production_total, $t_t);
                $t = array('machine_id' => $m['machine_id'], 'machine_name' => $m['machine_name']);
	        	array_push($machine_name, $t);
	        }

	        
          
	        // OEE Calculation......
	        $output = $this->datas->getDataRaw($shift_date,$shift_id);
	        // Data from PDM Events table for find the All Time Duration...........
            $getAllTimeValues = $this->datas->getDataRawAll($shift_date,$shift_id);

            $getOfflineId = $this->datas->getOfflineEventId($shift_date,$shift_id);

            // Get the Machine Record.............
            $machine = $this->datas->getMachineRecActive($shift_date,$shift_id);

            $part = $this->datas->getPartRec($shift_date,$shift_id);

            $tool_list = $this->datas->getToolRec($shift_date,$shift_id);

            //Production Data for PDM_Production_Info Table......
            $production = $this->datas->getProductionRec($shift_date,$shift_id);

            $production_t = $this->datas->getProductionData();

            // Get the Inactive(Current) Data.............
            $getInactiveMachine = $this->datas->getInactiveMachineData();
            $machineWiseProduction=[];
            // echo "<pre>";
            // print_r($production_t);
            // echo "</pre>";
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
                        if ($tm==0) {
                            $production_t_tmp= (int)$production_t_tmp + (int)$p['production']  + (int)($p['corrections']);
                        }
                    }
                }
                $t_m =  array('machine_id' => $v->machine_id, 'total_part_produced' => $production_t_tmp);
                array_push($machineWiseProduction, $t_m);
            }

            // Find the Shift Production Target......
            $shift_data = json_decode($this->getLive());

            $ts_date_t = date("Y-m-d H:i:s",strtotime($shift_data[0]->shift_date." ".$shift_data[0]->start_time));
            $te_date_t=$ts_date_t;
            $shift_process_completion = [];
            foreach ($production_target_all as $key => $mv) {
                if ($shift_data[0]->shift_date == $mv->shift_date) {
                    $xt = strtotime($mv->shift_date." ".$mv->event_start_time);
                    if ($ts_date_t < $xt) {
                        $ts_date_t = date("Y-m-d H:i:s",strtotime($mv->shift_date." ".$mv->event_start_time));
                    }
                }

                $te_date_t=$ts_date_t;

                while (true) {
                    if (date("H:i:s",strtotime($te_date_t)) == date("H:i:s",strtotime($shift_data[0]->shift_date." ".$shift_data[0]->end_time))) {
                        break;
                    }else{
                        $te_date_t = date("Y-m-d H:i:s",strtotime($te_date_t.'+1 seconds'));               
                    }
                }

                // Find Part

                $time_duration = strtotime($te_date_t) - strtotime($ts_date_t);
                $target_production_shift =0;
                $production_shift =0;
                foreach ($production_target_all as $key => $p) {
                    if ($p->machine_id == $mv->machine_id) {
                        $x_t = explode(".", $p->NICT);

                        $nict =1; //By Default
                        if (sizeof($x_t)>1) {
                            $nict = $x_t[0] + ($x_t[1]/1000); 
                        }else{
                            $nict = $x_t[0];
                        }
                        if($nict>0) {
                            $target_production_shift = ($time_duration/$nict)*$p->part_produced_cycle;
                        }else{
                            $target_production_shift = 0*$p->part_produced_cycle;
                        }
                    }

                    foreach ($hourly_production as $key => $value) {
                        if ($value['machine_id'] == $mv->machine_id and $value['part_id'] == $p->part_id)
                        {   
                            $production_shift= $production_shift + (int) $value['production'];
                        }
                    }
                }

                $t_m_a = array('machine_id' => $mv->machine_id,'shift_production_target' => (int)$target_production_shift,'shift_production' => $production_shift);
                array_push($shift_process_completion, $t_m_a);
            }
            

            // Machine wise Current part........
            // $current_part  =  $this->datas->getCurrentPart();

	        // Date Filte for PDM Reason Mapping Data........
            $len_id = sizeof($getOfflineId);
            foreach ($output as $key => $value) {
                $check_no = 0;
                for($i=0;$i<$len_id;$i++){
                    if ($getOfflineId[$i]['machine_event_id'] == $value['machine_event_id']) {
                        unset($output[$key]);
                        $check_no = 1;
                        break;
                    }
                }
                if($check_no == 0){
                    if ($value['split_duration']<0) {
                        unset($output[$key]);
                    }
                    else{
                        //For remove the current data of inactive machines.........
                        foreach ($getInactiveMachine as $v) {
                            $t = explode(" ", $v['max(r.last_updated_on)']);

                            if ($value['shift_date'] >= $t[0]  && $value['start_time'] > $t[1] && $value['machine_id'] == $v['machine_id']){
                                unset($output[$key]);
                            }
                        }
                    }
                }
            }

            // Filter for Find the All Time.............
            foreach ($getAllTimeValues as $key => $value) {
                if ($value['duration']<0) {
                    unset($getAllTimeValues[$key]);
                }
                else{
                    //For remove the current data of inactive machines.........
                    foreach ($getInactiveMachine as $v) {
                        $t = explode(" ", $v['max(r.last_updated_on)']);

                        if ($value['shift_date'] >= $t[0]  && $value['start_time'] > $t[1] && $value['machine_id'] == $v['machine_id']){
                            unset($getAllTimeValues[$key]);
                        }
                    }
                }
            }   

            // Filter for Production Info Table Data..........
            foreach ($production as $key => $value) {   
                //For remove the current data of inactive machines.........
                foreach ($getInactiveMachine as $v) {
                    $t = explode(" ", $v['max(r.last_updated_on)']);
                    if ($value['shift_date'] == $t[0]  && $value['start_time'] > $t[1] && $value['machine_id'] == $v['machine_id'] OR $value['shift_date'] > $t[0] && $value['machine_id'] == $v['machine_id']){
                        unset($production[$key]);
                    }
                }
            }

            //Downtime reasons data ordering.....
            $MachineWiseDataRaw = $this->storeData($output,$machine,$part);

            // Machine-Wise Downtime........
            $allTimeValues = $this->allTimeFound($getAllTimeValues,$machine,$part);

            $downtime = $this->oeeData($MachineWiseDataRaw,$getAllTimeValues);

            $MachineWiseData = [];
            foreach ($downtime as $down) {
                $PlannedDownTime = $down['Planned'];
                $UnplannedDownTime = $down['Unplanned'];
                $MachineOFFDownTime = $down['Machine_OFF'];
                $All = 0;
                foreach ($allTimeValues as $a) {
                    if ($a['machine_id']==$down['Machine_ID']) {
                        $All = floatval($a['duration']);
                    }
                }
                if ($All >0) {
                    $TotalCTPP_NICT = 0;
                    $TotalCTPP = 0;
                    $TotalReject = 0;
                    $TotalCTPP_NICT_Arry = [];
                    foreach ($part as $p) {
                        $tmpCorrectedTPP_NICT = 0;
                        $tmpCorrectedTPP = 0;
                        $tmpReject = 0;
                        foreach ($production as $product) {
                            if ($product['machine_id'] == $down['Machine_ID'] && $p['part_id'] == $product['part_id']) {
                                //To find NICT.....
                                $NICT = 0;

                                foreach ($partsDetails as $partVal) {
                                    if ($p['part_id'] == $partVal->part_id) {
                                        $mnict = explode(".", $partVal->NICT);
                                        if (sizeof($mnict)>1) {
                                            $NICT = (($mnict[0])+($mnict[1]/1000))/60;
                                        }else{
                                            $NICT = ($mnict[0]/60);
                                        }
                                    }
                                }

                                $corrected_tpp = (int)$product['production']+(int)($product['corrections']);
                                $CorrectedTPP_NICT = $NICT*$corrected_tpp;
                                // For Find Performance.....
                                $tmpCorrectedTPP_NICT = $tmpCorrectedTPP_NICT+$CorrectedTPP_NICT;

                                //For Find Quality.......
                                $tmpCorrectedTPP = $tmpCorrectedTPP+$corrected_tpp;
                                $reject_r = explode('&&', $product['reject_reason']);
                                $reject_temp = 0;

                                foreach ($reject_r as $rp) {
                                    $tx = explode('&', $rp);
                                    if (sizeof($tx) > 1) {
                                        $reject_temp = $reject_temp + $tx[0];
                                    }
                                }
                                $tmpReject = $tmpReject+$reject_temp;
                             }
                        }

                        $TotalCTPP_NICT =$TotalCTPP_NICT+$tmpCorrectedTPP_NICT;
                        $TotalCTPP =$TotalCTPP+$tmpCorrectedTPP;
                        $TotalReject = $TotalReject+$tmpReject;
                    }

                    //Machine Wise Performance ......
                    $tp=floatval($All)-(floatval($down['Planned'])+floatval($down['Unplanned'])+floatval($down['Machine_OFF']));
                    $performance=0;

                    if (floatval($tp)>0) {
                        $performance = floatval($TotalCTPP_NICT)/floatval($tp);
                    }
                    else{
                        $performance=0;
                    }
                    
                    //Machine Wise Quality ......
                    if ($TotalCTPP <=0) {
                        $quality = 0;
                    }
                    else{
                        $quality = floatval(((floatval($TotalCTPP) - floatval($TotalReject))/floatval($TotalCTPP)));
                    }

                    //Machine Wise Availability ......
                    if (floatval($All-(floatval($down['Planned'])+floatval($down['Machine_OFF']))) >0) {
                        $availability = floatval($All-(floatval($down['Planned'])+floatval($down['Unplanned'])+floatval($down['Machine_OFF'])))/($All-(floatval($down['Planned'])+floatval($down['Machine_OFF'])));
                    }
                    else{
                        $availability=0;
                    }

                    // Machine Wise Availability TEEP.......
                    if (floatval($All) >0) {
                        $availTEEP = (($All-($down['Planned']+$down['Unplanned']+$down['Machine_OFF']))/($All));
                    }else{
                        $availTEEP=0;
                    }
                    // Machine Wise Availability OOE.....
                    if (floatval($All-$down['Machine_OFF'])>0) {
                        $availOOE = (($All-($down['Planned']+$down['Unplanned']+$down['Machine_OFF']))/($All-$down['Machine_OFF']));
                    }
                    else{
                        $availOOE=0;
                    }
                    //Machine Wise OEE .......
                    $oee = number_format(($performance*$quality*$availability),2);

                    // Machine Wise TEEP.....
                    $teep = number_format(($performance*$quality*$availTEEP),2);
                    // Machine Wise OOE.....
                    $ooe = number_format(($performance*$quality*$availOOE),2);

                    //Store Machine wise Data......
                    $tmp = array("Machine_Id"=>$down['Machine_ID'],"Availability"=>$availability*100,"Performance"=>$performance*100,"Quality"=>$quality*100,"Availability_TEEP"=>$availTEEP*100,"Availability_OOE"=>$availOOE*100,"OEE"=>$oee*100,"TEEP"=>$teep*100);
                    array_push($MachineWiseData, $tmp);
                }
                else{
                    //Store Machine wise Data......
                    $tmp = array("Machine_Id"=>$down['Machine_ID'],"Availability"=>0,"Performance"=>0,"Quality"=>0,"Availability_TEEP"=>0,"Availability_OOE"=>0,"OEE"=>0,"TEEP"=>0);
                    array_push($MachineWiseData, $tmp);
                }
            }


            // Machine Wise Event....
            $machine_event = $this->datas->machine_events($shift_date,$shift_id);

            $temp_ar = array('machine_id' => "","shift_date" => "", "start_time" => "","end_time" => "","shift_id" => "", "production" => 0,"part_id" => 0,"part_name" =>"", "rejections"=>0);
            $len_data = sizeof($shiftList);
            $len_ref = sizeof($machineWise[0]['production']);
            $diff = $len_data - $len_ref;

            foreach ($machineWise as $key => $value) {
            	for ($i=0; $i < $diff; $i++) { 
            		array_push($machineWise[$key]['production'],$temp_ar);
            		array_push($machineWise[$key]['targets'],end($machineWise[$key]['targets']));
            	}
            }

            $partList = $this->datas->part_list();

            $out['production_target'] = $production_target_all;
            $out['target_production'] = $machineWiseProduction;
            $out['shift_production_target'] = $shift_process_completion;
	       	$out['hours'] = $shiftList;
	       	$out['data'] = $machineWise;
	       	$out['targets'] = $oee_target;
	       	$out['production_total'] = $production_total;
	       	$out['machine_name'] = $machine_name;
	       	$out['oee'] = $MachineWiseData;
	       	$out['latest_event'] = $machine_event;
            $out['part_list'] = $partList;

            // $end_time_logger_getlive_mode = microtime(true);
            // $execution_time_logger_gerlive_mode = ($end_time_logger_getlive_mode - $start_time_logger_getlive_mode);
            // log_message("info","current shift peformance getlive mode graph execution duration is :\t".$execution_time_logger_gerlive_mode);

            return json_encode($out);
            // echo "<pre>";
            // print_r($out);
            // echo "</pre>";
	       	
    	}
    }

    public function sortbyoee($out){
        $n= sizeof($out['oee']);
        for ($i = 0; $i < $n-1; $i++)
        {
            // Find the minimum element in unsorted array
            $min_idx = $i;
            for ($j = $i+1; $j < $n; $j++){
                if ($out['oee'][$j]['OEE'] < $out['oee'][$min_idx]['OEE']){
                    $min_idx = $j;
                }
            }

            $temp = $out['oee'][$i];
            $out['oee'][$i] = $out['oee'][$min_idx];
            $out['oee'][$min_idx] = $temp;

            $temp1 = $out['machine_name'][$i];
            $out['machine_name'][$i] = $out['machine_name'][$min_idx];
            $out['machine_name'][$min_idx] = $temp1;

            $temp2 = $out['latest_event'][$i];
            $out['latest_event'][$i] = $out['latest_event'][$min_idx];
            $out['latest_event'][$min_idx] = $temp2;


            $temp3 = $out['production_total'][$i];
            $out['production_total'][$i] = $out['production_total'][$min_idx];
            $out['production_total'][$min_idx] = $temp3;

            $temp4 = $out['data'][$i];
            $out['data'][$i] = $out['data'][$min_idx];
            $out['data'][$min_idx] = $temp4;            
        }
        return $out;
    }

    public function sortbypartcompletion($out){
        $n= sizeof($out['oee']);
        for ($i = 0; $i < $n-1; $i++)
        {
            // Find the minimum element in unsorted array
            $min_idx = $i;
            $target = 5000;
            for ($j = $i+1; $j < $n; $j++){
                $x_c = $out['production_total'][$j]['total']*$target;
                $x_d = $out['production_total'][$min_idx]['total']*$target;
                if ($x_c > $x_d){
                    $min_idx = $j;
                }
            }

            $temp = $out['oee'][$i];
            $out['oee'][$i] = $out['oee'][$min_idx];
            $out['oee'][$min_idx] = $temp;

            $temp1 = $out['machine_name'][$i];
            $out['machine_name'][$i] = $out['machine_name'][$min_idx];
            $out['machine_name'][$min_idx] = $temp1;

            $temp2 = $out['latest_event'][$i];
            $out['latest_event'][$i] = $out['latest_event'][$min_idx];
            $out['latest_event'][$min_idx] = $temp2;


            $temp3 = $out['production_total'][$i];
            $out['production_total'][$i] = $out['production_total'][$min_idx];
            $out['production_total'][$min_idx] = $temp3;

            $temp4 = $out['data'][$i];
            $out['data'][$i] = $out['data'][$min_idx];
            $out['data'][$min_idx] = $temp4;            
        }
        return $out;
    }

    public function storeData($rawData,$machine,$part)
    { 
        $MachineWiseDataRaw = [];
        foreach ($machine as $m) {
            //Temporary variable for machine wise data split.......
            $tmpMachineWise = [];
            foreach ($part as $p) {
                //Temporary variable for part wise data split.......
                $tmpPartWise = [];
                foreach ($rawData as $r) {
                    if (($r['machine_id'] == $m['machine_id'])) {
                        $tmpPart = explode(",", $r['part_id']);
                        foreach ($tmpPart as $k) {
                            if ($k == $p['part_id']) {
                                array_push($tmpPartWise, $r);
                            }
                        }
                    }
                }
                $tmp = array($p['part_id']=> $tmpPartWise);
                array_push($tmpMachineWise, $tmp);
            }
            $tmpMachine = array($m['machine_id'] =>$tmpMachineWise);
            array_push($MachineWiseDataRaw, $tmpMachine);
        }
        return $MachineWiseDataRaw;
    }

    public function allTimeFound($output,$machine,$part){
        $alltime=[]; 
        foreach ($machine as $key => $m) {
            $duration_min =0;
            $duration_sec = 0;
            foreach ($output as $key => $value) {
                $event = trim($value['event']);
                $event = str_replace(' ', '', $event);
                $event = strtolower($event);
                if (($value['machine_id'] == $m['machine_id'] and $event!="nodata") or ($value['machine_id'] == $m['machine_id'] and $event!="offline")) {
                    $tmp = explode(".", $value['duration']);
                    if (sizeof($tmp) >1) {
                        $duration_min = floatval($duration_min) + floatval($tmp[0]);
                        $duration_sec = floatval($duration_sec) + floatval($tmp[1]);
                    }
                    else{
                        $duration_min = floatval($duration_min) + floatval($tmp[0]);
                    }
                }
            }
            $duration = $duration_min + ($duration_sec/60);
            $tmp = array('machine_id' => $m['machine_id'],'duration'=>$duration);
            array_push($alltime, $tmp);
        }
        return $alltime;
    }


    public function oeeData($MachineWiseDataRaw,$getAllTimeValues,$noplan=false)
    {
        $DowntimeTimeData =[];
        foreach ($MachineWiseDataRaw as $Machine){
            $MachineOFFDown = 0;
            $UnplannedDown = 0;
            $PlannedDown = 0;
            $MachineId = "";
            $PartWiseDowntime=[];

            $MachineOFFDownSec=0;
            $UnplannedDownSec=0;
            $PlannedDownSec=0;
            foreach ($Machine as $key => $Part) {
                $MachineId = $key;
                foreach ($Part as $Record) {
                    $PartMachineOFFDown = 0;
                    $PartUnplannedDown = 0;
                    $PartPlannedDown = 0;
                    $PartInMachine =0;

                    $PartMachineOFFDownSec = 0;
                    $PartUnplannedDownSec = 0;
                    $PartPlannedDownSec = 0;
                    $PartInMachineSec =0;
                    $part_id="";
                    foreach ($Record as $Values) {
                        $tmpMachineOFFDown = 0;
                        $tmpPlannedDown = 0;
                        $tmpUnplannedDown = 0;

                        $tmpMachineOFFDownSec = 0;
                        $tmpPlannedDownSec = 0;
                        $tmpUnplannedDownSec = 0;

                        // For Part in Machine
                        $tmpUnplannedDownPart=0;
                        $tmpUnplannedDownPartSec=0;

                        foreach ($Values as $key => $DTR) {
                            $part_id=$DTR['part_id'];
                            $st = explode(".", $DTR['split_duration']);
                            // One Tool, Multi-Part
                            $part_count = explode(",", $DTR['part_id']);
                            $st[0]=$st[0]/sizeof($part_count);
                            if (sizeof($st) > 1) {
                                $st[1]=$st[1]/sizeof($part_count);
                            }   

                            $noplan = trim($DTR['downtime_reason']);
                            $noplan = strtolower(str_replace(" ","",$noplan));
                            if ($DTR['downtime_category'] == 'Planned' && $noplan == 'noplan' && $noplan == true) {
                                if (sizeof($st) > 1) {
                                    $tmpMachineOFFDown = $tmpMachineOFFDown + $st[0];
                                    $tmpMachineOFFDownSec = $tmpMachineOFFDownSec + $st[1];
                                }
                                else{
                                    $tmpMachineOFFDown = $tmpMachineOFFDown + $st[0];   
                                }
                            }
                            else if($DTR['downtime_category'] == 'Unplanned'){
                                // $st = explode(".", $DTR['split_duration']);
                                if (sizeof($st) > 1) {
                                    $tmpUnplannedDown = $tmpUnplannedDown + $st[0];
                                    $tmpUnplannedDownSec = $tmpUnplannedDownSec +$st[1];
                                }
                                else {
                                    $tmpUnplannedDown = $tmpUnplannedDown + $st[0];
                                }
                                // echo "<br>";
                                // echo $tmpUnplannedDown;
                            }
                            else if(($DTR['downtime_category'] == 'Planned') && ($DTR['downtime_reason'] == 'Machine OFF')){
                                // $st = explode(".", $DTR['split_duration']);
                                if (sizeof($st) > 1) {
                                    $tmpMachineOFFDown = $tmpMachineOFFDown + $st[0];
                                    $tmpMachineOFFDownSec = $tmpMachineOFFDownSec + $st[1];
                                }
                                else{
                                    $tmpMachineOFFDown = $tmpMachineOFFDown + $st[0];   
                                }
                                
                            }
                            else {
                                // $st = explode(".", $DTR['split_duration']);

                                if (sizeof($st) > 1) {
                                    $tmpPlannedDown = $tmpPlannedDown + $st[0];
                                    $tmpPlannedDownSec = $tmpPlannedDownSec + $st[1];
                                }
                                else{
                                    $tmpPlannedDown = $tmpPlannedDown + $st[0];   
                                }
                                
                            }

                            if ($DTR['downtime_reason'] != 'Machine OFF' || ($DTR['downtime_category'] == 'Planned' && $noplan == 'noplan' && $noplan == true)) {
                                if (sizeof($st) > 1) {
                                    $PartInMachine = $PartInMachine + $st[0];
                                    $PartInMachineSec = $PartInMachineSec + $st[1];
                                }
                                else{
                                    $PartInMachine = $PartInMachine + $st[0];   
                                }
                            }

                            if($DTR['downtime_category'] == 'Unplanned' and $DTR['downtime_reason'] != 'Machine OFF'){
                                // $st = explode(".", $DTR['split_duration']);
                                if (sizeof($st) > 1) {
                                    $tmpUnplannedDownPart = $tmpUnplannedDownPart + $st[0];
                                    $tmpUnplannedDownPartSec = $tmpUnplannedDownPartSec +$st[1];
                                }
                                else {
                                    $tmpUnplannedDownPart = $tmpUnplannedDownPart + $st[0];
                                }
                            }
                        }
                        $PartMachineOFFDown = $PartMachineOFFDown + $tmpMachineOFFDown; 
                        // $PartUnplannedDown = $PartUnplannedDown + $tmpUnplannedDown;
                        $PartUnplannedDown = $PartUnplannedDown + $tmpUnplannedDownPart;
                        $PartPlannedDown = $PartPlannedDown + $tmpPlannedDown;

                        $PartMachineOFFDownSec = $PartMachineOFFDownSec + $tmpMachineOFFDownSec; 
                        // $PartUnplannedDownSec = $PartUnplannedDownSec + $tmpUnplannedDownSec;
                        $PartUnplannedDownSec = $PartUnplannedDownSec + $tmpUnplannedDownPartSec;
                        $PartPlannedDownSec = $PartPlannedDownSec + $tmpPlannedDownSec;
                    }
                    $MachineOFFDown = $PartMachineOFFDown + $MachineOFFDown; 
                    $UnplannedDown = $PartUnplannedDown + $UnplannedDown;
                    $PlannedDown = $PartPlannedDown + $PlannedDown;

                    $MachineOFFDownSec = $PartMachineOFFDownSec + $MachineOFFDownSec; 
                    $UnplannedDownSec = $PartUnplannedDownSec + $UnplannedDownSec;
                    $PlannedDownSec = $PartPlannedDownSec + $PlannedDownSec;

                    if ($part_id != "") {
                        $PartMachineOFFDown = floatval($PartMachineOFFDown)+floatval($PartMachineOFFDownSec/60);
                        $PartPlannedDown = floatval($PartPlannedDown)+floatval($PartPlannedDownSec/60);
                        $PartUnplannedDown = floatval($PartUnplannedDown) + floatval($PartUnplannedDownSec/60);

                        $PartInMachine = floatval($PartInMachine)+floatval($PartInMachineSec/60);

                        $tmpUpTimeMin = 0;
                        $tmpUpTimeSec = 0;
                        foreach ($getAllTimeValues as $key => $upt) {
                            if ($upt['machine_id']==$MachineId and $upt['part_id'] == $part_id and $upt['event']=="Active") {
                                $stu = explode(".", $upt['duration']);
                                $part_count = explode(",", $upt['part_id']);
                                $stu[0]=$stu[0]/sizeof($part_count);
                                if (sizeof($stu) > 1) {
                                    $stu[1]=$stu[1]/sizeof($part_count);
                                    $tmpUpTimeSec = $tmpUpTimeSec + $stu[1];
                                }
                                $tmpUpTimeMin = $tmpUpTimeMin + $stu[0];
                            }
                        }
                        $tmpPartTime = floatval($PartInMachine) +  floatval($tmpUpTimeMin) + floatval($tmpUpTimeSec/60);
                        $tmp= array('part_id' => $part_id,'Planed'=>$PartPlannedDown,'Unplanned'=>$PartUnplannedDown,'Machine_OFF'=>$PartMachineOFFDown,'PartInMachine' => $tmpPartTime);
                        array_push($PartWiseDowntime, $tmp);
                    }
                }
            }

            $MachineOFFDown = floatval($MachineOFFDown)+floatval($MachineOFFDownSec/60);
            $PlannedDown = floatval($PlannedDown)+floatval($PlannedDownSec/60);
            $UnplannedDown = floatval($UnplannedDown) + floatval($UnplannedDownSec/60);

            $tempCalc = $MachineOFFDown + $UnplannedDown + $PlannedDown;
            if ((float)$tempCalc>=0) {
               $tmpDown = array("Machine_ID"=>$MachineId,"Planned"=>$PlannedDown,"Unplanned"=>$UnplannedDown,"Machine_OFF"=>$MachineOFFDown,"All"=>$tempCalc,"Part_Wise"=>$PartWiseDowntime);
                array_push($DowntimeTimeData, $tmpDown);
            }
        }
        return $DowntimeTimeData;
    }



     // div record for current shift performance oui screen
     public function div_details(){
        if ($this->request->isAJAX()) {
            log_message("info","\n\n current shift performance oui screen div records ");
            $start_time_logger_div_record = microtime(true);


            $mid = $this->request->getVar('mid');
            $sdate = $this->request->getVar('shift_date');
            $sid = $this->request->getVar('shift_id');

            $downtime_records = $this->datas->getdowntime_records($mid,$sdate,$sid);
            $getpart_nict = $this->datas->getpart_nict($mid,$sdate,$sid);
            $rejection_record = $this->datas->getrejection_records($mid,$sdate,$sid);

            // // total downtime durations
            $total_downtime_seconds = 0;
            foreach ($downtime_records as $key => $value) {
                $tmp_duration = explode(".",$value['split_duration']);
                if ($tmp_duration[0]>0) {
                    $tmp_second = $tmp_duration[0]*60;
                    $total_downtime_seconds = $total_downtime_seconds + $tmp_second;
                    if ($tmp_duration[1]>0) {
                       $total_downtime_seconds = $total_downtime_seconds + $tmp_duration[1];

                    }else{
                        $total_downtime_seconds = $total_downtime_seconds + 0;
                    }

                }
                elseif ($tmp_duration[1]>0) {
                    $total_downtime_seconds = $total_downtime_seconds + $tmp_duration[1];
                }
                else{
                    $total_downtime_seconds = $total_downtime_seconds + 0;
                }
            }

            // total production rejection
            $total_reject_count = 0;
            foreach ($rejection_record as $key => $value) {
                if ($value['rejections']>0) {
                   $total_reject_count = $total_reject_count + $value['rejections']; 
                }
            }

            $tmp_partname_arr = [];
            foreach ($getpart_nict as $key => $value) {
                array_push($tmp_partname_arr,$value['part_name']);
            }

            // echo json_encode($total_downtime_seconds);
            $div_record['downtime'] = $total_downtime_seconds;
            $div_record['nict'] = $getpart_nict[0]['NICT'];
            $div_record['rejection_count'] = $total_reject_count;
            $div_record['part_name'] = implode(",",$tmp_partname_arr);

            // $div_record['rejection_count'] = $total_reject_count;
            // $div_record['part_name'] = implode(',',$tmp_partname_arr);
            $end_time_logger_div_record = microtime(true);
            $execution_time_logger_dive_record = ($end_time_logger_div_record - $start_time_logger_div_record);
            log_message("info","current shift peroformance execution duration is :\t".$execution_time_logger_dive_record);


            echo json_encode($div_record);
        }
    }


    
    // target graph function
    public function get_target_graph(){
        if ($this->request->isAJAX()) {
        
            log_message("info","\n\n current shift performance oui screen get target graph");
            $start_time_logger_oui_target = microtime(true);
        
            $shift_date=$this->request->getvar('sdate');
            $mid = $this->request->getvar('mid');
            $tid = $this->request->getvar('tid');
            // $shift_date="2023-05-16";
            // $mid="MC1001";
            // $tid="TL1004";
            $res_tool = $this->datas->get_target_tool_changeover($shift_date,$mid,$tid);

            // echo "<pre>";
            $final_arr = [];
            $tdate = $res_tool[0]['shift_date'];
            $sdate = $shift_date;
            $tmp_target = $res_tool[0]['target'];
            if ($tmp_target>0) {
                $tmp['target'] = $res_tool[0]['target'];
                $res_production = $this->datas->getproduction_target_count($tdate,$sdate,$mid,$tid);
                $tmp['percentage_target'] = $res_production[0]['target_production']/$res_tool[0]['target']*100;
                $tmp['production'] = $res_production[0]['target_production'];
                array_push($final_arr,$tmp);
            }else{
                $tmp['target'] = 0;
                $tmp['percentage_target'] = 0;
                $res_production = $this->datas->getproduction_target_count($tdate,$sdate,$mid,$tid);
                $tmp['production'] = $res_production[0]['target_production'];
                array_push($final_arr,$tmp);
            }
            // print_r($final_arr);
            $end_time_logger_oui_target = microtime(true);
            $execution_time_logger_oui_target = ($end_time_logger_oui_target - $start_time_logger_oui_target);
            log_message("info","current shift performance oui screen target graph execution duration is :\t".$execution_time_logger_oui_target);

            
            echo json_encode($final_arr);
            // $final_ar['target_production'] = $res_production;
            // $final_ar['target'] = $res_tool;
            // echo "<pre>";
            // print_r($final_ar);

        }
    }
    // // full screen mode records
    // public function full_screen_records(){
    //     if ($this->request->isAJAX()) {
    //         // echo json_encode("hi");
    //     }
    // }

    
}



?>