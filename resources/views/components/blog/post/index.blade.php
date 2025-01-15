<div>
    Listado
    <br>
    @if (isset($head))
    <h1>{{$head}}</h1>
    @endif
    
    @foreach ($posts as $p)
        <div class="bg-white mt-2">
            <h3>{{$p ->title}}</h3>

            <a href={{route('blog.show', $p)}}>Ir</a>

            <p>{{$p->description}}</p>
        </div>
    @endforeach

    {{$footer}}
    <br>
    {{$posts ->links()}}
</div>