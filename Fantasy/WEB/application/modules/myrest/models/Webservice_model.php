<?php
class Webservice_model extends CI_Model 
{
    //API for check mobile number
    function user_reg_mobile($request)
    {   
        if($request['mobile'] !="")
        {
            $this->db->select('*');
            $this->db->from('registration');
            $this->db->where('mobile',$request['mobile']);
            $resp = $this->db->get()->row();

            if($resp !="")
            {
                return false;
            }
            else
            {
                return true;
            } 
        } 
        else
        {
            return true;
        }         
    }

    // API for check email Id 
    function user_reg_email($request)
    {   
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where('email',$request['email']);
        $resp = $this->db->get()->row();

        if($resp !="")
        {
            return false;
        }
        else
        {
            return true;
        }           
    }

    //API for get referral code and user id 
    function referral_code($request)
    {
        $this->db->select('referral_code,user_id');
        $this->db->where('referral_code',$request['code']);
        $code = $this->db->get('registration')->row();
        if($code !="")
        {
            return $code;
        }    
        else
        {
            return false;
        }    
    }

    // API for registration with referral code 
    function referral_code_registration($request,$otp,$referral_code,$referral)
    {
        if($request['type'] =="Normal")
        {
            $this->db->select('*');
            $this->db->from('registration');
            $this->db->where('mobile',$request['mobile']);
            $this->db->where('email',$request['mobile']);
            $resp = $this->db->get()->row();
            if($resp =="")
            {
                $data = array('mobile' =>$request['mobile'],
                        'email' =>$request['email'],
                        'password' =>md5($request['password']),
                        'code' =>$request['code'],
                        'type' =>$request['type'],
                        'referral_code'=>$referral_code,
                        'otp' =>$otp,
                        'createDate'=>date('Y-m-d H:i:s'),
                    ); 
                $this->db->insert('registration',$data);
                $id = $this->db->insert_id();
                if($id !="")
                {     

                   $bonus_amount =  $this->db->get_where('setting',array('id'=>'1','type' =>'Bonus'))->row();

                   $amoun =  $bonus_amount->value;

                    $reffer_bonus = array('user_id' =>$id,
                            'amount'=>$amoun,
                            'type'=>'bonus',
                            'transaction_status'=>'SUCCESS',
                            'transection_mode'=>'referral bonus',
                            'referral_useid'=>$referral->user_id,
                            'created_date'=>date('Y-m-d H:i:s'),
                    );
                    $this->db->insert('transection',$reffer_bonus);                    

                    $this->db->select('user_id,name,mobile,email,type');
                    $this->db->where('user_id',$id);
                    return $this->db->get('registration')->row();

                    
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
    }

    // API for check User registered with mobile number or email Id if not then registration done. 
    function user_reg($request,$otp,$referral_code)
    {   
        if($request['type'] =="Normal")
        {
            $this->db->select('*');
            $this->db->from('registration');
            $this->db->where('mobile',$request['mobile']);
            $this->db->where('email',$request['mobile']);
            $resp = $this->db->get()->row();
            if($resp =="")
            {
                $data = array('mobile' =>$request['mobile'],
                        'email' =>$request['email'],
                        'password' =>md5($request['password']),
                        'code' =>$request['code'],
                        'type' =>$request['type'],
                        'referral_code'=>$referral_code,
                        'otp' =>$otp,
                    ); 
                $this->db->insert('registration',$data);
                $id = $this->db->insert_id();
                if($id !="")
                {     
                    $bonus_amount =  $this->db->get_where('setting',array('id'=>'1','type' =>'Bonus'))->row();

                   $amoun =  $bonus_amount->value;

                    $reffer_bonus = array('user_id' =>$id,
                            'amount'=>$amoun,
                            'type'=>'bonus',
                            'transaction_status'=>'SUCCESS',
                            'transection_mode'=>'Signup bonus',
                            'referral_useid'=>$id,
                            'created_date'=>date('Y-m-d H:i:s'),
                    );
                    $this->db->insert('transection',$reffer_bonus);

                    $this->db->select('user_id,name,mobile,email,type');
                    $this->db->where('user_id',$id);
                    return $this->db->get('registration')->row();
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
        else
        {
            $this->db->select('*');
            $this->db->from('registration');
            $this->db->where('email',$request['email']);
            $resp = $this->db->get()->row();
            if($resp =="")
            {
                $data = array('mobile' =>$request['mobile'],
                        'email' =>$request['email'],
                        'password' =>md5($request['password']),
                        'code' =>$request['code'],
                        'type' =>$request['type'],
                        'referral_code'=>$referral_code,
                        'verify' =>"1",
                        'otp' =>$otp,
                    ); 
                $this->db->insert('registration',$data);
                $id = $this->db->insert_id();
                if($id !="")
                {     
                    $bonus_amount =  $this->db->get_where('setting',array('id'=>'1','type' =>'Bonus'))->row();

                    $amoun =  $bonus_amount->value;

                    $reffer_bonus = array('user_id' =>$id,
                            'amount'=>$amoun,
                            'type'=>'bonus',
                            'transaction_status'=>'SUCCESS',
                            'transection_mode'=>'Signup bonus',
                            'referral_useid'=>$id,
                            'created_date'=>date('Y-m-d H:i:s'),
                    );

                    $this->db->insert('transection',$reffer_bonus);
                    
                    $this->db->select('user_id,name,mobile,email,type');
                    $this->db->where('user_id',$id);
                    return $this->db->get('registration')->row();
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
                    
    }

    //API for login by Email Id or mobile
     function login($request, $random)
    {
        if($request['type'] =="Normal")
        {
            $this->db->select('user_id,name,mobile,email,type,verify,referral_code,image,city,state,pincode,address,gender');
            $this->db->from('registration');
            $this->db->where(" (mobile ='".$request['mobile']."' OR email='".$request['mobile']."') ");
            $this->db->where('password' ,md5($request['password']));
            // $this->db->where('verify','1');
            $resp = $this->db->get()->row();
           if($resp !="")
            {
                $id = $resp->user_id;
                if($resp->image =='' ){
                    $resp->image='default.jpg';
                }
                $data = array('random' =>$random,'mobiletoken' =>$request['token']);
                $this->db->where("user_id",$id );
                $this->db->update('registration',$data);
                return $resp;
            }
            else
            {
                return false;
            } 
        }
        else
        {
            $this->db->select('user_id,name,mobile,email,type,verify,referral_code,image,city,state,pincode,address,gender');
            $this->db->from('registration');
            $this->db->where('email',$request['mobile']);        
            $this->db->where('password',md5($request['password']));
            $resp = $this->db->get()->row();
            if($resp !="")
            {
                $id = $resp->user_id;
                if($resp->image =='' ){
                    $resp->image='default.jpg';
                }
                $data = array('random' =>$random,'mobiletoken' =>$request['token']);
                $this->db->where("user_id",$id );
                $this->db->update('registration',$data);
                return $resp;
            }
            else
            {
                return false;
            } 
        }    
         

    }

    //Api for number verification by OTP
    function number_verify($request)
    {       
        $this->db->select('mobile');
        $this->db->from('registration');
        $this->db->where('user_id',$request['user_id']);
        $this->db->where('mobile',$request['mobile']);
        $this->db->where('otp',$request['otp']);        
        $resp = $this->db->get()->row();

        if($resp !="")
        {
            $data = array('verify' =>"1");
            $this->db->where("user_id",$request['user_id'] );
            $update = $this->db->update('registration',$data);

            if($update)
            {
                return true;
            }   
            else
            {
                return false;
            }   

        }   
        
    }

    //API for update OTP for forget password by user 
    function forget_password($otp,$moblie)
    {
        $data = array('otp' =>$otp);
        $this->db->where("mobile",$moblie);
        $this->db->update('registration',$data);
        $this->db->select('user_id');
        $this->db->where("mobile",$moblie);
        return $this->db->get('registration')->row();        
    }

    //API for varification of OTP for forgot password
    function varify_forgot_password($request)
    {
        if($request['type'] =="Number")
        {
            $this->db->select('mobile');
            //$this->db->where('user_id',$request['user_id']);
            $this->db->where('mobile',$request['EmailorNumber']);
            $this->db->where('otp',$request['otp']);
            $resp = $this->db->get('registration')->row();
            if($resp !="")
            {
                $data = array('verify' =>"1");
                $this->db->where('mobile',$request['EmailorNumber']);
                $this->db->update('registration',$data);

                $this->db->select('user_id');
                $this->db->where("mobile",$request['EmailorNumber']);
                return $this->db->get('registration')->row();
            }    
            else
            {
                return false;
            }
        }
        else
        {
            $this->db->select('email');
           // $this->db->where('user_id',$request['user_id']);
            $this->db->where('email',$request['EmailorNumber']);
            $this->db->where('otp',$request['otp']);
            $resp = $this->db->get('registration')->row();
            if($resp !="")
            {
                $data = array('verify' =>"1");
                $this->db->where('email',$request['EmailorNumber']);
                $this->db->update('registration',$data);

                $this->db->select('user_id');
                $this->db->where("email",$request['EmailorNumber']);
                return $this->db->get('registration')->row();
            }    
            else
            {
                return false;
            }
        }
    }

    // API for update password by user id
    function update_password($request)
    {   
        $data = array('password' =>md5($request['password']));
        $this->db->where("user_id",$request['user_id']);
        $update = $this->db->update('registration',$data);
        if($update)
        {
            return $update;
        }           
        else
        {
            return false;
        }    
    }

    //API for update user prfile by user id 
    function user_profile($request)
    {
        $data = array('image' =>$request['image'],
                        'name' =>$request['name'],
                        'mobile' =>$request['mobile'],
                        'teamName' =>$request['teamName'],
                        'favriteTeam' =>$request['favriteTeam'],
                        'dob' =>$request['dob'],
                        'gender' =>$request['gender'],
                        'address' =>$request['address'],
                        'city' =>$request['city'],
                        'pincode' =>$request['pincode'],
                        'state' =>$request['state'],
                        'country' =>$request['country'],
                        'createDate' =>date("Y-m-d")
                    ); 
        $this->db->where("user_id",$request['user_id']);
        return $update = $this->db->update('registration',$data);
    }

    // API for get all state of India 
    function get_state()
    {        
        $this->db->select('id,name');
        $this->db->where("country_id","101");
        return $this->db->get('states')->result();
    }

    // APi for get city by state id
    function get_city($request)
    {
        $this->db->select('id,name');
        $this->db->where("state_id",$request['state_id']);
        return $this->db->get('cities')->result();
    }

    // API for get user profile detail by user id
    function view_user_profile($request)
    {
        $this->db->select('user_id,name,mobile,email,image,teamName,favriteTeam,dob,gender,address,city,pincode,state,country,referral_code,code');
        $this->db->where("user_id",$request['user_id']);
        return $this->db->get('registration')->row();
    }

    // API for get match record by status
    function match_record($request)
    {
        if($request['status'] =="Fixture")
        {   
            $date = date("Y-m-d H:i:s", strtotime("+15 day"));
            $this->db->select('*');
            $this->db->where('match_status',$request['status']);
            $this->db->where("time <=",$date);
            $this->db->order_by('time','asc');
            $resp =  $this->db->get('match')->result();
            if( count($resp) > 0)
            {
                return $resp;
            }
            else
            {
                return false;
            }
        }
        elseif ($request['status'] =="Result") {
            $this->db->select('*');
            $this->db->where('match_status',$request['status']);
            $this->db->limit('20');
            $this->db->order_by('match_id','desc');
            $resp =  $this->db->get('match')->result();
            if( count($resp) > 0)
            {
                return $resp;
            }
            else
            {
                return false;
            }
        } 
        else{
            $this->db->select('*');
            $this->db->where('match_status',$request['status']);
            $resp =  $this->db->get('match')->result();
            if( count($resp) > 0)
            {
                return $resp;
            }
            else
            {
                return false;
            }
        }    
        
    }

    // API for check mobile number not verify by mobile number
    function number_not_verify($request)
    {       
        $this->db->select('user_id,mobile,otp');
        $this->db->from('registration');
        $this->db->where('mobile',$request['mobile']);
        return $resp = $this->db->get()->row();        
    }

    // API for check mobile number not verify by mobile number or email Id
    function not_verify($request)
    {       
        $this->db->select('user_id,name,mobile,verify,email,type');
        $this->db->from('registration');
        $this->db->where(" (mobile ='".$request['mobile']."' OR email='".$request['mobile']."') ");
        return $resp = $this->db->get()->row(); 
    }

    //API for check registration is done or not by email Id or mobile
    function check_registration($request,$random)
    {
        if($request['type'] =="Normal")
        {
            $this->db->select('user_id,name,mobile,email,type,verify');
            $this->db->from('registration');
            $this->db->where(" (mobile ='".$request['mobile']."' OR email='".$request['mobile']."') ");
            $this->db->where('password' ,md5($request['password']));
            $resp = $this->db->get()->row();
            if($resp !="")
            {
                return $resp;
            }
            else
            {
                return false;
            } 
        }
        else
        {
            $this->db->select('user_id,name,mobile,email,type,verify');
            $this->db->from('registration');
            $this->db->where('email',$request['mobile']);        
            $this->db->where('password',md5($request['password']));
            $resp = $this->db->get()->row();
            if($resp !="")
            {
                $id = $resp->user_id;
                $data = array('random' =>$random);
                $this->db->where("user_id",$id );
                $this->db->update('registration',$data);
                return $resp;
            }
            else
            {
                return false;
            } 
        }  
    }

    // API for resend OTP
    function resend_otp($request)
    {
        $this->db->select('mobile,user_id,otp');
        $this->db->from('registration');
        $this->db->where('user_id',$request['user_id']);
        return $resp = $this->db->get()->row();
    }   

    //API for get record for change password
    function change_password($request)
    {
        $this->db->select('user_id');
        $this->db->where('user_id',$request['user_id']);
        $this->db->where('password',md5($request['old_password']));
        $resp = $this->db->get('registration')->row();
        if($resp !="")
        {
            return $resp;
        }
        else
        {
            return false;
        }    
    }

    // API for get match record for user by user id
    function mymatch_record($request)
    {
        $this->db->select('*');
        $this->db->where('match_status',$request['status']);
        $this->db->where('user_id',$request['user_id']);
        $this->db->group_by('match_id');
        $this->db->order_by('my_match_id','desc');
        $resp =  $this->db->get('my_match')->result();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }    
    }

    // API for contest list by type
    function contest_list($request)
    {
        if($request['type'] =="All")
        {
            $this->db->select('*');  
            $this->db->where('match_id',$request['match_id']);     
            $resp =  $this->db->get('contest')->result();
            if($resp !="")
            {
                return $resp;
            }    
            else
            {
                return false;
            } 
        }   
        else
        {
            $this->db->select('*');  
            $this->db->where('match_id',$request['match_id']);
            $this->db->where('type',$request['type']);     
            $resp =  $this->db->get('contest')->result();
            if($resp !="")
            {
                return $resp;
            }    
            else
            {
                return false;
            } 
        }    
    }

    // API for winning information by contest id
    function winning_info($request)
    {
        $this->db->select('*');  
        $this->db->where('contest_id',$request['contest_id']);
        $this->db->order_by('winning_info_id','asc');
        $resp =  $this->db->get('winning_information')->result();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }   
    }  

    //API for get team list by match id
    function team_list($request)
    {       
        if($request['designationid'] == "0")
        {  $this->db->select('id,matchid,teamid,playerid,is_select');  
            $this->db->where('matchid',$request['matchid']);
            $resp =  $this->db->get('match_players')->result();
            if($resp !="")
            {
                return $resp;
            }    
            else
            {
                return false;
            }
        }    

        else
        {
            $this->db->select('id,matchid,teamid,playerid,is_select');  
            $this->db->where('matchid',$request['matchid']);
            $this->db->where('designationid',$request['designationid']);
            $resp =  $this->db->get('match_players')->result();
           if($resp !="")
            {
                return $resp;
            }    
            else
            {
                return false;
            }
            
        }  
    }

    //API to get team name by team id
    function team_name($id)
    {
        $this->db->select('team_id,team_name,team_image,team_short_name');  
        $this->db->where('team_id',$id);
        $resp =  $this->db->get('team')->row();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }  
    }

    //API for team image by team id
    function team_image($request)  
    {
        $this->db->select('team_image');  
        $this->db->where('team_id',$request);
        $resp =  $this->db->get('team')->row()->team_image;
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }  
    }

    // API to get player name by player id
    function player_name($id)
    {
        $this->db->select('id,name,credit_points,image,designationid');
        $this->db->where('id',$id);
        $resp =  $this->db->get('players')->row();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }  
    }

    // API to get player desigination 
    function player_desigination($id)
    {
        $this->db->select('id,title,short_term');  
        $this->db->where('id',$id);
        $resp =  $this->db->get('designation')->row();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }  
    }

    // API to get leaderboard by match id
    function leaderboard($request)
    {
        $this->db->select('id,image,teamid,rank,name');  
        $this->db->where('matchid',$request['matchid']);
        $resp =  $this->db->get('leaderboard')->result();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }  
    }

    //API for get player information by player id
    function player_information($request)
    {
        $this->db->select('match_players.total_points,players.id,players.name,players.credit_points,players.image,players.dob,players.nationality,players.bats,players.bowls');
        $this->db->from('players');
        $this->db->where('players.id',$request['player_id']);
        $this->db->join('match_players', 'match_players.playerid = players.id');
        $resp = $this->db->get()->row();

        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }    
    }

    // API for get team number by team id and match id
    function team_number($matchid,$teamid)
    {
        $this->db->select('*');
        $this->db->where('match_id',$matchid);
        $this->db->where('teamid1',$teamid);
        $res = $this->db->get('match')->row();
        if($res !="")
        {
            return $res;
        }
        
    }

    // API for get team list information by creadit points in desc order
    function team_list1($request)
    {  
        if($request['my_team'] == "1")
        {
            if($request['designationid'] == "0")
            { 
                /*$this->db->select('my_team_player.is_vicecaptain,my_team_player.is_captain,my_team_player.id,my_team_player.my_team_id,my_team_player.player_id,my_team_player.player_id,my_team_player.is_select,players.credit_points,players.name,designation.image,designation.title,designation.short_term');*/

                $this->db->select('my_team_player.is_vicecaptain,my_team_player.is_captain,my_team_player.id,my_team_player.my_team_id,my_team_player.player_id,my_team_player.player_id,players.teamid,my_team_player.is_select,players.credit_points,players.name,designation.title,designation.short_term');
                $this->db->from('my_team_player');  
                $this->db->join('players', 'players.id = my_team_player.player_id');
                $this->db->join('designation', 'players.designationid = designation.id');
                $this->db->join('my_team', 'my_team_player.my_team_id = my_team.id');
                $this->db->where('my_team_player.my_team_id',$request['my_team_id']);
                $this->db->where('my_team.match_id',$request['matchid']);
                $this->db->where('my_team_player.user_id',$request['user_id']);
                $this->db->order_by('players.credit_points','desc');
                $resp =  $this->db->get()->result();
                if($resp !="")
                {
                    return $resp;
                }    
                else
                {
                    return false;
                }
            }    

            else
            {
                /*$this->db->select('my_team_player.id,my_team_player.my_team_id,my_team_player.player_id,my_team_player.player_id,my_team_player.is_select,players.credit_points,players.name,designation.image,designation.title,designation.short_term');*/
                $this->db->select('my_team_player.id,my_team_player.my_team_id,my_team_player.player_id,my_team_player.player_id,players.teamid,my_team_player.is_select,players.credit_points,players.name,designation.title,designation.short_term');
                $this->db->from('my_team_player');  
                $this->db->join('players', 'players.id = my_team_player.player_id');
                $this->db->join('designation', 'players.designationid = designation.id');
                $this->db->join('my_team', 'my_team_player.my_team_id = my_team.id');
                
                $this->db->where('my_team.match_id',$request['matchid']);
                $this->db->where('my_team_player.my_team_id',$request['my_team_id']);
                $this->db->where('my_team_player.user_id',$request['user_id']);
                $this->db->where('match_players.designationid',$request['designationid']);
                $this->db->order_by('players.credit_points','desc');
                 $resp =  $this->db->get()->result();
                if($resp !="")
                {
                    return $resp;
                }    
                else
                {
                    return false;
                }
                
            } 
        } 
        else
        {
            if($request['designationid'] == "0")
            { 
                $this->db->select('match_players.id,match_players.matchid,match_players.teamid,match_players.playerid,match_players.is_select,team.team_name,team.team_image,team.team_short_name ,players.credit_points,players.name,designation.image,designation.title,designation.short_term');
                $this->db->from('match_players');  
                $this->db->join('team', 'team.team_id = match_players.teamid');
                $this->db->join('players', 'players.id = match_players.playerid');
                $this->db->join('designation', 'players.designationid = designation.id');
                $this->db->where('match_players.matchid',$request['matchid']);
                $this->db->order_by('players.credit_points','desc');
                $resp =  $this->db->get()->result();
                if($resp !="")
                {
                    return $resp;
                }    
                else
                {
                    return false;
                }
            }    

            else
            {
                /*$this->db->select('match_players.id,match_players.matchid,match_players.teamid,match_players.playerid,match_players.is_select,team.team_name,team.team_image,team.team_short_name,players.credit_points,players.name,designation.image,designation.title,designation.short_term');*/
                $this->db->select('match_players.id,match_players.matchid,match_players.teamid,match_players.playerid,match_players.is_select,team.team_name,team.team_image,team.team_short_name,players.credit_points,players.name,designation.image,designation.title,designation.short_term');
                $this->db->from('match_players');  
                $this->db->join('team', 'team.team_id = match_players.teamid');
                $this->db->join('players', 'players.id = match_players.playerid');
                $this->db->join('designation', 'players.designationid = designation.id');
                $this->db->where('match_players.matchid',$request['matchid']);
                $this->db->where('match_players.designationid',$request['designationid']);
                $this->db->order_by('players.credit_points','desc');
                 $resp =  $this->db->get()->result();
                if($resp !="")
                {
                    return $resp;
                }    
                else
                {
                    return false;
                }
                
            } 
        }    
    }

    // API to insert and update team player by user
    function selected_player_byuser($request)
    {
        $players = $request['PlayerList'];

        if($request['edit'] =="1")
        {
            $this->db->where('my_team_id',$request['my_team_id']);
            $this->db->delete('my_team_player');

            foreach ($players as $player) {
            $this->db->select('designationid,teamid');
            $this->db->where('id',$player['PlayerId']);
            $res =  $this->db->get('players')->row();
            $data = array('designationid' =>$res->designationid,
                        'my_team_id'=>$request['my_team_id'],
                        'player_id'=>$player['PlayerId'],
                        'is_select'=>"1",
                        'user_id'=>$request['userid'],
                        'created_date'=>date("Y-m-d H:i:s")
                     );

            $this->db->insert('my_team_player',$data);
        }
            $captain = array('is_captain' =>"1");
            $this->db->where('player_id',$request['CaptainId']);
            $this->db->where('my_team_id',$request['my_team_id']);
            $this->db->update('my_team_player',$captain);

            $vicecaptain = array('is_vicecaptain' =>"1");
            $this->db->where('player_id',$request['ViceCaptainId']);
            $this->db->where('my_team_id',$request['my_team_id']);
            $update =  $this->db->update('my_team_player',$vicecaptain);
            if($update)
            {
                $this->db->select('id,match_id');
                $this->db->where('id',$request['my_team_id']);
                return $this->db->get('my_team')->row();
            }    
            else
            {
                return false;
            }  
        }   
        else
        {
            $arr = array('match_id' =>$request['matchid'] ,
                    'user_id'=>$request['userid'],
                    'created_date'=>date("Y-m-d H:i:s")
                );

        $this->db->insert('my_team',$arr);
        $last_id = $this->db->insert_id();

        foreach ($players as $player) {
           $this->db->select('designationid,teamid');
           $this->db->where('id',$player['PlayerId']);
           $res =  $this->db->get('players')->row();
           $data = array('designationid' =>$res->designationid,
                        'my_team_id'=>$last_id,
                        'player_id'=>$player['PlayerId'],
                        'is_select'=>"1",
                        'user_id'=>$request['userid'],
                        'created_date'=>date("Y-m-d H:i:s")
                    );

           $this->db->insert('my_team_player',$data);
        }
            $captain = array('is_captain' =>"1");
            $this->db->where('player_id',$request['CaptainId']);
            $this->db->where('my_team_id',$last_id);
            $this->db->update('my_team_player',$captain);

            $vicecaptain = array('is_vicecaptain' =>"1");
            $this->db->where('player_id',$request['ViceCaptainId']);
            $this->db->where('my_team_id',$last_id);
            $update =  $this->db->update('my_team_player',$vicecaptain);
            if($update)
            {
                $this->db->select('id,match_id');
                $this->db->where('id',$last_id);
                return $this->db->get('my_team')->row();
            }    
            else
            {
                return false;
            }  
        } 

    }

    // APi to get selected player list by user id
    function selected_player_list_by_userid($request)
    {
        $this->db->select('*');
        $this->db->where('user_id',$request['user_id']);
        $resp =   $this->db->get('my_team_player')->result();

        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }    
    }

