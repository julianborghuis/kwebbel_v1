@extends('layouts.main')

@section('content')
    <div class="container search_results">
        @if(isset($error))
        <p>{{$error}}</p>
        @endif
        @if(isset($users))
            <h2>Resultaten voor {{$search}}: </h2>
                @foreach($users as $result)
                <div class="media">
                    <img class="align-self-center mr-3 responsive rounded-circle" id="profile_avatar_search" src="data:image/png;base64, {{$result->avatar}}" alt="Profiel">
                    <div class="media-body">
                        <h5 class="mt-0"><a href="/profile/{{$result->username}}"> {{$result->firstname}} {{$result->lastname}}</a></h5>
                        <p class="mb-0">{{$result->username}}</p>
                        <p class="mb-0">{{$result->province}}</P>
                    </div>
                </div>
                @endforeach
        @endif
    </div>
@endsection
