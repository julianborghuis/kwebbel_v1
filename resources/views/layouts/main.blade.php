<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>     
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: #6c6fc5;">
        <div class="d-flex flex-grow-1">
            <a class="navbar-brand" href="/">
                Kwebbelweb
            </a>
            <form class="mr-2 my-auto w-100 d-inline-block order-1" action="/search"  method="post">
                @csrf
                <div class="input-group">
                    <input type="text" name="search" class="form-control border border-right-0"
                           placeholder="Zoek profiel of #hashtag">
                    <span class="input-group-append">
                    <button class="invisible" type="submit"></button>
                </span>
                </div>
            </form>
        </div>
        <button class="navbar-toggler order-0" type="button" data-toggle="collapse" data-target="#navbar7">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse flex-shrink-1 flex-grow-0 order-last" id="navbar7">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdownNotifications" aria-labelledby="navbarDropdownMenuLink">
                        <div class="dropdownNotificationsClose">
                            <a href="#">x</a>
                        </div>
                        <div class="dropdownNotification">
                            <h5>Notificatie 1</h5>
                            <p><strong>Lex</strong> heeft u toegevoegd als vriend</p>
                            <hr>
                        </div>
                        <div class="dropdownNotification">
                            <h5>Notificatie 2</h5>
                            <p><strong>Lexxx</strong> heeft iets gepost!</p>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                       @if(Auth::guest())
                       <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                        <img id="profile_avatar" src="https://sanjaymotels.com/wp-content/uploads/2019/01/testimony.png"
                             class="rounded-circle responsive" alt="Profiel">
                         </a>
                        @else
                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                        <img id="profile_avatar" src="data:image/png;base64, {{Auth::user()->avatar}}"
                             class="rounded-circle responsive" alt="Profiel">
                         </a>
                        @endif
                    @if (Auth::guest())
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <form class="px-4 py-3" method="POST" {{ route('login') }}>
                                @csrf
                                <div class="form-group">
                                    <label for="loginEmail">Email</label>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="loginPassword">Wachtwoord</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/me">{{ Auth::user()->username}}</a>
                            <a class="dropdown-item" href="/logout">Log uit</a>
                        </div>
                    @endif
                </li>
            </ul>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
