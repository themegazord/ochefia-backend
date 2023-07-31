<?php

namespace App\Providers;

use App\Repositories\Eloquent\Autenticacao\UsuarioRepository;
use App\Repositories\Interfaces\Autenticacao\IUsuario;
use App\Services\Autenticacao\CadastroService;
use App\Services\Autenticacao\LoginService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->scoped(CadastroService::class, function(Application $app) {
            $usuarioRepository = $app->make(IUsuario::class);
            return new CadastroService($usuarioRepository);
        });
        $this->app->scoped(LoginService::class, function(Application $app) {
            $usuarioRepository = $app->make(IUsuario::class);
            return new LoginService($usuarioRepository);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(IUsuario::class, UsuarioRepository::class);
    }
}
