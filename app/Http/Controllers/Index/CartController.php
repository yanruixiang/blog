<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CartController extends Controller
{
    //购物车
   public function cart()
   {
       $data=DB::table('cart')
            ->join('goods','cart.goods_id','=','goods.id')
            ->where('is_del',1)
            ->get();
            // dd($data);
        foreach ($data as $k => $v){
            $data[$k]->cart_price=$v->goods_price*$v->goods_num;
        }
      // dd($data);
      return view('index/cart',['data'=>$data]);
   }


   //删除购物车单条数据
    public function cartDel()
    {
        $id=request()->id;
        // dd($id);
        $where = [
            'cart_id'=> $id
        ];
        // 用in 是因为单删
        $info = [
            'is_del'=>2
        ];
        $res = DB::table('cart')->where($where)->update($info);
        // dd($res);
        if ($res){
            return ['font'=>'删除成功','code'=>6];die;
        }else{
            return ['font'=>'删除失败','code'=>5];die;
        }
    }

    //更改购买数量
    public function changeBuyNmber()
    {
        $id=request()->cart_id;
        $num=request()->goods_num;
        $data=[
            'cart_shuliang'=>$num
        ];
        DB::table('cart')->where('cart_id',$id)->update($data);
    }
    //获取小计
    public function getSubTotal()
    {
        $num=request()->goods_num;
        $price=request()->price;
        return $newprice=$num*$price;

    }

      //购买件数得到的价格
    public function newprice()
    {
        $id=request()->id;
        $num=request()->kucun;
        $data=DB::table('goods')->where('goods_id',$id)->get();
        $price=$data[0]->goods_selfprice;
        $newprice=$num*$price;
        return $newprice;
    }


    // 结算页面
    public function checkout()
    {
        $id=request()->cart_id;
        $cart_id=explode(',',$id);
        $data=DB::table('cart')
            ->whereIn('cart_id',$cart_id)
            ->join('goods','cart.goods_id','=','goods.id')
            ->get();
        $price=0;
        foreach ($data as $k => $v){
            $data[$k]->goods_pic = ltrim($v->goods_pic, '|');
            $data[$k]->zongjia=$data[$k]->goods_price*$data[$k]->goods_num;
            $price+=$data[$k]->zongjia;
        }
        $address=DB::table('address')
            ->orderBy('is_default')
            ->get();
        return view('index/checkout',compact('data','address','price'));
    }
}
