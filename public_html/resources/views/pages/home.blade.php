@extends('layouts.app')

@section('content')

<div class="header-body">
  @include('partials.header')
  
  <header id="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="banner text-center">
            <h1 class="banner-heading display-1 text-white">
              <p class="banner-heading-top">Phela</p><br>
              <p class="banner-heading-bottom">Cafe</p>
            </h1>
            <p class="banner-paragraph pt-4 text-white">- 2025 -</p>
          </div>
        </div>
      </div>
    </div>
  </header>
</div>

<div class="container">
  <section id="welcome">
    <div class="row font-weight-bold d-flex">
      <div class="col-lg-4 col-md-6 col-sm-6 first-column animate order-lg-1 order-md-2 order-sm-2 order-2">
        <img src="img/welcome-img1.png" class="welcome-img1 mx-auto d-block w-100" alt="">
        <div class="column-content first-column-content">
          <h4 class="heading ">Giới thiệu</h4>
          <p class="welcome-txt p-2">
            Nốt Hương Đặc Sản - Phê La luôn trân quý, nâng niu những giá trị Nguyên Bản ở mỗi vùng đất mà chúng tôi đi qua, nơi tâm hồn được đồng điệu với thiên nhiên, với nỗi vất vả nhọc nhằn của người nông dân; cảm nhận được hết thảy những tầng hương ẩn sâu trong từng nguyên liệu. 
          </p>
        </div>
      </div>
      <div
        class="col-lg-4 col-md-12 col-sm-12 order-lg-2 order-md-1 order-sm-1 order-1 text-center pt-5 second-column">
        <div class="column-content">
          <h4>PHÊ LA VÀ NHỮNG ĐIỀU KHÁC BIỆT</h4>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 last-column animate order-lg-3 order-md-3 order-sm-3 order-3">
        <img src="img/welcome-img2.jpg" class="welcome-img2 w-50 mx-auto d-block " alt="">
        <div class="column-content">
          <h4 class="heading">SỨ MỆNH</h4>
          <p class="welcome-txt p-2">
            Một chặng đường dài đang chờ phía trước, Phê La đã sẵn sàng viết tiếp câu chuyện Nốt Hương Đặc Sản - Nguyên Bản - Thủ Công đầy cảm hứng và càng tự hào hơn khi được mang sứ mệnh: ``Đánh thức những nốt hương đặc sản của nông sản Việt Nam``
          </p>
        </div>
      </div>
    </div>
  </section>
</div>

<section id="welcome-info">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 col-md-6 col-sm-6 p-0">
        <img src="img/wlcm2.jpg" class="brunch-img w-100 h-100" alt="">
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 menu-item">
        <div class="menu-item-content">
          <i class="fas fa-hamburger welcome-info-icon display-4 d-block mx-auto"></i>
          <h4 class="heading text-center">Bữa sáng</h4>
          <h6 class="welcome-info-h6 text-center font-weight-bold pt-0 pt-sm-2">~ Đặc biệt hôm nay ~</h6>
          <div class="menu-name pt-5 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 ">
        <div class=" text-center happyhour">
          <i class="fas fa-coffee welcome-info-icon display-4 "></i>
          <h4 class="heading ">Đêm Piano</h4>
          <h6 class="welcome-info-h6 font-weight-bold pt-0 pt-sm-2">~ Mỗi tối thứ Sáu ~</h6>
          <p class="happyhour-title text-left pt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
            possimus eos culpa, modi similique placeat nobis ab minima, beatae inventore enim iste, dolores nihil
            nemo magnam. Saepe accusantium cumque quis?</p>
          <p class="happyhour-phone py-4">1900 3013</p>
        <p class="welcome-txt pb-4">(8h30 – 22h)</p>
          <a href="contact.html"><button class="btn btn-button btn-bfr btn-anim mb-4">Liên hệ</button></a>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 col-sm-6 p-0">
        <img src="img/piano.jpg" class="happyhour-img w-100 h-100" alt="">
      </div>
    </div>
  </div>
</section>

@include('partials.modal')

<section id="offer">
  <div class="container">
    <h1 class="heading heading-line animate text-center">Sản phẩm của chúng tôi</h1>
    <h6 class="welcome-info-h6 animate text-center pt-0 pt-sm-2 pb-5">~ Đặc biệt hôm nay ~</h6>
    <div class="row text-center">
      <div class="col-sm animate">
        <img src="img/offer1.jpg" class="offer-image" alt="We offer">
        <h3 class="heading py-3">Cà phê & Trà</h3>
        <p class=" welcome-txt text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda sequi
          est vel ipsa! Maiores!</p>
      </div>
      <div class="col-sm col-lg col-sm-6 animate">
        <img src="img/menyu-breakfast-c.jpg" class="offer-image" alt="We offer">
        <h3 class="heading py-3">Bánh mì </h3>
        <p class=" welcome-txt  text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda sequi
          est vel ipsa! Maiores!</p>
      </div>
      <div class="col-sm col-lg col-sm-6 animate ">
        <img src="img/offer3.jpg" class="offer-image" alt="We offer">
        <h3 class="heading py-3">Súp</h3>
        <p class=" welcome-txt text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda sequi
          est vel ipsa! Maiores!</p>
      </div>
      <div class="col-sm col-lg col-sm-6 animate">
        <img src="img/gallery-food-7-c.jpg" class="offer-image" alt="We offer">
        <h3 class="heading py-3">Bánh ngọt</h3>
        <p class=" welcome-txt text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda sequi
          est vel ipsa! Maiores!</p>
      </div>
      <div class="col-sm col-lg col-sm-6 d-sm-none d-lg-block animate">
        <img src="img/icecoffee-1-c.jpg" class="offer-image " alt="We offer">
        <h3 class="heading py-3">Ice-coffee</h3>
        <p class=" welcome-txt text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda sequi
          est vel ipsa! Maiores!</p>
      </div>
    </div>
  </div>
