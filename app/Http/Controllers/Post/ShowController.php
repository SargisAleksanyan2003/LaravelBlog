<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTag;
use Cache;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        return view('post.show', compact('post'));
    }
}
