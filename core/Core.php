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
        
        // especial routes (friendly links) - call functions
        $url = $this->checkRoutes($url);

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
    
    // check routes   
    public function checkRoutes($url) {
        global $routes;
        foreach ($routes as $pt => $newUrl) {
            // indentifica os argumentos e substitui por regex (expressões regulares)
            $pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9-]{1,})', $pt);
            
            // faz o match da url
            if (preg_match('#^('.$pattern.')*$#i' , $url, $matches) == 1) {
                array_shift($matches);
                array_shift($matches);
                
                // pega todos os argumentos
                $itens = array();
                if (preg_match_all('(\{[a-z0-9]{1,}\})', $pt, $m)) {
                    $itens = preg_replace('(\{|\})', '', $m[0]);
                }

                // faz a associação
                $arg = array();
                foreach ($matches as $key => $match) {
                    $arg[$itens[$key]] = $match;
                }
                
                // monta a nova url
                foreach ($arg as $argKey => $argValue) {
                    $newUrl = str_replace(':'.$argKey, $argValue, $newUrl);
                }
                
                $url = $newUrl;
                break;


            }
        }
        
        return $url;        
    } 
    
    
} // final da classe
