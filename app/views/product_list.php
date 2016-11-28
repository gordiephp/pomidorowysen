<?php require APP_ROOT . '/views/template/header.php';?>

<main>
    <div class="wrapper">   
        <section id="product">
            <h2>Produkty:</h2>
            
<?php if (empty($product)): ?>
    brak produktow
<?php else:?>
    
    <?php foreach($product as $single_product):?>
        <ul>
            <li>
                <a href="<?php echo BASE_URL;?>product.php?id=<?php echo $single_product['id'];?>"><img src="<?php echo BASE_URL;?>/uploads/<?php echo $single_product['image'];?>"></a>
            </li>    
            <li>
                <?php echo esc($single_product['title']);?>
            </li>
        </ul>
    <?php endforeach;?>
            
<div id="pages">
    <p>strony:
    <?php for($x = 1 ; $x <= $pages; $x++):?>
        <a href="?page=<?php echo $x;?>&per-page=<?php echo $perpage;?>"<?php if ($page === $x) { echo ' class="selected"';} ?>><?php echo $x; ?></a>
    <?php endfor; ?>
    </p>
</div>
            
<?php endif;?>

        </section>  
    </div>
</main>
    
<?php require APP_ROOT . '/views/template/footer.php';?>
