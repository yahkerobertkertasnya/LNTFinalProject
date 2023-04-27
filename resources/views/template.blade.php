<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PT Meksiko</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="overflow-x-hidden" data-bs-theme="dark">
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PT Meksiko Item Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div>
                @if(Auth::check())
                    @if(!session('user')->isAdmin)
                        @if(Request::is('dashboard'))
                            <a href="{{ url('dashboard') }}">
                                <button type="button" class="btn btn-outline-info" style="width: 150px;" disabled>View</button>
                            </a>
                        @else
                            <a href="{{ url('dashboard') }}">
                                <button type="button" class="btn btn-outline-info" style="width: 150px;">View</button>
                            </a>
                        @endif
                    @endif
                    @if(!session('user')->isAdmin)
                            @if(Request::is('facture'))
                                <a href="{{ url('facture') }}">
                                    <button type="button" class="btn btn-outline-info" style="width: 150px;" disabled>Facture</button>
                                </a>
                            @else
                                <a href="{{ url('facture') }}">
                                    <button type="button" class="btn btn-outline-info" style="width: 150px;">Facture</button>
                                </a>
                            @endif
                    @endif
                @endif
            </div>
            <div class="d-flex flex-row-reverse" id="navbarSupportedContent">
                @if(Auth::check())
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="navbar-item align-middle mx-3 my-auto text-white">
                            Welcome {{ session('user')->name }} !
                        </li>
                        <li class="nav-item">
                            <a href={{ url('logout') }}>
                                <button type="submit" class="btn btn-outline-danger">Logout</button>
                            </a>
                        </li>
                    </ul>
                @else
                    <div>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @if(!Request::is('login'))
                                <li class="navbar-item align-middle mx-3 my-auto text-white">
                                    <a href="{{ url('/login') }}">
                                        <button type="submit" class="btn btn-outline-primary">
                                            Login
                                        </button>
                                    </a>
                                </li>
                            @else
                                <li class="navbar-item align-middle mx-3 my-auto text-white">
                                    <a href="{{ url('/login') }}">
                                        <button type="submit" class="btn btn-outline-primary" disabled>
                                            Login
                                        </button>
                                    </a>
                                </li>
                            @endif
                            @if(!Request::is('register'))
                                <li class="navbar-item align-middle mx-3 my-auto text-white">
                                    <a href="{{ url('/register') }}">
                                        <button type="submit" class="btn btn-outline-primary">
                                            Register
                                        </button>
                                    </a>
                                </li>
                            @else
                                <li class="navbar-item align-middle mx-3 my-auto text-white">
                                    <a href="{{ url('/register') }}">
                                        <button type="submit" class="btn btn-outline-primary" disabled>
                                            Register
                                        </button>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </nav>
    @extends('components.error-message')
    @yield('content')
{{--    @extends('components.particles')--}}
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>
