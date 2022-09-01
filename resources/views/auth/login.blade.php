@extends('layouts.public')

@section('title', 'Login')

@section('content')   
    
    <hr style="width: 100%; height: 50px; border: none">
    <h1 style="text-align: center">Accedi</h1>
    <br>
    <div class="wrap-form">
            {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
            
             <div class="input-form">
                {{ Form::label('username', 'Username', ['class' => 'label-input']) }}
                {{ Form::text('username', '', ['class' => 'input','id' => 'username']) }}
                @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                <hr style="height: 20px; border: none; background: none">
            
                {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
                {{ Form::password('password', ['class' => 'input', 'id' => 'password']) }}
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                <hr style="height: 20px; border: none; background: none">
                <div class="form-button">                
                {{ Form::submit('Login', ['class' => 'button']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <div style="margin-left: 40%; text-align: center; height: auto; width: 300px">
            <h4 style="color: white"> Non sei ancora registrato?
            <hr style="height: 5px; border: none">
            <p><a href="{{ route('register') }}" class="highlight" title="Vai alla pagina di registrazione">Registrati</a></h4>
        </div>
@endsection
