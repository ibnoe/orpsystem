<?php
/*
	author : wahyu
*/
Class Refbarang extends CI_Model {

	function findById($id) {
		$this->db->select('*');
		$this->db->from('refbarang');
		$this->db->where('idrefbarang = ' . "'" . $id . "'");

		$query = $this -> db -> get();
		return $query->result();
	}
	
	function add($data) {
		$this->db->insert('refbarang', $data);
		return $this->db->insert_id();
	}
	
	function update($id, $data) {
		$this->db->where('idrefbarang', $id);
		$this->db->update('refbarang', $data);
	}
}
?>