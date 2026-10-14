<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');


function send_order_data($data, $entry_from = 'direct_api')
{
	$endpoints = [
		'direct_api' => 'https://bizfin.indiakarobar.com/api/channel-partners/turnover', // automatic
		'manual_api' => 'https://bizfin.indiakarobar.com/api/channel-partners/syncInvoiceData' // manual
	];

	$curl_url = $endpoints[$entry_from] ?? $endpoints['direct_api'];

	$curl = curl_init();
	curl_setopt_array($curl, [
		CURLOPT_URL            => $curl_url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING       => '',
		CURLOPT_MAXREDIRS      => 5,
		CURLOPT_TIMEOUT        => 60,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST  => 'POST',
		CURLOPT_POSTFIELDS     => $data,
		CURLOPT_HTTPHEADER     => [
			'Content-Type: application/json',
			'Accept: application/json',
			'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) ' .
            'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36',
			'Origin: https://indcapital.in',
            'Referer: https://indcapital.in'
		],
	]);

	$response   = curl_exec($curl);
	$http_code  = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	$curl_error = curl_error($curl);
	curl_close($curl);

	// ✅ Error Handling
	if ($curl_error) {
		log_message('error', "send_order_data: CURL error ($curl_url) => " . $curl_error);
		return [
			'status'  => 'error',
			'message' => $curl_error
		];
	}

	if ($http_code >= 400) {
		log_message('error', "send_order_data: HTTP $http_code ($curl_url) => " . $response);
		return [
			'status'  => 'error',
			'http'    => $http_code,
			'message' => $response
		];
	}

	// ✅ Decode JSON safely
	$decoded = json_decode($response, true);
	if (json_last_error() === JSON_ERROR_NONE) {
		log_message('info', "send_order_data: Success ($curl_url)");
		return [
			'status'  => 'success',
			'http'    => $http_code,
			'data'    => $decoded
		];
	} else {
		log_message('warning', "send_order_data: Non-JSON response ($curl_url) => " . $response);
		return [
			'status'  => 'success',
			'http'    => $http_code,
			'data'    => $response
		];
	}
}

function getFacebookPixel()
{
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select('*');
	$ci->db->where('option_key', 'facebookpixel');
	$cirow = $ci->db->get('site_options')->row();

	if ($cirow->option_value != "") {
		$value = $cirow->option_value;
	} else {
		$value = null;
	}
	return $value;
}

function sendxmlSMS($dataset)
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

	/*if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		echo $response;
	}*/

	return $response;
}

function sendtextSMS($mobile, $message)
{
	$sms_text = rawurlencode($message);
	$api_url = "http://m.onlinebusinessbazaar.in/sendsms.jsp?user=" . SMS_USERNAME . "&password=" . SMS_PASSWORD . "&senderid=" . SMS_SENDER_ID . "&mobiles=" . $mobile . "&sms=" . $sms_text;

	//Submit to server
	$response = file_get_contents($api_url);
	return $response;
}

function sendotpSMS($mobile, $message)
{
	$sms_text = rawurlencode($message);
	$api_url = "http://m.onlinebusinessbazaar.in/sendsms.jsp?user=" . SMS_USERNAME . "&password=" . SMS_PASSWORD . "&senderid=" . SMS_SENDER_ID . "&mobiles=" . $mobile . "&sms=" . $sms_text;

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

function sendinblueHTMLmail($userdata, $subject = "", $htmlmessage = "")
{
	// POST Data
	$data["sender"]["name"] = SIB_NAME;
	$data["sender"]["email"] = SIB_EMAILID;

	$data["replyTo"]["name"] = SIB_NAME;
	$data["replyTo"]["email"] = SIB_EMAILID;

	$data["to"][] = $userdata;

	$data["subject"] = $subject;
	$data["htmlContent"] = $htmlmessage;

	// Turn Data to JSON
	$data_json = json_encode($data);

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.sendinblue.com/v3/smtp/email",
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

	return $response;
}

function sendinblueTemplatemail($emailist, $templateid = "")
{
	// POST Data
	$data["emailTo"] = $emailist;
	$data["replyTo"] = SIB_EMAILID;

	// Turn Data to JSON
	$data_json = json_encode($data);

	$curl = curl_init();
	curl_setopt_array($curl, array(
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

	return $response;
}

function sendHTMLmail($to, $from, $subject, $message)
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
	$ci->email->from($from, 'Indcapital.in');
	$ci->email->to($to);
	$ci->email->subject($subject);
	$ci->email->message($message);
	$ci->email->set_crlf("\r\n");
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

function getLoanStatusMsg($statusid = 0)
{
	$option = "";
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select('title, remarks');
	$ci->db->where('statusid', $statusid);
	$ci->db->where('isDelete', 0);
	$statusmsg = $ci->db->get('loanstatus_remarks')->result();

	$option .= "<option value=''>Select Option</option>";

	foreach ($statusmsg as $row) {
		$option .= "<option ";
		$option .= " value=\"" . $row->remarks . "\"";
		$option .= " >";
		$option .= $row->title;
		$option .= "</option>";
	}
	return $option;
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
function getFBConversionData()
{
	$arr_data = [];
	$ci = &get_instance();
	$ci->load->database();
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
