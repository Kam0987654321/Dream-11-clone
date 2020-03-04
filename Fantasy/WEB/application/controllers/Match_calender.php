<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Match_calender extends MY_Controller
{
    public $token = '';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Match_calender_model');
        $this->load->library('form_validation');
    }
    

    public function index()
    {
    	
    
      $api_url  =  "https://rest.entitysport.com/v2/matches/?status=1&token=".$this->token."&per_page=10";
    // $api_url = "https://cricapi.com/api/matchCalendar?apikey=".$this->token."";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$api_url);
        $result=curl_exec($ch);
        curl_close($ch);
        $cricketMatches= json_decode(json_encode(json_decode($result)), True); //json_decode($result); 
        
        // var_dump($cricketMatches);
        // die();
        foreach($cricketMatches as $matchs) { 
            foreach ($matchs as $items) {
            foreach ($items as $item) {
              //  echo "<pre>"; print_r($item);die;
                if($item['title'] !="TBA vs TBA"){
                if($item['format_str'] ==="Test" or $item['format_str'] ==="T20I" or $item['format_str'] ==="T20" or $item['format_str'] ==="ODI")
                {    
                $date = new DateTime($item['date_start'], new DateTimeZone('GMT'));
                $date->setTimezone(new DateTimeZone('Asia/Kolkata'));
                $time1 = $date->format('Y-m-d H:i:s');
                $time = date('Y-m-d H:i:s');      
                $afterdate = date( "Y-m-d H:i:s", strtotime( "+10 days"));
                if($afterdate >= $time1)
                {
                    if($item['teama']['team_id'] !="")
                    {

                        $team1 = $this->db->get_where('team',array('unique_id'=>$item['teama']['team_id']))->row();
                        if($team1 !="")
                        {
                            $team1id = $team1->team_id;
                        } 
                        else
                        {
                            if($item['teama']['logo_url'] !="")
                            {
                               $logo_url = $item['teama']['logo_url'];
                            }    
                            else 
                            {    
                                $logo_url =  base_url('uploads/team_default.png');
                            } 

                            $data = array('team_name' =>$item['teama']['name'],
                                'unique_id'=>$item['teama']['team_id'],
                                'team_short_name' =>$item['teama']['short_name'],
                                'team_image'=>$logo_url,
                                    );

                            $this->db->insert('team',$data);
                            $team1id =$this->db->insert_id();
                        }   
                         
                    }
                    if($item['teamb']['team_id'] !="")
                    {

                        $team2 = $this->db->get_where('team',array('unique_id'=>$item['teamb']['team_id']))->row();
                        if($team2 !="")
                        {
                            $team2id = $team2->team_id;
                        } 
                        else
                        {
                            if($item['teamb']['logo_url'] !="")
                            {
                               $logo_url = $item['teamb']['logo_url'];
                            }    
                            else 
                            {    
                                $logo_url =  base_url('uploads/team_default.png');
                            } 

                            $data = array('team_name' =>$item['teamb']['name'],
                                'unique_id'=>$item['teamb']['team_id'],
                                'team_short_name' =>$item['teamb']['short_name'],
                                'team_image'=>$logo_url,
                                    );

                            $this->db->insert('team',$data);
                            $team2id =$this->db->insert_id();
                        }   
                         
                    }

                    if($time1 > $time)
                    {
                        $match_status ="Fixture";
                        $timespell = $time1;
                    }
                    else if($item['winner_team'] !="" && $item['matchStarted'] =="1")
                    {
                        $match_status ="Result";
                        $timespell = "0000-00-00 00:00:00";
                    }    
                    else if($item['winner_team'] =="" && $item['matchStarted'] =="1")
                    {
                        $match_status ="Live";
                        $timespell = "0000-00-00 00:00:00";
                    } 



                    $data = array('unique_id' =>$item['match_id'],
                                    'competition_id'=>$item['competition']['cid'],
                                    'teamid2' =>$team2id,
                                    'teamid1' =>$team1id,
                                    'type' =>$item['format_str'],
                                    // 'squad' =>$item['squad'],
                                    //'toss_winner_team' =>$item['toss_winner_team'],
                                    'title'=> $item['title'],
                                    'time'=>$timespell,
                                    'match_status'=> $match_status,
                                    //'winner_team' =>$item['winner_team'],
                                   // 'matchStarted' =>$item['matchStarted'],
                                    'created_date'=>$time,
                                    'match_date_time'=>$time1,
                                );

                    if(!empty($item['match_id']) && !empty($item['teama']['team_id']) && !empty($item['teamb']['team_id']))
                    {
                        $match_result =  $this->Match_calender_model->get_by_unique_id($item['match_id']);
                        if($match_result =="")
                        {
                            $m_id =  $item['match_id'];
                            $api_url  = "https://rest.entitysport.com/v2/matches/".$m_id."/squads?token=".$this->token."";
                            // $api_url = "https://cricapi.com/api/fantasySquad?apikey=".$this->token."&unique_id=".$m_id."";
                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_URL,$api_url);
                                $result=curl_exec($ch);
                                curl_close($ch);
                                $teamplayers_data= json_decode(json_encode(json_decode($result)), True);

                                $count_teama = count($teamplayers_data['response']['teama']['squads']);
                                $count_teamb = count($teamplayers_data['response']['teamb']['squads']);
                            if($count_teama > 0 && $count_teamb > 0){
                            $id =  $this->Match_calender_model->insert($data);
                            $contests =  $this->db->get('contest_defalut')->result_array();

                            foreach ($contests as $contest) {
                                    $array = array('contest_name' =>$contest['contest_name'],
                                                'contest_tag' =>$contest['contest_tag'],
                                                'winners' =>$contest['winners'],
                                                'prize_pool' =>$contest['prize_pool'],
                                                'total_team' =>$contest['total_team'],
                                                'join_team' =>$contest['join_team'],
                                                'entry' =>$contest['entry'],
                                                'contest_description' =>$contest['contest_description'],
                                                'contest_note1' =>$contest['contest_note1'],
                                                'contest_note2' =>$contest['contest_note2'],
                                                'winning_note' =>$contest['winning_note'],
                                                'type' =>$contest['type'],
                                                'match_id'=>$id,
                                            );
                                    $this->db->insert('contest',$array);
                                    $contest_last_id = $this->db->insert_id();

                                    $winnings =  $this->db->get_where('winning_information_default',array('contest_id'=>$contest['contest_id']))->result_array();
                                    foreach ($winnings as $winning) {
                                               $winning_data = array('contest_id' => $contest_last_id,
                                                    'rank' =>$winning['rank'],
                                                    'from_rank' =>$winning['from_rank'],
                                                    'to_rank' =>$winning['to_rank'],
                                                    'price' =>$winning['price'],
                                                );
                                               $this->db->insert('winning_information',$winning_data);
                                    }
                                
                            }
                          
                            
                                $match = $this->Match_calender_model->get_by_id($id);
                              
                              $api_url  = "https://rest.entitysport.com/v2/matches/".$match->unique_id."/squads?token=".$this->token."";
                                // $api_url = "https://cricapi.com/api/fantasySquad?apikey=".$this->token."&unique_id=".$match->unique_id."";
                                $ch = curl_init();
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_URL,$api_url);
                        $result=curl_exec($ch);
                        curl_close($ch);
                        $teamplayers= json_decode(json_encode(json_decode($result)), True); //json_decode($result);

                        foreach ($teamplayers['response']['teama']['squads'] as $player) {
                          $team_unique_id =  $teamplayers['response']['teama']['team_id'];
                            $teamid = $this->db->get_where('team',array('unique_id'=>$team_unique_id))->row()->team_id;

                             $api_url  = "https://rest.entitysport.com/v2/players/".$player['player_id']."?token=".$this->token."";
                            // $api_url="https://cricapi.com/api/playerFinder?apikey=".$this->token."&pid=".$player['player_id']."";
                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_URL,$api_url);
                                $result=curl_exec($ch);
                                curl_close($ch);
                                $playerdetal= json_decode(json_encode(json_decode($result)), True);

                               $player_detail = $playerdetal['response']['player'];

                               $pid = $player_detail['pid'];

                                $playerid = $this->db->get_where('players',array('pid' =>$pid))->row();

                                if($player_detail['playing_role'] =="bowl")
                                {
                                    $role = "2";
                                }
                                else if($player_detail['playing_role'] =="bat")
                                {
                                    $role = "1";
                                }
                                else if($player_detail['playing_role'] =="wkbat")
                                {
                                    $role = "4";
                                }
                                else if($player_detail['playing_role'] =="wk")
                                {
                                    $role = "4";
                                }
                                else
                                {
                                    $role = "3";
                                }

                                
                             if($playerid =="")
                            {
                                $playerinfo = array(
                                        'bats' =>$player_detail['batting_style'],
                                        'bowls' =>$player_detail['bowling_style'],
                                        'dob' =>$player_detail['birthdate'],
                                        'name' =>$player_detail['title'],
                                        'nationality' =>$player_detail['nationality'],
                                        'pid' =>$player_detail['pid'],
                                        'credit_points'=>$player_detail['fantasy_player_rating'],
                                        'designationid' =>$role,
                                        'created_date'=>$time,
                                        'teamid'=>$teamid,
                                    );

                                    $this->db->insert('players',$playerinfo);
                                    $p_id = $this->db->insert_id();

                                    $info =  $this->db->get_where('players',array('id'=>$p_id))->row();
                                    $m_player = array('matchid' =>$id,
                                                'teamid'=>$info->teamid,
                                                'playerid'=>$info->id,
                                                'designationid'=>$info->designationid,
                                                'created_date'=>$time,
                                    );
                                    $this->db->insert('match_players',$m_player);
                            }   
                            else
                            {
                                $m_player = array('matchid' =>$id,
                                                'teamid'=>$playerid->teamid,
                                                'playerid'=>$playerid->id,
                                                'designationid'=>$playerid->designationid,
                                                'created_date'=>$time,
                                    );
                                    $this->db->insert('match_players',$m_player);
                            } 
                        }

                        foreach ($teamplayers['response']['teamb']['squads'] as $player) {
                          $team_unique_id =  $teamplayers['response']['teamb']['team_id'];
                            $teamid = $this->db->get_where('team',array('unique_id'=>$team_unique_id))->row()->team_id;

                             $api_url  = "https://rest.entitysport.com/v2/players/".$player['player_id']."?token=".$this->token."";
                            // $api_url="https://cricapi.com/api/playerFinder?apikey=".$this->token."&pid=".$player['player_id']."";
                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_URL,$api_url);
                                $result=curl_exec($ch);
                                curl_close($ch);
                                $playerdetal= json_decode(json_encode(json_decode($result)), True);

                               $player_detail = $playerdetal['response']['player'];

                               $pid = $player_detail['pid'];

                                $playerid = $this->db->get_where('players',array('pid' =>$pid))->row();

                                if($player_detail['playing_role'] =="bowl")
                                {
                                    $role = "2";
                                }
                                else if($player_detail['playing_role'] =="bat")
                                {
                                    $role = "1";
                                }
                                else if($player_detail['playing_role'] =="wkbat")
                                {
                                    $role = "4";
                                }
                                else if($player_detail['playing_role'] =="wk")
                                {
                                    $role = "4";
                                }
                                else
                                {
                                    $role = "3";
                                }

                                
                             if($playerid =="")
                            {
                                $playerinfo = array(
                                        'bats' =>$player_detail['batting_style'],
                                        'bowls' =>$player_detail['bowling_style'],
                                        'dob' =>$player_detail['birthdate'],
                                        'name' =>$player_detail['title'],
                                        'nationality' =>$player_detail['nationality'],
                                        'pid' =>$player_detail['pid'],
                                        'credit_points'=>$player_detail['fantasy_player_rating'],
                                        'designationid' =>$role,
                                        'created_date'=>$time,
                                        'teamid'=>$teamid,
                                    );

                                    $this->db->insert('players',$playerinfo);
                                    $p_id = $this->db->insert_id();

                                    $info =  $this->db->get_where('players',array('id'=>$p_id))->row();
                                    $m_player = array('matchid' =>$id,
                                                'teamid'=>$info->teamid,
                                                'playerid'=>$info->id,
                                                'designationid'=>$info->designationid,
                                                'created_date'=>$time,
                                    );
                                    $this->db->insert('match_players',$m_player);
                            }   
                            else
                            {
                                $m_player = array('matchid' =>$id,
                                                'teamid'=>$playerid->teamid,
                                                'playerid'=>$playerid->id,
                                                'designationid'=>$playerid->designationid,
                                                'created_date'=>$time,
                                    );
                                    $this->db->insert('match_players',$m_player);
                            } 
                        }
                               
                    }

                }

                        // Update match table
                        // else
                        // {

                        // }    
                    }    

                }
                } // After date over

               } 
           }
                  
            }
        } 
    }
}
