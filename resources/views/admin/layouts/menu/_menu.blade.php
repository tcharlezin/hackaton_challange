<!--Category name-->
<li class="list-header">Administração</li>

<!--Menu list item-->
<li class="sub {{ Request::is('admin/catalog*') ? 'active' : '' }}">
    <a href="#" aria-expanded="false">
        <i class="fa fa-book"></i>
        <span class="menu-title">Catalog</span>
        <i class="arrow"></i>
    </a>

    <!--Submenu-->
    <ul class="collapse" aria-expanded="false">
        <li class="{{ Request::is('admin/catalog/category*') ? 'active-link' : '' }}"><a href="{{route("admin.catalog.category.index")}}">Categorias</a></li>
        <li class="{{ Request::is('admin/catalog/product*') ? 'active-link' : '' }}"><a href="{{route("admin.catalog.product.index")}}">Produtos</a></li>
    </ul>
</li>

<li class="sub {{ Request::is('admin/sales*') ? 'active' : '' }}">
    <a href="#" aria-expanded="false">
        <i class="fa fa-line-chart"></i>
        <span class="menu-title">Sales</span>
        <i class="arrow"></i>
    </a>

    <!--Submenu-->
    <ul class="collapse" aria-expanded="false">
        <li class="{{ Request::is('admin/sales/new') ? 'active-link' : '' }}"><a href="{{route("admin.sales.new")}}">Novo Pedido</a></li>
        <li class="{{ Request::is('admin/sales/lista*') ? 'active-link' : '' }}"><a href="{{route("admin.sales.lista")}}">Pedidos</a></li>
    </ul>
</li>
