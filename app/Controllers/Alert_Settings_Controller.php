<?php 


namespace App\Controllers;
use App\Models\Alert_Settings_Model;

class Alert_Settings_Controller extends BaseController{

	protected $data;
    protected $session;
	function __construct(){

		$this->session = \Config\Services::session();

		$this->data = new Alert_Settings_Model();
	}



    public function machine_drp(){
        if ($this->request->isAJAX()) {
            // echo json_encode("controller ok");
            $machine_arr = $this->data->getmachine_dropdown();
            $part_arr = $this->data->get_parts_drp();
            $site_id = $this->session->get('active_site');
            $user_session = $this->session->get('user_details');
            $tmpsid = $user_session[0]['site_id'];
            $tmprole = $user_session[0]['role'];
            $last_updated_arr = $this->data->get_last_updated_by_arr($site_id,$tmpsid,$tmprole);
            $assignee_arr = $this->data->get_assignee_arr($site_id);


            $temp['machine_arr'] = $machine_arr;
            $temp['part_arr'] = $part_arr;
            $temp['last_updated_by_arr'] = $last_updated_arr;
            $temp['assignee_arr'] = $assignee_arr;

            // $temp['session']    =   $user_session;

            echo json_encode($temp);
            // echo "<pre>";
            // print_r($temp);
        }
    }


    // add alert settings insertion function
    public function add_alert(){
        if ($this->request->isAJAX()) {
            // echo json_encode("its working");
            $alert_name = $this->request->getvar('alert_name');
            $metrics = $this->request->getvar('metrics');
            $relation = $this->request->getvar('relation');
            $value_val = $this->request->getvar('value_val');
            $past_hour = $this->request->getvar('past_hour');
            $machine_arr = $this->request->getvar('machine_arr');
            $part_arr = $this->request->getvar('part_arr');
            $lable_list = $this->request->getvar('lable_list');
            $to_email_arr = $this->request->getvar('to_email_arr');
            $cc_email_arr = $this->request->getvar('cc_email_arr');
            $work_type = $this->request->getvar('work_type');
            $work_title = $this->request->getvar('work_title');
            $assignee = $this->request->getvar('assignee');
            $deu_days = $this->request->getvar('deu_days');
            $add_alert_subject = $this->request->getvar('add_alert_subject');
            $add_alert_notes = $this->request->getvar('add_alert_notes');
            $priority = $this->request->getvar('priority');
            $notify_as = $this->request->getvar('notify_as');
        


            $temp['alert_name'] = $alert_name;
            $temp['metrics'] = $metrics;
            $temp['relation'] = $relation;
            $temp['value_val'] = $value_val;
            $temp['past_hour'] = $past_hour;
            $temp['machine_arr'] = implode(",",$machine_arr);
            $temp['part_arr'] = implode(",",$part_arr);
            $temp['lable_id'] = implode(",",$lable_list);
            $temp['to_email_arr'] = implode(",",$to_email_arr);
            $temp['cc_email_arr'] = implode(",",$cc_email_arr);
            $temp['work_type'] = $work_type;
            $temp['work_title'] = $work_title;
            $temp['assignee'] = $assignee;
            $temp['deu_days'] = $deu_days;
            $temp['add_alert_subject'] = $add_alert_subject;
            $temp['add_alert_notes'] = $add_alert_notes;
            $temp['priority'] = $priority;
            $temp['notify_as'] = $notify_as;
            $temp['alert_id'] = $this->generate_alert_id();
            $temp['last_updated_by']    =   $this->session->get('user_name');

            // echo json_encode($temp);
            $res = $this->data->insert_alert_records($temp);

            echo json_encode($res);

        }
    }


    // alert settings generate id
    public function generate_alert_id(){
        $res = $this->data->get_alert_id();
        $tmpsplit = $this->session->get('active_site');
        $split_arr_site = explode("S",strtoupper($tmpsplit));
        // 
        // print_r($split_arr_site);
        $tmp = $split_arr_site[1]-1000;
        $tmp_site_id = 'S'.$tmp;
        $alert_id = $tmp_site_id.'-A'.$res;
        // echo $alert_id;

        return $alert_id;
    }


