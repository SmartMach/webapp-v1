<?php 
namespace App\Controllers;
//use App\Models\MainModel;
use App\Models\OEE_Drill_Down_Model;

class OEE_Drill_Down_controller extends BaseController
{   
    protected $graph_obj;
    // constructor
    function __construct(){
        //parent::__construct();
        $this->session = \Config\Services::session();
        //$this->session->remove('user_name');
        $this->data = new OEE_Drill_Down_Model();
        $this->graph_obj = new Common_Graph();
        // $this->Financial = new Financial_Model();
    } 

    // overall oee teep and ooe  value getting 
    public function OverallOEETarget(){
        if ($this->request->isAJAX()) {
            log_message("info","\n\n oee drill down over all graph function calling !!");
            $start_time_logger_overall_g = microtime(true);

            $ref="Overall";
            $fromTime = $this->request->getVar("from");
            $toTime = $this->request->getVar("to");
            // $fromTime = "2023-11-18T14:00:00";
            // $toTime = "2023-11-24T13:00:00";
            $Overall = $this->graph_obj->getDataRaw($ref,$fromTime,$toTime);
            $end_time_logger_overall_g = microtime(true);
            $execution_time_logger_overall_g = ($end_time_logger_overall_g - $start_time_logger_overall_g);
            log_message("info","oee drill down overall graph execution duration is :\t".$execution_time_logger_overall_g);

            echo json_encode($Overall);
            // echo "<pre>";
            // print_r($Overall);
           
        }
       
    }

    // general settings get oee and teep and ooe target value
    public function getOverallTarget(){
        log_message("oee drill down graph overall graph function calling !!");
        $start_time_logger_oa = microtime(true);

        $Targets =  $this->data->getGoalsFinancialData();

        $end_time_logger_oa = microtime(true);
        $execution_time_logger_oa = ($end_time_logger_oa - $start_time_logger_oa);
        log_message("info","\n\n oee drill down over all graph execution duration is :\t".$execution_time_logger_oa);
       
        return json_encode($Targets);
    }

   


    // oee trend graph 
    public function oeeTrendDay(){
        if($this->request->isAjax()){
            log_message("info","\n\n financial metrics oee drill down oee trend function calling !!");
            $start_time_logger_oee_trend = microtime(true);

            $ref1 = "OpportunityTrendDay";

            $fromTime = $this->request->getVar("from");
            $toTime = $this->request->getVar("to");
            $machine_arr = $this->request->getVar('machine_arr');


            // $fromTime = "2023-11-12T15:00:00";
            // $toTime = "2023-11-18T14:00:00";
            // $machine_arr = array("all","MC1001","MC1002","MC1003","MC1004","MC1005","MC1006");
            $filter_data['machine_arr'] = $machine_arr;
            $dstart = explode("T", $fromTime);
            $dend= explode("T", $toTime);
            $start_date = $dstart[0];   
            $end_date = $dend[0];

            $days=[];
            while (strtotime($start_date) <= strtotime($end_date)) {
                array_push($days,$start_date);
                $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
            }

            $rawData = $this->graph_obj->getDataRaw($ref1,$fromTime,$toTime);
            $downtime = $this->oeeDataTreand($rawData['raw'],$rawData['machine'],$rawData['part'],$days,false,$filter_data);
            $partDetails = $this->data->PartDetails();
            $machineDetails = $this->data->getMachineDetails();

            $ref = "PerformanceOpportunity";
            $res = $this->graph_obj->getDataRaw($ref,$fromTime,$toTime);
            
            $tmpFrom = explode("T",$fromTime);
            $tmpTo = explode("T",$toTime);
            // temporary time......
            $tempFrom = explode(":",$tmpFrom[1]);
            $tempTo = explode(":",$tmpTo[1]);
            $FromDate = $tmpFrom[0];
            $ToDate = $tmpTo[0];
            //Part list Details......
            $part = $this->data->getPartRec($FromDate,$ToDate);

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
            log_message("info","OEE Drill Down oee trend duration is :\t".$execution_time_logger_oee_trend);

            echo json_encode($out);
            // echo "<pre>";
            // print_r($out);
        }
        
    }

