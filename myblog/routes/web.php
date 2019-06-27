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
    return view('welcome');
});


//路由带参数
/* Route::get('/user/{id}',function($id){
    return $id;
}); */


//控制器的使用
// Route::post('/user/userInfo',"menberController@info");
Route::post('/user/userInfo',["uses"=>"menberController@info"]);
