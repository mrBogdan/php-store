<?php require_once (ROOT . '/views/layouts/header.php'); ?>
<section>
	<div class="container_one-column">

		<?php if($result): ?>
			<p style="color: #fdb45e; text-transform: uppercase; margin: 0 0 20px 0;">The email is sent</p>
		<?php else: ?>	
		<?php if(is_array($errors)): ?>
			<ul>
				<?php foreach($errors as $error): ?>
					<li>- <?php echo $error; ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>	
		<div class="signUp-form">
			
			<h2>CallBack form</h2><br>
			<form action="#" method="post">
				<p>Your email</p>
				<input type="text" name="userEmail" placeholder="Email" value="<?php echo $userEmail; ?>"><br>
				<p>Message</p>
				<input type="text" name="userText" placeholder="Text" value="<?php echo $userText; ?>"><br><br>
				<input type="submit" name="submit" class="btn" value="Send">
			</form>
		</div>
	<?php endif; ?>
	</div>
</section>
<?php require_once (ROOT . '/views/layouts/footer.php'); ?>