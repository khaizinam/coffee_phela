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
            <h1 class="bread">Sản phẩm</h1>
            <h2 class="text-center no-wrap">Phê la</h2>
          </div>
        </div>
      </div>
    </div>
  </header>
</div>

<section class="menyu py-5 pt-sm-1">
  <div class="container">
    <img src="{{ asset('img/title-above.png') }}" class="title-above d-block mx-auto pt-3 pt-sm-1" alt="Title-above">
    <h3 class="subheading heading-line animate text-center pt-4">Đặc biệt hôm nay</h3>
    <!-- <div class="row py-4">
      <div class="col-md-6 col-lg-3 animate pb-4 pb-lg-0">
        <img src="{{ asset('img/menu-img.jpg') }}" class="d-block w-100" alt="menu-image">
        <div class="menyu-price">20$</div>
        <div class="menu-name pt-3" data-toggle="modal" data-target="#modalbox">
          <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
          <small>Lorem ipsum dolor sit amet consectetur adipisicing elit.</small>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 animate pb-4 pb-lg-0">
        <img src="{{ asset('img/menu-img-2.jpg') }}" class="d-block w-100" alt="menu-image">
        <div class="menyu-price">20$</div>
        <div class="menu-name pt-3" data-toggle="modal" data-target="#modalbox">
          <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
          <small>Lorem ipsum dolor sit amet consectetur adipisicing elit.</small>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 animate pb-4 pb-lg-0">
        <img src="{{ asset('img/menu-img-3.jpg') }}" class="d-block w-100" alt="menu-image">
        <div class="menyu-price">20$</div>
        <div class="menu-name pt-3" data-toggle="modal" data-target="#modalbox">
          <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
          <small>Lorem ipsum dolor sit amet consectetur adipisicing elit.</small>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 animate pb-4 pb-lg-0">
        <img src="{{ asset('img/menu-img-4.jpg') }}" class="d-block w-100" alt="menu-image">
        <div class="menyu-price">20$</div>
        <div class="menu-name pt-3" data-toggle="modal" data-target="#modalbox">
          <h3 class="menu-title ">Lorem ipsum dolor sit amet </h3>
          <small>Lorem ipsum dolor sit amet consectetur adipisicing elit.</small>
        </div>
      </div>
    </div> -->
  </div>
</section>

@if(isset($categories) && $categories->count() > 0)
  @foreach($categories as $category)
  @php
    $bgImage = $category->image ? asset('storage/' . $category->image) : asset('img/new/banner-3.webp');
    $products = $category->products ?? collect();
    $totalProducts = $products->count();
    if ($totalProducts > 0) {
      $productsPerColumn = ceil($totalProducts / 3);
      $column1 = $products->take($productsPerColumn);
      $column2 = $products->skip($productsPerColumn)->take($productsPerColumn);
      $column3 = $products->skip($productsPerColumn * 2);
    } else {
      $column1 = collect();
      $column2 = collect();
      $column3 = collect();
    }
  @endphp
  <section class="menyu-content pb-5">
    <div class="menyu-content__image d-flex align-items-center justify-content-center"
      style="background: linear-gradient(rgba(0,0,0,.3), rgba(0,0,0,.3)), url('{{ $bgImage }}') center center/cover fixed no-repeat;">
      <h1 class="heading text-white">{{ $category->name }}</h1>
    </div>
    <div class="container ">
      <div class="menyu-content__items add-ornament-top add-ornament-bottom mt-5">
        <div class="row py-4">
          @if($totalProducts > 0)
            <div class="col-lg-4 menu-item">
              @foreach($column1 as $product)
                <div class="menu-name {{ $loop->first ? 'pt-2' : 'pt-3' }} d-flex justify-content-between align-items-center product-clickable" 
                  data-product-id="{{ $product->id }}"
                  data-toggle="modal"
                  data-target="#productModal"
                  style="cursor: pointer;">
                  <h3 class="menu-title">{{ $product->name }}</h3>
                  @if($product->price > 0)
                    <span class="menu-item-price align-self-end">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                  @endif
                </div>
                @if($product->description)
                  <p class="menu-description">{{ $product->description }}</p>
                @endif
              @endforeach
            </div>
            <div class="col-lg-4 menu-item">
              @foreach($column2 as $product)
                <div class="menu-name {{ $loop->first ? 'pt-2' : 'pt-3' }} d-flex justify-content-between align-items-center product-clickable" 
                  data-product-id="{{ $product->id }}"
                  data-toggle="modal"
                  data-target="#productModal"
                  style="cursor: pointer;">
                  <h3 class="menu-title">{{ $product->name }}</h3>
                  @if($product->price > 0)
                    <span class="menu-item-price align-self-end">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                  @endif
                </div>
                @if($product->description)
                  <p class="menu-description">{{ $product->description }}</p>
                @endif
              @endforeach
            </div>
            <div class="col-lg-4 menu-item">
              @foreach($column3 as $product)
                <div class="menu-name {{ $loop->first ? 'pt-3' : 'pt-3' }} d-flex justify-content-between align-items-center product-clickable" 
                  data-product-id="{{ $product->id }}"
                  data-toggle="modal"
                  data-target="#productModal"
                  style="cursor: pointer;">
                  <h3 class="menu-title">{{ $product->name }}</h3>
                  @if($product->price > 0)
                    <span class="menu-item-price align-self-end">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                  @endif
                </div>
                @if($product->description)
                  <p class="menu-description {{ $loop->last ? 'pb-4 pb-lg-0' : '' }}">{{ $product->description }}</p>
                @endif
              @endforeach
            </div>
          @else
            <div class="col-12">
              <p class="text-center text-muted py-4">Chưa có sản phẩm trong danh mục này.</p>
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
  @endforeach
@else
  <section class="menyu-content pb-5">
    <div class="container">
      <div class="row py-4">
        <div class="col-12">
          <p class="text-center text-muted py-4">Chưa có danh mục nào.</p>
        </div>
      </div>
    </div>
  </section>
@endif

@include('partials.product-modal')
@endsection
