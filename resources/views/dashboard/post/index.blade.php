@extends('dashboard.master')

@section('content')
    <a class="btn btn-primary my-3" href="{{route('post.create')}}" target="_blank">Create</a>
   @include('dashboard/fragment/_errors-form')
    <table class="table">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Title
                </th>
                <th>
                    Posted
                </th>
                <th>
                    Category
                </th>
                <th>
                    Options
                </th>
            </tr>
            
        </thead>
        <tbody>
            
            @foreach ($posts as $p)
                <tr>
                    <td>
                        {{$p ->id}}
                    </td>
                    <td>
                        {{$p ->title}}
                    </td>        
                    <td>
                        {{$p ->posted}}
                    </td>
                    <td>
                        {{$p ->category->title}}
                    </td>
                    <td>
                        <a class="btn btn-success my-2" href="{{route('post.edit',$p->id)}}">Modificar</a>
                        <a  class="btn btn-success my-2" href="{{route('post.show',$p->id)}}">Mostrar</a>
                        <form action="{{route('post.destroy',$p->id)}}" method="post">
                            @method('DELETE')    
                            @csrf
                            <button class="btn btn-danger" type="submit">Borrar</button>
                        </form>
                    </td>
                    

                </tr>

                    @endforeach
                
        </tbody>
    </table>
    <div class="mt-2">

    </div>
    {{$posts ->links()}}
  
    
@endsection