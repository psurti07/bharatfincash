<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Product extends CI_Controller {
	
	public function index(){
		$this->load->model('Site_Info_Model');
		return redirect()->to('Membershipcard/standard');;
	}

	public function personal(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('personal-loan-plan');
		$productdata = $this->Site_Info_Model->getproductdetails('digital-personal-loan');
		$banklist = $this->Site_Info_Model->getbanklist();

		$this->load->view('personal-loan-plan',['meta'=>$meta, 'banklist'=>$banklist, 'productdata'=>$productdata]);
	}

	public function business(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('business-loan-plan');
		$productdata = $this->Site_Info_Model->getproductdetails('digital-business-loan');
		$banklist = $this->Site_Info_Model->getbanklist();

		$this->load->view('business-loan-plan',['meta'=>$meta, 'banklist'=>$banklist, 'productdata'=>$productdata]);
	}

	public function bharatfincash(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('bharatfincash-subscription');
		$productdata = $this->Site_Info_Model->getproductdetails('bharatfincash-subscription');
		$banklist = $this->Site_Info_Model->getbanklist();

		$this->load->view('bharatfincash-plan',['meta'=>$meta, 'banklist'=>$banklist, 'productdata'=>$productdata]);
	}

}
?>