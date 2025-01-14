@extends('dashboard.master')

@section('content')
    <span >{{$category->id}}</span>
    <h1> {{ $category->title}}</h1>
   
    <div>
        {{$category->slug}}
    </div>
    
@endsection
