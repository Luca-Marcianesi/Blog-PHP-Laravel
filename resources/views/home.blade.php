@extends('layouts.public')

@section('title', 'Home')

@section('content')            
            <section>
                <div class="main_element">
                    <div class="unisciti">
                        <h1>Unisciti ad altri utenti</h1>
                        <p>Che tu stia condividendo la tua esperienza,<br>
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
                        <p>Normalmente il tuo profilo e i tuoi blog <br>
                            sono visibili da tutti ma, <br>andando nel sezione profilo, <br>
                            potrai rendere visibili i tuoi blog solo dai tuoi amici.
                    </p>  
                    </div>
                </div>
            </section>
       
@endsection
