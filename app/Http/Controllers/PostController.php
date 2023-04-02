<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\Translation\PseudoLocalizationTranslator;
use \Cache;

class PostController extends Controller
{
    //
    public function index()
    {
        $categories = Category::find(1);
        $posts = Post::find(1);
        dd($posts->category);
        return view('post.posts', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = \request()->validate([
            'title' => 'string',
            'text' => 'string',
            'image' => 'string'
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = \request()->validate([
            'title' => 'string',
            'text' => 'string',
            'image' => 'string'
        ]);
        $post->update($data);
        return view('post.show', compact('post'));

    }

    public function destroy(Post $post)
    {
        Post::find($post->id)->delete();
        return redirect()->route('post.index');

    }
}

