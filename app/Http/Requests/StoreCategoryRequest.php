<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * * Détermner si l'utilisateur est autorisé à faire cette requête
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
        ];
    }
}
