<?php 
require '../app/start.php';

if (isset($_POST['title']) && isset($_POST['body'])) {

if(!isset($_POST['token'])) {
    echo 'brak tokena';
    die();
}
    
if(!check_token($_POST['token'])) {
    echo 'bledny token';
    die();
}  
    ////////////////////////////////////////////////////////
    //caly upload do wymiany 
    if (isset($_FILES['file'])) {
   
    $file = $_FILES['file'];
        
    $file_name = $file['name'];
    $file_tmp  = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
    $allowed = ['jpg','png'];

        if (in_array($file_ext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size <= 2097152) {
                    $file_name_new = uniqid('', true) . '.' . $file_ext; 
                    $file_destination = '../uploads/' . $file_name_new;
                    move_uploaded_file($file_tmp, $file_destination);
                }
            }
            
        }   else { 
            $file_name_new = '123.jpg';
            }
    }//caly upload do wymiany 
//////////////////////////////////////////////////////////
    
    $title  = $_POST['title'];
    $body   = $_POST['body'];

    $addnews = $db->prepare("
        INSERT INTO product (title, body, image)
        VALUE (:title, :body, :image)
        ");
    
    $addnews->execute([
        'title' => $title,
        'body'  => $body,
        'image' => $file_name_new
        ]);        
    
    header('location:' . BASE_URL . 'admin/product_list.php');    
}

generate_token();

require APP_ROOT . '/views/admin/product_add.php';