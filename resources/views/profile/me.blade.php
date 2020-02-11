@extends('layouts.main')

@section('content')
    <div class="container">
        <form method="POST" action="">
        @csrf
            <div class="form-group">
                <label for="avatar">Upload profiel foto</label>
                <input type="file" name="avatar" accept="image/*" class="form-control-file" id="avatar">
            </div>
            <button class="btn btn-success">Upload!</button>
        </form>
    </div>
@endsection
