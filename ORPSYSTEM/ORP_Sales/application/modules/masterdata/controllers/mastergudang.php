<?php

class Mastergudang extends MX_Controller {

    function __construct() {
        parent:: __construct();
        $this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");

        Account::_valLogin();
        $this->orm->debug = true;
    }

    public function index() {

        if (isset($_SESSION['message'])) {
            Message::_modal($_SESSION['message']['title'], $_SESSION['message']['content'], $_SESSION['message']['icon']);
        }


        $data['link'] = site_url() . "/masterdata/mastergudang/list_data";
        //$data['refgudang'] = $this->orm->refgudang();
        $this->load->view('default', $data);
    }

    public function list_data() {
        $data['title'] = 'Daftar Gudang';
        $data['link'] = site_url() . "/masterdata/mastergudang/list_data";
        $data['refgudang'] = $this->orm->refgudang();
        $this->load->view('mastergudang_list', $data);
    }

    public function edit($idrefgudang) {


        if (isset($_SESSION['message'])) {
            Message::_modal($_SESSION['message']['title'], $_SESSION['message']['content'], $_SESSION['message']['icon']);
        }

        $data = array();
        $data['link'] = site_url() . "/masterdata/mastergudang/list_data";

        $data['refgudang'] = $this->orm->refgudang->where('idrefgudang', $idrefgudang)->fetch();


        $this->load->view('mastergudang_edit_view', $data);
    }

    public function proses() {

        $setting_model = new Setting_model;

        $idrefgudang = $this->input->post('idrefgudang', true);
        $data = array();
        $data['idrefgudang'] = ($idrefgudang == null) ? $setting_model->_getId('refgudang') : $idrefgudang;
        $data['nomorgudang'] = $this->input->post('nomorgudang', true);
        $data['namagudang'] = $this->input->post('namagudang', true);
        $data['kapasitas'] = $this->input->post('kapasitas', true);



        if ($idrefgudang == null) {
            $refgudang = $this->orm->refgudang();
            $ress = $refgudang->insert($data);
             Message::_set($ress, 'Hapus Data Pelanggan Berhasil', 'Hapus Data Master Pelanggan Gagal');
                 redirect('masterdata/mastergudang');
        } else {
            $refgudang = $this->orm->refgudang->where('idrefgudang', $idrefgudang);
            $ress = $refgudang->update($data);
             Message::_set($ress, 'Hapus Data Pelanggan Berhasil', 'Hapus Data Master Pelanggan Gagal');
             redirect('masterdata/mastergudang');
        }
    }

    public function delete() {
        $idrefgudang = $this->input->post('id', true);
        if ($idrefgudang != null) {
            $refgudang = $this->orm->refgudang->where('idrefgudang', $idrefgudang);
            $ress = $refgudang->delete();
           
            
                 Message::_set($ress, 'Hapus Data Pelanggan Berhasil', 'Hapus Data Master Pelanggan Gagal');
                 redirect('masterdata/mastergudang');
        }
    }

}

?>