<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>商品修改</title>
</head>
<body>
     <form action="/goods/update" method="post" enctype="multipart/form-data">
     <input type="hidden" name="id" value="{{$data->id}}">
        <table border='1' align="center">
        @csrf
            <tr>
                <td>商品名称</td>
                <td>
                    <input type="text" name="title" value="{{$data->title}}">
                </td>
            </tr>
            <tr>
                <td>商品图片</td>
                <td>
                    <input type="file" name="logl" id="">
                </td>
            </tr>
            <tr>
                <td>商品库存</td>
                <td>
                    <input type="text" name="num" value="{{$data->num}}">
                </td>
            </tr>
            <tr>
                <td colspan='2' align='center'>
                    <button type="">修改</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>