<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        echo "<h1>User</h1>";

    }

    public function detil($user_id = 0) {

        $row = $this->orm->user->where('user_id', $user_id)->fetch();

        $ress = array();
        $ress['user_id'] = $row['user_id'];
        $ress['username'] = $row['username'];
        $ress['fb_id'] = $row['fb_id'];
        $ress['twitter_id'] = $row['twitter_id'];
        $ress['twitter_name'] = $row['twitter_name'];
        $ress['photo_url'] = $row['photo_url'];
        $ress['gcm_id'] = $row['gcm_id'];
        $ress['join_date'] = $row['join_date'];
        $ress['email'] = $row['email'];
        $ress['last_update_date'] = $row['last_update_date'];


        $result = array();
        $result['response'] = (count($row) == 0) ? 204 : 200;
        $result['message'] = (count($row) == 0) ? 'Tidak Ditemukan' : 'OK';
        $result['founded'] = count($row);
        $result['result'] = (count($row) == 0) ? '' : $ress;

        $this->_outputjson($result);
    }

    public function search_user($keyword = '') {

        $keyword = urldecode($keyword);

        $data = $this->orm->user->where('username LIKE ? OR email LIKE ?', "%$keyword%", "%$keyword%");

        $ress2 = array();
        foreach ($data as $row) {
            $ress = array();
            $ress['user_id'] = $row['user_id'];
            $ress['username'] = $row['username'];
            $ress['fb_id'] = $row['fb_id'];
            $ress['twitter_id'] = $row['twitter_id'];
            $ress['twitter_name'] = $row['twitter_name'];
            $ress['photo_url'] = $row['photo_url'];
            $ress['gcm_id'] = $row['gcm_id'];
            $ress['join_date'] = $row['join_date'];
            $ress['email'] = $row['email'];
            $ress['last_update_date'] = $row['last_update_date'];
            $ress2[] = $ress;
        }


        $result = array();
        $result['response'] = (count($data) == 0) ? 204 : 200;
        $result['message'] = (count($data) == 0) ? 'Tidak Ditemukan' : 'OK';
        $result['founded'] = count($data);
        $result['result'] = (count($data) == 0) ? '' : $ress2;

        $this->_outputjson($result);
    }

    public function login() {
        
        $parm = $this->input->post('parm');

        $data = array();
        $data['username'] = $this->input->post('username');
        $data['fb_id'] = $this->input->post('fb_id');
        $data['twitter_id'] = $this->input->post('twitter_id');
        $data['twitter_name'] = $this->input->post('twitter_name');
        $data['photo_url'] = $this->input->post('photo_url');
        $data['gcm_id'] = $this->input->post('gcm_id');
        $data['email'] = $this->input->post('email');
        $data['join_date'] = date('Y-m-d');
        $data['last_update_date'] = date('Y-m-d H:i:s');

        

        $check = $this->orm->user->where('email', $data['email']);

        if (count($check) == 0) {
            $user = $this->orm->user();
            $row = $user->insert($data);

            $ress = array();
            $ress['user_id'] = $row['user_id'];
            $ress['username'] = $row['username'];
            $ress['fb_id'] = $row['fb_id'];
            $ress['twitter_id'] = $row['twitter_id'];
            $ress['twitter_name'] = $row['twitter_name'];
            $ress['photo_url'] = $row['photo_url'];
            $ress['gcm_id'] = $row['gcm_id'];
            $ress['join_date'] = $row['join_date'];
            $ress['email'] = $row['email'];
            $ress['last_update_date'] = $row['last_update_date'];

            $result = array();
            $result['response'] = 200;
            $result['message'] = 'Register Berhasil';
        } else {
            $user = $this->orm->user->where('email', $data['email']);
            $user->update($data);

            $row = $user->fetch();
            
            $ress = array(); 
            $ress['user_id'] = $row['user_id'];
            $ress['username'] = $row['username'];
            $ress['fb_id'] = $row['fb_id'];
            $ress['twitter_id'] = $row['twitter_id'];
            $ress['twitter_name'] = $row['twitter_name'];
            $ress['photo_url'] = $row['photo_url'];
            $ress['gcm_id'] = $row['gcm_id'];
            $ress['join_date'] = $row['join_date'];
            $ress['email'] = $row['email'];
            $ress['last_update_date'] = $row['last_update_date'];

            $result = array();
            $result['response'] = 200;
            $result['message'] = 'Login Berhasil';
        }

        $result['user'] = $ress;

        $this->_outputjson($result);
    }



}
