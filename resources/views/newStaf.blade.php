@extends('layouts.adminLayout')

@section('title', 'Staf')

@section('content')
<hr class="spaziaturahr">
<div style="text-align: center; font-size: large">
    <div>
        <h1>In questa pagina hai la possibilità di aggiungere nuovi membri allo staff del sito!</h1>
        <hr class="spaziaturahr">
        {{ Form::open(array('route' => 'newStaf', 'class' => '')) }}

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
                    @foreach ($errors->get('name') as $message)
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
                    @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <br>
            <br>

            <div  class="wrap-input">
                {{ Form::label('username', 'Username', ['class' => '']) }}<br>
                {{ Form::text('username', '', ['placeholder' => 'Inserisci username', 'maxlength' => 18, 'class' => '','id' => 'username']) }}
                @if ($errors->first('username'))
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
                {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
                <br>
                {{ Form::password('password', ['placeholder' => 'Inserisci password', 'maxlength' => 18, 'size' => 22, 'id' => 'password']) }}
                @if ($errors->first('password'))
                    <ul>
                    @foreach ($errors->get('password') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                    </ul>
                @endif
             </div>

            <br>
            <div class="container-form-btn">                
                {{ Form::submit('Aggiungi', ['class' => 'button']) }}
            </div>
            
            {{ Form::close() }}
    </div>
</div>
@endsection