<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
{
    /**
     * Détermner si l'utilisateur est autorisé à faire cette requête
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Récupération des règles de validation qui s'appliquent à la requête
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'categories' => ['required', 'array'],
            'image' => ['image', 'mimes:jpg,bmp,png']
        ];
    }
}
