<?php 
namespace App\Controllers;
use App\Models\MainModel;
use App\Models\Production_Quality_Model;
use App\Models\User_Model;

class Production_Quality extends BaseController
{   
    function __construct(){
        //parent::__construct();
        $this->session = \Config\Services::session();
        //$this->session->remove('user_name');
        $this->data = array();
        $this->Financial = new Production_Quality_Model();
        $this->User = new User_Model();
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
           //return $production;
            // Get the Inactive(Current) Data.............
            $getInactiveMachine = $this->Financial->getInactiveMachineData();

            // Date Filte for PDM Reason Mapping Data........
            $len_id = sizeof($getOfflineId);

            $_ftime = strtotime($fromTime);
            $_ttime = strtotime($toTime);

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
                        $e_time_range =  strtotime($value['calendar_date']." ".$value['end_time']);

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
                    $e_time_range =  strtotime($value['calendar_date']." ".$value['end_time']);

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


    
            //Function return for qualityOpportunity graph........
            if ($graphRef == "qualityOpportunity") {
                return $production;
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

    public function qualityOpportunity(){

        log_message("info","\n\n production quality COPQP graph function calling !!");
        $start_time_logger_COPQP = microtime(true);
        //Function call for production data............
        $ref = "qualityOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");

        // $fromTime = "2023-08-04T12:00:00";
        // $toTime = "2023-08-10T11:00:00";

        // $url = "http://localhost:8080/graph/qualityOpportunity/".$fromTime."/".$toTime."/";
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // $result = curl_exec($ch);
        // $res = json_decode($result);
        // echo json_encode($res);

        $qualityReason_filter = $this->Financial->qualityReason();
        $qualityReason = $this->request->getVar("reason");
        // $qualityReason = [];

        $ProductionData = $this->getDataRaw($ref,$fromTime,$toTime);

        $partDetails_filter = $this->Financial->getPartDetails();
        $partDetails = $this->request->getVar("part");
        // $partDetails = ['PT1001'];

        // echo "<pre>";
        // print_r($partDetails_filter);

        $machineDetails_filter = $this->Financial->getMachineDetails();
        $machineDetails = $this->request->getVar("machine");
        // $machineDetails = ["MC1001"];

        $ProductionDataExpand = [];
        foreach ($ProductionData as $k => $value) {
            $m=0;
            foreach ($machineDetails as $key) {
                if ($key == $value['machine_id']) {
                    $m=1;
                }
            }
            if ($m==1) { 

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
            }else{
                unset($ProductionData[$k]);
            }
        }



        // Part wise quality reason........
        $QualityAvailabilityData=[];
        $QualityAvailabilityActual =[];
        $PartArray =[];
        $ReasonArray=[];
        $totalReject=[];
        
        foreach ($partDetails as $p) {
            $part = [];
            // Part Filter.....
            foreach ($partDetails_filter as $value) {
                if ($p == $value['part_id']) {
                    $part = $value;
                }
            }
            $tmpReason=[];
            $tmpActualReason=[];
            $rejectTotal=[];
            foreach ($qualityReason as $r) {
                $tmpPart =[];
                $tmpTotalReject=0;
                $tmpOpportunityCost=0;
                $reason = [];
                foreach ($qualityReason_filter as $value) {
                    if ($r == $value['quality_reason_id']) {
                        $reason = $value;
                    }
                }
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
        foreach ($qualityReason as $key => $r) {
            foreach ($qualityReason_filter as $value) {
                if ($r == $value['quality_reason_id']) {
                    array_push($ReasonArray, $value["quality_reason_name"]);
                    array_push($qreason, $value["quality_reason_id"]);
                }
            }
        }
        
        //Reason wise Total Cost Opportunity............
        $OverallOpportunity = 0;
        $ReasonWiseTotal=[];
        // echo "<pre>";
        // print_r($qreason);
        foreach ($qreason as $key => $res) {
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
        // $result['OppCost'] = $QualityAvailabilityActual;
        // $result['Part'] = $PartArray;
        $result['Reason']=$ReasonArray;
        $result['GrandTotal']=$OverallOpportunity;
        $result['Total']=$ReasonWiseTotal;

        $out = $this->selectionSortQualityOpp($result,sizeof($result['Total']));

        $end_time_logger_COPQP = microtime(true);
        $execution_time_logger_copqp = ($end_time_logger_COPQP - $start_time_logger_COPQP);
        log_message("info","production quality copqp function execution duration is :\t".$execution_time_logger_copqp);


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
        }

        // Remove the Zero values....
        for ($i = 0; $i < $n; $i++)
        {   
            if ($arr['Total'][$i] <= 0){
                unset($arr['Total'][$i]);
                unset($arr['Reason'][$i]);
            }
        }
        return $arr;
    }

    public function qualityOpportunitypartsreason(){

        log_message("info","\n\nproduction quality CQRP graph function calling !!");
        $start_time_logger_CQRP = microtime(true);

        //Function call for production data............
        $ref = "qualityOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        // $fromTime = "2023-02-12T09:00:00";
        // $toTime = "2023-02-28T21:00:00";

        // $url = "http://localhost:8080/graph/qualityOpportunity/".$fromTime."/".$toTime."/";
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // $result = curl_exec($ch);
        // $res = json_decode($result);
        // echo json_encode($res);

    
        $ProductionData = $this->getDataRaw($ref,$fromTime,$toTime);

        $qualityReason = $this->Financial->qualityReason();
        $qualityReason_filter = $this->request->getVar("reason");
        // $qualityReason_filter =["4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23"];

        $ProductionData = $this->getDataRaw($ref,$fromTime,$toTime);

        $partDetails = $this->Financial->getPartDetails();
        $partDetails_filter = $this->request->getVar("part");
        // $partDetails_filter = ["PT1001","PT1003","PT1004","PT1005","PT1006","PT1007","PT1008","PT1009","PT1010","PT1011","PT1012","PT1013","PT1014","PT1015","PT1016","PT1017","PT1018"];

        $machineDetails_filter = $this->Financial->getMachineDetails();
        $machineDetails = $this->request->getVar("machine");
        // $machineDetails = ["MC1001","MC1002","MC1003","MC1004"];

        $ProductionDataExpand = [];
        foreach ($ProductionData as $k => $value) {
            $m=0;
            foreach ($machineDetails as $key) {
                if ($key == $value['machine_id']) {
                    $m=1;
                }
            }
            if ($m==1) {
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
            }else{
                unset($ProductionData[$k]);
            }
        }

        
        $reasonwise =[];
        $totalPart=0;
        foreach ($qualityReason as $key => $value) {
            $tmpPart =[];
            
            // Reason Filter....
            if (in_array($value['quality_reason_id'], $qualityReason_filter)) {
                foreach ($partDetails as $part) {
                    $tmpTotalReject=0;
                    $tmpOpportunityCost=0;
                    // Part Filter....
                    if (in_array($part['part_id'], $partDetails_filter)) {
                        foreach ($ProductionDataExpand as $production) {
                            // Machine Filter....
                            if ($part['part_id'] == $production['part_id'] AND $value['quality_reason_id'] == $production['reject_reason'] AND in_array($production['machine_id'], $machineDetails)){

                                $PartPrice = $part['part_price'];
                                $Rejects =$production['reject_count'];
                                $OppCost = floatval($Rejects)*floatval($PartPrice);
                                $tmpTotalReject =$tmpTotalReject+$Rejects;
                                $tmpOpportunityCost=floatval($tmpOpportunityCost)+floatval($OppCost);
                            }
                        }
                        $ar = array('part_id' => $part['part_id'],'part_name' => $part['part_name'], 'reject'=> $tmpTotalReject , 'cost'=>$tmpOpportunityCost,'cost'=>$tmpOpportunityCost);
                        $totalPart = $totalPart + $tmpOpportunityCost;
                        array_push($tmpPart, $ar);
                    }
                }

                $arr  = array('reason' => $value['quality_reason_name'] , 'part_1' => $tmpPart);
                array_push($reasonwise, $arr);
            }
        }

        $GrandTotal =0;
        $total=[];

        $len_part = sizeof($partDetails_filter);
        $len_reason = sizeof($qualityReason_filter);

        for($i=0;$i<$len_part;$i++){
            $t=0;
            for ($j=0; $j < $len_reason ; $j++) { 
                $t = $t + $reasonwise[$j]['part_1'][$i]['reject'];
            }
            $GrandTotal=$GrandTotal+$t;
            array_push($total, $t);
        }

        $part_filter = [];
        foreach ($partDetails_filter as $value) {
            foreach ($partDetails as $p) {
                if ($value == $p['part_id']) {
                    array_push($part_filter, $p['part_name']);
                }
            }
        }


        $result['Part']=$reasonwise;
        $result['GrandTotal']=$GrandTotal;
        $result['Part_List'] = $part_filter;
        $result['Total']=$total;

        $out = $this->selectionSortQualityPartsReason($result,sizeof($result['Total']));

        $end_time_logger_CQRP = microtime(true);
        $execution_time_logger_cqrp = ($end_time_logger_CQRP - $start_time_logger_CQRP);
        log_message("info","prodcution quality cqrp graph function execution duration :\t".$execution_time_logger_cqrp);


        echo json_encode($out);
        // echo "<pre>";
        // print_r($out);

    }

    public function selectionSortQualityPartsReason($arr, $n)
    {
        //int i, j, min_idx;
      
        $p = sizeof($arr['Part']);

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

            $temp2 = $arr['Part_List'][$i];
            $arr['Part_List'][$i] = $arr['Part_List'][$min_idx];
            $arr['Part_List'][$min_idx] = $temp2;

            $l = sizeof($arr['Part'][0]['part_1']);
            for ($k=0; $k < $p; $k++) {
                for ($m=0; $m < $l ; $m++) {
                    if ($m == $min_idx) {
                        $temp1 = $arr['Part'][$k]['part_1'][$i];

                        $arr['Part'][$k]['part_1'][$i] = $arr['Part'][$k]['part_1'][$min_idx];
                        $arr['Part'][$k]['part_1'][$min_idx] = $temp1;
                    }
                }
            }
        }

        $l = sizeof($arr['Part'][0]['part_1']);
        for ($i = 0; $i < $n; $i++)
        {   
            if ($arr['Total'][$i] <=0 ) {
                unset($arr['Total'][$i]);
                unset($arr['Part_List'][$i]);
                for ($k=0; $k < $p; $k++) {
                    for ($m=0; $m <$l ; $m++) {
                        if ($m == $i) {
                            unset($arr['Part'][$k]['part_1'][$i]);
                        }
                    }
                }
            }
        }
        return $arr;  
    }

    public function qualityOpportunityparts(){

        log_message("info","\n\n production quality qualityOpportunityparts grpah function calling !!");
        $start_time_logger_qualityOpportunityparts = microtime(true);

        //Function call for production data............
        $ref = "qualityOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        // $fromTime = "2023-02-12T09:00:00";
        // $toTime = "2023-02-28T21:00:00";

        // $url = "http://localhost:8080/graph/qualityOpportunity/".$fromTime."/".$toTime."/";
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // $result = curl_exec($ch);
        // $res = json_decode($result);
        // echo json_encode($res);

        $qualityReason = $this->Financial->qualityReason();
        $qualityReason_filter = $this->request->getVar("reason");
        // $qualityReason_filter =["1","2","3"];

        $ProductionData = $this->getDataRaw($ref,$fromTime,$toTime);

        $partDetails = $this->Financial->getPartDetails();
        $partDetails_filter = $this->request->getVar("part");
        // $partDetails_filter = ["PT1001","PT1002","PT1003"];

        $machineDetails_filter = $this->Financial->getMachineDetails();
        $machineDetails = $this->request->getVar("machine");
        // $machineDetails = ["MC1001","MC1002","MC1003"];


        $ProductionData = $this->getDataRaw($ref,$fromTime,$toTime);

        $ProductionDataExpand = [];
        foreach ($ProductionData as $k => $value) {
            $m=0;
            foreach ($machineDetails as $key) {
                if ($key == $value['machine_id']) {
                    $m=1;
                }
            }
            if ($m==1) {
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
            }else{
                unset($ProductionData[$k]);
            }
        }
        
        $tmpPart =[];
        $totalPart=0;
        foreach ($partDetails as $part) {
            if (in_array($part['part_id'], $partDetails_filter)) {
                $tmpTotalReject=0;
                $tmpOpportunityCost=0;
                foreach ($ProductionDataExpand as $production) {
                    if (in_array($production['reject_reason'], $qualityReason_filter)) {
                        if ($part['part_id'] == $production['part_id']){
                            $PartPrice = $part['part_price'];
                            $Rejects =$production['reject_count'];
                            $OppCost = floatval($Rejects)*floatval($PartPrice);
                            $tmpTotalReject =$tmpTotalReject+$Rejects;
                            $tmpOpportunityCost=floatval($tmpOpportunityCost)+floatval($OppCost);
                        }
                    }
                }
                if ($tmpTotalReject > 0) {
                    $ar = array('part_id' => $part['part_id'],'part_name' => $part['part_name'], 'reject'=> $tmpTotalReject , 'cost'=>$tmpOpportunityCost);
                    $totalPart = $totalPart + $tmpOpportunityCost;
                    array_push($tmpPart, $ar);
                }
                
            }
        }

        $result['Part']=$tmpPart;
        $result['GrandTotal']=$totalPart;

        $out = $this->selectionSortQualityParts($result,sizeof($result['Part']));

        $end_Time_logger_qualityOpportunityparts = microtime(true);
        $execution_time_logger_qualityOpportunityparts = ($end_Time_logger_qualityOpportunityparts - $start_time_logger_qualityOpportunityparts);
        log_message("info","production quality qualityOpportunityparts graph execution duration is :\t".$execution_time_logger_qualityOpportunityparts);


        echo json_encode($out);
        // echo "<pre>";
        // print_r($out);
    }

    public function selectionSortQualityParts($arr, $n)
    {
        //int i, j, min_idx;
      
        // One by one move boundary of unsorted subarray
        for ($i = 0; $i < $n-1; $i++)
        {
            // Find the minimum element in unsorted array
            $min_idx = $i;
            for ($j = $i+1; $j < $n; $j++){
                if ($arr['Part'][$j]['cost'] > $arr['Part'][$min_idx]['cost']){
                    $min_idx = $j;
                }
            }

            $temp = $arr['Part'][$i];
            $arr['Part'][$i] = $arr['Part'][$min_idx];
            $arr['Part'][$min_idx] = $temp;
        }

        for ($i = 0; $i < $n; $i++){
            if ($arr['Part'][$i]['cost'] <=0 ) {
               unset($arr['Part'][$i]['cost']);
            }
        }
        return $arr;
    }

    public function qualityOpportunityRejectionWise(){

        log_message("info","\n\n Production quality QRBR graph function calling !!");
        $start_time_logger_QRBR = microtime(true);

        //Function call for production data............
        $ref = "qualityOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        // $fromTime = "2023-02-13T09:00:00";
        // $toTime = "2023-02-28T21:00:00";

        // $url = "http://localhost:8080/graph/qualityOpportunity/".$fromTime."/".$toTime."/";
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // $result = curl_exec($ch);
        // $res = json_decode($result);
        // echo json_encode($res);x

        $ProductionData = $this->getDataRaw($ref,$fromTime,$toTime);


        $qualityReason = $this->Financial->qualityReason();
        $qualityReason_filter = $this->request->getVar("reason");

        $ProductionData = $this->getDataRaw($ref,$fromTime,$toTime);

        $partDetails = $this->Financial->getPartDetails();
        $partDetails_filter = $this->request->getVar("part");

        $machineDetails_filter = $this->Financial->getMachineDetails();
        $machineDetails = $this->request->getVar("machine");
        

        $ProductionDataExpand = [];
        foreach ($ProductionData as $k => $value) {
            $m=0;
            foreach ($machineDetails as $key) {
                if ($key == $value['machine_id']) {
                    $m=1;
                }
            }
            if ($m==1) {
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
            }else{
                unset($ProductionData[$k]);
            }
        }

        $tmpActualReason=[];
        $rejectTotal=[];
        $rejectReason=[];
        $GrandTotal =0;
        
        foreach ($qualityReason as $reason) {
            $tmpTotalReject=0;
            if (in_array($reason['quality_reason_id'],$qualityReason_filter)) {
                foreach ($ProductionDataExpand as $production) {
                    if ($reason['quality_reason_id'] == $production['reject_reason'] and in_array($production['part_id'], $partDetails_filter)){
                        $Rejects =$production['reject_count'];
                        $tmpTotalReject =$tmpTotalReject+$Rejects;
                    }
                }

                $GrandTotal = $GrandTotal + $tmpTotalReject;
                array_push($rejectTotal,$tmpTotalReject);
                array_push($rejectReason,$reason['quality_reason_name']);
                $tmpActual = array("Reason"=>$reason['quality_reason_id'],"TotalRejects"=>$tmpTotalReject,"Reason_Name" =>$reason['quality_reason_name']);
                array_push($tmpActualReason, $tmpActual);
            }
        }
 
        $result['Rejection'] = $rejectTotal;
        $result['Reason']=$rejectReason;
        $result['GrandTotal']=$GrandTotal;

        $out = $this->selectionSortQualityRejection($result,sizeof($result['Reason']));

        $end_time_logger_QRBR = microtime(true);
        $execution_time_logger_QRBR = ($end_time_logger_QRBR - $start_time_logger_QRBR);
        log_message("info","production quality QRBR graph execution duration is :\t".$execution_time_logger_QRBR);

        echo json_encode($out);
    }

    public function selectionSortQualityRejection($arr, $n)
    {
        //int i, j, min_idx;
      
        // One by one move boundary of unsorted subarray
        for ($i = 0; $i < $n-1; $i++)
        {
            // Find the minimum element in unsorted array
            $min_idx = $i;
            for ($j = $i+1; $j < $n; $j++){
                if ($arr['Rejection'][$j] > $arr['Rejection'][$min_idx]){
                    $min_idx = $j;
                }
            }

            $temp = $arr['Rejection'][$i];
            $arr['Rejection'][$i] = $arr['Rejection'][$min_idx];
            $arr['Rejection'][$min_idx] = $temp;

            $temp1 = $arr['Reason'][$i];
            $arr['Reason'][$i] = $arr['Reason'][$min_idx];
            $arr['Reason'][$min_idx] = $temp1;          
        }

        // Remove the Zero values....
        for ($i = 0; $i < $n; $i++)
        {   
            if ($arr['Rejection'][$i] <= 0){
                unset($arr['Rejection'][$i]);
                unset($arr['Reason'][$i]);
            }
        }

        return $arr;
    }

    public function qualityOpportunityMachine(){

        log_message("info","\n\nproduction quality graph COPQM function calling !!");
        $start_time_logger_COPQM = microtime(true);

        //Function call for production data............
        $ref = "qualityOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        // $fromTime = "2023-08-04T12:00:00";
        // $toTime = "2023-08-10T11:00:00";

        $ProductionData = $this->getDataRaw($ref,$fromTime,$toTime);

        $qualityReason = $this->Financial->qualityReason();
        $qualityReason_filter = $this->request->getVar("reason");

        $ProductionData = $this->getDataRaw($ref,$fromTime,$toTime);

        $partDetails = $this->Financial->getPartDetails();
        $partDetails_filter = $this->request->getVar("part");

        $machineDetails_filter = $this->Financial->getMachineDetails();
        $machineDetails = $this->request->getVar("machine");

        $ProductionDataExpand = [];
        foreach ($ProductionData as $k => $value) {
            $m=0;
            foreach ($machineDetails as $key) {
                if ($key == $value['machine_id']) {
                    $m=1;
                }
            }
            if ($m==1) {
                if (trim($value['reject_reason']) !="" or trim($value['reject_reason']) !=null) {
                    $reasons =  explode("&&", $value['reject_reason']);
                    foreach ($reasons as $count) {
                        $tt = explode("&", $count);
                        $total = $tt[0];
                        $temp = $tt[1];
                        $tmp = array("machine_id"=>$value['machine_id'],"part_id"=>$value['part_id'],"reject_count"=>$total,"reject_reason"=>$temp,"total_reject"=>$total,"total_correct"=>$value['corrections'],"total_production"=>$value['production'],"shot_count"=>$value['actual_shot_count'],"start_time"=>$value['start_time'],"end_time"=>$value['end_time']);
                        array_push($ProductionDataExpand, $tmp);
                    }
                }
            }else{
                unset($ProductionData[$k]);
            }
        }

        $machineRejection=[];
        $machinewisecost=[];
        $machinearray=[];
        $GrandTotal=0;   

        foreach ($machineDetails_filter as $machine) {
            $tmpTotalReject=0;
            $tmpOpportunityCost =0;
            // Machine Filters...
            if (in_array($machine['machine_id'], $machineDetails)) {
                foreach ($partDetails as $part) {
                    // Part Filters...
                    if (in_array($part['part_id'], $partDetails_filter)) {
                        foreach ($qualityReason as $reason) {
                            if (in_array($reason['quality_reason_id'], $qualityReason_filter)) {
    
                                foreach ($ProductionDataExpand as $production) {
                                    if ($part['part_id'] == $production['part_id'] AND $reason['quality_reason_id'] == $production['reject_reason'] AND $machine['machine_id'] == $production['machine_id']){
                                        $PartPrice = $part['part_price'];
                                        $Rejects =$production['reject_count'];
                                        $OppCost = floatval($Rejects)*floatval($PartPrice);
                                        $tmpTotalReject =$tmpTotalReject+$Rejects;
                                        $tmpOpportunityCost=floatval($tmpOpportunityCost)+floatval($OppCost);
                                    }
                                }
                            }
                        }
                    }
                }
            }
            $GrandTotal=$GrandTotal+$tmpOpportunityCost;
            array_push($machinearray, $machine['machine_name']);
            array_push($machineRejection, $tmpTotalReject);
            array_push($machinewisecost, $tmpOpportunityCost);
        }

        $result['Machine']=$machinearray;
        $result['MachineWiseRejection']=$machineRejection;
        $result['MachineCost']=$machinewisecost;
        $result['GrandTotal']=$GrandTotal;

        $out = $this->selectionSortByMachine($result,sizeof($result['Machine']));

        $end_time_logger_COPQM = microtime(true);
        $execution_time_logger_COPQM = ($end_time_logger_COPQM - $start_time_logger_COPQM);
        log_message("info","production quality COPQM graph execution duration is :\t".$execution_time_logger_COPQM);


        echo json_encode($out);
    }

        public function selectionSortByMachine($arr, $n)
    {
        //int i, j, min_idx;
      
        // One by one move boundary of unsorted subarray
        for ($i = 0; $i < $n-1; $i++)
        {
            // Find the minimum element in unsorted array
            $min_idx = $i;
            for ($j = $i+1; $j < $n; $j++){
                if ($arr['MachineCost'][$j] > $arr['MachineCost'][$min_idx]){
                    $min_idx = $j;
                }
            }

            $temp = $arr['MachineCost'][$i];
            $arr['MachineCost'][$i] = $arr['MachineCost'][$min_idx];
            $arr['MachineCost'][$min_idx] = $temp;

            $temp1 = $arr['Machine'][$i];
            $arr['Machine'][$i] = $arr['Machine'][$min_idx];
            $arr['Machine'][$min_idx] = $temp1;

            $temp2 = $arr['MachineWiseRejection'][$i];
            $arr['MachineWiseRejection'][$i] = $arr['MachineWiseRejection'][$min_idx];
            $arr['MachineWiseRejection'][$min_idx] = $temp2;          

        }

        for ($i = 0; $i < $n; $i++)
        {   
            if ($arr['MachineCost'][$i] <=0 ) {
                unset($arr['MachineCost'][$i]);
                unset($arr['Machine'][$i]);
                unset($arr['MachineWiseRejection'][$i]);
            }
        }

        return $arr;
    }


    public function qualityOpportunityMachineReason(){

        //Function call for production data............
        log_message("info","\n\n production quality module CRBMR graph function calling !!");
        $start_time_logger_CRBMR = microtime(true);

        $ref = "qualityOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        // $fromTime = "2023-02-12T09:00:00";
        // $toTime = "2023-02-28T21:00:00";

        $ProductionData = $this->getDataRaw($ref,$fromTime,$toTime);

        $qualityReason = $this->Financial->qualityReason();
        $qualityReason_filter = $this->request->getVar("reason");
        // $qualityReason_filter =["4","5","6","7","8","9","10"];

        $ProductionData = $this->getDataRaw($ref,$fromTime,$toTime);

        $partDetails = $this->Financial->getPartDetails();
        $partDetails_filter = $this->request->getVar("part");
        // $partDetails_filter = ["PT1001","PT1002","PT1003"];

        $machineDetails_filter = $this->Financial->getMachineDetails();
        $machineDetails = $this->request->getVar("machine");
        // $machineDetails = ["MC1001","MC1002","MC1003"];


        $ProductionDataExpand = [];
        foreach ($ProductionData as $k => $value) {
            $m=0;
            foreach ($machineDetails as $key) {
                if ($key == $value['machine_id']) {
                    $m=1;
                }
            }
            if ($m==1) {
                if (trim($value['reject_reason']) !="" or trim($value['reject_reason']) !=null) {
                    $reasons =  explode("&&", $value['reject_reason']);
                    foreach ($reasons as $count) {
                        $tt = explode("&", $count);
                        $total = $tt[0];
                        $temp = $tt[1];
                        $tmp = array("machine_id"=>$value['machine_id'],"part_id"=>$value['part_id'],"reject_count"=>$total,"reject_reason"=>$temp,"total_reject"=>$total,"total_correct"=>$value['corrections'],"total_production"=>$value['production'],"shot_count"=>$value['actual_shot_count'],"start_time"=>$value['start_time'],"end_time"=>$value['end_time']);
                        array_push($ProductionDataExpand, $tmp);
                    }
                }
            }else{
                unset($ProductionData[$k]);
            }
        }

        $machineRejection=[];
        $machinewisecost=[];
        $machinearray=[];
        $GrandTotal=0;
        $reject_machine=[];
        foreach ($qualityReason as $reason) {
            $machinewise=[];
            // Reason Filter....
            if (in_array($reason['quality_reason_id'], $qualityReason_filter)) {
                foreach ($machineDetails_filter as $machine) {
                    // Machine Filter....
                    if (in_array($machine['machine_id'], $machineDetails)) {
                        $machineWiseReject=0;
                        foreach ($partDetails as $part) {
                            // Part Filter....
                            // if (in_array($part['part_id'], $partDetails_filter)) {
                                foreach ($ProductionDataExpand as $production) {
                                    if ($part['part_id'] == $production['part_id'] AND $reason['quality_reason_id'] == $production['reject_reason'] AND $machine['machine_id'] == $production['machine_id']){
                                        $PartPrice = $part['part_price'];
                                        $Rejects =$production['reject_count'];
                                        $machineWiseReject =$machineWiseReject+$Rejects;
                                    }
                                }
                            // }
                        }
                        $arr = array("Machine_id"=>$machine['machine_name'],"Rejection"=>$machineWiseReject);
                        array_push($machinewise, $arr);
                    }
                }
                $ar = array('Reason' => $reason['quality_reason_name'],'Machine' => $machinewise);
                array_push($reject_machine,$ar);
            }
        }

        $machine_ar = [];
        foreach ($machineDetails_filter as $key => $value) {
            if (in_array($value['machine_id'], $machineDetails)) {
                array_push($machine_ar, $value['machine_name']);
            }
        }

        $GrandTotal =0;
        $total=[];

        $len_machine = sizeof($machineDetails);
        $len_reason = sizeof($qualityReason_filter);

        for($i=0;$i<$len_machine;$i++){
            $t=0;
            for ($j=0; $j < $len_reason ; $j++) {  
                $t = $t + $reject_machine[$j]['Machine'][$i]['Rejection'];
            }
            $GrandTotal=$GrandTotal+$t;
            array_push($total, $t);
        }

        $result['Total']=$total;
        $result['Rejection']=$reject_machine;
        $result['Machine_name']=$machine_ar;
        $result['GrandTotal']=$GrandTotal;

       $out = $this->selectionSortByMachineReason($result,sizeof($result['Total']));
        // echo"<pre>";
        // print_r($result);
        $end_time_logger_CRBMR = microtime(true);
        $execution_time_logger_CRBMR = ($end_time_logger_CRBMR - $start_time_logger_CRBMR);
        log_message("info","production quality grpah CRBMR execution duraiton is :\t".$execution_time_logger_CRBMR);


        echo json_encode($out);
    }

    public function selectionSortByMachineReason($arr, $n)
    {
        //int i, j, min_idx;
      
        $j_1 = sizeof($arr['Rejection']);
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

            $temp2 = $arr['Machine_name'][$i];
            $arr['Machine_name'][$i] = $arr['Machine_name'][$min_idx];
            $arr['Machine_name'][$min_idx] = $temp2;

            $l = sizeof($arr['Rejection'][0]['Machine']);

            for ($k=0; $k < $j_1; $k++) {
                for ($m=0; $m <$l ; $m++) {
                    if ($m == $min_idx) {
                        $temp1 = $arr['Rejection'][$k]['Machine'][$i];
                        $arr['Rejection'][$k]['Machine'][$i] = $arr['Rejection'][$k]['Machine'][$min_idx];
                        $arr['Rejection'][$k]['Machine'][$min_idx] = $temp1 ;
                    }
   
                   
                }
            }          

        }

        $l = sizeof($arr['Rejection'][0]['Machine']);
        for ($i = 0; $i < $n; $i++)
        {   
            if ($arr['Total'][$i] <=0 ) {
                unset($arr['Total'][$i]);
                unset($arr['Machine_name'][$i]);
                for ($k=0; $k < $j_1; $k++) {
                    for ($m=0; $m <$l ; $m++) {
                        if ($m == $i) {
                            unset($arr['Rejection'][$k]['Machine'][$i]);
                        }
                    }
                }
            }
        }
        return $arr;
    }

    public function getfilterdata()
    {
        if ($this->request->isAJAX()) {

            log_message("info","\n\n Production Quality Module Dropdown function calling!!");
            $start_time_drp_logger = microtime(true);

            $arr['Part'] = $this->Financial->getPartDetailsFilter();
            $arr['Machine'] = $this->Financial->getMachineDetailsFilter();
            $arr['Reason'] = $this->Financial->getQualityReasonDetails();
            $arr['Created_By'] = $this->User->getCreatedByDetails();

            $end_time_drp_logger = microtime(true);
            $execution_time_drp_logger = ($end_time_drp_logger - $start_time_drp_logger);
            log_message("info","production quality module dropdown function duration is:\t".$execution_time_drp_logger);

            echo json_encode($arr);
        }
    }


    public function gettablefilterdata(){
        if ($this->request->isAJAX()) {
      
            log_message("info","\n\nprodcution quality module table function calling!!");
            $start_time_table_logger = microtime(true);

            $fdate = explode("T",$this->request->getVar('from'));
            $tdate = explode("T", $this->request->getVar('to'));
            $fromdate = $fdate[0]." ".$fdate[1];
            $todate = $tdate[0]." ".$tdate[1];
            $arr['part'] = $this->request->getVar('part');
            $arr['machine'] = $this->request->getVar('machine');
            $arr['user'] = $this->request->getVar('user');
            $arr['reason'] = $this->request->getVar('reason');
            $arr['from_date'] = $fdate[0];
            $arr['to_date'] = $tdate[0];


            // $arr['machine'] = ['MC1001','MC1002','MC1003','MC1004'];
            // $arr['part'] = ['PT1001', 'PT1002','PT1003','PT1004','PT1005','PT1006','PT1007','PT1008','PT1009'];
            // $arr['user'] = ['UM1002','UM1001'];
            // $arr['reason'] = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14'];
            // $arr['from_date'] = "2023-06-01";
            // $arr['to_date'] = "2023-06-22";
            // $fromdate = "2023-06-01 09:00:00";
            // $todate = "2023-06-22 10:00:00";


            $ProductionData = $this->Financial->getProductionDetailsFilter($arr);
            $reasonData = $this->Financial->getReasonDetailsFilter();
            $userData = $this->Financial->getUserDetailsFilter();

            $ProductionDataExpand = [];
            foreach ($ProductionData as $value) {
                // Machine Filter.......
                $shift_stime = $value['shift_date']." ".$value['start_time'];
                // $shift_etime = $value['shift_date']." ".$value['start_time']; 
                if ($shift_stime>=$fromdate && $shift_stime<=$todate) {
                    if (in_array($value['machine_id'], $arr['machine'])) {
                        // Part Filter/
                        if (in_array($value['part_id'], $arr['part'])) {
                            if (trim($value['reject_reason']) !="" or trim($value['reject_reason']) !=null) {
                                $reasons =  explode("&&", $value['reject_reason']);
                                foreach ($reasons as $count) {
                                    $tt = explode("&", $count);
                                    $total = $tt[0];
                                    //$temp = explode($total, $count);
                                    $temp = $tt[1];
                                    // Rejection reason and Last updated by filter......
                                    if (in_array($temp, $arr['reason'])){ 
                                        if(in_array($value['last_updated_by'], $arr['user'])) {
                                            $dr = $temp;
                                            $un = $value['last_updated_by'];
                                            foreach ($reasonData as $r) {
                                                if ($r['quality_reason_id'] == $temp) {
                                                    $dr = $r['quality_reason_name'];    
                                                }
                                            }
    
                                            foreach ($userData as $u) {
                                                if ($u['user_id'] == $value['last_updated_by']) {
                                                    $un = $u['first_name']." ".$u['last_name'];    
                                                }
                                            }
    
                                            $time = strtotime($value['shift_date']);
                                            $time_stamp = strtotime($value['last_updated_on']);
                                            $tmp = array("machine_id"=>$value['machine_id'],"part_id"=>$value['part_id'],"reject_count"=>$total,"reject_reason"=>$temp,"total_reject"=>$total,"from_time"=>$value['start_time'],"to_time"=>$value['end_time'],"from_date"=>date('d M y',$time),"updated_by"=>$value['last_updated_by'],"updated_at"=>date('d M y, h:i',$time_stamp),"part_name"=>$value['part_name'],"machine_name"=>$value['machine_name'],"reason_name"=>$dr,"user_name" => $un,"notes"=>$value['rejections_notes']);
                                            array_push($ProductionDataExpand, $tmp);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
              
            }

            // echo sizeof($ProductionDataExpand);
            // echo "<pre>";
            // print_r($ProductionDataExpand);
                // $tmp['arr'] = $arr;
                // $tmp['fdate'] = $fromdate;
                // $tmp['todate'] = $todate;

            $end_time_table_logger = microtime(true);
            $execution_time_table_logger = ($end_time_table_logger - $start_time_table_logger);
            log_message("info","production quality table function execution duration is :\t".$execution_time_table_logger);
            
            echo json_encode($ProductionDataExpand);
        }
    }

}
?>