@extends('layouts.main')

@section('content')
    <div class="container">
        @if(isset($error))
        <p>{{$error}}</p>
        @endif
        @if(isset($users))
            <h2>Resultaten: </h2>
                @foreach($users as $user)

                        <p>{{$user->name}}</p>
                @endforeach
        @endif
    </div>
@endsection
