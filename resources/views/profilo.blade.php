@extends('layouts.userLayout')

@section('title', 'Profilo')

@section('scripts')

@parent

<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('modificaProfilo') }}";
    var formId = 'modificaProfilo';
    
    $("#modificaProfilo").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    });
});
</script>

@endsection

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
    Biografia: {{ Auth::user()->descrizione}}<br>
 </div>
<hr class="spaziaturahr">
<div style="text-align: center; font-size: large">
Se desideri modificare i dati del tuo profilo clicca qui sotto!<br>
</div>
<div style="text-align: center; font-size: large; color: rebeccapurple">
    <p onclick="togglePopupProfilo()" style="cursor: pointer">Modifica Profilo</p>
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
                {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                {{ Form::textarea('name', '', ['class' => 'modifica-profilo', 'id' => 'name']) }}
                </div>


                <div>
                {{ Form::label('surname', 'Cognome', ['class' => 'label-input']) }}
                {{ Form::text('surname', '', ['class' => 'input-form', 'id' => 'surname']) }}
                </div>

                <div>
                {{ Form::label('email', 'E-mail', ['class' => 'label-input']) }}
                {{ Form::text('email', '', ['class' => 'input-form', 'id' => 'email']) }}
                </div>    
                <br>

                <div class="container-form-btn">                
                    {{ Form::submit('Modifica', ['class' => '']) }}
                </div>


                {{ Form::close() }}
                
            </div>
</div>

@endsection
