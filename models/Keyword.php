<?php

class Keyword extends Model {
    
    // READ
    // get keyWord alias by keyWord name
    public function getKeyWordAliasByKeyWordName($keyWord) {
        $sql = "SELECT key_word_alias FROM key_word WHERE key_word_name = ?";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($keyWord));
        if ($sql->rowCount()>0) {
           return $sql->fetch(PDO::FETCH_ASSOC)['key_word_alias'];
        } else return null;        
    }
    
    // get keyWord name by keyWord alias
    public function getKeyWordNameByKeyWordAlias($keywordAlias) {
        $sql = "SELECT key_word_name FROM key_word WHERE key_word_alias = ?";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($keywordAlias));
        if ($sql->rowCount()>0) {
           return $sql->fetch(PDO::FETCH_ASSOC)['key_word_name'];
        } else return null;        
    }
    
    
} // end class