    // API to get team list for match by user id
    function user_team_list($request)
    {
        $this->db->select('id,match_id,user_id');
        $this->db->where('user_id',$request['user_id']);
        $this->db->where('match_id',$request['match_id']);
        $resp =   $this->db->get('my_team')->result();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }    
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

    // API to get captain name for user 
    function captain($request)
    {
        $this->db->select('players.name');
        $this->db->from('players');  
        $this->db->join('my_team_player', 'my_team_player.player_id = players.id');
        $this->db->where('my_team_player.my_team_id',$request);
        $this->db->where('my_team_player.is_captain','1');
        return  $this->db->get()->row();
    }

     // API to get vice captain name for user 
    function vicecaptain($request)
    {
        $this->db->select('players.name');
        $this->db->from('players');  
        $this->db->join('my_team_player', 'my_team_player.player_id = players.id');
        $this->db->where('my_team_player.my_team_id',$request);
        $this->db->where('my_team_player.is_vicecaptain','1');
        return  $this->db->get()->row();
    }

    //API to get team player by team id and user id
    function get_myteam_player_id($user_id,$team_id)
    {
        $this->db->select('player_id');
        $this->db->where('user_id',$user_id);
        $this->db->where('my_team_id',$team_id);
        return  $this->db->get('my_team_player')->result();
    }  

   

    

