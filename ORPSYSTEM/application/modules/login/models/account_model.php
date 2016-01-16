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
        
           public function insertLogs($idrefjenislogs) {
             $data = array();
             $data['ipaddress'] = $this->input->ip_address();
             $data['email'] = $_SESSION['user']['email'];
             $data['namalengkap'] = $_SESSION['user']['namalengkap'];
             $data['idrefstore'] = $_SESSION['user']['idrefstore'];
             $data['logstime'] = date("Y-m-d H:i:s");
             $data['idrefjenislogs'] = $idrefjenislogs;
             
             $this->orm->logs->insert($data);
            
        }
}
