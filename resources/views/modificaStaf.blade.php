@extends('layouts.adminLayout')

@section('title', 'Staf')

@section('content')
<div>

    <br>
    <br>

    <div>
        @isset($staf)

        {{ Form::open(array('route' => ['modificaStaf',$staf->id], 'class' => '')) }}
        

            <div  class="wrap-input">
                {{ Form::label('name', 'Nome', ['class' => '']) }}
                {{ Form::text('name', $staf->name, ['class' => '','id' => 'name']) }}
                @if ($errors->first('name'))
                <ul class="errors">
                    @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>


            <div  class="wrap-input">
                {{ Form::label('surname', 'Cognome', ['class' => '']) }}
                {{ Form::text('surname', $staf->surname, ['class' => '','id' => 'surname']) }}
                @if ($errors->first('surname'))
                <ul class="errors">
                    @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

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
    
            <div class="informazioni-richieste">
                {{ Form::label('password', 'Nuova Password', ['class' => 'label-input']) }}
                <br>
                {{ Form::password('password', ['class' => 'w3-input w3-border w3-margin-bottom', 'id' => 'password']) }}
                @if ($errors->first('password'))
                    <ul>
                    @foreach ($errors->get('password') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                    </ul>
                @endif
             </div>


            <div class="container-form-btn">                
                {{ Form::submit('Modifica', ['class' => 'button']) }}
            </div>
            
            {{ Form::close() }}
        </div>
@endisset()
    
        
    
</div>
@endsection