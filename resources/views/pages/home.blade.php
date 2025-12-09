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

<!-- <section id="welcome-info">
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
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
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
</section> -->

@include('partials.modal')

<section id="offer">
  <div class="container">
    <h1 class="heading heading-line animate text-center">Sản phẩm của chúng tôi</h1>
    <h6 class="welcome-info-h6 animate text-center pt-0 pt-sm-2 pb-5">~ Đặc biệt hôm nay ~</h6>
    <div class="row text-center">
      <div class="col-sm animate">
        <img src="/img/new/cafe-1.webp" class="offer-image" alt="We offer">
        <h3 class="heading py-3">COFFEE</h3>
      </div>
      <div class="col-sm col-lg col-sm-6 animate">
        <img src="/img/new/syphon-1.webp" class="offer-image" alt="We offer">
        <h3 class="heading py-3">SYPHON</h3>
      </div>
      <div class="col-sm col-lg col-sm-6 animate ">
        <img src="/img/new/frank-press.webp" class="offer-image" alt="We offer">
        <h3 class="heading py-3">FRENCH PRESS</h3>
      </div>
      <div class="col-sm col-lg col-sm-6 animate">
        <img src="/img/new/cold_brew.webp" class="offer-image" alt="We offer">
        <h3 class="heading py-3">COLD BREW</h3>
      </div>
      <div class="col-sm col-lg col-sm-6 d-sm-none d-lg-block animate">
        <img src="/img/new/o_long_matcha.webp" class="offer-image " alt="We offer">
        <h3 class="heading py-3">Ô LONG MATCHA</h3>
      </div>
    </div>
  </div>
</section>

<section id="tea">
  <div class="tea-image d-flex flex-column justify-content-center align-items-center" style="background:linear-gradient(rgb(59, 59, 59,.3),rgb(59, 59, 59,.3)),url(/img/new/banner_home-2.webp) center/cover fixed no-repeat;">
    <h1 class="heading  text-center text-white">Phê la</h1>
    <h6 class="tea-text text-center pt-2 pb-5">~ Chuyển mùa có len ~</h6>
  </div>
</section>

<!-- <section id="buddha">
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
</section> -->

