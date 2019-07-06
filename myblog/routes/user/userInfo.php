<?php
// Route::post('/user/userInfo',"menberController@info"); //第一种写法
//查询所有数据
Route::post('/user/userInfo', ["uses" => "menberController@info"]);

//用户注册
Route::post('/user/createUser', ['uses' => 'createUserController@createUser']);
