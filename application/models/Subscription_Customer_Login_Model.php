<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Subscription_Customer_Login_Model extends CI_Model {

	public function checklogin($mobile, $password){
		$account = $this->db->select('id, rec_date, fullname, mobile, email')
					->where('mobile',$mobile)
					->where('password',$password)
					->where('isUser',2)
					->where('isActive',1)
					->where('isDelete',0)
					->get('user_subscription_registration')
					->row();

		$this->db->close();
		$this->db->initialize();

		return $account;
	}

	public function checkaccountvalidity($userid){
		$account = $this->db->select('id, registration_date, expiry_date, card_number')
					->where('userid',$userid)
					->where('isActive',1)
					->where('isDelete',0)
					->get('subscription_order')
					->row();

		$this->db->close();
		$this->db->initialize();

		return $account;
	}

	public function loginlog($id){
		$data = array(
			'customerid' => $id,
			'login_at' => date('Y-m-d H:i:s'),
			'server_ip' => getUserIpAddr()
		);
		$this->db->insert('customer_log',$data);
		$this->session->set_userdata('bfc-subscriptioncustlogid',$this->db->insert_id());

		$this->db->close();
		$this->db->initialize();

		return true;
	}

	public function updatecustomerlog($subscriptioncustlogid){
		$data = array(
		   'logout_at' => date('Y-m-d H:i:s'),
		 );

		$sql_query=$this->db->where('id', $subscriptioncustlogid)
					->update('customer_log', $data);

		$this->db->close();
		$this->db->initialize();

		return true;
	}

	public function passwordForgetmsg($mobile) {
		$account = $this->db->where('mobile', $mobile)
					->where('isUser',2)
					->where('isActive',1)
					->where('isDelete',0)
					->get('user_subscription_registration')
					->row();

		if($account) {
		
				$password = random_code(6); 
				$encpassword = stringCrypt($password, 'encrypt'); 
				
				$data = array(
			   		'update_date' => date('Y-m-d H:i:s'),
			   		'password' => $encpassword,
				);

				$sql_query=$this->db->where('id', $account->id)
							->update('user_subscription_registration', $data); 

				$message = "Hello " . $account->fullname . " Your Bharatfincash account new password is " . $password . " (Do not share it with anyone).Thanks";

				$smsresponse = sendtextSMSobb($account->mobile, $message, 'subscription');

				$this->db->close();
				$this->db->initialize();

				return true;
			
		}
		else{
			$this->db->close();
			$this->db->initialize();

			return false;
		}
	}

}
?>
