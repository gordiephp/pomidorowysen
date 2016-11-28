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

$deletenews = $db->prepare("
    DELETE 
    FROM news
    WHERE id = :id
    LIMIT 1
    ");

$deletenews->execute(['id' => $id]);

header('location:' . BASE_URL . 'admin/news_list.php');   
}

if (!isset($_GET['id'])) {
    header('location:' . BASE_URL . 'admin/news_list.php');
    die();
}
    
$id = $_GET['id'];

$selectnews = $db->prepare("
    SELECT *  
    FROM news
    WHERE id = :id
    ");

$selectnews->execute(['id' => $id]);
$selectnews = $selectnews->fetch(PDO::FETCH_ASSOC);

generate_token();

require APP_ROOT . '/views/admin/news_delete.php';

