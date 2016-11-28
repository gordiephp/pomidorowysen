<?php require APP_ROOT . '/views/admin/template/header.php';?>
<?php require APP_ROOT . '/views/admin/template/menu.php';?>

<div class="container">
    
<form action="<?php echo BASE_URL?>admin/product_edit.php" method="POST" autocomplete="off" enctype="multipart/form-data">
  
        <input type="text" name="title" value="<?php echo esc($editproduct['title']);?>">
        <input type="file" name="file">
        <textarea  name="body"><?php echo esc($editproduct['body']);?></textarea>
        <input type="submit" value="edytuj produkt">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
        <input type="hidden" name="id" value="<?php echo $editproduct['id'];?>">
        <input type="hidden" name="image" value="<?php echo $editproduct['image'];?>">
</form>

<?php require APP_ROOT . '/views/admin/template/footer.php';?>
    
</div>