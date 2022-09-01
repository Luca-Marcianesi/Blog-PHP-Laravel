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
<div>
 <div>
    Benvenuto {{ Auth::user()->name }} {{ Auth::user()->surname }}
 </div>
<div>
    <p onclick="togglePopupProfilo()">Modifica Profilo</p>
</div>
 
 <div>
    @if(Auth::user()->visibilita)
        account visibile a tutti
    @else
         account visibile solo ai tuoi amici
    @endif()
 </div>
</div>


<div id="modificaProfilo" class="popup">
            <div class="overlay"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopupProfilo()">&times;</div>
                <br>
                <h1>Modifica rofilo </h1>

                
                {{ Form::open(array('route' => 'modificaProfilo', 'id' => 'modificaProfilo')) }}

                <div>
                {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                {{ Form::text('name', '', ['class' => 'input-form', 'id' => 'name']) }}
                </div>


                <div>
                {{ Form::label('surname', 'Cognome', ['class' => 'label-input']) }}
                {{ Form::text('surname', '', ['class' => 'input-form', 'id' => 'surname']) }}
                </div>

                <div>
                {{ Form::label('email', 'E-mail', ['class' => 'label-input']) }}
                {{ Form::text('email', '', ['class' => 'input-form', 'id' => 'email']) }}
                </div>    


                <div class="container-form-btn">                
                    {{ Form::submit('Modifica', ['class' => '']) }}
                </div>


                {{ Form::close() }}
                
            </div>
</div>

@endsection
