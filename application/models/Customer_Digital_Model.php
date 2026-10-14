<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Customer_Digital_Model extends CI_Model {

	public function getlastrecord($customerid){
		$query = $this->db->where('isDelete',0)
					->where('userid',$customerid)
					->order_by('id desc')
					->limit(1)
					->get('user_application')
					->row();
		return $query;
	}

	public function applyapplication($data){
		$this->db->insert('user_application',$data);
		$applyid = $this->db->insert_id();
		return $applyid;
	}

	public function updateapplication($id, $data){
		$sql_query=$this->db->where('id', $id)
					->update('user_application', $data); 
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function applicationstatus($data){
		$this->db->insert('user_application_status',$data);
		$appstausid = $this->db->insert_id();
		return $appstausid;
	}
	
	public function sendGreetings($mobile='', $emailid='', $loan){
		if($mobile != '') {
			$message = "Dear Customer, Congratulations! Your loan application has been successfully submitted. Please check your registered email id and login to the Customer Portal to submit the required documents.
Thanks,
INDcapital";
			$smsresponse = sendtextSMSobb($mobile, $message, 'main');
		}

		if($emailid != '') {
			// Send email
			$subject = "Welcome Indcapital";

			$message = "<h2>Congratulations!</h2>";
			$message .= "<p>Your loan application has been successfully submitted. Please check your registered email and submit the required documents. Our company executive call you back soon!</p>";
			$message .= "<p>Thanks & Regards,<br/>".COMPANY_NAME."</p>";
			
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

