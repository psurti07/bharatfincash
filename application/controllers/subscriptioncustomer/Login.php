<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login extends CI_Controller {

	public function index() {	
		if($this->session->userdata('bfc-customerid')) {
			return redirect('subscriptioncustomer/dashboard');
		}

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('subscriptioncustomer/login', ['meta'=>$meta]);
	}

	//function for check admin login
	public function validateLogin() {		
		$mobile = $_REQUEST['mobile'];
		$password = stringCrypt($_REQUEST['password'], 'encrypt');
		
		$this->load->model('Subscription_Customer_Login_Model');
		$validate = $this->Subscription_Customer_Login_Model->checklogin($mobile, $password);

		if($validate) {
			$logged = $this->Subscription_Customer_Login_Model->loginlog($validate->id);
			$enc_id = stringCrypt($validate->id, 'encrypt');
			$this->session->set_userdata('bfc-customerid',$enc_id);
			$this->session->set_userdata('bfc-customername',$validate->fullname);
			$this->session->set_userdata('bfc-customermobile',$validate->mobile);

			echo json_encode(array("success"=>true, "message"=>"Login successful."));
		} 
		else {
			echo json_encode(array("success"=>false, "message"=>"Invalid mobile no or password."));
		}
	}

	public function forgotpassword() {	
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');
		
		$this->load->view('subscriptioncustomer/forget-password', ['meta'=>$meta]);
	}

	public function sendForgetmessage() {	
		$mobile = $_REQUEST['mobile'];

		$this->load->model('Subscription_Customer_Login_Model');
		$response = $this->Subscription_Customer_Login_Model->passwordForgetmsg($mobile);

		if($response) {
			echo json_encode(array("success"=>true, "message"=>"Password sent to registred mobile no."));
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"No customer account found."));
		}
	}

	public function logout() {		
		$customerlogid = $this->session->userdata('bfc-customerlogid');
		$this->load->model('Subscription_Customer_Login_Model');
		$response = $this->Subscription_Customer_Login_Model->updatecustomerlog($customerlogid);

		$this->session->unset_userdata('bfc-customerid');
        $this->session->unset_userdata('bfc-customername');
        $this->session->unset_userdata('bfc-customermobile');
		$this->session->sess_destroy();
		return redirect('subscriptioncustomer/login');
	}

}
?>