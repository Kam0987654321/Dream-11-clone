<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Old_match extends MY_Controller {
   
   public function __construct() 
   {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('match_model');
        $this->load->model('user_model');
        $this->load->model('transaction_model');
        $this->load->model('missing_player_details_model');
        $this->load->model('match_players_model');
        $this->load->model('contest_model');
        $this->load->model('team_model');
        
   }

  public function index()
  {
      $data['match_data'] = $this->match_model->get_match_by_match_status('Result');
      $this->load->view('../modules/loggedin_template/header',$data);
      $this->load->view('old_match/old_match_list',$data);
      $this->load->view('../modules/loggedin_template/footer',$data);
  }


   public function teams_list($id)
   {
      $matchid = $this->uri->segment('3');
      $data['total_teams'] = $this->match_model->total_team_join($matchid);
      //echo "<pre>";print_r($data);die();
      //echo $this->db->last_query();die();
      $this->load->view('../modules/loggedin_template/header',$data);
      $this->load->view('old_match/old_match_team_list');
      $this->load->view('../modules/loggedin_template/footer');
   }
  
      
  
    
  

}
