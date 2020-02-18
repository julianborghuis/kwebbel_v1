@extends('layouts.main')

@section('content')
{{-- {{dd($userData)}} --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 profileHeader">
                <h3 class="profileHeaderName">{{$userData->firstname}} {{$userData->lastname}}</h3>
                <p class="profileHeaderLocation">{{$userData->province}}, {{$userData->city}}</p>
                <ul class="profileHeaderQuickLinks list-inline">
                    <li class="list-inline-item"><a href="#">Over</a></li>
                    <li class="list-inline-item"> | </li>
                    <li class="list-inline-item"><a href="#">Vrienden</a></li>
                    <li class="list-inline-item"> | </li>
                    <li class="list-inline-item"><a href="#">Foto's</a></li>
                    <li class="list-inline-item"> | </li>
                    <li class="list-inline-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Meer</a>
                    <div class="dropdown-menu profileHeaderQuickLinksDropDown" aria-labelledby="profileHeaderMore">
                            <a class="dropdown-item profileHeaderQuickLinksDropDownItem" href="#">Action</a>
                            <a class="dropdown-item profileHeaderQuickLinksDropDownItem" href="#">Another action</a>
                            <a class="dropdown-item profileHeaderQuickLinksDropDownItem" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
        </div>
    </div>
</div>
    <div class="container-fluid profileMain">
        <div class="row">
            <div class="col-md-4 profileMainInfo">
                <img class="responsive-img profileAvatar rounded mx-auto d-block" src="data:image/png;base64, {{$userData->avatar}} " alt="">
                <h4 class="profileMainInfoName">{{$userData->firstname}} {{$userData->lastname}}</h4>
                <hr id="pictureInfoSplitter">
                <p>Hier komt een klein tekstje geschreven door de gebruiker :).</p>
            </div>
            <div class="col-md-8 profileMainInfoRight">
                <h2>Hihi</h2>
                <p>Nog meer shit</p>
            </div>
        </div>
    </div>
@endsection