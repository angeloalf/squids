<?php
/* 
 * 
 * 
 * 
 */

class galeriaController extends Controller {
    public function index() {
       $dados = array(
            'fotos'=> 'INDEX',
            'alias' => 'indefinido'
        );
       
       $this->loadTemplate('galeria', $dados);
    }
    
   public function abrir($alias) {        
        $dados = array(
           'fotos'=> 'ABRIR', 
        );
        
        if (isset($alias) && !empty($alias)) {
            $dados['alias'] = $alias;
        } else header("Location:".BASE_URL."home");
        
  
                
        $this->loadTemplate('galeria', $dados);        
    }
    

    
    
    
    
    
} // fim da classe homeControlller


