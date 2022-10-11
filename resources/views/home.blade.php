@extends('layouts.public')

@section('title', 'Home')

@section('content')
<hr class="spaziaturahr"></hr>         
    <section>
        <div style="float: left; height: 392px; width: 690px; font-size: large">
            <p class="cloud-organization" style="background-image: url('images/products/nuvola-removebg-preview.png')">
                Condividi i tuoi pensieri,<br>
                leggi quelli dei tuoi amici<br>
                e discutete su un argomento<br>
                a vostro piacimento all'interno<br>
                del vostro blog!<br>
                Tutto con semplicità
            </p>
        </div>
        <div style="font-size: large" class="main_element">
            <div class="unisciti">
                <p class="titolo">Unisciti ad altri utenti</p>
                <p class="sotto-titolo"> Che tu stia condividendo la tua esperienza,
                    le ultime notizie <br> o qualunque cosa tu abbia in mente, sei nel posto giusto. <br>
                    Registrati e inizia a creare il tuo blog.</p>  
            </div>
            @guest
            <div class="register_option">
                <a href="{{ route('register') }}" title="Registrati"><button class="bottone_conferma">Registrati subito ►</button></a>
            </div>
            @endguest 
        </div>
        <br>
        
        <div>
            <div class="profilo-blog">
                <p class="titolo">Chi può vedere il mio profilo e miei blog?</p>
                <br>
                <p class="sotto-titolo"> Normalmente il tuo profilo e i tuoi blog <br>
                    sono visibili da tutti ma, <br>andando nella sezione profilo, <br>
                    potrai rendere visibili i tuoi blog solo dai tuoi amici.
                </p>  
            </div>
        </div>
    </section>
       
@endsection
