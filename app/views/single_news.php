<?php require APP_ROOT . '/views/template/header.php';?>

<main>
    <div class="wrapper"> 
        <section id="single-news">
    
<?php if (empty($single_news)): ?>
    brak strony
<?php else:?>

        <ul>
            <li>
                <h3><?php echo esc($single_news['title']);?></h3>
            </li>
            <li>
                <?php echo esc($single_news['body']);?>
            </li>
            <li>
                Utworzono: <?php echo $single_news['created']->format('d-m-Y H:i');?>
            </li>
            <li>
                
                Zaktualizowano: <?php if($single_news['updated']):?>
                    <?php echo $single_news['updated']->format('d-m-Y H:i');?>
                <?php endif;?>
                
            </li>   
        </ul>

          

<?php endif;?>
        </section> 
     </div>
</main>

<?php require APP_ROOT . '/views/template/main.php';?>
<?php require APP_ROOT . '/views/template/footer.php';?>
