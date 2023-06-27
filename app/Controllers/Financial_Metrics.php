<?php 
namespace App\Controllers;
use App\Models\MainModel;
use App\Models\Financial_Model;

class Financial_Metrics extends BaseController
{   
    function __construct(){
        //parent::__construct();
        $this->session = \Config\Services::session();
        //$this->session->remove('user_name');
        $this->data = array();
        $this->Financial = new Financial_Model();
    } 
    
    public function getOverallTarget(){
        log_message("info","\n\n financial oee drill down  metrics overall function calling !!");
        $start_time_logger_overall = microtime(true);

        $Targets =  $this->Financial->getGoalsFinancialData();

        $end_time_logger_overall = microtime(true);
        $execution_time_logger_overall = ($start_time_logger_overall - $end_time_logger_overall);
        log_message("info","\n\n financial oee drill down metrics overall function duration is:\t".$execution_time_logger_overall);


        return json_encode($Targets);
    }

    public function OverallOEETarget(){
        log_message("info","\n\n financial oee drill down  metrics overalltarget function calling !!");
        $start_time_logger_overall_target = microtime(true);

        $ref="Overall";
        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        // $fromTime = "2023-05-16T09:00:00";
        // $toTime = "2023-05-16T21:00:00";

        // $url = "http://localhost:8080/graph/overallMonitoringValues/".$fromTime."/".$toTime."/";
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // $result = curl_exec($ch);
        // $res = json_decode($result);

        // $start_time = microtime(true);
        $Overall = $this->getDataRaw($ref,$fromTime,$toTime);
        // $end_time = microtime(true);
        // $execution_time = ($end_time - $start_time);
        // echo " Execution time of script = ".$execution_time." sec";
        $end_time_logger_overall_target = microtime(true);
        $execution_time_logger_overall_target = ($end_time_logger_overall_target - $start_time_logger_overall_target);
        log_message("info","current shift performance overall target function duration is :\t".$execution_time_logger_overall_target);


        echo json_encode($Overall);
    }

