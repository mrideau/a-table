@extends('layouts.app')

@section('content')
   <div class="container">
       <h1>Connexion</h1>
       @error('login')
        <span class="">{{ $message }}</span>
       @enderror
       <form method="POST" action="{{ route('auth.login') }}" enctype="multipart/form-data">
           @csrf
           <div class="row">
               <div class="input-field col s12">
                   <input id="email" name="email" type="email" class="validate" value="{{ old('email') }}">
                   <label for="email">Email</label>
               </div>
           </div>
           <div class="row">
               <div class="input-field col s12">
                   <input id="password" name="password" type="password" class="validate">
                   <label for="password">Password</label>
               </div>
           </div>
           <div class="row">
               <label>
                   <input type="checkbox" class="filled-in" checked="checked" id="remember_me"/>
                   <span>{{ __('login.remember_me') }}</span>
               </label>
           </div>
           <button class="btn" type="submit">{{ __('auth.login') }}</button>
       </form>
   </div>
@endsection
