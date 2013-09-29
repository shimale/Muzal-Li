<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	
	

	// preloading 'log' component
	'preload'=>array('log'),

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
			'connectionString' => 'mysql:host=vsofteng1.shenkar.ac.il;dbname=roee',
			'emulatePrepare' => true,
			'username' => 'roee',
			'password' => 'SHlsqymH',
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
		       	"index"=>"main/index",
		     	"login" => "main/login",
		     	"logout" => "main/logout",
		    	 "reviewuser/<id:\d+>" => "user/reviewuser",
		     	 "edituser/<id:\d+>" => "user/edituser",
		     	"updateuser" => "user/updateuser",
		     	 "deleteuser/<id:\d+>" => "user/deleteuser",
		     	"insertuser"=> "user/insertuser",
		     	"changepassword"=>"user/viewpassword",
		     	 "users" => "user/users",
		   		  "register" =>"user/register",
		     	 "categorys" =>"category/categorys",
		      	"insertcategory" =>"category/insertcategory",
		     	"createcategory"=>"category/createcategory",
		     	 "reviewcategory/<id:\d+>" => "category/reviewcategory",
		     	 "editcategory/<id:\d+>" => "category/editcategory",
		        "updatecategory" =>"category/updatecategory",
		     	"deletecategory/<id:\d+>" =>"category/deletecategory",
		     	 "reviewsubcategory/<id:\d+>" => "subcategory/reviewsubcategory",
		     	"createsubcategory/<id:\d+>"=>"subcategory/createsubcategory",
		     	"insertsubcategory" =>"subcategory/insertsubcategory",
				 "updatesubcategory" =>"subcategory/updatesubcategory",
		   	  "editsubcategory/<id:\d+>" => "subcategory/editsubcategory",
		     	 "deletesubcategory/<id:\d+>" =>"subcategory/deletesubcategory",
		     	"createshop"=>"shop/createshop",
		        "reviewshop/<id:\d+>"=>"shop/reviewshop",
		     	"insertshop"=>"shop/insertshop",
		     	"editshop/<id:\d+>" => "shop/editshop",
		    	 "deleteshop/<id:\d+>" =>"shop/deleteshop",
		     	"updateshop" => "shop/updateshop",
		        "viewAllSubCategoryShop/<id:\d+>/<idshop:\d+>" => "shop/viewAllSubCategoryShop",
		    	 "viewallProdect" =>"productshop/viewallprodectshop",
		     	"insertprodect" =>"productshop/insert",
		     	"viewinsertproductshop" => "productshop/viewinsert",
			     "viewupdateproductshop" => "productshop/viewupdate",
			     "updateprodect" => "prodectshop/update" ,
		     	"shops"=>"shop/shops",
		     	"categoryprodect" =>"prodect/categoryprodect",
		      	"subCategoryprodect/<id:\d+>" =>"prodect/subCategoryprodect",
		     	"prodects/<id:\d+>/<idcategory:\d+>" =>"prodect/prodects",
		   		"createProdect/<id:\d+>/<idcategory:\d+>" =>"prodect/createProdect",
		    	 "insertprodect" =>"prodect/insertprodect",
		    	  "reviewprodect/<id:\d+>" => "prodect/reviewProdect",
		      	 "editprodect/<id:\d+>" => "prodect/editProdect",
		         "deleteprodect/<id:\d+>" => "prodect/deleteProdect",
		  		   "updateprodect" => "prodect/updateprodect"
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