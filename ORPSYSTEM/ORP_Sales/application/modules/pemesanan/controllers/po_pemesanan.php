<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class po_pemesanan extends MX_Controller {


    public function index() {
        $this->load->model('pemesanan_model');
        $this->load->view('po_pemesanan_view')
            ; 
    }
   
        
    
  
}
