<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    public function index()
    {
        $data = DB::table('goods')->paginate(4);
        $dada = DB::table('goods')->get();

        return view('index/index',['data'=>$data,'dada'=>$dada]);
    }
    // 用户注册
    public function register()
    {
        return view('index/register');
    }

    public function register_do(Request $request)
    {
        $res = request() -> all();
        $res['reg_time']=time();
        // dd($res);
        unset($res['_token']);
        $res['password'] = md5($res['password']);

        $a = DB::table('User')->insert($res);
        if($a){
            return redirect('index/login');
        }else{
            return view('IndexController/register');
        }
    }

    //详情页
    public function shop(Request $request)
    {
        $dada = request() -> all();
        $data = DB::table('goods')->find($dada['id']);
        // dd($data);
        return view('index/shop',['data'=>$data]);
    }
    // 加入购物车
    public function shop_do(Request $request)
    {
        $data = Request() -> all();
        $data['add_time'] = time();
        unset($data['_token']);
        $where=[
            'goods_id'=>$data['goods_id']
        ];
        // dd($where);
        $count=DB::table('cart')->where($where)->count();
        // dd($count);
        // if ($count==1){
        //     echo('该商品已在购物车内');die;
        // }else{
            $res=DB::table('cart')->insert($data);
            // dd($res);
            if ($res){
                return redirect('index/cart');die;
            }else{
                return ('添加购物车失败');die;
            }
        // }
    }

    // 设置
    public function setting()
    {
        return view('index/setting');
    }
}
