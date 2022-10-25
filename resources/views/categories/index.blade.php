@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Categories</h1>
        <ul class="collapsible">
            @foreach($categories as $category)
                <li>
                    <div class="collapsible-header">{{ $category->name }}</div>
                    <div class="collapsible-body">
                        <ul class="collection">
                            @if(count($category->recipes) > 0)
                                @foreach($category->recipes as $recipe)
                                    <li class="collection-item">
                                        <a href="{{ route('recipes.show', $recipe) }}">{{ $recipe->name }}</a>
                                    </li>
                                @endforeach
                            @else
                                <li class="collection-item">Aucunes Recettes</li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