    // oee trend graph filter and array arrange function
    public function oeeDataTreand($MachineWiseDataRaw,$x,$part,$days,$noplan=false,$filter_data)
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
                                if (in_array($DTR['machine_id'],$filter_data['machine_arr'],TRUE)) {
                                   
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
    
    
    // machine wise oee%
    public function getMachineWiseOEE(){

        $ref = "MachinewiseOEE";

        // $fromTime = "2022-12-18T09:00:00";
        // $toTime = "2022-12-18T21:00:00";
        // $machine_arr= array('all','MC1001','MC1002','MC1003','MC1004');
        // $all_data_field = array('all','Quality','Performance','Availability');

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        $machine_arr = $this->request->getVar('machine_arr');

       

        //Machine Wise Calculated Data...........
        $MachinewiseData = $this->graph_obj->getDataRaw($ref,$fromTime,$toTime);

        // Machine Name and ID Reference............
        $MachineName = $this->data->getMachineRecGraph();

        // Machine Id Conversion as per the Machine data.......
        // Need Not to change.........
        // $MachineName = $this->convertMachineId($MachineName);
        // General Settings Targets......
        $Targets =  $this->data->getGoalsFinancialData();

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
                if(in_array($value['Machine_Id'],$machine_arr)){
                    if ($name['machine_id'] == $value['Machine_Id']) {
                        array_push($MachineNameRef, $name['machine_name']);
                        array_push($Availability, ($value['Availability']));
                        array_push($AvailabilityTarget, $Targets[0]['availability']);
                        array_push($Quality, ($value['Quality']));
                        array_push($QualityTarget, $Targets[0]['quality']);
                        array_push($OEE, ($value['OEE']));
                        array_push($OEETarget, $Targets[0]['oee_target']);
                        array_push($Performance, ($value['Performance']));
                        array_push($PerformanceTarget, $Targets[0]['performance']);                       
                    }
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
        echo json_encode($out);
        // echo "<pre>";
        // print_r($out);
        
    }

    // machine wise oee sorting function
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
        return $arr;
    }


    // availability opportunity
    public function getAvailabilityReasonWise($fromTime,$toTime){
        $ref = "AvailabilityReasonWise";
        // $fromTime = $this->request->getVar("from");
        // $toTime = $this->request->getVar("to");
        // $fromTime="2024-02-11T00:00:00";
        // $toTime="2024-02-17T23:00:00";
        
        // // Calculation for to find ALL time value
        $tmpFromDate =explode("T", $fromTime);
        $tmpToDate = explode("T", $toTime);


        //Raw data from Reason mapping Table...........
        $rawData = $this->graph_obj->getDataRaw($ref,$fromTime,$toTime);

        // machine wise records
        $ref1 = "MachinewiseOEE"; 
        $MachinewiseData = $this->graph_obj->getDataRaw($ref1,$fromTime,$toTime);

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
        $MachineName = $this->data->getMachineRecGraph();
        // Need not change, because machine id updated........
        // Machine Id Conversion as per the Machine data.......

        // Downtime Reason.......
        $DowntimeReason = $this->data->downtimeReason();

        // oee demo data
        $oee_demo_arr = [];
        $oee_marr = [];
        foreach ($MachinewiseData as $k2 => $val) {
            $oee_demo_arr[$val['Machine_Id']] = $val['OEE'];
            array_push($oee_marr,$val['Machine_Id']);
        }

        // echo "Machine ";
        // print_r($oee_marr);

        $machine_data_arr = [];
        foreach ($MachineName as $key => $value) {
            if (in_array($value['machine_id'],$oee_marr)) {
                array_push($machine_data_arr,$MachineName[$key]);
            }
        }
        $MachineName = $machine_data_arr;

        // Machine Data.........
        // $ReasonwiseData = $this->Financial->ReasonwiseData($FromDate,$ToDate);

        //Reason wise Availability for Logical Perspective..........
        $ReasonwiseAvailability =[];
        $AvailabilityTotal = [];
        
        $GrandTotal = 0;
        $finalArray=[];
        //$tmp_marr = [];
      
        foreach ($MachineName as $key_m => $machine) {
            $ar=[];
            if (in_array($machine['machine_id'],$oee_marr)) {
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
        
                    $t=array("machine_id"=>$machine['machine_id'],"reason_id"=>$reason['downtime_reason_id'],"reason"=>$reason_merge_name,"machine_name"=>$machine['machine_name'],"oppCost"=>$reasonValue,"duration"=>$split_duration,"category"=>$reason['downtime_category'],"normal_reason"=> $reason['downtime_reason']);
                    array_push($ar,$t);
                    $GrandTotal = $GrandTotal+$reasonValue;        
                }
                $ar['oee'] = $oee_demo_arr[$machine['machine_id']];
                array_push($finalArray,$ar);
                $MachineName[$key_m]['oee'] = $oee_demo_arr[$machine['machine_id']];
               // $tmp_marr = $MachineName[$key_m];
               
            }
        }
       
        // $MachineName = $tmp_marr;

        foreach ($DowntimeReason as $key => $reason) {
            $reason_merge = $reason['downtime_reason']." (".strtoupper(str_split($reason['downtime_category'])[0]).")";
            $DowntimeReason[$key]['downtime_reason'] = $reason_merge;
            $DowntimeReason[$key]['normal_reason'] = $reason['downtime_reason'];
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
        $res['oee_data'] = $MachinewiseData;

        //echo (int)$GrandTotal;
        //sorting in desending order......
        $out = $this->selectionSortAvailability($res,sizeof($res['total']));
        // echo $count;
        // echo "<pre>";
        // print_r($out);

      
        // echo json_encode($out); 
        return $out;  
    }

    // availability opportunity graph for reason wise sorting function
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

    // machine wise availability graph for graph filter function
    public function getmachine_reason_availability(){
        if ($this->request->isAJAX()) {
            $fromTime = $this->request->getVar("from");
            $toTime = $this->request->getVar("to");

            $category_arr = $this->request->getVar('category_arr');
            $reason_arr = $this->request->getVar('reason_arr');
            $machine_arr = $this->request->getVar('machine_arr');
            $reason_arr = array_map( 'strtolower', $reason_arr);
            
            // $fromTime = "2023-10-21T16:00:00";
            // $toTime="2023-10-28T15:00:00";
            // $category_arr = array('all','Planned','Unplanned');
            // $reason_arr = array('all_reason', 'apply spray', 'Break time', 'Colour change', 'door problem', 'ejection pin broken', 'ejection pin stuck up', 'Extra mould change', 'Facility', 'lunch break', 'Machine breakdown', 'Machine OFF', 'Mold Trial', 'Mould breakdown', 'mould change', 'Mould trail', 'no man power', 'No material In store', 'No material production', 'No packing', 'No plan', 'part catching', 'Preheating', 'Preventic maintenance', 'Preventive Maintanence', 'Process adjustment', 'QC approval', 'remove lumps', 'rib catch', 'Robot adjustment', 'runner catching', 'SEMIAUTO', 'Start up', 'Tool Changeover', 'Unnamed');
            // $machine_arr = array('all', 'MC1001', 'MC1002', 'MC1003', 'MC1004');
            
            // $reason_arr = array_map( 'strtolower', $reason_arr);

            $res = $this->getAvailabilityReasonWise($fromTime,$toTime);

             
            // data array sorting concept
            for($i=0;$i<count($res['data']);$i++){
                for ($j=$i+1; $j <count($res['data']); $j++) { 
                    // $index_min = 0;
                    if ($res['data'][$i]['oee']>$res['data'][$j]['oee']) {
                        $index_min = $j;
                        $temp = $res['data'][$i];
                        $res['data'][$i] = $res['data'][$index_min];
                        $res['data'][$index_min] = $temp;
                    }
                   
                }
            }

            // sorting machine name array
            for ($i=0; $i <count($res['machineName']); $i++) { 
                for ($j=$i+1; $j <count($res['machineName']); $j++) { 
                    if ($res['machineName'][$i]['oee']>$res['machineName'][$j]['oee']) {
                        $index_min = $j;
                        $temp = $res['machineName'][$i];
                        $res['machineName'][$i] = $res['machineName'][$index_min];
                        $res['machineName'][$index_min] = $temp;
                    }
                }
            }
            
            foreach ($res['reason'] as $key => $value) {
                if (in_array($value['downtime_category'],$category_arr)) {
                    if (in_array(strtolower($value['normal_reason']),$reason_arr)) {

                        $res['reason'][$key]['oppcost'] = $this->getoppcost_arr($value['downtime_reason_id'],$res,$machine_arr);
                        $res['reason'][$key]['duration'] = $this->getduration_arr($value['downtime_reason_id'],$res,$machine_arr);
                    }
                }
                   
            }

          

            // oee remove 
            $demo_arr = [];
            foreach ($res['data'] as $key => $value) {
                if (in_array($value[0]['machine_id'],$machine_arr)) {
                    unset($res['data'][$key]['oee']);
                    $tmp_filter_ar = [];
                    foreach ($value as $k => $val) {
                        if (in_array($val['machine_id'],$machine_arr)) {
                            if (in_array($val['category'],$category_arr)) {
                                if (in_array(strtolower($val['normal_reason']),$reason_arr)) {
                                    array_push($tmp_filter_ar,$value[$k]); 
                                }                           
                            }
                        }
                    }
                    array_push($demo_arr,$tmp_filter_ar);
                }
                else{
                    unset($res['data'][$key]);
                }  
            }
            $res['data'] = $demo_arr;

            $demo_arr1 = [];
            foreach ($res['machineName'] as $key => $value) {
                unset($res['machineName'][$key]['oee']);
                if (in_array($value['machine_id'],$machine_arr)) {
                    array_push($demo_arr1,$res['machineName'][$key]);
                }
                else{
                    unset($res['machineName'][$key]);
                }
            }
            $res['machineName'] = $demo_arr1;
 

           
            echo json_encode($res);
            // echo "<pre>";
            // print_r($res);

        }
    }
    // sub function for availability graph for graph filter function
    public function getoppcost_arr($rid,$res,$machine_arr){
        $temp_arr = [];
        foreach ($res['data'] as $key => $value) {
            // $machine_arr_oppcost = [];
            foreach ($value as $k1 => $v1) {
                if (in_array($v1['machine_id'],$machine_arr)) {
                    if ($rid == $v1['reason_id']) {
                        array_push($temp_arr,$v1['oppCost']);
                    }  
                }             
            }
        }

        return $temp_arr;
    }
    // sub function for availability graph for graph filter function 
    public function getduration_arr($rid,$res,$machine_arr){

        $tmpid_arr = [];
        foreach ($res['data'] as $key => $value) {
            foreach ($value as $k1 => $v1) {
                if (in_array($v1['machine_id'],$machine_arr)) {
                    if ($rid == $v1['reason_id']) {
                        array_push($tmpid_arr,$v1['duration']);
                    }  
                }
            }
        }

        return $tmpid_arr;
    }

    // machine wise performance with parts
    public function performanceOpportunity(){
        
        $ref = "PerformanceOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");  
        
        
        $part_arr = $this->request->getVar('part_arr');
        $machine_arr = $this->request->getVar('machine_arr');

        // $fromTime = "2023-03-15T13:00:00";
        // $toTime = "2023-03-21T12:00:00";
        // $part_arr = array("all", "PT1001", "PT1002","PT1003","PT1004", "PT1005", "PT1006", "PT1007", "PT1008", "PT1009", "PT1010", "PT1011", "PT1012", "PT1013", "PT1014", "PT1015", "PT1016", "PT1017", "PT1018", "PT1019", "PT1020", "PT1021", "PT1022");
        // $machine_arr = array("all","MC1001", "MC1002", "MC1003","MC1004");

        $ref1 = "MachinewiseOEE"; 
        $MachinewiseData = $this->graph_obj->getDataRaw($ref1,$fromTime,$toTime);

       

        $machineData = $this->graph_obj->getDataRaw($ref,$fromTime,$toTime);
        $partDetails = $this->data->PartDetails_filter($part_arr);
        $machineDetails = $this->data->getMachineDetails();

        // new array machine data
        $get_new_machine = $this->data->getmachine_arr();


        $oee_demo_arr = [];
        foreach ($MachinewiseData as $k2 => $val) {
            $oee_demo_arr[$val['Machine_Id']] = $val['OEE'];
        }

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
                if (in_array($machine['Machine_ID'],$machine_arr)) {
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
                        $Opportunity_arr = array('Opportunity' => floatval($Opportunity),'SpeedLoss'=>$speedLoss,'part_id'=>$part['part_id'],'part_name'=>$part['part_name']);
                        // if (in_array($part['part_id'],$part_arr)) {
                            $temp = array("part_id"=>$part['part_id'],"data"=>$corrected_tppNICT,"OppCost"=>$Opportunity_arr,"speedLoss"=>$speedLoss);
                            array_push($tmpMachine, $temp);
                            array_push($varData, $Opportunity_arr);
                        // }
                      
                    }
                    // $x = array("machine_id"=>$machine['Machine_ID'],"machineData"=>$tmpMachine);
                    // array_push($AvailabilityOpportunity, $x);
                    $m_name_tmp = $get_new_machine[$machine['Machine_ID']]['machine_name'];
                    $z= array("machine_id"=>$machine['Machine_ID'],"machineData"=>$varData,"machine_name"=>$m_name_tmp,"oee"=>$oee_demo_arr[$machine['Machine_ID']]);
                    array_push($varDataMachine, $z);
                }
               
            }
        }


        // sorting data
        for($i=0;$i<count($varDataMachine);$i++){
            for ($j=$i+1; $j < count($varDataMachine); $j++) { 
                if ($varDataMachine[$i]['oee']>$varDataMachine[$j]['oee']) {
                    $index_min = $j;
                    $tmp = $varDataMachine[$i];
                    $varDataMachine[$i] = $varDataMachine[$j];
                    $varDataMachine[$j] = $tmp;
                }
            }
        }
        // echo "<pre>";
        // print_r($varDataMachine);


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
        // $res['machine_data_demo'] = $get_new_machine;

        //sorting in desending order......
        $out = $this->selectionSortQuality($res,sizeof($res['Total']));
        
       
        echo json_encode($out);
        // echo "<pre>";
        // print_r($out);
    }

    // sorting function for  performance opportunity graph
    public function selectionSortQuality($arr, $n){
        //int i, j, min_idx;
      
        // One by one move boundary of unsorted subarray
        // for ($i = 0; $i < $n-1; $i++)
        // {
        //     // Find the minimum element in unsorted array
        //     $min_idx = $i;
        //     for ($j = $i+1; $j < $n; $j++){
        //         if ($arr['Total'][$j] > $arr['Total'][$min_idx]){
        //             $min_idx = $j;
        //         }
        //     }

        //     $temp = $arr['Total'][$i];
        //     $arr['Total'][$i] = $arr['Total'][$min_idx];
        //     $arr['Total'][$min_idx] = $temp;


        //     $temp2 = $arr['Part'][$i];
        //     $arr['Part'][$i] = $arr['Part'][$min_idx];
        //     $arr['Part'][$min_idx] = $temp2;

        //     $temp3 = $arr['SpeedLossTotal'][$i];
        //     $arr['SpeedLossTotal'][$i] = $arr['SpeedLossTotal'][$min_idx];
        //     $arr['SpeedLossTotal'][$min_idx] = $temp3;            
            

        //     $l = sizeof($arr['dataPart']);
        //     for ($k=0; $k < $l; $k++) { 
        //         $temp1 = $arr['dataPart'][$k]['machineData'][$i];
        //         $arr['dataPart'][$k]['machineData'][$i] = $arr['dataPart'][$k]['machineData'][$min_idx];
        //         $arr['dataPart'][$k]['machineData'][$min_idx] = $temp1;
        //     }
        // }

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


        foreach ($arr['dataPart'] as $key => $value) {
            $tmp_arr = [];

            foreach ($value['machineData'] as $k1 => $val1) {
                array_push($tmp_arr,$value['machineData'][$k1]);
            }
            $arr['dataPart'][$key]['machineData'] = $tmp_arr;
        }
        $tmp_part = array_values($arr['Part']);
        $arr['Part'] = $tmp_part;
        $tmp_total = array_values($arr['Total']);
        $arr['Total'] = $tmp_total;
        $tmp_sploss = array_values($arr['SpeedLossTotal']);
        $arr['SpeedLossTotal'] = $tmp_sploss;

        return $arr;
    }


    // machine wise quality with reasons
    public function qualityOpportunity(){

        //Function call for production data............
        $ref = "qualityOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        $machine_arr = $this->request->getVar('machine_arr');
        $quality_arr = $this->request->getVar('quality_arr');

        // $fromTime = "2023-03-15T16:00:00";
        // $toTime = "2023-03-21T15:00:00";
        // $machine_arr = array("all","MC1001", "MC1002", "MC1003","MC1004");
        // $quality_arr = array('all', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23');
       

        $qualityReason = $this->data->qualityReason();

        $ProductionData = $this->graph_obj->getDataRaw($ref,$fromTime,$toTime);

        $ref1 = "MachinewiseOEE"; 
        $MachinewiseData = $this->graph_obj->getDataRaw($ref1,$fromTime,$toTime);

        $oee_demo_arr = [];
        $oee_marr = [];
        foreach ($MachinewiseData as $k2 => $val) {
            $oee_demo_arr[$val['Machine_Id']] = $val['OEE'];
            array_push($oee_marr,$val['Machine_Id']);
        }

        
        $ProductionDataExpand = [];
        // $tmp_demo = [];
        foreach ($ProductionData as $key => $value) {
            if (trim($value['reject_reason']) !="" or trim($value['reject_reason']) !=null) {
                $reasons =  explode("&&", $value['reject_reason']);
                foreach ($reasons as $count) {
                    $tt = explode("&", $count);
                    // value
                    $total = $tt[0];
                    //$temp = explode($total, $count);
                    // reason id 
                    $temp = $tt[1];
                    if (in_array($temp,$quality_arr)) {
                       
                        $tmp = array("machine_id"=>$value['machine_id'],"part_id"=>$value['part_id'],"reject_count"=>$total,"reject_reason"=>$temp,"total_reject"=>$total,"total_correct"=>$value['corrections'],"total_production"=>$value['production'],"shot_count"=>$value['actual_shot_count'],"start_time"=>$value['start_time'],"end_time"=>$value['end_time']);
                        array_push($ProductionDataExpand, $tmp);
                    }
                   
                }

                // array_push($tmp_demo,$ProductionData[$key]);
            }
           
        }

        $partDetails = $this->data->getPartDetails();

        $machineDetails = $this->data->getMachineDetails_temp_filter($machine_arr);
 
        $final_arr = [];
        foreach ($qualityReason as $key => $value) {
            $reason_arr = [];
            foreach ($machineDetails as $k1 => $val) {
                $part_arr = [];
                foreach ($partDetails as $k3 => $val3) {
                    $tmp_total = 0;
                    foreach ($ProductionDataExpand as $k2 => $val2) {
                        if (($val['machine_id']==$val2['machine_id']) && ($value['quality_reason_id']==$val2['reject_reason'])) {
                            if ($val2['part_id']==$val3['part_id']) {
                                $tmp_total = $tmp_total + $val2['total_reject'];
                            }
                            
                        }
                    }
                    if ($tmp_total>0) {
                        $tmp_part = array("reason_id"=>$value['quality_reason_id'],"reason_name"=>$value['quality_reason_name'],"part_id"=>$val3['part_id'],"part_name"=>$val3['part_name'],"total_reject"=>$tmp_total);
                        array_push($part_arr,$tmp_part);
                       
                    }
                  
                   
                }

                if ((in_array($val['machine_id'],$machine_arr)) and (in_array($val['machine_id'],$oee_marr))) {
                    if (count($part_arr)>0) {
                        $tmp_machine12 = array("machine_id"=>$val['machine_id'],"machine_name"=>$val['machine_name'],"part_data"=>$part_arr,"oee"=>$oee_demo_arr[$val['machine_id']]);
                        array_push($reason_arr,$tmp_machine12);
                    }
                    else{
                        $tmp_machine12 = array("machine_id"=>$val['machine_id'],"machine_name"=>$val['machine_name'],"part_data"=>array(array("total_reject"=>0)),"oee"=>$oee_demo_arr[$val['machine_id']] );
                        array_push($reason_arr,$tmp_machine12);
                    }    
                }
               
                // $reason_arr['machine_data'] = $machine_arr;
                // $reason_arr['machine_id'] = $val['machine_id'];
            }

            if (count($reason_arr)>0) {
                $tmp_reason = array("reason_id"=>$value['quality_reason_id'],"reason_name"=>$value['quality_reason_name'],"machine_data"=>$reason_arr);
                array_push($final_arr,$tmp_reason);
            }
        
        }


        // machine wise total
        // $temp_machine_arr = [];
        foreach ($machineDetails as $key => $value) {
            if (in_array($value['machine_id'],$oee_marr)) {
                $tmp_total = 0;
                $machineDetails[$key]['oee'] = $oee_demo_arr[$value['machine_id']];
                foreach ($ProductionDataExpand as $k1 => $val) {
                    if ($value['machine_id']==$val['machine_id']) {
                        $tmp_total = $tmp_total + $val['total_reject'];
                    }
                }
                $machineDetails[$key]['total_rejects'] = $tmp_total;
                // if (in_array($value['machine_id'],$machine_arr)) {
                //     array_push($temp_machine_arr,$machineDetails[$Key]);

                // }
            }else{
                unset($machineDetails[$key]);
            }
        }
       
        // machine data sorting       
        for($i=0;$i<count($machineDetails);$i++){
            for($j=$i+1;$j<count($machineDetails);$j++){
                if ($machineDetails[$i]['oee']>$machineDetails[$j]['oee']) {
                    $index_min = $j;
                    $tmp = $machineDetails[$i];
                    $machineDetails[$i] = $machineDetails[$j];
                    $machineDetails[$j] = $tmp;            
                }
            }
        }

        // graph data sorting
        foreach ($final_arr as $key => $value) {
            for ($i=0; $i<count($value['machine_data']); $i++) { 
                for ($j=$i+1; $j<count($value['machine_data']); $j++) { 
                    if ($value['machine_data'][$i]['oee']>$value['machine_data'][$j]['oee']) {
                        $index_min = $j;
                        $tmp = $value['machine_data'][$i];
                        $value['machine_data'][$i] = $value['machine_data'][$j];
                        $value['machine_data'][$j] = $tmp;
                    }
                }

            }
            $final_arr[$key] = $value; 
        //    echo "<pre>";
        //    print_r($value['machine_data']);
        }

        $output['machine_data'] = $machineDetails;
        $output['part_data'] = $partDetails;
        $output['graph_data'] = $final_arr;
        $output['quality_data'] = $qualityReason;
        // $output['machine_wise_total'] = $machine_wise_total_arr;
        echo  json_encode($output);
        // echo "<pre>";
        // print_r($output);

       
    }


    // get all filter dropdown function
    public function get_all_dilter_drp_fun(){
        if ($this->request->isAJAX()) {

            log_message("info","\n\n oee drill down dropdown funciton calling !!");
            $start_time_logger_drp  = microtime(true);

            $downtime_drp = $this->data->downtime_reason_filter_con();
            $machine_drp = $this->data->getmachine_record_data();
            $part_drp = $this->data->getpart_data();
            $quality_drp = $this->data->get_quality_reject();
    
            $res['machine'] = $machine_drp;
            $res['downtime'] = $downtime_drp;
            $res['part'] = $part_drp;
            $res['quality'] = $quality_drp;

            $end_time_logger_drp = microtime(true);
            $execution_time_logger_drp = ($end_time_logger_drp - $start_time_logger_drp);
            log_message("info","oee drill down drp function execution duration is :\t".$execution_time_logger_drp);

            echo json_encode($res);
        }
       

        
    }

    // first loader function oee trend graph
    public function first_load_oee_trend(){
        if($this->request->isAjax()){
            log_message("info","\n\n financial metrics oee drill down oee trend function calling !!");
            $start_time_logger_oee_trend = microtime(true);

            $ref1 = "OpportunityTrendDay";

            $fromTime = $this->request->getVar("from");
            $toTime = $this->request->getVar("to");

            // $fromTime = "2023-11-12T15:00:00";
            // $toTime = "2023-11-18T14:00:00";

            $dstart = explode("T", $fromTime);
            $dend= explode("T", $toTime);
            $start_date = $dstart[0];   
            $end_date = $dend[0];

            $days=[];
            while (strtotime($start_date) <= strtotime($end_date)) {
                array_push($days,$start_date);
                $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
            }

            $rawData = $this->graph_obj->getDataRaw($ref1,$fromTime,$toTime);
            $downtime = $this->graph_obj->oeeDataTreand($rawData['raw'],$rawData['machine'],$rawData['part'],$days,false);
            $partDetails = $this->data->PartDetails();
            $machineDetails = $this->data->getMachineDetails();

            $ref = "PerformanceOpportunity";
            $res = $this->graph_obj->getDataRaw($ref,$fromTime,$toTime);
            
            $tmpFrom = explode("T",$fromTime);
            $tmpTo = explode("T",$toTime);
            // temporary time......
            $tempFrom = explode(":",$tmpFrom[1]);
            $tempTo = explode(":",$tmpTo[1]);
            $FromDate = $tmpFrom[0];
            $ToDate = $tmpTo[0];
            //Part list Details......
            $part = $this->data->getPartRec($FromDate,$ToDate);

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
            log_message("info","OEE Drill Down oee trend duration is :\t".$execution_time_logger_oee_trend);

            echo json_encode($out);
            // echo "<pre>";
            // print_r($out);
        }
        
    }


    // first loader function machine wise oee
    public function first_loader_machine_oee(){
        if ($this->request->isAJAX()) {
            log_message("info","\n\n oee drill down machine wise oee graph function calling !!");
            $start_time_logger_machine_wise_oee = microtime(true);
            
            $ref = "MachinewiseOEE";

            // $fromTime = "2023-06-11T19:00:00";
            // $toTime = "2023-06-17T18:00:00";
            $fromTime = $this->request->getVar("from");
            $toTime = $this->request->getVar("to");
            // $machine_arr = $this->request->getVar('machine_arr');

            
            //Machine Wise Calculated Data...........
            $MachinewiseData = $this->graph_obj->getDataRaw($ref,$fromTime,$toTime);

            // Machine Name and ID Reference............
            $MachineName = $this->data->getMachineRecGraph();

            // Machine Id Conversion as per the Machine data.......
            // Need Not to change.........
            // $MachineName = $this->convertMachineId($MachineName);
            // General Settings Targets......
            $Targets =  $this->data->getGoalsFinancialData();

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
                    // if(in_array($value['Machine_Id'],$machine_arr)){
                        if ($name['machine_id'] == $value['Machine_Id']) {
                            array_push($MachineNameRef, $name['machine_name']);
                            array_push($Availability, ($value['Availability']));
                            array_push($AvailabilityTarget, $Targets[0]['availability']);
                            array_push($Quality, ($value['Quality']));
                            array_push($QualityTarget, $Targets[0]['quality']);
                            array_push($OEE, ($value['OEE']));
                            array_push($OEETarget, $Targets[0]['oee_target']);
                            array_push($Performance, ($value['Performance']));
                            array_push($PerformanceTarget, $Targets[0]['performance']);                       
                        }
                    // }
                
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

            $end_time_logger_machine_wise_oee = microtime(true);
            $execution_time_logger_machine_wise_oee = ($end_time_logger_machine_wise_oee - $start_time_logger_machine_wise_oee);
            log_message("info","oee drill down machine wise oee execution duratio is :\t".$execution_time_logger_machine_wise_oee);


            echo json_encode($out);
            // echo "<pre>";
            // print_r($out);
        }
    }

    // first loader function availability graph
    public function first_load_availability(){
        if ($this->request->isAJAX()) {

            log_message("info","\n\n oee drill down availabilit graph function calling !!");
            $start_time_logger_availability = microtime(true);

            $fromTime = $this->request->getVar("from");
            $toTime = $this->request->getVar("to");

            // $fromTime = "2024-02-11T00:00:00";
            // $toTime = "2024-02-17T23:00:00";

            // $category_arr = $this->request->getVar('category_arr');
            // $reason_arr = $this->request->getVar('reason_arr');
            // $machine_arr = $this->request->getVar('machine_arr');
            // $reason_arr = array_map( 'strtolower', $reason_arr);
            
           
            $res = $this->getAvailabilityReasonWise($fromTime,$toTime);

           
         
            // data array sorting concept
            for($i=0;$i<count($res['data']);$i++){
                for ($j=$i+1; $j <count($res['data']); $j++) { 
                    // $index_min = 0;
                    if ($res['data'][$i]['oee']>$res['data'][$j]['oee']) {
                        $index_min = $j;
                        $temp = $res['data'][$i];
                        $res['data'][$i] = $res['data'][$index_min];
                        $res['data'][$index_min] = $temp;
                    }
                   
                }
            }

            // sorting machine name array
            for ($i=0; $i <count($res['machineName']); $i++) { 
                for ($j=$i+1; $j <count($res['machineName']); $j++) { 
                    if ($res['machineName'][$i]['oee']>$res['machineName'][$j]['oee']) {
                        $index_min = $j;
                        $temp = $res['machineName'][$i];
                        $res['machineName'][$i] = $res['machineName'][$index_min];
                        $res['machineName'][$index_min] = $temp;
                    }
                }
            }
            
            foreach ($res['reason'] as $key => $value) {           
                $res['reason'][$key]['oppcost'] = $this->getoppcost_arr_first_loader($value['downtime_reason_id'],$res,$machine_arr);
                $res['reason'][$key]['duration'] = $this->getduration_arr_first_loader($value['downtime_reason_id'],$res,$machine_arr);
            }

          

            // oee remove 
            $demo_arr = [];
            foreach ($res['data'] as $key => $value) {
                       
                unset($res['data'][$key]['oee']);
                array_push($demo_arr,$res['data'][$key]);
            }
            $res['data'] = $demo_arr;

            $demo_arr1 = [];
            foreach ($res['machineName'] as $key => $value) {
                unset($res['machineName'][$key]['oee']);
                array_push($demo_arr1,$res['machineName'][$key]);
            }
            $res['machineName'] = $demo_arr1;

            // echo "<pre>";
            // print_r($res);
            
            $end_time_logger_availability = microtime(true);
            $execution_time_logger_availability = ($end_time_logger_availability - $start_time_logger_availability);
            log_message("info","oee drill down availability graph execution duration is :\t".$execution_time_logger_availability);

            echo json_encode($res);
            // echo "final result";
            // echo "<pre>";
            // print_r($res);

        }
    }


    // availability graph first loader sub functions
    public function getoppcost_arr_first_loader($rid,$res){
        $temp_arr = [];
        foreach ($res['data'] as $key => $value) {
            // $machine_arr_oppcost = [];
            foreach ($value as $k1 => $v1) {
                if ($rid == $v1['reason_id']) {
                    array_push($temp_arr,$v1['oppCost']);
                }  
            }
        }

        return $temp_arr;
    }

    // sub function for availability graph 
    public function getduration_arr_first_loader($rid,$res){

        $tmpid_arr = [];
        foreach ($res['data'] as $key => $value) {
            foreach ($value as $k1 => $v1) {
                if ($rid == $v1['reason_id']) {
                    array_push($tmpid_arr,$v1['duration']);
                }  
            }
        }

        return $tmpid_arr;
    }


    // first loader performance opportunity function
    public function first_loader_performance(){
        if ($this->request->isAJAX()) {
            log_message("info","\n\n oee drill down performance grpah calling !!");
            $start_time_logger_performance = microtime(true);


            $ref = "PerformanceOpportunity";

            $fromTime = $this->request->getVar("from");
            $toTime = $this->request->getVar("to");  
            
            
            // $part_arr = $this->request->getVar('part_arr');
            // $machine_arr = $this->request->getVar('machine_arr');
    
            // $fromTime = "2023-06-11T19:00:00";
            // $toTime = "2023-06-17T18:00:00";
           
            $ref1 = "MachinewiseOEE"; 
            $MachinewiseData = $this->graph_obj->getDataRaw($ref1,$fromTime,$toTime);
    
            $machineData = $this->graph_obj->getDataRaw($ref,$fromTime,$toTime);
            // $partDetails = $this->data->PartDetails_filter($part_arr);
            $partDetails = $this->data->getPartDetails();
            $machineDetails = $this->data->getMachineDetails();
    
            // new array machine data
            $get_new_machine = $this->data->getmachine_arr();
    
    
            $oee_demo_arr = [];
            foreach ($MachinewiseData as $k2 => $val) {
                $oee_demo_arr[$val['Machine_Id']] = $val['OEE'];
            }
    
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
                    // if (in_array($machine['Machine_ID'],$machine_arr)) {
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
                            $Opportunity_arr = array('Opportunity' => floatval($Opportunity),'SpeedLoss'=>$speedLoss,'part_id'=>$part['part_id'],'part_name'=>$part['part_name']);
                            // if (in_array($part['part_id'],$part_arr)) {
                                $temp = array("part_id"=>$part['part_id'],"data"=>$corrected_tppNICT,"OppCost"=>$Opportunity_arr,"speedLoss"=>$speedLoss);
                                array_push($tmpMachine, $temp);
                                array_push($varData, $Opportunity_arr);
                            // }
                          
                        }
                      
                        $m_name_tmp = $get_new_machine[$machine['Machine_ID']]['machine_name'];
                        $z= array("machine_id"=>$machine['Machine_ID'],"machineData"=>$varData,"machine_name"=>$m_name_tmp,"oee"=>$oee_demo_arr[$machine['Machine_ID']]);
                        array_push($varDataMachine, $z);
                    // }
                   
                }
            }
    
    
            // sorting data
            for($i=0;$i<count($varDataMachine);$i++){
                for ($j=$i+1; $j < count($varDataMachine); $j++) { 
                    if ($varDataMachine[$i]['oee']>$varDataMachine[$j]['oee']) {
                        $index_min = $j;
                        $tmp = $varDataMachine[$i];
                        $varDataMachine[$i] = $varDataMachine[$j];
                        $varDataMachine[$j] = $tmp;
                    }
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
            // $res['machine_data_demo'] = $get_new_machine;
    
            //sorting in desending order......
            $out = $this->selectionSortQuality($res,sizeof($res['Total']));

            $end_Time_logger_performance  = microtime(true);
            $execution_time_logger_performance = ($end_Time_logger_performance - $start_time_logger_performance);
            log_message("info","oee drill down graph function execution duration is :\t".$execution_time_logger_performance);


            echo json_encode($out);
            // echo "<pre>";
            // print_r($out);     
        }
       
    }

    // first loader quality graph fucntion
    public function first_loader_quality(){
        if ($this->request->isAJAX()) {

            log_message("info","\n\n oee drill down module quality graph function calling !!");
            $start_time_logger_quality = microtime(true);


            $ref = "qualityOpportunity";

            $fromTime = $this->request->getVar("from");
            $toTime = $this->request->getVar("to");
            // $machine_arr = $this->request->getVar('machine_arr');
            // $quality_arr = $this->request->getVar('quality_arr');
    
            // $fromTime = "2024-02-11T00:00:00";
            // $toTime = "2024-02-17T23:00:00";
          
    
            $qualityReason = $this->data->qualityReason();
    
            $ProductionData = $this->graph_obj->getDataRaw($ref,$fromTime,$toTime);
    
            $ref1 = "MachinewiseOEE"; 
            $MachinewiseData = $this->graph_obj->getDataRaw($ref1,$fromTime,$toTime);
    
           
           

            $oee_demo_arr = [];
            $oee_marr = [];
            foreach ($MachinewiseData as $k2 => $val) {
                $oee_demo_arr[$val['Machine_Id']] = $val['OEE'];
                array_push($oee_marr,$val['Machine_Id']);
            }

            
            $ProductionDataExpand = [];
            // $tmp_demo = [];
            foreach ($ProductionData as $key => $value) {
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
               
            }
    
            $partDetails = $this->data->getPartDetails();
    
            $machineDetails = $this->data->getMachineDetails();
     
            $final_arr = [];
            foreach ($qualityReason as $key => $value) {
                $reason_arr = [];
                foreach ($machineDetails as $k1 => $val) {
                    $part_arr = [];
                    foreach ($partDetails as $k3 => $val3) {
                        $tmp_total = 0;
                        foreach ($ProductionDataExpand as $k2 => $val2) {
                            if (($val['machine_id']==$val2['machine_id']) && ($value['quality_reason_id']==$val2['reject_reason'])) {
                                if ($val2['part_id']==$val3['part_id']) {
                                    $tmp_total = $tmp_total + $val2['total_reject'];
                                }
                                
                            }
                        }
                        if ($tmp_total>0) {
                            $tmp_part = array("reason_id"=>$value['quality_reason_id'],"reason_name"=>$value['quality_reason_name'],"part_id"=>$val3['part_id'],"part_name"=>$val3['part_name'],"total_reject"=>$tmp_total);
                            array_push($part_arr,$tmp_part);
                           
                        }
                    }
                    if (in_array($val['machine_id'],$oee_marr)) {
                        if (count($part_arr)>0) {
                            $tmp_machine12 = array("machine_id"=>$val['machine_id'],"machine_name"=>$val['machine_name'],"part_data"=>$part_arr,"oee"=>$oee_demo_arr[$val['machine_id']]);
                            array_push($reason_arr,$tmp_machine12);
                        }
                        else{
                            $tmp_machine12 = array("machine_id"=>$val['machine_id'],"machine_name"=>$val['machine_name'],"part_data"=>array(array("total_reject"=>0)),"oee"=>$oee_demo_arr[$val['machine_id']] );
                            array_push($reason_arr,$tmp_machine12);
                        }    
                    }
                   
                }
    
                if (count($reason_arr)>0) {
                    $tmp_reason = array("reason_id"=>$value['quality_reason_id'],"reason_name"=>$value['quality_reason_name'],"machine_data"=>$reason_arr);
                    array_push($final_arr,$tmp_reason);
                }
            
            }
    
           
            // machine wise total
            // $temp_machine_arr = [];
            foreach ($machineDetails as $key => $value) {
                if (in_array($value['machine_id'],$oee_marr)) {
                    $tmp_total = 0;
                    $machineDetails[$key]['oee'] = $oee_demo_arr[$value['machine_id']];
                    foreach ($ProductionDataExpand as $k1 => $val) {
                        if ($value['machine_id']==$val['machine_id']) {
                            $tmp_total = $tmp_total + $val['total_reject'];
                        }
                    }
                    $machineDetails[$key]['total_rejects'] = $tmp_total;
                }else{
                    unset($machineDetails[$key]);
                }
                // if (in_array($value['machine_id'],$machine_arr)) {
                //     array_push($temp_machine_arr,$machineDetails[$Key]);
    
                // }
            }
    
    
           
            // machine data sorting
            
            for($i=0;$i<count($machineDetails);$i++){
                for($j=$i+1;$j<count($machineDetails);$j++){
                    if ($machineDetails[$i]['oee']>$machineDetails[$j]['oee']) {
                        $index_min = $j;
                        $tmp = $machineDetails[$i];
                        $machineDetails[$i] = $machineDetails[$j];
                        $machineDetails[$j] = $tmp;            
                    }
                }
            }
        
            // graph data sorting
            foreach ($final_arr as $key => $value) {
                for ($i=0; $i<count($value['machine_data']); $i++) { 
                    for ($j=$i+1; $j<count($value['machine_data']); $j++) { 
                        if ($value['machine_data'][$i]['oee']>$value['machine_data'][$j]['oee']) {
                            $index_min = $j;
                            $tmp = $value['machine_data'][$i];
                            $value['machine_data'][$i] = $value['machine_data'][$j];
                            $value['machine_data'][$j] = $tmp;
                        }
                    }
    
                }
                $final_arr[$key] = $value; 
            //    echo "<pre>";
            //    print_r($value['machine_data']);
            }
    
            $output['machine_data'] = $machineDetails;
            $output['part_data'] = $partDetails;
            $output['graph_data'] = $final_arr;
            $output['quality_data'] = $qualityReason;
            // $output['machine_wise_total'] = $machine_wise_total_arr;

            $end_time_logger_quality = microtime(true);
            $execution_time_logger_quality = ($end_time_logger_quality - $start_time_logger_quality);
            log_message("info","oee drill down quality grpah execution duration is :\t".$execution_time_logger_quality);
            // echo "finaly array wise data";
            // echo "<pre>";
            // print_r($output);
            // echo "</pre>";
    

            echo  json_encode($output);
           
    
        }
    }

}


?>