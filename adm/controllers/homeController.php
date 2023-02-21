<?php
/* 
 * Controller login panel control acess (administrador)
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

class homeController extends Controller {
    
    // login verification and go to home page (__construct())
    public function __construct() {
        if (empty($_SESSION['rlogin'])) {
            header('Location: '.BASE_URL.'/login');
            exit;
        }
    } // end construct()
    
    // index create
    public function index() {
        $data = array();
             
        
        // set initial variables
                        
        
        // count all blogs approved
        //$totalApprovedBlogs = $b->countAllBlogsApproved();
        
        // data to sent to home
       
        
        $this->loadTemplate('home', $data);
    }
    
    
    
    
    
} // fim da classe homeControlller

