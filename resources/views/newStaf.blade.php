@extends('layouts.adminLayout')

@section('title', 'Staf')

@section('content')
<hr class="spaziaturahr">
<div style="text-align: center; font-size: large">
    <div>
        <h1>In questa pagina hai la possibilità di aggiungere nuovi membri allo staff del sito!</h1>
        <hr class="spaziaturahr">
        {{ Form::open(array('route' => 'creaStaf', 'class' => '')) }}

            <div class="wrap-input">
                {{ Form::label('name', 'Nome', ['class' => '']) }}<br>
                {{ Form::text('name', '', ['placeholder' => 'Inserisci nome', 'maxlength' => 18, 'class' => '','id' => 'name']) }}
                @if ($errors->first('name'))
                <ul class="errors">
                    @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <br>
            <br>

            <div  class="wrap-input">
                {{ Form::label('surname', 'Cognome', ['class' => '']) }}<br>
                {{ Form::text('surname', '', ['placeholder' => 'Inserisci cognome', 'maxlength' => 18, 'class' => '','id' => 'surname']) }}
                @if ($errors->first('surname'))
                <ul class="errors">
                    @foreach ($errors->get('surname') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <br>
            <br>

            <div  class="wrap-input">
                {{ Form::label('email', 'Email', ['class' => '']) }}<br>
                {{ Form::text('email', '', ['placeholder' => 'Inserisci e-mail', 'maxlength' => 30, 'size' => 35, 'class' => '','id' => 'email']) }}
                @if ($errors->first('email'))
                <ul class="errors">
                    @foreach ($errors->get('email') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <br>
            <br>

            <div  class="wrap-input">
                {{ Form::label('usernameStaf', 'Username', ['class' => '']) }}<br>
                {{ Form::text('usernameStaf', '', ['placeholder' => 'Inserisci username', 'maxlength' => 18, 'class' => '','id' => 'usernameStaf']) }}
                @if ($errors->first('usernameStaf'))
                <ul class="errors">
                    @foreach ($errors->get('usernameStaf') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <br>
            <br>

            <div class="informazioni-richieste">
                {{ Form::label('data_nascita', 'Data di nascita', ['class' => 'label-input']) }}
                <br>
                {{ Form::date('data_nascita', '', ['class' => 'input','id' => 'data_nascita']) }}
                @if ($errors->first('data_nascita'))
                    <ul class="errors">
                     @foreach ($errors->get('data_nascita') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                    </ul>
                @endif
            </div>
            <br>

            <div class="informazioni-richieste">
                {{ Form::label('passwordStaf', 'Inserisci la password', ['class' => 'label-input']) }}
                <br>
                {{ Form::password('passwordStaf', ['placeholder' => 'Inserisci password', 'maxlength' => 18, 'size' => 22, 'id' => 'passwordStaf']) }}
                @if ($errors->first('passwordStaf'))
                    <ul class="errors">
                    @foreach ($errors->get('passwordStaf') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                    </ul>
                @endif
            </div>

            <hr class="spaziaturahr">
            <div class="container-form-btn">                
                {{ Form::submit('Aggiungi', ['class' => 'bottone_conferma']) }}
            </div>
            
            {{ Form::close() }}
    </div>
</div>
@endsection