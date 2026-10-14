<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Site_Info_Model extends CI_Model {

	public function getmetakeywords($slug = ''){
		$query = $this->db->where('slug', $slug)
				->get('meta_keywords');
		return $query->row();
	}

	public function getproductdetails($slug = ''){
		$query = $this->db->select('id, productname, amount, offeramount, inOffer')
				->where('productslug', $slug)
				->get('products');
		return $query->row();
	}

	public function getpagedetails($pagename = ''){
		$query = $this->db->where('option_key',$pagename)
				->get('site_options')
				->row();
		return $query;      
	}

	public function getsmsmessage($smskey = ''){
		$query = $this->db->where('option_key',$smskey)
				->get('site_options')
				->row();
		return $query->option_value;      
	}

	public function getinvoiceno(){
		$query = $this->db->select('option_value')
				->where('option_key', 'newinvoiceno')
				->get('site_options')
				->row();
		return $query->option_value;      
	}

	public function getbanklist($limit = 12){
		$query = $this->db->where('isDelete',0)
				->order_by('rand()')
				->limit($limit)
				->get('banks');
		return $query->result();      
	}

	public function gettestimoniallist($page = ''){
		$query = $this->db->where('reviewpage',$page)
				->where('isDelete',0)
				->order_by('rand()')
				->get('testimonials');
		return $query->result();      
	}

	public function getdirectlinks($loantype=''){
		$query = $this->db->select('l.id, l.applyurl, l.loantype, b.bank_name, b.bank_image')
				->from('bankapplylink l')
				->join('banks b','b.id=l.bankid')
				->where('l.loantype', $loantype)
				->where('l.isDelete', 0)
				->order_by('rand()')
				->limit(6)
				->get()
				->result();
		return $query;
	}

	public function getwelcomemessage(){
		//$where = "id=3 OR id=4";
		$where = "option_key='welcome-status' OR option_key='welcome-message'";
		$query = $this->db->select('option_value')
				->where($where)
				->get('site_options');
		return $query->result();      
	}

	public function getopeninglist(){
		$query = $this->db->where('isDelete', 0)
				->order_by('rec_date desc')
				->get('career_opening');
		return $query->result();      
	}

	public function getjobdetails($slug = ''){
		$query = $this->db->where('slug', $slug)
				->where('isDelete', 0)
				->get('career_opening');
		return $query->row();      
	}

	public function sendOnlineGreetings($mobile='', $emailid='', $loan=''){
		if($mobile != '') {
			$smsmessage = "Dear Customer, Congratulations! Your loan application has been successfully submitted. Please check your registered email id and login to the Customer Portal to submit the required documents.
Thanks,
INDcapital";
			$smsresponse = sendtextSMSobb($mobile, $smsmessage, 'main');
		}

		if($emailid != '') {
			// Send email
			$subject = "Welcome Indcapital";
			$message = "<p>Dear Customer,<p>";
			$message .= "<p><strong>Congratulations!</strong></p>";
			$message .= "<p>Your loan application has been successfully submitted. Please login to our customer portal to submit the required documents so our company executive will call back in 24 to 48 hours!"; 
			$message .= "<p>Thanks & Regards,<br/>".COMPANY_NAME."</p>";
			
			$this->load->model('Site_General_Model');
			$content = $this->Site_General_Model->simpleemailtemplate($message);

			if($content != '') {
				///$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content);

				$maildata = array(
					'fullname' => $emailid,
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}

		return true;
	}

	public function careersubmission($data){
		$this->db->insert('career_enquiry',$data);
		$careerid = $this->db->insert_id();

		if($data['mobile'] != '' && $careerid != '') {
			$smsmessage = "Thank You for showing interest in Indcapital. Our HR team will call you back soon. Have a nice day. Thanks & Regards, Indcapital";
			$smsresponse = sendtextSMSobb($data['mobile'], $smsmessage, 'main');
		}

		if($data['email'] != '' && $careerid != '') {
			// Send email
			$subject = "Welcome to Indcapital";
			$message = "<p>Hello ".$data['firstname']." ".$data['lastname'].",</p>"; 
			$message .= "<p>You have successfully registered with Indcapital. We thank you for the interest you have shown in our organization.<br/>Our HR team will get back to you soon. Have a nice day.</p>";
			$message .= "<p>For any queries/confusion, write to us at hr@indcapital.in</p>";
			$message .= "<p>Thanks & Regards,<br/>".COMPANY_NAME."</p>";

			$this->load->model('Site_General_Model');
			$content = $this->Site_General_Model->simpleemailtemplate($message);

			if($content != '') {
				//$mailresponse = sendHTMLmail($data['email'], 'hr@indcapital.in', $subject, $content);
				$maildata = array(
					'fullname' => $data['mobile'],
					'email' => $data['email']
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject1, $content1);
			}

			// Send email
			$subject = "Career Form Submission";
			$message = "<p>Hello,</p>"; 
			$message .= "<p>You have a new career form submission from website. Here are some basic details:</p>"; 
			$message .= "<p>Name : <strong>".$data['firstname']." ".$data['lastname']."</strong><br/>";
			$message .= "Email Id : <strong>".$data['email']."</strong><br/>";
			$message .= "Mobile : <strong>".$data['mobile']."</strong></p>";
			$message .= "<p>For more details kindly check the portal.</p>";
			$message .= "<p>Thanks & Regards,<br/>".COMPANY_NAME."</p>";

			$this->load->model('Site_General_Model');
			$content = $this->Site_General_Model->simpleemailtemplate($message);

			if($content != '') {
				//$mailresponse = sendHTMLmail($data['email'], 'hr@indcapital.in', $subject, $content);
				$maildata = array(
					'fullname' => $data['mobile'],
					'email' => $data['email']
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject2, $content2);
			}
		}

		return ($this->db->affected_rows() != 1) ? false : true; 
	}

	public function subscribenewsletter($data){
		$this->db->insert('newsletter_subscribe',$data);
		$bankid = $this->db->insert_id();

		return ($this->db->affected_rows() != 1) ? false : true; 
	}

	public function getimpnoteslist(){
		$query = $this->db->where('isActive',1)
				->where('isDelete',0)
				->order_by("rec_date desc")
				->get('important_update');
		return $query->result();      
	}

	public function contactenquiry($data){
		$this->db->insert('contact_enquiry',$data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function getroipackages($loantype){
		$query = $this->db->select('r.*, b.bank_name, b.bank_image')
				->from('roipackages r')
				->join('banks b','b.id=r.bankid')
				->where('r.loantype', $loantype)
				->where('r.isDelete', 0)
				->order_by('rand()')
				->limit(4)
				->get()
				->result();
		return $query;
	}	
}

