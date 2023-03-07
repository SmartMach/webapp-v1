<?php

namespace App\Models;
use CodeIgniter\Model;

class OEE_Drill_Down_Model extends Model{

    // constructor for financial model 
    protected $site_connection;
    protected $session;
    public function __construct(){

        $this->session = \Config\Services::session();
        $db_name = $this->session->get('active_site');
       
        $this->site_connection = [
            'DSN'      => '',
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => '',
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

    public function getDataRaw($FromDate,$FromTime,$ToDate,$ToTime)
	{
	    $db = \Config\Database::connect($this->site_connection);
	    $query = $db->table('pdm_downtime_reason_mapping as t');
	    $query->select('t.machine_event_id,t.machine_id,t.downtime_reason_id,t.tool_id,t.part_id,t.shift_date,t.start_time,t.end_time,t.split_duration,t.calendar_date,r.downtime_category,r.downtime_reason');
        $query->where('t.shift_date >=',$FromDate);
        $query->where('t.shift_date <=',$ToDate);
	    $query->join('settings_downtime_reasons as r', 'r.downtime_reason_id = t.downtime_reason_id');
	    $res= $query->get()->getResultArray();
	    return $res;
	}

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

    public function getPartRec($FromDate,$ToDate){
        $db = \Config\Database::connect($this->site_connection);
       $query = $db->table('pdm_production_info');
       $query->select('part_id');
       $query->where('shift_date >=',$FromDate);
       $query->where('shift_date <=',$ToDate); 
       $res= $query->distinct('part_id')->get()->getResultArray();
       return $res;
   }

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

    public function settings_tools()
    {
        $db = \Config\Database::connect($this->site_connection);
        $builder = $db->table("settings_part_current as s");
        $builder->select('s.*, t.tool_name');
        $builder->join('settings_tool_table as t', 't.tool_id = s.tool_id');
        $data = $builder->get()->getResult();
        return $data;
    }

    public function getGoalsFinancialData(){
        $db = \Config\Database::connect($this->site_connection);
        $SFM = $db->table('settings_financial_metrics_goals');
        $SFM->orderBy('last_updated_on', 'DESC');
        $SFM->limit(1);
        $SFM->select('*');
        $query = $SFM->get()->getResultArray();
        return $query;
    }


    // multi select dropdown reason wise
    public function downtime_reason_filter_con(){
        // $db = \Config\Database::connect($this->site_creation);
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_downtime_reasons');
        // $query->select('DISTINCT(downtime_reason),downtime_reason_id');
        $query->select('DISTINCT(downtime_reason)');
        $query->orderBy('downtime_reason','ASC');
        $res = $query->get()->getResultArray();
        return $res;    
    }

    
    //    multi select dropdown machine
    public function getmachine_record_data(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_machine_current');
        $query->select('machine_id,machine_name');
        $res = $query->get()->getResultArray();
        return $res;
    }

    // part table details
    public function PartDetails(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_part_current');
        $query->select('part_id,part_price,NICT,part_name');
        $res= $query->get()->getResultArray();
        return $res;
    }

    // machine details
    public function getMachineDetails(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_machine_current');
        $query->select('machine_id,rate_per_hour,machine_offrate_per_hour,machine_name');
        $res= $query->get()->getResultArray();
        return $res;
    }


    public function getMachineRecGraph()
    {
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_machine_current');
        $query->select('machine_id,machine_name,machine_offrate_per_hour,rate_per_hour'); 
        // $query->where('status',1);
        $res= $query->distinct()->get()->getResultArray();
        return $res;
    }

    public function downtimeReason(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_downtime_reasons');
        $query->select('downtime_reason_id,downtime_reason,downtime_category');
        $res= $query->get()->getResultArray();
        return $res;
    }


    // get machine array data
    public function getmachine_arr(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_machine_current');
        $query->select('machine_id,machine_name,machine_offrate_per_hour,rate_per_hour');
        $res= $query->get()->getResultArray();
        // return $res;

        $tmp_data = [];
        foreach ($res as $key => $value) {
            $tmp_data[$value['machine_id']] = $res[$key];
        }

        return $tmp_data;
    }

   


}