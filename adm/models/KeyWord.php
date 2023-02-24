<?php

class KeyWord extends Model {
    
    //READ
    public function getAllKeyWord() {
        $sql = "SELECT * FROM key_word";
        $sql = $this->con->query($sql);
        if ($sql->rowCount()>0) {
           return $sql->fetchAll(PDO::FETCH_ASSOC); 
        } else return array();
    }
    
} // end class

