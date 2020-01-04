<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contest extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contest_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'contest/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'contest/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'contest/index.html';
            $config['first_url'] = base_url() . 'contest/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Contest_model->total_rows($q);
        $contest = $this->Contest_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'contest_data' => $contest,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
			$this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('contest/contest_list', $data);
			$this->load->view('../modules/loggedin_template/footer');
    }

    public function read($id) 
    {
        $row = $this->Contest_model->get_by_id($id);
        if ($row) {
            $data = array(
		'contest_id' => $row->contest_id,
		'contest_name' => $row->contest_name,
		'contest_tag' => $row->contest_tag,
		'winners' => $row->winners,
		'prize_pool' => $row->prize_pool,
		'total_team' => $row->total_team,
		'join_team' => $row->join_team,
		'entry' => $row->entry,
		'contest_description' => $row->contest_description,
		'contest_note1' => $row->contest_note1,
		'contest_note2' => $row->contest_note2,
		'match_id' => $row->match_id,
		//'type' => $row->type,
	    );
			$this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('contest/contest_read', $data);
				$this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contest'));
        }
    }

    public function create() 
    {       
        $data = array(
            'button' => 'Create',
            'action' => site_url('contest/create_action'),
	    'contest_id' => set_value('contest_id'),
	    'contest_name' => set_value('contest_name'),
	    'contest_tag' => set_value('contest_tag'),
	    'winners' => set_value('winners'),
	    'prize_pool' => set_value('prize_pool'),
	    'total_team' => set_value('total_team'),
	    'join_team' => set_value('join_team'),
	    'entry' => set_value('entry'),
	    'contest_description' => set_value('contest_description'),
	    'contest_note1' => set_value('contest_note1'),
	    'contest_note2' => set_value('contest_note2'),
	    'match_id' => set_value('match_id'),
	   // 'type' => set_value('type'),
	);

        $data['matchs'] = $this->Contest_model->match_list();
        
		$this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('contest/contest_form', $data);
			$this->load->view('../modules/loggedin_template/footer',$data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'contest_name' => $this->input->post('contest_name',TRUE),
		'contest_tag' => $this->input->post('contest_tag',TRUE),
		'winners' => $this->input->post('winners',TRUE),
		'prize_pool' => $this->input->post('prize_pool',TRUE),
		'total_team' => $this->input->post('total_team',TRUE),
		'join_team' => $this->input->post('join_team',TRUE),
		'entry' => $this->input->post('entry',TRUE),
		'contest_description' => $this->input->post('contest_description',TRUE),
		'contest_note1' => $this->input->post('contest_note1',TRUE),
		'contest_note2' => $this->input->post('contest_note2',TRUE),
		'match_id' => $this->input->post('match_id',TRUE),
		//'type' => $this->input->post('type',TRUE),
	    );

            $this->Contest_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('contest'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Contest_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('contest/update_action'),
		'contest_id' => set_value('contest_id', $row->contest_id),
		'contest_name' => set_value('contest_name', $row->contest_name),
		'contest_tag' => set_value('contest_tag', $row->contest_tag),
		'winners' => set_value('winners', $row->winners),
		'prize_pool' => set_value('prize_pool', $row->prize_pool),
		'total_team' => set_value('total_team', $row->total_team),
		'join_team' => set_value('join_team', $row->join_team),
		'entry' => set_value('entry', $row->entry),
		'contest_description' => set_value('contest_description', $row->contest_description),
		'contest_note1' => set_value('contest_note1', $row->contest_note1),
		'contest_note2' => set_value('contest_note2', $row->contest_note2),
		'match_id' => set_value('match_id', $row->match_id),
		//'type' => set_value('type', $row->type),
	    );
            $data['matchs'] = $this->Contest_model->match_list();
			$this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('contest/contest_form', $data);
				$this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contest'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('contest_id', TRUE));
        } else {
            $data = array(
		'contest_name' => $this->input->post('contest_name',TRUE),
		'contest_tag' => $this->input->post('contest_tag',TRUE),
		'winners' => $this->input->post('winners',TRUE),
		'prize_pool' => $this->input->post('prize_pool',TRUE),
		'total_team' => $this->input->post('total_team',TRUE),
		'join_team' => $this->input->post('join_team',TRUE),
		'entry' => $this->input->post('entry',TRUE),
		'contest_description' => $this->input->post('contest_description',TRUE),
		'contest_note1' => $this->input->post('contest_note1',TRUE),
		'contest_note2' => $this->input->post('contest_note2',TRUE),
		'match_id' => $this->input->post('match_id',TRUE),
		//'type' => $this->input->post('type',TRUE),
	    );

            $this->Contest_model->update($this->input->post('contest_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('contest'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Contest_model->get_by_id($id);

        if ($row) {
            $this->Contest_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('contest'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contest'));
        }
    }

    public function winning_information()
    {
        $id = $this->uri->segment('3');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'contest/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'contest/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'contest/index.html';
            $config['first_url'] = base_url() . 'contest/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Contest_model->total_rows_contest($q , $id);
        $contest = $this->Contest_model->get_limit_data_contest($config['per_page'], $start, $q ,$id);

       // echo $this->db->last_query();die();
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'winning_data' => $contest,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
            $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('contest/winning_information_list', $data);
            $this->load->view('../modules/loggedin_template/footer');
    }

    public function winnig_information_create()
    {
        $id = $this->uri->segment('3');
        $data['contest_name'] = $id ;   
        $data = array(
            'button' => 'Create',
            'action' => site_url('contest/winnig_information_data/'.$id),
        'winning_info_id' => set_value('winning_info_id'),
        'contest_id' => set_value('contest_id'),
        'from_rank' => set_value('from_rank'),
        'to_rank' => set_value('to_rank'),
        'price' => set_value('price'),
    );

       // $data['contests'] = $this->Contest_model->get_all();
        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('contest/winnig_information_form', $data);
            $this->load->view('../modules/loggedin_template/footer',$data);
    }

    public function winnig_information_data()
    {
        $this->set_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->winnig_information_create();
        } else {
           $from_rank =  $this->input->post('from_rank',TRUE);
           $to_rank =  $this->input->post('to_rank',TRUE);
           
           if($from_rank == 0)
           {
               $rank = $to_rank;
           }
           else
           {
               $rank = $from_rank."-".$to_rank;
           }

           
            $data = array(
        'contest_id' => $this->input->post('contest_name',TRUE),
        'from_rank' =>$from_rank ,
        'to_rank' =>$to_rank ,
        'rank' => $rank,
        'price' => $this->input->post('price',TRUE),
        );
            $id = $this->input->post('contest_name',TRUE);
            

            $this->Contest_model->insert_winnig($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('contest/winning_information/'.$id));
        }
    }

    public function winnig_information_read($id)
    {        
        $row = $this->Contest_model->get_winninginfo_by_id($id);
        if ($row) {
            $data = array(
        'contest_id' => $row->contest_id,
        'rank' => $row->rank,
        'price' => $row->price,
        );
            $this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('contest/winnig_information_read', $data);
                $this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contest'));
        }
    }

    public function winnig_information_update($id) 
    {
        $row = $this->Contest_model->get_winninginfo_by_id($id);
        if ($row) {


            $data = array(
                'button' => 'Update',
                'action' => site_url('contest/winnig_information_update_data'),
        'contest_id' => set_value('contest_id', $row->contest_id),
        'from_rank' => set_value('rank', $row->from_rank),
        'to_rank' => set_value('rank', $row->to_rank),
        'price' => set_value('price', $row->price),
        'winning_info_id'=>set_value('winning_info_id', $row->winning_info_id),
        );
            $this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('contest/winnig_information_form', $data);
                $this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');

            redirect(site_url('contest/winnig_information_update/'.$id));
        }
    }

    public function winnig_information_update_data() 
    {
        $this->set_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->winnig_information_update($this->input->post('winning_info_id', TRUE));
        } else {
            $from_rank =  $this->input->post('from_rank',TRUE);
           $to_rank =  $this->input->post('to_rank',TRUE);

          if($from_rank == 0)
           {
               $rank = $to_rank;
           }
           else
           {
               $rank = $from_rank."-".$to_rank;
           }
          
            $data = array(
        'price' => $this->input->post('price',TRUE),
        'from_rank' => $from_rank,
        'to_rank'=>$to_rank,
        'rank'=>$rank,
        );
            //print_r($data);die();
            $this->Contest_model->update_winninginfo($this->input->post('winning_info_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('contest/winning_information/'.$this->input->post('contest_id', TRUE)));
        }
    }

    public function winnig_information_delete($id) 
    {
        $contest_id = $this->uri->segment('4');

        $row = $this->Contest_model->get_winninginfo_by_id($id);

        if ($row) {
            $this->Contest_model->winninginfo_delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('contest/winning_information/'.$contest_id));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contestwinning_information/'.$contest_id));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('contest_name', 'contest name', 'trim|required');
	$this->form_validation->set_rules('contest_tag', 'contest tag', 'trim|required');
	$this->form_validation->set_rules('winners', 'winners', 'trim|required');
	$this->form_validation->set_rules('prize_pool', 'prize pool', 'trim|required');
	$this->form_validation->set_rules('total_team', 'total team', 'trim|required');
	$this->form_validation->set_rules('join_team', 'join team', 'trim|required');
	$this->form_validation->set_rules('entry', 'entry', 'trim|required');
	$this->form_validation->set_rules('contest_description', 'contest description', 'trim|required');
	$this->form_validation->set_rules('contest_note1', 'contest note1', 'trim|required');
	$this->form_validation->set_rules('contest_note2', 'contest note2', 'trim|required');
	$this->form_validation->set_rules('match_id', 'match id', 'trim|required');
	//$this->form_validation->set_rules('type', 'type', 'trim|required');

	$this->form_validation->set_rules('contest_id', 'contest_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function  set_rules()
    {
        
    $this->form_validation->set_rules('from_rank', 'From Rank', 'trim|required');
    $this->form_validation->set_rules('to_rank', 'to Rank', 'trim|required');

    $this->form_validation->set_rules('price', 'price', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
