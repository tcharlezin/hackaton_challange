<div id="content-container">
    <div id="page-title">
        <h1 class="page-header text-overflow">@yield('titulo')</h1>
    </div>

    <div id="page-content">
        @include('admin.errors._check')
        @yield('conteudo')
    </div>

    @stack('modal')

</div>
