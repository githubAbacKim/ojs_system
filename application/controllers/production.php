<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Production extends CI_Controller {
	function __construct(){
		parent::__construct();

		date_default_timezone_set('Asia/Manila');
		//$this->is_log_in();
	}

	private function is_log_in(){
		if($this->session->userdata('isprod_log') == false){
			redirect('main');
		}
	}

	function logout(){
		if ($this->session->userdata('isprod_log') == true) {
			$this->session->unset_userdata('isprod_log');
			redirect('main');
		}
	}
	// new panel
	function index(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Dashboard";
		$data['page'] = 'Production';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('production/header',$data);
		$this->load->view('production/nav_v2',$data);
		$this->load->view('production/home',$data);
		$this->load->view('production/footer',$data);
	}

}
