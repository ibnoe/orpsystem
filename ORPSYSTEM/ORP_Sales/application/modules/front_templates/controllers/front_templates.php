<?php

class Front_templates extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
            $this->load->model('front_templates_model');
            $this->load->view('home_view');
    }
   
    public function header()
    {
        $this->load->view('header_view');
    }
	public function menu()
    {
        $this->load->view('menu_view');
    }
	public function js()
    {
        $this->load->view('js_view');
    }
	public function js_master()
    {
        $this->load->view('js_master_view');
    }
	public function notification()
    {
        $this->load->view('notification_view');
    }
	public function footer()
    {
        $this->load->view('footer_view');
    }

	
}

?>