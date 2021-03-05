<?php

	include_once('model/messages.php');
	$id = (int)($_GET['id'] ?? '');
    $sqlGetArticle = "SELECT * FROM  articles WHERE id_article = $id";
	$articles = getArticles($sqlGetArticle,false);
	$post = $articles ?? null;
	$hasPost = ($post !== null);
?>
<div class="content">
	<?php if($hasPost): ?>
		<div class="article">
			<h1><?=$post['title']?></h1>
			<div><?=$post['content']?></div>
			<div><?=$post['article_dt']?></div>
			<hr>
			<a href="delete.php?id=<?=$id?>">Remove</a><br>
			<a href="edit.php?id=<?=$id?>">Edit</a>
		</div>
	<?php else: ?>
		<div class="e404">
			<h1>Страница не найдена!</h1>
		</div>
	<?php endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>