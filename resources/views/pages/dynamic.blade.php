@extends('layouts.app')

@section('content')
<div class="header-body hero-wrap" 
  style="background:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), 
  url('{{ $page->banner_image_url }}') bottom center/cover no-repeat;">
  @include('partials.header')
  
  <header class="header-wrap">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="header-wrap__text">
            <h1 class="bread">{{ $page->name }}</h1>
            <h2 class="text-center no-wrap">Phê La</h2>
          </div>
        </div>
      </div>
    </div>
  </header>
</div>

<section class="page-content py-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="page-body">
          {!! $page->meta_description ?? '' !!}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

