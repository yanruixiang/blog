
@extends('index.add')

@section('title', 'Page Title')

@section('sidebar')
    <style>
  [type="checkbox"]:not(:checked), [type="checkbox"]:checked {
    position: inherit;
    left: -9999px;
    opacity: 1;
  }
  </style>
<!-- cart -->
    <div class="cart section">
        <div class="container">
            <div class="pages-head">
                <h3>购物车</h3>
            </div>
            <div class="content">
                <div class="divider"></div>
                <div class="cart-1">
                   <td width="100%" colspan="4"><a href="javascript:;"><input type="checkbox" name="1" id="allbox" /> 全选</a>
                   </td>
                @foreach($data as $k=>$v)
                    <td width="4%"><input type="checkbox" class="box" cart_id="{{$v->id}}" newp="{{$v->goods_price}}"/></td>
                    <div class="row">
                        <div class="col s5">
                            <h5>Image</h5>
                        </div>
                        <div class="col s7">
                            <img src="{{$v->goods_pic}}" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>Name</h5>
                        </div>
                        <div class="col s7">
                            <h5><a href="">{{$v->goods_name}}</a></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>Quantity</h5>
                        </div>
                        <div class="col s7">
                            <input value="1" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>Price</h5>
                        </div>
                        <div class="col s7">
                            <h5>￥{{$v->goods_price}}</h5>
                        </div>
                    </div>
                    <div class="row" id="{{$v->cart_id}}">
                        <div class="col s5">
                            <h5>Action</h5>
                        </div>
                        <div class="col s7">
                            <h5><i class="fa fa-trash del"></i></h5>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="total">
                <div class="row">
                    <div class="col s7">
                        <h6>Total</h6>
                    </div>
                    <div class="col s5">
                        <h6>￥</h6>
                    </div>
                </div>
            </div>
            <button class="btn button-default" id="jiesuan">前去结算</button>
        </div>
    </div>


<script src="/index/js/jquery.min.js"></script>
<script src="/index/layui/layui.js" ></script>
<script>
    $(function () {
        layui.use('layer',function(){
            var layer = layui.layer;
        });
         // 给当前复选框选中
        function boxChecked(_this){
            _this.parents("tr").find("input[class='box']").prop("checked",true);
            // 调用获取商品总价方法
        }
        //全选
        $("#allbox").click(function(){
            var status = $(this).prop('checked');
            $('.box').prop('checked',status);


            // 调用获取商品总价方法
            countTotal();
        });
        //复选框的点击事件
        $('.box').click(function(){
            // 调用获取商品总价方法
            countTotal();
        });
        // 点击删除
        $(document).on('click','.del',function(){
            // js改变购买数量
            var _this = $(this);
            var cart_id = _this.parents('.row').attr('id');
            // alert(cart_id)
            // 把商品id传给控制器
            $.get(
                "cartDel",
                {id:cart_id},
                function(res){
                    layer.msg(res.font,{icon:res.code},function () {
                        // 重新获取列表当前的数据或者把当前这行元素移除
                        location.reload();
                        //调用获取商品总价方法
                        countTotal();
                    });
                },
            );
        });
        //更改购买数量
        function changeBuyNumber(cart_id,goods_num) {
            $.get(
                '/index/changeBuyNmber',
                {cart_id:cart_id,goods_num:goods_num},
                function (res) {
                    console.log(res)
                }
            )
        };
        // 获取小计
        function getSubTotal(goods_num,price,_this) {
            $.get(
                "getSubTotal",
                {goods_num:goods_num,price:price},
                function(res){
                    _this.parents('#tr').find('.newp').text(res);
                    _this.parents('#tr').find('input[class=box]').attr("newp",res);
                    countTotal();
                }
            );
        };
        // 获取商品总价
        function countTotal(){
            // 获取所有选中的复选框 对应的商品id
            var _box = $('.box');
            var price=0;
            _box.each(function(index){
                if ($(this).prop('checked') == true) {
                    price+=parseInt($(this).attr('newp'));
                }
            });
            $('#total').text(price);
        }
        //点击确认结算
        $("#jiesuan").click(function(){
            //获取选中的复选框的商品id
            var goods_id=[];
            $('.box:checked').each(function(){
                var cart_id=$(this).attr('cart_id');
                goods_id.push(cart_id);
            })
            var _id=goods_id.join(',');
            if (_id==''){
                alert('请至少选择一件商品进行结算');
                return false;
            }
            location.href="/index/checkout/"+_id;
        })
    })
</script>

@endsection
