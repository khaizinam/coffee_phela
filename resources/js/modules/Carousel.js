export class Carousel {
  constructor() {
    this.init();
  }

  init() {
    this.initTestimonyCarousel();
    this.initBlogCarousel();
  }

  initTestimonyCarousel() {
    $(".carousel-testimony").owlCarousel({
      autoplay: true,
      autoplayHoverPause: true,
      items: 1,
      margin: 0,
      stagePadding: 0,
      nav: false,
      dots: true,
      loop: true,
      responsive: {
        0: { items: 1 },
        600: { items: 1 },
        1000: { items: 1 }
      }
    });
  }

  initBlogCarousel() {
    $(".carousel-blog").owlCarousel({
      autoplay: true,
      autoplayHoverPause: true,
      margin: 0,
      stagePadding: 0,
      nav: true,
      dots: false,
      loop: true,
      navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
      responsive: {
        0: { items: 1 },
        485: { items: 1 },
        728: { items: 3 },
        960: { items: 4 },
        1200: { items: 4 }
      }
    });
  }
}

