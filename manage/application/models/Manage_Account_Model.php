<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Account_Model extends CI_Model {

	public function getinvoicedetails($id){
		
		$query = $this->db->where('id',$id)
					->get('invoice')
					->row();

				
		return $query;    
	}

	public function getinvoicelist($dt_to, $dt_from){
		
		$resdata = array();
		$queryres = $this->db->where('inv_date >=', $dt_to)
					->where('inv_date <=', $dt_from)
					->where('isDelete',0)
					->order_by('inv_date desc')
					->get('invoice')
					->result();

		if(count($queryres)) {
			foreach ($queryres as $row) {
				$resrow = array();

				$resrow['id'] = $row->id;
				$resrow['userid'] = $row->userid;
				$resrow['inv_for'] = $row->inv_for;
				$resrow['inv_prefix'] = $row->inv_prefix;
				$resrow['inv_number'] = $row->inv_number;
				$resrow['inv_date'] = $row->inv_date;
				$resrow['rec_date'] = $row->rec_date;
				$resrow['inv_grandtotal'] = $row->inv_grandtotal;
				$resrow['isDelete'] = $row->isDelete;

				if($row->inv_for == 1 || $row->inv_for == 2) {
					$this->load->model('Manage_User_Model');
					$response_user = $this->Manage_User_Model->getcarddetails($row->userid);
					if($response_user != ''){
						$resrow['memberid'] = $response_user->id;
						$resrow['fullname'] = $response_user->fullname;
						$resrow['mobile'] = $response_user->mobile;
						$resrow['email'] = $response_user->email;
						$resrow['usertype'] = 'cust';
						if ($row->cardid != '' && $row->cardid > 0) {
							$response_order = $this->Manage_User_Model->getmembershiprecord($row->cardid);
							$resrow['paymentid'] = $response_order->paymentid;
						}
						$resdata[] = $resrow;
					}
				}
				else if($row->inv_for == 4 || $row->inv_for == 5) {
					$this->load->model('Manage_Subscription_User_Model');
					$response_user = $this->Manage_Subscription_User_Model->getcarddetails($row->userid);
					if($response_user){
						$resrow['memberid'] = $response_user->id;
						$resrow['fullname'] = $response_user->fullname;
						$resrow['mobile'] = $response_user->mobile;
						$resrow['email'] = $response_user->email;
						$resrow['usertype'] = 'cust';
						if ($row->cardid != '' && $row->cardid > 0) {
							$response_order = $this->Manage_Subscription_User_Model->getsubscriptionrecord($row->cardid);
							$resrow['paymentid'] = $response_order->paymentid;
						}
						$resdata[] = $resrow;
					}
				}

				
			}
		}

				
		return $resdata;
	}

	public function deleteinvoice($id){
		
		$data = array(
		   'isDelete' => 1
		);
		$query = $this->db->where('id', $id)
					->update('invoice', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function restoreinvoice($id){
		
		$data = array(
		   'isDelete' => 0
		);
		$query = $this->db->where('id', $id)
					->update('invoice', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function getrefundlist($dt_to, $dt_from){
		
		$resdata = array();
		$queryres = $this->db->where('ref_date >=', $dt_to)
					->where('ref_date <=', $dt_from)
					->where('isDelete',0)
					->order_by('ref_date desc')
					->get('refund')
					->result();

		if(count($queryres)) {
			foreach ($queryres as $row) {
				$resrow = array();

				$resrow['id'] = $row->id;
				$resrow['userid'] = $row->userid;
				$resrow['ref_for'] = $row->ref_for;
				$resrow['ref_number'] = $row->ref_number;
				$resrow['ref_date'] = $row->ref_date;
				$resrow['ref_grandtotal'] = $row->ref_grandtotal;
				$resrow['paymentid'] = $row->paymentid;
				$resrow['remarks'] = $row->remarks;

				if($row->ref_for == 1 || $row->ref_for == 2) {
					$this->load->model('Manage_User_Model');
					$response_user = $this->Manage_User_Model->getuserdata($row->userid);
					
					$resrow['fullname'] = $response_user->fullname;
					$resrow['mobile'] = $response_user->mobile;
					$resrow['usertype'] = 'cust';
					$resdata[] = $resrow;
				}
			}
		}

				
		return $resdata;
	}

	public function raiserefund($data){
		
		$this->db->insert('refund',$data);
		$id = $this->db->insert_id();

				
		return $id; 
	}

	public function deleterefund($id){
		
		$data = array(
		   'isDelete' => 1
		);
		$query = $this->db->where('id', $id)
					->update('refund', $data); 
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function sendrefundmessage($mobile='', $emailid=''){
		if($mobile != '') {
			$smsmessage = "Hello, your refund payment is successfully done. For any query, kindly call us between 10 AM to 5 PM (Mon-Sat only business days). Thanks,  Fintopcorporate";
			//$smsresponse = sendtextSMSobb($mobile, $smsmessage);
		}

		if($emailid != '') {
			$subject = "Refund Payment - Fintopcorporate";
			
			$message = '<p>Hello,</p>';
			$message .= '<p>Your refund payment is successfully done. For any query, kindly call us between 10 AM to 5 PM (Mon-Sat only business days).</p>';
			$message .= '<p>Thanks & Regards,<br/>Support Team,<br/>Fintopcorporate</p>';
			
			$this->load->model('Manage_General_Model');
			$content = $this->Manage_General_Model->simpleemailtemplate($message);

			if($content != '') {
				//$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content, 1);
				$maildata = array(
					'fullname' => $emailid,
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}

		return true;
	}

}

?>
