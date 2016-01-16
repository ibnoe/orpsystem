<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Encrypt_2015');
    }

    public function index() {

        echo "<h1>Account</h1>";
    }

    public function register() {

        $encrypt = new Encrypt_2015();

        $idrefstore = $this->orm->refstore->max('idrefstore');

        if (empty($idrefstore)) {
            $idrefstore = 1;
        } else {
            $idrefstore = $idrefstore + 1;
        }

        $data = array();
        $data['idrefstore'] = $idrefstore;
        $data['nama'] = $this->input->post('name_retail', true);
//        $data['tlp'] =  '';
//        $data['email'] =  '';
//        $data['lokasi'] =  '';
//        $data['keterangan'] =  '';

        $ress_refstore = $this->orm->refstore->insert($data);

        $data = array();
        $data['username'] = $this->input->post('username', true);
        $data['password'] = $encrypt->_base64_encrypt($this->input->post('password', true));
        $data['email'] = $this->input->post('email', true);
        $data['idrole'] = 6;
        $data['idrefstore'] = $idrefstore;

        $ress_user = $this->orm->user->insert($data);

        $result = array();
        $result['status'] = (($ress_refstore['idrefstore'] != NULL AND $ress_user['username'] != NULL )) ? false : true;
        $result['messages'] = (($ress_refstore['idrefstore'] != NULL AND $ress_user['username'] != NULL )) ? 'Pendaftaran Gagal' : 'Pendaftaran Berhasil';

        echo json_encode($result);
    }

    public function login() {

        $encrypt = new Encrypt_2015();

        $username = $this->input->post('username', true);
        $password = $encrypt->_base64_encrypt($this->input->post('password'));

        $check = $this->orm->user->where('username = ? AND password = ?', $username, $password);


        $data = array();
        $result = array();

        if (count($check) != 0) {

            $user = $check->fetch();
            $data['username'] = $user['username'];
            $data['password'] = $user['password'];
            $data['namalengkap'] = $user['namalengkap'];
            $data['nomorhp'] = $user['nomorhp'];
            $data['email'] = $user['email'];
            $data['idrole'] = $user['idrole'];
            $data['role'] = $user->role['role'];
            $data['idrefstore'] = $user['idrefstore'];
            $data['nama_store'] = $user->refstore['nama'];
            $data['tlp_store'] = $user->refstore['tlp'];
            $data['email_store'] = $user->refstore['email'];
            $data['lokasi_store'] = $user->refstore['lokasi'];
            $data['keterangan_store'] = $user->refstore['keterangan'];


            $result['status'] = true;
            $result['messages'] = 'Berhasil Login';
            $result['user'] = $data;
        } else {
            $result['status'] = true;
            $result['messages'] = 'Berhasil Login';
            $result['user'] = $data;
        }

        echo json_encode($result);
    }

}
