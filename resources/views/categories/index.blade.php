@extends('layouts.app')

@section('title', __('category.categories'))

@section('content')
    <div class="container">
        <h1>{{ __('category.categories') }}</h1>
        @auth()
            <div class="row">
                <a href="{{ route('categories.create') }}" class="btn">{{ __('general.new') }}</a>
            </div>
        @endif
        <div class="row">
            @foreach($categories as $category)
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
