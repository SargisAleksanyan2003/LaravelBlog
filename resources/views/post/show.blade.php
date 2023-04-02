@extends('layouts.main')
@section('content')
    <div>
        <div>{{$post->id}}/{{$post->title}}</div>
        <div>{{$post->text}}</div>
    </div>
    <div>
        <a href="{{route('post.index')}}" class="btn btn-primary mt-2">Back</a>
    </div>
@endsection
