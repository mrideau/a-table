@extends('layouts.app')

@section('content')

    <div class="container center">
        <h1>A Table !</h1>
        <p>La simplicité à portée de mains !</p>
    </div>

    <div class="container">
        <h2 class="center">Dernières recettes</h2>
        <div class="row">

            @foreach($last_recipes as $recipe)
                <div class="col s12 m4">
                    <a href="{{ route('recipes.show', $recipe) }}">
                        <div class="card">
                            <div class="card-image">
                                <img
                                    src="{{ url('storage/' . $recipe->image_path) }}"
                                    alt="Image de {{ $recipe->name }}">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">{{ $recipe->name }}</span>
{{--                                <p><a href="#">Voir</a></p>--}}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <h2 class="center">Catégories</h2>
        <div class="row">
            <div class="col s12 m8 offset-m2">
                <div class="collection">
                    <a href="#!" class="collection-item"><span class="badge">1</span>Alan</a>
                    <a href="#!" class="collection-item"><span class="badge">4</span>Alan</a>
                    <a href="#!" class="collection-item">Alan</a>
                    <a href="#!" class="collection-item"><span class="badge">14</span>Alan</a>
                </div>
            </div>
        </div>
    </div>

@endsection
