<?php

class Register extends MX_Controller {

    function __construct() {
        parent:: __construct();
        $this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->checkLogout();
        
        $this->orm->debug = TRUE;
    }

    public function index() {
        
        $this->_checkMessage();
        
        $data = array();
        $data['link'] = site_url('/') . "register";
        $this->load->view('register_view', $data);
    }

    
    public function proses() {
    
        $account_model = new account_model;
        
        if($account_model->cekAvaibleEmail($this->input->post('email'))) {
            
        $idrefstore = $this->orm->refstore->max('idrefstore');
          
        if(empty($idrefstore)) {
            $idrefstore = 1;
        }
        else {
            $idrefstore = $idrefstore+1;
        }
        
        $data = array();
        $data['idrefstore'] = $idrefstore;
        $data['nama'] = $this->input->post('nama_refstore',true);
//        $data['tlp'] =  '';
//        $data['email'] =  '';
//        $data['lokasi'] =  '';
//        $data['keterangan'] =  '';
        
       $ress_refstore = $this->orm->refstore->insert($data);
        
        $data = array();
        $data['email'] = $this->input->post('email',true);
        $data['namalengkap'] = $this->input->post('namalengkap',true);
        $data['password'] = $this->encrypt_callback($this->input->post('password',true));        
        $data['idrole'] = 6; // Administrator Store
        $data['idrefstore'] = $idrefstore;
        
       $ress_user = $this->orm->useraccount->insert($data);
        

           $_SESSION['message'] = 'Register Successfully';
       
       
       redirect('login');
    } 
    
    else {
        
        $_SESSION['message'] = 'Email Not Available, Already Registered';
         redirect('register');
    }
    
        }

}

?>