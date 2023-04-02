<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\Translation\PseudoLocalizationTranslator;

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

    public function update()
    {
        $post = Post::find(6);
        echo '<pre>';
        print_r($post);
        echo '</pre>';

        $post->update([
            'text' => 'another some interesting content',
            'image' => 'another some.jpg',
            'likes' => 50,
            'is_published' => 0,

        ]);
        dd($post->title);
    }

    public function delete()
    {
        Post::find(6)->delete();
    }

    public function firstOrCreate()
    {

        $myPost = Post::firstOrCreate([
            'title' => 'another post from phpstorm',
        ], [
            'title' => 'another post from phpstorm',
            'text' => 'another some interesting content',
            'image' => 'another some.jpg',
            'likes' => 50,
            'is_published' => 1,
        ]);
        dd($myPost);
    }

    public function updateOrCreate()
    {
        $myPost = Post::updateOrCreate([
            'title' => 'its not update post from phpstorm',
        ], [
            'title' => 'another not update post from phpstorm',
            'text' => 'another some interesting content',
            'image' => 'another some.jpg',
            'likes' => 10,
            'is_published' => 1,
        ]);
    }
}

