<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Referral extends CI_Controller {

	function __construct(){
		parent::__construct();

		if(! $this->session->userdata('bfc-customerid')) {
			return redirect()->to('subscriptioncustomer/login');
		}
	}

	public function index() {	
		$id = stringCrypt($this->session->userdata('bfc-customerid'), 'decrypt');

		$this->load->model('Subscription_Customer_Profile_Model');
		$isagree = $this->Subscription_Customer_Profile_Model->getlicensestatus($id);

		if($isagree == 0) {
			return redirect('subscriptioncustomer/license-agreement');
			die;
		}

		$this->load->model('Subscription_Customer_Referral_Model');
		$refuserlist = $this->Subscription_Customer_Referral_Model->getreferrallist($id);
		
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');
		
		$this->load->view('subscriptioncustomer/referral-list',['meta'=>$meta, 'refuserlist'=>$refuserlist]);
	}

	public function history(){
		$id = stringCrypt($this->session->userdata('bfc-customerid'), 'decrypt');

		$this->load->model('Subscription_Customer_Profile_Model');
		$isagree = $this->Subscription_Customer_Profile_Model->getlicensestatus($id);

		if($isagree == 0) {
			return redirect('subscriptioncustomer/license-agreement');
			die;
		}

		$this->load->model('Subscription_Customer_Referral_Model');
		$loanhistory = $this->Subscription_Customer_Referral_Model->getreferralloanhistory($id);
		
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('subscriptioncustomer/referral-loan-history',['meta'=>$meta, 'loanhistory'=>$loanhistory]);
	}
}
?>