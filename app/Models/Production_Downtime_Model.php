<?php 
namespace App\Models;
use CodeIgniter\Model;

class Production_Downtime_Model extends Model{

	// protected $db_name;
    protected $site_connection;
    protected $session;
    public function __construct($db_name =null){

        // $db_name = $this->db_name;
        $this->session = \Config\Services::session();

        $db_name = $this->session->get('active_site');

        $this->site_connection = [
                    'DSN'      => '',
                    'hostname' => 'localhost',
                    'username' => 'root',
                    'password' => '',                    
                    // 'database' => 's1002',
                    'database' => ''.$db_name.'',
                    'DBDriver' => 'MySQLi',
                    'DBPrefix' => '',
                    'pConnect' => false,
                    'DBDebug'  => (ENVIRONMENT !== 'production'),
                    'charset'  => 'utf8',
                    'DBCollat' => 'utf8_general_ci',
                    'swapPre'  => '',
                    'encrypt'  => false,
                    'compress' => false,
                    'strictOn' => false,
                    'failover' => [],
                    'port'     => 3306,
                ];
    }


    // pdm reason mapping table for shift date whise filtering
    public function getDataRaw($FromDate,$FromTime,$ToDate,$ToTime)
	{
	    $db = \Config\Database::connect($this->site_connection);
	    $query = $db->table('pdm_downtime_reason_mapping as t');
	    $query->select('t.machine_event_id,t.machine_id,t.downtime_reason_id,t.tool_id,t.part_id,t.shift_date,t.start_time,t.end_time,t.split_duration,t.calendar_date,r.downtime_category,r.downtime_reason,t.Shift_id,t.last_updated_on,t.notes,t.last_updated_by');
        $query->where('t.shift_date >=',$FromDate);
        $query->where('t.shift_date <=',$ToDate);
	    $query->join('settings_downtime_reasons as r', 'r.downtime_reason_id = t.downtime_reason_id');
	    $res= $query->get()->getResultArray();
	    return $res;
	}

    // pdm events table for shift whise filtering
    public function getDataRawAll($FromDate,$ToDate)
    {
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_events');
        $query->select('machine_id,tool_id,part_id,shift_date,start_time,end_time,duration,calendar_date,event');
        $query->where('shift_date >=',$FromDate);
        $query->where('shift_date <=',$ToDate);
        $query->where("(event !='Offline' OR event != 'No Data')", NULL, FALSE);
        $res= $query->get()->getResultArray();
        return $res;
    }

    // pdm events table get offline and no data filtering that particular records
    public function getOfflineEventId($FromDate,$FromTime,$ToDate,$ToTime)
    {
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_events as t');
        $query->select('t.event,t.machine_id,t.machine_event_id');
        $query->where('t.shift_date >=',$FromDate);
        $query->where('t.shift_date <=',$ToDate);
        $query->where("(t.event='Offline' OR t.event='No Data')", NULL, FALSE);
        $res= $query->get()->getResultArray();
        return $res;
    }

    // pdm production info get shift date based filtering  for that particular record
    public function getMachineRecActive($FromDate,$ToDate)
    {
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_production_info');
        $query->select('machine_id'); 
        $query->where('shift_date >=',$FromDate);
        $query->where('shift_date <=',$ToDate);
        $res= $query->distinct()->get()->getResultArray();
        return $res;
    }

    // pdm production info table filtering shift date based for that particular records
    public function getPartRec($FromDate,$ToDate){
        $db = \Config\Database::connect($this->site_connection);
       $query = $db->table('pdm_production_info');
       $query->select('part_id');
       $query->where('shift_date >=',$FromDate);
       $query->where('shift_date <=',$ToDate); 
       $res= $query->distinct('part_id')->get()->getResultArray();
       return $res;
    }

//    pdm production info table filtering for that particular records
    public function getProductionRec($FromDate,$ToDate){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_production_info');
        $query->select('machine_id,calendar_date,shift_date,start_time,end_time,part_id,tool_id,production,corrections,rejections,reject_reason,actual_shot_count');
        $query->where('shift_date >=',$FromDate);
        $query->where('shift_date <=',$ToDate);
        $query->where('production !=',null);

        $res= $query->get()->getResultArray();
        return $res;
    }

