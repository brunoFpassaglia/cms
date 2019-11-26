@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">Tags</div>
    @include('layouts.errors')
    <div class="card card-body"> 
        <table class="table">
            <thead>
                <th>Name</th>
                <th># of posts</th>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>
                        <a href=" {{route('tags.edit', $tag)}} ">{{ $tag->name }}</a>
                    </td>
                <td>{{ $tag->posts->count() }}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <div class="mb-3">
            <a href="{{ route('tags.create') }}" class="btn btn-success float-left">Add a tag</a>
        </div>
    </div>
</div>
@endsection