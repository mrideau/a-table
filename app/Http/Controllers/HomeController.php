<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show() {
        $last_recipes = Recipe::orderBy('created_at', 'desc')->limit(3)->get();
//        categories = Category::orderBy('created_at', 'desc')->limit(3)->get();

        return view('home', compact('last_recipes'));
    }
}
