@extends('layouts.stafLayout')


@section('title', 'Blog')

@section('content')
@isset($blog)


<p class="titolo">In questa pagina puoi eliminare il blog selezionato</p>

<hr class="spaziaturahr"></hr>

<div class="contenitoreMotivazione">

    {{ Form::open(array('route' => ['eliminaBlogGestore', $blog], 'id'=>'eliminablog','class' => '')) }}          
    <div>
        {{ Form::label('motivo', 'Motivo Eliminazione:', ['class' => 'sotto-titolo']) }}
        <br>
        <br>
        {{ Form::text('motivo', '', ['class' => 'input', 'id' => 'motivo', 'placeholder'=> 'Inserisci il motivo per il quale vuoi eliminare questo blog', 'size' => '105', 'maxlength' => '80']) }}
    </div>
    <br>
    <br>
    <div>             
        {{ Form::submit('Elimina', ['class' => 'bottone_elimina']) }}
    </div>
    {{ Form::close() }}
</div>
@endisset()

@isset($post)
@isset($blogId)

<p class="titolo">In questa pagina puoi eliminare il post selezionato</p>

<hr class="spaziaturahr">

<div class="contenitoreMotivazione">
{{ Form::open(array('route' => ['eliminaPostGestore', $post],'class' => '')) }}          
    <div>
       
        {{ Form::label('motivo', 'Motivo Eliminazione', ['class' => 'sotto-titolo']) }}
        <br>
        <br>
        {{ Form::text('motivo', '', ['class' => 'input', 'id' => 'motivo', 'placeholder'=> 'Inserisci il motivo per il quale vuoi eliminare questo post', 'size' => '105', 'maxlength' => '80']) }}
        @if ($errors->first('motivo'))
        <ul class="errors">
            @foreach ($errors->get('motivo') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    
    </div>
    <br>
    <div>   
                 
        {{ Form::submit('Elimina', ['class' => 'bottone_elimina']) }}
    </div>
    {{ Form::close() }}
</div>

@endisset()
@endisset()

<br>
<br>
@isset($indietro)
<div style="text-align: center">
<a href="{{$indietro}}"><button class='bottone_conferma'>◄ Indietro</button></a>
</div>
@endisset()

@endsection
