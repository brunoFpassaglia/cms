@if (session()->has('success'))
    <div class="alert alert-succes">
        {{ session()->get('success')}}
    </div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-group">
        @foreach ($errors->all() as $error)
        <li class="list-group-item">{{ $error }}</li>   
        @endforeach
    </ul>
</div>
@endif