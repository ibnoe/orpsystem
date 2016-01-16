<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Report_package extends MX_Controller {


    public function index() {
        $this->load->model('package_model');
        $this->load->view('report_package_view')
            ; 
    }
   
        
    
  
}
