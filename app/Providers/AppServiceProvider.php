<?php

namespace App\Providers;

use App\Actions\Endereco\ValidaDadosCEP;
use App\Repositories\Eloquent\Autenticacao\UsuarioRepository;
use App\Repositories\Eloquent\Cliente\ClienteRepository;
use App\Repositories\Eloquent\Empresa\EmpresaRepository;
use App\Repositories\Eloquent\Endereco\EnderecoRepository;
use App\Repositories\Eloquent\Estoque\Classe\ClasseProdutoRepository;
use App\Repositories\Eloquent\Estoque\Fabricante\FabricanteProdutoRepository;
use App\Repositories\Eloquent\Estoque\Grupo\GrupoProdutoRepository;
use App\Repositories\Eloquent\Estoque\Produto\ProdutoRepository;
use App\Repositories\Eloquent\Estoque\SubGrupo\SubGrupoProdutoRepository;
use App\Repositories\Eloquent\Estoque\Unidade\UnidadeRepository;
use App\Repositories\Eloquent\Financeiro\FormaPgto\FormaPgtoRepository;
use App\Repositories\Eloquent\Financeiro\PrazoPgto\PrazoPgtoRepository;
use App\Repositories\Eloquent\Financeiro\PrazoPgtoDias\PrazoPgtoDiasRepository;
use App\Repositories\Eloquent\Funcionario\FuncionarioRepository;
use App\Repositories\Interfaces\Autenticacao\IUsuario;
use App\Repositories\Interfaces\Cliente\ICliente;
use App\Repositories\Interfaces\Empresa\IEmpresa;
use App\Repositories\Interfaces\Endereco\IEndereco;
use App\Repositories\Interfaces\Estoque\Classe\IClasseProduto;
use App\Repositories\Interfaces\Estoque\Fabricante\IFabricanteProduto;
use App\Repositories\Interfaces\Estoque\Grupo\IGrupoProduto;
use App\Repositories\Interfaces\Estoque\Produto\IProduto;
use App\Repositories\Interfaces\Estoque\SubGrupo\ISubGrupoProduto;
use App\Repositories\Interfaces\Estoque\Unidade\IUnidade;
use App\Repositories\Interfaces\Financeiro\FormaPgto\IFormaPgto;
use App\Repositories\Interfaces\Financeiro\PrazoPgto\IPrazoPgto;
use App\Repositories\Interfaces\Financeiro\PrazoPgtoDias\IPrazoPgtoDias;
use App\Repositories\Interfaces\Funcionarios\IFuncionario;
use App\Services\Autenticacao\CadastroService;
use App\Services\Autenticacao\LoginService;
use App\Services\Cliente\ClienteService;
use App\Services\Empresa\EmpresaService;
use App\Services\Endereco\EnderecoService;
use App\Services\Estoque\Classe\ClasseProdutoService;
use App\Services\Estoque\Fabricante\FabricanteProdutoService;
use App\Services\Estoque\Grupo\GrupoProdutoService;
use App\Services\Estoque\Produto\ProdutoService;
use App\Services\Estoque\SubGrupo\SubGrupoProdutoService;
use App\Services\Estoque\Unidade\UnidadeService;
use App\Services\Financeiro\FormaPgto\FormaPgtoService;
use App\Services\Financeiro\PrazoPgto\PrazoPgtoService;
use App\Services\Financeiro\PrazoPgtoDias\PrazoPgtoDiasService;
use App\Services\Funcionario\FuncionarioService;
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
            $funcionarioRepository = $app->make(IFuncionario::class);
            return new LoginService($usuarioRepository, $funcionarioRepository);
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
        $this->app->scoped(FuncionarioService::class, function(Application $app) {
            $funcionarioRepository = $app->make(IFuncionario::class);
            $cadastroService = $app->make(CadastroService::class);
            $loginService = $app->make(LoginService::class);
            $empresaService = $app->make(EmpresaService::class);
            return new FuncionarioService($funcionarioRepository, $cadastroService, $loginService, $empresaService);
        });
        $this->app->scoped(ClienteService::class, function (Application $app) {
            $clienteRepository = $app->make(ICliente::class);
            $cadastroService = $app->make(CadastroService::class);
            $loginService = $app->make(LoginService::class);
            return new ClienteService($clienteRepository, $cadastroService, $loginService);
        });
        $this->app->scoped(GrupoProdutoService::class, function (Application $app) {
            $grupoProdutoRepository = $app->make(IGrupoProduto::class);
            return new GrupoProdutoService($grupoProdutoRepository);
        });
        $this->app->scoped(SubGrupoProdutoService::class, function (Application $app) {
            $subGrupoProdutoRepository = $app->make(ISubGrupoProduto::class);
            return new SubGrupoProdutoService($subGrupoProdutoRepository);
        });
        $this->app->scoped(FabricanteProdutoService::class, function (Application $app) {
            $fabricanteProdutoRepository = $app->make(IFabricanteProduto::class);
            return new FabricanteProdutoService($fabricanteProdutoRepository);
        });
        $this->app->scoped(UnidadeService::class, function (Application $app) {
            $unidadeRepository = $app->make(IUnidade::class);
            return new UnidadeService($unidadeRepository);
        });
        $this->app->scoped(ClasseProdutoService::class, function (Application $app) {
            $classeProdutoRepository = $app->make(IClasseProduto::class);
            return new ClasseProdutoService($classeProdutoRepository);
        });
        $this->app->scoped(ProdutoService::class, function (Application $app) {
            $produtoRepository = $app->make(IProduto::class);
            return new ProdutoService($produtoRepository);
        });
        $this->app->scoped(PrazoPgtoService::class, function (Application $app) {
            $prazoPgtoRepository = $app->make(IPrazoPgto::class);
            return new PrazoPgtoService($prazoPgtoRepository);
        });
        $this->app->scoped(PrazoPgtoDiasService::class, function (Application $app) {
            $prazoPgtoDiasRepository = $app->make(IPrazoPgtoDias::class);
            return new PrazoPgtoDiasService($prazoPgtoDiasRepository);
        });
        $this->app->scoped(FormaPgtoService::class, function (Application $app) {
            $formaPgtoRepository = $app->make(IFormaPgto::class);
            return new FormaPgtoService($formaPgtoRepository);
        });
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(IUsuario::class, UsuarioRepository::class);
        $this->app->bind(IEmpresa::class, EmpresaRepository::class);
        $this->app->bind(IEndereco::class, EnderecoRepository::class);
        $this->app->bind(IFuncionario::class, FuncionarioRepository::class);
        $this->app->bind(ICliente::class, ClienteRepository::class);
        $this->app->bind(IGrupoProduto::class, GrupoProdutoRepository::class);
        $this->app->bind(ISubGrupoProduto::class, SubGrupoProdutoRepository::class);
        $this->app->bind(IFabricanteProduto::class, FabricanteProdutoRepository::class);
        $this->app->bind(IUnidade::class, UnidadeRepository::class);
        $this->app->bind(IClasseProduto::class, ClasseProdutoRepository::class);
        $this->app->bind(IProduto::class, ProdutoRepository::class);
        $this->app->bind(IPrazoPgto::class, PrazoPgtoRepository::class);
        $this->app->bind(IPrazoPgtoDias::class, PrazoPgtoDiasRepository::class);
        $this->app->bind(IFormaPgto::class, FormaPgtoRepository::class);
    }
}
