<?php  defined('BASEPATH') OR exit('No direct script access allowed');
    //website controller
class Website extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Website_model');        
        $this->load->library(array('form_validation', 'Googleplus'));   
        $this->load->library('Stack_web_gateway_paytm_kit');
        $this->load->library('email',array(
            'mailtype'  => 'html',
            'newline'   => '\r\n'
        ));

        
    }

    // public function index()
    // {
    //     $data['match'] = $this->Website_model->fetch_match_data('Fixture');
    //     $data['results'] = $this->Website_model->fetch_match_data_result('Result');        
    //     $this->load->view('index',$data);
    // }
    
     public function index()
    {        
        $this->load->view('home/header');
        $this->load->view('home/index');
        $this->load->view('home/footer');
    }

    public function aboutUs()
    {        
        $this->load->view('home/header');
        $this->load->view('home/aboutUs');
        $this->load->view('home/footer');
    }

    public function how_to_play()
    {
        $this->load->view('home/how_to_play');
    }
    public function privacy_policy()
    {
        $this->load->view('home/header');
        $this->load->view('home/privacy_policy');
        $this->load->view('home/footer');
    }
    public function termsandcondition()
    {
        $this->load->view('home/header');
        $this->load->view('home/termsandcondition');
        $this->load->view('home/footer');
    }

    public function invite()
    {
        $this->load->view('invite');
        $this->load->view('footer');
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
    
    /*public function reg()
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
                        'mobile' =>$this->input->post('mobile'),
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
                        'mobile' =>$this->input->post('mobile'),
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
    }*/


    /*public function login_post()
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
    }*/

    
    public function personaldetails()
    {
        $this->login_check();

        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['user_info'] = $this->Website_model->get_by_id($user_id);
        $data['teams'] = $this->Website_model->get_all_result('team');
        $data['states'] = $this->Website_model->get_all_states();
        $data['citys'] = $this->Website_model->get_all_citys();


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
                    'teamName' =>$this->input->post('teamname'),
                    'address' =>$this->input->post('address'),
                    'state' =>$this->input->post('state'),
                    'city' =>$this->input->post('city'),
                    'dob' =>$day.'-'.$month.'-'.$year,
                );

        $where = array('user_id'=> $user_id);

        $update = $this->Website_model->update('registration', $where , $data);
        if($update)
        {
            $this->session->set_flashdata('success','Profile update successfully');
        }    
        else
        {
            $this->session->set_flashdata('error','Please try again');
        }    
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
            //die('else');
            $json = array('status' =>2,'msg' => 'Old password not match');
            echo json_encode($json);   
        } 

    }


    public function more()
    {
        $this->load->view('head');
        $this->load->view('more');
    }

    /*public function aboutUs()
    {
        $data['title'] = 'About us' ;
        $this->load->view('externalpage/header');
        $this->load->view('externalpage/aboutUs',$data);
        $this->load->view('../footer');
    }*/

    public function termsandconditions()
    {
        $data['title'] = 'Terms and Condition' ;
        $this->load->view('old/externalpage/header');
        $this->load->view('old/externalpage/termsandcondition',$data);
        $this->load->view('../footer');
    }

    public function pointsystem()
    {
        $data = array();
        $data['title'] = 'Point System' ;
        $data['points'] = $this->Website_model->pointsystem();
        $this->load->view('old/externalpage/header');
        $this->load->view('old/externalpage/PointSystem',$data);
        $this->load->view('../footer');
    }

    public function contactus()
    {   
        $data['title'] = 'Contact Us' ;
        $this->load->view('old/externalpage/header');
        $this->load->view('old/externalpage/contactus');
        $this->load->view('../footer');
    }



    public function teamDetails()
    {   
        $this->login_check();
        $data = array('');
        $id =$_GET['match'];
        $user_id = $this->session->userdata('user_id');
        $data['teams'] = $this->Website_model->get_team_deatils($id,$user_id);
        $where = array('match_id'=>$id);
        $table = "match";
        $data['match'] =$this->Website_model->get_where($where,$table);
        $this->load->view('head');
        $this->load->view('teamDetails',$data);
    }
    
    
     




    
}
