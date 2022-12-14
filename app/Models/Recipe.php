<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $perPage = 10;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $guarded = [
        'slug',
        'image_path',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('category_id', 'recipe_id');
    }
}
