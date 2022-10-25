<header class="header">


    <nav class="nav-extended">
        <nav>
            <div class="nav-wrapper">
                <a href="/" class="brand-logo">A Table</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="{{ route('recipes.index') }}">{{ __('recipe.recipes') }}</a></li>
                    <li><a href="{{ route('categories.index') }}">{{ __('category.categories') }}</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    @auth()
                        <li><a class="btn" href="{{ route('auth.logout') }}">{{ __('auth.logout') }}</a></li>
                    @endif
                </ul>
            </div>
        </nav>
        <div class="nav-content">
{{--            <span class="nav-title">Title</span>--}}
{{--            <a class="btn-floating btn-large halfway-fab waves-effect waves-light teal">--}}
{{--                <i class="material-icons">add</i>--}}
{{--            </a>--}}
            <form method="GET" action="{{ route('recipes.index') }}">
                <div class="input-field">
                    <input placeholder="{{ __('form.search') }}" id="search" type="search" required name="recette">
{{--                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>--}}
{{--                    <i class="material-icons">close</i>--}}
                </div>
            </form>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
    </ul>
</header>
