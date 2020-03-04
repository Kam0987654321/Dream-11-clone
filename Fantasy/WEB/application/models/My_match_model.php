<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_match_model extends CI_Model
{

    public $table = 'my_match';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    //get total rows
    function total_rows($q = NULL) {
        $this->db->like('my_match_id', $q);
	$this->db->or_like('teamid1', $q);
	$this->db->or_like('match_status', $q);
	$this->db->or_like('type', $q);
	$this->db->or_like('time', $q);
	$this->db->or_like('teamid2', $q);
	$this->db->or_like('user_id', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

     // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {      
           return $this->db->get('my_match')->result();
    }

    //get team name
    function getTeam($id)
    {
    	$this->db->where('team_id',$id);
    	return $this->db->get('team')->row();
    }

    
}