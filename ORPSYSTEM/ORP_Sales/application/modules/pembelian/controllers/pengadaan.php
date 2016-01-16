<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class pengadaan extends MX_Controller {


    public function index() {
        $this->load->model('pembelian_model');
        $this->load->view('pengadaan_view')
            ; 
    }
   
        
    
  
}
