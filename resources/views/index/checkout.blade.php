
@extends('index.add')


@section('title', 'Page Title')


@section('sidebar')
    @parent
<!-- checkout -->
    <div class="checkout pages section">
        <div class="container">
            <div class="pages-head">
                <h3>结算</h3>
            </div>
            <div class="checkout-content">
                <div class="row">
                    <div class="col s12">
                        <ul class="collapsible" data-collapsible="accordion">
                            <li>
                                <div class="collapsible-header active"><h5>1 - 结账方法</h5></div>
                                <div class="collapsible-body">
                                    <h6>Checkout as a Guest or Register</h6>
                                    <form action="#" class="checkout-radio">
                                                <div class="input-field">
                                                    <input type="radio" class="with-gap" id="bank-transfer" name="group1">
                                                    <label for="bank-transfer"><span>支付宝支付</span></label>
                                                </div>
                                                <div class="input-field">
                                                    <input type="radio" class="with-gap" id="cash-on-delivery" name="group1">
                                                    <label for="cash-on-delivery"><span>货到付款</span></label>
                                                </div>
                                                <div class="input-field">
                                                    <input type="radio" class="with-gap" id="online-payments" name="group1">
                                                    <label for="online-payments"><span>在线支付</span></label>
                                                </div>


                                            <a href="" class="btn button-default">继续</a>
                                        </form>
                                    <div class="checkout-login">
                                        <div class="row">
                                            <form class="col s12">
                                                <h6>Login</h6>
                                                <p>Lorem ipsum dolor sit amet.</p>
                                                <div class="input-field">
                                                    <h5>用户名/邮箱</h5>
                                                    <input type="text" class="validate" required>
                                                </div>
                                                <div class="input-field">
                                                    <h5>Password</h5>
                                                    <input type="password" class="validate" required>
                                                </div>
                                                <a href=""><h6>忘记 Password ?</h6></a>
                                                <a href="" class="btn button-default">登录</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header"><h5>2 - 结算信息</h5></div>
                                <div class="collapsible-body">
                                    <div class="billing-information">
                                        <form action="#">
                                            <div class="input-field">
                                                <h5>Name*</h5>
                                                <input type="text" class="validate" required>
                                            </div>
                                            <div class="input-field">
                                                <h5>邮件*</h5>
                                                <input type="email" class="validate" required>
                                            </div>
                                            <div class="input-field">
                                                <h5>公司名</h5>
                                                <input type="text" class="validate">
                                            </div>
                                            <div class="input-field">
                                                <h5>地址*</h5>
                                                <input type="text" class="validate" required>
                                            </div>
                                            <div class="input-field">
                                                <h5>镇/市*</h5>
                                                <input type="text" class="validate" required>
                                              </div>
                                            <div class="input-field">
                                                <h5>国家/地区*</h5>
                                                <input type="text" class="validate" required>
                                            </div>
                                            <div class="input-field">
                                                <h5>Portalcode/ZIP*</h5>
                                                <input type="number" class="validate" required>
                                            </div>
                                            <div class="input-field">
                                                <h5>电话*</h5>
                                                <input type="number" class="validate" required>
                                            </div>
                                            <a href="" class="btn button-default">继续</a>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header"><h5>3 - 运输信息</h5></div>
                                <div class="collapsible-body">
                                    <div class="shipping-information">
                                        <form action="#">
                                            <div class="input-field">
                                                <h5>Name*</h5>
                                                <input type="text" class="validate" required>
                                            </div>
                                            <div class="input-field">
                                                <h5>邮件*</h5>
                                                <input type="email" class="validate" required>
                                            </div>
                                            <div class="input-field">
                                                <h5>公司名</h5>
                                                <input type="text" class="validate">
                                            </div>
                                            <div class="input-field">
                                                <h5>地址*</h5>
                                                <input type="text" class="validate" required>
                                            </div>
                                            <div class="input-field">
                                                <h5>镇/市*</h5>
                                                <input type="text" class="validate" required>
                                            </div>
                                            <div class="input-field">
                                                <h5>国家/地区*</h5>
                                                <input type="text" class="validate" required>
                                            </div>
                                            <div class="input-field">
                                                <h5>Portalcode/ZIP*</h5>
                                                <input type="number" class="validate" required>
                                            </div>
                                            <div class="input-field">
                                                <h5>电话*</h5>
                                                <input type="number" class="validate" required>
                                            </div>
                                            <a href="" class="btn button-default">继续</a>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header"><h5>4 - 订单核审</h5></div>
                                <div class="collapsible-body">
                                    <div class="order-review">
                                        <div class="row">
                                            <div class="col s12">
                                            @foreach($data as $k=>$v)
                                                <div class="cart-details">
                                                    <div class="col s5">
                                                        <div class="cart-product">
                                                            <h5>Image</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col s7">
                                                        <div class="cart-product">
                                                                                         <img src="{{$v->goods_pic}}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="cart-details">
                                                    <div class="col s5">
                                                        <div class="cart-product">
                                                            <h5>Name</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col s7">
                                                        <div class="cart-product">
                                                            <a href="">{{$v->goods_name}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="cart-details">
                                                    <div class="col s5">
                                                        <div class="cart-product">
                                                            <h5>单价</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col s7">
                                                        <div class="cart-product">
                                                            <span>¥{{$v->goods_price}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-review final-price">
                                        <div class="row">
                                            <div class="col s12">
                                                <div class="cart-details">
                                                    <div class="col s8">
                                                        <div class="cart-product">
                                                            <h5>小计</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col s4">
                                                        <div class="cart-product">
                                                            <span>$26.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cart-details">
                                                    <div class="col s8">
                                                        <div class="cart-product">
                                                            <h5>运费:</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col s4">
                                                        <div class="cart-product">
                                                            <span>$5.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cart-details">
                                                    <div class="col s8">
                                                        <div class="cart-product">
                                                            <h5>总</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col s4">
                                                        <div class="cart-product">
                                                            <span>¥<b id="price">{{$price}}</b></span>
                                                        </div>
                                                               </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="/index/pays" class="btn button-default button-fullwidth jiesuan">继续</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end checkout -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/index/js/jquery.min.js"></script>
    <script>
     $('.jiesuan').click(function () {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          var price=$('#price').text();
          $.post(
              '/index/success',
              {price:price},
              function (res) {
                  document.write(res);
              }
          )
     })
    </script>
@endsection
