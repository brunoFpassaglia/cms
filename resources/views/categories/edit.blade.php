@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        Edit category
    </div>
    @include('layouts.errors')
    <div class="card-body">
        <form action="{{ route('categories.update', $category->id) }} " method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Category name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Save</button>
                <form id="form-category-delete{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </form>
    </div>
</div> 

@endsection