<?php require_once ROOT . '/views/layouts/header_admin.php'; ?>
<div class="container-column">
	<!-- <div class="breadcrumbs">
		<ul class="breadcrumb">
			<li><a href="/admin">Admin panel</a></li>
			<li><a href="/admin/category">Managing items</a></li>
			<li class="active">Create category</li>
		</ul>
	</div> -->
	<?php if($errors): ?>
	<ul>
		<li>- <?php echo $errors[0]; ?></li>
	</ul>
	<?php endif; ?>
	<form action="" method="post">
		<p>Category name</p>
		<input type="text" name="name">
		<p>Sort order</p>
		<input type="text" name="sort_order">
		<p>Status</p>
		<input type="text" name="status">

		<br><br>
		<input type="submit" name="submit" class="btn" value="Create">

	</form>
	
</div>
<?php require_once ROOT . '/views/layouts/footer_admin.php'; ?>