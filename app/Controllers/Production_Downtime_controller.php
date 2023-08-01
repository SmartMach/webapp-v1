<?php

namespace App\Controllers;
use App\Models\Production_Downtime_Model;

class Production_Downtime_controller extends BaseController{

	protected $data;
    protected $pagination_value = 50;
	function __construct(){

		$this->session = \Config\Services::session();

		$this->data = new Production_Downtime_Model();
	}

    // duration calculation function
    public function getDuration($f,$t){
        $from_time = strtotime($f); 
        $to_time = strtotime($t); 
        $diff_minutes = (int)(abs($from_time - $to_time) / 60);
        $diff_sec = abs($from_time - $to_time) % 60;
        $duration = $diff_minutes.".".$diff_sec;
        return $duration;
    }



    // raw data main function
    public function getDataRaw($fromTime=null,$toTime=null){
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

        // return $getAllTimeValues;

        $getOfflineId = $this->data->getOfflineEventId($FromDate,$FromTime,$ToDate,$ToTime);

        // Get the Machine Record.............
        $machine = $this->data->getMachineRecActive($FromDate,$ToDate);

        //Part list Details from Production Info Table between the given from and To durations......
        $part = $this->data->getPartRec($FromDate,$ToDate);

        //Production Data for PDM_Production_Info Table......
        $production = $this->data->getProductionRec($FromDate,$ToDate);

        // Get the Inactive(Current) Data.............
        $getInactiveMachine = $this->data->getInactiveMachineData();

        // return $getInactiveMachine;
        // Date Filte for PDM Reason Mapping Data........
        $len_id = sizeof($getOfflineId);
        $s_time_range_limit =  strtotime($FromDate." ".$FromTime);
        $e_time_range_limit =  strtotime($ToDate." ".$ToTime);
        /*
        foreach ($output as $key => $value) {
            $check_no = 0;
            // check if machien event id is same on offline and no data
            foreach($getOfflineId as $k2 => $v2){
                if ($v2['machine_event_id'] == $value['machine_event_id']) {
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
        */
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


        // if ($graphRef  == "AvailabilityReasonWise") {
        //     return $output;
        // }

        return $output;
    }

