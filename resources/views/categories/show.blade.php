@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('categories.edit', $category) }}" class="btn">{{ __('form.edit') }}</a>
        <h1>{{ $category->name }}</h1>
        <ul class="collection">
            @foreach($category->recipes as $recipe)
                <li class="collection-item">
                    <a href="{{ route('recipes.show', $recipe) }}">{{ $recipe->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
