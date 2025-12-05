@extends('layouts.app')

@section('content')
<div class="header-body hero-wrap" 
  style="background:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), 
  url('{{ asset('img/what-title.jpg') }}') bottom center/cover no-repeat;">
  @include('partials.header')
  
  <header class="header-wrap">
    <div class="container-fluid">
      <div class="row  ">
        <div class="col-md-12">
          <div class="header-wrap__text">
            <h1 class="bread animate">Giới thiệu</h1>
          </div>
        </div>
      </div>
    </div>
  </header>
</div>

<section class="story py-5 pt-sm-1">
  <div class="container">
    <img src="{{ asset('img/title-above.png') }}" class="title-above d-block mx-auto pt-3 pt-sm-1" alt="Title-above">
    <h3 class="subheading heading-line text-center pt-4">Câu chuyện của chúng tôi</h3>
    <div class="row py-4">
      <div class="col-md-6 story__left animate d-flex flex-column align-items-center justify-content-center">
        <div class="subheading-text text-center py-3">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum cum molestiae blanditiis, ipsam dignissimos
          alias doloremque quos perferendis praesentium autem quod. Ab maiores blanditiis corrupti itaque ipsa
          impedit. Et alias ex aut cupiditate aliquid <br><br> Lorem ipsum dolor sit amet,
          consectetur
          adipisicing elit. Minus vero, saepe minima nisi praesentium explicabo eius quo hic vel eos et harum
          molestias, ducimus cum voluptatum labore? Harum, asperiores qui?
        </div>
        <div class="social py-3">
          <a href="https://www.facebook.com/webworld.az/"><i class="fab fa-facebook-f "></i></a>
          <a href="https://www.instagram.com/webworld.az/"><i class="fab fa-instagram "></i></a>
        </div>
      </div>
      <div class="col-md-6 animate pt-4 pt-md-0">
        <div id="home" class="video-hero"
          style="height:100%; background-image: url('{{ asset('img/header-bg.jpg') }}'); background-size:cover; background-position: center center;">
          <a class="player"
            data-property="{videoURL:'https://www.youtube.com/watch?v=G1Bl_cy0svM',containment:'#home',useOnMobile: true, autoPlay:true, loop:true, mute:true, realfullscreen: true, startAt:0,  opacity:1, quality:'default', stopMovieOnBlur:true}"></a>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="testimonial" class="testimony-section py-5" style="background-image: url('{{ asset('img/background.jpg') }}')">
  <div class="container">
    <div class="row">
      <div class="col-12 animate">
        <h3 class="subheading heading-line text-center">Khách hàng nói gì</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="carousel-testimony owl-carousel owl-theme">
          <div class="item">
            <div class="testimony-wrap ani py-4">
              <div class="mb-4 testimonial__img bg-cover" style=" background-image: url('{{ asset('img/person_1.jpg') }}');">
              </div>
              <div class="text-center">
                <span class="position">khách hàng</span>
                <p class="name">Təhmasib Şirinzadə</p>
                <div class="col-md-7 d-flex mx-auto">
                  <i class="fas fa-quote-left quote"></i>
                  <p class="testimonial__text mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores
                    soluta, cupiditate quam perspiciatis velit veritatis inventore similique, ex odit atque quis
                    facilis necessitatibus in itaque maxime quos molestias aspernatur quaerat?</p>
                  <i class="fas fa-quote-right quote align-self-end"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap py-4">
              <div class="mb-4 testimonial__img bg-cover" style=" background-image: url('{{ asset('img/person_2.jpg') }}');">
              </div>
              <div class="text-center">
                <span class="position">khách hàng</span>
                <p class="name">Təhmasib Şirinzadə</p>
                <div class="col-md-7 d-flex mx-auto">
                  <i class="fas fa-quote-left quote"></i>
                  <p class="testimonial__text mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores
                    soluta, cupiditate quam perspiciatis velit veritatis inventore similique, ex odit atque quis
                    facilis
                    necessitatibus in itaque maxime quos molestias aspernatur quaerat?</p>
                  <i class="fas fa-quote-right quote align-self-end"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap py-4">
              <div class="mb-4 testimonial__img bg-cover" style=" background-image: url('{{ asset('img/person_3.jpg') }}');">
              </div>
              <div class="text-center">
                <span class="position">khách hàng</span>
                <p class="name">Təhmasib Şirinzadə</p>
                <div class="col-md-7 d-flex mx-auto">
                  <i class="fas fa-quote-left quote"></i>
                  <p class="testimonial__text mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores
                    soluta, cupiditate quam perspiciatis velit veritatis inventore similique, ex odit atque quis
                    facilis
                    necessitatibus in itaque maxime quos molestias aspernatur quaerat?</p>
                  <i class="fas fa-quote-right quote align-self-end"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap py-4">
              <div class="mb-4 testimonial__img bg-cover" style=" background-image: url('{{ asset('img/person_4.jpg') }}');">
              </div>
              <div class="text-center">
                <span class="position">khách hàng</span>
                <p class="name">Təhmasib Şirinzadə</p>
                <div class="col-md-7 d-flex mx-auto">
                  <i class="fas fa-quote-left quote"></i>
                  <p class="testimonial__text mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores
                    soluta, cupiditate quam perspiciatis velit veritatis inventore similique, ex odit atque quis
                    facilis necessitatibus in itaque maxime quos molestias aspernatur quaerat?</p>
                  <i class="fas fa-quote-right quote align-self-end"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="team py-5">
  <h3 class="subheading heading-line animate text-center">Đội ngũ của chúng tôi</h3>
  <div class="team-overlay"></div>
  <div class="page-wrap light-theme py-3">
    <div class="wrap-center wrap-center-a">
      <div class="team-header animate">
        <div class="avatar">
          <div class=""></div>
          <img src="{{ asset('img/person_1.jpg') }}" alt="team member">
        </div>
        <span class="team-name">Təhmasib Şirinzadə</span>
        <h1 class="team-position">Bếp trưởng</h1>
        <div class="social team-social">
          <a href="https://www.facebook.com/webworld.az/"><i class="fab fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/webworld.az/"><i class="fab fa-instagram"></i></a>
        </div>
        <nav class="team-nav">
          <span class="team-toggle team-a"><i class="fas fa-chevron-down team-arrow-down"></i></span>
        </nav>
      </div>

      <div class="team-about" id="team-about">
        <div class="copy-block">
          <h2>Về</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae laudantium itaque similique
            aspernatur vitae nostrum sapiente. Odit ipsa labore necessitatibus atque aspernatur reprehenderit ea
            quo, non voluptate aliquid cum obcaecati, consectetur esse tempora animi totam dolores culpa! Fuga,
            veritatis? Suscipit, ullam vitae! Architecto, at tempore?</p>
        </div>
      </div>
    </div>

    <div class="wrap-center wrap-center-b">
      <div class="team-header animate">
        <div class="avatar">
          <div class=""></div>
          <img src="{{ asset('img/person_2.jpg') }}" alt="team member">
        </div>
        <span class="team-name">Təhmasib Şirinzadə</span>
        <h1 class="team-position">Thợ làm bánh</h1>
        <div class="social team-social">
          <a href="https://www.facebook.com/webworld.az/"><i class="fab fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/webworld.az/"><i class="fab fa-instagram"></i></a>
        </div>
        <nav class="team-nav">
          <span class="team-toggle team-b"><i class="fas fa-chevron-down team-arrow-down"></i></span>
        </nav>
      </div>

      <div class="team-about" id="team-about">
        <div class="copy-block">
          <h2>Về</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae laudantium itaque similique
            aspernatur vitae nostrum sapiente. Odit ipsa labore necessitatibus atque aspernatur reprehenderit ea
            quo, non voluptate aliquid cum obcaecati, consectetur esse tempora animi totam dolores culpa! Fuga,
            veritatis? Suscipit, ullam vitae! Architecto, at tempore?</p>
        </div>
      </div>
    </div>

    <div class="wrap-center wrap-center-c">
      <div class="team-header animate">
        <div class="avatar">
          <div class=""></div>
          <img src="{{ asset('img/person_3.jpg') }}" alt="Team-member">
        </div>
        <span class="team-name">Təhmasib Şirinzadə</span>
        <h1 class="team-position">Quản lý</h1>
        <div class="social team-social">
          <a href="https://www.facebook.com/webworld.az/"><i class="fab fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/webworld.az/"><i class="fab fa-instagram"></i></a>
        </div>
        <nav class="team-nav">
          <span class="team-toggle team-c"><i class="fas fa-chevron-down team-arrow-down"></i></span>
        </nav>
      </div>

      <div class="team-about" id="team-about">
        <div class="copy-block">
          <h2>Về</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae laudantium itaque similique
            aspernatur vitae nostrum sapiente. Odit ipsa labore necessitatibus atque aspernatur reprehenderit ea
            quo, non voluptate aliquid cum obcaecati, consectetur esse tempora animi totam dolores culpa! Fuga,
            veritatis? Suscipit, ullam vitae! Architecto, at tempore?</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
