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

Route::get('/', 'HomeController@index')->name('home');
Route::get('product/{slug}', 'HomeController@single')->name('product.single');

Route::prefix('cart')->name('cart.')->group(function(){

    Route::get('/', 'CartController@index')->name('index');
    Route::post('add', 'CartController@add')->name('add');
    Route::get('remove/{slug}', 'CartController@remove')->name('remove');
    Route::get('cancel', 'CartController@cancel')->name('cancel');

});


Route::group(['middleware' => ['auth']], function(){

    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

        // Route::prefix('stores')->name('stores.')->group(function(){
        //     Route::get('/', 'StoreController@index')->name('index');
        //     Route::get('/create', 'StoreController@create')->name('create');
        //     Route::post('/store', 'StoreController@store')->name('store');
        //     Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
        //     Route::post('/update/{store}', 'StoreController@update')->name('update');
        //     Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
        // });
        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');

        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
    });

});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home'); // ->middleware('auth')

//Route::get('/model', function () {
    //$products = \App\Product::all(); // select * from products
    // ActiveRecord
    //$user = new \App\User();
    //$user = \App\User::find(1);
    //$user->name = 'Usuário Teste Editado...';
    //$user->email = 'email@teste.com.br';
    //$user->password = bcrypt('12345678');
    //$user->save();

    //return \App\User::all(); - Retorna TODOS OS USUÁRIOS
    //return \App\User::find(3); - buscar um registro especifico
    //return \App\User::where('name', 'Ima Wyman MD')->get(); - Retorna a coleção de dados com o where
    //return \App\User::where('name', 'Ima Wyman MD')->first(); // Retorna o primeiro resultado da coleção where
    //return \App\User::paginate(10); Paginação

    //Mass Assignmnet - Atribuição em massa

    // $user = \App\User::create([
    //     'name' => 'Christovam Munhoz',
    //     'email' => 'teste@teste01.com',
    //     'password' => bcrypt('12312325')
    // ]);

    // Mass Update

    //$user = \App\User::find(42);
    //$user->update([

    // 'name' => 'Atualizado com Mass Update'

       // 'name' => 'Atualizado com Mass Update'

    //]); // true ou false
//dd($user);


    // Como fazer para pegar a loja de um usuário
    //$user = \App\User::find(4);
    //dd($user->store()->count()); // Retorna o objeto único Store

    // Como pegar produtos de uma loja
    //$loja = \App\Store::find(1);


    //return $loja->products()->where('id', 1)->get();
    //dd($loja->products());

    // Pegar as lojas de uma categoria
    //$categoria = \App\Category::find(1);
    //$categoria->$products;

    // Criar uma loja para um usuário

   //return $loja->products()->where('id', 1)->get();
   //dd($loja->products());

   // Pegar as lojas de uma categoria
   //$categoria = \App\Category::find(1);
   //$categoria->$products;

   // Criar uma loja para um usuário

//    $user = \App\User::find(10);
//    $store = $user->store()->create([
//        'name' => 'Loja Teste',
//        'description' => 'Loja de acessorios de informática',
//        'mobile_phone' => '55-55555-5555',
//        'phone' => '88-8888-8888',
//        'slug' => 'loja-teste'
//    ]);
//
// dd($store);

    // Criar um produto para uma loja
    // $store = \App\Store::find(41);
    // $product = $store->products()->create([
    //     'name' => 'Notebook Dell',
    //     'description' => 'Precessador i5, 10GB',
    //     'body' => 'Qualquer coisa...',
    //     'price' => 2999.99,
    //     'slug' => 'notebook-dell'
    // ]);
    // dd($product);



    //Criar uma categoria

   //Criar uma categoria


//    \App\Category::create([
//        'name' => 'Games',
//        'description' => null,
//        'slug' => 'games'
//    ]);
//    \App\Category::create([
//        'name' => 'Notebooks',
//        'description' => null,
//        'slug' => 'notebboks'
//    ]);

//    return \App\Category::all();




    //Adicionar um produto para uma categoria ou vice-versa

    //$product = \App\Product::find(41);
    //dd($product->categories()->attach([1])); Criar dependência
    //dd($product->categories()->detach([1])); Deletar dependência
    //dd($product->categories()->sync([2]));

    //return $product->categories;

   //Adicionar um produto para uma categoria ou vice-versa

   //$product = \App\Product::find(41);
   //dd($product->categories()->attach([1])); Criar dependência
   //dd($product->categories()->detach([1])); Deletar dependência
   //dd($product->categories()->sync([2]));

   //return $product->categories;
