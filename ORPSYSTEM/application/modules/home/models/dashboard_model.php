<?php

class dashboard_model extends  CI_Model {
	/**
	 * Constructor
	 */
	function __construct()
         {
        parent::__construct();
        
	}

    public function _getTotalPelanggan() {
        $stats = $this->orm->pelanggan->select('count(idpelanggan) as jml')->where('idrefstore',$_SESSION['user']['idrefstore'])->fetch();
        return $stats['jml'];
    }
    
    public function _getTotalSupplier() {
        $stats = $this->orm->supplier->select('count(idsupplier) as jml')->where('idrefstore',$_SESSION['user']['idrefstore'])->fetch();
        return $stats['jml'];
    }
    
    public function _getTotalPenjualan() {
        $stats = $this->orm->deliveryorder->select('count(iddeliveryorder) as jml')->where('idrefstore',$_SESSION['user']['idrefstore'])->fetch();
        return $stats['jml'];
    }
    
    public function _getTotalPengadaan() {
        $stats = $this->orm->pengadaan->select('count(idpengadaan) as jml')->where('idrefstore',$_SESSION['user']['idrefstore'])->fetch();
        return $stats['jml'];
    }
    
    public function _getTotalJenisBarang() {
        $stats = $this->orm->refbarang->select('count(idrefbarang) as jml')->where('idrefstore',$_SESSION['user']['idrefstore'])->fetch();
        return $stats['jml'];
    }
  
    public function _loadLogs() {
        $logs = $this->orm->logs->where('idrefstore',$_SESSION['user']['idrefstore'])->limit(20);
        return $logs;
    }
    
        
            
}
