<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->dbforge();
		$this->is_log_in();
		//echo $this->my_mac();
		/* if ($this->pre_installation() == FALSE) {
			$this->pre_installation();
		}else{
			$this->is_log_in();
		} */
	}

	private function my_mac(){
		$ip = $_SERVER['REMOTE_ADDR'];
		ob_start();
		$arp_output = `arp -a $ip`;
		ob_clean();
		$mac = substr($arp_output,101,27);

		if (!$mac) {
			ob_start(); // Turn on output buffering
			system('ipconfig /all'); //Execute external program to display output
			$mycom=ob_get_contents(); // Capture the output into a variable
			ob_clean(); // Clean (erase) the output buffer

			$findme = "Physical";
			$pmac = strpos($mycom, $findme); // Find the position of Physical text
			$mac=substr($mycom,($pmac+36),17); // Get Physical Address
			return strtoupper($mac);
		}else{
			return strtoupper($mac);
		}
	}

	function index(){
		$mac = str_replace(" ", "", $this->my_mac());
		$where = array('mac_address'=>$mac);
		$mac_addresses = $this->project_model->select('assign_access',false,$where);

		if ($mac_addresses != false) {
			$this->login_landing();
		}else{
			redirect('main/error_page');
		}
	}

	private function get_accountType($mac){
		$where = array('mac_address'=>$mac);
		$data = $this->project_model->select('assign_access',$where);
		if ($data !== false) {
			return $data;
		}else{
			return false;
		}

	}

	function filter_mac(){
		$mac = str_replace(" ", "", $this->my_mac());
		$where = array('mac_address'=>$mac);
		$mac_addresses = $this->project_model->select('assign_access',false,$where);

		if ($mac_addresses != false) {
			echo 'true';
		}else{
			echo 'false';
		}
	}

	function login_landing(){
		$mac = $this->my_mac();
		$mac = str_ireplace(" ", "", $mac);
		$data['useraccts'] = $this->get_accountType($mac);
		$data['title'] = "Landing Page";
		$data['sub_heading'] = 'Landing Page';
		$this->load->view("admin/header",$data);
		$this->load->view("main/landing_page",$data);
		$this->load->view("footer");

	}

	private function adminLogin(){
		$data['title'] = "Administrator";
		$data['sub_heading'] = 'Login';
		$data['error'] = '';
		$this->load->view("header",$data);
		$this->load->view("main/admin_login",$data);
		$this->load->view("footer");
	}

	private function frontdeskLogin(){
		$data['title'] = "Frontdesk Login";
		$data['sub_heading'] = 'Login';
		$data['error'] = '';
		$this->load->view("header",$data);
		$this->load->view("main/frontdesk_login",$data);
		$this->load->view("footer");
	}

	private function productionLogin(){
		$data['title'] = "Production Login";
		$data['sub_heading'] = 'Login';
		$data['error'] = '';
		$this->load->view("header",$data);
		$this->load->view("main/production_login",$data);
		$this->load->view("footer");
	}

	function admin_login(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Administrator';
			$data['sub_heading'] = 'Validation Error!';
			$data['error'] = '';
			$this->load->view('header',$data);
			$this->load->view('main/admin_login',$data);
			$this->load->view('footer');
		}else{
			$table = 'property_info';
			$where = array(
				'admin_username'=>set_value('username'),
				'admin_password'=>sha1(set_value('password'))
				);
			$log = $this->main_model->val_login($table,$where);
			if ($log == true){
				$this->session->set_userdata('isposadmin_log',true);
				redirect('admin');
			}else{
				$data['title'] = 'Administrator';
				$data['sub_heading'] = 'Login Error!';
				$data['error'] = 'match';
				$this->load->view('header',$data);
				$this->load->view('main/admin_login',$data);
				$this->load->view('footer');
			}
		}
	}

	function frontdesk_login(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Frontdesk Login';
			$data['sub_heading'] = 'Validation Error!';
			$data['error'] = '';
			$this->load->view('header',$data);
			$this->load->view('main/frontdesk_login',$data);
			$this->load->view('footer');
		}else{
			$table = 'emp_accounts';
			$where = array(
				'emp_username'=>set_value('username'),
				'emp_password'=>sha1(set_value('password'))
				);
			$log = $this->main_model->val_login($table,$where,$return=true);
			if ($log[0] == true){
				$newdata = array(
					'ispos_log'=>$log[0],
					'current_id'=>$log[1]
					);
				$this->session->set_userdata($newdata);
				redirect('clientPos');
			}else{
				$data['title'] = "Frontdesk Login";
				$data['sub_heading'] = 'Login Error';
				$data['error'] = 'match';
				$this->load->view("header",$data);
				$this->load->view("main/frontdesk_login",$data);
				$this->load->view("footer");
			}
		}
	}

	function production_login(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Production Login';
			$data['sub_heading'] = 'Validation Error!';
			$data['error'] = '';
			$this->load->view('header',$data);
			$this->load->view('main/production_login',$data);
			$this->load->view('footer');
		}else{
			$table = 'emp_accounts';
			$where = array(
				'emp_username'=>set_value('username'),
				'emp_password'=>sha1(set_value('password'))
				);
			$log = $this->main_model->val_login($table,$where,$return=true);
			if ($log[0] == true){
				$newdata = array(
					'ispos_log'=>$log[0],
					'current_id'=>$log[1]
					);
				$this->session->set_userdata($newdata);
				redirect('clientPos');
			}else{
				$data['title'] = "Production Login";
				$data['sub_heading'] = 'Login Error';
				$data['error'] = 'match';
				$this->load->view("header",$data);
				$this->load->view("main/production_login",$data);
				$this->load->view("footer");
			}
		}
	}

	function error_page(){
		$data['title'] = "Error Page";
		$data['sub_heading'] = 'Login';
		$data['mac'] = $this->my_mac();
		$this->load->view("admin/header",$data);
		$this->load->view("main/error_page",$data);
		$this->load->view("footer");
	}

	private function is_log_in(){
		if ($this->session->userdata('isposadmin_log') == true) {
			redirect('admin');
		}elseif ($this->session->userdata('ispos_log') == true) {
			redirect('clientPos');
		}
	}

	function filterLink(){
		$type = $this->uri->segment(3);
		if ($type == "admin") {
			$this->adminLogin();
		}elseif($type == "frontdesk"){
			$this->frontdeskLogin();
		}elseif($type == "production"){
			$this->productionLogin();
		}
	}

	private function db_create(){

		// phase 1 create database
		$db = 'sample';
		if ($this->project_model->create_db($db) !== FALSE) {
			echo 'true';
		}else{
			echo 'false';
		}


		// phase 2 create tables

		// phase 3 system information

		// ask to register current computer ip

	}

	function checkNewInstall(){
		$this->db->query('use sample');
		if ($this->db->_error_number() == '1049' ) {
			if ($this->db_create() == true) {
				//create tables (phase 2)
				$field1 = array(
					'assign_access_id' => array(
						'type' => 'INT',
						'constraint' => 10,
						'unsigned' => TRUE,
						'NOT NULL' => TRUE,
						'auto_increment' => TRUE
					),
					'account_type' => array(
						'type' => 'VARCHAR',
						'constraint' => 45,
						'NOT NULL' => TRUE
					),
					'mac_address' => array(
						'type' => 'VARCHAR',
						'constraint' => 85,
						'NOT NULL' => TRUE
					),
					'account_type' => array(
						'type' => 'VARCHAR',
						'constraint' => 45,
						'NOT NULL' => TRUE
					),
				);

				$elements = array(
					array('assign_access','assign_access_id',$field1),
					/* array('employee','emp_id',$field1),
					array('emp_accounts','emp_account_id',$field1),
					array('emp_attendance','emp_attendance_id',$field1),
					array('emp_credits','emp_credit_id',$field1),
					array('emp_overtime','emp_overtime_id',$field1),
					array('emp_salary','salary_id',$field1),
					array('emp_shift','emp_shift_id',$field1),
					array('expenses_equip','expequip_id',$field1),
					array('expenses_misc','misc_id',$field1),
					array('expenses_prod','prod_id',$field1),
					array('expenses_returns','returns_id',$field1),
					array('expenses_stocks','expstocks_id',$field1),
					array('incomestatement','statement_id',$field1),
					array('job_position','job_position_id',$field1),
					array('menu_item','menu_item_id',$field1),
					array('officeitems','office_id',$field1),
					array('order','order_id',$field1),
					array('ordered_item','order_item_id',$field1),
					array('overtime_type','ot_type_id',$field1),
					array('productionitems','production_id',$field1),
					array('property_info','property_id',$field1),
					array('rate_types','rate_type_id',$field1),
					array('releasecart','releaseCart_id',$field1),
					array('releaseditem','release_item_id',$field1),
					array('restockcart','restock_id',$field1),
					array('restock_items','restockitem_id',$field1),
					array('salary_term','salary_term_id',$field1),
					array('stockcategory','stockCat_id',$field1),
					array('stockchannel','channel_id',$field1),
					array('stockitem','stock_id',$field1),
					array('store_menu','menu_id',$field1) */

				);
				$this->porject_model->create_table($fields,$primaryKey,$table,$db);
			}
		}else{
			$field1 = array(
				'assign_access_id' => array(
					'type' => 'INT',
					'constraint' => 10,
					'unsigned' => TRUE,
					'NOT NULL' => TRUE,
					'auto_increment' => TRUE
				),
				'account_type' => array(
					'type' => 'VARCHAR',
					'constraint' => 45,
					'NOT NULL' => TRUE
				),
				'mac_address' => array(
					'type' => 'VARCHAR',
					'constraint' => 85,
					'NOT NULL' => TRUE
				),
				'account_type' => array(
					'type' => 'VARCHAR',
					'constraint' => 45,
					'NOT NULL' => TRUE
				),
			);
			$field2 = array(
				'emp_id' => array(
					'type' => 'INT',
					'constraint' => 10,
					'unsigned' => TRUE,
					'NOT NULL' => TRUE,
					'auto_increment' => TRUE
				),
				'emp_code' => array(
					'type' => 'CHAR',
					'constraint' => 20,
					'NOT NULL' => FALSE
				),
				'emp_lname' => array(
					'type' => 'VARCHAR',
					'constraint' => 45,
					'NOT NULL' => FALSE
				),
				'emp_mname' => array(
					'type' => 'VARCHAR',
					'constraint' => 45,
					'NOT NULL' => FALSE
				),
				'emp_fname' => array(
					'type' => 'VARCHAR',
					'constraint' => 45,
					'NOT NULL' => FALSE
				),
				'emp_bday' => array(
					'type' => 'CHAR',
					'constraint' => 15,
					'NOT NULL' => FALSE
				),
				'emp_contact' => array(
					'type' => 'CHAR',
					'constraint' => 11,
					'NOT NULL' => FALSE
				),
				'emp_address' => array(
					'type' => 'VARCHAR',
					'constraint' => 85,
					'NOT NULL' => FALSE
				),
				'emp_email' => array(
					'type' => 'VARCHAR',
					'constraint' => 45,
					'NOT NULL' => FALSE
				),
				'job_position_id' => array(
					'type' => 'INT',
					'constraint' => 10,
					'unsigned' => TRUE,
					'NOT NULL' => TRUE
				),
				'emp_status' => array(
					'type' => 'VARCHAR',
					'constraint' => 45,
					'NOT NULL' => TRUE
				),
			);
			$field3 = array(
				'emp_account_id' => array(
					'type' => 'INT',
					'constraint' => 10,
					'unsigned' => TRUE,
					'NOT NULL' => TRUE,
					'auto_increment' => TRUE
				),
				'emp_id' => array(
					'type' => 'INT',
					'constraint' => 10,
					'unsigned' => TRUE,
					'NOT NULL' => TRUE
				),
				'emp_username' => array(
					'type' => 'VARCHAR',
					'constraint' => 55,
					'NOT NULL' => TRUE
				),
				'emp_password' => array(
					'type' => 'VARCHAR',
					'constraint' => 85,
					'NOT NULL' => TRUE
				),
				'account_type' => array(
					'type' => 'VARCHAR',
					'constraint' => 45,
					'NOT NULL' => TRUE
				),
			);
			$elements = array(
				array($field1,'assign_access_id','assign_access','sample'),
				/* array('employee','emp_id',$field1),
				array('emp_accounts','emp_account_id',$field1),
				array('emp_attendance','emp_attendance_id',$field1),
				array('emp_credits','emp_credit_id',$field1),
				array('emp_overtime','emp_overtime_id',$field1),
				array('emp_salary','salary_id',$field1),
				array('emp_shift','emp_shift_id',$field1),
				array('expenses_equip','expequip_id',$field1),
				array('expenses_misc','misc_id',$field1),
				array('expenses_prod','prod_id',$field1),
				array('expenses_returns','returns_id',$field1),
				array('expenses_stocks','expstocks_id',$field1),
				array('incomestatement','statement_id',$field1),
				array('job_position','job_position_id',$field1),
				array('menu_item','menu_item_id',$field1),
				array('officeitems','office_id',$field1),
				array('order','order_id',$field1),
				array('ordered_item','order_item_id',$field1),
				array('overtime_type','ot_type_id',$field1),
				array('productionitems','production_id',$field1),
				array('property_info','property_id',$field1),
				array('rate_types','rate_type_id',$field1),
				array('releasecart','releaseCart_id',$field1),
				array('releaseditem','release_item_id',$field1),
				array('restockcart','restock_id',$field1),
				array('restock_items','restockitem_id',$field1),
				array('salary_term','salary_term_id',$field1),
				array('stockcategory','stockCat_id',$field1),
				array('stockchannel','channel_id',$field1),
				array('stockitem','stock_id',$field1),
				array('store_menu','menu_id',$field1) */

			);
			if ($this->project_model->create_table($elements) == true) {
				echo 'table created.';
			}else{
				echo 'unable to create table.';
			}
		}
	}

	function test_page(){
		/* $mac = str_replace(" ", "", $this->my_mac());
		$data = $this->get_accountType($mac);

		foreach ($data as $value) {
			echo $value->account_type;
		} */
		$this->checkNewInstall();
	}
}

