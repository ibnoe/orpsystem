<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sharing extends MX_Controller {

    
    function __construct() {
        parent:: __construct();
        $this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        // $this->load->helper('pdf_helper');

       
        $this->orm->debug = true;
        $this->load->model('sharing_model');
        
    }
    
    public function index() {
        
        $this->load->view('sharing_view');
    }

    public function proses() {

        $setting_model = new Setting_model;

        $data = array();
        $data['idsharingproduct'] = $setting_model->_getId('sharingproduct');
        $data['idrefbarang'] = $this->input->post('idrefbarang');
        $data['jumlah_barang'] = $this->input->post('jumlah_barang');
        $data['idrefstore_pengirim'] = $_SESSION['user']['idrefstore'];
        $data['idrefstore_penerima'] = $this->input->post('idrefstore_penerima');
        $data['status_konfirmasi'] = 'N';
        $data['tanggal_kirim'] = Tanggal::sqlDate($this->input->post('tanggal_kirim'));

        $sharingproduct = $this->orm->sharingproduct();
        $ress = $sharingproduct->insert($data);
        Message::_set((isset($ress['idsharingproduct']) ? TRUE : FALSE), 'Berhasil', 'Gagal');
        redirect('sharing/sharing');
    }

    public function konfirmasi($idsharingproduct) {
        
        $sharing_model = new sharing_model();
        
        $sharingproduct = $this->orm->sharingproduct->where('idsharingproduct',$idsharingproduct)->fetch();
        
        $sharing_model->updateStockPengirim($sharingproduct);
        $sharing_model->updateStockPenerima($sharingproduct);
        
        $data = array();
        $data['status_konfirmasi'] = 'Y';
        $data['tanggal_konfirmasi'] = date('Y-m-d');
        $sharingproduct->update($data);
          
        Message::_set(TRUE,'Konfirmasi Sharing Product Berhasil','Gagal');
        redirect('sharing/sharing');
        
    }

    public function batal($idsharingproduct) {
        
        $sharingproduct = $this->orm->sharingproduct->where('idsharingproduct',$idsharingproduct);
        $sharingproduct->delete();
          
        Message::_set(TRUE,'Batal Sharing Product Berhasil','Gagal');
        redirect('sharing/sharing');
    }

}
