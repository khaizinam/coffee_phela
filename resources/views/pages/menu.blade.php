@extends('layouts.app')

@section('content')
<div class="header-body hero-wrap" 
  style="background:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), 
  url('{{ asset('img/bg-menu.jpg') }}') bottom center/cover no-repeat;">
  @include('partials.header')
  
  <header class="header-wrap">
    <div class="container-fluid">
      <div class="row  ">
        <div class="col-md-12">
          <div class="header-wrap__text">
            <h1 class="bread">Thực đơn</h1>
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
    <div class="row py-4">
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
    </div>
  </div>
</section>

<section class="menyu-content pb-5">
  <div class="menyu-content__image d-flex align-items-center justify-content-center"
    style="background: linear-gradient(rgba(0,0,0,.3), rgba(0,0,0,.3)), url('{{ asset('img/menyu-drinks.jpg') }}') center center/cover fixed no-repeat;">
    <h1 class="heading text-white">Đồ uống</h1>
  </div>
  <div class="container ">
    <div class="menyu-content__items add-ornament-top add-ornament-bottom mt-5">
      <div class="row py-4">
        <div class="col-lg-4 menu-item">
          <h5 class="subheading "><u>Cà phê</u></h5>
          <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Espresso</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Cappuccino</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Latte</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Cà phê đá</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Mocha</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Americano</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description  pb-4 pb-lg-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        </div>
        <div class="col-lg-4 menu-item">
          <h5 class="subheading "><u>Cocktail</u></h5>
          <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Aperol Spritz</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Campari</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description pb-4 pb-lg-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        </div>

        <div class="col-lg-4 menu-item">
          <h5 class="subheading "><u>Rượu vang</u></h5>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Tormentoso Bush Vine Pintoage</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Massandra </h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Bánh Chateau Mouton-Rothschild</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Chateau Lafite</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Chateau Cheval Blanc</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description pb-4 pb-lg-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        </div>
      </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade modalbox" id="modalbox" tabindex="-1" role="dialog" aria-labelledby="modalboxTitle"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <img class="popup-image" src="{{ asset('img/modal-popup-img.jpg') }}" alt="popup-image">
        <div class="popup-image-text modal-title" id="modalboxTitle">
          <h3 class="modal-header-heading">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
          <span class="modal-menu-price">$22</span>
        </div>
        <button type="button" class=" close-button" data-dismiss="modal" aria-label="Close">
          <i class="fas fa-times" aria-hidden="true"></i>
        </button>
      </div>
      <div class="modal-body">
        <h1 class="modal-body-category text-uppercase d-inline-block">bữa sáng</h1>
        <h6 class="modal-body-category text-uppercase d-inline-block">Đặc biệt hôm nay</h6>
        <p class="modal-category-text font-weight-bold">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          Nemo repellat debitis ipsam nostrum, magni et?</p>
        <hr>
        <p class="text-muted">450g</p>
        <hr>
        <i class="fas fa-pepper-hot d-inline-block text-muted"></i>
        <h1 class="modal-spicy text-uppercase d-inline-block font-weight-bold">độ cay</h1>
        <div class="spicy-level mb-3">
          <div class="level text-center">2/5</div>
        </div>
        <i class="fas fa-utensils d-inline-block text-muted"></i>
        <h1 class="modal-nutritions text-uppercase d-inline-block font-weight-bold">dinh dưỡng</h1>
        <div class="row">
          <div class="col">
            <p class="text-muted nutritions-text">Kalori 250kcl <br>
              Fiber 2.0G <br>
              Karbohidrat 4.5G <br>
              Protein 1.7G
            </p>
          </div>
          <div class="col">
            <p class="text-muted nutritions-text">Kalori 250kcl <br>
              Fiber 2.0G <br>
              Karbohidrat 4.5G <br>
            </p>
          </div>
        </div>
        <hr>
        <i class="fas fa-book d-inline-block text-muted"></i>
        <h1 class="modal-ingredients text-uppercase d-inline-block font-weight-bold">thành phần</h1>
        <p class="modal-category-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore quasi sequi
          accusamus, laboriosam ullam autem dolores ratione nemo saepe hic?</p>
      </div>
    </div>
  </div>
</div>

<section class="menyu-content pb-5">
  <div class="menyu-content__image d-flex align-items-center justify-content-center"
    style="background: linear-gradient(rgba(0,0,0,.3), rgba(0,0,0,.3)), url('{{ asset('img/menyu-dessert.jpg') }}') center center/cover fixed no-repeat;">
    <h1 class="heading text-white">Bánh ngọt</h1>
  </div>
  <div class="container ">
    <div class="menyu-content__items add-ornament-top add-ornament-bottom mt-5">
      <div class="row py-4">
        <div class="col-lg-4 menu-item">
          <h5 class="subheading "><u>Bánh ngọt</u></h5>
          <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Espresso</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Cappuccino</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Latte</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Cà phê đá</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Mocha</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Americano</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description  pb-4 pb-lg-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        </div>
        <div class="col-lg-4 menu-item">
          <h5 class="subheading "><u>Kem</u></h5>
          <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Kem anh đào</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Kem Cornuoll</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description pb-4 pb-lg-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Granita</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description pb-4 pb-lg-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Đá trái cây</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description pb-4 pb-lg-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Sorbet</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description pb-4 pb-lg-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        </div>

        <div class="col-lg-4 menu-item">
          <h5 class="subheading "><u>Món tráng miệng Mỹ</u></h5>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Brownie</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Bánh nhung đỏ</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Bánh Chateau Mouton-Rothschild</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Sundae</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        </div>
      </div>
    </div>
</section>

<section class="menyu-content pb-5">
  <div class="menyu-content__image d-flex align-items-center justify-content-center"
    style="background: linear-gradient(rgba(0,0,0,.3), rgba(0,0,0,.3)), url('{{ asset('img/menyu-breakfast.jpg') }}') center center/cover fixed no-repeat;">
    <h1 class="heading text-white">Bữa sáng</h1>
  </div>
  <div class="container ">
    <div class="menyu-content__items add-ornament-top add-ornament-bottom mt-5">
      <div class="row py-4">
        <div class="col-lg-4 menu-item">
          <h5 class="subheading "><u>Bánh mì</u></h5>
          <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Bánh mì kẹp túi</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Bánh mì kẹp club</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Bánh mì đơn giản</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        </div>
        <div class="col-lg-4 menu-item">
          <h5 class="subheading "><u>Hamburger</u></h5>
          <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Cheeseburger</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Fishburger</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description pb-4 pb-lg-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Chickenburger</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description pb-4 pb-lg-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        </div>

        <div class="col-lg-4 menu-item">
          <h5 class="subheading "><u>Bữa sáng</u></h5>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Frittata</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Bánh Paçanya</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Bánh mì sô cô la</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          <div class="menu-name pt-3 d-flex justify-content-between align-items-center" data-toggle="modal"
            data-target="#modalbox">
            <h3 class="menu-title ">Bánh kếp phô mai</h3>
            <span class="menu-item-price align-self-end">20$</span>
          </div>
          <p class="menu-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        </div>
      </div>
    </div>
</section>
@endsection
