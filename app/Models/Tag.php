<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    protected $fillable = ['name'];


    public function articles(){

        return $this->belongsToMany(Article::class)->withTimestamps();
    }

    // Configuración de scope para el tag name
    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'LIKE', "%$name%");
    }

    // SCOPE
    public function scopeSearchTag($query, $name){
        return $query->where('name', '=', $name);
    }

}
