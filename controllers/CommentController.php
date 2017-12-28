<?php
class CommentController extends AdminBase {
	public function actionDelete($id)
	{
		$categories = array();
		$categories = Category::getCategoriesList();
		$ProductId = Comment::ProductIdFromComment($id)['goods_id'];
		if(isset($_POST['submit'])) {
			Comment::deleteCommentById($id);
			header("Location: /product/".$ProductId);
		}
		require_once ROOT . '/views/comment/delete.php';
		return true;
	}
}