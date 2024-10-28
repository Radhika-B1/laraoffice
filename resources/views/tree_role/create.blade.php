@extends('layouts.app')

@section('content')
<form action="{{route('admin.treerole.save')}}" method="post">
    @csrf
<div class="flex">
    <div>
        <label for="">Name</label>
        <input class="form-control" type="text" name="name">
    </div>
    <div>
        <label for="">Category</label>
        <select name="parent" id="" class="form-control">
            @foreach ($categories as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<button type="submit">Submit</button>


</form>


@endsection