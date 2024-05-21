<?php

class Content extends Model {
    
    // UPDATE
    // add views 
    public function setViews($titleAlias) {
        $sql = "UPDATE content SET views = views + 1 WHERE title_alias = ?";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($titleAlias));
    } 

    // READ
    // get all posts by category_id
    public function getAllPostsByCategoryId($categoryId) {
      $sql = "SELECT * FROM content WHERE category_id = '$categoryId' AND state = 'published' AND trash = 'no'";
      $sql = $this->con->query($sql);
      if ($sql->rowCount()>0) {
          return $sql->fetchAll(PDO::FETCH_ASSOC);
      } else return array();
    }
    
   public function getAllPostsByCategoryIdNoPublished($categoryId) {
      $sql = "SELECT * FROM content WHERE category_id = '$categoryId' AND trash = 'no'";
      $sql = $this->con->query($sql);
      if ($sql->rowCount()>0) {
          return $sql->fetchAll(PDO::FETCH_ASSOC);
      } else return array();
    }
    
    // get article by category alias and title alias
    public function getArticleByTitleAlias($categoryId, $titleAlias) {
      $sql = "SELECT * FROM content WHERE category_id = ? AND title_alias = ?";
      $sql = $this->con->prepare($sql);
      $sql->execute(array($categoryId, $titleAlias));
      if ($sql->rowCount()>0) {
          return $sql->fetch(PDO::FETCH_ASSOC);
      } else return array();
    }
    
    // COUNT
    // count all post by category Id and trash no
    public function countAllContentByCategoryId($categoryId) {
        $sql = "SELECT count(*) as t FROM content WHERE category_id = '$categoryId' AND trash = 'no'";
        $sql = $this->con->query($sql);        
        $sql = $sql->fetch(PDO::FETCH_ASSOC);
        return $sql['t'];
    }
    
   
    
} // end class
