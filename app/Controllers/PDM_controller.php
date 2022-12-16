<?php

namespace App\Controllers;
use App\Models\PDM_Model;

class PDM_controller extends BaseController{

	protected $data;
	function __construct(){

		$this->session = \Config\Services::session();

		$this->data = new PDM_Model();
	}

    //Retrive machine list for downtime graph...
    public function retirve_machine_data(){
        if ($this->request->isAJAX()) {
           $res = $this->data->settings_machine();
           echo json_encode($res);
        }
    }

    // part produced tooltip
    public function findPartTool(){
        $dataref = $this->request->getVar('production_shift_date');
        $result = $this->data->findPartTool($dataref);
        echo json_encode($result);
    }

    // split function production downtime
    public function findSplit(){
        if ($this->request->isAJAX()) {
            $machine_event_id = $this->request->getVar("ref");
            $res = $this->data->findSplit($machine_event_id);
            echo json_encode($res);
        }
    }

    //Downtime Graph
    public function getPart()
    {
            $output = $this->data->getPart();
            echo json_encode($output);
    }


    // graph info get last_updated_by
    public function graph_get_last_updated_by(){
        if ($this->request->isAJAX()) {
            $last_updated_id = $this->request->getVar('last_updated_id');
            $res = $this->data->get_last_updated_username($last_updated_id);
            echo json_encode($res);
        }
    }

    //For Downtime Graph
    public function downtime_reason_retrive(){      
        if ($this->request->isAJAX()) {
            $output =  $this->data->downtime_reason_retrive();
            echo json_encode($output);
        
        } 
    }

    //For downtime graph
    public function getToolName(){
        if($this->request->isAJAX()){
            $output = $this->data->getToolName();
            echo json_encode($output);
        }
    }

    //Query Optimum needed.....
    public function getDownGraph(){
        if($this->request->isAjax()){
            $machine_ref = $this->request->getVar("machine_id");
            $shift_date = $this->request->getVar("shift_date");
            $shift = $this->request->getVar("shift");

            $machine_id = $machine_ref;
            $machineData['machineData'] = $this->data->getDownGraph($machine_id,$shift_date,$shift);
            $machineData['shift']= $this->data->getShiftExact($shift_date." 23:59:59");
            return json_encode($machineData);
        }
    }

	// dropdown for part in quality correction
	public function getCorrectionPart(){
        if($this->request->isAJAX()){
            $output = $this->data->getRejectionPart();
            echo json_encode($output);
        }
    }

    //Downtime graph shift retrival....
    public function production_shift_retrive(){
        if ($this->request->isAJAX()) {
            $shift_date = $this->request->getVar("production_shift_date");
            $res = $this->data->getShiftExact($shift_date);
            echo json_encode($res);
        }
    }

    // find that particular shift name is valid production function
    public function correction_rejection_exactshift(){
        if ($this->request->isAJAX()) {
            $part_id = $this->request->getVar("part_name");
            $shift_date = $this->request->getVar("shift_date");
            $shift = $this->request->getVar("shift");
            $res = $this->data->get_correction_rejection_exactshift($part_id,$shift_date,$shift);
            echo json_encode($res);
        }
    }


    //Downtime split....
    public function splitDownGraph(){
        if ($this->request->isAJAX()) {
            $time= $this->request->getVar("Data");
            $ref= $this->request->getVar("Ref");
            $splitRef = $this->request->getVar("SplitRef");
            $last_updated_by = $this->session->get('user_name');
            $shift_id = $this->request->getVar('shift_id');
            $shift_date = $this->request->getVar('shift_date'); 
            $calendar_date = $this->request->getVar('Calendar_Date');
            $res = $this->data->splitDownGraph($time,$ref,$splitRef,$last_updated_by,$shift_id,$shift_date,$calendar_date);
            echo json_encode($res);
        }
    }

    // dropdown for shift in quality correction
    public function getCorrectShift(){
        if($this->request->isAJAX()){
            $get_date = $this->request->getVar('sdate');
            $output = $this->data->getShiftExact($get_date);
            echo json_encode($output);
        }
    }

