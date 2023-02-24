<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_Model extends CI_Model {
	function check_access(){
		$query = $this->db->get('assign_access');

		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}
	function check_property(){
		$query = $this->db->get('property_info');

		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}
	function mac_verification($mac){
		$this->db->like('mac_address',$mac,'both');
		$query = $this->db->get('assign_access');

		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			$array = array(true,$row['account_type']);
			return $array;
		}else{
			$array = array(false,false);
			return $array;
		}
	}

	function save_setup($img,$location){
		$data = array('property_name' => set_value('property_name'),
					'street_name'=>set_value('street_name'),
					'municipality'=>set_value('municipality'),
					'state'=>set_value('province'),
					'country'=>set_value('country'),
					'zipcode'=>set_value('zipcode'),
					'phone'=>set_value('phone'),
					'mobile'=>set_value('mobile'),
					'fax'=>set_value('fax'),
					'email'=>set_value('email'),
					'logo_name'=>$img,
					'logo_location'=>$location,
					'admin_username'=>set_value('username'),
					'admin_password'=>sha1(set_value('password')));

		$query = $this->db->insert('property_info',$data);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	function save_macaddress($mac){
		$data = array('account_type'=>"admin", 'mac_address'=>sha1($mac));

		$query = $this->db->insert('assign_access',$data);

		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	function val_admin_login(){
		$this->db->where('admin_username',set_value('username'));
		$this->db->where('admin_password',sha1(set_value('password')));

		$query = $this->db->get('property_info');

		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function val_login($table_name,$where=false,$return=false){
		if ($where != false) {
			$this->db->where($where);
		}
		$query = $this->db->get($table_name);

		if ($query->num_rows() > 0) {
			if ($return != false) {
				if ($table_name == "property_info") {
					return true;
				}elseif ($table_name == "emp_accounts") {
					$row = $query->row_array();
					return array(true,$row['emp_id']);
				}
			}else{
				return true;
			}
		}else{
			return false;
		}
	}

	function verify_admin_emailad(){
		$this->db->where('email',set_value('email'));
		$query = $this->db->get('property_info');

		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function emp_log($id){
		$data = array('emp_id'=>$id,'date'=>now());

		$query = $this->db->insert('employee_log',$data);

		if ($query) {
			return true;
		}else{
			return false;
		}
	}


}
