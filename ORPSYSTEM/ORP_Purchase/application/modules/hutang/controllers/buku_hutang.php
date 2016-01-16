<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class buku_hutang extends MX_Controller {


    public function index() {
        $this->load->model('hutang_model');
        $this->load->view('buku_hutang_view')
            ; 
    }
   
        
    
  
}
