<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Digital extends CI_Controller
{

	public function index()
	{
		return redirect()->to('Infopage');
	}

	public function pl($referralcode)
	{
		if (!$referralcode) {
			return redirect()->to('Infopage');
		} else {
			$this->session->set_tempdata('referralcode', $referralcode);
			redirect('digital/personalLoan');
		}
	}

	public function bl($referralcode)
	{
		if (!$referralcode) {
			return redirect()->to('Infopage');
		} else {
			$this->session->set_tempdata('referralcode', $referralcode);
			redirect('digital/businessLoan');
		}
	}

	public function sendotpCode()
	{
		if ($_REQUEST['loanamount'] != "" && $_REQUEST['mobile'] != "") {
			$loanamount = $_REQUEST['loanamount'];
			$mobile = $_REQUEST['mobile'];

			$this->load->model('Site_Digital_Model');
			$data = $this->Site_Digital_Model->checkuser($mobile);

			if ($data != '') {
				$key = stringCrypt($data->id, 'encrypt');
				$redirect_url = site_url("digital/checkeligibility/" . $key);

				if ($data->isUser == 2) {
					$validatemsg="You are already a registered customer. Kindly login to customer panel. <a href=". site_url('customer').">Click Here</a>";
					echo json_encode(array("success"=>false, "message"=>$validatemsg, "mobile"=>"", "redirect_url"=>""));
					die;
				} else {
					$data1 = array(
						'update_date' => date('Y-m-d H:i:s')
					);
					$response1 = $this->Site_Digital_Model->updateregistration($data->userid, $data1);

					switch ($data->process_step) {
						case '3':
							$redirect_url = site_url("digital/membershiporder/" . $key);
							break;

						case '2':
							$redirect_url = site_url("digital/preapproval/" . $key);
							break;

						default:
							$redirect_url = site_url("digital/checkeligibility/" . $key);
							break;
					}
					echo json_encode(array("success" => true, "message" => "Customer found.", "mobile" => "", "redirect_url" => $redirect_url));
					die;
				}
			} else {
				$this->session->set_tempdata('userloanamount', $loanamount, 3600);
				$this->session->set_tempdata('usermobile', $mobile, 3600);

				$this->load->model('Site_General_Model');
				$countsms = $this->Site_General_Model->countotpentry($mobile);

				if ($countsms < 7) {
					$response = $this->Site_General_Model->generateotp($mobile, '', 'main');
					echo json_encode(array("success" => true, "message" => "OTP sent to mobile.", "mobile" => $mobile, "redirect_url" => ""));
					die;
				} else {
					echo json_encode(array("success" => false, "message" => "You have reached the OTP limit. Please contact customer support", "mobile" => "", "redirect_url" => ""));
					die;
				}
			}

			echo json_encode(array("success" => false, "message" => "Ops. Something is wrong. Try again.", "mobile" => "", "redirect_url" => ""));
			die;
		} else {
			echo json_encode(array("success" => false, "message" => "Customer fullname and mobile number is mendatory.", "mobile" => "", "redirect_url" => ""));
			die;
		}
	}

	public function resendotpCode()
	{
		if ($_REQUEST['fullname'] != "" && $_REQUEST['mobile'] != "") {
			$fullname = $_REQUEST['fullname'];
			$mobile = $_REQUEST['mobile'];

			$this->load->model('Site_General_Model');
			$countsms = $this->Site_General_Model->countotpentry($mobile);

			if ($countsms < 7) {
				$response = $this->Site_General_Model->generateotp($mobile, '', 'main');
				echo json_encode(array("success" => true, "message" => "New OTP sent to mobile."));
				die;
			} else {
				echo json_encode(array("success" => false, "message" => "You have reached the OTP limit. Please contact customer support."));
				die;
			}
		} else {
			echo json_encode(array("success" => false, "message" => "Customer fullname and mobile number is mendatory.", "mobile" => "", "redirect_url" => ""));
			die;
		}
	}

	public function checkotpCode()
	{
		$mobile = $_REQUEST['otpmobile'];
		$otpcode = $_REQUEST['otpcode'];
		$this->session->set_tempdata('userfullname', $_REQUEST['usernm']);
		$this->session->set_tempdata('usermobile', $mobile);

		$this->load->model('Site_General_Model');
		$response = $this->Site_General_Model->checkOTP($mobile, $otpcode);

		if ($response == true) {
			echo json_encode(array("success" => true, "message" => "OTP verification successful.", "mobile" => $mobile));
			die;
		} else {
			echo json_encode(array("success" => false, "message" => "OTP is invalid.", "mobile" => "#"));
			die;
		}
	}


	// START : PERSONAL LOAN FUNCTIONS
	public function personalLoan($step = 's1', $mobile = '')
	{
		$data = array();

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('digital-personal');
		$banklist = $this->Site_Info_Model->getbanklist(10);
		if (isset($_REQUEST['fbclid'])) {
			set_cookie('fbclidpl', $_REQUEST['fbclid'], '604800');
			//$this->session->set_tempdata('fbclidpl', $_REQUEST['fbclid']);
		}
		if ($this->session->tempdata('userloanamount') == TRUE) {
			$loanamount = $this->session->tempdata('userloanamount');
		} else {
			$loanamount = '';
		}

		if ($step == "s2" && $mobile != '') {
			/*$data = array(
				'fullname' => $this->session->tempdata('userfullname'),
				'mobile' => $mobile
			);*/

			$data = array(
				'loanamount' => $loanamount,
				'mobile' => $mobile
			);
			$this->load->view('digital-personal-loan', ['meta' => $meta, 'processstep' => 'step2', 'userdetails' => $data, 'banklist'=>$banklist]);
			return false;
		}
		if ($step == "s3" && $mobile != '') {
			if (!$this->session->tempdata('referraluser')) {
				$referralcode = $this->session->tempdata('referralcode');
			} else {
				$referralcode = '';
			}

			/*$data = array(
				'fullname' => $this->session->tempdata('userfullname'),
				'mobile' => $mobile,
				'referralcode' => $referralcode
			);*/
			$data = array(
				'loanamount' => $loanamount,
				'mobile' => $mobile,
				'referralcode' => $referralcode
			);
			$this->load->view('digital-personal-loan', ['meta' => $meta, 'processstep' => 'step3', 'userdetails' => $data, 'banklist'=>$banklist]);
			return false;
		} else {
			$this->load->view('digital-personal-loan', ['meta' => $meta, 'processstep' => 'step1', 'banklist'=>$banklist]);
		}
	}
	// END : PERSONAL LOAN FUNCTIONS


	// START : BUSINESS LOAN FUNCTIONS
	public function businessLoan($step = 's1', $mobile = '')
	{
		$data = array();

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('digital-business');
		$banklist = $this->Site_Info_Model->getbanklist(10);
		if (isset($_REQUEST['fbclid'])) {
			set_cookie('fbclidpl', $_REQUEST['fbclid'], '604800');
			//$this->session->set_tempdata('fbclidpl', $_REQUEST['fbclid']);
		}
		if ($this->session->tempdata('userloanamount') == TRUE) {
			$loanamount = $this->session->tempdata('userloanamount');
		} else {
			$loanamount = '';
		}
		if ($step == "s2" && $mobile != '') {
			/*$data = array(
				'fullname' => $this->session->tempdata('userfullname'),
				'mobile' => $mobile
			);*/
			$data = array(
				'loanamount' => $loanamount,
				'mobile' => $mobile
			);
			$this->load->view('digital-business-loan', ['meta' => $meta, 'processstep' => 'step2', 'userdetails' => $data, 'banklist'=>$banklist]);
			return false;
		}
		if ($step == "s3" && $mobile != '') {
			if (!$this->session->tempdata('referraluser')) {
				$referralcode = $this->session->tempdata('referralcode');
			} else {
				$referralcode = '';
			}

			$data = array(
				'loanamount' => $loanamount,
				'mobile' => $mobile,
				'referralcode' => $referralcode
			);
			$this->load->view('digital-business-loan', ['meta' => $meta, 'processstep' => 'step3', 'userdetails' => $data, 'banklist'=>$banklist]);
			return false;
		} else {
			$this->load->view('digital-business-loan', ['meta' => $meta, 'processstep' => 'step1', 'banklist'=>$banklist]);
		}
	}
	// END : BUSINESS LOAN FUNCTIONS


	public function registeredUser()
	{
		$fullname = $_REQUEST['username'];
		$cardtype = $_REQUEST['loantype'];
		$mobile = $_REQUEST['usermobile'];
		$email = $_REQUEST['useremail'];
		$loanamount = $_REQUEST['loanamount'];
		$referralcode = $_REQUEST['referralcode'];

		$this->load->model('Site_Digital_Model');
		$usr_res = $this->Site_Digital_Model->checkuser($_REQUEST['usermobile']);

		if ($usr_res != '') {
			if ($usr_res->isUser == 2) {
				$validatemsg="You are already a registered customer. Kindly login to customer panel. <a href=". site_url('customer').">Click Here</a>";
					echo json_encode(array("success"=>false, "message"=>$validatemsg, "mobile"=>"", "redirect_url"=>""));
					die;
			} else {
				$key = stringCrypt($usr_res->id, 'encrypt');
				$redirect_url = site_url("digital/checkeligibility/" . $key);
				echo json_encode(array("success" => true, "message" => "Customer found.", "mobile" => "", "redirect_url" => $redirect_url));
				die;
			}
		}

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'fullname' => $_REQUEST['username'],
			'mobile' => $mobile,
			'email' => $email,
			'cardtype' => $cardtype,
			'usertype' => $_REQUEST['usertype'],
			'process_step' => 1,
			'isUser' => 1,
			'isDelete' => 0
		);

		$this->load->model('Site_Digital_Model');
		$userid = $this->Site_Digital_Model->userregistration($data);

		if ($userid != 0) {
			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'userid' => $userid,
				'loanamount' => $loanamount,
				'loantype' => $_REQUEST['loantype'],
				'isDelete' => 0
			);

			$this->load->model('Site_Digital_Model');
			$applyid = $this->Site_Digital_Model->userapplication($data1);

			if ($referralcode != '') {
				$this->load->model('Site_Digital_Model');
				$referral = $this->Site_Digital_Model->getreferraluserid($referralcode);

				$data2 = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'refferaltype' => 1,
					'refferaluserid' => $referral->id,
					'subuserid' => $userid
				);
				$response = $this->Site_Digital_Model->referraluserentry($data2);
			}

			//$offerresponse = $this->Site_Digital_Model->sendProcessMessage($cardtype, $mobile);

			$key = stringCrypt($applyid, 'encrypt');
			$redirect_url = site_url("digital/checkeligibility/" . $key);

			echo json_encode(array("success" => true, "message" => "Customer registration successful.", "redirect_url" => $redirect_url));
			die;
		} else {
			echo json_encode(array("success" => false, "message" => "Ops. Something goes wrong.", "redirect_url" => "#"));
			die;
		}
	}

	public function checkeligibility($key = '')
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('digital-personal');

		$applyid = stringCrypt($key, 'decrypt');
		$this->session->set_tempdata('applyid', $applyid);

		$this->load->model('Site_Digital_Model');
		$userdate = $this->Site_Digital_Model->checkuserdata($applyid);

		if ($userdate == NULL) {
			redirect('digital/personalLoan');
			die;
		} else if ($userdate->isUser == 2) {
			redirect('digital/personalLoan');
			die;
		} else {
			$loanname = ($userdate->loantype == 12) ? "Business Loan" : "Personal Loan";

			$data = array(
				'applyid' => $applyid,
				'userid' => $userdate->userid,
				'fullname' => $userdate->fullname,
				'mobile' => $userdate->mobile,
				'email' => $userdate->email,
				'loanamount' => $userdate->loanamount,
				'loantype' => $userdate->loantype,
				'loanname' => $loanname,
				'cardtype' => $userdate->cardtype
			);

			$this->load->view('digital-eligibility', ['meta' => $meta, 'userdetails' => $data]);
		}
	}

	public function preapproval($key = '')
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('digital-personal');
		$banklist = $this->Site_Info_Model->getbanklist();

		$applyid = stringCrypt($key, 'decrypt');
		
		$this->session->set_tempdata('companyemail', COMPANY_EMAIL, 3600);

		$this->load->model('Site_Digital_Model');
		$userdate = $this->Site_Digital_Model->checkuserdata($applyid);

		if ($userdate == NULL) {
			redirect('digital/personalLoan');
			die;
		} else if ($userdate->isUser == 2) {
			redirect('digital/personalLoan');
			die;
		} else {
			$this->session->set_tempdata('applyid', $applyid);
			$loanname = ($userdate->loantype == 12) ? "Business Loan" : "Personal Loan";
			$apr = ($userdate->loantype == 12) ? 11.5 : 12.5;
			$stramt = ($userdate->loantype == 12) ? 1930 : 1982;

			$data = array(
				'applyid' => $applyid,
				'userid' => $userdate->userid,
				'fullname' => $userdate->fullname,
				'mobile' => $userdate->mobile,
				'email' => $userdate->email,
				'loantype' => $userdate->loantype,
				'loanname' => $loanname,
				'loanamount' => $userdate->loanamount,
				'income' => $userdate->income,
				'currentemi' => $userdate->currentemi,
				'cardtype' => $userdate->cardtype,
				'apr' => $apr,
				'stramt' => $stramt
			);
			$this->load->model('Site_Info_Model');
			$roipackages = $this->Site_Info_Model->getroipackages($userdate->loantype);
			$roicachefile = $userdate->loantype . $userdate->mobile;

			if ($this->cache->file->get($roicachefile)) {
				$cache_data = $this->cache->file->get($roicachefile);
				$roipackages = $cache_data["roiuser_data"];
			} else {
				$cache_data = array();
				$cache_data["roiuser_data"] = $roipackages;
				$this->cache->file->save($roicachefile, $cache_data, 2592000);
			}
			$this->load->view('digital-pre-approval', ['meta' => $meta, 'userdetails' => $data, 'banklist' => $banklist, 'roipackages' => $roipackages]);
		}
	}

	public function membershiporder($key = '')
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('digital-personal');
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(1);
		$banklist = $this->Site_Info_Model->getbanklist();

		$applyid = stringCrypt($key, 'decrypt');

		$this->load->model('Site_Digital_Model');
		$userdate = $this->Site_Digital_Model->checkuserdata($applyid);

		if ($userdate == NULL) {
			redirect('digital/personalLoan');
			die;
		} else if ($userdate->isUser == 2) {
			redirect('digital/personalLoan');
			die;
		} else {
			$this->session->set_tempdata('applyid', $applyid);
			$loanname = ($userdate->loantype == 12) ? "Business Loan" : "Personal Loan";			
			$productslug = ($userdate->cardtype == 12) ? "digital-business-loan" : "digital-personal-loan";
			$cardname = ($userdate->cardtype == 12) ? "prime" : "standard";
			$apr = ($userdate->loantype == 12) ? 11.5 : 12.5;
			$stramt = ($userdate->loantype == 12) ? 1930 : 1982;
			$prores = $this->Site_Info_Model->getproductdetails($productslug);
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

			$userdata = array(
				'applyid' => $applyid,
				'userid' => $userdate->userid,
				'fullname' => $userdate->fullname,
				'mobile' => $userdate->mobile,
				'email' => $userdate->email,
				'loantype' => $userdate->loantype,
				'loanname' => $loanname,
				'cardname' => $cardname,
				'cardtype' => $userdate->cardtype,
				'loanamount' => $userdate->loanamount,
				'income' => $userdate->income,
				'currentemi' => $userdate->currentemi,
				'apr' => $apr,
				'stramt' => $stramt
			);
			$this->load->model('Site_Info_Model');
			$roipackages = $this->Site_Info_Model->getroipackages($userdate->loantype);
			$roicachefile = $userdate->loantype . $userdate->mobile;

			if ($this->cache->file->get($roicachefile)) {
				$cache_data = $this->cache->file->get($roicachefile);
				$roipackages = $cache_data["roiuser_data"];
			} else {
				$cache_data = array();
				$cache_data["roiuser_data"] = $roipackages;
				$this->cache->file->save($roicachefile, $cache_data, 2592000);
			}
			$this->load->view('digital-membership-card', ['meta' => $meta, 'userdetails' => $userdata, 'productdata' => $productdata, 'banklist' => $banklist, 'testimoniallist' => $testimoniallist, 'roipackages' => $roipackages]);
		}
	}

	public function userApply()
	{
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'cibilscore' => $_REQUEST['cibilscore'],
			'loanpurpose' => $_REQUEST['loanpurpose'],
			'income' => $_REQUEST['monincome'],
			'currentemi' => $_REQUEST['monemi']
		);

		$this->load->model('Site_Digital_Model');
		$response = $this->Site_Digital_Model->updateapplication($_REQUEST['applyid'], $data);

		$data1 = array(
			'update_date' => date('Y-m-d H:i:s'),
			'pincode' => $_REQUEST['pincode'],
			'city' => $_REQUEST['city'],
			'state' => $_REQUEST['state'],
			'process_step' => 2
		);
		$response1 = $this->Site_Digital_Model->updateregistration($_REQUEST['userid'], $data1);

		$userdata = $this->Site_Digital_Model->checkuserdata($_REQUEST['applyid']);

		$key = stringCrypt($_REQUEST['applyid'], 'encrypt');
		redirect("digital/preapproval/" . $key);
	}

	public function getpreApproval()
	{
		$this->load->model('Site_Digital_Model');
		$userdata = $this->Site_Digital_Model->checkuserdata($_REQUEST['applyid']);

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'loantenure' => $_REQUEST['tenure']
		);
		$response = $this->Site_Digital_Model->updateapplication($_REQUEST['applyid'], $data);

		$data1 = array(
			'update_date' => date('Y-m-d H:i:s'),
			'process_step' => 3
		);
		$response1 = $this->Site_Digital_Model->updateregistration($userdata->userid, $data1);

		$apr = ($userdata->loantype == 12) ? 11.5 : 12.5;
		$eligibilityamt = calEligiblity($userdata->income, $userdata->currentemi, $apr, $userdata->loanamount);
		
		$offerresponse = $this->Site_Digital_Model->sendOfferMessage($userdata->loantype, $eligibilityamt, $userdata->mobile, $userdata->email);

		
		/*if ($userdata->loantype == 12) {

			$this->load->model('Site_Info_Model');
			
			$data3 = array(
				'apiKey' => AISENSY_KEY,
				'campaignName' => 'bl_get_5jan',
				'destination' => '+91' . $userdata->mobile,
				'media' => array(
					'url' => AISENSY_OFFER_URL_BL,
					'filename' => AISENSY_OFFER_IMAGE_BL
				),
				'userName' => $userdata->fullname,
				'templateParams' => array('$Name', '$EligibleAmount'),
				'tags' => array('Get Offer'),
				'attributes' => array(
					'EligibleAmount' => strval($eligibilityamt)
				)
			 );
			$restrack3 = aisensy_track($data3);

		} else {
		
			$this->load->model('Site_Info_Model');
			$wpcampaignname = $this->Site_Info_Model->getsmsmessage('wpcampaignoffer');
	
			$data3 = array(
				'apiKey' => AISENSY_KEY,
				'campaignName' => $wpcampaignname,
				'destination' => '+91' . $userdata->mobile,
				'media' => array(
					'url' => AISENSY_OFFER_URL,
					'filename' => AISENSY_OFFER_IMAGE
				),
				'userName' => $userdata->fullname,
				'templateParams' => array('$Name', '$EligibleAmount'),
				'tags' => array('Get Offer'),
				'attributes' => array(
					'EligibleAmount' => strval($eligibilityamt)
				)
			 );
			$restrack3 = aisensy_track($data3);
		}*/

		$data2 = array(
			'phoneNumber' => $userdata->mobile,
			'countryCode' => '+91',
			'traits' => array(
				'name' => $userdata->fullname
			),
			'tags' => array('Get Offer')
		);
		$this->load->helper('interakt');
		$restrack1 = user_track($data2);
		
		$data3 = array(
			'phoneNumber' => $userdata->mobile,
			'countryCode' => '+91',
			'event' => 'Get Offer',
			'traits' => array(
					'EligibleAmount' => $eligibilityamt
			)
		);
		$restrack2 = event_track($data3);

		$key = stringCrypt($_REQUEST['applyid'], 'encrypt');
		redirect("digital/membershiporder/" . $key);
	}

	public function checkoutDigital()
	{
		$this->load->model('Site_Digital_Model');
		$userdata = $this->Site_Digital_Model->checkuserdata($_REQUEST['applyid']);
		$this->session->set_tempdata('applyid', $_REQUEST['applyid']);

		$data3 = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'status' => 1,
			'isDelete' => 0
		);
		$response3 = $this->Site_Digital_Model->updateapplication($_REQUEST['applyid'], $data3);

		$productslug = ($userdata->cardtype == 12) ? "digital-business-loan" : "digital-personal-loan";
		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails($productslug);
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);
		$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
		foreach ($uat_numbers as $uat_num) {
			if ($uat_num == $userdata->mobile) {
				$grandamount = 1;
			}
		}
		
		$orderid = 'order_' . number_format(microtime(true) * 1000, 0, '.', '');
		$returnUrl = base_url('digital/buycardDigital');
		$paymentData = [
			"order_id" => $orderid,
			"customer_id" => strval($userdata->userid),
			'amount' => $grandamount,
			'currency' => 'INR',
			'name' => $userdata->fullname,
			'email_id' => $userdata->email,
			'contact_number' => $userdata->mobile,
			'mtx' => $orderid,
			'return_url' => $returnUrl
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

		$payment_token = create_payment_token(OPENMONEY_MODE, OPENMONEY_API_KEY, OPENMONEY_API_SECRET, $paymentData);

		if (empty($error) && (!isset($payment_token["id"]) || empty($payment_token["id"]))) {
			$error = 'Payment error. ' . 'Layer token ID cannot be empty.';
		}

		if (!empty($payment_token["id"]))
			$payment_token_data = get_payment_token(OPENMONEY_MODE, OPENMONEY_API_KEY, OPENMONEY_API_SECRET, $payment_token["id"]);

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

			$postData = "<form action='" . base_url('digital/buycardDigital') . "' method='post' style='display: none' name='layer_payment_int_form'>
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
			'entryfor' => $userdata->cardtype,
			'userid' => strval($userdata->userid),
			'orderid' => $orderid,
			'orderamount' => $grandamount,
			'ordernote' => $productdata->productname,
		);
		$response = $this->Site_Digital_Model->openmoneyentry($openmoneydata);

		$this->load->view('openmoney_checkout', ['postData' => $postData]);
	}

	public function buycardDigital()
	{
		
		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		$this->load->helper('openmoney_helper');


		if (!isset($_POST['layer_payment_id']) || empty($_POST['layer_payment_id'])) {
			redirect("digital/paymentResponse/11/false");
		}

		$data = array(
			'layer_pay_token_id' => $_POST['layer_pay_token_id'],
			'layer_order_amount' => $_POST['layer_order_amount'],
			'tranid' => $_POST['tranid'],
		);

		if (empty($error) && verify_hash($data, $_POST['hash'], OPENMONEY_API_KEY, OPENMONEY_API_SECRET) && !empty($data['tranid'])) {
			$payment_data = get_payment_details(OPENMONEY_MODE, OPENMONEY_API_KEY, OPENMONEY_API_SECRET, $_POST['layer_payment_id']);

			if (isset($payment_data['error'])) {
				redirect("digital/paymentResponse/11/false");
			}

			if (empty($error) && isset($payment_data['id']) && !empty($payment_data)) {
				if ($payment_data['payment_token']['id'] != $data['layer_pay_token_id']) {
					redirect("digital/paymentResponse/11/false");
				} else {
					if ($payment_data['status'] == 'captured' && $payment_data['payment_token']['status'] == 'paid') {
						$orderid = $payment_data['payment_token']['mtx'];
						$txstatus = $payment_data['status'];
						$referenceid = $payment_data['id'];
						$paymentmode = $payment_data['payment_token']['status'];
						$orderamount = $payment_data['payment_token']['amount'];

						$this->load->model('Site_Digital_Model');
						$paymentdata = $this->Site_Digital_Model->getopenmoneyentry($orderid);
						$userdata = $this->Site_Digital_Model->checkuserregdata($paymentdata->userid);

						$this->load->model('Site_Digital_Model');
				
						$this->session->set_tempdata('applyid', $userdata->id);
						$cardno = random_code(16);

						$mbrdata = array(
							'rec_date' => date('Y-m-d H:i:s'),
							'userid' => $userdata->userid,
							'registration_date' => date('Y-m-d'),
							'expiry_date' => date('Y-m-d', strtotime('+3 months')),
							'card_number' => $cardno,
							'amount' => $orderamount,
							'paymentid' => $referenceid,
							'isActive' => 1,
							'isDelete' => 0
						);
						$memberid = $this->Site_Digital_Model->membershiporder($mbrdata);

						$password = random_code(6);
						$passwordkey = stringCrypt($password, 'encrypt');
						$refcode = strtolower(substr(str_replace(" ", "", $userdata->fullname), 0, 3));
						$refcode .= substr($userdata->mobile, -4);


						$data2 = array(
							'rec_date' => date('Y-m-d H:i:s'),
							'password' => $passwordkey,
							'refcode' => $refcode,
							'process_step' => 4,
							'isUser' => 2
						);
						$response2 = $this->Site_Digital_Model->updateregistration($userdata->userid, $data2);
		
						$this->load->model('Site_Info_Model');
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

						$openmoneydata = array(
							'rec_date' => date('Y-m-d H:i:s'),
							'referenceid' => $referenceid,
							'txstatus' => $txstatus,
							'paymentmode' => $paymentmode
						);
						$response1 = $this->Site_Digital_Model->updateopenmoneyentry($paymentdata->id, $openmoneydata);

						$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

						$netamount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;

						if($userdata->state == 'Gujarat') {
							$cgstamount = $netamount * 0.09;
							$sgstamount = $netamount * 0.09;
						} 
						else {
							$igstamount = $netamount * 0.18;
						}

						$grandtotal = $netamount + $cgstamount + $sgstamount + $igstamount;

						/*$grandtotal = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;

						if ($userdata->state == 'Gujarat') {
							$cgstamount = $grandtotal * 9 / 118;
							$sgstamount = $grandtotal * 9 / 118;
						} else {
							$igstamount = $grandtotal * 18 / 118;
						}

						$netamount = $grandtotal * 100 / 118;*/

						$data3 = array(
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

						$responseinvoice = $this->Site_Digital_Model->generateinvoice($data3, $invoiceno);

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

						if ($userdata->loantype == 12) {

						} else {
							$wpusernamepassword = $this->Site_Info_Model->getsmsmessage('aisency_userwelcomename');
			
							$data3 = array(
								'apiKey' => AISENSY_KEY,
								'campaignName' => $wpusernamepassword,
								'destination' => '+91' . $userdata->mobile,
								'userName' => $userdata->fullname,
								'tags' => array('Payment Successful'),
								'attributes' => array(
									"userid"=> $userdata->mobile,
									"password"=> $password
								),
								'templateParams' => array('$userid', '$password'),
							);
							$restrack3 = aisensy_track($data3);
						}
						
						$sent = $this->Site_Digital_Model->sendSuccessGreetings($userdata->mobile, $userdata->email, $password);

						redirect("digital/paymentResponse/" . $paymentdata->entryfor . "/" . $response2);

						/* $sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);
						redirect("digital/paymentResponse/11/false"); */
					} else {
						redirect("digital/paymentResponse/11/false");
					}
				}
			} else {
				redirect("digital/paymentResponse/11/false");
			}
		} else {
			redirect("digital/paymentResponse/11/false");
		}

	}

	public function paymentResponse($loantype = '', $status = '')
	{
		$this->load->model('Site_Info_Model');
		$this->load->model('Site_Digital_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('digital-personal');

		$fbclidpl = "";
		$banklinks = array();
		$ms_hashed_data = [];

		$data = array(
			'loantype' => $loantype,
			'status' => $status
		);
		if ($status != '') {
			$userdata = $this->Site_Digital_Model->checkuserdata($this->session->tempdata('applyid'));
			
			if ($status == "true" && $this->session->tempdata('applyid') != "") {
				
				$firstname = strtolower(strtok($userdata->fullname, " "));
				$city = strtolower(preg_replace("/[^a-zA-Z]+/", "", $userdata->city));
				$state = strtolower(getStateAbbreviation($userdata->state));
				$orderid = "MC" . date('md') . random_code(4);
				$ms_hashed_data = [
					'name'  => hash('sha256', $firstname),
					'phone' => hash('sha256', "91" . $userdata->mobile),
					'email' => hash('sha256', strtolower($userdata->email)),
				];
				$fbdata = array(
					'type' => 'digital',
					'fullname' => $firstname,
					'mobile' => $userdata->mobile,
					'email' => $userdata->email,
					'city' => $city,
					'state' => $state,
					'orderid' => $orderid,
					'sourceurl' => base_url('/digital/paymentResponse/'.$loantype.'/true')
				);

				if (get_cookie('fbclidpl') != "") {
					$fbclidpl = "fb.0." . round(microtime(true) * 1000) . "." . get_cookie('fbclidpl');
				}

				$fbdata['fbclid'] = $fbclidpl;
				$fbresponse = fbconversioncurl($fbdata);

				if ($userdata->loantype == 12) {

				} else {
				
					$this->load->model('Site_Info_Model');
					$wpcampaignname = $this->Site_Info_Model->getsmsmessage('wpcampaignsuccess');
	
					$data3 = array(
						'apiKey' => AISENSY_KEY,
						'campaignName' => $wpcampaignname,
						'destination' => '+91' . $userdata->mobile,
						'media' => array(
							'url' => AISENSY_SUCCESS_URL,
							'filename' => AISENSY_SUCCESS_IMAGE
						),
						'userName' => $userdata->fullname,
						'templateParams' => array('$Name'),
						'tags' => array('Payment Successful')
					);
					$restrack3 = aisensy_track($data3);
				}

				$data3 = array(
				'phoneNumber' => $userdata->mobile,
				'countryCode' => '+91',
				'event' => 'Payment Successful'
				);
				$this->load->helper('interakt');
				$restrack2 = event_track($data3);

				$this->load->model('Site_Info_Model');
				$banklinks = $this->Site_Info_Model->getdirectlinks($userdata->loantype);
				$this->load->view('payment-response', ['meta' => $meta, 'responsedata' => $data, 'banklinks' => $banklinks, 'ms_hashed_data' => $ms_hashed_data]);
			} else if ($status == "false") {
				
				$this->load->model('Site_Info_Model');
				//$wpcampaignname = $this->Site_Info_Model->getsmsmessage('wpcampaignsuccess');
				if ($userdata->loantype == 12) {

				} else {
				
					$data3 = array(
						'apiKey' => AISENSY_KEY,
						'campaignName' => "fail",
						'destination' => '+91' . $userdata->mobile,
						'media' => array(
							'url' => AISENSY_FAIL_URL,
							'filename' => AISENSY_FAIL_IMAGE
						),
						'userName' => $userdata->fullname,
						'templateParams' => array('$Name'),
						'tags' => array('Payment Failed')
					);
					$restrack3 = aisensy_track($data3);
				}
				$this->load->view('payment-response', ['meta' => $meta, 'responsedata' => $data, 'banklinks' => $banklinks]);
			} else {
				$this->load->view('payment-response', ['meta' => $meta, 'responsedata' => $data]);
			}

			
		} else {
			redirect('digital/personalLoan');
		}
	}

}

?>
