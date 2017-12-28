<?php
	abstract class AdminBase
	{
		function __construct()
		{
			self::checkAdmin();
		}
		public static function checkAdmin()
		{
			$userId = User::checkLogged();

			$user = User::getUserById($userId);

			if($user['role'] == 'admin') return true;
			die('Access denied');
		}
	}