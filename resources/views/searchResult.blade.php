@extends('layouts.userLayout')

@section('title', 'Risultati')

@section('content')
    <br>
    <br>
    <p class="titolo">I risultati della tua ricerca:</p>
    <hr class="spaziaturahr">
    <div style="text-align: center; font-size: 18px">
   
        @isset($users)

            @if(count($users)== 0)
                <div>
                    <p class="sotto-titolo">Nessun utente corrisponde alle tue specifiche</p>
                </div>
            @endif

            @foreach($users as $user)
                <div class="contenitore_utenti_cercati">
                    <p class="sotto-titolo">Nome: {{$user->name}}</p><br>
                    <p class="sotto-titolo">Cognome: {{$user->surname}}</p><br>
                    @can('isFriend',$user->id)
                        <p class="sotto-titolo">Email: {{$user->email}}</p><br>
                        <p class="sotto-titolo">Username: {{$user->username}}</p><br>
                        <p class="sotto-titolo">Data di nascita: {{$user->data_nascita}}</p><br>
                        <p style="text-align: center; font-size: 20px; color: black">Siete amici
                            <a href="{{ route('visualizzaProfilo', [$user->id])}}">
                                <button class="bottone_conferma">Visualizza profilo ►</button></a></p><br>
                    @else
                        <p class="sotto-titolo">Non siete amici</p><br>
                        <a href="{{ route('inviaAmicizia',$user->id) }}" title="richiesta">
                            <button class="bottone_conferma">Invia richiesta ►</button></a>
                    @endcan()
                    <br>
                    <br>
                </div>
                <hr class="spaziaturahr">         
            @endforeach
        @endisset()
        
        
    </div>
@endsection