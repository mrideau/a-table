<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        // Restreindre création aux utilisateurs connectés
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Affichage de liste des ressources
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Affichage du formulaire de création
     */
    public function create()
    {
        return $this->edit();
    }

    /**
     * Stockage de la nouvelle ressource
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();

        $this->update($request, $category);

        return redirect()->route('categories.show', $category)->with(['message' => __('category.created')]);
    }

    /**
     * Affichage de la ressource
     */
    public function show(Category $category)
    {
        $recipes = $category->recipes()->paginate();
        return view('categories.show', compact('category', 'recipes'));
    }

    /**
     * Affichage du formulaire d'édition de la ressource
     */
    public function edit(Category $category = null)
    {
        return view('categories.create-edit', compact('category'));
    }

    /**
     * Mise à jour de la ressource
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->fill(request()->only('name'));

        $category->slug = Str::slug($category->name);

        $category->save();

        return redirect()->route('categories.show', $category)->with(['message' => __('category.updated')]);
    }

    /**
     * Suppression de la ressource
     */
    public function destroy(Category $category)
    {
        $category->recipes()->detach();
        $category->deleteOrFail();
        return redirect()->route('home')->with(['message' => __('category.deleted')]);
    }
}
