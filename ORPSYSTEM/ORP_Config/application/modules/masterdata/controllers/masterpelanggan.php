<?php

class MasterPelanggan extends MX_Controller {

    function __construct() {
        parent:: __construct();
        $this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");

        Account::_valLogin();
		$_SESSION['config_menu'] = 'pelanggan_supplier';
        $this->orm->debug = true;
    }

    public function index() {

        if (isset($_SESSION['message'])) {
            Message::_modal($_SESSION['message']['title'], $_SESSION['message']['content'], $_SESSION['message']['icon']);
        }

        $data = array();
        $data['link'] = site_url('/') . "masterdata/masterpelanggan/list_data";

        $data['pelanggan'] = $this->orm->pelanggan();
        $this->load->view('default', $data);
    }
    
    public function list_data(){
		$data['title'] 			= 'Data Pelanggan';
		$data['link'] = site_url('/') . "masterdata/masterpelanggan/list_data";
		$data['pelanggan'] 		= $this->orm->pelanggan();
		$this->load->view('masterpelanggan_list', $data);       
	}

    public function edit() {
        $idpelanggan = $this->input->post('id');
        $pelanggan = $this->orm->pelanggan->where('idpelanggan', $idpelanggan)->fetch();
        
        $data = array();
        $data['idpelanggan'] = $pelanggan['idpelanggan'];
        $data['namapelanggan'] = $pelanggan['namapelanggan'];
        $data['nomorhppelanggan'] = $pelanggan['nomorhppelanggan'];
        $data['emailpelanggan'] = $pelanggan['emailpelanggan'];
        $data['alamatpelanggan'] = $pelanggan['alamatpelanggan'];
        $data['kotapelanggan'] = $pelanggan['kotapelanggan'];
        $data['jenispelanggan'] = $pelanggan['jenispelanggan'];
        $data['keterangan'] = $pelanggan['keterangan'];
       
        
        echo json_encode(array('response' => 'success', 'datas' => $data));
    }

    public function proses() {

        $idpelanggan = $this->input->post('idpelanggan');
        
        $setting_model = new Setting_model;

        $data = array();
        $data['idpelanggan'] = ($idpelanggan == null) ? $setting_model->_getId('pelanggan') : $idpelanggan;
        $data['namapelanggan'] = $this->input->post('namapelanggan', true); //Post datanya lengkapin
		$data['nomorhppelanggan'] = $this->input->post('nomorhppelanggan', true); 
		$data['emailpelanggan'] = $this->input->post('emailpelanggan', true); 
		$data['alamatpelanggan'] = $this->input->post('alamatpelanggan', true); 
		$data['kotapelanggan'] = $this->input->post('kotapelanggan', true); 
		$data['jenispelanggan'] = $this->input->post('jenispelanggan', true); 
		$data['keterangan'] = $this->input->post('keterangan', true);
		
        if ($idpelanggan == null) {
            $pelanggan = $this->orm->pelanggan();
            $ress = $pelanggan->insert($data);
            $result = ($ress==TRUE ? array('response'=>'success','msg'=>'Tambah Data Pelanggan Berhasil') : array('response'=>'error','msg'=>'Maav Tambah Data Pelanggan Gagal'));
            echo json_encode($result);
        } else {
            $pelanggan = $this->orm->pelanggan->where('idpelanggan', $idpelanggan);
            $ress = $pelanggan->update($data);
            $result = ($ress==TRUE ? array('response'=>'success','msg'=>'Edit Data Pelanggan Berhasil') : array('response'=>'error','msg'=>'Maav Edit Data Pelanggan Gagal'));
            echo json_encode($result);
        }
    }
    
    public function delete($idpelanggan = null) {

        $idpelanggan = $this->input->post('id');        
        if ($idpelanggan != null) {
            $pelanggan = $this->orm->pelanggan->where('idpelanggan',$idpelanggan);
            $ress = $pelanggan->delete();
           $result = ($ress==TRUE ? array('response'=>'success','msg'=>'Hapus Data Pelanggan Berhasil') : array('response'=>'error','msg'=>'Maav Hapus Data Pelanggan Gagal'));
            echo json_encode($result);
            
        } 
    }

}

?>