<?php

require '../app/start.php';

if (!empty($_POST)) {

if(!isset($_POST['token'])) {
    echo 'brak tokena';
    die();
}
    
if(!check_token($_POST['token'])) {
    echo 'bledny token';
    die();
}    
    
$id = $_POST['id'];

$deleteproduct = $db->prepare("
    DELETE 
    FROM product
    WHERE id = :id
    LIMIT 1
    ");

$deleteproduct->execute(['id' => $id]);

header('location:' . BASE_URL . 'admin/product_list.php');   
}

if (!isset($_GET['id'])) {
    header('location:' . BASE_URL . 'admin/product_list.php');
    die();
}
    
$id = $_GET['id'];

$selectproduct = $db->prepare("
    SELECT *  
    FROM product
    WHERE id = :id
    ");

$selectproduct->execute(['id' => $id]);
$selectproduct = $selectproduct->fetch(PDO::FETCH_ASSOC);

generate_token();

require APP_ROOT . '/views/admin/product_delete.php';