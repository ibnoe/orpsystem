<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class proses_hutang extends MX_Controller {


    public function index() {
        $this->load->model('hutang_model');
        $this->load->view('proses_hutang_view')
            ; 
    }
   
        
    
  
}
