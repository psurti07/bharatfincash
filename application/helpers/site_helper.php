<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

function send_order_data($data)
{

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://bizfin.indiakarobar.com/api/channel-partners/turnover',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json'
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  return $response;
  die;
}

function getFacebookPixel($pixel = 'facebookpixel') {
	$value = null;
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select('option_value');
	$ci->db->where('option_key', $pixel);
	$cirow = $ci->db->get('site_options')->row();

	if ($cirow != "") {
		if ($cirow->option_value != "") {
			$value = $cirow->option_value;
		}
	}
	return $value;
}

function getFacebookDomain()
{
	$value = null;
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select('option_value');
	$ci->db->where('option_key', 'facebookdomain');
	$cirow = $ci->db->get('site_options')->row();

	if ($cirow != "") {
		if ($cirow->option_value != "") {
			$value = $cirow->option_value;
		}
	}
	return $value;
}

function fbconversioncurl($userdata)
{
	// PURCHASE DATA
	$FBConversionData = getFBConversionData($userdata['type']);
	$fbaccesstoken = $FBConversionData['fbaccesstoken']->option_value;
	$eventname = $FBConversionData['fbeventname']->option_value;
	$eventid = $FBConversionData['fbeventid']->option_value;

	$data = array();

	$data["event_time"] = round(microtime(true));
	$data["event_name"] = $eventname;
	$data["event_id"] = $eventid;
	$data["event_source_url"] = $userdata['sourceurl'];

	$fnarr[] = hash("sha256", $userdata['firstname']);
	$data["user_data"]["fn"] = $fnarr;

	$emarr[] = hash("sha256", $userdata['email']);
	$data["user_data"]["em"] = $emarr;

	$pharr[] = hash("sha256", $userdata['mobile']);
	$data["user_data"]["ph"] = $pharr;

	$ctarr[] = hash("sha256", $userdata['city']);
	$data["user_data"]["ct"] = $ctarr;

	$statearr[] = hash("sha256", $userdata['state']);
	$data["user_data"]["st"] = $statearr;

	$countryarr[] = hash("sha256", "in");
	$data["user_data"]["country"] = $countryarr;

	$data["user_data"]["client_ip_address"] = $_SERVER['REMOTE_ADDR'];
	$data["user_data"]["client_user_agent"] = $_SERVER['HTTP_USER_AGENT'];

	if ($userdata['fbclid'] != "") {
		$data["user_data"]["fbc"] = $userdata['fbclid'];
	}

	
	if ($userdata['version'] == 'v19.0' || $userdata['version'] == 'v21.0') {
		$data["custom_data"]["currency"] = "INR";
		$data["custom_data"]["value"] = 299.00;
		$data["custom_data"]["num_items"] = 1;
		$data["custom_data"]["content_type"] = "product";
		$data["custom_data"]["order_id"] = $userdata['orderid'];
		$data["custom_data"]["status"] = "registered";

		$contents["id"] = "MC2025";
		$contents["quantity"] = 1;
		$contents["item_price"] = 299.00;
		$data["custom_data"]["contents"] = array($contents);

	} else if ($userdata['version'] == 'v11.0' || $userdata['version'] == 'v16.0') {
		$contents["id"] = "MB2025";
		$contents["quantity"] = 1;
		$data["contents"][] = $contents;

		$data["custom_data"]["currency"] = "INR";
		$data["custom_data"]["value"] = 299.00;
		$data["custom_data"]["order_id"] = $userdata['orderid'];

	} else {
		$contents["id"] = "MB2025";
		$contents["quantity"] = 1;
		$data["contents"][] = $contents;

		$data["custom_data"]["currency"] = "INR";
		$data["custom_data"]["value"] = 299.00;
		$data["custom_data"]["order_id"] = $userdata['orderid'];

	}

	$data["action_source"] = "website";

	// Turn Data to JSON
	$data_json = json_encode(array($data));

	if ($userdata['type'] == 'digital') {
		$fbpixel = getFacebookPixel('facebookpixel');
		$accesstoken = $fbaccesstoken;
	} else if ($userdata['type'] == 'subscription') {
		$fbpixel = getFacebookPixel('facebookpixelsubscription');
		$accesstoken = $fbaccesstoken;
	} else {
		$fbpixel = '';
		$accesstoken = $fbaccesstoken;
	}

	// Fill available fields
	$fields = array();
	$fields['access_token'] = $fbaccesstoken;
	$fields['upload_tag'] = "orders"; // You should set a tag here (feel free to adjust)
	$fields['data'] = $data_json;

	$url = "https://graph.facebook.com/".$userdata['version']."/" . $fbpixel . "/events";
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		// Replace with your offline_event_set_id
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => http_build_query($fields),
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			//"content-type: multipart/form-data",
			"Accept: application/json"
		),
	)
	);

	$response = curl_exec($curl);
	curl_close($curl);
	return $response;
}

function sendxmlSMS($dataset)
{
	$xmldataset = "<SmsQueue><Account><APIKey>" . SMS_API_KEY . "</APIKey><SenderId>" . SMS_SENDER_ID . "</SenderId><Channel>2</Channel><DCS>0</DCS><FlashSms>0</FlashSms><Route>1</Route></Account><Messages>" . $dataset . "</Messages></SmsQueue>";

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://www.smsgatewayhub.com/api/mt/SendSms",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $xmldataset,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/xml"
		),
	)
	);
	$response = curl_exec($curl);
	curl_close($curl);
	return $response;
}

function sendtextSMS($mobile, $message)
{
	$sms_text = urlencode($message);

	$api_url = "https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=" . SMS_API_KEY . "&senderid=" . SMS_SENDER_ID . "&channel=2&DCS=0&flashsms=0&number=" . $mobile . "&text=" . $sms_text . "&route=1";

	//Submit to server
	$response = file_get_contents($api_url);
	return $response;
}

function sendotpSMS($mobile, $message)
{
	$sms_text = urlencode($message);
	$api_url = "https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=" . SMS_API_KEY . "&senderid=" . SMS_SENDER_ID . "&channel=2&DCS=0&flashsms=0&number=" . $mobile . "&text=" . $sms_text . "&route=1";

	//Submit to server
	$response = file_get_contents($api_url);
	return $response;
}

function sendtextSMSobb($mobile, $message, $panel = 'main')
{
	$sms_text = rawurlencode($message);

	if ($panel == 'subscription') {
		$obbusername = SMS_BFC_OBB_USERNAME;
		$obbpassword = SMS_BFC_OBB_PASSWORD;
		$obbsenderid = SMS_BFC_OBB_SENDER_ID;
	} else {
		$obbusername = SMS_OBB_USERNAME;
		$obbpassword = SMS_OBB_PASSWORD;
		$obbsenderid = SMS_OBB_SENDER_ID;
	}
	
	$api_url = "http://m.onlinebusinessbazaar.in/sendsms.jsp?user=" . $obbusername . "&password=" . $obbpassword . "&senderid=" . $obbsenderid . "&mobiles=" . $mobile . "&sms=" . $sms_text;
	//Submit to server
	$response = file_get_contents($api_url);
	return $response;
}

function senddynamicSMSobb($mobile, $message, $panel = 'main')
{
	$sms_text = urlencode($message);
	$smssenderid = getSMSsenderid();

	if ($panel == 'subscription') {
		$obbusername = SMS_BFC_OBB_USERNAME;
		$obbpassword = SMS_BFC_OBB_PASSWORD;
		$smssenderid = getSMSsenderid('smssenderid-subscription');
	} else {
		$obbusername = SMS_OBB_USERNAME;
		$obbpassword = SMS_OBB_PASSWORD;
		$smssenderid = getSMSsenderid('smssenderid');
	}

	$api_url = "http://m.onlinebusinessbazaar.in/sendsms.jsp?user=" . $obbusername . "&password=" . $obbpassword . "&senderid=" . $smssenderid . "&mobiles=" . $mobile . "&sms=" . $sms_text;

	//Submit to server
	$response = file_get_contents($api_url);
	return $response;
}

