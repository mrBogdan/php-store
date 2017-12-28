<?php
class SiteController
{
	public function actionIndex ()
	{
		$categories = array();
		$categories = Category::getCategoriesList();

		$latestProducts = array();
		$latestProducts = Product::getLatestProducts(6);

		$sliderProducts = array();
		$sliderProducts = Product::getRecommendedProducts();

		require_once (ROOT . '/views/site/index.php');

		return true;
	
	}
	public function actionContact()
	{
		$userEmail = '';
		$userText = '';
		$result = false;

		if(isset($_POST['submit'])) {
			$userEmail = $_POST['userEmail'];
			$userText = $_POST['userText'];

			$errors = false;

			if(!User::checkEmail($userEmail)) {
				$errors[] = "Incorrect an email";
			}
			if($errors == false) {
				$adminEmail = 'bogdan@mail.ru';
				$message = "Text: ".$userText." From ".$userEmail;
				$subject = "Theme the letter";
				$result = mail($adminEmail, $subject, $message);
				$result = true;
			}

		}
		require_once ROOT . '/views/site/contact.php';

		return true;
	}
	public function actionSearch()
	{
		$categories = array();
		$categories = Category::getCategoriesList();
		$_SESSION['search'] = $_POST['search'];
		if(isset($_SESSION['search'])) {
			$response = Search::selectFromDb($_SESSION['search']);
		}
		require_once (ROOT . '/views/site/search.php');
		return true;
	}
}