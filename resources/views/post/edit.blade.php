@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('post.update', $post->id)}}" method="POST">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="Title"
                       value="{{$post->title}}">
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Text</label>
                <textarea type="text" name="content" class="form-control" id="text" aria-describedby="Text">
                    {{$post->content}}
                </textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="text" name="image" class="form-control" id="image" aria-describedby="Title"
                       value="{{$post->image}}">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">category</label>
                <select id="category" class="form-select" name="category_id">
                    @foreach($categories as $category)
                        <option
                                {{$category->id === $post->category->id ? 'selected': ' '}}
                                value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">tags</label>
                <select multiple id="tags" class="form-select" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                                @foreach($post->tags as $postTag)
                                    {{$tag->id === $postTag->id ? 'selected': ' '}}
                                @endforeach
                                value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
