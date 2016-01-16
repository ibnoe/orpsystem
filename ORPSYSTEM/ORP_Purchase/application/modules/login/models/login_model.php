<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database(); 
	}
	public function cekLogin($username,$password)
	{
		$sql= "SELECT * FROM User WHERE username = '$username' AND password='$password'";
								 
		$hasil = $this->db->query($sql);
			if($hasil->num_rows() > 0){
				return $hasil->row_array();						 
			}
	}
}
