<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LocationController extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('site'); 
    }

    public function get_location($pincode) {
        $data = get_location_by_pincode($pincode);
        echo json_encode($data);
    }
}
?>
