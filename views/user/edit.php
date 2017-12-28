
<?php require_once (ROOT . '/views/layouts/header.php'); ?>
<section>
	<div class="container_double-column">
		<?php if (!User::isGuest()): ?>
		<div class="user-nav">
			<ul>
				<?php foreach ($userNavList as $value): ?>
					<li>
						<a href="/user/<?php 
							$parse = str_replace(" ", "", (mb_strtolower($value['name'])));
							echo ($parse == 'mypage') ? User::getUser() : $parse; 
						?>">
						<?php 
							if($value['status']) {
								echo $value['icon'];  
								echo $value['name']; 
							}
						?>
						</a>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
		<?php else: ?>
			<div></div>
		<?php endif ?>
		<div>
			<?php if($result): ?>
				<p style="color: #fdb45e; text-transform: uppercase; margin: 0 0 20px 0;">The datas is saved</p>
			<?php else: ?>	
			<?php if(is_array($errors)): ?>
				<ul>
					<?php foreach($errors as $error): ?>
						<li>- <?php echo $error; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>	
			<div class="signUp-form">
				
				<h2>Editing datas</h2><br>
				<form action="" method="post" enctype="multipart/form-data">
					<img class="user-img" src="<?php echo User::getImage($userId); ?>" 
					alt="Your image" ><br><br>
					<input type="file" name="image"><br><br>
					<input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>"><br><br>
					<input type="text" name="surname" placeholder="Surname" value="<?php echo $surname; ?>"><br><br>
					<input type="password" name="password" placeholder="Password"><br><br>
					<input type="submit" name="submit" class="btn" value="Save"><br><br>
				</form>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php require_once (ROOT . '/views/layouts/footer.php'); ?>