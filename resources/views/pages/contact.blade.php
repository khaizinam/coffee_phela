@extends('layouts.app')

@section('content')
<div class="header-body hero-wrap" 
  style="background:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), 
  url('{{ asset('img/new/product_banner.webp') }}') bottom center/cover no-repeat;">
  @include('partials.header')
  
  <header class="header-wrap">
    <div class="container-fluid">
      <div class="row  ">
        <div class="col-md-12">
          <div class="header-wrap__text">
            <h1 class="bread animate">Liên hệ</h1>
          </div>
        </div>
      </div>
    </div>
  </header>
</div>

<section class="contact-main">
  <div class="container-fluid">
    <div class="row py-4 justify-content-between">
      <div class="col-md-3 contact-main__first animate text-center py-3">
        <i class="fas fa-globe-americas welcome-info-icon display-4 p-1 my-0"></i>
        <h5 class="subheading py-1">Liên hệ</h5>
        <p class="mb-2">1900 3013</p>
        <p class="m-0 mb-2" style="font-size: 0.9rem;">(8h30 – 22h)</p>
        <p class="m-0 mb-2">cskh@phela.vn</p>
        <p class="m-0 mt-3" style="font-size: 0.9rem; line-height: 1.6;">
          <strong>Trụ sở chính:</strong><br>
          289 Đinh Bộ Lĩnh, Phường Bình Thạnh<br>
          TP. Hồ Chí Minh
        </p>
        <div class="social pt-2 ">
          <a href="https://www.facebook.com/webworld.az/"><i class="fab fa-facebook-f mx-2"></i></a>
          <a href="https://www.instagram.com/webworld.az/"><i class="fab fa-instagram mx-2"></i></a>
        </div>
      </div>

      <div class="col-md-6 middle add-ornament-top add-ornament-bottom py-3">
        <h5 class="subheading text-center py-3">Bạn có câu hỏi nào không?</h5>
        <form class="needs-validation contact-form" novalidate>
          <div class="form-row">
            <div class="col-md-4 mb-3 col-xs-12">
              <label for="validationCustom01">Họ và tên</label>
              <input type="text" class="form-control" id="validationCustom01" placeholder="Họ và tên" required>
              <div class="valid-feedback sr-only">Tốt!</div>
              <div class="invalid-feedback">Vui lòng nhập tên của bạn</div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationCustom02">Email</label>
              <input type="email" class="form-control" id="validationCustom02" placeholder="Địa chỉ email" required>
              <div class="valid-feedback sr-only">Tốt!</div>
              <div class="invalid-feedback">Vui lòng nhập địa chỉ email của bạn</div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="phone">Số điện thoại</label>
              <input type="phone" class="form-control" id="phone" placeholder="Số điện thoại" required>
              <div class="valid-feedback sr-only">Tốt!</div>
              <div class="invalid-feedback">Vui lòng nhập số điện thoại của bạn</div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-12 mb-3">
              <textarea class="form-control" name="" id="" cols="20" rows="5" placeholder="Tin nhắn của bạn" required></textarea>
              <div class="valid-feedback sr-only">Tốt!</div>
              <div class="invalid-feedback">Vui lòng nhập tin nhắn của bạn</div>
            </div>
            <div class="form-group sr-only">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">Đồng ý với điều khoản và điều kiện</label>
                <div class="invalid-feedback">Bạn phải đồng ý trước khi gửi.</div>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-button btn-bfr btn-anim d-flex mx-auto" type="submit">Gửi</button>
            </div>
          </div>
        </form>
      </div>

      <div class="col-md-3 contact-main__last animate text-center py-3">
        <i class="far fa-clock welcome-info-icon display-4 p-1 my-0"></i>
        <h5 class="subheading py-1">Giờ mở cửa</h5>
        <p>Thứ 2 - Thứ 6 <br> 09:00 - 00:00 </p>
        <p>Cuối tuần <br> 10:00 - 23:00 </p>
      </div>
    </div>
  </div>
</section>

<section class="map">
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3038.271588995667!2d49.86849091524855!3d40.40283386440864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d4ee9253a65%3A0x29160f1a81905e71!2sNariman%20Narimanov!5e0!3m2!1sen!2s!4v1574691645795!5m2!1sen!2s"
    width="100%" height="500vh" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section>
@endsection
