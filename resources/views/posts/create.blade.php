@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        Create post
    </div>
    @include('layouts.errors')
    <div class="card-body">
        <form action="{{ route('posts.store') }} " method="POST">
            @csrf
            <div class="form-group">
                <label for="name">post name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success mb-3">Save</button>
            </div>
        </form>
    </div>
</div> 

@endsection