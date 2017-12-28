<?php
class Product 
{
	const SHOW_BY_DEFAULT = 6;

	public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
	{
		$count = intval ($count);
		$db = Db::getConnection();
		$productsList = array();

		$result = $db->query('SELECT id, name, price, is_new FROM product '
					. 'WHERE status = "1"'
					. 'ORDER BY id DESC '
					. 'LIMIT ' . $count );
		$i = 0;
		while($row = $result->fetch()){
			$productsList[$i]['id'] = $row['id'];
			$productsList[$i]['name'] = $row['name'];
			$productsList[$i]['price'] = $row['price'];
			$productsList[$i]['is_new'] = $row['is_new'];
			++ $i;
		}
		return $productsList;
	}
	public static function getProductsListByCategory($categoryId = false, $page = 1)
	{
		if ($categoryId) {
			$page = intval($page);
			$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
			$db = Db::getConnection();
			$products = array();
			$result = $db->query("SELECT id, name, price, is_new FROM product "
					. "WHERE status = '1' AND category_id = '$categoryId' " 
					. "ORDER BY id DESC "
					. "LIMIT " . self::SHOW_BY_DEFAULT 
					. " OFFSET " . $offset);
		$i = 0;

		while($row = $result->fetch()){
			$products[$i]['id'] = $row['id'];
			$products[$i]['name'] = $row['name'];
			$products[$i]['price'] = $row['price'];
			$products[$i]['is_new'] = $row['is_new'];
			++ $i;
		}
		return $products;
		}

	}
	public static function getProductByID($id)
	{
		
		$id = intval($id);

		if($id) {
			$db = Db::getConnection();
			$result = array();
			$result = $db->query('SELECT * FROM product WHERE id =' . $id);
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
	}
	public static function getTotalProducts()
	{
		$db = Db::getConnection();

		$result = $db->query('SELECT count(id) AS count FROM product ' 
			. 'WHERE status="1"');
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$row = $result->fetch();

		return $row['count'];
	}
	public static function getTotalProductsInCategory($categoryId)
	{
		$db = Db::getConnection();

		$result = $db->query('SELECT count(id) AS count FROM product '
			. 'WHERE status="1" AND category_id ="'.$categoryId.'"');
		//$result->setFetchMode(PDO::FETCH_ASSOC);
		$row = $result->fetch();

		return $row['count'];
	}
	public static function getProductsByIds($idsArray)
	{
		$products = array();

		$db = Db::getConnection();

		$idsString = implode(',', $idsArray);

		$sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

		$result = $db->query($sql);
		$result->setFetchMode(PDO::FETCH_ASSOC);

		$i = 0;
		while($row = $result->fetch()) {
			$products[$i]['id'] = $row['id'];
			$products[$i]['code'] = $row['code'];
			$products[$i]['name'] = $row['name'];
			$products[$i]['price'] = $row['price'];
			++ $i;
		}
		return $products;
	}
	/**
	* Return list of slider items which is recommended
	* @return array <p>Array with slider items</p>
	*/
	public static function getRecommendedProducts()
	{
		$db = Db::getConnection();

		$sql = "SELECT id, name, price, is_new FROM product "
			 . "WHERE status='1' AND is_recommended='1' "
			 . "ORDER BY id DESC";

		$result = $db->query($sql);
		$result->setFetchMode(PDO::FETCH_ASSOC);

		$i = 0;
		$sliderProducts = array();
		while($row = $result->fetch()) {
			$sliderProducts[$i]['id'] = $row['id'];
			$sliderProducts[$i]['is_new'] = $row['is_new'];
			$sliderProducts[$i]['name'] = $row['name'];
			$sliderProducts[$i]['price'] = $row['price'];
			++ $i;
		}
		return $sliderProducts;
	}

	public static function getProductsList()
	{
		$db = Db::getConnection();

		$sql = "SELECT id, name, price, code FROM product ORDER BY id ASC";
		

		$result = $db->query($sql);
		$productsList = array();
		$i = 0;
		while($row = $result->fetch()) {
			$productsList[$i]['id'] = $row['id'];
			$productsList[$i]['name'] = $row['name'];
			$productsList[$i]['code'] = $row['code'];
			$productsList[$i]['price'] = $row['price'];
			++ $i;
		}
		return $productsList;
	}
	/**
	* Delete item by id in the table product
	* @param integer $id - item id
	* @return bool - result sql query
	*/
	public static function deleteProductById($id)
	{
		$db = Db::getConnection();

		$sql = "DELETE FROM product WHERE id = :id";

		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		return $result->execute();
	}
	public static function createProduct($options)
	{
		$db = Db::getConnection();


		$sql = "INSERT INTO product "
		 		. "(name, category_id, code, price, availability, brand, "
                . "description, is_new, is_recommended, status) "
                . "VALUES "
                . "(:name, :category_id, :code, :price, :availability, :brand, "
                . ":description, :is_new, :is_recommended, :status)";

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            return $db->lastInsertId();
        }

        return 0;
	}
	public static function updateProductById($id, $options)
	{
		$db = Db::getConnection();

		$sql = "UPDATE product
				SET
					name = :name,
					category_id = :category_id,
					code = :code,
					price = :price,
					availability = :availability,
					brand = :brand,
					description = :description,
					is_new = :is_new,
					is_recommended = :is_recommended,
					status = :status
				WHERE id = :id";
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
        		
	}
	public static function getProductsListAll($page = 1)
	{
		$page = intval($page);
		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
		$db = Db::getConnection();
		$products = array();
		$result = $db->query("SELECT id, name, price, is_new FROM product "
				. "WHERE status = '1' " 
				. "ORDER BY id DESC "
				. "LIMIT " . self::SHOW_BY_DEFAULT 
				. " OFFSET " . $offset);
		$i = 0;

		while($row = $result->fetch()){
			$products[$i]['id'] = $row['id'];
			$products[$i]['name'] = $row['name'];
			$products[$i]['price'] = $row['price'];
			$products[$i]['is_new'] = $row['is_new'];
			++ $i;
		}
		return $products;
	}
	public static function getImage($id)
	{
		$noImage = 'no_image.jpg';

		$path = '/upload/images/products/';

		$pathToProductImage = $path . $id . '.jpg';

		if(file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
			return $pathToProductImage;
		}
		return $path . $noImage;
	}

}