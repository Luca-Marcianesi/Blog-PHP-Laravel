@extends('layouts.adminLayout')

@section('title', 'Gestione Staf')

@section('content')
<div>

    @isset($numeroBlog)
    <div>
        Al momento ci sono {{$numeroBlog}} blog sul sito
    </div>
    @endisset() 


    <div>

        {{ Form::open(array('route' => 'statisticheSpecifiche', 'class' => '')) }}

        <div  class="wrap-input">
                {{ Form::label('username', 'Nome', ['class' => '']) }}
                {{ Form::text('username', '', ['class' => '','id' => 'username']) }}
                @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input">
                {{ Form::label('tipo', 'Tipo ricerca', ['class' => 'label-input']) }}
                {{ Form::select('tipo',['0' => 'Gruppo di amici del membro','1' => 'Richieste di amicizia del membro'], '0', ['class' => 'input','id' => 'tipo']) }}
                @if ($errors->first('tipo'))
                <ul class="errors">
                    @foreach ($errors->get('tipo') as $message)
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

    
        
    
</div>
@endsection