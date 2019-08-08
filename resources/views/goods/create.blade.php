<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>商品添加</title>
</head>
<body>
     <form action="/goods/save" method="post" enctype="multipart/form-data">
        <table border='1' align="center">
        @csrf
            <tr>
                <td>商品名称</td>
                <td>
                    <input type="text" name="title">
                </td>
            </tr>
            <tr>
                <td>商品图片</td>
                <td>
                    <input type="file" name="logl">
                </td>
            </tr>
            <tr>
                <td>商品库存</td>
                <td>
                    <input type="text" name="num">
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