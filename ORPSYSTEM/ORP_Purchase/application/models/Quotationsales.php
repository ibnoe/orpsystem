<?php
/*
	author : wahyu
*/
Class Quotationsales extends CI_Model {

	function findById($id) {
		$this->db->select('*');
		$this->db->from('quotationsales');
		$this->db->where('idquotationsales = ' . "'" . $id . "'");

		$query = $this -> db -> get();
		return $query->result();
	}
	
	function add($data) {
		$this->db->insert('quotationsales', $data);
		return $this->db->insert_id();
	}
	
	function update($id, $data) {
		$this->db->where('idquotationsales', $id);
		$this->db->update('quotationsales', $data);
	}
}
?>