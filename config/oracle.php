<?php

return [
    'oracle' => [
        'driver'         => 'oracle',
        'tns'            => env('DB_TNS', ''),
        'host'           => env('DB_HOST', '158.129.51.67'),
        'port'           => env('DB_PORT', '1521'),
        'database'       => env('DB_DATABASE', 'STUD'),
        'username'       => env('DB_USERNAME', 'iris'),
        'password'       => env('DB_PASSWORD', 'sportas_0105'),
        'charset'        => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'         => env('DB_PREFIX', ''),
        'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
        'edition'        => env('DB_EDITION', 'ora$base'),
        'server_version' => env('DB_SERVER_VERSION', '12c'),
    ],
];
