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
                                <h4 class="card-title text-shadow">{{ $recipe->name }}
                                    <div style="margin-top: 0.2rem">
                                        @foreach($recipe->categories as $category)
                                            <span class="chip">
                                            {{ $category->name }}
                                        </span>
                                        @endforeach
                                    </div>
                                </h4>
                            </div>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row">
            {{ $recipes->links('vendor.pagination.default') }}
        </div>
    </section>
@endsection
