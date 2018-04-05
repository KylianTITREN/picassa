<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Picassa') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
</head>
<body>

<!-- CONTENU -->

    <div id="app">

            <header>

                <div class="brand-name">
                    <a href="{{ url('/') }}" data-pjax><img src="{{asset('img/logo.png')}}" alt=""></a>

                    @auth

                    <p><a href="{{ url('/') }}" data-pjax>{{ config('app.name', 'Picassa') }}</a></p>

                    @endauth
                </div>

                <div class="connected-space">
                    @guest
                    <a href="{{ route('login') }}" style="color:#68D8C3; font-weight: bold; font-size: 24px;">Connexion</a>
                    @else

                    @auth

                    <button class="my-btn"><a href="/nouvelle" data-pjax>Publier</a></button>

                    @endauth

                    <div class="connected-name">
                        <a href="/utilisateur/{{Auth::user()->id}}" data-pjax><div class="profilpic" style="background-image: url('/uploads/avatar/{{ Auth::user()->avatar}}'); background-size: cover; background-position: center;"></div>{{ Auth::user()->name }}</a>
                    </div>

                        @endguest

                </div>

            </header>

        <div class="container">

            @guest

                <div class="startpage">

                                    <strong><a href="{{ url('/') }}" data-pjax>{{ config('app.name', 'Picassa') }}</a></strong>

                                    <p>Créez un compte ou connectez-vous à Picassa. Un moyen simple,
                                        sympa et original de capturer, modifier et partager des photos
                                        avec vos amis et votre famille.</p>


            @endguest

        <main id="pjax-container" class="py-4">
        @yield('content')
        </main>

            @guest

                    <button class="my-btn show_register"><a href="{{route('register')}}">Inscription</a></button>
                </div>

                @endguest

        </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.pjax.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