    // API for check bonus amount in user account by user id
    function user_referral_bonus($request,$bonus_amt, $reffer)
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
    function join_contest_with_credit_and_winning_fees($request,$bonus_amt,$reffer,$credit,$remaining_amount)
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
    function join_contest_with_bonus_fees($request,$bonus_amt, $reffer)
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
    function join_contest_with_bonus_fees_winning($request,$bonus_amt, $reffer)
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
    function join_contest_with_credit_and_winning_fees_amount($request,$reffer,$remaining_amount,$credit)
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
    function join_contest_without_bonus_fees($request,$reffer)
    {
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

  

    // API to join contest by user team
    function join_contest($request ,$teamno)  
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
                        'TeamName'=> $teamno,
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

    // API for contest count by user id and match id
    function contest_count($match_id, $user_id)
    { 
        $this->db->select('contest_id');
        $this->db->from('my_match');
        $this->db->where('match_id',$match_id);
        $this->db->where('user_id',$user_id);
        //$this->db->group_by('contest_id');
        return $this->db->get()->num_rows();

    } 

    // API for team count by user id and match id
    function team_count($match_id, $user_id)
    { 
        $this->db->select('my_team_id');
        $this->db->from('my_match');
        $this->db->where('match_id',$match_id);
        $this->db->where('user_id',$user_id);
        $this->db->group_by('my_team_id');
        return $this->db->get()->num_rows();

    }

    // API to get join contest list
    function my_join_contest($request)
    { 
        $this->db->select('contest_id');
        $this->db->from('my_match');
        $this->db->where('match_id',$request['match_id']);
        $this->db->where('user_id',$request['user_id']);
        $arr =  array("match_id", "contest_id");
        $this->db->group_by($arr);
        return $this->db->get()->result();

    } 

    // API to get contest by contest id 
    function get_contest($id)
    {
        $this->db->select('*');
        $this->db->where('contest_id',$id);
        return $this->db->get('contest')->row();
    }

    // API for team count by user for contest
    function team_count_for_contest($id,$user_id)
    {
        $this->db->select('my_team_id');
        $this->db->from('my_match');
        $this->db->where('contest_id',$id);
        $this->db->where('user_id',$user_id);
        return $this->db->get()->num_rows();
    }

    // API for contest list by id
    function contest_list_by_id($request)
    {
        $this->db->select('*');  
        $this->db->where('contest_id',$request['contest_id']);
        $resp =  $this->db->get('contest')->row();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;  
        }           
    }
    
