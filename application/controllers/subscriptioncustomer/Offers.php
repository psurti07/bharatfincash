<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Offers extends CI_Controller {
	
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

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');
		
		$profiledata = $this->Subscription_Customer_Profile_Model->getprofile($customerid);

		$this->load->view('subscriptioncustomer/offers', ['meta'=>$meta, 'profiledata'=>$profiledata]);
	}

	public function preapproved(){
		if($this->session->userdata('bfc-customerid') == FALSE) {
			return redirect('subscriptioncustomer/login');
			die;
		}

		$customerid = stringCrypt($this->session->userdata('bfc-customerid'), 'decrypt');
		$this->load->model('Subscription_Customer_Profile_Model');
		$isagree = $this->Subscription_Customer_Profile_Model->getlicensestatus($customerid);

		if($isagree == 0) {
			return redirect('subscriptioncustomer/license-agreement');
			die;
		}
		
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->model('Subscription_Customer_Profile_Model');
		$profiledata = $this->Subscription_Customer_Profile_Model->getprofile($customerid);

		$directlinks = $this->Site_Info_Model->getdirectlinks($profiledata->cardtype);

		$this->load->view('subscriptioncustomer/preapproved-offer', ['meta'=>$meta, 'directlinks'=>$directlinks]);
	}

	public function cardoffers(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');
		$this->load->view('subscriptioncustomer/card-offer', ['meta'=>$meta]);

	}
}
?>