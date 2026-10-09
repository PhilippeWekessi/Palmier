<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::published()->latest('published_at')->paginate(6);

        return view('pages.posts.index', compact('posts'));
    }

    public function show(Post $post): View
    {
        abort_unless($post->status === Post::STATUS_PUBLISHED, 404);

        return view('pages.posts.show', compact('post'));
    }
}
