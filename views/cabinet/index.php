<?php require_once (ROOT . '/views/layouts/header.php'); ?>
<section class="cabinet">
	<div class="container">
		<div>
			<h2>Your account</h2>
			<h3>Hello, <?php echo $user['name']; ?></h3>
			<ul>
				<li><a href="/cabinet/edit">Edit your profile</a></li>
				<li><a href="/user/history">List your purchases</a></li>
			</ul>
		</div>
			
		</div>	
</section>
<?php require_once (ROOT . '/views/layouts/footer.php'); ?>