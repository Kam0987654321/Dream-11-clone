<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Match_calender_model extends CI_Model
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
    

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // get data by id
    function get_by_unique_id($id)
    {
        $this->db->where('unique_id', $id);
        return $this->db->get($this->table)->row();
    }

   

}
