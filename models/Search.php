<?php
class Search {
	
	public static function selectFromDb($querySearch)
	{
		$db = Db::getConnection();
		$query = explode(" ", $querySearch);
		foreach ($query as $key => $value) {
			if(isset($query[$key - 1])) $sql .= " AND ";
			$sql = "`name` LIKE '%{$value}%'";
		}
		$sql = "SELECT id, name, price FROM product WHERE {$sql}";
		$result = $db->query("".$sql);
		if($result) {
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$i = 0;
			$productsList = array();
			while($row = $result->fetch()) {
				$productsList[$i]['id'] = $row['id'];
				$productsList[$i]['name'] = $row['name'];
				$productsList[$i]['price'] = $row['price'];
				++ $i;
			}
			return $productsList;
		}
		return false;
		
	}
}