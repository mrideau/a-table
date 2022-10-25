@extends('layouts.app')

@section('content')
    <div class="container">
        @if(isset($recipe))
            <h1>{{ $recipe->name }}</h1>
            <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" enctype="multipart/form-data" id="delete_form">
                @method('DELETE')
                @csrf
            </form>
            <form class="grid grid-4" action="{{ route('recipes.update', $recipe) }}" method="POST" enctype="multipart/form-data" id="update_form">
                @method('PATCH')
        @else
            <h1>{{ __('recipe.create_new_recipe') }}</h1>
            <form class="grid grid-4" action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data" id="create_form">
        @endif
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    @if(isset($recipe->image_path))
                        <div>
                            <img src="{{ url('storage/' . $recipe->image_path) }}" alt="Image de la recette}}">
                        </div>
                    @endif
                    <label>{{ __('image') }}</label>
                    <input id="image" name="image" type="file" class="validate">
                </div>
                <div class="input-field col s12">
                    <input placeholder="{{  __('name') }}" id="name" name="name" type="text" class="validate" value="{{ $recipe->name ?? old('name') }}">
                    <label for="name">{{ __('name') }}</label>
                </div>
                <div class="input-field col s12">
                    <select name="categories[]" multiple>
{{--                        <option value="" disabled>Choose your option</option>--}}
                        @foreach($categories as $category)
                            <option
                                @if(isset($recipe->categories))
                                    @foreach($recipe->categories as $recipe_category)
                                        {{ $category->id == $recipe_category->id ? 'selected' : '' }}
                                    @endforeach
                                @endif
                                {{ (collect(old('categories'))->contains($category->id)) ? 'selected':'' }}
                                value="{{ $category->id }}">{{ $category->name }} </option>
                        @endforeach
                    </select>
                    <label>{{ __('category.categories') }}</label>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="description" name="description" class="materialize-textarea"></textarea>
                        <label for="description">DESCRIPTION</label>
                    </div>
                </div>
            </div>
            <div>
                @if($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif
            </div>
            <a class="btn" href="/">{{ __('form.cancel') }}</a>
            @if(isset($recipe))
                <button class="btn" type="submit" form="update_form">{{ __('form.update') }}</button>
                <button class="btn" type="submit" form="delete_form">{{ __('form.delete') }}</button>
            @else
                <button class="btn" type="submit" form="create_form">{{ __('form.save') }}</button>
            @endif
        </form>
    </div>
@endsection
