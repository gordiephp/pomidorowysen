<?php require APP_ROOT . '/views/admin/template/header.php';?>
<?php require APP_ROOT . '/views/admin/template/menu.php';?>

<div class="container">
<form action="<?php echo BASE_URL?>admin/product_add.php" method="POST" autocomplete="off" enctype="multipart/form-data">
  
        <input type="text" name="title" placeholder="tytul">
        <input type="file" name="file">
        <textarea name="body" placeholder="opis"></textarea>
        <input type="submit" value="dodaj produkt">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
</form>

<?php require APP_ROOT . '/views/admin/template/footer.php';?>
</div>