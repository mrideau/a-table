@extends('layouts.app')

@section('title', __('recipe.recipes'))

@section('content')
    <section class="container">
        <h1>Recettes</h1>
        @auth()
            <div class="row">
                <a href="{{ route('recipes.create') }}" class="btn">{{ __('general.new') }}</a>
            </div>
        @endif
        <div class="row">
            @foreach($recipes as $recipe)
                <div class="col s12 m6">
                    <a href="{{ route('recipes.show', $recipe) }}">
                        <article class="card card-recipe hoverable">
                            <div class="card-image">
                                <img src="{{ url('storage/'.$recipe->image_path) }}" alt="{{ $recipe->name }}">
                                <span class="card-title">{{ $recipe->name }}
                                    <div>
                                        @foreach($recipe->categories as $category)
                                            <span class="chip">
                                            {{ $category->name }}
                                        </span>
                                        @endforeach
                                    </div>
                                </span>
                            </div>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row">
            {{ $recipes->links('vendor.pagination.default') }}
        </div>
    </secti>
@endsection
