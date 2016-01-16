<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Report extends MX_Controller {


    public function index() {
        $this->load->model('report_model');
        $this->load->view('report_view')
            ; 
    }
   
        
    
  
}
