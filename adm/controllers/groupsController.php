<?php
/* 
 * Controller groups add and edition (administrador)
 * @versão: 1.0.0
 * @autor: Angelo Luis Ferreira
 * @email: angelo.alf@gmail.com
 * @alias: byALF
 * @date: 12/02/2022
 * @packge: webolista v1.0
 * 
 * @class models: Administrators, 
 * 
 */

class groupsController extends Controller {
    
    // login verification and go to home page (__construct())
    public function __construct() {
        if (empty($_SESSION['rlogin'])) {
            header('Location: '.BASE_URL.'/login');
            exit;
        }
    } // end construct()
    
    public function index() {
        $data = array();
        
        // create objects
        $g = new Groups();
        
        // set intial variables
        $id = null;
        $groupName = null;
        $groupImage = null;
        
        
        // get category id for edition
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        // get data POST request form (create and update)
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);               
        if ($_FILES && $name) {
            $imageGroupName = $_FILES['groupImage']['name'];
            $imageGroupFile = $_FILES['groupImage']['tmp_name'];
            $g->moveCtegoryImage($imageGroupName, $imageGroupFile);  
        }
        
        // get data Post request form (categories edition)
        if (!$id) { 
           $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT); 
           if ($id && $name) {
               $g->setGroupData($name, $imageGroupName, $id);   // make categories table update
               // set variables
               $id = null;
               $name = null;
           }
        }
        
        // field verification and insert data or go to edit data        
        if ($name && !$id) {
            $g->createGroupData($name, $imageGroupName); // insert           
        }  else if ($id) {
            $groupName = $g->getGroupById($id)['name'];
            $groupImage = $g->getGroupById($id)['image'];                             
        }
        
        
        // get all groups
        $groupList = $g->getAllGroups();
        
        // groups data to send
        $data['groupName'] = $groupName;
        $data['groupImage'] = $groupImage;
        $data['id'] = $id;        
        $data['groupList'] = $groupList;
        
        $this->loadTemplate('groups', $data);
    }
    
} // end class

