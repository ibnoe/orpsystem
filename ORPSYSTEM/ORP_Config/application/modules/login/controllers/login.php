<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->orm->debug = true;
    }

    public function index() {
       $this->checkLogout();
       $this->_checkMessage();

        $this->load->view('login_view');
    }

    
     public function process() {

           $account_model = new account_model;

           $data = array();
           
        $this->output->enable_profiler(FALSE);

        $email = $this->input->post('email');
        $password = $this->encrypt_callback($this->input->post('password'));

        if (!empty($email) || !empty($password)) {

            if ($account_model->cekLogin($email,$password)) {

                $user = $this->orm->useraccount->where('email',$email)->fetch();
           
                $data['namalengkap'] = $user['namalengkap'];
                $data['nomorhp'] = $user['nomorhp'];
                $data['email'] = $user['email'];
                $data['alamat'] = $user['alamat'];
                $data['idrole'] = $user['idrole'];
                $data['idrefstore'] = $user['idrefstore'];
                $data['role'] = $user->role['role'];
                
                $_SESSION['user'] = $data;
                $_SESSION['login'] = TRUE;
                                 
                redirect('home');
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }
    
    
    public function logout() {
      
        unset($_SESSION['login']);
        session_destroy();

        redirect('login');
    }
    
    
    
    
    
    
}

?>