    // display the quality correction
    public function getCorrectionData(){
        if($this->request->isAJAX()){
            $update['partname'] = $this->request->getVar('partname');
            $update['shift_date'] = $this->request->getVar('shift_date');
            $update['shift'] = $this->request->getVar('shift');
            $output = $this->data->getCorrectionData($update);
            echo json_encode($output);
        }
    }
    // pencil click then display particular records
    public function getCorrectData_con(){
        if($this->request->isAJAX()){
            $ref['part_id'] = $this->request->getVar('partid');
            $ref['from_time'] = $this->request->getVar('from_time');
            $ref['date'] = $this->request->getVar('shift_date');
            $ref['shift'] = $this->request->getVar('shift');
            $ref['machine_id'] = $this->request->getVar('machine_id');
            $output = $this->data->getCorrectPartData($ref);
            echo json_encode($output);
       }
    }

    public function findTotalCount(){
        if($this->request->isAJAX()){
            $update['shift'] = $this->request->getVar('shift');
            $update['shift_date'] = $this->request->getVar('shift_date');
            $update['machine_id'] = $this->request->getVar('machineId'); 
            $output = $this->data->findTotalCount($update);
            echo json_encode($output);
        }
    }


    // update the quality correction records
    public function updateCorrectData(){
        if($this->request->isAJAX()){
            $update['shift'] = $this->request->getVar('shift');
            $update['shift_date'] = $this->request->getVar('shift_date');
            $update['start_time'] = $this->request->getVar('start_time');
            $update['last_updated_by'] = $this->session->get('user_name');
            $update['part_id'] = $this->request->getVar('partid');
            $update['notes'] = $this->request->getVar('note');
            $update['max_count'] = $this->request->getVar('max_count');
            $update['total_correction_value'] = $this->request->getVar('total_correction_value');
            $update['machine_id'] = $this->request->getVar('machine_id');
             
             $output = $this->data->updateCorrectData($update);
             echo json_encode($output);
        }
    }

    // quality rejection dropdown for partname
    public function getRejectionPart(){
        if($this->request->isAJAX()){
            $output = $this->data->getRejectionPart();
            echo json_encode($output);
        }
    }

    // quality rejection dropdown for shift
    public function getRejectShift(){
        if($this->request->isAJAX()){
            $get_date = $this->request->getVar('shift_date');
            $output = $this->data->getShiftExact($get_date);
            echo json_encode($output);
        }
    }

    // display the  quality rejection records
    public function getRejectionData(){
        if($this->request->isAJAX()){
            $update['shift'] = $this->request->getVar('shift');
            $update['shift_date'] = $this->request->getVar('shiftdate');
            $update['part_id'] = $this->request->getVar('partname');
            $output = $this->data->getRejectionData($update);
            echo json_encode($output);
        }
    } 

    // pencil icon click then after display the particular records
    public function getRejectData(){
        if($this->request->isAJAX()){
            $ref['part_id'] = $this->request->getVar('partid');
            $ref['from_time'] = $this->request->getVar('from_time');
            $ref['date'] = $this->request->getVar('shift_date');
            $ref['shift'] = $this->request->getVar('shift');
            $ref['machine_id'] = $this->request->getVar('machine_id');
            $output = $this->data->getCorrectData($ref);
            echo json_encode($output);
        }
    }

    // quality rejection  dropdown for  reasons in quality reasons table
    public function Reject_retrive(){
        if ($this->request->isAJAX()) {
            $output =  $this->data->reject_dropdown();
            echo json_encode($output);
        } 
    }

