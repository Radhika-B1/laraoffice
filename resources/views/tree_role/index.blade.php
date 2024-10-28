@extends('layouts.app')

@section('content')
    <table>
        <thead>
            <th>Name</th>
            <th>Cat</th>
        </thead>
        <tbody>
            @foreach ($cats as $cat)
                <td>{{$cat->name}}</td>
                <td>

                    @foreach ($cat->ancestors as $parent)
                        {{$parent->name}}
                    @endforeach
                </td>
            @endforeach
        </tbody>
    </table>
@endsection