<?php

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta');
    }
        
   public function check_login() 
   {
        $loginname = $this->input->post('loginname');
        $loginpassword = $this->input->post('loginpassword');
        $today = date('Y-m-d');

        if (!empty($loginname) && !empty($loginpassword)) 
        {
        $sql = "SELECT * FROM admin WHERE `EmailAddress`='".$loginname."' AND `LoginPassword` = AES_ENCRYPT('".LOGIN_SALT."','".$loginpassword."') ";

            $query = $this->db->query($sql);
            if ($query) {
                if ($query->num_rows() > 0) {
                    $datas = $query->result_array();
                    $data = array(
                       
                        'id' => trim($datas[0]['id']),                       
                        'name' => trim($datas[0]['FullName']),
						'user_type' => 1
                        );
                       
                        $this->session->set_userdata($data);
                    return true;
                } else {
                    return false;
                }
            }     
        }
    }

 

    public function registration_save() {
        $personname = $this->input->post('personname');
        $trading_name = $this->input->post('trading_name');
        $personemail = $this->input->post('personemail');
        $tranding_email = $this->input->post('tranding_email');
        $landline_number = $this->input->post('landline_number');
        $mobile_number = $this->input->post('mobile_number');
        $office_address = $this->input->post('office_address');
        $total_employees = $this->input->post('total_employees');
        $industry_type = $this->input->post('industry_type');
        $state = $this->input->post('state');
        $zipcode = $this->input->post('zipcode');
        $country = $this->input->post('country');
        $datetime = date('Y-m-d H:i:s');

        // AES_ENCRYPT(LOGIN_SALT,$username)
        $data_array = Array( 'personname'=>$personname, 'trading_name'=>$trading_name, 'personemail'=>$personemail, 'tranding_email'=>$tranding_email, 'landline_number'=>$landline_number, 'mobile_number'=>$mobile_number, 'total_employees'=>$total_employees, 'industry_type'=>$industry_type, 'office_address'=>$office_address, 'state'=>$state, 'zipcode'=>$zipcode, 'country'=>$country, 'created_at'=>$datetime);


        $insert = $this->db->insert('lead', $data_array);
        $insert_id = $this->db->insert_id();

//        $ContactPerson1Email = 'rahul@gmail.com';
//        $mailhtml = "";
//        $mailhtml .= '<div>';
//        $mailhtml .= '<p>Dear ' . ucfirst($name) . ',</p>';
//        $mailhtml .= "<p>Greetings</p><p>You are successfuly registerd. please use this username : " . $username . " and password : ".$password." </p>
//                                <p>Thanks!</p>
//                                <p>Best Regards,<br>Team ";
//
//        $mailhtml .= '</div>';
//        $this->sendEmail($ContactPerson1Email, 'Welcome', $mailhtml);
//

        if ($insert) {
            /* * *Activity Logs** */
            $msg = "New Lead ".$insert_id;
            //save_activity_details($msg);
            /* * *Activity Logs End** */

            return Array("status" => '1', "msg" => SUCCESS_INSERT_MSG);
        } else {
            return Array("status" => '2', "msg" => ERROR_MSG);
        }
    }



}

?>