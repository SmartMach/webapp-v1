<?php 

namespace App\Controllers;
use App\Models\OEE_Drill_Down_Model;

class Common_Graph extends BaseController
{   
   
    function __construct(){
        //parent::__construct();
        $this->session = \Config\Services::session();
        //$this->session->remove('user_name');
        $this->data = new OEE_Drill_Down_Model();
    } 


    // data spliting in downtime and production main function for all graph
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
        $output = $this->data->getDataRaw($FromDate,$FromTime,$ToDate,$ToTime);
    
        // Data from PDM Events table for find the All Time Duration...........
        $getAllTimeValues = $this->data->getDataRawAll($FromDate,$ToDate);

        $getOfflineId = $this->data->getOfflineEventId($FromDate,$FromTime,$ToDate,$ToTime);

        // Get the Machine Record.............
        $machine = $this->data->getMachineRecActive($FromDate,$ToDate);

        //Part list Details from Production Info Table between the given from and To durations......
        $part = $this->data->getPartRec($FromDate,$ToDate);

        //Production Data for PDM_Production_Info Table......
        $production = $this->data->getProductionRec($FromDate,$ToDate);

        // Get the Inactive(Current) Data.............
        $getInactiveMachine = $this->data->getInactiveMachineData();

        // Date Filte for PDM Reason Mapping Data........
        $len_id = sizeof($getOfflineId);
        $s_time_range_limit =  strtotime($FromDate." ".$FromTime);
        $e_time_range_limit =  strtotime($ToDate." ".$ToTime);

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
                    $s_time_range =  strtotime($value['calendar_date']." ".$value['start_time']);
                    // $e_time_range =  strtotime($value['calendar_date']." ".$value['end_time']);
                    $duration_min =0;
                    $duration_sec =0;

                    $tmp = explode(".", $value['split_duration']);
                    if (sizeof($tmp) >1) {
                        $duration_min = floatval($tmp[0]);
                        $duration_sec = floatval($tmp[1]);
                    }
                    else{
                        $duration_min = floatval($tmp[0]);
                    }
                    $duration = (int)(($duration_min*60) + ($duration_sec));
                    $e_time_range = $s_time_range + $duration;

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
                $s_time_range =  strtotime($value['calendar_date']." ".$value['start_time']);
                // $e_time_range =  strtotime($value['calendar_date']." ".$value['end_time']);
                $duration_min =0;
                $duration_sec =0;

                $tmp = explode(".", $value['duration']);
                if (sizeof($tmp) >1) {
                    $duration_min = floatval($tmp[0]);
                    $duration_sec = floatval($tmp[1]);
                }
                else{
                    $duration_min = floatval($tmp[0]);
                }
                $duration = (int)(($duration_min*60) + ($duration_sec));
                $e_time_range = $s_time_range + $duration;

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
            $s_time_range =  strtotime($value['calendar_date']." ".$value['start_time']);
            $e_time_range =  strtotime($value['calendar_date']." ".$value['end_time']);
            
            if ($s_time_range < $s_time_range_limit) {
                unset($production[$key]);
            }
            elseif ($e_time_range > $e_time_range_limit){
                unset($production[$key]);
            }
            elseif ($s_time_range >= $e_time_range_limit) {
                unset($production[$key]);
            }

            // For remove the current data of inactive machines.........
            foreach ($getInactiveMachine as $v) {
                $start_time_range =  strtotime($v['max(r.last_updated_on)']);
                if ($s_time_range_limit > $start_time_range && $value['machine_id'] == $v['machine_id']){
                    unset($production[$key]);
                }
            }
        }

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
        $partsDetails = $this->data->settings_tools(); 
        
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


    public function calculateOverallOEE($MachineWiseData){
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

    //Downtime reasons data ordering.....
    public function storeData($rawData,$machine,$part){ 
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


    // Machine-Wise Downtime........
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
    
    // Day-wise With Machine-Wise Downtime....
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

    // 
    public function oeeData($MachineWiseDataRaw,$getAllTimeValues,$noplan=false){
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

    // 
    public function getDuration($f,$t){
        $from_time = strtotime($f); 
        $to_time = strtotime($t); 
        $diff_minutes = (int)(abs($from_time - $to_time) / 60);
        $diff_sec = abs($from_time - $to_time) % 60;
        $duration = $diff_minutes.".".$diff_sec;
        return $duration;
    }


    // OEE TREND DAY WISE GRAPH 
    public function oeeDataTreand($MachineWiseDataRaw,$x,$part,$days,$noplan=false){
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

                                    $noplan_c = trim($DTR['downtime_reason']);
                                    $noplan_c = strtolower(str_replace(" ","",$noplan));
                                    if ($DTR['downtime_category'] == 'Planned' && $noplan_c == 'noplan' && $noplan == true) {
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

    // 

}



?>