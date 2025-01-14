@if ($errors->any())
@foreach ($errors->all() as $e)
<ul> 
    {{$e}}    
</ul>
@endforeach
@endif