<?php require_once (ROOT . '/views/layouts/header.php'); ?>
<div class="container_double-column">
	<?php if (!User::isGuest()): ?>
		<div class="user-nav">
			<ul>
				<?php foreach ($userNavList as $value): ?>
					<li>
						<a href="/user/
						<?php 
							$parse = trim(str_replace(" ", "", (mb_strtolower($value['name']))));
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
	

	<div class="container_double-column-nm">
		<div>
			<img class="user-img" src="../<?php echo User::getImage($userPage['id'], "user"); ?>" alt="Your image" >
		</div>
		<div>
			<div>
				<span><?php echo $userPage['name'].' '.$userPage['surname']; ?></span>
				<?php if ($userPage['verify']): ?>
					<div class="checkMark">
						<i class="fa fa-check-square" aria-hidden="true"></i>
						<span class="tooltiptext">Verified</span>
					</div>
				<?php endif ?>
			</div>
			<span>
				
			</span>
		</div>
	</div>
</div>
<?php require_once (ROOT . '/views/layouts/footer.php'); ?>