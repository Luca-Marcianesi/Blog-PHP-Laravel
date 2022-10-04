@extends('layouts.userLayout')

@section('title', 'Seleziona Amici')

@section('content')
<hr class="spaziaturahr">
@isset($amici)


@foreach($amici as $amico)

    {{$amico->username}}
    


@endforeach
@endisset()

    
        
    
@endsection