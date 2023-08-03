<?php

namespace App\Providers;

use App\Actions\Endereco\ValidaDadosCEP;
use App\Repositories\Eloquent\Autenticacao\UsuarioRepository;
use App\Repositories\Eloquent\Empresa\EmpresaRepository;
use App\Repositories\Eloquent\Endereco\EnderecoRepository;
use App\Repositories\Interfaces\Autenticacao\IUsuario;
use App\Repositories\Interfaces\Empresa\IEmpresa;
use App\Repositories\Interfaces\Endereco\IEndereco;
use App\Services\Autenticacao\CadastroService;
use App\Services\Autenticacao\LoginService;
use App\Services\Empresa\EmpresaService;
use App\Services\Endereco\EnderecoService;
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
        $this->app->scoped(EmpresaService::class, function(Application $app) {
            $empresaRepository = $app->make(IEmpresa::class);
            return new EmpresaService($empresaRepository);
        });
        $this->app->scoped(EnderecoService::class, function(Application $app) {
            $enderecoRepository = $app->make(IEndereco::class);
            $validaCEP = $app->make(ValidaDadosCEP::class);
            return new EnderecoService($enderecoRepository, $validaCEP);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(IUsuario::class, UsuarioRepository::class);
        $this->app->bind(IEmpresa::class, EmpresaRepository::class);
        $this->app->bind(IEndereco::class, EnderecoRepository::class);
    }
}
