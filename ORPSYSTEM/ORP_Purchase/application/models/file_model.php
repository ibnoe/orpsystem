<?php
/**
 * Login_model Class
 *
 */
class file_model extends  CI_Model {
	/**
	 * Constructor
	 */
	function __construct()
         {
        parent::__construct();
        
	}
	
	
        function get_file_type($tipe_file)
	{
            $type = '';
            
            switch($tipe_file) {
                
                case "image/gif" : $type = 'photo';  break;
                case "image/jpeg" : $type = 'photo';  break;
                case "image/pjpeg" : $type = 'photo';  break;
                case "image/png" : $type = 'photo';  break;
                case "image/bmp" : $type = 'photo';  break;
                case "image/tif" : $type = 'photo';  break;                
                case "application/pdf" : $type = 'pdf';  break;
                case "application/doc" : $type = 'doc';  break;
                case "video/x-flv" : $type = 'video';  break;
                case "audio/mp3" : $type = 'audio';  break;
                case "audio/mpeg" : $type = 'audio';  break;
                case "audio/mpg" : $type = 'audio';  break;
                case "audio/mpeg3" : $type = 'audio';  break;
                
            }
            
            return $type;
            
	}
}
// END Login_model Class

/* End of file login_model.php */ 
/* Location: ./system/application/model/login_model.php */