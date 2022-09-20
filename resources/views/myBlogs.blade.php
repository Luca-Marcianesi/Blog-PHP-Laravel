@extends('layouts.userLayout')

@section('title', 'I Miei Blog')

@section('content')
<hr class="spaziaturahr">
<div>
    <div class="main_element" style="text-align: center; font-size: large">
        <h1> Questi sono i tuoi blogs! </h1>
        <hr class="spaziaturahr">
        Ciao {{Auth::user()->name}} {{Auth::user()->surname}}!,<br>
        il tuo account è @if(Auth::user()->visibility())
                            pubblico
                        @else
                            privato 
                        @endif() <br>
                        Di seguito è riportata la lista di tutti i tuoi blog e, per ognuno, lo stato e il tema!
                        <hr class="spaziaturahr">
                        @if(count($blogs)===0)
                            Attualmente non hai postato nessun blog
    </div>

    
    @else

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

    @endif
<hr class="spaziaturahr">
</div>
@endsection