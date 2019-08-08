@extends('index.add')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <!-- shop single -->
    <div class="pages section">
        <div class="container">
            <form action="/index/shop_do" method="post">
            @csrf
                <div class="shop-single">
                <input type="hidden" name="goods_id" value="{{$data->id}}">
                <input type="hidden" name="cart_price" value="{{$data->goods_price}}">
                <input type="hidden" name="goods_num" value="1">
                <input type="hidden" name="add_time" value="{{time()}}">
                <img src="{{$data->goods_pic}}" alt="">
                <h5>{{$data->goods_name}}</h5>
                <div class="price">
                    ¥{{$data->goods_price}} <span>¥{{$data->goods_price*1.3}}</span>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam eaque in non delectus, error iste veniam commodi mollitia, officia possimus, repellendus maiores doloribus provident. Itaque, ab perferendis nemo tempore! Accusamus</p>
                <b>商品库存:&nbsp;&nbsp;&nbsp;</b>
                <b>{{$data->goods_num}}&nbsp;&nbsp;&nbsp;件</b><br/>
                <button type="" class="btn button-default">加入购物车</button>
            </div>
            </form>
            <div class="review">
                    <h5>1 reviews</h5>
                    <div class="review-details">
                        <div class="row">
                            <div class="col s3">
                                <img src="img/698656523914259181.jpg" alt="" class="responsive-img">
                            </div>
                            <div class="col s9">
                                <div class="review-title">
                                    <span><strong>John Doe</strong> | Juni 5, 2016 at 9:24 am | <a href="">Reply</a></span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis accusantium corrupti asperiores et praesentium dolore.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="review-form">
                    <div class="review-head">
                        <h5>Post Review in Below</h5>
                        <p>Lorem ipsum dolor sit amet consectetur*</p>
                    </div>
                    <div class="row">
                        <form class="col s12 form-details">
                            <div class="input-field">
                                <input type="text" required class="validate" placeholder="NAME">
                            </div>
                            <div class="input-field">
                                <input type="email" class="validate" placeholder="EMAIL" required>
                            </div>
                            <div class="input-field">
                                <input type="text" class="validate" placeholder="SUBJECT" required>
                            </div>
                            <div class="input-field">
                                <textarea name="textarea-message" id="textarea1" cols="30" rows="10" class="materialize-textarea" class="validate" placeholder="YOUR REVIEW"></textarea>
                            </div>
                            <div class="form-button">
                                <div class="btn button-default">POST REVIEW</div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <!-- end shop single -->
    <script src="/index/js/jquery.min.js"></script>
    <script src="/layui/layui.js"></script>


@endsection




