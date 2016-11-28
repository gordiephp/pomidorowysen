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
    ////////////////////////////////////////////////////////////
    //caly upload do wymiany 
    if (isset($_FILES['file'])) {
        
    $file = $_FILES['file'];
    
    $file_name = $file['name'];
    $file_tmp  = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
    $allowed = ['jpg', 'png'];

        if (in_array($file_ext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size <= 2097152) {
                    $file_name_new = uniqid('', true) . '.' . $file_ext; 
                    $file_destination = '../uploads/' . $file_name_new;
                    move_uploaded_file($file_tmp, $file_destination);
                }
            }
            
        }   else { 
            $file_name_new = $_POST['image'];
            }
    } //caly upload do wymiany 
  /////////////////////////////////////////////////////////////////  
    
    $id     = $_POST['id'];
    $title  = $_POST['title'];
    $body   = $_POST['body'];
    
    $updateproduct = $db->prepare("
        UPDATE product
        SET
            title = :title,
            body  = :body,
            image = :image
        WHERE id = :id
        ");

    $updateproduct->execute([
        'id' => $id,
        'title' => $title,
        'body' => $body,
        'image' => $file_name_new
    ]);
    header('location:' . BASE_URL . 'admin/product_list.php');
    
}

if (!isset($_GET['id'])) {
    header('location:' . BASE_URL . 'admin/product_list.php');
    die();
}

$id = $_GET['id'];

$editproduct = $db->prepare("
    SELECT *
    FROM product
    WHERE id = :id
    LIMIT 1
    ");

$editproduct->execute(['id' => $id]);

$editproduct = $editproduct->fetch(PDO::FETCH_ASSOC);

if (!$editproduct) {        //sprawdza czy znaleziono takie id
     header('location:' . BASE_URL . 'admin/product_list.php'); 
    die();  
}

generate_token();

require APP_ROOT . '/views/admin/product_edit.php';