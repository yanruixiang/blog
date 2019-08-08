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
 <form align="center">
        <input type="text" name="keywords" placeholder="请输入关键字" value="{{$keywords}}"><button>提交</button>
    </form>
    <table border='1' align="center">
        <tr>
            <td>ID</td>
            <td>商品名称</td>
            <td>商品图片</td>
            <td>商品库存</td>
            <td>商品添加时间</td>
            <td>操作</td>
        </tr>
    @foreach($data as $v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->goods_name}}</td>
            <td><img src="{{$v->goods_pic}}" width="100"></td>
            <td>{{$v->goods_num}}</td>
            <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
            <td>
                <a href="del/?id={{$v->id}}">删除</a>
                <a href="edit/{{$v->id}}">修改</a>
            </td>
        </tr>
    @endforeach
    </table>
    <center>{{$data->appends(['keywords'=>$keywords])->links()}}</center>
</body>
</html>

@endsection