</section>

<section id="tea">
  <div class="tea-image d-flex flex-column justify-content-center align-items-center">
    <h1 class="heading  text-center text-white">Trà</h1>
    <h6 class="tea-text text-center pt-2 pb-5">~ Đặc biệt hôm nay ~</h6>
  </div>
</section>

<section id="buddha">
  <div class="container">
    <div class="row pb-5">
      <div class="col-lg-3 col-md-3 col-sm-3 animate d-flex align-items-center buddha-img">
        <img src="img/buddha-left.jpg " class="w-100" alt="Buddha">
      </div>
      <div class="col-lg-5 col-md-6 col-sm-6 animate">
        <i class="fas fa-mug-hot welcome-info-icon display-4 d-inline-block"></i>
        <h1 class="heading d-inline-block pl-3">Beta:<br>Cách pha chế</h1>
        <p class="welcome-txt pt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque commodi
          placeat vero aspernatur nam exercitationem natus, reprehenderit maiores pariatur voluptatibus harum
          ratione asperiores totam quasi quia rem tempora maxime. Aut!</p>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 animate align-self-center">
        <div class="card ">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="card-image">
                  <img class="card-img-top buddha-card-img d-block w-100" src="img/buddha-card-image.jpg"
                    alt="Card image cap">
                  <button class="btn btn-card">Thêm vào giỏ</button>
                </div>
                <div class="card-body text-center">
                  <p class="card-text text-uppercase mb-0">lorem ipsum</p>
                  <p class="card-category d-inline-block text-muted text-uppercase">coffee</p>
                  <p class="card-category d-inline-block text-muted text-uppercase">honey</p>
                  <p class="card-category d-inline-block text-muted text-uppercase">organic</p>
                  <p class="card-category d-inline-block text-muted text-uppercase">tea</p>
                  <h5 class="card-title">Lorem Ipsum</h5>
                  <p class="menu-item-price">$20</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card-image">
                  <img class="card-img-top buddha-card-img d-block w-100" src="img/buddha-card-image-2.jpg"
                    alt="Card image cap">
                  <button class="btn btn-card">Thêm vào giỏ</button>
                </div>
                <div class="card-body text-center">
                  <p class="card-text text-uppercase mb-0">lorem ipsum dolar</p>
                  <p class="card-category d-inline-block text-muted text-uppercase">accessory</p>
                  <p class="card-category d-inline-block text-muted text-uppercase">tea</p>
                  <p class="card-category d-inline-block text-muted text-uppercase">teapot</p>
                  <h5 class="card-title">Lorem & Ipsum</h5>
                  <p class="menu-item-price">$21</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card-image">
                  <img class="card-img-top buddha-card-img d-block w-100" src="img/buddha-card-image-3.jpg"
                    alt="Card image cap">
                  <button class="btn btn-card">Thêm vào giỏ</button>
                </div>
                <div class="card-body text-center">
                  <p class="card-text text-uppercase mb-0">lorem sit amet</p>
                  <p class="card-category d-inline-block text-muted text-uppercase">honey</p>
                  <p class="card-category d-inline-block text-muted text-uppercase">vegeterian</p>
                  <p class="card-category d-inline-block text-muted text-uppercase">tea</p>
                  <h5 class="card-title">Lorem Ipsum Dolar</h5>
                  <p class="menu-item-price">$22</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon " aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon  " aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <img src="img/buddha-bottom.jpg" class="buddha-bottom-image w-100 d-block" alt="bottom-img">
  </div>
</section>

