@extends('layouts.app')

@section('content')
   <div class="container">
       <h1>Connexion</h1>
       @error('login')
         <p>{{ $message }}</p>
       @enderror
       <form method="POST" action="{{ route('auth.login') }}" enctype="multipart/form-data">
           @csrf
           <div class="row">
               <div class="input-field col s12">
                   <input id="email" name="email" type="email" class="validate" value="{{ old('email') }}">
                   <label for="email">{{ __('auth.email') }}*</label>
               </div>
               @error('email')
               <p>{{ __($message) }}</p>
               @enderror
           </div>
           <div class="row">
               <div class="input-field col s12">
                   <input id="password" name="password" type="password" class="validate">
                   <label for="password">{{ __('auth.password') }}*</label>
               </div>
               @error('password')
               <p>{{ __($message) }}</p>
               @enderror
           </div>
           <div class="row">
               <label>
                   <input type="checkbox" class="filled-in" checked="checked" id="remember_me"/>
                   <span>{{ __('auth.remember_me') }}</span>
               </label>
           </div>
           <button class="btn" type="submit">{{ __('auth.login') }}</button>
       </form>
   </div>
@endsection
