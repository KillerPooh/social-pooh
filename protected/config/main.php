<?php
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Social-pooh',

	'preload'=>array('log'),

	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.modules.rights.*',
        'application.modules.rights.models.*',
        'application.modules.rights.components.*',
	),

	'modules'=>array(
        'rights',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1',
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	'components'=>array(
        'user'=>array(
            'class'=>'RWebUser',
            'allowAutoLogin'=>true,
            'loginUrl'=>array('/site/login'),
        ),
        'authManager'=>array(
            'class'=>'RDbAuthManager',
            'defaultRoles'=>array('Guest','Authenticated','Admins'),
            'connectionID'=>'db',
            'itemTable'=>'authitem',
            'itemChildTable'=>'authitemchild',
            'assignmentTable'=>'authassignment',
            'rightsTable'=>'rights',
        ),
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(
                ''=>'news/index',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=social-pooh',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),

		'errorHandler'=>array(
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
					'class'=>'CWebLogRoute',
				),

			),
		),
	),

	'params'=>array(
		'adminEmail'=>'webmaster@example.com',
        'rights'=>array(
            'test',
        )
	),
);