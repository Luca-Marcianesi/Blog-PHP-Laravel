@extends('layouts.userLayout')


@section('title', 'Blog')

@section('content')
@isset($blog)
@isset($proprietario)
@isset($posts)
<div>
    <div>Proprietario del blog: {{$proprietario->name}} {{$proprietario->surname}}</div>
    <div>Tema:{{$blog->tema}}</div>
</div>

<div>
    @foreach($posts as $post)
    <div>Autore: {{$post->name}} {{$post->surname}} </div>
    <div>Data:{{$post->data}}</div>
    <div>Contenuto:{{$post->testo}}</div>

    @endforeach
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
@endisset()
@endsection
