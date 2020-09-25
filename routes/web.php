<?php

Auth::routes();

Route::group(["as" => "site."], function ()
{
    Route::get('/', function ()
    {
        return view('site.home');
    })->name("index");
});

Route::group(['prefix' => 'shop', "as" => "shop.", 'namespace' => 'Shop' ], function ()
{
    Route::get('/home', 'HomeController@index')->name("index");

    Route::get('/search', 'SearchController@index')->name("search");

    Route::get('/checkout', 'CheckoutController@index')->name("checkout");

    Route::get('/product', 'ProductController@index')->name("product");
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], "as" => "admin."], function ()
{
    Route::group(['prefix' => 'catalog', 'namespace' => 'Catalog', "as" => "catalog."], function ()
    {
        Route::get('dashboard', 'DashboardController@index')->name("dashboard");
        Route::resource('category', 'CategoryController');
        Route::resource('product', 'ProductController');
    });

    Route::group(['prefix' => 'sales', 'namespace' => 'Sales', "as" => "sales."], function ()
    {
        Route::get('new', 'SalesOrderController@new')->name("new");
        Route::post('new', 'SalesOrderController@store')->name("new.store");

        Route::get('lista', 'SalesOrderController@lista')->name("lista");
    });

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

Route::group(['middleware' => ['auth']], function ()
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

