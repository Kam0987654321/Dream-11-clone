<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Designation extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Designation_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'designation/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'designation/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'designation/index.html';
            $config['first_url'] = base_url() . 'designation/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Designation_model->total_rows($q);
        $designation = $this->Designation_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'designation_data' => $designation,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('designation/designation_list', $data);
        $this->load->view('../modules/loggedin_template/footer',$data);
    }

    public function read($id) 
    {
        $row = $this->Designation_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'title' => $row->title,
		'created_date' => $row->created_date,
		'modified_date' => $row->modified_date,
	    );
            $this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('designation/designation_read', $data);
            $this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('designation'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('designation/create_action'),
	    'id' => set_value('id'),
	    'title' => set_value('title'),
	    'created_date' => set_value('created_date'),
	    'modified_date' => set_value('modified_date'),
	);
        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('designation/designation_form', $data);
        $this->load->view('../modules/loggedin_template/footer',$data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'created_date' => SAVE_DATE_FORMAT,
		'modified_date' => SAVE_DATE_FORMAT,
	    );

            $this->Designation_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('designation'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Designation_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('designation/update_action'),
		'id' => set_value('id', $row->id),
		'title' => set_value('title', $row->title),
		'created_date' => set_value('created_date', $row->created_date),
		'modified_date' => set_value('modified_date', $row->modified_date),
	    );
            $this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('designation/designation_form', $data);
            $this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('designation'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'modified_date' => SAVE_DATE_FORMAT,
		
	    );

            $this->Designation_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('designation'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Designation_model->get_by_id($id);

        if ($row) {
            $this->Designation_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('designation'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('designation'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
