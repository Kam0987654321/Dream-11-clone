<?php

class Dashboard_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function unpublished_match()
    {
        
        $today = date('Y-m-d');
       $this->db->select('match.*,t1.team_name as t1_name, t2.team_name as t2_name');
    	$this->db->where("DATE(time) >= '".$today."'");
    	$this->db->or_where('match_status','Live');
    	$this->db->join('team as t1','t1.team_id=match.teamid1');
    	$this->db->join('team as t2','t2.team_id=match.teamid2');
    	$this->db->order_by('match_id',$desc);
    	return $this->db->get('match')->result();    
    }



} // class ends here
