<?php require APP_ROOT . '/views/admin/template/header.php';?>
<?php require APP_ROOT . '/views/admin/template/menu.php';?>

<div class="container">
    
<?php if (empty($product)): ?>

    brak stron

<?php else:?>
    <table>
        <thead>
            <tr>
                <th>id:</th>
                <th>tytuł:</th>
                <th>obraz</th>
                <th>opis</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php foreach($product as $single_product):?>
                
                <td><?php echo $single_product['id'];?></td>
                <td><?php echo esc($single_product['title']);?></td>
                <td><img class="tomato-img" src="<?php echo BASE_URL; ?>uploads/<?php echo $single_product['image'];?>"></td>
                 <td><?php echo esc($single_product['body']);?></td>
                <td><a href="<?php echo BASE_URL?>admin/product_edit.php?id=<?php echo $single_product['id'];?>">edytuj</a></td>
                <td><a href="<?php echo BASE_URL;?>admin/product_delete.php?id=<?php echo $single_product['id'];?>">usuń</a></td>
                
            <tr>
            
    <?php endforeach;?>

<?php endif;?>
                
        </tbody>
    </table>

<br>
<div class="add">
    <a href="<?php echo BASE_URL?>admin/product_add.php">dodaj produkt</a></div>
<br>
    
</div>

<?php require APP_ROOT . '/views/admin/template/footer.php';?>
