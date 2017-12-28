<?php require_once ROOT . '/views/layouts/header_admin.php'; ?>
<div class="container-column">
	<!-- <div class="breadcrumbs">
		<ul class="breadcrumb">
			<li><a href="/admin">Admin panel</a></li>
			<li><a href="/admin/category">Managing items</a></li>
			<li class="active">Delete item</li>
		</ul>
	</div> -->
	<h4>Remove item #<?php echo $id ?></h4>
	<div class="quote">
		<p>Are you really want to remove this category?</p>
		<form method="post">
			<input type="submit" name="submit" value="remove" class="btn">
		</form>
	</div>
	
</div>
<?php require_once ROOT . '/views/layouts/footer_admin.php'; ?>