@extends('layouts.app')

@section('content')

    <div class="hero" style="background-image: url('{{ asset('images/food01.jpg') }}')">
        <div class="hero-content">
            <h1 class="text-shadow">A Table !</h1>
            <h2 class="text-shadow flow-text">{{ __('general.catch_phrase') }}</h2>
            <a href="{{ route('recipes.index') }}" class="btn">{{ __('recipe.view_recipes') }}</a>
        </div>
    </div>

    <div class="container">
        <h2>{{ __('recipe.last_recipes') }}</h2>
        <div class="row">
            @foreach($last_recipes as $recipe)
                <div class="col s12 m6">
                    <a href="{{ route('recipes.show', $recipe) }}">
                        <div class="card card-recipe hoverable">
                            <div class="card-image">
                                <img
                                    src="{{ url('storage/' . $recipe->image_path) }}"
                                    alt="Image de {{ $recipe->name }}"
                                    loading="lazy"
                                >
                                <h4 class="card-title">{{ $recipe->name }}</h4>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

            <h2>{{ __('story.story') }}</h2>
        <div class="card horizontal">
            <div class="card-image">
                <img class="avatar" src="{{ asset('images/colette.jpg') }}" alt="Photo Colette" loading="lazy">
            </div>
            <div class="card-content">
                <p style="margin: 0">{{ __('story.description') }}</p>
                <div style="margin-top: 1rem">
                    <a class="btn" href="{{ route('recipes.index') }}">{{ __('recipe.recipes') }}</a>
                    <a class="btn" href="{{ route('categories.index') }}">{{ __('category.categories') }}</a>
                </div>
            </div>

        </div>
    </div>
@endsection
