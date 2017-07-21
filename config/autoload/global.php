<?php


return [
    'db' => [
        'driver'    => 'Pdo',
        'dsn'       => sprintf('sqlite:%s/data/kw-h.db', realpath(getcwd())),
    ],
];
