@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">Users</div>
    @include('layouts.errors')
    <div class="card card-body"> 
        <table class="table">
            <thead>
                <th>Name</th>
                <th>E-mail</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                        {{$user->name}}
                    </td>
                <td>{{$user->email}}</td>
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