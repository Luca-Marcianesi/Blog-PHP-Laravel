@extends('layouts.stafLayout')


@section('title', 'Blog')

@section('content')
@isset($blog)
@isset($proprietario)

<div style="text-align: center;">
    <p class="titolo">Informazioni generali</p>
    <hr class="spaziaturahr">
    <p>Proprietario del blog: {{$proprietario->name}} {{$proprietario->surname}}</p>
    <a href=""><button class="bottone_conferma">Visualizza profilo (non collegato)</button></a>
    <p>Tema:{{$blog->tema}}</p>
</div>

<hr class="spaziaturahr">

<p class="titolo">Posts</p>

<div style="text-align: center;">
    @isset($posts)
        @foreach($posts as $post)
            post
            <div class="contenitorepost">
                <p class="sotto-titolo">Autore: {{$post->name}} {{$post->surname}} </p>
                <p class="sotto-titolo">Data:{{$post->data}}</p>
                <p class="sotto-titolo">Contenuto:{{$post->testo}}</p>
            </div>
            <hr class="spaziaturahr">
        @endforeach
        @if(count($posts)== 0)
            <p>
                Non sono stati pubblicati ancora post
            </p>
        @endif()

    @endisset()
</div>

    @can('isFriend',$proprietario->id)
    <div class="wrap-form">
            {{ Form::open(array('route' => ['newPost', $blog->id], 'class' => 'contact-form')) }}
            
             <div  class="wrap-input">
                {{ Form::label('testo', 'Cosa ne Pensi?', ['class' => 'label-input']) }}
                {{ Form::text('testo', '', ['class' => 'input','id' => 'testo']) }}
                @if ($errors->first('testo'))
                <ul class="errors">
                    @foreach ($errors->get('testo') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
            
            <div class="container-form-btn">                
                {{ Form::submit('Pubblica post', ['class' => 'button']) }}
            </div>
            
            {{ Form::close() }}
        </div>
    @endcan
</div>

@endisset() 
@endisset()

@isset($blognt)
<div>
    <p class="titolo">Il blog con ID = {{$blognt}} non esiste</p>
    <p class="sotto-titolo"><a  href="{{ route('ricerca') }}">Torna alla pagina di ricerca</a></p>
</div>
@endisset
@endsection
