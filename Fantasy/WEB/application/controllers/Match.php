<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Match extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Match_model');
        $this->load->library('form_validation');        
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'match/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'match/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'match/index.html';
            $config['first_url'] = base_url() . 'match/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Match_model->total_rows($q);
        $match = $this->Match_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'match_data' => $match,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
		$this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('match/match_list', $data);
		$this->load->view('../modules/loggedin_template/footer',$data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('match/create_action'),
		);
		$data['teams'] = $this->Match_model->get_team_list();
		$data['match_type'] = $this->Match_model->match_type();
		$data['match_status'] = $this->Match_model->match_status();
		$this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('match/match_form', $data);
			$this->load->view('../modules/loggedin_template/footer',$data);
    }

    public function create_action()
    {  //echo "<pre>";
      //  print_r($_POST);die();
    	$this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } 
        else 
        {

        	$type = $this->input->post('match_type');
        	$type_name = $this->Match_model->get_match_type($type);
        	$match_status = $this->input->post('match_status');
        	$match_status = $this->Match_model->get_match_status($match_status);

        	$data = array(
        		'teamid1' =>$this->input->post('team_first',TRUE),
        		'teamid2' =>$this->input->post('team_second',TRUE),
        		'type' =>$type_name->name,
        		'match_status'=>$match_status->name,
                'time' =>$this->input->post('datetime',TRUE),
        		'created_date'=>SAVE_DATE_FORMAT //date("Y-m-d H:i:s")
        		 );

            $this->Match_model->insert($data);
           // echo $this->db->last_query();die();
        	$this->session->set_flashdata('message', 'Create Record Success');
           // echo site_url('match');die();
            // redirect(site_url('match'));
            $this->index();
        }
    }

    public function read($id) 
    {
        $data['row'] = $response = $this->Match_model->get_by_id($id);

        $data['team1'] = $this->Match_model->team_name($response->teamid1);
        $data['team2'] = $this->Match_model->team_name($response->teamid2);
       if($data !=""){
        
			$this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('match/match_read', $data);
				$this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            //redirect(site_url('match'));
            $this->index();
        }
    }

    public function update($id) 
    {
        $row = $this->Match_model->get_by_id($id);

        if ($row) {
        	$data = array(
            'button' => 'Update',
            'action' => site_url('match/update_action'),
		);

        $data['row']  = $row;
        $data['teams'] = $this->Match_model->get_team_list();
		$data['match_type'] = $this->Match_model->match_type();
		$data['match_status'] = $this->Match_model->match_status();
        	$this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('match/match_form_update', $data);
				$this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            // redirect(site_url('match'));
            $this->index();
        }
    }

    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('match_id', TRUE));
        } else {
        	
           	$type = $this->input->post('match_type');
        	$type_name = $this->Match_model->get_match_type($type);
        	$match_statu = $this->input->post('match_status');
        	$match_status = $this->Match_model->get_match_status($match_statu);

        	$data = array(
        		'teamid1' =>$this->input->post('team_first',TRUE),
        		'teamid2' =>$this->input->post('team_second',TRUE),
        		'type' =>$type_name->name,
                'time' =>$this->input->post('datetime',TRUE),
        		'match_status'=>$match_status->name );
            $this->Match_model->update($this->input->post('match_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            //redirect(site_url('match'));
            $this->index();
        }
    }


     public function delete($id) 
    {
        $row = $this->Match_model->get_by_id($id);
        if ($row) {
            $this->Match_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            // redirect(site_url('match'));
            $this->index();
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
           // redirect(site_url('match'));
            $this->index();
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('team_first', 'Team First name', 'trim|required');
		$this->form_validation->set_rules('team_second', 'Team Second name', 'trim|required');
		$this->form_validation->set_rules('match_type', 'Match type', 'trim|required');
		$this->form_validation->set_rules('match_status', 'Match Status', 'trim|required');
        $this->form_validation->set_rules('datetime', 'Date Time', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
?>    