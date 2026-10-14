<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Sms extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		if($this->session->userdata('adminid') == FALSE) {
			redirect('login');
		}
	}

	public function index(){
		redirect('dashboard');
	}

	public function smstemplates(){
		$this->load->model('Manage_Sms_Model');
		$smslist = $this->Manage_Sms_Model->getsmstemplates();
		$this->load->view('sms-templates',['smslist'=>$smslist]);
	}

	public function dndlistdigital() {
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Sms_Model');
		$userlist = $this->Manage_Sms_Model->getdnduserlistdigital($dt_to, $dt_from);
		$this->load->view('dnduser-list-digital', ['userlist' => $userlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function deletedndnodigital($id) {
		$this->load->model('Manage_Sms_Model');
		$response = $this->Manage_Sms_Model->deletedndnumberdigital($id);
		redirect('sms/dndlistdigital');
	}

	public function uploaddndfiledigital() {
		$this->load->library('csvimport');

		$file_data = $this->csvimport->parse_file($_FILES["smsfile"]["tmp_name"]);
		$cnt = 0;
		$wheredata = "";

		foreach ($file_data as $row) {
			if ($row["mobile"] != '') {
				if ($cnt != 0) {
					$wheredata .= " OR ";
				}
				$wheredata .= " mobile = " . $row["mobile"];
				$cnt = $cnt + 1;
			}
		}

		$this->load->model('Manage_Sms_Model');
		$response = $this->Manage_Sms_Model->uploaddndfiledigital($wheredata);

		if ($response == true) {
			echo json_encode(array("success" => true, "message" => $cnt . " - numbers added to DND list."));
			die;
		} else {
			echo json_encode(array("success" => false, "message" => "Ops! Something goes wrong."));
			die;
		}
	}

	public function dndlistsubscription() {
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Sms_Model');
		$userlist = $this->Manage_Sms_Model->getdnduserlistsubscription($dt_to, $dt_from);
		$this->load->view('dnduser-list-subscription', ['userlist' => $userlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function deletedndnosubscription($id) {
		$this->load->model('Manage_Sms_Model');
		$response = $this->Manage_Sms_Model->deletedndnumbersubscription($id);
		redirect('sms/dndlistsubscription');
	}

	public function uploaddndfilesubscription() {
		$this->load->library('csvimport');

		$file_data = $this->csvimport->parse_file($_FILES["smsfile"]["tmp_name"]);
		$cnt = 0;
		$wheredata = "";

		foreach ($file_data as $row) {
			if ($row["mobile"] != '') {
				if ($cnt != 0) {
					$wheredata .= " OR ";
				}
				$wheredata .= " mobile = " . $row["mobile"];
				$cnt = $cnt + 1;
			}
		}

		$this->load->model('Manage_Sms_Model');
		$response = $this->Manage_Sms_Model->uploaddndfilesubscription($wheredata);

		if ($response == true) {
			echo json_encode(array("success" => true, "message" => $cnt . " - numbers added to DND list."));
			die;
		} else {
			echo json_encode(array("success" => false, "message" => "Ops! Something goes wrong."));
			die;
		}
	}

	public function customsms(){
		$this->load->view('custom-sms');
	}

	public function sendcustomsms(){
		$dataset = $smsmessage = '';

		if(isset($_REQUEST['targetcustomers']) && isset($_REQUEST['message'])) {
			$this->load->model('Manage_Sms_Model');
			$response = $this->Manage_Sms_Model->sendcustomsms($_REQUEST['targetcustomers'], $_REQUEST['message']);

			echo json_encode(array("success"=>true, "message"=>"SMS successfully send.", "customresponse"=>$response));
		    die;
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"Ops! Something goes wrong.", "customresponse"=>""));
		    die;
		}
	}

}
?>
