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

//Basic Webroutes
Route::middleware(['DoesUserExsist'])->group(function () {
    //Basic Web Routes
    Route::get('/', 'BasicWebController@home');
    Route::get('/disabled', 'BasicWebController@disabled');
    Route::get('/about', 'BasicWebController@about');
    Route::get('/contact', 'BasicWebController@contact');
    Route::get('/item/{ProductID}/men', 'BasicWebController@menItem')->where(["ProductID"=>"[0-9]+"]);
    Route::get('/item/{ProductID}/women', 'BasicWebController@womenItem')->where(["ProductID"=>"[0-9]+"]);
    //mens
    //Route::get('/mens', 'BasicWebController@mens');
    Route::get('/mens/{category}', 'BasicWebController@mensCategory');
    Route::get('/mens/{category}/getJSON', 'BasicWebController@mensGetJSON');
    //womens
    //Route::get('/womens', 'BasicWebController@womens');
    Route::get('/womens/{category}/getJSON', 'BasicWebController@womensGetJSON');
    Route::get('/womens/{category}', 'BasicWebController@womensCategory');

    Route::middleware(['IsUserLoggedIn'])->group(function () {
        //cart
        Route::get('/cart',"Users\CartController@cartindex");
        Route::post('/cart/add',"Users\CartController@cartadd");
        Route::post('cart/update',"Users\CartController@cartupdate");
        //checkout
        Route::post('checkout',"Users\CheckoutController@checkoutPost");
        Route::get('checkout',"Users\CheckoutController@checkoutindex");
        //users dashboard
        Route::get('/users/orders',"Users\DashboardController@compOrders");
        Route::get('/users/pending',"Users\DashboardController@pendOrders");
        Route::post('/users/info',"Users\DashboardController@infoupdate");
        Route::get('/users/info',"Users\DashboardController@info");
        Route::post('/users/pass',"Users\DashboardController@passupdate");
        Route::get('/users/pass',"Users\DashboardController@pass");
    });
});

//User Targeted Routes
Route::middleware(['IsUserAlreadyAvailable'])->group(function () {
    //users register
    Route::post("/users/register","Users\UsersController@register");
    Route::get("/users/register","Users\UsersController@index");
    
    //users login
    Route::post("/users/login","Users\UsersController@logInPost");
    Route::get("/users/login","Users\UsersController@logInGet");
});

Route::get("/users/logout","Users\UsersController@logout");

Route::middleware(['IsAdminAlreadyAvailable'])->group(function () {
    //Admin Log in
    Route::get('admin/','Admin\SigninController@signInPage');
    Route::get('admin/signin','Admin\SigninController@signInPage');
    Route::post('admin/signin','Admin\SigninController@signInFunction');
});

//AdminPanel
Route::middleware(['IsAdminLoggedIn'])->group(function () {
    // admin index
    Route::get('admin/dashboard','Admin\DashboardController@index');
    
    //admin logout
    Route::get('admin/logout', 'Admin\SigninController@logout');

    // Users RUD
    Route::get("admin/users","Admin\UsersController@index");
    Route::get("admin/users/edit/{UserID}","Admin\UsersController@edit")->where(["UserID"=>"[0-9]+"]);
    Route::post("admin/users/edit/{UserID}","Admin\UsersController@update")->where(["UserID"=>"[0-9]+"]);
    Route::post("admin/users/delete","Admin\UsersController@delete");
    // user pass change by admin
    Route::get("admin/users/pass/{UserID}","Admin\UsersController@passGet")->where(["UserID"=>"[0-9]+"]);
    Route::post("admin/users/pass/{UserID}","Admin\UsersController@passPost")->where(["UserID"=>"[0-9]+"]);


    //Men Categories
    Route::get("admin/men/category/list","Admin\MenController@index");
    Route::get("admin/men/category/add","Admin\MenController@add");
    Route::post("admin/men/category/add","Admin\MenController@create");
    Route::get("admin/men/category/{CategoryID}/edit","Admin\MenController@edit")->where(['CategoryID'=>"[0-9]+"]);
    Route::post("admin/men/category/{CategoryID}/edit","Admin\MenController@update")->where(['CategoryID'=>"[0-9]+"]);
    Route::post("admin/men/cateogry/delete","Admin\MenController@delete");
    //Men Products
    Route::middleware(['MenProductsChecker'])->group(function () {
        Route::get("admin/men/{CategoryID}/products/list","Admin\MenProducts@index")->where(['CategoryID'=>"[0-9]+"]);
        Route::get("admin/men/{CategoryID}/products/add","Admin\MenProducts@add")->where(['CategoryID'=>"[0-9]+"]);
        Route::post("admin/men/{CategoryID}/products/add","Admin\MenProducts@create")->where(['CategoryID'=>"[0-9]+"]);
        Route::get("admin/men/{CategoryID}/products/{ProductID}/edit","Admin\MenProducts@edit")->where(['ProductID'=>"[0-9]+", 'CategoryID'=>"[0-9]+"]);
        Route::post("admin/men/{CategoryID}/products/{ProductID}/edit","Admin\MenProducts@update")->where(['ProductID'=>"[0-9]+",'CategoryID'=>"[0-9]+"]);
        Route::post("admin/men/{CategoryID}/products/delete","Admin\MenProducts@delete")->where(['CategoryID'=>"[0-9]+"]);
    });


    //Women
    Route::get("admin/women/category/list","Admin\WomenController@index");
    Route::get("admin/women/category/add","Admin\WomenController@add");
    Route::post("admin/women/category/add","Admin\WomenController@create");
    Route::get("admin/women/category/{CategoryID}/edit","Admin\WomenController@edit")->where(['CategoryID'=>"[0-9]+"]);
    Route::post("admin/women/category/{CategoryID}/edit","Admin\WomenController@update")->where(['CategoryID'=>"[0-9]+"]);
    Route::post("admin/women/cateogry/delete","Admin\WomenController@delete");
    //Women Products
    Route::middleware(['WomenProductsChecker'])->group(function () {
        Route::get("admin/women/{CategoryID}/products/list","Admin\WomenProducts@index")->where(['CategoryID'=>"[0-9]+"]);
        Route::get("admin/women/{CategoryID}/products/add","Admin\WomenProducts@add")->where(['CategoryID'=>"[0-9]+"]);
        Route::post("admin/women/{CategoryID}/products/add","Admin\WomenProducts@create")->where(['CategoryID'=>"[0-9]+"]);
        Route::get("admin/women/{CategoryID}/products/{ProductID}/edit","Admin\WomenProducts@edit")->where(['ProductID'=>"[0-9]+", 'CategoryID'=>"[0-9]+"]);
        Route::post("admin/women/{CategoryID}/products/{ProductID}/edit","Admin\WomenProducts@update")->where(['ProductID'=>"[0-9]+",'CategoryID'=>"[0-9]+"]);
        Route::post("admin/women/{CategoryID}/products/delete","Admin\WomenProducts@delete")->where(['CategoryID'=>"[0-9]+"]);
    });

    //Orders
    Route::get("admin/orders/pending","Admin\OrderController@indexpending");
    Route::get("admin/orders/completed","Admin\OrderController@indexcompleted");
    Route::get("admin/orders/edit/{OrderID}","Admin\OrderController@edit")->where(['OrderID'=>'[0-9]+']);
    Route::post("admin/orders/edit/{OrderID}","Admin\OrderController@update")->where(['OrderID'=>'[0-9]+']);

});








