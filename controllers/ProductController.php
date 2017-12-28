<?php	
class ProductController
{
	public function actionView ($productId)
	{
		$categories = array();
		$categories = Category::getCategoriesList();
		$product = Product::getProductById($productId);
		$comments = Comment::getCommentsListById($productId);
		if(isset($_POST['submit'])) {
			$comment = $_POST['userComment'];
			$userId = User::getUser();
			$errors = false;
			if(strlen($comment) > 100 || strlen($comment) === 0)
				$errors[] = 'The messege cant be more than 100 symbols and less than 0';
			if(!$errors && $userId) {
				Comment::addComment($productId, $userId, $comment);
				header("Location: /product/".$productId);
			}
		}
		require_once (ROOT . '/views/product/view.php');
		return true;
	}		
}