<?php

require '../app/start.php';
   
if (isset($_POST['title']) && isset($_POST['body']) && isset($_POST['slug'])) {

if(!isset($_POST['token'])) {
    echo 'brak tokena';
    die();
}
    
if(!check_token($_POST['token'])) {
    echo 'bledny token';
    die();
}    
    
    $title  = $_POST['title'];
    $slug   = $_POST['slug'];
    $body   = $_POST['body'];

    $addnews = $db->prepare("
        INSERT INTO news (title, slug, body, created)
        VALUE (:title, :slug, :body, NOW())
        ");
    
    $addnews->execute([
        'title' => $title,
        'slug'  => $slug,
        'body'  => $body
        ]);        
    
    header('location:' . BASE_URL . 'admin/news_list.php');    
}

generate_token();

require APP_ROOT . '/views/admin/news_add.php';