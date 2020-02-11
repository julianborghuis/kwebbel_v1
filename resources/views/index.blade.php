@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-7">
        <h1>Kwebbelweb brengt ouderen bij elkaar!</h1>
        <h3>Maak nu je gratis account aan.</h3>
    </div>
    <div class="col-md-3">
    <h3>Registreren</h3>
    <form method="POST" action="{{ route('register') }}">
                        @csrf
            <div class="form-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" required autocomplete="email" name="email" value="{{ old('email') }}" placeholder="Email">
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                 @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control @error('firstName') is-invalid @enderror" id="firstName" required autocomplete="firstname" value="{{ old('firstName') }}" name="firstName" placeholder="Voornaam">
                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                 @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control @error('lastName') is-invalid @enderror" id="lastName" required autocomplete="lastname"  value="{{ old('lastName') }}" name="lastName" placeholder="Achternaam">
                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                 @enderror
            </div>
            <div class="form-group">
                <select required class="form-control @error('province') is-invalid @enderror" id="province" value="{{ old('province') }}" name="province">
                    <option value="Drenthe">Drenthe</option>
                    <option value="Flevoland">Flevoland</option>
                    <option value="Friesland">Friesland</option>
                    <option value="Gelderland">Gelderland</option>
                    <option value="Groningen">Groningen</option>
                    <option value="Limburg">Limburg</option>
                    <option value="Noord-Brabant">Noord-Brabant</option>
                    <option value="Noord-Holland">Noord-Holland</option>
                    <option value="Overijssel">Overijssel</option>
                    <option selected="selected" value="Utrecht">Utrecht</option>
                    <option value="Zeeland">Zeeland</option>
                    <option value="Zuid-Holland">Zuid-Holland</option>
                </select>
                @error('province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                 @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" value="{{ old('city') }}" required autocomplete="city" name="city" placeholder="Woonplaats">
                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                 @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"  value="{{ old('username') }}" required autocomplete="username" name="username" placeholder="Gebruikersnaam">
                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                 @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" required autocomplete="new-password" value="{{ old('password') }}" name="password" placeholder="Wachtwoord">
                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                 @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password_confirmation" required autocomplete="new-password"  value="{{ old('password_confirmation') }}" name="password_confirmation" placeholder="Wachtwoord herhalen">
            </div>
            <button type="submit" class="btn btn-success">
                    {{ __('Register') }}
             </button>
        </form>
    </div>
</div>
@endsection
