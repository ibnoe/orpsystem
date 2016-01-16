<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class do_pemesanan extends MX_Controller {


    public function index() {
        $this->load->model('pemesanan_model');
        $this->load->view('do_pemesanan_view')
            ; 
    }
   
        
    
  
}