    public function getDataRaw($graphRef,$fromTime=null,$toTime=null){
            // Calculation for to find ALL time value
            $tmpFromDate =explode("T", $fromTime);
            $tmpToDate = explode("T", $toTime);

            //Difference between two dates......
            $diff = abs(strtotime($toTime) - strtotime($fromTime)); 
            $AllTime = 0;   

            //time split for date+time seperated values
            $tmpFrom = explode("T",$fromTime);
            $tmpTo = explode("T",$toTime);
            // temporary time......
            $tempFrom = explode(":",$tmpFrom[1]);
            $tempTo = explode(":",$tmpTo[1]);

            //From date
            $FromDate = $tmpFrom[0];
            //milli seconds added ":00", because in real data milli seconds added
            $FromTime = $tempFrom[0].":00".":00";
            //To Date
            $ToDate = $tmpTo[0];
            $ToTime = $tempTo[0].":00".":00";

            // // Data from reason mapping table...........
            $output = $this->Financial->getDataRaw($FromDate,$FromTime,$ToDate,$ToTime);
        
            // Data from PDM Events table for find the All Time Duration...........
            $getAllTimeValues = $this->Financial->getDataRawAll($FromDate,$ToDate);

            $getOfflineId = $this->Financial->getOfflineEventId($FromDate,$FromTime,$ToDate,$ToTime);

            // Get the Machine Record.............
            $machine = $this->Financial->getMachineRecActive($FromDate,$ToDate);

            //Part list Details from Production Info Table between the given from and To durations......
            $part = $this->Financial->getPartRec($FromDate,$ToDate);

            //Production Data for PDM_Production_Info Table......
            $production = $this->Financial->getProductionRec($FromDate,$ToDate);

            // Get the Inactive(Current) Data.............
            $getInactiveMachine = $this->Financial->getInactiveMachineData();

            // Date Filte for PDM Reason Mapping Data........
            $len_id = sizeof($getOfflineId);
            $s_time_range_limit =  strtotime($FromDate." ".$FromTime);
            $e_time_range_limit =  strtotime($ToDate." ".$ToTime);

            // foreach ($getOfflineId as $key => $v) {
            //     if ($v['machine_id'] == "MC1001") {
            //         echo "<pre>";
            //         print_r($v);
            //     }
            // }

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
                        $s_time_range =  strtotime($value['shift_date']." ".$value['start_time']);
                        $e_time_range =  strtotime($value['shift_date']." ".$value['end_time']);

                        if ($s_time_range <= $s_time_range_limit && $e_time_range >= $s_time_range_limit) {
                            $output[$key]['start_time'] = $FromTime;
                            if ($e_time_range >= $e_time_range_limit) {
                                $output[$key]['end_time'] = $ToTime;
                            }
                            $output[$key]['split_duration'] = $this->getDuration($value['calendar_date']." ".$output[$key]['start_time'],$value['calendar_date']." ".$output[$key]['end_time']);
                        }
                        else if ($s_time_range < $e_time_range_limit && $e_time_range > $e_time_range_limit) {
                            $output[$key]['end_time'] = $ToTime;
                            $output[$key]['split_duration'] = $this->getDuration($value['calendar_date']." ".$output[$key]['start_time'],$value['calendar_date']." ".$output[$key]['end_time']);
                        }
                        else{
                            if ($e_time_range <= $s_time_range_limit){
                                unset($output[$key]);
                            }
                            if ($s_time_range >= $e_time_range_limit){
                                unset($output[$key]);
                            }
                        }

                        //For remove the current data of inactive machines.........
                        foreach ($getInactiveMachine as $v) {
                            $t = explode(" ", $v['max(r.last_updated_on)']);
                            $start_time_range =  strtotime($v['max(r.last_updated_on)']);
                            if ($s_time_range_limit > $start_time_range && $value['machine_id'] == $v['machine_id']){
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
                    $s_time_range =  strtotime($value['shift_date']." ".$value['start_time']);
                    $e_time_range =  strtotime($value['shift_date']." ".$value['end_time']);

                    if ($s_time_range <= $s_time_range_limit && $e_time_range >= $s_time_range_limit) {
                        $getAllTimeValues[$key]['start_time'] = $FromTime;
                        if ($e_time_range >= $e_time_range_limit) {
                            $getAllTimeValues[$key]['end_time'] = $ToTime;
                        }
                        $getAllTimeValues[$key]['duration'] = $this->getDuration($value['calendar_date']." ".$getAllTimeValues[$key]['start_time'],$value['calendar_date']." ".$getAllTimeValues[$key]['end_time']);
                    }
                    else if ($s_time_range < $e_time_range_limit && $e_time_range > $e_time_range_limit) {
                        $getAllTimeValues[$key]['end_time'] = $ToTime;
                        $getAllTimeValues[$key]['duration'] = $this->getDuration($value['calendar_date']." ".$getAllTimeValues[$key]['start_time'],$value['calendar_date']." ".$getAllTimeValues[$key]['end_time']);
                    }
                    else{
                        if ($e_time_range <= $s_time_range_limit){
                            unset($getAllTimeValues[$key]);
                        }
                        if ($s_time_range >= $e_time_range_limit){
                            unset($getAllTimeValues[$key]);
                        }
                    }

                    //For remove the current data of inactive machines.........
                    foreach ($getInactiveMachine as $v) {
                        $start_time_range =  strtotime($v['max(r.last_updated_on)']);
                        if ($s_time_range_limit > $start_time_range && $value['machine_id'] == $v['machine_id']){
                            unset($getAllTimeValues[$key]);
                        }
                    }
                }
            }   

            // Filter for Production Info Table Data..........
            foreach ($production as $key => $value) {   
                $s_time_range =  strtotime($value['shift_date']." ".$value['start_time']);
                $e_time_range =  strtotime($value['shift_date']." ".$value['end_time']);
                
                if ($s_time_range < $s_time_range_limit) {
                    unset($production[$key]);
                }
                if ($e_time_range >= $e_time_range_limit){
                    unset($production[$key]);
                }

                //For remove the current data of inactive machines.........
                foreach ($getInactiveMachine as $v) {
                    $start_time_range =  strtotime($v['max(r.last_updated_on)']);
                    if ($s_time_range_limit > $start_time_range && $value['machine_id'] == $v['machine_id']){
                        unset($production[$key]);
                    }
                }
            }

            // foreach ($output as $v) {
            //     echo "<pre>";
            //     print_r($v);
            // }

            //Downtime reasons data ordering.....
            $MachineWiseDataRaw = $this->storeData($output,$machine,$part);

            // Machine-Wise Downtime........
            $allTimeValues = $this->allTimeFound($getAllTimeValues,$machine,$part,$FromDate,$ToDate);

            // Day-wise With Machine-Wise Downtime....
            $allTimeValuesDay = $this->allTimeFoundDay($getAllTimeValues,$machine,$part,$FromDate,$ToDate);

            //Function return for qualityOpportunity graph........
            if ($graphRef == "qualityOpportunity") {
                return $production;
            } 

            if ($graphRef  == "AvailabilityReasonWise") {
                return $output;
            }

            if($graphRef == "OpportunityTrendDay"){         
                $res['raw'] = $MachineWiseDataRaw;
                $res['machine'] = $machine;
                $res['part'] = $part;
                $res['downtimeTime']=$allTimeValuesDay;
                return $res;
            }
            
            //Part Details.....
            $partsDetails = $this->Financial->settings_tools(); 
            
            //Downtime data has been calculated......
            // To find Planned Downtime, Unplanned Downtime, Machine OFF Downtime.........

            if ($graphRef == "PLOpportunity") {
                $downtime = $this->oeeData($MachineWiseDataRaw,$getAllTimeValues,true);
            }else{
                $downtime = $this->oeeData($MachineWiseDataRaw,$getAllTimeValues);
            }

            if ($graphRef == "PartPLOpportunity") {
                $res['production'] = $production;
                $res['downtime'] = $downtime;
                return $res;
            }
            
            //Function return for performanceOpportunity graph........
            if ($graphRef == "PerformanceOpportunity") {
                $res['production'] = $production;
                $res['downtime'] = $downtime;
                $res['machineData'] = $MachineWiseDataRaw;
                $res['all']=$allTimeValues;
                return $res;
            }

            //Function return for Profit and Loss Opportunity..........
            if ($graphRef == "PLOpportunity") {
                return $downtime;
            }

            //Machine wise Performance,Quality,Availability........

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
                                            $NICT = (($mnict[0]/60)+($mnict[1]/1000));
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
                                $tmpReject = $tmpReject+$product['rejections'];
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
                    $tmp = array("Machine_Id"=>$down['Machine_ID'],"Availability"=>$availability*100,"Performance"=>$performance*100,"Quality"=>$quality*100,"Availability_TEEP"=>$availTEEP*100,"Availability_OOE"=>$availOOE*100,"OEE"=>$oee*100,"TEEP"=>$teep*100,"OOE"=>$ooe*100);
                    array_push($MachineWiseData, $tmp);
                }
            }

            if ($graphRef == "MachinewiseOEE") {
                return $MachineWiseData;
            }
            if ($graphRef == "ReasonwiseMachine") {
                return $downtime;
            }

            $Overall = $this->calculateOverallOEE($MachineWiseData);
            
            if ($graphRef == "Overall") {
                return $Overall;
            }
    }

    public function getDuration($f,$t){
        $from_time = strtotime($f); 
        $to_time = strtotime($t); 
        $diff_minutes = (int)(abs($from_time - $to_time) / 60);
        $diff_sec = abs($from_time - $to_time) % 60;
        $duration = $diff_minutes.".".$diff_sec;
        return $duration;
    }

    public function allTimeFound($output,$machine,$part,$start_date,$end_date){
        // $days=[];
        // while (strtotime($start_date) <= strtotime($end_date)) {
        //     array_push($days,$start_date);
        //     $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
        // }
    
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


    public function allTimeFoundDay($output,$machine,$part,$start_date,$end_date){
        $days=[];
        while (strtotime($start_date) <= strtotime($end_date)) {
            array_push($days,$start_date);
            $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
        }
        
        $dayWise=[];
        foreach ($days as $key => $d) {
            $alltime=[];
            foreach ($machine as $key => $m) {
                $duration_min =0;
                $duration_sec = 0;
                foreach ($output as $key => $value) {
                    $event = trim($value['event']);
                    $event = str_replace(' ', '', $event);
                    $event = strtolower($event);
                    if (($value['machine_id'] == $m['machine_id'] and $value['shift_date']==$d and $event!="nodata") or ($value['machine_id'] == $m['machine_id'] and $value['shift_date']==$d and $event!="offline")) {
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
                $duration = $duration_min + ($duration_sec / 60);
                $tmp = array('machine_id' => $m['machine_id'],'duration'=>$duration);
                array_push($alltime, $tmp);
            }
            $t= array('date' => $d, 'data' => $alltime);
            array_push($dayWise, $t);
        }
        return $dayWise;
    }

    public function calculateOverallOEE($MachineWiseData)
    {
        //temporary variable for Overall OEE,OOE,TEEP.....
        $tmpOEE=0;
        $tmpOOE =0;
        $tmpTEEP=0;

        foreach ($MachineWiseData as $value) {
            $tmpOEE = $tmpOEE + floatval($value['OEE']);
            $tmpOOE = $tmpOOE+floatval($value['OOE']);
            $tmpTEEP = $tmpTEEP+floatval($value['TEEP']);
        }

        //Average of the OEE to calculate Overall OEE....
        $OverallOEE['Overall_OEE'] = number_format((($tmpOEE/(sizeof($MachineWiseData)))),2);
        $OverallOEE['Overall_OOE'] = number_format((($tmpOOE/(sizeof($MachineWiseData)))),2);
        $OverallOEE['Overall_TEEP'] = number_format((($tmpTEEP/(sizeof($MachineWiseData)))),2);

        return $OverallOEE;
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

    public function getMachineWiseOEE(){

        log_message("info","\n\n financial foee drill down machine wise oee");
        $start_time_logger_machine_oee = microtime(true);


        $ref = "MachinewiseOEE";

        // $fromTime = "2022-12-18T09:00:00";
        // $toTime = "2022-12-18T21:00:00";
        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");

        // $url = "http://localhost:8080/graph/machineWiseMonitoring/".$fromTime."/".$toTime."/";
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // $result = curl_exec($ch);
        // $res = json_decode($result);
        // echo json_encode($res);

        //Machine Wise Calculated Data...........
        $MachinewiseData = $this->getDataRaw($ref,$fromTime,$toTime);

        // Machine Name and ID Reference............
        $MachineName = $this->Financial->getMachineRecGraph();

        // Machine Id Conversion as per the Machine data.......
        // Need Not to change.........
        // $MachineName = $this->convertMachineId($MachineName);
        // General Settings Targets......
        $Targets =  $this->Financial->getGoalsFinancialData();

        $Availability= [];
        $Quality =[];
        $Performance =[];
        $MachineNameRef =[];
        $OEE=[];
        $AvailabilityTarget= [];
        $QualityTarget= [];
        $PerformanceTarget =[];
        $OEETarget=[];

        foreach ($MachinewiseData as $value) {
            foreach ($MachineName as $name) {
                if ($name['machine_id'] == $value['Machine_Id']) {
                    array_push($MachineNameRef, $name['machine_name']);
                    array_push($Availability, ($value['Availability']));
                    array_push($Quality, ($value['Quality']));
                    array_push($Performance, ($value['Performance']));
                    array_push($OEE, ($value['OEE']));

                    array_push($AvailabilityTarget, $Targets[0]['availability']);
                    array_push($QualityTarget, $Targets[0]['quality']);
                    array_push($PerformanceTarget, $Targets[0]['performance']);
                    array_push($OEETarget, $Targets[0]['oee_target']);
                }
            }
        }

        $graphData['Availability'] = $Availability;
        $graphData['Quality'] = $Quality;
        $graphData['Performance'] = $Performance;
        $graphData['OEE'] = $OEE;
        $graphData['MachineName'] = $MachineNameRef;
        $graphData['AvailabilityTarget'] = $AvailabilityTarget;
        $graphData['QualityTarget'] = $QualityTarget;
        $graphData['PerformanceTarget'] = $PerformanceTarget;
        $graphData['OEETarget'] = $OEETarget;

        $out = $this->selectionSortOEE($graphData,sizeof($graphData['OEE']));

        $end_time_logger_machine_oee = microtime(true);
        $execution_time_logger_machine_oee = ($end_time_logger_machine_oee - $start_time_logger_machine_oee);
        log_message("info","financial oee drill down machine wise oee function duration is :\t".$execution_time_logger_machine_oee);


        echo json_encode($out);
    }

    public function selectionSortOEE($arr, $n)
    {
      
        // One by one move boundary of unsorted subarray
        for ($i = 0; $i < $n-1; $i++)
        {
            // Find the minimum element in unsorted array
            $min_idx = $i;
            for ($j = $i+1; $j < $n; $j++){
                if ($arr['OEE'][$j] < $arr['OEE'][$min_idx]){
                    $min_idx = $j;
                }
            }

            $temp = $arr['OEE'][$i];
            $arr['OEE'][$i] = $arr['OEE'][$min_idx];
            $arr['OEE'][$min_idx] = $temp;


            $temp1 = $arr['MachineName'][$i];
            $arr['MachineName'][$i] = $arr['MachineName'][$min_idx];
            $arr['MachineName'][$min_idx] = $temp1;

            //Availability
            $temp1 = $arr['Availability'][$i];
            $arr['Availability'][$i] = $arr['Availability'][$min_idx];
            $arr['Availability'][$min_idx] = $temp1;
            //Performance
            $temp1 = $arr['Quality'][$i];
            $arr['Quality'][$i] = $arr['Quality'][$min_idx];
            $arr['Quality'][$min_idx] = $temp1;
            //Quality
            $temp1 = $arr['Performance'][$i];
            $arr['Performance'][$i] = $arr['Performance'][$min_idx];
            $arr['Performance'][$min_idx] = $temp1;
            
        }

        // $z=sizeof($arr['OEE'])+1;
        // array_splice($arr['Performance'], 0, 0, (int)$arr['PerformanceTarget'][0]);
        // array_splice($arr['Performance'], $z, 0, (int)$arr['PerformanceTarget'][0]);
        // array_splice($arr['Availability'], 0, 0, (int)$arr['AvailabilityTarget'][0]);
        // array_splice($arr['Availability'], $z, 0, (int)$arr['AvailabilityTarget'][0]);
        // array_splice($arr['Quality'], 0, 0, (int)$arr['QualityTarget'][0]);
        // array_splice($arr['Quality'], $z, 0, (int)$arr['QualityTarget'][0]);
        // array_splice($arr['MachineName'], 0, 0, "");
        // array_splice($arr['MachineName'], $z, 0, "");
        // array_splice($arr['PerformanceTarget'], 0, 0, (int)$arr['PerformanceTarget'][0]);
        // array_splice($arr['PerformanceTarget'], $z, 0, (int)$arr['PerformanceTarget'][0]);
        // array_splice($arr['AvailabilityTarget'], 0, 0, (int)$arr['AvailabilityTarget'][0]);
        // array_splice($arr['AvailabilityTarget'], $z, 0, (int)$arr['AvailabilityTarget'][0]);
        // array_splice($arr['QualityTarget'], 0, 0, (int)$arr['QualityTarget'][0]);
        // array_splice($arr['QualityTarget'], $z, 0, (int)$arr['QualityTarget'][0]);
        // array_splice($arr['OEETarget'], 0, 0, (int)$arr['OEETarget'][0]);
        // array_splice($arr['OEETarget'], $z, 0, (int)$arr['OEETarget'][0]);
        // array_splice($arr['OEE'], 0, 0, 0);
        // array_splice($arr['OEE'], $z, 0, 0);
        return $arr;
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
            if ((int)$tempCalc>0) {
               $tmpDown = array("Machine_ID"=>$MachineId,"Planned"=>$PlannedDown,"Unplanned"=>$UnplannedDown,"Machine_OFF"=>$MachineOFFDown,"All"=>$tempCalc,"Part_Wise"=>$PartWiseDowntime);
                array_push($DowntimeTimeData, $tmpDown);
            }
        }
        return $DowntimeTimeData;
    }

    public function convertMachineId($machine){
        foreach ($machine as $key => $value) {
            $tmp = explode("C", $value['machine_id']);
            $machine[$key]['machine_id'] = ($tmp[1]-1000);
        }
        return $machine;
    }

    public function getAvailabilityReasonWise(){
        log_message("info","\n\n financial oee drill down availability reason wise function calling !!");
        $start_time_logger_availability = microtime(true);


        $ref = "AvailabilityReasonWise";

        // $fromTime = "2022-12-18T09:00:00";
        // $toTime = "2022-12-18T21:00:00";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");

        // $url = "http://localhost:8080/graph/availabilityOpportunity/".$fromTime."/".$toTime."/";
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // $result = curl_exec($ch);
        // $res = json_decode($result);
        // echo json_encode($res);

        // // Calculation for to find ALL time value
            $tmpFromDate =explode("T", $fromTime);
            $tmpToDate = explode("T", $toTime);


            //Raw data from Reason mapping Table...........
            $rawData = $this->getDataRaw($ref,$fromTime,$toTime);

            //Difference between two dates......
            $diff = abs(strtotime($toTime) - strtotime($fromTime));
            $AllTime = (int)($diff/60);

            //time split for date+time seperated values
            $tmpFrom = explode("T",$fromTime);
            $tmpTo = explode("T",$toTime);
            // temporary time......
            $tempFrom = explode(":",$tmpFrom[1]);
            $tempTo = explode(":",$tmpTo[1]);
            //From date
            $FromDate = $tmpFrom[0];
            //milli seconds added ":00", because in real data milli seconds added
            $FromTime = $tempFrom[0].":00".":00";
            //Exact value
            //$FromTime = $tmpFrom[1];
            //To Date
            $ToDate = $tmpTo[0];
            //milli seconds added ":00"
            $ToTime = $tempTo[0].":00".":00";

        //Machine Wise Calculated Data...........
            //$MachinewiseData = $this->getDataRaw($ref);
        // Machine Name and ID Reference............
        $MachineName = $this->Financial->getMachineRecGraph();
        // Need not change, because machine id updated........
        // Machine Id Conversion as per the Machine data.......
        // $MachineName = $this->convertMachineId($MachineName);
        // Downtime Reason.......
        $DowntimeReason = $this->Financial->downtimeReason();
        // Machine Data.........
        // $ReasonwiseData = $this->Financial->ReasonwiseData($FromDate,$ToDate);

        //Reason wise Availability for Logical Perspective..........
        $ReasonwiseAvailability =[];
        $AvailabilityTotal = [];
        
        $GrandTotal = 0;
        $finalArray=[];

        foreach ($MachineName as $key => $machine) {
            $ar=[];
            foreach ($DowntimeReason as $reason) {
                $i=0;
                $reasonValue=0;
                $total=0;
                $split_duration=0;
                foreach ($rawData as $key => $data) {
                    if ($machine['machine_id'] == $data['machine_id'] AND $reason['downtime_reason_id'] == $data['downtime_reason_id']) {

                        //Machine OFF reason
                        if ($reason['downtime_category']=="Planned" AND $reason['downtime_reason']=="Machine OFF") {
                            $st = explode(".", $data['split_duration']);
                            if (sizeof($st)>1) {
                                $duration = ($st[0]+($st[1]/60));
                            }
                            else{
                                $duration = ($st[0]);
                            }

                            $reasonValue = $reasonValue +(($machine['machine_offrate_per_hour'])*(($duration)/60));
                        }
                        else{
                            $st = explode(".", $data['split_duration']);
                            if (sizeof($st)>1) {
                                $duration = ($st[0]+($st[1]/60));
                            }
                            else{
                                $duration = ($st[0]);
                            }
                            $reasonValue = $reasonValue +(($machine['rate_per_hour'])*(($duration)/60));
                        }
                        $st1 = explode(".", $data['split_duration']);
                        if (sizeof($st1)>1) {
                            $dur = ($st1[0]+($st1[1]/60));
                        }
                        else{
                            $dur = ($st1[0]);
                        }
                        $split_duration=$split_duration+$dur;
                    }
                }

                $reason_merge_name = $reason['downtime_reason']." (".strtoupper(str_split($reason['downtime_category'])[0]).")";

                // echo $machine['machine_id']." ".$reason_merge_name." ".$reasonValue;
                // echo "<br>";

                $t=array("machine_id"=>$machine['machine_id'],"reason_id"=>$reason['downtime_reason_id'],"reason"=>$reason_merge_name,"machine_name"=>$machine['machine_name'],"oppCost"=>$reasonValue,"duration"=>$split_duration);
                array_push($ar,$t);
                $GrandTotal = $GrandTotal+$reasonValue;
            }
            array_push($finalArray,$ar);
        }

        foreach ($DowntimeReason as $key => $reason) {
            $reason_merge = $reason['downtime_reason']." (".strtoupper(str_split($reason['downtime_category'])[0]).")";
            $DowntimeReason[$key]['downtime_reason'] = $reason_merge;
        }

        $l=sizeof($DowntimeReason);
        $l1=sizeof($finalArray);
        
        $reasonTotal=[];
        $durationTotal=[];
        for ($i=0; $i < $l; $i++) { 
            $total=0;
            $duration=0;
            for ($j=0; $j < $l1 ; $j++) { 
                $total=$total+floatval($finalArray[$j][$i]['oppCost']);
                $duration=$duration+$finalArray[$j][$i]['duration'];
            }
            array_push($reasonTotal,$total);
            array_push($durationTotal,$duration);
        }

        $res['data'] = $finalArray;
        $res['reason'] = $DowntimeReason;
        $res['total'] = $reasonTotal;
        $res['grandTotal'] = (int)$GrandTotal;
        $res['machineName'] = $MachineName;
        $res['totalDuration'] = $durationTotal;
        
        //sorting in desending order......
        $out = $this->selectionSortAvailability($res,sizeof($res['total']));

        $end_time_logger_availability = microtime(true);
        $execution_time_logger_availability = ($end_time_logger_availability - $start_time_logger_availability);
        log_message("info","\n\n financial oee drill down availability duration is :\t".$execution_time_logger_availability);


        echo json_encode($out);   
    }
    public function selectionSortAvailability($arr, $n)
    {   
        // One by one move boundary of unsorted subarray
        // echo $n;
        // echo "<br>";
        for ($i = 0; $i < $n-1; $i++)
        {
            // Find the minimum element in unsorted array
            $min_idx = $i;
            for ($j = $i+1; $j < $n; $j++){
                if ($arr['total'][$j] > $arr['total'][$min_idx]){
                    $min_idx = $j;
                }
            }

            $temp = $arr['total'][$i];
            $arr['total'][$i] = $arr['total'][$min_idx];
            $arr['total'][$min_idx] = $temp; 

            $l=sizeof($arr['machineName']);
            for ($k=0; $k < $l; $k++) { 
                $tmp = $arr['data'][$k][$i];
                $arr['data'][$k][$i] = $arr['data'][$k][$min_idx];
                $arr['data'][$k][$min_idx] = $tmp;
            }

            $temp1 = $arr['reason'][$i];
            $arr['reason'][$i] = $arr['reason'][$min_idx];
            $arr['reason'][$min_idx] = $temp1;

            $temp2 = $arr['totalDuration'][$i];
            $arr['totalDuration'][$i] = $arr['totalDuration'][$min_idx];
            $arr['totalDuration'][$min_idx] = $temp2;
        }

        // For remove the zero value reasons,......
        for ($i = 0; $i < $n; $i++)
        {
            if (floatval($arr['total'][$i]) <= 0 ) {
                // Total Value,.....
                unset($arr['total'][$i]);
                // Reason,.....
                unset($arr['reason'][$i]);
                //Total Deuration,......
                unset($arr['totalDuration'][$i]);
                // Machine Wise
                $l=sizeof($arr['machineName']);
                for ($k=0; $k < $l; $k++) { 
                    unset($arr['data'][$k][$i]);
                }
            }
        }

        return $arr;
    }

    public function qualityOpportunity(){

        //Function call for production data............
        log_message("info","financial oee drill down quality opportunity graph function calling !!");
        $start_time_logger_quality = microtime(true);

        $ref = "qualityOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        // $fromTime = "2022-12-18T09:00:00";
        // $toTime = "2022-12-18T21:00:00";

        // $url = "http://localhost:8080/graph/qualityOpportunity/".$fromTime."/".$toTime."/";
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // $result = curl_exec($ch);
        // $res = json_decode($result);
        // echo json_encode($res);

        $qualityReason = $this->Financial->qualityReason();

        $ProductionData = $this->getDataRaw($ref,$fromTime,$toTime);

        $ProductionDataExpand = [];
        foreach ($ProductionData as $value) {
            if (trim($value['reject_reason']) !="" or trim($value['reject_reason']) !=null) {
                $reasons =  explode("&&", $value['reject_reason']);
                foreach ($reasons as $count) {
                    $tt = explode("&", $count);
                    $total = $tt[0];
                    //$temp = explode($total, $count);
                    $temp = $tt[1];
                    $tmp = array("machine_id"=>$value['machine_id'],"part_id"=>$value['part_id'],"reject_count"=>$total,"reject_reason"=>$temp,"total_reject"=>$total,"total_correct"=>$value['corrections'],"total_production"=>$value['production'],"shot_count"=>$value['actual_shot_count'],"start_time"=>$value['start_time'],"end_time"=>$value['end_time']);
                    array_push($ProductionDataExpand, $tmp);
                }
            }
        }

        $partDetails = $this->Financial->getPartDetails();

        $machineDetails = $this->Financial->getMachineDetails();

        //Part wise quality reason........
        $QualityAvailabilityData=[];
        $QualityAvailabilityActual =[];
        $PartArray =[];
        $ReasonArray=[];
        $totalReject=[];
        
        foreach ($partDetails as $part) {
            $tmpReason=[];
            $tmpActualReason=[];
            $rejectTotal=[];
            foreach ($qualityReason as $reason) {
                $tmpPart =[];
                $tmpTotalReject=0;
                $tmpOpportunityCost=0;
                foreach ($ProductionDataExpand as $production) {
                    if ($part['part_id'] == $production['part_id'] AND $reason['quality_reason_id'] == $production['reject_reason']){

                        $PartPrice = $part['part_price'];
                        $Rejects =$production['reject_count'];
                        $OppCost = floatval($Rejects)*floatval($PartPrice);
                        $tmpTotalReject =$tmpTotalReject+$Rejects;
                        $tmpOpportunityCost=floatval($tmpOpportunityCost)+floatval($OppCost);
                    }
                }

                $tmpOpportunityCost = floatval($tmpOpportunityCost);
                $tmpTotalReject = floatval($tmpTotalReject);
                
                array_push($rejectTotal,$tmpTotalReject);
                $tmpActual = array("Reason"=>$reason['quality_reason_id'],"TotalRejects"=>$tmpTotalReject,"TotalCost"=>$tmpOpportunityCost,"Part_Name"=>$part['part_name']);
                array_push($tmpActualReason, $tmpActual);
            }
            //Total reject part reason wise......
            array_push($totalReject,$rejectTotal);

            //Part wise reason cumulative........
            $tmpAcualFinal = array("Part"=>$part['part_id'],"Reason"=>$tmpActualReason);
            array_push($QualityAvailabilityActual, $tmpAcualFinal);

            //Part Details..........
            array_push($PartArray,$part['part_id']);
        }

        $qreason = [];
        foreach ($qualityReason as $key => $value) {
            array_push($ReasonArray, $value["quality_reason_name"]);
            array_push($qreason, $value["quality_reason_id"]);
        }
        
        //Reason wise Total Cost Opportunity............
        $OverallOpportunity = 0;
        $ReasonWiseTotal=[];
        foreach ($qreason as $res) {
            $tmpCost = 0;
            foreach ($QualityAvailabilityActual as $part) {
                foreach ($part['Reason'] as $value) {
                    if ($value['Reason'] == $res) {
                        $tmpCost=floatval($tmpCost)+floatval($value['TotalCost']);
                    }
                }
            }
            array_push($ReasonWiseTotal, $tmpCost);
            $OverallOpportunity = $OverallOpportunity +$tmpCost;
        }  
        $result['OppCost'] = $QualityAvailabilityActual;
        $result['Part'] = $PartArray;
        $result['Reason']=$ReasonArray;
        $result['GrandTotal']=$OverallOpportunity;
        $result['Total']=$ReasonWiseTotal;

        $out = $this->selectionSortQualityOpp($result,sizeof($result['Total']));

        $end_time_logger_quality = microtime(true);
        $execution_time_logger_quality = ($start_time_logger_quality - $end_time_logger_quality);
        log_message("info","financial oee drill down quality graph function duration is :\t".$execution_time_logger_quality);


        echo json_encode($out);
    }

        public function selectionSortQualityOpp($arr, $n)
    {
        //int i, j, min_idx;
      
        // One by one move boundary of unsorted subarray
        for ($i = 0; $i < $n-1; $i++)
        {
            // Find the minimum element in unsorted array
            $min_idx = $i;
            for ($j = $i+1; $j < $n; $j++){
                if ($arr['Total'][$j] > $arr['Total'][$min_idx]){
                    $min_idx = $j;
                }
            }

            $temp = $arr['Total'][$i];
            $arr['Total'][$i] = $arr['Total'][$min_idx];
            $arr['Total'][$min_idx] = $temp;

            $temp1 = $arr['Reason'][$i];
            $arr['Reason'][$i] = $arr['Reason'][$min_idx];
            $arr['Reason'][$min_idx] = $temp1;          

            $l = sizeof($arr['OppCost']);
            for ($k=0; $k < $l; $k++) { 
                $temp1 = $arr['OppCost'][$k]['Reason'][$i];
                $arr['OppCost'][$k]['Reason'][$i] = $arr['OppCost'][$k]['Reason'][$min_idx];
                $arr['OppCost'][$k]['Reason'][$min_idx] = $temp1;
            }
        }

        for ($i = 0; $i < $n; $i++)
        {
            if ($arr['Total'][$i] <=0){
                unset($arr['Total'][$i]);
                $l = sizeof($arr['OppCost']);
                for ($k=0; $k < $l; $k++) { 
                    unset($arr['OppCost'][$k]['Reason'][$i]);
                }
                unset($arr['Reason'][$i]);
            }
        }
        return $arr;
    }

    public function performanceOpportunity(){
        
        log_message("info","\n\n financial oee drill down performance opportunity graph function calling !!");
        $start_time_logger_performance_oppcost= microtime(true);

        $ref = "PerformanceOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");    

        // $fromTime = "2022-12-18T09:00:00";
        // $toTime = "2022-12-18T21:00:00";

        // $url = "http://localhost:8080/graph/performanceOpportunity/".$fromTime."/".$toTime."/";
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // $result = curl_exec($ch);
        // $res = json_decode($result);
        // echo json_encode($res);

        $machineData = $this->getDataRaw($ref,$fromTime,$toTime);
        $partDetails = $this->Financial->PartDetails();
        $machineDetails = $this->Financial->getMachineDetails();

        //Availability Opportunity.........
        $AvailabilityOpportunity=[];

        //Direct value for graph......
        $varDataMachine=[];
        foreach ($machineData['downtime'] as $machine) {
            $All =0;
            foreach ($machineData['all'] as  $a) {
                if ($machine['Machine_ID']==$a['machine_id']) {
                    $All = $a['duration'];
                }
            }
            $tmpMachine=[];
            //Direct value for graph......
            $varData=[];
            if ($All>0) {
                foreach ($partDetails as $key => $part) {
                    $tmpPart=[];
                    $corrected_tppNICT=0;
                    $machineOFFRate=1;
                    foreach ($machineData['production'] as $val) {
                        if ($machine['Machine_ID']==$val['machine_id'] AND $part['part_id']==$val['part_id']) {
                            $corrected_tpp = (int)$val['production']+(int)($val['corrections']);

                            $tnict=0;
                            $mnict = explode(".", $part['NICT']);
                            if (sizeof($mnict)>1) {
                                $tnict = (($mnict[0]/60)+($mnict[1]/1000));
                            }else{
                                $tnict = ($mnict[0]/60);
                            }

                            $ctpNICT = ($tnict)*$corrected_tpp;
                            $corrected_tppNICT = $corrected_tppNICT+$ctpNICT;
                        }
                    }
                    foreach($machineDetails as $m) {
                        if ($m['machine_id'] == $machine['Machine_ID']) {
                            $machineOFFRate = $m['rate_per_hour'];
                        }
                    }

                    $partRunningTime=0;
                    $downtime=0;
                    foreach ($machine['Part_Wise'] as $key => $value) {
                        $temp_split = explode(",", $value['part_id']);
                        foreach ($temp_split as $value_part) {
                            if ($part['part_id'] == $value_part) {
                                $partRunningTime=floatval(($value['PartInMachine']))-floatval(($value['Planed']+$value['Unplanned']));
                                $downtime=floatval($All)-floatval(floatval($machine['Planned'])+floatval($machine['Unplanned'])+floatval($machine['Machine_OFF']));
                            }
                        }
                    }

                    //For no production........
                    $Opportunity = floatval((floatval(floatval($partRunningTime)-floatval($corrected_tppNICT))/(60))*(int)$machineOFFRate);

                    $partRunningDurationAtIdeal=$corrected_tppNICT;
                    $speedLoss= $partRunningTime-$partRunningDurationAtIdeal;
                    if (floatval($Opportunity)<0) {
                        $Opportunity=0;
                        $speedLoss=0;
                    }
                    $Opportunity_arr = array('Opportunity' => floatval($Opportunity),'SpeedLoss'=>$speedLoss);

                    $temp = array("part_id"=>$part['part_id'],"data"=>$corrected_tppNICT,"OppCost"=>$Opportunity_arr,"speedLoss"=>$speedLoss);
                    array_push($tmpMachine, $temp);
                    array_push($varData, $Opportunity_arr);
                }
                // $x = array("machine_id"=>$machine['Machine_ID'],"machineData"=>$tmpMachine);
                // array_push($AvailabilityOpportunity, $x);

                $z= array("machine_id"=>$machine['Machine_ID'],"machineData"=>$varData);
                array_push($varDataMachine, $z);
            }
        }

        $length = sizeof($varDataMachine);
        $l=sizeof($partDetails);
        $partTotal=[];
        $speedTotal=[];
        $GrandTotal=0;
        for ($i=0; $i < $l ; $i++) { 
            $tmpPartTotal=0;
            $tmpSpeedLoss=0;
            for ($j=0; $j <$length ; $j++) { 
                $tmpPartTotal=floatval($tmpPartTotal)+floatval($varDataMachine[$j]['machineData'][$i]['Opportunity']);
                $tmpSpeedLoss=$tmpSpeedLoss+($varDataMachine[$j]['machineData'][$i]['SpeedLoss']);
            }
            $GrandTotal=floatval($GrandTotal)+floatval($tmpPartTotal);
            array_push($partTotal, $tmpPartTotal);
            array_push($speedTotal, $tmpSpeedLoss);
        }

        $res['dataPart']=$varDataMachine;
        $res['Part']=$partDetails;
        $res['Total']=$partTotal;
        $res['SpeedLossTotal']=$speedTotal;
        $res['GrandTotal']=($GrandTotal);

        //sorting in desending order......
        $out = $this->selectionSortQuality($res,sizeof($res['Total']));

        $end_time_logger_performance_oppcost= microtime(true);
        $execution_time_logger_performance_oppcost = ($end_time_logger_performance_oppcost - $start_time_logger_performance_oppcost);
        log_message("info","financial metrics performance opportunity duraiton is :\t".$execution_time_logger_performance_oppcost);

 
        echo json_encode($out);
    }

    public function selectionSortQuality($arr, $n)
    {
        //int i, j, min_idx;
      
        // One by one move boundary of unsorted subarray
        for ($i = 0; $i < $n-1; $i++)
        {
            // Find the minimum element in unsorted array
            $min_idx = $i;
            for ($j = $i+1; $j < $n; $j++){
                if ($arr['Total'][$j] > $arr['Total'][$min_idx]){
                    $min_idx = $j;
                }
            }

            $temp = $arr['Total'][$i];
            $arr['Total'][$i] = $arr['Total'][$min_idx];
            $arr['Total'][$min_idx] = $temp;


            $temp2 = $arr['Part'][$i];
            $arr['Part'][$i] = $arr['Part'][$min_idx];
            $arr['Part'][$min_idx] = $temp2;

            $temp3 = $arr['SpeedLossTotal'][$i];
            $arr['SpeedLossTotal'][$i] = $arr['SpeedLossTotal'][$min_idx];
            $arr['SpeedLossTotal'][$min_idx] = $temp3;            
            

            $l = sizeof($arr['dataPart']);
            for ($k=0; $k < $l; $k++) { 
                $temp1 = $arr['dataPart'][$k]['machineData'][$i];
                $arr['dataPart'][$k]['machineData'][$i] = $arr['dataPart'][$k]['machineData'][$min_idx];
                $arr['dataPart'][$k]['machineData'][$min_idx] = $temp1;
            }
        }

        for ($i = 0; $i < $n; $i++)
        {
            if (floatval($arr['Total'][$i]) <= 0){
                unset($arr['Total'][$i]);
                $l = sizeof($arr['dataPart']);
                for ($k=0; $k < $l; $k++) { 
                    unset($arr['dataPart'][$k]['machineData'][$i]);
                }
                unset($arr['SpeedLossTotal'][$i]);
                unset($arr['Part'][$i]);
            }
        }
        return $arr;
    }

    public function plopportunity(){

        log_message("info","\n\n financial metrics oppcost ploppcost grpah function calling !!");
        $start_time_logger_ploppcost = microtime(true);

        $ref = "PLOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");

        // $url = "http://localhost:8080/graph/plOpportunity/".$fromTime."/".$toTime."/";
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // $result = curl_exec($ch);
        // $res = json_decode($result);
        // echo json_encode($res);

        // $fromTime = "2022-12-18T09:00:00";
        // $toTime = "2022-12-18T21:00:00";

        $downtime = $this->getDataRaw($ref,$fromTime,$toTime);
        $partDetails = $this->Financial->PartDetails();
        $machineDetails = $this->Financial->getMachineDetails();

        $business = 0;
        $planned = 0;
        $unplanned = 0;
        $performance = 0;
        $quality =0;

        $plannedDuration=0;
        $UnplannedDuration=0;
        $MachineOFFDuration=0;
        $QualityDuration=0;
        $PerformanceDuration=0;

        // echo "<pre>";
        // print_r($downtime);

        foreach ($machineDetails as $machine) {
            foreach ($downtime as $reason) {
                if ($machine['machine_id'] == $reason['Machine_ID']) {
                    $machineoffopportunity = ($machine['machine_offrate_per_hour'])*($reason['Machine_OFF']/60);
                    $plannedopportunity = ($machine['rate_per_hour'])*($reason['Planned']/60);
                    $unplannedopportunity = ($machine['rate_per_hour'])*($reason['Unplanned']/60);
                    
                    $business = floatval($business) + floatval($machineoffopportunity);
                    $planned = floatval($planned) + floatval($plannedopportunity);
                    $unplanned = floatval($unplanned) + floatval($unplannedopportunity);

                    //For duration find-out
                    $plannedDuration=floatval($plannedDuration)+floatval($reason['Planned']);
                    $UnplannedDuration=floatval($UnplannedDuration)+floatval($reason['Unplanned']);
                    $MachineOFFDuration=floatval($MachineOFFDuration)+floatval($reason['Machine_OFF']);
                }
            }
        }

        $ref = "PerformanceOpportunity";
        $res = $this->getDataRaw($ref,$fromTime,$toTime);

        //Difference between two dates......
        // $diff = abs(strtotime($toTime) - strtotime($fromTime));
        // $AllTime = (int)($diff/60);
        //Performance Opportunity.........
        foreach ($res['downtime'] as $machine) {
            $NICTCorrectTPP = 0;
            $machineRate=1;
            $All=0;
            $All = $machine['All'];
            if ($All>0) {
                foreach ($partDetails as $key => $part) {
                    foreach ($res['production'] as $val) {
                        if ($machine['Machine_ID']==$val['machine_id'] AND $part['part_id']==$val['part_id']) {
                            $TCorrected = (int)$val['production']+((int)($val['corrections']));
                            $quality = $quality +($part['part_price']*$val['rejections']);

                            $NICT=0;
                            $mnict = explode(".", $part['NICT']);
                            if (sizeof($mnict)>1) {
                                $NICT = (($mnict[0]/60)+($mnict[1]/1000));
                            }else{
                                $NICT = ($mnict[0]/60);
                            }
                            $NICTCorrectTPP = (($TCorrected*$NICT)+$NICTCorrectTPP);
                            $QualityDuration=$QualityDuration+($NICT*$val['rejections']);
                        }
                    }
                }
                foreach ($machineDetails as $m) {
                    if ($m['machine_id'] == $machine['Machine_ID']) {
                        $machineRate = $m['rate_per_hour'];
                    }
                }
                $t=($All-($machine['Planned']+$machine['Unplanned']+$machine['Machine_OFF'])+$NICTCorrectTPP);
                $tmpOp = ($t)/(60*$machineRate);
                if ($tmpOp<0) {
                    $tmpOp=0;
                }
                $performance = $performance + $tmpOp;
                $PerformanceDuration=$t-$NICTCorrectTPP;
            }
        }
        $operation = $planned+$unplanned+$performance+$quality;
        $grand_total = $planned+$unplanned+$performance+$quality+$business;

        $out['business']=(floatval($business));
        $out['planned']=(floatval($planned));
        $out['unplanned']=(floatval($unplanned));
        $out['performance']=(floatval($performance));
        $out['quality']=(floatval($quality));
        $out['operation'] = (floatval($operation));
        $out['all'] = (floatval($grand_total));
        $out['businessDuration']=(floatval($MachineOFFDuration,));
        $out['plannedDuration']=(floatval($plannedDuration));
        $out['unplannedDuration']=(floatval($UnplannedDuration));
        $out['performanceDuration']=(floatval($PerformanceDuration));
        $out['qualityDuration']=(floatval($QualityDuration));

        $end_time_logger_ploppcost = microtime(true);
        $execution_time_logger_ploppcost = ($end_time_logger_ploppcost - $start_time_logger_ploppcost);
        log_message("info","financial metrics opportunity graph function diration is :\t".$execution_time_logger_ploppcost);


        echo json_encode($out);
    }


    public function machineplopportunity(){

        log_message("info","\n\n financial metrics machine_wise_pl_oppcost graph function calling !!");
        $start_time_logger_machine_ploppcost = microtime(true);

        $ref = "PLOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");

        // $url = "http://localhost:8080/graph/machineWisePL/".$fromTime."/".$toTime."/";
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // $result = curl_exec($ch);
        // $res = json_decode($result);
        // echo json_encode($res);

        // $fromTime = "2022-12-18T09:00:00";
        // $toTime = "2022-12-18T21:00:00";

        // $downtime = $this->getDataRaw($ref,$fromTime,$toTime);
        $partDetails = $this->Financial->PartDetails();
        $machineDetails = $this->Financial->getMachineDetails();

        $MachinePL=[];
        $MachinePLB= [];
        $MachinePLP= [];
        $MachinePLU= [];
        $MachinePLPer= [];
        $MachinePLQ= []; 
        $MachinePLT= [];
        $Machine=[];
        $GrantTotalPL = 0;

        $ref = "PerformanceOpportunity";
        $res = $this->getDataRaw($ref,$fromTime,$toTime);

        //Difference between two dates......
        // $diff = abs(strtotime($toTime) - strtotime($fromTime));
        // $AllTime = (int)($diff/60);


        $businessDuration=[];
        $plannedDuration=[];
        $unplannedDuration=[];
        $qualityDuration=[];
        $performanceDuration=[];
        $machinewiseDuration=[];

        $noOfReject=[];

        //Performance Opportunity.........
        foreach ($res['downtime'] as $machine) {
            $NICTCorrectTPP = 0;
            $machineRate=1;
            $machineoffopportunity=0;
            $plannedopportunity=0;
            $unplannedopportunity=0;
            $qualityopportunity=0;
            $machineName="";

            $businessDurationTmp=0;
            $plannedDurationTmp=0;
            $unplannedDurationTmp=0;
            $qualityDurationTmp=0;
            $performanceDurationTmp=0;

            $noReject=0;

            $p=0;
            $u=0;
            $q=0;
            $b=0;
            $performancev=0;
            $All=0;
            $All = $machine['All'];

            if ($All>0) {
                foreach ($machineDetails as $m) {
                    if ($m['machine_id'] == $machine['Machine_ID']) {
                        $machineoffopportunity = $m['machine_offrate_per_hour']*($machine['Machine_OFF']/60);
                        $plannedopportunity = $m['rate_per_hour']*($machine['Planned']/60);
                        $unplannedopportunity = $m['rate_per_hour']*($machine['Unplanned']/60);
                        
                        $businessDurationTmp=floatval($businessDurationTmp)+floatval($machine['Machine_OFF']);
                        $plannedDurationTmp=floatval($plannedDurationTmp)+floatval($machine['Planned']);
                        $unplannedDurationTmp=floatval($unplannedDurationTmp)+floatval($machine['Unplanned']);
                    }   
                }

                foreach ($partDetails as $key => $part) {
                    foreach ($res['production'] as $val) {
                        if ($machine['Machine_ID']==$val['machine_id'] and $part['part_id']==$val['part_id']) {
                            $TCorrected = (int)$val['production']+(int)($val['corrections']);
                            $qualityopportunity = $qualityopportunity +($part['part_price']*$val['rejections']);
                            $NICT=0;
                            $mnict = explode(".", $part['NICT']);
                            if (sizeof($mnict)>1) {
                                $NICT = (($mnict[0]/60)+($mnict[1]/1000));
                            }else{
                                $NICT = ($mnict[0]/60);
                            }
                            
                            $NICTCorrectTPP = (($TCorrected*$NICT)+$NICTCorrectTPP);
                            $qualityDurationTmp=$qualityDurationTmp+($NICT*$val['rejections']);

                            $noReject=$noReject+$val['rejections'];
                        }
                    }
                }

                foreach ($machineDetails as $m) {
                    if ($m['machine_id'] == $machine['Machine_ID']) {
                        $machineRate = $m['rate_per_hour'];
                        $machineName=$m['machine_name'];
                    }
                }
                $t=$All-($machine['Planned']+$machine['Unplanned']+$machine['Machine_OFF']+$NICTCorrectTPP);
                $performance = ($t)/(60*$machineRate);
                $performanceDurationTmp=$t;

                if ($performance<0) {
                    $performance=0;
                    $performanceDurationTmp=0;
                }

                //Machine Wise P&L Duration.....
                $MachinePLTotalDuration = floatval($businessDurationTmp)+floatval($plannedDurationTmp)+floatval($unplannedDurationTmp)+floatval($performanceDurationTmp)+floatval($qualityDurationTmp);

                array_push($businessDuration,floatval($businessDurationTmp));
                array_push($plannedDuration,floatval($plannedDurationTmp));
                array_push($unplannedDuration,floatval($unplannedDurationTmp));
                array_push($qualityDuration,floatval($qualityDurationTmp));
                array_push($performanceDuration,floatval($performanceDurationTmp));
                array_push($machinewiseDuration,floatval($MachinePLTotalDuration));

                //Machine Wise P&L
                $MachinePLTotalTmp = floatval($machineoffopportunity)+floatval($plannedopportunity)+floatval($unplannedopportunity)+floatval($performance)+floatval($qualityopportunity);

                $GrantTotalPL = $GrantTotalPL+$MachinePLTotalTmp;
                array_push($MachinePLB, $machineoffopportunity);
                array_push($MachinePLP, $plannedopportunity);
                array_push($MachinePLU, $unplannedopportunity);
                array_push($MachinePLPer, $performance);
                array_push($MachinePLQ, $qualityopportunity);
                array_push($MachinePLT, $MachinePLTotalTmp);
                array_push($Machine,$machineName);
            }
            array_push($noOfReject, $noReject);
        }
        // $operation = $planned+$unplanned+$performance+$quality;

        $out['business']=$MachinePLB;
        $out['planned']=$MachinePLP;
        $out['unplanned']=$MachinePLU;
        $out['performance']=$MachinePLPer;
        $out['quality']=$MachinePLQ;
        $out['total'] = $MachinePLT;
        $out['machine']= $Machine;
        $out['businessDuration']=$businessDuration;
        $out['plannedDuration']=$plannedDuration;
        $out['unplannedDuration']=$unplannedDuration;
        $out['performanceDuration']=$performanceDuration;
        $out['qualityDuration']=$qualityDuration;
        $out['totalDuration'] = $machinewiseDuration;
        $out['rejects'] = $noOfReject;

        //sorting in desending order......
        $out = $this->selectionSort($out,sizeof($out['total']));
        $out['grand_total'] = (int)$GrantTotalPL;

        $end_time_logger_machine_ploppcost = microtime(true);
        $execution_time_logger_machine_oppcost = ($end_time_logger_machine_ploppcost - $start_time_logger_machine_ploppcost);
        log_message("info","financial metrics machine wise ploppcost duration is :\t".$execution_time_logger_machine_oppcost);


        echo json_encode($out);
    }

    public function selectionSort($arr, $n)
    {
        //int i, j, min_idx;
      
        // One by one move boundary of unsorted subarray
        for ($i = 0; $i < $n-1; $i++)
        {
            // Find the minimum element in unsorted array
            $min_idx = $i;
            for ($j = $i+1; $j < $n; $j++){
                if ($arr['total'][$j] > $arr['total'][$min_idx]){
                    $min_idx = $j;
                }
            }

            $temp = $arr['total'][$i];
            $arr['total'][$i] = $arr['total'][$min_idx];
            $arr['total'][$min_idx] = $temp;

            //business
            $temp1 = $arr['business'][$i];
            $arr['business'][$i] = $arr['business'][$min_idx];
            $arr['business'][$min_idx] = $temp1;
            //performance
            $temp2 = $arr['performance'][$i];
            $arr['performance'][$i] = $arr['performance'][$min_idx];
            $arr['performance'][$min_idx] = $temp2;
            //planned
            $temp3 = $arr['planned'][$i];
            $arr['planned'][$i] = $arr['planned'][$min_idx];
            $arr['planned'][$min_idx] = $temp3;
            //unplanned
            $temp4 = $arr['unplanned'][$i];
            $arr['unplanned'][$i] = $arr['unplanned'][$min_idx];
            $arr['unplanned'][$min_idx] = $temp4;
            //quality
            $temp5= $arr['quality'][$i];
            $arr['quality'][$i] = $arr['quality'][$min_idx];
            $arr['quality'][$min_idx] = $temp5;

            //machine
            $temp6= $arr['machine'][$i];
            $arr['machine'][$i] = $arr['machine'][$min_idx];
            $arr['machine'][$min_idx] = $temp6;

            // reject
            $temp7= $arr['rejects'][$i];
            $arr['rejects'][$i] = $arr['rejects'][$min_idx];
            $arr['rejects'][$min_idx] = $temp7;
        }

        for ($i = 0; $i < $n; $i++)
        {
            if ($arr['total'][$i] <0){
                unset($arr['total'][$i]);
                unset($arr['planned'][$i]);
                unset($arr['unplanned'][$i]);
                unset($arr['quality'][$i]);
                unset($arr['machine'][$i]);
                unset($arr['business'][$i]);
                unset($arr['performance'][$i]);
                unset($arr['rejects'][$i]);
            }
        }

        return $arr;
    }



    public function partplopportunity(){

        log_message("info","\n\n financial matrics part wise ploppcost");
        $start_time_part_wise_ploppcost = microtime(true);

        $ref = "PartPLOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");

        // $url = "http://localhost:8080/graph/partWisePLOpportunity/".$fromTime."/".$toTime."/";
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // $result = curl_exec($ch);
        // $res = json_decode($result);
        // echo json_encode($res);

        // $fromTime = "2022-12-18T09:00:00";
        // $toTime = "2022-12-18T21:00:00";


        $production = $this->getDataRaw($ref,$fromTime,$toTime);
        $partDetails = $this->Financial->PartDetailsOpportunity();
        $machineDetails = $this->Financial->getMachineDetails();       

        //Difference between two dates......
        $diff = abs(strtotime($toTime) - strtotime($fromTime));
        $AllTime = (int)($diff/60);

        // echo "<pre>";
        // print_r($production['downtime']);

        //Performance Opportunity.........
        $PartWisePL =[];
        $PartDataID=[];
        $GrandTotal=0;

        $ln=0;
        foreach ($production['production'] as $product) {
            foreach ($partDetails as $key => $part) {
                // $planned=0;
                // $unplanned=0;
                $rateHour=0;
                foreach ($machineDetails as $val) {
                    if ($product['machine_id']==$val['machine_id']) {
                        $rateHour= $val['rate_per_hour'];
                    }   
                }

                if ($part['part_id'] == $product['part_id']) {
                    $PartInMachine = 0;
                    foreach ($production['downtime'] as $down) {
                        if ($down['Machine_ID']==$product['machine_id']) {
                            foreach ($down['Part_Wise'] as $value) {
                                $tmpPart = explode(",", $value['part_id']);
                                // One-tool, multi-part
                                foreach ($tmpPart as $pt) {
                                    if ($part['part_id'] == $pt) {
                                        // $planned = $value['Planed'];
                                        // $unplanned = $value['Unplanned'];
                                        $PartInMachine = $value['PartInMachine'];
                                    }
                                }
                            }
                        } 
                    }

                    if(count($PartWisePL)<1){
                        $TCorrected = (int)$product['production']+(int)($product['corrections']);
                        $UMaterialCost  = $part['material_price']*$TCorrected*($part['part_weight']/1000);
                        $UProductionCost  = ($PartInMachine/60)*$rateHour;
                        $UTotalPartProducedCost = $UMaterialCost+$UProductionCost;
                        $GoodRevenu = $part['part_price']*($TCorrected-$product['rejections']);
                        $ProfitLoss = $GoodRevenu-$UTotalPartProducedCost;
                        
                        $tt=$UMaterialCost + $UProductionCost + $ProfitLoss;
                        $PartWisePLTmp = array("Part_Id"=>$product['part_id'],"Material_Cost"=>$UMaterialCost,"Production_Cost"=>$UProductionCost,"Profit_Loss"=>$ProfitLoss,"Total"=>$tt);
                        $GrandTotal = $GrandTotal+$ProfitLoss;
                        array_push($PartWisePL, $PartWisePLTmp);
                    }
                    else{
                        $k=0;
                        foreach ($PartWisePL as $key => $value) {
                            if ($PartWisePL[$key]['Part_Id'] == $product['part_id']) {

                                $TCorrected = (int)$product['production']+(int)($product['corrections']);
                                $UMaterialCost  = $part['material_price']*$TCorrected*($part['part_weight']/1000);
                                $UProductionCost  = 0;
                                $UTotalPartProducedCost = $UMaterialCost+$UProductionCost;
                                $GoodRevenu = $part['part_price']*($TCorrected-$product['rejections']);
                                $ProfitLoss = $GoodRevenu-$UTotalPartProducedCost;
                                
                                $tt=$UMaterialCost + $UProductionCost + $ProfitLoss;
                                $PartWisePLTmp = array("Part_Id"=>$product['part_id'],"Material_Cost"=>$UMaterialCost,"Production_Cost"=>$UProductionCost,"Profit_Loss"=>$ProfitLoss,"Total"=>$tt);
                                $GrandTotal = $GrandTotal+$ProfitLoss;

                                //Part-wise update.....
                                $t = $PartWisePL[$key]['Material_Cost'] + $UMaterialCost ;
                                $PartWisePL[$key]['Material_Cost'] =$t;
                                // $m = $PartWisePL[$key]['Production_Cost'] + $UProductionCost ;
                                // $PartWisePL[$key]['Production_Cost'] = (int)$m;
                                $n = $PartWisePL[$key]['Profit_Loss'] + $ProfitLoss ;
                                $PartWisePL[$key]['Profit_Loss'] = $n;
                                $total = $PartWisePL[$key]['Total'] + $tt ;
                                $PartWisePL[$key]['Total'] = $total;
                                $k=1;
                                break;
                            }
                        }
                        if ($k == 0) {
                            $TCorrected = (int)$product['production']+(int)($product['corrections']);
                            $UMaterialCost  = $part['material_price']*$TCorrected*($part['part_weight']/1000);
                            $UProductionCost  = ($PartInMachine/60)*$rateHour;
                            $UTotalPartProducedCost = $UMaterialCost+$UProductionCost;
                            $GoodRevenu = $part['part_price']*($TCorrected-$product['rejections']);
                            $ProfitLoss = $GoodRevenu-$UTotalPartProducedCost;
                            
                            $tt=$UMaterialCost + $UProductionCost + $ProfitLoss;
                            $PartWisePLTmp = array("Part_Id"=>$product['part_id'],"Material_Cost"=>$UMaterialCost,"Production_Cost"=>$UProductionCost,"Profit_Loss"=>$ProfitLoss,"Total"=>$tt);
                            $GrandTotal = $GrandTotal+$ProfitLoss;
                            array_push($PartWisePL, $PartWisePLTmp);
                        }
                    }

                    //Part Name finding.........
                    $tmp = [];
                    if (count($PartDataID) <1) {
                        $tmp = array("Part_Id"=>$part['part_id'],"Part_Name"=>$part['part_name']);
                        array_push($PartDataID, $tmp);
                    }
                    else{
                        $flag =0;
                        foreach ($PartDataID as $key ) {
                            if($key['Part_Id'] == $part['part_id']){
                                $flag=1;
                            }
                        };
                        if ($flag==0) {
                            $tmp = array("Part_Id"=>$part['part_id'],"Part_Name"=>$part['part_name']);
                            array_push($PartDataID, $tmp);
                        }
                    }

                }
            }
            
        }

        $out['data']=$PartWisePL;
        $out['part']=$PartDataID;

        //sorting in desending order......
        $out = $this->selectionSortPL($out,sizeof($out['data']));
        $out['total'] = (int)$GrandTotal;

        $end_time_part_wise_ploppcost = microtime(true);
        $execution_time_part_wise_ploppcost = ($end_time_part_wise_ploppcost - $start_time_part_wise_ploppcost);
        log_message("info"," financial metrics part wise pl oppcost function duration is :\t ".$execution_time_part_wise_ploppcost);


        echo json_encode($out);

    }

    public function selectionSortPL($arr, $n)
    {
        //int i, j, min_idx;
      
        // One by one move boundary of unsorted subarray
        for ($i = 0; $i < $n-1; $i++)
        {
            // Find the minimum element in unsorted array
            $min_idx = $i;
            for ($j = $i+1; $j < $n; $j++){
                if ($arr['data'][$j]['Total'] > $arr['data'][$min_idx]['Total']){
                    $min_idx = $j;
                }
            }

            $temp = $arr['data'][$i]['Total'];
            $arr['data'][$i]['Total'] = $arr['data'][$min_idx]['Total'];
            $arr['data'][$min_idx]['Total'] = $temp;

            //Material
            $temp1 = $arr['data'][$i]['Material_Cost'];
            $arr['data'][$i]['Material_Cost'] = $arr['data'][$min_idx]['Material_Cost'];
            $arr['data'][$min_idx]['Material_Cost'] = $temp1;
            //Production
            $temp2 = $arr['data'][$i]['Production_Cost'];
            $arr['data'][$i]['Production_Cost'] = $arr['data'][$min_idx]['Production_Cost'];
            $arr['data'][$min_idx]['Production_Cost'] = $temp2;
            //Profit/Loss
            $temp3 = $arr['data'][$i]['Profit_Loss'];
            $arr['data'][$i]['Profit_Loss'] = $arr['data'][$min_idx]['Profit_Loss'];
            $arr['data'][$min_idx]['Profit_Loss'] = $temp3;

            //Part Id
            $temp3 = $arr['data'][$i]['Part_Id'];
            $arr['data'][$i]['Part_Id'] = $arr['data'][$min_idx]['Part_Id'];
            $arr['data'][$min_idx]['Part_Id'] = $temp3;

            //Part Name Updated.....
            $temp4 = $arr['part'][$i]['Part_Id'];
            $temp5 = $arr['part'][$i]['Part_Name'];
            $arr['part'][$i]['Part_Id'] = $arr['part'][$min_idx]['Part_Id'];
            $arr['part'][$i]['Part_Name'] = $arr['part'][$min_idx]['Part_Name'];
            $arr['part'][$min_idx]['Part_Id'] = $temp4;
            $arr['part'][$min_idx]['Part_Name'] = $temp5;
        }

        return $arr;
    }


    public function opportunityTrendDay(){

        log_message("info","\n\n financial metrics opportunity trend day function calling !!");
        $start_time_opp_trend = microtime(true);

        $ref = "OpportunityTrendDay";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");

        // $url = "http://localhost:8080/graph/OpportunityPLTrend/".$fromTime."/".$toTime."/";
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // $result = curl_exec($ch);
        // $res = json_decode($result);
        // echo json_encode($res);

        // $fromTime = "2022-11-21T15:00:00";
        // $toTime = "2022-11-27T14:00:00";

        $dstart = explode("T", $fromTime);
        $dend= explode("T", $toTime); 
        $start_date = $dstart[0];
        $end_date = $dend[0];

        $days=[];
        while (strtotime($start_date) <= strtotime($end_date)) {
            array_push($days,$start_date);
            $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
        }

        $rawData = $this->getDataRaw($ref,$fromTime,$toTime);
        
        $downtime = $this->oeeDataTreand($rawData['raw'],$rawData['machine'],$rawData['part'],$days,true);
        $partDetails = $this->Financial->PartDetails();
        $machineDetails = $this->Financial->getMachineDetails();

        $ref = "PerformanceOpportunity";
        $res = $this->getDataRaw($ref,$fromTime,$toTime);

    //Performance Opportunity.........
    $opportunityTrendDay=[];
    $GrantTotalPL = 0;
    foreach ($downtime as $d) {
        $MachinePLB=0;
        $MachinePLP=0;
        $MachinePLU=0;
        $MachinePLPer=0;
        $MachinePLQ=0; 
        $MachinePLT= 0;
        $Machine=[];

        $MachinePLBDuration=0;
        $MachinePLPDuration=0;
        $MachinePLUDuration=0;
        $MachinePLPerDuration=0;
        $MachinePLQDuration=0; 
        $MachinePLTDuration=0;
        foreach ($d['data'] as $machine) {
            $NICTCorrectTPP = 0;
            $machineRate=1;
            $machineoffopportunity=0;
            $plannedopportunity=0;
            $unplannedopportunity=0;
            $qualityopportunity=0;
            $machineName="";

            $AllTime=0;
            foreach ($rawData['downtimeTime'] as $dayDown) {
                if ($dayDown['date'] == $d['date']) {
                    foreach ($dayDown['data'] as $dd) {
                        if ($dd['machine_id'] == $machine['Machine_ID']) {
                            $AllTime = $dd['duration'];
                        }
                    }
                }
            }
            if ($AllTime > 0) {
                foreach ($machineDetails as $m) {
                    if ($m['machine_id'] == $machine['Machine_ID']) {
                        $machineoffopportunity = $m['machine_offrate_per_hour']*($machine['Machine_OFF']/60);
                        $plannedopportunity = $m['rate_per_hour']*($machine['Planned']/60);
                        $unplannedopportunity = $m['rate_per_hour']*($machine['Unplanned']/60);

                        $MachinePLBDuration=$MachinePLBDuration+$machine['Machine_OFF'];
                        $MachinePLPDuration=$MachinePLPDuration+$machine['Planned'];
                        $MachinePLUDuration=$MachinePLUDuration+$machine['Unplanned'];
                    }
                }
                foreach ($partDetails as $key => $part) {
                    foreach ($res['production'] as $val) {
                        if ($machine['Machine_ID']==$val['machine_id'] AND $part['part_id']==$val['part_id'] AND $val['shift_date']==$d['date']) {
                            $TCorrected = (int)$val['production']+(int)($val['corrections']);
                            $qualityopportunity = $qualityopportunity +($part['part_price']*$val['rejections']);
                            $NICT=0;
                            $mnict = explode(".", $part['NICT']);
                            if (sizeof($mnict)>1) {
                                $NICT = (($mnict[0]/60)+($mnict[1]/1000));
                            }else{
                                $NICT = ($mnict[0]/60);
                            }
                            $NICTCorrectTPP = (($TCorrected*$NICT)+$NICTCorrectTPP);

                            $MachinePLQDuration=$MachinePLQDuration+($NICT*$val['rejections']);
                        }
                    }
                }
                foreach ($machineDetails as $m) {
                    if ($m['machine_id'] == $machine['Machine_ID']) {
                        $machineRate = $m['rate_per_hour'];
                        $machineName=$m['machine_name'];
                    }
                }

                $t=($AllTime-($machine['All']+$NICTCorrectTPP));
                $performance = ($t)/(60*$machineRate);
                if ($performance<0) {
                    $performance=0;
                }
                $MachinePLPerDuration=$MachinePLPerDuration+$t;

                //Machine Wise P&L
                $MachinePLTotalTmp = floatval($machineoffopportunity)+floatval($plannedopportunity)+floatval($unplannedopportunity)+floatval($performance)+floatval($qualityopportunity);

                $GrantTotalPL = $GrantTotalPL+$MachinePLTotalTmp;
                $MachinePLB=$MachinePLB+ $machineoffopportunity;
                $MachinePLP=$MachinePLP+ $plannedopportunity;
                $MachinePLU=$MachinePLU+ $unplannedopportunity;
                $MachinePLPer=$MachinePLPer+ $performance;
                $MachinePLQ=$MachinePLQ+ $qualityopportunity;
                $MachinePLT=$MachinePLT+ $MachinePLTotalTmp;
            }
            // array_push($Machine+$machineName);
        }
        $timestamp = strtotime($d['date']);
        $m = date('m', $timestamp);
        $y = date('Y', $timestamp);
        $dd = date('d', $timestamp);

        $date = $dd."-".$m;

        $MachinePLTDuration= floatval($MachinePLBDuration)+floatval($MachinePLPDuration)+floatval($MachinePLUDuration)+floatval($MachinePLQDuration)+floatval($MachinePLPerDuration);

        $tmp = array(
                "date"=>$date,
                "business"=>$MachinePLB,
                "planned"=>$MachinePLP,
                "unplanned"=>$MachinePLU,
                "performance"=>$MachinePLPer,
                "quality"=>$MachinePLQ,
                "total"=>$MachinePLT,
                "businessDuration"=>$MachinePLBDuration,
                "plannedDuration"=>$MachinePLPDuration,
                "unplannedDuration"=>$MachinePLUDuration,
                "performanceDuration"=>$MachinePLPerDuration,
                "qualityDuration"=>$MachinePLQDuration,
                "totalDuration"=>$MachinePLTDuration,

            );

        array_push($opportunityTrendDay,$tmp);

    }
        // echo "<pre>";
        // print_r($opportunityTrendDay);
        $out['data']=$opportunityTrendDay;
        $out['grand_total'] = (int)$GrantTotalPL;

        $end_time_opp_trend = microtime(true);
        $execution_time_opp_trend = ($end_time_opp_trend - $start_time_opp_trend);
        log_message("info","financial metrics opportunity trend function duration is :\t".$execution_time_opp_trend);


        echo json_encode($out);

    }


