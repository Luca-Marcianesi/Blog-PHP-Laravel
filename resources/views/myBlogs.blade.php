@extends('layouts.userLayout')

@section('title', 'I Miei Blog')

@section('content')
<div style="text-align: center; font-size: large;">
    <div class="main_element">
        <p class="titolo">Questi sono i tuoi blogs!</p>

        <p class="sotto-titolo"> Ciao {{Auth::user()->name}} {{Auth::user()->surname}}!,<br>
       
        il tuo account è @if(Auth::user()->visibility())
                            pubblico
                        @else
                            privato 
                        @endif() <br>
                        Di seguito è riportata la lista di tutti i tuoi blog e il relativo tema!
                        Potrai inoltre modificare la visibilità di ognuno di loro.</p>
                        <hr class="spaziaturahr">
    </div>


    @if(count($blogs)===0)

        <br>
        <p class="titolo">Attualmente non hai postato nessun blog.</p>
        <br>
        <p class="sotto-titolo">Iniziane uno nella sezione NUOVO BLOG!</p>
    
    @else

        @isset($blogs)

            @foreach($blogs as $blog)
            <div class="contenitoreblog">
                <p class="tema_blog">Tema: {{$blog->tema}}</p>
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
                    <br>
                    <div class="container-form-btn">                
                        {{ Form::submit('Modifica', ['class' => 'bottone_conferma']) }}
                    </div>
                    {{ Form::close() }}
                    <br>
                    <div style="text-align: center; font-size: large">
                        <a href="{{ route('blog',$blog->id) }}"><button class="bottone_conferma">Visualizza Blog</button></a>
                        <button class="bottone_conferma" onclick="togglePopupEliminaBlog()">Elimina blog</button>
                    </div>
                </div>
                
                

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
            <br>
            <div class="container-form-btn">                
                {{ Form::submit('Modifica ►', ['class' => 'bottone_conferma']) }}
            </div>
            {{ Form::close() }}
            <div style="text-align: center; font-size: large">
                <button class="bottone_conferma" onclick="togglePopupEliminaBlog()">Elimina Blog ►</button>
            </div>
        </div>
        @if(!$blog->stato)
        <div class="container-form-btn">                
            <a href="{{ route('selezionaAmici',$blog->id) }}"><button class="bottone_conferma">Seleziona Amici ►</button></a>
        </div>
        @endif()
    </div>
    <hr class="spaziaturahr">
    @endforeach
    
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
                        <button class="bottone_conferma" style="cursor: pointer" onclick="togglePopupEliminaBlog()">Annulla</button>
                    </div>
                </div>  
            </div>
        @endisset()
    @endif
</div>

@endsection