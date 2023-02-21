<?php

class Controller {
    
    public function loadView($viewName, $viewData = array()) {
        extract($viewData); // pega valores do array e transforma em variáveis. ex.: quantidade => 5, fica $quantidade = 5;
        require 'views/'.$viewName.'.php';
    }
    public function loadTemplate($viewName, $viewData = array()) {
        require 'templates/'.TEMPLATE.'/index.php';
    }
    
    public function loadViewInTemplate($viewName, $viewData = array()) {
        extract($viewData); // 
        require 'views/'.$viewName.'.php';
    }
   
}

