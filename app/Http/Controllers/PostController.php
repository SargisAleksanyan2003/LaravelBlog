<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

use \Cache;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::find(1);
        $category = Category::find(1);

       dd($posts->tags);
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
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories','tags'));
    }

    public function update(Post $post)
    {
        $data = \request()->validate([
            'title' => 'string',
            'text' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' =>''

        ]);
       // dd($data);

        $tags = $data['tags'];

        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return view('post.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        Post::find($post->id)->delete();
        return redirect()->route('post.index');
    }
}
