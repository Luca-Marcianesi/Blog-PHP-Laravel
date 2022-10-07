@extends('layouts.userLayout')

@section('title', 'Home User')

@section('content')
<hr class="spaziaturahr">
<div>
    <section>
        <h1 style="text-align: center">Questa è la pagina home della tua area riservata!<br>
        <br>
        <h3 style="text-align: center">In questa pagina puoi ricercare i tuoi amici<br>
        <h3 style="text-align: center">e, attraverso la barra in alto, usufruire di tutte le funzionalità dedicate a te!
        <br>
        <hr class="spaziaturahr">
        <hr class="spaziaturahr">
        <h3 style="text-align: center">Cerca i tuoi amici!<h3>
        <hr class="spaziaturahr">
        <div style="text-align: center">
            {{ Form::open(array('route' => 'searchFriends', 'class' => 'contact-form')) }}
            
      
             <div>
                {{ Form::label('name', 'Nome', ['class' => '']) }}
                <br>
                {{ Form::text('name', '', ['class' => '','id' => 'name']) }}
                @if ($errors->first('name'))
                <ul class="errors">
                    @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <br>
            <div>
                {{ Form::label('surname', 'Cognome', ['class' => '']) }}
                <br>
                {{ Form::text('surname', '', ['class' => '','id' => 'surname']) }}
                @if ($errors->first('surname'))
                <ul class="errors">
                    @foreach ($errors->get('surname') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <br>
            <div>                
                {{ Form::submit('Cerca', ['class' => 'bottone_conferma']) }}
            </div>
            <hr class="spaziaturahr">
            {{ Form::close() }}
        </div>
    </section>
</div>
@endsection
