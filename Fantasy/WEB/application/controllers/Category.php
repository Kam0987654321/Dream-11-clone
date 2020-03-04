<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'category/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'category/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'category/index.html';
            $config['first_url'] = base_url() . 'category/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Category_model->total_rows($q);
        $category = $this->Category_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'category_data' => $category,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
		$this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('category/category_list', $data);
		$this->load->view('../modules/loggedin_template/footer',$data);
    }

    public function read($id) 
    {
        $row = $this->Category_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'created_date' => $row->created_date,
		'modified_date' => $row->modified_date,
	    );
		$this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('category/category_read', $data);
				$this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('category'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('category/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'created_date' => set_value('created_date'),
	    'modified_date' => set_value('modified_date'),
	);
	    $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('category/category_form', $data);
		$this->load->view('../modules/loggedin_template/footer',$data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'created_date' => SAVE_DATE_FORMAT,
		'modified_date' => SAVE_DATE_FORMAT,
	    );

            $this->Category_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('category'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Category_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('category/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'created_date' => set_value('created_date', $row->created_date),
		'modified_date' => set_value('modified_date', $row->modified_date),
	    );
		$this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('category/category_form', $data);
			$this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('category'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'created_date' => SAVE_DATE_FORMAT,
		
	    );

            $this->Category_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('category'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Category_model->get_by_id($id);

        if ($row) {
            $this->Category_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('category'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('category'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');


	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