    function contest_get($request)
    {
        $this->db->select('*');
        $this->db->where('match_id',$request['match_id']);
        return $this->db->get('contest')->row();
    }

    // API for get leaderboard by contest id by user id
    function leaderboard_contest_id($request)
    {
       $sql =  "SELECT `id`, `image`, `teamid`, `rank`, `name`, `user_id`, `points`, `TeamName`
                FROM `leaderboard`
                WHERE `contestid` = '".$request['contest_id']."'
                AND `user_id` = '".$request['user_id']."'
                ORDER BY rank + 0 ASC" ;
                
            $result = $this->db->query($sql);
            $resp = $result->result();    
        // $this->db->select('id,image,teamid,rank,name,user_id,points,TeamName');  
        // $this->db->where('contestid',$request['contest_id']);
        // $this->db->where('user_id',$request['user_id']);
        // //$this->db->order_by('user_id','desc');
        // $this->db->order_by('rank','asc');
        // $resp =  $this->db->get('leaderboard')->result();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }  
    }

    // API for get leaderboard by contest id by not in session user id
    function leaderboard_contest_other_user_id($request)
    {
        $sql =  "SELECT `id`, `image`, `teamid`, `rank`, `name`, `user_id`, `points`, `TeamName`
                FROM `leaderboard`
                WHERE `contestid` = '".$request['contest_id']."'
                AND `user_id` != '".$request['user_id']."'
                ORDER BY rank + 0 ASC" ;
                
            $result = $this->db->query($sql);
            $resp = $result->result();  
    //     $this->db->select('id,image,teamid,rank,name,user_id,points,TeamName');  
    //     $this->db->where('contestid',$request['contest_id']);
    //     $this->db->where('user_id !=',$request['user_id']);
    //   // $this->db->order_by('user_id','desc');
    //     $this->db->order_by('rank','asc');
    //     $resp =  $this->db->get('leaderboard')->result();
        if($resp !="")
        {
            return $resp;
        }    
        else 
        {
            return false;
        }  
    }

