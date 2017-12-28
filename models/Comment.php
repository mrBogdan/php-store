<?php
class Comment {
	public static function addComment($goods_id, $user_id, $comment)
	{
		$db = Db::getConnection();
		$comment = htmlspecialchars(nl2br($comment));
		$sql = "INSERT INTO comment (goods_id, user_id, comment) "
			. "VALUES (:goods_id, :user_id, :comment)";
		$result = $db->prepare($sql);
		$result->bindParam(':goods_id', $goods_id, PDO::PARAM_INT);	
		$result->bindParam(':user_id', $user_id, PDO::PARAM_INT);	
		$result->bindParam(':comment', $comment, PDO::PARAM_STR);
		$result->execute();	
	}
	public static function getCommentsListById($id)
	{
		$db = Db::getConnection();

		$comment = array();
		$result = $db->query("SELECT * FROM comment WHERE goods_id=".$id);

		$i = 0;
		while($row = $result->fetch()) {
			$comment[$i]['id'] = $row['id']; 
			$comment[$i]['user_id'] = $row['user_id']; 
			$comment[$i]['date'] = $row['date']; 
			$comment[$i]['comment'] = $row['comment']; 
			++ $i;
		}
		return $comment;
	}
	public static function deleteCommentById($id)
	{
		$db = Db::getConnection();

	    $sql = 'DELETE FROM comment WHERE id = :id';
	    
	    $result = $db->prepare($sql);
	    $result->bindParam(':id', $id, PDO::PARAM_INT);

	    $result->execute();
	}
	public static function ProductIdFromComment($id)
	{
		$db = Db::getConnection();

		$sql = "SELECT * FROM comment WHERE id = :id";
		
		$result = $db->prepare($sql);
		$result->bindParam('id', $id, PDO::PARAM_INT);

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$result->execute();

		return $result->fetch();
	}
}