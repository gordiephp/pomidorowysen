<?php 
ini_set('display_errors' ,0);

define('APP_ROOT', dirname(__FILE__)); //define('APP_ROOT', __DIR__);
define('BASE_URL', 'xxx');

try {
    $db = new PDO('mysql:host=localhost;dbname=xxx','xxx','xxx');
}
catch(PDOexception $e) {
    echo 'blad '; //. $e->getMessage();
    die();
}

require APP_ROOT . '/functions.php';