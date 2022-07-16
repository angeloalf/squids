<?php
require 'environment.php';

if (ENVIRONMENT == 'development') {
    
    define("BASE_URL", "http://squids/");
    define("TEMPLATE", "default");
    
    define("DBNAME", "projetos_php");
    define("HOST", "localhost");
    define("USER", "root");
    define("PASS", "");
} else {
    define("BASE_URL", "http://www.webolista.com/system/");
    define("TEMPLATE", "default");
    
    define("DBNAME", "sistemas");
    define("HOST", "localhost");
    define("USER", "root");
    define("PASS", "");
}
global $con;
try {
    $con = new PDO("mysql:dbname=".DBNAME.";host=".HOST, USER, PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $ex) {
    echo "NÃO CONECTADO " .$ex->getMessage();
    exit;
}  

