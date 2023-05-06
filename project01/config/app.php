<?php

use App\Middlewares\AuthMiddleware;
use App\Middlewares\GuestMiddleware;

return [
    'timezone' => 'Asia/Ho_Chi_Minh',
    'middleware' => [
        AuthMiddleware::class,
        GuestMiddleware::class
    ]
];