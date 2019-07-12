<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class createUserController extends Controller
{

    public function createUser()
    {

        if (!(isset($_POST['user_name']))) {
            $error_info = [
                'code' => '40000',
                'msg' => '缺少参数',
            ];

            echo json_encode($error_info, 320);

            exit();
        }

        //获取参数
        $userName = $_POST['user_name'];
        $userPassword = md5($_POST['user_password']);
        $age = $_POST['age'];
        $nickName = $_POST['nick_name'];
        $currentTime = time();

        //原生插入方式
        // $result = DB::INSERT("insert into user (username,password,age,create_time,update_time,nickname) values (?,?,?,?,?,?)", [$userName, $userPassword, '18', '1646449455', '1646449455', 'gegeg']);

        //构造器查询方式,依赖PDO
        // $ret = DB::table('user')->whereRaw('id>=5')->get();

        // $ret = DB::table('user')->orderBy('id', 'desc')->offset(0)->limit(10)->get();
        /* $ret = DB::TABLE('user')->INSERT([
        'username' => $userName,
        'password' => $userPassword,
        'age' => $age,
        'create_time' => $currentTime,
        'update_time' => $currentTime,
        'nickname' => $nickName,
        ]); */
        /* 
        如需过滤变量，请使用下面的过滤器函数之一：
        filter_var() - 通过一个指定的过滤器来过滤单一的变量
        filter_var_array() - 通过相同的或不同的过滤器来过滤多个变量
        filter_input - 获取一个输入变量，并对它进行过滤
        filter_input_array - 获取多个输入变量，并通过相同的或不同的过滤器对它们进行过
        */
        $int = '123abv';

        if (!filter_var($int, FILTER_VALIDATE_INT)) {
            echo ("Integer is not valid");
        } else {
            echo ("Integer is valid");
        }



        DB::beginTransaction();  //开启事务
        try {
            $ret = DB::TABLE('user')->insertGetId([
                'username' => $userName,
                'password' => $userPassword,
                'age' => $age,
                // 'create_time' => $currentTime,
                'update_time' => $currentTime,
                'nickname' => $nickName,
            ]);
            // print_r(date("Y-m-d H:i:s", time()));
            $dateTime = date("Y-m-d H:i:s", time());
            print_r($ret);
            echo '<br/><hr/>';
            DB::commit();
            return [
                'code' => '20000',
                'msg' => '数据插入成功',
                'time' => $dateTime,
            ];
        } catch (PDOException $e) {

            DB::rollBack(); //回滚操作

            print_r($e);
        }


        // print_r($userName . '=>' . $userPassword);
    }
}
