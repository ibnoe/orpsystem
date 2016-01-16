<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 *  Class yang berisi fungsi-fungsi untuk mendapatkan latitude dan longitude dari format google maps
 */

final class Latlong {
    
    function getLat($ll) {
            
        $data = explode(", ", $ll);
        $lat = str_replace("(", "", $data[0]);
        
        return $lat;
    }
    
    function getLong($ll) {
        
        $lat = "";
        
        $data = explode(", ", $ll);
        
        if(!empty($data[1])) {       
        
        $lat = str_replace(")", "", $data[1]); }
        
        return $lat;
    }
    
}

?>
