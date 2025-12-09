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
            <h2 class="text-center no-wrap">Phê La</h2>
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
      <button class="btn btn-default gallery__filter--button animate" data-filter="brunch">Bữa sáng</button>
      <button class="btn btn-default gallery__filter--button animate" data-filter="sandwich">Bánh mì</button>
      <button class="btn btn-default gallery__filter--button animate" data-filter="hamburger">Hamburger</button>
      <button class="btn btn-default gallery__filter--button animate" data-filter="dessert">Bánh ngọt</button>
      <button class="btn btn-default gallery__filter--button animate" data-filter="cream">Kem</button>
      <button class="btn btn-default gallery__filter--button animate" data-filter="cream">Kem</button>
      <button class="btn btn-default gallery__filter--button animate" data-filter="cream">Kem</button>
      <button class="btn btn-default gallery__filter--button animate" data-filter="cream">Kem</button>
      <button class="btn btn-default gallery__filter--button animate" data-filter="cream">Kem</button>
      <button class="btn btn-default gallery__filter--button animate" data-filter="cream">Kem</button>
    </div>
    <div class="row no-gutters gallery-inner">
      <a href="{{ asset('img/gallery-food-1.jpg') }}" class="gallery-product col-md-4 filter brunch">
        <img src="{{ asset('img/gallery-food-1.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/gallery-food-2.jpg') }}" class="gallery-product  col-md-4 filter sandwich">
        <img src="{{ asset('img/gallery-food-2.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/gallery-food-7.jpg') }}" class="gallery-product  col-md-4 filter hamburger">
        <img src="{{ asset('img/gallery-food-7.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/gallery-food-4.jpg') }}" class="gallery-product  col-md-4 filter dessert">
        <img src="{{ asset('img/gallery-food-4.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/gallery-food-5.jpg') }}" class="gallery-product  col-md-4 filter hamburger">
        <img src="{{ asset('img/gallery-food-5.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/gallery-food-8.jpg') }}" class="gallery-product  col-md-4 filter sandwich">
        <img src="{{ asset('img/gallery-food-8.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/gallery-food-6.jpg') }}" class="gallery-product  col-md-4 filter cream">
        <img src="{{ asset('img/gallery-food-6.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/gallery-food-9.jpg') }}" class="gallery-product  col-md-4 filter sandwich">
        <img src="{{ asset('img/gallery-food-9.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/gallery-food-10.jpg') }}" class="gallery-product  col-md-4 filter dessert">
        <img src="{{ asset('img/gallery-food-10.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/gallery-food-1.jpg') }}" class="gallery-product  col-md-4 filter brunch">
        <img src="{{ asset('img/gallery-food-1.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/gallery-food-2.jpg') }}" class="gallery-product  col-md-4 filter dessert">
        <img src="{{ asset('img/gallery-food-2.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/gallery-food-4.jpg') }}" class="gallery-product  col-md-4 filter sandwich">
        <img src="{{ asset('img/gallery-food-4.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/gallery-food-11.jpg') }}" class="gallery-product  col-md-4 filter hamburger">
        <img src="{{ asset('img/gallery-food-11.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/gallery-food-12.jpg') }}" class="gallery-product  col-md-4 filter dessert">
        <img src="{{ asset('img/gallery-food-12.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/gallery-food-5.jpg') }}" class="gallery-product  col-md-4 filter cream">
        <img src="{{ asset('img/gallery-food-5.jpg') }}" class="w-100 d-block gallery-image">
      </a>
      <a href="{{ asset('img/gallery-food-6.jpg') }}" class="gallery-product  col-md-4 filter sandwich">
        <img src="{{ asset('img/gallery-food-6.jpg') }}" class="w-100 d-block gallery-image">
      </a>
    </div>
  </div>
</section>
@endsection
