<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\File;
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



Route::post('/file/delete', function (Request $request) {
    if(auth()){
        $file = File::find($request->id);
        $file->delete();
    }
})->name('file.delete');


Route::get('/telegram',function(){
    return view('telegram');
});

Route::get('/notifications',function(){
    return view('notification');
});

Route::post('/report', function (Request $request) {
    if(auth()){
        Report::create([
            'user_id' => auth()->user()->id,
            'type' => $request->type,
            'userable_type' => $request->userable_type,
            'userable_id' => $request->userable_id
        ]);
    }
    session()->flash('message','تم إرسال البلاغ بنجاح');
    return redirect()->back();
})->name('report');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard-login', function () {
    return view('dashboard.login');
});
Route::post('/admin-login', 'Dashboard\DashboardController@login')->name('admin-login');

Route::get('/why-us', function () {
    return view('why-us');
});
Route::get('/why-us-supplier', function () {
    return view('why-us-supplier');
});
Route::get('/why-us-buyer', function () {
    return view('why-us-buyer');
});
Route::get('/telegram/connect',[
    'uses' => 'TelegramController@callback',
    'as' => 'telegram.connect'
]);

Route::get('departments/{id}/categories','DepartmentController@get_categories')->name('single_dept_categories'); 
Route::get('categories/{id}/tagproducts','DepartmentController@get_tagproducts'); 

Route::post('/request','RequestController@store')->name('request');
Auth::routes();
Route::name('register.')->group(function(){
    Route::prefix('/register')->group(function(){
        Route::get('/supplier','Auth\RegisterController@showSupplierRegisterationFrom')->name('supplier');
        Route::get('/buyer','Auth\RegisterController@showBuyerRegisterationFrom')->name('buyer');
    });
});

Route::group(['as'=>'supplier.','middleware'=>['auth','supplier'],'prefix'=>'/supplier'],function(){
    
    Route::get('/requests','Supplier\RequestController@index')->name('requests.index');
    Route::get('/requests/{request}','Supplier\RequestController@show')->name('requests.show');

    Route::resource('offers','Supplier\OfferController');

    Route::get('/calls','SupplierController@calls')->name('calls');

    Route::get('/reviews','SupplierController@reviews')->name('reviews');

    Route::get('/profile','SupplierController@profile')->name('profile');
    Route::put('/profile','SupplierController@updateProfile')->name('profile');

    Route::get('/settings','SupplierController@settings')->name('settings');
    Route::put('/settings','SupplierController@updateSettings')->name('settings');
    Route::get('/products','SupplierController@products')->name('products');
    Route::put('/products','SupplierController@updateproducts')->name('products');
    Route::post('/products','SupplierController@store')->name('products.store');
    Route::get('/factories','SupplierController@factories')->name('factories');
    Route::put('/factories','SupplierController@updatefactories')->name('factories');
});
Route::group(['as'=>'buyer.','middleware'=>['auth','buyer'],'prefix'=>'/buyer'],function(){
    
    Route::get('/requests','Buyer\RequestController@index')->name('requests.index');
    Route::get('/requests/{request}','Buyer\RequestController@show')->name('requests.show');

    Route::resource('offers','Buyer\OfferController');

    Route::get('/calls','BuyerController@calls')->name('calls');
    Route::post('/calls/{supplier}','BuyerController@call')->name('call');

    Route::get('/reviews','BuyerController@reviews')->name('reviews');
    Route::post('/reviews/{supplier}','BuyerController@review')->name('review');

    Route::get('/profile','BuyerController@profile')->name('profile');
    Route::put('/profile','BuyerController@updateProfile')->name('profile');

    Route::get('/settings','BuyerController@settings')->name('settings');
    Route::put('/settings','BuyerController@updateSettings')->name('settings');
});
Route::group(['as'=>'dashboard.','middleware'=>['auth','admin'],'prefix'=>'/dashboard'],function(){
    
    Route::get('/','Dashboard\DashboardController@index')->name('home');
    
    Route::resource('/users','Dashboard\UsersController');
    Route::resource('/departments','Dashboard\DepartmentsController');
    Route::resource('/categories','Dashboard\CategoriesController');
    Route::resource('/products','Dashboard\ProductsController');
    Route::resource('/buyers','Dashboard\BuyersController');
    Route::resource('/suppliers','Dashboard\SuppliersController');
    Route::resource('/reports','Dashboard\ReportsController');
    Route::delete('/reviews/{review}/delete',function(\App\Models\Review $review){
        $review->delete();
    })->name('reviews.destroy');
    Route::get('/requests','Dashboard\RequestsController@index')->name('requests.index');
    Route::get('/requests/{request}','Dashboard\RequestsController@show')->name('requests.show');
    Route::get('/offers/{offer}','Dashboard\RequestsController@offer')->name('offers.show');
    
    // Route::get('/category/{category}','Dashboard\DepartmentsController@category')->name('category.show');
    // Route::delete('/category/{category}','Dashboard\DepartmentsController@category_destroy')->name('category.destroy');
    // Route::put('/category/{category}','Dashboard\DepartmentsController@category_update')->name('category.update');

});


Route::get('/request','RequestController@create')->name('request');
Route::get('/departments','DepartmentController@departments')->name('departments');
Route::get('/{department}/categories','DepartmentController@categories')->name('categories');
Route::get('/{category}/suppliers','DepartmentController@suppliers')->name('suppliers');
Route::get('/{supplier}','DepartmentController@supplier')->name('supplier');















Route::get('/login/facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('/facebook/callback', function () {
    $user = Socialite::driver('facebook')->user();

    // $user->token
});