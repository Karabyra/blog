<a href="index.php?c=add">Add articles</a>
<hr>
<div class="articles">
    <?php foreach ($articles as $id => $article): ?>
        <div class="article">
            <h2><?= $article['title'] ?></h2>
            <a href="index.php?c=article&id=<?= $article['id_article'] ?>">Read more</a>
        </div>
    <?php endforeach; ?>
</div>