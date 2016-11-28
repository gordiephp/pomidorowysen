<?php require APP_ROOT . '/views/admin/template/header.php';?>
<?php require APP_ROOT . '/views/admin/template/menu.php';?>

<div class="container">
<form action="<?php echo BASE_URL?>admin/product_delete.php" method="POST" autocomplete="off">
        <input type="hidden" name="id" value="<?php echo $selectproduct['id'];?>">
        <input type="submit" value="usun">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
</form>

<?php require APP_ROOT . '/views/admin/template/footer.php';?>
</div>