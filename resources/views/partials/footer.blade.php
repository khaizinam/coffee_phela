<footer id="footer">
  <div class="container-fluid text-white">
    <div class="row">
      <!-- Cột 1: VỀ CHÚNG TÔI -->
      <div class="footer-col col-md-4 col-sm-6 mb-4">
        <div class="footer-logo mb-3">
          <img src="{{ asset('img/new/logo-phela.png') }}" alt="Phê La" class="img-fluid" style="max-width: 150px;">
        </div>
        <h3 class="heading footer-heading mb-3">VỀ CHÚNG TÔI</h3>
        <ul class="list-unstyled footer-text">
          <li class="mb-2"><a href="#" class="text-decoration-none" style="color: #d8d8d8;">Cửa hàng</a></li>
          <li class="mb-2"><a href="{{ route('about') }}" class="text-decoration-none" style="color: #d8d8d8;">Về Phê La</a></li>
          <li class="mb-2"><a href="#" class="text-decoration-none" style="color: #d8d8d8;">Hệ thống cửa hàng</a></li>
        </ul>
      </div>

      <!-- Cột 2: ĐỊA CHỈ CÔNG TY -->
      <div class="footer-col col-md-4 col-sm-6 mb-4">
        <h3 class="heading footer-heading mb-3">ĐỊA CHỈ CÔNG TY</h3>
        <div class="footer-text" style="font-size: 0.9rem; line-height: 1.8;">
          <p class="mb-2"><strong>Trụ sở chính:</strong><br>
            289 Đinh Bộ Lĩnh, Phường Bình Thạnh<br>
            Thành phố Hồ Chí Minh, Việt Nam</p>
          <p class="mb-2"><strong>Chi nhánh Hà Nội:</strong><br>
            Lô 04-9A Khu công nghiệp Vĩnh Hoàng, Phường Hoàng Mai<br>
            Thành phố Hà Nội, Việt Nam</p>
          <p class="mb-3" style="font-size: 0.85rem;">Giấy chứng nhận Đăng ký kinh doanh số 0317601095 do Sở Kế Hoạch & Đầu Tư Thành Phố Hồ Chí Minh cấp ngày 09/12/2022</p>
          
          <p class="mb-2"><strong>EMAIL HỖ TRỢ KHÁCH HÀNG</strong></p>
          <a href="mailto:cskh@phela.vn" class="footer-contact-mail text-decoration-none d-block mb-3">
            cskh@phela.vn
          </a>
          
          <p class="mb-2"><strong>HOTLINE HỖ TRỢ KHÁCH HÀNG</strong></p>
          <p class="happyhour-phone mb-0">1900 3013 (8h30 - 22h)</p>
        </div>
      </div>

      <!-- Cột 3: NHẬN THÔNG TIN TỪ PHÊ LA -->
      <div class="footer-col col-md-4 col-sm-12 mb-4">
        <h3 class="heading footer-heading mb-3">NHẬN THÔNG TIN TỪ PHÊ LA</h3>
        
        <!-- Social Media Icons -->
        <div class="footer-social-icons mb-4 d-flex justify-content-start" style="gap: 15px;">
          <a href="https://www.facebook.com/phela.vn" target="_blank" class="social-icon" style="width: 40px; height: 40px; border-radius: 50%; background-color: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: #d8d8d8; text-decoration: none; transition: all 0.3s;">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="https://www.instagram.com/phela.vn" target="_blank" class="social-icon" style="width: 40px; height: 40px; border-radius: 50%; background-color: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: #d8d8d8; text-decoration: none; transition: all 0.3s;">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="https://www.youtube.com/phela" target="_blank" class="social-icon" style="width: 40px; height: 40px; border-radius: 50%; background-color: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: #d8d8d8; text-decoration: none; transition: all 0.3s;">
            <i class="fab fa-youtube"></i>
          </a>
          <a href="https://www.tiktok.com/@phela.vn" target="_blank" class="social-icon" style="width: 40px; height: 40px; border-radius: 50%; background-color: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: #d8d8d8; text-decoration: none; transition: all 0.3s;">
            <i class="fab fa-tiktok"></i>
          </a>
        </div>

        <!-- Newsletter Form -->
        <p class="footer-text mb-3" style="font-size: 0.9rem;">Xin vui lòng để lại địa chỉ email, chúng tôi sẽ cập nhật những tin tức mới nhất của Phê La</p>
        <form class="footer-newsletter-form">
          <div class="form-group position-relative">
            <input type="email" class="form-control footer-email" placeholder="Nhập email của bạn..." required>
            <button type="submit" class="btn btn-button footer-btn">Gửi</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Copyright -->
    <div class="row text-center pt-3 border-top" style="border-color: rgba(255,255,255,0.1) !important;">
      <div class="col-12">
        <p class="footer-text mb-0">@2020 bản quyền này thuộc về Công Ty Cổ Phần Phê La</p>
      </div>
    </div>
  </div>
</footer>
