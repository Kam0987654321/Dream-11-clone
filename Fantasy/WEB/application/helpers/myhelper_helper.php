<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// for queries we need to add the following line to access the db.
// $this = & get_instance();

function echoinsertdata($table, $data) {
        $values='';
        $query = "INSERT INTO $table set ";

        foreach ($data as $key => $val) {
            $values .= $key . " = '" . $val . "',";
        }
        $value = rtrim($values, ',');

        $query .= $value;

        return $query;

        //$result = $this->echoinsertdata('subject_master',$data_array);
    }


    function password_encrtpt($password){
        return  $pass  = hash('sha256', $password );
        //echo "<br>";
        //echo strlen($generate_order_id);
    }


    function generate_orderid($retailer){
        $todayd = date("ymd");
        $todayt = date("His");
        $retailerid = sprintf("%04d", $retailer);
        //$agentid = sprintf("%02d", $agent);
        //$orderid = sprintf("%06d", $id);
        return $unique =  $todayd . $retailerid . $todayt ;
    }

//'0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    function random_str($length = 8) {
        $possibleChars = "123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwyz!@#$%^&*()<>{}][";
        $password = '';

        for($i = 0; $i < $length; $i++) {
            $rand = rand(0, strlen($possibleChars) - 1);
            $password .= substr($possibleChars, $rand, 1);
        }

        return $password;
    }


    function date_dmy_to_ymd($date){
       $d = explode(' ', $date);
       $new_date = implode('-', array_reverse(explode('-', $d[0])));               
        
        if(isset($d[1])){
            $new_date = $new_date.' '.$d[1];
        }
      return $new_date; //implode('-', array_reverse(explode('-', $date)));
    }

