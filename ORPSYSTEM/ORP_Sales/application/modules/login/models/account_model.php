<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class account_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();		
	}
        
        
	public function cekLogin($email,$password)
	{
            $check = $this->orm->useraccount->where('email = ? AND password = ?',$email,$password);
            
            if(count($check)!=0) {
                return true;
            }
            
            else {
                return false;
            }
            
	}
        
        public function cekAvaibleEmail($email) {
            
            $check = $this->orm->useraccount->where('email',$email);
            
            if(count($check)!=0) {
                return false;
            }
            else {
                return true;
            }
            
            
        }
        
        
        public function _getStoreName($idrefstore) {
            $ress = $this->orm->refstore->where('idrefstore',$idrefstore)->fetch();
            
            return $ress['nama'];
        }
}
