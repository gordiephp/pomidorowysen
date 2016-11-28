<?php require APP_ROOT . '/views/admin/template/header.php';?>
<?php require APP_ROOT . '/views/admin/template/menu.php';?>

<div class="container">
<form action="<?php echo BASE_URL?>admin/news_add.php" method="POST" autocomplete="off">
  
        <input type="text" name="title" placeholder="tytuł">
        <input type="text" name="slug" placeholder="slug">
        <textarea name="body" placeholder="treść newsa"></textarea>
        <input type="submit" value="dodaj newsa">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
</form>

<?php require APP_ROOT . '/views/admin/template/footer.php';?>
</div>