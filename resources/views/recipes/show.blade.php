@extends('layouts.app')

@section('content')
    <div class="parallax-container">
        <div class="parallax"><img src="{{ url('storage/'.$recipe->image_path) }}"></div>
    </div>
    <div class="container">
        <a href="{{ route('recipes.edit', $recipe) }}" class="btn">{{ __('form.edit') }}</a>
        <h1>{{ $recipe->name }}</h1>
        @foreach($recipe->categories as $category)
            <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
        @endforeach
        <p>{{ $recipe->description }}</p>
    </div>
@endsection
