<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>Yii::t('admin','Backend Admin System'),

	// preloading 'log' component
	'preload'=>array('log'),
	'timeZone'=>'Asia/Chongqing',
     //   'theme'=>'classic',
	'sourceLanguage'=>'en_us',
	'language'=>'zh_cn',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.modules.rights.*',
                'application.modules.rights.components.*',
	//	'application.modules.srbac.controllers.SBaseController',
        //        'application.modules.srbac.models.Assignments',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'19830322',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
		//	'ipFilters'=>array('127.0.0.1','::1'),
		),

		'webshop',
                'rights'=>array(
                    'superuserName'=>'Admin',
                    'authenticatedName'=>'Authenticated',
                    'userClass'=>'Users',
                    'userIdColumn'=>'user_id',
                    'userNameColumn'=>'user_name',
                    'enableBizRule'=>true,
                    'enableBizRuleData'=>false,
                    'displayDescription'=>true,
                    'flashSuccessKey'=>'RightsSuccess',
                    'flashErrorKey'=>'RightsError',
                    'install'=>true,
                    'baseUrl'=>'/rights',
                    'layout'=>'rights.views.layouts.main',
                    'appLayout'=>'application.views.layouts.main',
                    'cssFile'=>'rights.css',
                    'install'=>false,
                    'debug'=>true,
                ),
	),
	// application components
	'components'=>array(
		'user'=>array(
			'class'=>'RWebUser',
                        'loginUrl'=>array('site/login'),
			// enable cookie-based authentication
		//	'class'=>'userGroups.components.WebUserGroups',
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
	
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
			'showScriptName'=>false,
		//	'showScriptName'=>false,
		),
		'authManager'=>array(
  			// Path to SDbAuthManager in srbac module if you want to use case insensitive
   			//access checking (or CDbAuthManager for case sensitive access checking)
  			//'class'=>'application.modules.srbac.components.SDbAuthManager',
                        'class'=>'RDbAuthManager',
  			// The database component used
  			'connectionID'=>'db',
  			// The itemTable name (default:authitem)
  			'itemTable'=>'auth_items',
  			// The assignmentTable name (default:authassignment)
  			'assignmentTable'=>'auth_assignments',
  			// The itemChildTable name (default:authitemchild)
  			'itemChildTable'=>'auth_itemchildren',
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=outlets',
			'emulatePrepare' => true,
		//	'username' => 'dbshine',
		//	'password' => 'a7r424e3fg6mx3dY9',
			'username'=>'root',
			'password'=>'123456',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
                                array(
                                        'class'=>'CDbLogRoute',
                                        'levels'=>'info',
                                        'connectionID'=>'db',
                                        'logTableName'=>'sys_logs',
                                ),
				/*
				array('class'=>'CWebLogRoute',
    				'categories'=>'system.db.CDbCommand',
    				'showInFireBug'=>true,
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
        'params'=>include(dirname(__FILE__).'/params.php'),
);
