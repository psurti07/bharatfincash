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
define('SMS_OBB_USERNAME', 'indcap');
define('SMS_OBB_PASSWORD', 'aad0958905XX');
define('SMS_OBB_SENDER_ID', 'lNDCPT');

// SMS Business details
define('SMS_OBB_USERNAME_BL', 'indcapBL');
define('SMS_OBB_PASSWORD_BL', '4509f01d33XX');
define('SMS_OBB_SENDER_ID_BL', 'lNDCPT');

// Bharatfincash SMS details
define('SMS_BFC_OBB_USERNAME', 'bharatfc');
define('SMS_BFC_OBB_PASSWORD', '377017929aXX');
define('SMS_BFC_OBB_SENDER_ID', 'BHFNCH');

// Zaakpay details
define('ZAAKPAY_MODE', 'PROD');
define('ZAAKPAY_MERCHANT_IDENTIFIER', '6d476ef820f14c4da8f171a91cff104f');
define('ZAAKPAY_SECRET_KEY', 'c7ad7f3a5590473898ffd9cadf60f60b');

/* define('ZAAKPAY_MODE', 'TEST');
define('ZAAKPAY_MERCHANT_IDENTIFIER', 'b19e8f103bce406cbd3476431b6b7973');
define('ZAAKPAY_SECRET_KEY', '0678056d96914a8583fb518caf42828a'); */

// Phonepe details
define('PHONEPE_MODE', 'PROD');
define('PHONEPE_MID', 'KREDITMEEONLINE');
define('PHONEPE_KEY', '7cf2596a-4779-438a-9585-95cb8fbd74d8');
define('PHONEPE_KEY_INDEX', '1');

/* define('PHONEPE_MODE', 'TEST');
define('PHONEPE_MID', 'GROWQUIKONLINEUAT');
define('PHONEPE_KEY', '166ca03a-5052-4ccc-9c18-b4c85ccfdeac');
define('PHONEPE_KEY_INDEX', '1'); */

// Worldline details
/* define('WORLDLINE_MODE', 'TEST');
define('WORLDLINE_MERCHANT_CODE', 'T952871');
define('WORLDLINE_SCHEME_CODE', 'FIRST');
define('WORLDLINE_KEY_SALT', '1025595944NSBHWW');
define('WORLDLINE_KEY_IV', '2725665664IMMWMU'); */

// Razorpay details
define('RAZOR_KEY_DEMO', '#');
define('RAZOR_KEY_ID', 'rzp_live_fVuzl4TG93vD91');
define('RAZOR_KEY_SECRET', '0chq1LukMCWeA4DzORUgtmd7');

// Cashfree details
define('CASHFREE_MODE', 'PROD');
define('CASHFREE_APP_ID', '698871ee5d4a01735258e170e5178896');
define('CASHFREE_SECRET_KEY', 'cfsk_ma_prod_8fe9f718631b33a9a341d7e2b02f9b29_7a27c306');

// SabPaisa details
define('SABPAISA_MODE', 'PROD');
define('SABPAISA_CLIENT_CODE', 'GROW72');
define('SABPAISA_USERNAME', 'payment_18710');
define('SABPAISA_PASSWORD', 'GROW72_SP18710');
define('SABPAISA_AUTH_KEY', 'BBPS1Rh6r4RrkHHI');
define('SABPAISA_AUTH_IV', 'w9wNzjnqoirQFysP');

// PAygic
define('PAYGIC_MID', 'INDCAPITAL');
define('PAYGIC_PASSWORD', 'MN$Av3W2W');

// Easebuzz details
define('EASEBUZZ_ENV', 'PROD');
define('EASEBUZZ_MERCHANT_KEY', 'XQRCTDJEVJ');
define('EASEBUZZ_SALT', 'PL6212UAJS');

// OpenMoney details
/* define('OPENMONEY_MODE', 'TEST');
define('OPENMONEY_URL', 'https://sandbox-payments.open.money/layer');
define('OPENMONEY_API_KEY', '3c8c5e70-e92f-11ef-a457-070b5a10732c');
define('OPENMONEY_API_SECRET', 'e97b9ac6e32cf061d108b150084bfa6e103f05d9'); */

define('OPENMONEY_MODE', 'PROD');
define('OPENMONEY_URL', 'https://payments.open.money/layer');
define('OPENMONEY_API_KEY', 'a4bf06ce-3071-4cff-a0d8-e08f7887a2fc');
define('OPENMONEY_API_SECRET', '4c7c039e0076933159b9cd36e9575e0a3428ebc299d5b5b18ada25b4df6b037a');

