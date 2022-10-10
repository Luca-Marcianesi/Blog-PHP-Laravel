@extends('layouts.public')

@section('title', 'Login')

@section('content')   
    
    <hr style="width: 100%; height: 50px; border: none">
    <h1 style="text-align: center">Accedi</h1>
    <br>
    <div class="wrap-form">
            {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
            
            <div class="input-form-login">
                {{ Form::label('username', 'Username', ['class' => 'label-input']) }}<br>
                {{ Form::text('username', '', ['placeholder' => 'Inserisci username', 'maxlength' => 18], ['class' => 'input','id' => 'username']) }}
                @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                <hr style="height: 45px; border: none; background: none">
            
                {{ Form::label('password', 'Password', ['class' => 'label-input']) }}<br>
                {{ Form::password('password', ['placeholder' => 'Inserisci password', 'maxlength' => 18], ['class' => 'input', 'id' => 'password']) }}<br>
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                <br>
                <div class="form-button">                
                {{ Form::submit('Login', ['class' => 'bottone_conferma']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <hr class="spaziaturahr">
        <div style="margin-left: 40.3%; text-align: center; height: auto; width: 300px">
            <h4 style="color: white;"> Non sei ancora registrato?
            <hr style="height: 5px; border: none">
            <a href="{{ route('register') }}" title="Vai alla pagina di registrazione"><button class="bottone_conferma">Registrati</button></a>
        </div>
@endsection
