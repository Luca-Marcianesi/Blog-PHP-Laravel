@extends('layouts.public')

@section('title', 'Home')

@section('content')
            <hr class="spaziaturahr">           
            <section>
                <div style="float: left; height: 392px; width: 690px">
                    <p class="cloud-organization" style="background-image: url('images/products/nuvola-removebg-preview.png')">
                        Condividi i tuoi pensieri,<br>
                        leggi quelli dei tuoi amici<br>
                        e discutete su un argomento<br>
                        a vostro piacimento all'interno<br>
                        del vostro blog!<br>
                        Tutto con semplicità
                    </p>
                </div>
                <div class="main_element">
                    <div class="unisciti">
                        <h1>Unisciti ad altri utenti</h1>
                        <p> Che tu stia condividendo la tua esperienza,<br>
                            le ultime notizie o qualunque cosa tu abbia in mente,<br> 
                            sei nel posto giusto. <br>
                            Registrati e inizia a creare il tuo blog.</p>  
                    </div>
                    @guest
                    <div class="register_option">
                        <p class="register_button"><a href="{{ route('register') }}" class="highlight" title="Registrati">Registrati subito</a></p>
                     </div>
                    @endguest 
                </div>
                
                <div class="main_element ">
                    <div class="profilo-blog">
                        <h1>Chi può vedere il mio profilo e miei blog?</h1>
                        <p> Normalmente il tuo profilo e i tuoi blog <br>
                            sono visibili da tutti ma, <br>andando nella sezione profilo, <br>
                            potrai rendere visibili i tuoi blog solo dai tuoi amici.
                        </p>  
                    </div>
                </div>
            </section>
       
@endsection
