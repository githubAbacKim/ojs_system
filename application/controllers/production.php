<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Production extends CI_Controller {
	function __construct(){
		parent::__construct();

		date_default_timezone_set('Asia/Manila');
		//$this->is_log_in();
	}

	// new panel
	function index(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Dashboard";
		$data['page'] = 'Production';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('adminpanel/header',$data);
		$this->load->view('adminpanel/newnav',$data);
		$this->load->view('adminpanel/home',$data);
		$this->load->view('adminpanel/footer',$data);
	}
