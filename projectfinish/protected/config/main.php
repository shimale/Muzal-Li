<?php

	// uncomment the following to define a path alias
	// Yii::setPathOfAlias('local','path/to/local-folder');

	// This is the main Web application configuration. Any writable
	// CWebApplication properties can be configured here.
return array(
	
	

		// preloading 'log' component
	'preload'=>array('log'),
	 'sourceLanguage'=>'he',
	 "language"=> 'he',

		// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		"application.controllers.*",

		
		),
	
	
	'defaultController'=>'main',

		// application components
	'components'=>array(
		
			// uncomment the following to use a MySQL database

		
		
			'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=project',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			
		), 'authManager'=>array(
			'class'=>'CDbAuthManager',
			'connectionID'=>'db',
			),
			
			'errorHandler'=>array(
				// use 'site/error' action to display errors
				'errorAction'=>'main/error', 
				),
			'urlManager'=>array(
				'urlFormat'=>'path',
				'showScriptName' => false,
				"rules" => array
				(	
					"hi/<id:\d+>"=>"Main/hi",
					"index"=>"Main/index",
					"login" => "Main/login",
					"logout" => "Main/logout",
					"reviewuser/<id:\d+>" => "User/reviewuser",
					"edituser/<id:\d+>" => "User/edituser",
					"updateuser" => "User/updateuser",
					"deleteuser/<id:\d+>" => "User/deleteuser",
					"insertuser"=> "User/insertuser",
					"changepassword"=>"User/viewpassword",
					"users" => "user/Users",
					"register" =>"User/register",
					"categorys" =>"Category/categorys",
					"insertcategory" =>"Category/insertcategory",
					"createcategory"=>"Category/createcategory",
					"reviewcategory/<id:\d+>" => "Category/reviewcategory",
					"editcategory/<id:\d+>" => "Category/editcategory",
					"updatecategory" =>"Category/updatecategory",
					"deletecategory" =>"Category/deletecategory",
					"reviewsubcategory/<id:\d+>" => "SubCategory/reviewsubcategory",
					"createsubcategory/<id:\d+>"=>"SubCategory/createsubcategory",
					"insertsubcategory" =>"SubCategory/insertsubcategory",
					"updatesubcategory" =>"SubCategory/updatesubcategory",
					"editsubcategory/<id:\d+>" => "SubCategory/editsubcategory",
					"deletesubcategory/" =>"SubCategory/deletesubcategory",
					"createshop"=>"Shop/createshop",
					"reviewshop/<id:\d+>"=>"Shop/reviewshop",
					"insertshop"=>"Shop/insertshop",
					"editshop/<id:\d+>" => "Shop/editshop",
					"deleteshop/<id:\d+>"=>"Shop/deleteshop",
					"updateshop" => "Shop/updateshop",
					"subcategoryshop/<idshop:\d+>" => "Shop/subcategoryshop",
					"prodectshop/<idshop:\d+>" =>"Shop/prodectshop",
					"selectprodectshop/<idshop:\d+>" =>"Shop/selectprodectshop",
					"insertprodectshop/" =>"ProdectShop/insertprodectshop",
					"updateprodectshop"=>"ProdectShop/updateprodectshop",
					"deleteprodectshop/<idshop:\d+>"=>"ProdectShop/deleteprodectshop",
					"viewinsertproductshop" => "ProductShop/viewinsert",
					"viewupdateproductshop" => "ProductShop/viewupdate",
					"updateprodect" => "prodectshop/update" ,
					"shops"=>"Shop/shops",
					"categoryprodect" =>"Prodect/categoryprodect",
					"subCategoryprodect/<id:\d+>" =>"Prodect/subCategoryprodect",
					"prodects/<id:\d+>/<idcategory:\d+>" =>"Prodect/prodects",
					"createProdect/<id:\d+>" =>"Prodect/createprodect",
					"insertprodect" =>"Prodect/insertprodect",   
					"reviewprodect/<id:\d+>"=>"Prodect/reviewprodect",
					"editprodect/<id:\d+>/" => "Prodect/editprodect",
					"deleteprodect" => "Prodect/deleteprodect",
					"updateprodect" => "Prodect/updateprodect"
					
					)
),
'user'=>array(
				// enable cookie-based authentication
	'loginUrl'=>array(""),
	'allowAutoLogin'=> true,
	
	),

'log'=>array(
	'class'=>'CLogRouter',
	'routes'=>array(
		array(
			'class'=>'CFileLogRoute',
			'levels'=>'error, warning',
			),
		
		),
	),
),



);
?>