@extends('layouts.public')

@section('title', 'Login')

@section('content')   
    
    <h1>Login</h1>
    <div class="wrap-form">
            {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
            
      
             <div  class="wrap-input">
                {{ Form::label('username', 'Nome Utente', ['class' => 'label-input']) }}
                {{ Form::text('username', '', ['class' => 'input','id' => 'username']) }}
                @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
             <div  class="wrap-input">
                {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
                {{ Form::password('password', ['class' => 'input', 'id' => 'password']) }}
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
            <div class="container-form-btn">                
                {{ Form::submit('Login', ['class' => 'button']) }}
            </div>
            
            {{ Form::close() }}
        </div>
        <div>
            <h4> Non sei ancora registrato?<p>registrati</a></h4>
        </div>
@endsection
