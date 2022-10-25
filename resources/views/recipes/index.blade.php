@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Recettes</h1>
        <ul class="collection">
            @foreach($recipes as $recipe)
                <li class="collection-item">
                    <a href="{{ route('recipes.show', $recipe) }}">
                        {{ $recipe->name }}
                    </a>
                    @foreach($recipe->categories as $category)
                        <span class="badge">
                            <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
                        </span>
                    @endforeach
                </li>
            @endforeach
        </ul>
        {{ $recipes->links() }}
    </div>
@endsection
