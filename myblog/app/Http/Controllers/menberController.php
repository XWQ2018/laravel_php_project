<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class menberController extends Controller{
    public function info(){
        // return "我是==Controller";
        $responseResult=[
            'code'=>20000,
            'data'=>[
                'list'=>[
                    'name'=>'张三',
                    'age'=>'18',
                    'nickName'=>'运动',
                ]
            ],
                
        ];

        return json_encode($responseResult,320);
    }
}