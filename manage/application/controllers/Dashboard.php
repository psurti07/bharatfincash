<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Dashboard extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		if(! $this->session->userdata('adminid')) {
			redirect('login');
		}
	}

	public function index(){
		$this->load->model('Manage_Report_Model');
		
		$digitalcustlist = $this->Manage_Report_Model->getdashdigitalcustomerdata();
		$digitalcustlist = array_reverse($digitalcustlist);

		$digitalleadlist = $this->Manage_Report_Model->getdashdigitalleaddata();
		$digitalleadlist = array_reverse($digitalleadlist);

		
		$subscriptioncustlist = $this->Manage_Report_Model->getdashsubscriptioncustomerdata();
		$subscriptioncustlist = array_reverse($subscriptioncustlist);

		$subscriptionleadlist = $this->Manage_Report_Model->getdashsubscriptionleaddata();
		$subscriptionleadlist = array_reverse($subscriptionleadlist);

		$dt_to = $dt_from = date('Y-m-d');
		$ac_data = array();

		$currentDate = new DateTime();
		$dayOfMonth = (int) $currentDate->format('d');

		$ac_flag = 1; // Change 1 to hide messages and change 0 to show messages
		//$dayOfMonth = 12;

		if ($dayOfMonth >= 1 && $dayOfMonth <= 10 && $ac_flag == 0) {
			$ac_data = array(
				'ac_class' => "warning",
				'ac_title' => "Important Notice",
				'ac_msg' => "If the previous month’s AMC or Royalty payment is not paid by the 10th of this month, your website will be automatically suspended. If paid, kindly ignore.",
			);
		} else {
			$ac_data = array(
				'ac_class' => "",
				'ac_title' => "",
				'ac_msg' => "",
			);
		}

		$this->load->view('dashboard', ['digitalcustlist' => $digitalcustlist, 'digitalleadlist' => $digitalleadlist,'subscriptioncustlist' => $subscriptioncustlist, 'subscriptionleadlist' => $subscriptionleadlist, 'ac_data' => $ac_data]);
	}

	public function todaystatisctics(){
		$this->load->model('Manage_Site_Model');
		$statestics = $this->Manage_Site_Model->gettodaystatestics();
		$this->load->view('statistics-detail', ['statestics' => $statestics]);
	}

	public function remarketingstatistics(){
		$this->load->view('remarketing-user-statistics');
	}

	public function remarketinguserstatistics()
	{
		$crondays = array();
		$crondays[] = '1';
		$crondays[] = '2';
		$crondays[] = '3';
		$crondays[] = '5';

		$this->load->model('Manage_Report_Model');
		$statistics['digitalremarketing'] = $this->Manage_Report_Model->remarketing_cron_data($crondays);

		$crondays = array();
		$crondays[] = '0';
		$crondays[] = '1';
		$crondays[] = '2';
		$crondays[] = '3';
		$crondays[] = '6';
		$crondays[] = '15';

		$this->load->model('Manage_Report_Model');
		$statistics['whremarketing'] = $this->Manage_Report_Model->whatsapp_cron_data($crondays);

		$intcrondays = array();
		$intcrondays[] = '1';
		$intcrondays[] = '2';
		$intcrondays[] = '3';
		$intcrondays[] = '6';
		$intcrondays[] = '10';

		$this->load->model('Manage_Report_Model');
		$statistics['intremarketing'] = $this->Manage_Report_Model->int_remarketing_cron_data($intcrondays);
		
		echo json_encode(array("success"=>true, "statistics"=>$statistics));
		//$this->load->view('remarketing-user-statistics', ['statistics'=>$statistics]);
	}

	public function remarketingstatisticsplan()
	{
		$this->load->view('remarketing-user-statistics-plan');
	}

	public function subremarketinguserstatistics() {

		$crondays = array();
		$crondays[] = '0';
		$crondays[] = '1';
		$crondays[] = '2';
		$crondays[] = '5';
		$crondays[] = '10';

		$this->load->model('Manage_Report_Model');
		$statistics['digitalremarketing'] = $this->Manage_Report_Model->remarketing_cron_data_subscription($crondays);

		$crondays = array();
		$crondays[] = '0';
		$crondays[] = '1';
		$crondays[] = '2';
		$crondays[] = '3';
		$crondays[] = '5';
		$crondays[] = '7';

		$this->load->model('Manage_Report_Model');
		$statistics['whremarketing'] = $this->Manage_Report_Model->whatsapp_cron_data_subscription($crondays);

		$crondays = array();
		$crondays[] = '1';
		$crondays[] = '2';
		$crondays[] = '3';
		$crondays[] = '5';
		$crondays[] = '7';
		$crondays[] = '10';
		$crondays[] = '15';

		$this->load->model('Manage_Report_Model');
		$statistics['intremarketing'] = $this->Manage_Report_Model->interakt_cron_data_subscription($crondays);

		echo json_encode(array("success" => true, "statistics" => $statistics));
		//$this->load->view('remarketing_user_statistics', ['statistics'=>$statistics]);
	}

	public function processstatisticsdigital()
	{
		$this->load->view('statistics-processstep-digital');
	}

	public function processstepdatadigital()
	{
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		$this->load->model('Manage_Report_Model');
		$statistics = $this->Manage_Report_Model->processstepdata($dt_to, $dt_from,'digital');
		$this->load->view('statistics-processstep-digital', ["success"=>true, "statistics"=>$statistics, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function processstatisticssubscription()
	{
		$this->load->view('statistics-processstep-subscription');
	}

	public function processstepdatasubscription()
	{
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		$this->load->model('Manage_Report_Model');
		$statistics = $this->Manage_Report_Model->processstepdata($dt_to, $dt_from,'subscription');
		$this->load->view('statistics-processstep-subscription', ["success"=>true,"statistics"=>$statistics, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function applicationstatistics()
	{
		$this->load->view('statistics-application');
	}

	public function applicationdata()
	{
		$this->load->model('Manage_Report_Model');
		$statistics = $this->Manage_Report_Model->applicationdata();
		echo json_encode(array("success" => true, "statistics" => $statistics));
	}


}
