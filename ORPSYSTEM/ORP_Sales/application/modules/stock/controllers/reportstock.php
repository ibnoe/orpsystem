<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Reportstock extends MX_Controller {


    public function index() {
        $this->load->model('stock_model');
        $this->load->view('reportstock_view')
            ; 
    }
   
        
    
  
}
