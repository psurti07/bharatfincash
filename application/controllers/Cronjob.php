<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cronjob extends CI_Controller
{

	public function index()
	{
		return redirect()->to('Infopage');
	}

	/* Digital personal loan customer marketing message */
	public function custremarketing()
	{
		$this->load->model('Site_Cronjob_Model');

		$cronjobs = array();
		$cronjobs['a1'] = '30 10 * * *';

		$cronjobs['a2'] = '0 13 * * *';

		$cronjobs['a3'] = '0 15 * * *';

		$cronjobs['a5'] = '0 20 * * *';
		
		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->customer_leads_marketing($schedule);
			}
		}

		die;
	}
	/* Digital personal loan customer marketing message */

	/* Digital personal loan customer marketing message */
	public function custremarketing_BL()
	{
		die;
		$this->load->model('Site_Cronjob_Model');

		$cronjobs = array();

		$cronjobs['a0'] = '0 10 * * *';
		$cronjobs['b0'] = '0 16 * * *';
		$cronjobs['c0'] = '0 21 * * *';

		$cronjobs['a1'] = '30 10 * * *';
		$cronjobs['b1'] = '30 16 * * *';

		$cronjobs['a2'] = '0 11 * * *';
		$cronjobs['b2'] = '0 17 * * *';

		$cronjobs['a3'] = '30 11 * * *';
		$cronjobs['b3'] = '30 17 * * *';

		$cronjobs['a6'] = '0 12 * * *';
		$cronjobs['b6'] = '0 18 * * *';

		$cronjobs['a10'] = '30 12 * * *';
		$cronjobs['b10'] = '30 18 * * *';

		$cronjobs['a20'] = '0 13 * * *';
		$cronjobs['b20'] = '0 21 * * *';

		$cronjobs['a30'] = '30 13 * * *';
		$cronjobs['b30'] = '30 19 * * *';

		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->customer_leads_marketing_BL($schedule);
			}
		}

		die;
	}
	/* Digital personal loan customer marketing message */


	/* Whatsapp marketing message */
	public function whatsappremarketing()
	{
		$this->load->model('Site_Cronjob_Model');
		$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();

		$cronjobs['a0'] = '30 16 * * *';

		$cronjobs['a1'] = '0 15 * * *';  
		$cronjobs['b1'] = '30 22 * * *';

		$cronjobs['a2'] = '0 11 * * *'; 

		$cronjobs['a3'] = '0 12 * * *';
		$cronjobs['b3'] = '0 21 * * *';

		$cronjobs['a6'] = '0 13 * * *';  

		$cronjobs['a10'] = '0 18 * * *';

		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->whatsapp_marketing_message($schedule);
			}
		}
		die;
	}
	/* Whatsapp marketing message */


	/* Whatsapp marketing message */
	public function whatsappremarketing_BL()
	{
		die;
		$this->load->model('Site_Cronjob_Model');
		$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();
		$cronjobs['a0'] = '45 21 * * *';
		$cronjobs['b0'] = '45 22 * * *';

		$cronjobs['a1'] = '0 10 * * *';
		$cronjobs['b1'] = '0 13 * * *';

		$cronjobs['a2'] = '0 17 * * *';

		$cronjobs['a3'] = '0 12 * * *';

		$cronjobs['a6'] = '0 23 * * *';

		$cronjobs['a10'] = '0 11 * * *';

		$cronjobs['a15'] = '0 22 * * *';

		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->whatsapp_marketing_message_BL($schedule);
			}
		}
		die;
	}
	/* Whatsapp marketing message */

	/* Digital personal loan customer marketing message */
	public function custremarketing_RCS()
	{
		die;
		$this->load->model('Site_Cronjob_Model');

		$cronjobs = array();
		$cronjobs['a7'] = '30 8 * * *';

		$cronjobs['a10'] = '0 9 * * *';

		$cronjobs['a20'] = '30 9 * * *';

		$cronjobs['a30'] = '0 13 * * *';

		$cronjobs['a35'] = '30 14 * * *';

		$cronjobs['a38'] = '0 17 * * *';

		$cronjobs['a40'] = '0 19 * * *';
		
		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->customer_leads_marketing_RCS($schedule);
			}
		}

		die;
	}
	/* Digital personal loan customer marketing message */

	public function whatsappremarketing_interakt() {
	   die;// 12-01-26
		$this->load->model('Site_Cronjob_Model');
		$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();

		$cronjobs['a1'] = '30 10 * * *';
		$cronjobs['b1'] = '30 22 * * *';

		$cronjobs['a2'] = '0 11 * * *';

		$cronjobs['a3'] = '0 12 * * *';
		$cronjobs['b3'] = '0 21 * * *';

		$cronjobs['a6'] = '0 13 * * *';

		$cronjobs['a10'] = '0 18 * * *';

		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->whatsapp_interakt_marketing_message($schedule);
			}
		}
		die;
	}
	/* Whatsapp marketing message */

	/* Bharatfincash customer marketing message */
	public function bharatfincash_custremarketing()
	{
		
		$this->load->model('Site_Cronjob_Model');

		$cronjobs = array();

		$cronjobs['a0'] = '0 21 * * *';

		$cronjobs['a1'] = '0 10 * * *';

		$cronjobs['a3'] = '0 12 * * *';

		$cronjobs['a5'] = '0 15 * * *';

		$cronjobs['a7'] = '0 18 * * *';

		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->bharatfincash_customer_leads_marketing($schedule);
			}
		}

		die;
	}
	/* Digital personal loan customer marketing message */

	/* Bharatfincash whatsapp interakt marketing message */
	public function subscription_whatsappremarketing_interakt() {
	   
		$this->load->model('Site_Cronjob_Model');
		$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();

		$cronjobs['a1'] = '0 10 * * *';
		$cronjobs['b1'] = '0 22 * * *';

		$cronjobs['a2'] = '0 11 * * *';
		$cronjobs['b2'] = '0 23 * * *';

		$cronjobs['a3'] = '30 11 * * *';

		$cronjobs['a5'] = '0 12 * * *';

		$cronjobs['a7'] = '30 21 * * *';
		
		$cronjobs['a10'] = '30 16 * * *';

		$cronjobs['a15'] = '30 18 * * *';

		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->subscription_whatsapp_interakt_marketing_message($schedule);
			}
		}
		die;
	}
	/* Bharatfincash whatsapp interakt marketing message */

	/* Bharatfincash whatsapp interakt marketing message */
	public function subscription_whatsappremarketing_interakt_p2() {
	   
		$this->load->model('Site_Cronjob_Model');
		$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();

		$cronjobs['a3'] = '30 13 * * *';

		$cronjobs['a6'] = '0 15 * * *';

		$cronjobs['a12'] = '30 20 * * *';
		
		$cronjobs['a17'] = '0 8 * * *';

		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->subscription_whatsapp_interakt_marketing_message_p2($schedule);
			}
		}
		die;
	}
	/* Bharatfincash whatsapp interakt marketing message */

}

?>
