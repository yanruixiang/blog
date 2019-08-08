@extends('indexcontroller.index')

@section('title', 'Page Title')

@section('sidebar')
    @parent
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>竞猜选项</title>
</head>
<body>
<h1 align="center">我要竞猜</h1>
    <form action="/admin/moom/update" method="post">
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
                    <input type="radio" name="sex" value="胜">胜
                    <input type="radio" name="sex" value="平">平
                    <input type="radio" name="sex" value="负">负
                </td>
            </tr>
            <tr align="center">
                <td>
                    <button type="">投票</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

@endsection
