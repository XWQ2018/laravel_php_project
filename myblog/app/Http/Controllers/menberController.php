<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class menberController extends Controller{

    private $errorInfo=[
            'code'=>'41000',
            'msg'=>'数据错误'
        ];
    /*信息返回  */
    public function backInfo($vl){
        $errorInfo=[
            'code'=>'41000',
            'msg'=>$vl . '不能为空',
        ];
        exit(json_encode($errorInfo,320));

    }
    /* 空值的处理 */
    public function errorInfo($v){
        // echo(json_encode($this->errorInfo,320));//访问类中的变量
        var_dump(is_array($v));
        echo '<br/>';
        echo json_encode($v,320);
        echo '<hr/>';
        foreach($v as $k=>$vals){

            if(empty($v[$k])){
                $this->isEmpty($k);
            }
        }
    }
    /* 字段的处理 */
    public function isEmpty($val){
        echo $val;
        switch($val){
            case 'username':
            $this->backInfo('用户名');
            break;
            case 'password':
            $this->backInfo('密码');
            break;
            case 'age':
            $this->backInfo('年龄');
            break;
            case 'create_time':
            $this->backInfo('创建时间');
            break;
            case 'update_time':
            $this->backInfo('更新时间');
            break;
            case 'nickname':
            $this->backInfo('爱好');
            break;

        }
    }

    public function info(){

        $this->errorInfo($_POST);

        exit();
       /*  $errorInfo=[
            'code'=>'41000',
            'msg'=>'数据错误'
        ]; */

        //exit()方式用于终止程序代码的执行
        //isset()判断某个变量是否有赋值  return Boolean
        //empty()判断值是否为空   return Boolean


      /*   if(empty($_POST['username'])){
            $this->isEmpty(6666);
            exit(json_encode($errorInfo,320));
        } */



        $username = isset($_POST['username'])?isset($_POST['username']):exit(json_encode($errorInfo,320));
        $password = isset($_POST['password'])?isset($_POST['password']):exit(json_encode($errorInfo,320));
        $age = isset($_POST['age'])?isset($_POST['age']):exit(json_encode($errorInfo,320));
        $create_time = isset($_POST['create_time'])?isset($_POST['create_time']):exit(json_encode($errorInfo,320));
        $update_time = isset($_POST['update_time'])?isset($_POST['update_time']):exit(json_encode($errorInfo,320));
        $nickname = isset($_POST['nickname'])?isset($_POST['nickname']):exit(json_encode($errorInfo,320));

        echo '<hr>';

        $requestInfo=[
            'username'=>$_POST['username'],
            'password'=>$_POST['password'],
            'age'=>$_POST['age'],
            'create_time'=>$_POST['create_time'],
            'update_time'=>$_POST['update_time'],
            'nickname'=>$_POST['nickname'],
            
        ];

        echo (json_encode($requestInfo,320));
        echo '<br/>';
        var_dump('参数==',count($_POST));

        echo '<br/>';
        var_dump('判断是否有值==',isset($username));
        
        if(!isset($requestInfo)){
            print_r('这是一个数组');
        }
        echo "<br/>";
        echo "<hr/>";

        $DB_result=\DB::select('select * from user');
        $result = json_encode($DB_result,320); 
        var_dump(json_encode($DB_result,320));
        echo '<br/><hr/>';

            foreach($DB_result as $val){
                print_r($val);
                echo "<br/>";
            }
    }
}