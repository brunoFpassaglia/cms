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
                        <button onclick="deleteHandle({{$post->id}})" class="btn btn-danger btn-sm" role="button" >
                            {{$post->trashed() ? 'Delete':'Trash'}}
                        </button>
                        <form id="form-delete" action=" {{ route('posts.destroy', $post->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            @include('layouts.prompts')
                        </form>
                    </td>
                    @if ($post->trashed())
                    <td>
                        <form action=" {{route('restorePosts', $post) }}" id="restore" method="POST">
                            @csrf
                            @method('PUT')                                
                            <button type="submit" class="button btn-light btn-sm" form="restore">Restore</button>
                        </form>
                    </td>
                    @endif
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