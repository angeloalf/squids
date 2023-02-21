<?php
/* 
 * Controller login panel control acess (administrador)
 * @versão: 1.0.0
 * @autor: Angelo Luis Ferreira
 * @email: angelo.alf@gmail.com
 * @alias: byALF
 * @date: 06/02/2022
 * @packge: Webolista 1.0
 * 
 * @class models: Administrators, 
 * 
 */

class loginController extends Controller {
    
    // login verification and go to home page (__construct())
    public function __construct() {
        if (!empty($_SESSION['rlogin'])) {
            header('Location: '.BASE_URL.'/home');
            exit();
        }
    }
        
    // index()
    public function index() { 
        $data = array();
        
        // create objects
        $a = new Administrators();
        
        // get values of POST request (login form)
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));
        $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_SPECIAL_CHARS);
        
        // fields verification, mysql query and home page acess
        if ($email && $password && $code) {
            if ($a->login($email, $password, $code)) {
              header('Location: '.BASE_URL.'/home');
              exit();  
            } else {
                $email = null;
                $password = null;
                $code = null;
            }            
        }
        
        $this->loadTemplate('login', $data);       
    }
     
    
} // end class