    // delete alert funciton 
    public function delete_alert(){
        if ($this->request->isAJAX()) {
            $alert_id = $this->request->getvar('get_id');
            $res = $this->data->delete_alert_record($alert_id);
            echo json_encode($res);
        }
    }


    // alert settings retrive data
    public function retrive_data(){
        if ($this->request->isAJAX()) {
            // echo json_encode("ajax ok");

            $machine_arr_get = $this->request->getvar('machine_arr');
            $part_arr_get = $this->request->getvar('part_arr');
            $last_updated_arr = $this->request->getvar('last_updated_arr');
            $work_type_arr = $this->request->getvar('work_order_arr');

            // $machine_arr_get = array('all', 'MC1001', 'MC1002', 'MC1003', 'MC1004', 'MC1005', 'MC1006');
            // $part_arr_get = array('all', 'PT1001', 'PT1002', 'PT1003', 'PT1004', 'PT1005', 'PT1006', 'PT1007', 'PT1008', 'PT1009', 'PT1010', 'PT1011', 'PT1012', 'PT1013', 'PT1014', 'PT1015', 'PT1016', 'PT1017', 'PT1018', 'PT1019', 'PT1020', 'PT1021', 'PT1022', 'PT1023', 'PT1024', 'PT1025', 'PT1026', 'PT1027', 'PT1028', 'PT1029', 'PT1030', 'PT1031', 'PT1032', 'PT1033', 'PT1034', 'PT1035', 'PT1036', 'PT1037', 'PT1038', 'PT1039', 'PT1040', 'PT1041', 'PT1042', 'PT1043', 'PT1044', 'PT1045');
            // $work_type_arr = array('all', 'issue', 'task');
            // $last_updated_arr = array('all', 'UM1001','UM1002', 'UM1003', 'UM1004', 'UM1005', 'UM1008', 'UO1001', 'UO1002', 'UO1003', 'UO1004');

            $res = $this->data->get_alert_data();

            $final_arr = [];
            foreach ($res as $key => $value) {
                $machine_arr = explode(",",$value['machine_arr']);
                $part_arr = explode(",",$value['part_arr']);
                $machine_count = array_intersect($machine_arr,$machine_arr_get);
                $part_count = array_intersect($part_arr,$part_arr_get);

                if (count($machine_count)>0) {
                    if (count($part_count)>0) {
                        if (in_array($value['last_updated_by'],$last_updated_arr)) {
                            if (in_array("all",$work_type_arr)) {
                                    if (in_array('all',$machine_arr)) {
                                        $res[$key]['machine_count'] = 'Any';
                                    }else {
                                        $res[$key]['machine_count'] = count($machine_arr);
                                    }
                    
                                    if (in_array('all',$part_arr)) {
                                        $res[$key]['part_count'] = 'Any';
                    
                                    }else{
                                        $res[$key]['part_count'] = count($part_arr);
                                    }
                    
                                    $res[$key]['user_data'] = $this->get_user_data($value['last_updated_by']);
    
                                    array_push($final_arr,$res[$key]);
                                 
                            }else{
                                if (in_array($value['work_type'],$work_type_arr)) {
                                    if (in_array('all',$machine_arr)) {
                                        $res[$key]['machine_count'] = 'Any';
                                    }else {
                                        $res[$key]['machine_count'] = count($machine_arr);
                                    }
                    
                                    if (in_array('all',$part_arr)) {
                                        $res[$key]['part_count'] = 'Any';
                    
                                    }else{
                                        $res[$key]['part_count'] = count($part_arr);
                                    }
                    
                                    $res[$key]['user_data'] = $this->get_user_data($value['last_updated_by']);
    
                                    array_push($final_arr,$res[$key]);
                                }    
                            }
                                                 
                        }
                       
                    }
                   
                }
               

            }
            echo json_encode($final_arr);
            // echo "<pre>";
            // print_r($final_arr);
        }
    }

    // get user data
    public function get_user_data($uid){
        $res = $this->data->getuser_details($uid);
        return $res;

    }


