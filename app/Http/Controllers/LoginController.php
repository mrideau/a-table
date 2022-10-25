<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show() {
        return view('auth.login');
    }

    public function Login(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        // Vérification des données entrées
        if(Auth::attempt($credentials, isset($request->remember_me))) {
            // Regeneration d'une session
            $request->session()->regenerate();

            return redirect()->intended(route('home'))->with('message', __('auth.logged_in'));;
        }

        return back()->onlyInput('email')->withErrors([
            'login' => __('auth.login_error')
        ]);
    }

    public function Logout(Request $request) {
        $request->session()->invalidate();
        Auth::logout();
        return redirect(route('home'));
    }
}
