@extends('layouts.app')

@section('title', __('contact.contact'))

@section('content')

    <div class="container center">
        <h1>{{ __('contact.contact') }}</h1>
        <p>{{ __('contact.description') }}</p>
        <form method="POST" action="{{ route('contact') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" name="first_name" type="text" class="validate">
                    <label for="first_name">{{ __('general.first_name') }}</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" name="last_name" type="text" class="validate">
                    <label for="last_name">{{ __('general.last_name') }}</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate">
                    <label for="email">{{ __('general.email') }}</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="subject" name="subject" type="text" class="validate">
                    <label for="subject">{{ __('general.subject') }}</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="message" name="message" class="materialize-textarea"></textarea>
                    <label for="message">{{ __('general.message') }}</label>
                </div>
            </div>
            <div class="row">
                <button class="btn" type="submit">{{ __('general.send') }}</button>
            </div>
        </form>
    </div>
@endsection
