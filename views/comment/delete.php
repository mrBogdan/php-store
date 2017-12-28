<?php require_once (ROOT . '/views/layouts/header.php'); ?>
<!--______________________________ BEGIN MAIN PART _________________________-->
<div class="container">
<!--______________________________ BEGIN SIDEBAR ____________________________-->
<aside class="aside">
	<h2 class="title">Catalog</h2>
	<ul>
		<?php foreach ($categories as $categoryItem): ?>
		<li><a href="/category/<?php echo $categoryItem['id'] ?>">
			<?php echo $categoryItem['name']; ?>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
</aside>
<!--______________________________ END SIDEBAR ____________________________-->

<div>
	<div>
	<h5>Comment #<?php echo $id ?></h5>
	<p>Are you sure you want to delete this comment?</p>	
	<form method="post">
		<input type="submit" name="submit" class="btn" value="Delete">
	</form>
	</div>
</div>

<!--______________________________ END CONTENT ____________________________-->
</div>
<!--______________________________ END MAIN PART _________________________-->
<?php require_once (ROOT . '/views/layouts/footer.php'); ?>
