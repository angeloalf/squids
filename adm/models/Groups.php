<?php
class Groups extends Model {
    
    // CREATE
    // add image to folder images/categories
    public function moveCtegoryImage($imageGroupName, $imageGroupFile) {
        $destination = "../assets/images/groups/".$imageGroupName;
        move_uploaded_file($imageGroupFile, $destination);
    }       
    
    // Input categories into mysql table    
    public function createGroupData($name, $imageGroupName) {
        if (!$this->groupNameExist($name)) {          
           $sql = "INSERT INTO groups (name, image) VALUES (?,?)";
           $sql = $this->con->prepare($sql);
           $sql->execute(array($name, $imageGroupName));
        }   
    }
    
    // UPDATE
    // set name and/or image of categories 
    public function setGroupData($name, $imageGroupName, $id) {
       $sql = "UPDATE groups SET name = ?, image = ? WHERE id = ?";
       $sql = $this->con->prepare($sql);
       $sql->execute(array($name, $imageGroupName, $id)); 
    }
    
    // READ
    // get all groups - order by name
    public function getAllGroups() {
        $sql = "SELECT * FROM groups ORDER BY name ASC";
        $sql = $this->con->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } else return array();
    }
    
    // get category array by id
    public function getGroupById($id) {
        $sql = "SELECT * FROM groups WHERE id = ?";
        $sql = $this->con->prepare($sql);
        $sql->execute(array($id));
        if ($sql->rowCount() > 0) {
            return $sql->fetch(PDO::FETCH_ASSOC);
        } else return null;
    }
    
    //VALIDATION
    // category name exist verification
    private function groupNameExist($name) {
        $sql = "SELECT name FROM groups WHERE name = '$name'";
        $sql = $this->con->query($sql);
        if ($sql->rowCount() > 0) {
            return true;
        } else return false;
    }
    
    
} // end classs
