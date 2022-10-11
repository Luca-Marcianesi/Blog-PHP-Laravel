@extends('layouts.public')

@section('title', 'Dove Siamo')

@section('content')
<hr class="spaziaturahr">
<div class="where">
        <p class="titolo">Dove Siamo?</p>
        <br>
        <iframe width="500" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
        src="http://maps.google.it/maps?f=q&amp;source=s_q&amp;hl=it&amp;geocode=&amp;q=Via+Brecce+Bianche,+12,+Ancona&amp;aq=0&amp;sll=41.442726,12.392578&amp;sspn=23.377375,53.657227&amp;ie=UTF8&amp;hq=&amp;hnear=Via+Brecce+Bianche,+12,+60131+Ancona,+Marche&amp;z=14&amp;ll=43.581248,13.515684&amp;output=embed">
        </iframe><br/>
        <small><a href="http://maps.google.it/maps?f=q&amp;source=embed&amp;hl=it&amp;geocode=&amp;q=Via+Brecce+Bianche,+12,+Ancona&amp;aq=0&amp;sll=41.442726,12.392578&amp;sspn=23.377375,53.657227&amp;ie=UTF8&amp;hq=&amp;hnear=Via+Brecce+Bianche,+12,+60131+Ancona,+Marche&amp;z=14&amp;ll=43.581248,13.515684"
        ><br><p style="font-size: 18px; color: white">Visualizzazione ingrandita della mappa</p></a></small>
</div>
@endsection
