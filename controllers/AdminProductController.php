<?php
class AdminProductController extends AdminBase
{
	public function actionIndex()
	{
		$productsList = Product::getProductsList();
		require_once ROOT . '/views/admin_product/index.php';
		return true;
	}
	public function actionCreate()
	{
		$categoriesList = Category::getCategoriesListAdmin();

		if(isset($_POST['submit'])) {

			$options['name'] = $_POST['name'];
			$options['code'] = $_POST['code'];
			$options['price'] = $_POST['price'];
			$options['category_id'] = $_POST['category_id'];
			$options['brand'] = $_POST['brand'];
			$options['availability'] = $_POST['availability'];
			$options['description'] = $_POST['description'];
			$options['is_new'] = $_POST['is_new'];
			$options['is_recommended'] = $_POST['is_recommended'];
			$options['status'] = $_POST['status'];

			$errors = false;

			if (!isset($_POST['name']) || empty($options['name']) ) {
				$errors[] = 'Fill all fields correctly';
			}
			if ($errors == false) {

				$id = Product::createProduct($options);

				if ($id) {
					if (is_uploaded_file($_FILES['image']['tmp_name'])) {
						move_uploaded_file(
							$_FILES['image']['tmp_name'], 
							$_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/".$id.".jpg"
						);
					
					}
				}
			}
			header("Location: /admin/product");
			
		}
		require_once ROOT . '/views/admin_product/create.php';
		return true;
	}
	public function actionDelete($id)
	{
		if(isset($_POST['submit'])) {
			Product::deleteProductById($id);

			header("Location: /admin/product");
		}
		require_once ROOT . '/views/admin_product/delete.php';
		return true;
	}
	public function actionUpdate($id)
	{
		$categoriesList = Category::getCategoriesListAdmin();

		$product = Product::getProductByID($id);

		if (isset($_POST['submit'])) {

			$options['name'] = $_POST['name'];
			$options['code'] = $_POST['code'];
			$options['price'] = $_POST['price'];
			$options['category_id'] = $_POST['category_id'];
			$options['brand'] = $_POST['brand'];
			$options['availability'] = $_POST['availability'];
			$options['description'] = $_POST['description'];
			$options['is_new'] = $_POST['is_new'];
			$options['is_recommended'] = $_POST['is_recommended'];
			$options['status'] = $_POST['status'];

			if(Product::updateProductById($id, $options)) {
				if(is_uploaded_file($_FILES['image']['tmp_name'])) {
					move_uploaded_file(
						$_FILES['image']['tmp_name'], 
						$_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/".$id.".jpg"
					);
				}
			}
			header("Location: /admin/product");
		}
		require_once ROOT . '/views/admin_product/update.php';
		return true;
	}
}