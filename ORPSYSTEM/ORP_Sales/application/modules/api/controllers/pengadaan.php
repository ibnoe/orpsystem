<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengadaan extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        echo "<h1>Pengadaan</h1>";
    }

    public function get($idrefstore) {

        $query = $this->orm->pengadaan->where('idrefstore',$idrefstore);
        $pengadaan = array();

        foreach ($query as $row) {
            $data = array();
            $data['idpengadaan'] = $row['idpengadaan'];
            $data['nomorpengadaan'] = $row['nomorpengadaan'];
            $data['tanggalpengadaan'] = $row['tanggalpengadaan'];
            $data['nomorreff'] = $row['nomorreff'];
            $data['idsupplier'] = $row['idsupplier'];
            $data['namasupplier'] = $row->supplier['namasupplier'];
            $data['idrefstore'] = $row['idrefstore'];
            $data['nama_store'] = $row->refstore['nama'];

            $pengadaan[] = $data;
        }

        $result = array();
        $result['status'] = (count($pengadaan) == 0) ? false : true;
        $result['messages'] = (count($pengadaan) == 0) ? 'Gagal' : 'Berhasil';
        $result['data'] = $pengadaan;

        echo json_encode($result);
    }

    public function proses() {

        $idpengadaan = $this->orm->pengadaan->max('idpengadaan');
          
        if(empty($idpengadaan)) {
            $idpengadaan = 1;
        }
        else {
            $idpengadaan = $idpengadaan+1;
        }
        
        $data = array();
        $data['idpengadaan'] = $idpengadaan;
        $data['nomorpengadaan'] = $this->input->post('nomorpengadaan');
        $data['tanggalpengadaan'] = $this->input->post('tanggalpengadaan');
        $data['nomorreff'] = $this->input->post('nomorreff');
        $data['idsupplier'] = $this->input->post('idsupplier');
        $data['idrefstore'] = $this->input->post('idrefstore');
        
         $ress_pengadaan = $this->orm->pengadaan->insert($data);
         
         $result = array();
        $result['status'] = (($ress_pengadaan['idpengadaan'] != NULL AND $ress_pengadaan['idpengadaan'] != NULL )) ? false : true;
        $result['messages'] = (($ress_pengadaan['idpengadaan'] != NULL AND $ress_pengadaan['idpengadaan'] != NULL )) ? 'Gagal' : 'Berhasil';

        echo json_encode($result);
    }

}
