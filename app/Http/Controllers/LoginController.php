<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LoginController extends Controller
{
    public function create()
    {
        return view('logincontroller/create');
    }
    public function save(Request $request)
    {
        $aa = request()->all();
        // dd($aa);
        unset($aa['_token']);
        $aa['pwd'] = md5($aa['pwd']);
        // dd($aa);
        $aaa = DB::table('login')->insert($aa);
        // dd($aaa);
        if($aaa){
            return redirect('/login/login');
        }else{
            return view('/logincontroller/create');
        }
    }

    public function login()
    {
        return view('/logincontroller/login');
    }
    public function login_do()
    {
        $post = request()->all();
        $post['pwd'] = md5($post['pwd']);
        unset($post['_token']);
        $aa = DB::table('login')->where('name','=',$post['name'])->first();
        // dd($aa);
        if(empty($aa)){
            echo "<script>window.location.href='/login/create',alert('无此账号,请去注册页面')</script>";
        }else{
            if($aa->name==$post['name']&&$aa->pwd==$post['pwd']){
                echo "<script>window.location.href='/',alert('登陆成功');</script>";
            }else{
                echo "<script>window.location.href='/',alert('登陆失败');</script>";
                die;
            }
        }
    }
    public function index()
    {
        return view('/logincontrollerindex');
    }
}
