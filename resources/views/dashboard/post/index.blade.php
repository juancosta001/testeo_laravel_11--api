@extends('dashboard.master')

@section('content')
    <a href="{{route('post.create')}}" target="_blank">Create</a>
   @include('dashboard/fragment/_errors-form')
    <table>
        <thead>
            <tr>
                <td>
                    ID
                </td>
                <td>
                    Title
                </td>
                <td>
                    Posted
                </td>
                <td>
                    Category
                </td>
                <td>
                    Options
                </td>
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
                        <a href="{{route('post.edit',$p->id)}}">Modificar</a>
                        <a href="{{route('post.show',$p->id)}}">Mostrar</a>
                        <form action="{{route('post.destroy',$p->id)}}" method="post">
                            @method('DELETE')    
                            @csrf
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                    

                </tr>

                    @endforeach
                
        </tbody>
    </table>
    {{$posts ->links()}}
  
    
@endsection