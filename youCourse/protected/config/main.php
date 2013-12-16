<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'My Web Application',

    'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
        'timepicker' => realpath(__DIR__ . '/../extensions/timepicker'),
    ),
    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'bootstrap.helpers.TbHtml',
        //user extension
        'application.modules.user.models.*',
        'application.modules.user.components.*'
    ),

    'modules'=>array(
        // uncomment the following to enable the Gii tool

        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'root',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
            //'ipFilters'=>array($_SERVER['REMOTE_ADDR']),
        ),

        //user extension
        'user'=>array(
            'tableUsers' => 'User',
            'tableProfiles' => 'tbl_profiles',
            'tableProfileFields' => 'tbl_profiles_fields',
        ),

        'cal' => array(
            'debug' => true // For first run only!
        ),

        'wdcalendar'    => array(
            'embed' => true,
            'wd_options' => array(
                'readonly' => 'JS:true' // execute JS
            )
        ),
        /*'gii' => array(
            'generatorPaths' => array('bootstrap.gii'),
        ), */
    ),

    // application components
    'components'=>array(
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
            'class'=>'application.components.WebUser',
            'loginUrl'=>array('/user/login'),
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		*/
        'db'=>array(
            'connectionString' => 'mysql:host=db4free.net;dbname=youcours',
            'emulatePrepare' => true,
            'username' => 'youcoursadmin',
            'password' => 'youcourswisproject',
            'charset' => 'utf8',
        ),
        /*'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=wis_project',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),*/

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
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				//*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);