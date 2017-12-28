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

<!--______________________________ BEGIN CONTENT ____________________________-->
<section class="item_descr">
<div class="item-img">
	<img src="<?php echo Product::getImage($product['id']) ?>" alt="img">
	<?php if($product['is_new']): ?>
	<div class="block_new">new</div>
	<?php endif; ?>
</div>
<div class="brief_descr">
	<h2><?php echo $product['name']; ?></h2>
	<p>Code of item: <?php echo $product['code']; ?></p>
	<span>
		<p class="price">US $<?php echo $product['price']; ?></p>
		<p>Amount:</p>
		<input type="text" value="5" id="amount">
		<a class="btn add-to-cart" data-id="<?php echo $product['id'] ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart</a>
	</span>
	<p><b>Presence</b>: In stock</p>
	<p><b>Status</b>: New</p>
	<p><b>Manufacturer</b>: <?php echo $product['brand']; ?></p>
</div>
<div class="full_descr"><?php echo $product['description']; ?></div>
</section>

	<div></div>
	<div class="container_one-column">
	<?php if ($errors): ?>
		<ul>
			<?php foreach ($errors as $value): ?>
				<li>- <?php echo $value ?></li>	
			<?php endforeach ?>
		</ul>
	<?php endif ?>
	<?php if (!User::isGuest()): ?>
	<div class="form_for_comment">
		<form method="post">
			<textarea name="userComment"></textarea><br>
			<input type="submit" name="submit" class="btn" value="Send"><br><br>
		</form>
	</div>
<?php else: ?>
	<p>Log in for writing comments</p>	
<?php endif ?>
	<h5>Reviews</h5>
	<div class="comments">
	<?php if ($comments): ?>
		
		<?php foreach ($comments as $value): ?>
			<div class="comment">
				<a class="user" href="/user/<?php echo $value['user_id']; ?>">
					<i class="fa fa-user" aria-hidden="true"></i>
					<?php echo User::getUserById($value['user_id'])['name']; ?>
				</a>
				<div class="time">
					<?php echo $value['date']; ?>
				</div>
				<?php if (User::checkAdmin()): ?>
					<a href="/comment/delete/<?php echo $value['id'] ?>" class="delete_comment delete" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				<?php endif ?>
				<div class="comment_text"><?php echo $value['comment']; ?></div>
				
			</div>
		<?php endforeach ?>
	<?php else: ?>
		<p>Comments list is empty</p>	
	<?php endif ?>
</div>
</div>

<!--______________________________ END CONTENT ____________________________-->
</div>
<!--______________________________ END MAIN PART _________________________-->
<?php require_once (ROOT . '/views/layouts/footer.php'); ?>
