<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class hutang_piutang extends MX_Controller {


    public function index() {
        $this->load->model('hutang_model');
        $this->load->view('hutang_view')
            ; 
    }
   
        
    
  
}
