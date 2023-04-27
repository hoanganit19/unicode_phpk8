<?php

namespace App\Models;

use Core\Model;

class Products extends Model
{
    //Đọc dữ liệu từ database
    public function getProducts()
    {
        return $this->get('SELECT * FROM district');
    }
}
