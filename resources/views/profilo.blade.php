@extends('layouts.userLayout')

@section('title', 'Profilo')

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
                {{ Form::open(array('route' => 'register')) }}

                <div>
                {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                {{ Form::text('name', '', ['class' => 'w3-input w3-border w3-margin-bottom', 'id' => 'name']) }}
                @if ($errors->first('name'))
                    <ul>
                    @foreach ($errors->get('name') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                    </ul>
                @endif
                </div>

                <div>
                {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                {{ Form::text('name', '', ['class' => 'w3-input w3-border w3-margin-bottom', 'id' => 'name']) }}
                @if ($errors->first('name'))
                    <ul>
                    @foreach ($errors->get('name') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                    </ul>
                @endif
                </div>

                <div>
                {{ Form::label('surname', 'Cognome', ['class' => 'label-input']) }}
                {{ Form::text('surname', '', ['class' => 'w3-input w3-border w3-margin-bottom', 'id' => 'surname']) }}
                @if ($errors->first('surname'))
                    <ul>
                    @foreach ($errors->get('surname') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                    </ul>
                @endif
                </div>

                <div>
                {{ Form::label('email', 'E-mail', ['class' => 'label-input']) }}
                {{ Form::text('email', '', ['class' => 'w3-input w3-border w3-margin-bottom', 'id' => 'email']) }}
                @if ($errors->first('email'))
                    <ul>
                    @foreach ($errors->get('email') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                    </ul>
                @endif
                </div>

                <div>
                {{ Form::label('descrizione', 'Bio', ['class' => 'label-input']) }}
                {{ Form::text('descrizione', '', ['class' => 'w3-input w3-border w3-margin-bottom', 'id' => 'descrizione']) }}
                @if ($errors->first('descrizione'))
                    <ul>
                    @foreach ($errors->get('descrizione') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                    </ul>
                @endif
                </div>

                <div>
                {{ Form::label('visibilita', 'Visibilità', ['class' => 'label-input']) }}
                {{ Form::text('visibilita', '', ['class' => 'w3-input w3-border w3-margin-bottom', 'id' => 'visibilita']) }}
                @if ($errors->first('visibilita'))
                    <ul>
                    @foreach ($errors->get('visibilita') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                    </ul>
                @endif
                </div>

    


                <div class="container-form-btn">                
                    {{ Form::submit('Modifica', ['class' => '']) }}
                </div>

                {{ Form::close() }}
                
                
            </div>
</div>

@endsection
