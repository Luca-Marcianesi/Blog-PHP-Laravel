@extends('layouts.adminLayout')

@section('title', 'Staf')

@section('content')

<hr class="spaziaturahr"></hr>
<p class="titolo"> In questa sezione puoi modificare il tuo staff! </p>
<hr class="spaziaturahr"></hr>

    <div style="width: 400px; height: 400px; margin-left: 36.5%" class="contenitoreModificaAggiungiStaff">

        @isset($staf)

        {{ Form::open(array('route' => ['modificaStaf',$staf->id], 'class' => '')) }}
        

            {{ Form::label('name', 'Nome', ['class' => '']) }}<br>
            {{ Form::text('name', '', ['placeholder' => 'Inserisci nome'],  ['class' => '','id' => 'name']) }}
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
            {{ Form::text('surname', '', ['placeholder' => 'Inserisci cognome'], ['class' => '','id' => 'surname']) }}
            @if ($errors->first('surname'))
            <ul class="errors">
                @foreach ($errors->get('surname') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif

            <br>
            <br>

            {{ Form::label('data_nascita', 'Data di nascita', ['class' => 'label-input']) }}
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

            {{ Form::label('password', 'Nuova Password', ['class' => 'label-input']) }}
            <br>
            {{ Form::password('password', ['placeholder' => 'Inserisci password'], ['class' => 'w3-input w3-border w3-margin-bottom', 'id' => 'password']) }}
            @if ($errors->first('password'))
                <ul class="errors">
                @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                @endforeach
                </ul>
            @endif

             <br>
             <br>

            {{ Form::submit('Conferma', ['class' => 'bottone_conferma']) }}
    </div>
    {{ Form::close() }}

@endisset()
@endsection