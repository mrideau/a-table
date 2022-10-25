<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function recipes() {
        return $this->belongsToMany(Recipe::class)->withPivot('category_id', 'recipe_id');
    }
}
