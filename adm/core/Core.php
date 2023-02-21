<?php
/*
 * Classe para o núcleo do sistema - iniciar (método run())
 * 
 */
class Core {
    public function run() {
        
        $url = '/';
        $params = array();
        
        if (isset($_GET['url'])) {
            $url .= addslashes($_GET['url']);
        }
        
        if (!empty($url) && $url != '/') {
            $url = explode('/', $url);
            array_shift($url); //elimina o primeiro registro do array [0] = 0 (barra)
            
           $currentController = $url[0].'Controller';
           array_shift($url); //elimina o primeiro registro do array [0] = controller
           
           if (isset($url[0]) && !empty($url[0])) {
               $currentAction = $url[0];
               array_shift($url); //elimina o primeiro registro do array [0] = action
           } else {
               $currentAction = 'index';
           }
           
           if (count($url)>0 && !empty($url[0])) {
               $params = $url;
           }
           
        } else {
            $currentController = 'homeController';
            $currentAction = 'index';
        }
        
        // erro 404 - notfound
        if(!file_exists('controllers/'.$currentController.'.php') || !method_exists($currentController, $currentAction)) {
			$currentController = 'notfoundController';
			$currentAction = 'index';
	}
        
        $controller = new $currentController();
        
        call_user_func_array(array($controller, $currentAction), $params);
        
        
    }
} // final da classe
