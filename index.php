<?php

require 'app/start.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perpage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 && $_GET['per-page'] != 0 ? (int)$_GET['per-page'] : 4;
       
$start = ($page > 1)? ($page -1) * $perpage : 0; //blok przed pustym ?=page lub minusem

$news = $db->prepare("
    SELECT SQL_CALC_FOUND_ROWS *
    FROM news 
    ORDER BY created DESC
    LIMIT {$start} , {$perpage}
    
    ");

$news->execute();

$news = $news->fetchALL(PDO::FETCH_ASSOC);

$total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
$pages = ceil($total / $perpage);

for ($i = 0; $i < count($news); $i++) {  //zamienia na obiekty datetime
    $news[$i]['created'] = new Datetime($news[$i]['created']);
    if ($news[$i]['updated']) {
        $news[$i]['updated'] = new Datetime($news[$i]['updated']);
    }
}

require APP_ROOT . '/views/home.php';
