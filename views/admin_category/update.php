<?php require_once ROOT . '/views/layouts/header_admin.php'; ?>
<div class="container-column">
	<!-- <div class="breadcrumbs">
		<ul class="breadcrumb">
			<li><a href="/admin">Admin panel</a></li>
			<li><a href="/admin/category">Managing category</a></li>
			<li class="active">Update category</li>
		</ul>
	</div> -->
	<?php if($errors): ?>
	<ul>
		<li>- <?php echo $errors[0]; ?></li>
	</ul>
	<?php endif; ?>
	<form action="" method="post">
		<p>Category name</p>
		<input type="text" name="name" value="<?php echo $category['name']; ?>">
		<p>Sort order</p>
		<input type="text" name="sort_order" value="<?php echo $category['sort_order']; ?>">
		<p>Status</p>
		<input type="text" name="status" value="<?php echo $category['status']; ?>">

		<br><br>
		<input type="submit" name="submit" class="btn" value="Change">

	</form>
	
</div>
<?php require_once ROOT . '/views/layouts/footer_admin.php'; ?>