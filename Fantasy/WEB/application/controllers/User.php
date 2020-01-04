<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    function index()
    {
       $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/index.html';
            $config['first_url'] = base_url() . 'user/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        $user = $this->User_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
			$this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('user/user_list', $data);
			$this->load->view('../modules/loggedin_template/footer');
    }
    
    
    function wallet()
    {
        $id = $this->uri->segment(3);
        $data['wallets'] = $this->User_model->get_wallet($id);
        $data['wallets_amount'] = $this->User_model->get_wallet_amount($id);
       // echo $this->db->last_query();die;
    // echo "<pre>";  print_r($data);die;
        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('user/walletInfo', $data);
		$this->load->view('../modules/loggedin_template/footer');
    }
    
    function wallet_update()
    {
        $id = $this->uri->segment(3);
        
         $data['info'] = $this->User_model->get_txn_record($id);
         
        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('user/wallet_update', $data);
		$this->load->view('../modules/loggedin_template/footer');
    }   
    
    function user_wallet_update()
    {
       /// print_r($_POST);die;
       // $this->rule();
       $amount =  $this->input->post('value');
       $user_id =  $this->input->post('user_id');
       $id =  $this->input->post('id');
       
       $data = array('amount'=> $amount);
       
       $this->db->where('id',$id);
       $this->db->update('transection',$data);
       $this->session->set_flashdata('message','Amount update successfully');
       redirect('user/wallet/'.$user_id);
       
    }
}
?>