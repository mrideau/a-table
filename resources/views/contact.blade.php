@extends('layouts.app')

@section('content')

    <div class="container center">
        <h1>Contact</h1>
        <p>Lorem</p>
        <form method="POST" action="{{ route('contact') }}" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" name="first_name" type="text" class="validate">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" name="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <button class="btn" type="submit">Envoyer</button>
        </form>
    </div>
@endsection
