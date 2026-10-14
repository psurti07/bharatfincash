<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Subscription extends CI_Controller
{
	public function index()
	{
		return redirect()->to('Infopage');
	}
	public function referral($referralcode) {
		if (!$referralcode) {
			return redirect()->to('Infopage');
			die;
		} else {
			$this->session->set_tempdata('referralcode', $referralcode, 3600);
			return redirect('subscription/bharatfincash');
			die;
		}
	}
	public function sendotpCode() {
		if ($_REQUEST['loanamount'] != "" && $_REQUEST['mobile'] != "") {
			$loanamount = $_REQUEST['loanamount'];
			$mobile = $_REQUEST['mobile'];
			$this->load->model('Site_Subscription_Model');
			$data = $this->Site_Subscription_Model->checkuser($mobile);
			if ($data != '') {
				$key = stringCrypt($data->id, 'encrypt');
				$redirect_url = site_url("subscription/checkeligibility/" . $key);
				if ($data->isUser == 2) {
					$validatemsg="You are already a registered customer. Kindly login to customer panel. <a href=". site_url('subscriptioncustomer').">Click Here</a>";
					echo json_encode(array("success"=>false, "message"=>$validatemsg, "mobile"=>"", "redirect_url"=>""));
					die;
				} else {
					$data1 = array(
						'update_date' => date('Y-m-d H:i:s')
					);
					$response1 = $this->Site_Subscription_Model->updateregistration($data->userid, $data1);
					switch ($data->process_step) {
						case '3':
							$redirect_url = site_url("subscription/subscriptionorder/" . $key);
							break;
						case '2':
							$redirect_url = site_url("subscription/preapproval/" . $key);
							break;
						default:
							$redirect_url = site_url("subscription/checkeligibility/" . $key);
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
					$response = $this->Site_General_Model->generateotp($mobile, '', 'subscription');
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
			echo json_encode(array("success" => false, "message" => "Customer mobile number is mandatory.", "mobile" => "", "redirect_url" => ""));
			die;
		}
	}
	public function resendotpCode()
	{
		if ($_REQUEST['loanamount'] != "" && $_REQUEST['mobile'] != "") {
			$loanamount = $_REQUEST['loanamount'];
			$mobile = $_REQUEST['mobile'];
			$this->load->model('Site_General_Model');
			$countsms = $this->Site_General_Model->countotpentry($mobile);
			if ($countsms < 7) {
				$response = $this->Site_General_Model->generateotp($mobile, '', 'subscription');
				echo json_encode(array("success" => true, "message" => "New OTP sent to mobile."));
				die;
			} else {
				echo json_encode(array("success" => false, "message" => "You have reached the OTP limit. Please contact customer support."));
				die;
			}
		} else {
			echo json_encode(array("success" => false, "message" => "Customer mobile number is mandatory.", "mobile" => "", "redirect_url" => ""));
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
	public function bharatfincash($step = 's1', $mobile = '')
	{
		$data = array();
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('bharatfincash-subscription');
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
			$data = array(
				'loanamount' => $loanamount,
				//'fullname' => $this->session->tempdata('userfullname'),
				'mobile' => $mobile
			);
			$this->load->view('subscription-bharatfincash', ['meta' => $meta, 'processstep' => 'step2', 'userdetails' => $data, 'banklist'=>$banklist]);
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
				//'fullname' => $this->session->tempdata('userfullname'),
				'mobile' => $mobile,
				'referralcode' => $referralcode
			);
			$this->load->view('subscription-bharatfincash', ['meta' => $meta, 'processstep' => 'step3', 'userdetails' => $data, 'banklist'=>$banklist]);
			return false;
		} else {
			$this->load->view('subscription-bharatfincash', ['meta' => $meta, 'processstep' => 'step1', 'banklist'=>$banklist]);
		}
	}
	public function registeredUser()
	{
		$fullname = $_REQUEST['username'];
		$cardtype = $_REQUEST['loantype'];
		$mobile = $_REQUEST['usermobile'];
		$email = $_REQUEST['useremail'];
		$loanamount = $_REQUEST['loanamount'];
		$referralcode = $_REQUEST['referralcode'];
		$this->load->model('Site_Subscription_Model');
		$usr_res = $this->Site_Subscription_Model->checkuser($_REQUEST['usermobile']);
		if ($usr_res != '') {
			if ($usr_res->isUser == 2) {
				$validatemsg="You are already a registered customer. Kindly login to customer panel. <a href=". site_url('subscriptioncustomer').">Click Here</a>";
					echo json_encode(array("success"=>false, "message"=>$validatemsg, "mobile"=>"", "redirect_url"=>""));
					die;
			} else {
				$key = stringCrypt($usr_res->id, 'encrypt');
				$redirect_url = site_url("subscription/checkeligibility/" . $key);
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
		$this->load->model('Site_Subscription_Model');
		$userid = $this->Site_Subscription_Model->userregistration($data);
		if ($userid != 0) {
			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'userid' => $userid,
				'loanamount' => $loanamount,
				'loantype' => $_REQUEST['loantype'],
				'isDelete' => 0
			);
			$this->load->model('Site_Subscription_Model');
			$applyid = $this->Site_Subscription_Model->userapplication($data1);
			if ($referralcode != '') {
				$this->load->model('Site_Subscription_Model');
				$referral = $this->Site_Subscription_Model->getreferraluserid($referralcode);
				$data2 = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'refferaltype' => 1,
					'refferaluserid' => $referral->id,
					'subuserid' => $userid
				);
				$response = $this->Site_Subscription_Model->referraluserentry($data2);
			}
			//$offerresponse = $this->Site_Subscription_Model->sendProcessMessage($cardtype, $mobile);
			$key = stringCrypt($applyid, 'encrypt');
			$redirect_url = site_url("subscription/checkeligibility/" . $key);
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
		$meta = $this->Site_Info_Model->getmetakeywords('bharatfincash-subscription');
		$applyid = stringCrypt($key, 'decrypt');
		$this->session->set_tempdata('applyid', $applyid);
		$this->load->model('Site_Subscription_Model');
		$userdate = $this->Site_Subscription_Model->checkuserdata($applyid);
		if ($userdate == NULL) {
			redirect('subscription/bharatfincash');
			die;
		} else if ($userdate->isUser == 2) {
			redirect('subscription/bharatfincash');
			die;
		} else {
			$loanname = ($userdate->loantype == 22) ? "Business Loan" : "Personal Loan";
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
			$this->load->view('subscription-eligibility', ['meta' => $meta, 'userdetails' => $data]);
		}
	}
	public function preapproval($key = '')
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('bharatfincash-subscription');
		$banklist = $this->Site_Info_Model->getbanklist();
		$applyid = stringCrypt($key, 'decrypt');
		$this->session->set_tempdata('companyemail', COMPANY_EMAIL, 3600);
		$this->load->model('Site_Subscription_Model');
		$userdate = $this->Site_Subscription_Model->checkuserdata($applyid);
		if ($userdate == NULL) {
			redirect('subscription/bharatfincash');
			die;
		} else if ($userdate->isUser == 2) {
			redirect('subscription/bharatfincash');
			die;
		} else {
			$this->session->set_tempdata('applyid', $applyid);
			$loanname = ($userdate->loantype == 22) ? "Business Loan" : "Personal Loan";
			$apr = ($userdate->loantype == 22) ? 11.5 : 12.5;
			$stramt = ($userdate->loantype == 22) ? 1930 : 1982;
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
			$this->load->view('subscription-pre-approval', ['meta' => $meta, 'userdetails' => $data, 'banklist' => $banklist, 'roipackages' => $roipackages]);
		}
	}
	public function subscriptionorder($key = '')
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('bharatfincash-subscription');
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(1);
		$banklist = $this->Site_Info_Model->getbanklist();
		$applyid = stringCrypt($key, 'decrypt');
		$this->load->model('Site_Subscription_Model');
		$userdate = $this->Site_Subscription_Model->checkuserdata($applyid);
		if ($userdate == NULL) {
			redirect('subscription/bharatfincash');
			die;
		} else if ($userdate->isUser == 2) {
			redirect('subscription/bharatfincash');
			die;
		} else {
			$this->session->set_tempdata('applyid', $applyid);
			$loanname = ($userdate->loantype == 22) ? "Business Loan" : "Personal Loan";
			$cardname = "Bharat Fin Cash Subscription";
			$apr = ($userdate->loantype == 22) ? 11.5 : 12.5;
			$stramt = ($userdate->loantype == 22) ? 1930 : 1982;
			$prores = $this->Site_Info_Model->getproductdetails('bharatfincash-subscription');
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
			    'rec_date' => $userdate->rec_date,
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
			$this->load->view('subscription-plan', ['meta' => $meta, 'userdetails' => $userdata, 'productdata' => $productdata, 'banklist' => $banklist, 'testimoniallist' => $testimoniallist, 'roipackages' => $roipackages]);
		}
	}

	public function geoLocation()
    {
		$this->load->helper('geoloc');
		$pincode = $_REQUEST['pincode'];

        if(strlen($pincode) != 6){
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid pincode'
            ]);
            return;
        }

        $data = getGeolocation($pincode);

        if(isset($data['error'])){
            echo json_encode([
                'status' => 'error',
                'message' => $data['error']
            ]);
        } else {
            echo json_encode([
                'status'   => 'success',
                'city' => $data['cityname'] ?? '',
                'state'    => $data['statename'] ?? ''
            ]);
        }
    }

	public function userApply()
	{
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'cibilscore' => $_REQUEST['cibilscore'],
			'loanpurpose' => $_REQUEST['loanpurpose'],
			'income' => $_REQUEST['monincome'],
			'currentemi' => $_REQUEST['monemi'],
			//'preferred_date_time' => date('Y-m-d H:i:s', strtotime($_REQUEST['preferred_datetime']))
		);
		$this->load->model('Site_Subscription_Model');
		$response = $this->Site_Subscription_Model->updateapplication($_REQUEST['applyid'], $data);
		$data1 = array(
			'update_date' => date('Y-m-d H:i:s'),
			'pincode' => $_REQUEST['pincode'],
			'city' => $_REQUEST['city'],
			'state' => $_REQUEST['state'],
			'process_step' => 2
		);
		$response1 = $this->Site_Subscription_Model->updateregistration($_REQUEST['userid'], $data1);
		$userdata = $this->Site_Subscription_Model->checkuserdata($_REQUEST['applyid']);
		$key = stringCrypt($_REQUEST['applyid'], 'encrypt');
		redirect("subscription/preapproval/" . $key);
	}
	public function getpreApproval()
	{
		$this->load->model('Site_Subscription_Model');
		$userdata = $this->Site_Subscription_Model->checkuserdata($_REQUEST['applyid']);
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'loantenure' => $_REQUEST['tenure']
		);
		$response = $this->Site_Subscription_Model->updateapplication($_REQUEST['applyid'], $data);
		$data1 = array(
			'update_date' => date('Y-m-d H:i:s'),
			'process_step' => 3
		);
		$response1 = $this->Site_Subscription_Model->updateregistration($userdata->userid, $data1);
		$apr = ($userdata->loantype == 22) ? 11.5 : 12.5;
		$eligibilityamt = calEligiblity($userdata->income, $userdata->currentemi, $apr, $userdata->loanamount);
		$offerresponse = $this->Site_Subscription_Model->sendOfferMessage($userdata->loantype, $eligibilityamt, $userdata->mobile, $userdata->email);
		$this->load->helper('interakt');
		$data1 = array(
			'phoneNumber' => $userdata->mobile,
			'countryCode' => '+91',
			'traits' => array(
				'name' => $userdata->fullname
			),
			'tags' => array('Get Offer')
		);
		$restrack1 = subscription_user_track($data1);
		$data2 = array(
			'phoneNumber' => $userdata->mobile,
			'countryCode' => '+91',
			'event' => 'Get Offer',
			'traits' => array(
					'EligibleAmount' => $eligibilityamt
			)
		);
		$restrack2 = subscription_event_track($data2);
		$data3 = array(
			'phoneNumber' => $userdata->mobile,
			'countryCode' => '+91',
			'traits' => array(
				'name' => $userdata->fullname
			),
			'tags' => array('Get Offer')
		);
		$restrack3 = subscription_user_track_new($data3);
		$data4 = array(
			'phoneNumber' => $userdata->mobile,
			'countryCode' => '+91',
			'event' => 'Get Offer',
			'traits' => array(
					'EligibleAmount' => $eligibilityamt
			)
		);
		$restrack4 = subscription_event_track_new($data4);
		$key = stringCrypt($_REQUEST['applyid'], 'encrypt');
		redirect("subscription/subscriptionorder/" . $key);
	}
	public function checkoutSubscription()
	{
		$this->load->model('Site_Subscription_Model');
		$this->load->model('Site_Info_Model');
		$userdata = $this->Site_Subscription_Model->checkuserdata($_REQUEST['applyid']);
		$this->session->set_tempdata('applyid', $_REQUEST['applyid']);
		$data3 = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'status' => 1,
			'isDelete' => 0
		);
		$response3 = $this->Site_Subscription_Model->updateapplication($_REQUEST['applyid'], $data3);
		$productdata = $this->Site_Info_Model->getproductdetails('bharatfincash-subscription');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);
		$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
		foreach ($uat_numbers as $uat_num) {
			if ($uat_num == $userdata->mobile) {
				$grandamount = 1;
			}
		}
		$orderId = "ZPLive" . number_format(microtime(true) * 1000, 0, '.', '');
		$productpage = $productdata->productname;
		$returnUrl = base_url('subscription/buycardSubscription');
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
			"buyerEmail" => $userdata->email,
			"buyerFirstName" => $userdata->fullname,
			"buyerPhoneNumber" => $userdata->mobile,
			"buyerCountry" => 'India',
			"productDescription" => $productdata->productname
		);
		ksort($postData);
		$checksumData = "";
		foreach ($postData as $key => $value) {
			$checksumData .= $key . '=' . $value . '&';
		}
		$checksum = hash_hmac('sha256', $checksumData, ZAAKPAY_SECRET_KEY);
		$zaakpaydata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => $userdata->cardtype,
			'userid' => $userdata->userid,
			'orderid' => $orderId,
			'orderamount' => $grandamount,
			'ordernote' => $productdata->productname
		);
		$this->load->model('Site_Subscription_Model');
		$response = $this->Site_Subscription_Model->zaakpayentry($zaakpaydata);
		$this->load->view('zaakpay-checkout', ['postData' => $postData, 'checksum' => $checksum, 'url' => $url]);
	}
	public function buycardSubscription()
	{
		$this->load->model('Site_Info_Model');
		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;
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
			$this->load->model('Site_Subscription_Model');
			$paymentdata = $this->Site_Subscription_Model->getzaakpayentry($orderId);
			$zaakpaydata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'orderamount' => $orderAmount,
				'statuscode' => $responseCode,
				'transactionid' => $txnId,
				'paymentmode' => $paymentMode
			);
			$response1 = $this->Site_Subscription_Model->updatezaakpayentry($paymentdata->id, $zaakpaydata);
			$userdata = $this->Site_Subscription_Model->checkuserregdata($paymentdata->userid);
			if ($responseCode == 100 || $responseCode == 208 || $responseCode == 601) {
				$this->load->model('Site_Subscription_Model');
				$this->session->set_tempdata('applyid', $userdata->id);
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
				$refcode = strtolower(substr(str_replace(" ", "", $userdata->fullname), 0, 3));
				$refcode .= substr($userdata->mobile, -4);
				$data2 = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'password' => $passwordkey,
					'refcode' => $refcode,
					'process_step' => 4,
					'isUser' => 2
				);
				$response2 = $this->Site_Subscription_Model->updateregistration($userdata->userid, $data2);
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
				if ($userdata->state == 'Gujarat') {
					$cgstamount = $netamount * 0.09;
					$sgstamount = $netamount * 0.09;
				} else {
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
				$responseinvoice = $this->Site_Subscription_Model->generateinvoice($data3, $invoiceno);
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
				$sent = $this->Site_Subscription_Model->sendSuccessGreetings($userdata->mobile, $userdata->email, $password);
				redirect("subscription/paymentResponse/" . $paymentdata->entryfor . "/" . $response2);
			} else {
				//$sent = $this->Site_Subscription_Model->sendPaymentFailedGreetings($userdata->mobile, $userdata->email);
				//redirect("subscription/paymentResponse/" . $paymentdata->entryfor . "/false");
				redirect("subscription/paymentResponse/" . $paymentdata->entryfor . "/false");
				die;
			}
		} else {
			redirect("subscription/paymentResponse/11/false");
		}
	}
	public function paymentResponse($loantype = '', $status = '')
	{
		$this->load->model('Site_Info_Model');
		$this->load->model('Site_Subscription_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('bharatfincash-subscription');
		$fbclidpl = "";
		$banklinks = array();
		$ms_hashed_data = [];
		$data = array(
			'loantype' => $loantype,
			'status' => $status
		);
		if ($status != '') {
			if ($status == "true" && $this->session->tempdata('applyid') != "") {
			    $applyid = $this->session->tempdata('applyid');
				$userdata = $this->Site_Subscription_Model->checkuserdata($applyid);
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
					'version' => 'v21.0',
					'type' => 'subscription',
					'fullname' => $firstname,
					'mobile' => '91' . $userdata->mobile,
					'email' => $userdata->email,
					'city' => $city,
					'state' => $state,
					'orderid' => $orderid,
					'sourceurl' => base_url('/subscription/paymentResponse/'.$loantype.'/true')
				);
				if (get_cookie('fbclidpl') != "") {
					$fbclidpl = "fb.0." . round(microtime(true) * 1000) . "." . get_cookie('fbclidpl');
				}
				$fbdata['fbclid'] = $fbclidpl;
				$fbresponse = fbconversioncurl($fbdata);
				$this->load->helper('interakt');
				$data1 = array(
					'phoneNumber' => $userdata->mobile,
					'countryCode' => '+91',
					'traits' => array(
						'name' => $userdata->fullname
					),
					'tags' => array('Payment Successful')
				);
				$restrack1 = subscription_user_track($data1);
				$data2 = array(
					'phoneNumber' => $userdata->mobile,
					'countryCode' => '+91',
					'event' => 'Payment Successful'
				);
				$restrack2 = subscription_event_track($data2); 
				$data_new_ut = array(
					'phoneNumber' => $userdata->mobile,
					'countryCode' => '+91',
					'traits' => array(
						'name' => $userdata->fullname
					),
					'tags' => array('Payment Successful')
				);
				$data_new_ut_res = subscription_user_track_new($data_new_ut);
				$data_new_et = array(
					'phoneNumber' => $userdata->mobile,
					'countryCode' => '+91',
					'event' => 'Payment Successful'
				);
				$data_new_et_res = subscription_event_track_new($data_new_et); 
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
				$this->load->model('Site_Info_Model');
				$banklinks = $this->Site_Info_Model->getdirectlinks($userdata->loantype);
				$this->load->view('subscription-payment-response', ['meta' => $meta, 'responsedata' => $data, 'banklinks' => $banklinks, 'ms_hashed_data' => $ms_hashed_data]);
			} else if ($status == "false") {
				$this->load->model('Site_Info_Model');
				//$wpcampaignname = $this->Site_Info_Model->getsmsmessage('wpcampaignsuccess');
				$applyid = $this->session->tempdata('applyid');
				$this->load->model('Site_Subscription_Model');
				$userdata = $this->Site_Subscription_Model->checkuserdata($applyid);
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
				$sent = $this->Site_Subscription_Model->sendPaymentFailedGreetings($userdata->mobile, $userdata->email);
				$this->load->view('subscription-payment-response', ['meta' => $meta, 'responsedata' => $data, 'banklinks' => $banklinks]);
			} else {
				$this->load->view('subscription-payment-response', ['meta' => $meta, 'responsedata' => $data]);
			}
		} else {
			redirect('subscription/bharatfincash');
		}
	}
}
?>