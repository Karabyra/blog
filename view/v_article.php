<div class="content">
        <div class="article">
            <h1><?=$post['title']?></h1>
            <div><?=$post['content']?></div>
            <div><?=$post['article_dt']?></div>
            <hr>
            <a href="delete.php?id=<?=$checkOutID?>">Remove</a><br>
            <a href="edit.php?id=<?=$checkOutID?>">Edit</a>
        </div>
</div>
<hr>
<a href="index.php">Move to main page</a>