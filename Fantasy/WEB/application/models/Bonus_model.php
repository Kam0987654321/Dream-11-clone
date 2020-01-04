<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bonus_model extends CI_Model
{

    public $table = 'setting';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    //get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
// 	$this->db->or_like('teamid1', $q);
// 	$this->db->or_like('match_status', $q);
// 	$this->db->or_like('type', $q);
// 	$this->db->or_like('time', $q);
// 	$this->db->or_like('teamid2', $q);
// 	$this->db->or_like('user_id', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

     // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {      
           return $this->db->get('setting')->result();
    }
    
     function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
     function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    //get team name
    // function getTeam($id)
    // {
    // 	$this->db->where('team_id',$id);
    // 	return $this->db->get('team')->row();
    // }

    
}