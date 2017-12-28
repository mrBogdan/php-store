<?php require_once ROOT . '/views/layouts/header_admin.php'; ?>
<div class="container-column">
	<!-- <div class="breadcrumbs">
		<ul class="breadcrumb">
			<li><a href="/admin">Admin panel</a></li>
			<li><a href="/admin/order">Managing orders</a></li>
			<li class="active">View</a></li>
		</ul>
	</div> -->
	<table>
		<tbody>
			<tr>
				<td>Order number</td>
				<td><?php echo $order['id']; ?></td>
			</tr>
			<tr>
				<td>User name</td>
				<td><?php echo $order['user_name']; ?></td>
			<tr/>
			<tr>
				<td>User phone</td>
				<td><?php echo $order['user_phone']; ?></td>
			</tr>
			<tr>
				<td>User comment</td>
				<td><?php echo $order['user_comment']; ?></td>
			</tr>
			<?php if($order['user_id'] > 0): ?>
			<tr>
				<td>User id</td>
				<td></td>
			</tr>
			<?php endif; ?>
			<tr>
				<td>Order status</td>
				<td><?php echo Order::getStatusText($order['status']); ?></td>
			</tr>
			<tr>
				<td>Order date</td>
				<td><?php echo $order['date']; ?></td>
			</tr>
		</tbody>
	</table>
	<br>
	<p>Order products</p>
	<br>
	<table>
		<thead>
			<tr>
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
					<td><?php echo $product['id']; ?></td>
					<td><?php echo $product['code']; ?></td>
					<td><?php echo $product['name']; ?></td>
					<td><?php echo $product['price']; ?></td>
					<td><?php echo $orderProducts[$product['id']]; ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
<?php require_once ROOT . '/views/layouts/footer_admin.php'; ?>