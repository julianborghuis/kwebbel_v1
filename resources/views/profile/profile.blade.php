@extends('layouts.main')
@section('content')
<div class="container-fluid">
@if((session('success')))
    <div class="col-md-12 alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            {{session('success')}}
    </div>
@endif
@if((session('error')))
    <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            {{session('error')}}
    </div>
@endif
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
                            <a class="dropdown-item profileHeaderQuickLinksDropDownItem" href="#">Profiel URL</a>
                            <a class="dropdown-item profileHeaderQuickLinksDropDownItem" href="#">Rapporteer</a>
                            <a class="dropdown-item profileHeaderQuickLinksDropDownItem" href="#">Blokkeer</a>
                        </div>
                    </li>
                    @if((!$friend))
                    <li class="list-inline-item">
                    <form method="POST" action="/profile/action/addfriend">
                    @csrf
                        <button class="profileHeaderAddFriend" name="incommingFriendRequest" value="{{$userData->id}}"><i class="fas fa-user-plus"></i></button>
                        <input class="invisible" hidden name="username" value="{{$userData->username}}"></input>
                    </form>
                    </li>
                    @else
                    <li class="list-inline-item">
                    <form method="POST" action="/profile/action/removefriend">
                    @csrf
                        <button class="profileHeaderRemoveFriend" name="incommingFriendRemoval" value="{{$userData->id}}"><i class="fas fa-user-minus"></i></button>
                        <input class="invisible" hidden name="username" value="{{$userData->username}}"></input>
                    </form>
                    </li>
                    @endif
                </ul>
        </div>
    </div>
</div>
    <div class="container-fluid profileMain">
        <div class="row">
            <div class="col-md-4 profileMainInfo">
                <div class="profileMainInfoHeader">
                    <h5>Profiel</h5>
                </div>
                <img class="responsive-img profileAvatar rounded mx-auto d-block" src="data:image/png;base64, {{$userData->avatar}} " alt="">
                <h4 class="profileMainInfoName">{{$userData->firstname}} {{$userData->lastname}}</h4>
                <hr id="pictureInfoSplitter">
                <p>Hier komt een klein tekstje geschreven door de gebruiker :).</p>
            </div>
            <div class="col-md-5 profileMainInfoRight">
                <h2>Hihi</h2>
                <p>Nog meer shit</p>
            </div>
            <div class="col-md-3">
                <div class="friendsHeader">
                    <h5><i class="fas fa-user-friends"></i>Vrienden: </h5>
                </div>
                <div class="friendsMain">
                    @foreach($friends as $friend)
                    <div class="profileFriend col-md-4">
                    <a class="profileFriendLink text-center text-sm-right" href="/profile/{{$friend->username}}">
                       <img class="responsive" src="data:image/png;base64, {{$friend->avatar}}" >
                       {{$friend->firstname}} {{$friend->lastname}}
                       </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection