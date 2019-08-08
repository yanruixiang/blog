<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class goodskc extends Controller
{
    public function add()
    {
        return view('goodskc/add');
    }
    public function add_do(Request $request)
    {
        $data = Request() -> all();
        $data['add_time'] = time();
        unset($data['_token']);
        if(request()->hasFile('goodskc_pic')){
            $path = $request->file('goodskc_pic')->store('goodskc');
            $aa = asset('storage/'.$path);
            $data['goodskc_pic'] = $aa;
        }
        $a = DB::table('goodskc')->insert($data);
        if($a){
            return redirect('/admin/goodskc/index');
        }else{
            return redirect()->back();
        }
    }

    public function index()
    {
        //访问次数
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
        $num = $redis->get('num');
        echo "访问次数: ".$num;

        //搜索
        $keywords=request()->keywords??'';
        $where =[];
        if ($keywords) {
            $where[]=['goodskc_name','like',"%$keywords%"];
        }
        //分页
        $pagesize=config('app.pageSize');
        $data = DB::table('goodskc')->where($where)->paginate($pagesize);
        return view('goodskc/index',['data'=>$data,'keywords'=>$keywords]);
    }

    public function del(Request $request)
    {
        $data = request() -> all();
        $a = DB::table('goodskc')->where('id','=',$data['id'])->delete();
        if($a){
            return redirect('admin/goodskc/index');
        }else{
            return redirect('删除失败','admin/goodskc/index');
        }
    }


    public function edit($id)
    {
        $data = DB::table('goodskc')->where(['id'=>$id])->first();
        // dd($data);
        return view('goodskc.edit',compact('data'));
    }
    public function update(Request $request)
    {
        $data = $request ->except(['_token']);
         $id = $request->id;
        if(request()->hasFile('goodskc_pic')){
            $path = $request->file('goodskc_pic')->store('goodskc');
            $dada=asset('storage/'.$path);
            $data['goodskc_pic']=$dada;
            // dd($dada);die;
        }
        $res=DB::table('goodskc')->where(['id'=>$id])->update($data);
        if($res){
            return redirect('admin/goodskc/index');
        }
    }
}

