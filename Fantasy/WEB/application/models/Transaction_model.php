<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaction_model extends CI_Model
{

    public $table = 'transection';
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
    
    function count_debit_transaction()
    {
        $this->db->select('sum(amount) as sales');
        $this->db->order_by($this->id, $this->order);
        $this->db->where('type','debit');
        return $this->db->get($this->table)->row(); 
    }


    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('withdrow_request','1');
        return $this->db->get($this->table)->result();
    }
}