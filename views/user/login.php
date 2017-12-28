
<?php require_once (ROOT . '/views/layouts/header.php'); ?>
<section>
	<div class="container_one-column">

		<?php if($result): ?>
			<p style="color: #fdb45e; text-transform: uppercase;">You are registered</p>
		<?php else: ?>	
		<?php if(is_array($errors)): ?>
			<ul>
				<?php foreach($errors as $error): ?>
					<li>- <?php echo $error; ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>	
		<div class="signUp-form">
			
			<h2>Log in</h2><br>
			<form action="#" method="post">
				<input type="text" name="email" placeholder="E-mail" value="<?php echo $email; ?>"><br>
				<input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>"><br><br>
				<input type="submit" name="submit" class="btn" value="Log in">
			</form>
		</div>
	<?php endif; ?>
	</div>
</section>
<?php require_once (ROOT . '/views/layouts/footer.php'); ?>