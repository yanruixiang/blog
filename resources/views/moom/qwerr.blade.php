@extends('indexcontroller.index')

@section('title', 'Page Title')

@section('sidebar')
    @parent
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
<h1 align="center">竞猜结果</h1>
    <table border="1" align="center">
       @foreach($data as $v)
        <tr align="center">
            <td>对阵结果:</td>
            <td>{{$v->name}}{{$v->sex1}}{{$v->name1}}</td>
        </tr>
        <tr>
            <td>您的竞猜:&nbsp;&nbsp;</td>
            <td>{{$v->name}}{{$v->sex}}{{$v->name1}}</td>
        </tr>
        <tr>
            <td>结果:</td>
            <td>很遗憾，没能猜中</td>
        </tr>
    @endforeach
    </table>
</body>
</html>

@endsection
