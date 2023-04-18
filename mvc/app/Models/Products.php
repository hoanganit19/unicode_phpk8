<?php

namespace App\Models;

class Products
{
    //Đọc dữ liệu từ database
    public static function all()
    {
        return [
            'Product 1',
            'Product 2',
            'Product 3'
        ];
    }
}
