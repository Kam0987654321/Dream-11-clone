<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bonus extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bonus_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
    	$q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'Bonus/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Bonus/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Bonus/index.html';
            $config['first_url'] = base_url() . 'Bonus/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bonus_model->total_rows($q);
        $mymatch = $this->Bonus_model->get_limit_data($config['per_page'], $start, $q);
        
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
        $this->load->view('bonus/bonus_list', $data);
        $this->load->view('../modules/loggedin_template/footer',$data);
    }
    
    public function update($id) 
    {
        $row = $this->Bonus_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bonus/update_action'),
    'id' => set_value('id', $row->id),
    'value' => set_value('value', $row->value)
      );
    $this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('bonus/bonus_form', $data);
      $this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bonus'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
    'value' => $this->input->post('value',TRUE)
      );

            $this->Bonus_model->update($this->input->post('id', TRUE), $data);
           // echo $this->db->last_query();die;
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bonus'));
        }
    }
    
     public function _rules() 
    {
	$this->form_validation->set_rules('value', 'Value', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
?>