<?php

class Masterjenisbarang extends MX_Controller {

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

        
        $data['link'] = site_url() . "masterdata/masterjenisbarang/list_data";
        $this->load->view('default', $data);
    }
	
	public function list_data(){
		$data['link'] = site_url() . "masterdata/masterjenisbarang/list_data";
		$data['refjenisbarang'] = $this->orm->refjenisbarang->where('parent', null);
		$this->load->view('masterjenisbarang_list', $data);       
	}

    public function edit($idrefjenisbarang) {


        if (isset($_SESSION['message'])) {
            Message::_modal($_SESSION['message']['title'], $_SESSION['message']['content'], $_SESSION['message']['icon']);
        }

        $data = array();
        $data['link'] = base_url() . "masterjenisbarang";
        $data['refjenisbarang'] = $this->orm->refjenisbarang->where('idrefjenisbarang', $idrefjenisbarang)->fetch();


        $this->load->view('masterjenisbarang_edit_view', $data);
    }

    public function proses() {

        $setting_model 		= new Setting_model;
		$idrefjenisbarang	= $this->input->post('idrefjenisbarang', true);
		if($idrefjenisbarang == '' or $idrefjenisbarang == null){	
			$idrefjenisbarang = null;
		}

        $data['idrefjenisbarang'] = ($idrefjenisbarang == null) ? $setting_model->_getId('refjenisbarang') : $idrefjenisbarang;
        $data['jenisbarang'] = $this->input->post('jenisbarang', true);
		$parent = $this->input->post('parent', true);
        $data['parent'] = $parent =='' ? null : $parent;
        if ($idrefjenisbarang) {
			
			$refjenisbarang = $this->orm->refjenisbarang->where('idrefjenisbarang', $idrefjenisbarang);
            $ress = $refjenisbarang->update($data);
            if($ress){
				echo json_encode(array('response' => 'success', 'msg' => 'Update Jenis barang Berhasil'));		
			}else{
				echo json_encode(array('response' => 'failed', 'msg' => 'Update Jenis barang Gagal'));		
			}
           
        } else {
             $refjenisbarang = $this->orm->refjenisbarang();
            $ress = $refjenisbarang->insert($data);
            if($ress){
				echo json_encode(array('response' => 'success', 'msg' => 'Tambah Jenis Barang Berhasil'));		
			}else{
				echo json_encode(array('response' => 'failed', 'msg' => 'Tambah Jenis Barang Gagal'));		
			}		
        }
    }
    
    public function delete() {
		$idrefjenisbarang = $this->input->post('id', true);
        if ($idrefjenisbarang != null) {
            $refjenisbarang = $this->orm->refjenisbarang->where('idrefjenisbarang',$idrefjenisbarang);
            $ress = $refjenisbarang->delete();
            if($ress){
				echo json_encode(array('response' => 'success', 'msg' => 'Delete Data Gudang Berhasil'));		
			}else{
				echo json_encode(array('response' => 'failed', 'msg' => 'Delete Data Gudang Gagal'));		
			}
            
        } 
    }

}

?>