    // settings machine table get inactive machine  records for that particular date`s
    public function getInactiveMachineData(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_machine_current as p');
        $query->select('p.machine_id,max(r.last_updated_on)');
        $query->where('p.status',0);
        $query->where('r.status',0);
        $query->join('settings_machine_log as r', 'r.machine_id = p.machine_id');
        $query->orderBy('r.last_updated_on', 'DESC');
        $query->groupby('r.machine_id');
        $res= $query->get()->getResultArray();
        return $res;
    }


    // get machine details
    public function getMachineRecGraph()
    {
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_machine_current');
        $query->select('machine_id,machine_name,machine_offrate_per_hour,rate_per_hour'); 
        // $query->where('status',1);
        $res= $query->distinct()->get()->getResultArray();
        return $res;
    }

    // get downtime reasons , category , downtime_reason_id
    public function downtimeReason(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_downtime_reasons');
        $query->select('downtime_reason_id,downtime_reason,downtime_category');
        $res= $query->get()->getResultArray();
        return $res;
    }


    // table view 
    // first get pdm reason mapping records
    public function getpdmreason_data($from_date,$to_date){
        $db = \Config\Database::connect($this->site_connection);
	    $query = $db->table('pdm_downtime_reason_mapping as t');
	    $query->select('t.machine_event_id,t.machine_id,t.shift_date,t.Shift_id,t.downtime_reason_id,t.split_duration,t.tool_id,t.part_id,t.notes,t.last_updated_by,t.last_updated_on,r.downtime_category,r.downtime_reason');
        $query->where('t.shift_date >=',$from_date);
        $query->where('t.shift_date <=',$to_date);
	    $query->join('settings_downtime_reasons as r', 'r.downtime_reason_id = t.downtime_reason_id');
	    $res= $query->get()->getResultArray();

        
	    return $res;
    }


    // get machine data
    public function getmachine_name(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_machine_current');
        $query->select('machine_id,machine_name');
        $res = $query->get()->getResultArray();

        $tmp_arr = [];
        foreach ($res as $key => $value) {
            $tmp_arr[$value['machine_id']] = $value['machine_name'];
        }

        return $tmp_arr;

    }

    // get part array
    public function getpart_arr(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_part_current');
        $query->select('part_id ,part_name');
        $res = $query->get()->getResultArray();

        $build = $db->table('settings_tool_table');
        $build->select('tool_id  ,tool_name');
        $result = $build->get()->getResultArray();
        // part array
        $tmppart_arr = [];
        foreach ($res as $key => $value) {
            $tmppart_arr[$value['part_id']] = $value['part_name'];
        }

        // tool array
        $tmp_tool_arr = [];
        foreach ($result as $key => $value) {
            $tmp_tool_arr[$value['tool_id']] = $value['tool_name'];
        }

        $tmp['part'] = $tmppart_arr;
        $tmp['tool'] = $tmp_tool_arr;
        return $tmp;


    }


    // this function get user data for that particular site based user data
    public function getuser_data($sid){
        $db = \Config\Database::connect("another_db");
        $query = $db->table('user');
        $query->select('user_id,first_name,last_name');
        $query->where('site_id',$sid);
        $res = $query->get()->getResultArray();


        $build = $db->table('user');
        $build->select('user_id,first_name,last_name');
        $build->where('site_id','smartories');
        $result = $build->get()->getResultArray();

        // site based users array
        $temp_arr = [];
        foreach ($res as $key => $value) {
            $temp_arr[$value['user_id']] = $value['first_name']." ".$value['last_name'];
        }


        // smartories based users array
        foreach ($result as $ke => $val) {
            $temp_arr[$val['user_id']] = $val['first_name']." ".$val['last_name'];
        }

        return $temp_arr;
    }


//    multi select dropdown machine
    public function getmachine_record_data(){
        $db = \Config\Database::connect($this->site_connection);

        $query = $db->table('settings_machine_current');
        $query->select('machine_id,machine_name');
        $res = $query->get()->getResultArray();

        return $res;
    }

