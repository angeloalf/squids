<?php

class Content extends Model {
    
    // READ
    
    // get all posts by category_id
    public function getAllPostsByCategoryId($categoryId) {
      $sql = "SELECT * FROM content WHERE category_id = '$categoryId' AND state = 'published' AND trash = 'no'";
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
    
    
} // end class