    // quality rejection for retrive the rejections previous submissions data
    public function reject_form_func(){
        
    	if ($this->request->isAJAX()) {
	        $reject_reason = $this->request->getVar("reason");
	        $reject_count = $this->request->getVar("rcount");
	        $note = $this->request->getVar("note");

	        $shift = $this->request->getVar('shift');
	        $shift_date = $this->request->getVar('shift_date');
	        $start_time = $this->request->getVar('start_time');
	        $part_id = $this->request->getVar('partid');
            $machine_id = $this->request->getVar('machine_id');
	        $i = 0;
	        $test_arr = array();
	        foreach ($reject_reason as $reason) {
                if ($reject_count[$i] != 0) {
                    $test_arr[$i] = $reject_count[$i].'&'.$reason;
                    ++$i;
                }
	        }
            $reject_r = implode('&&', $test_arr);
            $total_reject = array_sum($reject_count);

            $update['Notes'] = $note;
            $update['Rejection_Reason'] = $reject_r;
            $update['Total_Rejects'] = $total_reject; 
            $update['last_updated_by'] = $this->session->get('user_name');

            $where['shift'] = $shift;
            $where['shift_date'] = $shift_date;
            $where['start_time'] = $start_time;
            $where['part_id'] = $part_id;
            $where['machine_id'] = $machine_id;

            $db_rejection = $this->data->getRejection_count($where);
            foreach($db_rejection as $data){
                $rejection = $data->rejections;
                $production_count = $data->production;
            }
            $correction_min = (int)$production_count - (int)$total_reject;
            $update['correction_min'] = $correction_min;
            $output = $this->data->updateRejectData($update,$where);
            echo json_encode($output);   
    	}
	}

    // Downtime graph
    public function deleteSPlit(){
        // $dataVal= '56';
        // $machineRef= "ME14119";
        // $splitRef= "1";
        // $start= '13:54:09';
        // $end= '14:50:09';
        // $res = $this->data->deleteSPlit($dataVal,$machineRef,$splitRef,$start,$end);
        // echo "<pre>";
        // print_r($res);
        // echo "</pre>";
        // echo json_encode($tmp_check);

        
        if ($this->request->isAJAX()) {
            $dataVal= $this->request->getVar("duration");
            $machineRef= $this->request->getVar("ref");
            $splitRef= $this->request->getVar("SplitRef");
            $start= $this->request->getVar("Start_time");
            $end= $this->request->getVar("End_time");
            $last_updated_by = $this->session->get('user_name');
            

            // $tmp_check['dataval'] = $dataVal;
            // $tmp_check['machineRef'] = $machine_ref;
            // $tmp_check['splitRef'] = $splitRef;
            // $tmp_check['start'] = $start;
            // $tmp_check['end'] = $end;

            $res = $this->data->deleteSPlit($dataVal,$machineRef,$splitRef,$start,$end,$last_updated_by);
            echo json_encode($res);
        }
        
    }

    // downtime graph updation
    public function updateDownGraph(){
        if ($this->request->isAJAX()) {
            $dataVal= $this->request->getVar("Data");
            $machineRef= $this->request->getVar("MachineRef");
            $splitRef= $this->request->getVar("SplitRef");
            $timeArray= $this->request->getVar("TimeArray");
            $durationArray= $this->request->getVar("DurationArray");
            $last_updated_by = $this->session->get('user_name');
            $split_array = $this->request->getVar('split_arr');
            $date_array = $this->request->getVar('date_array');
            

            
            // $tmp['dataval'] = $dataVal;
            // $tmp['machineref'] = $machineRef;
            // $tmp['splitRef'] = $splitRef;
            // $tmp['time Array'] = $timeArray;
            // $tmp['duration array']= $durationArray;
            // $tmp['last'] = $last_updated_by;
            // $tmp['aplit_arr'] = $split_array;
            // $tmp['date_array'] = $date_array;
            // echo json_encode($tmp);
            
           
            $res = $this->data->updateDownGraph($dataVal,$machineRef,$splitRef,$timeArray,$durationArray,$last_updated_by,$split_array,$date_array);
            echo json_encode($res);
        
        }   
    }
	
    // downitme graph get shift date 
    public function getMachineDate(){
        if($this->request->isAJAX()){
            $machine =  $this->request->getVar('machine');
            $output = $this->data->getMachineDate($machine);
            echo json_encode($output);     
        }
    }

    // quality rejection shift date 
    public function get_reject_shift_date(){
        if ($this->request->isAJAX()) {
            $part_id = $this->request->getVar('part_id');
            $output_res = $this->data->get_rejection_shift_date($part_id);

            echo json_encode($output_res);
        }
    }

    public function correction_shift_date(){
        if ($this->request->isAJAX()) {
            $part_id = $this->request->getVar('part_id');
            $output_res = $this->data->get_rejection_shift_date($part_id);
            echo json_encode($output_res);
        }
    }

}
 ?>