<?php

namespace App\Http\Controllers\Catalog;

use App\Dominio\Uploads\Handler\ArmazenarFotos;
use App\Http\Controllers\Component\CRUDController;
use App\Http\Requests\BaseRequest;
use App\Http\Requests\Catalog\ProductRequest;
use App\Models\Catalog\Product;
use Symfony\Component\VarDumper\VarDumper;

class ProductController extends CRUDController
{
    public function __construct()
    {
        app()->bind(BaseRequest::class, ProductRequest::class);
        parent::__construct(Product::class, "admin.catalog.product");
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
        return Product::with(["category"])->get();
    }

    protected function criar()
    {
        return view("$this->rota.create");
    }

    protected function salvar(BaseRequest $request)
    {
        $data = $request->all();
        $product = Product::create($data);

        if (isset($data['fotos']))
        {
            (new ArmazenarFotos("produtos", $product, $data['fotos']))->executar();
        }

        return redirect()->to(route("$this->rota.index"));
    }

    protected function exibir($id)
    {
    }

    protected function editar($id)
    {
        $registro = Product::find($id);
        return view("$this->rota.edit", compact('registro'));
    }

    protected function atualizar(BaseRequest $request, $id)
    {
        $data = $request->all();

        $registro = Product::find($id);
        $registro->update($data);

        if (isset($data['fotos']))
        {
            (new ArmazenarFotos("produtos", $registro, $data['fotos']))->executar();
        }

        return redirect()->to(route("$this->rota.index"));
    }

    protected function deletar($id)
    {
        $registro = Product::find($id);

        $registro->delete();

        return redirect()->to(route("$this->rota.index"));
    }
}