    // multi select dropdown parts
    public function getpart_data_drp(){
        $db = \Config\Database::connect($this->site_connection);

        $query = $db->table('settings_part_current');
        $query->select('part_id,part_name');
        $res = $query->get()->getResultArray();

        return $res;

    }

    // multi select dropdown created by
    public function created_by_drp($sid){
        $db = \Config\Database::connect('another_db');

        $query = $db->table('user');
        $query->select('user_id ,first_name,last_name');
        $query->where('site_id','smartories');
        $query->orWhere('site_id',$sid);
        $res = $query->get()->getResultArray();
        return $res;
    }

    // multi select dropdown reason wise
    public function downtime_reason_filter_con(){
        // $db = \Config\Database::connect($this->site_creation);
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_downtime_reasons');
        // $query->select('DISTINCT(downtime_reason),downtime_reason_id');
        $query->select('DISTINCT(downtime_reason),downtime_reason_id');
        $query->orderBy('downtime_reason','ASC');
        $res = $query->get()->getResultArray();
        return $res;    
    }


    // multi select dropdown category wise
    public function getcategory_based_record($category){
        $db = \Config\Database::connect($this->site_connection);
        $build = $db->table('settings_downtime_reasons');
        $build->select('downtime_reason');
        $build->where('downtime_category',$category);
        $res = $build->get()->getResultArray();
        return $res; 
    }


    // filter function
    public function single_arr_filter($from_date,$to_date){
        $db = \Config\Database::connect($this->site_connection);
	    $query = $db->table('pdm_downtime_reason_mapping as t');
	    $query->select('t.machine_event_id,t.machine_id,t.downtime_reason_id,t.tool_id,t.part_id,t.shift_date,t.start_time,t.end_time,t.split_duration,t.calendar_date,r.downtime_category,r.downtime_reason,t.Shift_id,t.last_updated_on,t.notes,t.last_updated_by');
        $query->where('t.shift_date >=',$from_date);
        $query->where('t.shift_date <=',$to_date);
        // if ($name==="created_by") {
        //     $query->WhereIn('t.last_updated_by',$created_arr);
        // }
        // elseif ($name==="category") {
        //     // $getreasons_arr = $this->getreason_arr_category($created_arr[0]);
        //     $query->where('r.downtime_category',$created_arr[0]);
        // }
        // elseif ($name==="reasons") {
        //     $query->WhereIn('r.downtime_reason',$created_arr);
        // }
        // elseif ($name==="machine") {
        //     $query->WhereIn('t.machine_id',$created_arr);
        // }
      
	    $query->join('settings_downtime_reasons as r', 'r.downtime_reason_id = t.downtime_reason_id');
        $query->orderBy('t.shift_date','ASC');
        $query->orderBy('t.start_time','ASC');
	    $res= $query->get()->getResultArray();
	    return $res;
    }


    // double array filter
    public function two_arr_filter($fdate,$tdate,$first_arr,$second_arr,$name){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_downtime_reason_mapping as t');
	    $query->select('t.machine_event_id,t.machine_id,t.downtime_reason_id,t.tool_id,t.part_id,t.shift_date,t.start_time,t.end_time,t.split_duration,t.calendar_date,r.downtime_category,r.downtime_reason,t.Shift_id,t.last_updated_on,t.notes,t.last_updated_by');
        $query->where('t.shift_date >=',$fdate);
        $query->where('t.shift_date <=',$tdate);
        if ($name==="created_category") {
            $query->WhereIn('t.last_updated_by',$first_arr);
            $query->where('r.downtime_category',$second_arr[0]);
        }
        elseif ($name==="reason_created") {
            $query->WhereIn('r.downtime_reason',$first_arr);
            $query->WhereIn('t.last_updated_by',$second_arr);
        }
        elseif ($name==="reason_category") {
            $query->WhereIn('r.downtime_reason',$first_arr);
            $query->where('r.downtime_category',$second_arr[0]);
        }
        elseif ($name==="machine_created") {
            $query->WhereIn('t.machine_id',$first_arr);
            $query->WhereIn('t.last_updated_by',$second_arr);
        }
        elseif ($name==="machine_category") {
            $query->WhereIn('t.machine_id',$first_arr);
            $query->where('r.downtime_category',$second_arr[0]);
        }
        elseif ($name==="machine_reason") {
            $query->WhereIn('t.machine_id',$first_arr);
            $query->WhereIn('r.downtime_reason',$second_arr);
        }

        $query->join('settings_downtime_reasons as r', 'r.downtime_reason_id = t.downtime_reason_id');
        $res = $query->get()->getResultArray();
        return $res;


    }

