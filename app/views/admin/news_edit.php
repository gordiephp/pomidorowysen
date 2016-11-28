<?php require APP_ROOT . '/views/admin/template/header.php';?>
<?php require APP_ROOT . '/views/admin/template/menu.php';?>

<div class="container">
    
<form action="<?php echo BASE_URL?>admin/news_edit.php" method="POST" autocomplete="off">
  
        <input type="text" name="title" value="<?php echo esc($editpage['title']);?>">
        <input type="text" name="slug" value="<?php echo esc($editpage['slug']);?>">
        <textarea  name="body"><?php echo esc($editpage['body']);?></textarea>
        <input type="submit" value="edytuj newsa">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
        <input type="hidden" name="id" value="<?php echo $editpage['id'];?>">
</form>

<?php require APP_ROOT . '/views/admin/template/footer.php';?>
    
</div>