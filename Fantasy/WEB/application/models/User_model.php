<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public $table = 'registration';
    public $id = 'user_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

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
        $this->db->like('user_id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('mobile', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('type', $q);
	$this->db->or_like('teamName', $q);
	$this->db->or_like('favriteTeam', $q);
	$this->db->or_like('dob', $q);
	$this->db->or_like('gender', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('city', $q);
	$this->db->or_like('pincode', $q);
	$this->db->or_like('state', $q);
	$this->db->or_like('country', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('user_id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('mobile', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('type', $q);
	$this->db->or_like('teamName', $q);
	$this->db->or_like('favriteTeam', $q);
	$this->db->or_like('dob', $q);
	$this->db->or_like('gender', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('city', $q);
	$this->db->or_like('pincode', $q);
	$this->db->or_like('state', $q);
	$this->db->or_like('country', $q);
	//$this->db->limit($limit, $start);
    return $this->db->get($this->table)->result();
    }
    
    function count_users()
    {
        $this->db->from('registration');
        $this->db->select('count(*) as num_rows');
        return $this->db->get()->row();
    }

    function not_participate_15_days()
    { 
        $beforedate = date("Y-m-d", strtotime( "-15 days"));
        $this->db->select('user_id');
        $this->db->where('created_date >', $beforedate);
        $this->db->group_by('user_id');
        $resp = $this->db->get('leaderboard')->result();
        if(count($resp)>0)
        {
            return $resp;
        }    
        else
        {
            return false;
        }    

    }

    function not_participate_30_days()
    { 
        $beforedate = date("Y-m-d", strtotime( "-30 days"));
        $this->db->select('user_id');
        $this->db->where('created_date >', $beforedate);
        $this->db->group_by('user_id');
        $resp = $this->db->get('leaderboard')->result();
        if(count($resp)>0)
        {
            return $resp;
        }    
        else
        {
            return false;
        }    

    }

    function update($user_id,$data)
    {
        $this->db->where('user_id',$user_id);
        $update = $this->db->update('registration',$data);
        if($update)
        {
            return true;
        }   
        else
        {
            return false;
        } 
    }
    
    function get_wallet($id)
    {
        $this->db->select('registration.user_id,registration.name,registration.email,registration.mobile,transection.amount,transection.type,transection.id,transection.transaction_status');
        $this->db->where('transection.user_id',$id);
        $this->db->from('transection');
        $this->db->join('registration', 'transection.user_id = registration.user_id');
        $resp =   $this->db->get('')->result();
       // echo $this->db->last_query();die;
        if($resp !="")
        {
            return $resp;
        }
        else
        {
            return false;
        }
    }
    
    function get_txn_record($id)
    {
        $this->db->select('amount,id,user_id');
        $this->db->where('id',$id);
        $this->db->from('transection');
        $resp =   $this->db->get('')->row_array();
        if($resp !="")
        {
            return $resp;
        }
        else
        {
            return false;
        }
    }
    
    function get_wallet_amount($id)
    {
        $sql = "SELECT SUM(`amount`) AS `amount` FROM `transection` WHERE `user_id` = '".$id."' AND (`type` = 'winning' OR `type` = 'credit' OR `type` = 'bonus')" ;
        
        $amount = $this->db->query($sql)->row_array();
        
        // $this->db->select_sum('amount'); 
        // $this->db->where('user_id',$id);
        // $this->db->where('type','winning');
        // $this->db->or_where('type','credit');
        // $this->db->or_where('type','bonus');
        // $amount = $this->db->get('transection')->row()->amount;
        if($amount  > 0)
        {
            return $amount ; 
        }
        else
        {
            return 0;
        }
        
        
    }
}