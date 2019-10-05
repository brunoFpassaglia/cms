@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">posts</div>
    @include('layouts.errors')
    <div class="card card-body"> 
        <table class="table">
            <thead>
                <th>Name</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>
                        <a href=" {{route('posts.edit', $post)}} ">{{ $post->name }}</a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <div class="mb-3">
            <a href="{{ route('posts.create') }}" class="btn btn-success float-left">Add a post</a>
        </div>
    </div>
</div>

@endsection