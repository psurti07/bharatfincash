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
					'expiry_date' => date('Y-m-d', strtotime('+12 months')),
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

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
		foreach ($uat_numbers as $uat_num) {
			if ($uat_num == $mobileno) {
				$grandamount = 1;
			}
		}

		$orderid = number_format(microtime(true) * 1000, 0, '.', '');
		$returnUrl = base_url('loan/specialresponse');
		$callbackUrl = base_url('loan/specialcallback');

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

		if (PHONEPE_MODE == "PROD") {
			$curlurl = 'https://api.phonepe.com/apis/hermes/pg/v1/pay';
		} else {
			$curlurl = 'https://api-preprod.phonepe.com/apis/hermes/pg/v1/pay';
		}

		$phonepedata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 4,
			'userid' => $userid,
			'orderid' => $orderid,
			'orderamount' => $grandamount,
			'ordernote' => $productdata->productname
		);
		$response = $this->Site_Digital_Model->phonepeentry($phonepedata);

		$data_res = array(
			"merchantId" => PHONEPE_MID,
			"merchantTransactionId" => strval($orderid),
			"merchantUserId" => strval($userid),
			"amount" => $grandamount * 100,
			"redirectUrl" => $returnUrl,
			"redirectMode" => "POST",
			"callbackUrl" => $callbackUrl,
			"mobileNumber" => strval($mobileno),
			"paymentInstrument" => array(
				"type" => "PAY_PAGE"
			)
		);

		$this->load->helper('phonepe');
		$payurl = getpaymenturl($curlurl, PHONEPE_KEY, PHONEPE_KEY_INDEX, $data_res);

		if ($payurl) {
			header("location:" . $payurl->data->instrumentResponse->redirectInfo->url);
			die;
		} else {
			return redirect("staroffer");
			die;
		}
	}

	public function specialresponse()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		if (!isset($_POST["code"]) || !isset($_POST["transactionId"]) || !isset($_POST["providerReferenceId"])) {
			return redirect("specialoffer");
			die;
		}

		$txStatus = $_POST["code"];
		$transactionId = $_POST["transactionId"];
		$referenceId = $_POST["providerReferenceId"];

		$this->load->model('Site_Digital_Model');
		$paymentdata = $this->Site_Digital_Model->getphonepeentry($transactionId);

		$phonepedata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'referenceid' => $referenceId,
			'txstatus' => $txStatus
		);

		$response1 = $this->Site_Digital_Model->updatephonepeentry($paymentdata->id, $phonepedata);

		$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

		if ($txStatus == "PAYMENT_SUCCESS") {
			$isentry = $this->Site_Digital_Model->checkcardofferentry($referenceId);
			if ($isentry == 0) {

				$cardno = random_code(16);

				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+12 months')),
					'amount' => $paymentdata->orderamount,
					'paymentid' => $referenceId,
					'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => $response]);
			} else {
				$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'true']);
			}
		} else if ($txStatus == "PAYMENT_FAILURE") {
			$sent = $this->Site_Digital_Model->sendPaymentFailedGreetings($userdata->mobile, $userdata->emailid);
			$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
		} else {
			$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}

	public function specialcallback()
	{
		die;
	}
	/* END : Special offer loan */


	/* START : Bumper offer loan */
	public function bumperoffer()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
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

		$orderid = number_format(microtime(true) * 1000, 0, '.', '');
		$returnUrl = base_url('loan/bumperresponse');
		$callbackUrl = base_url('loan/bumpercallback');

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

		if (PHONEPE_MODE == "PROD") {
			$curlurl = 'https://api.phonepe.com/apis/hermes/pg/v1/pay';
		} else {
			$curlurl = 'https://api-preprod.phonepe.com/apis/hermes/pg/v1/pay';
		}

		$phonepedata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 4,
			'userid' => $userid,
			'orderid' => $orderid,
			'orderamount' => $grandamount,
			'ordernote' => $productdata->productname
		);
		$response = $this->Site_Digital_Model->phonepeentry($phonepedata);

		$data_res = array(
			"merchantId" => PHONEPE_MID,
			"merchantTransactionId" => strval($orderid),
			"merchantUserId" => strval($userid),
			"amount" => $grandamount * 100,
			"redirectUrl" => $returnUrl,
			"redirectMode" => "POST",
			"callbackUrl" => $callbackUrl,
			"mobileNumber" => strval($mobileno),
			"paymentInstrument" => array(
				"type" => "PAY_PAGE"
			)
		);

		$this->load->helper('phonepe');
		$payurl = getpaymenturl($curlurl, PHONEPE_KEY, PHONEPE_KEY_INDEX, $data_res);

		if ($payurl) {
			header("location:" . $payurl->data->instrumentResponse->redirectInfo->url);
			die;
		} else {
			return redirect("staroffer");
			die;
		}
	}

	public function bumperresponse()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		if (!isset($_POST["code"]) || !isset($_POST["transactionId"]) || !isset($_POST["providerReferenceId"])) {
			return redirect("bumperoffer");
			die;
		}

		$txStatus = $_POST["code"];
		$transactionId = $_POST["transactionId"];
		$referenceId = $_POST["providerReferenceId"];

		$this->load->model('Site_Digital_Model');
		$paymentdata = $this->Site_Digital_Model->getphonepeentry($transactionId);

		$phonepedata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'referenceid' => $referenceId,
			'txstatus' => $txStatus
		);

		$response1 = $this->Site_Digital_Model->updatephonepeentry($paymentdata->id, $phonepedata);

		$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

		if ($txStatus == "PAYMENT_SUCCESS") {
			$isentry = $this->Site_Digital_Model->checkcardofferentry($referenceId);
			if ($isentry == 0) {

				$cardno = random_code(16);

				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+12 months')),
					'amount' => $paymentdata->orderamount,
					'paymentid' => $referenceId,
					'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('bumperoffer-response', ['meta' => $meta, 'status' => $response]);
			} else {
				$this->load->view('bumperoffer-response', ['meta' => $meta, 'status' => 'true']);
			}
		} else if ($txStatus == "PAYMENT_FAILURE") {
			$sent = $this->Site_Digital_Model->sendPaymentFailedGreetings($userdata->mobile, $userdata->emailid);
			$this->load->view('bumperoffer-response', ['meta' => $meta, 'status' => 'false']);
		} else {
			$this->load->view('bumperoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}

	public function bumpercallback()
	{
		die;
	}
	/* END : Bumper offer loan */
}
?>
