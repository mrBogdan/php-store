<?php
class AdminCategoryController extends AdminBase
{
	public function actionIndex()
	{
		$categoriesList = Category::getCategoriesListAdmin();
		require_once ROOT . '/views/admin_category/index.php';
		return true;
	}
	public function actionUpdate($id)
	{
		$category = Category::getCategoryById($id);

		if(isset($_POST['submit'])) {
			$name = $_POST['name'];
			$sortOrder = $_POST['sort_order'];
			$status = $_POST['status'];

			Category::updateCategoryById($id, $name, $sortOrder, $status);

			header("Location: /admin/category");
		}
		require_once ROOT . '/views/admin_category/update.php';
		return true;
	}
	public function actionCreate()
	{
		if(isset($_POST['submit'])) {

			$options['name'] = $_POST['name'];
			$options['sort_order'] = $_POST['sort_order'];
			$options['status'] = $_POST['status'];

			$errors = false;

			if (!isset($_POST['name']) || empty($options['name']) ) {
				$errors[] = 'Fill all fields correctly';
			}
			if ($errors == false) {
				Category::createCategory($options);
			}
			header("Location: /admin/category");
			
		}
		require_once ROOT . '/views/admin_category/create.php';
		return true;
	}
	public function actionDelete($id)
	{
		if(isset($_POST['submit'])) {
			Category::deleteCategoryById($id);

			header("Location: /admin/category");
		}
		require_once ROOT . '/views/admin_category/delete.php';
		return true;
	}
}