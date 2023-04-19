<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Request\Post\UpdateRequest;
use App\Models\Post;
use App\Models\PostTag;
use Cache;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        $this->service->update($post, $data);

        return view('post.show', compact('post'));
    }
}
