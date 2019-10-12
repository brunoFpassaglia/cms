@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        Create post
    </div>
    @include('layouts.errors')
    <div class="card-body">
        <form action="{{ route('posts.store') }} " method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Post title</label>
                <input type="text" class="form-control" name="title">
                <label for="title">Post description</label>
                <textarea type="text" class="form-control" name="description"></textarea>
                <label for="text">Content</label>
                <textarea type="text" class="form-control" name="content"></textarea>
                <label for="text">Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success mb-3">Save</button>
            </div>
        </form>
    </div>
</div> 

@endsection