<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\Usuario;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin-gestion',function(Usuario $usuario){
            //si se retorna TRUE-->se permite acceso
            //si se retorna FALSE-->se cierra puerta, no hay acceso
            return $usuario->esAdministrador();
        });


    }
}
