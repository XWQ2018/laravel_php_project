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
        try {

            $ret = DB::TABLE('user')->insertGetId([
                'username' => $userName,
                'password' => $userPassword,
                'age' => $age,
                'create_time' => $currentTime,
                'update_time' => $currentTime,
                'nickname' => $nickName,
            ]);
            // print_r(date("Y-m-d H:i:s", time()));
            $dateTime = date("Y-m-d H:i:s", time());
            print_r($ret);
            echo '<br/><hr/>';
            return [
                'code' => '20000',
                'msg' => '数据插入成功',
                'time' => $dateTime,
            ];

        } catch (PDOException $e) {

            print_r($e);
        }

        // print_r($userName . '=>' . $userPassword);
    }
}
