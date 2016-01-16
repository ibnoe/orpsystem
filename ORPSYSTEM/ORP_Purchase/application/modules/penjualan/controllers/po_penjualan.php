<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class po_penjualan extends MX_Controller {


    public function index() {
        $this->load->model('penjualan_model');
        $this->load->view('po_penjualan_view')
            ; 
    }
   
        
    
  
}
