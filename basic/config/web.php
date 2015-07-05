<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'modules' => [
		'admin' => [
            'class' => 'app\modules\admin\admin',
			'modules' => [
				'contents' => [
					'class' => 'app\modules\admin\modules\contents\contents',
				],
			],
        ],
		'blog' => [
            'class' => 'app\modules\blog\blog',
        ],
		'oauth' => [
            'class' => 'app\modules\oauth\oauth',
        ],
        
	],
    'components' => [
		 'formatter' => [
				'dateFormat' => 'dd.MM.yyyy',
				'decimalSeparator' => ',',
				'thousandSeparator' => ' ',
		   ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'bcpfycMrUMScbTtM8dijTPHoA89xQV9p',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
		'urlManager' => [
               'enablePrettyUrl' => true,
               'showScriptName' => false,
			    'rules' => [
					'module/<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
				],
		],
		
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
