<footer id="footer">
  <h1 class="heading footer-heading text-center py-4">
    <img src="{{ asset('img/new/logo-phela.png') }}" alt="Phela" class="img-fluid" style="width: 100px;">
  </h1>
  <div class="container-fluid text-white ">
    <div class="row text-center d-flex">
      <div class="footer-col col-md-4 col-sm-6 order-sm-1 pb-4">
        <h3 class="heading">Về chúng tôi</h3>
        <p class="footer-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi accusantium
          placeat corporis beatae vero cumque eum, quas iusto pariatur?...</p>
        <a href="{{ route('about') }}"><button class="btn btn-button">Tìm hiểu thêm</button></a>
      </div>
      <div class="footer-col col-md-4 col-sm-12 order-sm-3">
        <h3 class="heading">Đăng ký nhận tin</h3>
        <form>
          <div class="form-group">
            <input type="email" class="form-control footer-email" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Địa chỉ email của bạn" required>
            <button class="btn btn-button footer-btn">Đăng ký</button>
          </div>
          <small id="emailHelp" class="form-text text-muted pb-3">Chúng tôi sẽ không bao giờ chia sẻ thông tin của bạn với bất kỳ ai.</small>
        </form>
      </div>
      <div class="footer-col col-md-4 col-sm-6 order-sm-2">
        <h3 class="heading mb-3">Liên hệ</h3>
        <p class="happyhour-phone mb-1">1900 3013</p>
        <p class="footer-text mb-2" style="font-size: 0.9rem;">(8h30 – 22h)</p>
        <a href="mailto:cskh@phela.vn" class="mb-3 d-block">
          <p class="footer-text footer-contact-mail">cskh@phela.vn</p>
        </a>
        <div class="footer-text mt-3 mb-3" style="font-size: 0.85rem; line-height: 1.6; text-align: left;">
          <p style="margin-bottom: 0.8rem;"><strong>Trụ sở chính:</strong><br>
          289 Đinh Bộ Lĩnh, Phường Bình Thạnh<br>
          TP. Hồ Chí Minh, Việt Nam</p>
          <p style="margin-bottom: 0.8rem;"><strong>Chi nhánh Hà Nội:</strong><br>
          Lô 04-9A Khu công nghiệp Vĩnh Hoàng<br>
          Phường Hoàng Mai, TP. Hà Nội, Việt Nam</p>
          <p style="margin-bottom: 0;"><strong>MST:</strong> 0317601095</p>
        </div>
        <div
          class="direction-social-icons footer-social d-flex align-items-center justify-content-between mx-auto mb-3 mt-3">
          <a href="https://www.facebook.com/webworld.az/"><i class="fab fa-facebook-f "></i></a>
          <a href="https://www.instagram.com/webworld.az/"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <div class="row text-center pt-md-0 pt-xl-3">
      <div class="col-md-12">
        <p class="footer-text">Copyright &copy;
          <script>document.write(new Date().getFullYear());</script>
          Created by
          <a href="https://khaizinam.io.vn" target="_blank" class="ww">khaizinam</a></p>
      </div>
    </div>
  </div>
</footer>

