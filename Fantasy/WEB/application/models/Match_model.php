<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Match_model extends CI_Model
{

    public $table = 'match';
    public $id = 'match_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

     // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('match_id', $q);
	//$this->db->or_like('name', $q);
	//$this->db->or_like('created_date', $q);
	//$this->db->or_like('modified_date', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('match_id', $q);
	//$this->db->or_like('name', $q);
	//$this->db->or_like('created_date', $q);
	//$this->db->or_like('modified_date', $q);
	//$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // team list
    function get_team_list()
    {
   		return $this->db->get('team')->result();
    }

    function match_type()
    {
    	return $this->db->get('match_type')->result();
    }

    function match_status()
    {
    	return $this->db->get('match_status')->result();
    }

    function team_name($id)
    {
    	$this->db->select('team_name');
    	$this->db->where('team_id',$id);
    	return $this->db->get('team')->row();
    }

    function get_match_type($id)
    {
    	$this->db->select('name');
    	$this->db->where('id',$id);
    	return $this->db->get('match_type')->row();
    }

    function get_match_status($id)
    {
    	$this->db->select('name');
    	$this->db->where('id',$id);
    	return $this->db->get('match_status')->row();
    }
    
    function get_match_by_match_status($status,$desc='asc',$limit=10)
    {
        $this->db->select('match.*,t1.team_name as t1_name, t2.team_name as t2_name');
    	$this->db->where('match_status',$status);
    	$this->db->join('team as t1','t1.team_id=match.teamid1');
    	$this->db->join('team as t2','t2.team_id=match.teamid2');
    	$this->db->order_by('match_id',$desc);
    	$this->db->limit($limit);
    	return $this->db->get('match')->result();
    }
    
    function get_today_match()
    {
        $today = date('Y-m-d');
       $this->db->select('match.*,t1.team_name as t1_name, t2.team_name as t2_name');
       //array()
    	$this->db->where("DATE(match_date_time)" , $today);
    	$this->db->or_where('match_status','Live');
    	$this->db->join('team as t1','t1.team_id=match.teamid1');
    	$this->db->join('team as t2','t2.team_id=match.teamid2');
    	$this->db->order_by('match_id',$desc);
    	$this->db->limit($limit);
    	return $this->db->get('match')->result();
        
    }
    
    function upcomming_live_matches(){
        $today = date('Y-m-d');
        $this->db->select('match.*');
    	$this->db->where("DATE(time) >= '".$today."'");
    	$this->db->or_where('match_status','Live');
    
    	$this->db->order_by('match_id',$desc);
    	return $this->db->get('match')->result();   
    }

    function total_team_join($id)
    {
       return $this->db->get_where('my_team',array('match_id'=>$id))->result();
    }

    function get_toprank($id)
    {
        $this->db->select('*');
        $this->db->where('matchid',$id);
        $this->db->order_by('rank','asc');
        $this->db->limit('3');
        return $this->db->get('leaderboard')->result();
    }    

   function get_userjoin_count($id){
        $this->db->select('*');
        $this->db->where('matchid',$id);
        $this->db->group_by('user_id');
        return $this->db->get('leaderboard')->num_rows();
   }

   function get_rank_byid($id)
   {
        $this->db->select('*');
        $this->db->where('teamid',$id);
        return $this->db->get('leaderboard')->row();
   }

   function get_usersjoin_count(){
        $this->db->select('*');
        $this->db->group_by('user_id');
        return $this->db->get('leaderboard')->num_rows();
   }


}
?>    