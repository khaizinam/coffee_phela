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
      <button class="btn btn-default gallery__filter--button animate active" data-filter="all">Tất cả</button>
      @foreach($categories as $category)
        @php
          // Lấy slug key từ relationship slug() hoặc tạo từ name
          $slugRelation = $category->slug(); // Relationship object
          $slugModel = $slugRelation ? $slugRelation->first() : null;
          $filterKey = $slugModel && $slugModel->key ? $slugModel->key : \Illuminate\Support\Str::slug($category->name);
        @endphp
        <button class="btn btn-default gallery__filter--button animate" data-filter="{{ $filterKey }}">{{ $category->name }}</button>
      @endforeach
    </div>
    <div class="row no-gutters gallery-inner">
      @forelse($galleryItems as $item)
        @php
          // Tạo filter classes từ categories
          $filterClasses = implode(' ', array_map(function($cat) {
            return 'filter-' . $cat;
          }, $item['categories']));
        @endphp
        <a href="{{ $item['image_url'] }}" class="gallery-product col-md-4 filter {{ $filterClasses }}" data-product-id="{{ $item['id'] }}" title="{{ $item['product_name'] }}">
          <img src="{{ $item['image_url'] }}" class="w-100 d-block gallery-image" alt="{{ $item['image_name'] }}">
        </a>
      @empty
        <div class="col-12 text-center py-5">
          <p class="text-muted">Chưa có hình ảnh trong gallery.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>
@endsection