// Airpay details
define('AIRPAY_MERCHANT', '314735');
define('AIRPAY_USERNAME', 'wXV4mtjMPb');
define('AIRPAY_KEY_PASSWORD', 'UkZs6qn3');
define('AIRPAY_SECRET', '34KhzzSwkqGH5TwU');

//UAT Mobile Mumbers list
define('UAT_MOBILE_NUMBERS', serialize(array('9408881214', '7984310891')));

// Whatsapp API
define('INTERAKT_KEY', 'bEQxNmlwdXh3N0pNMGZremhURUNTeG5RU0VEUnJyV1J6T1o4czZ6dkJvdzo=');


// Bharatfincash finance
define('SUBSCRIPTION_INTERAKT_KEY', 'Q2ZHSVZQNW1LZmdOMWxZblRFSDV3eWxBdmpRZ2VQNVJ5allnTHNwcDFDczo=');
define('SUBSCRIPTION_INTERAKT_KEY_NEW', 'MHhyWmJaZmZBalVqNDF2SEhaQ09ocWdtcWhmT0tMVGc1Si14UWxTcHBuTTo=');
define('SUBSCRIPTION_INTERAKT_KEY_PORTAL_2', 'MHhyWmJaZmZBalVqNDF2SEhaQ09ocWdtcWhmT0tMVGc1Si14UWxTcHBuTTo=');

// Whatsapp API
define('AISENSY_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjY2NTZmNTZhYzBiNTI3MjRlNzg4NmIyOCIsIm5hbWUiOiJOb3dvZmxuIENvbnN1bHRhbmN5IEluZGlhIFB2dC4gTHRkLiA1NjI2IiwiYXBwTmFtZSI6IkFpU2Vuc3kiLCJjbGllbnRJZCI6IjY2NTZmNTZhYzBiNTI3MjRlNzg4NmIyMSIsImFjdGl2ZVBsYW4iOiJCQVNJQ19NT05USExZIiwiaWF0IjoxNzE2OTc0OTU0fQ.f8rwItJLy26uUByvmMQoacsrsXRRGAoXLigcBX9QClU');

// Aisency define constant value offer, payment and remarketing
// Aisency define constant value offer, payment and remarketing
define('AISENSY_OFFER_URL', 'https://d3jt6ku4g6z5l8.cloudfront.net/IMAGE/6656f56ac0b52724e7886b28/7425864_indget28nov.jpeg');
define('AISENSY_OFFER_IMAGE', 'ind_get_28nov.jpeg');

define('AISENSY_MARKETING_URL', 'https://d3jt6ku4g6z5l8.cloudfront.net/IMAGE/6656f56ac0b52724e7886b28/1118829_indrm10jan.jpeg');
define('AISENSY_MARKETING_IMAGE', 'ind_rm_10jan.jpeg');

define('AISENSY_SUCCESS_URL', '#');
define('AISENSY_SUCCESS_IMAGE', '#');

define('AISENSY_FAIL_URL', '#');
define('AISENSY_FAIL_IMAGE', '#');

/* Business URL and Image Name */
define('AISENSY_OFFER_URL_BL', 'https://whatsapp-media-library.s3.ap-south-1.amazonaws.com/IMAGE/65363945540fe90be3b3ed7c/1027410_indcapitalblget18dec.jpg');
define('AISENSY_OFFER_IMAGE_BL', 'indcapital_bl_get_18dec.jpg');

define('AISENSY_MARKETING_URL_BL', 'https://whatsapp-media-library.s3.ap-south-1.amazonaws.com/IMAGE/65363945540fe90be3b3ed7c/358117_indblrm.png');
define('AISENSY_MARKETING_IMAGE_BL', 'ind_bl_rm.png');

// RCS details
define('RCS_USERID', 'Indcapital_rcs1');
define('RCS_APIKEY', '677a8c74e077254a1b263821');
define('RCS_TEMPLATEID', 'f28e948d-d22b-4371-acc5-16142482d216');

// Geoloc API Key
define('GEOLOC_API_KEY', 'VF91oHzC7iqYtU8P7bcs1uzEu4QMcoe3LU64WniB');

// Facebook
define('ACCESS_TOKEN', 'EAALWx6NoYKMBAKoANHRas8ilf06ueiLTEOQaHdLAL2O1kGVh7Hd18S3gM7W84ICxw2kxsMHt6CQBf2XiRKTZBjrj9u9nHQ4pxaGjeim8qtkauDHUpFjoUptaAyCPS6ReD7mPNubhvA784xJL1cszwMcoJEtGWNpzIogxJk6pvIb3CZBOv8BXollM8g2j4ZD');

define('COMPANY_CODE', 'INCAP0891');
define('LOCAL_IP', '190.92.174.183');