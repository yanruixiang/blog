<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Tools\Tools;
use DB;

class Goods extends Controller
{
    public $tools;
    public function __construct(Tools $tools)
    {
        $this->tools=$tools;
    }
    public function create()
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $num=$redis->get('num');
        echo $num."<br/>";

        return view('Goods/create');
    }
    public function save(Request $request)
    {
        $data = request() -> all();
        $data['create_time']=time();
        unset($data['_token']);
        // 文件上传

        if(request()->hasFile('logl')){
            $path = $request->file('logl')->store('goods');
            $dada=asset('storage/'.$path);
            $data['logl']=$dada;
            // dump($dada);die;
        }
        $aa = DB::table('goods')->insert($data);
        if($aa){
            return redirect('goods/index');
        }else{
            return redirect()->back();
        }
    }

    public function index()
    {
        $redis=$this->tools->getRedis();
        $redis->incr('num');

        //搜索
        $keywords=request()->keywords??'';
        $where =[];
        if ($keywords) {
            $where[]=['title','like',"%$keywords%"];
        }
        //分页
        $pagesize=config('app.pageSize');
        $data = DB::table('goods')->where($where)->paginate($pagesize);
        return view('Goods/index',['data'=>$data,'keywords'=>$keywords]);
    }

    public function del(Request $request)
    {
        $data = request()->all();
        $res = DB::table('Goods')->where('id','=',$data['id'])->delete();
        if($res){
            return redirect('goods/index');
        }else{
            return redirect('删除失败','goods/index');
        }
    }

    public function edit($id)
    {
         //dd($id);
        $data = DB::table('Goods')->where(['id'=>$id])->first();
        // dd($data);
        return view('goods.edit',compact('data'));
    }
    public function update(Request $request)
    {
        $data = $request->except(['_token']);
        $id = $request->id;
        if(request()->hasFile('logl')){
            $path = $request->file('logl')->store('goods');
            $dada=asset('storage/'.$path);
            $data['logl']=$dada;
            // dd($dada);die;
        }
        // dd($data);
        $res=DB::table('Goods')->where(['id'=>$id])->update($data);
        if($res){
            return redirect('goods/index');
        }
    }
}
