@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('category.create_new_category') }}</h1>

        @if(isset($category))
            <form action="{{ route('categories.destroy', $category) }}" method="POST" enctype="multipart/form-data" id="delete_form">
                @method('DELETE')
                @csrf
            </form>
            <form class="grid grid-4" action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data" id="update_form">
                @method('PATCH')
        @else
            <form class="grid grid-4" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" id="create_form">
        @endif
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input id="name" name="name" type="text" class="validate" value="{{ $category->name ?? old('name') }}">
                    <label for="name">{{ __('category.name') }}</label>
                </div>
            </div>
            <div class="row text-accent-1">
                @if($errors->any())
                    {!! implode('', $errors->all('<div style="color: red;">:message</div>')) !!}
                @endif
            <div/>
            <div class="row">
                <a class="btn" href="/">{{ __('form.cancel') }}</a>
                @if(isset($category))
                    <button class="btn" type="submit" form="update_form">{{ __('form.update') }}</button>
                    <button class="btn" type="submit" form="delete_form">{{ __('form.delete') }}</button>
                @else
                    <button class="btn" type="submit" form="create_form">{{ __('form.save') }}</button>
                @endif
            </div>
        </form>
    </div>
@endsection
