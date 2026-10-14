<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dataclean extends MY_Controller
{

	public function sync_invoice_data()
	{
		$this->output->set_content_type('application/json');

		$master_key = $this->input->post('master_key');

		// ✅ API key check
		if (!isset($master_key) || MASTER_API_KEY !== $master_key) {
			return $this->output
				->set_status_header(403)
				->set_output(json_encode(['error' => 'Unauthorized access']));
		}

		$start_date   = $this->input->post('start_date');
		$end_date     = $this->input->post('end_date');
		$product_code = $this->input->post('product_code');

		// ✅ Input validation
		if (empty($start_date) || empty($end_date) || empty($product_code)) {
			return $this->output
				->set_status_header(400)
				->set_output(json_encode(['error' => 'Missing date range or product code']));
		}

		$this->load->model('Data_Test_And_Clean_Model');
		$response = $this->Data_Test_And_Clean_Model->sync_invoice_data($start_date, $end_date, $product_code);

		if (empty($response)) {
			return $this->output
				->set_status_header(404)
				->set_output(json_encode(['message' => 'No invoice data found for given criteria']));
		}

		// ✅ Send to parent API
		$api_response = send_order_data(json_encode($response), 'manual_api');

		// ✅ Merge results for transparency
		return $this->output
			->set_status_header(200)
			->set_output(json_encode([
				'status'        => 'success',
				'local_data'    => $response,
				'parent_result' => $api_response
			]));
	}

	public function kycdata()
	{
		$this->load->model('Data_Test_And_Clean_Model');
		$response = $this->Data_Test_And_Clean_Model->kycdatadelete();
	}
	public function userprocessstep()
	{
		$this->load->model('Data_Test_And_Clean_Model');
		$response = $this->Data_Test_And_Clean_Model->userprocessstepset();
	}


	/*public function testsms(){
		$mobile = "9904466599";
		$otpcode = "1234";

		$message = "Hello, ".$otpcode." is the Mydemak OTP (One Time Password) to register your mobile number. (Do not share it with anyone)";
		
		$smsresponse = sendotpSMS($mobile, $message);
		echo $smsresponse;
	}*/

	//for user registration table > if fullname is null then set name from email address
	public function user_registration_data()
	{
		$this->load->model('Data_Test_And_Clean_Model');
		$meta = $this->Data_Test_And_Clean_Model->update_user_registration_data();
		echo $meta;
		die;
	}

	// duplicate entry delete from memebership order and invoice table (do not change query order)
	public function duplicate_user_carddata()
	{
		$this->load->model('Data_Test_And_Clean_Model');
		$meta = $this->Data_Test_And_Clean_Model->delete_duplicate_user_carddata();
		echo $meta;
		die;
	}

	// delete data before given timestamp value
	public function ci_sessions_data(){
		$this->load->model('Data_Test_And_Clean_Model');
		$meta = $this->Data_Test_And_Clean_Model->delete_ci_sessions_data();
		echo $meta;
		die;
	}

	// For delete data between given time periods
	public function sms_log_data(){
		$this->load->model('Data_Test_And_Clean_Model');
		$meta = $this->Data_Test_And_Clean_Model->delete_sms_log_data();
		echo $meta;
		die;
	}
}
