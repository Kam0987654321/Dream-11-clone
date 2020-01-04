<?php
class Website_model extends CI_Model 
{
    //API for insert data
    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        $last_id =  $this->db->insert_id();
        if($last_id)
        {
            return $last_id;
        }   
        else
        {
            return false;
        }   

    }

    public function login_check_number_verifydone($email)
    {
        $this->db->select('user_id,mobile');
        $this->db->where(" (mobile ='".$email."' OR email='".$email."') ");
        $this->db->where('verify' ,'1');  
        $resp = $this->db->get('registration')->num_rows();
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }    

    }

     public function login_check_verifydone($request,$otp)
    {
        $this->db->select('user_id,name,mobile,email,type,verify,referral_code');
        $this->db->from('registration');
        $this->db->where(" (mobile ='".$request['mobile']."' OR email='".$request['mobile']."') ");
        $this->db->where('otp' ,$otp);            
        $resp = $this->db->get()->row_array();
        if($resp !="")
         {
           return $resp;
         }   
         else
         {
            return false;
         }
    }

    //API for login
    public function login($request)
    {
        $this->db->select('user_id,name,mobile,email,type,verify,referral_code');
        $this->db->from('registration');
        $this->db->where(" (mobile ='".$request['mobile']."' OR email='".$request['mobile']."') ");
        $this->db->where('password' ,md5($request['password']));            
        $resp = $this->db->get()->row_array();
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    public function login_check_verify($request)
    {
        $this->db->select('user_id,name,mobile,email,type,verify,referral_code');
        $this->db->from('registration');
        $this->db->where(" (mobile ='".$request['mobile']."' OR email='".$request['mobile']."') ");
        $this->db->where('verify' ,'1');            
        $resp = $this->db->get()->row_array();
        if($resp !="")
         {
           return $resp;
         }   
         else
         {
            return false;
         }
    }

    //API for get referral code and user id 
    public function referral_code($code)
    {
        $this->db->select('referral_code,user_id');
        $this->db->where('referral_code',$code);
        $code = $this->db->get('registration')->row_array();
        if($code !="")
        {
            return $code;
        }    
        else
        {
            return false;
        }    
    }

    //API for chcek email
    public function check_email($email)
    {
        $this->db->where('email',$email);
        $code = $this->db->get('registration')->row_array();
        if($code !="")
        {
            return $code;
        }    
        else
        {
            return false;
        }    
    }

     //API for chcek mobile number
    public function check_mobile($mobile)
    {
        $this->db->where('mobile',$mobile);
        $code = $this->db->get('registration')->num_rows();
        if($code !="")
        {
            return $code;
        }    
        else
        {
            return false;
        }    
    }

     //API for get join match by user id
    public function join_match($status,$user_id)
    {
        $this->db->select('*');
        $this->db->where('match_status',$status);
        $this->db->where('user_id',$user_id);
        $this->db->group_by('match_id');
        $this->db->order_by('time','asc');
        $result = $this->db->get('my_match')->result_array();
        if($result !="")
        {
            return $result;
        }    
        else
        {
            return false;
        }    

    }

    public function check_otp($data)
    {
        $this->db->select('user_id');
        $this->db->where('otp',$data['otp']);
        $this->db->where('mobile',$data['mobile']);
        $resp = $this->db->get('registration')->row_array();
        if($resp)
        {
            $arra = array('verify' =>1);
            $this->db->where('mobile',$data['mobile']);
            $update =  $this->db->update('registration',$arra);
            if($update)
            {
                $this->db->select('user_id');
                $this->db->where('mobile',$data['mobile']);
                return $this->db->get('registration')->row_array();
            }    
        }
        else
        {
            return false;
        }    
            
    }

     // API for get team name by id
    public function get_user_by_id($id)
    {
        $this->db->select('user_id,mobile');
        $this->db->where('user_id',$id);
        $team = $this->db->get('registration')->row_array();
        if($team !="")
        {
            return $team;
        }    
        else
        {
            return false;
        }    
    }

    // API for get team name by id
    public function get_team_by_id($id)
    {
        $this->db->where('team_id',$id);
        $team = $this->db->get('team')->row_array();
        if($team !="")
        {
            return $team;
        }    
        else
        {
            return false;
        }    
    }

    //API for get information for user by id
    public function get_by_id($id)
    {
        $this->db->where('user_id',$id);
        $user = $this->db->get('registration')->row_array();
        if($user !="")
        {
            return $user;
        }    
        else
        {
            return false;
        }    
    }

    // API for get all state
    public function get_all_states()
    {
        $this->db->where('country_id',101);
        $user = $this->db->get('states')->result_array();
        if($user !="")
        {
            return $user;
        }    
        else
        {
            return false;
        }    
    }

    // API for get all state
    public function get_all_citys()
    {
        $user = $this->db->get('cities')->result_array();
        if($user !="")
        {
            return $user;
        }    
        else
        {
            return false;
        }    
    }

    //API for get city by state id
    public function get_city_by_stateid($id)
    {
        $this->db->from('cities');
        $this->db->where('state_id',$id);
        $query= $this->db->get();
        $result = $query->result_array();
        $options= "<option value=''>Select City</option>";
        foreach ($result as $key => $value) {
            $options .="<option value = ".$value['id'].">".$value['name']."</option>";
        }
        return $options;
    }

    // API for update
    public function update($table, $where , $data)
    {
        $this->db->where($where);
       return $this->db->update($table, $data);        
    }

    // API for match list
    public function match($where)
    {
        $this->db->where('match_status',$where);
        $match = $this->db->get('match')->result_array();   
        if(count($match) >0)
        {
            return $match;
        }     
        else
        {
            return false;
        }    
    }

    // API for user join  match list 
    public function user_join_matches($user_id)
    {
        $this->db->select('match.match_id,match.title');
        $this->db->from('my_match');
        $this->db->where('my_match.user_id',$user_id);
        $this->db->where('match.match_status','Live');
        $this->db->or_where('match.match_status','Result');
        $this->db->join('match', 'my_match.match_id = match.match_id');
        $this->db->group_by('my_match.match_id');
        $this->db->order_by('match.match_id','desc');
        $resp = $this->db->get()->result_array();

        if(count($resp) > 0)
        {
            return $resp;
        }    
        else
        {
            return false;
        }  
    }

    public function get_leaderboard_data_session_user($id, $user_id)
    {
        $this->db->select('*');
        $this->db->where('matchid',$id);
        $this->db->where('user_id',$user_id);
        $this->db->order_by('rank','desc');
        $result = $this->db->get('leaderboard')->result_array();
        if($result !="")
        {
            return $result;
        }    
        else
        {
            return false;
        }    
    } 

    public function get_leaderboard_data_non_session_user($id, $user_id)
    {
        $this->db->select('*');
        $this->db->where('matchid',$id);
        $this->db->where('user_id !=',$user_id);
        $this->db->order_by('rank','desc');
        $result = $this->db->get('leaderboard')->result_array();
        if($result !="")
        {
            return $result;
        }    
        else
        {
            return false;
        }    
    } 

    public function all_transaction($user_id)
    {
        $this->db->select('*');
        $this->db->where('user_id',$user_id);
        $this->db->order_by('id','desc');
        $result = $this->db->get('transection')->result_array();
        if($result !="")
        {
            return $result;
        }    
        else
        {
            return false;
        }
    } 

    public function withdrawl_list($user_id)
    {
        $this->db->select('*');
        $this->db->where('user_id',$user_id);
        $this->db->where('type','winning_debit');
        $this->db->where('transection_mode','self withdrawal');
        $this->db->order_by('id','desc');
        $result = $this->db->get('transection')->result_array();
        if($result !="")
        {
            return $result;
        }    
        else
        {
            return false;
        }
    }


 public function match_details($id)
    {
        $this->db->select('t1.team_image as t1_image,t1.team_short_name as t1_sname,t2.team_image as t2_image,t2.team_short_name as t2_sname,match.*');
        $this->db->where('match_id',$id);
        $this->db->from('match');
        $this->db->join('team as t1','match.teamid1=t1.team_id');
        $this->db->join('team as t2','match.teamid2=t2.team_id');
        $match = $this->db->get()->row_array();   
        if(count($match) >0)
        {
            return $match;
        }     
        else
        {
            return false;
        }    
    }

    public function get_match_contest($id){
        $this->db->where('match_id',$id);
        $match = $this->db->get('contest')->result_array();   
        //echo $this->db->last_query();
        if(count($match) >0)
        {
            return $match;
        }     
        else
        {
            return false;
        }    
    }


    public function get_match_scott($id,$designation)
    {
        $this->db->select('t1.team_short_name,match_players.*,designation.image as dimage,players.*');
        $this->db->where('match_players.matchid',$id);
        $this->db->where('match_players.designationid',$designation);
        $this->db->from('match_players');
        $this->db->join('team as t1','match_players.teamid=t1.team_id');
        $this->db->join('designation','match_players.designationid=designation.id');
         $this->db->join('players','players.id=match_players.playerid');
         $this->db->order_by('players.credit_points','desc');
        $match = $this->db->get();
        $match = $match->result_array();
        if(count($match) >0)
        {
            return $match;
        }     
        else
        {
            return false;
        }    
    }

    // API for select sum of amount credited by user
    public function credit_amount($user_id)
    {
        $this->db->select_sum('amount');
        $this->db->where('user_id',$user_id);
        $this->db->where('type','credit');
        $this->db->where('transaction_status','TXN_SUCCESS');               
        $resp = $this->db->get('transection')->row()->amount;
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    // API for select sum of amount debited by user
    public function debit_amount($user_id)
    {
        $this->db->select_sum('amount');
        $this->db->where('user_id',$user_id);
        $this->db->where('type','debit');       
        $resp = $this->db->get('transection')->row()->amount;
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    // API for select sum of amount bonus by user
    public function bonus_amount($user_id)
    {
        $this->db->select_sum('amount');
        $this->db->where('user_id',$user_id);
        $this->db->where('type','bonus');       
        $resp = $this->db->get('transection')->row()->amount;
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    // API for select sum of amount bonus by user
    public function bonus_amount_debit($user_id)
    {
        $this->db->select_sum('amount');
        $this->db->where('user_id',$user_id);
        $this->db->where('type','bonus_debit');       
        $resp = $this->db->get('transection')->row()->amount;
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }


    // API for select sum of amount bonus by user
    public function winning_amount($user_id)
    {
        $this->db->select_sum('amount');
        $this->db->where('user_id',$user_id);
        $this->db->where('type','winning');       
        $resp = $this->db->get('transection')->row()->amount;
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    // API for select sum of amount bonus by user
    public function winning_amount_debit($user_id)
    {
        $this->db->select_sum('amount');
        $this->db->where('user_id',$user_id);
        $this->db->where('type','winning_debit');       
        $resp = $this->db->get('transection')->row()->amount;
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }


    public function get_where($where,$table)
    {
        $this->db->select('*');
        $this->db->where($where);
        $resp = $this->db->get($table)->row_array();
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    public function pointsystem()
    {
        $query = $this->db->get('points_distribution_rules');
        return $query->result();
        
    }

    /*public function winning_info($where)
    {
        $this->db->select('*');
        $this->db->where($where);
        $resp = $this->db->get('winning_information')->result_array();
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }*/

     public function get_all_result($table)
    {
        $this->db->select('*');
        $resp = $this->db->get($table)->result_array();
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

     public function get_where_result($where,$table)
    {
        $this->db->select('*');
        $this->db->where($where);
        $resp = $this->db->get($table)->result_array();
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }


    public function get_where_session_user_result()
    {
        $this->db->select('*');
        $this->db->where($where);
        $this->db->order_by('rank','asc');
        $resp = $this->db->get($table)->result_array();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

   

    public function winning_info($where)
    {
        $this->db->select('*');
        $this->db->where($where);
        $resp = $this->db->get('winning_information')->result_array();
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    public function contest_leaderboard_session_user($where1,$table1,$user_id)
    {
        $this->db->select('*');
        $this->db->where($where);
        $resp = $this->db->get($table)->result_array();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }


    public function get_where_session_user_result_data($user_id,$where1,$table1)
    {
        $this->db->select('*');
        $this->db->where($where1);
        $this->db->where('user_id',$user_id);
        $this->db->order_by('rank','asc');
        $resp = $this->db->get($table1)->result_array();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    public function get_where_non_session_user_result_data($user_id,$where1,$table1)
    {
        $this->db->select('*');
        $this->db->where($where1);
        $this->db->where('user_id !=',$user_id);
        $this->db->order_by('rank','asc');
        $resp = $this->db->get($table1)->result_array();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    public function get_where_session($where1,$table1,$user_id)
    {
        $this->db->select('*');
        $this->db->where($where1);
        $this->db->where('user_id',$user_id);
        //$this->db->order_by('rank','asc');
        $resp = $this->db->get($table1)->result_array();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    public function get_where_nonsession($where1,$table1,$user_id)
    {
        $this->db->select('*');
        $this->db->where($where1);
        $this->db->where('user_id !=',$user_id);
        //$this->db->order_by('rank','asc');
        $resp = $this->db->get($table1)->result_array();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }


    public function team_count($id,$user_id)
    {
        $this->db->where('match_id',$id);
        $this->db->where('user_id',$user_id);
        $count = $this->db->get('my_team')->num_rows();
        if($count !="")
        {
            return $count;
        }    
        else
        {
            return false;
        }    
    }

    public function get_team_deatils($id,$user_id)
    {
        $this->db->where('match_id',$id);
        $this->db->where('user_id',$user_id);
        $count = $this->db->get('my_team')->result_array();
        if($count !="")
        {
            return $count;
        }    
        else
        {
            return false;
        }    
    }

    public function get_user_team_detils($where,$table,$id)
    {
        $this->db->select('player_id,designationid');
        $this->db->where($where);
        $this->db->where('designationid',$id);
        $team = $this->db->get($table)->result_array();
        if($team !="")
        {
            return $team;
        }    
        else
        {
            return false;
        }    
    }
    
       public function get_user_team_details($where,$table,$id)
    {
        $this->db->select($table.'.player_id,'.$table.'.designationid,players.teamid,');
        $this->db->where($where);
        $this->db->join('players','players.id='.$table.'.player_id');
        $this->db->where($table.'.designationid',$id);
        $team = $this->db->get($table)->result_array();
        if($team !="")
        {
            return $team;
        }    
        else
        {
            return false;
        }    
    }

    public function get_image($id)
    {
        $this->db->select('image');
        $this->db->where('id',$id);
        $resp = $this->db->get('designation')->row_array();
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }


    
    public function checkmail($email){
    $this->db->where('email',$email);
    $this->db->select('email');
    $query = $this->db->get('registration');
    if($query->num_rows() > 0){
      return true; 
    } else {
      return false;
    }
  }

  public function save_forgetpassword_code($forgetpassword_code,$email){
      $data = array(
        'forgetpassword_code' => $forgetpassword_code,
        );
      $this->db->where('email',$email);
      $query = $this->db->update('registration',$data); 
      if($query){
       
        return true;
      } else {
       
        return false;
      }
   }

  public function updatePassword($email,$code,$password){

    $data = array('password' =>md5($password),'forgetpassword_code'=>'');
    $this->db->where('email',$email);
    $this->db->where('forgetpassword_code',$code);
    $update = $this->db->update('registration',$data);
    if($update){
      return true;
    } else {
      return false;
    }
  }


  public function save_team($data1 , $data ,$user_id)
  {
        $this->db->insert('my_team',$data1);
        $last_id = $this->db->insert_id();

        foreach ($data as $player) {

           $this->db->select('designationid,teamid');
           $this->db->where('id',$player);
           $res =  $this->db->get('players')->row();
           $datas = array('designationid' =>$res->designationid,
                        'my_team_id'=>$last_id,
                        'player_id'=>$player,
                        'is_select'=>"1",
                        'user_id'=>$user_id,
                        'created_date'=>date("Y-m-d H:i:s")
                    );

           $this->db->insert('my_team_player',$datas);
        }

        return $last_id;
  }


  /*public function get_team_player($id)
  {
    $this->db->select('designation.short_term,designation.image,players.name,players.credit_points,team.team_short_name');
    $this->db->where('my_team_player.my_team_id',$id);
    $this->db->join('designation', 'designation.id = my_team_player.designationid');
    $this->db->join('players', 'players.id = my_team_player.player_id');
    $this->db->join('team', 'players.teamid = team.team_id');
   return  $this->db->get('my_team_player')->result_array();
  }*/

   public function get_team_player($id)
  {
    $this->db->select('my_team_player.player_id,designation.short_term,designation.image,players.name,players.credit_points,team.team_short_name');
    $this->db->where('my_team_player.my_team_id',$id);
    $this->db->join('designation', 'designation.id = my_team_player.designationid');
    $this->db->join('players', 'players.id = my_team_player.player_id');
    $this->db->join('team', 'players.teamid = team.team_id');
   return  $this->db->get('my_team_player')->result_array();
  }


  public function update_team($captainid,$vicecaptainid,$team)
  {
        $captain = array('is_captain' =>"1");
        $this->db->where('player_id',$captainid);
        $this->db->where('my_team_id',$team);
        $this->db->update('my_team_player',$captain);
        $vicecaptain = array('is_vicecaptain' =>"1");
        $this->db->where('player_id',$vicecaptainid);
        $this->db->where('my_team_id',$team);
        $update =  $this->db->update('my_team_player',$vicecaptain);

        return $update;
  }


    public function get_myteam_player_id($user_id,$team_id)
    {
        $this->db->select('player_id');
        $this->db->where('user_id',$user_id);
        $this->db->where('my_team_id',$team_id);
        return  $this->db->get('my_team_player')->result();
    }  


    public function get_players_points($id)
    {
        $this->db->select('credit_points');
        $this->db->where('id',$id);
        return $this->db->get('players')->row()->credit_points;
    }

     // API to get count of batsman
    function count_batsman($request)
    {
        $this->db->select('*');
        $this->db->from('my_team_player');
        $this->db->where('my_team_id',$request);
        $this->db->where('designationid','1');
        return  $this->db->get()->num_rows();

    }

    // API to get count of boller
    function count_boller($request)
    {
        $this->db->select('*');
        $this->db->from('my_team_player');
        $this->db->where('my_team_id',$request);
        $this->db->where('designationid','2');
        return  $this->db->get()->num_rows();

    }

    // API to get count of allrounder
    function count_allrounder($request)
    {
        $this->db->select('*');
        $this->db->from('my_team_player');
        $this->db->where('my_team_id',$request);
        $this->db->where('designationid','3');
        return  $this->db->get()->num_rows();

    }

    // API to get count of weeket keeper
    function count_wkeeper($request)
    {
        $this->db->select('*');
        $this->db->from('my_team_player');
        $this->db->where('my_team_id',$request);
        $this->db->where('designationid','4');
        return  $this->db->get()->num_rows();

    }

    public function get_playerteam($id)
    {
        $this->db->select('teamid');
        $this->db->where('id',$id);
       return  $this->db->get('players')->row()->teamid;
    }


    public function get_myteam_player_role($teamid,$id)
    {
        $this->db->select('designationid,player_id');
        $this->db->where('my_team_id',$teamid);
        $this->db->where('designationid',$id);
       return $this->db->get('my_team_player')->result_array();
    }

    public function get_myteam_player_roles($teamid,$id)
    {
        $this->db->select('designationid,player_id');
        $this->db->where('my_team_id',$teamid);
        $this->db->where('designationid',$id);
       return $this->db->get('my_team_player')->row_array();
    }

    // API to get contest by contest id 
    public function get_contest($id)
    {
        $this->db->select('*');
        $this->db->where('contest_id',$id);
        return $this->db->get('contest')->row();
    }

    public function view_user_profile($user_id)
    {
        $this->db->select('user_id,name,mobile,email,image,teamName,favriteTeam,dob,gender,address,city,pincode,state,country,referral_code,code');
        $this->db->where("user_id",$user_id);
        return $this->db->get('registration')->row();
    }


    public function join_contest($request)  
    {
        $this->db->select('*');
        $this->db->where('match_id',$request['match_id']);
        $resp = $this->db->get('match')->row();

        $this->db->select('*');
        $this->db->where('contest_id',$request['contest_id']);
        $this->db->where('my_team_id',$request['my_team_id']);
        $record = $this->db->get('my_match')->num_rows();

        $this->db->select('referral_code');
        $this->db->where('user_id',$request['user_id']);
        $code = $this->db->get('registration')->row();

        if($record == "")
        {
            $data = array('user_id' =>$request['user_id'],
                      'my_team_id' =>$request['my_team_id'],
                      'contest_id' =>$request['contest_id'],
                      'teamid1'=>$resp->teamid1,
                      'teamid2'=>$resp->teamid2,
                      'match_id'=>$resp->match_id,
                      'match_status'=>$resp->match_status,
                      'type'=>$resp->type,
                      'time'=>$resp->time,
                      'created_date'=>date("Y-m-d H:i:s")
                    );

            
            $arr = array('teamid' =>$request['my_team_id'],
                        'name'=> $code->referral_code, 
                        'user_id'=>$request['user_id'],
                        'contestid'=>$request['contest_id'],
                        'matchid' =>$request['match_id'],
                        'image' =>'default.png',
                        'created_date'=>date("Y-m-d H:i:s")

             );
            $this->db->insert('leaderboard',$arr);

            $this->db->where('contest_id',$request['contest_id']);
            $count = $this->db->get('contest')->row()->join_team;
            $array = array('join_team' =>$count+1);
            $this->db->where('contest_id',$request['contest_id']);
            $this->db->update('contest',$array);
            
            $insert = $this->db->insert('my_match',$data);
            if($insert)
            {
                return true;
            }
            else
            {
                return false;
            } 
        }  
        else
        {
            return false;
        } 
    } 

    // API for check bonus amount in user account by user id
    public function join_contest_with_credit_and_winning_fees($request,$bonus_amt,$reffer,$credit,$remaining_amount)
    {
        $bonus = array('user_id' =>$request['user_id'],
                        'amount'=> $bonus_amt,
                        'type'=>'bonus_debit',
                        'referral_useid'=>$reffer->user_id,
                        'transaction_status'=> 'SUCCESS',
                        'transection_mode'=> 'join contest',
                        'contest_id'=> $request['contest_id'],
                        'created_date'=>date("Y-m-d H:i:s"),
                    );
        $this->db->insert('transection',$bonus);

        $credit_debit = array('user_id' =>$request['user_id'],
                        'amount'=> $credit,
                        'type'=>'debit',
                        'referral_useid'=>$reffer->user_id,
                        'transaction_status'=> 'SUCCESS',
                        'transection_mode'=> 'join contest',
                        'contest_id'=> $request['contest_id'],
                        'created_date'=>date("Y-m-d H:i:s"),
                    );
        $this->db->insert('transection',$credit_debit);

        $winning_debit = array('user_id' =>$request['user_id'],
                        'amount'=> $remaining_amount,
                        'type'=>'winning_debit',
                        'referral_useid'=>$reffer->user_id,
                        'transaction_status'=> 'SUCCESS',
                        'transection_mode'=> 'join contest',
                        'contest_id'=> $request['contest_id'],
                        'created_date'=>date("Y-m-d H:i:s"),
                    );
        $this->db->insert('transection',$winning_debit);
    }

    // API for check bonus amount in user account by user id
    public function join_contest_with_bonus_fees($request,$bonus_amt, $reffer)
    {
        $bonus = array('user_id' =>$request['user_id'],
                        'amount'=> $bonus_amt,
                        'type'=>'bonus_debit',
                        'referral_useid'=>$reffer->user_id,
                        'transaction_status'=> 'SUCCESS',
                        'transection_mode'=> 'join contest',
                        'contest_id'=> $request['contest_id'],
                        'created_date'=>date("Y-m-d H:i:s"),
                    );
        $this->db->insert('transection',$bonus);

        $contest_bonus = array('user_id' =>$request['user_id'],
                        'amount'=> $request['contest_amount'],
                        'type'=>'debit',
                        'referral_useid'=>$reffer->user_id,
                        'transaction_status'=> 'SUCCESS',
                        'transection_mode'=> 'join contest',
                        'contest_id'=> $request['contest_id'],
                        'created_date'=>date("Y-m-d H:i:s"),
                    );
        $this->db->insert('transection',$contest_bonus);
    }

    // API for check bonus amount in user account by user id
    public function user_referral_bonus($request,$bonus_amt, $reffer)
    {
        $bonus = array('user_id' =>$reffer->user_id,
                        'amount'=> $bonus_amt,
                        'type'=>'bonus',
                        'referral_useid'=>$request['user_id'],
                        'transaction_status'=> 'SUCCESS',
                        'transection_mode'=> 'refferal bonus',
                        'contest_id'=> $request['contest_id'],
                        'created_date'=>date("Y-m-d H:i:s"),
                    );
        $this->db->insert('transection',$bonus);
    }


    // API for check bonus amount in user account by user id
    public function join_contest_with_bonus_fees_winning($request,$bonus_amt, $reffer)
    {
        $bonus = array('user_id' =>$request['user_id'],
                        'amount'=> $bonus_amt,
                        'type'=>'bonus_debit',
                        'referral_useid'=>$reffer->user_id,
                        'transaction_status'=> 'SUCCESS',
                        'transection_mode'=> 'join contest',
                        'contest_id'=> $request['contest_id'],
                        'created_date'=>date("Y-m-d H:i:s"),
                    );
        $this->db->insert('transection',$bonus);

        $contest_bonus = array('user_id' =>$request['user_id'],
                        'amount'=> $request['contest_amount'],
                        'type'=>'winning_debit',
                        'referral_useid'=>$reffer->user_id,
                        'transaction_status'=> 'SUCCESS',
                        'transection_mode'=> 'join contest',
                        'contest_id'=> $request['contest_id'],
                        'created_date'=>date("Y-m-d H:i:s"),
                    );
        $this->db->insert('transection',$contest_bonus);
       
    }

    // API for check bonus amount in user account by user id
    public function join_contest_with_credit_and_winning_fees_amount($request,$reffer,$remaining_amount,$credit)
    {
        $credit_debit = array('user_id' =>$request['user_id'],
                        'amount'=> $credit,
                        'type'=>'debit',
                        'referral_useid'=>$reffer->user_id,
                        'transaction_status'=> 'SUCCESS',
                        'transection_mode'=> 'join contest',
                        'contest_id'=> $request['contest_id'],
                        'created_date'=>date("Y-m-d H:i:s"),
                    );
        $this->db->insert('transection',$credit_debit);

        $winning_debit = array('user_id' =>$request['user_id'],
                        'amount'=> $remaining_amount,
                        'type'=>'winning_debit',
                        'referral_useid'=>$reffer->user_id,
                        'transaction_status'=> 'SUCCESS',
                        'transection_mode'=> 'join contest',
                        'contest_id'=> $request['contest_id'],
                        'created_date'=>date("Y-m-d H:i:s"),
                    );
        $this->db->insert('transection',$winning_debit);
    }


    // API for check total amount in user account by user id
    public function join_contest_without_bonus_fees($request,$reffer,$amount)
    {
        $contest_bonus = array('user_id' =>$request['user_id'],
                        'amount'=> $amount,
                        'type'=>'debit',
                        'referral_useid'=>$reffer['user_id'],
                        'transaction_status'=> 'SUCCESS',
                        'transection_mode'=> 'join contest',
                        'contest_id'=> $request['contest_id'],
                        'created_date'=>date("Y-m-d H:i:s"),
                    );
        $this->db->insert('transection',$contest_bonus);
    }


    public function fetch_match_data($where)
   {
       $this->db->where('match_status',$where);
       $this->db->select('match.match_date_time,match.match_status,match.teamid1,match.teamid2');
       $this->db->from('match');
       $this->db->order_by('match_status');
       $this->db->limit(4);
       $query = $this->db->get();
       if($query->num_rows() > 0){
           return $query->result();
       } else {
           return $query->result();
       }
   }

   public function fetch_match_data_result($where)
   {
       $this->db->select('match.winner_team,match.match_date_time,match.match_status,match.teamid1,match.teamid2');
       $this->db->from('match');
       $this->db->where('match_status',$where);
       $this->db->order_by('match_status');
       $this->db->order_by('match_id','desc');
       $this->db->limit(2);
       $query = $this->db->get();
       return $query->result();
       
   }

     public function update_team_record($id, $data ,$user_id)
    {
        $this->db->where('my_team_id',$id);
        $this->db->delete('my_team_player');
        
        foreach ($data as $player) {
           $this->db->select('designationid,teamid');
           $this->db->where('id',$player);
           $res =  $this->db->get('players')->row();
           $datas = array('designationid' =>$res->designationid,
                        'my_team_id'=>$id,
                        'player_id'=>$player,
                        'is_select'=>"1",
                        'user_id'=>$user_id,
                        'created_date'=>date("Y-m-d H:i:s")
                    );

           $this->db->insert('my_team_player',$datas);
        }

        return $id;
    }

    public function get_myteam_selected_players($user_id,$team_id)
    {
        $this->db->select('players.name,players.id,designation.short_term,players.credit_points,designation.image,team.team_short_name');
        $this->db->from('my_team_player');
        $this->db->where('my_team_player.user_id',$user_id);
        $this->db->where('my_team_player.my_team_id',$team_id);
        $this->db->join('designation', 'my_team_player.designationid=designation.id');
        $this->db->join('players', 'players.id = my_team_player.player_id');
        $this->db->join('team', 'players.teamid=team.team_id');
        $resp = $this->db->get()->result_array();
        return $resp;
          


    }
  










}
