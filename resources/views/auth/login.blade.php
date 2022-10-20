@extends('layouts.public')

@section('title', 'Login')

@section('content')
<hr style="width: 100%; height: 50px; border: none">

<div>

    <div style="height: 650px; float:left; margin-left: 20%">
        <img style="height: 400px ;width: 500px" alt="Discussione animazione" src="/images/products/talking.gif"></img>
    </div>
    

    <div class="contenitoreLogin">
        <p class="titolo">Accedi</p>
        <br>
        <br>
        
        {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
        
        
            {{ Form::label('username', 'Username', ['class' => 'label-form']) }}<br>
            {{ Form::text('username', '', ['placeholder' => 'Inserisci username', 'maxlength' => 18], ['class' => 'input-login','id' => 'username']) }}
            @if ($errors->first('username'))
            <ul style="font-size: 18px">
                @foreach ($errors->get('username') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif

            <hr style="height: 30px; border: none; background: none"></hr>
        
            {{ Form::label('password', 'Password', ['class' => 'label-form']) }}<br>
            {{ Form::password('password', ['placeholder' => 'Inserisci password', 'maxlength' => 18], ['class' => 'input', 'id' => 'password']) }}
            @if ($errors->first('password'))
            <ul style="font-size: 18px">
                @foreach ($errors->get('password') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif

            <hr style="height: 30px; border: none; background: none"></hr>
                
            {{ Form::submit('Login ►', ['class' => 'bottone_conferma']) }}
        
        {{ Form::close() }}
        
    </div>

    <br>
    <br>
    <div style="margin-left: 56.8%; text-align: center; height: auto; width: 300px">
        <p class="sotto-titolo"> Non sei ancora registrato? </p>
        <hr style="height: 10px; border: none"></hr>
        <a href="{{ route('register') }}" title="Vai alla pagina di registrazione"><button style="font-size: 18px" class="bottone_conferma">Registrati ►</button></a>
    </div>

</div>
@endsection
