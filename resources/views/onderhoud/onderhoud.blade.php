@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row align-items-center">
        <div class="col">
            <img alt="In onderhoud" src="{{asset('img/onderhoud.jpg')}}"/>
            <h2>Kwebbelweb</h2>
            <p>Kwebbelweb is momenteel in onderhoud! Wij hopen U binnenkort meer informatie te kunnen geven. <br> Voor
                meer
                informatie mail naar:</p>
            <a href="mailto:hello@lexmakesyour.site">hello@lexmakesyour.site</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <a class="text-black-50" href="/home">Ga naar ontwikkelomgeving</a>
        </div>
    </div>
</div>
@endsection
