<?php

class homeController extends Controller {
    public function index() {
        $anuncios = new Anuncios();
        $users = new Users; 
        $dados = array(
            'quantidade'=> $anuncios->getQuantidades(),
            'nome' => $users->getName()
        );
        $this->loadTemplate('home', $dados);
    }
    
    public function login() {
        echo "Faça o login";
        echo '<br>';
    }
    
    
    
    
} // fim da classe homeControlller

