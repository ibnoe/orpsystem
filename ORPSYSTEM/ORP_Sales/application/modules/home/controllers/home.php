<?php

class Home extends MX_Controller
{
    function __construct()
    {
        parent:: __construct();
        $this->checkLogin();
        Account::_valLogin();
    }
    
    	public function index()
	{ 
            $this->output->enable_profiler(false);
           
            $this->load->model('stock/stock_model');
            $this->load->model('stock/stock_model');
            
            
            $stock_model = new stock_model();
            
            $data = array();
            $data['top10'] = $stock_model->_loadTop10Transaction();
          
            $this->load->view('home_view',$data);
	}
        
        
        
        

}

?>