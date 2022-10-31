<!doctype html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="A Table! vous proposer des recettes simples mais qui régaleront toute votre famille et vos amis !">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name') }}
        @hasSection('title')
            -
            @yield('title')
        @endif
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('css')
</head>
<body>
    @include('layouts.header')

    <div id="cookies_modal" class="modal">
        <div class="modal-content">
            <h4>Cookie</h4>
            <p>Pas de cookies</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>

    <div id="search_modal" class="modal">
        <div class="modal-content">
            <h4>Rechercher</h4>
            <form method="GET" action="{{ route('recipes.index') }}">
                <div class="input-field">
                    <input placeholder="{{ __('form.search') }}" id="search" type="search" required name="recette">
                </div>
            </form>
        </div>
    </div>

    <main class="app">
        @yield('content')
    </main>

    <div class="ontop">
        <img src="{{ asset('svg/chevron-up-solid.svg') }}" aria-hidden>
    </div>

    @include('layouts.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @if(session()->has('message'))
        <script>
            M.toast({html: '{{ session()->get('message') }}'})
        </script>
    @endif
    @stack('scripts')
</body>
</html>
