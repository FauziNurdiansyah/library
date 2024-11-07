<?php 

    function convert_date($value) {
        return date('H:i:s - D M Y', strtotime($value));
    }
 ?>