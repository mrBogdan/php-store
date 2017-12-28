<?php

class Order
{
	public static function save($userName, $userPhone, $userComment, $userId, $products)
	{
		$products = json_encode($products);
		
		$db = Db::getConnection();

		$sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) '
				. 'VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';

		$result = $db->prepare($sql);

		$result->bindParam(':user_name', $userName, PDO::PARAM_STR);		
		$result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);		
		$result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);		
		$result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);	
		$result->bindParam(':user_id', $userId, PDO::PARAM_INT);	
		$result->bindParam(':products', $products, PDO::PARAM_STR);		

		return $result->execute();
	}
	public static function getOrderById($id)
	{
		$db = Db::getConnection();

		$sql = 'SELECT * FROM product_order WHERE id = :id';
		
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$result->execute();
		return $result->fetch();
	}
	public static function getOrderByUser($id)
	{
		$db = Db::getConnection();

		$sql = 'SELECT * FROM product_order WHERE user_id = :id';
		
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$result->execute();
		return $result->fetch();
	}
	public static function getStatusText($status)
	{
		switch ($status) {
			case 1:
				return "The new order";
			case 2:
				return "The order is processing";
			case 3:
				return "The order is delivered";
			case 4:
				return "Private order";
		}
	}
	public static function getOrdersList()
	{
		 $db = Db::getConnection();

        $result = $db->query('SELECT id, user_name, user_phone, date, status FROM product_order ORDER BY id DESC');
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_name'] = $row['user_name'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            ++ $i;
        }
        return $ordersList;
	}
	public static function deleteOrderById($id)
	{
	    $db = Db::getConnection();

	    $sql = 'DELETE FROM product_order WHERE id = :id';
	    
	    $result = $db->prepare($sql);
	    $result->bindParam(':id', $id, PDO::PARAM_INT);

	    return $result->execute();
	}
	public static function deleteOrders($id)
	{
	    $db = Db::getConnection();

	    $sql = 'DELETE FROM product_order WHERE user_id = :id';
	    
	    $result = $db->prepare($sql);
	    $result->bindParam(':id', $id, PDO::PARAM_INT);

	    return $result->execute();
	}

	public static function updateOrderById
	(
		$id, 
		$userName, 
		$userPhone, 
		$userComment, 
		$date, 
		$status
	)
	{
	    $db = Db::getConnection();

	    $sql = "UPDATE product_order
	        SET 
	            user_name = :user_name, 
	            user_phone = :user_phone, 
	            user_comment = :user_comment, 
	            date = :date, 
	            status = :status 
	        WHERE id = :id";

	    $result = $db->prepare($sql);
	    $result->bindParam(':id', $id, PDO::PARAM_INT);
	    $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
	    $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
	    $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
	    $result->bindParam(':date', $date, PDO::PARAM_STR);
	    $result->bindParam(':status', $status, PDO::PARAM_INT);
	    return $result->execute();
	}
}