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

		$orderid = 'order_' . number_format(microtime(true) * 1000, 0, '.', '');
		$returnUrl = base_url('loan/specialresponse?orderid=' . $orderid);

		if (CASHFREE_MODE == "PROD") {
			$curlurl = 'https://api.cashfree.com/pg/orders';
			$paymode = 'production';
		} else {
			$curlurl = 'https://sandbox.cashfree.com/pg/orders';
			$paymode = 'sandbox';
		}

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

		$data_res = array(
			"order_id" => $orderid,
			"order_amount" => $grandamount,
			"order_note" => $productdata->productname,
			"customer_id" => strval($userid),
			"customer_name" => $fullname,
			"customer_phone" => $mobileno,
			"customer_email" => $emailid,
			"returnUrl" => $returnUrl
		);

		$this->load->helper('cashfree');
		$payurl = getpaymenturl($curlurl, $data_res);

		if ($payurl) {
			$pay_sess_url = $payurl->payment_session_id;
		}

		$cashfreedata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 4,
			'userid' => strval($userid),
			'orderid' => $orderid,
			'orderamount' => $grandamount,
			'ordernote' => $productdata->productname,
		);
		$response = $this->Site_Digital_Model->cashfreeentry($cashfreedata);

		$this->load->view('cashfree-checkout', ['pay_session_id' => $pay_sess_url, 'paymode' => $paymode]);
	}

	public function specialresponse()
	{
		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		if (isset ($_REQUEST['orderid'])) {
			if (CASHFREE_MODE == "PROD") {
				$curlurl = 'https://api.cashfree.com/pg/orders/' . $_REQUEST['orderid'] . '/payments';
			} else {
				$curlurl = 'https://sandbox.cashfree.com/pg/orders/' . $_REQUEST['orderid'] . '/payments';
			}

			$this->load->helper('cashfree');
			$orderdata = getorderdata($curlurl);

			if ($orderdata) {
				$orderid = $orderdata[0]->order_id;
				$txstatus = $orderdata[0]->payment_status;
				$referenceid = $orderdata[0]->cf_payment_id;
				$paymentmode = $orderdata[0]->payment_group;
				$orderamount = $orderdata[0]->order_amount;

				$this->load->model('Site_Digital_Model');
				$paymentdata = $this->Site_Digital_Model->getcashfreeentry($orderid);

				$cashfreedata = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'referenceid' => $referenceid,
					'txstatus' => $txstatus,
					'paymentmode' => $paymentmode
				);
				$response1 = $this->Site_Digital_Model->updatecashfreeentry($paymentdata->id, $cashfreedata);

				if ($txstatus == 'SUCCESS') {
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

					$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => $response]);
				} else if ($txstatus == 'FAILED') {
					$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
				} else {
					$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
				}
			} else {
				$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}
	/* END : Special offer loan */

}
?>
