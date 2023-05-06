<?php

use App\Models\User;

return [

    'default' => 'admin',

    'admin' => [
        'model' => User::class
    ],

    'customer' => [
        //'model' => ''
    ]
];
