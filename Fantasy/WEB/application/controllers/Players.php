<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Players extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Players_model');
        $this->load->model('Team_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'players/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'players/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'players/index.html';
            $config['first_url'] = base_url() . 'players/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Players_model->total_rows($q);
        $players = $this->Players_model->get_limit_data($config['per_page'], $start, $q);

        
       $teams = $this->Team_model->get_all();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
           // 'players_data' => $players,
            'teams'=>$teams,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('players/players_list', $data);
        $this->load->view('../modules/loggedin_template/footer',$data);
    }

    public function read($id) 
    {
        $row = $this->Players_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'designationid' => $row->title,
		'teamid' => $row->team_name,
		'credit_points' => $row->credit_points,
		'image' => $row->image,
		'created_date' => $row->created_date,
		'modified_date' => $row->modified_date,
	    );
            $this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('players/players_read', $data);
            $this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('players'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('players/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'designationid' => set_value('designationid'),
	    'teamid' => set_value('teamid'),
	    'credit_points' => set_value('credit_points'),
	    'image' => set_value('image'),
	    'created_date' => set_value('created_date'),
	    'modified_date' => set_value('modified_date'),
	);
        $data['designation'] = $this->Players_model->getDesignation();
        $data['team'] = $this->Players_model->getTeam();
        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('players/players_form', $data);
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
                	'designationid' => $this->input->post('designationid',TRUE),
                	'teamid' => $this->input->post('teamid',TRUE),
                	'credit_points' => $this->input->post('credit_points',TRUE),
                	// 'image' => $image,
                	'created_date' => date("Y-m-d H:i:s"),
                	'modified_date' => $this->input->post('modified_date',TRUE),
        	    );

                    $this->Players_model->insert($data);
                    $id = $this->db->insert_id();
                    $img=upload_image($this->input->post('id', TRUE),'image','image','player');
                    $result = array('image'=>$img['filename']);             
                    $this->Players_model->update($id,$result); 
                    $this->session->set_flashdata('message', 'Create Record Success');
                    redirect(site_url('players'));        
            }
    }
    
    public function update($id) 
    {
        $row = $this->Players_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('players/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'designationid' => set_value('designationid', $row->designationid),
		'teamid' => set_value('teamid', $row->teamid),
		'credit_points' => set_value('credit_points', $row->credit_points),
		'image' => set_value('image', $row->image),
		'created_date' => set_value('created_date', $row->created_date),
		'modified_date' => set_value('modified_date', $row->modified_date),
	    );
            $data['designation'] = $this->Players_model->getDesignation();
            $data['team'] = $this->Players_model->getTeam();
            $this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('players/players_form', $data);
            $this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('players'));
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
		'designationid' => $this->input->post('designationid',TRUE),
		'teamid' => $this->input->post('teamid',TRUE),
		'credit_points' => $this->input->post('credit_points',TRUE),
		// 'image' => $this->input->post('image',TRUE),
		//'created_date' => $this->input->post('created_date',TRUE),
		'modified_date' => date("Y-m-d H:i:s"),
	    );
            if($_FILES['image']['name']!=''){
                $img=upload_image($this->input->post('id', TRUE),'image','image','player');
                $result = array('image'=>$img['filename']); 
                $this->Players_model->update($this->input->post('id', TRUE),$result);
            }

            $this->Players_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('players'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Players_model->get_by_id($id);

        if ($row) {
            $this->Players_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('players'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('players'));
        }
    }

    public function get_players_by_teamid()
    {
        $id = $this->input->post('id');
        $data['players_data'] = $this->Players_model->get_players_by_teamid($id);
       // echo $this->db->last_query();die();
        echo $page= $this->load->view('players/players_ajax',$data);
        // print_r($players);die();
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('designationid', 'designationid', 'trim|required');
	$this->form_validation->set_rules('teamid', 'teamid', 'trim|required');
	$this->form_validation->set_rules('credit_points', 'credit points', 'trim|required');
	// $this->form_validation->set_rules('image', 'image', 'trim|required');
	// $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	// $this->form_validation->set_rules('modified_date', 'modified date', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Players.php */
/* Location: ./application/controllers/Players.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-29 11:27:27 */
/* http://harviacode.com */