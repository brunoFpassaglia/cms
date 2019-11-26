@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        Edit tag
    </div>
    @include('layouts.errors')
    <div class="card-body">
        <form id="form-save" action="{{ route('tags.update', $tag->id) }} " method="POST">
            
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Tag name</label>
                <input type="text" class="form-control" name="name" value="{{ $tag->name}}">
            </div>
            <button type="submit" class="btn btn-success" form="form-save">Save</button>
            <a onclick="deleteHandle({{ $tag->id }})" class="btn btn-danger" >Delete</a>
        </form>
        <form id="form-delete" action=" {{ route('tags.destroy', $tag->id) }}" method="POST">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            @include('layouts.prompts')
      </form>
    </div>
</div> 

@endsection

