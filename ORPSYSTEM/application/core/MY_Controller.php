<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function _checkLogin() {

        if ($this->session->userdata('login') == FALSE) {
            redirect('login');
        }
    }

    function _outputjson($data) {
        $data = json_encode($data);
        $length = strlen($data);
        header('Content-Type: application/json; charset=utf-8');
        header('Content-Length: ' . $length);
        header('Access-Control-Allow-Origin: *');
        echo $data;
        exit();
    }

    function _outputjsonpost($data) {
        $data = json_encode($data);
        $length = strlen($data);
        header('Content-Type: application/json; charset=utf-8');
        header('Content-Length: ' . $length);
        echo $data;
        exit();
    }

    function _outputcurl($data) {
        $length = strlen($data);
        header('Content-Type: application/json');
        header('Content-Length: ' . $length);
        echo $data;
        exit();
    }

    

}
