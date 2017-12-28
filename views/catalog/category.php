<?php include (ROOT . '/views/layouts/header.php'); ?>
<!--______________________________ BEGIN MAIN PART _________________________-->
<div class="container">
<!--______________________________ BEGIN SIDEBAR ____________________________-->
<aside class="aside">
	<h2 class="title">Catalog</h2>
	<ul>
	<?php foreach ($categories as $categoryItem): ?>
		<li><a href="/category/<?php echo $categoryItem['id'] ?>"
			class="<?php if($categoryId == $categoryItem['id']) echo 'active'; ?>">
			<?php echo $categoryItem['name']; ?>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
</aside>
<!--______________________________ END SIDEBAR ____________________________-->

<!--______________________________ BEGIN CONTENT ____________________________-->
<section class="section">
	<h2 class="title">Recent items</h2>
	<div class="section-items">

		<?php foreach($categoryProducts as $product): ?>
		<div class="item">
			<?php if($product['is_new']): ?>
			<div class="triangle"><p>new</p></div>
			<?php endif; ?>
			<img src="<?php echo Product::getImage($product['id']) ?>" alt="im">
			<h2 class="item-price"><?php echo $product['price'] ?>$</h2>
			<p class="item-name">
				<a href="/product/<?php echo $product['id'] ?>">
					<?php echo $product['name'] ?>
				</a>
			</p>
			<a href="#" data-id="<?php echo $product['id'] ?>" class="add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart</a>
		</div>
		<!-- /cart/add/<?php //echo $product['id'] ?> -->
		<?php endforeach; ?>
		
	</div>

</section>
<!--______________________________ BEGIN SLIDER ____________________________-->
	<?php echo $pagination->get(); ?>
<!--______________________________ END SLIDER ____________________________-->
</div>
<!--______________________________ END CONTENT ____________________________-->

<!--______________________________ END MAIN PART _________________________-->
<?php include (ROOT . '/views/layouts/footer.php'); ?>