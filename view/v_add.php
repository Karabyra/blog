<div class="form">
    <?php if($isSend): ?>
        <p>Your app is done!</p>
    <?php else: ?>
        <form method="post">
            Title:<br>
            <input type="text" name="title" value="<?=$params['ttl']?>"><br>
            Tags:<br>
            <select name="tags">
                <?php foreach ($tags as $tag):?>
                    <option value="<?=$tag['id_tegs']?>">
                        <?=$tag['tegs']?>
                    </option>
                <?php endforeach;?>
            </select><br>
            Content:<br>
            <textarea name="content" style="width: 300px;height: 70px"></textarea><br>
            <button>Send</button>
            <?php foreach ($errArray as $arr):?>
                <p><?=$arr?></p>
            <?php endforeach;?>
        </form>
    <?php endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>
