@extends('layouts.main')

@section('content')
{{$userData}}
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="data:image/png;base64, {{$userData->avatar}}" alt="">
        </div>
    </div>
</div>
@endsection