function sendotpSMSobb($mobile, $message, $panel = 'main')	
{
	$sms_text = rawurlencode($message);
	
	if ($panel == 'subscription') {
		$obbusername = SMS_BFC_OBB_USERNAME;
		$obbpassword = SMS_BFC_OBB_PASSWORD;
		$obbsenderid = SMS_BFC_OBB_SENDER_ID;
	} else {
		$obbusername = SMS_OBB_USERNAME;
		$obbpassword = SMS_OBB_PASSWORD;
		$obbsenderid = SMS_OBB_SENDER_ID;
	}

	$api_url = "http://m.onlinebusinessbazaar.in/sendsms.jsp?user=" . $obbusername . "&password=" . $obbpassword . "&senderid=" . $obbsenderid . "&mobiles=" . $mobile . "&sms=" . $sms_text;

	//Submit to server
	$response = file_get_contents($api_url);
	return $response;
}

function sendxmlSMSobb($dataset)
{
	$xmldataset = "<?xml version='1.0'?><smslist>" . $dataset . "</smslist>";

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://m.onlinebusinessbazaar.in/sendsms.jsp?",
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_POST => 1,
		CURLOPT_ENCODING => 'UTF-8',
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => 1,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $xmldataset,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/xml"
		),
	)
	);
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

	/* if ($err) {
		return "cURL Error #:" . $err;
	} else {
		return $response;
	} */

	return $response;
}


// START : Email Provider - Brevo
function sendinblueHTMLmail($maildata, $subject = "", $htmlmessage = "")
{
	$data["sender"]["name"] = SIB_NAME;
	$data["sender"]["email"] = SMTP_USER;

	//$data["replyTo"]["name"] = SIB_NAME;
	//$data["replyTo"]["email"] = SIB_EMAILID;

	$user_res["name"] = $maildata["fullname"];
	$user_res["email"] = $maildata["email"];
	$userdata[] = $user_res;
	$data["to"] = $userdata;

	$data["subject"] = $subject;
	$data["htmlContent"] = $htmlmessage;

	// Turn Data to JSON
	$data_json = json_encode($data);

	$curl = curl_init();
	curl_setopt_array(
		$curl,
		array(
			CURLOPT_URL => "https://api.brevo.com/v3/smtp/email",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $data_json,
			CURLOPT_HTTPHEADER => [
				"Accept: application/json",
				"Content-Type: application/json",
				"api-key: " . SIB_APIKEY
			],
		)
	);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	/*if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}*/

	return true;
}

function sendinblueTemplatemail($emailist, $templateid = 0)
{
	// POST Data
	$data["emailTo"] = $emailist;
	$data["replyTo"] = SIB_EMAILID;

	// Turn Data to JSON
	$data_json = json_encode($data);

	$curl = curl_init();
	curl_setopt_array(
		$curl,
		array(
			CURLOPT_URL => "https://api.sendinblue.com/v3/smtp/templates/" . $templateid . "/send",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $data_json,
			CURLOPT_HTTPHEADER => [
				"Accept: application/json",
				"Content-Type: application/json",
				"api-key: " . SIB_APIKEY
			],
		)
	);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	/*if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}*/

	return true;
}
// END : Email Provider - Brevo