function convert_number_to_words($number) {

    //$number = 8000.53;
   //$no = round($number,0,PHP_ROUND_HALF_DOWN);
//   $point = round($number - $no , 2) * 100;
   $n = explode('.', $number);
   $no = $n[0];
   $point = $n[1];
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] ." " . $digits[$counter] . $plural . " " . $hundred : $words[floor($number / 10) * 10]. " " . $words[$number % 10] . " ". $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);

  $points = ($point) ? " " . $words[$point / 10] . " " . $words[$point % 10] : '';
  $res =  $result . "Rupees ";

  if(trim($points)!=''){
    $res .=  " AND " . $points . " Paise only";
 }

  return strtoupper($res);
  // echo $point;
  // return $result;
}

     function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP')) {
            $ipaddress = getenv('HTTP_CLIENT_IP');
        } else if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        } else if (getenv('HTTP_X_FORWARDED')) {
            $ipaddress = getenv('HTTP_X_FORWARDED');
        } else if (getenv('HTTP_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        } else if (getenv('HTTP_FORWARDED')) {
            $ipaddress = getenv('HTTP_FORWARDED');
        } else if (getenv('REMOTE_ADDR')) {
            $ipaddress = getenv('REMOTE_ADDR');
        } else {
            $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;
    }

     function save_activity_details($activitydesc) {
        $CI =& get_instance();
        $new_activity_data = array(
            'dActivityDateTime' => date('Y-m-d H:i:s'),
            'iUserId' => trim($CI->session->userdata('user_id')),
            'cIPAddress' => get_client_ip(),
            'cActivityDesc' => $activitydesc
        );
        $insert = $CI->db->insert('activity_log_master', $new_activity_data);

        if ($insert) {
            $insert_id = $CI->db->insert_id();
            return $insert_id;
        } else {
            return FALSE;
        }
    }
    


    function sendEmail($RecipientEmailAddress, $EmailSubject, $EmailMessage, $Attachments='') {
        $mail = new PHPMailer();
        $mail->IsSMTP();                                     // We are going to use SMTP
        $mail->SMTPAuth = true;                                 // Enabled SMTP authentication
        $mail->SMTPSecure = "ssl";                                // Prefix for secure protocol to connect to the server
        $mail->Host = "md-80.webhostbox.net";                 // Setting GMail as our SMTP server
        $mail->Port = 465;     //25;            // SMTP port to connect to GMail
        $mail->Username = "support@digibooks.info";           // User email address
        $mail->Password = "support@123";
        $mail->IsHTML(true); // Password in GMail

        $mail->SetFrom('support@digibooks.info', 'Appdinein');     //Who is sending the email
        $mail->AddReplyTo('support@digibooks.info', 'Appdinein');  //Email address that receives the response
        $mail->Subject = "$EmailSubject";
        $mail->Body = "$EmailMessage";

        $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";

        $mail->AddAddress("$RecipientEmailAddress");  // Who is addressed the email to


        //some attached files , as many as you want
        if(!empty($Attachments)){ 
            foreach ($Attachments as $key => $filename) {
                $mail->AddAttachment($path.'/'.$filename);
            }
        }

        if (!$mail->Send()) {
            //  echo "Error: " . $mail->ErrorInfo;
            return false;
        } else {
            //  echo "Message sent correctly!";
            return true;
        }
    }    
    
function send_mail_simple($to_email_id,$from_email,$subject,$message){       

    $headers = "From: ".$from_email."\r\n";
    $headers .= "Reply-To: ".$from_email."\r\n";
    //$headers .= "CC: susan@example.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    if(mail($to_email_id, $subject, $message, $headers)){
        return true;
    }else{
        return false;
    }
}
 
    
function import_excel_upload(){
    $i = 1;
    $CI =& get_instance();
    $user_id = $CI->session->userdata('user_id');

    //load the excel library
    $CI->load->library('excel');
    $file = $_FILES['excelfile']['tmp_name'];

    //read file from path
    $objPHPExcel = PHPExcel_IOFactory::load($file);

    //get only the Cell Collection
    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
    //extract to a PHP readable array format
    foreach ($cell_collection as $cell) 
	{
        $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
        $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
        $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
        //header will/should be in row 1 only. of course this can be modified to suit your need.
        if ($row == 1) {
            $header[$row][$column] = $data_value;
        } else {
            $arr_data[$row][$column] = $data_value;
        }
    }
    //send the data in an array format
    $data['header'] = $header;
    $data['values'] = $arr_data;
//insert_batch
    foreach ($arr_data as $key => $row) {
		$date=date('Y-m-d H:i:s');
        $insert_data[] = array(
                'category' => $row['A'],
                'sub_category' => $row['B'],
                'super_category' => $row['C'],
                'product_name' => $row['D'],
                'sales_price' => $row['E'],
                'quantity' => $row['F'],
                'full_description' => $row['G'],           
                'created_date' => $date,
               
                );
        $i++;
    }

    $insert = $CI->db->insert_batch('product',$insert_data);

    if($insert){
        return $i-1 ." recoreds imported successfuly";
    }else{
        return "Sorry! There is some problem at row no.".$i." .";
    }
}    
    /*******************************  IMAGE UPLOAD FUNCTION  **************************************/
    function upload_image($insert_id, $imgvariable, $imgnewname,$foldername) {
        $err = '';
        $filename = '';
        if (!empty($_FILES[$imgvariable]["type"])) {
            $validextensions = array("jpeg", "jpg", "png" , "gif" , "ppt" , "pdf");
            $temporary = explode(".", $_FILES[$imgvariable]["name"]);
            $file_extension = end($temporary);
            $filename = $imgnewname . $insert_id . "." . $file_extension;
            if ((($_FILES[$imgvariable]["type"] == "image/png") || ($_FILES[$imgvariable]["type"] == "image/jpg") || ($_FILES[$imgvariable]["type"] == "image/jpeg") || ($_FILES[$imgvariable]["type"] == "image/gif") || ($_FILES[$imgvariable]["type"] == "application/vnd.ms-powerpoint") || ($_FILES[$imgvariable]["type"] == "application/pdf")
                    ) && ($_FILES[$imgvariable]["size"] < 1000000)//Approx. 1000kb files can be uploaded.
                    && in_array($file_extension, $validextensions)) {
                if ($_FILES[$imgvariable]["error"] > 0) {
                    $err .= "Return Code: " . $_FILES[$imgvariable]["error"] . "<br/><br/>";
                    return array("status" => false, 'filename' => "");
                } else {
                    if (file_exists("uploads/".$foldername."/". $_FILES[$imgvariable]["name"])) {
                        // $err .= $_FILES["image_add"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
                        unlink("uploads/".$foldername."/". $filename);
                    }
                    $sourcePath = $_FILES[$imgvariable]['tmp_name']; // Storing source path of the file in a variable
                    // $targetPath = "uploads/" . $_FILES['image_add']['name']; // Target path where file is to be stored

                    $targetPath = "uploads/".$foldername."/". $filename; // Target path where file is to be stored 
                    move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
//                        $data_array = Array('imagename' =>$filename );
//                        $this->db->where_in('id', $insert_id);
//                        $update = $this->db->update('course_master', $data_array);
                }
            }
            return array("status" => true, 'filename' => $filename);
        } else {
            return array("status" => false, 'filename' => "");
        }
    }    
    

 
    
    function create_pagination($post, $table, $primaryKey, $columns) {

    $CI =& get_instance();
    //$aColumns = array( 'engine', 'browser', 'platform', 'version', 'grade' );
    $aColumns = $columns;
    
    /* Indexed column (used for fast and accurate table cardinality) */
    //$sIndexColumn = "id";
    $sIndexColumn = $primaryKey;
    /* DB table to use */
    //$sTable = "ajax";
    $sTable = $table;
        
        
    
    /* 
     * Paging
     */
    $sLimit = "";
        
        
    if ( isset( $post['iDisplayStart'] ) && $post['iDisplayLength'] != '-1' )
    {
          $sLimit = $CI->db->limit($post['iDisplayLength'],$post['iDisplayStart']);
    }
        
       
        
        //print_r($sLimit);die;
        
    
    //return $sLimit;
    /*
     * Ordering
     */
    if ( isset( $post['iSortCol_0'] ) )
    {
        $sOrder = "ORDER BY  ";
        for ( $i=0 ; $i<intval($CI->db->escape_str($iSortCol)) ; $i++ )
        {
            if ( $post[ 'bSortable_'.intval($CI->db->escape_str($iSortCol)) ] == "true" )
            {
                $sOrder .= $aColumns[ intval($CI->db->escape_str($iSortCol)) ]."
                    ".$CI->db->escape_str($sSortDir) .", ";
            }
        }
        
        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" )
        {
            $sOrder = "";
        }
    }
        
 
      
    
    //return $sOrder;
    /* 
     * Filtering
     * NOTE this does not match the built-in DataTables filtering which does it
     * word by word on any field. It's possible to do here, but concerned about efficiency
     * on very large tables, and MySQL's regex functionality is very limited
     */
    $sWhere = "";
    if ( $post['sSearch'] != "" )
    {
        $sWhere = "WHERE (";
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $post['sSearch'] )."%' OR ";
        }
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ')';
    }
    
    /* Individual column filtering */
    for ( $i=0 ; $i<count($aColumns) ; $i++ )
    {
        if ( $post['bSearchable_'.$i] == "true" && $post['sSearch_'.$i] != '' )
        {
            if ( $sWhere == "" )
            {
                $sWhere = "WHERE ";
            }
            else
            {
                $sWhere .= " AND ";
            }
            $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($post['sSearch_'.$i])."%' ";
        }
    }
        

    
    /*
     * SQL queries
     * Get data to display
     */
        $CI->db->select('SQL_CALC_FOUND_ROWS ' . str_replace(' , ', ' ', implode(', ', $aColumns)), false);
        $CI->db->from($sTable);

        $rResult = $CI->db->get();
