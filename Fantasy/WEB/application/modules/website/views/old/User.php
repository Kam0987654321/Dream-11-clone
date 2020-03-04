<?php  require APPPATH.'/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class User extends REST_Controller
{
	public $apikey = 'c38b9c19366449cf4ffbd6621eab61e2';
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Webservice_model');		
		$this->load->library('email',array(
			'mailtype'  => 'html',
			'newline'   => '\r\n'
		));

		header('Access-Control-Allow-Origin: *');
		header("Content-Type:application/json");
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method , Authentication");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		$method = $_SERVER['REQUEST_METHOD'];
		if($method == "OPTIONS") {
    	die();
		if ($this->input->server('REQUEST_METHOD') == 'GET')
			$postdata = json_encode($_GET);
		else if ($this->input->server('REQUEST_METHOD') == 'POST')
			$postdata = file_get_contents("php://input");
		
		$auth = '';

			if(isset(apache_request_headers()['Auth'])) {
	        	$auth = apache_request_headers()['Auth'];
	    	}
		
		}
	}
	
	//API for user registration 
	function user_registration_post()
	{	
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$otp = rand(1111,9999);	
		$result_mob = $this->Webservice_model->user_reg_mobile($request);
		if($result_mob!="")
		{
			$result_email = $this->Webservice_model->user_reg_email($request);
			if($result_email !="")
			{
				$num = rand(1111,9999);
				$em = substr($request['email'],0, 4);
				$referral_code = strtoupper($em) . $num;
				
				if($request['code'] !="")
				{
					$referral = $this->Webservice_model->referral_code($request);
					if($referral =="")
					{
						$result = array('status'=>'error','message' =>"Referral code does not exist.",'responsecode'=>'500','data'=>"");
					}
					else
					{
						$result_both = $this->Webservice_model->referral_code_registration($request,$otp,$referral_code,$referral);
						if($result_both!="")
						{	
							$moblie = $result_both->mobile;
							$message = "Your otp is" ." ".$otp;				
							$resp = $this->send_sms($moblie,$message);
							if($resp)
							{
								$result = array('status'=>'success','message' =>"Registration done",'responsecode'=>'200','data'=>$result_both);
							}					
						}
						else
						{   		
							$result = array('status'=>'error','message' =>"Mobile number and email exist. ",'responsecode'=>'500','data'=>"");
						}	
					}	
				}	
				else
				{
					$result_both = $this->Webservice_model->user_reg($request,$otp,$referral_code);
				
					if($result_both!="")
					{	
						$moblie = $result_both->mobile;
						$message = "Your otp is" ." ".$otp;				
						$resp = $this->send_sms($moblie,$message);
						if($resp)
						{
							$result = array('status'=>'success','message' =>"Registration done",'responsecode'=>'200','data'=>$result_both);
						}					
					}
					else
					{   		
						$result = array('status'=>'error','message' =>"Mobile number and email exist. ",'responsecode'=>'500','data'=>"");
					}
				}			
			}	
			else
			{
				$result = array('status'=>'error','message' =>"Email id exist",'responsecode'=>'500','data'=>"");
			}	
		}	
		else
		{
			$result = array('status'=>'error','message' =>"Mobile Number exist",'responsecode'=>'500','data'=>"");
		}	
		
		$this->response($result);    	
	}

	// API for user login
	function login_post()
	{	
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true);
		$randomnumber = rand(11111,99999);
		$result = $this->Webservice_model->login($request ,$randomnumber);
		header('Content-type: application/json');

		if($request['type'] =="Normal")
		{
			if($result){
			$result = array('status' =>'success','data'=>$result,'message' =>"Data found",'responsecode'=>'200');
			}
			else
			{
				$result = array('status' =>'False','data'=>"",'message' =>"Your email or mobile and password is not correct",'responsecode'=>'500');
			}	
		}
		else if($request['type'] =="Email")
		{
			if($result){
			$result = array('status' =>'success','data'=>$result,'message' =>"Data found",'responsecode'=>'200');
			}
			else
			{
				$result = array('status' =>'False','data'=>"",'message' =>"Your email or mobile and password is not correct",'responsecode'=>'500');
			}	
		}	
		
		else{

		$res = $this->Webservice_model->check_registration($request);

			$result = array('status' =>'False','message'=>'Your email or mobile is not registred','responsecode'=>'500','data'=>"");			
		}

		$this->response($result);

	}	

	//API for forgot password
	function forget_password_post()
    {
    	header('Content-type: application/json');
    	if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }

		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true);

		if($request['type'] == "Number")
		{
			$number = $request['EmailorNumber'];
			$this->db->from('registration');
	        $this->db->where('mobile',$number);
	        $query=$this->db->get();
	        if($query->num_rows()>0)
        	{
        		$result=$query->row();
        		$type = $result->type;
        		if($type =="Normal")
        		{
        			$moblie = $result->mobile;

	        		$otp = rand(1111,9999);	
	        		$respe = $this->Webservice_model->forget_password($otp,$moblie);
	        		$message = "Your otp is" ." ".$otp;				
					$resp = $this->send_sms($moblie,$message);
					if($resp !="")
					{
						$result = array('status'=>'success','message' =>"Otp send successfully",'responsecode'=>'200','data'=>$respe);
					}
        		}
        		else
        		{
		            $result =  Array("status" => "error", "message" => "Your account type is ".$type." so login with ".$type."" ,"responsecode"=>500, "data"=>"");
        		}	

        	}
        	else
        	{
        		$result = array('status'=>'error','message' =>"Mobile Number not exist",'responsecode'=>'500','data'=>"");
        	}	
		}
		else
		{

			$email = $request['EmailorNumber'];
	        $this->db->from('registration');
	        $this->db->where('email',$email);
	        $query=$this->db->get();
	        if($query->num_rows()>0)
	        {
	            $result=$query->row();

	            $type = $result->type;	      
	           
	            if($type =="Facebook")
	            {   
	              $result =  Array("status" => "error", "message" => "Your registration type is Facebook so login with Facebook" ,"responsecode"=>500, "data"=>"");
	            }
	            else if($type =="Google"){
	                $result = Array( 'status' => 'error',"message" => "Your registration type is  Google so login with Google","responsecode"=>500, "data"=>"");
	            }
	            else if($type =="Normal"){
	                $moblie = $result->mobile;

	        		$otp = rand(1111,9999);	
	        		$respe = $this->Webservice_model->forget_password($otp,$moblie);
	        		$message = "Your otp is" ." ".$otp;				
					$resp = $this->send_sms($moblie,$message);
					if($resp !="")
					{
						$result = array('status'=>'success','message' =>"Otp send successfully",'responsecode'=>'200','data'=>$respe);
					}
	            }
	        }
	        else{
	            $result = Array('status' => 'error', "responsecode"=>500, "data"=>"" ,"message" => "Email Id Not Exist");
	        }
		}	

        $this->response($result);
    }
	
	//API for send SMS
	function send_sms($contact_no,$message){		
		//Your authentication key
		$authKey = "460caaf93f3be7c7bea569676a08807c";
		//Multiple mobiles numbers separated by comma
		$mobileNumber = $contact_no;
		//Sender ID,While using route4 sender id should be 6 characters long.
		$senderId = "DREAMS";
		//Your message to send, Add URL encoding here.
		$message = $message;
		//Define route 
		$route = "4";
		//Prepare you post parameters
		$postData = array(
		    'authkey' => $authKey,
		    'mobiles' => $mobileNumber,
		    'message' => $message,
		    'sender' => $senderId,
		    'route' => $route
		);
		//API URL
		$url = "http://sms.bulksmsserviceproviders.com/api/send_http.php";
		// init the resource
		$ch = curl_init();
		curl_setopt_array($ch, array(
		    CURLOPT_URL => $url,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_POST => true,
		    CURLOPT_POSTFIELDS => $postData
		    //,CURLOPT_FOLLOWLOCATION => true
		));
		//Ignore SSL certificate verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		//get response
		$output = curl_exec($ch);
		//Print error if any
		if (curl_errno($ch)) {
		    echo 'error:' . curl_error($ch);
		}
		curl_close($ch);
		
		return true;

	}

	// API for user number verify
	function user_number_verify_post()
	{	
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 					
		$resp = $this->Webservice_model->number_verify($request);
		header('Content-type: application/json');
		
		if($resp!="")
		{
			$result = array('status'=>'success','message' =>"Number verification done",'responsecode'=>'200','data'=>"");
		}
		else
		{   		
			$result = array('status'=>'error','message' =>"Number verification not done",'responsecode'=>'500','data'=>"");
		}

		$this->response($result);    	
	}

	// API for verify forgot password by OTP
	function varify_forgot_password_post()
	{
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->varify_forgot_password($request);
		if($resp!="")
		{
			$result = array('status'=>'success','message' =>"Otp verification done",'responsecode'=>'200','data'=>$resp);
		}
		else
		{   		
			$result = array('status'=>'error','message' =>"Otp verification not done",'responsecode'=>'500','data'=>"");
		}

		$this->response($result);  
	}

	// API for change password
	function update_password_post()
	{
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->update_password($request);
		if($resp!="")
		{
			$result = array('status'=>'success','message' =>"Password update successfully",'responsecode'=>'200','data'=>"");
		}
		else
		{   		
			$result = array('status'=>'error','message' =>"Password not update ",'responsecode'=>'500','data'=>"");
		}
		$this->response($result);  
	}

	// API for edit user profile by user id
	function edit_profile_post()
	{
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->user_profile($request);
		if($resp!="")
		{
			$result = array('status'=>'success','message' =>"User profile update successfully",'responsecode'=>'200','data'=>"");
		}
		else
		{   		
			$result = array('status'=>'error','message' =>"User profile not update ",'responsecode'=>'500','data'=>"");
		}

		$this->response($result);  
	}

	// API to get all state 
	function get_state_get()
	{
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->get_state();
		
		if($resp!="")
		{
			$result = array('status'=>'success','message' =>"State found successfully",'responsecode'=>'200','data'=>$resp);
		}
		else
		{   		
			$result = array('status'=>'error','message' =>"State not found",'responsecode'=>'500','data'=>"");
		}

		$this->response($result);  
	}

	// API to get all city by state id
	function get_city_post()
	{
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->get_city($request);
		
		if($resp!="")
		{
			$result = array('status'=>'success','message' =>"Citys found successfully",'responsecode'=>'200','data'=>$resp);
		}
		else
		{   		
			$result = array('status'=>'error','message' =>"Citys not found",'responsecode'=>'500','data'=>"");
		}

		$this->response($result);  
	}

	// API for view profile by user id
	function view_profile_post()
	{
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->view_user_profile($request);
		
		if($resp!="")
		{
			$fav_team =	explode(',',$resp->favriteTeam);
			
			$fav = $this->Webservice_model->fave_team_name($fav_team);

			foreach ($fav as $value) {
			
				$team[] = $value->team_name;
				
			}
			$resp->favriteTeam =implode(",",$team);
		
			$resp->country = "India";
			$result = array('status'=>'success','message' =>"Profile data found successfully",'responsecode'=>'200','data'=>$resp);
		}
		else
		{   		
			$result = array('status'=>'error','message' =>"Profile data  not found",'responsecode'=>'500','data'=>"");
		}
		$this->response($result);  
	}

	// API to get match record according to type// Fixture,Live,Result
	function match_record_post()
  	{
	    header('Content-type: application/json');
	    $postdata = file_get_contents("php://input");
	    $request = json_decode($postdata,true); 
	    $resp = $this->Webservice_model->match_record($request);
	    
	    if(count($resp) >0){
	    foreach ($resp as $key) { 

	    	$short_name =  explode('vs',$key->title);
	        $key->team_name1 = $this->db->get_where('team',array('team_id'=>$key->teamid1))->row()->team_name;
	        $team_image1 = $this->Webservice_model->team_image($key->teamid1);
	         $key->team_image1 = $team_image1;        
	        $key->team_short_name1 =$short_name[0];
	        $key->team_short_name2 =$short_name[1]; 

	        $key->team_name2 = $this->db->get_where('team',array('team_id'=>$key->teamid2))->row()->team_name;
	        $team_image2 = $this->Webservice_model->team_image($key->teamid2);
	        $key->team_image2 = $team_image2; 	         
	    
	        if($key->match_status == "Fixture")
	        {
	           $t2 = $key->time;

	      		$res = "";
	      		$seconds = strtotime($t2) - strtotime(date('Y-m-d H:i:s'));
	      		$res = $seconds = floor(($seconds + ($days * 86400) + ($hours * 3600) + ($minutes*60)));
	      		$key->time = $res;
	          
	        } 
	        else
	        {
	           $key->time = 00;
	        } 
	      
	    } }
	    
	    if($resp!="")
	    {
	      $result = array('status'=>'success','message' =>" data found successfully",'responsecode'=>'200','data'=>$resp);
	    }
	    else
	    {       
	      $result = array('status'=>'error','message' =>" data  not found",'responsecode'=>'500','data'=>"");
	    }
	    $this->response($result);  
  	}

	// API for resend otp
	function resend_otp_post()
	{	
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true);
		$result = $this->Webservice_model->resend_otp($request);
		header('Content-type: application/json');
		if($result){	
			$moblie = $result->mobile;
			$message = "Your otp is" ." ".$result->otp;
			$resp = $this->send_sms($moblie,$message);

			$result = array('status' =>'success','data'=>$result,'message' =>"Otp send successfully",'responsecode'=>'200');
		}else{			
			$result = array('status' => 'error','message'=>'user id invalid','responsecode'=>'500','data'=>"");
		}
		$this->response($result);

	}

	// API for change password
	function change_password_post()
	{	
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true);
		$result = $this->Webservice_model->change_password($request);
		header('Content-type: application/json');
		if($result){
			$record = $this->Webservice_model->update_password($request);
			if($record)
			{
				$response = array('status' =>'success','data'=>"",'message' =>"Password update successfully",'responsecode'=>'200');
			}	
			else
			{
				$response= array('status' =>'error','data'=>"" ,'message' =>"Password not update",'responsecode'=>'500');
			}	
			
		}else{
			
			$response = array('status' => 'error','message'=>'Old password not match ','responsecode'=>'500','data'=>"");
		}
		$this->response($response);

	}

	// API to get list of match record by user id
	function mymatch_record_post()
	{
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->mymatch_record($request);
		foreach ($resp as $key) { 
		$contest_count = $this->Webservice_model->contest_count($key->match_id,$key->user_id);
		
		$team_count = $this->Webservice_model->team_count($key->match_id,$key->user_id);
		$key->contest_count = $contest_count;
		$key->team_count = $team_count;
        $key->team_name1 = $this->db->get_where('team',array('team_id'=>$key->teamid1))->row()->team_name;
        $key->team_image1 = $this->db->get_where('team',array('team_id'=>$key->teamid1))->row()->team_image;
        $key->team_short_name1 = $this->db->get_where('team',array('team_id'=>$key->teamid1))->row()->team_short_name;

        $key->team_name2 = $this->db->get_where('team',array('team_id'=>$key->teamid2))->row()->team_name;
        $key->team_image2 = $this->db->get_where('team',array('team_id'=>$key->teamid2))->row()->team_image;
        $key->team_short_name2 = $this->db->get_where('team',array('team_id'=>$key->teamid2))->row()->team_short_name;

       	if($key->match_status == "Fixture")
       	{
       		$t2 = $key->time;

			$res = "";
			$seconds = strtotime($t2) - strtotime(date('Y-m-d H:i:s'));
			$res = $seconds = floor(($seconds + ($days * 86400) + ($hours * 3600) + ($minutes*60)));
			$key->time = $res;
       		
       	}	
       	else
       	{
       		$key->time = 00;
       	}	
  		
        }
		
		if(count($resp) >"0")
		{
			$result = array('status'=>'success','message' =>" data found successfully",'responsecode'=>'200','data'=>$resp);
		}
		else
		{   		
			$result = array('status'=>'error','message' =>" data  not found",'responsecode'=>'500','data'=>"");
		}
		$this->response($result);  
	}

	//Api for contest list by type // All/ Hot/ Mega 
	function contest_list_post()
	{
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->contest_list($request);

		foreach ($resp as $key) {
			$key->remaining_team = $key->total_team - $key->join_team;
		}
		if(count($resp) >"0")
		{
			$result = array('status'=>'success','message' =>" Contest list found successfully",'responsecode'=>'200','data'=>$resp);
		}
		else
		{   		
			$result = array('status'=>'error','message' =>" Contest list not found",'responsecode'=>'500','data'=>"");
		}
		$this->response($result);  
	}

	//Api for get winning information by contest id
	function winning_info_post()
	{
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->winning_info($request);		
		if($resp !="")
		{
			$result = array('status'=>'success','message' =>"Winning information found",'responsecode'=>'200','data'=>$resp);
		}
		else
		{   		
			$result = array('status'=>'error','message' =>"No data found",'responsecode'=>'500','data'=>"");
		}
		$this->response($result);  
	}  

	//Api for team list by match id not in use
	function team_list_old_post()
	{
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->team_list($request);
		foreach ($resp as  $value) {
			$number = $this->Webservice_model->team_number($value->matchid,$value->teamid);
			if($number !="")
			{
				$value->team_number = "1";
			}	
			else
			{
				$value->team_number = "2";
			}		
	 		$team = $this->Webservice_model->team_name($value->teamid);
	 		$player =$this->Webservice_model->player_name($value->playerid);
	 		$name = explode(" ", $player->name);
	 		$fname = str_split($name[0]);
	 		$desigination =$this->Webservice_model->player_desigination($player->designationid);
	 		$value->team_name = $team->team_name;
	 		$value->team_image = $team->team_image;
	 		$value->short_name = $team->team_short_name;
	 		$value->player_name =$player->name;
	 		$value->player_shortname = $fname[0].". ".$name[1];
	 		$value->player_points ="00";
	 		$value->credit_points =$player->credit_points;
	 		$value->player_image =$player->image;
	 		$value->player_desigination =$desigination->title;
	 		$value->player_desigination_short_name =$desigination->short_term;
		 }		
		if(count($resp) >"0")
		{
			$result = array('status'=>'success','message' =>"Team information found",'responsecode'=>'200','data'=>$resp);
		}
		else
		{   		
			$result = array('status'=>'error','message' =>"No data found",'responsecode'=>'500','data'=>"");
		}
		$this->response($result);  
	}

	//Api for team list by match id join contest by user
	function leaderboard_post()
	{
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->leaderboard($request);
		if($resp !="")
		{
			$this->update_leaderboard($request);

			$result = array('status'=>'success','message' =>"Leader board data",'responsecode'=>'200','data'=>$resp);
		}
		else
		{   		
			$result = array('status'=>'error','message' =>"No data found",'responsecode'=>'500','data'=>"");
		}
		$this->response($result);  
	}

	//Api for get player information by player id
	function player_information_post()
	{
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->player_information($request);		
		$day = new DateTime($resp->dob); 
		$resp->dob = $day->format('F jS, Y');
		if($resp !="")
		{
			$result = array('status'=>'success','message' =>"Player information",'responsecode'=>'200','data'=>$resp);
		}
		else
		{   		
			$result = array('status'=>'error','message' =>"No data found",'responsecode'=>'500','data'=>"");
		}
		$this->response($result);  
	}

	// API for team list by user id and team id
	function team_list_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        	$auth = apache_request_headers()['Auth'];
	    }	    

	    	$postdata = file_get_contents("php://input");
			$request = json_decode($postdata,true); 
			$players = $this->Webservice_model->get_myteam_player_id($request['user_id'], $request['my_team_id']);
	     	foreach ($players as $player) {
			 	$pla[] = $player->player_id;
			}
	    	$resp = $this->Webservice_model->team_list1($request);
	    	
	    	foreach ($resp as  $value) {

				if(in_array($value->playerid,$pla))
				{
					$value->is_select = "1";
				}	
				$number = $this->Webservice_model->team_number($value->matchid,$value->teamid);
				if($number !="")
				{
					$value->team_number = "1";
				}	
				else
				{
					$value->team_number = "2";
				}	
		 		$name = explode(" ", $value->name);
		 		$fname = str_split($name[0]);
		 		if($name[2] !="")
		 		{
			 		$fname = str_split($name[0]);
			 		$value->player_shortname = $fname[0].". ".$name[2];
		 		}	
		 		else
		 		{
		 			$fname = str_split($name[0]);
		 			$value->player_shortname = $fname[0].". ".$name[1];
		 		}
		 		$value->player_points ="00";
		 		$value->player_desigination =$value->title;		 	
			}		
			if(count($resp) >"0")
			{
				$result = array('status'=>'success','message' =>"Team information found",'responsecode'=>'200','data'=>$resp);
			}
			else
			{   		
				$result = array('status'=>'error','message' =>"No data found",'responsecode'=>'500','data'=>"");
			}	   
		
		$this->response($result);  
	}

	//Api for save team list   
	function save_team_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        	$auth = apache_request_headers()['Auth'];
	    }
	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->selected_player_byuser($request);	
		if($request['edit'] =="1")
		{
			$resp = $this->Webservice_model->selected_player_byuser($request);
			if($resp !="")
			{
				$result = array('status'=>'success','message' =>"User team update successfully",'responsecode'=>'200','data'=>$resp);
			}
			else
			{   		
				$result = array('status'=>'error','message' =>"Try again",'responsecode'=>'500','data'=>"");
			}
		}
		else
		{
			if($resp !="")
			{
				$result = array('status'=>'success','message' =>"User team create successfully",'responsecode'=>'200','data'=>$resp);
			}
			else
			{   		
				$result = array('status'=>'error','message' =>"Try again",'responsecode'=>'500','data'=>"");
			}
		}	
		
		$this->response($result);  
	}

	//Api for get team list  by user id
	function user_team_list_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        	$auth = apache_request_headers()['Auth'];
	    }
	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->selected_player_list_by_userid($request);	
		foreach ($resp as $value) {

		$player = $this->Webservice_model->player_name($value->player_id);
		$designation = $this->Webservice_model->player_desigination($value->designationid);
		$value->player_name = $player->name;
		$value->player_credit_points = $player->credit_points;
		$value->player_image = $player->image;
		$value->player_title = $designation->title;
		$value->player_short_term = $designation->short_term;

		if($value->is_captain =="1")
		{
			$value->is_captain = "captain";
		}
		else
		{
			$value->is_captain = "no";
		}	
		if($value->is_vicecaptain =="1")
		{
			$value->is_vicecaptain = "vicecaptain";
		}
		else
		{
			$value->is_vicecaptain = "no";
		}	
				
			}	
		if($resp !="")
		{
			$result = array('status'=>'success','message' =>"Team list",'responsecode'=>'200','data'=>$resp);
		}
		else
		{   		
			$result = array('status'=>'error','message' =>"No record found",'responsecode'=>'500','data'=>"");
		}
	   
		
		$this->response($result);  
	}

	//Api for get user team list  by user id and match id
	function my_team_list_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        	$auth = apache_request_headers()['Auth'];
	    }
	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->user_team_list($request);	
		$i = 1;
		foreach ($resp as $value){
			$bat = 	$this->Webservice_model->count_batsman($value->id);
			$ball =	$this->Webservice_model->count_boller($value->id);
			$all =	$this->Webservice_model->count_allrounder($value->id);
			$wkeeper =$this->Webservice_model->count_wkeeper($value->id);
			$captain =$this->Webservice_model->captain($value->id);
			$vicecaptain =$this->Webservice_model->vicecaptain($value->id);
			$value->team_number = "Team " .$i;
			$value->captain =	$captain->name;
			$value->vicecaptain =	$vicecaptain->name;
			$value->batsman = $bat;
			$value->boller = $ball;
			$value->allrounder = $all;
			$value->wkeeper = $wkeeper;

			$i++;
		}

		if(count($resp) > 0)
		{
			$result = array('status'=>'success','message' =>"Team list",'responsecode'=>'200','data'=>$resp);
		}
		else
		{   		
			$result = array('status'=>'error','message' =>"No record found",'responsecode'=>'500','data'=>"");
		}
		
		$this->response($result);  
	}

	//Api for join match contest by user
	function join_contest_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }
	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 

		$credit_amount = $this->Webservice_model->credit_amount($request);

		$debit_amount = $this->Webservice_model->debit_amount($request);	
		$bonus_credit = $this->Webservice_model->bonus_amount($request);
		$bonus_debit = $this->Webservice_model->bonus_amount_debit($request);
		$bonus = $bonus_credit-$bonus_debit;
		
		$winning_credit = $this->Webservice_model->winning_amount($request);
		$winning_debit = $this->Webservice_model->winning_amount_debit($request);

		$credit = $credit_amount - $debit_amount;
		$winning = $winning_credit - $winning_debit;

		$contest_fees = $this->Webservice_model->get_contest($request['contest_id']);

		$profile = $this->Webservice_model->view_user_profile($request);

		$re['code'] = $profile->code;

		$referral_user = $this->Webservice_model->referral_code($re);
		if($referral_user !="")
		{
			$reffer = $referral_user;
		}	
		else
		{
			$reffer ="";
		}	

		$contest_fee = $contest_fees->entry;
		$referral_bonus = round($contest_fee/100*33.33,2);
		$contest_amount = $request['contest_amount'];
		if($contest_fee > $contest_amount)
		{
			$bonus_amt = $contest_fee - $contest_amount;

			$bonus_10_percent = $contest_fee/100*10;

			if("$bonus_10_percent" == "$bonus_amt")
			{
				if($credit > 0)
				{ 
					$resp = $this->Webservice_model->join_contest($request);	
		
					if($resp !="")
					{
						if($credit < $request['contest_amount'])
						{
							$remaining_amount = $request['contest_amount'] - $credit;
							$ckeck_bonus_fee = $this->Webservice_model->join_contest_with_credit_and_winning_fees($request,$bonus_amt,$reffer,$credit,$remaining_amount); 
						}
						else 
						{
							$ckeck_bonus_fee = $this->Webservice_model->join_contest_with_bonus_fees($request,$bonus_amt,$reffer);
						}	
						if($referral_user !="")
						{
							$this->Webservice_model->user_referral_bonus($request,$referral_bonus,$reffer);
						}	

						$result = array('status'=>'success','message' =>"Contest joined successfully",'responsecode'=>'200','data'=>"");
					}
					else
					{
						$result = array('status'=>'error','message' =>"You have joined with this team please select other team",'responsecode'=>'500','data'=>"");
					}
				}	
				else if($winning >= $contest_amount)
				{
					$resp = $this->Webservice_model->join_contest($request);	
		
					if($resp !="")
					{
						$ckeck_bonus_fee = $this->Webservice_model->join_contest_with_bonus_fees_winning($request,$bonus_amt,$reffer); 
						if($referral_user !="")
						{
							$this->Webservice_model->user_referral_bonus($request,$referral_bonus,$reffer);
						}	

						$result = array('status'=>'success','message' =>"Contest joined successfully",'responsecode'=>'200','data'=>"");
					}
					else
					{
						$result = array('status'=>'error','message' =>"You have joined with this team please select other team",'responsecode'=>'500','data'=>"");
					}
				}	
				else
				{
					$result = array('status'=>'error','message' =>"You dont have sufficient amount",'responsecode'=>'500','data'=>"");
				}					
			}
			else 
			{
				$result = array('status'=>'error','message' =>"You dont have sufficient bonus amount",'responsecode'=>'500','data'=>"");
			}

		}
		else
		{
			if($credit > 0 )
			{
				$resp = $this->Webservice_model->join_contest($request);	

				if($resp !="")
				{					
					if($credit < $request['contest_amount'])
					{
						$remaining_amount = $request['contest_amount'] - $credit;
						$ckeck_bonus_fee = $this->Webservice_model->join_contest_with_credit_and_winning_fees_amount($request,$reffer,$remaining_amount,$credit); 
					}
					else
					{
						$ckeck_bonus_fee = $this->Webservice_model->join_contest_without_bonus_fees($request,$reffer);
					}	
					
					if($referral_user !="")
						{
							$this->Webservice_model->user_referral_bonus($request,$referral_bonus,$reffer);
						}	

					$result = array('status'=>'success','message' =>"Contest joined successfully",'responsecode'=>'200','data'=>"");
				}
				else
				{
					$result = array('status'=>'error','message' =>"You have joined with this team please select other team",'responsecode'=>'500','data'=>"");
				}
			}	
			else
			{
				$resp = $this->Webservice_model->join_contest($request);	
		
				if($resp !="")
				{
					$ckeck_bonus_fee = $this->Webservice_model->join_contest_with_bonus_fees_winning($request,$bonus_amt,$reffer); 
						if($referral_user !="")
						{
							$this->Webservice_model->user_referral_bonus($request,$referral_bonus,$reffer);
						}	

					$result = array('status'=>'success','message' =>"Contest joined successfully",'responsecode'=>'200','data'=>"");
				}
				else
				{
					$result = array('status'=>'error','message' =>"You have joined with this team please select other team",'responsecode'=>'500','data'=>"");
				}
			}	
			
		}	

		$this->response($result);  
	}

	//Api for user join match contest list by user id and match id
	function my_join_contest_list_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }
	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->my_join_contest($request);	
		$user_id = $request['user_id'];
		foreach ($resp as $contest) {
			$data[] =	$this->Webservice_model->get_contest($contest->contest_id);
			
		}
		foreach ($data as $key ) {

		$key->remaining_team = $key->total_team - $key->join_team;
		$count = $this->Webservice_model->team_count_for_contest($key->contest_id,$user_id);
		$key->team_count = $count;
			
		}
		if($data !="")
		{
			$result = array('status'=>'success','message' =>"Contest List ",'responsecode'=>'200','data'=>$data);
		}
		else
		{
			$result = array('status'=>'error','message' =>"No contest found",'responsecode'=>'500','data'=>"");
		}

		$this->response($result);  
	}

	// API for joined contest list 
	function joined_contest_post()  
	{
		header('Content-type: application/json');
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->contest_list_by_id($request);
		$re['matchid'] = $resp->match_id;
		$this->update_leaderboard_user($re);
		$leaderboards_session_user = $this->Webservice_model->leaderboard_contest_id($request);
		$leaderboards_non_session_user = $this->Webservice_model->leaderboard_contest_other_user_id($request);

		$leaderboards = array_merge($leaderboards_session_user,$leaderboards_non_session_user);
		$match_status = $this->Webservice_model->match_status($request);
		if($match_status->match_status =="Fixture")
		{
			$resp->match_status ="0";
		}	
		else
		{
			$resp->match_status ="1";
		}	

		$resp->user_team_count = $this->Webservice_model->team_count_contest($request);
		$resp->all_team_count = $this->Webservice_model->all_team_count_contest($request);
		$resp->remaining_team =$resp->total_team - $resp->join_team;
			$i =1;
		foreach ($leaderboards as $leaderboardq) {
			if($match_status->match_status =="Live")
			{
				if($match_status->time =="0000-00-00 00:00:00")
				{
					if($leaderboardq->rank !="-")
					{
						$price = $this->Webservice_model->get_price($leaderboardq->rank,$resp->contest_id);
						$leaderboardq->winning_amount = $price;
					}	
					else
					{
						$leaderboardq->rank ="1";
					}	
					
				}
				else
				{
					$leaderboardq->rank ="1";
				}	
				
			}
			else if($match_status->match_status =="Result")
			{
				$price = $this->Webservice_model->get_price($leaderboardq->rank,$resp->contest_id);
				$leaderboardq->winning_amount = $price;
			}
			if($leaderboardq->user_id == $request['user_id'])
			{
				$leaderboardq->Team = "$i";				
			}
			else
			{
				$leaderboardq->Team = "1";
			}	
			$resp->leaderboard[] = $leaderboardq;
			$i++;
		}
		

		if($resp !="")
		{
			$result = array('status'=>'success','message' =>" Contest list found successfully",'responsecode'=>'200','data'=>$resp);
		}
		else
		{   		
			$result = array('status'=>'error','message' =>" Contest list not found",'responsecode'=>'500','data'=>"");
		}
		$this->response($result);  
	}

	//Api for get user team list  by user id and team id
	function my_joined_team_list_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        	$auth = apache_request_headers()['Auth'];
	    }
	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->my_joined_team_list($request);	
			
			foreach ($resp as  $value) {

			$player = 	$this->Webservice_model->player_points_for_user($value->player_id,$value->my_team_id);
			$value->is_captain= $player->is_captain;
			$value->is_vicecaptain= $player->is_vicecaptain;
			
			$value->points = $player->total_points + $player->bolling_points + $player->fielding_points + $player->second_innings_batting + $player->second_innings_bolling + $player->second_innings_fielding;
				$name = explode(" ", $value->name);
				
		 		if($name[2] !="")
		 		{
			 		$fname = str_split($name[0]);
			 		$value->player_shortname = $fname[0].". ".$name[2];
		 		}	
		 		else
		 		{
		 			$fname = str_split($name[0]);
		 			$value->player_shortname = $fname[0].". ".$name[1];
		 		}	
			}

		if($resp !="")
		{
			$result = array('status'=>'success','message' =>"Team list",'responsecode'=>'200','data'=>$resp);
		}
		else
		{   		
			$result = array('status'=>'error','message' =>"No record found",'responsecode'=>'500','data'=>"");
		}
	   
		
		$this->response($result);  
	}

	//Api for user join match contest list live by user id and match id
	function my_join_contest_list_live_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->my_join_contest_live($request);
		//echo $this->db->last_query();die();

		$user_id = $request['user_id'];
		foreach ($resp as $contest) {
			$data[] =	$this->Webservice_model->get_contest_live($contest->my_match_id);	
		}
		$teams = $this->Webservice_model->match_team($request);
		
			$i=1;
			foreach ($teams as $team) {
				$team->name ="Team ". $i;
				$i++;
			 } 	
			
		foreach ($data as $key ) {	
			if($key->match_status == "Live")
			{			
				$this->update_rank_user($key->match_id);		
				$key->winning_amount ="00";
				if($key->rank =="-")
				{
					$key->rank ="1";
				}
				else
				{
					$rank = $this->Webservice_model->get_rank($key->contest_id,$key->match_id,$key->my_team_id);
					$key->rank = $rank->rank;
				}	
			}
			else if($key->match_status =="Result")
			{			
				$this->update_rank_user($key->match_id);	
				$leaderboardq = $this->Webservice_model->get_rank($key->contest_id,$key->match_id,$key->my_team_id);
				$key->rank =$leaderboardq->rank;
			 	$price = $this->Webservice_model->get_price($leaderboardq->rank,$key->contest_id);
			 	$key->winning_amount = $price;		 	
			}	
			foreach ($teams as $team) {
		 		if($team->id == $key->my_team_id)
		 		{
		 			$key->team_name = $team->name;
		 		}		
			}
			$key->remaining_team = $key->total_team - $key->join_team;
			
			$batting = $this->Webservice_model->my_team_player_batting($request['user_id'], $key->my_team_id);
			$balling = $this->Webservice_model->my_team_player_balling($request['user_id'], $key->my_team_id);
			$fielding = $this->Webservice_model->my_team_player_fielding($request['user_id'], $key->my_team_id);
			$second_innings_batting = $this->Webservice_model->my_team_player_batting_second($request['user_id'], $key->my_team_id);
			$second_innings_bolling = $this->Webservice_model->my_team_player_bolling_second($request['user_id'], $key->my_team_id);
			$second_innings_fielding = $this->Webservice_model->my_team_player_fielding_second($request['user_id'], $key->my_team_id);
			//echo $this->db->last_query();die();
			$total_points = $batting+$balling+$fielding+$second_innings_batting+$second_innings_bolling+$second_innings_fielding;

			$key->points = $total_points;
			$this->Webservice_model->update_leaderboard($key->contest_id,$key->my_team_id,$request['match_id'],$request['user_id'],$total_points);
		}
		
		if($data !="")
		{
			$result = array('status'=>'success','message' =>"Contest List ",'responsecode'=>'200','data'=>$data);
		}
		else
		{
			$result = array('status'=>'error','message' =>"No contest found",'responsecode'=>'500','data'=>"");
		}

		$this->response($result);  
	}

	function update_match_status_get()
	{
		$time = date('Y-m-d H:i:00');
		$response = $this->Webservice_model->get_match_status($time);
		if(count($response) >0)
		{
			foreach ($response as $resp) {
				$id = $resp->match_id;

				$api_url  =	"https://rest.entitysport.com/v2/matches/".$resp->unique_id."/info?token=".$this->apikey."";

		        $ch = curl_init();
		        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        curl_setopt($ch, CURLOPT_URL,$api_url);
		        $result=curl_exec($ch);
		        curl_close($ch);
		        $resp = json_decode(json_encode(json_decode($result)), True);

		        $match_status =  $resp['response']['status'];

		        if($match_status =="2")
		        {
		        	$data = array('time'=>"0000-00-00 00:00:00",
						"match_status" =>"Result",
						'matchStarted'=>'1'
					);
		        }
		        elseif($match_status =="3")
		        {
		        	$data = array('time'=>"0000-00-00 00:00:00",
						"match_status" =>"Live",
						'matchStarted'=>'1'
					);
		        	
		        }
		        elseif($match_status =="4")
		        {
		        	$data = array('time'=>"0000-00-00 00:00:00",
						"match_status" =>"Canceled",
						'matchStarted'=>'0'
					);
		        	
		        }

				$this->db->where('match_id',$id);
				$this->db->update('match',$data);

				$this->db->where('match_id',$id);
				$this->db->update('my_match',$data);
			}
		}		
	}

	// API for get notification list for user
	function notification_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->notification($request);	
		if(count($resp))
		{
			foreach ($resp as $value) {
				$match	= $this->Webservice_model->get_match($value->match_id);
				$contest	= $this->Webservice_model->get_contest($value->contest_id);

				$value->match_id =$match->match_id;
				$value->title =$match->title;
				$value->contest_id =$contest->contest_id;
				$value->contest_name =$contest->contest_name;
				$value->contest_description =$contest->contest_description;				
			}
		}	
		
		if(count($resp) >0)
		{
			$result = array('status'=>'success','message' =>"notification List ",'responsecode'=>'200','data'=>$resp);
		}
		else
		{
			$result = array('status'=>'error','message' =>"No notification found",'responsecode'=>'500','data'=>"");
		}

		$this->response($result);  
	}

	//API for get team list
	function get_team_list_get()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->get_all_team();
		if($resp !="")
		{
			$result = array('status'=>'success','message' =>"Team List ",'responsecode'=>'200','data'=>$resp);
		}
		else
		{
			$result = array('status'=>'error','message' =>"No Team found",'responsecode'=>'500','data'=>"");
		}

		$this->response($result);  
	}

	//API for update favrite team name
	function favrite_team_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->favrite_team($request);
		if($resp !="")
		{
			$result = array('status'=>'success','message' =>"Favrite Team update ",'responsecode'=>'200');
		}
		else
		{
			$result = array('status'=>'error','message' =>"Try again",'responsecode'=>'500','data'=>"");
		}

		$this->response($result);  
	}

	//API for add amount in user account by user id
	function add_amount_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$txn_status = strtoupper($request['transection_detail']['result']['status']);
		if($txn_status ==="SUCCESS")
		{
			$tx_status = "TXN_SUCCESS";
		}	
		else
		{
			$tx_status = $txn_status;
		}	

		$resp = $this->Webservice_model->add_amount($request,$tx_status);
		
		if($resp !="")
		{
			if($resp->transaction_status =="PENDING")
			{
				$result = array('status'=>'error','message' =>"TRANSACTION PENDING",'responsecode'=>'500','data'=>$resp);
			}
			else if($resp->transaction_status =="TXN_SUCCESS")
			{
				$result = array('status'=>'success','message' =>"TRANSACTION SUCCESSFULL",'responsecode'=>'200','data'=>$resp);
			}
			else if($resp->transaction_status =="FAILURE") 
			{
				$result = array('status'=>'error','message' =>"TRANSACTION FAILURE",'responsecode'=>'500','data'=>$resp);
			}	
		}
		else
		{
			$result = array('status'=>'error','message' =>"Try again",'responsecode'=>'500','data'=>"");
		}

		$this->response($result);  
	}

	// API for account details by user id
	function my_account_transaction_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$resp = $this->Webservice_model->account_details($request);
		if($resp !="")
		{			

			$result = array('status'=>'success','message' =>"Transaction details",'responsecode'=>'200','data'=>$resp);
		}
		else
		{
			$result = array('status'=>'error','message' =>"No details found",'responsecode'=>'500','amount'=>"0",'data'=>"");
		}

		$this->response($result);  
	}

	// API for my account details
	function my_account_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		$credit = $this->Webservice_model->credit_amount($request);		
		$debit = $this->Webservice_model->debit_amount($request);

		$bonus_credit = $this->Webservice_model->bonus_amount($request);
		$bonus_debit = $this->Webservice_model->bonus_amount_debit($request);

		$bonus = $bonus_credit-$bonus_debit;
				
		$winning_credit = $this->Webservice_model->winning_amount($request);
		$winning_debit = $this->Webservice_model->winning_amount_debit($request);

		$winning = $winning_credit - $winning_debit;
		if($credit !="")
		{
			$resp['total_amount'] = $credit + $winning - $debit;
			$resp['credit_amount'] = $credit - $debit;
		}
		else
		{
			$resp['total_amount'] ="0";
			$resp['credit_amount'] ="0";
		}	
		if($bonus > 0)
		{
			$resp['bonous_amount'] = $bonus; 
		}
		else 
		{	
			$resp['bonous_amount'] = "0"; 
		}
		if($winning >0)
		{
			$resp['winning_amount'] = $winning ; 
		}
		else 
		{	
			$resp['winning_amount'] = "0"; 
		}	
		
		$resp['credit_note'] = "Amount credit";
		$resp['bonous_note'] = "Bonus credit";
		$resp['winning_note'] = "Winning credit";
		if($resp !="")
		{
			$result = array('status'=>'success','message' =>"account details",'responsecode'=>'200','data'=>$resp);
		}
		else
		{
			$result = array('status'=>'error','message' =>"No details found",'responsecode'=>'500','amount'=>"0",'data'=>"");
		}

		$this->response($result);  
	}

	//API for update points for playing eleven
	function update_points_get()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true);
		$matchs = $this->Webservice_model->get_all_live_match();
	//echo "<pre>";	print_r($matchs);die();
		if(count($matchs) > 0)
		{	
			foreach ($matchs as $match) {

				$id = $this->Webservice_model->get_match($match->match_id);
				$api_url  = "https://rest.entitysport.com/v2/matches/".$id->unique_id."/squads?token=".$this->apikey."";

		        $ch = curl_init();
		        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        curl_setopt($ch, CURLOPT_URL,$api_url);
		        $result=curl_exec($ch);
		        curl_close($ch);
		        $resp = json_decode(json_encode(json_decode($result)), True);		      
		        $score = $this->Webservice_model->playing_eleven('1'); 
		        if($id->type =="ODI")
		        {	
		        	$teamA =  $resp['response']['teama'];
		    		foreach ($teamA['squads'] as $player) {
		    		  		
		    		  		if($player['playing11'] == "true")
		    		  		{
		    		  			$playerinfo = $this->Webservice_model->player_info($player['player_id']);
						 		$player_id = $playerinfo->id;  
						 		$this->Webservice_model->playing_eleven_score($score->odiscore,$player_id,$id->match_id);
						 		$this->user_playing_eleven($score->odiscore,$player_id,$id->match_id);
		    		  		}
		    		  }
		    		  $teamB =  $resp['response']['teamb'];
			    		foreach ($teamB['squads'] as $player) {
			    		  		
			    		  		if($player['playing11'] == "true")
			    		  		{
			    		  			$playerinfo = $this->Webservice_model->player_info($player['player_id']);
							 		$player_id = $playerinfo->id;  
							 		$this->Webservice_model->playing_eleven_score($score->odiscore,$player_id,$id->match_id);
							 		$this->user_playing_eleven($score->odiscore,$player_id,$id->match_id);
			    		  		}	
			    		  }  		      		
		        }
		        else if($id->type =="Twenty20" or $id->type =="T20")
		        {			    		
		    		$teamA =  $resp['response']['teama'];
		    		foreach ($teamA['squads'] as $player) {
		    		  		
		    		  		if($player['playing11'] == "true")
		    		  		{
		    		  			$playerinfo = $this->Webservice_model->player_info($player['player_id']);
						 		$player_id = $playerinfo->id;  
						 		$this->Webservice_model->playing_eleven_score($score->t20score,$player_id,$id->match_id);
						 		$this->user_playing_eleven($score->t20score,$player_id,$id->match_id);
		    		  		}	
		    		  }
		    		  $teamB =  $resp['response']['teamb'];
			    		foreach ($teamB['squads'] as $player) {	
			    		  		if($player['playing11'] == "true")
			    		  		{
			    		  			$playerinfo = $this->Webservice_model->player_info($player['player_id']);
							 		$player_id = $playerinfo->id;  
							 		$this->Webservice_model->playing_eleven_score($score->t20score,$player_id,$id->match_id);
							 		$this->user_playing_eleven($score->t20score,$player_id,$id->match_id);
			    		  		}	
			    		  }
		      		
		        }
		        else if($id->type =="Test")
		        {	
		        	$teamA =  $resp['response']['teama'];
		    		foreach ($teamA['squads'] as $player) {	
		    		  		if($player['playing11'] == "true")
		    		  		{
		    		  			$playerinfo = $this->Webservice_model->player_info($player['player_id']);
						 		$player_id = $playerinfo->id;  
						 		$this->Webservice_model->playing_eleven_score($score->testscore,$player_id,$id->match_id);
						 		$this->user_playing_eleven($score->testscore,$player_id,$id->match_id);
		    		  		}
		    		  }
		    		  $teamB =  $resp['response']['teamb'];
			    		foreach ($teamB['squads'] as $player) {
			    		  		
			    		  		if($player['playing11'] == "true")
			    		  		{
			    		  			$playerinfo = $this->Webservice_model->player_info($player['player_id']);
							 		$player_id = $playerinfo->id;  
							 		$this->Webservice_model->playing_eleven_score($score->testscore,$player_id,$id->match_id);
							 		$this->user_playing_eleven($score->testscore,$player_id,$id->match_id);
			    		  		}	

			    		  }	    		  	
		      		
		        }
        	}
        }	        
	}


	// API for update points for playing eleven
	function update_score_points_get()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 

		$matchs = $this->Webservice_model->get_all_live_match();
		//print_r($matchs);die();
		if(count($matchs) > 0)
		{	
			foreach ($matchs as $match) {

				$id = $this->Webservice_model->get_match($match->match_id);

				$api_url  =  "https://rest.entitysport.com/v2/matches/".$id->unique_id."/scorecard?token=".$this->apikey."";

		        $ch = curl_init();
		        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        curl_setopt($ch, CURLOPT_URL,$api_url);
		        $result=curl_exec($ch);
		        curl_close($ch);
		        $resp = json_decode(json_encode(json_decode($result)), True);
		        //print_r($resp);die();
		        if($id->type =="ODI")
		        {	
		        	$playing_eleven = $this->Webservice_model->playing_eleven("1");
		    		$single = $this->Webservice_model->playing_eleven("2");
		    		$duck = $this->Webservice_model->playing_eleven("8");
		    		$six = $this->Webservice_model->playing_eleven("10");
		    		$four = $this->Webservice_model->playing_eleven("9");	
		    		$fifty = $this->Webservice_model->playing_eleven("11");	
		    		$hundred = $this->Webservice_model->playing_eleven("12");
		    		$between50_60 = $this->Webservice_model->playing_eleven("33");
		    		$between40_50 = $this->Webservice_model->playing_eleven("34");
		    		$below40 = $this->Webservice_model->playing_eleven("35");

		        	foreach ($resp['response']['innings'] as $players) {	
					 	foreach ($players['batsmen'] as $player) {
					 		//print_r($player);die('bat');

					 	$single_runs = $single->odiscore;
			    		$four_runs = $four->odiscore;
			    		$six_runs = $six->odiscore;

			    		$six_hits = $player['sixes'];
			    		$four_hits = $player['fours'];
			    		$run_hits = $player['runs'];
			    		$strike_rate = $player['strike_rate'];

			    		$single_hits = $run_hits ;//- $four_hits*4 - $six_hits*6;	

			    		if($single_hits =="0")
			    		{
			    			$playerinfo = $this->Webservice_model->player_info($player['batsman_id']);
			    			if($playerinfo->designationid !="2")
							{
							 	$total_score = $playing_eleven->odiscore + $duck->odiscore;
							 		$player_id = $playerinfo->id; 

					 			$this->Webservice_model->update_playing_eleven_score($total_score,$player_id,$id->match_id);

					 			$this->update_playing_eleven_score_for_user_battng($total_score,$player_id,$id->match_id);
							} 
			    		}	
			    		else
			    		{
			    			if($strike_rate <60 && $strike_rate >50)
				    		{
				    			$s_rate = $between50_60->odiscore;
				    		}
				    		else if($strike_rate <40.99 && $strike_rate >40)
				    		{
				    			$s_rate = $between40_50->odiscore;
				    		}
				    		else if($strike_rate <40)
				    		{
				    			$s_rate = $below40->odiscore;
				    		}

				    		if($single_hits >=50 && $single_hits <100)
				    		{
				    			$total_score = $single_runs*$single_hits + $four_runs*$four_hits + $six_runs*$six_hits + $playing_eleven->odiscore + $fifty->odiscore +$s_rate;
				    		}
				    		else if($single_hits >=100)
				    		{
				    			$total_score = $single_runs*$single_hits + $four_runs*$four_hits + $six_runs*$six_hits + $playing_eleven->odiscore + $hundred->odiscore +$s_rate;
				    		}
				    		else
				    		{
				    			$total_score = $single_runs*$single_hits + $four_runs*$four_hits + $six_runs*$six_hits + $playing_eleven->odiscore +$s_rate;
				    		}

						 	$playerinfo = $this->Webservice_model->player_info($player['batsman_id']);
						 	$player_id = $playerinfo->id;  

						 	$this->Webservice_model->update_playing_eleven_score($total_score,$player_id,$id->match_id); 

						 	$this->update_playing_eleven_score_for_user_battng($total_score,$player_id,$id->match_id);
				    		}			    		 
					 	}
					}

					$wicket = $this->Webservice_model->playing_eleven("3");

					$maiden_over = $this->Webservice_model->playing_eleven("13");

					$four_wicket = $this->Webservice_model->playing_eleven("14");
					$five_wicket =$this->Webservice_model->playing_eleven("15");

					$between45_35 =$this->Webservice_model->playing_eleven("23");
					$between349_25 =$this->Webservice_model->playing_eleven("24");
					$below25 =$this->Webservice_model->playing_eleven("25");
					$between7_8 =$this->Webservice_model->playing_eleven("26");
					$between801_9 =$this->Webservice_model->playing_eleven("27");
					$above9 =$this->Webservice_model->playing_eleven("28");

					foreach ($resp['response']['innings'] as $bowlings) {
						foreach ($bowlings['bowlers'] as $bowling) {
			     			$Maiden  = $bowling['maidens'];
			     			$wickets = $bowling['wickets'];
							$Economic = $bowling['econ'];
							//print_r($Economic);die;

			     			$maiden_over_bolled = $Maiden*$maiden_over->odiscore;

			     			$wickets_taken = $wickets*$wicket->odiscore;

			     			if($wickets =="4")
			     			{
			     				$wickets_taken_four = $four_wicket->odiscore;
			     			}
			     			else
			     			{
			     				$wickets_taken_four = 0;
			     			}
			     			if($wickets >="5")
			     			{
			     				$wickets_taken_five = $five_wicket->odiscore;
			     			}
			     			else
			     			{
			     				$wickets_taken_five = 0;
			     			}

			     			if($Economic <4.5 && $Economic >3.5)
			     			{
			     				$economic_rate = $between45_35->odiscore;
			     			}

			     			else if($Economic <3.49 && $Economic >2.5)
			     			{
			     				$economic_rate = $between349_25->odiscore;
			     			}

			     			else if($Economic <2.5)
			     			{
			     				$economic_rate = $below25->odiscore;
			     			}	
			     			else if($Economic <8 && $Economic >7)
			     			{
			     				$economic_rate = $between7_8->odiscore;
			     			}

			     			else if($Economic <= 9 && $Economic >8.01)
			     			{
			     				$economic_rate = $between801_9->odiscore;
			     			}
			     			else if($Economic >9)
			     			{
			     				$economic_rate = $above9->odiscore;
			     			}
			     			else if($Economic >4.5 && $Economic < 7)
			     			{
			     				$economic_rate = "0";
			     			}	

			     			//print_r($economic_rate);die();
			     			$bolling_score = $maiden_over_bolled+$wickets_taken+$wickets_taken_four+$wickets_taken_five+$economic_rate;
			     			//print_r($bolling_score);die();
			     			$playerinfo = $this->Webservice_model->player_info($bowling['bowler_id']);
					 		$player_id = $playerinfo->id;  

					 		$this->Webservice_model->update_playing_eleven_bolling_score($bolling_score,$player_id,$id->match_id);	

					 		$this->update_playing_eleven_score_for_user_bolling($bolling_score,$player_id,$id->match_id);
						}
					}	

					$catch_points = $this->Webservice_model->playing_eleven("4");

					$stumping_points = $this->Webservice_model->playing_eleven("6");
					$runout = $this->Webservice_model->playing_eleven("7");
					$out = explode("/", $runout->odiscore);
					$throw = $out[0];
					$catch = $out[1];
					foreach ($resp['response']['innings'] as $fieldings) {
						foreach ($fieldings['fielder'] as $fielding) {

							$stumped = $fielding['stumping'];
							$catch = $fielding['catches'];
							$thrower = $fielding['runout_thrower'];
							$catcher = $fielding['runout_catcher'];
							$direct_hit = $fielding['runout_direct_hit'];

						$fielding_score = $stumped*$stumping_points->odiscore +$catch*$catch_points->odiscore+$thrower*$throw +$catcher*$catch+ $direct_hit*$stumping_points->odiscore ;

						$playerinfo = $this->Webservice_model->player_info($fielding['fielder_id']);
					 	$player_id = $playerinfo->id;  

					 	$this->Webservice_model->update_playing_eleven_fielding_score($fielding_score,$player_id,$id->match_id); 

					 	$this->update_playing_eleven_score_for_user_fielding($fielding_score,$player_id,$id->match_id);

					 	$this->update_playing_eleven_score_for_user_fielding($fielding_score,$player_id,$id->match_id);
						}
					}
		        }

		        else if($id->type =="Twenty20" or $id->type =="T20")
		        {	
		        	
		        	$playing_eleven = $this->Webservice_model->playing_eleven("1");

		    		$single = $this->Webservice_model->playing_eleven("2");
		    		$six = $this->Webservice_model->playing_eleven("10");
		    		$duck = $this->Webservice_model->playing_eleven("8");	
		    		$four = $this->Webservice_model->playing_eleven("9");	
		    		$fifty = $this->Webservice_model->playing_eleven("11");	
		    		$hundred = $this->Webservice_model->playing_eleven("12");	

		    		$between60_70 = $this->Webservice_model->playing_eleven("30");
		    		$between59_60 = $this->Webservice_model->playing_eleven("31");
		    		$below50 = $this->Webservice_model->playing_eleven("32");
		    					
		        	foreach ($resp['response']['innings'] as $players) {
					 	foreach ($players['batsmen'] as $player)
					 	{

					 	$single_runs = $single->t20score;
			    		$four_runs = $four->t20score;
			    		$six_runs = $six->t20score;

			    		$six_hits = $player['sixes'];
			    		$four_hits = $player['fours'];
			    		$run_hits = $player['runs'];
			    		$strike_rate = $player['strike_rate'];
			    		$single_hits = $run_hits;// - $four_hits*4 - $six_hits*6;

					 	$playerinfo = $this->Webservice_model->player_info($player['batsman_id']);
					 	$player_id = $playerinfo->id;

						 	if($single_hits =="0")
						 	{
						 		if($playerinfo->designationid !="2")
							 	{
							 		$total_score = $playing_eleven->t20score + $duck->t20score;
							 		$this->Webservice_model->update_playing_eleven_score($total_score,$player_id,$id->match_id);

							 		$this->update_playing_eleven_score_for_user_battng($total_score,$player_id,$id->match_id);
							 	} 						 	
						 	}
						 	else
						 	{
						 		if($strike_rate <70 && $strike_rate >60)
					    		{
					    			$s_rate = $between60_70->t20score;
					    		}
					    		else if($strike_rate <59.99 && $strike_rate >50)
					    		{
					    			$s_rate = $between59_60->t20score;
					    		}
					    		else if($strike_rate <50)
					    		{
					    			$s_rate = $below50->t20score;
					    		}
					    		else
					    		{
					    			$s_rate = 0;
					    		}	

						 		if($single_hits >=50 && $single_hits <100)
						 		{
						 			$total_score = $single_runs*$single_hits + $four_runs*$four_hits + $six_runs*$six_hits + $playing_eleven->t20score + $fifty->t20score +$s_rate;
						 		}
						 		else if($single_hits >=100)
						 		{
						 			$total_score = $single_runs*$single_hits + $four_runs*$four_hits + $six_runs*$six_hits + $playing_eleven->t20score + $hundred->t20score +$s_rate;
						 		}	
						 		else
						 		{
						 			$total_score = $single_runs*$single_hits + $four_runs*$four_hits + $six_runs*$six_hits + $playing_eleven->t20score +$s_rate;
						 		}	
						 		
							 	$this->Webservice_model->update_playing_eleven_score($total_score,$player_id,$id->match_id);

							 	$this->update_playing_eleven_score_for_user_battng($total_score,$player_id,$id->match_id);
						 	}
					 	 
					 	}					 	
					}

					$wicket = $this->Webservice_model->playing_eleven("3");

					$maiden_over = $this->Webservice_model->playing_eleven("13");
					$four_wicket = $this->Webservice_model->playing_eleven("14");
					$five_wicket =$this->Webservice_model->playing_eleven("15");
					$between6_5 =$this->Webservice_model->playing_eleven("17");
					$between5_4 =$this->Webservice_model->playing_eleven("18");
					$below4 =$this->Webservice_model->playing_eleven("19");
					$between9_10 =$this->Webservice_model->playing_eleven("20");
					$between10_11 =$this->Webservice_model->playing_eleven("21");
					$above11 =$this->Webservice_model->playing_eleven("22");
					foreach ($resp['response']['innings'] as $bowlings) {
						foreach ($bowlings['bowlers'] as $bowling) {

			     			$Maiden  = $bowling['maidens'];
			     			$wickets = $bowling['wickets'];
							$Economic = $bowling['econ'];

			     			$maiden_over_bolled = $Maiden*$maiden_over->t20score;

			     			$wickets_taken = $wickets*$wicket->t20score;

			     			if($wickets =="4")
			     			{
			     				$wickets_taken_four = $four_wicket->t20score;
			     			}
			     			else
			     			{
			     				$wickets_taken_four = 0;
			     			}
			     			if($wickets >="5")
			     			{
			     				$wickets_taken_five = $five_wicket->t20score;
			     			}
			     			else
			     			{
			     				$wickets_taken_five = 0;
			     			}

			     			if($Economic <6 && $Economic >5)
			     			{
			     				$economic_rate = $between6_5->t20score;
			     			}

			     			else if($Economic <4.99 && $Economic >4)
			     			{
			     				$economic_rate = $between5_4->t20score;
			     			}

			     			else if($Economic <4)
			     			{
			     				$economic_rate = $below4->t20score;
			     			}	
			     			else if($Economic <10 && $Economic >9)
			     			{
			     				$economic_rate = $between9_10->t20score;
			     			}

			     			else if($Economic <11 && $Economic >10.01)
			     			{
			     				$economic_rate = $between10_11->t20score;
			     			}
			     			else if($Economic >11)
			     			{
			     				$economic_rate = $above11->t20score;
			     			}
			     			else if($Economic > 6 && $Economic <9)
			     			{
			     				$economic_rate = "0";
			     			}	

			     			$bolling_score = $maiden_over_bolled+$wickets_taken+$wickets_taken_four+$wickets_taken_five+$economic_rate;

			     			$playerinfo = $this->Webservice_model->player_info($bowling['bowler_id']);
					 		$player_id = $playerinfo->id;  

					 		$this->Webservice_model->update_playing_eleven_bolling_score($bolling_score,$player_id,$id->match_id);	
					 		$this->update_playing_eleven_score_for_user_bolling($bolling_score,$player_id,$id->match_id);
						}
					}

					$catch_points = $this->Webservice_model->playing_eleven("4");

					$stumping_points = $this->Webservice_model->playing_eleven("6");
					$runout = $this->Webservice_model->playing_eleven("7");
					$out = explode("/", $runout->t20score);
					$throw = $out[0];
					$catch = $out[1];
					
					foreach ($resp['response']['innings'] as $fieldings) {
						foreach ($fieldings['fielder'] as $fielding) {
							
							$stumped = $fielding['stumping'];
							$catch = $fielding['catches'];
							$thrower = $fielding['runout_thrower'];
							$catcher = $fielding['runout_catcher'];
							$direct_hit = $fielding['runout_direct_hit'];

						$fielding_score = $stumped*$stumping_points->t20score + $catch*$catch_points->t20score + $thrower*$throw +$catcher*$catch + $direct_hit*$stumping_points->t20score;

						$playerinfo = $this->Webservice_model->player_info($fielding['fielder_id']);
					 	$player_id = $playerinfo->id;  

					 	$this->Webservice_model->update_playing_eleven_fielding_score($fielding_score,$player_id,$id->match_id); 

					 	$this->update_playing_eleven_score_for_user_fielding($fielding_score,$player_id,$id->match_id);
					
						}

					}
		        }

		        else if($id->type =="Test")
		        {
		        	$playing_eleven = $this->Webservice_model->playing_eleven("1");
		    		$single = $this->Webservice_model->playing_eleven("2");
		    		$wicket = $this->Webservice_model->playing_eleven("3");
		    		$catch_points = $this->Webservice_model->playing_eleven("4");
					$stumping_points = $this->Webservice_model->playing_eleven("6");
		    		$six = $this->Webservice_model->playing_eleven("10");
		    		$duck = $this->Webservice_model->playing_eleven("8");	
		    		$four = $this->Webservice_model->playing_eleven("9");	
		    		$fifty = $this->Webservice_model->playing_eleven("11");	
		    		$hundred = $this->Webservice_model->playing_eleven("12");	
					$four_wicket = $this->Webservice_model->playing_eleven("14");
					$five_wicket =$this->Webservice_model->playing_eleven("15");

					$runout = $this->Webservice_model->playing_eleven("7");
					$out = explode("/", $runout->testscore);
					$throw = $out[0];
					$catch = $out[1];

					$single_runs = $single->testscore;
			    	$four_runs = $four->testscore;
			    	$six_runs = $six->testscore;
			    	// print_r($resp['response']['innings']);die('tt');
		        	foreach ($resp['response']['innings'] as $players)
		        	{	
		        		//print_r($players['number']);die();
		        		if($players['number'] =="1" or $players['number'] =="2" )
		        		{
		        			foreach ($players['batsmen'] as $player)
						 	{
		        		//print_r($player);die();
						 		$six_hits = $player['sixes'];
					    		$four_hits = $player['fours'];
					    		$run_hits = $player['runs'];
					    		$single_hits = $run_hits;
				    			//print_r($run_hits);die();
							 	$playerinfo = $this->Webservice_model->player_info($player['batsman_id']);
							 	$player_id = $playerinfo->id;

							 	if($single_hits =="0")
							 	{
							 		if($playerinfo->designationid !="2")
								 	{
								 		$total_score = $playing_eleven->testscore + $duck->testscore;
								 		
								 		$this->Webservice_model->update_playing_eleven_score($total_score,$player_id,$id->match_id);

								 		$this->update_playing_eleven_score_for_user_battng($total_score,$player_id,$id->match_id);
								 	} 						 	
							 	}
							 	else
							 	{
							 		if($single_hits >=50 && $single_hits <100)
						 		{
						 			$total_score = $single_runs*$single_hits + $four_runs*$four_hits + $six_runs*$six_hits + $playing_eleven->testscore + $fifty->testscore;
						 		}
						 		else if($single_hits >=100)
						 		{
						 			$total_score = $single_runs*$single_hits + $four_runs*$four_hits + $six_runs*$six_hits + $playing_eleven->testscore + $hundred->testscore;
						 		}	
						 		else
						 		{
						 			$total_score = $single_runs*$single_hits + $four_runs*$four_hits + $six_runs*$six_hits + $playing_eleven->testscore;
						 		}		
							 	$this->Webservice_model->update_playing_eleven_score($total_score,$player_id,$id->match_id);
							 
							 	$this->update_playing_eleven_score_for_user_battng($total_score,$player_id,$id->match_id);
							 	}	
						 	}	
		        		}	
		        		else if($players['number'] =="3" or $players['number'] =="4" )
		        		{
		        			foreach ($players['batsmen'] as $player)
						 	{
						 		$six_hits = $player['sixes'];
					    		$four_hits = $player['fours'];
					    		$run_hits = $player['runs'];
					    		$single_hits = $run_hits;
				    			
							 	$playerinfo = $this->Webservice_model->player_info($player['batsman_id']);
							 	$player_id = $playerinfo->id;

							 	if($single_hits =="0")
							 	{
							 		if($playerinfo->designationid !="2")
								 	{
								 		$total_score =$duck->testscore;
								 	
								 		$this->Webservice_model->update_playing_eleven_score_second_innings($total_score,$player_id,$id->match_id);

								 		$this->update_playing_eleven_score_for_user_battng_second($total_score,$player_id,$id->match_id);
								 	} 						 	
							 	}
							 	else
							 	{
							 		if($single_hits >=50 && $single_hits <100)
						 		{
						 			$total_score = $single_runs*$single_hits + $four_runs*$four_hits + $six_runs*$six_hits + $fifty->testscore;
						 		}
						 		else if($single_hits >=100)
						 		{
						 			$total_score = $single_runs*$single_hits + $four_runs*$four_hits + $six_runs*$six_hits + $hundred->testscore;
						 		}	
						 		else
						 		{
						 			$total_score = $single_runs*$single_hits + $four_runs*$four_hits + $six_runs*$six_hits;
						 		}		
							 	$this->Webservice_model->update_playing_eleven_score_second_innings($total_score,$player_id,$id->match_id);
							 	
							 	$this->update_playing_eleven_score_for_user_battng_second($total_score,$player_id,$id->match_id);
							 	}	
						 	}
		        		}
					}

					foreach ($resp['response']['innings'] as $bowlings) {
						if($bowlings['number'] =="1" or $bowlings['number'] =="2")
						{
							foreach ($bowlings['bowlers'] as $bowling) {
						//print_r($bowling);die();
			     			$wickets = $bowling['wickets'];

			     			$wickets_taken = $wickets*$wicket->testscore;

			     			if($wickets =="4")
			     			{
			     				$wickets_taken_four = $four_wicket->testscore;
			     			}
			     			else
			     			{
			     				$wickets_taken_four = 0;
			     			}
			     			if($wickets >="5")
			     			{
			     				$wickets_taken_five = $five_wicket->testscore;
			     			}
			     			else
			     			{
			     				$wickets_taken_five = 0;
			     			}

			     			$bolling_score =$wickets_taken+$wickets_taken_four+$wickets_taken_five;
			     			//print_r($bolling_score);die();

			     			$playerinfo = $this->Webservice_model->player_info($bowling['bowler_id']);
					 		$player_id = $playerinfo->id;  

					 		$this->Webservice_model->update_playing_eleven_bolling_score($bolling_score,$player_id,$id->match_id);	
					 		$this->update_playing_eleven_score_for_user_bolling($bolling_score,$player_id,$id->match_id);
							}
						}	
						else if($bowlings['number'] =="3" or $bowlings['number'] =="4")
						{
							foreach ($bowlings['bowlers'] as $bowling) {
			     			$wickets = $bowling['wickets'];

			     			$wickets_taken = $wickets*$wicket->testscore;

			     			if($wickets =="4")
			     			{
			     				$wickets_taken_four = $four_wicket->testscore;
			     			}
			     			else
			     			{
			     				$wickets_taken_four = 0;
			     			}
			     			if($wickets >="5")
			     			{
			     				$wickets_taken_five = $five_wicket->testscore;
			     			}
			     			else
			     			{
			     				$wickets_taken_five = 0;
			     			}

			     			$bolling_score =$wickets_taken+$wickets_taken_four+$wickets_taken_five;

			     			$playerinfo = $this->Webservice_model->player_info($bowling['bowler_id']);
					 		$player_id = $playerinfo->id;  

					 		$this->Webservice_model->update_playing_eleven_bolling_score_second_innings($bolling_score,$player_id,$id->match_id);	
					 		$this->update_playing_eleven_score_for_user_bolling_second($bolling_score,$player_id,$id->match_id);

							}
						}
						
					}

					foreach ($resp['response']['innings'] as $fieldings) {
						if($fieldings['number'] =="1" or $fieldings['number'] =="2")
						{
							foreach ($fieldings['fielder'] as $fielding) {
								//print_r($fielding);die();

							$stumped = $fielding['stumping'];
							$catch = $fielding['catches'];
							$thrower = $fielding['runout_thrower'];
							$catcher = $fielding['runout_catcher'];
							$direct_hit = $fielding['runout_direct_hit'];

							$fielding_score = $stumped*$stumping_points->testscore + $catch*$catch_points->testscore + $thrower*$throw +$catcher*$catch + $direct_hit*$stumping_points->testscore;						

							$playerinfo = $this->Webservice_model->player_info($fielding['fielder_id']);
						 	$player_id = $playerinfo->id;

						 	$this->Webservice_model->update_playing_eleven_fielding_score($fielding_score,$player_id,$id->match_id); 

					 		$this->update_playing_eleven_score_for_user_fielding($fielding_score,$player_id,$id->match_id); 
						
							}
						}
						else if($fieldings['number'] =="3 " or $fieldings['number'] =="4")
						{
							foreach ($fieldings['fielder'] as $fielding) {

							 	$stumped = $fielding['stumping'];
							$catch = $fielding['catches'];
							$thrower = $fielding['runout_thrower'];
							$catcher = $fielding['runout_catcher'];
							$direct_hit = $fielding['runout_direct_hit'];

							$fielding_score = $stumped*$stumping_points->testscore + $catch*$catch_points->testscore + $thrower*$throw +$catcher*$catch + $direct_hit*$stumping_points->testscore;

							$playerinfo = $this->Webservice_model->player_info($fielding['fielder_id']);
						 	$player_id = $playerinfo->id;  

						 	$this->Webservice_model->update_playing_eleven_fielding_score_second_innings($fielding_score,$player_id,$id->match_id); 

						 	$this->update_playing_eleven_score_for_user_fielding_second($fielding_score,$player_id,$id->match_id);
						
							}
						}
					}					
		        }	
        	}
        }	        
	}

	 // API for update points for playing eleven
	 function playing_history_post()
	 { 
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 

		$contest = $this->Webservice_model->playing_history_contest($request);
		$match = $this->Webservice_model->playing_history_match($request);

		$resp['wins'] = "0"; 
		$resp['series'] = "0"; 
		if($contest !="")
		{
			$resp['contest'] = $contest;
		}
		else
		{
			$resp['contest'] = 0;
		}	
		if($match !="")
		{
			$resp['matchs'] = $match;
		}
		else
		{
			$resp['matchs'] = 0;
		}
		if($resp !="")
		{
			$result = array('status'=>'success','message' =>"Playing history",'responsecode'=>'200','data'=>$resp);
		}
		else
		{
			$result = array('status'=>'error','message' =>"No details found",'responsecode'=>'500','amount'=>"0",'data'=>"");
		}

		$this->response($result); 

			        
	}

	// API for update leaderboard points according to user points not in use 
	function update_leaderboard($request)
	{	$id['match_id'] = $request['matchid'];		
		$resp = $this->Webservice_model->get_leaderboard_record($request);	

		foreach ($resp as $key) 
		{
			$players = $this->Webservice_model->get_myteam_player_id($key->user_id, $key->teamid);
			$pla = array();
	     	foreach ($players as $player) {
			 	$pla[] = $player->player_id;
			}		
				
			$playing = $this->Webservice_model->playing_team_list($id);
			$points =0;
			$bolling_points= 0;
			$fielding_points= 0;
	    	foreach ($playing as  $play){	    		
				if(in_array($play['playerid'],$pla))
				{
					$points += $this->Webservice_model->total_points($play['playerid'],$key->matchid);	
					$bolling_points += $this->Webservice_model->total_points_bolling($play['playerid'],$key->matchid);
					$fielding_points += $this->Webservice_model->total_points_fielding($play['playerid'],$key->matchid);	
				}	
			} 
			$bating = $points;
			$ball = $bolling_points;
			$fielding = $fielding_points;

			$total_points = $bating+$ball+$fielding;
			$this->Webservice_model->update_leaderboard($key->contestid,$key->teamid,$id['match_id'],$key->user_id,$total_points);
			
		}	
	}

	// APi for user plauying eleven score update 
	function user_playing_eleven($score,$player_id,$match_id)
	{ 
		$allteams = $this->Webservice_model->all_team_for_this_match($match_id);
		
		foreach ($allteams as $allteam) {
			$pla = $this->checkplayer($player_id,$allteam);

			if($pla !="")
			{							
				$captain = $this->check_captain($pla['id']);
				$vicecaptain = $this->check_vicecaptain($pla['id']);
				if($captain['is_captain'] =="1")
				{	
					$data = array('total_points' =>2*$score,'playing_score'=>'1');
					$this->Webservice_model->update_user_points_for_match($data,$pla);
					
				}
				elseif ($vicecaptain['is_vicecaptain'] =="1") {
					$data = array('total_points' =>1.5*$score,'playing_score'=>'1');
					$this->Webservice_model->update_user_points_for_match($data,$pla);
				}
				else
				{
					$data = array('total_points' =>$score,'playing_score'=>'1');
					$this->Webservice_model->update_user_points_for_match($data,$pla);
				}	
			}				
		}
		
	}

	// API for check user player is playing or not not
	function checkplayer($player_id,$allteam)
	{
		return $this->Webservice_model->check_playerfor_user_bymatch($player_id,$allteam);
	}

	// API for check user player is captain or not not
	function check_captain($id)
	{
		return $this->Webservice_model->check_playerfor_user_captain($id);
	}

	// API for check user player is vice captain or not not
	function check_vicecaptain($id)
	{
		return $this->Webservice_model->check_playerfor_user_vicecaptain($id);
	}

	// Api for update playing eleven score for batting
	function update_playing_eleven_score_for_user_battng($score,$player_id,$match_id)
	{		
		$allteams = $this->Webservice_model->all_team_for_this_match($match_id);

		foreach ($allteams as $allteam) {
			$pla = $this->checkplayer($player_id,$allteam);
			
			if($pla !="")
			{							
				$captain = $this->check_captain($pla['id']);
				$vicecaptain = $this->check_vicecaptain($pla['id']);
				if($captain['is_captain'] =="1")
				{	
					$data = array('total_points' =>2*$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
					
				}
				elseif ($vicecaptain['is_vicecaptain'] =="1") {
					$data = array('total_points' =>1.5*$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
				}
				else
				{
					$data = array('total_points' =>$score);


					$this->Webservice_model->update_user_points_for_match($data,$pla);
				}
				
			}	
			
		}

	}

	// Api for update playing eleven score for second batting for test match
	function update_playing_eleven_score_for_user_battng_second($score,$player_id,$match_id)
	{		
		$allteams = $this->Webservice_model->all_team_for_this_match($match_id);

		foreach ($allteams as $allteam) {
			$pla = $this->checkplayer($player_id,$allteam);
			
			if($pla !="")
			{							
				$captain = $this->check_captain($pla['id']);
				$vicecaptain = $this->check_vicecaptain($pla['id']);
				if($captain['is_captain'] =="1")
				{	
					$data = array('second_innings_batting' =>2*$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
					
				}
				elseif ($vicecaptain['is_vicecaptain'] =="1") {
					$data = array('second_innings_batting' =>1.5*$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
					
				}
				else
				{
					$data = array('second_innings_batting' =>$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
				}
				
			}	
			
		}

	}

	// Api for update playing eleven score for bolling 
	function update_playing_eleven_score_for_user_bolling($score,$player_id,$match_id)
	{
		$allteams = $this->Webservice_model->all_team_for_this_match($match_id);

		foreach ($allteams as $allteam) {
			$pla = $this->checkplayer($player_id,$allteam);
			
			if($pla !="")
			{							
				$captain = $this->check_captain($pla['id']);
				$vicecaptain = $this->check_vicecaptain($pla['id']);
				if($captain['is_captain'] =="1")
				{	
					$data = array('bolling_points' =>2*$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
					
				}
				elseif ($vicecaptain['is_vicecaptain'] =="1") {
					$data = array('bolling_points' =>1.5*$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
				}
				else
				{
					$data = array('bolling_points' =>$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
				}
			}	
		}
	}

	// Api for update playing eleven score for second bolling for test match
	function update_playing_eleven_score_for_user_bolling_second($score,$player_id,$match_id)
	{
		$allteams = $this->Webservice_model->all_team_for_this_match($match_id);

		foreach ($allteams as $allteam) {
			$pla = $this->checkplayer($player_id,$allteam);
			
			if($pla !="")
			{							
				$captain = $this->check_captain($pla['id']);
				$vicecaptain = $this->check_vicecaptain($pla['id']);
				if($captain['is_captain'] =="1")
				{	
					$data = array('second_innings_bolling' =>2*$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
					
				}
				elseif ($vicecaptain['is_vicecaptain'] =="1") {
					$data = array('second_innings_bolling' =>1.5*$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
				}
				else
				{
					$data = array('second_innings_bolling' =>$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
				}
			}	
		}
	}

	// Api for update playing eleven score for fielding 
	function update_playing_eleven_score_for_user_fielding($score,$player_id,$match_id)
	{
		$allteams = $this->Webservice_model->all_team_for_this_match($match_id);

		foreach ($allteams as $allteam) {
			$pla = $this->checkplayer($player_id,$allteam);
			
			if($pla !="")
			{							
				$captain = $this->check_captain($pla['id']);
				$vicecaptain = $this->check_vicecaptain($pla['id']);
				if($captain['is_captain'] =="1")
				{	
					$data = array('fielding_points' =>2*$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
					
				}
				elseif ($vicecaptain['is_vicecaptain'] =="1") {
					$data = array('fielding_points' =>1.5*$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
				}
				else
				{
					$data = array('fielding_points' =>$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
				}
				
			}	
			
		}
	}

	// Api for update playing eleven score for second fielding for test match
	function update_playing_eleven_score_for_user_fielding_second($score,$player_id,$match_id)
	{
		$allteams = $this->Webservice_model->all_team_for_this_match($match_id);

		foreach ($allteams as $allteam) {
			$pla = $this->checkplayer($player_id,$allteam);
			
			if($pla !="")
			{							
				$captain = $this->check_captain($pla['id']);
				$vicecaptain = $this->check_vicecaptain($pla['id']);
				if($captain['is_captain'] =="1")
				{	
					$data = array('second_innings_fielding' =>2*$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
					
				}
				elseif ($vicecaptain['is_vicecaptain'] =="1") {
					$data = array('second_innings_fielding' =>1.5*$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
				}
				else
				{
					$data = array('second_innings_fielding' =>$score);
					$this->Webservice_model->update_user_points_for_match($data,$pla);
				}
			}	
		}
	}

	// API for update leaderbord points
	function update_leaderboard_user($request)
	{	
		$id['match_id'] = $request['matchid'];	
		
		$resp = $this->Webservice_model->get_team_record($id);
		
		foreach ($resp as $key) 
		{
			$batting = $this->Webservice_model->my_team_player_batting($key->user_id, $key->id);
			$balling = $this->Webservice_model->my_team_player_balling($key->user_id, $key->id);
			$fielding = $this->Webservice_model->my_team_player_fielding($key->user_id, $key->id);
			$batting_second = $this->Webservice_model->my_team_player_batting_second($key->user_id, $key->id);
			$bolling_second = $this->Webservice_model->my_team_player_bolling_second($key->user_id, $key->id);
			$fielding_second = $this->Webservice_model->my_team_player_fielding_second($key->user_id, $key->id);

			$total_points = $batting + $balling + $fielding + $batting_second + $bolling_second + $fielding_second;
			
			$this->Webservice_model->update_leaderboard($key->id,$key->match_id,$key->user_id,$total_points);
			//echo $this->db->last_query();die();
		}	
	}

	// API for update user rank
	function update_rank_user($request)
	{
		$id = $request;		
		$resp = $this->Webservice_model->get_team_record_by_rank($id);
		$i = 1;				
		foreach ($resp as $key) 
		{	
			$this->Webservice_model->update_rankby_points($key->id, $i);
		$i++;}
	}

	// API for update winning amount in user account
	function update_winning_amount_user($request)
	{
		$resp = $this->Webservice_model->get_team_record_by_rank($request);
		foreach ($resp as $value) 
		{			
			$price = $this->Webservice_model->get_price($value->rank,$value->contestid);			
			$winning_amount = array('user_id' =>$value->user_id,
						'amount'=>$price,
						'type'=>"winning",
						'transaction_status'=>'SUCCESS',
						'contest_id'=>$value->contestid,
						'transection_mode'=>'for winning contest',
						'created_date'=> date('Y-m-d H:i:s'),
						);

			$this->Webservice_model->common_insert($winning_amount,'transection');			
		}
	}

	//// API for update match status from live to result
	function update_match_status_from_live_to_result_get()
	{
		$api_url  =  "https://rest.entitysport.com/v2/matches/?status=2&token=".$this->apikey."&per_page=50";
		//$api_url  = "http://cricapi.com/api/matches?apikey=".$this->apikey."";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$api_url);
        $result=curl_exec($ch);
        curl_close($ch);
        $cricketMatches= json_decode(json_encode(json_decode($result)), True); //json_decode($result);
       
     	foreach($cricketMatches['response']['items'] as $item) { 
        	
        	if($item['match_id'] !="")
        	{  
            	$match_result =  $this->Webservice_model->get_match_by_unique_id($item['match_id']);

                if($match_result !="")
                {	
                	if($item['status_str'] =="Completed" && $item['status'] =="2")
                	{        
                		$data = array('match_status'=>"Result",
                		'winner_team'=>$item['winning_team_id'],
                		'toss_winner_team'=>$item['toss']['winner'],
                		);	  		
                   		$this->Webservice_model->update_match_status_by_unique_id($match_result->match_id,$data);
                   		$this->Webservice_model->update_match_status_by_match_id($match_result->match_id);
                   		$this->update_leaderboard_user($match_result->match_id);
                   		$this->update_rank_user($match_result->match_id);
                   		$this->update_winning_amount_user($match_result->match_id);
                	}	                   
                }
        	}  
        }
	}

	//API for get refer friend list 
	function refer_friend_list_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 

		$resp = $this->Webservice_model->refer_friend_list($request);
		foreach ($resp as $key){
			$bonus = $this->Webservice_model->get_reffer_bonus($key->user_id);
			if($bonus !="")
			{
				$key->bonus = $bonus;
			}
			else
			{
				$key->bonus = 0;
			}	

		}

		if(count($resp) >0)
		{
			$result = array('status'=>'success','message' =>"Friend list",'responsecode'=>'200','data'=>$resp);
		}
		else
		{
			$result = array('status'=>'error','message' =>"No Friend found",'responsecode'=>'500','data'=>"");
		}

		$this->response($result); 
        
	}

	//API for withdrow amount
	function withdrow_amount_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 

		$winning_credit = $this->Webservice_model->winning_amount($request);
		$winning_debit = $this->Webservice_model->winning_amount_debit($request);

		$winning = $winning_credit - $winning_debit;
		
		$this->Webservice_model->user_account_info($request);
		if($winning > $request['amount'])
		{	
			$resp =	$this->Webservice_model->winning_amount_debit_request($request);
		

			if($resp !="")
			{
				$result = array('status'=>'success','message' =>"Withdrow request send to admin we will contact you soon",'responsecode'=>'200','data'=>"");
			}
			else
			{
				$result = array('status'=>'error','message' =>"Something went wrong please try again later",'responsecode'=>'500','data'=>"");
			}
		}		
		else
		{
			$result = array('status'=>'error','message' =>"No sufficient amount",'responsecode'=>'500');
		}

		$this->response($result); 
        
	}


	//API for user account information withdrow amount
	function user_withdrow_information_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		
		$resp = $this->Webservice_model->user_withdrow_information($request);
		
		if($resp !="")
		{
			$result = array('status'=>'success','message' =>"User withdrow information ",'responsecode'=>'200','data'=>$resp);
		}
		else
		{
			$result = array('status'=>'error','message' =>"No information found",'responsecode'=>'500','data'=>"");
		}

		$this->response($result); 
        
	}

	//API for user global rank
	function global_rank_post()
	{
		header('Content-type: application/json');
		if(isset(apache_request_headers()['Auth'])) {
	        $auth = apache_request_headers()['Auth'];
	    }	   
    	$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true); 
		
		$resp1 = $this->Webservice_model->global_rank_user($request);
		
		$i= 1;
		foreach ($resp1 as $key){
			$key->rank = $i++;
		}

		foreach ($resp1 as $session) {
			if($session->user_id == $request['user_id'])
			{
				$data1[] = $session; 
			}	
		}
		foreach ($resp1 as $non_session) {
			if($non_session->user_id != $request['user_id'])
			{
				$data2[] = $non_session;
			}	
		}

		$resp = array_merge($data1,$data2);
		
		if($resp !="")
		{
			$result = array('status'=>'success','message' =>"Global rank record ",'responsecode'=>'200','data'=>$resp);
		}
		else
		{
			$result = array('status'=>'error','message' =>"No information found",'responsecode'=>'500','data'=>"");
		}

		$this->response($result); 
        
	}

	//API for user hash key
	function hashkey_post()
	{		
		$request = $this->input->post('hashkey');
		
		$string =  explode("&",$request);		
		
		$a = explode("=", $string[0]);
		$b = explode("=", $string[1]);
		$c = explode("=", $string[2]);
		$d = explode("=", $string[3]);
		$e = explode("=", $string[4]);
		$f = explode("=", $string[5]);
		$g = explode("=", $string[6]);	
		$h = explode("=", $string[7]);
		$i = explode("=", $string[8]);
		$j = explode("=", $string[9]);
		$k = explode("=", $string[10]);		

		$key 			= $a[1];
		$amount 		= $b[1];
		$txnid			= $c[1];
		$email 			= $d[1];
		$productinfo 	= $e[1];
		$firstname		= $f[1];
		$udf1 			= $g[1];
		$udf2 			= $h[1];
		$udf3 			= $i[1];
		$udf4 			= $j[1];
		$udf5 			= $k[1];

		

		$salt="zqVc6Vugjn"; // PLACE YOUR SALT KEY HERE

		// Salt should be same Post Request
		
		$retHashSeq = $key . '|' . $this->checkNull($txnid) . '|' .$this->checkNull($amount) . '|' .$this->checkNull($productinfo) . '|' . $this->checkNull($firstname) . '|' . $this->checkNull($email) . '|' . $this->checkNull($udf1) . '|' . $this->checkNull($udf2) . '|' . $this->checkNull($udf3) . '|' . $this->checkNull($udf4) . '|' . $this->checkNull($udf5) . '||||||'. $salt;
		

		$hash = strtolower(hash('sha512', $retHashSeq)); 
		$arr['payment_hash'] = $hash;
		$arr['status']=0;
		$arr['errorCode']=null;
		$arr['responseCode']=null;
		$arr['hashtest']=$retHashSeq;
		$output=$arr;
		
		if($output !="")
		{
			$result = $output;
		}
		else
		{
			$result = array('status'=>'error','message' =>"Some error occured please try agiain",'responsecode'=>'500','data'=>"");
		}

		$this->response($result); 
        
	}

	// API for check null value
	function checkNull($value)
	{
        if ($value == null){
            return '';
        } else {
            return $value;
        }
    }

	
}
?>