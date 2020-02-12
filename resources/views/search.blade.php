@extends('layouts.main')

@section('content')
    <div class="container">
        @if(isset($error))
        <p>{{$error}}</p>
        @endif
        @if(isset($users))
            <h2>Resultaten voor {{$search}}: </h2>
                @foreach($users as $user)
                        <a href="/profile/{{$user->username}}">{{$user->firstname}} {{$user->lastname}}</a>
                        <p>{{$user->username}}</p>
                @endforeach
        @endif
    </div>
@endsection
