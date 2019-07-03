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

//引入用户查询路由组件
require __DIR__ . './user/userInfo.php';
