<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Subscription_Customer_Code_Model extends CI_Model {

	public function getlastrecord($customerid){
		$query = $this->db->where('isDelete',0)
					->where('userid',$customerid)
					->order_by('id desc')
					->limit(1)
					->get('user_subscription_application')
					->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function applyapplication($data){
		$this->db->insert('user_subscription_application',$data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function updateregistration($id, $data){
		$query = $this->db->where('id', $id)
					->update('user_subscription_registration', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function updateapplication($id, $data){
		$query = $this->db->where('id', $id)
					->update('user_subscription_application', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function applicationstatus($data){
		$this->db->insert('user_subscription_application_status',$data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function sendGreetings($mobile='', $emailid='', $loan){
		if($mobile != '') {
			$message = "Dear Customer, Congratulations! Your loan application has been successfully submitted. Please check your registered email id and login to the Customer Portal to submit the required documents. Thanks, Bharatfincash";
			$smsresponse = sendtextSMSobb($mobile, $message, 'subscription');

		}

		if($emailid != '') {
			// Send email
			$subject = "Welcome BharatFinCash Subscription";

			$message = "<h2>Congratulations!</h2>";
			$message .= "<p>Your loan application has been successfully submitted. Please check your registered email and submit the required documents. Our company executive call you back soon!</p>";
			$message .= "<p>Thanks & Regards,<br/>BharatFinCash Subscription</p>";
			
			$this->load->model('Site_General_Model');
			$content = $this->Site_General_Model->simpleemailtemplate($message);

			if($content != '') {
				//$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content);
				$maildata = array(
					'fullname' => $mobile,
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}

		return true;
	}
	
}
?>
