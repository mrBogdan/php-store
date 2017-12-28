<?php require_once ROOT . '/views/layouts/header_admin.php'; ?>
<div class="container-column">
	<!-- <div class="breadcrumbs">
        <ul class="breadcrumb">
            <li><a href="/admin">Admin panel</a></li>
            <li><a href="/admin/order">Managing order</a></li>
            <li class="active">Update order</li>
        </ul>
    </div> -->
	<?php if($errors): ?>
	<ul>
		<li>- <?php echo $errors[0]; ?></li>
	</ul>
	<?php endif; ?>
	<form action="#" method="post">

                        <p>User name</p>
                        <input type="text" name="userName" placeholder="" value="<?php echo $order['user_name']; ?>">

                        <p>User phone</p>
                        <input type="text" name="userPhone" placeholder="" value="<?php echo $order['user_phone']; ?>">

                        <p>User comment</p>
                        <input type="text" name="userComment" placeholder="" value="<?php echo $order['user_comment']; ?>">

                        <p>The date ordered</p>
                        <input type="text" name="date" placeholder="" value="<?php echo $order['date']; ?>">

                        <p>Status</p>
                        <select name="status">
                            <option value="1" <?php if ($order['status'] == 1) echo ' selected="selected"'; ?>>The new order</option>
                            <option value="2" <?php if ($order['status'] == 2) echo ' selected="selected"'; ?>>The order is processing</option>
                            <option value="3" <?php if ($order['status'] == 3) echo ' selected="selected"'; ?>>The order is delivered</option>
                            <option value="4" <?php if ($order['status'] == 4) echo ' selected="selected"'; ?>>Private order</option>
                        </select>
                        <br>
                        <br>
                        <input type="submit" name="submit" class="btn" value="Save">
                    </form>
	
</div>
<?php require_once ROOT . '/views/layouts/footer_admin.php'; ?>