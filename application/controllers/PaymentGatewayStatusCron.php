<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentGatewayStatusCron extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function updateZaakpayStatus()
	{
		$this->load->model('Site_Subscription_Model');
		$this->load->model('Site_Info_Model');
		
		$merchantIdentifier = ZAAKPAY_MERCHANT_IDENTIFIER;
		$secretKey = ZAAKPAY_SECRET_KEY;
		$mode = "0";

		$getPendingOrderData = $this->Site_Subscription_Model->getPendingOrdersData();
		if (empty($getPendingOrderData)) {
			echo "No pending orders found.\n";
			return;
		}

		foreach ($getPendingOrderData as $order) {
			if (!empty($order->statuscode)) {
				continue;
			}
	
			$orderId = $order->orderid; // take orderid for update zaakpay data

			$dataArray = [
				"merchantIdentifier" => $merchantIdentifier,
				"mode" => $mode,
				"orderDetail" => [
					"orderId" => $orderId
				]
			];

			$jsonData = json_encode($dataArray, JSON_UNESCAPED_SLASHES);

			// Correct checksum
			$checksum = hash_hmac('sha256', $jsonData, $secretKey);
			// POST fields
			$postFields = "data=".$jsonData."&checksum=".$checksum;

			$ch = curl_init("https://api.zaakpay.com/checkTxn?v=5");
			curl_setopt_array($ch, [
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => $postFields,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
				CURLOPT_SSL_VERIFYHOST => 0,
				CURLOPT_SSL_VERIFYPEER => 0
			]);

			$response = curl_exec($ch);
			curl_close($ch);
			$result = json_decode($response, true);
			
			if (!isset($result['orders'][0])) {
				log_message('error', "Zaakpay missing order: " . json_encode($result));
				continue;
			}

			$orderData = $result['orders'][0];
			$orderDetail = $orderData['orderDetail'] ?? [];

			$responseCode = $orderData['responseCode'] ?? null;
			$entryfor = $order->entryfor ?? null; 

			$orderAmount = ($orderDetail['amount']/100) ?? 0;
			$txnId = $orderDetail['txnId'] ?? '';

			$updateData = [
				'statuscode' => $orderData['responseCode'] ?? null,
				'statusdescription' => $orderData['responseDescription'] ?? null,
			];
			$this->Site_Subscription_Model->updateZaakpayEntryOrder($orderId, $updateData);
			
			if (in_array($entryfor, [21, 22]) && in_array($responseCode, [100, 208, 601])) {
				$paymentdata = $this->Site_Subscription_Model->getzaakpayentry($orderId);
				$userdata = $this->Site_Subscription_Model->checkuserregdata($paymentdata->userid);
				$cardno = random_code(16);

				$mbrdata = array(
                    'rec_date' => date('Y-m-d H:i:s'),
					'userid' => $userdata->userid,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+6 months')),
					'card_number' => $cardno,
					'amount' => $orderAmount,
					'paymentid' => $txnId,
					'isActive' => 1,
					'isDelete' => 0
				);
				$memberid = $this->Site_Subscription_Model->subscriptionorder($mbrdata);

				$password = random_code(6);
				$passwordkey = stringCrypt($password, 'encrypt');
				$refcode = strtolower(substr(str_replace(" ", "", $userdata->fullname),0,3));
				$refcode .= substr($userdata->mobile,-4);

				$regdata = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'password' => $passwordkey,
					'refcode' => $refcode,
					'process_step' => 4,
					'isUser' => 2
				);
				$response2 = $this->Site_Subscription_Model->updateregistration($userdata->userid, $regdata);

				$invoiceno = $this->Site_Info_Model->getinvoiceno();
				if ($userdata->cardtype == 22) {
					$productslug = "bharatfincash-subscription";
					$invfor = 5;
					$invprefix = "BFBL_";
				} else {
					$productslug = "bharatfincash-subscription";
					$invfor = 4;
					$invprefix = "BFPL_";
				}

				$productdata = $this->Site_Info_Model->getproductdetails($productslug);
				$netamount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;

				$cgstamount = $sgstamount = $igstamount = 0;
				if ($userdata->state == 'Gujarat') {
					$cgstamount = $netamount * 0.09;
					$sgstamount = $netamount * 0.09;
				} else {
					$igstamount = $netamount * 0.18;
				}

				$grandtotal = $netamount + $cgstamount + $sgstamount + $igstamount;

				$invdata = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'userid' => $userdata->userid,
					'cardid' => $memberid,
					'inv_for' => $invfor,
					'inv_prefix' => $invprefix,
					'inv_number' => $invoiceno,
					'inv_date' => date('Y-m-d'),
					'inv_price' => number_format($netamount,2),
					'inv_cgst' => number_format($cgstamount,2),
					'inv_sgst' => number_format($sgstamount,2),
					'inv_igst' => number_format($igstamount,2),
					'inv_grandtotal' => number_format($grandtotal,2),
					'isDelete' => 0
				);

				$responseinvoice = $this->Site_Subscription_Model->generateinvoice($invdata, $invoiceno);

				$remote_data = array(
					'company_code' => COMPANY_CODE,
                    'company_local_ip' => LOCAL_IP,
                    'product_code' => 'subscription',
                    'customer_name' => $userdata->fullname,
                    'customer_email' => $userdata->email,
                    'customer_mobile' => $userdata->mobile,
                    'userid' => $userdata->userid,
                    'card_number' => $cardno,
                    'rec_date' => date('Y-m-d H:i:s'),
                    'inv_for' => $invfor,
                    'inv_prefix' => $invprefix,
                    'inv_number' => $invoiceno,
                    'inv_date' => date('Y-m-d'),
                    'inv_price' => $netamount,
                    'inv_cgst' => $cgstamount,
                    'inv_sgst' => $sgstamount,
                    'inv_igst' => $igstamount,
                    'inv_grandtotal' => $grandtotal,
				);

				$api_response = send_order_data(json_encode($remote_data));

                $userdate = $this->Site_Subscription_Model->checkuserdata($userdata->userid);

				$fbclidpl = "";

				$firstname = strtolower(strtok($userdate->fullname, " "));
				$city = strtolower(preg_replace("/[^a-zA-Z]+/", "", $userdate->city));
				$state = strtolower(getStateAbbreviation($userdate->state));
				$orderid = "MC" . date('md') . random_code(4);
				
				$fbdata = array(
					'version' => 'v19.0',
					'type' => 'subscription',
					'fullname' => $firstname,
					'mobile' => '91' . $userdate->mobile,
					'email' => $userdate->email,
					'city' => $city,
					'state' => $state,
					'orderid' => $orderid,
					'sourceurl' => base_url('/subscription/paymentResponse/'.$userdate->loantype.'/true')
				);

				if (get_cookie('fbclidpl') != "") {
					$fbclidpl = "fb.0." . round(microtime(true) * 1000) . "." . get_cookie('fbclidpl');
				}

				$fbdata['fbclid'] = $fbclidpl;
				$fbresponse = fbconversioncurl($fbdata);

                $this->load->helper('interakt');
				
				$data1 = array(
					'phoneNumber' => $userdate->mobile,
					'countryCode' => '+91',
					'traits' => array(
						'name' => $userdate->fullname
					),
					'tags' => array('Payment Successful')
				);
				$restrack1 = subscription_user_track($data1);

				$data2 = array(
					'phoneNumber' => $userdate->mobile,
					'countryCode' => '+91',
					'event' => 'Payment Successful'
				);
				$restrack2 = subscription_event_track($data2); 
		
				$wpcampaignname = $this->Site_Info_Model->getsmsmessage('wpcampaignsuccess');
				$data3 = array(
					'apiKey' => AISENSY_KEY,
					'campaignName' => $wpcampaignname,
					'destination' => '+91' . $userdate->mobile,
					'media' => array(
						'url' => AISENSY_SUCCESS_URL,
						'filename' => AISENSY_SUCCESS_IMAGE
					),
					'userName' => $userdate->fullname,
					'templateParams' => array('$Name'),
					'tags' => array('Payment Successful')
				);
				$restrack3 = aisensy_track($data3);

				$sent = $this->Site_Subscription_Model->sendSuccessGreetings($userdata->mobile, $userdata->email, $password);

			}
			else {
				echo "No action required";
			}

		}

		echo "Cron completed at " . date('Y-m-d H:i:s') . "\n";
	}

	public function rzpwebhookresponse() {
        log_message('error', '------ Razorpay webhook start here ------');
        
		// Get raw post data
        $webhookBody = file_get_contents('php://input');

        // Razorpay signature from headers
        $razorpaySignature = $_SERVER['HTTP_X_RAZORPAY_SIGNATURE'] ?? '';

        // Your Razorpay webhook secret
        $webhookSecret = RAZOR_KEY_SECRET;

        // Verify signature
        $expectedSignature = hash_hmac('sha256', $webhookBody, $webhookSecret);

        if ($razorpaySignature !== $expectedSignature) {
            log_message('error', 'Invalid Razorpay webhook signature');
            show_error('Invalid signature', 403);
        }

        // Convert JSON to array
        $payload = json_decode($webhookBody, true);

        // Log payload for debugging
        // log_message('error', "Razorpay Webhook: " . print_r($payload, true));

        // Process event
        $event = $payload['event'];

        switch ($event) {
            case "payment.captured":
                $this->paymentCaptured($payload);
                break;

            case "payment.failed":
                $this->paymentFailed($payload);
                break;

            default:
                log_message('info', "Razorpay Unhandled event: $event");
        }

        // Respond 200 to Razorpay
        echo "OK";
	}
	
	private function paymentCaptured($data) {
        $this->load->helper('razorpay');

		$this->load->model('Site_Digital_Model');
		$this->load->model('Site_Info_Model');

		$paymentdata = $this->Site_Digital_Model->getrazorpayentry($data['payload']['payment']['entity']['order_id']);

		if($paymentdata->txstatus == '' || $paymentdata->txstatus == NULL) {
			$razorpaydata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'referenceid' => $data['payload']['payment']['entity']['id'],
				'txstatus' => $data['payload']['payment']['entity']['status']
			);

			$response1 = $this->Site_Digital_Model->updaterazorpayentry($paymentdata->id, $razorpaydata);
		
			$cardno = random_code(16);
			$amount = (isset($paymentdata->orderamount)) ? $paymentdata->orderamount : 0;
			$paymentid = (isset($paymentdata->referenceid)) ? $paymentdata->referenceid : '';

			if($paymentdata->entryfor == 11 || $paymentdata->entryfor == 12) {
    			$isentry = $this->Site_Digital_Model->checkmembershipentry($paymentid);

				if ($isentry == 0) {
                    $userdata = $this->Site_Digital_Model->checkuserregdata($paymentdata->userid);
					$data = array(
						'rec_date' => date('Y-m-d H:i:s'),
                        'userid' => $userdata->userid,
                        'registration_date' => date('Y-m-d'),
                        'expiry_date' => date('Y-m-d', strtotime('+3 months')),
                        'card_number' => $cardno,
                        'amount' => $amount,
                        'paymentid' => $paymentid,
                        'isActive' => 1,
                        'isDelete' => 0
					);
					$memberid = $this->Site_Digital_Model->membershiporder($data);

					$password = random_code(6);
					$passwordkey = stringCrypt($password, 'encrypt');
					$refcode = strtolower(substr(str_replace(" ", "", $userdata->fullname), 0, 3));
					$refcode .= substr($userdata->mobile, -4);

					$regdata = array(
                        'rec_date' => date('Y-m-d H:i:s'),
                        'update_date' => date('Y-m-d H:i:s'),
                        'password' => $passwordkey,
                        'refcode' => $refcode,
                        'process_step' => 4,
                        'isUser' => 2
                    );
					$response2 = $this->Site_Digital_Model->updateregistration($userdata->userid, $regdata);

					$invoiceno = $this->Site_Info_Model->getinvoiceno();

					if ($userdata->cardtype == 12) {
                        $productslug = "digital-business-loan";
                        $invfor = 2;
                        $invprefix = "BL_";
                    } else {
                        $productslug = "digital-personal-loan";
                        $invfor = 1;
                        $invprefix = "PL_";
                    }

					$productdata = $this->Site_Info_Model->getproductdetails($productslug);
					$netamount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;

					if ($userdata->state == 'Gujarat') {
						$cgstamount = $netamount * 0.09;
						$sgstamount = $netamount * 0.09;
					} else {
						$igstamount = $netamount * 0.18;
					}

					$grandtotal = $netamount + $cgstamount + $sgstamount + $igstamount;

					$invdata = array(
						'rec_date' => date('Y-m-d H:i:s'),
                        'userid' => $userdata->userid,
                        'cardid' => $memberid,
                        'inv_for' => $invfor,
                        'inv_prefix' => $invprefix,
                        'inv_number' => $invoiceno,
                        'inv_date' => date('Y-m-d'),
                        'inv_price' => number_format($netamount,2),
                        'inv_cgst' => number_format($cgstamount,2),
                        'inv_sgst' => number_format($sgstamount,2),
                        'inv_igst' => number_format($igstamount,2),
                        'inv_grandtotal' => number_format($grandtotal,2),
                        'isDelete' => 0
					);

					$responseinvoice = $this->Site_Digital_Model->generateinvoice($invdata, $invoiceno);

					$remote_data = array(
						'company_code' => COMPANY_CODE,
						'company_local_ip' => LOCAL_IP,
						'product_code' => 'membership',
						'customer_name' => $userdata->fullname,
						'customer_email' => $userdata->email,
						'customer_mobile' => $userdata->mobile,
						'userid' => $userdata->userid,
						'card_number' => $cardno,
						'rec_date' => date('Y-m-d H:i:s'),
						'inv_for' => $invfor,
						'inv_prefix' => $invprefix,
						'inv_number' => $invoiceno,
						'inv_date' => date('Y-m-d'),
						'inv_price' => $netamount,
						'inv_cgst' => $cgstamount,
						'inv_sgst' => $sgstamount,
						'inv_igst' => $igstamount,
						'inv_grandtotal' => $grandtotal,
					);

					$api_response = send_order_data(json_encode($remote_data));
                    
					$userdate = $this->Site_Digital_Model->checkuserdata($userdata->userid);

					$fbclidpl = "";

                    $firstname = strtolower(strtok($userdate->fullname, " "));
                    $city = strtolower(preg_replace("/[^a-zA-Z]+/", "", $userdate->city));
                    $state = strtolower(getStateAbbreviation($userdate->state));
                    $orderid = "MC" . date('md') . random_code(4);
                    
                    $fbdata = array(
                        'version' => 'v16.0',
                        'type' => 'digital',
                        'fullname' => $firstname,
                        'mobile' => '91' . $userdate->mobile,
                        'email' => $userdate->email,
                        'city' => $city,
                        'state' => $state,
                        'orderid' => $orderid,
                        'sourceurl' => base_url('/digital/paymentResponse/'.$userdate->loantype.'/true')
                    );

                    if (get_cookie('fbclidpl') != "") {
                        $fbclidpl = "fb.0." . round(microtime(true) * 1000) . "." . get_cookie('fbclidpl');
                    }

                    $fbdata['fbclid'] = $fbclidpl;
                    $fbresponse = fbconversioncurl($fbdata);

                    $wpcampaignname = $this->Site_Info_Model->getsmsmessage('wpcampaignsuccess');
					$data1 = array(
						'apiKey' => AISENSY_KEY,
						'campaignName' => $wpcampaignname,
						'destination' => '+91' . $userdate->mobile,
						'media' => array(
							'url' => AISENSY_SUCCESS_URL,
							'filename' => AISENSY_SUCCESS_IMAGE
						),
						'userName' => $userdate->fullname,
						'templateParams' => array('$Name'),
						'tags' => array('Payment Successful')
					);
					$restrack1 = aisensy_track($data1);

                    $this->load->helper('interakt');

                    $data2 = array(
                        'phoneNumber' => $userdate->mobile,
                        'countryCode' => '+91',
                        'event' => 'Payment Successful'
                    );
                    $restrack2 = event_track($data2);

					$sent = $this->Site_Digital_Model->sendSuccessGreetings($userdata->mobile, $userdata->email, $password);
					
    			}
			}
		}
		
		$orderId = $data['payload']['payment']['entity']['order_id'];
        log_message('error', "Razorpay Payment Order: $orderId");
        
        $paymentId = $data['payload']['payment']['entity']['id'];
        log_message('error', "Razorpay Payment Captured: $paymentId");
    }

    private function paymentFailed($data) {
		$this->load->helper('razorpay');

        $this->load->model('Site_Digital_Model');
        
		$paymentdata = $this->Site_Digital_Model->getrazorpayentry($data['payload']['payment']['entity']['order_id']);

		$razorpaydata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'referenceid' => $data['payload']['payment']['entity']['id'],
			'txstatus' => $data['payload']['payment']['entity']['status']
		);

		$response1 = $this->Site_Digital_Model->updaterazorpayentry($paymentdata->id, $razorpaydata);

		if($paymentdata->entryfor == 11 || $paymentdata->entryfor == 12) {
			$userdata = $this->Site_Digital_Model->checkuserregdata($paymentdata->userid);

			$userdate = $this->Site_Digital_Model->checkuserdata($userdata->userid);

			$data1 = array(
                'apiKey' => AISENSY_KEY,
                'campaignName' => "fail",
                'destination' => '+91' . $userdate->mobile,
                'media' => array(
                    'url' => AISENSY_FAIL_URL,
                    'filename' => AISENSY_FAIL_IMAGE
                ),
                'userName' => $userdate->fullname,
                'templateParams' => array('$Name'),
                'tags' => array('Payment Failed')
            );
            $restrack1 = aisensy_track($data1);
		} 

        $orderId = $data['payload']['payment']['entity']['order_id'];
        log_message('error', "Razorpay Payment Order: $orderId");
        
        $paymentId = $data['payload']['payment']['entity']['id'];
        log_message('error', "Razorpay Payment Failed: $paymentId");
    }
}