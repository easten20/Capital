<?php
return [
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
        ]
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=capital',
            'username' => 'root',
            'password' => '',
           //'dsn' => 'mysql:host=localhost;dbname=timurweb_capital', // db and username www.timur.web.id
            //'username' => 'timurweb_capital',
            //'password' => 'P@ssw0rd',
           //'dsn' => 'mysql:host=localhost;dbname=capitale_canvas', // db and username www.capitalelectric.co.id
           //'username' => 'capitale_root',
           //'password' => 'capital',
           //'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mail.yahoo.com',
                'username' => 'priya_nugraha91@yahoo.com',
                'password' => '44444444',
                'port' => '465',
                'encryption' => 'ssl',
            ],
            'useFileTransport' => false,
        ],
        
    ],
];
