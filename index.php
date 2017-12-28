<?php
	session_start();
	define( 'ROOT', dirname ( __FILE__ ) );

	require_once ROOT . '/components/Autoload.php';
	

	$router = new Router ();
	$router->run ();