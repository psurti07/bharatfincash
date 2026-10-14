<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Customer_Login_Model extends CI_Model {

	public function checklogin($mobile, $password){
		$account = $this->db->where('mobile',$mobile)
					->where('password',$password)
					->where('isUser',2)
					->where('isActive',1)
					->where('isDelete',0)
					->get('user_registration')->row();
		return $account;
	}

	public function loginlog($id){
		$data = array(
			'customerid' => $id,
			'login_at' => date('Y-m-d H:i:s'),
			'server_ip' => getUserIpAddr()
		);
		$this->db->insert('customer_log',$data);
		$this->session->set_userdata('krm-customerlogid',$this->db->insert_id());
		return true;
	}

	public function updatecustomerlog($customerlogid){
		$data = array(
		   'logout_at' => date('Y-m-d H:i:s'),
		 );

		$sql_query=$this->db->where('id', $customerlogid)
					->update('customer_log', $data); 
	}

	public function passwordForgetmsg($mobile) {
		$account = $this->db->where('mobile', $mobile)
					->where('isUser',2)
					->where('isActive',1)
					->where('isDelete',0)
					->get('user_registration')
					->row();

		if($account) {
			$password = random_code(6); 
			$encpassword = stringCrypt($password, 'encrypt'); 
			
			$data = array(
				'update_date' => date('Y-m-d H:i:s'),
		   		'password' => $encpassword,
			);

			$sql_query=$this->db->where('id', $account->id)
						->update('user_registration', $data); 

			// Send SMS
			$message = "Hello ".$account->fullname." Your Indcapital account's new password is ".$password.". Do not share it with anyone. Thanks,
INDcapital";

			$smsresponse = sendtextSMSobb($account->mobile, $message, 'main');
			 

			return true;
		}
		else{
			return false;
		}
	}

}

