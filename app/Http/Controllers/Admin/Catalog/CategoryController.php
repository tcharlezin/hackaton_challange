<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Component\CRUDController;
use App\Http\Requests\BaseRequest;
use App\Http\Requests\Catalog\CategoryRequest;
use App\Models\Catalog\Category;

class CategoryController extends CRUDController
{
    public function __construct()
    {
        app()->bind(BaseRequest::class, CategoryRequest::class);
        parent::__construct(Category::class, "admin.catalog.category");
    }

    protected function obterPaginaAnterior()
    {
        return route("home");
    }

    protected function getView()
    {
        $backlink = $this->obterPaginaAnterior();
        return view("$this->rota.index", compact("backlink"));
    }

    protected function dadosListagem()
    {
        return Category::all();
    }

    protected function criar()
    {
        return view("$this->rota.create");
    }

    protected function salvar(BaseRequest $request)
    {
        $data = $request->all();
        Category::create($data);

        return redirect()->to(route("$this->rota.index"));
    }

    protected function exibir($id)
    {
    }

    protected function editar($id)
    {
        $registro = Category::find($id);
        return view("$this->rota.edit", compact('registro'));
    }

    protected function atualizar(BaseRequest $request, $id)
    {
        $registro = Category::find($id);
        $registro->update($request->all());

        return redirect()->to(route("$this->rota.index"));
    }

    protected function deletar($id)
    {
        $registro = Category::find($id);

        $registro->delete();

        return redirect()->to(route("$this->rota.index"));
    }
}
