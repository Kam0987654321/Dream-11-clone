<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kyc extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');        
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kyc/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kyc/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kyc/index.html';
            $config['first_url'] = base_url() . 'kyc/index.html';
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
        $this->load->view('kyc/user_list', $data);
		$this->load->view('../modules/loggedin_template/footer',$data);
    }

    public function aadhar_status()
    {
       $user_id =  $this->input->post('user_id');
       $status =  $this->input->post('status');
       $data = array('aadharcard_status' =>$status);
       $update = $this->User_model->update($user_id,$data);

       if($update)
       {
           $json = array('status' =>1 , 'msg'=> 'Status update Successfully');
           echo json_encode($json);
       }
       else
       {
            $json = array('status' => 2 , 'msg'=> 'Try again');
            echo json_encode($json);    
       } 


    }

    public function pan_status()
    {
       $user_id =  $this->input->post('user_id');
       $status =  $this->input->post('status');
       $data = array('pancard_status' =>$status);
       $update = $this->User_model->update($user_id,$data);

       if($update)
       {
           $json = array('status' =>1 , 'msg'=> 'Status update Successfully');
           echo json_encode($json);
       }
       else
       {
            $json = array('status' => 2 , 'msg'=> 'Try again');
            echo json_encode($json);    
       } 


    }

}
