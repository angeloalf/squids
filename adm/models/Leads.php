<?php

class Leads extends Model {
    
    //READ
    // get name of Lead by id
    public function getLeaName($leadId) {
        $sql = "SELECT * FROM leads WHERE id = '$leadId'";
        $sql = $this->con->query($sql);
        if ($sql->rowCount()>0) {
           return $sql->fetch(PDO::FETCH_ASSOC)['leadName']; 
        } else return null;
    }
    
} // end class

