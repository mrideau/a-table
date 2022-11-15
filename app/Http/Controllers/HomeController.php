<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Affichage de la page d'accueil'
     */
    public function show() {
        // Récupération des 2 dernières recettes
        $last_recipes = Recipe::orderBy('created_at', 'desc')->limit(2)->get();

        return view('home', compact('last_recipes'));
    }
}
