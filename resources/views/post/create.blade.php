@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('post.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="Title"
                       value="{{ old('title') }}">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Text</label>
                <textarea value="" type="text" name="content" class="form-control" id="text"
                          aria-describedby="Text">{{ old('text') }}</textarea>
                @error('text')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="text" value="{{ old('image') }}" name="image" class="form-control" id="image"
                       aria-describedby="Title">
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">category</label>
                <select id="category" class="form-select" name="category_id">
                    @foreach($categories as $category)
                        <option {{( old('category_id') == $category->id ? 'selected' : "" )}}
                                value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">tags</label>
                <select multiple id="tags" class="form-select" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection