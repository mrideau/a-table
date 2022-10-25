<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipeRequest;
use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Customisation Pagination : https://laravel.com/docs/8.x/pagination#customizing-the-pagination-view
        $recipes = null;
        $req = request('recette');

        if ($req) {
            $recipes = Recipe::where('name', 'Like', '%' . $req . '%')->paginate();
        } else {
            $recipes = Recipe::paginate();
        }

        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->edit();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreRecipeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipeRequest $request)
    {
        $recipe = new Recipe();

        $this->update($request, $recipe);

        return redirect()->route('recipes.show', $recipe)->with(['message' => __('recipe.created')]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe = null)
    {
        $categories = Category::all(['id', 'name']);
        return view('recipes.create-edit', compact('categories', 'recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateRecipeRequest $request
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRecipeRequest $request, Recipe $recipe)
    {
        // Assignation de masse
        $recipe->fill($request->all());

        // Création et assignation du slug
        $recipe->slug = Str::slug($recipe->name);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();

//            $img = Image::make($image->getRealPath());
//            $img->resize(120, 120, function ($constraint) {
//                $constraint->aspectRatio();
//            });

            // Si on avait une image existante on la supprime
            if (Storage::exists($recipe->image_path)) {
                Storage::delete($recipe->image_path);
            }

            // Stockage de l'image
            $path = $request->image->storeAs('images', $fileName);

            // Assignation du chemin de l'image enregistrée
            $recipe->image_path = $path;
        }

        // Enregistrement de la arecette
        $recipe->save();

        // Suppression des anciens liens
        $recipe->categories()->detach();

        // Création des nouveaux liens
        foreach ($request->categories as $category_id) {
            $recipe->categories()->attach($category_id);
        }

        return redirect()->route('recipes.show', $recipe)->with(['message' => __('recipe.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        if (Storage::exists($recipe->image_path)) {
            Storage::delete($recipe->image_path);
        }
        $recipe->categories()->detach();
        $recipe->deleteOrFail();
        return redirect()->route('home')->with(['message' => __('recipe.deleted')]);
    }
}
