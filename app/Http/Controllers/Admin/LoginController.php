<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return view('indexcontroller/login');
    }

    public function login_do(Request $request)
    {
        $post = request() -> all();
        //dd($post);
        $post['reg_time']=time();
        $post['password'] = md5($post['password']);
        unset($post['_token']);
        $a = DB::table('User')->where('name','=',$post['name'])->first();
        //dd($a);
        if(empty($a)){
            echo "<script>window.location.href='/admin/login',alert('没有此账号')</script>";
        }else {
            //if ($a['state']==1) {
                //echo "<script>window.location.href='/admin/login',alert('没有权限登录')</script>";
            //}else{
            if($a->name==$post['name']&&$a->password==$post['password']){
                echo "<script>window.location.href='/admin/index',alert('登陆成功');</script>";
                 $request->session()->put('name', $post['name']);
            }else{
                echo "<script>window.location.href='/admin/login',alert('登陆失败');</script>";
                die;
            }
        }
    }
}
// }
