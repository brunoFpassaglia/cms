@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">posts</div>
    @include('layouts.errors')
    <div class="card card-body"> 
        <table class="table">
            <thead>
                <th>Title</th>
                <th>Description</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>
                        <a href=" {{route('posts.edit', $post)}} ">{{ $post->title }}</a>
                    </td>
                    <td>
                        {{ $post->description }}
                    </td>
                    <td>
                        <button onclick="deleteHandle({{$post->id}})" class="btn btn-danger btn-sm" role="button" >Delete</button>
                        <form id="form-delete" action=" {{ route('posts.destroy', $post->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            @include('layouts.prompts')
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