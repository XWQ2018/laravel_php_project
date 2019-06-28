<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class menberController extends Controller{

    //exit()方式用于终止程序代码的执行
    //isset()判断某个变量是否有赋值  return Boolean
    //empty()判断值是否为空   return Boolean


/*     private $errorInfo=[
            'code'=>'41000',
            'msg'=>'数据错误'
        ]; */
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
     /*    var_dump(is_array($v));
        echo '<br/>';
        echo json_encode($v,320);
        echo '<hr/>'; */
        foreach($v as $k=>$vals){

            if(empty($v[$k])){
                $this->isEmpty($k);
            }
            return true;
        }
    }
    /* 字段的处理 */
    public function isEmpty($val){
        // echo $val;
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
            default:
            return true;
            break;

        }
    }

    public function info(){

        $resultStatus= $this->errorInfo($_POST);

        if($resultStatus){
            $sql="SELECT * FROM USER";

            //数据库操作之DB facade =>需要写sql语句
            $searchResult=\DB::SELECT($sql);

           /*  var_dump($searchResult); //打印结果，带有字段的类型
            echo'<br/><hr/>'; */

            print_r(count($searchResult)); //打印结果，不带字段类型
       

            echo '<hr/>';

            //数据库操作之查询构造器 =>不需要写sql语句
            // $tableResult = \DB::TABLE('USER')->GET()->first(); //获取全部数据
            // $tableResult = \DB::TABLE('USER')->first(); //获取第一条数据
            // $tableResult = \DB::TABLE('USER')->pluck('username','age'); //指定字段 后面不带get()
            // $tableResult = \DB::TABLE('USER')->select('username')->get(); //指定字段 
           /*  $tableResult = \DB::TABLE('USER')->orderBy('id','desc')->chunk(2,function($res){
                //使用此语句必须用orderBy()来指定是前面开始还是后面开始
                dd($res); 
            }); //每次查询2条数据
            */

            //插入数据  

           /*  $bool = \DB::TABLE('USER')->truncate();

            var_dump($bool); */

            // var_dump(phpinfo());

          /*   try{

            }catch(PDOException $e){

            }; */

            //添加事务处理
            \DB::transaction(function () {
            /*    $tableResult = \DB::TABLE('USER')->select()->get();

               dd($tableResult);
 */

               for($i=0;$i<100;$i++){

                    $bool = \DB::TABLE('USER')->INSERT([
                        'username'=>'188851888'.$i,
                        'password'=>'98765432'.$i,
                        'age'=>$i+1,
                        'create_time'=>'2019-12-'.$i,
                        'update_time'=>'2019-12-'.$i,
                        'nickname'=>'BB'.$i
                        ]);
                }
                
            });
            
           /*  $insertInfo=function(){
                $result=[
                    'code'=>'20000',
                    'msg'=>'数据插入成功'
                ];

                $num=0;
                if($num>=100){
                    echo json_encode($result,320);

                    exit();
                }
                for($i=0;$i<100;$i++){
                    echo $num;
                    $bool = \DB::TABLE('USER')->INSERT([
                        'username'=>'188851888'.$i,
                        'password'=>'98765432'.$i,
                        'age'=>$i,
                        'create_time'=>'2019-12-'.$i,
                        'update_time'=>'2019-12-'.$i,
                        'nickname'=>'BB'.$i
                        ]);
                    $num++;
                }

                
            };

           for($i=0;$i<100;$i++){

                $insertInfo();
                
            } */


        }

        exit();


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