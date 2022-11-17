<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        // Restreindre connexion aux utilisateurs non-connectés
        $this->middleware('guest')->except('logout');
    }

    /**
     * Affichage de la page de connexion
     */
    public function show() {
        return view('auth.login');
    }

    /**
     * Méthode de connexion
     */
    public function Login(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $credentials = $request->only('email', 'password');

        // Vérification des données entrées
        if(Auth::attempt($credentials, isset($request->remember_me))) {
            // Regeneration d'une session
            $request->session()->regenerate();

            return redirect()->intended(route('home'))->with('message', __('auth.logged_in'));
        }

        return back()->onlyInput('email')->withErrors([
            'login' => __('auth.login_error')
        ]);
    }

    /**
     * Méthode de déconnexion
     */
    public function Logout(Request $request) {
        // Invalidation de la session
        $request->session()->invalidate();

        // Déconnexion
        Auth::logout();

        return redirect(route('home'));
    }
}
