<?php

namespace App\Controllers\Clients;

use App\Models\Post;
use App\Models\User;
use Core\Controller;
use App\Models\Category;

class PostController extends Controller
{
    private $post = null;
    private $user = null;
    private $category = null;

    public function __construct()
    {
        $this->post = new Post();
        $this->user = new User();
        $this->category = new Category();
    }

    public function detail($slug)
    {
        $post = $this->post->getPost('slug', $slug);

        if (isset($post->scalar)) {
            abort(404);
        }

        $pageTitle = $post->title;
        $user = $this->user->getUser('id', $post->user_id);
        $category = $this->category->getCategory('id', $post->category_id);

        $this->view('clients/posts/detail', compact('post', 'pageTitle', 'user', 'category'));
    }
}
