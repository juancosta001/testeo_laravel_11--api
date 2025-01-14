@extends('dashboard.master')

@section('content')
    <a  class="btn btn-primary my-3" href="{{route('category.create')}}" target="_blank">Create</a>
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
                    Slug
                </th>
                <th>
                    Options
                </th>
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
                        <a class="btn btn-success mt-2" href="{{route('category.edit',$c->id)}}">Modificar</a>
                        <a class="btn btn-success mt-2" href="{{route('category.show',$c->id)}}">Mostrar</a>
                        <form action="{{route('category.destroy',$c->id)}}" method="post">
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
    {{$category ->links()}}
@endsection