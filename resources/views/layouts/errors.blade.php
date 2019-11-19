@if (session()->has('success'))
    <div class="alert alert-success">
        <ul class="list-group">
            <li class="list-group-item">
                {{ session()->get('success')}}
            </li>
        </ul>
    </div>
@endif
@if (session()->has('warnings'))
    <div class="alert alert-danger">
        <ul class="list-group">
            <li class="list-group-item">
                {{ session()->get('warnings')}}
            </li>
        </ul>
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