    <div class="bg-white mt-2">
        {{-- aca se cambia el titulo antes de imprimir, por eso se llama al metodo changeTitle() --}}
        {{-- {{$changeTitle()}} --}}
        <h1>{{$post->title}}</h1>
        <span>{{$post->category->title}}</span>

    
        <hr>
        {{-- sirve para filtrar atributos, en donde key seria la condicional de que queres traer, es como una flecha en php--}}
        {{-- {{ $attributes->filter((fn($value, string $key) => $key == 'data-id')) }} --}}
    {{$post->content}}
    </div>