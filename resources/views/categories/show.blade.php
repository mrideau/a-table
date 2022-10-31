@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="container">
        @auth
            <a href="{{ route('categories.edit', $category) }}" class="btn">{{ __('form.edit') }}</a>
        @endif
        <h1>{{ $category->name }}</h1>
        <div class="row">
            @foreach($category->recipes as $recipe)
                <div class="col s12 m6">
                    <a href="{{ route('recipes.show', $recipe) }}">
                        <div class="card card-recipe hoverable">
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
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
