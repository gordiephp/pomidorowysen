<?php 

require 'app/start.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perpage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 && $_GET['per-page'] != 0 ? (int)$_GET['per-page'] : 8;

$start = ($page > 1)? ($page -1) * $perpage : 0; //blok przed pustym ?=page lub minusem

$product = $db->prepare("
    SELECT SQL_CALC_FOUND_ROWS *
    FROM product 
    ORDER BY title ASC
    LIMIT {$start} , {$perpage}
    
    ");

$product->execute();

$product = $product->fetchALL(PDO::FETCH_ASSOC);

$total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
$pages = ceil($total / $perpage);

require APP_ROOT . '/views/product_list.php';