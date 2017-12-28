<?php
class AdminOrderController extends AdminBase 
{
	public function actionIndex()
	{
		$db = Db::getConnection();
		
		$ordersList = Order::getOrdersList();

		require_once ROOT . '/views/admin_order/index.php';
		return true;
	}
	public function actionCreate()
	{
		require_once ROOT . '/views/admin_order/create.php';
		return true;
	}
	public function actionUpdate($id)
	{
		$order = Order::getOrderById($id);

        if (isset($_POST['submit'])) {
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            $date = $_POST['date'];
            $status = $_POST['status'];

            Order::updateOrderById($id, $userName, $userPhone, $userComment, $date, $status);

            header("Location: /admin/order/view/$id");
        }
		require_once ROOT . '/views/admin_order/update.php';
		return true;
	}
	public function actionDelete($id)
	{
		if (isset($_POST['submit'])) {
            Order::deleteOrderById($id);

            header("Location: /admin/order");
        }
		require_once ROOT . '/views/admin_order/delete.php';
		return true;
	}
	public function actionView($id)
	{
		$order = Order::getOrderById($id);

		$orderProducts = json_decode($order['products'], true);
		$productsIds = array_keys($orderProducts);

		$products = Product::getProductsByIds($productsIds);
		require_once ROOT  . '/views/admin_order/view.php';
		return true;
	}
}