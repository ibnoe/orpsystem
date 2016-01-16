<?php

 class DeliveryOrder_model extends CI_Model {

     /**
      * Constructor
      */
     function __construct() {
         parent::__construct();
     }


     var $table1= 'deliveryorder';
     
     function _getMaxId($year = null) {
         $query = array('max(iddeliveryorder) as maks');
         $this->db->select($query);

         $this->db->from($this->table1);

         if (!empty($year)) {
             $this->db->where('year(tanggalDO) = ' . $year);
         }

         $ress = $this->db->get()->row_array();

         return (empty($ress)) ? NULL : $ress['maks'];
     }

     function _getMaxIdDeliveryOrderDetail() {
         $query = array('max(idDeliveryOrderDetail) as maks');
         $this->db->select($query);
         $this->db->from($this->table2);

         $ress = $this->db->get()->row_array();

         return (empty($ress)) ? NULL : $ress['maks'];
     }

     function _getCount($year = null) {
         $query = array('count(iddeliveryorder) as maks');
         $this->db->select($query);

         $this->db->from($this->table1);

         if (!empty($year)) {
             $this->db->where('year(tanggalDO) = ' . $year);
         }

         $ress = $this->db->get()->row_array();

         return (empty($ress)) ? NULL : $ress['maks'];
     }

     function _getAutoNumber() {
         
         $max = $this->_getCount(date('Y'));

         $max +=1;
         
         for ($nol = 6; true; $nol++) {
             $auto = $this->_getCheckNomor($max, $nol);
             if ($this->_checkNomor($auto)) {
                 break;
             }
         }

         return $auto;
     }

     function _checkNomor($nomor) {
         $this->db->select('nomorDO');
         $this->db->from($this->table1);
         $this->db->where('nomorDO = "' . $nomor . '"');

         $ress = $this->db->get()->row_array();

         return (empty($ress)) ? TRUE : FALSE;
     }

     function _getCheckNomor($max, $nol) {

         for ($i = 1; $i <= $max; $i++) {

             $nomor = str_pad($i, $nol, 0, STR_PAD_LEFT);

             $this->db->select('nomorDO');
             $this->db->from($this->table1);
             $this->db->where('nomorDO = "' . $nomor . '"');

             $ress = $this->db->get()->row_array();

             if (empty($ress['nomorDO'])) {
                 break;
             }

         }
         
         return $nomor;
     }

 }
 