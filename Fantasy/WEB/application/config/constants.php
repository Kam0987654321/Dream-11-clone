<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

if(!defined('LOGIN_SALT')){ define('LOGIN_SALT','gCjhoT3wo253f8g56Dg4re8GS7DH3fgGDgRgfmo2f'); } 
define('COMPANY_PREFIX','990');
define('BITCOIN_ADDRESS','12pX732vQPoR6CdQKXBkp4QYrdAnJ6VG5G');
define('COMPANYID_PREFIX',5);
define('PRODUCTID_PREFIX',4);
define('SAVE_DATE_FORMAT',date('Y-m-d H:i:s'));

define('ERROR_INSERT_MSG',"Error in saving Data !");
define('ERROR_UPDATE_MSG',"Error in updating Data !");
define('ERROR_DELETE_MSG',"Error in deleting Data !");

define('SUCCESS_INSERT_MSG',"Data Saved Successfully!");
define('SUCCESS_UPDATE_MSG',"Data Updated Successfully!");
define('SUCCESS_DELETE_MSG',"Successfuly Deleted!");
define('SUCCESS_DEACTIVATED_MSG',"Successfuly Deactivated!");
define('SUCCESS_ACTIVATED_MSG',"Successfuly Activated!");

define('ERROR_MSG',"Some Error Occured!!");
define('DEFAULT_IMAGE','thumbnail.png');
define('EXIST_MSG',"Already Exist !");

define('FROM_EMAIL',"");

define('VERIFICATION_EXPIRES','+3 days');

define('RUPEE','₹');

define('SITE_COLOR','#4ca1af');

define('SITE_TITLE','Ground11');

define('LOGIN_PAGE_TITLE','Ground11');

define('COPYRIGHT_TEXT','Copyright 2018. All rights reserved.');

define('DOCTOR_INFO',false);

define('COMPANYNAME','HelloFresh');

define('DATE_TIME_FORMAT',date('Y-m-d H:i:s'));

define('CURRENCY','Rs. ');

define('SUBSCRIBE_SUCCESS','You are subscribed Successfully');

define('SUBSCRIBE_FAIL','Fail To Subscribe');

defined('PROD_IMG_URL') OR define('PROD_IMG_URL', 'http://aladindeals.com/admin/multeback/web/attachments/');
define('CLIENTKEY' ,'6Lc2Nm4UAAAAAJ3wQYVDRmRrdDH9uETUkF_QApY_');
define('SECRETKEY','6Lc2Nm4UAAAAADbSRxib2hk6TDjYkTiljoqi3ySx');


//$_SERVER['COMPANY_DATA']='INSERT INTO `company_master` (`id`, `CompanyName`, `CompanyContactNo`, `CompanyEmail`, `CategoryId`, `Address`, `StateId`, `CityId`, `ContactPerson`, `ContactMobile`, `ContactEmail`, `PanNo`, `TinNo`, `DLNo`, `LSTNo`, `CSTNo`, `GSTNo`, `TANNo`, `FassaiCode`, `CreditDays`, `CreditLimit`, `DivisionId`, `ShortName`, `Transporter`, `CreatedDateTime`, `RetailerAsAgentId`, `GstStatus`) VALUES ('0', 'ZOTA HEALTHCARE LTD', '0261-2331601', 'zotahealth@yahoo.com', NULL, 'Zota house, Bhagwan Aiyappa, complex , udhana-Navsari highway next to batliboi,surat', '1', '1', NULL, NULL, NULL, NULL, NULL, '20B SUR 75485 , 21B SUR 75486', NULL, NULL, '24AAACZ1196M1ZZ', NULL, '10712021000973', NULL, NULL, '', 'ZOTA', NULL, '2018-05-04 00:00:00', '0', '0');';

$_SERVER['ORDER_STATUS'] = ARRAY('0'=>'<span style="color:red">Pending</span>','1'=>'<span style="color:#1ab394">Full Approved</span>','2'=>'<span style="color:#1a7bb9">Full Disapproved</span>','3'=>'<span style="color:orange">Partially Approved</span>' ,'4'=>'<span style="color:#1ab394">Order Confirmed</span>','5'=>'<span style="color:#1a7bb9;">Order Dispatched</span>','6'=>'<span style="color:#1a7bb9;">Stock Received</span>');

$_SERVER['ORDERSTATUS'] = ARRAY('0'=>'Pending','1'=>'Full Approved','2'=>'Full Disapproved','3'=>'Partially Approved' ,'4'=>'Order Confirmed','5'=>'Order Dispatched','5'=>'Stock Received');

$_SERVER['RETURNSTATUS'] =  ARRAY('0'=>'<span style="color:red">Pending</span>','1'=>'<span style="color:#1ab394">Full Approved</span>','2'=>'<span style="color:#1a7bb9">Full Disapproved</span>','3'=>'<span style="color:orange">Partially Approved</span>' ,'4'=>'<span style="color:#1a7bb9;">Order Dispatched</span>','5'=>'<span style="color:#1a7bb9;">Stock Received</span>');

$_SERVER['LOGINROLES'] = ARRAY('1'=>'distributor', '2'=>'stockist', '3'=>'retailer');

$_SERVER['ACTIVE_DEACTIVE']  = ARRAY('0'=>'Active','1'=>'Deactive');


$_SERVER['YESNO']  = ARRAY('0'=>'No','1'=>'Yes');

$_SERVER['GST_TAX'] = 9;

$_SERVER['IGST_TAX'] = 9;

$_SERVER['PAYMENT_MODES'] = ARRAY('1'=>'CASH','2'=>'Debit Card','3'=>'Credit Card');

$_SERVER['LEDGER_TYPE'] = ARRAY('1'=>'Credit','2'=>'Debit');

$_SERVER['LEDGER_USER_TYPE'] = ARRAY('0'=>array('4'=>'Vendor','2'=>'Stockist'),'2'=>array('0'=>'Company','3'=>'Retailer'),'3'=>array('2'=>'Stockist'));
$_SERVER['LEDGER_USER_TYPE'] = ARRAY('0'=>array('4'=>'Vendor','2'=>'Stockist'),'2'=>array('0'=>'Company','3'=>'Retailer'),'3'=>array('2'=>'Stockist'));