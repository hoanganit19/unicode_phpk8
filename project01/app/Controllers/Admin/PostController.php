<?php

namespace App\Controllers\Admin;

use Core\Request;
use Core\Session;
use App\Core\Auth;
use Carbon\Carbon;
use Core\Validator;
use App\Models\Post;
use Core\Controller;
use App\Models\Category;

class PostController extends Controller
{
    private $post = null;
    private $category = null;
    public function __construct()
    {
        $this->post = new Post();
        $this->category = new Category();
    }

    public function index(Request $request)
    {
        $pageTitle = 'Danh sách bài viết';
        $msg = Session::getFlash('msg');

        $filters = [];

        if ($request->query) {
            $filters[''] = "title LIKE '%{$request->query}%' OR content LIKE '%{$request->query}%'";
        }

        //status = 1 AND (email LIKE '%%' OR name LIKE '%%')

        $posts = $this->post->getPosts($filters);

        $links = $this->post->links($posts, true);

        $posts = $posts['data'];

        $this->view('admin/posts/lists', compact('pageTitle', 'msg', 'posts', 'links'));
    }

    public function add()
    {
        $pageTitle = 'Thêm bài viết';
        $msg = Session::getFlash('msg');
        $categories = $this->category->getAllCategories();
        $this->view('admin/posts/add', compact('pageTitle', 'msg', 'categories'));
    }

    public function handleAdd(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'content' => 'required',
            'thumbnail' => 'required',
            'category_id' => 'required'
          ], [
              'required' => ':attribute không được để trống',
              'unique' => ':attribute đã tồn tại'
          ], [
              'title' => 'Tiêu đề',
              'slug' => 'Slug',
              'content' => 'Nội dung',
              'thumbnail' => 'Ảnh đại diện',
              'category_id' => 'Chuyên mục'
          ]);

        //Xử lý thêm
        $attributes = [
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            'thumbnail' => $request->thumbnail,
            'excerpt' => $request->excerpt,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        $this->post->addPost($attributes);

        Session::put('msg', 'Thêm bài viết thành công');

        redirect(route('admin.posts.index'));
    }

    public function edit($id)
    {
        $pageTitle = 'Sửa trang';
        $msg = Session::getFlash('msg');
        $post = $this->post->getPost('id', $id);
        $categories = $this->category->getAllCategories();
        $this->view('admin/posts/edit', compact('pageTitle', 'msg', 'post', 'categories'));
    }

    public function handleEdit(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,'.$id,
            'content' => 'required',
            'thumbnail' => 'required',
            'category_id' => 'required'
          ], [
              'required' => ':attribute không được để trống',
              'unique' => ':attribute đã tồn tại'
          ], [
              'title' => 'Tiêu đề',
              'slug' => 'Slug',
              'content' => 'Nội dung',
              'thumbnail' => 'Ảnh đại diện',
              'category_id' => 'Chuyên mục'
          ]);

        //Update

        $attributes = [
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'thumbnail' => $request->thumbnail,
            'excerpt' => $request->excerpt,
            'updated_at' => Carbon::now()
        ];


        $this->post->updateById($attributes, $id);

        Session::put('msg', 'Cập nhật bài viết thành công');

        redirect(route('admin.posts.edit', ['id' => $id]));

    }

    public function delete($id)
    {
        $this->post->deletePost($id);
        Session::put('msg', 'Xóa bài viết thành công');

        redirect(route('admin.posts.index'));
    }

    public function deletes(Request $request)
    {
        if ($request->ids) {
            $this->post->deletePosts($request->ids);
            Session::put('msg', 'Xóa bài viết thành công');
            redirect(route('admin.posts.index'));
        }
    }
}

//Where id in(1,4,6)
