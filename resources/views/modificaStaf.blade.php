@extends('layouts.adminLayout')

@section('title', 'Staf')

@section('content')
<hr class="spaziaturahr">
<div style="text-align: center; font-size: large">
<h1> In questa sezione potrai modificare il tuo staff! </h3>
<hr class="spaziaturahr">
    <div>
        @isset($staf)

        {{ Form::open(array('route' => ['modificaStaf',$staf->id], 'class' => '')) }}
        

            <div>
                {{ Form::label('name', 'Nome', ['class' => '']) }}<br>
                {{ Form::text('name', '', ['class' => '','id' => 'name']) }}
                @if ($errors->first('name'))
                <ul class="errors">
                    @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <br> <br>

            <div>
                {{ Form::label('surname', 'Cognome', ['class' => '']) }}<br>
                {{ Form::text('surname', '', ['class' => '','id' => 'surname']) }}
                @if ($errors->first('surname'))
                <ul class="errors">
                    @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <br> <br>

            <div class="informazioni-richieste">
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
            </div>
            <br>
            <br>
            <div class="informazioni-richieste">
                {{ Form::label('password', 'Nuova Password', ['class' => 'label-input']) }}
                <br>
                {{ Form::password('password', ['class' => 'w3-input w3-border w3-margin-bottom', 'id' => 'password']) }}
                @if ($errors->first('password'))
                    <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                    </ul>
                @endif
             </div>
             <br>
             <br>


            <div>
                {{ Form::submit('Conferma', ['class' => 'bottone_conferma']) }}
            </div>
            
            
        </div>


        <div id="modifica-staf" class="popup">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopupModificaStaf()">&times;</div>
            <br>
            <h2>Conferma</h1>
            <br>
            <div style="text-align: center; font-size: large">
                Sei sicuro di voler procedere?
            </div>
            <br> <br>
            <div>
                <button class="bottone_conferma">Conferma</button></a>
            </div>
            
        </div>  
    </div>
    {{ Form::close() }}

@endisset()
        
</div>
@endsection