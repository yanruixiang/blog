<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Tools\Tools;
use DB;

class StudentController extends Controller
{
    public $tools;
    public function __construct(Tools $tools)
    {
        $this->tools=$tools;
    }

    public function create()
    {
        dd($redis);
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $num=$redis->get('num');
        echo $num."<br/>";

        return view('studentcontroller/create');
    }
    public function index()
    {
        $redis=$this->tools->getRedis();
        $redis->incr('num');

        //搜索
        $keywords=request()->keywords??'';
        $where =[];
        if ($keywords) {
            $where[]=['name','like',"%$keywords%"];
        }
        //分页
        $pagesize=config('app.pageSize');
        $data = DB::table('y_student')->where($where)->paginate($pagesize);
        // dd($data);die;

        //测试用 可删除
        echo 111;

        return view('studentcontroller/index',['data'=>$data,'keywords'=>'$keywords']);
    }
    public function save(Request $request)
    {
        $data = request()->all();
        // dump($data);die;
        unset($data['_token']);
        $post=DB::table('y_student')->insert($data);
        // dump($post);
        if($post){
            return redirect('student/index');
        }else{
            return redirect()->back();
        }
    }
    public function delete(Request $request)
    {
        $data = request()->all();
        //dump($data);die;

        $res = DB::table('y_student')->where('id','=',$data['id'])->delete();
        // dd($res);
        if($res){
            return redirect('student/index');
        }else{
            return redirect('删除失败','student/index');
        }
    }
    public function edit($id)
    {
        //dd($id);
        $data = DB::table('y_student')->where(['id'=>$id])->first();
        // dd($data);
        return view('studentcontroller.edit',compact('data'));
    }
    public function update(Request $request)
    {
        $data = $request->except(['_token']);
        $id = $request->id;
        $res=DB::table('y_student')->where(['id'=>$id])->update($data);
        if($res){
            return redirect('student/index');
        }
    }
}
