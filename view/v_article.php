<div class="content">
    <?php if($hasPost): ?>
        <div class="article">
            <h1><?=$post['title']?></h1>
            <div><?=$post['content']?></div>
            <div><?=$post['article_dt']?></div>
            <hr>
            <a href="delete.php?id=<?=$checkOutID?>">Remove</a><br>
            <a href="edit.php?id=<?=$checkOutID?>">Edit</a>
        </div>
    <?php else: ?>
        <div class="e404">
            <h1>Страница не найдена!</h1>
        </div>
    <?php endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>