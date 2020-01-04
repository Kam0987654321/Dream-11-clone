<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Points_distribution_rules extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Points_distribution_rules_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'points_distribution_rules/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'points_distribution_rules/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'points_distribution_rules/index.html';
            $config['first_url'] = base_url() . 'points_distribution_rules/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Points_distribution_rules_model->total_rows($q);
        $points_distribution_rules = $this->Points_distribution_rules_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'points_distribution_rules_data' => $points_distribution_rules,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('points_distribution_rules/points_distribution_rules_list', $data);
        $this->load->view('../modules/loggedin_template/footer',$data);
        
    }

    public function read($id) 
    {
        $row = $this->Points_distribution_rules_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'title' => $row->title,
		'scrore' => $row->scrore,
		'description' => $row->description,
		'created_date' => $row->created_date,
		'modified_date' => $row->modified_date,
	    );
        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('points_distribution_rules/points_distribution_rules_read', $data);
        $this->load->view('../modules/loggedin_template/footer');


            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('points_distribution_rules'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('points_distribution_rules/create_action'),
	    'id' => set_value('id'),
	    'title' => set_value('title'),
	    'scrore' => set_value('scrore'),
	    'description' => set_value('description'),
	    'created_date' => set_value('created_date'),
	    'modified_date' => set_value('modified_date'),
	);
        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('points_distribution_rules/points_distribution_rules_form', $data);
        $this->load->view('../modules/loggedin_template/footer');
        
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'scrore' => $this->input->post('scrore',TRUE),
		'description' => $this->input->post('description',TRUE),
		'created_date' =>date("Y-m-d H:i:s"),
		'modified_date' => $this->input->post('modified_date',TRUE),
	    );

            $this->Points_distribution_rules_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('points_distribution_rules'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Points_distribution_rules_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('points_distribution_rules/update_action'),
		'id' => set_value('id', $row->id),
		'title' => set_value('title', $row->title),
		'scrore' => set_value('scrore', $row->scrore),
		'description' => set_value('description', $row->description),
		'created_date' => set_value('created_date', $row->created_date),
		'modified_date' => set_value('modified_date', $row->modified_date),
	    );
            $this->load->view('../modules/loggedin_template/header',$data);
         $this->load->view('points_distribution_rules/points_distribution_rules_form', $data);
        $this->load->view('../modules/loggedin_template/footer');
           
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('points_distribution_rules'));
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
		'scrore' => $this->input->post('scrore',TRUE),
		'description' => $this->input->post('description',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'modified_date' => $this->input->post('modified_date',TRUE),
	    );

            $this->Points_distribution_rules_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('points_distribution_rules'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Points_distribution_rules_model->get_by_id($id);

        if ($row) {
            $this->Points_distribution_rules_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('points_distribution_rules'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('points_distribution_rules'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('scrore', 'scrore', 'trim|required|numeric');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	// $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	// $this->form_validation->set_rules('modified_date', 'modified date', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Points_distribution_rules.php */
/* Location: ./application/controllers/Points_distribution_rules.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-29 11:27:40 */
/* http://harviacode.com */