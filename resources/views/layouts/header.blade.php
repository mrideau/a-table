<header class="header">


    <nav class="nav">
        <div class="nav-wrapper">
            <a href="/" class="brand-logo">
                <img class="logo" src="{{ asset('images/logo.png') }}" alt="Site Logo"/>
            </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger">
                <img class="burger" aria-hidden src="{{ asset('svg/bars-solid.svg') }}"/>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a class="btn modal-trigger" href="#search_modal">Rechercher</a></li>
                <li><a href="{{ route('recipes.index') }}">{{ __('recipe.recipes') }}</a></li>
                <li><a href="{{ route('categories.index') }}">{{ __('category.categories') }}</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                @auth()
                    <li><a class="btn" href="{{ route('auth.logout') }}">{{ __('auth.logout') }}</a></li>
                @endif
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a class="btn modal-trigger" href="#search_modal">Rechercher</a></li>
        <li><a href="{{ route('recipes.index') }}">{{ __('recipe.recipes') }}</a></li>
        <li><a href="{{ route('categories.index') }}">{{ __('category.categories') }}</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        @auth()
            <li><a class="btn" href="{{ route('auth.logout') }}">{{ __('auth.logout') }}</a></li>
        @endif
    </ul>
</header>