function sendHTMLmail($to, $from, $subject, $message, $attachfile = '')
{
	$config = array();
	$config['protocol'] = 'smtp';
	$config['smtp_host'] = SMTP_HOST;
	$config['smtp_port'] = '587';
	$config['smtp_timeout'] = '7';
	$config['smtp_user'] = SMTP_USER;
	$config['smtp_pass'] = SMTP_PASSWORD;
	$config['charset'] = 'utf-8';
	$config['newline'] = "\r\n";
	$config['mailtype'] = 'html'; // or html
	$config['validation'] = TRUE;
	$config['wordwrap'] = TRUE;

	$ci = get_instance();
	$ci->email->initialize($config);
	$ci->email->from($from, 'indcapital.in');
	$ci->email->to($to);
	$ci->email->subject($subject);
	$ci->email->message($message);
	$ci->email->set_crlf("\r\n");
	if ($attachfile != '') {
		$ci->email->attach($attachfile);
	}
	$ci->email->send();

	return true;
	/*if($ci->email->send()) {
		return true;
	}
	else { 
		show_error($ci->email->print_debugger());
		return false;
	}*/
}
function getSMSsenderid($id = 'smssenderid')
{
	$value = null;
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select('option_value');
	$ci->db->where('option_key', $id);
	$cirow = $ci->db->get('site_options')->row();

	if ($cirow != "") {
		if ($cirow->option_value != "") {
			$value = $cirow->option_value;
		}
	}
	return $value;
}
function getFBConversionData($type) {
	$arr_data = [];
	$ci = &get_instance();
	$ci->load->database();

	if ($type == 'digital') {
		$query1 = $ci->db->where('option_key', 'fbaccesstoken')
		->select('option_value')
		->get('site_options');
		$arr_data['fbaccesstoken'] = $query1->row();

		$query2 = $ci->db->where('option_key', 'fbeventname')
		->select('option_value')
		->get('site_options');
		$arr_data['fbeventname'] = $query2->row();

		$query3 = $ci->db->where('option_key', 'fbeventid')
		->select('option_value')
		->get('site_options');
		$arr_data['fbeventid'] = $query3->row();
	} else if ($type == 'subscription') {
		$query1 = $ci->db->where('option_key', 'fbaccesstokensubscription')
		 ->select('option_value')
		 ->get('site_options');
		$arr_data['fbaccesstoken'] = $query1->row();

		$query2 = $ci->db->where('option_key', 'fbeventnamesubscription')
		 ->select('option_value')
		 ->get('site_options');
		$arr_data['fbeventname'] = $query2->row();

		$query3 = $ci->db->where('option_key', 'fbeventidsubscription')
		 ->select('option_value')
		 ->get('site_options');
		$arr_data['fbeventid'] = $query3->row();
	} else {
		$arr_data['fbaccesstoken'] = $arr_data['fbeventname'] = $arr_data['fbeventid'] = '';
	}

	return $arr_data;
}

function aisensy_track($postdata)
{
	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => "https://backend.aisensy.com/campaign/t1/api",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($postdata),
		CURLOPT_HTTPHEADER => [
			"Content-Type: application/json"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

	return $response;
}


function interakt_track($postdata)
{
	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => "https://api.interakt.ai/v1/public/message/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($postdata),
		CURLOPT_HTTPHEADER => [
			"Authorization: Basic " . INTERAKT_KEY,
			"Content-Type: application/json"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

	return $response;
}


function subscription_interakt_track($postdata)
{
	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => "https://api.interakt.ai/v1/public/message/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($postdata),
		CURLOPT_HTTPHEADER => [
			"Authorization: Basic " . SUBSCRIPTION_INTERAKT_KEY,
			"Content-Type: application/json"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

	return $response;
}

function subscription_interakt_track_p2($postdata)
{
	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => "https://api.interakt.ai/v1/public/message/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($postdata),
		CURLOPT_HTTPHEADER => [
			"Authorization: Basic " . SUBSCRIPTION_INTERAKT_KEY_PORTAL_2,
			"Content-Type: application/json"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

	return $response;
}


if (!function_exists('get_location_by_pincode')) {
    function get_location_by_pincode($pincode) {
        $api_url = "https://api.postalpincode.in/pincode/" . $pincode;
        
        $response = file_get_contents($api_url);
        $data = json_decode($response, true);

        if ($data[0]['Status'] == "Success") {
            return [
                'city' => $data[0]['PostOffice'][0]['District'],
                'state' => $data[0]['PostOffice'][0]['State']
            ];
        } else {
            return ['error' => 'Invalid Pincode'];
        }
    }
}

?>
