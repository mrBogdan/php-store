<?php
	class CartController
	{
		public function actionAddAjax($id)
		{
			$count = 0;
			$itemCount = 0;
			if ( isset($_POST['count'])) {
				$count = $_POST['count'];
			}
			if( isset($_POST['itemCount']) ) {
				$itemCount = $_POST['itemCount'];
			}
			if ( $count >= 100 || $count < 0 || $itemCount >= 100 || $itemCount < 0) {
				exit ("error");
			}
			echo Cart::addProduct($id, $count, $itemCount);
			return true;
		}
		public function actionIndex()
		{
			$categories = array();
			$categories = Category::getCategoriesList();

			$productsInCart = false;

			$productsInCart = Cart::getProducts();

			if($productsInCart) {
				$productsIds = array_keys($productsInCart);
				$products = Product::getProductsByIds($productsIds);

				$totalPrice = Cart::getTotalPrice($products);
			}
			require_once ROOT . '/views/cart/index.php';

			return true;
		}
		public function actionCheckout()
		{
			$categories = array();
			$categories = Category::getCategoriesList();

			$result = false;

			if(isset($_POST['submit'])) {
				$userName = $_POST['userName'];
				$userPhone = $_POST['userPhone'];
				$userComment = $_POST['userComment'];

				$errors = false;

				if(!User::checkName($userName))		$errors[] = 'The name is incorrect';
				if(!User::checkPhone($userPhone))	$errors[] = 'The number phone is incorrect'.' '.$userPhone;

				
				$productsInCart = false;
				if($errors == false) {
					$productsInCart = Cart::getProducts();
					if(User::isGuest()) {
						$userId = false;
					} else {
						$userId = User::checkLogged();
					}
					if($productsInCart)
					$result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

					if($result) {
						$adminEmail = 'bogdan@mail.ru';
						$message = 'New orders';
						$subject = 'New order';
						mail($adminEmail, $subject, $message);

						Cart::clear();
					}
				} else {
					//Incorect filled form
					$productsInCart = Cart::getProducts();
					$productsIds = array_keys($productsInCart);
					$products = Product::getProductsByIds($productsIds);
					$totalPrice = Cart::getTotalPrice($products);
					$totalAmount = Cart::countItems();
				}

			} else {
				//Not sent form
				$productsInCart = Cart::getProducts();

				if($productsInCart == false) {
					header("Location: /");
				} else {
					$productsIds = array_keys($productsInCart);
					$products = Product::getProductsByIds($productsIds);
					$totalPrice = Cart::getTotalPrice($products);
					$totalAmount = Cart::countItems();

					$userName = false;
					$userPhone = false;
					$userComment = false;

					if(User::isGuest()) {

					} else {
						$userId = User::checkLogged();
						$user = User::getUserById($userId);

						$userNameLogged = $user['name'];
					}
				}
			}
			require_once ROOT . '/views/cart/checkout.php';

			return true;
		}
		public function actionDelete($id)
		{
			$count = 0;
			if(isset($_POST['count']))
				$count = $_POST['count'];
			if ( $count >= 100 || $count < 0 ) {
				exit ("error");
			}
			echo Cart::deleteProduct($id, $count);
			return true;
		}
	}