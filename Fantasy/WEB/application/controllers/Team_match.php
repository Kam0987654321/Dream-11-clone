<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Team_match extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Team_match_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'team_match/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'team_match/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'team_match/index.html';
            $config['first_url'] = base_url() . 'team_match/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Team_match_model->total_rows($q);
        $team_match = $this->Team_match_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'team_match_data' => $team_match,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('team_match/team_match_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Team_match_model->get_by_id($id);
        if ($row) {
            $data = array(
		'match_id' => $row->match_id,
		'teamid1' => $row->teamid1,
		'match_status' => $row->match_status,
		'type' => $row->type,
		'time' => $row->time,
		'teamid2' => $row->teamid2,
	    );
            $this->load->view('team_match/team_match_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('team_match'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('team_match/create_action'),
	    'match_id' => set_value('match_id'),
	    'teamid1' => set_value('teamid1'),
	    'match_status' => set_value('match_status'),
	    'type' => set_value('type'),
	    'time' => set_value('time'),
	    'teamid2' => set_value('teamid2'),
	);
        $this->load->view('team_match/team_match_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'teamid1' => $this->input->post('teamid1',TRUE),
		'match_status' => $this->input->post('match_status',TRUE),
		'type' => $this->input->post('type',TRUE),
		'time' => $this->input->post('time',TRUE),
		'teamid2' => $this->input->post('teamid2',TRUE),
	    );

            $this->Team_match_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('team_match'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Team_match_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('team_match/update_action'),
		'match_id' => set_value('match_id', $row->match_id),
		'teamid1' => set_value('teamid1', $row->teamid1),
		'match_status' => set_value('match_status', $row->match_status),
		'type' => set_value('type', $row->type),
		'time' => set_value('time', $row->time),
		'teamid2' => set_value('teamid2', $row->teamid2),
	    );
            $this->load->view('team_match/team_match_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('team_match'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('match_id', TRUE));
        } else {
            $data = array(
		'teamid1' => $this->input->post('teamid1',TRUE),
		'match_status' => $this->input->post('match_status',TRUE),
		'type' => $this->input->post('type',TRUE),
		'time' => $this->input->post('time',TRUE),
		'teamid2' => $this->input->post('teamid2',TRUE),
	    );

            $this->Team_match_model->update($this->input->post('match_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('team_match'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Team_match_model->get_by_id($id);

        if ($row) {
            $this->Team_match_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('team_match'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('team_match'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('teamid1', 'teamid1', 'trim|required');
	$this->form_validation->set_rules('match_status', 'match status', 'trim|required');
	$this->form_validation->set_rules('type', 'type', 'trim|required');
	$this->form_validation->set_rules('time', 'time', 'trim|required');
	$this->form_validation->set_rules('teamid2', 'teamid2', 'trim|required');

	$this->form_validation->set_rules('match_id', 'match_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Team_match.php */
/* Location: ./application/controllers/Team_match.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-29 11:28:10 */
/* http://harviacode.com */