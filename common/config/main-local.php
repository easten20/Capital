<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=cled',
            'username' => 'root',
            'password' => 'password',
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
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
