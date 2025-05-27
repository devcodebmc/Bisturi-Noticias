<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Category extends Model
{
    use Sluggable;
    use SluggableScopeHelpers; //para poder utilizar el findBySlugOrFail en el controlador FrontController

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $table = "categories"; // Indicando a qué tabla o migración apunta.

    protected $fillable = ['name']; // Esto indica qué campos queremos que traiga de la DB.

    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

    // Relación con subcategorías
    public function subcategories()
    {
        return $this->hasMany('App\Models\Subcategory', 'category_id');
    }

    // SCOPE
    public function scopeSearchCategory($query, $name)
    {
        return $query->where('name', '=', $name);
    }
}
