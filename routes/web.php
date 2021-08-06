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


Route::get('/', function() {
  $products=App\Product::orderBy('id', 'asc')->paginate(12);

    if (!Auth::guest() && Auth::user()->type == 0 ) {
      return view('store.index', compact('products'));
    }
    
    if (!Auth::guest() && Auth::user()->type == 1) {
      return view('admin.home');  
    }
    
    return view('store.index', compact('products'));
})->name('home');


Route::bind('product', function($slug){
    return App\Product::where('slug', $slug) ->first();
});


Route::get('/tickets', [
  'as' => 'myorders',
  'uses' => 'TicketController@myIndex'
]);

Route::get('/about', [
  'as' => 'about',
  'uses' => 'StoreController@about'
]);

Route::get('product/{slug}', [
  'as' => 'product-detail',
  'uses' => 'StoreController@show'
]);

/*Filtro categorias----------------*/
Route::get('categories/{name}',[
  'as' => 'filter-cate',
  'uses' => 'StoreController@searchCategory'
]);


//Carrito --------------------------

Route::get('cart/show',
           ['as' => 'cart-show',
          'uses' => 'CartController@show'
           ]);

Route::get('cart/add/{product}', [
          'as' => 'cart-add',
          'uses' => 'CartController@add'
]);

Route::get('cart/delete/{product}', [
        'as' => 'cart-delete',
        'uses' => 'CartController@delete'
]);

Route::get('cart/trash',[
        'as'=>'cart-trash',
        'uses'=>'CartController@trash'
]);

Route::get('cart/update/{product}/{quantity?}', [
        'as' => 'cart-update',
        'uses' => 'CartController@update'
]);

Route::get('cart/orderDetail', [
        'as' => 'order-detail',
        'uses' => 'CartController@orderDetail'
]);

Route::get('cart/getOrder', [
        'as' => 'getOrder',
        'uses' => 'CartController@getOrder'
]);

//LOG IN -----------------
Auth::routes();

//Admin ------------------

Route::group(['namespace' => 'Admin', 'middleware' =>['auth'], 'prefix' => 'admin'], function(){

Route::get('home', [
    'as' => 'home_admin',
    'uses' => 'CategoryController@home'
]);

//CATEGORY-----------------------
Route::get('category/','CategoryController@index')->name('home-cate');
//Create -------------------
Route::get('category/create','CategoryController@create')->name('cate-add');

Route::post('category/create', 'CategoryController@store')->name('store-category');
//Edit -------------------
Route::get('category/edit/{id}','CategoryController@edit')->name('category_edit');

Route::put('category/edit/{id}','CategoryController@update')->name('category_update');
//Delete ---------------------------
Route::delete('category/delete/{id}','CategoryController@destroy')->name('category_delete');

//PRODUCT-----------------------
Route::get('product/','ProductController@index')->name('index-produ');
//Create -------------------
Route::get('product/create','ProductController@create')->name('produ-add');

Route::post('product/create', 'ProductController@store')->name('store-produ');
//Edit -------------------
Route::get('product/edit/{id}','ProductController@edit')->name('product-edit');

Route::put('product/edit/{id}','ProductController@update')->name('product-up');
//Delete ---------------------------
Route::delete('product/delete/{id}','ProductController@destroy')->name('product-dele');

//USER-----------------------
Route::get('user/','UserController@index')->name('index-user');
//Create -------------------
Route::get('user/create','UserController@create')->name('user-add');

Route::post('user/create','UserController@store')->name('store-user');
//Edit -------------------
Route::get('user/edit/{id}','UserController@edit')->name('user-edit');

Route::put('user/edit/{id}','UserController@update')->name('user-up');
//Delete ---------------------------
Route::delete('user/delete/{id}','UserController@destroy')->name('user-dele');

//ORDERS -------------------------
Route::get('order/', 'OrderController@index')->name('index-order');

Route::delete('order/delete/{id}','OrderController@destroy')->name('order-dele');

Route::get('order/getItems', [
        'as' => 'getItemsOrder',
        'uses' => 'OrderController@getOrder'
]);

});

