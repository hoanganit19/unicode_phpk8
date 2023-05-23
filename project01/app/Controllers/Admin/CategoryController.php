<?php

namespace App\Controllers\Admin;

use Core\Request;
use Core\Session;
use App\Core\Auth;
use Carbon\Carbon;
use Core\Validator;
use App\Models\Category;
use Core\Controller;

class CategoryController extends Controller
{
    private $category = null;
    public function __construct()
    {
        $this->category = new Category();
    }

    public function index(Request $request)
    {
        $pageTitle = 'Danh sách chuyên mục';
        $msg = Session::getFlash('msg');

        $filters = [];

        if ($request->query) {
            $filters[''] = "name LIKE '%{$request->query}%'";
        }
        //status = 1 AND (email LIKE '%%' OR name LIKE '%%')

        //$categories = $this->category->getCategories($filters);

        //$links = $this->category->links($categories, true);

        //$categories = $categories['data'];

        $categories = $this->category->getAllCategories();

        $this->view('admin/categories/lists', compact('pageTitle', 'msg', 'categories'));
    }

    public function add()
    {
        $pageTitle = 'Thêm chuyên mục';
        $msg = Session::getFlash('msg');
        $categories = $this->category->getAllCategories();
        $this->view('admin/categories/add', compact('pageTitle', 'msg', 'categories'));
    }

    public function handleAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
          ], [
              'required' => ':attribute không được để trống',
          ], [
              'name' => 'Tên chuyên mục',
              'slug' => 'Slug'
          ]);

        //Xử lý thêm
        $attributes = [
            'name' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'parent_id' => $request->parent_id == 0 ? null : $request->parent_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        $this->category->addCategory($attributes);

        Session::put('msg', 'Thêm chuyên mục thành công');

        redirect(route('admin.categories.index'));
    }

    public function edit($id)
    {
        $pageTitle = 'Sửa chuyên mục';
        $msg = Session::getFlash('msg');
        $category = $this->category->getCategory('id', $id);
        $categories = $this->category->getAllCategories();
        $this->view('admin/categories/edit', compact('pageTitle', 'msg', 'category', 'categories', 'id'));
    }

    public function handleEdit(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$id,
          ], [
              'required' => ':attribute không được để trống',
          ], [
              'name' => 'Tên chuyên mục',
              'slug' => 'Slug'
          ]);

        //Update

        $attributes = [
            'name' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'parent_id' => $request->parent_id == 0 ? null : $request->parent_id,
            'updated_at' => Carbon::now()
        ];

        $this->category->updateById($attributes, $id);

        Session::put('msg', 'Cập nhật chuyên mục thành công');

        redirect(route('admin.categories.edit', ['id' => $id]));

    }

    public function delete($id)
    {
        if ($this->category->getChildren($id) == 0) {
            $this->category->deleteCategory($id);
            Session::put('msg', 'Xóa chuyên mục thành công');
        } else {
            Session::put('msg', 'Vui lòng xóa các chuyên mục con');
        }

        redirect(route('admin.categories.index'));
    }

    public function deletes(Request $request)
    {
        if ($request->ids) {
            $this->category->deletePages($request->ids);
            Session::put('msg', 'Xóa chuyên mục thành công');
            redirect(route('admin.categories.index'));
        }
    }
}

//Where id in(1,4,6)