public function oeeDataTreand($MachineWiseDataRaw,$x,$part,$days,$noplan=false)
{
    $downData=[];
    foreach ($days as $d) {
        $DowntimeTimeData =[];
        foreach ($MachineWiseDataRaw as $Machine){
            $MachineOFFDown = 0;
            $UnplannedDown = 0;
            $PlannedDown = 0;
            $MachineId = "";
            foreach ($Machine as $key => $Part) {
                $MachineId = $key;
                foreach ($Part as $Record) {
                    $PartMachineOFFDown = 0;
                    $PartUnplannedDown = 0;
                    $PartPlannedDown = 0;
                    foreach ($Record as $Values) {
                        $tmpMachineOFFDown = 0;
                        $tmpPlannedDown = 0;
                        $tmpUnplannedDown = 0;
                        foreach ($Values as $key => $DTR) {
                            // if (($value['machine_id'] == $m['machine_id'] and $value['calendar_date']==$d and $event!="nodata") or ($value['machine_id'] == $m['machine_id'] and $DTR['calendar_date']==$d and $event!="offline")) {
                            if ($DTR['shift_date'] == $d) {
                                $part_id=$DTR['part_id'];
                                $st = explode(".", $DTR['split_duration']);
                                // One Tool, Multi-Part
                                $part_count = explode(",", $DTR['part_id']);
                                $st[0]=$st[0]/sizeof($part_count);
                                if (sizeof($st) > 1) {
                                    $st[1]=$st[1]/sizeof($part_count);
                                }

                                if (sizeof($st)>1) {
                                    $duration = ($st[0]+($st[1]/60));
                                }
                                else{
                                    $duration = ($st[0]);
                                }

                                $noplan = trim($DTR['downtime_reason']);
                                $noplan = strtolower(str_replace(" ","",$noplan));
                                if ($DTR['downtime_category'] == 'Planned' && $noplan == 'noplan' && $noplan == true) {
                                    $tmpMachineOFFDown = $tmpMachineOFFDown + $duration;
                                }
                                else if($DTR['downtime_category'] == 'Unplanned'){
                                    $tmpUnplannedDown = $tmpUnplannedDown + $duration;
                                }
                                else if(($DTR['downtime_category'] == 'Planned') && ($DTR['downtime_reason'] == 'Machine OFF')){
                                    $tmpMachineOFFDown = $tmpMachineOFFDown + $duration;
                                }
                                else {
                                    $tmpPlannedDown = $tmpPlannedDown + $duration;
                                }
                            }
                        }
                        $PartMachineOFFDown = $PartMachineOFFDown + $tmpMachineOFFDown; 
                        $PartUnplannedDown = $PartUnplannedDown + $tmpUnplannedDown;
                        $PartPlannedDown = $PartPlannedDown + $tmpPlannedDown;
                    }
                    $MachineOFFDown = $PartMachineOFFDown + $MachineOFFDown; 
                    $UnplannedDown = $PartUnplannedDown + $UnplannedDown;
                    $PlannedDown = $PartPlannedDown + $PlannedDown;
                }
            }

            $tempCalc = $MachineOFFDown + $UnplannedDown + $PlannedDown;
            $tmpDown = array("Machine_ID"=>$MachineId,"Planned"=>$PlannedDown,"Unplanned"=>$UnplannedDown,"Machine_OFF"=>$MachineOFFDown,"All"=>$tempCalc);
            array_push($DowntimeTimeData, $tmpDown);
        }
        $tmp = array("date"=>$d,"data"=>$DowntimeTimeData);
        array_push($downData,$tmp);
    }
        return $downData;
    }

    public function oeeTrendDay(){
        log_message("info","\n\n financial metrics oee drill down oee trend function calling !!");
        $start_time_logger_oee_trend = microtime(true);

        $ref = "OpportunityTrendDay";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");

        // $url = "http://localhost:8080/graph/oeeTrend/".$fromTime."/".$toTime."/";
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // $result = curl_exec($ch);
        // $res = json_decode($result);
        // echo json_encode($res);

        // $fromTime = "2022-12-16T09:00:00";
        // $toTime = "2022-12-16T21:00:00";

        $dstart = explode("T", $fromTime);
        $dend= explode("T", $toTime);
        $start_date = $dstart[0];   
        $end_date = $dend[0];

        $days=[];
        while (strtotime($start_date) <= strtotime($end_date)) {
            array_push($days,$start_date);
            $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
        }

        $rawData = $this->getDataRaw($ref,$fromTime,$toTime);
        $downtime = $this->oeeDataTreand($rawData['raw'],$rawData['machine'],$rawData['part'],$days,false);
        $partDetails = $this->Financial->PartDetails();
        $machineDetails = $this->Financial->getMachineDetails();

        $ref = "PerformanceOpportunity";
        $res = $this->getDataRaw($ref,$fromTime,$toTime);
        //Difference between two dates......

        // $diff = abs(strtotime($toTime) - strtotime($fromTime));
        // $AllTime = (int)($diff/60);

        $tmpFrom = explode("T",$fromTime);
        $tmpTo = explode("T",$toTime);
        // temporary time......
        $tempFrom = explode(":",$tmpFrom[1]);
        $tempTo = explode(":",$tmpTo[1]);
        $FromDate = $tmpFrom[0];
        $ToDate = $tmpTo[0];
        //Part list Details......
        $part = $this->Financial->getPartRec($FromDate,$ToDate);

        //Machine wise Performance,Quality,Availability........
        $data = [];
        foreach ($downtime as $d) {
            $MachineWiseData = [];
            $pv=0;
            $qv=0;
            $av=0;
            $ov=0;
            foreach ($d['data'] as $key => $down) {
                $All = 0;
                foreach ($rawData['downtimeTime'] as $dayDown) {
                    if ($dayDown['date'] == $d['date']) {
                        foreach ($dayDown['data'] as $dd) {
                            if ($dd['machine_id'] == $down['Machine_ID']) {
                                $All = $dd['duration'];
                            }
                        }
                    }
                }
                if ($All >0) {

                    $PlannedDownTime = $down['Planned'];
                    $UnplannedDownTime = $down['Unplanned'];
                    $MachineOFFDownTime = $down['Machine_OFF'];                    

                    $TotalCTPP_NICT = 0;
                    $TotalCTPP = 0 ;
                    $TotalReject = 0;
                    $TotalCTPP_NICT_Arry = [];
                    foreach ($part as $p) { 
                        $tmpCorrectedTPP_NICT = 0;
                        $tmpCorrectedTPP = 0;
                        $tmpReject = 0;
                        foreach ($res['production'] as $product) {
                            if ($product['machine_id'] == $down['Machine_ID'] && $p['part_id'] == $product['part_id'] && $product['shift_date'] == $d['date']) {
                                //To find NICT.....
                                $NICT = 0;
                                foreach ($partDetails as $partVal) {
                                    if ($p['part_id'] == $partVal['part_id']) {

                                        $mnict = explode(".", $partVal['NICT']);
                                        if (sizeof($mnict)>1) {
                                            $NICT = (($mnict[0]/60)+($mnict[1]/1000));
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
                                $tmpReject = $tmpReject+$product['rejections'];
                             }
                        }
                        
                        $TotalCTPP_NICT =$TotalCTPP_NICT+$tmpCorrectedTPP_NICT;
                        $TotalCTPP =$TotalCTPP+$tmpCorrectedTPP;
                        $TotalReject = $TotalReject+$tmpReject;
                    }

                    if ($TotalCTPP <=0) {
                        //Machine Wise Quality ......
                        $quality = 0;
                    }
                    else{
                        //Machine Wise Quality ......
                        $quality = floatval(($TotalCTPP - $TotalReject)/($TotalCTPP));
                    }

                    //Machine Wise Performance ......
                    $tp = $All-($down['Planned']+$down['Unplanned']+$down['Machine_OFF']);
                    if ($tp>0) {
                        $performance = floatval(($TotalCTPP_NICT)/($tp));
                    }
                    else{
                        $performance=0;
                    }

                    //Machine Wise Availability ......
                    if (floatval($All-($down['Planned']+$down['Machine_OFF'])) < 1) {
                        $availability=0;
                    }else{
                        $availability = floatval(($All-($down['Planned']+$down['Unplanned']+$down['Machine_OFF']))/($All-($down['Planned']+$down['Machine_OFF'])));
                    }
                    // Machine Wise Availability TEEP.......
                    if (floatval($All-$down['Planned']) < 0) {
                        $availTEEP=0;
                    }else{
                        $availTEEP = floatval($All-($down['Planned']+$down['Unplanned']+$down['Machine_OFF']))/($All);
                    }
                    // Machine Wise Availability OOE.....
                    if (floatval($All-$down['Machine_OFF']) <= 0) {
                        $availOOE=0;
                    }else{
                        $availOOE = floatval(($All-($down['Planned']+$down['Unplanned']+$down['Machine_OFF']))/($All-$down['Machine_OFF']));
                    }
                    //Machine Wise OEE .......
                    $oee = floatval(number_format(($performance*$quality*$availability),2));
                    // Machine Wise TEEP.....
                    $teep = floatval(number_format(($performance*$quality*$availTEEP),2));
                    // Machine Wise OOE.....
                    $ooe = floatval(number_format((($performance*$quality*$availOOE)),2));
                    //Store Machine wise Data......
                    $tmp = array("Machine_Id"=>$down['Machine_ID'],"Availability"=>$availability,"Performance"=>$performance,"Quality"=>$quality,"Availability_TEEP"=>$availTEEP,"Availability_OOE"=>$availOOE,"OEE"=>$oee,"TEEP"=>$teep,"OOE"=>$ooe);
                    array_push($MachineWiseData, $tmp);

                    $pv = floatval($pv) + floatval($performance);
                    $qv = floatval($qv) + floatval($quality);
                    $av = floatval($av) + floatval($availability);
                    $ov = floatval($ov) + floatval($ooe);
                }
            }

            $ov = (($pv/sizeof($downtime[0]['data']))*($qv/sizeof($downtime[0]['data']))*($av/sizeof($downtime[0]['data'])))*100;

            $timestamp = strtotime($d['date']);
            $m = date('m', $timestamp);
            $y = date('Y', $timestamp);
            $dd = date('d', $timestamp);

            $date = $dd."-".$m;

            $t = array("date"=>$date,"availability"=>(($av*100)/sizeof($downtime[0]['data'])),"performance"=>(($pv*100)/sizeof($downtime[0]['data'])),"quality"=>(($qv*100)/sizeof($downtime[0]['data'])),"oee"=>($ov));
            array_push($data,$t);
        }
        $out = $data;

        $end_time_logger_oee_trend = microtime(true);
        $execution_time_logger_oee_trend = ($end_time_logger_oee_trend - $start_time_logger_oee_trend);
        log_message("info","financial metrics oee drill down oee trend duration is :\t".$execution_time_logger_oee_trend);

        echo json_encode($out);
    }

    public function opportunitydrilldown(){

        log_message("info","\n\n financial metrics opportunity drill down graph functin calling !!");
        $start_time_opp_drill_down = microtime(true);

        $totalvalues=[];
        $totalreasons=[];
        $durationTotal=[];

        $ref = "PerformanceOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");

        // $url = "http://localhost:8080/graph/opportunity_drill_down/".$fromTime."/".$toTime."/";
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // $result = curl_exec($ch);
        // $res = json_decode($result);
        // echo json_encode($res);

        // $fromTime = "2022-12-18T09:00:00";
        // $toTime = "2022-12-18T21:00:00";

        // // Calculation for to find ALL time value
            $tmpFromDate =explode("T", $fromTime);
            $tmpToDate = explode("T", $toTime);

            //Difference between two dates......
            $diff = abs(strtotime($toTime) - strtotime($fromTime));
            $AllTime = (int)($diff/60);

            //time split for date+time seperated values
            $tmpFrom = explode("T",$fromTime);
            $tmpTo = explode("T",$toTime);
            // temporary time......
            $tempFrom = explode(":",$tmpFrom[1]);
            $tempTo = explode(":",$tmpTo[1]);
            //From date
            $FromDate = $tmpFrom[0];
            //milli seconds added ":00", because in real data milli seconds added
            $FromTime = $tempFrom[0].":00".":00";
            //Exact value
            //$FromTime = $tmpFrom[1];
            //To Date
            $ToDate = $tmpTo[0];
            //milli seconds added ":00"
            $ToTime = $tempTo[0].":00".":00";


        $machineData = $this->getDataRaw($ref,$fromTime,$toTime);
        $partDetails = $this->Financial->PartDetails();
        $machineDetails = $this->Financial->getMachineDetails();

        //Availability Opportunity.........
        $AvailabilityOpportunity=[];
        //Direct value for graph......
        $varDataMachine=[];
        foreach ($machineData['downtime'] as $machine) {
            $tmpMachine=[];
            //Direct value for graph......
            $varData=[];
            $All=0;
            foreach ($machineData['all'] as $key => $vd) {
                if ($vd['machine_id']==$machine['Machine_ID']) {
                    $All=$vd['duration'];
                }
            }
            if ($All>0) {
                foreach ($partDetails as $key => $part) {
                    $tmpPart=[];
                    $corrected_tppNICT=0;
                    $machineOFFRate=1;
                    foreach ($machineData['production'] as $val) {
                        if ($machine['Machine_ID']==$val['machine_id'] AND $part['part_id']==$val['part_id']) {
                            $corrected_tpp = (int)$val['production']+(int)($val['corrections']);

                            $NICT = 0;
                            $mnict = explode(".", $part['NICT']);
                            if (sizeof($mnict)>1) {
                                $NICT = (($mnict[0]/60)+($mnict[1]/1000));
                            }else{
                                $NICT = ($mnict[0]/60);
                            }

                            $ctpNICT = ($NICT)*$corrected_tpp;
                            $corrected_tppNICT = $corrected_tppNICT+$ctpNICT;
                        }
                    }

                    foreach($machineDetails as $m) {
                        if ($m['machine_id'] == $machine['Machine_ID']) {
                            $machineOFFRate = $m['rate_per_hour'];
                        }
                    }

                    $partRunningTime=0;
                    $downtime=0;
                    foreach ($machine['Part_Wise'] as $key => $value) {
                        $temp_split = explode(",", $value['part_id']);
                        foreach ($temp_split as $value_part) {
                            if ($part['part_id'] == $value_part) {
                                $partRunningTime=($value['PartInMachine'])-($value['Planed']+$value['Unplanned']);
                                $downtime=floatval($All)-floatval(floatval($machine['Planned'])+floatval($machine['Unplanned'])+floatval($machine['Machine_OFF']));
                            }
                        }
                    }

                    //For no production........
                    $Opportunity = (floatval(($downtime-$corrected_tppNICT))/floatval(60*(int)$machineOFFRate));

                    $partRunningDurationAtIdeal=$corrected_tppNICT;
                    $speedLoss= $partRunningTime-$partRunningDurationAtIdeal;

                    if (floatval($Opportunity)<0) {
                        $Opportunity=0;
                        $speedLoss=0;
                    }
                    $Opportunity= array('Opportunity' => floatval(number_format($Opportunity, 2)),'SpeedLoss'=>$speedLoss);
                    $temp = array("part_id"=>$part['part_id'],"data"=>$corrected_tppNICT,"OppCost"=>$Opportunity,"speedLoss"=>$speedLoss);
                    array_push($tmpMachine, $temp);
                    array_push($varData, $Opportunity);
                }
                // $x = array("machine_id"=>$machine['Machine_ID'],"machineData"=>$tmpMachine);
                // array_push($AvailabilityOpportunity, $x);

                $z= array("machine_id"=>$machine['Machine_ID'],"machineData"=>$varData);
                array_push($varDataMachine, $z);
            }
            
        }

        $length = sizeof($varDataMachine);
        $l=sizeof($partDetails);
        $partTotal=[];
        $speedTotal=0;
        $GrandTotal=0;
        for ($i=0; $i < $l ; $i++) { 
            $tmpPartTotal=0;
            // $tmpSpeedLoss=0;
            for ($j=0; $j <$length ; $j++) { 
                $tmpPartTotal=$tmpPartTotal+($varDataMachine[$j]['machineData'][$i]['Opportunity']);
                $speedTotal=$speedTotal+($varDataMachine[$j]['machineData'][$i]['SpeedLoss']);
            }   
            $GrandTotal=$GrandTotal+$tmpPartTotal;
            array_push($partTotal, $tmpPartTotal);
        }
        array_push($totalvalues, (int)$GrandTotal);
        array_push($totalreasons, "Performance");
        array_push($durationTotal, $speedTotal);

        //Availability.....
        //Raw data from Reason mapping Table...........
        $ref = "AvailabilityReasonWise";
        $rawData = $this->getDataRaw($ref,$fromTime,$toTime);

        // Machine Name and ID Reference............
        $MachineName = $this->Financial->getMachineRecGraph();

        // Downtime Reason.......
        $DowntimeReason = $this->Financial->downtimeReason();
        // Machine Data.........
        // $ReasonwiseData = $this->Financial->ReasonwiseData($FromDate,$ToDate);
                

        //Reason wise Availability for Logical Perspective..........
        $ReasonwiseAvailability =[];
        $AvailabilityTotal = [];
        
        $GrandTotal = 0;
        $finalArray=[];
        foreach ($MachineName as $key => $machine) {
            $ar=[];
            foreach ($DowntimeReason as $reason) {
                $i=0;
                $reasonValue=0;
                $total=0;
                $split_duration=0;
                foreach ($rawData as $key => $data) {
                    if ($machine['machine_id'] == $data['machine_id'] AND $reason['downtime_reason_id'] == $data['downtime_reason_id']) {
                        //Machine OFF reason
                        if ($reason['downtime_category']=="Planned" AND $reason['downtime_reason']=="Machine OFF") {
                            $st = explode(".", $data['split_duration']);
                            if (sizeof($st)>1) {
                                $duration = ($st[0]+($st[1]/60));
                            }
                            else{
                                $duration = ($st[0]);
                            }
                            
                            $reasonValue = $reasonValue +(($machine['machine_offrate_per_hour'])*(($duration)/60));
                        }
                        else{
                            $st = explode(".", $data['split_duration']);
                            if (sizeof($st)>1) {
                                $duration = ($st[0]+($st[1]/60));
                            }
                            else{
                                $duration = ($st[0]);
                            }
                            $reasonValue = $reasonValue +(($machine['rate_per_hour'])*(($duration)/60));
                        }
                        $st1 = explode(".", $data['split_duration']);
                        if (sizeof($st1)>1) {
                            $dur = ($st1[0]+($st1[1]/60));
                        }
                        else{
                            $dur = ($st1[0]);
                        }
                        $split_duration=$split_duration+$dur;
                    }
                }
                $reason_merge_name = $reason['downtime_reason']." (".strtoupper(str_split($reason['downtime_category'])[0]).")";
                $t=array("machine_id"=>$machine['machine_id'],"reason_id"=>$reason['downtime_reason_id'],"reason"=>$reason_merge_name,"machine_name"=>$machine['machine_name'],"oppCost"=>$reasonValue,"duration"=>$split_duration);
                array_push($ar,$t);
                $GrandTotal = $GrandTotal+$reasonValue;
            }
            array_push($finalArray,$ar);
        }

        foreach ($DowntimeReason as $key => $reason) {
            $reason_merge = $reason['downtime_reason']." (".strtoupper(str_split($reason['downtime_category'])[0]).")";
            $DowntimeReason[$key]['downtime_reason'] = $reason_merge;
        }

        $l=sizeof($DowntimeReason);
        $l1=sizeof($finalArray);
        
        $reasonTotal=[];
        for ($i=0; $i < $l; $i++) { 
            $total=0;
            $duration=0;
            for ($j=0; $j < $l1 ; $j++) { 
                $total=$total+floatval($finalArray[$j][$i]['oppCost']);
                $duration=$duration+$finalArray[$j][$i]['duration'];
            }
            array_push($reasonTotal,$total);

            array_push($totalvalues, $total);
            array_push($totalreasons, $DowntimeReason[$i]['downtime_reason']);
            array_push($durationTotal,$duration);
        }

        // Quality
        $qualityReason = $this->Financial->qualityReason();

        //Function call for production data............
        $ref = "qualityOpportunity";

        $ProductionData = $this->getDataRaw($ref,$fromTime,$toTime);
        $ProductionDataExpand = [];
        foreach ($ProductionData as $value) {
            if (trim($value['reject_reason']) !="" or trim($value['reject_reason']) !=null) {
                $reasons =  explode("&&", $value['reject_reason']);
                foreach ($reasons as $count) {
                    $tt = explode("&", $count);
                    $total = $tt[0];
                    //$temp = explode($total, $count);
                    $temp = $tt[1];
                    $tmp = array("machine_id"=>$value['machine_id'],"part_id"=>$value['part_id'],"reject_count"=>$total,"reject_reason"=>$temp,"total_reject"=>$total,"total_correct"=>$value['corrections'],"total_production"=>$value['production'],"shot_count"=>$value['actual_shot_count'],"start_time"=>$value['start_time'],"end_time"=>$value['end_time']);
                    array_push($ProductionDataExpand, $tmp);
                }
            }
        }

        $partDetails = $this->Financial->getPartDetails();

        $machineDetails = $this->Financial->getMachineDetails();

        //Part wise quality reason........
        $QualityAvailabilityData=[];
        $QualityAvailabilityActual =[];
        $PartArray =[];
        $ReasonArray=[];
        $totalReject=[];
        foreach ($partDetails as $part) {
            $tmpReason=[];
            $tmpActualReason=[];
            $rejectTotal=[];
            foreach ($qualityReason as $reason) {
                $tmpPart =[];
                $tmpTotalReject=0;
                $tmpOpportunityCost=0;
                foreach ($ProductionDataExpand as $production) {
                    if ($part['part_id'] == $production['part_id'] AND $reason['quality_reason_id'] == $production['reject_reason'])  {

                        $PartPrice = $part['part_price'];

                        $Rejects =$production['reject_count'];
                    
                        $OppCost = floatval($Rejects)*floatval($PartPrice);
                        $tmpTotalReject =$tmpTotalReject+$Rejects;
                        $tmpOpportunityCost=floatval($tmpOpportunityCost)+floatval($OppCost);
                    }
                }
                array_push($tmpReason, $tmpPart);

                $tmpOpportunityCost = floatval($tmpOpportunityCost);
                $tmpTotalReject = floatval($tmpTotalReject);
                
                array_push($rejectTotal,$tmpTotalReject);
                $tmpActual = array("Reason"=>$reason['quality_reason_name'],"TotalRejects"=>$tmpTotalReject,"TotalCost"=>$tmpOpportunityCost,"Part_Name"=>$part['part_name'],"reason_id"=>$reason['quality_reason_id']);
                array_push($tmpActualReason, $tmpActual);
            }
            
            //Part wise reason cumulative........
            $tmpAcualFinal = array("Part"=>$part['part_id'],"Reason"=>$tmpActualReason);
            array_push($QualityAvailabilityActual, $tmpAcualFinal);

            //Part Details..........
            array_push($PartArray,$part['part_id']);
            
        }
        foreach ($qualityReason as $key => $value) {
            array_push($ReasonArray, $value["quality_reason_name"]);
        }

        //Reason wise Total Cost Opportunity............
        $ReasonWiseTotal=[];
        foreach ($qualityReason as $key => $res) {
            $tmpCost = 0;
            $tmpreason="";
            foreach ($QualityAvailabilityActual as $part) {
                foreach ($part['Reason'] as $value) {
                    if ($value['reason_id'] == $res['quality_reason_id']) {
                        $tmpreason=$value['Reason'];
                        $tmpCost=(int)$tmpCost+(int)$value['TotalCost'];
                    }
                }
            }

            $duration =0;
            foreach ($totalReject as $k => $val) {
                if ($k == $key) {
                    $duration=(int)$duration+(int)$val[$k];
                }
            }
            array_push($ReasonWiseTotal, $tmpCost);
            array_push($totalvalues, $tmpCost);
            array_push($totalreasons, $tmpreason);
            array_push($durationTotal, $duration);
        }  

        $out['Reason']=$totalreasons;
        $out['Total']=$totalvalues;
        $out['Duration'] = $durationTotal;
        
        $res = $this->selectionSortDrillDown($out,sizeof($totalreasons));

        $end_time_opp_drill_down = microtime(true);
        $execution_time_opp_drill_down = ($end_time_opp_drill_down - $start_time_opp_drill_down);
        log_message("info","financial metrics function opportunity drill down duration is :\t".$execution_time_opp_drill_down);


        echo json_encode($res);
    }

    public function selectionSortDrillDown($arr, $n)
    {
        //int i, j, min_idx;
      
        // One by one move boundary of unsorted subarray
        for ($i = 0; $i < $n-1; $i++)
        {
            // Find the minimum element in unsorted array
            $min_idx = $i;
            for ($j = $i+1; $j < $n; $j++){
                if ($arr['Total'][$j] > $arr['Total'][$min_idx]){
                    $min_idx = $j;
                }
            }

            $temp = $arr['Total'][$i];
            $arr['Total'][$i] = $arr['Total'][$min_idx];
            $arr['Total'][$min_idx] = $temp;

            //Reason
            $temp1 = $arr['Reason'][$i];
            $arr['Reason'][$i] = $arr['Reason'][$min_idx];
            $arr['Reason'][$min_idx] = $temp1;

            //Duration
            $temp2 = $arr['Duration'][$i];
            $arr['Duration'][$i] = $arr['Duration'][$min_idx];
            $arr['Duration'][$min_idx] = $temp2;
        }

        for ($i = 0; $i < $n; $i++)
        {
            if ($arr['Total'][$i] <= 0){
                unset($arr['Total'][$i]);
                unset($arr['Reason'][$i]);
                unset($arr['Duration'][$i]);
            }
        }
        return $arr;
    }


    // test function test_model strategy model checking for site based
    // public function test_function(){
    //     $res = $this->Financial->getrecord_demo();

    //     echo json_encode($res);
    // }

}

?>