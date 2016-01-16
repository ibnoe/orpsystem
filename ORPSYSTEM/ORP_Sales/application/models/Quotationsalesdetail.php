<?php
/*
	author : wahyu
*/
Class Quotationsalesdetail extends CI_Model {

	function findByQuotationSalesId($id) {
		$this->db->select('*');
		$this->db->from('quotationsalesdetail');
		$this->db->where('idquotationsales = ' . "'" . $id . "'");

		$query = $this -> db -> get();
		return $query->result();
	}

	function findById($id) {
		$this->db->select('*');
		$this->db->from('quotationsalesdetail');
		$this->db->where('idquotationsalesdetail = ' . "'" . $id . "'");

		$query = $this -> db -> get();
		return $query->result();
	}
	
	function add($data) {
		$this->db->insert('quotationsalesdetail', $data);
		return $this->db->insert_id();
	}
	
	function update($id, $data) {
		$this->db->where('idquotationsalesdetail', $id);
		$this->db->update('quotationsalesdetail', $data);
	}
}
?>