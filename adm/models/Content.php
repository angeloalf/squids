<?php

class Content extends Model {
    
    // CREATE
    public function createContent($state,$author,$title,$titleAlias,$content,$metaDescription,$categoryId) {
        $sql = "INSERT INTO content "
                . "(created,published,state,author,title,title_alias,content,meta_description,category_id)"
                . " VALUES (NOW(),NOW(),?,?,?,?,?,?,?)";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($state,$author,$title,$titleAlias,$content,$metaDescription,$categoryId));
    }
    
    // UPDATE
    public function setContent($state,$title,$titleAlias,$content,$metaDescription,$categoryId,$contentId) {
        $sql = "UPDATE content "
                . "SET published = NOW(), state = ?, title = ?, title_alias = ?, content = ?, meta_description = ?, category_id = ?"
                . "WHERE id = ?";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($state,$title,$titleAlias, $content,$metaDescription,$categoryId,$contentId));  
    }
    
    // set to trash status
    public function setPosttoTrash($contentId, $titleAlias, $trashStatus) {
        $sql = "UPDATE content SET trash = '$trashStatus' WHERE id = '$contentId' AND title_alias = '$titleAlias'";
        $sql = $this->con->query($sql);
    }
        
    // READ
    // get all posts per page
    public function getAllContent($pageInitial, $nPosts) {
       $sql = "SELECT * FROM content WHERE trash = 'no' ORDER BY created DESC LIMIT $pageInitial, $nPosts";
       $sql = $this->con->query($sql);
       if ($sql->rowCount()>0) {
           return $sql->fetchAll(PDO::FETCH_ASSOC);
       } else return array();
    }
    
    // count all posts
    public function countAllContent() {
        $sql = "SELECT count(*) as t FROM content";
        $sql = $this->con->query($sql);        
        $sql = $sql->fetch(PDO::FETCH_ASSOC);
        return $sql['t'];
    }
    
    // get for all post by categories
    public function getAllContentById($categoryId,$pageInitial, $nPosts) {
        $sql = "SELECT * FROM content WHERE trash = 'no' AND category_id = '$categoryId' ORDER BY created DESC LIMIT $pageInitial, $nPosts";
        $sql = $this->con->query($sql);
        if ($sql->rowCount()>0) {
           return $sql->fetchAll(PDO::FETCH_ASSOC); 
        } else return array();
    }
    
    // count all posts by category
    public function countAllContentByCategory($categoryId) {
        $sql = "SELECT count(*) as t FROM content WHERE trash = 'no' AND category_id = '$categoryId'";
        $sql = $this->con->query($sql);        
        $sql = $sql->fetch(PDO::FETCH_ASSOC);
        return $sql['t'];
    }
    
    // get for all post by state
    public function getAllContentByState($published,$pageInitial, $nPosts) {
        $sql = "SELECT * FROM content WHERE trash = 'no' AND state = '$published' ORDER BY created DESC LIMIT $pageInitial, $nPosts";
        $sql = $this->con->query($sql);
        if ($sql->rowCount()>0) {
           return $sql->fetchAll(PDO::FETCH_ASSOC); 
        } else return array();
    }
    
    // count all posts by state
    public function countAllContentByState($published) {
        $sql = "SELECT count(*) as t FROM content WHERE trash = 'no' AND state = '$published'";
        $sql = $this->con->query($sql);        
        $sql = $sql->fetch(PDO::FETCH_ASSOC);
        return $sql['t'];
    }
    
    // get trash posts 
    public function getTrashContent() {
       $sql = "SELECT * FROM content WHERE trash = 'yes' ORDER BY created DESC";
       $sql = $this->con->query($sql);
       if ($sql->rowCount()>0) {
           return $sql->fetchAll(PDO::FETCH_ASSOC);
       } else return array();
    }
    
    // trash status
    public function getTrashStatus($contentId, $titleAlias) {
        $sql = "SELECT trash FROM content WHERE id = '$contentId' AND title_alias = '$titleAlias'";
        $sql = $this->con->query($sql);
        if ($sql->rowCount()>0) {
          return $sql->fetch(PDO::FETCH_ASSOC)['trash'];  
        } else return null;
    }
    
    //get id from mysql by title_alias
    public function getIdByTitleAlias($titleAlias) {
       $sql = "SELECT id FROM content WHERE title_alias = '$titleAlias'"; 
       $sql = $this->con->query($sql);
       if ($sql->rowCount()>0) {
          return $sql->fetch(PDO::FETCH_ASSOC)['id'];
       } else return null;
    }
    
    // get content from MySql by title_alias
    public function getContentByTitleAlias($contentId,$titleAlias) {
        $sql = "SELECT * FROM content WHERE title_alias = '$titleAlias' AND id='$contentId'";
        $sql = $this->con->query($sql);
        if ($sql->rowCount()>0) {
            return $sql->fetch(PDO::FETCH_ASSOC);
        } else return array();       
    }
    

    
    
    
} // end class

