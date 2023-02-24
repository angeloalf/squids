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
    
// Lista all posts    
    public function index() {
        $data = array();
   
        // create instances        
        $c = new Categories();
        $k = new KeyWord();
        
        // set initial variables
        $id = null;
        
        // get if has id GET REQUEST
        $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT); 
              
        // get all caterories list
        $categoriesList = $c->getDataAllCategories();       
                                 
        // get all key words for categories classification
        $keyWord = $k->getAllKeyWord();                                
        
        // data exports
        $data['categoriesList'] = $categoriesList; 
        $data['keyWord'] = $keyWord;
        $data['id'] = $id;

        $this->loadTemplate('categories', $data);
    }
    
// CREATE NEW CATEGORY
    public function new() {
        // create instances
        $slugify = new Slugify(); // slug app composer (vendor)
        $c = new Categories();
        $k = new KeyWord();
        
        // // get data POST request form (create and update)
        $categoryName = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $key = filter_input(INPUT_POST,'key', FILTER_SANITIZE_SPECIAL_CHARS); 
        
        // set album name slug (alias)
        $alias = $slugify->slugify($categoryName);
        
        // get all key words for categories classification
        $keyWord = $k->getAllKeyWord();
        
        // insert data into categories table (mysql)
        if ($categoryName) {
            $c->categoriesData($categoryName, $alias, $key);          
        }
        
        header('Location: '.BASE_URL.'/categories');
        exit();        
    }
    
// EDIT SPECIFC CATEGORY
    public function edit($id) {
        // create instances
        $slugify = new Slugify(); // slug app composer (vendor)
        $c = new Categories();
        $k = new KeyWord();
        
        if ($id && !$c->categoriesByIdExists($id)) {
            header('Location: '.BASE_URL.'/categories');
        }
        
        // // get data POST request form (create and update)
        $categoryName = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $key = filter_input(INPUT_POST,'key', FILTER_SANITIZE_SPECIAL_CHARS); 
        
        // set album name slug (alias)
        $alias = $slugify->slugify($categoryName);
        
        // get all key words for categories classification
        $keyWord = $k->getAllKeyWord();
        
        if ($categoryName && $id) {
            $c-> setCategoryEdit($categoryName, $alias, $key, $id);
            header('Location: '.BASE_URL.'/categories');
            exit();             
        }
                               
        header('Location: '.BASE_URL.'/categories?id='.$id);
        exit();             
    }

    
} // end class