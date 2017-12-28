<!-- <div class="container-column">	
	<p><?php// echo $_SERVER["REQUEST_URI"] ?> </p>
	<div class="breadcrumbs">
		<ul class="breadcrumb">
			<li><a href="/admin">Admin panel</a></li>
			<li class="active">Managing items</a></li>
		</ul>
	</div>
</div> -->
<div class="container-one-column-center">
	<a href="/admin/product/create" class="btn center-text">Add new item</a>
	<table>
		<thead>
			<tr>
				<th>Item</th>
				<th>Item code</th>
				<th>Item name</th>
				<th>Price</th>
				<th>Change</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($productsList as $product): ?>
			<tr>
				<td class="contain-img"><a href="/product/<?php echo $product['id'] ?>"><img src="<?php echo Product::getImage($product['id']) ?>"></a></td>
				<td class="item_info">Id: <?php echo $product['id'] ?>
				<br>Item code: <?php echo $product['code'] ?></td>
				<td><?php echo $product['name'] ?></td>
				<td><?php echo $product['price'] ?></td>
				<td>
					<a href="/admin/product/update/<?php echo $product['id'] ?>">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
				</td>
				<td>
					<a href="/admin/product/delete/<?php echo $product['id'] ?>">
						<i class="fa fa-trash-o" aria-hidden="true"></i>
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>