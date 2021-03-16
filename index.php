<?php
include_once('model/messages.php');

$articles = getAllarticles();
?>
<a href="add.php">Add articles</a>
<hr>
<div class="articles">
    <?php foreach ($articles as $id => $article): ?>
        <div class="article">
            <h2><?= $article['title'] ?></h2>
            <a href="article.php?id=<?= $article['id_article'] ?>">Read more</a>
        </div>
    <?php endforeach; ?>
</div>