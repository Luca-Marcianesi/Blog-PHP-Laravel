@extends('blogUser')
@section('link-indietro')
<div style="text-align: center">
<a href="{{ route('visualizzaProfilo',$proprietario->id) }}"><button class='bottone_conferma'>◄ Indietro</button></a>
</div>
@endsection