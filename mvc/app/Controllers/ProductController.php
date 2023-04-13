<?php

namespace App\Controllers;

class ProductController
{
    public function index()
    {
        //Load Model

        //Xử lý logic
        echo 'Danh sách sản phẩm';

        //Gọi view
    }

    public function add()
    {
        echo 'Thêm sản phẩm';
    }

    public function edit($id, $slug)
    {
        echo 'Sửa sản phẩm: '.$id.' - '.$slug;
    }
}
