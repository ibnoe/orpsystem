<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        echo "<h1>Master</h1>";
    }
    
    public function loadSupplier() {
        
        $query = $this->orm->supplier();
        $supplier = array();
        
        foreach($query as $row) {
            $data = array();
            $data['idsupplier'] = $row['idsupplier'];
            $data['namasupplier'] = $row['namasupplier'];
            $data['nomorhpsupplier'] = $row['nomorhpsupplier'];
            $data['emailsupplier'] = $row['emailsupplier'];
            $data['alamatsupplier'] = $row['alamatsupplier'];
            $data['kotasupplier'] = $row['kotasupplier'];
            $data['jenissupplier'] = $row['jenissupplier'];
            $data['keterangan'] = $row['keterangan'];
            
            $supplier[] = $data;
            
        }
        
        $result = array();
        $result['status'] = (count($supplier)==0) ? false : true;
        $result['messages'] = (count($supplier)==0) ? 'Gagal' : 'Berhasil';
        $result['data'] = $supplier;
        
        echo json_encode($result);
    }
    
    public function loadPelanggan() {
        
        $query = $this->orm->pelanggan();
        $pelanggan = array();
        
        foreach($query as $row) {
            $data = array();
            $data['idpelanggan'] = $row['idpelanggan'];
            $data['namapelanggan'] = $row['namapelanggan'];
            $data['nomorhppelanggan'] = $row['nomorhppelanggan'];
            $data['emailpelanggan'] = $row['emailpelanggan'];
            $data['alamatpelanggan'] = $row['alamatpelanggan'];
            $data['kotapelanggan'] = $row['kotapelanggan'];
            $data['jenispelanggan'] = $row['jenispelanggan'];
            $data['keterangan'] = $row['keterangan'];
            
            $pelanggan[] = $data;
            
        }
        
        $result = array();
        $result['status'] = (count($pelanggan)==0) ? false : true;
        $result['messages'] = (count($pelanggan)==0) ? 'Gagal' : 'Berhasil';
        $result['data'] = $pelanggan;
        
        echo json_encode($result);
        
    }
    
    public function loadStore() {
        
        $query = $this->orm->refstore();
        $store = array();
        
        foreach($query as $row) {
            $data = array();
            $data['idrefstore'] = $row['idrefstore'];
            $data['nama'] = $row['nama'];
            $data['tlp'] = $row['tlp'];
            $data['email'] = $row['email'];
            $data['lokasi'] = $row['lokasi'];
            $data['keterangan'] = $row['keterangan'];
            
            $store[] = $data;
            
        }
        
        $result = array();
        $result['status'] = (count($store)==0) ? false : true;
        $result['messages'] = (count($store)==0) ? 'Gagal' : 'Berhasil';
        $result['data'] = $store;
        
        echo json_encode($result);
        
    }
    
}