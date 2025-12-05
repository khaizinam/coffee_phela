@extends('layouts.app')

@section('content')
<div class="header-body hero-wrap" 
  style="background:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), 
  url('{{ asset('img/bg-blog-healthy.jpg') }}') bottom center/cover no-repeat;">
  @include('partials.header')
  
  <header class="header-wrap">
    <div class="container-fluid">
      <div class="row  ">
        <div class="col-md-12">
          <div class="header-wrap__text">
            <h1 class="bread">Blog</h1>
            <h2 class="text-center no-wrap">Công thức</h2>
          </div>
        </div>
      </div>
    </div>
  </header>
</div>
<section id="blog" class="blog-featured py-5 pt-sm-1">
  <div class="container-fluid">
    <img src="{{ asset('img/title-above.png') }}" class="title-above d-block mx-auto pt-3 pt-sm-1" alt="Title-above">
    <div class="row second-row">
      <div class="col-12">
        <h3 class="subheading heading-line animate text-center pt-4">Được tìm kiếm nhiều nhất</h3>
      </div>
    </div>
    <div class="carousel-blog owl-carousel owl-theme">
      <div class="mx-2">
        <div class="card">
          <img class=" card-img-top" src="{{ asset('img/blog-card-image.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Súp ớt đỏ</h5>
          </div>
          <div class="card-footer">
            <small class="text-muted">Cập nhật lần cuối: 19.12.2019</small>
          </div>
        </div>
      </div>
      <div class="mx-2">
        <div class="card">
          <img class=" card-img-top" src="{{ asset('img/blog-card-image-2.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Súp gà mì</h5>
          </div>
          <div class="card-footer">
            <small class="text-muted">Cập nhật lần cuối: 19.12.2019</small>
          </div>
        </div>
      </div>
      <div class="mx-2">
        <div class="card">
          <img class=" card-img-top" src="{{ asset('img/blog-card-image3.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Chả bí ngô</h5>
          </div>
          <div class="card-footer">
            <small class="text-muted">Cập nhật lần cuối: 19.12.2019</small>
          </div>
        </div>
      </div>
      <div class="mx-2">
        <div class="card">
          <img class="card-img-top" src="{{ asset('img/blog-card-image.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Trứng ốp la khoai tây</h5>
          </div>
          <div class="card-footer">
            <small class="text-muted">Cập nhật lần cuối: 19.12.2019</small>
          </div>
        </div>
      </div>
      <div class="mx-2">
        <div class="card">
          <img class="card-img-top" src="{{ asset('img/blog-card-image-2.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Cơm rau chân vịt</h5>
          </div>
          <div class="card-footer">
            <small class="text-muted">Cập nhật lần cuối: 19.12.2019</small>
          </div>
        </div>
      </div>
      <div class="mx-2">
        <div class="card">
          <img class="card-img-top" src="{{ asset('img/blog-card-image3.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Đậu với dầu ô liu</h5>
          </div>
          <div class="card-footer">
            <small class="text-muted">Cập nhật lần cuối: 19.12.2019</small>
          </div>
        </div>
      </div>
      <div class="mx-2">
        <div class="card">
          <img class="card-img-top" src="{{ asset('img/blog-card-image.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Bánh kếp táo</h5>
          </div>
          <div class="card-footer">
            <small class="text-muted">Cập nhật lần cuối: 19.12.2019</small>
          </div>
        </div>
      </div>
      <div class="mx-2">
        <div class="card">
          <img class="card-img-top" src="{{ asset('img/blog-card-image-2.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Súp rau củ</h5>
          </div>
          <div class="card-footer">
            <small class="text-muted">Cập nhật lần cuối: 19.12.2019</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="blog" class="blog-healthy py-5">
  <div class="container">
    <h3 class="subheading heading-line text-center pt-4">Công thức</h3>
    <div class="row py-4">
      <div class="col-lg-4 col-md-6 animate">
        <div class="card-deck mb-3">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('img/blog-card-image.jpg') }}" class="card-img-top" alt="blog & Letters">
            </div>
            <div class="card-body">
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">thực phẩm</button>
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">gợi ý</button>
              <h5 class="card-title">Tiramisu</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque quidem et odit
                sunt aperiam numquam?...</p>
              <small class="text-muted d-inline-block">hữu cơ,</small>
              <small class="text-muted d-inline-block">bữa tối,</small>
              <small class="text-muted d-inline-block">thực phẩm,</small>
              <small class="text-muted d-inline-block">thịt,</small>
              <small class="text-muted d-inline-block">cừu</small>
            </div>
            <div class="card-footer">
              <small class="text-muted">Cập nhật 3 phút trước</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 animate">
        <div class="card-deck mb-3">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('img/blog-card-image-2.jpg') }}" class="card-img-top" alt="blog & Letters">
            </div>
            <div class="card-body">
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">thực phẩm</button>
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">gợi ý</button>
              <h5 class="card-title">Bánh bông lan chanh</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque quidem et odit
                sunt aperiam numquam?...</p>
              <small class="text-muted d-inline-block">hữu cơ,</small>
              <small class="text-muted d-inline-block">bữa tối,</small>
              <small class="text-muted d-inline-block">thực phẩm,</small>
              <small class="text-muted d-inline-block">thịt,</small>
              <small class="text-muted d-inline-block">cừu</small>
            </div>
            <div class="card-footer">
              <small class="text-muted">Cập nhật 3 phút trước</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 animate">
        <div class="card-deck mb-3">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('img/blog-card-image3.jpg') }}" class="card-img-top" alt="blog & Letters">
            </div>
            <div class="card-body">
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">thực phẩm</button>
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">gợi ý</button>
              <h5 class="card-title">Bánh ngọt truyền thống</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque quidem et odit
                sunt aperiam numquam?...</p>
              <small class="text-muted d-inline-block">hữu cơ,</small>
              <small class="text-muted d-inline-block">bữa tối,</small>
              <small class="text-muted d-inline-block">thực phẩm,</small>
              <small class="text-muted d-inline-block">thịt,</small>
              <small class="text-muted d-inline-block">cừu</small>
            </div>
            <div class="card-footer">
              <small class="text-muted">Cập nhật 3 phút trước</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 animate d-none fourth-card">
        <div class="card-deck">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('img/blog-card-image.jpg') }}" class="card-img-top blog-card-img" alt="blog & Letters">
            </div>
            <div class="card-body">
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">công thức</button>
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">gợi ý</button>
              <h5 class="card-title">Salad đậu xanh</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque quidem et odit
                sunt aperiam numquam?...</p>
              <small class="text-muted d-inline-block">hữu cơ,</small>
              <small class="text-muted d-inline-block">bữa tối,</small>
              <small class="text-muted d-inline-block">thực phẩm,</small>
              <small class="text-muted d-inline-block">thịt,</small>
              <small class="text-muted d-inline-block">cừu</small>
            </div>
            <div class="card-footer">
              <small class="text-muted">Cập nhật 3 phút trước</small>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row py-4">
      <div class="col-lg-3 col-md-6 animate">
        <div class="card-deck mb-3">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('img/blog-card-image.jpg') }}" class="card-img-top" alt="blog & Letters">
            </div>
            <div class="card-body">
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">thực phẩm</button>
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">gợi ý</button>
              <h5 class="card-title">Bánh nước</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque quidem et odit
                sunt aperiam numquam?...</p>
              <small class="text-muted d-inline-block">hữu cơ,</small>
              <small class="text-muted d-inline-block">bữa tối,</small>
              <small class="text-muted d-inline-block">thực phẩm,</small>
              <small class="text-muted d-inline-block">thịt,</small>
              <small class="text-muted d-inline-block">cừu</small>
            </div>
            <div class="card-footer">
              <small class="text-muted">Cập nhật 3 phút trước</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 animate">
        <div class="card-deck mb-3">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('img/blog-card-image-2.jpg') }}" class="card-img-top" alt="blog & Letters">
            </div>
            <div class="card-body">
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">thực phẩm</button>
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">gợi ý</button>
              <h5 class="card-title">Bánh pizza Thổ Nhĩ Kỳ</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque quidem et odit
                sunt aperiam numquam?...</p>
              <small class="text-muted d-inline-block">hữu cơ,</small>
              <small class="text-muted d-inline-block">bữa tối,</small>
              <small class="text-muted d-inline-block">thực phẩm,</small>
              <small class="text-muted d-inline-block">thịt,</small>
              <small class="text-muted d-inline-block">cừu</small>
            </div>
            <div class="card-footer">
              <small class="text-muted">Cập nhật 3 phút trước</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 animate">
        <div class="card-deck mb-3">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('img/blog-card-image3.jpg') }}" class="card-img-top" alt="blog & Letters">
            </div>
            <div class="card-body">
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">thực phẩm</button>
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">gợi ý</button>
              <h5 class="card-title">Bánh nước</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque quidem et odit
                sunt aperiam numquam?...</p>
              <small class="text-muted d-inline-block">hữu cơ,</small>
              <small class="text-muted d-inline-block">bữa tối,</small>
              <small class="text-muted d-inline-block">thực phẩm,</small>
              <small class="text-muted d-inline-block">thịt,</small>
              <small class="text-muted d-inline-block">cừu</small>
            </div>
            <div class="card-footer">
              <small class="text-muted">Cập nhật 3 phút trước</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 animate">
        <div class="card-deck mb-3">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('img/blog-card-image3.jpg') }}" class="card-img-top" alt="blog & Letters">
            </div>
            <div class="card-body">
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">thực phẩm</button>
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">gợi ý</button>
              <h5 class="card-title">Bánh hướng dương</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque quidem et odit
                sunt aperiam numquam?...</p>
              <small class="text-muted d-inline-block">hữu cơ,</small>
              <small class="text-muted d-inline-block">bữa tối,</small>
              <small class="text-muted d-inline-block">thực phẩm,</small>
              <small class="text-muted d-inline-block">thịt,</small>
              <small class="text-muted d-inline-block">cừu</small>
            </div>
            <div class="card-footer">
              <small class="text-muted">Cập nhật 3 phút trước</small>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row py-4">
      <div class="col-lg-4 col-md-6 animate">
        <div class="card-deck mb-3">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('img/blog-card-image.jpg') }}" class="card-img-top" alt="blog & Letters">
            </div>
            <div class="card-body">
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">thực phẩm</button>
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">gợi ý</button>
              <h5 class="card-title">Bánh phô mai</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque quidem et odit
                sunt aperiam numquam?...</p>
              <small class="text-muted d-inline-block">hữu cơ,</small>
              <small class="text-muted d-inline-block">bữa tối,</small>
              <small class="text-muted d-inline-block">thực phẩm,</small>
              <small class="text-muted d-inline-block">thịt,</small>
              <small class="text-muted d-inline-block">cừu</small>
            </div>
            <div class="card-footer">
              <small class="text-muted">Cập nhật 3 phút trước</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 animate">
        <div class="card-deck mb-3">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('img/blog-card-image-2.jpg') }}" class="card-img-top" alt="blog & Letters">
            </div>
            <div class="card-body">
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">thực phẩm</button>
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">gợi ý</button>
              <h5 class="card-title">Súp bông cải xanh</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque quidem et odit
                sunt aperiam numquam?...</p>
              <small class="text-muted d-inline-block">hữu cơ,</small>
              <small class="text-muted d-inline-block">bữa tối,</small>
              <small class="text-muted d-inline-block">thực phẩm,</small>
              <small class="text-muted d-inline-block">thịt,</small>
              <small class="text-muted d-inline-block">cừu</small>
            </div>
            <div class="card-footer">
              <small class="text-muted">Cập nhật 3 phút trước</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 animate">
        <div class="card-deck mb-3">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('img/blog-card-image3.jpg') }}" class="card-img-top" alt="blog & Letters">
            </div>
            <div class="card-body">
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">thực phẩm</button>
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">gợi ý</button>
              <h5 class="card-title">Salad bông cải xanh</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque quidem et odit
                sunt aperiam numquam?...</p>
              <small class="text-muted d-inline-block">hữu cơ,</small>
              <small class="text-muted d-inline-block">bữa tối,</small>
              <small class="text-muted d-inline-block">thực phẩm,</small>
              <small class="text-muted d-inline-block">thịt,</small>
              <small class="text-muted d-inline-block">cừu</small>
            </div>
            <div class="card-footer">
              <small class="text-muted">Cập nhật 3 phút trước</small>
            </div>
          </div>
        </div>
      </div>
      <!--  display in medium size -->
      <div class="col-lg-4 col-md-6 animate d-none fourth-card">
        <div class="card-deck">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('img/blog-card-image.jpg') }}" class="card-img-top blog-card-img" alt="blog & Letters">
            </div>
            <div class="card-body">
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">công thức</button>
              <button class="btn btn-button btn-blog d-inline-block text-uppercase mb-2">gợi ý</button>
              <h5 class="card-title">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque quidem et odit
                sunt aperiam numquam?...</p>
              <small class="text-muted d-inline-block">hữu cơ,</small>
              <small class="text-muted d-inline-block">bữa tối,</small>
              <small class="text-muted d-inline-block">thực phẩm,</small>
              <small class="text-muted d-inline-block">thịt,</small>
              <small class="text-muted d-inline-block">cừu</small>
            </div>
            <div class="card-footer">
              <small class="text-muted">Cập nhật 3 phút trước</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
