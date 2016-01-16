<?php

class berita_model extends  CI_Model {
	/**
	 * Constructor
	 */
	function __construct()
         {
        parent::__construct();
        
	}

        function _loadAll()
	{
            $this->load->database();
            $data = array();
             $data = $this->db->query("select * from berita order by tanggal DESC LIMIT 0,3")->result_array();
		                
            return $data;
	}   
        
        function _loadLatestBerita()
	{
            $this->load->database();
            $data = array();
            $data = $this->db->query("select * from berita order by tanggal DESC LIMIT 0,10")->result_array();
		                
            return $data;
	}   
        
         function _loadberitaTerpopuler()
	{
            $this->load->database();
            $data = array();
            $data = $this->db->query("select * from berita order by tanggal DESC LIMIT 0,2")->result_array();
		                
            return $data;
	}  
        
        
        function _loadPemohon()
	{
            $this->load->database();
            $data = array();
             $data = $this->db->query("select * from pemohon order by nama_pemohon DESC LIMIT 0,5")->result_array();
		                
            return $data;
	}   
        
        function _getByid_berita($id_berita)
	{
            $this->load->database();
            $data = array();
            $data = $this->db->query("select * from berita where id_berita = '$id_berita' order by id_berita DESC")->row_array();
		                
            return $data;
	}       
            
}
