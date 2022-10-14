@extends('layouts.userLayout')

@section('title', 'Profilo')

@section('content')
<br>
<br>
<div style="text-align: center; font-size: large">
    <div>
    <p class="titolo"> Il tuo profilo utente </p>
    <br>
    <br>
        <p class="sotto-titolo">Benvenuto {{ Auth::user()->name }} {{ Auth::user()->surname}}!</p>
        <div style="text-align: center; font-size: large">
        @if(Auth::user()->visibilita)
            <p class="sotto-titolo">Attualmente il tuo account è visibile a tutti.</p><br>
        @else
            <p class="sotto-titolo">Attualmente il tuo account è visibile solo ai tuoi amici.</p><br>
        @endif()
        </div>
        <p class="sotto-titolo">Di seguito sono riportati i tuoi dati inseriti in fase di registrazione:</p>

        <hr class="spaziaturahr"></hr>

        <div class="contenitoredatiprofilo">
            <p>Nome: {{ Auth::user()->name}}</p><br>
            <p>Cognome: {{ Auth::user()->surname}}</p><br>
            <p>E-Mail: {{ Auth::user()->email}}</p><br>
            <p>Data di nascita: {{ Auth::user()->data_nascita}}</p><br>
            <hr class="spaziaturahr">
        </div>
        <br>
        <div class="contenitorebiografia">
            <p>Biografia: {{ Auth::user()->descrizione}}
        </div>
    <br>
    </div>

    <hr class="spaziaturahr">

    <div style="text-align: center; font-size: large">
        <p class="titolo">Se desideri modificare i dati del tuo profilo clicca qui sotto!</p>
    </div>
    <br>
    <div style="text-align: center; font-size: large; color: rebeccapurple">
        <button class="bottone_conferma" onclick="togglePopupProfilo()">Modifica Profilo ►</button>
    </div>
</div>


<div id="modificaProfilo" class="popup">
            <div class="overlay"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopupProfilo()">&times;</div>
                <br>
                <h1>Modifica il tuo profilo </h1>
                <br>
                
                {{ Form::open(array('route' => 'modificaProfilo', 'id' => 'modificaProfilo')) }}

                <div>
                {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}<br>
                {{ Form::text('name', '', ['placeholder' => 'Nuovo nome', 'maxlength' => 18], ['class' => 'input-form', 'id' => 'name']) }}
                @if ($errors->first('name'))
                <ul>
                    @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </div>


                <br>
                <br>

                <div>
                {{ Form::label('surname', 'Cognome', ['class' => 'label-input']) }}<br>
                {{ Form::text('surname', '', ['placeholder' => 'Nuovo cognome', 'maxlength' => 18], ['class' => 'input-form', 'id' => 'surname']) }}
                @if ($errors->first('surname'))
                <ul>
                    @foreach ($errors->get('surname') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            
            
                </div>

                <br>
                <br>

                <div>
                {{ Form::label('data_nascita', 'Data di nascita', ['class' => 'label-input']) }}<br>
                {{ Form::date('data_nascita', '', ['id' => 'data_nascita']) }}
                @if ($errors->first('data_nascita'))
                <ul>
                    @foreach ($errors->get('data_nascita') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

                </div>

                <br>
                <br>

                <div>
                {{ Form::label('email', 'E-mail:', ['class' => 'label-input']) }}<br>
                {{ Form::text('email', '', ['placeholder' => 'Nuova e-mail', 'maxlength' => 30, 'size' => 35], ['class' => 'input-form', 'id' => 'email']) }}
                @if ($errors->first('email'))
                <ul>
                    @foreach ($errors->get('email') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </div>

                <br>
                <br>

                <div>                
                {{ Form::submit('Modifica', ['class' => 'bottone_conferma']) }}
                {{ Form::close() }}
                <button class="bottone_conferma" style="cursor: pointer" onclick="togglePopupProfilo()">Annulla</button>
                </div>
                
            </div>
</div>

@endsection