<section id="menu" style="background-color: #f0f0f0; padding: 50px 0 !important;">
  <div class="container">
    <h4 class="heading heading-line animate text-center">Thực đơn</h4>
    <h6 class="welcome-info-h6 animate text-center font-weight-bold pt-0 pt-sm-2">~ Đặc biệt hôm nay ~</h6>
    <div class="row">
      <div class="col-lg-4 menu-item  mt-5">
        <h3 class="heading"><u>Cà phê</u></h3>
        <div class="menu-item-content">
          <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>

          <h3 class="heading pt-5"><u>Branç</u></h3>
          <div class="menu-item-content">
            <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 menu-item mt-5">
        <h3 class="heading"><u>Bánh ngọt</u></h3>
        <div class="menu-item-content">
          <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>

          <h3 class="heading pt-5"><u>Bữa trưa</u></h3>
          <div class="menu-item-content">
            <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 menu-item mt-5">
        <h3 class="heading"><u>Şirniyyatlar</u></h3>
        <div class="menu-item-content">
          <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>

          <h3 class="heading pt-5"><u>İçkilər</u></h3>
          <div class="menu-item-content">
            <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          </div>
        </div>
      </div>
    </div>

    <!-- menu display none  -->

    <div id="menu-displaynone">
      <div class="row">
        <div class="col-lg-4 menu-item mt-5">
          <h3 class="heading"><u>Bữa sáng</u></h3>
          <div class="menu-item-content">
            <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>

            <h3 class="heading pt-5"><u>Branç</u></h3>
            <div class="menu-item-content">
              <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
              <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
              <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
              <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
              <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 menu-item mt-5">
          <h3 class="heading"><u>Bữa tối</u></h3>
          <div class="menu-item-content">
            <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>

            <h3 class="heading pt-5"><u>Kem</u></h3>
            <div class="menu-item-content">
              <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
              <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
              <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
              <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
              <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 menu-item mt-5">
          <h3 class="heading"><u>Şirniyyatlar</u></h3>
          <div class="menu-item-content">
            <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
              <span class="menu-item-price align-self-end">20$</span>
            </div>
            <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>

            <h3 class="heading pt-5"><u>İçkilər</u></h3>
            <div class="menu-item-content">
              <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
              <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
              <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
              <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
              <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="view-more-button">
      <button id="toggle-vm" type="button"
        class="btn btn-button btn-bfr btn-anim btn-lg d-flex mx-auto justify-content-center mt-4">Xem thêm</button>
    </div>

  </div>
</section>

<section id="direction" class="add-ornament-top add-ornament-bottom">
  <div class="container">
    <div class="row first-row text-white">
      <div class=" col-md-4 col-sm-12 animate  pb-5 text-center">
        <h3 class="heading pb-4">Giờ mở cửa</h3>
        <div class="direction-opening-text d-flex justify-content-between">
          <p class="welcome-txt ">Thứ 2 - Thứ 6</p>
          <p class="welcome-txt">09:00 - 00:00</p>
        </div>
        <div class="direction-opening-text d-flex justify-content-between pt-2">
          <p class="welcome-txt">Thứ 7</p>
          <p class="welcome-txt">10:00 - 00:00</p>
        </div>
        <div class="direction-opening-text d-flex justify-content-between pt-2">
          <p class="welcome-txt">Chủ nhật</p>
          <p class="welcome-txt">10:00 - 23:00</p>
        </div>
      </div>
      <div class=" col-md-4 col-sm-6 animate col-direction text-center pb-5">
        <h3 class="heading ">Địa chỉ</h3>
        <i class="fas fa-globe-americas welcome-info-icon display-4 p-1 my-0"></i>
        <p class="welcome-txt pt-2 pb-2" style="font-size: 0.9rem;">289 Đinh Bộ Lĩnh, Phường Bình Thạnh</p>
        <p class="welcome-txt pb-2" style="font-size: 0.9rem;">TP. Hồ Chí Minh, Việt Nam</p>
        <button class="btn btn-button">Xem trên bản đồ</button>
      </div>
      <div class=" col-md-4 col-sm-6 animate text-center">
        <h3 class="heading">Liên hệ</h3>
        <p class="happyhour-phone pt-4">1900 3013</p>
        <p class="welcome-txt pb-2">(8h30 – 22h)</p>
        <p class="welcome-txt pb-4">cskh@phela.vn</p>
        <div class="direction-social-icons d-flex align-items-center justify-content-between mx-auto">
          <a href=""><i class="fab fa-facebook-f "></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="blog">
  <div class="container">
    <div class="row second-row">
      <div class="col-12">
        <h4 class="heading heading-line text-center">Blog</h4>
        <h6 class="welcome-info-h6 text-center font-weight-bold pt-0 pt-sm-2 pb-5">~ Đặc biệt hôm nay ~</h6>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6 animate">
        <div class="card-deck mb-3">
          <div class="card">
            <div class="card-image">
              <img src="img/blog-card-image.jpg" class="card-img-top blog-card-img" alt="blog & Letters">
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
      <div class="col-lg-4 col-md-6 animate">
        <div class="card-deck mb-3">
          <div class="card">
            <div class="card-image">
              <img src="img/blog-card-image-2.jpg" class="card-img-top blog-card-img" alt="blog & Letters">
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
      <div class="col-lg-4 col-md-6 animate">
        <div class="card-deck mb-3">
          <div class="card">
            <div class="card-image">
              <img src="img/blog-card-image3.jpg" class="card-img-top blog-card-img" alt="blog & Letters">
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

      <!--  display in medium size -->
      <div class="col-lg-4 col-md-6 animate d-none fourth-card">
        <div class="card-deck">
          <div class="card">
            <div class="card-image">
              <img src="img/blog-card-image.jpg" class="card-img-top blog-card-img" alt="blog & Letters">
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
