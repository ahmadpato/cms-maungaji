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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/dashboard','Dashboard@index', function(){
})->middleware('auth');

//route users
Route::get('/user','User@index', function(){
})->middleware('auth');

Route::get('/user/export_excel', 'User@export_excel', function(){
})->middleware('auth');

Route::get('/user/add','User@add', function(){
})->middleware('auth');

Route::post('/user/store','User@store',function(){
})->middleware('auth');

Route::get('/user/edit/{id}', 'User@edit',function(){
})->middleware('auth');

Route::post('/user/update','User@update',function(){
})->middleware('auth');

Route::get('/user/detail/{id}','User@detail',function(){
})->middleware('auth');

Route::get('/user/delete/{id}','User@delete',function(){
})->middleware('auth');

//route testimoni
Route::get('/testimoni','Testimoni@index',function(){
})->middleware('auth');

Route::get('/testimoni/add', 'Testimoni@add',function(){
})->middleware('auth');

Route::post('/testimoni/store', 'Testimoni@store',function(){
})->middleware('auth');

Route::get('/testimoni/edit/{id}','Testimoni@edit',function(){
})->middleware('auth');

Route::post('/testimoni/update','Testimoni@update',function(){
})->middleware('auth');

Route::get('/testimoni/detail/{id}','Testimoni@detail',function(){
})->middleware('auth');

Route::get('/testimoni/delete/{id}','Testimoni@delete',function(){
})->middleware('auth');

//route faq
Route::get('/faq','Faq@index',function(){
})->middleware('auth');

Route::get('/faq/create', 'Faq@create',function(){
})->middleware('auth');

Route::post('/faq/store', 'Faq@store',function(){
})->middleware('auth');

Route::get('/faq/edit/{id}','Faq@edit',function(){
})->middleware('auth');

Route::post('/faq/update','Faq@update',function(){
})->middleware('auth');

Route::get('/faq/detail/{id}','Faq@detail',function(){
})->middleware('auth');

Route::get('/faq/destroy/{id}','Faq@destroy',function(){
})->middleware('auth');

//route price
Route::get('/price','Price@index',function(){
})->middleware('auth');

Route::get('/price/create', 'Price@create',function(){
})->middleware('auth');

Route::post('/price/store', 'Price@store',function(){
})->middleware('auth');

Route::get('/price/edit/{id}','Price@edit',function(){
})->middleware('auth');

Route::post('/price/update','Price@update',function(){
})->middleware('auth');

Route::get('/price/detail/{id}','Price@detail',function(){
})->middleware('auth');

Route::get('/price/destroy/{id}','Price@destroy',function(){
})->middleware('auth');

//report
Route::get('/report','Report@index',function(){
})->middleware('auth');

Route::get('/report/create', 'Report@create',function(){
})->middleware('auth');

Route::post('/report/store', 'Report@store',function(){
})->middleware('auth');

Route::get('/report/edit/{id}','Report@edit',function(){
})->middleware('auth');

Route::post('/report/update','Report@update',function(){
})->middleware('auth');

Route::get('/report/detail/{id}','Report@detail',function(){
})->middleware('auth');

Route::get('/report/destroy/{id}','Report@destroy',function(){
})->middleware('auth');

//partner
Route::get('/partner','Partner@index',function(){
})->middleware('auth');

Route::get('/partner/create', 'Partner@create',function(){
})->middleware('auth');

Route::post('/partner/store', 'Partner@store',function(){
})->middleware('auth');

Route::get('/partner/edit/{id}','Partner@edit',function(){
})->middleware('auth');

Route::post('/partner/update','Partner@update',function(){
})->middleware('auth');

Route::get('/partner/destroy/{id}','Partner@destroy',function(){
})->middleware('auth');

//mentors
Route::get('/mentor','Mentor@index',function(){
})->middleware('auth');

Route::get('/mentor/add', 'Mentor@add',function(){
})->middleware('auth');

Route::post('/mentor/store', 'Mentor@store',function(){
})->middleware('auth');

Route::get('/mentor/edit/{id}','Mentor@edit',function(){
})->middleware('auth');

Route::post('/mentor/update','Mentor@update',function(){
})->middleware('auth');

Route::get('/mentor/destroy/{id}','Mentor@destroy',function(){
})->middleware('auth');

//video
Route::get('/video','Video@index',function(){
})->middleware('auth');

Route::get('/video/create', 'Video@create',function(){
})->middleware('auth');

Route::post('/video/store', 'Video@store',function(){
})->middleware('auth');

Route::get('/video/edit/{id}','Video@edit',function(){
})->middleware('auth');

Route::post('/video/update','Video@update',function(){
})->middleware('auth');

Route::get('/video/destroy/{id}','Video@destroy',function(){
})->middleware('auth');

//Order
Route::get('/order','Orders@getOrder',function(){
})->middleware('auth');

Route::get('/order/create', 'Orders@create',function(){
})->middleware('auth');

Route::post('/order/store', 'Orders@store',function(){
})->middleware('auth');

Route::get('/order/edit/{id}','Orders@edit',function(){
})->middleware('auth');

Route::post('/order/update','Orders@update',function(){
})->middleware('auth');

Route::get('/order/destroy/{id}','Orders@destroy',function(){
})->middleware('auth');

//Coupon
Route::get('/coupon','Coupons@index',function(){
})->middleware('auth');

Route::get('/coupon/create', 'Coupons@create',function(){
})->middleware('auth');

Route::post('/coupon/store', 'Coupons@store',function(){
})->middleware('auth');

Route::get('/coupon/edit/{id}','Coupons@edit',function(){
})->middleware('auth');

Route::post('/coupon/update','Coupons@update',function(){
})->middleware('auth');

Route::get('/coupon/destroy/{id}','Coupons@destroy',function(){
})->middleware('auth');

//route groups
Route::get('/group','Group@index',function(){
})->middleware('auth');

Route::get('/group/add','Group@add',function(){
})->middleware('auth');

Route::post('/group/store','Group@store',function(){
})->middleware('auth');

Route::get('/group/edit/{id}', 'Group@edit',function(){
})->middleware('auth');

Route::post('/group/update','Group@update',function(){
})->middleware('auth');

Route::get('/group/detail/{id}','Group@detail',function(){
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home',function(){
})->middleware('auth');

//--- API ---//
//route api users
Route::get('/user/getUser','User@getUser');

//route api testimoni
Route::get('/testimoni/getTestimoni','Testimoni@getTestimoni');

//route api faq
Route::get('/faq/getFaq','Faq@getFaq');

//route api price
Route::get('/price/getPrice','Price@getPrice');

//route api report
Route::get('/report/getReport','Report@getReport');

//route api partner
Route::get('/partner/getPartner','Partner@getPartner');

//route api video
Route::get('/video/getVideo','Video@getVideo');
// -- END --//
