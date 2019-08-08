<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Student extends Controller
{
    public function add()
    {
        return view('/student/add');
    }
    public function index()
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
        $num=$redis->get('num');
        echo "当前访问 ".$num." 次";
        //搜索
        $keywords=request()->keywords??'';
        $where =[];
        if ($keywords) {
            $where[]=['student_name','like',"%$keywords%"];
        }
        //分页
        $pagesize=config('app.pageSize');
        $data = DB::table('student')->where($where)->paginate($pagesize);
        return view('/student/index',['data'=>$data,'keywords'=>$keywords]);
    }
    public function add_do(Request $request)
    {
        $data = request()->all();
        // dump($data);die;
        unset($data['_token']);
        $post=DB::table('student')->insert($data);
        // dump($post);
        if($post){
            return redirect('admin/student/index');
        }else{
            return redirect()->back();
        }
    }
    public function del(Request $request)
    {
        $data = request()->all();
        //dump($data);die;

        $res = DB::table('student')->where('id','=',$data['id'])->delete();
        // dd($res);
        if($res){
            return redirect('admin/student/index');
        }else{
            return redirect('删除失败','student/index');
        }
    }
    public function edit($id)
    {
        //dd($id);
        $data = DB::table('student')->where(['id'=>$id])->first();
        // dd($data);
        return view('student.edit',compact('data'));
    }
    public function update(Request $request)
    {
        $data = $request->except(['_token']);
        $id = $request->id;
        $res=DB::table('student')->where(['id'=>$id])->update($data);
        if($res){
            return redirect('admin/student/index');
        }
    }
}
