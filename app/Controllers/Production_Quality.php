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

            foreach ($output as $key => $value) {

                $time_temp_start = strtotime($value['shift_date']." ".$value['start_time']);
                $time_temp_end = strtotime($value['shift_date']." ".$value['end_time']);

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
                        if ($value['shift_date'] == $FromDate && $value['start_time'] <= $FromTime && $value['end_time'] >= $FromTime) {
                            $output[$key]['start_time'] = $FromTime;
                            if ($value['end_time']>= $ToTime) {
                                $output[$key]['end_time'] = $ToTime;
                            }
                            $output[$key]['split_duration'] = $this->getDuration($value['calendar_date']." ".$output[$key]['start_time'],$value['calendar_date']." ".$output[$key]['end_time']);
                        }
                        else if (($value['shift_date'] == $ToDate && $value['start_time']>=$value['end_time']) || $value['shift_date'] == $ToDate && $value['end_time'] >= $ToTime) {
                            $output[$key]['end_time'] = $ToTime;
                            $output[$key]['split_duration'] = $this->getDuration($value['calendar_date']." ".$output[$key]['start_time'],$value['calendar_date']." ".$output[$key]['end_time']);
                        }
                        else{
                            if ($value['shift_date'] == $FromDate  && strtotime($value['start_time']) < strtotime($FromTime)){
                                unset($output[$key]);
                            }
                            if ($value['shift_date'] == $FromDate  && $value['start_time'] >= $ToTime){
                                unset($output[$key]);
                            }

                            if ($value['shift_date'] == $ToDate  && strtotime($value['start_time']) > strtotime($ToTime)) {
                                unset($output[$key]);
                            }
                        }

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
                    if ($value['shift_date'] == $FromDate && $value['start_time'] <= $FromTime && $value['end_time'] >= $FromTime) {
                        $getAllTimeValues[$key]['start_time'] = $FromTime;
                        if ($value['end_time']>= $ToTime) {
                            $getAllTimeValues[$key]['end_time'] = $ToTime;
                        }
                        $getAllTimeValues[$key]['duration'] = $this->getDuration($value['calendar_date']." ".$getAllTimeValues[$key]['start_time'],$value['calendar_date']." ".$getAllTimeValues[$key]['end_time']);
                    }
                    else if (($value['shift_date'] == $ToDate && $value['start_time']>=$value['end_time']) || $value['shift_date'] == $ToDate && $value['end_time'] >= $ToTime) {
                        $getAllTimeValues[$key]['end_time'] = $ToTime;
                        $getAllTimeValues[$key]['duration'] = $this->getDuration($value['calendar_date']." ".$getAllTimeValues[$key]['start_time'],$value['calendar_date']." ".$getAllTimeValues[$key]['end_time']);
                    }
                    else{
                        if ($value['shift_date'] == $FromDate  && $value['start_time'] < $FromTime){
                            unset($getAllTimeValues[$key]);
                        }
                        if ($value['shift_date'] == $ToDate  && strtotime($value['end_time']) > strtotime($ToTime)) {
                            unset($getAllTimeValues[$key]);
                        }

                        if ($value['shift_date'] == $FromDate  && $value['start_time'] >= $ToTime){
                            unset($getAllTimeValues[$key]);
                        }
                    }

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
                if ($value['shift_date'] == $FromDate  && $value['start_time'] < $FromTime) {
                    unset($production[$key]);
                }
                if ($value['shift_date'] == $FromDate  && $value['start_time'] >= $ToTime){
                        unset($production[$key]);
                    }

                if (strtotime($value['shift_date']) == strtotime($ToDate)  && ($value['start_time']) >= ($ToTime)) {
                    unset($production[$key]);
                }
                //For remove the current data of inactive machines.........
                foreach ($getInactiveMachine as $v) {
                    $t = explode(" ", $v['max(r.last_updated_on)']);
                    if ($value['shift_date'] == $t[0]  && $value['start_time'] > $t[1] && $value['machine_id'] == $v['machine_id'] OR $value['shift_date'] > $t[0] && $value['machine_id'] == $v['machine_id']){
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

        //Function call for production data............
        $ref = "qualityOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        // $fromTime = "2023-01-12T09:00:00";
        // $toTime = "2023-01-21T21:00:00";

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
        // $result['OppCost'] = $QualityAvailabilityActual;
        // $result['Part'] = $PartArray;
        $result['Reason']=$ReasonArray;
        $result['GrandTotal']=$OverallOpportunity;
        $result['Total']=$ReasonWiseTotal;

        $out = $this->selectionSortQualityOpp($result,sizeof($result['Total']));
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
        return $arr;
    }

    public function qualityOpportunitypartsreason(){

        //Function call for production data............
        $ref = "qualityOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        // $fromTime = "2023-01-12T09:00:00";
        // $toTime = "2023-01-21T21:00:00";

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

        
        $reasonwise =[];
        $totalPart=0;
        foreach ($qualityReason as $key => $value) {
            $tmpPart =[];
               
            foreach ($partDetails as $part) {
                $tmpTotalReject=0;
                $tmpOpportunityCost=0;
                foreach ($ProductionDataExpand as $production) {
                    if ($part['part_id'] == $production['part_id'] AND $value['quality_reason_id'] == $production['reject_reason']){
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

            $arr  = array('reason' => $value['quality_reason_name'] , 'part_1' => $tmpPart);
            array_push($reasonwise, $arr);
        }


        $GrandTotal =0;
        $total=[];

        $len_part = sizeof($partDetails);
        $len_reason = sizeof($qualityReason);

        for($i=0;$i<$len_part;$i++){
            $t=0;
            for ($j=0; $j < $len_reason ; $j++) { 
                $t = $t + $reasonwise[$j]['part_1'][$i]['reject'];
            }
            $GrandTotal=$GrandTotal+$t;
            array_push($total, $t);
        }

        $result['Part']=$reasonwise;
        $result['GrandTotal']=$GrandTotal;
        $result['Part_List'] = $partDetails;
        $result['Total']=$total;

        $out = $this->selectionSortQualityPartsReason($result,sizeof($result['Total']));
        echo json_encode($out);

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
        return $arr;
    }

    public function qualityOpportunityparts(){

        //Function call for production data............
        $ref = "qualityOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        // $fromTime = "2023-01-12T09:00:00";
        // $toTime = "2023-02-24T21:00:00";

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
        
        $tmpPart =[];
        $totalPart=0;
        foreach ($partDetails as $part) {
            $tmpTotalReject=0;
            $tmpOpportunityCost=0;
            foreach ($ProductionDataExpand as $production) {
                if ($part['part_id'] == $production['part_id']){
                    $PartPrice = $part['part_price'];
                    $Rejects =$production['reject_count'];
                    $OppCost = floatval($Rejects)*floatval($PartPrice);
                    $tmpTotalReject =$tmpTotalReject+$Rejects;
                    $tmpOpportunityCost=floatval($tmpOpportunityCost)+floatval($OppCost);
                }
            }
            $ar = array('part_id' => $part['part_id'],'part_name' => $part['part_name'], 'reject'=> $tmpTotalReject , 'cost'=>$tmpOpportunityCost);
            $totalPart = $totalPart + $tmpOpportunityCost;
            array_push($tmpPart, $ar);
        }

        $result['Part']=$tmpPart;
        $result['GrandTotal']=$totalPart;

        $out = $this->selectionSortQualityParts($result,sizeof($result['Part']));
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
        return $arr;
    }

    public function qualityOpportunityRejectionWise(){

        //Function call for production data............
        $ref = "qualityOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        // $fromTime = "2023-01-13T09:00:00";
        // $toTime = "2023-01-21T21:00:00";

        // $url = "http://localhost:8080/graph/qualityOpportunity/".$fromTime."/".$toTime."/";
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // $result = curl_exec($ch);
        // $res = json_decode($result);
        // echo json_encode($res);x

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

        $tmpActualReason=[];
        $rejectTotal=[];
        $rejectReason=[];
        $GrandTotal =0;
        
        foreach ($qualityReason as $reason) {
            $tmpTotalReject=0;
            foreach ($ProductionDataExpand as $production) {
                if ($reason['quality_reason_id'] == $production['reject_reason']){
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
 
        $result['Rejection'] = $rejectTotal;
        $result['Reason']=$rejectReason;
        $result['GrandTotal']=$GrandTotal;

        $out = $this->selectionSortQualityRejection($result,sizeof($result['Reason']));
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
        return $arr;
    }

    public function qualityOpportunityMachine(){

        //Function call for production data............
        $ref = "qualityOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        // $fromTime = "2023-01-12T09:00:00";
        // $toTime = "2023-01-21T21:00:00";

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

        $machineRejection=[];
        $machinewisecost=[];
        $machinearray=[];
        $GrandTotal=0;
        
        foreach ($machineDetails as $machine) {
            $tmpTotalReject=0;
            $tmpOpportunityCost =0;
            foreach ($partDetails as $part) {
                foreach ($qualityReason as $reason) {
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
        return $arr;
    }


    public function qualityOpportunityMachineReason(){

        //Function call for production data............
        $ref = "qualityOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        // $fromTime = "2023-01-12T09:00:00";
        // $toTime = "2023-01-21T21:00:00";

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

        $machineRejection=[];
        $machinewisecost=[];
        $machinearray=[];
        $GrandTotal=0;
        $reject_machine=[];
        foreach ($qualityReason as $reason) {
            $machinewise=[];
            foreach ($machineDetails as $machine) {
                $machineWiseReject=0;
                foreach ($partDetails as $part) {
                    foreach ($ProductionDataExpand as $production) {
                        if ($part['part_id'] == $production['part_id'] AND $reason['quality_reason_id'] == $production['reject_reason'] AND $machine['machine_id'] == $production['machine_id']){
                            $PartPrice = $part['part_price'];
                            $Rejects =$production['reject_count'];
                            $machineWiseReject =$machineWiseReject+$Rejects;
                        }
                    }
                }
                $arr = array("Machine_id"=>$machine['machine_name'],"Rejection"=>$machineWiseReject);
                array_push($machinewise, $arr);
            }
            $ar = array('Reason' => $reason['quality_reason_name'],'Machine' => $machinewise);
            array_push($reject_machine,$ar);
        }

        $machine_ar = [];
        foreach ($machineDetails as $key => $value) {
            array_push($machine_ar, $value['machine_name']);
        }

        $GrandTotal =0;
        $total=[];

        $len_machine = sizeof($machineDetails);
        $len_reason = sizeof($qualityReason);

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
        return $arr;
    }

    public function getfilterdata()
    {
        if ($this->request->isAJAX()) {
            $arr['Part'] = $this->Financial->getPartDetailsFilter();
            $arr['Machine'] = $this->Financial->getMachineDetailsFilter();
            $arr['Reason'] = $this->Financial->getQualityReasonDetails();
            $arr['Created_By'] = $this->User->getCreatedByDetails();
            echo json_encode($arr);
        }
    }


    public function gettablefilterdata(){
        if ($this->request->isAJAX()) {
            $arr['part'] = $this->request->getVar('part');
            $arr['machine'] = $this->request->getVar('machine');
            $arr['user'] = $this->request->getVar('user');
            $arr['reason'] = $this->request->getVar('reason');

            // $arr['machine'] = ['MC1001','MC1002','MC1003','MC1004'];
            // $arr['part'] = ['PT1001', 'PT1002','PT1003','PT1004','PT1005','PT1006','PT1007','PT1008','PT1009'];
            // $arr['user'] = ['UM1002','UM1001'];
            // $arr['reason'] = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14'];


            $ProductionData = $this->Financial->getProductionDetailsFilter($arr);
            $reasonData = $this->Financial->getReasonDetailsFilter();
            $userData = $this->Financial->getUserDetailsFilter();

            $ProductionDataExpand = [];
            foreach ($ProductionData as $value) {
                // Machine Filter.......
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
                                        $tmp = array("machine_id"=>$value['machine_id'],"part_id"=>$value['part_id'],"reject_count"=>$total,"reject_reason"=>$temp,"total_reject"=>$total,"from_time"=>$value['start_time'],"to_time"=>$value['end_time'],"from_date"=>date('d M y',$time),"updated_by"=>$value['last_updated_by'],"updated_at"=>date('d M y, h:i',$time_stamp),"part_name"=>$value['part_name'],"machine_name"=>$value['machine_name'],"reason_name"=>$dr,"user_name" => $un);
                                        array_push($ProductionDataExpand, $tmp);
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

            echo json_encode($ProductionDataExpand);
        }
    }

}
?>