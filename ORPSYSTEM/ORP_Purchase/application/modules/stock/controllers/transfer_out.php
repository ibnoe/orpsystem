<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Transfer_out extends MX_Controller {


    function __construct() {
        parent:: __construct();
        $this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        // $this->load->helper('pdf_helper');

       
        $this->orm->debug = true;
    }
    

    public function index() {
         Account::_valLogin();
        $this->load->model('stock_model');
        
        if (isset($_SESSION['message'])) {
            Message::_modal($_SESSION['message']['title'], $_SESSION['message']['content'], $_SESSION['message']['icon']);
        }

        $data = array();
        $data['link'] = base_url() . "Deliveryorder";
        $data['deliveryorderdetail'] = $this->orm->deliveryorderdetail->order('iddeliveryorderdetail ASC,iddeliveryorder DESC');
        
        $this->load->view('transferout_view',$data)
            ; 
    }
  
}