    public function getAvailabilityReasonWise($fromTime,$toTime){
        // public function getAvailabilityReasonWise(){
        // $ref = "AvailabilityReasonWise";

        // $fromTime = $this->request->getVar("from");
        // $toTime = $this->request->getVar("to");

        // $fromTime = "2023-02-14T10:00:00";
        // $toTime = "2023-02-20T10:00:00";

        // // Calculation for to find ALL time value
        $tmpFromDate =explode("T", $fromTime);
        $tmpToDate = explode("T", $toTime);


        //Raw data from Reason mapping Table...........
        $rawData = $this->getDataRaw($fromTime,$toTime);

        // return $rawData;
        // echo "<pre>";
        // print_r($fromTime);
        // echo "</pre>";

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
        // $MachineName = $this->convertMachineId($MachineName);
        // Downtime Reason.......
        $DowntimeReason = $this->data->downtimeReason();
        // Machine Data.........
        // $ReasonwiseData = $this->Financial->ReasonwiseData($FromDate,$ToDate);

        //Reason wise Availability for Logical Perspective..........
        $ReasonwiseAvailability =[];
        $AvailabilityTotal = [];
        
        $GrandTotal = 0;
        $finalArray=[];

        // machine wise array ordering
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

                $t=array("machine_id"=>$machine['machine_id'],"reason_id"=>$reason['downtime_reason_id'],"reason"=>$reason_merge_name,"machine_name"=>$machine['machine_name'],"oppCost"=>$reasonValue,"duration"=>$split_duration,"category"=>$reason['downtime_category'],"normal_reason"=>$reason['downtime_reason']);
                array_push($ar,$t);
                $GrandTotal = $GrandTotal+$reasonValue;
            }
            array_push($finalArray,$ar);
        }

        // downtime reason wise ordering
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
        // $res['oppcost_reason'] = 0;

        // echo (int)$GrandTotal;
        //sorting in desending order......
        $out = $this->selectionSortAvailability($res,sizeof($res['total']));
        // echo json_encode($out);   
        //    echo "<pre>";
        //    print_r($out);
        //    echo "</pre>"; 

        return $out;
        
    }

    // availability graph sorting  desc
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

    // opportunity cost by reason 
    public function getdowntime_reason_whise_graph($FromDate,$todate){

        // $FromDate = "2023-02-19T09:00:00";
        // $todate = "2023-02-25T08:00:00";
        // $FromDate = $this->request->getVar('from');
        // $todate = $this->request->getVar('to');
        $result = $this->getAvailabilityReasonWise($FromDate,$todate);
    
        $reason_id_arr = [];
        $temp_total_oppcost = [];
        foreach ($result['reason'] as $key => $value) {
            // $tmp['downtime_reason_id'] = $value['downtime_reason_id'];
            // $tmp['downtime_reason'] = $value['downtime_reason'];
            // $tmp['downtime_category'] = $value['downtime_category'];
            $reason_arr = [];
            foreach ($result['data'] as $k1 => $val) {
               // $demo_arr = [];
                if ($value['downtime_reason_id']===$val[$key]['reason_id']) {
                    // array_push($reason_arr,$val[$key]['oppCost']);
                    $reason_arr[$val[$key]['machine_id']] = $val[$key]['oppCost'];
                    array_push($temp_total_oppcost,$val[$key]['oppCost']);
                }
                
            }
            $reason_arr['downtime_reason_id'] = $value['downtime_reason_id'];
            $reason_arr['downtime_reason'] = $value['downtime_reason'];
            $reason_arr['downtime_category'] = $value['downtime_category'];
            $reason_arr['normal_reason'] = $value['normal_reason'];
            $reason_id_arr[$value['downtime_reason_id']] = $reason_arr;
          

            //array_push($reason_id_arr,$reason_arr);
        }

       /*
        $opporuntiy_cost_reason_arr = [];
       
        foreach ($result['reason'] as $key => $value) {
            $tmp['downtime_reason_id'] = $value['downtime_reason_id'];
            $tmp['downtime_reason'] = $value['downtime_reason'];
            $tmp['downtime_category'] = $value['downtime_category'];
            $tmp['opportunity_cost'] = $result['total'][$key];
            $tmp['duration'] = $result['totalDuration'][$key];
            $tmp['machine_id'] = $value['machine_id'];
            array_push($opporuntiy_cost_reason_arr,$tmp);  
        }
       

        $final_arr['graph'] = $opporuntiy_cost_reason_arr;
        $final_arr['grandTotal'] = $result['grandTotal'];
        $final_arr['total_duration'] = array_sum($result['totalDuration']);
        */
        // echo "<pre>";
        // print_r($result);
        // echo json_encode($final_arr);
        $final_arr['graph'] = $reason_id_arr;
        // $final_arr['grandTotal'] = $result['grandTotal'];
        $final_arr['grandTotal'] = array_sum($temp_total_oppcost);
        $final_arr['total_duration'] = array_sum($result['totalDuration']);
        return $final_arr;
        
    }

    // reason wise duration graph function
    public function reason_duration_graph($from_date,$to_date){
        $result = $this->getAvailabilityReasonWise($from_date,$to_date);
        $reason_id_arr = [];
        foreach ($result['reason'] as $key => $value) {
            // $tmp['downtime_reason_id'] = $value['downtime_reason_id'];
            // $tmp['downtime_reason'] = $value['downtime_reason'];
            // $tmp['downtime_category'] = $value['downtime_category'];
            $reason_arr = [];
            foreach ($result['data'] as $k1 => $val) {
               // $demo_arr = [];
                if ($value['downtime_reason_id']===$val[$key]['reason_id']) {
                    // array_push($reason_arr,$val[$key]['oppCost']);
                    $reason_arr[$val[$key]['machine_id']] = $val[$key]['duration'];
                }
            }
            $reason_arr['downtime_reason_id'] = $value['downtime_reason_id'];
            $reason_arr['downtime_reason'] = $value['downtime_reason'];
            $reason_arr['downtime_category'] = $value['downtime_category'];
            $reason_arr['normal_reason'] = $value['normal_reason'];
            $reason_id_arr[$value['downtime_reason_id']] = $reason_arr;
            //array_push($reason_id_arr,$reason_arr);
        }
        $final_arr['graph'] = $reason_id_arr;
        $final_arr['grandTotal'] = $result['grandTotal'];
        $final_arr['total_duration'] = array_sum($result['totalDuration']);
        return $final_arr;
    }

    // machine wise opportunity cost
    /* tempoary
    public function getMachine_wise_opporuntiy_cost(){
        // $fromdate = "2023-02-10T10:00:00";
        // $todate = "2023-02-20T10:00:00";
        $fromdate = $this->request->getVar('from');
        $todate = $this->request->getVar('to');
        $result = $this->getAvailabilityReasonWise($fromdate,$todate);

       
        $machine_wise_arr = [];
        foreach ($result['data'] as $key => $value) {
            $machine_arr=[];
            $duration = 0;
            $oppcost = 0;
            foreach ($value as $k1 => $v1) {
                $oppcost = $oppcost+$v1['oppCost'];
                $duration = $duration+$v1['duration'];
            }
            $tmp['machine_id'] = $value[0]['machine_id'];
            $tmp['machine_name'] = $value[0]['machine_name'];
            $tmp['oppcost'] = $oppcost;
            // $tmp['duration'] = $duration;

            array_push($machine_wise_arr,$tmp);
        }

        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        // echo "<br>";
        $final_arr['graph'] = $machine_wise_arr;
        $final_arr['grant_total'] = $result['grandTotal'];
        // echo "machine wise opportunity cost";
        // echo "<pre>";
        // print_r($final_arr);
        // echo "</pre>";
        echo json_encode($final_arr);
    }
    


    // get stacked bar graph this function also temporary hide because the reason for graph filter
    public function getmachine_reason_duration(){
        // echo "get Downtime duration machine with reasons";
        // $fromdate = "2023-01-10T10:00:00";
        // $todate = "2023-01-10T10:00:00";
        $fromdate = $this->request->getVar('from');
        $todate = $this->request->getVar('to');
        $result = $this->getAvailabilityReasonWise($fromdate,$todate);

        $farr = [];
        foreach ($result['data'] as $key => $value) {
            $machine_arr = [];
            $machine_arr['machine_id'] = $value[0]['machine_id'];
            $machine_arr['machine_name'] = $value[0]['machine_name'];
            $tmp_reason = [];
            $tmp_duration = [];
            $tmp_reason_id = [];
            $tmp_total = 0;
            foreach ($value as $k1 => $v1) {       
                array_push($tmp_duration,$v1['duration']);
                array_push($tmp_reason,$v1['reason']);
                array_push($tmp_reason_id,$v1['reason_id']);
            }
            $machine_arr['reason_id'] = $tmp_reason_id;
            $machine_arr['reason_name']  = $tmp_reason;
            $machine_arr['total'] = array_sum($tmp_duration);
            $machine_arr['reason_duration'] = $tmp_duration;
            array_push($farr,$machine_arr);
        }

        $out=[];
        $out['reason']=$result['reason'];
        $out['data']=$farr;
        $out['total_duration'] = array_sum($result['totalDuration']);
        echo json_encode($out);
    }
    */

    // get tableview records
    public function get_table_view($fromdate,$todate){
        // $fromdate = "2023-02-14T10:00:00";
        // $todate = "2023-02-20T10:00:00";
        $from_date = explode("T",$fromdate);
        $to_date = explode("T",$todate);
        // $result = $this->data->getpdmreason_data($from_date[0],$to_date[0]);
        $result = $this->getDataRaw($fromdate,$todate);
        
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        // return $result;
        $machine_data = $this->data->getmachine_name();
        $part_arr = $this->data->getpart_arr();
        $getuser_arr = $this->data->getuser_data($this->session->get('active_site'));
        // $getpart_data = $this->data->getpart_data();

        $demo_arr = [];
        foreach ($result as $key => $value) {
            // $result[$key]['machine_name'] = $machine_data[$value['machine_id']];
            // $result[$key]['tool_name'] = $part_arr['tool'][$value['tool_id']];
            $part_demo_arr = explode(",",$value['part_id']);
            foreach ($part_demo_arr as $k1 => $v1) {
                $temp['machine_event_id'] = $value['machine_event_id'];
                $temp['machine_id'] = $value['machine_id'];
                $temp['shift_date'] = $value['shift_date'];
                $temp['Shift_id'] = $value['Shift_id'];
                $temp['downtime_reason_id'] = $value['downtime_reason_id'];
                $temp['split_duration'] = $value['split_duration'];
                $temp['tool_id'] = $value['tool_id'];
                $temp['part_id'] = $v1;
                $temp['notes'] = $value['notes'];
                if ($getuser_arr[$value['last_updated_by']]) {
                    // echo "not ok";
                    $temp['last_updated_by'] =  $getuser_arr[$value['last_updated_by']];
                }else{
                    $temp['last_updated_by'] =  " ";
                }
               
                $temp['last_updated_on'] = $value['last_updated_on'];
                $temp['downtime_category'] = $value['downtime_category'];
                $temp['downtime_reason'] = $value['downtime_reason'];
                $temp['machine_name'] = $machine_data[$value['machine_id']];
                $temp['part_name'] = $part_arr['part'][$v1];
                $temp['tool_name'] = $part_arr['tool'][$value['tool_id']];

                array_push($demo_arr,$temp);
            }

        }
        return $demo_arr;
      
    }


    // first visible 0 to 49 records
    public function gettable_data(){

        // $from_date = "2023-02-12T09:00:00";
        // $to_date = "2023-02-20T08:00:00";
        $from_date = $this->request->getVar('from');
        $to_date = $this->request->getVar('to');
        // $from_arr = explode("T",$from_date);
        // $to_arr = explode("T",$to_date);
        $res = $this->get_table_view($from_date,$to_date);



        // echo "data filtering records";
        $final['total'] = count($res);
        $final['data'] = $res;
        // echo "<pre>";
        // print_r($final);
        // echo "</pre>";
       
        // return $final;
        echo json_encode($final);

    }





 

    // category based reason 
    public function category_based_reason(){
        if ($this->request->isAJAX()) {
            $category = $this->request->getVar('category_temp');
            $res = $this->data->getcategory_based_record($category);
            echo json_encode($res);
        }
    }


    


    // filter records getting
    public function filter_records(){
        if ($this->request->isAJAX()) {

            log_message("info","\n\nproduction downtime table records function calling ");
            $start_time_logger_tb = microtime(true);

            $machine_arr = $this->request->getVar('pass_machine');
            $part_arr = $this->request->getVar('pass_part');
            $reason_arr = $this->request->getVar('pass_reason');
            $created_by_arr = $this->request->getVar('pass_created_by');
            $category_arr = $this->request->getVar('pass_cate');

            $from_date = $this->request->getVar('from');
            $to_date = $this->request->getVar('to');

            // $from_date = "2023-06-01T09:00:00";
            // $to_date = "2023-06-11T09:00:00";
            // $machine_arr = array("all","MC1001","MC1002","MC1003","MC1004","MC1005");
            // $part_arr  = array("all","PT1001", "PT1002", "PT1003","PT1004","PT1005","PT1006","PT1007","PT1008", "PT1009","PT1010","PT1011","PT1012", "PT1013", "PT1014", "PT1015", "PT1016", "PT1017", "PT1018", "PT1019", "PT1020", "PT1021","PT1022","PT1023");
            // $category_arr = array("all","Planned","Unplanned");
            // $reason_arr = array('all_reason', '13', '20', '32', '17', '7', '9', '33', '35', '10', '23', '1', '5', '26', '22', '18', '29', '11', '25', '28', '30', '21', '8', '24', '19', '6', '36', '27', '37', '38', '14', '16', '31', '12', '15', '34', '2', '3', '0');
            // $created_by_arr = array("all","UM1001", "UM1002", "UM1003", "UM1004", "UM1005","UM1006", "UM1007","UM1008", "UO1001", "UO1002","UO1003");


            $fdate = explode("T",$from_date);
            $tdate = explode("T",$to_date);


            $result = $this->data->single_arr_filter($fdate[0],$tdate[0]);
            $final_res1 = $this->getdata_time_filter($from_date,$to_date,$result);

            $final_res = [];
            foreach ($final_res1 as $key => $value) {
                if (in_array($value['downtime_category'],$category_arr)) {
                   if (in_array($value['downtime_reason_id'],$reason_arr)) {
                        if (in_array($value['machine_id'],$machine_arr)) {
                            if (in_array($value['part_id'],$part_arr)) {
                                if (in_array("all",$created_by_arr)) {
                                    array_push($final_res,$final_res1[$key]);
                                }else if(!in_array("all",$created_by_arr)){
                                    if (in_array($value['last_updated_id'],$created_by_arr)) {
                                        array_push($final_res,$final_res1[$key]);
                                    }
                                }
                            }
                        }
                   }
                }
            }
            $final1['total'] = count($final_res);
            $final1['data'] = $final_res;
   
            // echo "<pre>";
            // print_r($final1);
            // $tmp['machine_arr'] = $machine_arr;
            // $tmp['part_arr'] = $part_arr;
            // $tmp['category'] = $category_arr;
            // $tmp['reason'] = $reason_arr;
            // $tmp['created'] = $created_by_arr;
            $end_time_logger_tb = microtime(true);
            $execution_time_logger_tb = ($end_time_logger_tb - $start_time_logger_tb);
            log_message("info","production downtime table records function execution duration is :\t".$execution_time_logger_tb);


            echo  json_encode($final1);
            /*
            if (($machine_arr==null)&&($machine_arr=="")) {
                if (($part_arr==null) && ($part_arr=="")) {
                    if (($reason_arr==null)&&($reason_arr=="")) {
                        if (($category_arr==null)&&($category_arr=="")) {
                            if (($created_by_arr==null) && ($created_by_arr=="")) {
                                // echo json_encode("all fields are empty start time end time work");
                                $res = $this->get_table_view($from_date,$to_date);
                                $final['total'] = count($res);
                                $final['data'] = $res;
                                echo json_encode($final);


                            }else{
                                // echo json_encode($temp); // getdata_time_filter
                                $name = "created_by";
                                $result = $this->data->single_arr_filter($fdate[0],$tdate[0],$created_by_arr,$name);
                                $final_res = $this->getdata_time_filter($from_date,$to_date,$result);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo  json_encode($final);
                            }
                        }else{
                            // return "created by array and category array";
                            if (($created_by_arr==null)&&($created_by_arr=="")) {
                                $name="category";
                                $result = $this->data->single_arr_filter($fdate[0],$tdate[0],$category_arr,$name);
                                $final_res1 = $this->getdata_time_filter($from_date,$to_date,$result);
                                $final1['total'] = count($final_res1);
                                $final1['data'] = $final_res1;
                                echo  json_encode($final1);

                            }else{
                                //echo json_encode("created by array and category array");
                                $name = "created_category";
                                $res = $this->data->two_arr_filter($fdate[0],$tdate[0],$created_by_arr,$category_arr,$name);
                                $final_res = $this->getdata_time_filter($from_date,$to_date,$res);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                            }
                        }
                    }else{
                        //return "reason array and category array and created by array";
                        if (($category_arr==null)&&($category_arr=="")) {
                            if (($created_by_arr==null) && ($created_by_arr=="")) {
                                // echo json_encode("reason array only");
                                $name="reasons";
                                $result = $this->data->single_arr_filter($fdate[0],$tdate[0],$reason_arr,$name);
                                $final_res1 = $this->getdata_time_filter($from_date,$to_date,$result);
                                $final1['total'] = count($final_res1);
                                $final1['data'] = $final_res1;
                                echo  json_encode($final1);

                            }else{

                                $name = "reason_created";
                                $res = $this->data->two_arr_filter($fdate[0],$tdate[0],$reason_arr,$created_by_arr,$name);
                                $final_res = $this->getdata_time_filter($from_date,$to_date,$res);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                //echo json_encode("reason array and created by array ");
                            }
                        }else{
                            if (($created_by_arr==null) && ($created_by_arr=="")) {
                                $name = "reason_category";
                                $res = $this->data->two_arr_filter($fdate[0],$tdate[0],$reason_arr,$category_arr,$name);
                                $final_res = $this->getdata_time_filter($from_date,$to_date,$res);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                //echo json_encode("reason array category array");
                            }else{
                                //echo json_encode("reason array and category and  created by array ");
                                $name="reason_category_created";
                                $res = $this->data->three_arr_filter($fdate[0],$tdate[0],$reason_arr,$category_arr,$created_by_arr,$name);
                                $final_res = $this->getdata_time_filter($from_date,$to_date,$res);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                            }
                        }
                    }
                }else{
                    if (($reason_arr==null)&&($reason_arr=="")) {
                        if (($category_arr==null)&&($category_arr=="")) {
                            if (($created_by_arr==null) && ($created_by_arr=="")) {
                                // echo json_encode("parts array only");
                                $res = $this->getpart_based_filter($part_arr,$from_date,$to_date);
                                $final['total'] = count($res);
                                $final['data'] = $res;
                                echo json_encode($final);
                                
                            }else{
                                $name="created_by";
                                $result = $this->data->single_arr_filter($fdate[0],$tdate[0],$created_by_arr,$name);
                                $final_res = $this->getdata_time_part_filter($from_date,$to_date,$result,$part_arr);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo  json_encode($final);
                                //echo  json_encode("parts array and created by array");
                            }
                        }else{
                            if (($created_by_arr==null) && ($created_by_arr=="")) {
                                $name="category";
                                $result = $this->data->single_arr_filter($fdate[0],$tdate[0],$category_arr,$name);
                                $final_res = $this->getdata_time_part_filter($from_date,$to_date,$result,$part_arr);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo  json_encode($final);
                                // echo json_encode("parts array and category array");
                            }else{

                                $name = "created_category";
                                $res = $this->data->two_arr_filter($fdate[0],$tdate[0],$created_by_arr,$category_arr,$name);
                                $final_res = $this->getdata_time_part_filter($from_date,$to_date,$res,$part_arr);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                //echo  json_encode("parts array and category array and created by array");
                            }
                        }
                    }else{
                        if (($category_arr==null)&&($category_arr=="")) {
                            if (($created_by_arr==null) && ($created_by_arr=="")) {
                                $name="reasons";
                                $result = $this->data->single_arr_filter($fdate[0],$tdate[0],$reason_arr,$name);
                                $final_res = $this->getdata_time_part_filter($from_date,$to_date,$result,$part_arr);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo  json_encode($final);
                                //echo json_encode("parts array and reason array");
                            }else{
                                $name = "reason_created";
                                $res = $this->data->two_arr_filter($fdate[0],$tdate[0],$reason_arr,$created_by_arr,$name);
                                $final_res = $this->getdata_time_part_filter($from_date,$to_date,$res,$part_arr);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                // echo  json_encode("parts array and reason array created by array");
                            }
                        }else{
                            if (($created_by_arr==null) && ($created_by_arr=="")) {
                                $name = "reason_category";
                                $res = $this->data->two_arr_filter($fdate[0],$tdate[0],$reason_arr,$category_arr,$name);
                                $final_res = $this->getdata_time_part_filter($from_date,$to_date,$res,$part_arr);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                //echo json_encode("parts array and reason array and category array");
                            }else{
                                $name="reason_category_created";
                                $res = $this->data->three_arr_filter($fdate[0],$tdate[0],$reason_arr,$category_arr,$created_by_arr,$name);
                                $final_res = $this->getdata_time_part_filter($from_date,$to_date,$res,$part_arr);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                //echo  json_encode("parts array and reason array and category array and created by array");
                            }
                        }
                    }
                }
            }else{
                //return "all fields are filling";
                if (($part_arr==null) && ($part_arr=="")) {
                    if (($reason_arr==null)&&($reason_arr=="")) {
                        if (($category_arr==null)&&($category_arr=="")) {
                            if (($created_by_arr==null) && ($created_by_arr=="")) {
                                // echo json_encode("Machine array only");
                                $name="machine";
                                $result = $this->data->single_arr_filter($fdate[0],$tdate[0],$machine_arr,$name);
                                $final_res1 = $this->getdata_time_filter($from_date,$to_date,$result);
                                $final1['total'] = count($final_res1);
                                $final1['data'] = $final_res1;
                                echo  json_encode($final1);
                                
                            }else{
                                $name = "machine_created";
                                $res = $this->data->two_arr_filter($fdate[0],$tdate[0],$machine_arr,$created_by_arr,$name);
                                $final_res = $this->getdata_time_filter($from_date,$to_date,$res);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                // echo json_encode(" machine array and created by array");
                            }
                        }else{
                            // return "created by array and category array";
                            if (($created_by_arr==null)&&($created_by_arr=="")) {
                                $name = "machine_category";
                                $res = $this->data->two_arr_filter($fdate[0],$tdate[0],$machine_arr,$category_arr,$name);
                                $final_res = $this->getdata_time_filter($from_date,$to_date,$res);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                //echo  json_encode(" machine array and category by array");
                            }else{
                                $name="machine_created_category";
                                $res = $this->data->three_arr_filter($fdate[0],$tdate[0],$machine_arr,$created_by_arr,$category_arr,$name);
                                $final_res = $this->getdata_time_filter($from_date,$to_date,$res);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                //echo json_encode(" machine array and  created by array and category array");
                            }
                        }
                    }else{
                        //return "reason array and category array and created by array";
                        if (($category_arr==null)&&($category_arr=="")) {
                            if (($created_by_arr==null) && ($created_by_arr=="")) {
                                $name = "machine_reason";
                                $res = $this->data->two_arr_filter($fdate[0],$tdate[0],$machine_arr,$reason_arr,$name);
                                $final_res = $this->getdata_time_filter($from_date,$to_date,$res);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                // echo json_encode("machine array and reason array");
                            }else{
                                $name="machine_reason_created";
                                $res = $this->data->three_arr_filter($fdate[0],$tdate[0],$machine_arr,$reason_arr,$created_by_arr,$name);
                                $final_res = $this->getdata_time_filter($from_date,$to_date,$res);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                // echo json_encode("machine array and reason array and created by array ");
                            }
                        }else{
                            if (($created_by_arr==null) && ($created_by_arr=="")) {
                                $name="machine_reason_category";
                                $res = $this->data->three_arr_filter($fdate[0],$tdate[0],$machine_arr,$reason_arr,$category_arr,$name);
                                $final_res = $this->getdata_time_filter($from_date,$to_date,$res);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                //echo json_encode("machine array and reason array category array");

                            }else{
                                $name = "machine_reason_category_created";
                                $res = $this->data->four_arr_filter($fdate[0],$tdate[0],$machine_arr,$reason_arr,$category_arr,$created_by_arr,$name);
                                $final_res = $this->getdata_time_filter($from_date,$to_date,$res);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                               // echo json_encode("machine array and reason array and category and  created by array ");
                            }
                        }
                    }
                }else{
                    if (($reason_arr==null)&&($reason_arr=="")) {
                        if (($category_arr==null)&&($category_arr=="")) {
                            if (($created_by_arr==null) && ($created_by_arr=="")) {
                                //echo json_encode("machine array and parts array");
                                $name="machine";
                                $result = $this->data->single_arr_filter($fdate[0],$tdate[0],$machine_arr,$name);
                                $final_res = $this->getdata_time_part_filter($from_date,$to_date,$result,$part_arr);
                                $final1['total'] = count($final_res);
                                $final1['data'] = $final_res;
                                echo  json_encode($final1);
                            }else{
                                $name = "machine_created";
                                $res = $this->data->two_arr_filter($fdate[0],$tdate[0],$machine_arr,$created_by_arr,$name);
                                $final_res = $this->getdata_time_part_filter($from_date,$to_date,$res,$part_arr);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                // echo  json_encode("machine array and parts array and created by array");
                            }
                        }else{
                            if (($created_by_arr==null) && ($created_by_arr=="")) {
                                $name = "machine_category";
                                $res = $this->data->two_arr_filter($fdate[0],$tdate[0],$machine_arr,$category_arr,$name);
                                $final_res = $this->getdata_time_part_filter($from_date,$to_date,$res,$part_arr);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                // echo json_encode("machine array and  parts array and category array");
                            }else{
                                $name="machine_created_category";
                                $res = $this->data->three_arr_filter($fdate[0],$tdate[0],$machine_arr,$created_by_arr,$category_arr,$name);
                                $final_res = $this->getdata_time_part_filter($from_date,$to_date,$res,$part_arr);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                //echo  json_encode("machine array and  parts array and category array and created by array");
                            }
                        }
                    }else{
                        if (($category_arr==null)&&($category_arr=="")) {
                            if (($created_by_arr==null) && ($created_by_arr=="")) {
                                $name = "machine_reason";
                                $res = $this->data->two_arr_filter($fdate[0],$tdate[0],$machine_arr,$reason_arr,$name);
                                $final_res = $this->getdata_time_part_filter($from_date,$to_date,$res,$part_arr);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                // echo json_encode("machine array and parts array and reason array");
                            }else{
                                $name="machine_reason_created";
                                $res = $this->data->three_arr_filter($fdate[0],$tdate[0],$machine_arr,$reason_arr,$created_by_arr,$name);
                                $final_res = $this->getdata_time_part_filter($from_date,$to_date,$res,$part_arr);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                               // echo  json_encode("machine array and  parts array and reason array created by array");
                            }
                        }else{
                            if (($created_by_arr==null) && ($created_by_arr=="")) {
                                $name="machine_reason_category";
                                $res = $this->data->three_arr_filter($fdate[0],$tdate[0],$machine_arr,$reason_arr,$category_arr,$name);
                                $final_res = $this->getdata_time_part_filter($from_date,$to_date,$res,$part_arr);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                                //echo json_encode("machine array and parts array and reason array and category array");
                            }else{
                                $name = "machine_reason_category_created";
                                $res = $this->data->four_arr_filter($fdate[0],$tdate[0],$machine_arr,$reason_arr,$category_arr,$created_by_arr,$name);
                                $final_res = $this->getdata_time_part_filter($from_date,$to_date,$res,$part_arr);
                                $final['total'] = count($final_res);
                                $final['data'] = $final_res;
                                echo json_encode($final);
                               // echo  json_encode("machine array and parts array and reason array and category array and created by array");
                            }
                        }
                    }
                }
            }

            */
            // $res = $this->data->filter_records($temp);
            // echo json_encode($res);
        }
    }

  
    // time filter record
    public function getdata_time_filter($fromTime,$toTime,$res){
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
        // $output = $this->data->getDataRaw($FromDate,$FromTime,$ToDate,$ToTime);
        $output = $res;
        // Data from PDM Events table for find the All Time Duration...........
        $getAllTimeValues = $this->data->getDataRawAll($FromDate,$ToDate);
  
        // return $getAllTimeValues;
  
        $getOfflineId = $this->data->getOfflineEventId($FromDate,$FromTime,$ToDate,$ToTime);
  
        // Get the Machine Record.............
        $machine = $this->data->getMachineRecActive($FromDate,$ToDate);
  
        //Part list Details from Production Info Table between the given from and To durations......
        $part = $this->data->getPartRec($FromDate,$ToDate);
  
        //Production Data for PDM_Production_Info Table......
        $production = $this->data->getProductionRec($FromDate,$ToDate);
  
        // Get the Inactive(Current) Data.............
        $getInactiveMachine = $this->data->getInactiveMachineData();
  
        // return $getInactiveMachine;
        // Date Filte for PDM Reason Mapping Data........
        $len_id = sizeof($getOfflineId);
        foreach ($output as $key => $value) {
            $check_no = 0;
            // check if machien event id is same on offline and no data
            foreach($getOfflineId as $k2 => $v2){
                if ($v2['machine_event_id'] == $value['machine_event_id']) {
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


        // final arrangement
        $final_res = $this->records_arrangement($output);
        return $final_res;
    }

    // records final arrangement
    public function records_arrangement($record){


        $machine_data = $this->data->getmachine_name();
        $part_arr = $this->data->getpart_arr();
        $getuser_arr = $this->data->getuser_data($this->session->get('active_site'));
        // $getpart_data = $this->data->getpart_data();

        $demo_arr = [];
        foreach ($record as $key => $value) {
            // $result[$key]['machine_name'] = $machine_data[$value['machine_id']];
            // $result[$key]['tool_name'] = $part_arr['tool'][$value['tool_id']];
            $part_demo_arr = explode(",",$value['part_id']);
            foreach ($part_demo_arr as $k1 => $v1) {
                $temp['machine_event_id'] = $value['machine_event_id'];
                $temp['machine_id'] = $value['machine_id'];
                $temp['shift_date'] = $value['shift_date'];
                $temp['Shift_id'] = $value['Shift_id'];
                $temp['downtime_reason_id'] = $value['downtime_reason_id'];
                $temp['split_duration'] = $value['split_duration'];
                $temp['tool_id'] = $value['tool_id'];
                $temp['part_id'] = $v1;
                $temp['notes'] = $value['notes'];
                if ($getuser_arr[$value['last_updated_by']]) {
                    // echo "not ok";
                    $temp['last_updated_by'] =  $getuser_arr[$value['last_updated_by']];
                    $temp['last_updated_id'] = $value['last_updated_by'];
                }else{
                    $temp['last_updated_by'] =  " ";
                    $temp['last_updated_id'] = " ";
                }
                $temp['start_time'] = $value['start_time'];
                $temp['end_time'] = $value['end_time'];
                $temp['last_updated_on'] = $value['last_updated_on'];
                $temp['downtime_category'] = $value['downtime_category'];
                $temp['downtime_reason'] = $value['downtime_reason'];
                $temp['machine_name'] = $machine_data[$value['machine_id']];
                $temp['part_name'] = $part_arr['part'][$v1];
                $temp['tool_name'] = $part_arr['tool'][$value['tool_id']];


                array_push($demo_arr,$temp);
            }

        }

        return $demo_arr;
    }


    // part based filtering
    public function getpart_based_filter($part_arr,$from_date,$to_date){
        $res = $this->getDataRaw($from_date,$to_date);
        $final = $this->records_arrangement($res);
        $demo_arr = [];
        foreach ($part_arr as $key => $value) {
            foreach ($final as $k1 => $val) {
                if ($value===$val['part_id']) {
                    array_push($demo_arr,$final[$k1]);
                }
            }
        }

        return $demo_arr;
    }

    // part based filter double array
    public function getdata_time_part_filter($fdate,$tdate,$res,$part_arr){
        $final = $this->getdata_time_filter($fdate,$tdate,$res);
        $demo_arr = [];
        foreach ($part_arr as $key => $value) {
            foreach ($final as $k1 => $val) {
                if ($value===$val['part_id']) {
                    array_push($demo_arr,$final[$k1]);
                }
            }
        }

        return $demo_arr;

    }


    // // graph filte reason wise opportunity cost
    public function graph_filter_reason_wise_oppcost(){
        if ($this->request->isAJAX()) {
            $machine_arr = $this->request->getVar('machine_arr');
            $reason_arr = $this->request->getVar('reason_arr');
            $category_arr = $this->request->getVar('category_arr');

            $FromDate = $this->request->getVar('from');
            $todate = $this->request->getVar('to');
            // $FromDate = "2023-02-02T10:00:00";
            // $todate = "2023-03-06T14:00:00";
            // $machine_arr = array('all','MC1001','MC1002','MC1003','MC1004');
            // $category_arr = array('all','Planned','Unplanned');
            $res = $this->getdowntime_reason_whise_graph($FromDate,$todate);

            $reason_arr = array_map('strtolower',$reason_arr);

            $demo_arr = [];
            $oppcost_total = [];
            foreach ($res['graph'] as $key => $value) {
                if (in_array($value['downtime_category'],$category_arr)) {
                    // $tmp_reason = explode("(",$value['downtime_reason']);
                    // if (in_array(trim($tmp_reason[0]),$reason_arr)) {
                        //array_push($demo_arr,$res['graph'][$key]);
                    if (in_array(strtolower($value['normal_reason']),$reason_arr)) {
                        $temp_opportunity_cost=0;
                        foreach ($machine_arr as $key_machine => $val) {
                            if ($val!="all") {
                                $temp_opportunity_cost = $temp_opportunity_cost+$res['graph'][$key][$val];
                            }
                        }
                        array_push($oppcost_total,$temp_opportunity_cost);
                        $res['graph'][$key]['opportunity_cost'] = $temp_opportunity_cost;
                        array_push($demo_arr,$res['graph'][$key]);

                    }
                }
            }
            
            $temp['graph'] = $demo_arr;
            $temp['grandTotal'] = array_sum($oppcost_total);
            $temp['total_duration'] = $res['total_duration'];
            // $out['old'] = $temp['graph'];
            $out = $this->cost_based_sorting($temp);
            // echo "<pre>";
            // print_r($out);

            echo json_encode($out);
        }
    }

    public function cost_based_sorting($arr){
        for($i=0;$i<count($arr['graph']);$i++){
            $min_index = $i;
           
            for ($j=$i+1; $j<count($arr['graph']); $j++) { 
                if ($arr['graph'][$j]['opportunity_cost']>$arr['graph'][$i]['opportunity_cost']) {
                   
                    // $temp = $arr['graph'][$i];
                    // $arr['graph'][$i] = $arr['graph'][$min_index];
                    // $arr['graph'][$min_index] = $temp;
                    $min_idx = $j;
                    $temp1 = $arr['graph'][$i];
                    $arr['graph'][$i] = $arr['graph'][$min_idx];
                    $arr['graph'][$min_idx] = $temp1;
                 
                }
            }
           
          
            
        }
       
       

        return $arr;
    }
   

    // gaph filter reason wise duration graph function
    public function getdowntime_graph_filter_reason_duration(){
        if ($this->request->isAJAX()) {
            $reason_arr = $this->request->getVar('reason_arr');
            $machine_arr = $this->request->getVar('machine_arr');
            $category_arr = $this->request->getVar('category_arr');

            $fromdate = $this->request->getVar('from');
            $todate = $this->request->getVar('to');
            // $fromdate = "2023-02-02T10:00:00";
            // $todate="2023-03-06T14:00:00";
            //  $machine_arr = array('all','MC1001','MC1002','MC1003','MC1004');
            // $category_arr = array('all','Planned','Unplanned');
            $reason_arr = array_map('strtolower',$reason_arr);

            $res = $this->reason_duration_graph($fromdate,$todate);

            $demo_arr = [];
            $total_duration_arr = [];
            foreach ($res['graph'] as $key => $value) {
                if (in_array($value['downtime_category'],$category_arr)) {
                    if (in_array(strtolower($value['normal_reason']),$reason_arr)) {     
                        $temp_duration=0;
                        foreach ($machine_arr as $key_machine => $val) {
                            if ($val!="all") {
                                $temp_duration = $temp_duration+$res['graph'][$key][$val];
                            }
                        }
                        array_push($total_duration_arr,$temp_duration);
                        $res['graph'][$key]['duration'] = $temp_duration;
                        array_push($demo_arr,$res['graph'][$key]);

                    }
                }
            }

            $temp['graph'] = $demo_arr;
            $temp['grandTotal'] = $res['grandTotal'];
            $temp['total_duration'] = array_sum($total_duration_arr);
            $out = $this->sort_duration_based($temp);
            // echo "<pre>";
            // print_r($out);
            echo  json_encode($out);
        }
    }

    public function sort_duration_based($arr){
        for($i=0;$i<count($arr['graph']);$i++){
            $min_index = $i;
           
            for ($j=$i+1; $j<count($arr['graph']); $j++) { 
                if ($arr['graph'][$j]['duration']>$arr['graph'][$i]['duration']) {
                   
                    // $temp = $arr['graph'][$i];
                    // $arr['graph'][$i] = $arr['graph'][$min_index];
                    // $arr['graph'][$min_index] = $temp;
                    $min_idx = $j;
                    $temp1 = $arr['graph'][$i];
                    $arr['graph'][$i] = $arr['graph'][$min_idx];
                    $arr['graph'][$min_idx] = $temp1;
                 
                }
            }
            
        }

        return $arr;
    }

        
    // machine wise oppcost
    public function filter_machine_wise_oppcost(){
       if ($this->request->isAJAX()) {
            
            $reason_arr = $this->request->getVar('reason_arr');
            $machine_arr = $this->request->getVar('machine_arr');
            $category_arr = $this->request->getVar('category_arr');

            $reason_arr = array_map('strtolower',$reason_arr);

            $fromdate = $this->request->getVar('from');
            $todate = $this->request->getVar('to');

            // $fromdate = "2023-02-02T10:00:00";
            // $todate = "2023-03-06T14:00:00";
            // $machine_arr= array('all','MC1001','MC1002','MC1003','MC1004');
            // $category_arr = array('all','Planned','Unplanned');

            $result = $this->getAvailabilityReasonWise($fromdate,$todate);
           
            $machine_wise_arr = [];
            $total_oppcost_arr = [];
            foreach ($result['data'] as $key => $value) {
               $demo_reason_arr=[];
                $duration = 0;
                $oppcost = 0;
                foreach ($value as $k1 => $v1) {
                    if (in_array($v1['machine_id'],$machine_arr)) {
                        if (in_array($v1['category'],$category_arr)) {
                            if (in_array(strtolower($v1['normal_reason']),$reason_arr)) {
                                $oppcost = $oppcost+$v1['oppCost'];
                                array_push($demo_reason_arr,$v1['normal_reason']);
                                
                            }
                        }
                    }
                }

                if (in_array($value[0]['machine_id'],$machine_arr)) {
                    $tmp['machine_id'] = $value[0]['machine_id'];
                    $tmp['machine_name'] = $value[0]['machine_name'];
                    $tmp['oppcost'] = $oppcost;
                    $tmp['check'] = $demo_reason_arr;
                    // $tmp['duration'] = $duration;
                    array_push($total_oppcost_arr,$oppcost);
                    array_push($machine_wise_arr,$tmp);
                }
                // array_push($machine_wise_arr,$value[ 0]);
            }
            
       
            $final_arr['graph'] = $machine_wise_arr;
            // $final_arr['grant_total'] = $result['grandTotal'];
            $final_arr['grant_total'] = array_sum($total_oppcost_arr);

            $out = $this->machine_wise_oppcost_sort($final_arr);
            // echo "<pre>";
            // print_r($out);
            echo json_encode($out);
        }
    }

    public function machine_wise_oppcost_sort($arr){
        for($i=0;$i<count($arr['graph']);$i++){
            $min_index = $i;
           
            for ($j=$i+1; $j<count($arr['graph']); $j++) { 
                if ($arr['graph'][$j]['oppcost']>$arr['graph'][$i]['oppcost']) {
                   
                    // $temp = $arr['graph'][$i];
                    // $arr['graph'][$i] = $arr['graph'][$min_index];
                    // $arr['graph'][$min_index] = $temp;
                    $min_idx = $j;
                    $temp1 = $arr['graph'][$i];
                    $arr['graph'][$i] = $arr['graph'][$min_idx];
                    $arr['graph'][$min_idx] = $temp1;
                 
                }
            }
            
        }
        return $arr;
    }

    // machine and reason wise duration
    public function filter_machine_reason_duration(){
        if ($this->request->isAJAX()) {
            $reason_arr = $this->request->getVar('reason_arr');
            $machine_arr = $this->request->getVar('machine_arr');
            $category_arr = $this->request->getVar('category_arr');

            $reason_arr = array_map('strtolower',$reason_arr);

            $fromdate = $this->request->getVar('from');
            $todate = $this->request->getVar('to');

            // $fromdate = "2023-02-02T10:00:00";
            // $todate = "2023-03-06T14:00:00";
            // $machine_arr= array('all','MC1001','MC1002','MC1003','MC1004');
            // $category_arr = array('all','Planned','Unplanned');


            $result = $this->getAvailabilityReasonWise($fromdate,$todate);

            $farr = [];
            $total_duration_arr = [];
            foreach ($result['data'] as $key => $value) {
                $tmp_arr = [];
               
                $tmp_reason = [];
                $tmp_duration = [];
                $tmp_reason_id = [];
                $tmp_total = 0;
                foreach ($value as $k1 => $v1) {  
                    if (in_array($v1['machine_id'],$machine_arr)) {
                        if (in_array($v1['category'],$category_arr)) {
                            // $tmp_reason = explode("(",$v1['reason']);
                            if (in_array(strtolower($v1['normal_reason']),$reason_arr)) {     
                                array_push($tmp_duration,$v1['duration']);
                                array_push($tmp_reason,$v1['reason']);
                                array_push($tmp_reason_id,$v1['reason_id']);
                            }
                        }
                    }
                }

                if (in_array($value[0]['machine_id'],$machine_arr)) {
                    $tmp_arr['machine_id'] = $value[0]['machine_id'];
                    $tmp_arr['machine_name'] = $value[0]['machine_name'];
                    $tmp_arr['reason_id'] = $tmp_reason_id;
                    $tmp_arr['reason_name']  = $tmp_reason;
                    $tmp_arr['total'] = array_sum($tmp_duration);
                    $tmp_arr['reason_duration'] = $tmp_duration;
                    array_push($total_duration_arr,array_sum($tmp_duration));
                    array_push($farr,$tmp_arr);
                }
            }
    

            $out=[];
            $out['reason']=$result['reason'];
            $out['data']=$farr;
            $out['total_duration'] = array_sum($total_duration_arr);

            $final = $this->getmachine_reason_sorting($out);
            // echo "<pre>";
            // print_r($final);
            echo json_encode($final);
            // $temp['machine_arr'] = $machine_arr;
            // $temp['reason_arr'] = $reason_arr;
            // $temp['category_arr'] = $category_arr;
            // $temp['from_date'] = $fromdate;
            // $temp['todate'] = $todate;


            // echo json_encode($temp);
        }
    }

    public function getmachine_reason_sorting($arr){
        for($i=0;$i<count($arr['data']);$i++){
            $min_index = $i;
           
            for ($j=$i+1; $j<count($arr['data']); $j++) { 
                if ($arr['data'][$j]['total']>$arr['graph'][$i]['total']) {
                   
                    // $temp = $arr['graph'][$i];
                    // $arr['graph'][$i] = $arr['graph'][$min_index];
                    // $arr['graph'][$min_index] = $temp;
                    $min_idx = $j;
                    $temp1 = $arr['data'][$i];
                    $arr['data'][$i] = $arr['data'][$min_idx];
                    $arr['data'][$min_idx] = $temp1;
                 
                }
            }
            
        }

        return $arr;
    }


    // all filter dropdown win one function 
    public function getall_filter_arr(){
        if ($this->request->isAJAX()) {
            log_message("info","\n\nproduction downtime graph filter dropdown function calling ");
            $start_time_logger_drp = microtime(true);

            $machine_drp = $this->data->getmachine_record_data();
            $part_drp = $this->data->getpart_data_drp();
            $sid = $this->session->get('active_site');        
            $created_drp = $this->data->created_by_drp($sid);
            $downtime_reason_drp = $this->data->downtime_reason_filter_con();

            $res['machine'] = $machine_drp;
            $res['part'] = $part_drp;
            $res['created_by'] = $created_drp;
            $res['downtime_reason'] = $downtime_reason_drp;

            $end_time_logger_drp = microtime(true);
            $execution_time_logger_drp = ($end_time_logger_drp - $start_time_logger_drp);
            log_message("info","production downtime graph filter dorpdown function execution duration is :\t".$execution_time_logger_drp);

            echo json_encode($res); 
        }
       
    }


    // production downtime loader reason wise oppcost
    public function first_reason_oppcost(){

        if ($this->request->isAJAX()) {
            log_message("info","\n\nproduction downtime graph reason wise oppcost graph calling");
            $start_time_pd_logger_rc = microtime(true); 

            
            // $FromDate = "2023-06-10T12:00:00";
            // $todate = "2023-06-16T11:00:00";
            $FromDate = $this->request->getvar('from');
            $todate = $this->request->getvar('to');


            $res = $this->getdowntime_reason_whise_graph($FromDate,$todate);
            $machine_drp = $this->data->getmachine_record_data();

            $demo_arr = [];
            $oppcost_arr = [];
            foreach ($res['graph'] as $key => $value) {
                $tmp_opp_cost = 0;
                foreach ($machine_drp as $k1 => $val) {
                    $tmp_opp_cost = $tmp_opp_cost + $res['graph'][$key][$val['machine_id']];

                }

                array_push($oppcost_arr,$tmp_opp_cost);
                $res['graph'][$key]['opportunity_cost'] = $tmp_opp_cost;
                array_push($demo_arr,$res['graph'][$key]);
            }

            $temp['graph'] = $demo_arr;
            $temp['grandTotal'] = array_sum($oppcost_arr);
            $temp['total_duration'] = $res['total_duration'];
            // echo "<pre>";
            // print_r($temp);
            $out = $this->cost_based_sorting($temp);

            $end_time_pd_logger_rc = microtime(true);
            $execution_time_logger_rc = ($end_time_pd_logger_rc - $start_time_pd_logger_rc);
            log_message("info","production downtime reason wise oppcost duration is :\t".$execution_time_logger_rc); 

            echo json_encode($out);
            
        }
       

    }

    // production downtime loader reason wise duration graph
    public function first_reason_duration(){
        if ($this->request->isAJAX()) {

            log_message("info","\n\nproduction downtime reason wise duration graph calling ");
            $start_time_pd_logger_rd = microtime(true);

            $fromdate = $this->request->getVar('from');
            $todate = $this->request->getVar('to');
            // $fromdate = "2023-06-01T09:00:00";
            // $todate="2023-06-01T21:00:00";
            $res = $this->reason_duration_graph($fromdate,$todate);
            $machine_drp = $this->data->getmachine_record_data();

            $demo_arr = [];
            $total_duration_arr = [];
            foreach ($res['graph'] as $key => $value) {
                $temp_duration=0;
                foreach ($machine_drp as $key_machine => $val) {
                  
                    $temp_duration = $temp_duration+$res['graph'][$key][$val['machine_id']];
                  
                }
                array_push($total_duration_arr,$temp_duration);
                $res['graph'][$key]['duration'] = $temp_duration;
                array_push($demo_arr,$res['graph'][$key]);
            
            }

            $temp['graph'] = $demo_arr;
            $temp['grandTotal'] = $res['grandTotal'];
            $temp['total_duration'] = array_sum($total_duration_arr);
            $out = $this->sort_duration_based($temp);

            $end_time_pd_logger_rd = microtime(true);
            $execution_time_logger_rd = ($end_time_pd_logger_rd - $start_time_pd_logger_rd);
            log_message("info","production downtime reason wise duration graph execution duration is:\t".$execution_time_logger_rd);


            echo  json_encode($out);
            // echo "<pre>";
            // print_r($res);
        }
        
    }

    // production downtime loader machine wise oppcost graph
    public function first_machine_oppcost(){

        if($this->request->isAJAX()){
            log_message("info","\n\nproduction downtime machine wise oppcost graph calling");
            $start_time_pd_logger_mc = microtime(true);

            $fromdate = $this->request->getVar('from');
            $todate = $this->request->getVar('to');
            // $fromdate = "2023-06-10T14:00:00";
            // $todate="2023-06-16T13:00:00";
          
            $result = $this->getAvailabilityReasonWise($fromdate,$todate);
            
            $machine_wise_arr = [];
            $total_oppcost_arr = [];
            foreach ($result['data'] as $key => $value) {
               $demo_reason_arr=[];
                $duration = 0;
                $oppcost = 0;
                foreach ($value as $k1 => $v1) {
                    // if (in_array($v1['machine_id'],$machine_arr)) {
                    //     if (in_array($v1['category'],$category_arr)) {
                            // if (in_array(strtolower($v1['normal_reason']),$reason_arr)) {
                                $oppcost = $oppcost+$v1['oppCost'];
                                array_push($demo_reason_arr,$v1['normal_reason']);
                                
                            // }
                        // }
                    // }
                }

                // if (in_array($value[0]['machine_id'],$machine_arr)) {
                    $tmp['machine_id'] = $value[0]['machine_id'];
                    $tmp['machine_name'] = $value[0]['machine_name'];
                    $tmp['oppcost'] = $oppcost;
                    $tmp['check'] = $demo_reason_arr;
                    // $tmp['duration'] = $duration;
                    array_push($total_oppcost_arr,$oppcost);
                    array_push($machine_wise_arr,$tmp);
                // }
                // array_push($machine_wise_arr,$value[ 0]);
            }
            
       
            $final_arr['graph'] = $machine_wise_arr;
            // $final_arr['grant_total'] = $result['grandTotal'];
            $final_arr['grant_total'] = array_sum($total_oppcost_arr);

            $out = $this->machine_wise_oppcost_sort($final_arr);
            // echo "<pre>";
            // print_r($out);
            $end_time_pd_logger_mc = microtime(true);
            $execution_time_logger_mc = ($end_time_pd_logger_mc - $start_time_pd_logger_mc);
            log_message("info","production downtime machine wise oppcost graph execution duration is : \t".$execution_time_logger_mc);
           
            echo json_encode($out);
        }
       

    }

    public function first_machine_duration(){
        if ($this->request->isAJAX()) {
            log_message("info","\n\nproduction downtime machine wise duration  graph calling");
            $start_time_pd_logger_md = microtime(true);

            $fromdate = $this->request->getVar('from');
            $todate = $this->request->getVar('to');
            // $fromdate = "2023-06-10T14:00:00";
            // $todate="2023-06-16T13:00:00";
          
            $result = $this->getAvailabilityReasonWise($fromdate,$todate);
            $farr = [];
            $total_duration_arr = [];
            foreach ($result['data'] as $key => $value) {
                $tmp_arr = [];
               
                $tmp_reason = [];
                $tmp_duration = [];
                $tmp_reason_id = [];
                $tmp_total = 0;
                foreach ($value as $k1 => $v1) {  
                    array_push($tmp_duration,$v1['duration']);
                    array_push($tmp_reason,$v1['reason']);
                    array_push($tmp_reason_id,$v1['reason_id']);
                    
                }

                $tmp_arr['machine_id'] = $value[0]['machine_id'];
                $tmp_arr['machine_name'] = $value[0]['machine_name'];
                $tmp_arr['reason_id'] = $tmp_reason_id;
                $tmp_arr['reason_name']  = $tmp_reason;
                $tmp_arr['total'] = array_sum($tmp_duration);
                $tmp_arr['reason_duration'] = $tmp_duration;
                array_push($total_duration_arr,array_sum($tmp_duration));
                array_push($farr,$tmp_arr);
            }
    

            $out=[];
            $out['reason']=$result['reason'];
            $out['data']=$farr;
            $out['total_duration'] = array_sum($total_duration_arr);

            $final = $this->getmachine_reason_sorting($out);
            // echo "<pre>";
            // print_r($final);
            $end_time_pd_logger_md = microtime(true);
            $execution_time_logger_md = ($end_time_pd_logger_md - $start_time_pd_logger_md);
            log_message("info","production downtime machine wise duration graph execution duration is : \t".$execution_time_logger_md);
            
            echo json_encode($final);

        }        
    }
    
}

