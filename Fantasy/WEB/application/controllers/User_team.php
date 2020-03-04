<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_team extends MY_Controller {

  public function __construct() 
   {
        parent::__construct();
        $this->load->model('user_team_model');
        $this->load->model('players_model');
         $this->load->library('form_validation');
   }

  public function team()
  {  
    $id = $this->uri->segment('3');

    $data['team_data'] = $this->user_team_model->get_all($id);
    $this->load->view('../modules/loggedin_template/header',$data);
    $this->load->view('user_team/team_list');
    $this->load->view('../modules/loggedin_template/footer');
    
  }

   public function edit_team()
  {
    $player_id = $this->uri->segment('3');
    $team_id = $this->uri->segment('4');

    $data = array();
    $match_id = $this->user_team_model->getmatch($team_id);

    /*echo $this->db->last_query();die();
    */
    //echo "<pre>"; print_r($data['players']);die();

    $players = $this->user_team_model->get_match_players($match_id['match_id']);

    $data = array(
            'button' => 'Update',
            'action' => site_url('user_team/update_action'),
      'player_id' => set_value($player_id),
      'players'=>$players,

     
     );

    $this->load->view('../modules/loggedin_template/header',$data);
    $this->load->view('user_team/update_player',$data);
    $this->load->view('../modules/loggedin_template/footer');

  }

  public function update_action()
  {
    $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit_team();
        }
        else
        {
         
          $newplayer = $this->input->post('player',TRUE);
          $editplayer = $this->input->post('player_id',TRUE);
          $team_id = $this->input->post('team_id',TRUE);


         $status =  $this->user_team_model->get_match_players_status($newplayer);

         $data = array('player_id'=>$status['id'],
                      'designationid'=>$status['designationid']
       );

         //print_r($data);die();
         $this->db->where('id',$editplayer);
         $this->db->update('my_team_player',$data);

         $this->session->set_flashdata('message', 'Record update successfully');
         redirect(site_url('user_team/team/'.$team_id));


        }
  }

   public function  _rules()
    {
        
    $this->form_validation->set_rules('player', 'Select Player', 'trim|required');    
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
