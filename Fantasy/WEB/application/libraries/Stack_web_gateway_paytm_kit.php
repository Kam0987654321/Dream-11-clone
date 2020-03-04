<?php  //if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// ------------------------------------------------------------------------

class Stack_web_gateway_paytm_kit{

	var $CI;
	public function __construct($config = array())
	{
		$this->CI =& get_instance();

		/*
		- Use PAYTM_ENVIRONMENT as 'PROD' if you wanted to do transaction in production environment else 'TEST' for doing transaction in testing environment.
		- Change the value of PAYTM_MERCHANT_KEY constant with details received from Paytm.
		- Change the value of PAYTM_MERCHANT_MID constant with details received from Paytm.
		- Change the value of PAYTM_MERCHANT_WEBSITE constant with details received from Paytm.
		- Above details will be different for testing and production environment.
		*/

		// define('PAYTM_ENVIRONMENT', 'TEST'); // PROD
		// define('PAYTM_MERCHANT_KEY', 'O0zUdI1&G%OQViK_'); //Change this constant's value with Merchant key received from Paytm.
		// define('PAYTM_MERCHANT_MID', 'dZlzzF17647713571019'); //Change this constant's value with MID (Merchant ID) received from Paytm.
		// define('PAYTM_MERCHANT_WEBSITE', 'WEBSTAGING'); //Change this constant's value with Website name received from Paytm.


		//=================================================
		//	For PayTM Settings::
		//=================================================

		//$PAYTM_ENVIRONMENT = "PROD";	// For Production /LIVE
		$PAYTM_ENVIRONMENT = "TEST";	// For Staging / TEST

		if(!defined("PAYTM_ENVIRONMENT") ){
			define('PAYTM_ENVIRONMENT', $PAYTM_ENVIRONMENT); 
		}

		// For LIVE
		if (PAYTM_ENVIRONMENT == 'PROD') {
			//===================================================
			//	For Production or LIVE Credentials
			//===================================================
			$PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
			$PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';


		}else{
			//===================================================
			//	For Staging or TEST Credentials
			//===================================================
			$PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
			$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';

			//Change this constant's value with Merchant key received from Paytm.
			$PAYTM_MERCHANT_MID 		= "lwgrMJ15361151450590";
			$PAYTM_MERCHANT_KEY 		= "FSaZ_39MD6DtDlQX";

			$PAYTM_CHANNEL_ID 		= "WEB";
			$PAYTM_INDUSTRY_TYPE_ID = "Retail";
			$PAYTM_MERCHANT_WEBSITE = "WEBSTAGING";

			$PAYTM_CALLBACK_URL 	= base_url('website/paytm_success_transaction');
			
		}

		define('PAYTM_MERCHANT_KEY', $PAYTM_MERCHANT_KEY); 
		define('PAYTM_MERCHANT_MID', $PAYTM_MERCHANT_MID);

		define("PAYTM_MERCHANT_WEBSITE", $PAYTM_MERCHANT_WEBSITE);
		define("PAYTM_CHANNEL_ID", $PAYTM_CHANNEL_ID);
		define("PAYTM_INDUSTRY_TYPE_ID", $PAYTM_INDUSTRY_TYPE_ID);
		define("PAYTM_CALLBACK_URL", $PAYTM_CALLBACK_URL);


		define('PAYTM_REFUND_URL', '');
		define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
		define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
		define('PAYTM_TXN_URL', $PAYTM_TXN_URL);


		//===================================================
	}


	public function encrypt_e($input, $ky) {
		$key   = html_entity_decode($ky);
		$iv = "@@@@&&&&####$$$$";
		$data = openssl_encrypt ( $input , "AES-128-CBC" , $key, 0, $iv );
		return $data;
	}

	public function decrypt_e($crypt, $ky) {
		$key   = html_entity_decode($ky);
		$iv = "@@@@&&&&####$$$$";
		$data = openssl_decrypt ( $crypt , "AES-128-CBC" , $key, 0, $iv );
		return $data;
	}

	public function generateSalt_e($length) {
		$random = "";
		srand((double) microtime() * 1000000);

		$data = "AbcDE123IJKLMN67QRSTUVWXYZ";
		$data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
		$data .= "0FGH45OP89";

		for ($i = 0; $i < $length; $i++) {
			$random .= substr($data, (rand() % (strlen($data))), 1);
		}

		return $random;
	}

	public function checkString_e($value) {
		if ($value == 'null')
			$value = '';
		return $value;
	}

	public function getChecksumFromArray($arrayList, $key, $sort=1) {
		if ($sort != 0) {
			ksort($arrayList);
		}
		$str = $this->getArray2Str($arrayList);
		$salt = $this->generateSalt_e(4);
		$finalString = $str . "|" . $salt;
		$hash = hash("sha256", $finalString);
		$hashString = $hash . $salt;
		$checksum = $this->encrypt_e($hashString, $key);
		return $checksum;
	}
	public function getChecksumFromString($str, $key) {
		
		$salt = $this->generateSalt_e(4);
		$finalString = $str . "|" . $salt;
		$hash = hash("sha256", $finalString);
		$hashString = $hash . $salt;
		$checksum = $this->encrypt_e($hashString, $key);
		return $checksum;
	}

