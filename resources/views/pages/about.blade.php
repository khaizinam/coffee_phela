@extends('layouts.app')

@section('content')
<div class="header-body hero-wrap" 
  style="background:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), 
  url('{{ $page->banner_image_url }}') bottom center/cover no-repeat;">
  @include('partials.header')
  <header class="header-wrap">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="header-wrap__text">
            <h1 class="bread">{{ $page->name }}</h1>
            <h2 class="text-center no-wrap">Phê la</h2>
          </div>
        </div>
      </div>
    </div>
  </header>
</div>

<section class="story py-5 pt-sm-1">
  <div class="container">
    <img src="{{ asset('img/title-above.png') }}" class="title-above d-block mx-auto pt-3 pt-sm-1" alt="Title-above">
    <h3 class="subheading heading-line text-center pt-4">Câu chuyện của chúng tôi</h3>
    <div class="row py-4">
      <div class="col-md-6 story__left animate d-flex flex-column align-items-center justify-content-center">
        <div class="subheading-text text-justify py-3">
        <strong class="text-center d-block">“Nốt Hương Đặc Sản”</strong>
        <p>Phê La luôn trân quý, nâng niu những giá trị Nguyên Bản ở mỗi vùng đất mà chúng tôi đi qua, nơi tâm hồn được đồng điệu với thiên nhiên, với nỗi vất vả nhọc nhằn của người nông dân; cảm nhận được hết thảy những tầng hương ẩn sâu trong từng nguyên liệu.</p>
        <p>Một chặng đường dài đang chờ phía trước, Phê La đã sẵn sàng viết tiếp câu chuyện Nốt Hương Đặc Sản – Nguyên Bản – Thủ Công đầy cảm hứng và càng tự hào hơn khi được mang sứ mệnh: “Đánh thức những nốt hương đặc sản của nông sản Việt Nam”.</p>
        </div>
        <div class="social py-3">
          <a href="https://www.facebook.com/"><i class="fab fa-facebook-f "></i></a>
          <a href="https://www.instagram.com/"><i class="fab fa-instagram "></i></a>
        </div>
      </div>
      <div class="col-md-6 animate pt-4 pt-md-0">
        <div class="video-hero">
          <video autoplay loop muted>
            <source src="{{ asset('media/about-1.mp4') }}" type="video/mp4">
          </video>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="vision-mission-section py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="vision-mission-card" data-aos="fade-right">
          <div class="icon">
            <img src="{{ asset('img/about/eyes.png') }}" alt="Tầm nhìn">
          </div>
          <h3>Tầm nhìn</h3>
          <p>Mang nguồn nông sản cao cấp của Việt Nam tiếp cận gần hơn với mọi người và vươn ra thế giới.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="vision-mission-card" data-aos="fade-left">
          <div class="icon">
            <img src="{{ asset('img/about/diamond.png') }}" alt="Sứ mệnh">
          </div>
          <h3>Sứ mệnh</h3>
          <p>Đồng hành cùng người nông dân trong quá trình sản xuất và phát triển bền vững nguồn nguyên liệu đặc sản.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5 pt-sm-1">
  <div class="container">
    <h3 class="subheading heading-line text-center pt-4">
      PHÊ LA VÀ CÂU CHUYỆN NỐT HƯƠNG ĐẶC SẢN ĐẦY CẢM HỨNG 🌿
    </h3>
    <div class="text-justify">
      <p>Từ cơn sốt khắp các mạng xã hội khi Phê La mở cửa hàng đầu tiên, chưa đầy 2 năm sau, Phê La mở đến 14 cửa hàng tại 3 thành phố lớn Hà Nội, Đà Lạt và TP HCM,... từ đây hành trình lan tỏa và nâng tầm nông sản Việt đã được khẳng định.</p>
      <p>Sau 2 năm đi tìm hương vị nguyên bản, Phê La mở ra một câu chuyện mới về “Nốt hương đặc sản” với những món đồ uống có hương vị riêng và vô cùng tinh tế như hương hoa trắng hương khói, hương đậu nành... được tạo nên từ quy trình chăm sóc thuận tự nhiên và bàn tay sáng tạo của Phê La.</p>
      <p>Rong ruổi qua mỗi vùng đất khác nhau để rồi cảm nhận từng tầng hương ẩn giấu trong những nông sản thân thuộc, Phê La miệt mài đánh thức từng nốt hương đặc sản bằng đôi bàn tay sáng tạo của chính mình.</p>
      <p>Hơn cả một hành trình, Phê La sẵn sàng mang sứ mệnh đánh thức nông sản đặc sản Việt Nam, nâng tầm trải nghiệm thức uống mang đậm bản sắc và văn hoá Việt.</p>
    </div>
    <div class="video-hero" >
      <video controls playsinline>
        <source src="{{ asset('media/about-3.mp4') }}" type="video/mp4">
      </video>
    </div>
  </div>
