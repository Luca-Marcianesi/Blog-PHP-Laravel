@extends('blogUser')
@section('link-indietro')
@isset($idamico)
@isset($idamicizia)
<div style="text-align: center">
<a href="{{ route('getAmico',[$idamico,$idamicizia]) }}"><button class='bottone_conferma'>◄ Indietro</button></a>
</div>
@endisset()
@endisset()
@endsection