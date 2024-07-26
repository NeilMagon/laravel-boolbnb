<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ Vite::asset("resources/images/favicon.png") }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    {{-- Css per la mappa --}}
    <link rel="stylesheet" href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps.css">



</head>

<body>
    <div id="app">

        <header class="navbar navbar-dark sticky-top flex-md-nowrap p-2 shadow" style="background-color: #FF5A5F">
            <div class="logo_laravel">
                <a href="{{ route('admin.dashboard') }}">
                    <img style="width: 150px;" src="{{ Vite::asset("resources/images/logo-white.png") }}" alt="">
                </a>
            </div>
            <div class="ms-auto d-flex align-items-center">
                <div class="nav-item text-nowrap m-2 d-none d-md-block">
                    <a class="btn dashboard-logout px-3 py-2 d-flex align-items-center" href="http://localhost:5174/#/" style="height: 100%;">
                        <i class="fas fa-home pb-1 me-1"></i> Sito Web
                    </a>
                </div>
                <div class="nav-item text-nowrap">
                    <a class="nav-link btn dashboard-logout py-2 px-3 d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <button class="navbar-toggler d-md-none collapsed ms-4 dashboard-collapsed-btn" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </header>

        <div class="container-fluid vh-100">
            <div class="row h-100">
                <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse dashboard-sidebar">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-black dashboard-link {{ Route::is('admin.dashboard') ? 'dashboard-actual-link' : '' }}" href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-table-columns fa-lg me-2 primary-color"></i> Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-black dashboard-link {{ Route::is('admin.apartments.index') ? 'dashboard-actual-link' : '' }}" href="{{ route('admin.apartments.index') }}">
                                    <i class="fa-solid fa-house-user fa-lg me-2 primary-color"></i> Appartamenti
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-black dashboard-link {{ Route::is('admin.apartments.create') ? 'dashboard-actual-link' : '' }}" href="{{ route('admin.apartments.create') }}">
                                    <i class="fa-solid fa-house-medical fa-lg me-2 primary-color"></i> Nuovo affitto
                                </a>
                            </li>

                            <li class="nav-item">
                                @php
                                    $user = Auth::user();
                                    $apartmentIds = \App\Models\Apartment::where('user_id', $user->id)->pluck('id');
                                    $newMessagesCount = \App\Models\Message::whereIn('apartment_id', $apartmentIds)
                                                        ->where('is_read', false)
                                                        ->count();
                                @endphp
                                <a class="nav-link text-black position-relative dashboard-link {{ Route::is('admin.message.index') ? 'dashboard-actual-link' : '' }}" href="{{ route('admin.message.index') }}">
                                    <i class="fa-solid fa-house-flag fa-lg me-2 primary-color"></i> Messaggi
                                    @if($newMessagesCount > 0)
                                        <span class="badge my-badge">{{ $newMessagesCount }}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="nav-item">
                                @php
                                    $user = Auth::user();
                                    $apartmentIds = \App\Models\Apartment::where('user_id', $user->id)->pluck('id');
                                @endphp
                                <a class="nav-link text-black position-relative dashboard-link {{ Route::is('admin.message.trashed') ? 'dashboard-actual-link' : '' }}" href="{{ route('admin.message.trashed') }}">
                                    <i class="fa-solid fa-trash-alt fa-lg me-2 primary-color"></i> Cestino
                                </a>
                            </li>
                            
                        </ul>


                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4 pt-3">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

        <!-- Aggiungi il JavaScript per TomTom Maps -->
        <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps-web.min.js"></script>
</body>

</html>

