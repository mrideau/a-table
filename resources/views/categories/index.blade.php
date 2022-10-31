@extends('layouts.app')

@section('title', __('category.categories'))

@section('content')
    <div class="container">
        <h1>{{ __('category.categories') }}</h1>
        <div class="row">
            @foreach($categories as $category)
{{--                <li>--}}
{{--                    <div class="collapsible-header">{{ $category->name }}</div>--}}
{{--                    <div class="collapsible-body">--}}
{{--                        <ul class="collection">--}}
{{--                            @if(count($category->recipes) > 0)--}}
{{--                                @foreach($category->recipes as $recipe)--}}
{{--                                    <li class="collection-item">--}}
{{--                                        <a href="{{ route('recipes.show', $recipe) }}">{{ $recipe->name }}</a>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            @else--}}
{{--                                <li class="collection-item">Aucunes Recettes</li>--}}
{{--                            @endif--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
                @if(count($category->recipes) > 0)
                    <a href="{{ route('categories.show', $category) }}">
                        <span class="chip">
                            {{ $category->name }}
                        </span>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
@endsection
