<?php  defined('BASEPATH') OR exit('No direct script access allowed');
	//website controller
class Website extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Website_model');		
        $this->load->library(array('form_validation', 'Googleplus'));	
		$this->load->library('email',array(
			'mailtype'  => 'html',
			'newline'   => '\r\n'
		));

		
	}

	public function index()
	{
		$this->load->view('index');
		$this->load->view('footer');
	}

	public function how_to_play()
	{
		$this->load->view('how_to_play');
	}
	
	public function login()
	{
        $data['goolge_login_url'] = $this->googleplus->loginURL();
		$this->load->view('login',$data);
	}

	public function registration()
	{
        $data['goolge_login_url'] = $this->googleplus->loginURL();
		$this->load->view('registration',$data);
	}
	
	public function termsandcondition()
	{
		$this->load->view('termsandcondition');
		$this->load->view('footer');
	}

	public function invite()
	{
		$this->load->view('invite');
		$this->load->view('footer');
	}

	public function leagues()
	{
		$this->login_check();
        $data = array('');
        $data['fixture_match'] = $this->Website_model->match('Fixture');
        $data['live_match'] = $this->Website_model->match('Live');
        $data['result_match'] = $this->Website_model->match('Result');
        $this->load->view('head');
        $this->load->view('leagues',$data);
	}
	
    public function me()
	{
        $this->login_check();

		$this->load->view('head');
		$this->load->view('me');
	}

    public function login_check()
    {
        $user_id = $this->session->userdata('user_id');
        if($user_id !="")
        {
            return true;
        }   
        else
        {
            redirect('website/login');
        }    
    }

    public function logout()
    {   
        $this->session->sess_destroy();
        redirect('website');
    }
	
	public function my_matches()
	{
		$this->login_check();
        $data = array('');
        $user_id = $this->session->userdata('user_id');
        $data['fixture_match'] = $this->Website_model->join_match('Fixture',$user_id);
        $data['live_match'] = $this->Website_model->join_match('Live',$user_id);
        $data['result_match'] = $this->Website_model->join_match('Result',$user_id);
       
        $this->load->view('head');
        $this->load->view('my_matches',$data);
	}
	
	// public function my_account()
	// {
 //        $this->login_check();

	// 	$this->load->view('head');
	// 	$this->load->view('my_account');
	// }

	public function reg()
	{        
		$this->form_validation->set_rules('email','email','trim|required|is_unique[registration.email]');
        $this->form_validation->set_rules('mobile','Mobile','trim|required|is_unique[registration.mobile]');
        $this->form_validation->set_rules('password','Password','trim|required');
		if ($this->form_validation->run() == FALSE) 
		{
            $this->registration();
        } 
        else 
        {
        	$code = $this->input->post('code');

        	$email = $this->input->post('email');

        	$num = rand(1111,9999);
			$em = substr($email,0, 4);
			$referral_code = strtoupper($em) . $num;
        	if($code !="")
        	{
        		$referral = $this->Website_model->referral_code($code);
        		if($referral == "")
        		{
        			$this->session->set_flashdata('error',"Referral code invalid");
        			redirect('website/registration');
        		}	
        		else
        		{
        			$data = array('email' =>$email,
        				'mobile' =>$this->input->post('number'),
        				'password' =>md5($this->input->post('password')),
        				'referral_code'=>$referral_code,
        				'code' =>$code,
                        'type' =>"Normal",
        				'createDate'=>date('Y-m-d H:i:s'),
        			);

        			$id = $this->Website_model->insert('registration',$data);
        			if($id !="")
        			{
        				$reffer_bonus = array('user_id' =>$id,
			                            'amount'=>'100',
			                            'type'=>'bonus',
			                            'transaction_status'=>'SUCCESS',
			                            'transection_mode'=>'referral bonus',
			                            'referral_useid'=>$referral['user_id'],
			                            'created_date'=>date('Y-m-d H:i:s'),
                    				);
        				$this->Website_model->insert('transection',$reffer_bonus);
                        $json = array('status' =>1 , 'msg' => "Registration done successfully");
                        echo json_encode($json);

        			}	
        		}	
        	}
        	else
        	{
        		$data = array('email' =>$email,
        				'mobile' =>$this->input->post('number'),
        				'password' =>md5($this->input->post('password')),
        				'referral_code'=>$referral_code,
                        'type'=>'Normal',
        				'createDate'=>date('Y-m-d H:i:s'),
        			);

	        	$this->Website_model->insert('registration',$data);                
                $json = array('status' =>1 , 'msg' => "Registration done successfully");
                echo json_encode($json);	        	
        	}        	

        }
	}

	public function login_post()
	{        
		$this->form_validation->set_rules('email','email','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if ($this->form_validation->run() == FALSE) 
		{
            $this->login();
        } 
        else 
        {
        	$data = array('mobile' =>$this->input->post('email'),
        				'password' =>md5($this->input->post('password')),
        			);

        	$resp = $this->Website_model->login($data);

        	if($resp !="")
        	{
        		$this->session->set_userdata('user_id', $resp['user_id']);
                 $json = array('status' =>1);
                echo json_encode($json);
        	}	
            else
            {
                 $json = array('status' =>2);
                echo json_encode($json);
            }    

	    }
    }

    public function check_email()
    {
        $value =  $this->input->post('value');

        $resp = $this->Website_model->check_email($value);          
        if($resp !="")
        {
            echo json_encode(array('status' =>'2'));
        } 

        else
        {
            echo json_encode(array('status' =>'1'));
        }  

          
    }

    public function check_mobile()
    {
        $value =  $this->input->post('value');

        $resp = $this->Website_model->check_mobile($value);
        if($resp !="")
        {
            echo json_encode(array('status' =>'2'));
        }
        else
        {
            echo json_encode(array('status' =>'1'));
        }  
         
    }

    public function check_referral_code()
    {
        $value =  $this->input->post('value');

        $resp = $this->Website_model->referral_code($value);
        if($resp =="")
        {
            echo json_encode(array('status' =>'2'));
        } 
        else 
        {
            echo json_encode(array('status' =>'1'));
        }   
          
    }

    public function google_login()
    {
        $this->googleplus->getAuthenticate();
        $this->session->set_userdata('login',true);
        $user_info = $this->googleplus->getUserInfo();

        $mail = $this->Website_model->check_email($user_info['email']);

        if($mail !="")
        {
            $this->session->set_userdata('user_id',$mail['user_id']);
            redirect('website/match');
        }   
        else
        {   
            $data = array('email' =>$user_info['email'],
                            'name' =>$user_info['name'],
                            'gender' =>$user_info['gender'],
                            'type' =>'Email',
                            'password' =>md5($user_info['id']),
                            'createDate'=>date('Y-m-d H:i:s'),
                        );

            $resp =  $this->Website_model->insert('registration',$data);
            $this->session->set_userdata('user_id',$resp);
            redirect('website/match');
        } 
    }
    
    public function personaldetails()
    {
        $this->login_check();

        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['user_info'] = $this->Website_model->get_by_id($user_id);
        $data['states'] = $this->Website_model->get_all_states();

        $this->load->view('personaldetails',$data);
    }

    public function get_city_by_stateid()
    {
        $id = $this->input->post('id');
        $data = $this->Website_model->get_city_by_stateid($id);
        echo $data;
        
    }

    public function update_user_information()
    {
        $this->login_check();

        $user_id = $this->session->userdata('user_id');

        $day = $this->input->post('day');
        $month = $this->input->post('month');
        $year = $this->input->post('year');

        $data = array('name' =>$this->input->post('name'),
                    'gender' =>$this->input->post('gender'),
                    'address' =>$this->input->post('address'),
                    'state' =>$this->input->post('state'),
                    'city' =>$this->input->post('city'),
                    'dob' =>$day.'-'.$month.'-'.$year,
                );

        $where = array('user_id'=> $user_id);

        $this->Website_model->update('registration', $where , $data);
        redirect('website/personaldetails');

    }
    
    public function ranking()
    {
        $this->login_check();

        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['join_matchs'] = $this->Website_model->user_join_matches($user_id);
        $this->load->view('ranking', $data);
    }
    
    public function leaderboard()
    {
        $this->login_check();

        $id =  base64_decode($this->uri->segment('3'));
        $data['user_id'] = $user_id = $this->session->userdata('user_id');
        $session_user = $this->Website_model->get_leaderboard_data_session_user($id, $user_id);
        $non_session_user = $this->Website_model->get_leaderboard_data_non_session_user($id, $user_id);
        $data['leaderboards'] =  array_merge($session_user , $non_session_user);
        $this->load->view('leaderboard',$data);
    }
    
    public function user_transaction()
    {
        $this->login_check();

        $this->load->view('user_transaction');
    }
    
    public function user_withdraw()
    {
        $this->login_check();

        $this->load->view('user_withdraw');
    }

    public function changePassword()
    {
        $this->login_check();

        $this->load->view('head');
        $this->load->view('changePassword');
    }

    public function change_password()
    {
        $this->login_check();

        $user_id = $user_id = $this->session->userdata('user_id');
        $password = md5($this->input->post('password'));
        $newpassword = $this->input->post('newpassword');

        $result = $this->Website_model->get_by_id($user_id);

        if($password == $result['password'])
        {
            $data = array('password' =>md5($newpassword));
            $where = array('user_id' =>$user_id);
            $update = $this->Website_model->update('registration',$where,$data);
         
            if($update)
            {
                $json  = array('status' =>1,'msg' => 'Password Update successfully'); 
                echo json_encode($json);  
            }    
        }
        else 
        {
            $json = array('status' =>2,'msg' => 'Old password not match');
            echo json_encode($json);   
        } 

    }

    public function transaction()
    {
        $this->login_check();

        $user_id = $user_id = $this->session->userdata('user_id');
        $data['transactions'] = $this->Website_model->all_transaction($user_id);
        $this->load->view('user_transaction',$data);
    }
    
    public function withdrawl()
    {
        $this->login_check();
        
        $user_id = $user_id = $this->session->userdata('user_id');
        $data['withdrawls'] = $this->Website_model->withdrawl_list($user_id);       
        $this->load->view('user_withdraw',$data);
    }
	
public function contest()
    {
        $this->login_check();
        $data = array('');
        $id =$_GET['match'];
        $data['match_details'] = $this->Website_model->match_details($id);
        $data ['contest'] = $this->Website_model->get_match_contest($id);
        //print_r($data['content']);
        $this->load->view('head');
        $this->load->view('contest_list',$data);
    }
    
    
    public function create_team()
    {
        $this->login_check();
        $data = array();
        $id =$_GET['match'];
        $data['match_details'] = $this->Website_model->match_details($id);
      
        $data['batsman'] = $this->Website_model->get_match_scott($id,1);  
        $data['bowler'] = $this->Website_model->get_match_scott($id,2);  
        $data['allrounder'] = $this->Website_model->get_match_scott($id,3);  
        $data['wicketkeeper'] = $this->Website_model->get_match_scott($id,4);   

        $this->load->view('head');
        $this->load->view('create_team',$data);
    }

    public function my_account()
    {
        $this->login_check();
        $user_id = $this->session->userdata('user_id');

        $credit = $this->Website_model->credit_amount($user_id);
        $debit = $this->Website_model->debit_amount($user_id);
        $bonus_credit = $this->Website_model->bonus_amount($user_id);
       
        $bonus_debit = $this->Website_model->bonus_amount_debit($user_id);
        $winning_credit = $this->Website_model->winning_amount($user_id);
        $winning_debit = $this->Website_model->winning_amount_debit($user_id);
        

        $winning = $winning_credit - $winning_debit;
        $bonus = $bonus_credit-$bonus_debit;

        if($credit !="")
        {
            $data['total_amount'] = $credit + $winning - $debit;
            $data['credit_amount'] = $credit - $debit;
        }
        else
        {
            $data['total_amount'] ="0";
            $data['credit_amount'] ="0";
        }   
        if($bonus > 0)
        {
            $data['bonous_amount'] = $bonus; 
        }
        else 
        {   
            $data['bonous_amount'] = "0"; 
        }
        if($winning >0)
        {
            $data['winning_amount'] = $winning; 
        }
        else 
        {   
            $data['winning_amount'] = "0"; 
        }

        $this->load->view('head');
        $this->load->view('my_account',$data);
    }


    public function withdraw_request()
    {
        $this->login_check();
        $user_id = $this->session->userdata('user_id');

        $data['user_info'] = $this->Website_model->get_by_id($user_id);

        $this->load->view('withdraw_request',$data);
    }

    public function withdraw()
    {
        $this->login_check();
        $user_id = $this->session->userdata('user_id');

        $data = array('user_acc_name' =>$this->input->post('user_acc_name'),
                        'acc_no' =>$this->input->post('acc_no'),
                        'bank_name' =>$this->input->post('bank_name'),
                        'ifsc_code' =>$this->input->post('ifsc_code'),
                        'branch_address' =>$this->input->post('branch_address'),
                        'user_mobile' =>$this->input->post('user_mobile'),
                        'pan_number' =>$this->input->post('pan_number'),
                        'aadhar' =>$this->input->post('aadhar'),
                    );
        $where= array('user_id',$user_id);
        $this->Website_model->update('registration',$where ,$data);

        $withdraw  = array('user_id' =>$user_id,
                    'amount' =>$this->input->post('amount'),
                    'type'=>'winning_debit',
                    'withdrow_request'=>'1',
                    'transaction_status'=>'SUCCESS',
                    'transection_mode'=>'self withdrawal',
                    'created_date'=>date('Y-m-d H:i:s'),
                   
         );

        $insert = $this->Website_model->insert('transection',$withdraw);

        if($insert)
        {
            $json = array('status' =>1, 'msg' => 'Request send to admin successfully');
            echo json_encode($json);
        } 
        else 
        {
            $json = array('status' =>2, 'msg' => 'Please try later');
            echo json_encode($json);
        }  

    }

    public function add_amount()
    {
        $this->login_check();
        $user_id = $this->session->userdata('user_id');
        $data['user_info'] = $this->Website_model->get_by_id($user_id);

        $this->load->view('add_amount',$data);
    }

    public function request_amount()
    {
        $this->login_check();
        $user_id = $this->session->userdata('user_id');

        $data['details'] = array('amount' =>$this->input->post('amount'),
                    'name' =>$this->input->post('name'),
                    'email' =>$this->input->post('email'),
                    'number'=>$this->input->post('number'),
                    'user_id' => $user_id,
                );

        $this->load->view('payupage',$data);

    }

    public function success_transaction()
    {
        $this->login_check();
        $txn_status = strtoupper($_POST['status']);
        
        if($txn_status == "SUCCESS")
        {
           $tx_status = 'TXN_SUCCESS';
        }    
        $data = array('transection_mode' =>'deposit by self',
                    'user_id' =>$_POST['udf1'],
                    'amount'=>$_POST['amount'],
                    'type'=>'credit',
                    'transection_detail'=>json_encode($_POST),
                    'transaction_status'=>$tx_status,
                    'created_date'=>date('Y-m-d H:i:s'),
                );

        $this->Website_model->insert('transection',$data);
        redirect('website/my_account');
    }

    public function failure_transaction()
    {
        $this->session->set_flashdata('error', "Transaction Failed due to some error");
        redirect('website/add_amount');
    }

    public function more()
    {
        $this->load->view('more');
    }

    public function aboutUs()
    {
        $data['title'] = 'About us' ;
        $this->load->view('externalpage/header');
        $this->load->view('externalpage/aboutUs',$data);
        $this->load->view('../footer');
    }

    public function termsandconditions()
    {
        $data['title'] = 'Terms and Condition' ;
        $this->load->view('externalpage/header');
        $this->load->view('externalpage/termsandcondition',$data);
        $this->load->view('../footer');
    }

    public function pointsystem()
    {
        $data = array();
        $data['title'] = 'Point System' ;
        $data['points'] = $this->Website_model->pointsystem();
        $this->load->view('externalpage/header');
        $this->load->view('externalpage/pointsystem',$data);
        $this->load->view('../footer');
    }

    public function contactus()
    {   
        $data['title'] = 'Contact Us' ;
        $this->load->view('externalpage/header');
        $this->load->view('externalpage/contactus');
        $this->load->view('../footer');
    }

    public function contest_leaderboard()
    {
        $this->login_check();
        $data = array();
        $id =$this->uri->segment('3');
        $where = array('contest_id' =>$id);
        $table = 'contest';
        $data['contest'] = $this->Website_model->get_where($where ,$table);

        $where2 =array('match_id'=>$data['contest']['match_id']);
        $table2 = "match";
        $data['match'] = $this->Website_model->get_where($where2 ,$table2);
        $where1 = array('contestid' =>$data['contest']['contest_id'],'matchid' =>$data['contest']['match_id']);
        $table1 = 'leaderboard';
        $data['leaderboards'] = $this->Website_model->get_where_result($where1 ,$table1);
        $data['winning_info'] = $this->Website_model->winning_info($where);
        $this->load->view('contest_leaderboard',$data);
    }
	
}
?>