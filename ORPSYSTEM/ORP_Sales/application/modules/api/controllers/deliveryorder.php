<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Deliveryorder extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        echo "<h1>Delivery Order</h1>";
    }

    public function get($idrefstore) {

        $query = $this->orm->deliveryorder->where('idrefstore',$idrefstore);
        $deliveryorder = array();

        foreach ($query as $row) {
            $data = array();
            $data['iddo'] = $row['iddo'];
            $data['nomordo'] = $row['nomordo'];
            $data['tanggaldo'] = $row['tanggaldo'];
            $data['nomorpo'] = $row['nomorpo'];
            $data['nomorso'] = $row['nomorso'];
            $data['disetujui'] = $row['disetujui'];
            $data['idpelanggan'] = $row['idpelanggan'];
            $data['namapelanggan'] = $row->pelanggan['namapelanggan'];
            $data['status'] = $row['status'];
            $data['idrefstore'] = $row['idrefstore'];
            $data['nama_store'] = $row->refstore['nama'];

            $deliveryorder[] = $data;
        }

        $result = array();
        $result['status'] = (count($deliveryorder) == 0) ? false : true;
        $result['messages'] = (count($deliveryorder) == 0) ? 'Gagal' : 'Berhasil';
        $result['data'] = $deliveryorder;

        echo json_encode($result);
    }

    public function proses() {

        $iddeliveryorder = $this->orm->deliveryorder->max('iddo');
          
        if(empty($iddeliveryorder)) {
            $iddeliveryorder = 1;
        }
        else {
            $iddeliveryorder = $iddeliveryorder+1;
        }
        
        $data = array();
        $data['iddo'] = $iddeliveryorder;
        $data['nomordo'] = $this->input->post('nomordo');
        $data['tanggaldo'] = $this->input->post('tanggaldo');
        $data['nomorreff'] = $this->input->post('nomorreff');
        $data['nomorpo'] = $this->input->post('nomorpo');
        $data['nomorso'] = $this->input->post('nomorso');
        $data['disetujui'] = $this->input->post('disetujui');
        $data['idpelanggan'] = $this->input->post('idpelanggan');
        $data['status'] = 1;
        $data['idrefstore'] = $this->input->post('idrefstore');
        
         $ress_deliveryorder = $this->orm->deliveryorder->insert($data);
         
         $result = array();
        $result['status'] = (($ress_deliveryorder['iddo'] != NULL AND $ress_deliveryorder['iddo'] != NULL )) ? false : true;
        $result['messages'] = (($ress_deliveryorder['iddo'] != NULL AND $ress_deliveryorder['iddo'] != NULL )) ? 'Gagal' : 'Berhasil';

        echo json_encode($result);
    }

}
