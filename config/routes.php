<?php
	return array (

		'product/([0-9]+)' => 'product/view/$1', //actionView in ProductController
		//Catalog
		'catalog/page-([0-9]+)' => 'catalog/index/$1',
		'catalog' => 'catalog/index', //actionIndex in CatalogController
		//user

		'user/myorders' => 'user/order',
		'user/cancel' => 'user/cancel',
		'user/([0-9]+)' => 'user/view/$1',
		'user/edit' => 'user/edit',
		'user/message' => 'user/message',
		//'user/mypage' => 'user/index',
		//comments
		'comment/delete/([0-9]+)' => 'comment/delete/$1',
		//Category
		'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
		'category/([0-9]+)' => 'catalog/category/$1', //actionView in ProductController
		//'cart/add/([0-9]+)' => 'cart/add/$1', //actionAdd in CartController
		'cart/checkout' => 'cart/checkout',
		'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', //actionAddAjax in CartController
		'cart/delete/([0-9]+)' => 'cart/delete/$1', 
		'cart' => 'cart/index',
		//Cabinet
		//'cabinet/edit' => 'cabinet/edit',
		//'cabinet' => 'cabinet/index',
		//User
		'user/register' => 'user/register',
		'user/login' => 'user/login',
		'user/logout' => 'user/logout',
		//Admin panel | items
		'admin/product/create' => 'adminProduct/create',
		'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
		'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
		'admin/product' => 'adminProduct/index',
		//Admin panel | category
		'admin/category/create' => 'adminCategory/create',
		'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
		'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
		'admin/category' => 'adminCategory/index',
		//Admin panel | order
		'admin/order/create' => 'adminOrder/create',
		'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
		'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
		'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
		'admin/order' => 'adminOrder/index',
		//Admin panel
		'admin' => 'admin/index',

		'contacts' => 'site/contact',
		'search' => 'site/search',
		'' => 'site/index' // actionIndex in SiteController
	);