//        $q = $this->db->last_query();
//        echo $q; die;

    /* Data set length after filtering */
        $CI->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $CI->db->get()->row()->found_rows;

        // Total data set length
        $iTotal = $iFilteredTotal;

        

    /*
     * Output
     */
    $output = array(
        "sEcho" => intval($post['sEcho']),
        "iTotalRecords" => $iTotal,
        "iTotalDisplayRecords" => $iFilteredTotal,
        "aaData" => array()
    );
        
        
        $allRow = $rResult->result_array();

    foreach($allRow as $aRow)
    {
        $row = array();
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
                        
            if ( $i == 1 )
            {
                /* Special output formatting for '1' column */
                $row[] = "<button type='button' style='border-radius: 40px;height:40px;' data-toggle='modal' data-target='#myModal_followup_Add' id='followup_Add' class='btn btn-info inline' title='followup_Add' onclick='get_enquiries_by_id(".$aRow[ $aColumns[0] ].")'><span class='glyphicon glyphicon-plus'></span></button>";
            }
                        
            if ( $aColumns[$i] == "xxx" )
            {
                /* Special output formatting for 'version' column */
                $row[] = 'abc'; //($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
            }
            else if ( $aColumns[$i] != ' ' )
            {
                /* General output */
                                if ( $i == 0 )
                                {
                /* Special output formatting for '0' column */
                                    $row[] = "<label><input name='checkboxlist' type='checkbox' id='enquiryid_".$$aRow[ $aColumns[0] ]."' value='".$aRow[ $aColumns[0] ]."'></label>".$aRow[ $aColumns[$i] ];
                                 }else{
                                    $row[] = $aRow[ $aColumns[$i] ];
                                }
            }
        }
                
                
                
        $output['aaData'][] = $row;
    }
        
    
    return json_encode( $output );

}    

function pre($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}


function checkData() {
    $sections = array(
        'config' => TRUE,
        'queries' => TRUE
    );
    $CI =& get_instance();
    $CI->output->set_profiler_sections($sections);
    $CI->output->enable_profiler(TRUE);
}




