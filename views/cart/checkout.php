<?php require_once (ROOT . '/views/layouts/header.php'); ?>
<div class="container">
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
<section>
	<div class="container_one-column">
		<?php if($result): ?>
			<p style="color: #fdb45e; text-transform: uppercase;">We`ll call you back!</p>
		<?php else: ?>	
		<?php if(is_array($errors)): ?>
			<ul style="color: red">
				<?php foreach($errors as $error): ?>
					<li>- <?php echo $error; ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>	
		<div>
			<h2>To order items</h2><br>
			<form action="#" method="post">
				<input type="text" name="userName" placeholder="Name" 
				value="<?php echo $userNameLogged; ?>"><br>
				<input type="text" name="userPhone" id="phone" placeholder="Number-phone"><br>
				<input type="text" name="userComment" placeholder="Comment"><br>
				<br><br>
				<input type="submit" name="submit" class="btn" value="To order">
			</form>
		</div>
	<?php endif; ?>
	</div>
</section>
</div>
<?php require_once (ROOT . '/views/layouts/footer.php'); ?>