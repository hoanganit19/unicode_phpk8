<?php

namespace App\Controllers;

use Core\View;
use Core\Request;
use Core\Controller;
use App\Models\Products;

class ProductController extends Controller
{
    public function index()
    {
        //Load Model

        //Xử lý logic
        //echo 'Danh sách sản phẩm';

        $products = Products::all(); //Đọc dữ liệu từ model

        $title = 'Unicode Academy';

        $content = '<h3>Nội duing bài viết</h3>';

        //Gọi view
        //$this->view('products/index', compact('products', 'title', 'content'));
        View::render('products/index', compact('products', 'title', 'content'));
    }

    public function add(Request $request)
    {
        echo $request->keyword.'<br/>';
        $this->view('products/add');
    }

    public function handleAdd(Request $request)
    {

        var_dump($request->email);
        var_dump($request->password);
        $request->abc = 'abc';
        var_dump($request->abc);

        return 'Submit';
    }

    public function edit($id, $slug)
    {
        echo 'Sửa sản phẩm: '.$id.' - '.$slug;
    }
}
