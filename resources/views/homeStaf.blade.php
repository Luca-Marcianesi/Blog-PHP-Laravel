@extends('layouts.stafLayout')

@section('title', 'Home Staf')

@section('content')
<hr class="spaziaturahr">

<br>
<br>
<br>
<br>
<br>
<br>
<div>

{{ Form::open(array('route' => ['attivitaUtente'], 'class' => '')) }}

    <div  class="wrap-input">
        {{ Form::label('id', 'Id utente', ['class' => 'label-input']) }}
        {{ Form::number('id','', ['class' => 'input','id' => 'id']) }}
        @if ($errors->first('id'))
        <ul class="errors">
            @foreach ($errors->get('id') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div class="container-form-btn">                
        {{ Form::submit('Cerca', ['class' => 'button']) }}
    </div>
    
    {{ Form::close() }}
</div>



Cerca blog:.... 
cerca
@endsection
