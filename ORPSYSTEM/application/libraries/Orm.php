<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
require_once "notorm-master/NotORM.php" ;

class Orm extends NotORM{
    
    function __construct(NotORM_Structure $structure = null, NotORM_Cache $cache = null){
        $CI =& get_instance();
        $CI->load->database(); //required to get the db parameters 
        //Please set $active_record = FALSE & $db['default']['autoinit'] = FALSE; 
        //in case you don't intend to use them, for low resource usage and better performance
        $connection = new PDO("pgsql:dbname={$CI->db->database};host={$CI->db->hostname};port={$CI->db->port}",
  $CI->db->username,
  $CI->db->password);
        parent::__construct($connection, $structure, $cache);
    }
}