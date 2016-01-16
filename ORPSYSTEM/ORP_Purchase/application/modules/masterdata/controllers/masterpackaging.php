<?php

class Masterpackaging extends MX_Controller {

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
        $data['link'] = base_url() . "masterdata/masterpackaging/list_data";

        $this->load->view('default', $data);
    }

    public function list_data() {
        $data['title'] = 'Data Packaging';
        $data['link'] = site_url() . "masterdata/masterpackaging/list_data";        
        $data['packaging'] = $this->orm->packaging();
        $this->load->view('masterpackaging_list', $data);
    }

    public function edit() {
       $idpackaging = $this->input->post('id');
        $packaging = $this->orm->packaging->where('idpackaging', $idpackaging)->fetch();
        
        $data = array();
        $data['idpackaging'] = $packaging['idpackaging'];
        $data['nama'] = $packaging['nama'];
        
        echo json_encode(array('response' => 'success', 'datas' => $data));     
    }

    public function proses() {

        $setting_model = new Setting_model;
        
        $idpackaging = $this->input->post('idpackaging',TRUE);
        
        $data = array();
        $data['idpackaging'] = ($idpackaging == null) ? $setting_model->_getId('packaging') : $idpackaging;
        $data['nama'] = $this->input->post('nama', true);


        if ($idpackaging == null) {
            $packaging = $this->orm->packaging();
            $ress = $packaging->insert($data);
            
            $result = ($ress==TRUE ? array('response'=>'success','msg'=>'Tambah Data Pengemasan Berhasil') : array('response'=>'error','msg'=>'Maav Tambah Data Pengemasan Gagal'));
            echo json_encode($result);
        } else {
            $packaging = $this->orm->packaging->where('idpackaging', $idpackaging);
            $ress = $packaging->update($data);
            $result = ($ress==TRUE ? array('response'=>'success','msg'=>'Edit Data Pengemasan Berhasil') : array('response'=>'error','msg'=>'Maav Edit Data Pengemasan Gagal'));
            echo json_encode($result);
        }
    }

    
    
    public function delete() {
        $idpackaging = $this->input->post('id', true);
        if ($idpackaging != null) {
            $packaging = $this->orm->packaging->where('idpackaging', $idpackaging);
            $ress = $packaging->delete();
            if ($ress) {
                echo json_encode(array('response' => 'success', 'msg' => 'Delete Data Pengemasan Berhasil'));
            } else {
                echo json_encode(array('response' => 'error', 'msg' => 'Delete Data Pengemasan Gagal'));
            }
        }
        exit;
    }

}

?>