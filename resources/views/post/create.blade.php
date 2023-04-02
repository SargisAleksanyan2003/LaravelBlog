@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('post.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="Title">
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Text</label>
                <textarea type="text" name="text" class="form-control" id="text" aria-describedby="Text"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="text" name="image" class="form-control" id="image" aria-describedby="Title">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
