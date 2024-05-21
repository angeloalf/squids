<?php
require 'environment.php';

if (ENVIRONMENT == 'development') {
    
    define("BASE_URL", "http://squids/adm");
    define("BASE_URL_SITE", "http://squids");
    define("TEMPLATE", "default");
    
    define("DBNAME", "squids");
    define("HOST", "localhost");
    define("USER", "root");
    define("PASS", "");
} else {
     define("BASE_URL", "https://www.squids.com.br/adm");
    define("TEMPLATE", "default");
     
    define("DBNAME", "u554754528_squids");
    define("HOST", "localhost");
    define("USER", "u554754528_squids");
    define("PASS", "8732@xexA");
}
global $con;
try {
    $con = new PDO("mysql:dbname=".DBNAME.";host=".HOST, USER, PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $ex) {
    echo "NÃO CONECTADO " .$ex->getMessage();
    exit;
}  

