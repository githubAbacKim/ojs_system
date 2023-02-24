<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model {

	/*start of property functions*/
	function property_info(){
		$this->db->select('property_id,property_name,street_name,municipality,state,country,zipcode,phone,fax,mobile,email,
			logo_name,logo_location');
		$query = $this->db->get('property_info');

		if ($query->num_rows() > 0) {
			return $query->row_array();
		}else{
			return false;
		}
	}

	function update_property(){
		$data = array("property_name"=>set_value('property_name'),
				"street_name"=>set_value('street_name'),
				"municipality"=>set_value('municipality'),
				"state"=>set_value('state'),
				"country"=>set_value('country'),
				"zipcode"=>set_value('zipcode'),
				"phone"=>set_value('phone'),
				"fax"=>set_value('fax'),
				"email"=>set_value('email')
				);
		$query = $this->db->update('property_info',$data);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	function verify_admin(){
		$this->db->where('admin_password',sha1(set_value('password')));
		$query = $this->db->get('property_info');

		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function update_property_logo(){
		$data = array("logo_name"=>$img,
				"logo_location"=>$img_location);
		$query = $this->db->update('property_info',$data);

		if ($query) {
			return true;
		}else{
			return false;
		}
	}


	/*end of property functions*/

	function get_table_record($table,$where=false,$order_by=false,$group_by=false,$like=false,$limit=false){
		if ($where != false) {
			$this->db->where($where);
		}
		if ($like != false) {
			$this->db->like($like);
		}
		if ($order_by != false) {
			$this->db->order_by($order_by[0],$order_by[1]);
				
		}
		if ($group_by != false) {
			$this->db->group_by($order_by);
		}
		if ($limit != false) {
			$this->db->limit($limit);
		}

		$query = $this->db->get($table);

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function update_table_record($data,$id,$table_id,$table_name){
		$this->db->where($table_id,$id);
		$query = $this->db->update($table_name,$data);

		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	function add_table_record($data,$table_name){
		$query = $this->db->insert($table_name,$data);

		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	function add_return_id($data,$table_name){
		$query = $this->db->insert($table_name,$data);

		if ($query) {
			return array(true,$this->db->insert_id());
		}else{
			return false;
		}
	}

	function delete_table_record($id,$table_name,$table_id){
		$this->db->where($table_id,$id);
		$query = $this->db->delete($table_name);

		if ($query) {
			return true;
		}else{
			return false;
		}
	}


	function check_duplicate($table_name,$column_name,$name){
		$this->db->where($column_name,$name);
		$query = $this->db->get($table_name);

		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function check_multi_duplicate($table_name,$where=false,$like=false){
		if ($where != false) {
			$this->db->where($where);
		}

		if ($like != false) {
			$this->db->like($like);
		}
		
		$query = $this->db->get($table_name);

		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function join_record($main_table,$array,$order_by=false,$where=false,$like=false){
		$this->db->select('*');
		$this->db->from($main_table);

		foreach ($array as $value) {
				$this->db->join($value[0], $value[1].'.'.$value[2] .'='. $value[0].'.'.$value[2]);
		}

		if ($order_by != false) {
			$this->db->order_by($main_table.'.'.$order_by[0], $order_by[1]);
		}

		if ($where != false) {
			$this->db->where($where);
		}
		
		if($like != false){
			$this->db->like($like);
		}

		$query = $this->db->get();

		if ($query->num_rows > 0) {
			return $query->result();
		}else{
			return false;
		}
	}
	
	function select_join($table,$join,$like=false,$where=false,$order=false,$group=false,$or_where=false,$or_like=false,
		$where_not_in=false,$wni_column=false,$where_statement = false){
		$this->db->select('*');
		$this->db->from($table);

		foreach ($join as $value) {
			$this->db->join($value[0], $value[1].'.'.$value[2] .'='. $value[0].'.'.$value[2]);
		}		
		if ($where != false) {
			$this->db->where($where);
		}
		if ($or_where != false) {
			foreach ($or_where as $column_name => $column_value) {
				$this->db->or_where($column_name, $column_value);
			}
		}
		if ($where_not_in != false && $wni_column != false) {
			$this->db->or_where_not_in($wni_column,$where_not_in);
		}
		if ($where_statement != false) {
			$this->db->where($where_statement);
		}
		if ($order != false) {
			$this->db->order_by($table.'.'.$order[0], $order[1]);
		}
		if($like != false){
			$this->db->like($like);
		}
		if ($or_like != false) {
			$this->db->or_like($or_like);
		}

		$query = $this->db->get();

		if ($query->num_rows > 0) {
			return $query->result();
		}else{
			return false;
		}
	}
	/*======================================================================*/
	/*method to be deleted after clean up*/
	/*======================================================================*/
	/*function join_record($main_table, $array, $order_by){
		$this->db->select('*');
		$this->db->from($main_table);

		foreach ($array as $table => $value) {
			$this->db->join($table, $main_table.'.'.$value .'='. $table.'.'.$value);
		}

		if ($order_by != false) {
			$this->db->group_by($main_table.'.'.$order_by);
		}

		$query = $this->db->get();

		if ($query->num_rows > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function get_table_record($table,$sort_by,$sort_option){
		if ($sort_by != false) {
			$this->db->order_by($sort_by,$sort_option);
		}

		$query = $this->db->get($table);

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function get_room_tariff(){
		$this->db->select('*');
		$this->db->from('room_tariff');
		$this->db->join('room_type','room_tariff.room_type_id = room_type.room_type_id');
		$this->db->join('rate_types','room_tariff.rate_type_id = rate_types.rate_type_id');
		$this->db->order_by('room_tariff.room_type_id');

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function get_rooms(){
		$this->db->select('*');
		$this->db->from('rooms');
		$this->db->join('room_type','rooms.room_type_id = room_type.room_type_id');
		$this->db->join('floor','rooms.floor_id = floor.floor_id');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}*/
}