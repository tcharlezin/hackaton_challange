<!--Category name-->
<li class="list-header">Management</li>

<!--Menu list item-->
<li class="sub {{ Request::is('admin/catalog*') ? 'active' : '' }}">
    <a href="#" aria-expanded="false">
        <i class="fa fa-book"></i>
        <span class="menu-title">Catalog</span>
        <i class="arrow"></i>
    </a>

    <!--Submenu-->
    <ul class="collapse" aria-expanded="false">
        <li class="{{ Request::is('admin/catalog/category*') ? 'active-link' : '' }}"><a href="{{route("admin.catalog.category.index")}}">Categories</a></li>
        <li class="{{ Request::is('admin/catalog/product*') ? 'active-link' : '' }}"><a href="{{route("admin.catalog.product.index")}}">Products</a></li>
    </ul>
</li>
