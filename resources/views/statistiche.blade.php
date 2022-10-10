@extends('layouts.adminLayout')

@section('title', 'Gestione Staf')

@section('content')
<hr class="spaziaturahr">
<div style="text-align: center; font-size: large">
    <h1>In questa pagina puoi consultare le principali statistiche del sito!</h1> <br>
    <hr class="spaziaturahr">
    @isset($numeroBlog)
    <div>
        Questo è il numero dei blog attualmente presenti nel sito: {{$numeroBlog}}
    </div>
    <hr class="spaziaturahr">
    @endisset() 
    <div>
        {{ Form::open(array('route' => 'statisticheSpecifiche', 'class' => '')) }}
        <div  class="wrap-input">
                {{ Form::label('username', 'Username', ['class' => '']) }}<br>
                {{ Form::text('username', '', ['class' => '','id' => 'username', 'maxlength' => 18, 'placeholder' => 'Cerca utente' ]) }}
                @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <br>
            <br>
            <div  class="wrap-input">
                {{ Form::label('tipo', 'Tipo ricerca', ['class' => 'label-input']) }} <br>
                {{ Form::select('tipo',['0' => 'Gruppo di amici del membro','1' => 'Richieste di amicizia del membro'], '0', ['class' => 'input','id' => 'tipo']) }}
                @if ($errors->first('tipo'))
                <ul class="errors">
                    @foreach ($errors->get('tipo') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <br>
            <div class="container-form-btn">                
                {{ Form::submit('Cerca', ['class' => 'button']) }}
            </div>
            
            {{ Form::close() }}
        </div>

    
        
    
</div>
@endsection