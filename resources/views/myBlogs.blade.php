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
        <div class="stato_blog">Stato: @if($blog->stato)
            pubblico 
        @else
            privato 
        @endif() </div>
        
        
    </div>
            

          
    @endforeach

    @endisset()
    
    
</div>
@endsection