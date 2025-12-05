<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">
  
  {{-- SEO Meta Tags --}}
  <title>{{ $seo['title'] ?? 'Phela - Nốt Hương Đặc Sản' }}</title>
  <meta name="description" content="{{ $seo['description'] ?? 'Phela - Nốt Hương Đặc Sản. Trân quý, nâng niu những giá trị Nguyên Bản ở mỗi vùng đất, đánh thức những nốt hương đặc sản của nông sản Việt Nam.' }}">
  <meta name="keywords" content="{{ $seo['keywords'] ?? 'Phela, cà phê, trà, đặc sản Việt Nam, nông sản, nguyên bản, thủ công, cà phê Việt Nam, trà Việt Nam' }}">
  <meta name="author" content="Phela">
  <meta name="robots" content="{{ $seo['robots'] ?? 'index, follow' }}">
  <link rel="canonical" href="{{ $seo['canonical'] ?? url()->current() }}">
  
  {{-- Open Graph / Facebook --}}
  <meta property="og:type" content="{{ $seo['og_type'] ?? 'website' }}">
  <meta property="og:url" content="{{ $seo['og_url'] ?? url()->current() }}">
  <meta property="og:title" content="{{ $seo['og_title'] ?? ($seo['title'] ?? 'Phela - Nốt Hương Đặc Sản') }}">
  <meta property="og:description" content="{{ $seo['og_description'] ?? ($seo['description'] ?? 'Phela - Nốt Hương Đặc Sản. Trân quý, nâng niu những giá trị Nguyên Bản ở mỗi vùng đất.') }}">
  <meta property="og:image" content="{{ $seo['og_image'] ?? asset('img/new/logo-phela.png') }}">
  <meta property="og:site_name" content="Phela">
  <meta property="og:locale" content="vi_VN">
  
  {{-- Twitter Card --}}
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="{{ $seo['twitter_url'] ?? url()->current() }}">
  <meta name="twitter:title" content="{{ $seo['twitter_title'] ?? ($seo['title'] ?? 'Phela - Nốt Hương Đặc Sản') }}">
  <meta name="twitter:description" content="{{ $seo['twitter_description'] ?? ($seo['description'] ?? 'Phela - Nốt Hương Đặc Sản. Trân quý, nâng niu những giá trị Nguyên Bản ở mỗi vùng đất.') }}">
  <meta name="twitter:image" content="{{ $seo['twitter_image'] ?? asset('img/new/logo-phela.png') }}">
  
  {{-- Additional SEO --}}
  <meta name="geo.region" content="VN">
  <meta name="geo.placename" content="Hồ Chí Minh">
  <meta name="language" content="Vietnamese">
  <meta name="revisit-after" content="7 days">
  
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/new/logo-phela.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('img/new/logo-phela.png') }}">
  
  <!-- owl carousel  -->
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
  <!-- google fonts Libre+Baskerville, Open+Sans, Varela+Round, Kaushan+Script -->
  <link
    href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Open+Sans|Varela+Round|Handlee|Kaushan+Script&display=swap"
    rel="stylesheet">
  <!-- bootstrap css  -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <!-- main css  -->
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <!-- scrollreveal > always include in the head  -->
  <script src="https://unpkg.com/scrollreveal@4"></script>
  
  {{-- Structured Data (JSON-LD) --}}
  @if(isset($seo['structured_data']))
    <script type="application/ld+json">
      {!! json_encode($seo['structured_data'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
  @endif
  
  @stack('styles')
</head>

<body>
  <div class="main-content">
    @yield('content')
  </div>

  @include('partials.footer')

  <div class="search-overlay"></div>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#cb7152" /></svg>
  </div>
  
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/all.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.mb.YTPlayer.min.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
  @stack('scripts')
</body>
</html>

