<?php
/* 
 * Controller create new post
 * @versão: 1.0.0
 * @autor: Angelo Luis Ferreira
 * @email: angelo.alf@gmail.com
 * @alias: byALF
 * @date: 16/07/2022
 * @packge: squids v1.0
 * 
 * @class models: Administrators, 
 * 
 */

// use namespace for slugigy app composer
use Cocur\Slugify\Slugify;

class postController extends Controller {
    
// login verification and go to home page (__construct())
    public function __construct() {
        if (empty($_SESSION['rlogin'])) {
            header('Location: '.BASE_URL.'/login');
            exit;
        }
    } // end construct()

// INDEX posts list
    public function index(){
        $data = array();
        
        // create instances
        $content = new Content();
        $cat = new Categories();
        $k = new KeyWord();
        
        // category item verification
        $categoryId = filter_input(INPUT_GET, 'cat', FILTER_VALIDATE_INT);                
            
        // trash list verification
        $trash = filter_input(INPUT_GET, 'trash', FILTER_SANITIZE_SPECIAL_CHARS);
        
        if (isset($trash) AND $trash == 'yes') {            
            // get trash posts
            $postList = $content->getTrashContent(); 
        } else if (!$trash) {            
           // get all posts
           $categoryId ? $postList = $content->getAllContentById($categoryId) : $postList = $content->getAllContent();  
        } else {
           header('Location: '.BASE_URL.'/post'); 
        }        
        
        // get all categories
        $categories = $cat->getDataAllCategories();
        
        // get all key words for categories classification
        $keyWord = $k->getAllKeyWord();
        
        // data to send
        $data['postList'] = $postList;
        $data['trash'] = $trash;
        $data['categories'] = $categories;
        $data['keyWord'] = $keyWord;
                
        $this->loadTemplate('posts', $data);        
    }

// ADD new post (content)
    public function add() {
        $data = array();

        // create instances
        $c = new Categories;
        $cont = new Content();
        $adm = new Administrators();
        $slugify = new Slugify(); // slug app composer (vendor)

        // set intial variables
        $title = null;
        $info = null;
        $metaDescription = null;

        // set values and attributes for posts form
        $titleValue = null;
        $categoryIdValue = null;
        $stateValue = null;
        $contentValue = null;
        // action form address
        $actionValue = BASE_URL."/post/add";

        // GET POST FORM DATA --------------------------------------------------------
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
        $content =  filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
        $categoryId = filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_NUMBER_INT);
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_SPECIAL_CHARS);      

        // variable definitions (after get from the form)
        $titleAlias = $slugify->slugify($title);
        $author = $adm->getName($_SESSION['rlogin']);         

        // insert new post in the mysql table (content)
        if ($title) {           
           $cont->createContent($state, $author, $title, $titleAlias, $content, $metaDescription, $categoryId);
           // get post id from MySql table by $titleAlias
           $contentId = $cont->getIdByTitleAlias($titleAlias);                     
           // redirect to post edition (post/edit/...) / new=y para chamar info           
           header('Location: '.BASE_URL.'/post/edit/'.$contentId.'/'.$titleAlias.'?saved=y');
           die();
        }
        // --------------------------------------------------------------------------
        // get categories data
        $categories = $c->getDataAllCategories();              

        // data to send
        $data['categories'] = $categories;

        $data['title'] = $title;
        $data['info'] = $info;

        $data['titleValue'] = $titleValue;
        $data['categoryIdValue'] = $categoryIdValue;
        $data['stateValue'] = $stateValue;
        $data['contentValue'] = $contentValue;

        $data['actionValue'] = $actionValue;

        $this->loadTemplate('post', $data);        
    }

// EDIT especific post (content)
    public function edit($contentId, $titleAlias) {
       $data = array();

       // create instances
       $adm = new Administrators();
       $c = new Categories();
       $cont = new Content();
       $slugify = new Slugify(); // slug app composer (vendor)

       // set intial variables
       $info = null; 
       $metaDescription = null; // CORRIGIR
       $seletor = null; // closed and new post variable

       // get categories data from Mysql
        $categories = $c->getDataAllCategories();

       // GET require from redirect links
       $saved = filter_input(INPUT_GET, 'saved', FILTER_SANITIZE_SPECIAL_CHARS);       
       // get $info according GET require
       if ($saved == 'y') {
           $info = "Artigo salvo com sucesso";
       }     

       // get data from MySql
       $contentData =  $cont->getContentByTitleAlias($contentId,$titleAlias);

       // code for save
        $code = md5($adm->getName($_SESSION['rlogin']));

       // set Mysql data into post form fields 
       $titleValue = $contentData['title'];
       $categoryIdValue = $contentData['category_id'];
       $stateValue = $contentData['state'];
       $contentValue = $contentData['content'];
       // action form address
       $actionValue = BASE_URL."/post/edit/".$contentId."/".$titleAlias."?saved=".$code;

        // GET DATA FROM POST FORM -------------------------------------------------------
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
        $categoryId = filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_NUMBER_INT);
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_SPECIAL_CHARS); 
        // get seletor - closed = close edit page | new = new post create
        $seletor = filter_input(INPUT_POST, 'seletor', FILTER_SANITIZE_SPECIAL_CHARS);


        // variable definitions (after get from the form)
        $titleAlias = $slugify->slugify($title);                 

        // insert new post in the mysql table (content)
        if (isset($title) && $saved == $code) {
            $cont->setContent($state, $title, $titleAlias, $content, $metaDescription, $categoryId, $contentId);
            if ($seletor == "closed") {  // button save and close edit
              header('Location: '.BASE_URL.'/post'); 
              die();
            } elseif ($seletor == "new") {  // button save and new post create
               header('Location: '.BASE_URL.'/post/add'); 
              die(); 
            } else {    // button save             
               header('Location: '.BASE_URL.'/post/edit/'.$contentId.'/'.$titleAlias.'?saved=y'); 
               die(); 
            }
        }                    
        // ------------------------------------------------------------------------------        
        // data to send
        $data['contentData'] = $contentData;
        $data['categories'] = $categories;

        $data['info'] = $info;

        $data['titleValue'] = $titleValue;
        $data['categoryIdValue'] = $categoryIdValue;
        $data['stateValue'] = $stateValue;
        $data['contentValue'] = $contentValue;     

        $data['actionValue'] = $actionValue;

        $this->loadTemplate('post', $data);        
    }
    
 // TRASH especific post to trash (content)
  public function trash($contentId, $titleAlias) {
        // create instances
        $c = new Content();
        
        // get trash status
        $trashStatus = $c->getTrashStatus($contentId, $titleAlias);
        
        $trashStatus == 'yes' ? $trashStatus = 'no' : $trashStatus = 'yes';
        
        // set post to trash 
        $c->setPosttoTrash($contentId, $titleAlias, $trashStatus);
        
        header('Location: '.BASE_URL.'/post');
  }
    
} // end class
