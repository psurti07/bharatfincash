<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Site_Model extends CI_Model {

	public function gettodaystatestics(){
		$statestics_res = [];

		/* Online Loan */
		$query_digital = $this->db->select('r.id')
					->from('user_registration r')
					->join('user_tree t','t.subuserid=r.id', 'left')
					->where("CAST(r.update_date as date) = CAST('".date('Y-m-d')."' as date)")
					->where('t.subuserid',NULL)
					->where('r.isUser',1)
					->where('r.isDelete',0)
					->order_by('r.id asc')
					->get();
		$statestics_res['digitalloans'] = $query_digital->num_rows(); 

		$query_digitalpl = $this->db->select('r.id')
					->from('user_registration r')
					->join('user_tree t','t.subuserid=r.id', 'left')
					->join('user_application a', 'a.userid = r.id')
					->where("CAST(r.update_date as date) = CAST('".date('Y-m-d')."' as date)")
					->where('t.subuserid',NULL)
					->where('a.loantype',11)
					->where('r.isUser',1)
					->where('r.isDelete',0)
					->order_by('r.id asc')
					->get();
		$statestics_res['digitalpersonal'] = $query_digitalpl->num_rows(); 

		$query_digitalbl = $this->db->select('r.id')
					->from('user_registration r')
					->join('user_tree t','t.subuserid=r.id', 'left')
					->join('user_application a', 'a.userid = r.id')
					->where("CAST(r.update_date as date) = CAST('".date('Y-m-d')."' as date)")
					->where('t.subuserid',NULL)
					->where('a.loantype',12)
					->where('r.isUser',1)
					->where('r.isDelete',0)
					->order_by('r.id asc')
					->get();
		$statestics_res['digitalbusiness'] = $query_digitalbl->num_rows(); 
		/* Online Loan */

		/* Subscription Loan */
		$query_subscription = $this->db->select('r.id')
					->from('user_subscription_registration r')
					->join('user_tree t','t.subuserid=r.id', 'left')
					->where("CAST(r.update_date as date) = CAST('".date('Y-m-d')."' as date)")
					->where('t.subuserid',NULL)
					->where('r.isUser',1)
					->where('r.isDelete',0)
					->order_by('r.id asc')
					->get();
		$statestics_res['subscriptionloans'] = $query_subscription->num_rows(); 

		$query_subscriptionpl = $this->db->select('r.id')
					->from('user_subscription_registration r')
					->join('user_tree t','t.subuserid=r.id', 'left')
					->join('user_subscription_application a', 'a.userid = r.id')
					->where("CAST(r.update_date as date) = CAST('".date('Y-m-d')."' as date)")
					->where('t.subuserid',NULL)
					->where('a.loantype',21)
					->where('r.isUser',1)
					->where('r.isDelete',0)
					->order_by('r.id asc')
					->get();
		$statestics_res['subscriptionpersonal'] = $query_subscriptionpl->num_rows(); 

		$query_subscriptionbl = $this->db->select('r.id')
					->from('user_subscription_registration r')
					->join('user_tree t','t.subuserid=r.id', 'left')
					->join('user_subscription_application a', 'a.userid = r.id')
					->where("CAST(r.update_date as date) = CAST('".date('Y-m-d')."' as date)")
					->where('t.subuserid',NULL)
					->where('a.loantype',22)
					->where('r.isUser',1)
					->where('r.isDelete',0)
					->order_by('r.id asc')
					->get();
		$statestics_res['subscriptionbusiness'] = $query_subscriptionbl->num_rows(); 
		/* Subscription Loan */

		$query_standard = $this->db->select('r.id')
					->from('user_registration r')
					->join('membership_order m', 'm.userid=r.id')
					->where("CAST(m.rec_date as date) = CAST('".date('Y-m-d')."' as date)")
					->where('r.cardtype',11)
					->where('m.isDelete',0)
					->where('r.isDelete',0)
					->get();
		$statestics_res['standardcards'] = $query_standard->num_rows(); 

		$query_bfc = $this->db->select('r.id')
					->from('user_subscription_registration r')
					->join('subscription_order m', 'm.userid=r.id')
					->where("CAST(m.rec_date as date) = CAST('".date('Y-m-d')."' as date)")
					->where('m.isDelete',0)
					->where('r.isDelete',0)
					->get();
		$statestics_res['bfccards'] = $query_bfc->num_rows(); 

		$query_prime = $this->db->select('r.id')
					->from('user_registration r')
					->join('membership_order m', 'm.userid=r.id')
					->where("CAST(m.rec_date as date) = CAST('".date('Y-m-d')."' as date)")
					->where('r.cardtype',12)
					->where('m.isDelete',0)
					->where('r.isDelete',0)
					->get();
		$statestics_res['primecards'] = $query_prime->num_rows();

		$query_application = $this->db->select('a.id')
					->from('user_registration r')
					->join('user_application a', 'a.userid=r.id')
					->where("CAST(a.rec_date as date) = CAST('".date('Y-m-d')."' as date)")
					->where('a.status',1)
					->where('a.isDelete',0)
					->where('r.isUser',2)
					->where('r.isDelete',0)
					->get();
		$statestics_res['userapplication'] = $query_application->num_rows(); 

		$query_application = $this->db->select('a.id')
					->from('user_registration r')
					->join('user_application a', 'a.userid=r.id')
					->where('a.userid in (SELECT userid FROM user_application GROUP BY userid HAVING COUNT(*) > 1)')
					->where("CAST(a.rec_date as date) = CAST('".date('Y-m-d')."' as date)")
					->where('a.status',1)
					->where('a.isDelete',0)
					->where('r.isUser',2)
					->where('r.isDelete',0)
					->get();
		$statestics_res['reapplyapplication'] = $query_application->num_rows(); 

		$query_cpcustleads = $this->db->select('r.id')
					->from('user_registration r')
					->join('user_tree t','t.subuserid=r.id', 'left')
					->where("CAST(r.update_date as date) = CAST('".date('Y-m-d')."' as date)")
					->where('t.subuserid !=',NULL)
					->where('t.refferaltype',2)
					->where('r.isUser',1)
					->where('r.isDelete',0)
					->order_by('r.id asc')
					->get();
		$statestics_res['cpcustleads'] = $query_cpcustleads->num_rows(); 

		/* $query_cpcust = $this->db->from('user_registration r')
					->join('user_tree t','t.subuserid=r.id', 'left')
					->where("CAST(r.rec_date as date) = CAST('".date('Y-m-d')."' as date)")
					->where('t.subuserid !=',NULL)
					->where('t.refferaltype',2)
					->where('r.isUser',2)
					->where('r.isDelete',0)
					->order_by('r.id asc')
					->get();
		$statestics_res['cpcustomers'] = $query_cpcust->num_rows(); */

		$query_offer = $this->db->select('id')
					->where('registration_date', date('Y-m-d'))
					->where('offerpage',1)
					->where('isDelete',0)
					->get('cardoffer_order');
		$statestics_res['cardoffer'] = $query_offer->num_rows();

		$query_offer = $this->db->select('id')
					->where('registration_date', date('Y-m-d'))
					->where('offerpage',2)
					->where('isDelete',0)
					->get('cardoffer_order');
		$statestics_res['specialoffer'] = $query_offer->num_rows();
		$query_offer = $this->db->select('id')
			->where('registration_date', date('Y-m-d'))
			->where('offerpage', 3)
			->where('isDelete', 0)
			->get('cardoffer_order');
		$statestics_res['bumperoffer'] = $query_offer->num_rows();

		$query_offer = $this->db->select('id')
			->where('registration_date', date('Y-m-d'))
			->where('offerpage', 4)
			->where('isDelete', 0)
			->get('cardoffer_order');
		$statestics_res['flashoffer'] = $query_offer->num_rows();

		$query_offer = $this->db->select('id')
			->where('registration_date', date('Y-m-d'))
			->where('offerpage', 5)
			->where('isDelete', 0)
			->get('cardoffer_order');
		$statestics_res['quickoffer'] = $query_offer->num_rows();

		$query_offer = $this->db->select('id')
			->where('registration_date', date('Y-m-d'))
			->where('offerpage', 6)
			->where('isDelete', 0)
			->get('cardoffer_order');
		$statestics_res['megaoffer'] = $query_offer->num_rows();

		$query_offer = $this->db->select('id')
			->where('registration_date', date('Y-m-d'))
			->where('offerpage', 7)
			->where('isDelete', 0)
			->get('cardoffer_order');
		$statestics_res['staroffer'] = $query_offer->num_rows();
		
		$query_offer = $this->db->select('id')
			->where('registration_date', date('Y-m-d'))
			->where('offerpage', 8)
			->where('isDelete', 0)
			->get('cardoffer_order');
		$statestics_res['festivaloffer'] = $query_offer->num_rows();
		
		$query_offer = $this->db->select('id')
			->where('registration_date', date('Y-m-d'))
			->where('offerpage', 9)
			->where('isDelete', 0)
			->get('cardoffer_order');
		$statestics_res['primeoffer'] = $query_offer->num_rows();

		$query_refferalcst = $this->db->select('t.id')
					->from('user_tree t')
					->join('user_registration r1', 't.refferaluserid=r1.id')
					->join('user_registration r2', 't.subuserid=r2.id')
					->join('membership_order m', 'r2.id=m.userid')
					->where('t.refferaltype',1)
					->where('t.payout',0)
					->where('r2.isDelete',0)
					->where('r2.isUser',2)
					->where('r1.isUser',2)
					->order_by('t.rec_date asc')
					->get();
		$statestics_res['refferalcustomerpayout'] = $query_refferalcst->num_rows(); 

		$query_ads = $this->db->select('id')
					->where('isVerified',0)
					->where('isDelete',0)
					->get('adsdata');
		$statestics_res['partnerads'] = $query_ads->num_rows();

		$query_ads = $this->db->select('id')
					->where('rec_date',date('Y-m-d'))
					->get('otpverification');
		$statestics_res['otpmessage'] = $query_ads->num_rows();  

		return $statestics_res;
	}

	public function getnewsletterlist(){
		$query = $this->db->where('isDelete',0)
					->order_by('id asc')
					->get('newsletter_subscribe')
					->result();
		return $query;
	}

	public function changesubscription($statusid, $id){
		if($statusid == 1) {
			$data = array(
			   'isActive' => 0,
			   'rec_date' => date('Y-m-d H:i:s')
			);
		}
		else {
			$data = array(
			   'isActive' => 1,
			   'rec_date' => date('Y-m-d H:i:s')
			);
		}

		$sql_query = $this->db->where('id', $id)
					->update('newsletter_subscribe', $data);

		return ($this->db->affected_rows() != 1) ? false : true; 
	}

	public function deletesubscription($id){
		$data = array(
		   'isDelete' => 1
		);
		$sql_query_reg = $this->db->where('id', $id)
						->update('newsletter_subscribe', $data); 

		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function getpagedetails($pagename){
		$query = $this->db->where('option_key',$pagename)
				->get('site_options');
		return $query->row();      
	}
	
	public function editpage($id, $data){
		$sql_query = $this->db->where('id', $id)
					->update('site_options', $data); 
		return $sql_query;
	}

	public function getsmsmessages(){
		$where = 'option_key="pl-remarketing-sms" 
		OR option_key="bl-remarketing-sms" 
		OR option_key="pl-offer-sms" 
		OR option_key="bl-offer-sms" 
		OR option_key="pl-process-sms" 
		OR option_key="bl-process-sms" 
		OR option_key="account-sms"
		OR option_key="digital-payment-fail"
		OR option_key="business-payment-fail"
		OR option_key="subscription-remarketing-sms" 
		OR option_key="subscription-process-sms"
		OR option_key="subscription-offer-sms" 
		OR option_key="subscription-account-sms"
		OR option_key="subscription-payment-fail-sms"';

		$query = $this->db->where($where)
					->order_by('rec_date asc')
					->get('site_options')
					->result();

		return $query;
	}

	public function getsmsdetails($id){
		$query = $this->db->where('id',$id)
				->get('site_options');
		return $query->row();      
	}
	
	public function editsms($id, $data){
		$sql_query = $this->db->where('id', $id)
					->update('site_options', $data); 
		return $sql_query;
	}
	
	public function getsitesettings(){
		$settings = [];

		$query1 = $this->db->where('option_key', 'welcome-status')
					->get('site_options');
		$settings['welcomemodel'] = $query1->row(); 

		$query2 = $this->db->where('option_key', 'facebookpixel')
					->get('site_options');
		$settings['fbpixelvalue'] = $query2->row();

		$query3 = $this->db->where('option_key', 'facebookdomain')
					->get('site_options');
		$settings['fbdomainvalue'] = $query3->row();

		$query4 = $this->db->where('option_key', 'smssenderid')
					->get('site_options');
		$settings['smssenderid'] = $query4->row();

		$query5 = $this->db->where('option_key', 'fbaccesstoken')
			->get('site_options');
		$settings['fbaccesstoken'] = $query5->row();

		$query6 = $this->db->where('option_key', 'fbeventname')
			->get('site_options');
		$settings['fbeventname'] = $query6->row();

		$query7 = $this->db->where('option_key', 'fbeventid')
			->get('site_options');
		$settings['fbeventid'] = $query7->row();

		$query11 = $this->db->where('option_key', 'wpcampaignmain')
			->get('site_options');
		$settings['wpcampaignmain'] = $query11->row();

		$query12 = $this->db->where('option_key', 'wpcampaignoffer')
			->get('site_options');
		$settings['wpcampaignoffer'] = $query12->row();

		$query13 = $this->db->where('option_key', 'wpcampaignsuccess')
			->get('site_options');
		$settings['wpcampaignsuccess'] = $query13->row();

		$query14 = $this->db->where('option_key', 'aisency_userwelcomename')
        ->get('site_options');
        $settings['aisency_userwelcomename'] = $query14->row();

		$query15 = $this->db->where('option_key', 'facebookpixelsubscription')
			->get('site_options');
		$settings['fbpixelvaluesubscription'] = $query15->row();

		$query16 = $this->db->where('option_key', 'fbaccesstokensubscription')
			->get('site_options');
		$settings['fbaccesstokensubscription'] = $query16->row();

		$query17 = $this->db->where('option_key', 'fbeventnamesubscription')
			->get('site_options');
		$settings['fbeventnamesubscription'] = $query17->row();

		$query18 = $this->db->where('option_key', 'fbeventidsubscription')
			->get('site_options');
		$settings['fbeventidsubscription'] = $query18->row();

		$query19 = $this->db->where('option_key', 'smssenderid-subscription')
			->get('site_options');
		$settings['smssenderidsubscription'] = $query19->row();

		$query20 = $this->db->where('option_key', 'wpcampaignsubscription')
			->get('site_options');
		$settings['wpcampaignsubscription'] = $query20->row();

		$query21 = $this->db->where('option_key', 'wpcampaignoffersubscription')
			->get('site_options');
		$settings['wpcampaignoffersubscription'] = $query21->row();

		$query22 = $this->db->where('option_key', 'wpcampaignsuccesssubscription')
			->get('site_options');
		$settings['wpcampaignsuccesssubscription'] = $query22->row();

		$query23 = $this->db->where('option_key', 'aisency_userwelcomename_plan')
        ->get('site_options');
        $settings['aisency_userwelcomename_plan'] = $query23->row();

		return $settings;
	}

	public function updatemodelstatus($value){
		$option_value = ($value == 1) ? 0 : 1;

		$data = array(
		   'rec_date' => date('Y-m-d H:i:s'),
		   'option_value' => $option_value
		);
		$sql_query = $this->db->where('option_key', 'welcome-status')
					->update('site_options', $data); 
		return $sql_query;
	}

	public function updatefacebookdata($data, $key){
		$sql_query = $this->db->where('option_key', $key)
					->update('site_options', $data); 
		return $sql_query;
	}

	public function updatesitesettingdata($data, $key) {
		$query = $this->db->where('option_key', $key)
		   ->update('site_options', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function updatesmssenderdata($data, $key){
		$sql_query = $this->db->where('option_key', $key)
					->update('site_options', $data); 
		return $sql_query;
	}

	public function getsentotplist($dt_to, $dt_from){
		$query = $this->db->where('rec_date >=', $dt_to)
				->where('rec_date <=', $dt_from)
				->order_by('id asc')
				->get('otpverification');
		return $query->result();      
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

	public function checkdataentry($mobile){
		$query = $this->db->where('mobileno',$mobile)
					->get('bulksms');
		return $query->num_rows(); 
	}

	public function deletemsgnumber($id){
		$sql_query = $this->db->where('id', $id)
					->delete('bulksms'); 
		return ($this->db->affected_rows() != 1) ? false : true; 
	}

	public function searchcustomerdigital($mobile){
		$query = $this->db->where('isDelete', 0)
				->like('mobile',$mobile)
				->get('user_registration');
		return $query->row();      
	}

	public function searchcustomerplan($mobile) {
		$query = $this->db->where('isDelete', 0)
		  ->like('mobile', $mobile)
		  ->get('user_subscription_registration');
		return $query->row();
	}

	public function searchcareer($mobile){
		$query = $this->db->like('mobile',$mobile)
				->get('career_enquiry');
		return $query->row();      
	}

	public function searchbulksms($mobile){
		$query = $this->db->like('mobileno',$mobile)
				->get('bulksms');
		return $query->row();      
	}

	public function getimpupdatelist(){
		$query = $this->db->where('isDelete',0)
					->order_by('id asc')
					->get('important_update')
					->result();
		return $query;
	}

	public function addimpupdate($data){
		$this->db->insert('important_update',$data);
		$bankid = $this->db->insert_id();

		return ($this->db->affected_rows() != 1) ? false : true; 
	}

	public function impupdatestatus($statusid, $id){
		if($statusid == 1) {
			$data = array(
			   'isActive' => 0
			);
		}
		else {
			$data = array(
			   'isActive' => 1
			);
		}
		$sql_query=$this->db->where('id', $id)
					->update('important_update', $data); 
	}

	public function deleteimpupdate($id){
		$data = array(
		   'isDelete' => 1
		);
		$sql_query=$this->db->where('id', $id)
					->update('important_update', $data); 
	}

	public function getaccountmsg(){
		$msgs = [];

		$query1 = $this->db->where('option_key', 'account-msg-customer')
					->get('site_options');
		$msgs['customermsg'] = $query1->row(); 

		return $msgs;
	}

	public function editaccountmsg($id, $data){
		$sql_query = $this->db->where('id', $id)
					->update('site_options', $data); 
		return $sql_query;
	}

	public function getinvoiceno(){
		$query = $this->db->select('option_value')
				->where('option_key', 'newinvoiceno')
				->get('site_options')
				->row();
		return $query->option_value;      
	}
	public function getremarketingloglist($dt_to, $dt_from, $parentid = 1)
	{
		$query = $this->db->select('id, rec_date, crontype, parentid, cronname, msgcount') 
			->where('parentid', $parentid)
			->where('CAST(rec_date as date) >=', $dt_to)
			->where('CAST(rec_date as date) <=', $dt_from)
			->order_by('id asc')
			->get('sms_log');
		return $query->result();
	}
	public function getsmslogdetails($id)
	{
		$query = $this->db->where('id', $id)
			->get('sms_log');
		return $query->row();
	}
	/*public function datasolvefunction(){
		$userlist = $this->db->select('id, rec_date')
				->where('id >=', 10000)
				->where('id <=', 20000)
				->order_by('id asc')
				->get('user_registration')
				->result();
		
		foreach ($userlist as $row) {
			$data = array(
				'update_date' => $row->rec_date
			);
			
			$query = $this->db->where('id', $row->id)
					->update('user_registration', $data); 
			
			echo $row->id;
			echo "<br/>";
		}
	}*/
	public function getstaffmemberlist(){
		$query = $this->db->where('isDelete',0)
				->order_by('id desc')
				->get('administration')
				->result();
		return $query;      
	}

	public function addstaffmember($data){
		$this->db->insert('administration',$data);
		$id = $this->db->insert_id();
		return $id; 
	}

	public function deletestaffaccount($id){
		$data = array(
		   'isActive' => 0,
		   'isDelete' => 1
		);
		$query_reg = $this->db->where('id', $id)
						->update('administration', $data); 

		return ($this->db->affected_rows() != 1) ? false : true;
	}
	 public function getfileremarkslist()
	{
		$query = $this->db->select('r.*, s.statusname')
			->from('loanstatus_remarks r')
			->join('loanstatus s', 's.id=r.statusid')
			->order_by('r.id asc')
			->get()
			->result();
		return $query;
	}

    public function getstatuslist()
	{
		$query = $this->db->order_by('priorityno asc')
			->get('loanstatus')
			->result();
		return $query;
	}

    public function addfileremark($data)
	{
		$this->db->insert('loanstatus_remarks', $data);
		$id = $this->db->insert_id();
		return $id;
	}

    public function getremarkdetails($id)
	{
		$query = $this->db->where('id', $id)
			->get('loanstatus_remarks')
			->row();
		return $query;
	}

    
	public function editfileremark($id, $data)
	{
		$query = $this->db->where('id', $id)
			->update('loanstatus_remarks', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;
		return $flag;
	}

    public function deleteremark($id)
	{
		$data = array(
			'isDelete' => 1
		);
		$query = $this->db->where('id', $id)
			->update('loanstatus_remarks', $data);

		$flag = ($this->db->affected_rows() != 1) ? false : true;
		return $flag;
	}

    public function restoreremark($id)
	{
		$data = array(
			'isDelete' => 0
		);
		$query = $this->db->where('id', $id)
			->update('loanstatus_remarks', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;
		return $flag;
	}
}

?>
