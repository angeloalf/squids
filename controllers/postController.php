<?php
/* 
 * Controller posts (articles) - show list and each post
 * @versão: 1.0.0
 * @autor: Angelo Luis Ferreira
 * @email: angelo.alf@gmail.com
 * @alias: byALF
 * @date: 28/01/2022
 * @packge: Squids.com.br
 * 
 */

class postController extends Controller {
    
// ALL CATEGORIES LIST BY KEYWORD
    public function categoriesList($keywordAlias): void {
        $data = array();
        
        // create instances
        $k = new Keyword();
        $c = new Categories();

        // get keyword name by keyword alias
        $keywordName = $k->getKeyWordNameByKeyWordAlias($keywordAlias);

        // get categories list by keyword name       
        $categoriesList = array();       
        if ($keywordName) {
            $categoriesList = $c->getCategoriesByKeyWordName($keywordName); 
        } else {
            header('Location: '.BASE_URL);
            die();
        }

        // data to send
        $data['keywordAlias'] = $keywordAlias;
        $data['keywordName'] = $keywordName;
        $data['categoriesList'] = $categoriesList;

        $this->loadTemplate('categoriesList', $data);
   }
 
// ALL POSTS LIST BY CATEGORY   
   public function postsList($keywordAlias, $categoryAlias): void {
        $data = array();
        
        // create instances
        $c = new Categories();               
        $content = new Content();
        $k = new Keyword();                                
                                        
        // get keyword and category name
        $keywordName = $k->getKeyWordNameByKeyWordAlias($keywordAlias);
        $categoryName = $c->getCategoryNameByAlias($categoryAlias);
         
               
        // verification if $categoryName exits
        if (!$keywordName || !$categoryName) {
           header('Location: '.BASE_URL);
           die();
        }
        
         // get catgory id
        $categoryId = $c->getCategoryIdByAlias($categoryAlias);       
        
        // get key word alias by keyWord
        $keywordAlias = $k->getKeyWordAliasByKeyWordName($keywordName);
        
        // get all posts by category_id
        isset($_SESSION['rlogin']) ? $posts = $content->getAllPostsByCategoryIdNoPublished($categoryId) : $posts = $content->getAllPostsByCategoryId($categoryId);
        
        // data to send
        $data['categoryName'] = $categoryName;
        $data['categoryAlias'] = $categoryAlias;
        $data['keywordAlias'] = $keywordAlias;
        $data['posts'] = $posts;        
        
        $this->loadTemplate('postsList', $data);
    }

// OPEN POST 
    public function open($keywordAlias,$categoryAlias,$titleAlias): void {
        $data = array();        
        
        // create instances
        $c = new Categories();
        $k = new Keyword();
        $content = new Content();               
        
        // get category id and key word by category alias
        $categoryId = $c->getCategoryIdByAlias($categoryAlias);               
        
        // get article data
        $articleData = $content->getArticleByTitleAlias($categoryId, $titleAlias);
        
        // get keyword name
        $keywordName = $k->getKeyWordNameByKeyWordAlias($keywordAlias);
        
        // verification article link exists and add new view (view = view + 1)
        if ($categoryId && $articleData && $keywordName) $content->setViews($titleAlias);
        else  header('Location: '.BASE_URL);
                
        // get names for link bar
        $keyWord = $c->getKeyWordByAlias($categoryAlias);
        $category = $c->getCategoryNameByAlias($categoryAlias);
        $title = $articleData['title'];
        
        // data to send
        $data['articleData'] = $articleData;
        $data['keyWord'] = $keyWord;
        $data['keyWordAlias'] = $keywordAlias;
        $data['category'] = $category;
        $data['categoryAlias'] = $categoryAlias;
        $data['title'] = $title;
                
        $this->loadTemplate('article', $data);        
    }        
   
}// end class