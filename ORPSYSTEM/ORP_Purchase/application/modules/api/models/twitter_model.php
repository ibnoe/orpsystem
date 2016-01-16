<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Twitter_model extends  CI_Model  {

   var $auth = array(
       'username'=>null, 
       'consumer_key'=>null, 
       'consumer_secret'=>null, 
       'access_token'=>null, 
       'access_secret'=>null,
       'callback'=> null );

    function __construct() {
        parent::__construct();
		$this->load->library('TwitterOAuth');                               
                
                $ress = $this->db->query(" SELECT consumer_key, consumer_secret, access_token, access_secret FROM m_twitter WHERE username = '@satusulteng' ")->row_array();
                $this->auth = $ress;
                $this->auth['username'] = '@satusulteng';
                $this->auth['callback'] = base_url().'twitter/callback';
    }

    
    function post($message) {
        
        error_reporting(0);
        
		$acces = array(
        'consumer_key' => $this->auth['consumer_key'],
        'consumer_secret' => $this->auth['consumer_secret'],
        'access_token' => $this->auth['access_token'],
        'access_secret' => $this->auth['access_secret'] );

		$twitter = new TwitterOAuth($acces['consumer_key'], $acces['consumer_secret'], $acces['access_token'], $acces['access_secret']);
		$response = $twitter->post('statuses/update', array('status' => $message));	

         
        
    }
    
  
    
   
}


/*  
$acces = array(
        'consumer_key' => 'gBDOnxDv7gB4YyrXAz8w',
        'consumer_secret' => 'eUTf2BlVv9joAtemLgSeTk7W2exJKs3H4CiQ2zUa4fM',
        'access_token' => '1418599530-JvjvGyEgQmUGoM55hcFl1GhUgTicPMN48o1tTkc',
        'access_secret' => 'f8AHAopIA1x1EAuwskGhFTcsrpXcKCu9AThB71bCA' );

*/