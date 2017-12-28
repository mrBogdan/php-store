<?php
class User {
	public static function register($name, $surname, $email, $password)
	{
		$db = Db::getConnection();
		$name = htmlspecialchars($name);
		$surname = htmlspecialchars($surname);
		$password = md5($password);
		$sql = 'INSERT INTO user (name, surname, email, password) '
				. 'VALUES (:name, :surname, :email, :password)';
		$result = $db->prepare($sql);
		$result->bindParam(':name', $name, PDO::PARAM_STR);	 
		$result->bindParam(':surname', $surname, PDO::PARAM_STR);	 
		$result->bindParam(':email', $email, PDO::PARAM_STR);	 
		$result->bindParam(':password', $password, PDO::PARAM_STR);	

		return $result->execute(); 
	}

	public static function checkName($name)
	{
		if (strlen($name) >= 2)	return true;
								return false;
	}
	public static function checkPhone($phone)
	{
		$pattern = "/^8\(([0-9]){3}\) ([0-9]){3}-([0-9]){4}$/";

		if (strlen($phone) >= 5 && preg_match($pattern, $phone))	return true;
		return false;
	}

	public static function checkEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL))	return true;
		else 											return false;
	}

	public static function checkPassword($password)
	{
		if (strlen($password) >= 6)	return true;
		else 						return false;
	}

	public static function checkEmailExists($email)
	{
		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->execute();

		if($result->fetchColumn()) return true;
		else 					   return false;
	}

	public static function checkUserData($email, $password)
	{
		$db = Db::getConnection();

		$sql = 'SELECT * FROM user WHERE email = :email AND password = :password';
		$result = $db->prepare($sql);
		$password = md5($password);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);
		$result->execute();

		$user = $result->fetch();
		if($user) return $user['id'];
		else 	  return false;	
	}

	public static function auth($userID)
	{
		$_SESSION['user'] = $userID;
	}

	public static function checkLogged()
	{
		if(isset($_SESSION['user'])){
			return $_SESSION['user'];
		}
		header("Location: /user/login");
	}
	public static function isGuest()
	{
		if(isset($_SESSION['user']))	return false;
		else 							return true;
	}
	public static function getUserById($id)
	{
		if($id) {
			$db = Db::getConnection();
			$sql = 'SELECT * FROM user WHERE id = :id';

			$result = $db->prepare($sql);
			$result->bindParam(':id', $id, PDO::PARAM_INT);

			$result->setFetchMode(PDO::FETCH_ASSOC);
			$result->execute();

			return $result->fetch();
		}
	}
	public static function edit($id, $name, $password)
	{
		$db = Db::getConnection();

		$sql = 'UPDATE user
				SET name = :name, password = :password
				WHERE id = :id';
			
		$result = $db->prepare($sql);
		$password = md5($password);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);

		return $result->execute();
	}
	public static function checkAdmin()
	{
		$userId = self::getUser();

		$user = self::getUserById($userId);

		if($user['role'] == 'admin') return true;
		return false;
	}
	public static function getUser()
	{
		if(isset($_SESSION['user']))	return $_SESSION['user'];
			 							return false;
	}
	public static function getUserNavList()
	{
			$db = Db::getConnection();

			$userNavList = array();

			$result = $db->query('SELECT id, name, icon, status FROM user_nav '
				. 'ORDER BY sort_order ASC');

			$i = 0;
			while($row = $result->fetch()) {
				$userNavList[$i]['id'] = $row['id'];
				$userNavList[$i]['name'] = $row['name'];
				$userNavList[$i]['icon'] = $row['icon'];
				$userNavList[$i]['status'] = $row['status'];
				++ $i;
			}

			return $userNavList;
	}
	public static function getImage($id)
	{
		$noImage = 'no_image.jpg';

		$path = '/upload/images/users/';

		$pathToProductImage = $path . $id . '.jpg';

		if(file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
			return $pathToProductImage;
		}
		return $path . $noImage;
	}
}