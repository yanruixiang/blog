@extends('indexcontroller.index')

@section('title', 'Page Title')

@section('sidebar')
    @parent
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
            <form action="guess_list" method="post">
                <table border=1 align="center">
                    <h4 align="center">竞猜列表</h4>
                    <tr>

                    </tr>
                    @foreach($data as $k=>$v)
                    <tr>
                        <td>{{$v->name}} VS {{$v->name1}}</td>
                        @if($v->shijian)
                            <td><a href="{{url('admin/moom/edit',['id'=>$v->id])}}">竞猜</a></td>
                        @else
                            <td><a href="{{url('admin/moom/edit',['id'=>$v->id])}}">查看结果</a></td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </form>
    </body>
</html>

@endsection

