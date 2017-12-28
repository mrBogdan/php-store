<!-- <div class="container-column">	
	<div class="breadcrumbs">
		<ul class="breadcrumb">
			<li><a href="/admin">Admin panel</a></li>
			<li class="active">Managing categories</a></li>
		</ul>
	</div>
</div> -->
<div class="container-one-column-center">
	<a href="/admin/category/create" class="btn">Add new category</a>
	<table>
		<thead>
			<tr>
				<th>ID category</th>
				<th>Category name</th>
				<th>Sort order</th>
				<th>Status</th>
				<th>Change</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($categoriesList as $category): ?>
			<tr>
				<td class="item_info">Id: <?php echo $category['id'] ?></td>
				<td><?php echo $category['name'] ?></td>
				<td><?php echo $category['sort_order'] ?></td>
				<td>
					<?php if($category['status']): ?>
					<?php echo 'Show'; ?>
					<?php else: ?>
					<?php echo 'Hide' ?>
					<?php endif; ?>
				</td>
				<td>
					<a href="/admin/category/update/<?php echo $category['id'] ?>">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
				</td>
				<td>
					<a href="/admin/category/delete/<?php echo $category['id'] ?>">
						<i class="fa fa-trash-o" aria-hidden="true"></i>
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>