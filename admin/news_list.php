<?php
require '../app/start.php';

$news = $db->query("
    SELECT * 
    FROM news
    ORDER BY created DESC
    ");

$news = $news->fetchAll(PDO::FETCH_ASSOC);

for ($i = 0; $i < count($news); $i++) {  //zamienia na obiekty datetime
    $news[$i]['created'] = new Datetime($news[$i]['created']);
    if ($news[$i]['updated']) {
        $news[$i]['updated'] = new Datetime($news[$i]['updated']);
    }
}

require APP_ROOT . '/views/admin/news_list.php';