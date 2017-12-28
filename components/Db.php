<?php
	/**
	* Class Db
	*/
	class Db
	{
		public static function getConnection ()
		{
			$paramsPath = ROOT.'/config/db_params.php';
			$params = include ($paramsPath);

			$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
			$db = new PDO ( $dsn, $params['user'], $params['password'] );
			
			//Encoding of database
			$db->exec ( "set names utf8" );

			return $db;
		}
	}