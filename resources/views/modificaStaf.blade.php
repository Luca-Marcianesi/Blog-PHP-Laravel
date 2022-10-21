@extends('layouts.adminLayout')

@section('title', 'Staf')

@section('content')
<br>
<br>
<p class="titolo"> In questa sezione puoi modificare il tuo staff! </p>
<br>
<br>

    <div style="width: 400px; height: 400px; margin-left: 36.5%" class="contenitoreModificaAggiungiStaff">

        @isset($staf)

        {{ Form::open(array('route' => ['modificaStaf',$staf->id], 'class' => '')) }}
        

            {{ Form::label('name', 'Nome', ['class' => '']) }}<br>
            {{ Form::text('name', $staf->name, ['placeholder' => 'Inserisci nome', 'maxlength' => 15],  ['class' => '','id' => 'name']) }}
            @if ($errors->first('name'))
            <ul class="errors">
                @foreach ($errors->get('name') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif

            <br>
            <br>

            {{ Form::label('surname', 'Cognome', ['class' => '']) }}<br>
            {{ Form::text('surname', $staf->surname, ['placeholder' => 'Inserisci cognome', 'maxlength' => 15], ['class' => '','id' => 'surname']) }}
            @if ($errors->first('surname'))
            <ul class="errors">
                @foreach ($errors->get('surname') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif

            <br>
            <br>

            {{ Form::label('data_nascita', 'Data di nascita') }}
            <br>
            {{ Form::date('data_nascita', $staf->data_nascita, ['class' => 'input','id' => 'data_nascita']) }}
            @if ($errors->first('data_nascita'))
                <ul class="errors">
                    @foreach ($errors->get('data_nascita') as $message)
                    <li>{{ $message }}</li>
                @endforeach
                </ul>
            @endif

            <br>
            <br>

            {{ Form::submit('Conferma', ['class' => 'bottone_conferma']) }}
    </div>
    {{ Form::close() }}
    <br>
    <br>

    <div style="text-align: center">
    <a href="{{ route('gestioneStaf') }}"><button class="bottone_conferma">◄ Indietro</button></a>
    </div>

@endisset()
@endsection