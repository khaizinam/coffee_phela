export class Gallery {
  constructor() {
    this.init();
  }

  init() {
    this.initMagnificPopup();
    this.initFilter();
  }

  initMagnificPopup() {
    $('.gallery-inner').magnificPopup({
      delegate: 'a',
      type: 'image',
      gallery: { enabled: true },
      zoom: {
        enabled: true,
        duration: 300,
        easing: 'ease-in-out',
      }
    });
  }

  initFilter() {
    $(".gallery__filter--button").click(function() {
      let value = $(this).attr('data-filter');

      if (value == "all") {
        $('.filter').show('1000');
      } else {
        $(".filter").not('.' + value).slideUp().hide();
        $('.filter').filter('.' + value).slideDown().show();
      }
    });

    if ($(".gallery__filter--button").removeClass("active")) {
      $(this).removeClass("active");
    }
    $(this).addClass("active");
  }
}

