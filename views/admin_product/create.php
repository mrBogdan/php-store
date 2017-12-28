<?php require_once ROOT . '/views/layouts/header_admin.php'; ?>
<div class="container-column">
	<!-- <div class="breadcrumbs">
		<ul class="breadcrumb">
			<li><a href="/admin">Admin panel</a></li>
			<li><a href="/admin/product">Managing items</a></li>
			<li class="active">Create item</li>
		</ul>
	</div> -->
	<?php if($errors): ?>
	<ul>
		<li>- <?php echo $errors[0]; ?></li>
	</ul>
	<?php endif; ?>
	<div>
		<form action="" method="post" enctype="multipart/form-data">
			<p>Item name</p>
			<input type="text" name="name">

			<p>Code</p>
			<input type="text" name="code">
			
			<p>Price</p>
			<input type="text" name="price">

			<p>Category</p>
			<select name="category_id">
				<?php if(is_array($categoriesList)): ?>
					<?php foreach($categoriesList as $category): ?>
						<option value="<?php echo $category['id'] ?>">
							<?php echo $category['name']; ?>
						</option>
					<?php endforeach; ?>
				<?php endif; ?>
			</select>

			<br><br>

			<p>Brand</p>
			<input type="text" name="brand">

			<p>Image</p>
			<input type="file" name="image">

			<p>Description</p>
			<textarea name="description"></textarea>

			<br><br>

			<p>Is new</p>
			<select name="is_new">
				<option value="1" selected="selected">Yes</option>
				<option value="0">No</option>
			</select>
			
			<br><br>

			<p>Availability</p>
			<select name="availability">
				<option value="1" selected="selected">Yes</option>
				<option value="0">No</option>
			</select>
			
			<br><br>
			
			<p>Is recommended</p>
			<select name="is_recommended">
				<option value="1" selected="selected">Yes</option>
				<option value="0">No</option>
			</select>

			<br><br>

			<p>Status</p>
			<select name="status">
				<option value="1" selected="selected">Show</option>
				<option value="0">Hide</option>
			</select>

			<br><br>

			<input type="submit" name="submit" class="btn" value="Create">

		</form>
	</div>
</div>
<?php require_once ROOT . '/views/layouts/footer_admin.php'; ?>