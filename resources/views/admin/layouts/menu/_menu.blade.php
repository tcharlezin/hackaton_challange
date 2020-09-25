<!--Category name-->
<li class="list-header">Administração</li>

<!--Menu list item-->
<li class="sub {{ Request::is('admin/catalog*') ? 'active' : '' }}">
    <a href="#" aria-expanded="false">
        <i class="fa fa-book"></i>
        <span class="menu-title">Catálogo</span>
        <i class="arrow"></i>
    </a>

    <!--Submenu-->
    <ul class="collapse" aria-expanded="false">
        <li class="{{ Request::is('admin/catalog/category*') ? 'active-link' : '' }}"><a href="{{route("admin.catalog.category.index")}}">Categorias</a></li>
        <li class="{{ Request::is('admin/catalog/product*') ? 'active-link' : '' }}"><a href="{{route("admin.catalog.product.index")}}">Produtos</a></li>
    </ul>
</li>

<li class="sub {{ Request::is('admin/stock*') ? 'active' : '' }}">
    <a href="#" aria-expanded="false">
        <i class="fa fa-exchange"></i>
        <span class="menu-title">Estoque</span>
        <i class="arrow"></i>
    </a>

    <!--Submenu-->
    <ul class="collapse" aria-expanded="false">
        <li class="{{ Request::is('admin/stock/material-type*') ? 'active-link' : '' }}"><a href="{{route("admin.stock.material-type.index")}}">Tipo</a></li>
        <li class="{{ Request::is('admin/stock/material') ? 'active-link' : '' }}"><a href="{{route("admin.stock.material.index")}}">Matéria Prima</a></li>
        <li class="{{ Request::is('admin/stock/production*') ? 'active-link' : '' }}"><a href="{{route("admin.stock.production.index")}}">Fabricação</a></li>
    </ul>
</li>

<li class="sub {{ Request::is('admin/sales*') ? 'active' : '' }}">
    <a href="#" aria-expanded="false">
        <i class="fa fa-line-chart"></i>
        <span class="menu-title">Vendas</span>
        <i class="arrow"></i>
    </a>

    <!--Submenu-->
    <ul class="collapse" aria-expanded="false">
        <li class="{{ Request::is('admin/sales/new') ? 'active-link' : '' }}"><a href="{{route("admin.sales.new")}}">Novo Pedido</a></li>
        <li class="{{ Request::is('admin/sales/lista*') ? 'active-link' : '' }}"><a href="{{route("admin.sales.lista")}}">Pedidos</a></li>
    </ul>
</li>

<li class="{{ Request::is('admin/lancamento*') ? 'active-link' : '' }}">
    <a href="{{route("admin.lancamento")}}" aria-expanded="false">
        <i class="fa fa-arrow-right"></i>
        <span class="menu-title">
        Lançamentos
    </span>
    </a>
</li>

<li class="{{ Request::is('admin/tempo-real*') ? 'active-link' : '' }}">
    <a href="{{route("admin.tempo-real")}}" aria-expanded="false">
        <i class="fa fa-globe"></i>
        <span class="menu-title">
        Tempo real
    </span>
    </a>
</li>
