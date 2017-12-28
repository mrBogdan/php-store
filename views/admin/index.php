<?php require_once ROOT . '/views/layouts/header_admin.php'; ?>
<div class="container-2fr4fr">
	<div>
	<!-- <div class="breadcrumbs">
		<ul class="breadcrumb">
			<li class="active">Admin panel</li>
		</ul>
	</div> -->
	<ul class="admin-nav">
		<li class="tablinks active" onclick="openTab(event, 'product')">Managing of products</li>
		<li class="tablinks" onclick="openTab(event, 'category')">Managing of categories</li>
		<li class="tablinks" onclick="openTab(event, 'order')">Managing of orders</li>	
	</ul>
	</div>
	<div class="load">
		<div id="field" class="tabcontent"></div>
		<div id="loader"></div>
	</div>
</div>	
<?php require_once ROOT . '/views/layouts/footer_admin.php'; ?>