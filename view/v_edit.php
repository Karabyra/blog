<div class="form">
    <?php if ($isSend): ?>
        <p>Статья добавлена</p>
    <?php else: ?>
        <form method="post">
            Title:<br>
            <input type="text" name="title" value="<?= $article['title'] ?>"><br>
            Content:<br>
            <textarea name="content" style="width: 500px;height: 100px"><?= $article['content'] ?></textarea><br>
            <button>Send</button>
            <?php foreach ($errArray as $arr):?>
                <p><?=$arr?></p>
               <?php endforeach;?>
        </form>
    <?php endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>