    // three array filter function
    public function three_arr_filter($fdate,$tdate,$first_arr,$second_arr,$third_arr,$name){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_downtime_reason_mapping as t');
	    $query->select('t.machine_event_id,t.machine_id,t.downtime_reason_id,t.tool_id,t.part_id,t.shift_date,t.start_time,t.end_time,t.split_duration,t.calendar_date,r.downtime_category,r.downtime_reason,t.Shift_id,t.last_updated_on,t.notes,t.last_updated_by');
        $query->where('t.shift_date >=',$fdate);
        $query->where('t.shift_date <=',$tdate);

        if ($name==="reason_category_created") {
            $query->WhereIn('r.downtime_reason',$first_arr);
            $query->where('r.downtime_category',$second_arr[0]);
            $query->WhereIn('t.last_updated_by',$third_arr);
        }
        elseif ($name==="machine_created_category") {
            $query->WhereIn('t.machine_id',$first_arr);
            $query->WhereIn('t.last_updated_by',$second_arr);
            $query->where('r.downtime_category',$third_arr[0]);
        }
        elseif ($name==="machine_reason_created") {
            $query->WhereIn('t.machine_id',$first_arr);
            $query->WhereIn('r.downtime_reason',$second_arr);
            $query->WhereIn('t.last_updated_by',$third_arr);
        }
        elseif ($name==="machine_reason_category") {
            $query->WhereIn('t.machine_id',$first_arr);
            $query->WhereIn('r.downtime_reason',$second_arr);
            $query->where('r.downtime_category',$third_arr[0]);
        }
        $query->join('settings_downtime_reasons as r', 'r.downtime_reason_id = t.downtime_reason_id');
        $res = $query->get()->getResultArray();
        return $res;

    }

    // four arr filter 
    public function four_arr_filter($fdate,$tdate,$first_arr,$second_arr,$third_arr,$fourth_arr,$name){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_downtime_reason_mapping as t');
	    $query->select('t.machine_event_id,t.machine_id,t.downtime_reason_id,t.tool_id,t.part_id,t.shift_date,t.start_time,t.end_time,t.split_duration,t.calendar_date,r.downtime_category,r.downtime_reason,t.Shift_id,t.last_updated_on,t.notes,t.last_updated_by');
        $query->where('t.shift_date >=',$fdate);
        $query->where('t.shift_date <=',$tdate);

        if ($name==="machine_reason_category_created") {
            $query->WhereIn('t.machine_id',$first_arr);
            $query->WhereIn('r.downtime_reason',$second_arr);
            $query->where('r.downtime_category',$third_arr[0]);
            $query->WhereIn('t.last_updated_by',$fourth_arr);
        }

        $query->join('settings_downtime_reasons as r', 'r.downtime_reason_id = t.downtime_reason_id');
        $res = $query->get()->getResultArray();
        return $res;

    }

    // get reasons array for category wise
    public function getreason_arr_category($category){
        $db = \Config\Database::connect($this->site_connection);
        $build = $db->table('settings_downtime_reasons');
        $build->select('downtime_reason_id');
        $build->where('downtime_category',$category);
        $res = $build->get()->getResultArray();

        return $res;
    }


}