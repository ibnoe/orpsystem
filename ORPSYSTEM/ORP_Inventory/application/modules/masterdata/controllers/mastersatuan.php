<?php

class Mastersatuan extends MX_Controller {

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

        $data = array();
        $data['link'] = site_url('/') . "masterdata/mastersatuan/list_data";
        //$data['refsatuan'] = $this->orm->refsatuan();
        $this->load->view('default', $data);
    }

    public function list_data() {
        $data = array();
        $data['title'] = 'Daftar Satuan Barang';
        $data['link'] = site_url('/') . "masterdata/mastersatuan/list_data";
        $data['refsatuan'] = $this->orm->refsatuan();
        $this->load->view('mastersatuan_list', $data);
    }

    
    
    public function edit() {
        $idsatuan = $this->input->post('id');
        $satuan = $this->orm->refsatuan->where('idrefsatuan', $idsatuan)->fetch();
        
        $data = array();
        $data['idrefsatuan'] = $satuan['idrefsatuan'];
        $data['namasatuan'] = $satuan['namasatuan'];
        $data['child'] = $satuan['child'];
        $data['jumlah_perchild'] = $satuan['jumlah_perchild'];
        
        echo json_encode(array('response' => 'success', 'datas' => $data));     
    }
    
    public function proses() {

        $setting_model = new Setting_model;

        $idrefsatuan = $this->input->post('idrefsatuan', true);
        $data = array();
        $data['idrefsatuan'] = ($idrefsatuan == null) ? $setting_model->_getId('refsatuan') : $idrefsatuan;
        $data['namasatuan'] = $this->input->post('namasatuan', true);
        $data['child'] = $this->input->post('child', true);
        $data['jumlah_perchild'] = $this->input->post('jumlah_perchild', true);

        if ($idrefsatuan == null) {
            $refsatuan = $this->orm->refsatuan();
            $ress = $refsatuan->insert($data);
            if ($ress) {
                echo json_encode(array('response' => 'success', 'msg' => 'Tambah Data Satuan Berhasil'));
            } else {
                echo json_encode(array('response' => 'error', 'msg' => 'Tambah Data Satuan Gagal'));
            }
        } else {
            $refsatuan = $this->orm->refsatuan->where('idrefsatuan', $idrefsatuan);
            $ress = $refsatuan->update($data);
            if ($ress) {
                echo json_encode(array('response' => 'success', 'msg' => 'Edit Data Satuan Berhasil'));
            } else {
                echo json_encode(array('response' => 'error', 'msg' => 'Tambah Data Satuan Gagal'));
            }
        }
    }

    public function delete() {
        $idrefsatuan = $this->input->post('id', true);
        if ($idrefsatuan != null) {
            $refsatuan = $this->orm->refsatuan->where('idrefsatuan', $idrefsatuan);
            $ress = $refsatuan->delete();
            if ($ress) {
                echo json_encode(array('response' => 'success', 'msg' => 'Delete Data Satuan Berhasil'));
            } else {
                echo json_encode(array('response' => 'error', 'msg' => 'Delete Data Satuan Gagal'));
            }
        }
    }

}

?>