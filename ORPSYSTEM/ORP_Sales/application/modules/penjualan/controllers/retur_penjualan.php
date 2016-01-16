<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class retur_penjualan extends MX_Controller {


    public function index() {
        $this->load->model('penjualan_model');
        $this->load->view('retur_penjualan_view')
            ; 
    }
   
        
    
  
}
