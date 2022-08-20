<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Builder;

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
        Schema::defaultStringLength(191);

        
        /* creazione di un metodo per eseguire le query per la ricerca degli utenti attraveso una stringa
         con wild-card * */
        Builder::macro('orWhereLike', function(string $column, string $search) {
            return $this->orWhere($column, 'LIKE', $search.'%');
            });
    }
}
