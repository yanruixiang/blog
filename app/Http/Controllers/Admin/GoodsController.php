<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodsController extends Controller
{
    public function add()
    {
        return view('goodscontroller/add');
    }
    public function add_do(Request $request)
    {
        $data = Request() -> all();
        $data['add_time'] = time();
        unset($data['_token']);

            if(request()->hasFile('goods_pic')){
                $path = $request->file('goods_pic')->store('goods');
                $aa = asset('storage/'.$path);
                $data['goods_pic'] = $aa;
            }
            $a = DB::table('Goods')->insert($data);
            if($a){
                return redirect('/admin/goods/index');
            }else{
                return redirect()->back();
            }
    }

    public function index()
    {
        //搜索
        $keywords=request()->keywords??'';
        $where =[];
        if ($keywords) {
            $where[]=['goods_name','like',"%$keywords%"];
        }
        //分页
        $pagesize=config('app.pageSize');
        $data = DB::table('Goods')->where($where)->paginate($pagesize);
        return view('goodscontroller/index',['data'=>$data,'keywords'=>$keywords]);
    }

    public function del(Request $request)
    {
        $data = request() -> all();
        $a = DB::table('Goods')->where('id','=',$data['id'])->delete();
        if($a){
            return redirect('admin/goods/index');
        }else{
            return redirect('删除失败','admin/goods/index');
        }
    }

    public function edit($id)
    {
        $data = DB::table('Goods')->where(['id'=>$id])->first();
        // dd($data);
        return view('goodscontroller.edit',compact('data'));
    }
    public function update(Request $request)
    {
        $data = $request ->except(['_token']);
         $id = $request->id;
        if(request()->hasFile('goods_pic')){
            $path = $request->file('goods_pic')->store('goods');
            $dada=asset('storage/'.$path);
            $data['goods_pic']=$dada;
            // dd($dada);die;
        }
        $res=DB::table('Goods')->where(['id'=>$id])->update($data);
        if($res){
            return redirect('admin/goods/index');
        }
    }
}

