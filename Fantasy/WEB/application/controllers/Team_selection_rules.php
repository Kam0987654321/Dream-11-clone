<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Team_selection_rules extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Team_selection_rules_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'team_selection_rules/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'team_selection_rules/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'team_selection_rules/index.html';
            $config['first_url'] = base_url() . 'team_selection_rules/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Team_selection_rules_model->total_rows($q);
        $team_selection_rules = $this->Team_selection_rules_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'team_selection_rules_data' => $team_selection_rules,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('team_selection_rules/team_selection_rules_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Team_selection_rules_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'categoryid' => $row->categoryid,
		'designationid' => $row->designationid,
		'allowed_players' => $row->allowed_players,
		'created_date' => $row->created_date,
		'modified_date' => $row->modified_date,
	    );
            $this->load->view('team_selection_rules/team_selection_rules_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('team_selection_rules'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('team_selection_rules/create_action'),
	    'id' => set_value('id'),
	    'categoryid' => set_value('categoryid'),
	    'designationid' => set_value('designationid'),
	    'allowed_players' => set_value('allowed_players'),
	    'created_date' => set_value('created_date'),
	    'modified_date' => set_value('modified_date'),
	);
        $this->load->view('team_selection_rules/team_selection_rules_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'categoryid' => $this->input->post('categoryid',TRUE),
		'designationid' => $this->input->post('designationid',TRUE),
		'allowed_players' => $this->input->post('allowed_players',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'modified_date' => $this->input->post('modified_date',TRUE),
	    );

            $this->Team_selection_rules_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('team_selection_rules'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Team_selection_rules_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('team_selection_rules/update_action'),
		'id' => set_value('id', $row->id),
		'categoryid' => set_value('categoryid', $row->categoryid),
		'designationid' => set_value('designationid', $row->designationid),
		'allowed_players' => set_value('allowed_players', $row->allowed_players),
		'created_date' => set_value('created_date', $row->created_date),
		'modified_date' => set_value('modified_date', $row->modified_date),
	    );
            $this->load->view('team_selection_rules/team_selection_rules_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('team_selection_rules'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'categoryid' => $this->input->post('categoryid',TRUE),
		'designationid' => $this->input->post('designationid',TRUE),
		'allowed_players' => $this->input->post('allowed_players',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'modified_date' => $this->input->post('modified_date',TRUE),
	    );

            $this->Team_selection_rules_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('team_selection_rules'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Team_selection_rules_model->get_by_id($id);

        if ($row) {
            $this->Team_selection_rules_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('team_selection_rules'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('team_selection_rules'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('categoryid', 'categoryid', 'trim|required');
	$this->form_validation->set_rules('designationid', 'designationid', 'trim|required');
	$this->form_validation->set_rules('allowed_players', 'allowed players', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('modified_date', 'modified date', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Team_selection_rules.php */
/* Location: ./application/controllers/Team_selection_rules.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-29 11:29:34 */
/* http://harviacode.com */