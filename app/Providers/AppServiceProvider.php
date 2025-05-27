<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Obtiene las categorías ordenadas por nombre
        $categories = Category::orderBy('name', 'DESC')
        ->whereNotIn('id',[22])->get();

        // Compartir la variable con todas las vistas
        view()->share('categories', $categories);
    }

}
