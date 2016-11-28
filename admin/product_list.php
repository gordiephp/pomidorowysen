<?php
require '../app/start.php';

$product = $db->query("
    SELECT * 
    FROM product
    ORDER BY title ASC
    ");

$product = $product->fetchAll(PDO::FETCH_ASSOC);

require APP_ROOT . '/views/admin/product_list.php';