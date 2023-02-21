<?php

class homeController extends Controller {
    public function index() {
        $data = array();
        
        $this->loadTemplate('home', $data);
    }
    
    public function login() {
        echo "Faça o login";
        echo '<br>';
    }
    
    
    
    
} // fim da classe homeControlller

