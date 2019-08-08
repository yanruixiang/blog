<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return view('index/login');
    }

    public function login_do(Request $request)
    {
        $post = request() -> all();
        // dd($post);
        $post['reg_time']=time();
        $post['password'] = md5($post['password']);
        unset($post['_token']);
        $a = DB::table('User')->where('name','=',$post['name'])->first();
        if(empty($a)){
            echo "<script>window.location.href='/index/login',alert('没有此账号')</script>";
        }else{
            if($a->name==$post['name']&&$a->password==$post['password']){
                echo "<script>window.location.href='/',alert('登陆成功');</script>";
            }else{
                echo "<script>window.location.href='/index/login',alert('登陆失败');</script>";
                die;
            }
        }
    }
}
