<?php require APP_ROOT . '/views/admin/template/header.php';?>
<?php require APP_ROOT . '/views/admin/template/menu.php';?>

<div class="container">
    
<?php if (empty($news)): ?>

    brak stron

<?php else:?>
    <table>
        <thead>
            <tr>
                <th>id:</th>
                <th>tytuł:</th>
                <th>slug:</th>
                <th>data utworzenia:</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php foreach($news as $single_news):?>
                
                <td><?php echo esc($single_news['id']);?></td>
                <td><?php echo esc($single_news['title']);?></td>
                
                <td><a href="<?php echo BASE_URL;?>news.php?news=<?php echo esc($single_news['slug']);?>"><?php echo esc($single_news['slug']);?></a>
                </td>
                
                <td><?php echo $single_news['created']->format('d-m-Y');?></td>
                <td><a href="<?php echo BASE_URL?>admin/news_edit.php?id=<?php echo $single_news['id'];?>">edytuj</a></td>
                <td><a href="<?php echo BASE_URL;?>admin/news_delete.php?id=<?php echo $single_news['id'];?>">usuń</a></td>
            <tr>
            <tr></tr> 
    <?php endforeach;?>

<?php endif;?>
                
        </tbody>
    </table>

<br>
<div class="add">
    <a href="<?php echo BASE_URL?>admin/news_add.php">dodaj newsa</a></div>
<br>
    
</div>

<?php require APP_ROOT . '/views/admin/template/footer.php';?>