<section id="menu" style="background-color: #f0f0f0; padding: 50px 0 !important;">
  <div class="container">
    <h4 class="heading heading-line animate text-center">Sản phẩm</h4>
    <h6 class="welcome-info-h6 animate text-center font-weight-bold pt-0 pt-sm-2">~ Đặc biệt hôm nay ~</h6>
    <div class="row">
      <div class="col-lg-4 menu-item  mt-5 py-4">
        <h3 class="heading"><u>Cà phê</u></h3>
        <div class="menu-item-content">
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">PHÊ XỈU VANI</h3>
          </div>
          <p class="menu-description">(Có sẵn Thạch) Vị chua nhẹ tự nhiên của hạt Arabica Lạc Dương...</p>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">PHÊ ESPRESSO (Hạt Colom, Ethi)</h3>
          </div>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">PHÊ ESPRESSO (Hạt Ro, Ara)</h3>
          </div>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">PHÊ LATTE (Hạt Colom, Ethi)</h3>
          </div>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">PHÊ LATTE (Hạt Ro, Ara)</h3>
          </div>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">PHÊ CAPPU (Hạt Ro, Ara)</h3>
          </div>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">PHÊ AME (Hạt Ro, Ara)</h3>
          </div>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">PHÊ AME (Hạt Colom, Ethi)</h3>
          </div>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">PHÊ NÂU</h3>
          </div>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">PHÊ ĐEN</h3>
          </div>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">PHÊ ĐEN</h3>
          </div>

          <h3 class="heading pt-3"><u>SYPHON</u></h3>
          <div class="menu-item-content">
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
            </div>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Mật Nhãn - Ô Long Long Nhãn Sữa</h3>
            </div>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Phong Lan (size La)</h3>
            </div>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Ô Long Nhài Sữa (size La)</h3>
            </div>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Ô Long Sữa Phê La (size La)</h3>
            </div>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Phong Lan (Ô Long Vani Sữa)</h3>
            </div>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Ô LONG SỮA PHÊ LA</h3>
            </div>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Ô LONG NHÀI SỮA</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 menu-item mt-5 py-4">
        <h3 class="heading"><u>FRENCH PRESS</u></h3>
        <div class="menu-item-content">
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">LỤA ĐÀO - Phiên bản Đồng Chill yêu thích (size La)</h3>
          </div>
          <p class="menu-description">Phiên bản kèm Đào Hồng Dầm và Thạch Trà Đào Hồng. Trà Ô Long Lụa Đào thơm hoa ngọt ngào, kết hợp cùng Sữa Tươi Thanh Trùng</p>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">LỤA ĐÀO - Phiên bản Đồng Chill yêu thích (size Phê)</h3>
          </div>
          <p class="menu-description">Phiên bản kèm Đào Hồng Dầm và Thạch Trà Đào Hồng. Trà Ô Long Lụa Đào thơm hoa ngọt ngào, kết hợp cùng Sữa Tươi Thanh Trùng</p>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Trà Vỏ Cà Phê (size La)</h3>
          </div>
          <p class="menu-description">Trà Vỏ Cà Phê - thức uống độc đáo được làm từ vỏ quả cà phê, hương trà thơm nhẹ hòa quyện cùng vị chua dịu của chanh vàng.</p>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Ô LONG ĐÀO HỒNG (Size La)</h3>
          </div>
          <p class="menu-description">Phiên bản kèm Đào Hồng Dầm và Thạch Trà Đào Hồng. Trà Ô Long Đào Hồng thanh mát, vị trà nhẹ nhàng, thơm đào ngọt ngào,</p>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Gấm (size La)</h3>
          </div>
          <p class="menu-description">Gấm sự kết hợp giữa Trà Ô Long Vải thơm mát cùng với trái vải căng mọng, đem đến dư vị ngọt mát và thanh khiết.</p>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">GẤM</h3>
          </div>
          <p class="menu-description">Gấm - Vị trà Ô Long hòa quyện cùng trái vải căng mọng, mang đến dư vị ngọt mát và thanh khiết giải nhiệt tuyệt vời cho ngày hè.</p>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">TRÀ VỎ CÀ PHÊ</h3>
          </div>
          <p class="menu-description">Trà Vỏ Cà Phê được ủ từ vỏ cà phê, hương trà thơm nhẹ hoà quyện cùng vị chua dịu của chanh vàng.</p>

          <h3 class="heading pt-5"><u>MOKA POT</u></h3>
          <div class="menu-item-content">
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Tấm (size La)</h3>
            </div>
            <p class="menu-description">Trà Ô Long đậm đà kết hợp hài hoà với gạo rang thơm bùi.</p>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Khói B'Lao (size La)</h3>
            </div>
            <p class="menu-description">Sự hoà quyện của các tầng hương: Nốt hương đầu là khói đậm, hương giữa là khói nhẹ & đọng lại ở hậu vị là hương hoa ngọc lan.</p>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">KHÓI B'LAO</h3>
            </div>
            <p class="menu-description">Khói B'Lao sự hoà quyện của các tầng hương: Nốt hương đầu là khói đậm, hương giữa là khói nhẹ & đọng lại ở hậu vị là hương hoa ngọc lan.</p>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">TẤM</h3>
            </div>
            <p class="menu-description">Tấm là sự kết hợp hoàn hảo giữa vị đậm đà của trà Ô Long và hương thơm bùi của gạo rang nguyên chất, mang đến thức uống độc đáo và đầy hấp dẫn.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 menu-item mt-5 py-4">
        <h3 class="heading"><u>COLD BREW</u></h3>
        <div class="menu-item-content">
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">SỮA CHUA BÒNG BƯỞI</h3>
          </div>
          <p class="menu-description">(Có sẵn Thạch Trà Chanh Vàng) Sữa Chua Ô Long đá xay sáng tạo cùng nền trà Cold Brew, vị Bưởi the the, thêm Chanh Vàng tươi mát. Sản phẩm có thể bị tan với khoảng cách xa trên 3,5km.</p>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">BÒNG BƯỞI - Ô LONG BƯỞI NHA ĐAM</h3>
          </div>
          <p class="menu-description">Trà Ô Long Đặc Sản kết hợp cùng vị Bưởi the mát, thêm Vỏ Bưởi sấy và Nha Đam giòn dai sần sật, mang đến hương vị thanh mát & nhẹ nhàng.</p>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Lang Biang (size La)</h3>
          </div>
          <p class="menu-description">Lang Biang hương vị thuần khiết của trà Ô Long Đặc Sản cùng mứt hoa nhài thơm nhẹ.</p>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">SI MƠ - COLD BREW Ô LONG MƠ ĐÀO (size La)</h3>
          </div>
          <p class="menu-description">Trà Ô Long Đặc Sản ủ lạnh, kết hợp cùng Mơ Má Đào và Đào Hồng dầm, thêm Thạch Trà Vỏ mềm dai mang đến hương vị thanh mát & nhẹ nhàng</p>
          <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">LANG BIANG</h3>
          </div>
          <p class="menu-description">Lang Biang với hương vị thuần khiết của trà Ô Long Đặc Sản cùng mứt hoa nhài thơm nhẹ.</p>

          <h3 class="heading pt-5"><u>Ô LONG MATCHA</u></h3>
          <div class="menu-item-content">
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">MATCHA PHAN XI PĂNG</h3>
            </div>
            <p class="menu-description">Lớp kem Ô Long Matcha kết hợp cùng cốt dừa đá xay mát lạnh, thưởng thức cùng Thạch Ô Long Matcha mềm mượt mang đến trải nghiệm thú vị.</p>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">MATCHA COCO LATTE</h3>
            </div>
            <p class="menu-description">Matcha Coco Latte với Lớp kem Ô Long Matcha bồng bềnh sánh mịn hoà quyện cùng sữa dừa Bến Tre hữu cơ ngọt thơm.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- menu display none  -->
    <div id="menu-displaynone">
      <div class="row">
        <div class="col-lg-4 menu-item mt-5 py-4">
          <h3 class="heading"><u>TOPPING</u></h3>
          <div class="menu-item-content">
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">THẠCH TRÀ CHANH VÀNG</h3>
              <span class="menu-item-price align-self-end">20.000Đ</span>
            </div>
            <p class="menu-description">Thạch Trà Chanh Vàng mềm dai, thơm dịu - không chất bảo quản - thủ công sáng tạo từ Trà Cold Brew Ô Long Bưởi & Chanh Vàng. Phù hợp với mọi trà trái cây tại Phê La.</p>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">THẠCH XỈU VANI</h3>
              <span class="menu-item-price align-self-end">20.000Đ</span>
            </div>
            <p class="menu-description">Thạch Xỉu Vani mềm mượt - không chất bảo quản - thủ công sáng tạo từ cà phê Arabica Lạc Dương & Robusta Lâm Hà, kết hợp Vani Tự Nhiên cùng Sữa Dừa. Phù hợp với các sản phẩm Cà Phê Phin & Cà Phê Máy.</p>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">THẠCH TRÀ ĐÀO HỒNG</h3>
              <span class="menu-item-price align-self-end">20.000Đ</span>
            </div>
            <p class="menu-description">Thạch Ô Long Đào Hồng mềm dai - không chất bảo quản - thủ công sáng tạo từ Trà Ô Long Đặc Sản & Đào Hồng Dầm. Phù hợp với tất cả sản phẩm Trà Trái Cây tại Phê La</p>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">THẠCH Ô LONG MATCHA</h3>
              <span class="menu-item-price align-self-end">20.000Đ</span>
            </div>
            <p class="menu-description">Thạch Ô Long Matcha mềm mượt - không chất bảo quản - thủ công sáng tạo từ Trà Ô Long Matcha & Sữa Dừa Bến Tre. Phù hợp với mọi sản phẩm trà sữa và Ô Long Matcha tại Phê La.</p>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">THẠCH TRÀ VỎ</h3>
              <span class="menu-item-price align-self-end">20.000Đ</span>
            </div>
            <p class="menu-description">Thạch Trà Vỏ mềm dai - không chất bảo quản - thủ công sáng tạo từ Trà Vỏ Cà Phê & Ô Mai Dây gia truyền (Xí Muội). Phù hợp với mọi trà trái cây tại Phê La.</p>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">TRÂN CHÂU PHONG LAN</h3>
              <span class="menu-item-price align-self-end">20.000Đ</span>
            </div>
            <p class="menu-description">Trân Châu Phong Lan giòn dai - không chất bảo quản, xen lẫn hạt Vani đen tự nhiên & hương vị nhẹ nhàng. Phù hợp với mọi đồ uống tại Phê La.</p>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">Trân Châu Ô Long</h3>
              <span class="menu-item-price align-self-end">20.000Đ</span>
            </div>
            <p class="menu-description">Trân châu Ô Long: Nguyên liệu: Trà Ô Long Phương thức: Thủ công..</p>
            <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
              data-target="#modalbox">
              <h3 class="menu-title ">TRÂN CHÂU GẠO RANG</h3>
              <span class="menu-item-price align-self-end">20.000Đ</span>
            </div>
            <p class="menu-description">Trân châu mềm dẻo - vị trà Ô Long hoà quyện cùng gạo rang thơm bùi nhẹ nhàng. Phù hợp thưởng thức cùng trà sữa. Không chất bảo quản. Nguyên bản - thủ công.</p>

            <h3 class="heading pt-5"><u>PLUS - LON/CHAI</u></h3>
            <div class="menu-item-content">
              <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Plus - Mật Nhãn</h3>
                <span class="menu-item-price align-self-end">20.000Đ</span>
              </div>
              <p class="menu-description">Lon 500ml. Trà Ô Long Đặc Sản hoà quyện cùng Long Nhãn ngọt ngào, nốt hương đỗ đen rang thơm bùi. HSD 3 ngày từ NSX. Bảo quản 2-5 độ C. Lắc đều trước khi dùng. Sử dụng trong vòng 24h sau khi mở nắp. Sản phẩm đóng gói theo quy cách tiêu chuẩn, không bao gồm Túi giữ nhiệt Phê La.</p>
              <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">PLUS - KHÓI B'LAO</h3>
                <span class="menu-item-price align-self-end">20.000Đ</span>
              </div>
              <p class="menu-description">Lon 500ml. Trà Ô Long đậm đà cùng nốt hương đầu là khói đậm, hương giữa là khói nhẹ & lại ở hậu vị là hương hoa ngọc lan. </p>
              <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">PLUS - MATCHA COCO LATTE</h3>
                <span class="menu-item-price align-self-end">20.000Đ</span>
              </div>
              <p class="menu-description">Lon 500ml. Trà Ô Long Matcha nhẹ nhàng kết hợp cùng Sữa Dừa Bến Tre hữu cơ ngọt thơm. HSD 3 ngày từ NSX.</p>
              <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">PLUS - LỤA ĐÀO</h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">(100% đường) Lon 500ml. Trà Ô Long Lụa Đào thơm hoa ngọt ngào, kết hợp cùng Sữa Tươi Thanh Trùng Phê La, kèm Đào Hồng Dầm.</p>
              <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">PLUS - PHONG LAN</h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">(100% đường) Lon 500ml. Plus - Phong Lan Trà Ô Long Đặc Sản hòa quyện cùng Vani tự nhiên, vị nhẹ nhàng, tinh tế.</p>
              <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">PLUS - COLD BREW</h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">(Sản phẩm không đường) Chai 500ml. Plus - Cold Brew Trà Ô Long ủ lạnh, hậu vị ngọt và thanh mát.</p>
              <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">PLUS - ĐÀ LẠT</h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">(100% đường) Chai 250ml. Cà phê Arabica Đà Lạt đậm đà hòa quyện cùng kem whipping thơm ngậy.</p>
              <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">PLUS - ĐỈNH PHÙ VÂN</h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">(100% đường) Chai 250ml. Đỉnh Phù Vân là sự kết hợp tinh tế giữa Trà Ô Long Đỏ đậm đà và kem whipping nhẹ nhàng, tạo nên lớp sánh ngậy</p>
              <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">PLUS - TẤM</h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lon 500ml. Trà Ô Long đậm đà kết hợp hài hoà với gạo rang thơm bùi.</p>
              <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">PLUS - Ô LONG NHÀI SỮA</h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description"> Lon 500ml. Ô Long Nhài Sữa là sự kết hợp Trà Ô Long đậm đà cùng hương nhài thơm tinh tế, thêm chút thơm ngậy từ sữa.</p>
              <div class="menu-name pt-1 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">PLUS - Ô LONG SỮA PHÊ LA</h3>
                <span class="menu-item-price align-self-end">20$</span>
              </div>
              <p class="menu-description">Lon 500ml. Trà Ô Long Đặc Sản đậm đà hòa quyện cùng vị sữa thơm ngậy.</p>
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
