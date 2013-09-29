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
		'geoip' => array(
          'class' => 'application.extensions.geoip.CGeoIP',
          
          // Choose MEMORY_CACHE or STANDARD mode
          'mode' => 'STANDARD',
      ),
		
		
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
					
					"index"=>"Main/Index",
					 "subcatgorys/<id:\d+>" =>"Main/SubCatgorys",
					"prodects/<id:\d+>" =>"Main/Prodects",
					"shops" =>"Main/Shops",
					"viewshop/<id:\d+>" =>"Main/ViewShop",
					"direction" =>"Main/Direction",
					"shop/<id:\d+>" =>"Main/Shop",
					
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