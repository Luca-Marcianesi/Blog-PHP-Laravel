@extends('layouts.userLayout')

@section('title', 'I Miei Blog')

@section('content')
<div>

            @if(Auth::user()->visibility())
                <p> blog pubblico </p>
            @else
                <p> blog privato </p>
            @endif() 

    @isset($blogs)

    @foreach($blogs as $blog)
            <p>
            {{$blog->proprietario}} , {{$blog->tema}} 
            </p>

            @if($blog->stato)
                <p> blog pubblico </p>
            @else
                <p> blog privato </p>
            @endif() 
    @endforeach

    @endisset()
    
    
</div>
@endsection