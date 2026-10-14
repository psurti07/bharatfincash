<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Profile extends CI_Controller {
	
	function __construct(){
		parent::__construct();

		if(! $this->session->userdata('bfc-customerid')) {
			return redirect()->to('subscriptioncustomer/login');
		}
	}

	public function index(){
		$customerid = stringCrypt($this->session->userdata('bfc-customerid'), 'decrypt');

		$this->load->model('Subscription_Customer_Profile_Model');
		$isagree = $this->Subscription_Customer_Profile_Model->getlicensestatus($customerid);

		if($isagree == 0) {
			return redirect('subscriptioncustomer/license-agreement');
			die;
		}

		$profiledata = $this->Subscription_Customer_Profile_Model->getprofile($customerid);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('subscriptioncustomer/profile',['meta'=>$meta, 'profiledata'=>$profiledata]);
	}

	public function mcard(){
		$customerid = stringCrypt($this->session->userdata('bfc-customerid'), 'decrypt');
		$this->load->model('Subscription_Customer_Profile_Model');
		$isagree = $this->Subscription_Customer_Profile_Model->getlicensestatus($customerid);

		if($isagree == 0) {
			return redirect('subscriptioncustomer/license-agreement');
			die;
		}

		$carddata = $this->Subscription_Customer_Profile_Model->getsubscriptioncode($customerid);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');
		
		$this->load->view('subscriptioncustomer/membershipcard',['meta'=>$meta, 'carddata'=>$carddata]);
	}

	public function documents(){
		$customerid = stringCrypt($this->session->userdata('bfc-customerid'), 'decrypt');

		$this->load->model('Subscription_Customer_Profile_Model');
		$isagree = $this->Subscription_Customer_Profile_Model->getlicensestatus($customerid);

		if($isagree == 0) {
			return redirect('subscriptioncustomer/license-agreement');
			die;
		}

		$profiledata = $this->Subscription_Customer_Profile_Model->getprofile($customerid);

		$docflags = $this->Subscription_Customer_Profile_Model->getdocumentflag($customerid);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('subscriptioncustomer/kyc-documents',['meta'=>$meta, 'profiledata'=>$profiledata, 'docflags'=>$docflags]);
	}

	public function invoice($id){
		$id = stringCrypt($id, 'decrypt');
		$this->load->model('Subscription_Customer_Profile_Model');
		$invdetails = $this->Subscription_Customer_Profile_Model->getinvoicedetails($id);
		$invoiceno = 'INV-'.$invdetails['orderinfo']->id;

		$this->load->library('pdf');
        $html = $this->load->view('subscriptioncustomer/invoice', ['invdetails'=>$invdetails], true);

        $this->pdf->createPDF($html, $invoiceno, false);

		//redirect('subscriptioncustomer/mcard');
	}

	public function changeprofile(){
		$customerid = stringCrypt($this->session->userdata('bfc-customerid'), 'decrypt');
		
		$data = array(
			'fullname' => $_REQUEST['fullname'],
			'email' => $_REQUEST['emailid'],
			'pincode' => $_REQUEST['pincode'],
			'city' => $_REQUEST['city'],
			'state' => $_REQUEST['state']
		);

		$this->load->model('Subscription_Customer_Profile_Model');
		$response = $this->Subscription_Customer_Profile_Model->updateprofile($data, $customerid);

		if($response == true) {
			echo json_encode(array("success"=>true, "message"=>"Profile successfully updated."));
		} 
		else {
			echo json_encode(array("success"=>false, "message"=>"Ops. Something goes wrong."));
		}
	}

	public function changepassword(){
		$customerid = stringCrypt($this->session->userdata('bfc-customerid'), 'decrypt');
		$password = $_REQUEST['password'];
		$retypepassword = $_REQUEST['retypepassword'];

		if($password === $retypepassword) {
			$this->load->model('Subscription_Customer_Profile_Model');
			$enc_password = stringCrypt($password, 'encrypt');

			$response = $this->Subscription_Customer_Profile_Model->changepassword($enc_password, $customerid);

			if($response == true) {
				echo json_encode(array("success"=>true, "message"=>"Password successfully changed."));
			} 
			else {
				echo json_encode(array("success"=>false, "message"=>"Ops. Something goes wrong."));
			}
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"Both password doesn't match."));
		}
	}

	public function uploaddocument(){
		if($_REQUEST['doc'] != '') {
			$doctype = $_REQUEST['doc'];
			$customerid = stringCrypt($_REQUEST['customerid'], 'decrypt');

			$this->load->model('Subscription_Customer_Profile_Model');
			$isdata = $this->Subscription_Customer_Profile_Model->checkdocuments($customerid);
			
			if($_FILES['userfile']['name'] != '') {
				$this->load->model('Site_General_Model');
				$kycdoc = $this->Site_General_Model->single_file_upload('userfile', 'kycdocuments', 'jpg|jpeg|png|doc|docx|pdf', 0);

				if($kycdoc != false) {
					if($isdata == 0) {
						$data = array(
							'rec_date' => date('Y-m-d H:i:s'),
							'userid' => $customerid,
							$doctype => $kycdoc
						);

						if(isset($_REQUEST['userfile_number'])) {
							$data[$doctype.'_number'] = $_REQUEST['userfile_number'];
						}

						$doc_response = $this->Subscription_Customer_Profile_Model->createdocaccount($data);
					}
					else {
						$data = array(
							'rec_date' => date('Y-m-d H:i:s'),
							$doctype => $kycdoc
						);

						if(isset($_REQUEST['userfile_number'])) {
							$data[$doctype.'_number'] = $_REQUEST['userfile_number'];
						}

						$doc_response = $this->Subscription_Customer_Profile_Model->updatedocaccount($customerid, $data);
					}
				}
			}
		}

		return redirect('subscriptioncustomer/profile/documents');
		die;
	}

	public function documentmsg(){
		$customerid = stringCrypt($_REQUEST['customerid'], 'decrypt');
		$data = array(
			'remarks' => $_REQUEST['remarks'],
		);
		
		$this->load->model('Subscription_Customer_Profile_Model');
		$response = $this->Subscription_Customer_Profile_Model->documentremarks($customerid, $data);

		return redirect('subscriptioncustomer/profile/documents');
		die;
	}
	
}
?>