<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Subscription_Customer_Loan_Model extends CI_Model {

	public function getloanhistory($id){
		$date = "rec_date >= DATE_ADD(CURDATE(),INTERVAL -180 DAY) ";

		$query = $this->db->where($date)
					->where('userid',$id)
					->where('isDelete',0)
					->order_by('rec_date desc')
					->get('user_subscription_application')
					->result();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function getapplicationdetails($id){
		$query = $this->db->where('id',$id)
					->where('isDelete',0)
					->order_by('id asc')
					->get('user_subscription_application')
					->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function getappstatuslist($id){
		$query = $this->db->select('s.*, b.bank_name, l.statusname, l.colorclass')
					->from('user_subscription_application_status s')
					->join('banks b', 's.bankid=b.id')
					->join('loanstatus l', 's.statusid=l.id')
					->where('s.isDelete',0)
					->where('s.applicationid',$id)
					->order_by('s.statusdate desc')
					->get()
					->result();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

}
?>