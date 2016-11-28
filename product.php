<?php 
require 'app/start.php';

if (!isset($_GET['id'])) {
    $id = false;
    header('location:' . BASE_URL . 'products.php');

} else {
    
$id = $_GET['id'];

$single_product = $db->prepare("
    SELECT *
    FROM product
    WHERE id = :id
    LIMIT 1
");

$single_product->execute(['id' => $id]);
$single_product = $single_product->fetch(PDO::FETCH_ASSOC);
    
}

require APP_ROOT . '/views/single_product.php';