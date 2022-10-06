@extends('layouts.userLayout')

@section('title', 'Profilo')

@section('content')
<hr class="spaziaturahr">
<div>
 <div style="text-align: center; font-size: large">
 <h1> Il tuo profilo utente </h1>
 <hr class="spaziaturahr">
    Benvenuto {{ Auth::user()->name }} {{ Auth::user()->surname}}!<br>
    <br>
    Di seguito sono riportati i tuoi dati inseriti in fase di registrazione:<br>
    <hr class="spaziaturahr"></hr>
    Nome: {{ Auth::user()->name}}<br>
    Cognome: {{ Auth::user()->surname}}<br>
    E-Mail: {{ Auth::user()->email}}<br>
    Data di nascita: {{ Auth::user()->data_nascita}}<br>
    <hr class="spaziaturahr">
    Biografia: {{ Auth::user()->descrizione}}<br>
 </div>
<hr class="spaziaturahr">
<div style="text-align: center; font-size: large">
Se desideri modificare i dati del tuo profilo clicca qui sotto!<br>
</div>
<div style="text-align: center; font-size: large; color: rebeccapurple">
    <button class="bottone_conferma" onclick="togglePopupProfilo()">Modifica Profilo</button>
</div>
 <br>
 <div style="text-align: center; font-size: large">
    @if(Auth::user()->visibilita)
        Il tuo account è visibile a tutti
    @else
         Il tuo account è visibile solo ai tuoi amici
    @endif()
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

                <div class="container-form-btn">                
                    {{ Form::submit('Modifica', ['class' => 'bottone_conferma']) }}
                </div>

                {{ Form::close() }}
                
            </div>
</div>

@endsection
