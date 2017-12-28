<?php include (ROOT . '/views/layouts/header.php'); ?>
<!--______________________________ BEGIN MAIN PART _________________________-->

<div class="container">
<!--______________________________ BEGIN SIDEBAR ____________________________-->
<aside class="aside">
	<h2 class="title">Catalog</h2>
	<ul>
	<?php foreach ($categories as $categoryItem): ?>
		<li><a href="/category/<?php echo $categoryItem['id'] ?>">
			<?php echo $categoryItem['name']; ?>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
</aside>
<!--______________________________ END SIDEBAR ____________________________-->

<!--______________________________ BEGIN CONTENT ____________________________-->
<section class="cart">
	<h2 class="title">Cart</h2>
	<?php if($productsInCart): ?>
		<a href="/cart/checkout" class="btn"><i class="fa fa-shopping-cart" aria-hidden="true"></i>To order</a><br><br>
		<table class="cart-table">
			<thead>
				<tr>
					<th>Item</th>
					<th>Description</th>
					<th>Price</th>
					<th>Amount</th>
					<th>Total</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($products as $product): ?>
				<tr>
					<td>
						<a href="/product/<?php echo $product['id'] ?>">
						<img src="<?php echo Product::getImage($product['id'])?>">
						</a>
					</td>
					<td>
						<a href="/product/<?php echo $product['id'] ?>">
							<?php echo $product['name'] ?>
						</a>
						<p>Id item: <?php echo $product['code'] ?></p></td>
					<td class="price">$ <?php echo $product['price'] ?></td>
					<td class="amount-items">
						<button class="btn" data-val="more">+</button>
						<input type="text" id="<?php echo $product['id'] ?>" value="<?php echo $productsInCart[$product['id']] ?>">
						<button class="btn" data-val="less">-</button>
					</td>
					<td class="price">$ 
						<?php echo ($product['price'] * $productsInCart[$product['id']]) ?>
					</td>
					<td>
						<a href="#" class="delete-from-cart delete" data-id="<?php echo $product['id'] ?>">
						<i class="fa fa-times"></i>
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
				<tfoot>
					<tr>	
						<td colspan="4">Total price:</td>
						<td class="price">$ <?php echo $totalPrice; ?></td>
					</tr>
				</tfoot>
					
		</table>

	<?php else: ?>
		<p>The cart is empty</p>
	<?php endif; ?>
</section>
</div>
<!--______________________________ END CONTENT ____________________________-->
<!-- <div class="model">
	<div class="model-header">
		<span></span>
	</div>
	<div class="model-content"></div>
	<div class="model-footer"><button>Ok</button><button>Cancel</button></div>
</div> -->
<!--______________________________ END MAIN PART _________________________-->
<?php include (ROOT . '/views/layouts/footer.php'); ?>