<?php require_once (ROOT . '/views/layouts/header.php'); ?>
<div class="container_double-column">
	<?php if (!User::isGuest()): ?>
		<div class="user-nav">
			<ul>
				<?php foreach ($userNavList as $value): ?>
					<li>
						<a href="/user/
						<?php 
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
	

	<div class="container_column">
		
	</div>
</div>
<?php require_once (ROOT . '/views/layouts/footer.php'); ?>