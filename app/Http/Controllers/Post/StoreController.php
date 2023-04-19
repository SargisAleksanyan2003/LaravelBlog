<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Request\Post\StoreRequest;
use App\Models\Post;
use App\Models\PostTag;
use Cache;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('post.index');
    }
}
