@extends('layouts.public')

@section('title', 'Login')

@section('content')   
    
    <hr style="width: 100%; height: 50px; border: none">
    <p class="titolo">Accedi</p>
    <br>
    <div class="wrap-form">
            {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
            
            <div class="input-form-login">
                {{ Form::label('username', 'Username', ['class' => 'label-form']) }}<br>
                {{ Form::text('username', '', ['placeholder' => 'Inserisci username', 'maxlength' => 18], ['class' => 'input','id' => 'username']) }}
                @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

                <hr style="height: 30px; border: none; background: none"></hr>
            
                {{ Form::label('password', 'Password', ['class' => 'label-form']) }}<br>
                {{ Form::password('password', ['placeholder' => 'Inserisci password', 'maxlength' => 18], ['class' => 'input', 'id' => 'password']) }}
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

                <hr style="height: 10px; border: none; background: none"></hr>

                <div class="form-button">                
                {{ Form::submit('Login', ['class' => 'bottone_conferma']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <hr class="spaziaturahr">
        <div style="margin-left: 40.3%; text-align: center; height: auto; width: 300px">
            <p class="sotto-titolo"> Non sei ancora registrato? </p>
            <hr style="height: 5px; border: none">
            <a href="{{ route('register') }}" title="Vai alla pagina di registrazione"><button class="bottone_conferma">Registrati</button></a>
        </div>
@endsection
