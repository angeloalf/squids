<?php

class Categories extends Model {
    
    //READ
    
    // get categories
    public function getCategoryNameByAlias($alias) {
        $sql = "SELECT category_name FROM categories WHERE category_alias = ?";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($alias));
        if ($sql->rowCount()>0) {
           return $sql->fetch(PDO::FETCH_ASSOC)['category_name'];
        } else return null;
    }
    
        public function getCategoryIdByAlias($alias) {
        $sql = "SELECT id FROM categories WHERE category_alias = ?";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($alias));
        if ($sql->rowCount()>0) {
           return $sql->fetch(PDO::FETCH_ASSOC)['id'];
        } else return null;
    }
    
    
    
    
    
    
} // end class

