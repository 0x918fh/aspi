<?php
return array(
	'language' => 'ru',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'АСПИ. Автоматизированная Система Проведения Инвентаризации',
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	
	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'nediver',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),
	
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
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
		),


		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=aspi',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'nediver',
			'charset' => 'utf8',
			// включаем профайлер
			'enableProfiling'=>true,
			// показываем значения параметров
			'enableParamLogging' => true,
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CWebLogRoute',
					'levels'=>'error, warning, trace, profile, info',
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
);
