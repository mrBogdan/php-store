<?php
class UserController {
	public function actionRegister()
	{
		$name = '';
		$surname = '';
		$email = '';
		$password = '';
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$surname = $_POST['surname'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			$errors = false;

			if(!User::checkName($name)) 		$errors[] = 'Name cant be less than 2 symbols';
			if(!User::checkName($surname)) 		$errors[] = 'Surname cant be less than 2 symbols';
			if(!User::checkEmail($email)) 		$errors[] = 'Email is incorrect';
			if(!User::checkPassword($password)) $errors[] = 'Password cant be less than 6 symbols';	
			if(User::checkEmailExists($email))	$errors[] = 'Such an email alreay using!';
			if($errors == false) { $result = User::register($name, $surname, $email, $password); }
			
		}
		require_once ROOT . '/views/user/register.php';
		return true;
	}
	public function actionLogin()
	{
		$email = '';
		$password = '';
		if(isset($_POST['submit'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];

			$errors = false;

			if(!User::checkEmail($email)) 		$errors[] = 'Incorrect email';
			if(!User::checkPassword($password)) $errors[] = 'Incorrect email';
			
			$userId = User::checkUserData($email, $password);

			if($userId == false)				$errors[] = "Incorrect dates for log in";
			else {
				User::auth($userId); 
				header("Location: /user/".$userId); 
			}									
			
		}
		require_once ROOT . '/views/user/login.php';
		return true;
	}
	public function actionLogout()
	{
		session_start();
		unset($_SESSION['user']);
		header("Location: /");
	}
	public function actionIndex()
	{
		$currentUser = User::getUser();
		$userNavList = User::getUserNavList();
		$userPage = User::getUserById($currentUser);
		require ROOT . '/views/user/view.php';
		return true;
	}
	public function actionView($id)
	{
		$currentUser = User::getUser();
		$userNavList = User::getUserNavList();
		$userPage = User::getUserById($id);
		if($currentUser == $userPage['id']) {
			
		}  
		require ROOT . '/views/user/view.php';
		return true;
	}
	public function actionEdit()
		{
			$userId = User::checkLogged();
			$userNavList = User::getUserNavList();
			$user = User::getUserById($userId);

			$name = $user['name'];
			$surname = $user['surname'];
			$password = $user['password'];

			$result = false;

			if(isset($_POST['submit'])) {
				$name = $_POST['name'];
				$password = $_POST['password'];

				$errors = false;

				if(!User::checkName($name)) 		 $errors[] = "The name must be more than 2 symbols!";
				if(!User::checkName($surname)) 		 $errors[] = "The surname must be more than 2 symbols!";
				if(!User::checkPassword($password))  $errors[] = "The password must be more than 6 symbols!";
				if($errors == false)				 $result = User::edit($userId, $surname, $name, $password);
			
				if (is_uploaded_file($_FILES['image']['tmp_name'])) {
					move_uploaded_file(
						$_FILES['image']['tmp_name'], 
						$_SERVER['DOCUMENT_ROOT'] . "/upload/images/users/".$userId.".jpg"
					);
				}
				header("Location: /user/".$userId);
			}
			require_once ROOT . '/views/user/edit.php';
			return true;

		}
		public function actionMessage()
		{
			$userId = User::checkLogged();
			$userNavList = User::getUserNavList();
			$user = User::getUserById($userId);
			require_once ROOT . '/views/user/message.php';
			return true;
		}
		public function actionOrder()
		{
			$id = User::getUser();
			$order = Order::getOrderByUser($id);
			
			if($order) {
				$orderProducts = json_decode($order['products'], true);
				$productsIds = array_keys($orderProducts);

				$products = Product::getProductsByIds($productsIds);
			}
			else $products = false;
			
			require_once ROOT . '/views/order/index.php';
			return true;
		}
		public function actionCancel()
		{
			$id = User::getUser();
			if (isset($_POST['submit'])) {
            	Order::deleteOrders($id);
            	header("Location: /");
	        }
			require_once ROOT . '/views/order/cancel.php';
			return true;
		}
}
	