<?php
define('AUTHORIZENET_LOGIN_KEY', 'enter-your-login-key'); // Both your API Login and Transaction Key can be found under the Setting Menu on your Merchant Interface (on your Authorize.net account).
define('AUTHORIZENET_TRANSACTION_KEY', 'aabbcc8X3Q8rq4bQ3K2u7J'); // instructions can be found here: http://www.authorize.net/support/merchant/Integration_Settings/Access_Settings.htm
define('AUTHORIZENET_MD5_HASH', 'TESTAPI'); // Define MD5 Hash - see https://support.authorize.net/authkb/index?page=content&id=A588&actp=LIST_POPULAR

function authorizenet_validate() {
	$valid = count($_POST) && isset($_POST['x_MD5_Hash']);
	if ($valid) {
		$amnt = isset($_POST['x_amount']) ? $_POST['x_amount'] : '0.00';
		$hash = AUTHORIZENET_MD5_HASH . AUTHORIZENET_LOGIN_KEY . $_POST['x_trans_id'] . $amnt;
		$hash = strtoupper(md5($hash));
		return $hash === $_POST['x_MD5_Hash'] && $_POST['x_response_code'] == 1;
	}
	return false;
}

function authorizenet_signature() {
	$time = (string)time();
	$hash = AUTHORIZENET_LOGIN_KEY . "^$time^$time^{$_POST['x_amount']}^";
	return array(
		'login' => AUTHORIZENET_LOGIN_KEY,
		'time' => $time,
		'hash' => function_exists('hash_hmac')
			? hash_hmac('md5', $hash, AUTHORIZENET_TRANSACTION_KEY)
			: bin2hex(mhash(MHASH_MD5, $hash, AUTHORIZENET_MD5_HASH))
	);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['x_signature'])) {
		echo json_encode(authorizenet_signature());
		exit;
	} else {
		$valid = authorizenet_validate();
		$url = $_POST['x_return_url'] . (!$valid ? '?error=' . $_POST['x_response_reason_text'] : '');
		echo "<html><head><script>window.location=\"$url\";</script>";
		echo "</head><body><noscript><meta http-equiv=\"refresh\" content=\"1;url=$url\"></noscript></body></html>";
	}
}