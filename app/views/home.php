<?php require APP_ROOT . '/views/template/header.php';?>
<main>
    <div class="wrapper"> 
        <section id="news">
                        <h2>aktualności:</h2>
    
<?php if (empty($news)): ?>
    brak stron
<?php else:?>
    
    <?php foreach($news as $single_news):?>
        <ul>
            <li>   
                <?php echo $single_news['created']->format('d-m-Y');?>
            </li>  
             <li>
                <h3><a href="<?php echo BASE_URL;?>news.php?news=<?php echo esc($single_news['slug']);?>"><?php echo esc($single_news['title']);?></a></h3>
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

<?php require APP_ROOT . '/views/template/main.php';?>
<?php require APP_ROOT . '/views/template/footer.php';?>
