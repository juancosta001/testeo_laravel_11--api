
@extends('blog.master')

@section('content')
    <x-blog.post.index :posts='$posts'> 
        @slot('head')
            <H1>Listado de Publicaciones</H1>
        @endslot
        @slot('footer')
            <footer> 
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis provident fugit ea consequuntur quibusdam, eveniet sed cum necessitatibus dicta numquam sint facilis deserunt perspiciatis laudantium minima accusantium illum. Deleniti, quam!
            </footer>
        @endslot
    </x-blog.post.index>
@endsection