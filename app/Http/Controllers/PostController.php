<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Symfony\Component\Translation\PseudoLocalizationTranslator;
use \Cache;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();

        return view('post.posts', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = \request()->validate([
            'title' => 'string',
            'text' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);


        $tags = $data['tags'];


        unset($data['tags']);

        $post = Post::create($data);
        $post->tags()->attach($tags);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post)
    {
        $data = \request()->validate([
            'title' => 'string',
            'text' => 'string',
            'image' => 'string',
            'category_id' => ''

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
