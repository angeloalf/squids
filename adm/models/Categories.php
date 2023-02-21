<?php

class Categories extends Model {
    
    // CREATE
    public function categoriesData($categoryName, $alias) {
        if (!$this->categoriesExists($alias)) {
            $sql = "INSERT INTO categories (category_name, category_alias) VALUES (?, ?)";
            $sql = $this->con->prepare($sql);
            $sql->execute(array($categoryName, $alias));  
        }
    }
    
    // READ
    // get data for all categories
    public function getDataAllCategories() {
        $sql = "SELECT * FROM categories";
        $sql = $this->con->query($sql);
        if ($sql->rowCount()>0) {
           return $sql->fetchAll(PDO::FETCH_ASSOC); 
        } else return array();
    }
    
    // get category name by id
    public function getCategoryNameById($id) {
        $sql = "SELECT category_name FROM categories WHERE id ='$id'";
        $sql = $this->con->query($sql);
        if ($sql->rowCount()>0) {
            return $sql->fetch(PDO::FETCH_ASSOC)['category_name'];
        } else return null;
    }
        
    // verification
    private function categoriesExists($alias) {
        $sql = "SELECT * FROM categories WHERE category_alias = ?";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($alias));
        if ($sql->rowCount()>0) {
           return true; 
        } else return false;
    }
    
   public function categoriesByIdExists($id) {
        $sql = "SELECT * FROM categories WHERE id = ?";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($id));
        if ($sql->rowCount()>0) {
           return true; 
        } else return false;
    }
    
} // end class