/*
function index(){
		$check_access = $this->main_model->check_access();
		$check_property = $this->main_model->check_property();
		if ($check_access != false && $check_property != false) {
			$this->filter_mac();
		}else{
			$this->set_up();
		}
	}

	private function set_up(){
		$data['title'] = "Set-up page";
		$data['error'] = '';
		$this->load->view('header',$data);
		$this->load->view('main/set_up_system');
		$this->load->view('footer');
	}

	private function my_mac(){

		$ip = $_SERVER['REMOTE_ADDR'];
		ob_start();
		$arp_output = `arp -a $ip`;
		ob_clean();
		$mac = substr($arp_output,101,27);

		if (!$mac) {
			ob_start(); // Turn on output buffering
			system('ipconfig /all'); //Execute external program to display output
			$mycom=ob_get_contents(); // Capture the output into a variable
			ob_clean(); // Clean (erase) the output buffer

			$findme = "Physical";
			$pmac = strpos($mycom, $findme); // Find the position of Physical text
			$mac=substr($mycom,($pmac+36),17); // Get Physical Address
			return strtoupper($mac);
		}else{
			return strtoupper($mac);
		}
	}

	private function filter_mac(){
		$mac = str_replace(" ", "", $this->my_mac());
		$verify_mac = $this->main_model->mac_verification($mac);

		if ($verify_mac[0] == true) {
			if ($verify_mac[1] == "admin") {
				$data['title'] = "Administrator";
				$data['sub_heading'] = 'Login';
				$data['error'] = '';
				$this->load->view("header",$data);
				$this->load->view("main/admin_login",$data);
				$this->load->view("footer");
			}elseif ($verify_mac[1] == "frontdesk"){
				$data['title'] = "Frontdesk Login";
				$data['sub_heading'] = 'Login';
				$data['error'] = '';
				$this->load->view("header",$data);
				$this->load->view("main/frontdesk_login",$data);
				$this->load->view("footer");
			}else{
				//show_404();
				echo "verify_mac not found";
			}
		}else{
			//show_404();
			echo "verify_mac = false";
			}
	}

	function admin_login(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Administrator';
			$data['sub_heading'] = 'Validation Error!';
			$data['error'] = '';
			$this->load->view('header',$data);
			$this->load->view('main/admin_login',$data);
			$this->load->view('footer');
		}else{
			$table = 'property_info';
			$where = array(
				'admin_username'=>set_value('username'),
				'admin_password'=>sha1(set_value('password'))
				);
			$log = $this->main_model->val_login($table,$where);
			if ($log == true){
				$this->session->set_userdata('isposadmin_log',true);
				redirect('admin');
			}else{
				$data['title'] = 'Administrator';
				$data['sub_heading'] = 'Login Error!';
				$data['error'] = 'match';
				$this->load->view('header',$data);
				$this->load->view('main/admin_login',$data);
				$this->load->view('footer');
			}
		}
	}

	function frontdesk_login(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Frontdesk Login';
			$data['sub_heading'] = 'Validation Error!';
			$data['error'] = '';
			$this->load->view('header',$data);
			$this->load->view('main/frontdesk_login',$data);
			$this->load->view('footer');
		}else{
			$table = 'emp_accounts';
			$where = array(
				'emp_username'=>set_value('username'),
				'emp_password'=>sha1(set_value('password'))
				);
			$log = $this->main_model->val_login($table,$where,$return=true);
			if ($log[0] == true){
				$newdata = array(
					'ispos_log'=>$log[0],
					'current_id'=>$log[1]
					);
				$this->session->set_userdata($newdata);
				redirect('receptionist');
			}else{
				$data['title'] = "Frontdesk Login";
				$data['sub_heading'] = 'Login Error';
				$data['error'] = 'match';
				$this->load->view("header",$data);
				$this->load->view("main/frontdesk_login",$data);
				$this->load->view("footer");
			}
		}
	}

	private function is_log_in(){
		if ($this->session->userdata('isadmin_log') == true && $this->session->userdata('ispos_log') == false) {
			redirect('admin');
		}elseif ($this->session->userdata('isfrontdesk_log') == true && $this->session->userdata('isposadmin_log') == false) {
			redirect('receptionist');
		}
	}

	private function adminLogin(){
		$data['title'] = 'Administrator';
		$data['sub_heading'] = 'Validation Error!';
		$data['error'] = '';
		$this->load->view('header',$data);
		$this->load->view('main/admin_login',$data);
		$this->load->view('footer');
	}

	private function frontdeskLogin(){
		$data['title'] = 'Frontdesk Login';
			$data['sub_heading'] = 'Validation Error!';
			$data['error'] = '';
			$this->load->view('header',$data);
			$this->load->view('main/frontdesk_login',$data);
			$this->load->view('footer');
	}

	function get_accountType(){
		$mac = $this->project_model->select('assign_access');
		if ($mac != false) {
			return $mac;
		}else{
			return false;
		}
	}

	function error_page(){
		$data['title'] = "Error Page";
		$data['sub_heading'] = 'Login';
		$data['mac'] = $this->my_mac();
		$this->load->view("admin/header",$data);
		$this->load->view("main/error_page",$data);
		$this->load->view("footer");
	}

	function landing_page(){
		$data['title'] = "Landing Page";
		$data['sub_heading'] = 'Landing Page';
		$this->load->view("admin/header",$data);
		$this->load->view("main/landing_page",$data);
		$this->load->view("footer");
	}
*/
