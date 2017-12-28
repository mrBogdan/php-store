<?php
	class Cart
	{
		public static function addProduct($id, $count = 0, $itemCount = 0)
		{
			$id = intval($id);

			$productsInCart = array();

			if ( isset($_SESSION['products']) ) {
				$productsInCart = $_SESSION['products'];
			}
			if($itemCount > 0)	{
				if(array_key_exists($id, $productsInCart)) {
					$productsInCart[$id] += $itemCount - 1;
				}
			}
			
			if($count > 0) {
				if(array_key_exists($id, $productsInCart)) {
					$productsInCart[$id] = $count;
				} 
				$_SESSION['products'] = $productsInCart;
				$productsIds = array_keys($productsInCart);
				$products = Product::getProductsByIds($productsIds);
				$product = Product::getProductByID($id);
				$countItems = self::countItems();
				$itemTotalPrice = $productsInCart[$id] * $product['price'];
				$totalPrice = self::getTotalPrice($products);
				if($countItems >= 100 || $countItems < 0) {
					exit ('error');
				}
				$temp = array(
					'count' => $countItems, 
					'itemTotalPrice' => $itemTotalPrice,
					'totalPrice' => $totalPrice
				);
				$temp = json_encode($temp);
				return $temp;
			}
			if(array_key_exists($id, $productsInCart)) {
				$productsInCart[$id] ++;
			}	
			else {
				if($itemCount) {
					$productsInCart[$id] = $itemCount;
				} 
				else
					$productsInCart[$id] = 1;
			}

			$_SESSION['products'] = $productsInCart;
			
			return self::countItems();
		}
		public static function getProducts()
		{
			if(isset($_SESSION['products'])) {
				return $_SESSION['products'];
			}
			return false;
		}
		public static function countItems()
		{
			if (isset($_SESSION['products'])) {
				$count = 0;
				foreach ($_SESSION['products'] as $id => $amount) {
					$count += $amount;
				}
				return $count;
			} else {
				return 0;
			}
		}

		public static function getTotalPrice($products)
		{
			$productsInCart = self::getProducts();

			$total = 0;

			if ($productsInCart) {
				foreach ($products as $item) {
					$total += (float)$item['price'] * (int)$productsInCart[(int)$item['id']];
				}
			}
			return $total;
		}
		public static function clear()
		{
			if(isset($_SESSION['products']))	unset($_SESSION['products']);
		}
		public static function deleteProduct($id, $count = 0)
		{
			$id = intval($id);

			if ( isset($_SESSION['products']) ) {
				$productsInCart = $_SESSION['products'];
			}
			if($count > 0) {
				if(array_key_exists($id, $productsInCart)) {
					$productsInCart[$id] = $count;
				} 
				$_SESSION['products'] = $productsInCart;
				$productsIds = array_keys($productsInCart);
				$products = Product::getProductsByIds($productsIds);
				$product = Product::getProductByID($id);
				$countItems = self::countItems();
				$itemTotalPrice = $productsInCart[$id] * $product['price'];
				$totalPrice = self::getTotalPrice($products);
				
				$temp = array(
					'count' => $countItems, 
					'itemTotalPrice' => $itemTotalPrice,
					'totalPrice' => $totalPrice
				);
				$temp = json_encode($temp);
				return $temp;
			}

			if( array_key_exists($id, $productsInCart) ) {
				unset($productsInCart[$id]);
			}
			//$productsInCart = self::deleteItem($id);
			$_SESSION['products'] = $productsInCart;

			return self::countItems();

		}
	}