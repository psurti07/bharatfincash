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


/**
 * Custom defines
 */

// Project details
define('PROJECT_NAME', 'Indcapital');
define('COMPANY_NAME', 'Growquik Services Pvt. Ltd.');
define('COMPANY_EMAIL', 'info@indcapital.in');
define('COMPANY_MOBILE', '+91-98730-80345');
define('COMPANY_CIN', 'U67100GJ2022PTC134395');
define('COMPANY_GST', '24AAJCG9528P1ZV');
define('COMPANY_SITE', 'https://indcapital.in');
define('COMPANY_ADDRESS', '2nd Floor, Shop NO.226 Plot NO.89, Unique Square, Singanpor Road, Surat, Gujarat 395004');
define('COMPANY_TIMING', '10AM to 5PM (Monday to Saturday)');

define('SECURE_SALT', 'verloopweb');

//Social media
define('SM_GOOGLE', '#');
define('SM_FACEBOOK', 'https://www.facebook.com/indcapitalofficial');
define('SM_INSTAGRAM', 'https://www.instagram.com/indcapital.in/');
define('SM_TWITTER', 'https://twitter.com/Indcapital_');
define('SM_LINKEDIN', 'https://www.linkedin.com/company/Indcapital');
define('SM_PINTEREST', 'https://in.pinterest.com/indcapital007/');
define('SM_YOUTUBE', '#');

// Email SMTP details
define('SMTP_HOST', 'mail.indcapital.in');
define('SMTP_USER', 'info@indcapital.in');
define('SMTP_PASSWORD', 'Capital@3188');

// SENDINBLUE details
define('SIB_NAME', 'indcapital.in');
define('SIB_EMAILID', 'info@indcapital.in');
define('SIB_APIKEY', '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');

// SMS details
define('SMS_OBB_USERNAME', 'aad0958905XX');
define('SMS_OBB_PASSWORD', 'indcap');
define('SMS_OBB_SENDER_ID', 'lNDCPT');

// Bharatfincash SMS details
define('SMS_BFC_OBB_USERNAME', 'bharatfc');
define('SMS_BFC_OBB_PASSWORD', '377017929aXX');
define('SMS_BFC_OBB_SENDER_ID', 'BHFNCH');

// Geoloc API Key
define('GEOLOC_API_KEY', 'VF91oHzC7iqYtU8P7bcs1uzEu4QMcoe3LU64WniB');

// Facebook
define('ACCESS_TOKEN', '#');

// Whatsapp API
define('INTERAKT_KEY', 'OGtWX19mN3VPTFB4cGxOaWl3dTAwc05nVzVFWENDbVFrcVJOVDQtVGtpbzo=');

// Bharatfincash finance
define('SUBSCRIPTION_INTERAKT_KEY', 'Q2ZHSVZQNW1LZmdOMWxZblRFSDV3eWxBdmpRZ2VQNVJ5allnTHNwcDFDczo=');

// Whatsapp API
define('AISENSY_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjY1MzYzOTQ1NTQwZmU5MGJlM2IzZWQ3YyIsIm5hbWUiOiJHcm93cXVpayBTZXJ2aWNlcyBQcml2YXRlIExpbWl0ZWQiLCJhcHBOYW1lIjoiQWlTZW5zeSIsImNsaWVudElkIjoiNjUzNjM5NDU1NDBmZTkwYmUzYjNlZDc3IiwiYWN0aXZlUGxhbiI6IkJBU0lDX01PTlRITFkiLCJpYXQiOjE2OTgwNTI0MjF9.DKO1m-D6XJju_TaB0PZJ9ajJPBJEwngTYTxQr-qfgXI');

define('PG_DIGITAL_PL', 'Zaakpay');
define('PG_DIGITAL_BL', 'Zaakpay');
define('PG_CARD_OFFER', 'Zaakpay');
define('PG_SPECIAL_OFFER', 'OpenMoney');
define('PG_BUMPER_OFFER', 'Sabpaisa');
define('PG_FLASH_OFFER', 'Sabpaisa');
define('PG_QUICK_OFFER', 'JioPay');
define('PG_MEGA_OFFER', 'Paygic');

// 2nd product pages
define('PG_BHARATFINCASH', 'Zaakpay');
define('PG_STAR_OFFER', 'Razorpay');
define('PG_PRIME_OFFER', 'Jiopay');
define('PG_FESTIVAL_OFFER', 'Zaakpay'); 

define('COMPANY_CODE', 'INCAP0891');
define('LOCAL_IP', '190.92.174.183');
define('MASTER_API_KEY', 'MndjVndLQStGRzUzd2xrZmpXeC9sWmxXOE1SOG0zRmV3ZXVndUFoMnViOD0=');

define('DATA_LOCK', 'YES'); // display datalock in remarketing page
define('DAYS_LOCK', '7 Days'); // display datalock in remarketing page
define('DATE_LOCK', '#'); // display datalock in remarketing page

define('DATA_LOCK_PLAN', 'YES'); // display datalock in remarketing page
define('DAYS_LOCK_PLAN', '#'); // display datalock in remarketing page
define('DATE_LOCK_PLAN', '2025-07-23'); // display datalock in remarketing page
