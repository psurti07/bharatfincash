<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Sms_Model extends CI_Model {

	
	public function getsmstemplates(){
		$query = $this->db->order_by('rec_date desc')
				->get('sms_list')
				->result();
		return $query;      
	}

	public function getbulksmslist(){
		$query = $this->db->order_by('id asc')
					->get('bulksms')
					->result();
		return $query;
	}

	public function uploadbulkfile($data){
       	$this->db->insert('bulksms',$data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function deletemsgnumber($id){
		$query = $this->db->where('id', $id)
					->delete('bulksms'); 
		return ($this->db->affected_rows() != 1) ? false : true; 
	}

	public function checkdataentry($mobile){
		$query = $this->db->where('mobileno',$mobile)
					->get('bulksms')
					->num_rows();
		return $query; 
	}

	
	public function getdnduserlistdigital($dt_to, $dt_from) {
		$query = $this->db->select('id, fullname, mobile, cardtype')
		   ->where('isDnd', 1)
		   ->where('isActive', 1)
		   ->where('isDelete', 0)
		   ->where('rec_date >=', $dt_to . ' 00:00:00')
		   ->where('rec_date <=', $dt_from . ' 23:59:59')
		   ->order_by('id asc')
		   ->get('user_registration')
		   ->result();
		return $query;
	}

	public function uploaddndfiledigital($wheredata = '') {
		if ($wheredata != '') {
			$data = array(
			   'isDnd' => 1
			);
			$query = $this->db->where($wheredata)
			   ->update('user_registration', $data);
			return true;
		} else {
			return false;
		}
	}

	public function deletedndnumberdigital($id) {
		$data = array(
		   'isDnd' => 0
		);
		$query = $this->db->where('id', $id)
		   ->update('user_registration', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function getdnduserlistsubscription($dt_to, $dt_from) {
		$query = $this->db->select('id, fullname, mobile, cardtype')
		   ->where('isDnd', 1)
		   ->where('isActive', 1)
		   ->where('isDelete', 0)
		   ->where('rec_date >=', $dt_to . ' 00:00:00')
		   ->where('rec_date <=', $dt_from . ' 23:59:59')
		   ->order_by('id asc')
		   ->get('user_subscription_registration')
		   ->result();
		return $query;
	}

	public function uploaddndfilesubscription($wheredata = '') {
		if ($wheredata != '') {
			$data = array(
			   'isDnd' => 1
			);
			$query = $this->db->where($wheredata)
			   ->update('user_subscription_registration', $data);
			return true;
		} else {
			return false;
		}
	}

	public function deletedndnumbersubscription($id) {
		$data = array(
		   'isDnd' => 0
		);
		$query = $this->db->where('id', $id)
		   ->update('user_subscription_registration', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function sendcustomsms($target=99, $message=''){
		$response = $dataset = $smsresponse = '';

		if($message != ''){
			$smssendid = getSMSsenderid('smssenderid');
			$response .= '<h4><strong>Message Response:</strong></h4>';
			$response .= '<p> Target Customers - '.$target.'</p>';
			$response .= '<p> Message - <br/>'.$message.'</p>';
			
			if($target != 99) {
				$userlist = $this->db->select('id, fullname, mobile')
					->where('process_step',$target)
					->where('isUser',2)
					->where('isActive',1)
					->where('isDelete',0)
					->order_by('id asc')
					->get('user_registration')
					->result();

				if(count($userlist) > 0) {
					$response .= '<p> Total Customers - '.count($userlist).'</p>';
					$arrpart = array_chunk($userlist, 8000);

					foreach($arrpart as $res) {
						$dataset = '';
						$arrnumbers = 0;

						foreach($res as $row) {
							$dataset .= "<sms><user>".SMS_OBB_USERNAME."</user><password>".SMS_OBB_PASSWORD."</password><mobiles>".$row->mobile."</mobiles><message>".$message."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";
							
							$arrnumbers++;
						}
					}
				}
			}

			$dataset .= "<sms><user>".SMS_OBB_USERNAME."</user><password>".SMS_OBB_PASSWORD."</password><mobiles>7984310891</mobiles><message>".$message."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";
			$dataset .= "<sms><user>".SMS_OBB_USERNAME."</user><password>".SMS_OBB_PASSWORD."</password><mobiles>7201825971</mobiles><message>".$message."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";
			$dataset .= "<sms><user>".SMS_OBB_USERNAME."</user><password>".SMS_OBB_PASSWORD."</password><mobiles>9979784284</mobiles><message>".$message."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";
			$dataset .= "<sms><user>".SMS_OBB_USERNAME."</user><password>".SMS_OBB_PASSWORD."</password><mobiles>9909028478</mobiles><message>".$message."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";
			$dataset .= "<sms><user>".SMS_OBB_USERNAME."</user><password>".SMS_OBB_PASSWORD."</password><mobiles>9723682913</mobiles><message>".$message."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";
			$dataset .= "<sms><user>".SMS_OBB_USERNAME."</user><password>".SMS_OBB_PASSWORD."</password><mobiles>8154973797</mobiles><message>".$message."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";
			$smsresponse = sendxmlSMSobb($dataset);

			$response .= '<p> SMS Response - <br/>'.$smsresponse.'</p>';
		}

		return $response;
	}
}
?>
