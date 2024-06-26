<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

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
        Gate::define('usuarios-gestion',function(Usuario $usuario){
            //si se retorna TRUE-->se permite acceso
            //si se retorna FALSE-->se cierra puerta, no hay acceso
            return $usuario->esAdministrador();
        });
        Schema::defaultStringLength(191);

    }
}
