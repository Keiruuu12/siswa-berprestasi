<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    {{-- NAVBAR --}}
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container pb-3">
                <Label>ZAHIRA PERINGKAT</Label>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-toggler-icon">
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a class="nav-link px-4" href="{{ route('siswa.index') }}">Data Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4" href="{{ route('kriteria-siswa.index') }}">Kriteria Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4" href="{{ route('bobot-siswa.index') }}">Bobot Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4" href="{{ route('peringkat-saw.index') }}">Peringkat SAW</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4" href="{{ route('peringkat-ahp.index') }}">Peringkat AHP</a>
                        </li>
                        @if (Auth::user()->role_id === 2)
                        <li class="nav-item">
                            <a class="nav-link px-4" href="{{ route('users.index') }}">User</a>
                        </li>
                        @endif
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-3" style="min-height:550px">
            <div class="row">
                <div class="col-12">

                    @yield('content')
                
                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')

</body>

</html>
