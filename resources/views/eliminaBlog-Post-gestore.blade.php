@extends('layouts.stafLayout')


@section('title', 'Blog')

@section('content')
@isset($blog)


<p class="titolo">Informazioni generali</p>
<hr class="spaziaturahr">



<div style="text-align: center">
{{ Form::open(array('route' => ['eliminaBlogGestore', $blog], 'id'=>'eliminablog','class' => '')) }}          
    <div>
       
        {{ Form::label('motivo', 'Motivo Eliminazione', ['class' => 'label-input']) }}
        {{ Form::text('motivo', '', ['class' => 'input', 'id' => 'motivo', 'placeholder'=> 'Motivazione', 'size' => '105', 'maxlength' => '80']) }}
    </div>
    <br>
    <div>                
        {{ Form::submit('Elimina Blog ►', ['class' => 'bottone_conferma']) }}
    </div>
    {{ Form::close() }}
</div>

@endisset()

@isset($post)

<div style="text-align: center">
{{ Form::open(array('route' => ['eliminaPostGestore', $post],'class' => '')) }}          
    <div>
       
        {{ Form::label('motivo', 'Motivo Eliminazione', ['class' => 'label-input']) }}
        {{ Form::text('motivo', '', ['class' => 'input', 'id' => 'motivo', 'placeholder'=> 'Motivazione', 'size' => '105', 'maxlength' => '80']) }}
    </div>
    <br>
    <div>                
        {{ Form::submit('Elimina Post ►', ['class' => 'bottone_conferma']) }}
    </div>
    {{ Form::close() }}
</div>

@endisset($post)







@endsection
