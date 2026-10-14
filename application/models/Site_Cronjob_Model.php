<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Site_Cronjob_Model extends CI_Model
{

	/* START : Digital loan customer marketing message */
	public function customer_leads_marketing($schedule = 9999)
	{
		$url = $smsmessage = $dataset = $smsresponse = '';

		$wheredate = "CAST(r.update_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";

		$userlist = $this->db->select('r.id, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where($wheredate)
			->where('r.rec_date >=', '2025-03-01 00:00:00')			
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDelete', 0)
			->where('r.cardtype', 11)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();

		if (count($userlist) > 0) {
			$this->load->model('Site_Info_Model');
			$smsmessage = $this->Site_Info_Model->getsmsmessage('pl-remarketing-sms');
			$SMSsenderid = getSMSsenderid('smssenderid');
			foreach ($userlist as $row) {
				if ($row->mobile != '') {
					$eligibilityamt = "500000";
					if ($row->loanamount != 0 && $row->income != 0 && $row->currentemi != 0) {
						$eligibilityamt = calEligiblity($row->income, $row->currentemi, 12.5, $row->loanamount);
					}
					$premessage = str_replace("<#cronamount>", $eligibilityamt, $smsmessage);

					$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>" . $row->mobile . "</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $SMSsenderid . "</senderid></sms>";
				}
			}

			$eligibilityamt = "500000";
			$premessage = str_replace("<#cronamount>", $eligibilityamt, $smsmessage);

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>7984310891</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $SMSsenderid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>7201825971</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $SMSsenderid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>9898339014</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $SMSsenderid . "</senderid></sms>";

			$smsresponse = sendxmlSMSobb($dataset);

			/* $msgentry1 = str_replace($smsmessage,"digital pl",$smsresponse); */

			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'customer',
				'parentid' => 1,
				'cronname' => 'custlead - ' . $schedule,
				'msgcount' => count($userlist),
				'msgresponse' => $smsresponse
			);

			$this->db->insert('sms_log', $data1);
		}

		return true;
	}
	/* END : Digital loan customer marketing message */

	public function customer_leads_marketing_BL($schedule = 9999)
	{
		$url = $smsmessage = $dataset = $smsresponse = '';

		$wheredate = "CAST(r.update_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";

		$userlist = $this->db->select('r.id, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where($wheredate)
			->where('r.rec_date >=', '2025-03-01 00:00:00')				
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDelete', 0)
			->where('r.cardtype', 12)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();

		if (count($userlist) > 0) {
			$this->load->model('Site_Info_Model');
			$smsmessage = $this->Site_Info_Model->getsmsmessage('pl-remarketing-sms');
			$SMSsenderid = getSMSsenderid('smssenderid');
			foreach ($userlist as $row) {
				if ($row->mobile != '') {
					$eligibilityamt = "500000";
					if ($row->loanamount != 0 && $row->income != 0 && $row->currentemi != 0) {
						$eligibilityamt = calEligiblity($row->income, $row->currentemi, 12.5, $row->loanamount);
					}
					$premessage = str_replace("<#cronamount>", $eligibilityamt, $smsmessage);

					$dataset .= "<sms><user>" . SMS_OBB_USERNAME_BL . "</user><password>" . SMS_OBB_PASSWORD_BL . "</password><mobiles>" . $row->mobile . "</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID_BL . "</senderid></sms>";
				}
			}

			$eligibilityamt = "500000";
			$premessage = str_replace("<#cronamount>", $eligibilityamt, $smsmessage);

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME_BL . "</user><password>" . SMS_OBB_PASSWORD_BL . "</password><mobiles>7984310891</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID_BL . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME_BL . "</user><password>" . SMS_OBB_PASSWORD_BL . "</password><mobiles>7201825971</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID_BL . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME_BL . "</user><password>" . SMS_OBB_PASSWORD_BL . "</password><mobiles>9898339014</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID_BL . "</senderid></sms>";

			$smsresponse = sendxmlSMSobb($dataset);

			/* $msgentry1 = str_replace($smsmessage,"digital pl",$smsresponse); */

			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'customer',
				'parentid' => 11,
				'cronname' => 'custlead' . $schedule,
				'msgcount' => count($userlist),
				'msgresponse' => $smsresponse
			);

			$this->db->insert('sms_log', $data1);
		}

		return true;
	}
	/* END : Digital loan customer marketing message */


	/* START : Whatsapp marketing message */
	public function whatsapp_marketing_message_BL($schedule = 9999)
	{
		$airesponse = "";
		$cnt = 1;

		$this->load->model('Site_Info_Model');
		$wpcampaignname = $this->Site_Info_Model->getsmsmessage('wpcampaignmain');

		$wheredate = "CAST(r.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";

		$userlist = $this->db->select('r.id, r.rec_date, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where($wheredate)
			->where('r.rec_date >=', '2025-03-01 00:00:00')	
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDnd', 0)
			->where('r.isDelete', 0)
			->where('r.cardtype', 12)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();

		if (count($userlist) > 0) {
			foreach ($userlist as $row) {
				if ($row->mobile != '') {
					$eligibilityamt = "5,00,000";

					if ($row->loanamount != 0 && $row->income != 0) {
						$eligibilityamtsimple = calEligiblity($row->income, $row->currentemi, 11, $row->loanamount);
						$eligibilityamt = formatePriceIndia($eligibilityamtsimple, 0);
					}

					$data1 = array(
						'apiKey' => AISENSY_KEY,
						'campaignName' => 'bl_rm_5jan',
						'destination' => '+91' . $row->mobile,
						'media' => array(
							'url' => AISENSY_MARKETING_URL_BL,
							'filename' => AISENSY_MARKETING_IMAGE_BL
						),
						'userName' => $row->fullname,
						'templateParams' => array('$Name', '$EligibleAmount'),
						'tags' => array('Get Offer'),
						'attributes' => array(
							'EligibleAmount' => strval($eligibilityamt)
						)
					);
					$restrack1 = aisensy_track($data1);
					$airesponse .= $row->mobile . "-" . $restrack1 . "|";
					$cnt++;
				}
			}

			$adminlist = ['7984310891', '7201825971', '9898339014'];
			$eligibilityamt = "5,00,000";

			foreach ($adminlist as $row2) {
				$data2 = array(
					'apiKey' => AISENSY_KEY,
					'campaignName' => 'bl_rm_5jan',
					'destination' => '+91' . $row2,
					'media' => array(
						'url' => AISENSY_MARKETING_URL_BL,
						'filename' => AISENSY_MARKETING_IMAGE_BL
					),
					'userName' => '$Name',
					'templateParams' => array('$Name', '$EligibleAmount'),
					'tags' => array('Get Offer'),
					'attributes' => array(
						'EligibleAmount' => strval($eligibilityamt)
					)
				);
				$restrack2 = aisensy_track($data2);
				$airesponse .= $row2 . "-" . $restrack2 . "|";
				$cnt++;
			}

			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'whatsapp digital BL',
				'parentid' => 12,
				'cronname' => 'whatsapp BL - ' . $schedule,
				'msgcount' => $cnt,
				'msgresponse' => $airesponse
			);

			$this->db->insert('sms_log', $data1);
		}

		return true;
	}
	/* END : Whatsapp marketing message */


	/* START : Whatsapp marketing message */
	public function whatsapp_marketing_message($schedule = 9999)
	{
		$airesponse = "";
		$cnt = 1;

		$this->load->model('Site_Info_Model');
		$wpcampaignname = $this->Site_Info_Model->getsmsmessage('wpcampaignmain');

		$wheredate = "CAST(r.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";

		$userlist = $this->db->select('r.id, r.rec_date, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where($wheredate)
			->where('r.rec_date >=', '2025-03-01 00:00:00')	
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDnd', 0)
			->where('r.isDelete', 0)
			->where('r.cardtype', 11)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();

		if (count($userlist) > 0) {
		    $data3 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'whatsapp digital',
				'parentid' => 2,
				'cronname' => 'whatsapp - ' . $schedule,
				'msgcount' => count($userlist)
			);

			$this->db->insert('sms_log', $data3);
			$logid = $this->db->insert_id();

			$adminlist = ['7984310891', '7201825971', '9898339014'];
			$eligibilityamt = "5,00,000";

			foreach ($adminlist as $row2) {
				$data2 = array(
					'apiKey' => AISENSY_KEY,
					'campaignName' => $wpcampaignname,
					'destination' => '+91' . $row2,
					'media' => array(
						'url' => AISENSY_MARKETING_URL,
						'filename' => AISENSY_MARKETING_IMAGE
					),
					'userName' => '$Name',
					'templateParams' => array('$Name', '$EligibleAmount'),
					'tags' => array('Get Offer'),
					'attributes' => array(
						'EligibleAmount' => strval($eligibilityamt)
					)
				);
				$restrack2 = aisensy_track($data2);
				$airesponse .= $row2 . "-" . $restrack2 . "|";
				$data4 = array(
					'msgcount' => $cnt,
					'msgresponse' => $airesponse
				 );
				   
				$query = $this->db->where('id', $logid)
				   ->update('sms_log', $data4);
				$cnt++;
			}
			
			foreach ($userlist as $row) {
				if ($row->mobile != '') {
					$eligibilityamt = "5,00,000";

					if ($row->loanamount != 0 && $row->income != 0) {
						$eligibilityamtsimple = calEligiblity($row->income, $row->currentemi, 11, $row->loanamount);
						$eligibilityamt = formatePriceIndia($eligibilityamtsimple, 0);
					}

					$data1 = array(
						'apiKey' => AISENSY_KEY,
						'campaignName' => $wpcampaignname,
						'destination' => '+91' . $row->mobile,
						'media' => array(
							'url' => AISENSY_MARKETING_URL,
							'filename' => AISENSY_MARKETING_IMAGE
						),
						'userName' => $row->fullname,
						'templateParams' => array('$Name', '$EligibleAmount'),
						'tags' => array('Get Offer'),
						'attributes' => array(
							'EligibleAmount' => strval($eligibilityamt)
						)
					);
					$restrack1 = aisensy_track($data1);
					$airesponse .= $row->mobile . "-" . $restrack1 . "|";
					$data4 = array(
						'msgcount' => $cnt,
						'msgresponse' => $airesponse
					 );
					   
				    $query = $this->db->where('id', $logid)
					   ->update('sms_log', $data4);
					$cnt++;
				}
			}
			
		}

		return true;
	}
	/* END : Whatsapp marketing message */

	
	/* START : Digital RCS customer marketing message */
	public function customer_leads_marketing_RCS($schedule = 9999)
	{
		$url = $smsmessage = $dataset = $smsresponse = '';

		$wheredate = "CAST(r.update_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";

		$userlist = $this->db->select('r.id, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where($wheredate)
			//->where('r.rec_date >=', '2024-10-24 00:00:00')			
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDelete', 0)
			->where('r.cardtype', 11)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();

		if (count($userlist) > 0) {
			$this->load->model('Site_Info_Model');
			foreach ($userlist as $row) {
				if ($row->mobile != '') {
					$mobiledata[] = '91'.$row->mobile;
				}
			}

			$mobiledata[] = '917984310891';
        	$mobiledata[] = '917201825971';
			$mobiledata[] = '919898339014';
			

			$this->load->helper('rcs');
       		$response = sendRCSmessage($mobiledata);

			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'customer RCS',
				'parentid' => 15,
				'cronname' => 'RCS - ' . $schedule,
				'msgcount' => count($userlist),
				'msgresponse' => $response
			);

			$this->db->insert('sms_log', $data1);
		}

		return true;
	}
	/* END : Digital loan customer marketing message */

	/* START : Whatsapp INTERAKT marketing message  interakt*/ 

	public function whatsapp_interakt_marketing_message($schedule = 9999) {

		$airesponse = "";
		$cnt = 1;

		$this->load->model('Site_Info_Model');
		$wpcampaignname = $this->Site_Info_Model->getsmsmessage('wpcampaignmain');

		$wheredate = "CAST(r.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";

		$userlist = $this->db->select('r.id, r.rec_date, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where($wheredate)
			->where('r.rec_date >=', '2025-03-01 00:00:00')	
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDnd', 0)
			->where('r.isDelete', 0)
			->where('r.cardtype', 11)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();
			
		if(count($userlist) > 0) {
			$data1 = array(
			 'rec_date' => date('Y-m-d H:i:s'),
			 'crontype' => 'whatsapp interakt',
			 'parentid' => 13,
			 'cronname' => 'whatsapp interakt - ' . $schedule,
			 'msgcount' => $cnt,
			 'msgresponse' => $airesponse
			);

			$this->db->insert('sms_log', $data1);
			$logid = $this->db->insert_id();

			$adminlist = ['7984310891', '7201825971', '9898339014'];
			$eligibilityamt = "5,00,000";

			foreach($adminlist as $row2) {
				$data4 = array(
					"fullPhoneNumber" => '+91'.$row2,
					"callbackData"=> "some text here",
					"type"=> "Template",
					"template"=> array(
							"name"=> "ind_5jan_rm_1",
							"languageCode"=> "en",
							"headerValues"=> array(
								"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/7e6765c8-697e-4752-b7ea-8ee6c77adad3/message_template_media/kTkzRzkbb3dp/Ind_rm_5jan.jpeg?se=2030-12-30T05%3A58%3A40Z&sp=rt&sv=2019-12-12&sr=b&sig=KLxkP2aJtPXJEH7H9E6d6tTOOt8XoYjH/yzCRR%2By/VI%3D"
							),
							"bodyValues"=> array(
								'$name', $eligibilityamt
							),
						)
				
				);
				$restrack5 = interakt_track($data4);
				$airesponse .= $row2 . "-" . $restrack5 . "|";
				$data4 = array(
					'msgcount' => $cnt,
					'msgresponse' => $airesponse
				 );
				   
				$query = $this->db->where('id', $logid)
				   ->update('sms_log', $data4);
				$cnt++;
			}
			
			foreach($userlist as $row) {
				if($row->mobile != '') {
					$eligibilityamt = "5,00,000";

					if($row->loanamount!=0 && $row->income!=0) {
						$eligibilityamtsimple = calEligiblity($row->income, $row->currentemi, 11, $row->loanamount);
						$eligibilityamt = formatePriceIndia($eligibilityamtsimple, 0);
					}

					 // Whatsapp INTERAKT Code
						$data4 = array(
							"fullPhoneNumber" => '+91'.$row->mobile,
							"callbackData"=> "some text here",
							"type"=> "Template",
							"template"=> array(
									"name"=> "ind_5jan_rm_1",
									"languageCode"=> "en",
									"headerValues"=> array(
										"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/7e6765c8-697e-4752-b7ea-8ee6c77adad3/message_template_media/kTkzRzkbb3dp/Ind_rm_5jan.jpeg?se=2030-12-30T05%3A58%3A40Z&sp=rt&sv=2019-12-12&sr=b&sig=KLxkP2aJtPXJEH7H9E6d6tTOOt8XoYjH/yzCRR%2By/VI%3D"
									),
									"bodyValues"=> array(
										$row->fullname, $eligibilityamt
									),
								)
						
						);
						$restrack4 = interakt_track($data4);
						$airesponse .= $row->mobile . "-" . $restrack4 . "|";
						$data4 = array(
							'msgcount' => $cnt,
							'msgresponse' => $airesponse
						);
						
						$query = $this->db->where('id', $logid)
						->update('sms_log', $data4);
					$cnt++;
				}
			}
			
		}

		return true;

	}


	/* END : Whatsapp INTERAKT marketing message */


	/* START : Bharatfincash customer marketing message */
	public function bharatfincash_customer_leads_marketing($schedule = 9999)
	{
		$url = $smsmessage = $dataset = $smsresponse = '';

		$wheredate = "CAST(r.update_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";

		$userlist = $this->db->select('r.id, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_subscription_registration r')
			->join('user_subscription_application a', 'a.userid=r.id')
			->where($wheredate)
			->where('r.rec_date >=', '2025-11-09 00:00:00')			
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDelete', 0)
			->where('r.cardtype', 21)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();

		if (count($userlist) > 0) {
			$this->load->model('Site_Info_Model');
			$smsmessage = $this->Site_Info_Model->getsmsmessage('subscription-remarketing-sms');
			$SMSsenderid = getSMSsenderid('smssenderid-subscription');
			foreach ($userlist as $row) {
				if ($row->mobile != '') {
					$eligibilityamt = "500000";
					if ($row->loanamount != 0 && $row->income != 0 && $row->currentemi != 0) {
						$eligibilityamt = calEligiblity($row->income, $row->currentemi, 12.5, $row->loanamount);
					}
					$premessage = str_replace("<#cronamount>", $eligibilityamt, $smsmessage);

					$dataset .= "<sms><user>" . SMS_BFC_OBB_USERNAME . "</user><password>" . SMS_BFC_OBB_PASSWORD . "</password><mobiles>" . $row->mobile . "</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $SMSsenderid . "</senderid></sms>";
				}
			}

			$eligibilityamt = "500000";
			$premessage = str_replace("<#cronamount>", $eligibilityamt, $smsmessage);

			$dataset .= "<sms><user>" . SMS_BFC_OBB_USERNAME . "</user><password>" . SMS_BFC_OBB_PASSWORD . "</password><mobiles>7984310891</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $SMSsenderid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_BFC_OBB_USERNAME . "</user><password>" . SMS_BFC_OBB_PASSWORD . "</password><mobiles>7201825971</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $SMSsenderid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_BFC_OBB_USERNAME . "</user><password>" . SMS_BFC_OBB_PASSWORD . "</password><mobiles>9898339014</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $SMSsenderid . "</senderid></sms>";

			$smsresponse = sendxmlSMSobb($dataset);

			/* $msgentry1 = str_replace($smsmessage,"digital pl",$smsresponse); */

			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'Subscription Customer',
				'parentid' => 3,
				'cronname' => 'custlead - ' . $schedule,
				'msgcount' => count($userlist),
				'msgresponse' => $smsresponse
			);

			$this->db->insert('sms_log', $data1);
		}

		return true;
	}
	/* END : Bharatfincash customer marketing message */

	/* START : Bharatfincash whatsapp interakt marketing message */ 

	public function subscription_whatsapp_interakt_marketing_message($schedule = 9999) {

		$airesponse = "";
		$cnt = 1;

		$wheredate = "CAST(r.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";

		$userlist = $this->db->select('r.id, r.rec_date, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_subscription_registration r')
			->join('user_subscription_application a', 'a.userid=r.id')
			->where($wheredate)
			->where('r.rec_date >=', '2025-12-14 00:00:00')	
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDnd', 0)
			->where('r.isDelete', 0)
			->where('r.cardtype', 21)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();
			
		if(count($userlist) > 0) {
			$data1 = array(
			 'rec_date' => date('Y-m-d H:i:s'),
			 'crontype' => 'bharatfincash whatsapp interakt',
			 'parentid' => 14,
			 'cronname' => 'whatsapp interakt - ' . $schedule,
			 'msgcount' => $cnt,
			 'msgresponse' => $airesponse
			);

			$this->db->insert('sms_log', $data1);
			$logid = $this->db->insert_id();

			$adminlist = ['7984310891', '7201825971', '9898339014'];
			$eligibilityamt = "5,00,000";

			foreach($adminlist as $row2) {
				$data4 = array(
					"fullPhoneNumber" => '+91'.$row2,
					"callbackData"=> "some text here",
					"type"=> "Template",
					"template"=> array(
							"name"=> "19feb_rm_1",
							"languageCode"=> "en",
							"headerValues"=> array(
								"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/585c5788-5323-46b7-b8fe-e2f001d667b8/message_template_media/twwWvJIJw7fC/bharatfincash_rm_19feb.jpeg?se=2031-02-13T05%3A30%3A33Z&sp=rt&sv=2019-12-12&sr=b&sig=glqRCJTc1vOUpOsolIptOGDwY9ikyWitUhCARBMhiKg%3D"
							),
							"bodyValues"=> array(
								'$name', $eligibilityamt
							),
						)
				
				);
				$restrack5 = subscription_interakt_track($data4);
				$airesponse .= $row2 . "-" . $restrack5 . "|";
				$data4 = array(
					'msgcount' => $cnt,
					'msgresponse' => $airesponse
				 );
				   
				$query = $this->db->where('id', $logid)
				   ->update('sms_log', $data4);
				$cnt++;
			}
			
			foreach($userlist as $row) {
				if($row->mobile != '') {
					$eligibilityamt = "5,00,000";

					if($row->loanamount!=0 && $row->income!=0) {
						$eligibilityamtsimple = calEligiblity($row->income, $row->currentemi, 11, $row->loanamount);
						$eligibilityamt = formatePriceIndia($eligibilityamtsimple, 0);
					}

					 // Whatsapp INTERAKT Code
						$data4 = array(
							"fullPhoneNumber" => '+91'.$row->mobile,
							"callbackData"=> "some text here",
							"type"=> "Template",
							"template"=> array(
									"name"=> "19feb_rm_1",
									"languageCode"=> "en",
									"headerValues"=> array(
										"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/585c5788-5323-46b7-b8fe-e2f001d667b8/message_template_media/twwWvJIJw7fC/bharatfincash_rm_19feb.jpeg?se=2031-02-13T05%3A30%3A33Z&sp=rt&sv=2019-12-12&sr=b&sig=glqRCJTc1vOUpOsolIptOGDwY9ikyWitUhCARBMhiKg%3D"
									),
									"bodyValues"=> array(
										$row->fullname, $eligibilityamt
									),
								)
						
						);
						$restrack4 = subscription_interakt_track($data4);
						$airesponse .= $row->mobile . "-" . $restrack4 . "|";
						$data4 = array(
							'msgcount' => $cnt,
							'msgresponse' => $airesponse
						);
						
						$query = $this->db->where('id', $logid)
						->update('sms_log', $data4);
					$cnt++;
				}
			}
			
		}

		return true;

	}

	/* END : Bharatfincash whatsapp interakt marketing message */

	/* START : Bharatfincash whatsapp interakt marketing message */ 

	public function subscription_whatsapp_interakt_marketing_message_p2($schedule = 9999) {

		$airesponse = "";
		$cnt = 1;

		$wheredate = "CAST(r.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";

		$userlist = $this->db->select('r.id, r.rec_date, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_subscription_registration r')
			->join('user_subscription_application a', 'a.userid=r.id')
			->where($wheredate)
			->where('r.rec_date >=', '2025-12-14 00:00:00')	
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDnd', 0)
			->where('r.isDelete', 0)
			->where('r.cardtype', 21)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();
			
		if(count($userlist) > 0) {
			$data1 = array(
			 'rec_date' => date('Y-m-d H:i:s'),
			 'crontype' => 'bharatfincash whatsapp interakt p2 ',
			 'parentid' => 16,
			 'cronname' => 'whatsapp interakt - ' . $schedule,
			 'msgcount' => $cnt,
			 'msgresponse' => $airesponse
			);

			$this->db->insert('sms_log', $data1);
			$logid = $this->db->insert_id();

			$adminlist = ['7984310891', '7201825971', '9898339014'];
			$eligibilityamt = "5,00,000";

			foreach($adminlist as $row2) {
				$data4 = array(
					"fullPhoneNumber" => '+91'.$row2,
					"callbackData"=> "some text here",
					"type"=> "Template",
					"template"=> array(
							"name"=> "5march_rm_1",
							"languageCode"=> "en",
							"headerValues"=> array(
								"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/f0e67ce7-ace2-43c1-a11c-cb83115d3a07/message_template_media/1bAA4asmUM8R/bharatfincash_rm_5march.jpeg?se=2031-02-27T12%3A22%3A20Z&sp=rt&sv=2019-12-12&sr=b&sig=iRDBF6o81kwxy6LxE9zpj0w4vlvHUfVV9cm2hoICo5w%3D"
							),
							"bodyValues"=> array(
								'$name', $eligibilityamt
							),
						)
				
				);
				$restrack5 = subscription_interakt_track_p2($data4);
				$airesponse .= $row2 . "-" . $restrack5 . "|";
				$data4 = array(
					'msgcount' => $cnt,
					'msgresponse' => $airesponse
				 );
				   
				$query = $this->db->where('id', $logid)
				   ->update('sms_log', $data4);
				$cnt++;
			}
			
			foreach($userlist as $row) {
				if($row->mobile != '') {
					$eligibilityamt = "5,00,000";

					if($row->loanamount!=0 && $row->income!=0) {
						$eligibilityamtsimple = calEligiblity($row->income, $row->currentemi, 11, $row->loanamount);
						$eligibilityamt = formatePriceIndia($eligibilityamtsimple, 0);
					}

					 // Whatsapp INTERAKT Code
						$data4 = array(
							"fullPhoneNumber" => '+91'.$row->mobile,
							"callbackData"=> "some text here",
							"type"=> "Template",
							"template"=> array(
									"name"=> "5march_rm_1",
									"languageCode"=> "en",
									"headerValues"=> array(
										"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/f0e67ce7-ace2-43c1-a11c-cb83115d3a07/message_template_media/1bAA4asmUM8R/bharatfincash_rm_5march.jpeg?se=2031-02-27T12%3A22%3A20Z&sp=rt&sv=2019-12-12&sr=b&sig=iRDBF6o81kwxy6LxE9zpj0w4vlvHUfVV9cm2hoICo5w%3D"
									),
									"bodyValues"=> array(
										$row->fullname, $eligibilityamt
									),
								)
						
						);
						$restrack4 = subscription_interakt_track_p2($data4);
						$airesponse .= $row->mobile . "-" . $restrack4 . "|";
						$data4 = array(
							'msgcount' => $cnt,
							'msgresponse' => $airesponse
						);
						
						$query = $this->db->where('id', $logid)
						->update('sms_log', $data4);
					$cnt++;
				}
			}
			
		}

		return true;

	}

	/* END : Bharatfincash whatsapp interakt marketing message */

}
?>
