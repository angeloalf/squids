<?php
class Anuncios extends Model {
    public function getQuantidades(){
        $sql = "SELECT * FROM anuncios";
        $sql = $this->con->query($sql);
        $qt = $sql->rowCount();
        return $qt;
    }   
}

