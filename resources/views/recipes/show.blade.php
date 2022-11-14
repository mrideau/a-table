@extends('layouts.app')

@section('title', $recipe->name)

@section('content')
    <div class="recipe-image" style="background-image: url('{{ url('storage/'.$recipe->image_path) }}') ">
        <h1 class="white-text text-shadow">{{ $recipe->name }}</h1>
        <div class="row">
            @foreach($recipe->categories as $category)
                <a href="{{ route('categories.show', $category) }}">
                    <span class="chip">
                        {{ $category->name }}
                    </span>
                </a>
            @endforeach
        </div>
        @auth
            <a href="{{ route('recipes.edit', $recipe) }}" class="btn">{{ __('form.edit') }}</a>
        @endif
    </div>
    <div class="container">
        <p class="flow-text" style="white-space: break-spaces;">{{ $recipe->description }}</p>
    </div>
@endsection
