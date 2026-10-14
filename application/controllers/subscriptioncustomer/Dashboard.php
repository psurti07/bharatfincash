<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Dashboard extends CI_Controller {
	
	function __construct(){
		parent::__construct();

		if(! $this->session->userdata('bfc-customerid')) {
			return redirect('subscriptioncustomer/login');
		}
	}

	public function index(){
		$id = stringCrypt($this->session->userdata('bfc-customerid'), 'decrypt');

		$this->load->model('Subscription_Customer_Profile_Model');
		$isagree = $this->Subscription_Customer_Profile_Model->getlicensestatus($id);

		if($isagree == 0) {
			return redirect('subscriptioncustomer/license-agreement');
			die;
		}

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');
		
		$id = stringCrypt($this->session->userdata('bfc-customerid'), 'decrypt');
		$this->load->model('Subscription_Customer_Profile_Model');
		$statestics = $this->Subscription_Customer_Profile_Model->getallstatestics($id);
		$profiledata = $this->Subscription_Customer_Profile_Model->getprofile($id);
		$accountmsg = $this->Subscription_Customer_Profile_Model->getaccountmsg();
		$kycstatus = $this->Subscription_Customer_Profile_Model->getkycstatus($id);
		
		$this->load->view('subscriptioncustomer/dashboard', ['meta'=>$meta, 'statestics'=>$statestics, 'profiledata'=>$profiledata, 'accountmsg'=>$accountmsg, 'kycstatus' => $kycstatus]);
	}

	public function license_agreement(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');
		$contentdetails = $this->Site_Info_Model->getpagedetails('customer-legal-agreement');

		$id = stringCrypt($this->session->userdata('bfc-customerid'), 'decrypt');
		$this->load->model('Subscription_Customer_Profile_Model');
		$profiledata = $this->Subscription_Customer_Profile_Model->getprofile($id);

		$this->load->view('subscriptioncustomer/license-agreement', ['meta'=>$meta, 'contentdetails'=>$contentdetails, 'profiledata'=>$profiledata]);
	}

	public function acceptlicence(){
		$customerid = stringCrypt($this->session->userdata('bfc-customerid'), 'decrypt');
		
		if(($customerid == stringCrypt($_REQUEST['customerid'], 'decrypt')) && ($_REQUEST['agree'] == 1)) {
			$data = array(
				'iAgree' => $_REQUEST['agree']
			);

			$this->load->model('Subscription_Customer_Profile_Model');
			$response = $this->Subscription_Customer_Profile_Model->updateprofile($data, stringCrypt($_REQUEST['customerid'], 'decrypt'));
		}

		return redirect('subscriptioncustomer/dashboard');
		die;
	}

}
?>