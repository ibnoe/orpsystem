<?php

class Masterbarang extends MX_Controller {

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
        $data['link'] = base_url() . "masterdata/masterbarang/list_data";


        $this->load->view('default', $data);
    }

    public function list_data(){
		$data['title'] 			= 'Data Barang';
		$data['link'] = site_url() . "masterdata/masterbarang/list_data";
		$data['refbarang'] 		= $this->orm->refbarang->where('idrefstore',$_SESSION['user']['idrefstore']);
		$this->load->view('masterbarang_list', $data);       
	}
    
    public function edit() {
        $idrefbarang = $this->input->post('id');
        $refbarang = $this->orm->refbarang->where('idrefbarang', $idrefbarang)->fetch();
        
        $data = array();
        $data['idrefbarang'] = $refbarang['idrefbarang'];
        $data['idrefjenisbarang'] = $refbarang['idrefjenisbarang'];
        $data['idrefsatuan'] = $refbarang['idrefsatuan'];
        $data['kodebarang'] = $refbarang['kodebarang'];
        $data['namabarang'] = $refbarang['namabarang'];
        $data['stockawal'] = $refbarang['stockawal'];
        $data['stock'] = $refbarang['stock'];
        $data['idpackaging'] = $refbarang['idpackaging'];
        $data['idrefgudang'] = $refbarang['idrefgudang'];
        $data['image_file'] = $refbarang['image_file'];
        
        echo json_encode(array('response' => 'success', 'datas' => $data));
                
    }

    public function proses() {

        $setting_model = new Setting_model;
        
        $idrefbarang = $this->input->post('idrefbarang', true);
        
        $data = array();
        $data['idrefbarang'] = ($idrefbarang == null) ? $setting_model->_getId('refbarang') : $idrefbarang;
        $data['idrefjenisbarang'] = $this->input->post('idrefjenisbarang', true);
        $data['idrefsatuan'] = $this->input->post('idrefsatuan', true);
        $data['kodebarang'] = $this->input->post('kodebarang', true);
        $data['namabarang'] = $this->input->post('namabarang', true);
        $data['stockawal'] = $this->input->post('stockawal', true);
        $data['stock'] = $this->input->post('stockawal', true);
        $data['idpackaging'] = $this->input->post('idpackaging', true);
        $data['idrefgudang'] = $this->input->post('idrefgudang', true);
        $data['idrefstore'] = $_SESSION['user']['idrefstore'];

        
        $config['upload_path'] = './'.PATH_IMAGES_ITEMS;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        
        //print_r($_FILES); exit;
        
        $data_upload = $_FILES["image_file"]['name'];
        $tipe_file = $_FILES["image_file"]['type'];
        

        
        if (empty($data_upload)) {
            
         
        } else {
				
            if ($tipe_file == "image/gif" 
            	OR $tipe_file == "image/jpeg" 
            	OR $tipe_file == "image/pjpeg" 
            	OR $tipe_file == "image/png") {
            	
                if (!$this->upload->do_upload('image_file')) {
                
                $error = array('error' => $this->upload->display_errors());
                
                    $data['image_file'] = '';
                } else {
                    $upload_data = $this->upload->data();
                //print_r($upload_data); exit;
                    $data['image_file'] = $upload_data['file_name'];
               		  }
            													} 
            else {

                $data['image_file'] = '';
            }
        }
        
        
        if ($idrefbarang == null) {
            $refbarang = $this->orm->refbarang();
            $ress = $refbarang->insert($data);
            $result = ($ress==TRUE ? array('response'=>'success','msg'=>'Tambah Data Barang Berhasil') : array('response'=>'error','msg'=>'Maav Tambah Data Barang Gagal'));
            echo json_encode($result);
        } else {
            $refbarang = $this->orm->refbarang->where('idrefbarang', $idrefbarang);
            $ress = $refbarang->update($data);
             $result = ($ress==TRUE ? array('response'=>'success','msg'=>'Edit Data Barang Berhasil') : array('response'=>'error','msg'=>'Maav Edit Data Barang Gagal'));
            echo json_encode($result);
        }
    }
    
    public function delete() {

        $idrefbarang = $this->input->post('id', true);
        
        if ($idrefbarang != null) {
            $refbarang = $this->orm->refbarang->where('idrefbarang',$idrefbarang);
          $ress = $refbarang->delete();
             $result = ($ress==TRUE ? array('response'=>'success','msg'=>'Hapus Data Barang Berhasil') : array('response'=>'error','msg'=>'Maav Hapus Data Barang Gagal'));
            echo json_encode($result);
            
        } 
        

    }

}

?>