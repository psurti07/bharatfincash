<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Loan extends CI_Controller {

	function __construct(){
		parent::__construct();

		if(! $this->session->userdata('bfc-customerid')) {
			return redirect('subscriptioncustomer/login');
		}
	}
	public function index() {	
		if($this->session->userdata('bfc-customerid')) {
			return redirect()->to('subscriptioncustomer/dashboard');
		}

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('subscriptioncustomer/login', ['meta'=>$meta]);
	}

	public function history(){
		$id = stringCrypt($this->session->userdata('bfc-customerid'), 'decrypt');

		$this->load->model('Subscription_Customer_Profile_Model');
		$isagree = $this->Subscription_Customer_Profile_Model->getlicensestatus($id);

		if($isagree == 0) {
			return redirect('subscriptioncustomer/license-agreement');
			die;
		}

		$this->load->model('Subscription_Customer_Loan_Model');
		$loanhistory = $this->Subscription_Customer_Loan_Model->getloanhistory($id);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('subscriptioncustomer/loan-history',['meta'=>$meta, 'loanhistory'=>$loanhistory]);
	}

	public function appdetails($id){
		$id=stringCrypt($id, 'decrypt');
		$this->load->model('Subscription_Customer_Loan_Model');
		$appdetails = $this->Subscription_Customer_Loan_Model->getapplicationdetails($id);
		$statuslist = $this->Subscription_Customer_Loan_Model->getappstatuslist($id);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');
		
		$this->load->view('subscriptioncustomer/loan-details',['meta'=>$meta, 'appdetails'=>$appdetails, 'statuslist'=>$statuslist]);
	}

	public function downloadfile($sanctionletter, $id) {
		$this->load->model('Site_General_Model');
		$sanction_letter = $this->Site_General_Model->filedownload('images/sanctionletter', $sanctionletter);

		redirect('subscriptioncustomer/loan/appdetails/'.$id);
	}

}
?>