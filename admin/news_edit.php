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
    
    $id     = $_POST['id'];
    $title  = $_POST['title'];
    $slug   = $_POST['slug'];
    $body   = $_POST['body'];
    
    $updatenews = $db->prepare("
        UPDATE news
        SET
            title = :title,
            slug  = :slug,
            body  = :body,
            updated = NOW()
        WHERE id = :id
        ");

    $updatenews->execute([
        'id' => $id,
        'title' => $title,
        'slug' => $slug,
        'body' => $body]);
    header('location:' . BASE_URL . 'admin/news_list.php');
    
}

if (!isset($_GET['id'])) {
    header('location:' . BASE_URL . 'admin/news_list.php');
    die();
}

$id = $_GET['id'];

$editpage = $db->prepare("
    SELECT *
    FROM news
    WHERE id = :id
    LIMIT 1
    ");

$editpage->execute(['id' => $id]);

$editpage = $editpage->fetch(PDO::FETCH_ASSOC);

if (!$editpage) {        //sprawdza czy znaleziono takie id
     header('location:' . BASE_URL . 'admin/news_list.php'); 
    die();  
}

generate_token();

require APP_ROOT . '/views/admin/news_edit.php';
