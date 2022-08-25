@extends('layouts.public')

@section('title', 'Registrati')

@section('content')
  
<h1>Non sei ancora registaro?</h1>
<br>
<h6>Registrati subito per connetterti con i tuoi amici e cominciare a dire la tua opinione</h6>

    {{ Form::open(array('route' => 'register')) }}

    <div>
        {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
        {{ Form::text('name', '', ['class' => 'w3-input w3-border w3-margin-bottom', 'id' => 'name']) }}
        @if ($errors->first('name'))
        <ul>
            @foreach ($errors->get('name') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div>
        {{ Form::label('surname', 'Cognome', ['class' => 'label-input']) }}
        {{ Form::text('surname', '', ['class' => 'w3-input w3-border w3-margin-bottom', 'id' => 'surname']) }}
        @if ($errors->first('surname'))
        <ul>
            @foreach ($errors->get('surname') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div>
        {{ Form::label('email', 'Email', ['class' => 'label-input']) }}
        {{ Form::text('email', '', ['class' => 'w3-input w3-border w3-margin-bottom', 'id' => 'email']) }}
        @if ($errors->first('email'))
        <ul>
            @foreach ($errors->get('email') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div>
        {{ Form::label('username', 'Username', ['class' => 'label-input']) }}
        {{ Form::text('username', '', ['class' => 'w3-input w3-border w3-margin-bottom', 'id' => 'username']) }}
        @if ($errors->first('username'))
        <ul>
            @foreach ($errors->get('username') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div>
        {{ Form::label('data_nascita', 'Data di nascita', ['class' => 'label-input']) }}
        {{ Form::date('data_nascita', '', ['class' => 'input','id' => 'data_nascita']) }}
        @if ($errors->first('data_nascita'))
        <ul class="errors">
            @foreach ($errors->get('data_nascita') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div>
        {{ Form::label('descrizione', 'Chi sei?', ['class' => 'label-input']) }}
        {{ Form::textarea('descrizione', '', ['class' => 'input','id' => 'descrizione']) }}
        @if ($errors->first('descrizione'))
        <ul class="errors">
            @foreach ($errors->get('descrizione') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div>
        {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
        {{ Form::password('password', ['class' => 'w3-input w3-border w3-margin-bottom', 'id' => 'password']) }}
        @if ($errors->first('password'))
        <ul>
            @foreach ($errors->get('password') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div>
        {{ Form::label('password-confirm', 'Conferma password', ['class' => 'label-input']) }}
        {{ Form::password('password_confirmation', ['class' => '', 'id' => 'password-confirm']) }}
    </div>

    <div class="container-form-btn">                
        {{ Form::submit('Registrati', ['class' => '']) }}
    </div>

    {{ Form::close() }}
@endsection

