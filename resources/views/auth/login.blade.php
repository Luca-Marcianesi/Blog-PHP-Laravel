@extends('layouts.public')

@section('title', 'Login')

@section('content')   
    
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
        <div style="margin-left: 40%; text-align: center; height: auto; width: 300px; border: groove; border-color: black">
            <h4 style="color: white"> Non sei ancora registrato?
            <p>Registrati</a></h4>
        </div>
@endsection
