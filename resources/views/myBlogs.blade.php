@extends('layouts.userLayout')

@section('title', 'I Miei Blog')

@section('content')
<hr class="spaziaturahr">
<div>
    <div class="main_element" style="text-align: center; font-size: large;">
        <h1> Questi sono i tuoi blogs! </h1>
        <hr class="spaziaturahr">
        Ciao {{Auth::user()->name}} {{Auth::user()->surname}}!,<br>
        il tuo account è @if(Auth::user()->visibility())
                            pubblico
                        @else
                            privato 
                        @endif() <br>
                        Di seguito è riportata la lista di tutti i tuoi blog e il relativo tema!
                        Potrai inoltre modificare la visibilità di ognuno di loro.
                        <hr class="spaziaturahr">
                        @if(count($blogs)===0)
                            Attualmente non hai postato nessun blog
    

    
    @else

    @isset($blogs)

    @foreach($blogs as $blog)
        <div class="tema_blog">Tema: {{$blog->tema}}</div>
        <br>

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
            <div style="text-align: center; font-size: large; color: rebeccapurple">
                <p onclick="togglePopupEliminaBlog()" style="cursor: pointer">Elimina blog</p>
            </div>
            <hr class="spaziaturahr">
       
        </div>

        @if(!$blog->stato)
        <div class="container-form-btn">                
            <a href="{{ route('selezionaAmici',$blog->id) }}" class="highlight" >Seleziona Amici</a>
        </div>
        @endif()

                
    @endforeach

    @endif
    </div>


    <div id="elimina-blog" class="popup">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopupEliminaBlog()">&times;</div>
            <br>
            <h2>Conferma</h1>
            <br>
            <div style="text-align: center; font-size: large">
                Sei sicuro di voler cancellare questo blog? 
            </div>
            <br> <br>
            <div>
            <a href="{{ route('eliminaBlog', $blog->id) }}"><button class="bottone_conferma">Si</button></a>
            </div>
        </div>  
    </div>
    @endisset()
</div>

@endsection