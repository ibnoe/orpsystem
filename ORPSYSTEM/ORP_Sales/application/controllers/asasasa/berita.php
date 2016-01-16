<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class berita extends MX_Controller {

    var $class = 'berita';

    public function index() {
        $this->load->model('berita_model');
        
        $data = array();
        $data['class'] = $this->class;
        $data['berita'] = $this->berita_model->_loadAll();
        $this->load->view('berita_view', $data);
    }
    
    
    public function view($id_berita) {
        $this->load->model('berita_model');
        
        $data = array();
        $data['class'] = $this->class;
        $data['berita'] = $this->berita_model->_getByid_berita($id_berita);
        $data['judul'] = $data['berita']['judul'];

        $this->load->view('beritadetail_view', $data);        
    }
    
        
    
  
}
