@extends('layouts.adminLayout')

@section('title', 'Modifica Profilo')

@section('content')
@isset($staf)
<br>
<br>
<p class="titolo">
    In questa pagina puoi modificare la password dell'utente staff selezionato
</p>
<br>
<br>

{{ Form::open(array('route' => ['modificaStaffPassword',$staf->id],  'id' => 'modificaStaffPassword')) }}

<div class="contenitoreModificaPassword">

    {{ Form::label('password', 'Password', ['class' => 'label-form']) }}
    <br>
    {{ Form::password('password', ['placeholder' => 'Inserisci password', 'maxlength' => 15], ['id' => 'password']) }}
    @if ($errors->first('password'))
    <ul class="errors">
        @foreach ($errors->get('password') as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
    @endif

    <br>
    <br>

    {{ Form::label('password-confirm', 'Conferma password', ['class' => 'label-form']) }}<br>
    {{ Form::password('password_confirmation', ['placeholder' => 'Immetti nuovamente', 'maxlength' => 15], ['id' => 'password-confirm']) }}

    <br>
    <br>
    <br>
    
    {{ Form::submit('Conferma ►', ['class' => 'bottone_conferma']) }}
</div>
{{ Form::close() }}

<br>
<br>

<div style="text-align: center">
<a href="{{ route('gestioneStaf') }}"><button class="bottone_conferma">◄ Indietro</button></a>
</div>


@endisset()
@endsection