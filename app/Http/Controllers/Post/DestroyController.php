<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTag;
use Cache;

class DestroyController extends BaseController
{
    public function __invoke(Post $post)
    {
        Post::find($post->id)->delete();
        return redirect()->route('post.index');
    }
}
