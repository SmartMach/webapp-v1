<?php

namespace App\Models;
use CodeIgniter\Model;

class Current_Shift_Performance_Model extends Model{

    // constructor for financial model 
    protected $site_connection;
    protected $session;
    public function __construct(){

        $this->session = \Config\Services::session();

        $db_name = $this->session->get('active_site');
       
        // echo($db_name);
        $this->site_connection = [
                    'DSN'      => '',
                    // 'hostname' => '165.22.208.52',
                    // 'username' => 'smartAd',
                    // 'password' => 'WaDl@#smat1!',
                    'hostname' => 'localhost',
                    'username' => 'root',
                    'password' => '',
                    //'database' => 'S1001',
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

	public function getShiftLive()
	{
	    $db = \Config\Database::connect($this->site_connection);
	    $query = $db->table('pdm_production_info');
	    $query->select('shift_date,shift_id');
        $query->orderby('shift_date','desc');
        $query->orderby('shift_id','desc');
        $query->limit(1);
	    $res= $query->get()->getResultArray();
	    return $res;
	}

    public function getMachineLive()
    {
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_machine_current');
        $query->select('machine_id,machine_name');
        $res= $query->get()->getResultArray();
        return $res;
    }

    public function getOEETarget(){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('settings_current_shift_performance');
        $query->select('*');
        $query->orderby('last_updated_on','desc');
        $query->limit(1);
        $res= $query->get()->getResultArray();
        return $res;
    }

    public function getDataRaw($shift_date,$shift_id)
    {
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_downtime_reason_mapping as t');
        $query->select('t.machine_event_id,t.machine_id,t.downtime_reason_id,t.tool_id,t.part_id,t.shift_date,t.start_time,t.end_time,t.split_duration,t.calendar_date,r.downtime_category,r.downtime_reason');
        $query->where('t.shift_date',$shift_date);
        $query->where('t.shift_id',$shift_id);
        $query->join('settings_downtime_reasons as r', 'r.downtime_reason_id = t.downtime_reason_id');
        $res= $query->get()->getResultArray();
        return $res;
    }

    public function settings_tools()
    {
        $db = \Config\Database::connect($this->site_connection);

        $builder = $db->table("settings_part_current as s");
        $builder->select('s.*, t.tool_name');
        // $builder->where('s.part_id !=', "PT1001");
        $builder->join('settings_tool_table as t', 't.tool_id = s.tool_id');
        $data = $builder->get()->getResult();
        return $data;
    }

    public function getDataRawAll($shift_date,$shift_id)
    {
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_events');
        $query->select('machine_id,tool_id,part_id,shift_date,start_time,end_time,duration,calendar_date,event');
        $query->where('shift_date',$shift_date);
        $query->where('shift_id',$shift_id);
        $query->where("(event !='Offline' OR event != 'No Data')", NULL, FALSE);
        $res= $query->get()->getResultArray();
        return $res;
    }

    public function machine_events($shift_date,$shift_id)
    {
        $db = \Config\Database::connect($this->site_connection);

        $query = $db->table('pdm_events');
        $query->select('machine_id')->distinct();
        $query->where('shift_date',$shift_date);
        $query->where('shift_id',$shift_id);
        $machine_list= $query->get()->getResultArray();

        $result=[];
        foreach ($machine_list as $m) {
            $query = $db->table('pdm_events');
            $query->select('machine_id,event,duration');
            $query->where('shift_date',$shift_date);
            $query->where('shift_id',$shift_id);
            $query->where('machine_id',$m['machine_id']);
            $query->orderby('timestamp','DESC');
            $query->limit(1);
            $res= $query->get()->getResultArray();
            array_push($result,$res);
        }
        return $result;
    }

    public function getMachineRecActive($shift_date,$shift_id)
    {
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_production_info');
        $query->select('machine_id'); 
        $query->where('shift_date',$shift_date);
        $query->where('shift_id',$shift_id);
        $res= $query->distinct()->get()->getResultArray();
        return $res;
    }

    public function getPartRec($shift_date,$shift_id){
         $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_production_info');
        $query->select('part_id');
        $query->where('shift_date',$shift_date);
        $query->where('shift_id',$shift_id); 
        $res= $query->distinct('part_id')->get()->getResultArray();
        return $res;
    }

    public function getProductionRec($shift_date,$shift_id){
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_production_info');
        $query->select('machine_id,calendar_date,shift_date,start_time,end_time,part_id,tool_id,production,corrections,rejections,reject_reason,actual_shot_count');
        $query->where('shift_date',$shift_date);
        $query->where('shift_id',$shift_id);
        $query->where('production !=',null);

        $res= $query->get()->getResultArray();
        return $res;
    }

    public function getOfflineEventId($shift_date,$shift_id)
    {
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_events as t');
        $query->select('t.event,t.machine_id,t.machine_event_id');
        $query->where('t.shift_date',$shift_date);
        $query->where('t.shift_id',$shift_id);
        $query->where("(t.event='Offline' OR t.event='No Data')", NULL, FALSE);
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

    public function getShiftExact($date){
        $db = \Config\Database::connect($this->site_connection);
        $build = $db->table('settings_shift_management');
        $build->select('*');
        $build->where('last_updated_on <=', $date);
        $build->orderBy('last_updated_on', 'DESC');
        $build->limit(1);
        $res = $build->get()->getResultArray();
        $output['duration'] = $res;
        if (!empty($res)) {
            $shift_id = $res[0]['shift_log_id'];
            // $builder = $db->table($shift_id);
            $temp =explode("f", $shift_id);

            $sql = "SELECT * FROM `settings_shift_table` WHERE `shifts` REGEXP '$temp[1]$'";
            $builder = $db->query($sql);
            $output['shift'] = $builder->getResultArray();
            return $output;
        }else{
            return false;
        }
    }
    public function getLiveProduction($shift_date,$shift_id)
    {
        $db = \Config\Database::connect($this->site_connection);
        $query = $db->table('pdm_production_info');
        $query->select('machine_id,shift_date,start_time,end_time,shift_id,production,part_id');
        $query->where('shift_date',$shift_date);
        $query->where('shift_id',$shift_id);
        $query->groupby('machine_id');
        $query->groupby('start_time');
        $res= $query->get()->getResultArray();
        return $res;
    }

}

?>