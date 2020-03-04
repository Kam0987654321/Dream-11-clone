<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Missing_player_details_model extends CI_Model
{

    public $table = 'missing_player_details';
    public $id = 'id';
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
    function get_by_teamid($teamid)
    {
        $this->db->from($this->table);
        $this->db->where('teamid', $teamid);
        return $this->db->get()->result();
    }
    
}