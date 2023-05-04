<?php

return [
    'connection_default' => env('DB_CONNECTION', 'mysql'),
    'mysql' => [
        'driver' => 'mysql',
        'host' => env('DB_HOST', 'localhost'),
        'user' => env('DB_USER', 'root'),
        'password' => env('DB_PASSWORD', ''),
        'db_name' => env('DB_NAME', 'database')
    ]
];
