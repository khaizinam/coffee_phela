<nav class="navbar navbar-expand-lg d-flex">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
    <div class="toggler-btn">
      <div class="bar bar1"></div>
      <div class="bar bar2"></div>
      <div class="bar bar3"></div>
    </div>
  </button>

  <a href="{{ route('home') }}" class="navbar-brand order-lg-1 pl-lg-5" data-toggle="tooltip" data-placement="bottom"
    title="Phela">
    <img src="{{ asset('img/new/logo-phela.png') }}" alt="Phela" class="img-fluid" style="width: 100px;">
  </a>
  <div class="order-lg-3 pr-3 pr-sm-5 ">
    <button class="btn search-header"> <i class="fas fa-search"></i> </button>
  </div>
  <div class="collapse navbar-collapse order-lg-2 justify-content-center" id="myNavbar">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a href="{{ route('home') }}" class="nav-link text-capitalize {{ request()->routeIs('home') ? 'active' : '' }}">Trang chủ</a>
      </li>
      <li class="nav-item ">
        <a href="{{ route('menu') }}" class="nav-link text-capitalize {{ request()->routeIs('menu') ? 'active' : '' }}">Thực đơn</a>
      </li>
      <li class="nav-item">
        <div class="dropdown">
          <a class="dropdown-toggle nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}" href="{{ route('gallery.coffee') }}" role="button" id="dropdownMenuLink"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Ảnh
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ route('gallery.coffee') }}">Ảnh Cà phê</a>
            <a class="dropdown-item" href="{{ route('gallery.food') }}">Ảnh Thực phẩm</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <div class="dropdown">
          <a class="dropdown-toggle nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}" href="{{ route('blog.healthy') }}" role="button" id="dropdownMenuLink"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Blog
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ route('blog.healthy') }}">Blog Thực phẩm lành mạnh</a>
            <a class="dropdown-item" href="{{ route('blog.recipe') }}">Blog Công thức</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a href="{{ route('about') }}" class="nav-link text-capitalize {{ request()->routeIs('about') ? 'active' : '' }}">Giới thiệu</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('contact') }}" class="nav-link text-capitalize {{ request()->routeIs('contact') ? 'active' : '' }}">Liên hệ</a>
      </li>
    </ul>
  </div>
  <!-- end link  -->
</nav>

<div>
  <input type="text" class="search-header__input" placeholder="Tìm kiếm">
  <button class="btn search-header__close"><i class="fas fa-times" aria-hidden="true"></i></button>
</div>

<hr class="nav-line">