function get_all_menus() {
    $CI =& get_instance();
    $userid = $CI->input->post('userid');
    $sql = "SELECT  menu_master.iMenuId, menu_master.cMenuName, menu_master.cMenuUrl , menu_master.iParentMenuId
            FROM menu_master 
            WHERE bActive='0' ORDER BY menu_master.iParentMenuId ASC ";
    $query = $CI->db->query($sql);
    $result = $query->result_array();
    return $result;
}


function get_users_rights($userid) {

    $CI =& get_instance();
    
    $sql = "SELECT iMenuId,iParentMenuId,iAccessId,iUserId,bView,bAdd,bEdit,bDelete FROM adminuser_rights WHERE iUserId='" . $userid . "'";
    $query = $CI->db->query($sql);
    if ($query) {
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
}

function getcheckedmenu($menuid, $usersid) {
    $CI =& get_instance();
    $sql = "SELECT iMenuId,iAccessId,iUserId,bView,bAdd,bEdit,bDelete FROM adminuser_rights WHERE iMenuId='" . $menuid . "' AND iUserId = '" . $usersid . "' ";
    $query = $CI->db->query($sql);
    if ($query) {
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
}


    function upload_files($path, $title, $files,$config='')
    {      
        $CI =& get_instance();
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|gif|png',
            'overwrite'     => 1,                       
        );
        //$this->load->library('upload', $config);
        $images = array();        
        foreach ($_FILES[$files]['name'] as $key => $image) {
            $_FILES['images']['name']= $_FILES[$files]['name'][$key];
            $_FILES['images']['type']= $_FILES[$files]['type'][$key];
            $_FILES['images']['tmp_name']= $_FILES[$files]['tmp_name'][$key];
            $_FILES['images']['error']= $_FILES[$files]['error'][$key];
            $_FILES['images']['size']= $_FILES[$files]['size'][$key];
            $fileName = $title .'_'. $image;
           $time=strtotime(date('Y-m-d H:i:s'));
           $fileName=$time.'_'. $image;
            $images[] = $fileName;
            $config['file_name'] = $fileName;
            if (file_exists("uploads/".$path."/". $_FILES[$files]["name"][$key])) {
                // $err .= $_FILES["image_add"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
                    unlink("uploads/".$path."/". $fileName);
             }
             $sourcePath = $_FILES[$files]['tmp_name'][$key];
             $targetPath = "uploads/".$path."/". $fileName; // Target path where file is to be stored 
                    move_uploaded_file($sourcePath, $targetPath);         
        }
        return $images;
    }



function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 


function cleanString($string) {
   return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}


function check_registration_expire($regdate,$days){
    $nextday = date('Y-m-d', strtotime($days, strtotime($regdate)));
    $today = date('Y-m-d');
    if(strtotime($nextday)<=strtotime($today)){
        return true;
    }else{
        return false;
    }

}

//name of table, fieldname for where condition, id for where condition, name of field to display in option, name of field to store in database
		function dependent_dropdown($table,$field,$parentid,$selfname,$selfid)
		{
			$html ='';
			$query = $CI->db->query("SELECT * FROM ".$table." WHERE `".$field."` = '".$id."' ");
			$result = $query->result();
			if(!empty($result)){
				foreach($result as $data){
					$html .= '<option value="'.$data->$selfid.'" >'.$data->$selfname.'</option>';
				}
			}
				return $html;	
		}
		
			function selected_dependent_dropdown($table,$field,$parentid,$selfname,$selfid,$value)
		{
			$html ='';
			$query = $CI->db->query("SELECT * FROM ".$table." WHERE `".$field."` = '".$id."' ");
			$result = $query->result();
			if(!empty($result)){
				foreach($result as $data){
					$html .= '<option ';
					if($value == $data->$selfid)
					{
						$html .=" selected ";
					}
					$html .=' value="'.$data->$selfid.'" >'.$data->$selfname.'</option>';
				}
			}
				return $html;	
		}


function insert_update($table,$data, $field,$id)
{
    $CI =& get_instance();
    $insert_id = 0;
    $query = $CI->db->query("SELECT * FROM ".$table." WHERE `".$field."` = '".$id."' ");
    $result = $query->result_array();
    $count = count($result);

    if (empty($count)) {
        $CI->db->insert($table, $data);
        $insert_id = $CI->db->insert_id(); 
    }
    elseif ($count == 1) {
        $CI->db->where($field, $id);
        $CI->db->update($table, $data); 
        $insert_id = 0;
    }

    return $insert_id;
}



function image_compress($source, $destination, $quality) {

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

    return $destination;
}


 function deleteDir($path) {
    if (empty($path)) { 
        return false;
    }
    return is_file($path) ?
            @unlink($path) :
            array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
}






