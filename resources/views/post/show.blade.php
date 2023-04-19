@extends('layouts.main')
@section('content')
    <div>
        <div>{{$post->id}}/{{$post->title}}</div>
        <div> {{$post->content}} </div>
    </div>
    <div>
        <a href="{{route('post.index')}}" class="btn btn-primary mt-2">Back</a>
        <br>
        <a href="{{route('post.edit', $post->id)}}" class="btn btn-primary mt-2">Update</a>
        <br>
        <form action="{{route('post.delete', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <input class="btn btn-danger mt-2" type="submit" value="delete">
        </form>
    </div>
@endsection
