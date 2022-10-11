@extends('layouts.public')

@section('title', 'Registrati')

@section('content')
  
<p class="titolo">Non sei ancora registrato?</p>
<br>
<p class="sotto-titolo">Registrati subito per connetterti con i tuoi amici e cominciare a dire la tua opinione!</p>
    <hr class="spaziaturahr">
    {{ Form::open(array('route' => 'register')) }}

    <div class="informazioni-richieste">
        {{ Form::label('name', 'Nome', ['class' => 'label-form']) }}
        <br>
        {{ Form::text('name', '', ['placeholder' => 'Inserisci nome', 'maxlength' => 18], ['id' => 'name']) }}
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
    <div class="informazioni-richieste">
        {{ Form::label('surname', 'Cognome', ['class' => 'label-form']) }}
        <br>
        {{ Form::text('surname', '', ['placeholder' => 'Inserisci cognome', 'maxlength' => 18], ['id' => 'surname']) }}
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
    <div class="informazioni-richieste">
        {{ Form::label('email', 'Email', ['class' => 'label-form']) }}
        <br>
        {{ Form::text('email', '', ['placeholder' => 'Inserisci e-mail', 'maxlength' => 30], ['id' => 'email']) }}
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
    <div class="informazioni-richieste">
        {{ Form::label('username', 'Username', ['class' => 'label-form']) }}
        <br>
        {{ Form::text('username', '', ['placeholder' => 'Inserisci username', 'maxlength' => 18], ['id' => 'username']) }}
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
    <div class="informazioni-richieste">
        {{ Form::label('data_nascita', 'Data di nascita', ['class' => 'label-form']) }}
        <br>
        {{ Form::date('data_nascita', '', ['id' => 'data_nascita']) }}
        @if ($errors->first('data_nascita'))
        <ul class="errors">
            @foreach ($errors->get('data_nascita') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <br>
    <br>
    <div class="informazioni-richieste">
        {{ Form::label('descrizione', 'Chi sei?', ['class' => 'label-form']) }}
        <br>
        {{ Form::textarea('descrizione', '',  ['class' => 'descrizioneparam', 'placeholder' => 'Inserisci delle informazioni su di te', 'maxlength' => 330, 'id' => 'descrizione']) }}
        @if ($errors->first('descrizione'))
        <ul class="errors">
            @foreach ($errors->get('descrizione') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <br>
    <br>
    <div class="informazioni-richieste">
        {{ Form::label('password', 'Password', ['class' => 'label-form']) }}
        <br>
        {{ Form::password('password', ['placeholder' => 'Inserisci password', 'maxlength' => 18], ['id' => 'password']) }}
        @if ($errors->first('password'))
        <ul class="errors">
            @foreach ($errors->get('password') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <br>
    <br>
    <div class="informazioni-richieste">
        {{ Form::label('password-confirm', 'Conferma password', ['class' => 'label-form']) }}
        <br>
        {{ Form::password('password_confirmation', ['placeholder' => 'Immetti nuovamente', 'maxlength' => 18], ['id' => 'password-confirm']) }}
    </div>
    <br>
    <br>
    <div style="text-align: center" class="container-form-btn">                
        {{ Form::submit('Registrati', ['class' => 'bottone_conferma']) }}
    </div>

    {{ Form::close() }}
@endsection

