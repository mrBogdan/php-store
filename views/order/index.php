<?php include (ROOT . '/views/layouts/header.php'); ?>
<div class="container_center-one">
	
	<?php if ($products): ?>
	<a href="/user/cancel" class="btn">Cancel an orders</a>
	<table class="table_order">
		
		<thead>
			<tr>
				<th>Product</th>
				<th>Product id</th>
				<th>Product code</th>
				<th>Product name</th>
				<th>Product price</th>
				<th>Product amount</th>
			</tr>
		</thead>
		<tbody>
			
				<?php foreach ($products as $product): ?>
				<tr>
					<td><a href="/product/<?php echo $product['id'] ?>"><img src="<?php echo Product::getImage($product['id']); ?>" alt="product"></a></td>
					<td><?php echo $product['id']; ?></td>
					<td><?php echo $product['code']; ?></td>
					<td><?php echo $product['name']; ?></td>
					<td><?php echo $product['price']; ?></td>
					<td><?php echo $orderProducts[$product['id']]; ?></td>
				</tr>
			<?php endforeach ?>
			<?php else: ?>
				<p style="font-weight: bold; font-size: 38px;">You have not the orders</p>
			<?php endif ?>
		</tbody>
	</table>
</div>
<?php include (ROOT . '/views/layouts/footer.php'); ?>