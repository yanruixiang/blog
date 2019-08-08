@extends('indexcontroller.index')

@section('title', 'Page Title')

@section('sidebar')
    @parent
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>商品添加</title>
</head>
<body>
     <form action="/admin/goodskc/add_do" method="post" enctype="multipart/form-data">
        <table border='1' align="center">
        @csrf
            <tr>
                <td>货物名称</td>
                <td>
                    <input type="text" name="goodskc_name">
                </td>
            </tr>
            <tr>
                <td>货物图片</td>
                <td>
                    <input type="file" name="goodskc_pic">
                </td>
            </tr>
            <tr>
                <td>库存</td>
                <td>
                    <input type="text" name="goodskc_num">
                </td>
            </tr>
            <tr>
                <td colspan='2' align='center'>
                    <button type="">添加</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
@endsection