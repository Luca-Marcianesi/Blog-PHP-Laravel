@extends('layouts.userLayout')

@section('title', 'Home User')

@section('content')
<hr class="spaziaturahr">
<div>
    <section>
        <p class="titolo">Questa è la pagina home della tua area riservata!</p>
        <br>
        <p class="sotto-titolo">In questa pagina puoi ricercare i tuoi amici <br>
            e, attraverso la barra in alto, usufruire di tutte le funzionalità dedicate a te!</p>
        <hr class="spaziaturahr">
        <p class="cosa-fare">Cerca i tuoi amici!</p>
        <hr class="spaziaturahr">
        <div style="text-align: center">
            {{ Form::open(array('route' => 'searchFriends', 'class' => 'contact-form')) }}
            
             <div>
                {{ Form::label('name', 'Nome', ['class' => 'label-form']) }}
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
                {{ Form::label('surname', 'Cognome', ['class' => 'label-form']) }}
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
            {{ Form::close() }}
        </div>
    </section>
</div>
@endsection
