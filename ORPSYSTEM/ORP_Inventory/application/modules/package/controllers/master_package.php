<?php

class Master_package extends MX_Controller {

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
        $data['link'] = site_url('/') . "Masterpackage";
	
		$data['package'] = $this->orm->package();
        //$data['package'] = $this->orm->package->where('idpackage',$_SESSION['user']['idrefstore']);
        $this->load->view('masterpackage_view', $data);
    }

    public function edit($idpackage) {


        if (isset($_SESSION['message'])) {
            Message::_modal($_SESSION['message']['title'], $_SESSION['message']['content'], $_SESSION['message']['icon']);
        }

        $data = array();
        $data['link'] = site_url('/') . "Masterpackage";

        $data['package'] = $this->orm->package->where('idpackage', $idpackage)->fetch();


        $this->load->view('Masterpackage_edit_view', $data);
    }

    public function proses($idpackage = null) {

        $setting_model = new Setting_model;

        $data = array();
        $data['idpackage'] = ($idpackage == null) ? $setting_model->_getId('package') : $idpackage;
        $data['namapackage'] = $this->input->post('namapackage', true);
        $data['keterangan'] = $this->input->post('keterangan', true);
        $data['idrefstore'] = $_SESSION['user']['idrefstore'];

        if ($idpackage == null) {
            $package = $this->orm->package();
            $ress = $package->insert($data);
            $idpackage = $ress['idpackage'];
            Message::_set((isset($ress['idpackage']) ? TRUE : FALSE), 'Tambah Data Package Berhasil', 'Tambah Data Barang Gagal');
        } else {
            $package = $this->orm->package->where('idpackage', $idpackage);
            $ress = $package->update($data);
            Message::_set(($idpackage!=null? TRUE : FALSE), 'Edit Data Barang Berhasil', 'Edit Data Barang Gagal');
        }
        
       $this->orm->packagedetail->where('idpackage',$idpackage)->delete();     
          
            $idRefBarang = $this->input->post('idrefbarang');
            $jumlahBarang = $this->input->post('jumlahbarang');
            $keterangan = $this->input->post('keterangan_barang');
            
            foreach($idRefBarang as $key=>$value) {
                $dataDetilBarang = array();
                $dataDetilBarang['idpackagedetail'] = $setting_model->_getMaxId('idpackagedetail','packagedetail');
                $dataDetilBarang['idpackage'] = $idpackage;
                $dataDetilBarang['idrefbarang'] = $idRefBarang[$key];
                $dataDetilBarang['jumlahbarang'] = $jumlahBarang[$key];
                $dataDetilBarang['keterangan'] = $keterangan[$key];
                
                if($dataDetilBarang['idrefbarang']!=0) {
                    $result = $this->orm->packagedetail->insert($dataDetilBarang);
                }
              
            }
            
            if ($idpackage == null) {
           redirect('package/master_package');
            }
            else {
                echo '<script src='.base_url().'front_assets/library/gb/greybox.js"></script>'
                . "<script>parent.GB_hide();</script>";
            }
     
    }
    
    public function delete($idpackage = null) {

        if ($idpackage != null) {
            $package = $this->orm->package->where('idpackage',$idpackage);
           $package->delete();
            Message::_set(TRUE,'Hapus Data Package Berhasil','Hapus Data Package Gagal');
            
        } 
        
        redirect('package/master_package');
    }

}

?>