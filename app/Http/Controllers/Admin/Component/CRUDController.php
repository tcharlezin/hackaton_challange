<?php

namespace App\Http\Controllers\Admin\Component;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

abstract class CRUDController extends BaseController
{
    /****
     * Sobrecarga de método, para a utilização de Datatables
     */
    public function index()
    {
        try
        {
            DB::beginTransaction();

            if (\Illuminate\Support\Facades\Request::ajax())
            {
                return DataTables::of($this->dadosListagem())->addColumn('action', function ($registro)
                {
                    return $this->viewAcoes($registro);
                })->make(true);
            }

            DB::commit();

            return $this->getView();
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    /***
     * Adicionando método que irá ser responsável pelo carregamento dos dados da DataTable
     */
    protected abstract function dadosListagem();

    /***
     * Componente de ações para listagem.
     */
    protected function viewAcoes($registro)
    {
        return (string)view('admin.layouts.componente.listagem.edit_delete', ['model' => $registro, 'rota' => $this->rota]);
    }
}
