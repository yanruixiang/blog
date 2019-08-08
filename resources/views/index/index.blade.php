
@extends('index.add')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <!-- slider -->
  <div class="slider">

    <ul class="slides">
      <li>
        <img src="index/img/150693.jpg" alt="">
        <div class="caption slider-content  center-align">
          <h2>欢喜是你  喜欢是你❤</h2>
          <h4>😀 😂 😊 😎 😘</h4>
          <a href="" class="btn button-default">SHOP NOW</a>
        </div>
      </li>
      <li>
        <img src="index/img/20160609_087365387248F9FEDE45D6690FC2AB2E_186.jpg" alt="">
        <div class="caption slider-content center-align">
          <h2>爱丫头的你❤</h2>
          
          <a href="" class="btn button-default">SHOP NOW</a>
        </div>
      </li>
      <li>
        <img src="index/img/20190407_faceu_1554622310890.JPEG" alt="">
        <div class="caption slider-content center-align">
          
          <h2>傻子喜欢疯子 &nbsp;&nbsp;&nbsp;&nbsp;疯子离不开傻子❤</h2>
          <a href="" class="btn button-default">SHOP NOW</a>
        </div>
      </li>
      
    </ul>

  </div>
  <!-- end slider -->

  <!-- features -->
  <div class="features section">
    <div class="container">
      <div class="row">
        <div class="col s6">
          <div class="content">
            <div class="icon">
              <i class="fa fa-car"></i>
            </div>
            <h6>Free Shipping</h6>
            <p>Lorem ipsum dolor sit amet consectetur</p>
          </div>
        </div>
        <div class="col s6">
          <div class="content">
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <h6>Money Back</h6>
            <p>Lorem ipsum dolor sit amet consectetur</p>
          </div>
        </div>
      </div>
      <div class="row margin-bottom-0">
        <div class="col s6">
          <div class="content">
            <div class="icon">
              <i class="fa fa-lock"></i>
            </div>
            <h6>Secure Payment</h6>
            <p>Lorem ipsum dolor sit amet consectetur</p>
          </div>
        </div>
        <div class="col s6">
          <div class="content">
            <div class="icon">
              <i class="fa fa-support"></i>
            </div>
            <h6>24/7 Support</h6>
            <p>Lorem ipsum dolor sit amet consectetur</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end features -->

  <!-- quote -->
  <div class="section quote">
    <div class="container">
      <h4>FASHION UP TO 50% OFF</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ducimus illo hic iure eveniet</p>
    </div>
  </div>
  <!-- end quote -->

  <!-- product -->
  <div class="section product">
    <div class="container">
      <div class="section-head">
        <h4>NEW PRODUCT</h4>
        <div class="divider-top"></div>
        <div class="divider-bottom"></div>
      </div>
      <div class="row">
        @foreach($data as $v)
        <div class="col s6">
          <div class="content">
            <img src="{{$v->goods_pic}}" width="50" height="100">
            <h6><a href="">{{$v->goods_name}}</a></h6>
            <div class="price">
              $20 <span>${{$v->goods_price}}</span>
            </div>
            <a href="/index/shop?id={{$v->id}}" class="btn button-default">查看商品</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- end product -->
  <!-- product -->
  <div class="section product">
    <div class="container">
      <div class="section-head">
        <h4>TOP PRODUCT</h4>
        <div class="divider-top"></div>
        <div class="divider-bottom"></div>
      </div>
      <div class="pagination-product">
        {{$data->links()}}<br>
      </div>
    </div>
  </div>
  <!-- end product -->
@endsection






