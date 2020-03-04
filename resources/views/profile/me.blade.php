@extends('layouts.main')
@section('content')
@if(isset($message))
    <div class="container">
        <div class="row">
            <div class="col-md-12 alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            {{$message}}
            </div>
        </div>
    </div>
@endif
<div class="container">
        <div class="row">
            <div class="col-md-7">
                <form method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="avatar">Upload profiel foto</label>
                        <input type="file" name="avatar" accept="image/*" class="form-control-file" id="avatar">
                    </div>
                    <button class="btn btn-success">Upload!</button>
                </form>
            </div>
            <div class="col-md-5">
            <h4 class="friendRequestsHeader text-center">Vriendschap verzoeken</h4>
                <div class="friendRequests">
                @isset($friend_requests)
                @foreach($friend_requests as $friend_request)
                <div class="media friendRequest">
                <img src="data:image/png;base64, {{$friend_request->avatar}}" class="rounded-circle responsive friend_request_avatar" alt="vrienden verzoek">
                    <div class="media-body">
                        <p class="friendRequestUsername">{{$friend_request->username}}</p>
                        <form method="POST" action="/me/action/addFriend">
                            @csrf
                            <button class="friendRequestAccept" name="addFriend" value="{{$friend_request->user_id}}">Toevegen</button>
                            <input class="invisible" hidden name="friend_id" value="{{$friend_request->user_id}}"></input>
                        </form>
                        <form method="POST" action="/me/action/addFriend">
                            @csrf
                            <button class="friendRequestDeny" name="denyFriend" value="{{$friend_request->user_id}}">Negeren</button>
                            <input class="invisible" hidden name="friend_id" value="{{$friend_request->user_id}}"></input>
                        </form>
                    </div>
                </div>
                <hr>
                @endforeach
                @endisset
                @empty($friend_requests)
                <p>Geen vriendschap verzoeken.</p>
                @endempty
                </div>
            </div>
        </div>
    </div>
@endsection
