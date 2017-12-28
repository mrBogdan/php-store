<?php
	/**
	* Class Router
	*/
	class Router
	{
		private $routes;

		public function __construct()
		{

			//Way to routes
			$routesPath = ROOT . '/config/routes.php';

			//Getting routes with of file 
			$this->routes = include ( $routesPath );

		}

		/**
		 * Returns request string
		 * @return string 
		 */
		private function getURI ()
		{

			if ( !empty ( $_SERVER['REQUEST_URI'] ) )
			{
				return trim ( $_SERVER['REQUEST_URI'], '/' );
			}

		}

		public function run ()
		{

			//Getting of string of query
			$uri = $this->getURI ();
			
			foreach ($this->routes as $uriPattern => $path) 
			{

				if ( preg_match ( "~$uriPattern~", $uri) )
				{
					
					$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

					//Определяем контроллер, action(действие), параметры
					$segments = explode ( '/', $internalRoute );

					$controllerName = array_shift ( $segments ) . 'Controller';
					$controllerName = ucfirst ( $controllerName );

					$actionName = 'action' . ucfirst ( array_shift ( $segments ) );

					$parameters = $segments;
					

					$controllerFile = ROOT . '/controllers/' . 
						$controllerName . '.php';

					
					if ( file_exists ( $controllerFile ) )
					{
						include_once ( $controllerFile );
					}

					//Create new obj, that is call need method (that is action)

					$controllerObject = new $controllerName;

					// echo $controllerName." ".$actionName;
					/**
					 * Calling need method ($actionName) a certain class ($contollerObject)
					 * with given ($paramets) параметрами
					 */
					if(method_exists($controllerObject, $actionName)) {
						$result = call_user_func_array (
							  array ( $controllerObject, $actionName ), 
							  $parameters 
						);
					}
					else {
						require_once ROOT . '/views/error/error404.html';
					}	
			

					//if method of controller is successeful, finish working router
					if ( $result != null )
					{
						break;
					}

				} 

			}

		}
	}
