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
            <h1 class="bread">Ảnh</h1>
            <h2 class="text-center no-wrap">Cà phê</h2>
          </div>
        </div>
      </div>
    </div>
  </header>
</div>
<section class="gallery py-5 pt-sm-1">
  <div class="container">
    <img src="{{ asset('img/title-above.png') }}" class="title-above d-block mx-auto pt-3 pt-sm-1" alt="Title-above">
    <h3 class="subheading heading-line animate text-center pt-4">Hình ảnh</h3>
    <div class="row justify-content-center py-4">
      <button class="btn btn-default gallery__filter--button animate" data-filter="all">Tất cả</button>
      <button class="btn btn-default gallery__filter--button animate" data-filter="latte">Cafe Latte</button>
      <button class="btn btn-default gallery__filter--button animate" data-filter="icecoffee">Cà phê đá</button>
      <button class="btn btn-default gallery__filter--button animate" data-filter="mocha">Mocha</button>
      <button class="btn btn-default gallery__filter--button animate" data-filter="espresso">Espresso</button>
      <button class="btn btn-default gallery__filter--button animate" data-filter="americano">Americano</button>
    </div>
    <div class="row no-gutters gallery-inner">
      <a href="{{ asset('img/mocha-1.jpg') }}" class="gallery-product col-md-4 filter mocha">
        <img src="{{ asset('img/mocha-1.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/americano-1.jpg') }}" class="gallery-product  col-md-4 filter americano">
        <img src="{{ asset('img/americano-1.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/mocha-2.jpg') }}" class="gallery-product col-md-4 filter mocha">
        <img src="{{ asset('img/mocha-2.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/espresso-2.jpg') }}" class="gallery-product col-md-4 filter espresso">
        <img src="{{ asset('img/espresso-2.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/americano-2.jpg') }}" class="gallery-product col-md-4  filter americano">
        <img src="{{ asset('img/americano-2.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/icecoffee-1.jpg') }}" class="gallery-product  col-md-4 filter icecoffee">
        <img src="{{ asset('img/icecoffee-1.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/mocha-3.jpg') }}" class="gallery-product col-md-4 filter mocha">
        <img src="{{ asset('img/mocha-3.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/mocha-4.jpg') }}" class="gallery-product col-md-4  filter mocha">
        <img src="{{ asset('img/mocha-4.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/latte-2.jpg') }}" class="gallery-product col-md-4  filter latte">
        <img src="{{ asset('img/latte-2.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/espresso-1.jpg') }}" class="gallery-product  col-md-4 filter espresso">
        <img src="{{ asset('img/espresso-1.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/icecoffee-2.jpg') }}" class="gallery-product col-md-4  filter icecoffee">
        <img src="{{ asset('img/icecoffee-2.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/icecoffee-3.jpg') }}" class="gallery-product col-md-4 filter icecoffee">
        <img src="{{ asset('img/icecoffee-3.jpg') }}" class="w-100 d-block gallery-image">
      </a>
    </div>
  </div>
</section>
@endsection
