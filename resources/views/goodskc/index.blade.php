@extends('indexcontroller.index')

@section('title', 'Page Title')

@section('sidebar')
    @parent
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>商品列表</title>
</head>
<link rel="stylesheet" type="text/css" href="{{asset('css/page.css')}}">
<body>
 <form>
        <input type="text" name="keywords" placeholder="请输入关键字" value="{{$keywords}}"><button>提交</button>
    </form>
    <table border='1'>
        <tr>
            <td>ID</td>
            <td>货物名称</td>
            <td>货物图片</td>
            <td>库存</td>
            <td>添加时间</td>
            <td>操作</td>
        </tr>
    @foreach($data as $v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->goodskc_name}}</td>
            <td><img src="{{$v->goodskc_pic}}" width="100"></td>
            <td>{{$v->goodskc_num}}</td>
            <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
            <td>
                <a href="edit/{{$v->id}}">修改</a>
                <a href="del/?id={{$v->id}}">删除</a>
            </td>
        </tr>
    @endforeach
    </table>
    {{$data->appends(['keywords'=>$keywords])->links()}}
</body>
</html>
@endsection