<?php 
require 'app/start.php';

if (!isset($_GET['news'])) {
    $slug = false;
    header('location:' . BASE_URL . 'index.php');

} else {
$slug = $_GET['news'];

$single_news = $db->prepare("
    SELECT *
    FROM news
    WHERE slug = :slug
    LIMIT 1
");

$single_news->execute(['slug' => $slug]);
$single_news = $single_news->fetch(PDO::FETCH_ASSOC);
    
    if($single_news) { //zamienia na obiekty datetime
        $single_news['created']= new DateTime($single_news['created']);

        if ($single_news['updated']) {
        $single_news['updated']= new DateTime($single_news['updated']);
        }
    }
}

require APP_ROOT . '/views/single_news.php';