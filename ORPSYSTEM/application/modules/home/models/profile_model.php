<?php

class profile_model extends  CI_Model {
	/**
	 * Constructor
	 */
	function __construct()
         {
        parent::__construct();
        
	}

     public function _getProfileUser() {
         
         $useraccount = $this->orm->useraccount->where('email',$_SESSION['user']['email'])->fetch();
         $refstore = $this->orm->refstore->where('idrefstore',$useraccount['idrefstore'])->fetch();
         
         $data = array();
         $data['user'] = $useraccount;
         $data['store'] = $refstore;
         
         return $data;
         
     }
     
    public function _getLastLogs() {
        
        $logs = $this->orm->logs->where('email = ? AND idrefstore = ? AND idrefjenislogs = ?',
                $_SESSION['user']['email'],$_SESSION['user']['idrefstore'],1)->order('logstime DESC')->fetch();
        return $logs;
        
    }
        
        
            
}
