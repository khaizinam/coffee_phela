@extends('layouts.app')

@section('content')

<div class="header-body hero-wrap" 
  style="background:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), 
  url('{{ asset('img/new/hethongcuahang.webp') }}') bottom center/cover no-repeat;">
  @include('partials.header')
  
  <header id="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="banner text-center">
            <h1 class="banner-heading display-1 text-white">
              <p class="banner-heading-top">Hệ thống</p><br>
              <p class="banner-heading-bottom">Cửa hàng</p>
            </h1>
            <p class="banner-paragraph pt-4 text-white">- Tìm cửa hàng gần bạn -</p>
          </div>
        </div>
      </div>
    </div>
  </header>
</div>

<div class="container py-5">
  <section id="stores" class="mt-5">
    <div class="row">
      <div class="col-12 text-center mb-5">
        <h2 class="heading heading-line animate">Hệ thống cửa hàng Phela</h2>
        <p class="welcome-txt mt-3">Tìm cửa hàng Phela gần bạn để thưởng thức những nốt hương đặc sản</p>
      </div>
    </div>

    <!-- Danh sách cửa hàng - Layout 2 cột -->
    <div class="row">
      @foreach($allStores as $index => $store)
      <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
        <div class="store-box" style="background-color: #fff; border: 1px solid #e0e0e0; border-radius: 8px; padding: 1.5rem; height: 100%; transition: all 0.3s; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
          <div class="store-header mb-3" style="border-bottom: 2px solid var(--secondary-color); padding-bottom: 0.75rem;">
            <h4 class="heading mb-0" style="color: var(--secondary-color); font-size: 1.2rem; display: flex; align-items: center;">
              <i class="fas fa-map-marker-alt mr-2" style="font-size: 1rem;"></i>
              <span>{{ $store['city'] }}</span>
            </h4>
          </div>
          
          <h5 class="mb-3" style="color: var(--dark); font-size: 1.1rem; font-weight: 600;">
            {{ $store['name'] }}
          </h5>
          
          <div class="store-info" style="font-size: 0.9rem; line-height: 1.8; color: var(--darken);">
            <p class="mb-2" style="display: flex; align-items: flex-start;">
              <i class="fas fa-map-marker-alt mr-2 mt-1" style="color: var(--secondary-color); min-width: 16px;"></i>
              <span><strong>Địa chỉ:</strong><br>{{ $store['address'] }}</span>
            </p>
            
            <p class="mb-2" style="display: flex; align-items: center;">
              <i class="fas fa-phone mr-2" style="color: var(--secondary-color); min-width: 16px;"></i>
              <span><strong>Hotline:</strong> 
                <a href="tel:{{ str_replace(' ', '', $store['phone']) }}" style="color: var(--secondary-color); text-decoration: none;">
                  {{ $store['phone'] }}
                </a>
              </span>
            </p>
            
            <p class="mb-2" style="display: flex; align-items: center;">
              <i class="far fa-clock mr-2" style="color: var(--secondary-color); min-width: 16px;"></i>
              <span><strong>Giờ mở cửa:</strong> {{ $store['hours'] }}</span>
            </p>
            
            @if(isset($store['opened']))
            <p class="mb-3" style="display: flex; align-items: center;">
              <i class="fas fa-calendar-alt mr-2" style="color: var(--secondary-color); min-width: 16px;"></i>
              <span><strong>Khai trương:</strong> {{ $store['opened'] }}</span>
            </p>
            @endif
          </div>
          
          @if($store['map_url'] != '#')
          <a href="{{ $store['map_url'] }}" target="_blank" class="btn btn-button btn-bfr btn-anim" style="font-size: 0.85rem; padding: 0.5rem 1.2rem; margin-top: 0.5rem;">
            <i class="fas fa-directions mr-2"></i>Xem bản đồ
          </a>
          @endif
        </div>
      </div>
      @endforeach
    </div>

    <!-- Thông tin tổng đài -->
    <div class="row mt-5 mb-5">
      <div class="col-12">
        <div style="background-color: var(--brown-light); border-radius: 10px; padding: 2rem; text-align: center;">
          <h4 class="heading mb-3" style="color: var(--secondary-color);">Liên hệ tổng đài</h4>
          <p class="happyhour-phone mb-2" style="font-size: 2rem; color: var(--dark);">1900 3013</p>
          <p class="footer-text mb-3" style="color: var(--dark);">(8h30 - 22h hàng ngày)</p>
          <p class="mb-0">
            <a href="mailto:cskh@phela.vn" class="footer-contact-mail" style="color: var(--secondary-color); font-size: 1.1rem; text-decoration: none;">
              <i class="fas fa-envelope mr-2"></i>cskh@phela.vn
            </a>
          </p>
        </div>
      </div>
    </div>
  </section>
</div>

<style>
.store-box:hover {
  box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
  transform: translateY(-2px);
  transition: all 0.3s;
}
</style>

@endsection