     // API for team count by user id for contest
    function team_count_contest($request)
    {
        $this->db->select('my_team_id');
        $this->db->from('my_match');
        $this->db->where('contest_id',$request['contest_id']);
        $this->db->where('user_id',$request['user_id']);
        return $this->db->get()->num_rows();
    }

    // API for all team count for contest
    function all_team_count_contest($request)
    {
        $this->db->select('my_team_id');
        $this->db->from('my_match');
        $this->db->where('contest_id',$request['contest_id']);
        return $this->db->get()->num_rows();
    }

    // API for get match status
    function match_status($request)
    {
        $this->db->select('match_status,time');
        $this->db->where('contest_id',$request['contest_id']);
        $resp =  $this->db->get('my_match')->row();
        return $resp;
    }

    //API to get my joined team player details by team id
    function my_joined_team_list($request)
    {
        /*$this->db->select('my_team_player.id,my_team_player.my_team_id,my_team_player.player_id,my_team_player.player_id,my_team_player.is_select,players.credit_points,players.points,players.name,designation.image,designation.title,designation.short_term');*/

        $this->db->select('my_team_player.id,my_team_player.my_team_id,my_team_player.player_id,my_team_player.player_id,my_team_player.is_select,players.credit_points,players.points,players.name,players.teamid,designation.short_term,designation.title,designation.short_term');
        $this->db->from('my_team_player');  
        $this->db->join('players', 'players.id = my_team_player.player_id');
        $this->db->join('designation', 'players.designationid = designation.id');
        $this->db->join('my_team', 'my_team_player.my_team_id = my_team.id');
        $this->db->where('my_team_player.my_team_id',$request['team_id']);        
        $this->db->order_by('players.credit_points','desc');
        $resp =  $this->db->get()->result();
        if($resp !="")
        {
            return $resp;
        }
        else
        {
            return false;
        }    
    }

    // API to get join contest list live match
    function my_join_contest_live($request)  
    { 
        $this->db->select('*');
        $this->db->from('my_match');
        $this->db->where('match_id',$request['match_id']);
        $this->db->where('user_id',$request['user_id']);
        return $this->db->get()->result();

    } 

    // API for get match team by user id
    function match_team($request)  
    {
        $this->db->select('id,match_id,user_id');
        $this->db->where('user_id',$request['user_id']);
        $this->db->where('match_id',$request['match_id']);
        $resp =  $this->db->get('my_team')->result();
        return $resp;
    }

    // API for get match and contest details
    function get_contest_live($id)
    {
        $this->db->select('my_match.match_status,my_match.time,my_match.contest_id,my_match.my_team_id,contest.*');
        $this->db->from('my_match');
        $this->db->where('my_match.my_match_id',$id);
        $this->db->join('contest', 'my_match.contest_id = contest.contest_id');
        return $this->db->get()->row();
    }

    // API for get  rank by contest id
    function get_rank($contest_id,$match_id,$my_team_id)
    {
        $this->db->select('rank');
        $this->db->where('contestid',$contest_id);
        $this->db->where('matchid',$match_id);
        $this->db->where('teamid',$my_team_id);
        $resp =  $this->db->get('leaderboard')->row();
        if($resp !="")
        {
            return $resp;
        }
        else
        {
            return false;
        }    
    }

    // API for get price by rank and contest id
    function get_price($rank,$contest_id)
    {
        $this->db->select('price');
        $this->db->where('contest_id',$contest_id);
        $this->db->where($rank.' BETWEEN from_rank AND to_rank');
        return $this->db->get('winning_information')->row()->price;
    }

