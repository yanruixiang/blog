@extends('indexcontroller.index')

@section('title', 'Page Title')

@section('sidebar')
    @parent
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>足球竞猜</title>
</head>
<body>
    <h1 align="center">添加竞猜球队</h1>
    <form  action="add_do" method="post">
        <table border='1' align="center">
        @csrf
            <tr>
                <td><input type="text" name="name"> VS <input type="text" name="name1"></td>
            </tr>
            <tr>
                <td>结束竞猜时间 <input type="date" name="shijian"></td>
            </tr>
            <tr align="center">
                <td>
                    <button type="">添加</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

@endsection
