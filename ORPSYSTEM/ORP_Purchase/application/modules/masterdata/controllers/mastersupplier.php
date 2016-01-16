<?php

class mastersupplier extends MX_Controller {

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
        $data['link'] = base_url() . "masterdata/mastersupplier/list_data";


        $this->load->view('default', $data);
    }

    public function list_data() {
        $data['title'] = 'Data Supplier';
        $data['link'] = site_url() . "masterdata/mastersupplier/list_data";
        $data['supplier'] = $this->orm->supplier();
        $this->load->view('mastersupplier_list', $data);
    }

    public function edit() {

        $idsupplier = $this->input->post('id');
        $supplier = $this->orm->supplier->where('idsupplier', $idsupplier)->fetch();

        $data = array();
        $data['idsupplier'] = $supplier['idsupplier'];
        $data['namasupplier'] = $supplier['namasupplier'];
        $data['nomorhpsupplier'] = $supplier['nomorhpsupplier'];
        $data['emailsupplier'] = $supplier['emailsupplier'];
        $data['alamatsupplier'] = $supplier['alamatsupplier'];
        $data['kotasupplier'] = $supplier['kotasupplier'];
        $data['jenissupplier'] = $supplier['jenissupplier'];
        $data['keterangan'] = $supplier['keterangan'];

        echo json_encode(array('response' => 'success', 'datas' => $data));
    }

    public function proses() {

        $idsupplier = $this->input->post('idsupplier');
        
        $setting_model = new Setting_model;


        $data = array();
        $data['idsupplier'] = ($idsupplier == null) ? $setting_model->_getId('supplier') : $idsupplier;
        $data['namasupplier'] = $this->input->post('namasupplier', true);
        $data['nomorhpsupplier'] = $this->input->post('nomorhpsupplier', true);
        $data['emailsupplier'] = $this->input->post('emailsupplier', true);
        $data['alamatsupplier'] = $this->input->post('alamatsupplier', true);
        $data['kotasupplier'] = $this->input->post('kotasupplier', true);
        $data['jenissupplier'] = $this->input->post('jenissupplier', true);
        $data['keterangan'] = $this->input->post('keterangan', true);





        if ($idsupplier == null) {
            $supplier = $this->orm->supplier();
            $ress = $supplier->insert($data);
            $result = ($ress == TRUE ? array('response' => 'success', 'msg' => 'Tambah Data Supplier Berhasil') : array('response' => 'error', 'msg' => 'Maav Tambah Data Supplier Gagal'));
            echo json_encode($result);
        } else {
            $supplier = $this->orm->supplier->where('idsupplier', $idsupplier);
            $ress = $supplier->update($data);
            $result = ($ress == TRUE ? array('response' => 'success', 'msg' => 'Edit Data Supplier Berhasil') : array('response' => 'error', 'msg' => 'Maav Edit Data Supplier Gagal'));
            echo json_encode($result);
        }
    }

    public function delete() {
        $idsupplier = $this->input->post('id');
        if ($idsupplier != null) {
            $supplier = $this->orm->supplier->where('idsupplier', $idsupplier);
            $ress = $supplier->delete();
            $result = ($ress == TRUE ? array('response' => 'success', 'msg' => 'Tambah Data Supplier Berhasil') : array('response' => 'error', 'msg' => 'Maav Tambah Data Supplier Gagal'));
            echo json_encode($result);
        }

        redirect('masterdata/mastersupplier');
    }

}

?>