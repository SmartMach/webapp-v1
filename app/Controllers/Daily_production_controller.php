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
        // $selected_date = "2022-12-05";
        $selected_date = $sdate;
        $getshift_res = $this->datas->getcurrentshift_record($selected_date);
        $tmp['shifts'] = $getshift_res['shift_ids'];
        $tmp['shift_management'] = $getshift_res['shift_management'];
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
    // machine id based machine details
    public function machine_data_details($sdate){
        // $date = "2022-12-05";
        $date = $sdate;
        $getmachine_data = $this->datas->getmachine_data($date);
        $getmachine_details = $this->datas->getmachine_details($getmachine_data);

        $tmp_machine_details = [];
        foreach ($getmachine_details as $key => $value) {
            $tmp_arr = [];
            array_push($tmp_arr,$value['machine_name']);
            array_push($tmp_arr,$value['machine_brand']);
            array_push($tmp_arr,$value['tonnage']);
            $tmp_machine_details[$value['machine_id']] = $tmp_arr;
        }
        // echo "<pre>";
        // print_r($tmp_machine_details);
        // echo "</pre>";
        return $tmp_machine_details;
    }

    // get machine records
    public function getMachine_data(){
        if ($this->request->isAJAX()) {
            // $date = "2023-01-05";
            $date = $this->request->getVar('date');
            $getmachine_data = $this->datas->getmachine_data($date);
           
            // get machine all details for example machine brand tonnage
            $getmachine_details = $this->machine_data_details($date);
    
            // machine based shift based tool changeover
            $getshiftid = $this->getshift($date);
            // echo json_encode($getshiftid);
            $getsid = $getshiftid['shifts'];
            $duration = $getshiftid['shift_management'][0]['duration'];
            // echo  "get all shifts id in particular date";
            $get_toolchangeover = $this->datas->get_tool_changeover($getmachine_data,$date,$getsid,$duration);
            // echo "<pre>";
            // print_r($get_toolchangeover);
            // echo "</pre>";
            // echo "machine wise and shift wise and part wise  array";           
            $getdowntime_graph = $this->datas->getdowntimegraph($getmachine_data,$date,$getsid);
            // down time reasons based graph count
            // echo "Downtime reasons based graph count";
            
            // get downtime json value
            // echo "get downtime value";
            $getdowntime_val = $this->datas->getdowntimevalue($getmachine_data,$date,$getsid);
            
    
            // get quality rejection reason
            // echo "get Quality rejection reason ";
            $getquality_reject_reason = $this->datas->getquality_reject_reason($getmachine_data,$date,$getsid);

          
    
            // part production details
            // echo "Part Production Details:\t";
            $get_part_production_details = $this->datas->getpart_production_details($getmachine_data,$date,$getsid,$duration);
            // echo "<pre>";
            // print_r($get_part_production_details);
            // echo "</pre>";
    
            // machine array
            $machine_array_tmp = [];
            foreach($getmachine_data as $key => $value){
                array_push($machine_array_tmp,$value['machine_id']);
            }

            // machine wise part count its ui purpose
            $getpart_count = $this->macine_wise_part_count($get_toolchangeover);
            // echo "part count";

            // part full details
            $getpart_arr = $this->partid_wise_details($get_toolchangeover);
            
            $getpart_names_arr = $this->datas->getpart_full_details($getpart_arr);


            // shift wise start time ui because its control future shift id
            $get_shift_wise_time_arr = $this->getshift_wise_time($date);
    
            // final records for single json
            // echo "Final Json File:\t";
            $data['Shifts'] = $getsid;
            $data['Machines'] = $machine_array_tmp;
            $data['quality_reasons'] = $this->getQualityreason();
            $data['Downtime_reasons'] = $this->getDowntimereason();
            $data['Part_details'] = $get_toolchangeover;

            $data['Downtime_value'] = $getdowntime_val;
            // $data['Downtime_reasons_val'] = $getdowntime_graph;
            $data['Downtime_reasons_val'] = $this->getdowntime_valid_reason($getdowntime_graph);
            $data['Part_production_details'] = $get_part_production_details;
            // $data['Quality_reject_reason'] = $getquality_reject_reason;
            $data['Quality_reject_reason'] = $this->check_quality_reason_valid($getquality_reject_reason);
            $data['machine_details'] = $getmachine_details;

            // ui purpose
            $data['part_count_machine_wise'] = $getpart_count;
            $data['part_names'] = $getpart_names_arr;
            
            // ui purpose just remove future shift id records
            $data['shift_wise_time'] = $get_shift_wise_time_arr;
            /*
            echo "<pre>";
            print_r($data);
            echo "</pre>";
            */
            echo json_encode($data);
        }
      
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
    
    
}



?>