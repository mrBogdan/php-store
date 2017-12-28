<?php
	class CabinetController 
	{
		public function actionIndex()
		{
			$userId = User::checkLogged();
			$user = User::getUserById($userId);
			require_once ROOT . '/views/cabinet/index.php';
			return true;
		}
		public function actionEdit()
		{
			$userId = User::checkLogged();

			$user = User::getUserById($userId);

			$name = $user['name'];
			$password = $user['password'];

			$result = false;

			if(isset($_POST['submit'])) {
				$name = $_POST['name'];
				$password = $_POST['password'];

				$errors = false;

				if(!User::checkName($name)) 		 $errors[] = "The name must be more than 2 symbols!";
				if(!User::checkPassword($password))  $errors[] = "The password must be more than 6 symbols!";
				if($errors == false)				 $result = User::edit($userId, $name, $password);
			}
			require_once ROOT . '/views/cabinet/edit.php';
			return true;

		}
	}