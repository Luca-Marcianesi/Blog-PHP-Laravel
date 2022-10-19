@extends('layouts.userLayout')


@section('title', 'Blog')

@section('content')
@isset($blog)
@isset($proprietario)
@isset($posts)
<br>
<p class="titolo"> Le caratteristiche del blog selezionato: </p>
<br>
<br>
<div class="contenitoreProprietarioBlog">
    <p class="sotto-titolo">Proprietario del blog: {{$proprietario->name}} {{$proprietario->surname}}</p>
    <p class="sotto-titolo">Tema: {{$blog->tema}}</p>
</div>
<br>
<br>
<p class="titolo"> Di seguito sono elencati tutti i post fatti sul blog selezionato: </p>
<br>
<br>

<div style="margin-left: 27%; width: 700px;	height: 400px;" class="contenitoreDatiPosts">
    @foreach($posts as $post)
    <p class="sotto-titolo">Autore: {{$post->name}} {{$post->surname}} </p>
    <p class="sotto-titolo">Data:{{$post->data}}</p>
    <p class="sotto-titolo">Contenuto:{{$post->testo}}</p>
    <br>
    @endforeach
</div>
    @can('puoPostare',$proprietario->id)
    <div style="text-align: center">
            {{ Form::open(array('route' => ['newPost', $blog->id], 'class' => 'contact-form')) }}

            <div>
                {{ Form::label('testo', 'Cosa ne Pensi?', ['class' => 'label-form']) }}
                <br>
                {{ Form::text('testo', '', ['size' => '55'], ['class' => 'input','id' => 'testo']) }}
                @if ($errors->first('testo'))
                <ul class="errors">
                    @foreach ($errors->get('testo') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <br>
            <div class="container-form-btn">                
                {{ Form::submit('Pubblica post ►', ['class' => 'bottone_conferma']) }}
            </div>
            <br>
            <br>           
            {{ Form::close() }}
    </div>
    @endcan

@endisset()
@endisset()
@endisset()
@endsection
