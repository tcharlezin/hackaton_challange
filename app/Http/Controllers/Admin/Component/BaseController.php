<?php

namespace App\Http\Controllers\Admin\Component;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

abstract class BaseController extends Controller
{
    protected $rota;
    protected $model;

    public function __construct($model, $rota)
    {
        $this->model = new $model;
        $this->rota = $rota;

        View::share("rota", $this->rota);
    }

    /***
     * Métodos que serão escritos nos controllers
     */

    protected abstract function obterPaginaAnterior();

    protected abstract function criar();

    protected abstract function salvar(BaseRequest $request);

    protected abstract function exibir($id);

    protected abstract function editar($id);

    protected abstract function atualizar(BaseRequest $request, $id);

    protected abstract function deletar($id);

    protected function getView()
    {
        $backlink = $this->obterPaginaAnterior();
        return view("$this->rota.index", compact("backlink"));
    }

    /** Daqui para baixo, são os métodos nativos da Controller, com tratamento de excessões. **/
    public function index()
    {
        try
        {
            return $this->getView();
        }
        catch (\Exception $ex)
        {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function create()
    {
        try
        {
            DB::beginTransaction();

            $retorno = $this->criar();

            DB::commit();

            return $retorno;
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($ex->getMessage());
        }
    }

    public function store(BaseRequest $request)
    {
        try
        {
            DB::beginTransaction();

            $retorno = $this->salvar($request);

            DB::commit();

            return $retorno->withSuccess("Registro criado com sucesso!");
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($ex->getMessage());
        }
    }

    public function show($id)
    {
        try
        {
            DB::beginTransaction();

            $retorno = $this->exibir($id);

            DB::commit();

            return $retorno;
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($ex->getMessage());
        }
    }

    public function edit($id)
    {
        try
        {
            DB::beginTransaction();

            $retorno = $this->editar($id);

            DB::commit();

            return $retorno;
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($ex->getMessage());
        }
    }

    public function update(BaseRequest $request, $id)
    {
        try
        {
            DB::beginTransaction();

            $retorno = $this->atualizar($request, $id);

            DB::commit();

            return $retorno->withSuccess("Registro atualizado com sucesso!");
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try
        {
            DB::beginTransaction();

            $retorno = $this->deletar($id);

            DB::commit();

            return $retorno->withSuccess("Registro excluido com sucesso!");
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
}
