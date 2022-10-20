@extends('layouts.userLayout')

@section('title', 'Modifica Profilo')

@section('content')
@isset($user)
<br>
<br>
<p class="titolo"> Modifica i dati del tuo profilo </p>
<br>
<div class="contenitoreModificaDatiProfilo">
    <br>
    <br>             
    {{ Form::open(array('route' => 'modificaProfilo', 'id' => 'modificaProfilo')) }}

    <div>
    {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}<br>
    {{ Form::text('name', $user->name , ['placeholder' => 'Nuovo nome', 'maxlength' => 18], ['class' => 'input-form', 'id' => 'name']) }}
    @if ($errors->first('name'))
    <ul>
        @foreach ($errors->get('name') as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
    @endif
    </div>

    <br>

    <div>
    {{ Form::label('surname', 'Cognome', ['class' => 'label-input']) }}<br>
    {{ Form::text('surname', $user->surname, ['placeholder' => 'Nuovo cognome', 'maxlength' => 18], ['class' => 'input-form', 'id' => 'surname']) }}
    @if ($errors->first('surname'))
    <ul>
        @foreach ($errors->get('surname') as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
    @endif
    </div>

    <br>

    <div>
    {{ Form::label('data_nascita', 'Data di nascita', ['class' => 'label-input']) }}<br>
    {{ Form::date('data_nascita', $user->data_nascita, ['id' => 'data_nascita']) }}
    @if ($errors->first('data_nascita'))
    <ul>
        @foreach ($errors->get('data_nascita') as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
    @endif
    </div>

    <br>

    <div>
        {{ Form::label('stato', 'Visibilità', ['class' => 'label-input']) }}
        <br>
        {{ Form::select('stato',['0' => 'Account privato','1' => 'Account pubblico'], $user->visibilita, ['class' => 'input','id' => 'stato', 'title' => 'Imposta chi può vedere questo blog']) }}
        @if ($errors->first('stato'))
        <ul >
            @foreach ($errors->get('stato') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <br>

    <div>                
    {{ Form::submit('Modifica', ['class' => 'bottone_conferma']) }}
    </div>
    {{ Form::close() }}   
</div>

@endisset()
@endsection