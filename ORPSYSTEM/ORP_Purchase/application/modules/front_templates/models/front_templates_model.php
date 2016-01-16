<?php

class front_templates_model extends  CI_Model {
	/**
	 * Constructor
	 */
	function __construct()
         {
        parent::__construct();
        
	}
        
        function _loadRunningText()
	{
            $this->load->database();
            $data = array();
            $data = $this->db->query("select * from berita order by tanggal DESC LIMIT 0,5")->result_array();
		                
            return $data;
	}   
        
        
        function _getByid_berita($id_berita)
	{
            $this->load->database();
            $data = array();
            $data = $this->db->query("select * from berita where id_berita = '$id_berita' order by id_berita DESC")->row_array();
		                
            return $data;
	}   
        
        function _loadberitaTerbaru()
	{
            $this->load->database();
            $data = array();
             $data = $this->db->query("select * from berita where id_berita ASC")->result_array();
		                
            return $data;
	}   
        
         function _loadberitaTerpopuler()
	{
            $this->load->database();
            $data = array();
            $data = $this->db->query("select * from berita where id_berita DESC")->result_array();
		                
            return $data;
	}  
        
        
   
            
}
