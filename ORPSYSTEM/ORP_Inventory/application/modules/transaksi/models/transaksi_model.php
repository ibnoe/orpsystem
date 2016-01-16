<?php

class Transaksi_model extends  CI_Model {
	/**
	 * Constructor
	 */
	function __construct()
         {
        parent::__construct();
        
	}
        
        function proccessBarangKeluar($iddeliveryorder) {
                      
            $ress = $this->orm->deliveryorderdetail->where('iddeliveryorder',$iddeliveryorder);
            
            foreach($ress as $row) {
                $new_stock = $row->refbarang['stock']-$row['jumlahbarang'];
                $data = array();
                $data['stock'] = $new_stock;
                $this->orm->refbarang->where('idrefbarang',$row['idrefbarang'])->update($data);
            }
         
        }
        
        
        function proccessBarangMasuk($idpengadaan) {
            
            $ress = $this->orm->pengadaandetail->where('idpengadaan',$idpengadaan);
            
            foreach($ress as $row) {
                $new_stock = $row->refbarang['stock']+$row['jumlahbarang'];
                $data = array();
                $data['stock'] = $new_stock;
                $this->orm->refbarang->where('idrefbarang',$row['idrefbarang'])->update($data);
            }
         
        }
        
        
        function batalBarangKeluar($iddeliveryorder) {
            $ress = $this->orm->deliveryorderdetail->where('iddeliveryorder',$iddeliveryorder);
            
            foreach($ress as $row) {
                $new_stock = $row->refbarang['stock']+$row['jumlahbarang'];
                $data = array();
                $data['stock'] = $new_stock;
                $this->orm->refbarang->where('idrefbarang',$row['idrefbarang'])->update($data);
            }
         
        }
        
        function batalBarangMasuk($idPengadaan) {
            
            $ress = $this->orm->pengadaandetail->where('idpengadaan',$idpengadaan);
            
            foreach($ress as $row) {
                $new_stock = $row->refbarang['stock']-$row['jumlahbarang'];
                $data = array();
                $data['stock'] = $new_stock;
                $this->orm->refbarang->where('idrefbarang',$row['idrefbarang'])->update($data);
            }
         
        }

        
            
}
