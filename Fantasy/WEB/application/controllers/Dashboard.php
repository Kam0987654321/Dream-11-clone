<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
   
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
        $data = array();
        $data['js_script'] = 'dashboard_admin';
        $data['title'] = 'Dashboard';
        $data['csrfName'] = '';
        $data['title'] = 'Dashboard';
        $data['upcoming_matches'] = $this->match_model->get_match_by_match_status('Fixture');
        $data['result_matches'] = $this->match_model->get_match_by_match_status('Result','desc',5);
        $data['Live_matches'] = $this->match_model->get_match_by_match_status('Live');
        //$data['leaderboard'] = $this->match_model->get_leaderboard_details();
        $data['csrfName'] = $this->security->get_csrf_token_name();
        $data['csrfHash'] = $this->security->get_csrf_hash();
        $total_contest = $this->contest_model->get_all();
        $data['total_contest'] =    count($total_contest);
        $data['total_sales'] = $this->transaction_model->count_debit_transaction();

        $data['total_usresjoin'] = $this->match_model->get_usersjoin_count();
        $data['join_members'] = $this->user_model->count_users();
        $data['today_match'] = $this->match_model->get_today_match();
        
        $upcoming_live_matches = $this->match_model->upcomming_live_matches();
        $j=1;
        foreach($upcoming_live_matches as $match)
        {
            ///$match->teamid1
            $missing_player_details = $this->missing_player_details_model->get_by_teamid(17);
           //  echo $this->db->last_query();
            // print_r($missing_player_details);
      
            $missing_player_team1=array();
         
            foreach($missing_player_details as $player1)
            {
                $missing_player_team1[]=$player1->playerid;        
            }
            $missing_player_details2 = $this->missing_player_details_model->get_by_teamid(18);
            $missing_player_team2=array();
            foreach($missing_player_details2 as $player2)
            {
                $missing_player_team2[]=$player2->playerid;        
            }
           
            $get_players_by_matchid = $this->match_players_model->get_players_by_matchid(13);
          
            $flag = 0;
             $missing_player =array();
            foreach($get_players_by_matchid as $player){
            
                if(in_array($player->playerid,$missing_player_team1)){
                    $flag=1;
                    $missing_player []=$player->playerid;
                }
                if(in_array($player->playerid,$missing_player_team2)){
                    $flag=1;
                    $missing_player []=$player->playerid;
                }
            }
            
            if($flag==0){
                unset($match);
            }else{
                if($j>=5){
                    continue;
                }
                $match->is_problem=$flag;
                $match->problem_array=implode(',',$missing_player);
                $j++;
            }
        }
        //print_r($upcoming_live_matches);
        $data['upcoming_matches']=$upcoming_live_matches;
        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('dashboard/dashboard',$data);
        $this->load->view('../modules/loggedin_template/footer',$data);
	}
	
    	
	
    public function match_dashboard(){
        $data = array();
        $matchid = $this->uri->segment('3');
        $data['match_record'] =$this->match_model->get_by_id($matchid);
        $toss_winner_team =$data['match_record']->toss_winner_team;
        $data['toss_winner'] =$this->team_model->get_by_unique_id($toss_winner_team);
        $data['total_teams'] =$this->match_model->total_team_join($matchid);
        $data['total_team'] = count($data['total_teams']);
        $data['Topranks'] =$this->match_model->get_toprank($matchid);
        $contests =$this->contest_model->get_contest_by_match($matchid);
        $data['contests'] = count($contests);
        $data['user_count'] = $this->match_model->get_userjoin_count($matchid);
        $this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('dashboard/match_dashboard',$data);
        $this->load->view('../modules/loggedin_template/footer',$data);
    	        
    }	
	

}
