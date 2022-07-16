<?php

class Model {
    protected $con;
 
    public function __construct() {
        global $con;
        $this->con = $con;
    }           
} // final da classe


