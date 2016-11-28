<?php require APP_ROOT . '/views/template/header.php';?>

<main>
    <div class="wrapper">   
        <section id="single-product">
    
<?php if (empty($single_product)): ?>
    brak produktu
<?php else:?>
            
        <div class="single-image">
        <a href="<?php echo BASE_URL;?>product.php?id=<?php echo $single_product['id'];?>"><img src="<?php echo BASE_URL;?>/uploads/<?php echo $single_product['image'];?>"></a>
        </div>
            
        <ul>
            <li>
                <h3><?php echo esc($single_product['title']);?></h3>
            </li>
            <li>
                <?php echo esc($single_product['body']);?>
            </li>
        </ul>

        </section>   
 
<?php endif;?>

        
    </div>
</main>
<?php require APP_ROOT . '/views/template/footer.php';?>
