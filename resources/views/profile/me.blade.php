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
        <form method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="avatar">Upload profiel foto</label>
                <input type="file" name="avatar" accept="image/*" class="form-control-file" id="avatar">
            </div>
            <button class="btn btn-success">Upload!</button>
        </form>
    </div>
@endsection
