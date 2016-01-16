<?php

class Setting_model extends  CI_Model {
	/**
	 * Constructor
	 */
	function __construct()
         {
        parent::__construct();
        
	}
        
     public function _getId($table) {
         
         // to using this function, Primay key table must name format : id%table name%
         
         $id = $this->orm->$table->max('id'.$table);
          
        if(empty($id)) {
            $id = 1;
        }
        else {
            $id = $id+1;
        }
        
        return $id;
     }
     
     
     public function _getMaxId($id,$table) {
         
         // to using this function, Primay key table must name format : id%table name%
         
         $id = $this->orm->$table->max($id,$table);
          
        if(empty($id)) {
            $id = 1;
        }
        else {
            $id = $id+1;
        }
        
        return $id;
     }
            
}
