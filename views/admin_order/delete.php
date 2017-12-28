<?php require_once ROOT . '/views/layouts/header_admin.php'; ?>
<div class="container-column">
    <!-- <div class="breadcrumbs">
        <ul class="breadcrumb">
            <li><a href="/admin">Admin panel</a></li>
            <li><a href="/admin/order">Managing order</a></li>
            <li class="active">Delete order</li>
        </ul>
    </div> -->


    <h4>Delete order #<?php echo $id; ?></h4>

    <div class="quote">
    <p>Are you really want to remove this order?</p>

    <form method="post">
        <input type="submit" class="btn" name="submit" value="Delete">
    </form>
    </div>
</div>
<?php require_once ROOT . '/views/layouts/footer_admin.php'; ?>