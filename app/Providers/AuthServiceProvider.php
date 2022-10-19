<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
            // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {
            return $user->hasRole('admin');
        });

        Gate::define('isUser', function ($user) {
            return $user->hasRole('user');
        });

        Gate::define('isStaf', function ($user) {
            return $user->hasRole('staf');
        });

        Gate::define('isGestore', function ($user) {
            return $user->hasRole(['staf','admin']);
        });

        Gate::define('isPublic', function ($user) {
            return $user->visibility();
        });

        Gate::define('utenteVisibile',function ($user,$id) {
            return  \App\Models\GestoreRicerca::accountVisibile($id);
        });
        

        Gate::define('isFriend', function ($user,$id) {
            return  \App\Models\GestoreAmici::isFriend($id);
        });

        Gate::define('isRifiutata', function ($user,$id) {
            return  \App\Models\GestoreAmici::isRifiutata($id);
        });

        Gate::define('isSospesa', function ($user,$id) {
            return  \App\Models\GestoreAmici::isSospesa($id);
        });

        Gate::define('richiedereAmicizia', function ($user,$id) {
            return  \App\Models\GestoreAmici::richiedereAmicizia($id);
        });

        Gate::define('autorizzato', function ($user,$userId,$blogId) {
            return  \App\Models\GestoreBlog::accesso($userId,$blogId);
        });


    }
}
