<?php

class Categories extends Model {
    
    //READ
    
    // get categories name by category alias
    public function getCategoryNameByAlias($alias) {
        $sql = "SELECT category_name FROM categories WHERE category_alias = ?";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($alias));
        if ($sql->rowCount()>0) {
           return $sql->fetch(PDO::FETCH_ASSOC)['category_name'];
        } else return null;
    }
    
    // get key_word by category $alias
    public function getKeyWordByAlias($alias) {
        $sql = "SELECT key_word FROM categories WHERE category_alias = ?";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($alias));
        if ($sql->rowCount()>0) {
           return $sql->fetch(PDO::FETCH_ASSOC)['key_word'];
        } else return null;
    }
    
    // get categories by keyword
    public function getCategoriesByKeyWordName($keywordName) {
        $sql = "SELECT * FROM categories WHERE key_word = ?";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($keywordName));
        if ($sql->rowCount()>0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } else array();        
    }
    
    
    // get id category by $alias
    public function getCategoryIdByAlias($alias) {
        $sql = "SELECT id FROM categories WHERE category_alias = ?";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($alias));
        if ($sql->rowCount()>0) {
           return $sql->fetch(PDO::FETCH_ASSOC)['id'];
        } else return null;
    }
    
    
    
    
    
    
} // end class