</section>

<section class="timeline-section py-5">
  <div class="container">
    <h3 class="subheading heading-line text-center pt-4">Những dấu ấn trong hành trình của chúng tôi</h3>
    <div class="timeline">
      <div class="timeline-item" data-aos="fade-right">
        <div class="timeline-dot"></div>
        <div class="timeline-content">
          <span class="timeline-year">08/2020</span>
          <h4>Phê La và những bước đi đầu tiên</h4>
          <p>Thương hiệu Phê La được đăng ký bảo hộ độc quyền tại Việt Nam.</p>
        </div>
      </div>

      <div class="timeline-item" data-aos="fade-left">
        <div class="timeline-dot"></div>
        <div class="timeline-content">
          <span class="timeline-year">08/03/2021</span>
          <h4>Ra mắt thị trường</h4>
          <p>Phê La chính thức xuất hiện trên thị trường với cửa hàng đầu tiên tại Phạm Ngọc Thạch.</p>
        </div>
      </div>

      <div class="timeline-item" data-aos="fade-right">
        <div class="timeline-dot"></div>
        <div class="timeline-content">
          <span class="timeline-year">16/03/2021</span>
          <h4>Phủ sóng các kênh bán hàng online</h4>
          <p>Xuất hiện trên các ứng dụng giao hàng hàng đầu như Baemin và Shopee Fresh.</p>
        </div>
      </div>

      <div class="timeline-item" data-aos="fade-left">
        <div class="timeline-dot"></div>
        <div class="timeline-content">
          <span class="timeline-year">22/05/2021</span>
          <h4>Mở rộng và phát triển</h4>
          <p>Mở chi nhánh thứ hai tại Lý Thường Kiệt với diện tích gần 200m².</p>
        </div>
      </div>

      <div class="timeline-item" data-aos="fade-right">
        <div class="timeline-dot"></div>
        <div class="timeline-content">
          <span class="timeline-year">08/11/2021</span>
          <h4>Chi nhánh thứ ba</h4>
          <p>Mở chi nhánh thứ ba tại Đại La - cửa hàng duy nhất bán sản phẩm đóng chai.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="achievements-section py-5">
  <div class="container">
    <h3 class="subheading heading-line text-center pb-4">Thành tựu nổi bật và đáng tự hào</h3>
    <div class="row justify-content-center">
      <div class="col-md-4 col-sm-6">
        <div class="achievement-card" data-aos="fade-up">
          <div class="img">
            <img src="{{ asset('img/about/eyes.png') }}" alt="210.000+ sản phẩm">
          </div>
          <div class="content">
            <h6>210.000+</h6>
            <p>sản phẩm được bán ra trên thị trường trong vòng 5 tháng kinh doanh trong tình hình dịch bệnh căng thẳng</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="achievement-card" data-aos="fade-up" data-aos-delay="100">
          <div class="img">
            <img src="{{ asset('img/about/store-icon.png') }}" alt="5836 lượt nhắc đến">
          </div>
          <div class="content">
            <h6>5836</h6>
            <p>lần được nhắc đến trên Facebook và Instagram trong vòng 4 tháng (15/03/2021 - 15/07/2021) (theo Sprout Social)</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="achievement-card" data-aos="fade-up" data-aos-delay="200">
          <div class="img">
            <img src="{{ asset('img/about/diamond.png') }}" alt="98% hài lòng">
          </div>
          <div class="content">
            <h6>98%</h6>
            <p>khách hàng hài lòng về chất lượng sản phẩm và dịch vụ của Phê La (theo đánh giá trên Baemin và Shopee Fresh)</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
