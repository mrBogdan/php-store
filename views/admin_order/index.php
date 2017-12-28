	<!-- <div class="breadcrumbs">
		<ul class="breadcrumb">
			<li><a href="/admin">Admin panel</a></li>
			<li class="active">Managing orders</li>
		</ul>
	</div> -->
	<table>
		<thead>
			<tr>
				<th>Order Id</th>
				<th>User name</th>
				<th>User number phone</th>
				<th>User comment</th>
				<th>Order date</th>
				<th>Status</th>
				<th>View</th>
				<th>Change</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($ordersList as $order): ?>
				<tr>
					<td><?php echo $order['id'] ?></td>
					<td><?php echo $order['user_name'] ?></td>
					<td><?php echo $order['user_phone'] ?></td>
					<td><?php echo $order['user_comment'] ?></td>
					<td><?php echo $order['date']; ?></td>
					<td><?php echo $order['status']; ?></td>
					<td>
						<a href="/admin/order/view/<?php echo $order['id'] ?>">
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
					</td>
					<td>
					<a href="/admin/order/update/<?php echo $order['id'] ?>">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
				</td>
				<td>
					<a href="/admin/order/delete/<?php echo $order['id'] ?>">
						<i class="fa fa-trash-o" aria-hidden="true"></i>
					</a>
				</td>
				</tr>
			<?php endforeach ?>
		</tbody>
				
	</table>