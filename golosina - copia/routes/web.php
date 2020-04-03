<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', "PaginaController@index");

Route::get('/faq', "PaginaController@faq");

Route::get('/register', "PaginaController@register");

Route::get('/login', "PaginaController@login");

// Route::get('/productos', "ProductController@listado");
Route::get('/', "ProductController@listado");

Route::get('/productos/{id}', "ProductController@detail");

Route::get('/producto/new', "ProductController@seenew");

Route::post('/producto/new', "ProductController@create");

Route::get('/eliminar/{id}', "ProductController@delete");

Route::get('/editar/{id}', "ProductController@edit1");

Route::post('/editar/{id}', "ProductController@edit2");

Route::get('/carrito', "CartController@listado");

Route::post('/{id}', "CartController@add");

Route::get('/carrito/{id}', "CartController@cancel");


// Route::get('/producto', "CandyRashController@producto");
//
// Route::get('/perfil', "CandyRashController@perfil")->middleware(['auth']);;
//


// Route::get('/candys/new', "CandyRashController@new")->middleware(['auth', 'is_admin']);;
// Route::post('/candys/new', "CandyRashController@create")->middleware(['auth', 'is_admin']);;
//
// Route::get('/candys/{id}', "CandyRashController@detail")->middleware(['auth']);;
// //
// Route::get('/candys/edit/{id}', "CandyRashController@edit");
// Route::post('/candys/edit/{id}', "CandyRashController@edit2");
// Route::get('/candys/eliminate/{id}', "CandyRashController@eliminate");
// Route::post('/candys/eliminate/{id}', "CandyRashController@delete");
// //

// Route::get('/home', 'HomeController@index')->name('home');
//
//
// Route::get('/home', 'HomeController@index')->name('home');
//
//
// route::post('/candys' , 'CarritoController@crear');
//
// Route::get('/carrito', "CarritoController@listado")->middleware(['auth']);;
// Route::get('/carrito/{id}', "CarritoController@eliminar")->middleware(['auth']);;
// Route::get('/compras/{id}', "CarritoController@comprar")->middleware(['auth']);;
// Route::post('/carrito', "CarritoController@eliminar");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
