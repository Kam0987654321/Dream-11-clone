<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_match extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('My_match_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
    	$q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'My_match/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'My_match/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'My_match/index.html';
            $config['first_url'] = base_url() . 'My_match/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->My_match_model->total_rows($q);
        $mymatch = $this->My_match_model->get_limit_data($config['per_page'], $start, $q);
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data = array(
            'my_match_data' => $mymatch,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('my_match/my_match_list', $data);
        $this->load->view('../modules/loggedin_template/footer',$data);
    }
}
?>