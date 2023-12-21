<?php

class Useful {
    
    // got to previous page
    public static function goBack() {
        // go back to the previous page
        $fallback = 'index.php';
        $previous = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $fallback;
        header("location: {$previous}");
        exit;  
    }
    
} // end class

