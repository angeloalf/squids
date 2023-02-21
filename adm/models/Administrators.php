<?php

class Administrators extends Model {
    // READ
    // read email and password, verfy and put in session
    public function login($email, $password, $code) {
        $sql = "SELECT * FROM adm WHERE email = ? AND password = ? AND code = ? AND level = 'administrator'";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($email, $password, $code));
        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
            $_SESSION['rlogin'] = $row['id'];
            return true;
        } else return false;
    }
    
    // get administrator name
    public function getName($id) {
        $sql = "SELECT name FROM adm WHERE id = ?";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($id));
        if ($sql->rowCount() > 0) {
            return $sql->fetch(PDO::FETCH_ASSOC)['name'];           
        }
    }
    
} // end class

