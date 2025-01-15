
<br>

{{-- componente de tipo aviso --}}
@props(['type' => 'info', 'bg'])
{{-- este apartado es para unir los atributos, para que en el otro solo pongamos color pero siga el mismo estilo --}}
<div {{$attributes->class([ 'w-full border shadow-md rounded-md p-5',])}}>
    {{$slot}}
    

    {{-- {{$attributes->whereStartsWith('wire:model')}}
    {{$attributes->whereDoesntStartsWith('wire:model')}} --}}
</div>