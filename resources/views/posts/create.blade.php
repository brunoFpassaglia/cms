@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        {{ isset($post) ? 'Edit Post' : 'Create Post'}}
    </div>
    @include('layouts.errors')
    <div class="card-body">
        <form action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }} " method="POST" enctype="multipart/form-data">
            @if (isset($post))
            @method('PUT')
            @endif
            @csrf
            <div class="form-group">
                <label for="title">Post title</label>
                <input type="text" class="form-control" name="title" value=" {{isset($post) ? $post->title : '' }}">
                <label for="title">Post description</label>
                <textarea type="text" class="form-control" name="description" > {{isset($post) ? $post->description : '' }}</textarea>
                <label for="text">Content</label>
                <textarea type="text" class="form-control" name="content">{{isset($post) ? $post->content : '' }}</textarea>
                <label for="text">Image</label>
                <input type="file" class="form-control" name="image">
                <label for="text">Category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }} " @if (isset($post))
                        selected
                        @endif>{{ $category->name }}
                    </option>
                    @endforeach
                </select>
                <label for="tags">Tags</label>
                <select name="tags[]" id="tags" multiple class="form-control">
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
                
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success mb-3">Save</button>
            </div>
        </form>
    </div>
</div> 

@endsection