	public function verifychecksum_e($arrayList, $key, $checksumvalue) {
		$arrayList = $this->removeCheckSumParam($arrayList);
		ksort($arrayList);
		$str = $this->getArray2StrForVerify($arrayList);
		$paytm_hash = $this->decrypt_e($checksumvalue, $key);
		$salt = substr($paytm_hash, -4);

		$finalString = $str . "|" . $salt;

		$website_hash = hash("sha256", $finalString);
		$website_hash .= $salt;

		$validFlag = "FALSE";
		if ($website_hash == $paytm_hash) {
			$validFlag = "TRUE";
		} else {
			$validFlag = "FALSE";
		}
		return $validFlag;
	}

	public function verifychecksum_eFromStr($str, $key, $checksumvalue) {
		$paytm_hash = $this->decrypt_e($checksumvalue, $key);
		$salt = substr($paytm_hash, -4);

		$finalString = $str . "|" . $salt;

		$website_hash = hash("sha256", $finalString);
		$website_hash .= $salt;

		$validFlag = "FALSE";
		if ($website_hash == $paytm_hash) {
			$validFlag = "TRUE";
		} else {
			$validFlag = "FALSE";
		}
		return $validFlag;
	}

	public function getArray2Str($arrayList) {
		$findme   = 'REFUND';
		$findmepipe = '|';
		$paramStr = "";
		$flag = 1;	
		foreach ($arrayList as $key => $value) {
			$pos = strpos($value, $findme);
			$pospipe = strpos($value, $findmepipe);
			if ($pos !== false || $pospipe !== false) 
			{
				continue;
			}
			
			if ($flag) {
				$paramStr .= $this->checkString_e($value);
				$flag = 0;
			} else {
				$paramStr .= "|" . $this->checkString_e($value);
			}
		}
		return $paramStr;
	}

	public function getArray2StrForVerify($arrayList) {
		$paramStr = "";
		$flag = 1;
		foreach ($arrayList as $key => $value) {
			if ($flag) {
				$paramStr .= $this->checkString_e($value);
				$flag = 0;
			} else {
				$paramStr .= "|" . $this->checkString_e($value);
			}
		}
		return $paramStr;
	}

	public function redirect2PG($paramList, $key) {
		$hashString = $this->getchecksumFromArray($paramList);
		$checksum = $this->encrypt_e($hashString, $key);
	}

	public function removeCheckSumParam($arrayList) {
		if (isset($arrayList["CHECKSUMHASH"])) {
			unset($arrayList["CHECKSUMHASH"]);
		}
		return $arrayList;
	}

	public function getTxnStatus($requestParamList) {
		return $this->callAPI(PAYTM_STATUS_QUERY_URL, $requestParamList);
	}

	public function getTxnStatusNew($requestParamList) {
		return $this->callNewAPI(PAYTM_STATUS_QUERY_NEW_URL, $requestParamList);
	}

	public function initiateTxnRefund($requestParamList) {
		$CHECKSUM = $this->getRefundChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY,0);
		$requestParamList["CHECKSUM"] = $CHECKSUM;
		return $this->callAPI(PAYTM_REFUND_URL, $requestParamList);
	}

	function callAPI($apiURL, $requestParamList) {
		$jsonResponse = "";
		$responseParamList = array();
		$JsonData =json_encode($requestParamList);
		$postData = 'JsonData='.urlencode($JsonData);
		$ch = curl_init($apiURL);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
		'Content-Type: application/json', 
		'Content-Length: ' . strlen($postData))                                                                       
		);  
		$jsonResponse = curl_exec($ch);   
		$responseParamList = json_decode($jsonResponse,true);
		return $responseParamList;
	}

	function callNewAPI($apiURL, $requestParamList) {
		$jsonResponse = "";
		$responseParamList = array();
		$JsonData =json_encode($requestParamList);
		$postData = 'JsonData='.urlencode($JsonData);
		$ch = curl_init($apiURL);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
		'Content-Type: application/json', 
		'Content-Length: ' . strlen($postData))                                                                       
		);  
		$jsonResponse = curl_exec($ch);   
		$responseParamList = json_decode($jsonResponse,true);
		return $responseParamList;
	}
	function getRefundChecksumFromArray($arrayList, $key, $sort=1) {
		if ($sort != 0) {
			ksort($arrayList);
		}
		$str = $this->getRefundArray2Str($arrayList);
		$salt = $this->generateSalt_e(4);
		$finalString = $str . "|" . $salt;
		$hash = hash("sha256", $finalString);
		$hashString = $hash . $salt;
		$checksum = $this->encrypt_e($hashString, $key);
		return $checksum;
	}
	function getRefundArray2Str($arrayList) {	
		$findmepipe = '|';
		$paramStr = "";
		$flag = 1;	
		foreach ($arrayList as $key => $value) {		
			$pospipe = strpos($value, $findmepipe);
			if ($pospipe !== false) 
			{
				continue;
			}
			
			if ($flag) {
				$paramStr .= $this->checkString_e($value);
				$flag = 0;
			} else {
				$paramStr .= "|" . $this->checkString_e($value);
			}
		}
		return $paramStr;
	}
	function callRefundAPI($refundApiURL, $requestParamList) {
		$jsonResponse = "";
		$responseParamList = array();
		$JsonData =json_encode($requestParamList);
		$postData = 'JsonData='.urlencode($JsonData);
		$ch = curl_init($apiURL);	
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_URL, $refundApiURL);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		$headers = array();
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  
		$jsonResponse = curl_exec($ch);   
		$responseParamList = json_decode($jsonResponse,true);
		return $responseParamList;
	}

}
?>