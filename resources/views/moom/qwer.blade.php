@extends('indexcontroller.index')

@section('title', 'Page Title')

@section('sidebar')
    @parent
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>aaa</title>
</head>
<body>
<h1 align="center">比赛结果</h1>
    <form action="/admin/moom/qwer_update" method="post">
        <table border="1" align="center">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
            <tr>
                <td>
                    <input type="text" name="name" value="{{$data->name}}"> VS <input type="text" name="name1" value="{{$data->name1}}">
                </td>
            </tr>
            <tr align="center">
                <td>
                    <input type="radio" name="sex1" value="胜">胜
                    <input type="radio" name="sex1" value="平">平
                    <input type="radio" name="sex1" value="负" checked>负
                </td>
            </tr>
            <tr align="center">
                <td>
                    <button type="">查看竞猜结果</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

@endsection
