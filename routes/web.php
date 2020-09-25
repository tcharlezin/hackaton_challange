<?php

Auth::routes();

Route::get('/', function ()
{
    return view('site.home');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], "as" => "admin."], function ()
{
    Route::group(['prefix' => 'catalog', 'namespace' => 'Catalog', "as" => "catalog."], function ()
    {
        Route::get('dashboard', 'DashboardController@index')->name("dashboard");
        Route::resource('category', 'CategoryController');
        Route::resource('product', 'ProductController');
    });

    Route::group(['prefix' => 'stock', 'namespace' => 'Stock', "as" => "stock."], function ()
    {
        Route::resource("dashboard", 'DashboardController@index');
        Route::resource("material-type",'MaterialTypeController');
        Route::resource("provider",'ProviderController');
        Route::resource("material",'MaterialController');

        Route::resource("production",'ProductionController');
        Route::delete('production/item/{id}' , ['as' => 'production.item.destroy', 'uses' => 'ProductionController@destroyItem']);
    });

    Route::group(['prefix' => 'sales', 'namespace' => 'Sales', "as" => "sales."], function ()
    {
        Route::get('new', 'SalesOrderController@new')->name("new");
        Route::post('new', 'SalesOrderController@store')->name("new.store");

        Route::get('lista', 'SalesOrderController@lista')->name("lista");

        Route::get('fabricar/{id}', 'SalesOrderController@fabricar')->name("fabricar");
    });

    Route::get('tempo-real', 'TempoRealController@index')->name("tempo-real");
    Route::get('tempo-real/{id}', 'TempoRealController@history')->name("tempo-real.history");

    Route::get('lancamento', 'LancamentoController@index')->name("lancamento");
    Route::post('lancamento', 'LancamentoController@store')->name("lancamento.store");


    /*** Manipulação de arquivos de imagens ***/
    Route::group(['prefix' => 'fotos', 'as' => 'fotos.'], function ()
    {
        Route::post('upload/fotos/temporarias', 'Component\\UploadController@uploadFotos')->name('temporarias');
    });
});

/*** Métodos de pesquisa para combobox com Ajax */
Route::group(['middleware' => ['auth', 'pesquisa-dados']], function ()
{
    Route::post('cidades', ['as' => 'pesquisa-cidade', 'uses' => 'Pesquisa\PesquisaController@findCidades']);
    Route::post('valida-username', ['as' => 'valida-username', 'uses' => 'Pesquisa\PesquisaController@validaUsername']);
});


/** Métodos para que usuário preencha o perfil */
Route::group(['prefix' => 'cadastro', 'namespace' => 'Cadastro', 'middleware' => ['auth'], "as" => "cadastro."], function ()
{
    Route::get('/dados-pessoais', 'DadosPessoaisController@create')->name("dados-pessoais.create");
    Route::post('/dados-pessoais', 'DadosPessoaisController@store')->name("dados-pessoais.store");

    Route::get('/fotos', 'FotosController@create')->name("foto.create");
    Route::post('/fotos', 'FotosController@store')->name("foto.store");

    Route::get('/configuracoes', 'ConfiguracoesController@create')->name("configuracao.create");
    Route::post('/configuracoes', 'ConfiguracoesController@store')->name("configuracao.store");
});

Route::group(['middleware' => ['auth', 'perfil-completo']], function ()
{
    Route::group(['prefix' => 'perfil', 'namespace' => 'Perfil', 'middleware' => ['auth'], "as" => "perfil."], function ()
    {
        Route::get('geral', 'DadosPessoaisController@index')->name('geral');
        Route::post('geral', 'DadosPessoaisController@store')->name('geral.store');

        Route::get('foto', 'FotosController@index')->name('foto');
        Route::post('foto', 'FotosController@store')->name('foto.store');
    });

    Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/perfil/{username}', ['as' => 'perfil.usuario', 'uses' => 'Perfil\PerfilController@localizar']);