    // API for get match status  by time 
    function get_match_status($time)
    {
        $this->db->select('*');
        $this->db->where('time',$time);
        $resp = $this->db->get('match')->result();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }    
    }

    // API to get notification
    function notification($request)
    {        
        $this->db->select('id,match_id,contest_id');
        $this->db->where('find_in_set("'.$request['user_id'].'", user_ids) <> 0');
        $this->db->order_by('id','desc');
        $resp = $this->db->get('notification')->result();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }    
    }

    // API to get match by match id 
    function get_match($id)
    {
        $this->db->select('*');
        $this->db->where('match_id',$id);
        return $this->db->get('match')->row();
    }

    // API for favrite team update in by user
    function favrite_team($request)
    {
        $data = array('favriteTeam' =>$request['favriteTeam']);
        $this->db->where('user_id',$request['user_id']);
        $update =  $this->db->update('registration',$data);
        if($update)
        {
            return true;
        }   
        else
        {
            return false;
        }    
    }

    // API for get favrite team name by user id
    function fave_team_name($id)
    {
        $this->db->select('team_name');
        $this->db->where_in('team_id',$id);
        $team = $this->db->get('team')->result();
        if($team)
        {
            return $team;
        }    
        else
        {
            return false;
        }    
    }

    // API for add amount in user account 
    function add_amount($request,$txn_status)
    {
        $data = array('user_id' =>$request['user_id'],
                      'amount'=>$request['amount'],
                      'transection_via'=>$request['mode'],
                      'type' => 'credit',
                      'transection_detail' =>json_encode($request['transection_detail']),
                      'transaction_status'=>$txn_status,
                      'transection_mode'=>"deposit by self",
                      'created_date'=> date('Y-m-d H:i:s'),
                    );

        $insert = $this->db->insert('transection',$data);
        $id = $this->db->insert_id();
        if($insert)
        {
            $this->db->select('transaction_status');
            $this->db->where('id',$id);
            return  $this->db->get('transection')->row();
        }    
        else
        {
            return false;
        }    
    }

    // API for get details of transection by user id
    function account_details($request)
    {
        $this->db->select('amount,type,created_date,transaction_status,transection_mode');
        $this->db->where('user_id',$request['user_id']);
        $this->db->order_by('id','desc');
        $resp = $this->db->get('transection')->result();

        if($resp)
        {
            return $resp;
        }
        else
        {
            return false;
        }    

    }

    // API for select sum of amount credited by user
    function credit_amount($request)
    {
        $this->db->select_sum('amount');
        $this->db->where('user_id',$request['user_id']);
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
    function debit_amount($request)
    {
        $this->db->select_sum('amount');
        $this->db->where('user_id',$request['user_id']);
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
    function bonus_amount($request)
    {
        $this->db->select_sum('amount');
        $this->db->where('user_id',$request['user_id']);
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
    function bonus_amount_debit($request)
    {
        $this->db->select_sum('amount');
        $this->db->where('user_id',$request['user_id']);
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
    function winning_amount($request)
    {
        $this->db->select_sum('amount');
        $this->db->where('user_id',$request['user_id']);
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
    function winning_amount_debit($request)
    {
        $this->db->select_sum('amount');
        $this->db->where('user_id',$request['user_id']);
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

    // API for all live match
    function get_all_live_match()
    {
        $this->db->select('*');
        $this->db->where('match_status',"Live");
        $resp =  $this->db->get('match')->result();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }  
    }

    // API to get player info by player id
    function player_info($id)
    {
        $this->db->select('*');
        $this->db->where('pid',$id);
        $resp =  $this->db->get('players')->row();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }  
    }

    // API for get score for playing eleven
    function playing_eleven($id)
    {
        $this->db->select('title,t20score,odiscore,testscore');
        $this->db->where('id',$id);
        $resp =  $this->db->get('points_distribution_rules')->row();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }  
    }

    //API for update playing eleven score by 2 points
    function playing_eleven_score($score,$player_id,$match_id)
    {
        $data = array('total_points' =>$score,'playing_score'=>'1');
        $this->db->where('playerid',$player_id);
        $where = array('matchid' =>$match_id ,'playing_score'=>0);
        $this->db->where($where);
        $this->db->update('match_players',$data);
    }

    //API for playing eleven score 
    function update_playing_eleven_score($score,$player_id,$match_id)
    {
        $data = array('total_points' =>$score);
        $this->db->where('playerid',$player_id);
        $arrayName = array('matchid' =>$match_id ,'playing_score'=>1);
        $this->db->where($arrayName);
        $this->db->update('match_players',$data);
    }

    //API for playing eleven score second innings
    function update_playing_eleven_score_second_innings($score,$player_id,$match_id)
    {
        $data = array('second_innings_batting' =>$score);
        $this->db->where('playerid',$player_id);
        $arrayName = array('matchid' =>$match_id ,'playing_score'=>1);
        $this->db->where($arrayName);
        $this->db->update('match_players',$data);
    }

    //API for get team list by match id
    function playing_team_list($request)
    {              
        $this->db->select('id,matchid,teamid,playerid,is_select');  
        $this->db->where('matchid',$request['match_id']);
        $resp =  $this->db->get('match_players')->result_array();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    // API for select sum of points credited by player id and match id
    function total_points($player_id ,$match_id)
    {
        $this->db->select_sum('total_points');
        $this->db->where('matchid',$match_id);
        $this->db->where('playerid',$player_id);
        $resp = $this->db->get('match_players')->row()->total_points;
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    // API for select sum of points credited by player id and match id
    function total_points_bolling($player_id ,$match_id)
    {
        $this->db->select_sum('bolling_points');
        $this->db->where('matchid',$match_id);
        $this->db->where('playerid',$player_id);
        $resp = $this->db->get('match_players')->row()->bolling_points;
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    // API for select sum of points credited by player id and match id
    function total_points_fielding($player_id ,$match_id)
    {
        $this->db->select_sum('fielding_points');
        $this->db->where('matchid',$match_id);
        $this->db->where('playerid',$player_id);
        $resp = $this->db->get('match_players')->row()->fielding_points;
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    // API for player details of playing eleven by player id
    function player_points($player_id,$request)
    {
        $this->db->select('*');
        $this->db->where('playerid',$player_id);
        $this->db->where('matchid',$request['match_id']);
        $resp =  $this->db->get('match_players')->row();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }  
    }

    

    //API for contest count by user id
    function playing_history_contest($request)
    {
        $this->db->select('contestid');
        $this->db->where('user_id',$request['user_id']);
        $resp = $this->db->get('leaderboard')->num_rows();
        if($resp)
        {
            return $resp;
        }   
        else
        {
            return false;
        }    

    }

    //API for match count by user id
    function playing_history_match($request)
    {
        $this->db->select('contestid');
        $this->db->where('user_id',$request['user_id']);
        $this->db->group_by('matchid');
        $resp = $this->db->get('leaderboard')->num_rows();
        if($resp)
        {
            return $resp;
        }   
        else
        {
            return false;
        }    

    }

    //API for playing eleven bolling score
    function update_playing_eleven_bolling_score($score,$player_id,$match_id)
    {
        $data = array('bolling_points' =>$score);
        $this->db->where('playerid',$player_id);
        $arrayName = array('matchid' =>$match_id ,'playing_score'=>1);
        $this->db->where($arrayName);
        $this->db->update('match_players',$data);
    }

    //API for playing eleven bolling score second inning
    function update_playing_eleven_bolling_score_second_innings($score,$player_id,$match_id)
    {
        $data = array('second_innings_bolling' =>$score);
        $this->db->where('playerid',$player_id);
        $arrayName = array('matchid' =>$match_id ,'playing_score'=>1);
        $this->db->where($arrayName);
        $this->db->update('match_players',$data);
    }

    //API for get leaderboard record by match id
    function get_leaderboard_record($request)
    {
        $this->db->select('*');  
        $this->db->where('matchid',$request['matchid']);
        $resp =  $this->db->get('leaderboard')->result();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        } 
    }

    //API for playing eleven fielding score 
    function update_playing_eleven_fielding_score($score,$player_id,$match_id)
    {
        $data = array('fielding_points' =>$score);
        $this->db->where('playerid',$player_id);
        $arrayName = array('matchid' =>$match_id ,'playing_score'=>1);
        $this->db->where($arrayName);
        $this->db->update('match_players',$data);
    }

    //API for playing eleven fielding score 
    function update_playing_eleven_fielding_score_second_innings($score,$player_id,$match_id)
    {
        $data = array('second_innings_fielding' =>$score);
        $this->db->where('playerid',$player_id);
        $arrayName = array('matchid' =>$match_id ,'playing_score'=>1);
        $this->db->where($arrayName);
        $this->db->update('match_players',$data);
    }

    //API for get all team join in this match by match id
    function all_team_for_this_match($match_id)
    {
        $this->db->select('id,match_id,user_id');  
        $this->db->where('match_id',$match_id);
        $resp =  $this->db->get('my_team')->result_array();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        } 
    }

    //API for check player is playing or not in this match for user team
    function check_playerfor_user_bymatch($player_id,$allteam)
    {
        $this->db->select('id,player_id');  
        $this->db->where('my_team_id',$allteam['id']);
        $this->db->where('user_id',$allteam['user_id']);
        $this->db->where('player_id',$player_id);
        $resp =  $this->db->get('my_team_player')->row_array();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        } 
    }

    // API for check user team captain
    function check_playerfor_user_captain($id)
    {
        $this->db->select('is_captain');  
        $this->db->where('id',$id);       
        $resp =  $this->db->get('my_team_player')->row_array();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        } 
    }

     // API for check user team vice captain
    function check_playerfor_user_vicecaptain($id)
    {
        $this->db->select('is_vicecaptain');  
        $this->db->where('id',$id);       
        $resp =  $this->db->get('my_team_player')->row_array();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        } 
    }

    //API for update points in user team 
    function update_user_points_for_match($data,$id)
    {
        $this->db->where('id',$id['id']);
        $this->db->update('my_team_player',$data);
    }

    // API for get user team record by match id
    function get_team_record($id)
    {   
        $this->db->select('*');  
        $this->db->where('match_id',$id['match_id']);
        $resp =  $this->db->get('my_team')->result();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        } 
    }

    // API for get user team player batting score
    function my_team_player_batting($user_id,$teamid)
    {
        $this->db->select_sum('total_points');
        $this->db->where('user_id',$user_id);
        $this->db->where('my_team_id',$teamid);
        $resp = $this->db->get('my_team_player')->row()->total_points;
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    // API for get user team player bolling score
    function my_team_player_balling($user_id,$teamid)
    {
        $this->db->select_sum('bolling_points');
        $this->db->where('user_id',$user_id);
        $this->db->where('my_team_id',$teamid);
        $resp = $this->db->get('my_team_player')->row()->bolling_points;
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    // API for get user team player fielding score
    function my_team_player_fielding($user_id,$teamid)
    {
        $this->db->select_sum('fielding_points');
        $this->db->where('user_id',$user_id);
        $this->db->where('my_team_id',$teamid);
        $this->db->select_sum('fielding_points');
        $resp = $this->db->get('my_team_player')->row()->fielding_points;
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    // API for get user team player batting score for second innings
    function my_team_player_batting_second($user_id,$teamid)
    {
        $this->db->select_sum('second_innings_batting');
        $this->db->where('user_id',$user_id);
        $this->db->where('my_team_id',$teamid);
        $resp = $this->db->get('my_team_player')->row()->second_innings_batting;
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

     // API for get user team player bolling score for second innings
    function my_team_player_bolling_second($user_id,$teamid)
    {
        $this->db->select_sum('second_innings_bolling');
        $this->db->where('user_id',$user_id);
        $this->db->where('my_team_id',$teamid);
        $resp = $this->db->get('my_team_player')->row()->second_innings_bolling;
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

     // API for get user team player fieldind score for second innings
    function my_team_player_fielding_second($user_id,$teamid)
    {
        $this->db->select_sum('second_innings_fielding');
        $this->db->where('user_id',$user_id);
        $this->db->where('my_team_id',$teamid);
        $resp = $this->db->get('my_team_player')->row()->second_innings_fielding;
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    // API for update points in table 
    function update_leaderboard($team_id,$match_id,$user_id,$points)
    {
        $data = array('points' =>$points);
        $this->db->where('teamid',$team_id);
        $this->db->where('matchid',$match_id);
        $this->db->where('user_id',$user_id);
        $this->db->update('leaderboard',$data);
    }

    // API for get record of user player for points calculation
    function player_points_for_user($player_id,$my_team_id)
    {
        $this->db->select('*');
        $this->db->where('player_id',$player_id);
        $this->db->where('my_team_id',$my_team_id);
        $resp =  $this->db->get('my_team_player')->row();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }  
    }

    // API for get team record by points 
    function get_team_record_by_rank($id)
    {
        $this->db->select('*');  
        $this->db->where('matchid',$id);
        $this->db->order_by('points',"desc");
        $resp =  $this->db->get('leaderboard')->result();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        } 
    }

     function get_team_record_by_rank_data($id ,$contestId)
    {
        $this->db->select('*');  
        $this->db->where('matchid',$id);
        $this->db->where('contestid',$contestId);
        $this->db->order_by('points',"desc");
        $resp =  $this->db->get('leaderboard')->result();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        } 
    }
    
     function get_team_record_by_rankss($id)
    {
        $this->db->select('*');  
        $this->db->where('matchid',$id);
        $this->db->order_by('points',"desc");
        $resp =  $this->db->get('leaderboard')->result();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        } 
    }

    // API for check same points for rank
    function same_points_for_rank($id)
    {
        $this->db->select('points,rank');  
        $this->db->where('matchid',$id);
        $resp =  $this->db->get('leaderboard')->row();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    // API for update rank by points
    function update_rankby_points($id , $rank)
    {
        $this->db->where('id',$id);
        $this->db->update('leaderboard',array('rank' =>$rank));
    }

    // API get match record by match unique id
    function get_match_by_unique_id($id)
    {
        $this->db->where('unique_id', $id);
        $this->db->where('match_status', "Live");
        $resp = $this->db->get('match')->row();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }    
    }

    // API for update match status by match unique id
    function update_match_status_by_unique_id($id,$data)
    {
        $this->db->where('match_id', $id);
        $this->db->update('match', $data);
    }

    // API for update user match status by match unique id
    function update_match_status_by_match_id($id)
    {
        $this->db->where('match_id', $id);
        $this->db->update('my_match',array('match_status'=>"Result"));
    }

    // API for common insert
    function common_insert($data,$table)
    {
      return $this->db->insert($table,$data);
    }

    // API for get record of leaderboard by match id
    function get_record_for_amount($id)
    {
        $this->db->select('*');  
        $this->db->where('matchid',$id);
        $this->db->order_by('user_id','desc');
        $resp =  $this->db->get('leaderboard')->result();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        } 
    }

    // Api for get refer friend list
    function refer_friend_list($request)
    {
        $this->db->select('referral_code');
        $this->db->where('user_id',$request['user_id']);
        $resp = $this->db->get('registration')->row_array();
        if($resp['referral_code'] !="")
        {
            $this->db->select('user_id,name,email');
            $this->db->where('code',$resp['referral_code']);
             $this->db->where('user_id !=',$request['user_id']);
            $response =$this->db->get('registration')->result();

            if($response !="")
            {
                return $response;
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

    //API for get reffer bonus calculation
    function get_reffer_bonus($user_id)
    {
        $this->db->select_sum('amount');
        $this->db->where('referral_useid',$user_id);
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


    // API for winning amount debit
    function winning_amount_debit_request($request)
    {
        $data = array('user_id' =>$request['user_id'],
                        'amount' =>$request['amount'],
                        'type'=>'winning_debit',
                        'transaction_status'=>"SUCCESS",
                        'transection_mode'=>'self withdrawal',
                        'withdrow_request'=>'1',
                        'created_date'=>date("Y-m-d H:i:s"),
                    );
        $resp = $this->db->insert('transection',$data);
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }
    }

    //API for update account info
    function user_account_info($request)
    {
        $data = array('user_acc_name' =>$request['user_name'],
                        'acc_no' =>$request['acc_no'],
                        'bank_name'=>$request['bank_name'],
                        'ifsc_code'=> $request['ifsc_code'],
                        'branch_address'=>$request['branch_address'],
                        'user_mobile'=>$request['user_mobile'],
                        'pan_number'=> $request['pan_number'],
                        'aadhar'=> $request['aadhar'],
                    );
        $this->db->where('user_id',$request['user_id']);
        $this->db->update('registration',$data);
    }

    //API for get account info
    function user_withdrow_information($request)
    {
        $this->db->select('user_id,user_acc_name,acc_no,bank_name,ifsc_code,branch_address,user_mobile,pan_number,aadhar');
        $this->db->where('user_id',$request['user_id']);
       return  $this->db->get('registration')->row();
    }


    // API for global rank
    function global_rank_user ($request)
    {
        $this->db->select('leaderboard.user_id,registration.referral_code as name,avg(leaderboard.points) as points');
        $this->db->join('registration','registration.user_id= leaderboard.user_id');
        $this->db->order_by('leaderboard.points','desc');
        $this->db->group_by('leaderboard.user_id');
        $query = $this->db->get('leaderboard')->result();
        if($query !="")
        {    
            return $query;
        }
        else
        {
            return false;
        }    
    }

    function get_offers(){
      
        return  $this->db->get('offers')->result();
        
    }

    function select_player_image($role,$type)
    {
        $this->db->select('image,type');
        $this->db->where('short_term',$role);
        $this->db->where('type',$type);
        return  $this->db->get('designation')->row();
    }

    function update_app(){
      
        $this->db->select('id,note,old_version,new_version');
        return  $this->db->get('version')->row();        
    }


    function update_documents_details($data , $user_id)
    {
        $this->db->where('user_id',$user_id);
        $update = $this->db->update('registration',$data);
        if($update)
        {
            return true;
        }    
        else
        {
            return false;
        }    
    }

    function document_information($request)
    {
        $this->db->select('pancard_status,aadharcard_status');
        $this->db->where('user_id',$request['user_id']);
        $resp = $this->db->get('registration')->row();
        if($resp != "")
        {
            return $resp;
        }    
        else
        {
            return false;
        }    
    }
    
     // API for winning information by user create
    function get_leaderboard_user($request,$last_id)
    {
        $this->db->select('*');  
        $this->db->where('price',$request['price']);
        $this->db->order_by('id','asc');
        $resp =  $this->db->get('user_winning_info')->result();
        if($resp !="")
        {
            return $resp;
        }    
        else
        {
            return false;
        }   
    }
    
    function user_contestCreate($data,$table)
    {
        $this->db->insert($table,$data);
        $id = $this->db->insert_id();
        if($id)
        {
            $this->db->select('user_Contestid,unique_code');
            $this->db->where('user_Contestid',$id);
            return $this->db->get('user_contest')->row();
        }    
        else
        {
            return false;
        }    
    } 
    
    function user_contestList($request)
    {
        $this->db->select('user_Contestid,userContestName,userWinners,userTotalteam,userJoinTeam,userEntry,userMatchid,unique_code,userTotalWinners');
        $this->db->where('unique_code',$request['unique_code']);
        $this->db->where('userMatchid',$request['userMatchid']);
        $resp = $this->db->get('user_contest')->row();
        if($resp)
        {
            return $resp;
        }    
        else
         {
            return false;
         }   

    }
    
    function update_private_contest($response)
    {
        $data = array('publish' =>'1');
        $this->db->where('user_Contestid',$response['contest_id']);
        $this->db->where('userId',$response['user_id']);
        $this->db->update('user_contest',$data);
    }
    
    function update_profile_image($data , $user_id)
    {
        $this->db->where('user_id',$user_id);
        $update = $this->db->update('registration',$data);
        //echo $this->db->last_query(); die();
        if($update)
        {
            return true;
        }    
        else
        {
            return false;
        }    
    }
    
    function match_score($id)
    { 
        $this->db->where('match_id',$id);
        $resp = $this->db->get('match')->row();        
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }    
    }
    
     function get_team_unique_id($u_id)
    {
        $this->db->select('team_id');
        $this->db->where('unique_id',$u_id);
       return  $this->db->get('team')->row()->team_id;
    }

    function get_team_id_in_matchtable($team_uid)
    {
        $this->db->select('teamid1');
        $this->db->where('teamid1',$team_uid);
        $resp = $this->db->get('match')->row()->teamid1;
        if($resp)
        {
            return $resp;
        }    
        else
        {
            return false;
        }    
    }

    function update_match_status_by_unique_id_user($id,$data)
    {
        $this->db->where('match_id', $id);
        $this->db->update('my_match', $data);
    }
    
    function get_team_count_for_match($request)
    {
        $this->db->select('*');
        $this->db->where('contest_id',$request['contest_id']);
        $this->db->where('user_id',$request['user_id']);
        $record = $this->db->get('my_match')->num_rows();

        if($record !="")
        {
            return $record;
        }
        else
        {
            return 0;
        }    

    }

    function get_total_contest_for_match($id)
    {
        //print_r($id);die();
        $this->db->select('contest_id');
        $this->db->where('match_id',$id);
        $record = $this->db->get('contest')->result_array();

        if($record >0)
        {
            return $record;
        }
        else
        {
            return false;
        } 
    }
    
    

}
