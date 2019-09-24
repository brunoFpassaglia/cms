@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('categories.create') }}" class="btn btn-success float-right">Add a category</a>
</div>
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
                        {{ $category->name }}
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection