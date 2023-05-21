<?php

namespace App\Controllers\Admin;

use Core\Request;
use Core\Session;
use App\Core\Auth;
use Carbon\Carbon;
use Core\Validator;
use App\Models\Page;
use Core\Controller;

class PageController extends Controller
{
    private $page = null;
    public function __construct()
    {
        $this->page = new Page();
    }

    public function index(Request $request)
    {
        $pageTitle = 'Danh sách trang';
        $msg = Session::getFlash('msg');

        $filters = [];

        if ($request->query) {
            $filters[''] = "title LIKE '%{$request->query}%' OR content LIKE '%{$request->query}%'";
        }

        //status = 1 AND (email LIKE '%%' OR name LIKE '%%')

        $pages = $this->page->getPages($filters);

        $links = $this->page->links($pages, true);

        $pages = $pages['data'];

        $this->view('admin/pages/lists', compact('pageTitle', 'msg', 'pages', 'links'));
    }

    public function add()
    {
        $pageTitle = 'Thêm trang';
        $msg = Session::getFlash('msg');
        $this->view('admin/pages/add', compact('pageTitle', 'msg'));
    }

    public function handleAdd(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:pages,slug',
            'content' => 'required'
          ], [
              'required' => ':attribute không được để trống',
              'unique' => ':attribute đã tồn tại'
          ], [
              'title' => 'Tiêu đề',
              'slug' => 'Slug',
              'content' => 'Nội dung'
          ]);

        //Xử lý thêm
        $attributes = [
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        $this->page->addPage($attributes);

        Session::put('msg', 'Thêm trang thành công');

        redirect(route('admin.pages.index'));
    }

    public function edit($id)
    {
        $pageTitle = 'Sửa trang';
        $msg = Session::getFlash('msg');
        $page = $this->page->getPage('id', $id);
        $this->view('admin/pages/edit', compact('pageTitle', 'msg', 'page'));
    }

    public function handleEdit(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:pages,slug,'.$id,
            'content' => 'required'
          ], [
              'required' => ':attribute không được để trống',
              'unique' => ':attribute đã tồn tại'
          ], [
              'title' => 'Tiêu đề',
              'slug' => 'Slug',
              'content' => 'Nội dung'
          ]);

        //Update

        $attributes = [
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'updated_at' => Carbon::now()
        ];


        $this->page->updateById($attributes, $id);

        Session::put('msg', 'Cập nhật trang thành công');

        redirect(route('admin.pages.edit', ['id' => $id]));

    }

    public function delete($id)
    {
        $this->page->deletePage($id);
        Session::put('msg', 'Xóa trang thành công');

        redirect(route('admin.pages.index'));
    }

    public function deletes(Request $request)
    {
        if ($request->ids) {
            $this->page->deletePages($request->ids);
            Session::put('msg', 'Xóa trang thành công');
            redirect(route('admin.pages.index'));
        }
    }
}

//Where id in(1,4,6)
