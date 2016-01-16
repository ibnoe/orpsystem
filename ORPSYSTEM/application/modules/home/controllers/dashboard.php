<?php

class Dashboard extends MX_Controller
{
    function __construct()
    {
        parent:: __construct();
        $this->checkLogin();
        Account::_valLogin();
        
        $this->orm->debug = true;
    }
    
    	public function index()
	{ 
            $this->load->model('profile_model');
            $this->load->model('dashboard_model');
            $this->output->enable_profiler(false);
          
            $profile = new profile_model();
            $dashboard = new dashboard_model();
            
            $data = array();
            $data['profile'] = $profile->_getProfileUser();     
            $data['logs'] = $dashboard->_loadLogs();    
            $data['lastlogs'] = $profile->_getLastLogs();   
            $data['menu'] = 'dashboard';
            
            //print_r($data['lastlogs']); exit;
            $this->load->view('dashboard_view',$data);
	}
        
        
        
        

}

?>