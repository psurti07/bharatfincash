<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Loan extends CI_Controller
{

	public function index()
	{
		return redirect()->to('Infopage');
	}

	public function personalloan()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('personal-loan');
		$banklist = $this->Site_Info_Model->getbanklist();
		$this->load->view('personal-loan', ['meta' => $meta, 'banklist' => $banklist]);

	}

	public function businessloan()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('business-loan');
		$banklist = $this->Site_Info_Model->getbanklist();
		$this->load->view('business-loan', ['meta' => $meta, 'banklist' => $banklist]);
	}

	public function calculator()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		$this->load->view('calculator');
	}

	/* START : Card offer page */
	public function cardoffer()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		$prores = $this->Site_Info_Model->getproductdetails('card-offer');

		if ($prores->inOffer == 1) {
			$productdata = array(
				'amount' => $prores->amount,
				'offeramount' => $prores->offeramount,
				'offerdate' => date('Y/m/d', strtotime('+1 days')) . ' 24:00:00',
				'payamount' => $prores->offeramount + ($prores->offeramount * 0.18)
			);
		} else {
			$productdata = array(
				'amount' => $prores->amount,
				'offeramount' => 0,
				'offerdate' => '',
				'payamount' => $prores->amount + ($prores->amount * 0.18)
			);
		}

		$this->load->view('cardoffer', ['meta' => $meta, 'productdata' => $productdata]);
	}

	public function getcardoffer()
	{
		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('card-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
		foreach ($uat_numbers as $uat_num) {
			if ($uat_num == $mobileno) {
				$grandamount = 1;
			}
		}

		$orderId = "ZPLive" . number_format(microtime(true) * 1000, 0, '.', '');
		$returnUrl = base_url('loan/cardresponse');

		if (ZAAKPAY_MODE == "PROD") {
			$url = "https://api.zaakpay.com/api/paymentTransact/V8";
		} else {
			$url = "https://zaakstaging.zaakpay.com/api/paymentTransact/V8";
		}

		$postData = array(
			"merchantIdentifier" => ZAAKPAY_MERCHANT_IDENTIFIER,
			"orderId" => $orderId,
			"returnUrl" => $returnUrl,
			"currency" => 'INR',
			"amount" => $grandamount * 100,
			"buyerEmail" => $emailid,
			"buyerFirstName" => $fullname,
			"buyerPhoneNumber" => $mobileno,
			"buyerCountry" => 'India',
			"productDescription" => 'Card Offer'
		);

		ksort($postData);
		$checksumData = "";
		foreach ($postData as $key => $value) {
			$checksumData .= $key . '=' . $value . '&';
		}

		$checksum = hash_hmac('sha256', $checksumData, ZAAKPAY_SECRET_KEY);

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'offerpage' => 1,
			'fullname' => $fullname,
			'mobile' => $mobileno,
			'emailid' => $emailid,
			'amount' => $grandamount,
			'isCustomer' => 0,
			'isActive' => 0,
			'isDelete' => 0
		);

		$this->load->model('Site_Digital_Model');
		$userid = $this->Site_Digital_Model->cardofferorder($data);

		$zaakpaydata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 3,
			'userid' => $userid,
			'orderid' => $orderId,
			'orderamount' => $grandamount,
			'ordernote' => $productdata->productname
		);

		$this->load->model('Site_Digital_Model');
		$response = $this->Site_Digital_Model->zaakpayentry($zaakpaydata);

		$this->load->view('zaakpay-checkout', ['postData' => $postData, 'checksum' => $checksum, 'url' => $url]);
	}

	public function cardresponse()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		$orderId = $_POST["orderId"];
		$responseCode = $_POST["responseCode"];
		$orderAmount = $_POST["amount"] / 100;
		$txnId = $_POST["pgTransId"];
		$paymentMode = $_POST["paymentMode"];
		$recd_checksum = $_POST['checksum'];

		$checksum = $checksumData = '';
		$checksumsequence = array(
			"amount",
			"bank",
			"bankid",
			"cardId",
			"cardScheme",
			"cardToken",
			"cardhashid",
			"doRedirect",
			"orderId",
			"paymentMethod",
			"paymentMode",
			"responseCode",
			"responseDescription",
			"productDescription",
			"product1Description",
			"product2Description",
			"product3Description",
			"product4Description",
			"pgTransId",
			"pgTransTime"
		);
		foreach ($checksumsequence as $seqvalue) {
			if (array_key_exists($seqvalue, $_POST)) {
				$checksumData .= $seqvalue;
				$checksumData .= "=";
				$checksumData .= $_POST[$seqvalue];
				$checksumData .= "&";
			}
		}

		$checksum = hash_hmac('sha256', $checksumData, ZAAKPAY_SECRET_KEY);

		if ($checksum == $recd_checksum) {
			$this->load->model('Site_Digital_Model');
			$paymentdata = $this->Site_Digital_Model->getzaakpayentry($orderId);

			$zaakpaydata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'orderamount' => $orderAmount,
				'statuscode' => $responseCode,
				'transactionid' => $txnId,
				'paymentmode' => $paymentMode
			);

			$response1 = $this->Site_Digital_Model->updatezaakpayentry($paymentdata->id, $zaakpaydata);

			$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

			if ($responseCode == 100 || $responseCode == 208 || $responseCode == 601) {
				$cardno = random_code(16);
				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+3 months')),
					'amount' => $orderAmount,
					'paymentid' => $txnId,
					'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('cardoffer-response', ['meta' => $meta, 'status' => $response]);
			} else {
				$this->load->view('cardoffer-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('cardoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}
	/* STOP : Card offer page */

	/* START : Special offer loan */
	public function specialoffer()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		$prores = $this->Site_Info_Model->getproductdetails('special-offer');

		if ($prores->inOffer == 1) {
			$productdata = array(
				'amount' => $prores->amount,
				'offeramount' => $prores->offeramount,
				'offerdate' => date('Y/m/d', strtotime('+1 days')) . ' 24:00:00',
				'payamount' => $prores->offeramount + ($prores->offeramount * 0.18)
			);
		} else {
			$productdata = array(
				'amount' => $prores->amount,
				'offeramount' => 0,
				'offerdate' => '',
				'payamount' => $prores->amount + ($prores->amount * 0.18)
			);
		}
		$this->load->view('specialoffer', ['meta' => $meta, 'productdata' => $productdata]);
	}

	public function getspecialoffer()
	{

		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('special-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);
		//$grandamount = floor($actualamount);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
		foreach ($uat_numbers as $uat_num) {
			if ($uat_num == $mobileno) {
				$grandamount = 1;
			}
		}

		$orderid = 'order_' . number_format(microtime(true) * 1000, 0, '.', '');
		$return_url = base_url('loan/specialresponse');

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'offerpage' => 2,
			'fullname' => $fullname,
			'mobile' => $mobileno,
			'emailid' => $emailid,
			'amount' => $grandamount,
			'isCustomer' => 0,
			'isActive' => 0,
			'isDelete' => 0
		);

		$this->load->model('Site_Digital_Model');
		$userid = $this->Site_Digital_Model->cardofferorder($data);

		$paymentData = [
			"order_id" => $orderid,
			"customer_id" => strval($userid),
			'amount' => $grandamount,
			'currency' => 'INR',
			'name' => $fullname,
			'email_id' => $emailid,
			'contact_number' => $mobileno,
			'mtx' => $orderid,
			'return_url' => $return_url
		];

		$this->load->helper('openmoney_helper');
		$environment = OPENMONEY_MODE;

		if (OPENMONEY_MODE == "PROD") {
			$accesskey = OPENMONEY_API_KEY;
			$secretkey = OPENMONEY_API_SECRET;
		} else {
			$accesskey = OPENMONEY_API_KEY;
			$secretkey = OPENMONEY_API_SECRET;
		}

		$payment_token = create_payment_token($environment, $accesskey, $secretkey, $paymentData);

		if (empty($error) && isset($payment_token['error'])) {
			$error = 'E55 Payment error. ' . ucfirst($payment_token['error']);
			if (isset($payment_token['error_data'])) {
				foreach ($payment_token['error_data'] as $d)
					$error .= " " . ucfirst($d[0]);
			}
		}

		if (empty($error) && (!isset($payment_token["id"]) || empty($payment_token["id"]))) {
			$error = 'Payment error. ' . 'Layer token ID cannot be empty.';
		}

		if (!empty($payment_token["id"]))
			$payment_token_data = get_payment_token($environment, $accesskey, $secretkey, $payment_token["id"]);

		if (empty($error) && !empty($payment_token_data)) {
			if (isset($layer_payment_token_data['error'])) {
				$error = 'E56 Payment error. ' . $payment_token_data['error'];
			}

			if (empty($error) && $payment_token_data['status'] == "paid") {
				$error = "Layer: this order has already been paid.";
			}

			if (empty($error) && $payment_token_data['amount'] != $paymentData['amount']) {
				$error = "Layer: an amount mismatch occurred.";
			}

			$jsdata['payment_token_id'] = html_entity_decode((string) $payment_token_data['id'], ENT_QUOTES, 'UTF-8');
			$jsdata['accesskey'] = html_entity_decode((string) $accesskey, ENT_QUOTES, 'UTF-8');

			$hash = create_hash(array(
				'layer_pay_token_id' => $payment_token_data['id'],
				'layer_order_amount' => $payment_token_data['amount'],
				'tranid' => $orderid,
			), $accesskey, $secretkey);

			$postData = "<form action='" . base_url('loan/specialresponse') . "' method='post' style='display: none' name='layer_payment_int_form'>
				<input type='hidden' name='layer_pay_token_id' value='" . $payment_token_data['id'] . "'>
				<input type='hidden' name='tranid' value='" . $orderid . "'>
				<input type='hidden' name='layer_order_amount' value='" . $payment_token_data['amount'] . "'>
				<input type='hidden' id='layer_payment_id' name='layer_payment_id' value=''>
				<input type='hidden' id='fallback_url' name='fallback_url' value=''>
				<input type='hidden' name='hash' value='" . $hash . "'>
				</form>";
			$postData .= "<script>";
			$postData .= "var layer_params = " . json_encode($jsdata) . ';';

			$postData .= "</script>";
			$postData .= '<script src="' . base_url('assets/js/layer_checkout.js') . '"></script>';

		}
		$openmoneydata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 4,
			'userid' => strval($userid),
			'orderid' => $orderid,
			'orderamount' => $grandamount,
			'ordernote' => $productdata->productname,
		);
		$response = $this->Site_Digital_Model->openmoneyentry($openmoneydata);

		$this->load->view('openmoney_checkout', ['postData' => $postData]);
	}

	public function specialresponse()
	{
		
		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		$this->load->helper('openmoney_helper');

		$environment = OPENMONEY_MODE;

		if (OPENMONEY_MODE == "PROD") {
			$accesskey = OPENMONEY_API_KEY;
			$secretkey = OPENMONEY_API_SECRET;
		} else {
			$accesskey = OPENMONEY_API_KEY;
			$secretkey = OPENMONEY_API_SECRET;
		}

		if ($_POST['layer_payment_id'] == '') {
			$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
		}

		$data = array(
			'layer_pay_token_id' => $_POST['layer_pay_token_id'],
			'layer_order_amount' => $_POST['layer_order_amount'],
			'tranid' => $_POST['tranid'],
		);

		if (empty($error) && verify_hash($data, $_POST['hash'], $accesskey, $secretkey) && !empty($data['tranid'])) {
			$payment_data = get_payment_details($environment, $accesskey, $secretkey, $_POST['layer_payment_id']);

			if (isset($payment_data['error'])) {
				$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
				die;
			}

			if (empty($error) && isset($payment_data['id']) && !empty($payment_data)) {
				if ($payment_data['payment_token']['id'] != $data['layer_pay_token_id']) {
					$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
				} else {
					if ($payment_data['status'] == 'captured' && $payment_data['payment_token']['status'] == 'paid') {
						$orderid = $payment_data['payment_token']['mtx'];
						$txstatus = $payment_data['status'];
						$referenceid = $payment_data['id'];
						$paymentmode = $payment_data['payment_token']['status'];
						$orderamount = $payment_data['payment_token']['amount'];

						$this->load->model('Site_Digital_Model');
						$paymentdata = $this->Site_Digital_Model->getopenmoneyentry($orderid);

						$openmoneydata = array(
							'rec_date' => date('Y-m-d H:i:s'),
							'referenceid' => $referenceid,
							'txstatus' => $txstatus,
							'paymentmode' => $paymentmode
						);
						$response1 = $this->Site_Digital_Model->updateopenmoneyentry($paymentdata->id, $openmoneydata);

						$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);
						$cardno = random_code(16);

						$data = array(
							'rec_date' => date('Y-m-d H:i:s'),
							'card_number' => $cardno,
							'registration_date' => date('Y-m-d'),
							'expiry_date' => date('Y-m-d', strtotime('+3 months')),
							'amount' => $orderamount,
							'paymentid' => $referenceid,
							'isActive' => 1
						);

						$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

						$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);
						$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'true']);
					} else {
						$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
					}
				}
			}
		} else {
			$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}
	/* END : Special offer loan */

	/* START : Bumper offer loan */
	public function bumperoffer()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('apply-personal-loan');
		$prores = $this->Site_Info_Model->getproductdetails('bumper-offer');

		if ($prores->inOffer == 1) {
			$productdata = array(
				'amount' => $prores->amount,
				'offeramount' => $prores->offeramount,
				'offerdate' => date('Y/m/d', strtotime('+1 days')) . ' 24:00:00',
				'payamount' => $prores->offeramount + ($prores->offeramount * 0.18)
			);
		} else {
			$productdata = array(
				'amount' => $prores->amount,
				'offeramount' => 0,
				'offerdate' => '',
				'payamount' => $prores->amount + ($prores->amount * 0.18)
			);
		}

		$this->load->view('bumperoffer', ['meta' => $meta, 'productdata' => $productdata]);
	}

	public function getbumperoffer()
	{

		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('bumper-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$actualamount = $amount + ($amount * 0.18);
		$grandamount = floor($actualamount);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
		foreach ($uat_numbers as $uat_num) {
			if ($uat_num == $mobileno) {
				$grandamount = 1;
			}
		}

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'offerpage' => 5,
			'fullname' => $fullname,
			'mobile' => $mobileno,
			'emailid' => $emailid,
			'amount' => $grandamount,
			'isCustomer' => 0,
			'isActive' => 0,
			'isDelete' => 0
		);

		$this->load->model('Site_Digital_Model');
		$userid = $this->Site_Digital_Model->cardofferorder($data);

		$orderid = number_format(microtime(true) * 1000, 0, '.', '');
		$encData = null;

		if (SABPAISA_MODE == 'PROD') {
			$spDomain = "https://securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1";
		} else {
			$spDomain = "https://stage-securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1";
		}

		$returnUrl = base_url('loan/bumperresponse');

		$encData = "?clientCode=" . SABPAISA_CLIENT_CODE . "&transUserName=" . SABPAISA_USERNAME . "&transUserPassword=" . SABPAISA_PASSWORD . "&amount=" . $grandamount . "&amountType=INR&clientTxnId=" . $orderid . "&payerName=" . trim($fullname) . "&payerMobile=" . $mobileno . "&payerEmail=" . trim($emailid) . "&mcc=5137&channelId=#&callbackUrl=" . $returnUrl;

		$this->load->helper('subpaisa');
		$encryptData = encrypt(SABPAISA_AUTH_KEY, SABPAISA_AUTH_IV, $encData);

		$postData = array(
			'clientCode' => SABPAISA_CLIENT_CODE,
			'encryptData' => $encryptData,
			'action' => $spDomain
		);

		$subpaisadata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 5,
			'userid' => $userid,
			'orderid' => $orderid,
			'orderamount' => $grandamount,
			'ordernote' => $productdata->productname,
		);
		$response = $this->Site_Digital_Model->subpaisaentry($subpaisadata);

		$this->load->view('sabpaisa-checkout', ['postData' => $postData]);
	}

	public function bumperresponse()
	{

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('apply-personal-loan');

		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;
		$decText = null;

		if (isset($_REQUEST)) {
			$query = $_REQUEST['encResponse'];
			$query = str_replace("%2B", "+", $query);
			$decText = null;

			$this->load->helper('subpaisa');
			$decText = decrypt(SABPAISA_AUTH_KEY, SABPAISA_AUTH_IV, $query);
			$token = strtok($decText, "&");

			$i = 0;
			while ($token !== false) {
				$i = $i + 1;
				$token1 = strchr($token, "=");
				$token = strtok("&");
				$stringpart = ltrim($token1, "=");

				if ($i == 1) {
					$payerName = $stringpart;
				}
				if ($i == 2) {
					$payerEmail = $stringpart;
				}
				if ($i == 3) {
					$payerMobile = $stringpart;
				}
				if ($i == 4) {
					$clientTxnId = $stringpart;
				}
				if ($i == 6) {
					$amount = $stringpart;
				}
				if ($i == 8) {
					$paidAmount = $stringpart;
				}
				if ($i == 9) {
					$paymentMode = $stringpart;
				}
				if ($i == 10) {
					$bankName = $stringpart;
				}
				if ($i == 12) {
					$status = $stringpart;
				}
				if ($i == 13) {
					$statusCode = $stringpart;
				}
				if ($i == 15) {
					$sabpaisaTxnId = $stringpart;
				}
				if ($i == 20) {
					$bankTxnId = $stringpart;
				}
			}

			$this->load->model('Site_Digital_Model');
			$paymentdata = $this->Site_Digital_Model->getsubpaisaentry($clientTxnId);

			$subpaisadata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'referenceid' => $sabpaisaTxnId,
				'txstatus' => $status,
				'paymentmode' => $paymentMode
			);

			$response1 = $this->Site_Digital_Model->updatesubpaisaentry($paymentdata->id, $subpaisadata);

			if ($statusCode == '0000') {
				$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

				$cardno = random_code(16);
				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+3 months')),
					'paymentid' => $sabpaisaTxnId,
					'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('bumperoffer-response', ['meta' => $meta, 'status' => $response]);
			} else if ($statusCode == '0300') {
				$this->load->view('bumperoffer-response', ['meta' => $meta, 'status' => 'false']);
			} else {
				$this->load->view('bumperoffer-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('bumperoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}

	public function bumpercallback()
	{
		die;
	}
	/* STOP : Bumper offer loan */

	/* START : Flash offer loan */
	public function flashoffer()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('apply-personal-loan');
		$prores = $this->Site_Info_Model->getproductdetails('flash-offer');

		if ($prores->inOffer == 1) {
			$productdata = array(
				'amount' => $prores->amount,
				'offeramount' => $prores->offeramount,
				'offerdate' => date('Y/m/d', strtotime('+1 days')) . ' 24:00:00',
				'payamount' => $prores->offeramount + ($prores->offeramount * 0.18)
			);
		} else {
			$productdata = array(
				'amount' => $prores->amount,
				'offeramount' => 0,
				'offerdate' => '',
				'payamount' => $prores->amount + ($prores->amount * 0.18)
			);
		}

		$this->load->view('flashoffer', ['meta' => $meta, 'productdata' => $productdata]);
	}

	public function getflashoffer()
	{

		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('flash-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$actualamount = $amount + ($amount * 0.18);
		$grandamount = floor($actualamount);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
		foreach ($uat_numbers as $uat_num) {
			if ($uat_num == $mobileno) {
				$grandamount = 1;
			}
		}

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'offerpage' => 6,
			'fullname' => $fullname,
			'mobile' => $mobileno,
			'emailid' => $emailid,
			'amount' => $grandamount,
			'isCustomer' => 0,
			'isActive' => 0,
			'isDelete' => 0
		);

		$this->load->model('Site_Digital_Model');
		$userid = $this->Site_Digital_Model->cardofferorder($data);

		$orderid = number_format(microtime(true) * 1000, 0, '.', '');
		$encData = null;

		if (SABPAISA_MODE == 'PROD') {
			$spDomain = "https://securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1";
		} else {
			$spDomain = "https://stage-securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1";
		}

		$returnUrl = base_url('loan/flashresponse');

		$encData = "?clientCode=" . SABPAISA_CLIENT_CODE . "&transUserName=" . SABPAISA_USERNAME . "&transUserPassword=" . SABPAISA_PASSWORD . "&amount=" . $grandamount . "&amountType=INR&clientTxnId=" . $orderid . "&payerName=" . trim($fullname) . "&payerMobile=" . $mobileno . "&payerEmail=" . trim($emailid) . "&mcc=5137&channelId=#&callbackUrl=" . $returnUrl;

		$this->load->helper('subpaisa');
		$encryptData = encrypt(SABPAISA_AUTH_KEY, SABPAISA_AUTH_IV, $encData);

		$postData = array(
			'clientCode' => SABPAISA_CLIENT_CODE,
			'encryptData' => $encryptData,
			'action' => $spDomain
		);

		$subpaisadata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 6,
			'userid' => $userid,
			'orderid' => $orderid,
			'orderamount' => $grandamount,
			'ordernote' => $productdata->productname,
		);
		$response = $this->Site_Digital_Model->subpaisaentry($subpaisadata);

		$this->load->view('sabpaisa-checkout', ['postData' => $postData]);
	}

	public function flashresponse()
	{

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('apply-personal-loan');

		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;
		$decText = null;

		if (isset($_REQUEST)) {
			$query = $_REQUEST['encResponse'];
			$query = str_replace("%2B", "+", $query);
			$decText = null;

			$this->load->helper('subpaisa');
			$decText = decrypt(SABPAISA_AUTH_KEY, SABPAISA_AUTH_IV, $query);
			$token = strtok($decText, "&");

			$i = 0;
			while ($token !== false) {
				$i = $i + 1;
				$token1 = strchr($token, "=");
				$token = strtok("&");
				$stringpart = ltrim($token1, "=");

				if ($i == 1) {
					$payerName = $stringpart;
				}
				if ($i == 2) {
					$payerEmail = $stringpart;
				}
				if ($i == 3) {
					$payerMobile = $stringpart;
				}
				if ($i == 4) {
					$clientTxnId = $stringpart;
				}
				if ($i == 6) {
					$amount = $stringpart;
				}
				if ($i == 8) {
					$paidAmount = $stringpart;
				}
				if ($i == 9) {
					$paymentMode = $stringpart;
				}
				if ($i == 10) {
					$bankName = $stringpart;
				}
				if ($i == 12) {
					$status = $stringpart;
				}
				if ($i == 13) {
					$statusCode = $stringpart;
				}
				if ($i == 15) {
					$sabpaisaTxnId = $stringpart;
				}
				if ($i == 20) {
					$bankTxnId = $stringpart;
				}
			}

			$this->load->model('Site_Digital_Model');
			$paymentdata = $this->Site_Digital_Model->getsubpaisaentry($clientTxnId);

			$subpaisadata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'referenceid' => $sabpaisaTxnId,
				'txstatus' => $status,
				'paymentmode' => $paymentMode
			);

			$response1 = $this->Site_Digital_Model->updatesubpaisaentry($paymentdata->id, $subpaisadata);

			if ($statusCode == '0000') {
				$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

				$cardno = random_code(16);
				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+3 months')),
					'paymentid' => $sabpaisaTxnId,
					'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('flashoffer-response', ['meta' => $meta, 'status' => $response]);
			} else if ($statusCode == '0300') {
				$this->load->view('flashoffer-response', ['meta' => $meta, 'status' => 'false']);
			} else {
				$this->load->view('flashoffer-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('flashoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}

	public function flashcallback()
	{
		die;
	}
	/* STOP : Flash offer loan */

	/* START : Flash offer loan */
	public function quickoffer()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		$prores = $this->Site_Info_Model->getproductdetails('quick-offer');

		if ($prores->inOffer == 1) {
			$productdata = array(
				'amount' => $prores->amount,
				'offeramount' => $prores->offeramount,
				'offerdate' => date('Y/m/d', strtotime('+1 days')) . ' 24:00:00',
				'payamount' => $prores->offeramount + ($prores->offeramount * 0.18)
			);
		} else {
			$productdata = array(
				'amount' => $prores->amount,
				'offeramount' => 0,
				'offerdate' => '',
				'payamount' => $prores->amount + ($prores->amount * 0.18)
			);
		}

		$this->load->view('quickoffer', ['meta' => $meta, 'productdata' => $productdata]);
	}

	public function getquickoffer()
	{
		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('quick-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);
		$roundamount = floor($grandamount);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];
		$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
		foreach ($uat_numbers as $uat_num) {
			if ($uat_num == $mobileno) {
				$roundamount = 1;
			}
		}
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'offerpage' => 7,
			'fullname' => $fullname,
			'mobile' => $mobileno,
			'emailid' => $emailid,
			'amount' => $roundamount,
			'isCustomer' => 0,
			'isActive' => 0,
			'isDelete' => 0
		);

		$this->load->model('Site_Digital_Model');
		$userid = $this->Site_Digital_Model->cardofferorder($data);

		$orderid = number_format(microtime(true) * 1000, 0, '.', '');
		$encData = null;

		if (SABPAISA_MODE == 'PROD') {
			$spDomain = "https://securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1";
		} else {
			$spDomain = "https://stage-securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1";
		}

		$returnUrl = base_url('loan/quickofferresponse');

		$encData = "?clientCode=" . SABPAISA_CLIENT_CODE . "&transUserName=" . SABPAISA_USERNAME . "&transUserPassword=" . SABPAISA_PASSWORD . "&amount=" . $roundamount . "&amountType=INR&clientTxnId=" . $orderid . "&payerName=" . trim($fullname) . "&payerMobile=" . $mobileno . "&payerEmail=" . trim($emailid) . "&mcc=5137&channelId=#&callbackUrl=" . $returnUrl;

		$this->load->helper('subpaisa');
		$encryptData = encrypt(SABPAISA_AUTH_KEY, SABPAISA_AUTH_IV, $encData);

		$postData = array(
			'clientCode' => SABPAISA_CLIENT_CODE,
			'encryptData' => $encryptData,
			'action' => $spDomain
		);

		$subpaisadata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 7,
			'userid' => $userid,
			'orderid' => $orderid,
			'orderamount' => $roundamount,
			'ordernote' => $productdata->productname,
		);
		$response = $this->Site_Digital_Model->subpaisaentry($subpaisadata);

		$this->load->view('sabpaisa-checkout', ['postData' => $postData]);
	}

	public function quickofferresponse()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;
		$decText = null;

		if (isset($_REQUEST)) {
			$query = $_REQUEST['encResponse'];
			$query = str_replace("%2B", "+", $query);
			$decText = null;

			$this->load->helper('subpaisa');
			$decText = decrypt(SABPAISA_AUTH_KEY, SABPAISA_AUTH_IV, $query);
			$token = strtok($decText, "&");

			$i = 0;
			while ($token !== false) {
				$i = $i + 1;
				$token1 = strchr($token, "=");
				$token = strtok("&");
				$stringpart = ltrim($token1, "=");

				if ($i == 1) {
					$payerName = $stringpart;
				}
				if ($i == 2) {
					$payerEmail = $stringpart;
				}
				if ($i == 3) {
					$payerMobile = $stringpart;
				}
				if ($i == 4) {
					$clientTxnId = $stringpart;
				}
				if ($i == 6) {
					$amount = $stringpart;
				}
				if ($i == 8) {
					$paidAmount = $stringpart;
				}
				if ($i == 9) {
					$paymentMode = $stringpart;
				}
				if ($i == 10) {
					$bankName = $stringpart;
				}
				if ($i == 12) {
					$status = $stringpart;
				}
				if ($i == 13) {
					$statusCode = $stringpart;
				}
				if ($i == 15) {
					$sabpaisaTxnId = $stringpart;
				}
				if ($i == 20) {
					$bankTxnId = $stringpart;
				}
			}

			$this->load->model('Site_Digital_Model');
			$paymentdata = $this->Site_Digital_Model->getsubpaisaentry($clientTxnId);

			$subpaisadata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'referenceid' => $sabpaisaTxnId,
				'txstatus' => $status,
				'paymentmode' => $paymentMode
			);

			$response1 = $this->Site_Digital_Model->updatesubpaisaentry($paymentdata->id, $subpaisadata);

			if ($statusCode == '0000') {
				$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

				$cardno = random_code(16);
				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+1 years')),
					'paymentid' => $sabpaisaTxnId,
					'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('quickoffer-response', ['meta' => $meta, 'status' => $response]);
			} else if ($statusCode == '0300') {
				$this->load->view('quickoffer-response', ['meta' => $meta, 'status' => 'false']);
			} else {
				$this->load->view('quickoffer-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('quickoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}
	/* STOP : Quick offer loan */


	/* START : Mega offer loan */
	public function megaoffer()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('apply-personal-loan');
		$prores = $this->Site_Info_Model->getproductdetails('mega-offer');

		if ($prores->inOffer == 1) {
			$productdata = array(
				'amount' => $prores->amount,
				'offeramount' => $prores->offeramount,
				'offerdate' => date('Y/m/d', strtotime('+1 days')) . ' 24:00:00',
				'payamount' => $prores->offeramount + ($prores->offeramount * 0.18)
			);
		} else {
			$productdata = array(
				'amount' => $prores->amount,
				'offeramount' => 0,
				'offerdate' => '',
				'payamount' => $prores->amount + ($prores->amount * 0.18)
			);
		}

		$this->load->view('megaoffer', ['meta' => $meta, 'productdata' => $productdata]);
	}

	public function getmegaoffer()
	{

		$this->load->model('Site_Info_Model');
		$this->load->model('Site_Digital_Model');

		$productdata = $this->Site_Info_Model->getproductdetails('mega-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);
		$roundamount = floor($grandamount);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
		foreach ($uat_numbers as $uat_num) {
			if ($uat_num == $mobileno) {
				$roundamount = 1;
			}
		}

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'offerpage' => 8,
			'fullname' => $fullname,
			'mobile' => $mobileno,
			'emailid' => $emailid,
			'amount' => $roundamount,
			'isCustomer' => 0,
			'isActive' => 0,
			'isDelete' => 0
		);

		$userid = $this->Site_Digital_Model->cardofferorder($data);

		$this->load->helper('paygic');
		$response = createMerchantToken();

		$orderid = "PAYGIC" . number_format(microtime(true) * 1000, 0, '.', '');


		$token = $response->data->token;
		$returnUrl = base_url('loan/megaresponse/' . $orderid . '/' . $token);

		$postData = array(
			'mid' => PAYGIC_MID,
			"merchantReferenceId" => $orderid, // Unique reference ID for the merchant
			"amount" => $roundamount, // Transaction amount
			"customer_mobile" => $mobileno, // Customer's mobile number
			"customer_name" => $fullname, // Customer's name
			"customer_email" => $emailid, // Customer's email
			"redirect_URL" => $returnUrl,
			"failed_URL" => $returnUrl,
		);

		$createresponse = createPaymentPage($postData, $token);
		$post_data = json_decode($createresponse);
		$post_reponse = array(
			"status" => $post_data->status,
			"statusCode" => $post_data->statusCode,
			"msg" => $post_data->msg,
			"data" => array(
				"payPageUrl" => $post_data->data->payPageUrl,
				"expiry" => 0,
				"amount" => $post_data->data->amount,
				"paygicReferenceId" => $post_data->data->paygicReferenceId,
				"merchantReferenceId" => $post_data->data->merchantReferenceId,
			)

		);

		$paygicdata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 8,
			'userid' => $userid,
			'orderid' => $orderid,
			'orderamount' => $roundamount,
			'ordernote' => $productdata->productname,
		);

		$response = $this->Site_Digital_Model->paygicentry($paygicdata);

		redirect($post_data->data->payPageUrl);

	}

	public function megaresponse($orderid, $token)
	{

		$this->load->helper('paygic');

		$createresponse = checkPaymentStatus($orderid, $token);

		$response_data = json_decode($createresponse);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('offer-page');

		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;
		$decText = null;

		if (isset($response_data)) {

			$this->load->model('Site_Digital_Model');
			$paymentdata = $this->Site_Digital_Model->getpaygicentry($response_data->data->merchantReferenceId);

			$paygicdata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'transactionid' => $response_data->data->paygicReferenceId,
				'statuscode' => $response_data->txnStatus,
				'paymentmode' => '',
			);

			$response1 = $this->Site_Digital_Model->updatepaygicentry($paymentdata->id, $paygicdata);

			if ($response_data->txnStatus == 'SUCCESS') {
				$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

				$cardno = random_code(16);
				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+3 months')),
					'paymentid' => $response_data->data->UTR,
					'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('megaoffer-response', ['meta' => $meta, 'status' => $response]);
			} else {
				$this->load->view('megaoffer-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('megaoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}


	/* STOP : Mega offer loan */


}
?>