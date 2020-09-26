<?php

Auth::routes();

Route::get("/teste", function ()
{
    $products = \App\Models\Catalog\Product::all();

    $studentsInfo = [];

    foreach($products as $product)
    {
        // $data = (new \App\Dominio\Catalog\ProductInformation($product->id))->get();
        $data = (new \App\Dominio\Catalog\ProductInformation(10))->get();
        \Symfony\Component\VarDumper\VarDumper::dump($data);
        die();
    }

    return 0;

});

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

    Route::get('/category/{name}', 'CategoryController@index')->name("category.index");

    Route::get('/checkout', 'CheckoutController@index')->name("checkout");

    Route::get('/product/{name}', 'ProductController@index')->name("product.index");
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin',  'middleware' => ['auth'], "as" => "admin."], function ()
{
    Route::group(['prefix' => 'catalog', 'namespace' => 'Catalog', "as" => "catalog."], function ()
    {
        Route::get('dashboard', 'DashboardController@index')->name("dashboard");
        Route::resource('category', 'CategoryController');
        Route::resource('product', 'ProductController');
    });

    /*** Manipulação de arquivos de imagens ***/
    Route::group(['prefix' => 'fotos', 'as' => 'fotos.'], function ()
    {
        Route::post('upload/fotos/temporarias', 'Component\\UploadController@uploadFotos')->name('temporarias');
    });
});

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/home', 'HomeController@index')->name('home');
});

