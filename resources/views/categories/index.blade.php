@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">Categories</div>
    @include('layouts.errors')
    <div class="card card-body"> 
        <table class="table">
            <thead>
                <th>Name</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>
                        <a href=" {{route('categories.edit', $category)}} ">{{ $category->name }}</a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <div class="mb-3">
            <a href="{{ route('categories.create') }}" class="btn btn-success float-left">Add a category</a>
        </div>
    </div>
</div>
@endsection