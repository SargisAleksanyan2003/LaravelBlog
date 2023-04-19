<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTag;
use Cache;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::paginate(10);
        return view('post.posts', compact('posts'));
    }
}
