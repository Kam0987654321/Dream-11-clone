<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Team extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Team_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'team/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'team/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'team/index.html';
            $config['first_url'] = base_url() . 'team/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Team_model->total_rows($q);
        $team = $this->Team_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'team_data' => $team,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('team/team_list', $data);
        $this->load->view('../modules/loggedin_template/footer',$data);
    }

    public function read($id) 
    {
        $row = $this->Team_model->get_by_id($id);
        if ($row) {
            $data = array(
		'team_id' => $row->team_id,
		'team_name' => $row->team_name,
		'team_short_name' => $row->team_short_name,
		'team_image' => $row->team_image,
	    );
            $this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('team/team_read', $data);
            $this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('team'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('team/create_action'),
	    'team_id' => set_value('team_id'),
	    'team_name' => set_value('team_name'),
	    'team_short_name' => set_value('team_short_name'),
	    'team_image' => set_value('team_image'),
	);
        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('team/team_form', $data);
        $this->load->view('../modules/loggedin_template/footer',$data);
    }
    
    public function create_action() 
    {
       $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'team_name' => $this->input->post('team_name',TRUE),
		'team_short_name' => $this->input->post('team_short_name',TRUE),
		
	    );

            $this->Team_model->insert($data);
             $id = $this->db->insert_id();
            $img=upload_image($id,'team_image','team_image','team_image');
            $result = array('team_image'=>$img['filename']);            
            $this->Team_model->update($id,$result);     
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('team'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Team_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('team/update_action'),
		'team_id' => set_value('team_id', $row->team_id),
		'team_name' => set_value('team_name', $row->team_name),
		'team_short_name' => set_value('team_short_name', $row->team_short_name),
		'team_image' => set_value('team_image', $row->team_image),
	    );
            $this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('team/team_form', $data);
            $this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('team'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('team_id', TRUE));
        } else {
            $data = array(
		'team_name' => $this->input->post('team_name',TRUE),
		'team_short_name' => $this->input->post('team_short_name',TRUE),
	
	    );
            if($_FILES['team_image']['name']!=''){
                $img=upload_image($this->input->post('team_id', TRUE),'team_image','team_image','team_image');
                $result = array('team_image'=> base_url('uploads/team_image/'.$img['filename']));        
                $this->Team_model->update($this->input->post('team_id', TRUE),$result);
            }
            

            $this->Team_model->update($this->input->post('team_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('team'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Team_model->get_by_id($id);

        if ($row) {
            $this->Team_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('team'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('team'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('team_name', 'team name', 'trim|required');
	$this->form_validation->set_rules('team_short_name', 'team short name', 'trim|required');
	
	$this->form_validation->set_rules('team_id', 'team_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Team.php */
/* Location: ./application/controllers/Team.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-29 11:28:00 */
/* http://harviacode.com */