@extends('layouts.userLayout')

@section('title', 'Home User')

@section('content')
<hr class="spaziaturahr">
<div>
    <section>
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
            <div  class="wrap-input">
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
            <div class="container-form-btn">                
                {{ Form::submit('Cerca', ['class' => 'button']) }}
            </div>
            <hr class="spaziaturahr">
            {{ Form::close() }}
        </div>
    </section>
</div>
@endsection
