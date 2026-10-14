<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Site extends MY_Controller
{

	function __construct() {
		parent::__construct();

		if (!$this->session->userdata('adminid')) {
			redirect('login');
		}
		$this->role = $this->session->userdata('admintype');
	}

	public function index() {
		redirect('dashboard');
	}

	public function newsletter() {
		$this->load->model('Manage_Site_Model');
		$subscribelist = $this->Manage_Site_Model->getnewsletterlist();
		$this->load->view('newsletter-subsciptions', ['subscribelist' => $subscribelist]);
	}

	public function substatus($statusid, $id) {
		$this->load->model('Manage_Site_Model');
		$this->Manage_Site_Model->changesubscription($statusid, $id);
		redirect('site/newsletter');
	}

	public function subscribedelete($id) {
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->deletesubscription($id);
		redirect('site/newsletter');
	}

	public function smsmessages() {
		$this->load->model('Manage_Site_Model');
		$smslist = $this->Manage_Site_Model->getsmsmessages();
		$this->load->view('sms-messages', ['smslist' => $smslist]);
	}

	public function editSMSForm($id) {
		$this->load->model('Manage_Site_Model');
		$smsdetails = $this->Manage_Site_Model->getsmsdetails($id);
		$this->load->view('sms-messages-edit', ['smsdetails' => $smsdetails]);
	}

	public function editSMSmessage() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['message']
		);

		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->editsms($_REQUEST['id'], $data);

		redirect('site/smsmessages');
	}

	public function sitesettings() {
		$this->load->model('Manage_Site_Model');
		$sitedetails = $this->Manage_Site_Model->getsitesettings();
		$this->load->view('site-settings', ['sitedetails' => $sitedetails]);
	}

	public function editPage($pagename) {
		$this->load->model('Manage_Site_Model');
		$pagedetails = $this->Manage_Site_Model->getpagedetails($pagename);
		$this->load->view('page-edit', ['pagedetails' => $pagedetails]);
	}

	public function updatePage() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['content']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->editpage($_REQUEST['id'], $data);

		redirect('site/editPage/' . $_REQUEST['page']);
	}

	public function modelstatus($value) {
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatemodelstatus($value);

		redirect('site/sitesettings');
	}

	public function updatefbdomain() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['domainid']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'facebookdomain');

		redirect('site/sitesettings');
	}

	public function updatefbpixel() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['pixelid']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'facebookpixel');

		redirect('site/sitesettings');
	}
	public function updatefbaccesstoken() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['fbaccesstoken'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbaccesstoken');

		redirect('site/sitesettings');
	}
	public function updatefbeventname() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['fbeventname'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbeventname');

		redirect('site/sitesettings');
	}
	public function updatefbeventid() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['fbeventid'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbeventid');

		redirect('site/sitesettings');
	}

	public function updatewpcampmain() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['wpcampaignmain']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'wpcampaignmain');

		redirect('site/sitesettings');
	}

	public function updatewpcampmainoffer() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['wpcampaignoffer']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'wpcampaignoffer');

		redirect('site/sitesettings');
	}

	public function updatewpcampmainsuccess() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['wpcampaignsuccess']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'wpcampaignsuccess');

		redirect('site/sitesettings');
	}

	public function update_aisency_usrpass() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['aisency_user_password']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'aisency_userwelcomename');
		
		redirect('site/sitesettings');
	}

	public function updatewpcampsubscription() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['wpcampaignsubscription']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'wpcampaignsubscription');

		redirect('site/sitesettings');
	}

	public function updatewpcampmainoffersubscription() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['wpcampaignoffersubscription']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'wpcampaignoffersubscription');

		redirect('site/sitesettings');
	}

	public function updatewpcampmainsuccesssubscription() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['wpcampaignsuccesssubscription']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'wpcampaignsuccesssubscription');

		redirect('site/sitesettings');
	}


	public function updatesmssenderid() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['smssenderid']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesmssenderdata($data, 'smssenderid');

		redirect('site/sitesettings');
	}
	
	public function updatesmssenderidsubscription() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['smssenderidsubscription']
		);

		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesmssenderdata($data, 'smssenderid-subscription');

		redirect('site/sitesettings');
	}
	public function updatefbpixelsubscription() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['fbpixelvaluesubscription']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'facebookpixelsubscription');

		redirect('site/sitesettings');
	}

	public function updatefbaccesstokensubscription() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['fbaccesstokensubscription'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbaccesstokensubscription');

		redirect('site/sitesettings');
	}
	public function updatefbeventnamesubscription() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['fbeventnamesubscription'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbeventnamesubscription');

		redirect('site/sitesettings');
	}
	public function updatefbeventidsubscription() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['fbeventidsubscription'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbeventidsubscription');

		redirect('site/sitesettings');
	}

	public function sentotps() {
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Site_Model');
		$otplist = $this->Manage_Site_Model->getsentotplist($dt_to, $dt_from);
		$this->load->view('sent-otps', ['otplist' => $otplist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function bulksms() {
		$this->load->model('Manage_Site_Model');
		$bulklist = $this->Manage_Site_Model->getbulksmslist();
		$this->load->view('bulksms-list', ['bulklist' => $bulklist]);
	}

	public function deletemsgno($id) {
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->deletemsgnumber($id);
		redirect('site/bulksms');
	}

	public function uploadbulkfile() {
		$this->load->library('csvimport');
		$this->load->model('Manage_Site_Model');

		$file_data = $this->csvimport->parse_file($_FILES["smsfile"]["tmp_name"]);
		$cnt = 0;

		foreach ($file_data as $row) {
			if ($row["mobile"] != '') {
				$chkentry = $this->Manage_Site_Model->checkdataentry($row["mobile"]);

				if ($chkentry < 1) {
					$data = array(
					 'rec_date' => date('Y-m-d H:i:s'),
					 'fullname' => $row["fullname"],
						'mobileno' => $row["mobile"],
						'emailid' => $row["email"]
					);

					$response = $this->Manage_Site_Model->uploadbulkfile($data);
					$cnt = $cnt + 1;
				}
			}
		}

		echo json_encode(array("success" => true, "message" => $cnt . " - numbers successfully imported."));
		die;
	}

	public function search() {
		$module = $mobile = "";
		$datalist = $response = array();

		$this->load->model('Manage_Site_Model');

		if (isset($_REQUEST['module']) && isset($_REQUEST['mobile'])) {
			$module = $_REQUEST['module'];
			$mobile = $_REQUEST['mobile'];

			switch ($module) {
				case 'customerdigital':
					$response = $this->Manage_Site_Model->searchcustomerdigital($mobile);
					if(!empty($response)) {
						$datalist = array(
							'id' => $response->id,
							'mobile' => $response->mobile,
							'rec_date' => $response->rec_date,
							'fullname' => $response->fullname,
						    'emailid' => $response->email,
						    'isuser' => $response->isUser
						);
					}
					break;

				case 'customerplan':
					$response = $this->Manage_Site_Model->searchcustomerplan($mobile);
					if(!empty($response)) {
						$datalist = array(
							'id' => $response->id,
							'mobile' => $response->mobile,
							'rec_date' => $response->rec_date,
							'fullname' => $response->fullname,
						    'emailid' => $response->email,
						    'isuser' => $response->isUser
						);
					}
					break;


				case 'career':
					$response = $this->Manage_Site_Model->searchcareer($mobile);
					if (!empty($response)) {
						$datalist = array(
						 'id' => $response->id,
						 'mobile' => $response->mobile,
						 'rec_date' => $response->rec_date,
						 'fullname' => $response->firstname . " " . $response->lastname,
							'emailid' => $response->email
						);
					}
					break;

				case 'bulksms':
					$response = $this->Manage_Site_Model->searchbulksms($mobile);
					if (!empty($response)) {
						$datalist = array(
						 'id' => $response->id,
						 'mobile' => $response->mobileno,
						 'rec_date' => $response->rec_date,
						 'fullname' => $response->fullname,
							'emailid' => $response->emailid
						);
					}
					break;

				default:
					# code...
					break;
			}
		}

		$this->load->view('search', ['module' => $module, 'mobile' => $mobile, 'datalist' => $datalist]);
	}

	public function impupdate() {
		$this->load->model('Manage_Site_Model');
		$datalist = $this->Manage_Site_Model->getimpupdatelist();
		$this->load->view('imp-update', ['datalist' => $datalist]);
	}

	public function addNoteForm() {
		$this->load->view('imp-update-add');
	}

	public function addNoteData() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'tags' => $_REQUEST['tags'],
		 'descriptions' => $_REQUEST['descriptions'],
		 'isActive' => 1,
		 'isDelete' => 0
		);

		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->addimpupdate($data);

		redirect('site/impupdate');
	}

	public function impupdatestatus($statusid, $id) {
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->impupdatestatus($statusid, $id);
		redirect('site/impupdate');
	}

	public function deleteimpupdate($id) {
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->deleteimpupdate($id);
		redirect('site/impupdate');
	}

	public function accountmsg() {
		$this->load->model('Manage_Site_Model');
		$datalist = $this->Manage_Site_Model->getaccountmsg();
		$this->load->view('account-message', ['datalist' => $datalist]);
	}

	public function updateaccountmsg() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => trim($_REQUEST['content'])
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->editaccountmsg($_REQUEST['id'], $data);

		redirect('site/accountmsg');
	}

	public function remarketinglog() {
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');
		$parentid = 1;

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		if(isset($_REQUEST['parentid'])) {
			$parentid = $_REQUEST['parentid'];
		}

		$this->load->model('Manage_Site_Model');
		$smsloglist = $this->Manage_Site_Model->getremarketingloglist($dt_to, $dt_from, $parentid);
		$this->load->view('remarketing-log', ['smsloglist' => $smsloglist, 'dt_to' => $dt_to, 'dt_from' => $dt_from, 'parentid' => $parentid]);
	}
	public function logdetails($id) {
		$this->load->model('Manage_Site_Model');
		$logdetails = $this->Manage_Site_Model->getsmslogdetails($id);
		$this->load->view('remarketingsmslog-details', ['logdetails' => $logdetails]);

	}

	/*public function datasolvefunction(){
		   $this->load->model('Manage_Site_Model');
		   $response = $this->Manage_Site_Model->datasolvefunction();
	   }*/
	/* public function sendTestsms($mobile = '', $sms_type = '', $sms_id = '') {
		$smsresponse = $smsdetails = $smsmessage = $dataset = '';
		$sms_id = $_REQUEST['smsid'];
		$sms_type = $_REQUEST['smstype'];
		$mobile = $_REQUEST['mobile'];

		$this->load->model('Manage_Site_Model');
		$smsdetails = $this->Manage_Site_Model->getsmsdetails($sms_id);
		$smsmessage = $smsdetails->option_value;

		if ($smsmessage != '' && $mobile != '') {
			if ($sms_type == 1) {
				$eligibilityamt = "500000";
				$smsmessage = str_replace("<#cronamount>", $eligibilityamt, $smsmessage);
				$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>" . $mobile . "</mobiles><message>" . $smsmessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID . "</senderid></sms>";
				$smsresponse = sendxmlSMSobb($dataset);

			} else if ($sms_type == 2) {
				$eligibilityamt = "500000";
				$smsmessage = str_replace("<#preamount>",$eligibilityamt,$smsmessage);
				$smsresponse = senddynamicSMSobb($mobile, $smsmessage);
			}
			echo json_encode(array("success" => true, "message" => $smsresponse));
			die;

		} else {
			echo json_encode(array("success" => false, "message" => "SMS Type and Mobile number is mendatory."));
			die;
		}

		echo json_encode(array("success" => false, "message" => "Oops! Something Went wrong."));
		die;

	} */

	public function sendTestsms(){
		$smsmessage = $dataset = $smsresponse = "";

		$this->load->model('Manage_Site_Model');
		$smsdetails = $this->Manage_Site_Model->getsmsdetails($_REQUEST['smsid']);
		$smsmessage = $smsdetails->option_value;

		if ($_REQUEST['smsaccount'] == 2) {
			$smssendid = getSMSsenderid('smssenderid-subscription');
			$panel = 'subscription';
			$username = SMS_BFC_OBB_USERNAME;
			$apikey = SMS_BFC_OBB_PASSWORD;
		} else {
			$smssendid = getSMSsenderid('smssenderid');
			$panel = 'main';
			$username = SMS_OBB_USERNAME;
			$apikey = SMS_OBB_PASSWORD;
		}

		if($_REQUEST['mobile'] != '' && $smsmessage != "") {
			if($_REQUEST['smstype'] == 1) {
			    $eligibilityamt = "500000";
				$smsmessage = str_replace("<#cronamount>",$eligibilityamt,$smsmessage);
				
				$dataset = "<sms><user>".$username."</user><password>".$apikey."</password><mobiles>".$_REQUEST['mobile']."</mobiles><message>".$smsmessage."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";
				$smsresponse = sendxmlSMSobb($dataset);
			}
			else if($_REQUEST['smstype'] == 2) {
			    $eligibilityamt = "500000";
				$smsmessage = str_replace("<#preamount>",$eligibilityamt,$smsmessage);

				$smsresponse = senddynamicSMSobb($_REQUEST['mobile'], $smsmessage, $panel);
			}
			
			echo json_encode(array("success"=>true, "message"=>$smsresponse));
			die;
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"Mobile number and SMS is mendatory."));
			die;
		}
		
		echo json_encode(array("success"=>false, "message"=>"Ops! Something goes wrong."));
		die;
	}
	
	public function stafflist() {
		if ($this->role == 1) {
		    echo "<script>window.history.back();</script>";
		    exit;
		}	
		$this->load->model('Manage_Site_Model');
		$datalist = $this->Manage_Site_Model->getstaffmemberlist();
		$this->load->view('staff-members', ['datalist' => $datalist]);
	}

	public function staffaddForm() {
		if ($this->role == 1) {
		    echo "<script>window.history.back();</script>";
		    exit;
		}	
		$this->load->view('staff-members-add');
	}

	public function addStaffmember() {
		if ($this->role == 1) {
		    echo "<script>window.history.back();</script>";
		    exit;
		}	
		if ($_REQUEST['newpassword'] == $_REQUEST['retypepassword']) {
			$enc_password = encryptPassword($_REQUEST['emailid'], $_REQUEST['newpassword']);

			$data = array(
			 'rec_date' => date('Y-m-d H:i:s'),
			 'fullname' => $_REQUEST['fullname'],
			 'mobile' => $_REQUEST['mobile'],
			 'emailid' => $_REQUEST['emailid'],
			 'password' => $enc_password,
			 'role' => $_REQUEST['staffrole'],
			 'isActive' => 1,
			 'isDelete' => 0
			);

			$this->load->model('Manage_Site_Model');
			$response = $this->Manage_Site_Model->addstaffmember($data);

			echo json_encode(array("success" => true, "message" => "Staff account successfully created."));
		} else {
			echo json_encode(array("success" => false, "message" => "Both passwords are not equal."));
		}
	}

	public function deletestaff($id) {
		if ($this->role == 1) {
		    echo "<script>window.history.back();</script>";
		    exit;
		}	
		$this->load->model('Manage_Site_Model');
		$this->Manage_Site_Model->deletestaffaccount($id);
		redirect('site/stafflist');
	}

	public function test(){
		$fullname = 'Parth';
		$mobile = '9904466599';
		$email = 'psurti07@gmail.com';
		$password = '112233';

		$this->load->model('Manage_General_Model');
		$content = $this->Manage_General_Model->welcomeemailtemplate($mobile, $password);
		// $content = $this->Manage_General_Model->simpleemailtemplate($mobile, $password);
		
		echo $content;die;
	} 

	 public function fileremarks(){
		$this->load->model('Manage_Site_Model');
		$datalist = $this->Manage_Site_Model->getfileremarkslist();
		$this->load->view('file-remarks',['datalist'=>$datalist]);
	}

	public function addRemarkForm(){
		$this->load->model('Manage_Site_Model');
		$statuslist = $this->Manage_Site_Model->getstatuslist();
		$this->load->view('file-remarks-add',['statuslist'=>$statuslist]);
	}

	public function addFileRemark(){
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'title' => $_REQUEST['title'],
			'remarks' => $_REQUEST['remarks'],
			'statusid' => $_REQUEST['statusid'],
			'isDelete' => 0
		);

		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->addfileremark($data);

		redirect('site/fileremarks');
	}

	public function editRemarkForm($id){
		$this->load->model('Manage_Site_Model');
		$remarkdetails = $this->Manage_Site_Model->getremarkdetails($id);
		$statuslist = $this->Manage_Site_Model->getstatuslist();
		$this->load->view('file-remarks-edit',['remarkdetails'=>$remarkdetails, 'statuslist'=>$statuslist]);
	}

	public function editFileRemark(){
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'title' => $_REQUEST['title'],
			'remarks' => $_REQUEST['remarks'],
			'statusid' => $_REQUEST['statusid']
		);
		
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->editfileremark($_REQUEST['id'], $data);

		redirect('site/fileremarks');
	}

	public function deletefileremark($id) {
		$this->load->model('Manage_Site_Model');
		$this->Manage_Site_Model->deleteremark($id);
		redirect('site/fileremarks');
	}

	public function restorefileremark($id) {
		$this->load->model('Manage_Site_Model');
		$this->Manage_Site_Model->restoreremark($id);
		redirect('site/fileremarks');
	}
}
