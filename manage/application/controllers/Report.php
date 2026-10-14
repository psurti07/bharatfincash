<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Report extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		if(! $this->session->userdata('adminid')) {
			redirect('login');
		}
	}

	public function index(){
		redirect('dashboard');
	}

	public function digitalcustomers(){
		$this->load->model('Manage_Report_Model');
		$datalist = $this->Manage_Report_Model->getdigitalcustomersReport();
		$this->load->view('report-digital-customers',['datalist'=>$datalist]);
	}

	public function subscriptioncustomers() {
		$this->load->model('Manage_Report_Model');
		$datalist = $this->Manage_Report_Model->getsubscriptioncustomersReport();
		$this->load->view('report-subscription-customers', ['datalist' => $datalist]);
	}

	public function offlineleads($loantype = ''){
		$this->load->model('Manage_Report_Model');
		$datalist = $this->Manage_Report_Model->getofflineleadReport($loantype);
		$this->load->view('report-offline-loan',['datalist'=>$datalist, 'loantype'=>$loantype]);
	}

	public function subscriptionleads($loantype = ''){
		$this->load->model('Manage_Report_Model');
		$datalist = $this->Manage_Report_Model->getsubscriptionleadReport($loantype);
		$this->load->view('report-subscription-loan',['datalist'=>$datalist, 'loantype'=>$loantype]);
	}

	public function digitalleads($loantype = ''){
		$this->load->model('Manage_Report_Model');
		$datalist = $this->Manage_Report_Model->getdigitalleadReport($loantype);
		$this->load->view('report-digital-loan',['datalist'=>$datalist, 'loantype'=>$loantype]);
	}

	public function gstdata(){
		$dt_to = date('Y-m-d', strtotime('-30 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Report_Model');
		$gstlist = $this->Manage_Report_Model->getgstrecords($dt_to, $dt_from);
		$this->load->view('report-gst-data',['gstlist'=>$gstlist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}
	
	public function processstep($step = ''){
		if($step != '') {
			$dt_to = date('Y-m-d', strtotime('-7 days'));
			$dt_from = date('Y-m-d');

			if(isset($_REQUEST['dt_to'])) {
				$dt_to = $_REQUEST['dt_to'];
			}

			if(isset($_REQUEST['dt_from'])) {
				$dt_from = $_REQUEST['dt_from'];
			}
			
			$this->load->model('Manage_Report_Model');
			$userlist = $this->Manage_Report_Model->getuserprocessstep($step, $dt_to, $dt_from);
			$this->load->view('report-processstep',['userlist'=>$userlist, 'step'=>$step, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
		}
		else {
			redirect('dashboard/processstatistics');
		}
	}

	public function processstepdigital($step = ''){
		if($step != '') {
			$dt_to = date('Y-m-d', strtotime('-2 days'));
			$dt_from = date('Y-m-d');

			if(isset($_REQUEST['dt_to'])) {
				$dt_to = $_REQUEST['dt_to'];
			}

			if(isset($_REQUEST['dt_from'])) {
				$dt_from = $_REQUEST['dt_from'];
			}
			
			$this->load->model('Manage_Report_Model');
			$userlist = $this->Manage_Report_Model->getuserprocessstep($step, $dt_to, $dt_from, 'digital');
			$this->load->view('report-processstep-digital',['userlist'=>$userlist, 'step'=>$step, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
		}
		else {
			redirect('dashboard/processstatisticsdigital');
		}
	}

	public function processstepsubscription($step = '') {
		if ($step != '') {
			$dt_to = date('Y-m-d', strtotime('-2 days'));
			$dt_from = date('Y-m-d');

			if (isset($_REQUEST['dt_to'])) {
				$dt_to = $_REQUEST['dt_to'];
			}

			if (isset($_REQUEST['dt_from'])) {
				$dt_from = $_REQUEST['dt_from'];
			}

			$this->load->model('Manage_Report_Model');
			$userlist = $this->Manage_Report_Model->getuserprocessstep($step, $dt_to, $dt_from, 'subscription');
			$this->load->view('report-processstep-subscription', ['userlist' => $userlist, 'step' => $step, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
		} else {
			redirect('dashboard/processstatisticssubscription');
		}
	}

	public function cashfreelog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getcashfreeentrylist($dt_to, $dt_from);
		$this->load->view('cashfree-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	
	public function openmoneylog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getopenmoneyentrylist($dt_to, $dt_from);
		$this->load->view('openmoney-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	

	public function paytmlog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getpaytmentrylist($dt_to, $dt_from);
		$this->load->view('paytm-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}
	public function worldlinelog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getworldlinelogentrylist($dt_to, $dt_from);
		$this->load->view('worldline-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}
	public function zaakpaylog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getzaakpaylogentrylist($dt_to, $dt_from);
		$this->load->view('zaakpay-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function easebuzzlog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->geteasebuzzlogentrylist($dt_to, $dt_from);
		$this->load->view('easebuzz-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}
	
	public function customersdaywise($month = '', $year = '')
	{
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];

		$this->load->model('Manage_Report_Model');
		$datewiselist = $this->Manage_Report_Model->getcustomersReportDaywise($month, $year);
		echo json_encode($datewiselist);
	}


	public function digitalleadsdaywise($loantype = '', $month = '', $year = '')
	{
		$loantype = $_REQUEST['loantype'];
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];

		$this->load->model('Manage_Report_Model');
		$datewiselist = $this->Manage_Report_Model->getdigitalleadReportDaywise($loantype, $month, $year);
		echo json_encode($datewiselist);
	}

	public function subscriptioncustomersdaywise($month = '', $year = '')
	{
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];

		$this->load->model('Manage_Report_Model');
		$datewiselist = $this->Manage_Report_Model->getsubscriptioncustomersReportDaywise($month, $year);
		echo json_encode($datewiselist);
	}

	public function subscriptionleadsdaywise($loantype = '', $month = '', $year = '')
	{
		$loantype = $_REQUEST['loantype'];
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];

		$this->load->model('Manage_Report_Model');
		$datewiselist = $this->Manage_Report_Model->getsubscriptionleadReportDaywise($loantype, $month, $year);
		echo json_encode($datewiselist);
	}

	public function phonepelog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getphonepeentrylist($dt_to, $dt_from);
		$this->load->view('phonepe-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function razorpaylog() {
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getrazorpayentrylist($dt_to, $dt_from);
		$this->load->view('razorpay-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function paygiclog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getpaygicentrylist($dt_to, $dt_from);
		$this->load->view('paygic-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function sabpaisalog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getsabpaisaentrylist($dt_to, $dt_from);
		$this->load->view('sabpaisa-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function jiolog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getjioentrylist($dt_to, $dt_from);
		$this->load->view('jio-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

}
