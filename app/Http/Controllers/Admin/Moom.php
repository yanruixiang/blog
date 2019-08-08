<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Moom extends Controller
{
    public function add()
    {
        return view('moom/add');
    }
    public function add_do(Request $request)
    {
        $data = Request() -> all();
        unset($data['_token']);
        if($data['name']==$data['name1']){
            echo "两个球队不能重复";
        }
        $data['add_time'] = time();
            $a = DB::table('Moom')->insert($data);
            if($a){
                return redirect('/admin/moom/index');
            }else{
                return redirect()->back();
            }
    }

    public function index(Request $request)
    {
        $data = DB::table('Moom')->get();

        return view('moom/index',['data'=>$data]);
    }

    public function edit($id)
    {
        $data = DB::table('Moom')->where(['id'=>$id])->first();
        return view('moom/edit',compact('data'));
    }
    public function update(Request $request)
    {
        $data = request() -> except(['_token']);
        $id=request()->id;
        $res=DB::table('Moom')->where(['id'=>$id])->update($data);
        if($res){
            return redirect('admin/moom/index');
        }
    }

    public function qwer($id)
    {
         $data = DB::table('Moom')->where(['id'=>$id])->first();
        return view('moom/qwer',compact('data'));
    }
    public function qwer_update(Request $request)
    {
        $data = request() -> except(['_token']);
        $id=request()->id;
        $res=DB::table('Moom')->where(['id'=>$id])->update($data);
        if($res){
            return redirect('admin/moom/qwerr');
        }
    }

    public function qwerr()
    {
        $data = DB::table('Moom')->orderBy('id', 'desc')->get();
        return view('moom/qwerr',['data'=>$data]);
    }
}
