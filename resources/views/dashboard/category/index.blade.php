@extends('dashboard.master')

@section('content')
    <a href="{{route('category.create')}}" target="_blank">Create</a>
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
                    Slug
                </td>
                
            </tr>
            
        </thead>
        <tbody>
            
            @foreach ($category as $c)
                <tr>
                    <td>
                        {{$c ->id}}
                    </td>
                    <td>
                        {{$c ->title}}
                    </td>        
                    <td>
                        {{$c ->slug}}
                    </td>
                    
                    <td>
                        <a href="{{route('category.edit',$c->id)}}">Modificar</a>
                        <a href="{{route('category.show',$c->id)}}">Mostrar</a>
                        <form action="{{route('category.destroy',$c->id)}}" method="post">
                            @method('DELETE')    
                            @csrf
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                    

                </tr>

                    @endforeach
                
        </tbody>
    </table>
  
    {{$category ->links()}}
@endsection