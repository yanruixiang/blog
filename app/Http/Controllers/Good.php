<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Tools\Tools;
use DB;

class Good extends Controller
{
    public $tools;
    public function __construct(Tools $tools)
    {
        $this->tools=$tools;
    }

    // 表单添加
    public function create()
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $num=$redis->get('num');
        echo $num."<br/>";

        return view('Good/create');
    }
    // 添加执行
    public function save(Request $request)
    {
        $data = Request() -> all();
        $data['add_time'] = time();
        unset($data['_token']);

            if(request()->hasFile('goods_pic')){
                $path = $request->file('goods_pic')->store('good');
                $aa = asset('storage/'.$path);
                $data['goods_pic'] = $aa;
            }
            $a = DB::table('Good')->insert($data);
            if($a){
                return redirect('good/index');
            }else{
                return redirect()->back();
            }

    }

    // 展示页面
    public function index()
    {
        $redis=$this->tools->getRedis();
        $redis->incr('num');

        // $info = Good::orderBy('add_time','asc')->get()->toArray();
        // 搜索
        $keywords=request()->keywords??'';
        $where =[];
        if ($keywords) {
            $where[]=['goods_name','like',"%$keywords%"];
        }

        //分页
        $pagesize=config('app.pageSize');
        $data = DB::table('Good')->where($where)->paginate($pagesize);

        return view('good/index',['data'=>$data,'keywords'=>$keywords]);
    }

    // 删除
    public function del(Request $request)
    {
        $data = request() -> all();
        $a = DB::table('Good')->where('id','=',$data['id'])->delete();
        if($a){
            return redirect('good/index');
        }else{
            return redirect('删除失败','good/index');
        }
    }

    // 修改
    public function edit($id)
    {
        $data = DB::table('Good')->where(['id'=>$id])->first();
        return view('good/edit',compact('data'));
    }
    // 修改执行
    public function update(Request $request)
    {
        $data = $request->except(['_token']);
        $id=request()->id;
            if(request()->hasFile('goods_pic')){
                $path = $request->file('goods_pic')->store('good');
                $aa = asset('storage/'.$path);
                $data['goods_pic'] = $aa;
            }
        $a = DB::table('Good')->where(['id'=>$id])->update($data);
        if($a){
            return redirect('good/index');
        }
    }

}
