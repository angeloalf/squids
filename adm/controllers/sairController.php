<?php
/* 
 * Controller logout painel de controle (administrador)
 * @versão: 1.0.0
 * @autor: Angelo Luis Ferreira
 * @email: angelo.alf@gmail.com
 * @alias: byALF
 * @date: 06/02/2022
 * @packge: webolista v1.0
 * 
 * @class models: Administrators, 
 * 
 */

class sairController extends Controller {
    
    public function index() {
        session_destroy(); // destroys sessions (destruimos a sessão)
        session_unset(); // clean global variables of sessions (limpamos as variaveis globais das sesssões)
        
        header('Location: '.BASE_URL.'/login');        
    }     
} // end class