<?php

class Administrators extends Model {      

    // READ
    // read email and password, verfy and put in session
    public function login($email, $password, $code) {
        $sql = "SELECT * FROM adm WHERE email = ? AND password = ? AND code = ? AND level = 'administrator'";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($email, $password, $code));
        if ($sql->rowCount()>0) {
            $row = $sql->fetch();
            $_SESSION['rlogin'] = $row['id'];
            return true;
        } else return false;
    }
    
    // get administrator name
    public function getName($admId) {
        $sql = "SELECT name FROM adm WHERE id = ?";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($admId));
        if ($sql->rowCount()>0) {
            return $sql->fetch(PDO::FETCH_ASSOC)['name'];           
        }
    }
    
    // get post pages by administrator
    public function getPostPages($admId) {        
        $sql = "SELECT posts_by_page FROM adm WHERE id = '$admId'";
        $sql = $this->con->query($sql);
        if ($sql->rowCount()>0) {
           return $sql->fetch(PDO::FETCH_ASSOC)['posts_by_page'];
        } else return 30; // default
    }
    
    // UPDATE
    public function setPostsByPage($admId, $nPosts) {
        $nPosts = intval($nPosts); // string to int
        $sql = "UPDATE adm SET posts_by_page = '$nPosts' WHERE id = '$admId'";
        $sql = $this->con->query($sql);      
    }
    
} // end class

