@extends('layouts.userLayout')

@section('title', 'I Miei Blog')

@section('content')
<div>
    <div class="main_element">
        Ciao {{Auth::user()->name}} {{Auth::user()->surname}},<br>
        il tuo account è @if(Auth::user()->visibility())
                            pubblico
                        @else
                            privato 
                        @endif() <br>
                        questi sono i tuoi blog
    </div>

    @isset($blogs)

    @foreach($blogs as $blog)
    <div class="main_element">
        <div class="tema_blog">Tema: {{$blog->tema}}</div>

        <div>

        {{ Form::open(array('route' => ['modificaBlog',$blog->id], 'class' => '')) }}

            <div  class="wrap-input">
                {{ Form::label('stato', 'Visibilità', ['class' => 'label-input']) }}
                {{ Form::select('stato',['0' => 'Solo amici selezionati','1' => 'Tutti gli amici'], $blog->stato, ['class' => 'input','id' => 'stato']) }}
                @if ($errors->first('stato'))
                <ul class="errors">
                    @foreach ($errors->get('stato') as $message)
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

      
        
    </div>
            

          
    @endforeach

    @endisset()
    
    
</div>
@endsection