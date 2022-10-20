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

<div class="contenitoreDatiPosts">
    @foreach($posts as $post)
    <div class="contenitorePost">
        <p>Autore: {{$post->name}} {{$post->surname}} </p>
        <p>Data: <?php 
                $date = date_create($post->data);
                echo date_format($date, 'd-m-Y H:i');
                ?>
        <!-- {{$post->data}}  cambiando il formato non siamo riusciti a mantenere le {{}} per "sanificare"--> 
        <p>Contenuto: {{$post->testo}}</p>
    </div>
    <br>
    @endforeach
</div>


<br>
<br>
    @can('puoPostare',$proprietario->id)
    <div style="text-align: center">
            {{ Form::open(array('route' => ['newPost', $blog->id])) }}

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
