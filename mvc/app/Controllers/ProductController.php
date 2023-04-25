<?php

namespace App\Controllers;

use Core\View;
use Core\Request;
use Core\Session;
use Core\Validator;
use Core\Controller;
use App\Models\Products;

class ProductController extends Controller
{
    public function index()
    {
        //Load Model

        //Xử lý logic
        //echo 'Danh sách sản phẩm';

        $productModel = new Products();
        $products = $productModel->getProducts();

        $title = 'Unicode Academy';

        $content = '<h3>Nội duing bài viết</h3>';

        //Gọi view
        //$this->view('products/index', compact('products', 'title', 'content'));
        View::render('products/index', compact('products', 'title', 'content'));
    }

    public function add(Request $request)
    {

        $this->view('products/add');
    }

    public function handleAdd(Request $request)
    {
        //tên trường => danh sách rules
        $rules = [
            'name' => 'required|min:5|max:15',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password'
        ];

        //Tên rule => nội dung thông báo
        $messages = [
            'required' => ":attribute không được để trống",
            'min' => ':attribute phải từ :min ký tự',
            'max' => ':attribute không được lớn hơn :max ký tự',
            'email' => ':attribute không đúng định dạng email',
            'same' => ':attribute không khớp với mật khẩu'
        ];

        $attributes = [
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'confirm_password' => 'Nhập lại mật khẩu'
        ];

        // $validator = Validator::make(
        //     $request->all(),
        //     $rules,
        //     $messages,
        //     $attributes
        // );

        // if ($validator->fails()) {
        //     redirect('/san-pham/them');
        // } else {
        //     echo 'Validate thành công';
        //     //Thực hiện thêm vào database
        // }

        $request->validate($rules, $messages, $attributes);
        //Nếu passes phương thức validate => Chạy đoạn code phía dưới
        //Nếu fails => Back về request trước đó

        return 'Submit';


    }

    public function edit(Request $request, $id, $slug)
    {
        echo 'Sửa sản phẩm: '.$id.' - '.$slug;
    }
}