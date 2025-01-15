
@extends('blog.master')

@section('content')

    {{-- <x-card :bg="true" class="card bg-green-300"> 
        Contenido Dinamico
    </x-card>
    <x-card class="card bg-green-300" data-test=""> 
        Contenido Dinamico
    </x-card> --}}


    <x-blog.show :post="$post" data-id="1" class="demo" > </x-blog.show>
    {{-- <x-dynamic-component component='blog.show' :post="$post"> </x-dynamic-component> --}}
    {{-- de esta manera se cargan los componentes de manera dinamicas --}}
@endsection