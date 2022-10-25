<!doctype html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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

    <div class="app">

        @yield('content')

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
