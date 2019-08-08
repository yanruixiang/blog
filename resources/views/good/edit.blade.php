<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>商品修改</title>
</head>
<body>
    <form action="/good/update" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{$data->id}}">
        <table border='1' align="center">
            @csrf
            <tr>
                <td>商品名称</td>
                <td>
                    <input type="text" name="goods_name" value="{{$data->goods_name}}">
                </td>
            </tr>
            <tr>
                <td>商品图片</td>
                <td>
                    <input type="file" name="goods_pic">
                </td>
            </tr>
            <tr>
                <td>商品价格</td>
                <td>
                    <input type="text" name="goods_price" value="{{$data->goods_price}}">
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