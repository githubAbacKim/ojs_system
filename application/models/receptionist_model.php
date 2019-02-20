<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Receptionist_Model extends CI_Model {
	function check_multi_duplicate($table_name,$where=false,$return=false,$like=false){
		if ($where != false) {
			$this->db->where($where);
		}

		if($like != false){
			$this->db->like($like);
		}

		$query = $this->db->get($table_name);

		if ($query->num_rows() > 0) {
			if ($return != false) {
				$row = $query->row_array();
				return array(true,$row[$return]);
			}else{
				return false;
			}
			
		}else{
			return false;
		}
	}

	function select($table,$like=false,$where=false,$order=false,$group=false,$where_or=false,$limit=false,$or_like=false,$where_not_in=false,$wni_column=false){
		if($like != false){
			$this->db->like($like);
		}
		if ($or_like != false) {
			$this->db->or_like($or_like);
		}
		if ($where != false) {
			$this->db->where($where);
		}
		if ($where_or != false) {
			$this->db->or_where($where_or);
		}
		if ($where_not_in != false && $wni_column != false) {
			$this->db->or_where_not_in($wni_column,$where_not_in);
		}
		if ($order != false) {
			$this->db->order_by($order[0],$order[1]);				
		}
		if ($group != false) {
			$this->db->group_by($group);
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

	function insert($table,$data,$return=false){
		$query = $this->db->insert($table,$data);

		if ($query) {
			if ($return != false) {
				return array(true,$this->db->insert_id());
			}else{
				return true;
			}
			
		}else{
			return false;
		}
	}

	function insert_batch($table,$data){

		$query = $this->db->insert_batch($table,$data);

		if ($query) {
			return true;
			
		}else{
			return false;
		}
	}

	function update($table_name,$table_id,$data,$id){
		$this->db->where($table_id,$id);
		$query = $this->db->update($table_name,$data);

		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	function delete($table_name,$table_id,$id){
		$this->db->where($table_id,$id);
		$query = $this->db->delete($table_name);

		if ($query) {
			return true;
		}else{
			return false;
		}
	}
}