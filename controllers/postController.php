<?php
/* 
 * Controller posts (articles) - show list and each post
 * @versão: 1.0.0
 * @autor: Angelo Luis Ferreira
 * @email: angelo.alf@gmail.com
 * @alias: byALF
 * @date: 28/01/2022
 * @packge: RateRock
 * 
 */

class postController extends Controller {
    
    // all post list by category
    public function list ($categoryAlias) {
        $data = array();
        
        // create instances
        $c = new Categories();
        $content = new Content();
        
        // get category name       
        $categoryName = $c->getCategoryNameByAlias($categoryAlias);
               
        // verification if $categoryName exits
        if (!$categoryName) {
           header('Location: '.BASE_URL);
           die();
        }
        
         // get catgory id
        $categoryId = $c->getCategoryIdByAlias($categoryAlias);
        
        // get all posts by category_id
        $posts = $content->getAllPostsByCategoryId($categoryId);
        
        // data to send
        $data['categoryName'] = $categoryName;
        $data['categoryAlias'] = $categoryAlias;
        $data['posts'] = $posts;
        
        
        $this->loadTemplate('postsList', $data);
    }
    
    // show article content
    public function article($categoyAlias, $titleAlias) {
        $data = array();
        
        // create instances
        $c = new Categories();
        $content = new Content();
        
        // get category id by category alias
        $categoryId = $c->getCategoryIdByAlias($categoyAlias);
        
        // get article data
        $articleData = $content->getArticleByTitleAlias($categoryId, $titleAlias);
        
        
        
        // data to send
        $data['articleData'] = $articleData;
        
        
        $this->loadTemplate('article', $data);        
    }
    
    
    
}// end class