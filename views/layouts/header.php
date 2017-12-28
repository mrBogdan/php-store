<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $title ?></title>
   <link rel="stylesheet" type="text/css" href="/template/css/css-reset.css">
   <link rel="stylesheet" type="text/css" href="/template/css/fonts.css">
   <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
   <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
   <link rel="stylesheet" href="/template/css/font-awesome.min.css"/>
   <link rel="shortcut icon" href="/upload/images/shopping-cart.png" type="image/png"/>
   <link rel="stylesheet" href="/template/css/main.css"/>
</head>
<body>
	<!--______________________________ BEGIN WRAPPER-PAGE ____________________________-->
	<div id="wrapper-page">

		<!--______________________________ BEGIN HEADER ____________________________-->
		<header class="header">
			<div class="header-top">
				<div class="container_center">
					<div class="header-top__contact">
							<p>
								<i class="fa fa-phone" aria-hidden="true"></i>
								+38 098 000 00 00
							</p>
							<p>
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<a href="mailto:bogdan@gmail.com">bogdan@gmail.com</a>
							</p>
					</div>
					<ul class="header-top__links">
						<li class="facebook"><a href="http://facebook.com" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="google"><a href="https://www.google.com.ua" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="header-middle">
				<div class="container_center">
					<div class="header-middle__logo">
						<a href="/"><img src="../../upload/images/shopping-cart.png"></a>
					</div>
						<ul class="header-middle__nav">
							<li><a href="/cart/"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart 
								(<span id="cart-count"><?php echo Cart::countItems();?></span>)
								</a></li>
							<?php if(User::isGuest()): ?>
							<li><a href="/user/login"><i class="fa fa-lock" aria-hidden="true"></i>Login</a></li>
							<li><a href="/user/register"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign up</a></li>
							<?php else: ?>

							<li><a href="/user/<?php echo User::getUser() ?>"><i class="fa fa-user" aria-hidden="true"></i>Account</a></li>
							<li><a href="/user/logout"><i class="fa fa-unlock" aria-hidden="true"></i>Logout</a></li>
						<?php endif; ?>
						<?php if (User::checkAdmin()): ?>
							<li><a href="/admin"><i class="fa fa-wrench" aria-hidden="true"></i></i>Admin</a></li>
						<?php endif ?>
						</ul>
				</div>
			</div>
			<div class="header-bottom">
				<div class="container_center">
					<div class="left">
						<ul class="header__bottom-nav">
							<li><a href="/">Home</a></li>
							<li class="submenu"> 
								<a href="#">Store <i class="fa fa-angle-down"></i></a> 
								<ul class="dropdown">
									<li><a href="/catalog/">Catalog items</a></li>
									<li><a href="/cart/">Cart</a></li>
								</ul>
							</li>
							<li><a href="/contacts/">Contacts</a></li>
						</ul>
					</div>
				<div class="right">
						<form action="/search" method="post">
							<input type="text" name="search" placeholder="Search..">
							<button type="submit" name="submit_search" value="1" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
						</form>
					</div>
				</div>
				
			</div>
		</header>
		<!--______________________________ END HEADER ____________________________-->
		<div class="wrapper_page">