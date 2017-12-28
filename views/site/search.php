<?php include (ROOT . '/views/layouts/header.php'); ?>
<div class="container_double-column">
	<div class="mr20">
		<aside class="aside">
			<h2 class="title">Catalog</h2>
			<ul>
				<?php foreach ($categories as $categoryItem): ?>
					<li>
						<a href="/category/<?php echo $categoryItem['id'] ?>">
							<?php echo $categoryItem['name']; ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</aside>
	</div>
	<div class="center">
		<h2 class="title">Search</h2>
		<p>You looked for: <?php echo $search; ?></p>
		<?php if ($response): ?>
			<?php foreach ($response as $value): ?>
				<div class="container_double-column">
					<div class="left">
						<img src="<?php echo Product::getImage($value['id']) ?>" alt="<?php echo $value['name'] ?>">	
					</div>
					<div class="left">
						<p class="item">
							<a href="/product/<?php echo $value['id'] ?>"><?php echo $value['name']; ?>
							</a>
						</p>
						<p class="price">$<?php echo $value['price']; ?></p>
					</div>
				</div>
			<?php endforeach ?>
		<?php else: ?>
			<p>Not found</p>
		<?php endif ?>
	</div>
</div>
<?php include (ROOT . '/views/layouts/footer.php'); ?>