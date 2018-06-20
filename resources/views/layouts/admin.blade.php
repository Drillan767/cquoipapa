<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CkoiPapa - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">{{ config('app.name', 'CKoiPapa') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Client</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Groupe Items</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#"> Items</a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->first_name . Auth::user()->last_name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1><i class="fas fa-{{ $url['fa'] }}"></i> {{ $url['title'] }}</h1>
            </div>
            <div class="col-md-2">
                <div class="dropdown create">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <button class="dropdown-item" type="button">Création Client</button>
                        <button class="dropdown-item" type="button">Création Catégorie</button>
                        <button class="dropdown-item" type="button">Créction Article</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="/admin" class="list-group-item list-group-item-action @if(basename(url()->current()) == 'admin')active @endif d-flex justify-content-between align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-cog"></i>
                            Tableau de bord
                        </div>
                    </a>
                    <a href="/admin/clients" class="list-group-item list-group-item-action @if(basename(url()->current()) == 'clients')active @endif d-flex justify-content-between align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-user"></i>
                            Clients
                        </div>
                        <span class="badge badge-secondary badge-pill">{{ $users }}</span>
                    </a>
                    <a href="/admin/categories" class="list-group-item list-group-item-action @if(basename(url()->current()) == 'categories')active @endif d-flex justify-content-between align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-th-list"></i>
                            Catégories
                        </div>
                        <span class="badge badge-secondary badge-pill">{{ $categories }}</span>
                    </a>
                    <a href="/admin/objets" class="list-group-item list-group-item-action @if(basename(url()->current()) == 'items')active @endif d-flex justify-content-between align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-cubes"></i>
                            Objets
                        </div>
                        <span class="badge badge-secondary badge-pill">{{ $items }}</span>
                    </a>
                </div>
                <div class="card card-body bg-light disk">
                    <h4>Espace Disque</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $disk }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $disk }}%;">
                            {{ $disk }}%
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>
</section>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>
</body>
</html>