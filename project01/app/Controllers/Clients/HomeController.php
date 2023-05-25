<?php

namespace App\Controllers\Clients;

use App\Models\Post;
use Core\Controller;

class HomeController extends Controller
{
    private $post = null;

    public function __construct()
    {
        $this->post = new Post();
    }
    public function index()
    {
        $posts = $this->post->getPosts([], false);
        $links = $this->post->links($posts, true);
        $posts = $posts['data'];
        $pageTitle = "Trang chủ";
        $this->view('clients/home/index', compact('posts', 'links', 'pageTitle'));
    }
}