    // alert settings particular module select retrive
    public function get_particular_record(){
        if ($this->request->isAJAX()) {
            $alert_id = $this->request->getvar('alert_id');
            $notify_as = $this->request->getvar('get_notify');

            $result = $this->data->getparticular_rec($alert_id,$notify_as);

            foreach ($result as $key => $value) {
                $result[$key]['user_name'] = $this->get_user_data($value['assignee']);
            }

            echo json_encode($result);
        }
    }

    // edit submission update function
    public function edit_alert_submission(){
        if ($this->request->isAJAX()) {
            $alert_id = $this->request->getvar('alert_id');
            $alert_name = $this->request->getvar('alert_title');
            $metrics = $this->request->getvar('alert_metrics');
            $relation = $this->request->getvar('alert_relation');
            $value = $this->request->getvar('alert_value');
            $past_hour = $this->request->getvar('alert_past_hour');
            $machine_arr = $this->request->getvar('machine_arr');
            $part_arr = $this->request->getvar('part_arr');
            $notify_as = $this->request->getvar('notify_as');
            $work_type = $this->request->getvar('work_type');
            $work_title = $this->request->getvar('work_title');
            $priority = $this->request->getvar('priority');
            $lable_list = $this->request->getvar('lable_list');
            $assignee = $this->request->getvar('assignee');
            $deu_days = $this->request->getvar('deu_days');
            $to_email_arr = $this->request->getvar('to_email_arr');
            $cc_email_arr = $this->request->getvar('cc_email_arr');
            $subject = $this->request->getvar('add_alert_subject');
            $notes = $this->request->getvar('add_alert_notes');


            $mydata['id'] = $alert_id;
            $mydata['aname']  =   $alert_name;
            $mydata['metrics']   = $metrics;
            $mydata['relation']   =$relation;
            $mydata['value']  =$value;
            $mydata['past_hour']  =   $past_hour;
            $mydata['machine_Arr']    =  implode(',',$machine_arr);
            $mydata['part_arr']   =   implode(',',$part_arr);
            $mydata['notify'] =   $notify_as;
            $mydata['work_type']  =   $work_type;
            $mydata['work_title'] =   $work_title;
            $mydata['priority']   =   $priority;
            $mydata['lable_list']  =   implode(',',$lable_list);
            $mydata['assignee']   =   $assignee;
            $mydata['due_days']   =   $deu_days;
            $mydata['to_email_arr']   =  implode(',',$to_email_arr);
            $mydata['cc_email_arr']   =   implode(',',$cc_email_arr);
            $mydata['subject']    =   $subject;
            $mydata['notes']  =   $notes;
            $mydata['last_updated_by'] = $this->session->get('user_name');

            $result = $this->data->update_alert($mydata);
            echo json_encode($result);

        }
    }

    // public function demo_fnu(){
    //     // if ($this->request->isAJAX()) {
    //         $r = $this->request->getvar('data1');
    //         $d = $this->request->getvar('data_two');

    //         echo json_encode("heeelo wrold".$r.' '.$d);
    //     // }
    // }
    public function getLable(){  //get
        if ($this->request->isAJAX()) {
            $lable = $this->data->getLableData();
            echo json_encode($lable);
        }
    }
    public function getLableID(){  //post
        if ($this->request->isAJAX()) {
            $cause = $this->request->getVar('lable');
            $cause_count = $this->data->getLableId();
            $cause_count = $cause_count['lable_id'];
            $db_name = $this->session->get('active_site');
            $db_name = str_split($db_name);
            $id_gen = strtoupper($db_name[0]).$db_name[1]."-L".(string)$cause_count;

             // Insert Action
            $data1['lable_id'] = $id_gen;
            $data1['lable'] = $cause;
            $data1['status'] = 1;
            $data1['last_updated_by'] = $this->session->get('user_name');
            $res = $this->data->insertLable($data1);
            if ($res == true) {
                echo json_encode($id_gen);
            }else{
                echo json_encode($data);
            }
                
        }
    }
}




?>