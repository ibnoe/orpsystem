<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class setting extends MX_Controller {


    public function index() {
        $this->load->model('setting_model');
        $this->load->view('setting_view')
            ; 
    }
   
        
    
  
}
