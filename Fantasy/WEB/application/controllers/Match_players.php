<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Match_players extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Match_players_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $id = $this->uri->segment('3');
        //print_r($id);die();
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'match_players/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'match_players/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'match_players/index.html';
            $config['first_url'] = base_url() . 'match_players/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Match_players_model->total_rows($id ,$q);
        //echo $this->db->last_query();die();
        
        $match_players = $this->Match_players_model->get_limit_data($id ,$config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'match_players_data' => $match_players,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('match_players/match_players_list', $data);
        $this->load->view('../modules/loggedin_template/footer',$data);
    }

    public function read($id) 
    {
        $row = $this->Match_players_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'match_status' => $row->match_status,
        'matchid' => $row->matchid,
		'teamid' => $row->team_name,
		'playerid' => $row->name,
		'is_select' => $row->is_select,
		'created_date' => $row->created_date,
		'modified_date' => $row->modified_date,
	    );
            $this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('match_players/match_players_read', $data);
            $this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('match_players'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('match_players/create_action'),
	    'id' => set_value('id'),
	    'matchid' => set_value('matchid'),
	    'teamid' => set_value('teamid'),
	    'playerid' => set_value('playerid'),
	    // 'is_select' => set_value('is_select'),
	    'created_date' => set_value('created_date'),
	    'modified_date' => set_value('modified_date'),
	);
        $data['match'] = $this->Match_players_model->getMatch();
        $data['team'] = $this->Match_players_model->getTeam();
        $data['player'] = $this->Match_players_model->getPlayer();  
        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('match_players/match_players_form', $data);
        $this->load->view('../modules/loggedin_template/footer',$data);
    }

    public function players($id) {
       $result = $this->db->where("teamid",$id)->get("players")->result();
       echo json_encode($result);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
           $this->create();
            // redirect('match_players/create');
        } else {
            $data = array(
		'matchid' => $this->input->post('matchid',TRUE),
		'teamid' => $this->input->post('teamid',TRUE),
		'playerid' => $this->input->post('playerid',TRUE),
		// 'is_select' => $this->input->post('is_select',TRUE),
		'created_date' => date("Y-m-d H:i:s"),
		'modified_date' => $this->input->post('modified_date',TRUE),
	    );
            $this->Match_players_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('match_players'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Match_players_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('match_players/update_action'),
		'id' => set_value('id', $row->id),
		'matchid' => set_value('matchid', $row->matchid),
		'teamid' => set_value('teamid', $row->teamid),
		'playerid' => set_value('playerid', $row->playerid),
		// 'is_select' => set_value('is_select', $row->is_select),
		'created_date' => set_value('created_date', $row->created_date),
		'modified_date' => set_value('modified_date', $row->modified_date),
	    );
            $data['match'] = $this->Match_players_model->getMatch();
            $data['team'] = $this->Match_players_model->getTeam(); 
            $data['player'] = $this->Match_players_model->getPlayer();
            $this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('match_players/match_players_form', $data);
            $this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('match_players'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'matchid' => $this->input->post('matchid',TRUE),
		'teamid' => $this->input->post('teamid',TRUE),
		'playerid' => $this->input->post('playerid',TRUE),
		// 'is_select' => $this->input->post('is_select',TRUE),
		//'created_date' => $this->input->post('created_date',TRUE),
		'modified_date' => date("Y-m-d H:i:s"),
	    );

            $this->Match_players_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('match_players'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Match_players_model->get_by_id($id);

        if ($row) {
            $this->Match_players_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('match_players'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('match_players'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('matchid', 'matchid', 'required');
	$this->form_validation->set_rules('teamid', 'teamid', 'trim|required');
	$this->form_validation->set_rules('playerid', 'playerid', 'trim|required');
	// $this->form_validation->set_rules('is_select', 'is select', 'trim|required');
	// $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	// $this->form_validation->set_rules('modified_date', 'modified date', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Match_players.php */
/* Location: ./application/controllers/Match_players.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-29 11:27:03 */
/* http://harviacode.com */