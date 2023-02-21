<?php
/* 
 * Controller categories add and edition (administrador)
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

// use namespace for slugigy app composer
use Cocur\Slugify\Slugify;

class categoriesController extends Controller {
    
    // login verification and go to home page (__construct())
    public function __construct() {
        if (empty($_SESSION['rlogin'])) {
            header('Location: '.BASE_URL.'/login');
            exit;
        }
    } // end construct()
    
    public function index() {
        $data = array();
        
        // create objects
        $slugify = new Slugify(); // slug app composer (vendor)
        $c = new Categories();
        
        // get all caterories list
        $categoriesList = $c->getDataAllCategories();
        
        // // get data POST request form (create and update)
        $categoryName = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_SPECIAL_CHARS);
   
        // set album name slug (alias)
        $alias = $slugify->slugify($categoryName);
        
        // insert data into categories table (mysql)
        if ($categoryName) {          
            $c->categoriesData($categoryName, $alias);  
        }
        
        // data exports
        $data['categoriesList'] = $categoriesList;

        $this->loadTemplate('categories', $data);
    }
    
    
} // end class